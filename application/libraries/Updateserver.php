<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Updateserver
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

    

    public function remote_server_check($servers, $hash, $time, $cron=false)
    {
        if ($servers) {
            $status = array();
            $statusresult = array();
            $responseresult = array();
            $multi = curl_multi_init();
            foreach ($servers as $server) {
                $id = $server->server_id;

                $services = $this->CI->services_model->get_services($server->server_id);
                $sarray = (!empty($services)) ? "&".http_build_query($services) : "";

                //die($server->server_script_address."?hash=".$hash."&type=response&netport=".$server->server_traffic_interface);
                // normal output
                $address = $server->server_script_address."?hash=".$hash/*."&netport=".$server->server_traffic_interface*/.$sarray;
                //die($address);
                $status[$id] = curl_init();
                curl_setopt($status[$id], CURLOPT_URL,            $address);
                curl_setopt($status[$id], CURLOPT_HEADER,         0);
				curl_setopt($status[$id], CURLOPT_CONNECTTIMEOUT ,0);
				curl_setopt($status[$id], CURLOPT_TIMEOUT, 400); 
				
                curl_setopt($status[$id], CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($status[$id], CURLOPT_FOLLOWLOCATION, true);
                curl_setopt($status[$id], CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
                curl_multi_add_handle($multi, $status[$id]);
            }

            // execute the handles
            $running = null;
            do {
                curl_multi_exec($multi, $running);
            } while ($running > 0);


            foreach ($status as $sid => $c) {
                $statusresult[$sid] = curl_multi_getcontent($c);
                $cdetails = curl_getinfo($c);
                $responseresult[$sid] = array("response" => $cdetails["connect_time"], "http_code" => $cdetails["http_code"]);
                curl_multi_remove_handle($multi, $c);
            }

            // all done
            curl_multi_close($multi);
            $status_errors = array();
			//echo "<pre>";
			
            foreach ($responseresult as $sid => $res) {
                $statusresult = array_filter($statusresult);
                if (isset($statusresult[$sid]) && !empty($statusresult[$sid])) {
                    $statusdetails = json_decode($statusresult[$sid]);
					
					
                    $memory = (array)$statusdetails->memory;
                   /* $mem = round(intval($memory->MemTotal)/1048576).'GB <span>('.round((intval($memory->MemFree)+intval($memory->Buffers)+intval($memory->Cached))/1048576).'GB Available / '.round(intval($memory->Cached)/1048576).'GB cached)';
                    */
					$mem =$memory;
					$mod = "model name";
                    $services = (array) $statusdetails->services;
                    $services = (isset($services) && !empty($services)) ? base64_encode(serialize($services)) : '';
                    $ping_time = round($res["response"]*1000);
                    $data[] = array(
                        "res_time" => $time,
                        "res_server_id" => $sid,
                        "res_http_code" => $res["http_code"],
                        "res_ping_time" => $ping_time,
                        "res_uptime" => $statusdetails->uptime->uptime,
                        "res_load" => $statusdetails->uptime->load,
                        "res_model" => $statusdetails->cpu->$mod,
                        "res_processes" => $statusdetails->processes,
                        "res_memory" => $mem,
                        "res_services" => $services/*,
                        "res_tx" => $statusdetails->netspeed->tx,
                        "res_rx" => $statusdetails->netspeed->rx*/);
                } else {
                    $ping_time = round($res["response"]*1000);
                    $data[] = array(
                        "res_time" => $time,
                        "res_server_id" => $sid,
                        "res_http_code" => $res["http_code"],
                        "res_ping_time" => $ping_time,
                        "res_uptime" => '',
                        "res_load" => '',
                        "res_model" => '',
                        "res_processes" => '',
                        "res_memory" => '',
                        "res_services" => ''/*,
                        "res_tx" => $statusdetails->netspeed->tx,
                        "res_rx" => $statusdetails->netspeed->rx*/);
                    $status_errors[] = "Error getting status from server ".$sid;
                }
            }
			//print_r($data);
			for($i=0;$i<count($data);$i++)
			{
	$res_memory=implode("|",$data[$i][res_memory]);
	$res_time=$data[$i]['res_time'];
	$res_server_id=$data[$i]['res_server_id'];
	$res_http_code=$data[$i]['res_http_code'];
	$res_ping_time=$data[$i]['res_ping_time'];
	$res_uptime=$data[$i]['res_uptime'];
	$res_load=$data[$i]['res_load'];
	$res_model=$data[$i]['res_model'];
	$res_processes=$data[$i]['res_processes'];
	$res_services=$data[$i][res_services];
	
			
			mysql_query("insert into monitor_new.server_responses (
			res_time, 
	res_server_id, 
	res_http_code, 
	res_ping_time, 
	res_uptime, 
	res_load, 
	res_model, 
	res_processes, 
	res_memory, 
	 
	res_services) values (
	'$res_time',
	'$res_server_id',
	'$res_http_code',
	'$res_ping_time',
	'$res_uptime',
	'$res_load',
	'$res_model',
	'$res_processes',
	'$res_memory',
	
	'$res_services')");
		
		
			}
            if(!empty($status_errors)) $this->CI->session->set_flashdata('status_errors', implode("<br />", $status_errors));

            $this->CI->db->insert_batch('server_responses', $data);

            $newdata = array("setting_last_server_check" => $time);
            if($cron === true) $newdata["setting_last_cron_check"] = $time;
            else {
                $settings = $this->CI->server_model->get_settings();
                if(($settings->setting_last_cron_check+$settings->setting_heartbeat_interval) < $time) $newdata["setting_last_cron_check"] = $time;
            }
            $this->CI->db->where('setting_id', "1");
            $this->CI->db->update('settings', $newdata);

            $this->CI->load->library("systemnotify");
            $this->CI->systemnotify->check_servers();
        }
    }
}

