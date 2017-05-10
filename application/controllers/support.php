<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class support extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model("server_model");
        $this->load->library("authme");
        $this->load->model("authme_model");
		$this->load->model("services_model");
        if( $this->session->userdata('logged_in') !== true) redirect($this->config->item("base_url")."index.php/home/login");
    }

    public function index()
    {   $all_list = '';
        $all_count = 0;
        $data = array();
        $cronpath = realpath(dirname(__FILE__)."/../../index.php");
		$servers = $this->server_model->get_all_servers();
		$setting = $this->server_model->get_settings();
		 $send_time = (isset($setting->setting_last_server_check) && !empty($setting->setting_last_server_check)) ? $setting->setting_last_server_check : false;
		 
		if ($servers !== false) {
            foreach ($servers as $server) {
				
                $server_details = $this->server_model->get_response_details($server->server_id, $send_time);
                $all_count++;
                $all_list .= $this->build_server_line($server, $server_details);
            }

        } 
		else $all_list = 'There are currently no servers attached';
		
		
		$data["all_list"] = $all_list;
		$data["all_count"] = $all_count;
        $data["last_check"] = ($send_time === false) ? "Never" : time_ago($send_time,true);
        $data["next_check"] = ($send_time === false) ? "Never" : time_ago(($send_time+$setting->setting_heartbeat_interval)-strtotime("now"),true, false,1);

        $data["cronpath"] = 'php '.$cronpath.' cron process_servers';
        $this->load->view('header', $data);
        $this->load->view('support', $data);
        $this->load->view('footer', $data);
    }
	public function build_server_line($server, $server_details=false)
    {
        $online = ($server_details !== false) ? ($server_details->res_http_code == "200") ? "Online" : "Offline" : "unknown";
        $onlinemark = (strtolower($online) === "online") ? '<i class="icon-checkmark-circle greentext"></i>' : '<i class="icon-cancel-circle redtext"></i>';
        $load = ($server_details !== false) ? $server_details->res_load : "unknown";
        $response_time = ($server_details !== false) ? $server_details->res_ping_time."ms" : "unknown";

        return '
            <div class="table-box user-box">
                <div class="col col1"><div class="disk-ref"><i class="icon-globe server-icon"></i> '.$server->server_name.'</div><div class="disk-name">'.$onlinemark.$online.'</div></div>
                <div class="col col2">'.$load.' <span class="lightertext small">'.$response_time.'</span></div>
                <div class="col col3"><a class="button redbutton2" href="'.$this->config->item("base_url").'index.php/servers/view_report/'.$server->server_id.'/">Software List</a></div>
                <div style="clear:both;"></div>
            </div>';

    }
}
