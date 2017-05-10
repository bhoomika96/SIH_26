<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class servers extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library("authme");
        $this->load->model("server_model");
        $this->load->model("services_model");
        if( $this->session->userdata('logged_in') !== true) redirect($this->config->item("base_url")."index.php/home/login");
    }

    public function index()
    {
        $all_list = '';
        $all_count = 0;

        $setting = $this->server_model->get_settings();
        $servers = $this->server_model->get_all_servers();

        $send_time = (isset($setting->setting_last_server_check) && !empty($setting->setting_last_server_check)) ? $setting->setting_last_server_check : false;

        if ($servers !== false) {
            foreach ($servers as $server) {
                $server_details = $this->server_model->get_response_details($server->server_id, $send_time);
                $all_count++;
                $all_list .= $this->build_server_line($server, $server_details);
            }

        } else $all_list = 'There are currently no servers attached';

        $data["all_list"] = $all_list;
        $data["all_count"] = $all_count;
        $data["last_check"] = ($send_time === false) ? "Never" : time_ago($send_time,true);
        $data["next_check"] = ($send_time === false) ? "Never" : time_ago(($send_time+$setting->setting_heartbeat_interval)-strtotime("now"),true, false,1);

        $this->load->view('header', $data);
        $this->load->view('servers', $data);
        $this->load->view('footer', $data);
    }
	public function showpdf($id)
	{
		//$this->load->config('database', $data);
       // $this->load->config('dbController', $data);
        $this->load->database();
	   

		
		//$db_handle = new DBController();
		$result = $db_handle->runQuery("SELECT * FROM server_responses");
		
		$header = $db_handle->runQuery("SELECT res_memory FROM server_responses");

//require('fpdf.php');
       $this->load->fpdf('fpdf', $data);

		$pdf = new FPDF();
		$pdf->AddPage();
		$pdf->SetFont('Arial','B',12);		
		foreach($header as $heading) {
		foreach($heading as $column_heading)
			$pdf->Cell(90,12,$column_heading,1);
		}
		foreach($result as $row) {
		$pdf->SetFont('Arial','',12);	
		$pdf->Ln();
		foreach($row as $column)
		$pdf->Cell(90,12,$column,1);
		}
		$pdf->Output();	
	}

    public function add_server()
    {
        $this->load->library("updateserver");
        $data = array();
        if ($_POST) {
            if (($address = $this->input->post('server_script_address')) !== false) {
                $setting = $this->server_model->get_settings();
                $ch = curl_init($address."?hash=".$setting->setting_unique."&type=register");
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $output = curl_exec($ch);
                if (!curl_errno($ch)) {
                    $info = curl_getinfo($ch);
                    if ($info["http_code"] == "200") {
                        $add_server = $this->server_model->add_server($output, $address);
                        $servers = $this->server_model->get_all_servers();
                        $settings = $this->server_model->get_settings();
                        $time = strtotime("now");
                        $this->updateserver->remote_server_check($servers, $settings->setting_unique, $time);

                        $data["message"] = $add_server;
                    } elseif ($info["http_code"] == "401") {
                        $data["message"] = '<p class="error">Could not register the server, the connector script has the wrong key, download the connector script again and re-upload it</p>';
                    } else {
                        $data["message"] = '<p class="error">Could not register the server, the most likely cause of this is the address you supplied is incorrect, double check the path details</p>';
                    }
                } else $data["message"] = '<p class="error">There was an error registering the server - '.curl_error($ch).'</p>';
                curl_close($ch);
            }
        }
        $this->load->view('header', $data);
        $this->load->view('add_server', $data);
        $this->load->view('footer', $data);
    }

    public function confirm_delete_server($server_id)
    {
        $data["server_id"] = $server_id;
        $this->load->view('header', $data);
        $this->load->view('confirm_delete_server', $data);
        $this->load->view('footer', $data);
    }
    public function delete_server($server_id)
    {
        $this->server_model->delete_server($server_id);
        redirect($this->config->item("base_url")."index.php/servers/");
    }

    public function view_server($server_id)
    {
        if (isset($_POST) && !empty($_POST)) {
            if (isset($_POST["action"]) && !empty($_POST["action"])) {
                switch ($_POST["action"]) {
                    case "configure_services":
                        $this->services_model->set_services($server_id);
                        redirect($this->config->item("base_url")."index.php/servers/view_server/".$server_id."/");
                        break;
                    case "save_description":
                        $this->server_model->save_description($server_id);
                        redirect($this->config->item("base_url")."index.php/servers/view_server/".$server_id."/");
                        break;
                }
            }

        }
        $server = $this->server_model->get_server($server_id);
        if ($server) {
        $data = array();
        $setting = $this->server_model->get_settings();
        $send_time = (isset($setting->setting_last_server_check) && !empty($setting->setting_last_server_check)) ? $setting->setting_last_server_check : false;

        $server_details = $this->server_model->get_response_details($server_id, $send_time);

        $server_list = $this->build_public_list($server, $server_details, true, true);
        $service_details = $this->build_current_list($server, $server_details);

        $data["server_details"] = $server_list;
        $data["service_details"] = $service_details;
        $data["all_services"] = $this->all_services_text($server_id);
        $data["delete_server"] = '<a class="button redbutton2 largebutton" href="'.$this->config->item("base_url").'index.php/servers/confirm_delete_server/'.$server_id.'/">Delete Server</a>';
        $data["desc_edit"] = $this->server_desc_text($server->server_desc);
        $this->load->view('header', $data);
        $this->load->view('view_server', $data);
        $this->load->view('footer', $data);
        } else {
            die("no such server"); // change to flash message 
        }
    }
	
	
	
	
	
public function view_report($server_id)
    {
        if (isset($_POST) && !empty($_POST)) {
            if (isset($_POST["action"]) && !empty($_POST["action"])) {
                switch ($_POST["action"]) {
                    case "configure_services":
                        $this->services_model->set_services($server_id);
                        redirect($this->config->item("base_url")."index.php/servers/view_server/".$server_id."/");
                        break;
                    case "save_description":
                        $this->server_model->save_description($server_id);
                        redirect($this->config->item("base_url")."index.php/servers/view_server/".$server_id."/");
                        break;
                }
            }

        }
        $server = $this->server_model->get_server($server_id);
        if ($server) {
        $data = array();
        $setting = $this->server_model->get_settings();
        $send_time = (isset($setting->setting_last_server_check) && !empty($setting->setting_last_server_check)) ? $setting->setting_last_server_check : false;

        $server_details = $this->server_model->get_response_details($server_id, $send_time);

        $server_list = $this->build_public_list($server, $server_details, true, true);
        $service_details = $this->build_current_list($server, $server_details);

        $data["server_details"] = $server_list;
        
        
       
        
        $this->load->view('header', $data);
        $this->load->view('view_report', $data);
      //  $this->load->view('footer', $data);
        } else {
            die("no such server"); // change to flash message
        }
    }
    public function view_service_list($server_id)
    {
        $data = array();
        //$this->load->view('header', $data);
        echo $this->build_service_list($server_id);
        //$this->load->view('footer', $data);

    }

    private function all_services_text($server_id)
    {
        return '<div id="allservices" class="public_page">'.$this->build_service_list($server_id).'</div>';
    }

    private function server_desc_text($current_desc)
    {
        return '
        <div id="desc_edit" class="public_page">
            <div class="box services">
                <form method="post" class="row-fluid" action="'.$_SERVER["PHP_SELF"].'">
                    <input type="hidden" name="action" value="save_description" />
                    <div class="reload-box">
                        <div class="label">Description</div>
                        <div class="inner-box">
                            <div class="row" style="padding: 5px;"><textarea name="server_desc" class="login_input" maxlength="255" style="min-width:300px; height: 200px;" placeholder="enter server description">'.$current_desc.'</textarea></div>
                            <div class="butrow"><input type="submit" class="button redbutton2" value="Save" /></div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        ';
    }

    public function build_service_list($server_id)
    {
        $server = $this->server_model->get_server($server_id);
        $setting = $this->server_model->get_settings();
        $send_time = (isset($setting->setting_last_server_check) && !empty($setting->setting_last_server_check)) ? $setting->setting_last_server_check : false;
        $server_details = $this->server_model->get_response_details($server_id, $send_time);

        $service_list = $this->services_model->get_all_services();
        $s = '';
        if (isset($service_list) && !empty($service_list)) {
            $all_services = $this->services_model->get_services($server->server_id);
            foreach ($service_list as $service) {
                //$placeholder =
                //$mark = (strtolower($service) === "online") ? '<i class="icon-checkmark-circle greentext"></i>' : '<i class="icon-cancel-circle redtext"></i>';
                $checkval = '';
                $defval = $service->service_default_port;
                $asev = (isset($all_services["services"]) && !empty($all_services["services"])) ? $all_services["services"] : array();
                if (array_key_exists($service->service_name, $asev)) {
                    $checkval = ' checked="checked"';
                    $defval = $all_services["services"][$service->service_name];
                }
                $s .= '<div class="row"><h3>'.$service->service_name.'</h3><div class="row-details"><input type="text" class="text" name="lnk_service_port['.$service->service_id.']" value="'.$defval.'" /></div><div class="row-details"><input type="checkbox"'.$checkval.' name="active['.$service->service_id.']" value="1" /></div></div>';
            }
        }

        return '<div id="service" class="box services"><form method="post" class="row-fluid" action="'.$_SERVER["PHP_SELF"].'"><input type="hidden" name="action" value="configure_services" />
                <div class="reload-box">
                <div class="label">Services</div>

                <div class="inner-box">
                    '.$s.'
                    <div class="butrow"><input type="submit" class="button redbutton2" value="Save" /></div>
                </div>
                </div>
            </form></div>';
    }

    public function remove_server_service($server_id, $service_id)
    {
        $this->services_model->remove_server_service($server_id, $service_id);
        redirect($this->config->item("base_url")."index.php/servers/view_server/".$server_id."/");
    }

    public function build_current_list($server, $server_details=false)
    {
        $service_list = $this->services_model->get_all_services();
        $s = '';
        if (isset($service_list) && !empty($service_list)) {
            $all_services = $this->services_model->get_services($server->server_id);
            if (isset($all_services) && !empty($all_services)) {
                foreach ($service_list as $service) {
                    $defval = $service->service_default_port;
                    $asev = (isset($all_services["services"]) && !empty($all_services["services"])) ? $all_services["services"] : array();
                    if(!array_key_exists($service->service_name, $asev)) continue;
                    $s .= '<div class="row"><h3>'.$service->service_name.'</h3><div class="row-details"><input type="text" class="text" name="lnk_service_port['.$service->service_id.']" value="'.$all_services["services"][$service->service_name].'" /></div><div class="row-details textright"><a href="'.$this->config->item("base_url").'index.php/servers/remove_server_service/'.$server->server_id.'/'.$service->service_id.'/" class="button redbutton2">Remove</a></div></div>';
                }
            } else {
                $s = '<div class="row textcenter"><h3>No services configured</h3></div>';
            }
        }

        return '<div id="service" class="box services">
                <div class="reload-box">
                <div class="label">Services</div>

                <div class="inner-box">
                    '.$s.'
                    <div class="butrow"><a href="'.$this->config->item("base_url").'index.php/servers/view_service_list/'.$server->server_id.'/" id="configure_services" class="button greybutton">Add services</a></div>
                </div>
                </div>
            </div>';
    }

    public function build_public_list($server, $server_details=false, $show_services=true, $show_edit=false)
    {
        $online = ($server_details !== false) ? ($server_details->res_http_code == "200") ? "Online" : "Offline" : "unknown";
        $load = ($server_details !== false) ? $server_details->res_load : "unknown";
        $response_time = ($server_details !== false) ? $server_details->res_ping_time."ms" : "unknown";
        $model = ($server_details !== false) ? $server_details->res_model : "unknown";
        $processes = ($server_details !== false) ? $server_details->res_processes : "unknown";
        $memory = ($server_details !== false) ? $server_details->res_memory : "unknown";
        $uptime = ($server_details !== false) ? $server_details->res_uptime : "unknown";
        $s = '';
        if (isset($server_details->res_services) && !empty($server_details->res_services) && $show_services===true) {
            $all_services = unserialize(base64_decode($server_details->res_services));
            foreach ($all_services as $sname => $service) {
                $mark = (strtolower($service) === "online") ? '<i class="icon-checkmark-circle greentext"></i>' : '<i class="icon-cancel-circle redtext"></i>';
                $s .= '<div class="row"><h3>'.$sname.'</h3><div class="row-details">'.$mark.$service.'</div></div>';
            }
        }
        $onlinemark = (strtolower($online) === "online") ? '<i class="icon-checkmark-circle greentext"></i>' : '<i class="icon-cancel-circle redtext"></i>';
        $desc_edit = ($show_edit) ? '<a style="float:right;" id="click_desc_edit" href=""><i class="icon-pencil"></i></a>' : '';
        $server_desc = (isset($server->server_desc) && !empty($server->server_desc)) ? '<div class="row"><div class="server-desc">'.$desc_edit.$server->server_desc.'</div></div>' : '<div class="row"><div class="server-desc">'.$desc_edit.'No description set</div></div>';

        return '<div class="box '.strtolower($online).'">
                <div class="reload-box">
                <div class="label">'.$server->server_name.'</div>

                <div class="inner-box">
                    '.$server_desc.'
                    <div class="row"><h3>Server</h3><div class="row-details">'.$onlinemark.$online.' - '.$uptime.'</div></div>
                    <div class="row"><h3>IP Address</h3><div class="row-details">'.long2ip($server->server_ip).'</div></div>
                    <div class="row"><h3>Load</h3><div class="row-details">'.$load.'</div></div>
                    <div class="row"><h3>Response</h3><div class="row-details">'.$response_time.'</div></div>
                    <div class="row"><h3>Model</h3><div class="row-details">'.$model.'</div></div>
                    <div class="row"><h3>Processes</h3><div class="row-details">'.$processes.'</div></div>

                    '.$s.'
                </div>
                </div>
            </div>';
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
                <div class="col col3"><a class="button redbutton2" href="'.$this->config->item("base_url").'index.php/servers/view_server/'.$server->server_id.'/">Edit Comp</a></div>
                <div style="clear:both;"></div>
            </div>';

    }

}

