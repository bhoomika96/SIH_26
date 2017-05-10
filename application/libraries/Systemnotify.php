<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Systemnotify
{
    private $CI;

    public function __construct()
    {
        $this->CI =& get_instance();
        $this->CI->load->database();
        $this->CI->load->library('session');
        $this->CI->load->model('server_model');
        $this->CI->load->model('services_model');
    }

    

    public function check_servers()
    {
        $changes = array();
        $additional = array();
        $setting = $this->CI->server_model->get_settings();
        if(isset($setting->setting_email_notification) && !empty($setting->setting_email_notification)) {
            $all_servers = $this->CI->server_model->get_all_servers();
            if($all_servers) {
                foreach($all_servers as $server) {
                    $responses = $this->CI->server_model->notify_check_details($server->server_id);
                    $current = $responses[0];
                    $current->server_name = $server->server_name;
                    $current->server_ip = $server->server_ip;
                    if(isset($responses[1])) {
                        $last = $responses[1];
                        if(isset($last->res_http_code) && !empty($last->res_http_code)) { // only continue if there is something to compare to
                            if($current->res_http_code !== $last->res_http_code) {
                                if($current->res_http_code === '200') $changes["serveronline"][] = $current;
                                else $changes["serveroffline"][] = $current;
                            } else { // only send email about other servers being off line if already sending an email about changes
                                if($current->res_http_code !== '200') {
                                    $additional[] = $current;
                                }
                            }
                        }
                    }
                }
            }
            if(!empty($changes)) {
                $message = '';
                $subject = '';
                $offcount = 0;
                $oncount = 0;
                if(!empty($changes["serveroffline"])) {
                    $message .= '<strong>Servers that just went offline</strong><br />';
                    foreach($changes["serveroffline"] as $offline) {
                        $offcount++;
                        $message .= $offline->server_name.' - '.long2ip($offline->server_ip).'<br />';
                    }
                    $message .= '<br />';
                }
                if(!empty($changes["serveronline"])) {
                    $message .= '<strong>Servers that have just come back online</strong><br />';
                    foreach($changes["serveronline"] as $online) {
                        $oncount++;
                        $message .= $online->server_name.' - '.long2ip($online->server_ip).'<br />';
                    }
                    $message .= '<br />';
                }

                if(!empty($additional)) {
                    $message .= '<strong>Other servers that are currently offline</strong><br />';
                    foreach($additional as $aoffline) {
                        $message .= $aoffline->server_name.' - '.long2ip($aoffline->server_ip).'<br />';
                    }
                    $message .= '<br />';
                }


                $this->CI->load->library('email');
                $config['mailtype'] = 'html';
                $this->CI->email->initialize($config);

                $this->CI->email->from('noreply@'.$_SERVER["SERVER_NAME"], 'Server Monitor'); // Change these details
                $this->CI->email->to($setting->setting_email_notification);

                if($offcount > 0) $subject .= ($offcount === 1) ? $changes["serveroffline"][0]->server_name.' just went offline' : $offcount.' server(s) just went offline';
                if($offcount > 0 && $oncount > 0) $subject .= " - "; 
                if($oncount > 0) $subject .= ($oncount === 1) ? $changes["serveronline"][0]->server_name.' just came back online' : $oncount.' server(s) just came back online';

                $this->CI->email->subject($subject);
                $this->CI->email->message($message);
                $this->CI->email->send();

            }
        }
    }
}
