<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class cron extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model("server_model");
    }

    public function index()
    {
        if( $this->session->userdata('logged_in') !== true) redirect($this->config->item("base_url").'index.php/home');
        $settings = $this->server_model->get_settings();
        $data = array();
        if (!empty($_POST)) {

            if ($this->input->post("heartbeat") == "never") {
                $this->delete_cron();
                $in_cron = $this->in_cron(0);
                if ($in_cron !== false) {
                    $data["message"] = '<p class="error flashmessage">Could not automatically delete cron job, please delete it manually</p>';
                } else {
                    $data["message"] = '<p class="success flashmessage">Scheduled updates successfully disabled</p>';
                }
                $settings->setting_heartbeat_interval = 0;
            } else {
                $failed_attempt = false;
                $this->edit_cron($this->input->post("heartbeat"));
                $in_cron = $this->in_cron($this->input->post("heartbeat"));
                if ($in_cron === 1) {
                    $failed_attempt = true;
                    $data["message"] = '<p class="error flashmessage">Entry exists in cron job, but the time interval could not be updated, please update your cron job manually it manually</p>';
                } elseif ($in_cron === 2) {
                    $data["message"] = '<p class="success flashmessage">Schedule has been successfully updated</p>';
                } else {
                    $failed_attempt = true;
                    $data["message"] = '<p class="error flashmessage">Could not automatically update cron job, please update it manually</p>';
                }
                if ($failed_attempt) {
                    $this->db->where('setting_id', "1");
                    $settings->setting_cron_attempt = $settings->setting_cron_attempt+1;
                    $failed_attempts = $settings->setting_cron_attempt;
                    $this->db->update('settings', array("setting_cron_attempt" => $failed_attempts));
                }
                $settings->setting_heartbeat_interval = ($this->input->post("heartbeat")*60);
            }
        }

        $data["cron_attempts"] = $settings->setting_cron_attempt;
        $data["current_heartbeat"] = ($settings->setting_heartbeat_interval/60);
        $cronpath = realpath(dirname(__FILE__)."/../../index.php");
        $data["cronpath"] = 'php '.$cronpath.' cron process_servers';
        $this->load->view('header', $data);
        $this->load->view('cron', $data);
        $this->load->view('footer', $data);

    }

    public function edit_cron($minutes)
    {
        if( $this->session->userdata('logged_in') !== true) redirect($this->config->item("base_url").'index.php/home');
        exec("crontab -l", $output);
        $cronpath = realpath(dirname(__FILE__)."/../../index.php");
        $newoutput = array();
        if (!empty($output)) { // already a cron tab, so search for our entry
            $hasentry = false;
            foreach ($output as $item) {
                if (strpos($item, "process_servers")) {
                    $hasentry = true;
                    $newoutput[] = '*/'.$minutes.' * * * * php '.$cronpath.' cron process_servers'.PHP_EOL;
                } else {
                    $newoutput[] = $item.PHP_EOL;
                }
            }
            if(!$hasentry) $newoutput[] = '*/'.$minutes.' * * * * php '.$cronpath.' cron process_servers'.PHP_EOL;
            $glue = implode('', $newoutput);
        } else $glue = '*/'.$minutes.' * * * * php '.$cronpath.' cron process_servers'.PHP_EOL;
        file_put_contents('crontab.txt', $glue);
        echo exec('crontab crontab.txt');
        $this->db->where('setting_id', "1");
        $heartbeat = ($minutes*60);
        $this->db->update('settings', array("setting_heartbeat_interval" => $heartbeat));
    }

    public function delete_cron()
    {
        if( $this->session->userdata('logged_in') !== true) redirect($this->config->item("base_url").'index.php/home');
        exec("crontab -l", $output);
        $newoutput = array();
        $glue = false;
        if (!empty($output)) { // already a cron tab, so search for our entry
            foreach ($output as $item) {
                if (strpos($item, "process_servers")) { // set it blank otherwise it wont be disabled
                    $newoutput[] = "";
                } else {
                    $newoutput[] = $item.PHP_EOL;
                }
            }
            $newoutput = array_filter($newoutput);
            if (!empty($newoutput)) {
                $glue = implode('', $newoutput);
            } else {
                $glue = '';
            }
        }
        if ($glue !== false) {
            file_put_contents('crontab.txt', $glue);
            echo exec('crontab crontab.txt');
        }
        $this->db->where('setting_id', "1");
        $heartbeat = 0;
        $this->db->update('settings', array("setting_heartbeat_interval" => $heartbeat));
    }

     function in_cron($time)
    {
        if( $this->session->userdata('logged_in') !== true) redirect($this->config->item("base_url").'index.php/home');
        exec("crontab -l", $output);
        $in_cron = false;
        if (!empty($output)) { // already a cron tab, so search for our entry.
            foreach ($output as $item) {
                if (strpos($item, "process_servers")) {
                    $in_cron = 1;
                    $sections = explode("*", $item);
                    $section = trim($sections[1]);
                    $mins = substr($section, 1);
                    if($time == $mins) $in_cron = 2;
                }
            }
        }

        return $in_cron;
    }

    
    public function process_servers()
    {
        if(!$this->input->is_cli_request()) die("you cannot run this script directly");
        $this->load->library("updateserver");
        $servers = $this->server_model->get_all_servers();
        $settings = $this->server_model->get_settings();
        $time = strtotime("now");
        $this->updateserver->remote_server_check($servers, $settings->setting_unique, $time, true);
    }


    public function force_update()
    {
        if( $this->session->userdata('logged_in') !== true) redirect($this->config->item("base_url").'index.php/home');
        //if(!$this->input->is_cli_request()) die("you cannot run this script directly");
        $this->load->library("updateserver");
        $servers = $this->server_model->get_all_servers();
        $settings = $this->server_model->get_settings();
        $time = strtotime("now");
        $this->updateserver->remote_server_check($servers, $settings->setting_unique, $time);
        redirect($this->config->item("base_url")."index.php/home");
    }

    public function external_force_update($hash=false)
    {
        //if(!$this->input->is_cli_request()) die("you cannot run this script directly");
        $this->load->library("updateserver");
        $servers = $this->server_model->get_all_servers();
        $settings = $this->server_model->get_settings();
        if($settings->setting_unique == $hash) {
	        $time = strtotime("now");
	        $this->updateserver->remote_server_check($servers, $settings->setting_unique, $time);
	    } else die("you do not have permission to access this");
    }

}

