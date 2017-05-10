<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class home extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library("authme");
        $this->load->model("server_model");
    }

    public function setup()
    {
    }

    public function index()
    {
        if ( $this->session->userdata('logged_in') !== true) {
            $this->public_view();
        } else {
            $cpuinfo = $this->systemstat->getCpuInfo();
            $processes = $this->systemstat->countProcesses();
            $uptime = $this->systemstat->getUptime();
            $memory = $this->systemstat->getMemStat();
            $data["cpuinfo"] = $cpuinfo["model name"];
            $data["processcount"] = $processes;
            $data["uptime"] = $uptime["uptime"];
            $data["load"] = $uptime["load"];
            $cached = ($memory["Cached"] > 0 || $memory["Buffers"] > 0) ?  '/ '.formatram($memory["Cached"]).' cached' : '';
            $available = formatram($memory["MemFree"]+$memory["Buffers"]+$memory["Cached"]);
            $data["memory"] = formatram($memory["MemTotal"]).' <span>('.$available.' Available'.$cached.')';

            $warning_list = '';
            $all_list = '';
            $warn_count = 0;
            $all_count = 0;

            $setting = $this->server_model->get_settings();
            $servers = $this->server_model->get_all_servers();

            $send_time = (isset($setting->setting_last_server_check) && !empty($setting->setting_last_server_check)) ? $setting->setting_last_server_check : false;
            $cron_time = (isset($setting->setting_last_cron_check) && !empty($setting->setting_last_cron_check)) ? $setting->setting_last_cron_check : false;

            $data["first_install"] = '';
            if ($setting->setting_first_install === "0") {
                $data["first_install"] = $this->first_install_text();
                $this->server_model->unset_first_install();
            }

            /*if ($servers !== false) {
                foreach ($servers as $server) {
                    $server_details = $this->server_model->get_response_details($server->server_id, $send_time);
                    $all_count++;
                    $all_list .= $this->build_server_line($server, $server_details);
                    $warn = false;
                    if ($server_details) {

                        $load = explode("," ,$server_details->res_load);
                        foreach ($load as $l) {
                            if(intval(trim($l)) >= $setting->setting_high_load) $warn = true;
                        }
                        if($server_details->res_http_code != "200") $warn = true;
                        if ($warn) {
                            $warn_count++;
                            $warning_list .= $this->build_server_line($server, $server_details);
                        }
                    }
                }

            } else $all_list = 'There are currently no servers attached';*/
            $server_list = '';
            if ($servers !== false) {
                $server_list = '';
                foreach ($servers as $server) {
                    $all_count++;
                    $server_details = $this->server_model->get_response_details($server->server_id, $send_time);
                    $server_list .= $this->build_public_list($server, $server_details);
                }

            } else $all_list = 'There are currently no servers attached';

            $data["server_list"] = $server_list;

            $warning_list = (!empty($warning_list)) ? $warning_list : 'There are currently no servers requiring attention';

            $data["warning_list"] = $warning_list;
            $data["all_list"] = $all_list;
            $data["warn_count"] = $warn_count;
            $data["all_count"] = $all_count;
            $data["last_check"] = ($send_time === false) ? "Never" : time_ago($send_time,true);
            if($setting->setting_heartbeat_interval === "0") $send_time = false; // scheduling has been disabled
            $data["next_check"] = ($send_time === false) ? "Never" : time_to_ago(($cron_time+$setting->setting_heartbeat_interval)-strtotime("now"),true, false,1);

            $this->load->view('header', $data);
            $this->load->view('home', $data);
            $this->load->view('footer', $data);
        }
    }

	private function first_install_text()
	{
		return '<div id="first_install">
					<h2>First time setup</h2>
					<p>You have just completed installing the system and currently have no servers, would you like to add one now?</p>
					<p><a style="margin-right:40px;" class="button redbutton largebutton" href="'.$this->config->item("base_url").'index.php/servers/add_server/">Yes, add a server now</a><a class="button redbutton largebutton" href="">No, i\'ll do it later</a></p>
				</div>';
	}

    public function public_view()
    {
        if ( $this->server_model->view_public() === "0") {
            redirect($this->config->item("base_url").'index.php/home/login');
        } elseif ( $this->server_model->view_public() === "1" || ($this->server_model->view_public() === "2" && $this->session->userdata('logged_in') === true) ) {
            $data = array();

            $setting = $this->server_model->get_settings();
            $servers = $this->server_model->get_all_servers();

            $send_time = (isset($setting->setting_last_server_check) && !empty($setting->setting_last_server_check)) ? $setting->setting_last_server_check : false;

            if ($servers !== false) {
                $server_list = '';
                foreach ($servers as $server) {
                    $server_details = $this->server_model->get_response_details($server->server_id, $send_time);
                    $server_list .= $this->build_public_list($server, $server_details);
                }

            } else $server_list = 'There are currently no servers attached';

            $data["server_list"] = $server_list;

            $this->load->view('public_header', $data);
            $this->load->view('public', $data);
            $this->load->view('footer', $data);
        } else redirect($this->config->item("base_url").'index.php/home/login');
    }

    public function download_script()
    {
        $setting = $this->server_model->get_settings();
        $template_path 	= 'application/config/server_status.php';
        $database_file = file_get_contents($template_path);

        $new  = str_replace("%HASH%",$setting->setting_unique,$database_file);

        header("Content-Disposition: attachment; filename=\"connector_script.php\";");
        header("content-type: application/json charset=utf-8");
        echo $new;
    }

    
    public function login()
    {
        // Redirect to your logged in landing page here
        if(logged_in()) redirect($this->config->item("base_url").'index.php/home');

        $this->load->library('form_validation');
        $this->load->helper('form');
        $data['error'] = false;
        $data['page'] = 'login';

        $this->form_validation->set_rules('user_login', 'Username', 'required');
        $this->form_validation->set_rules('user_password', 'Password', 'required');

        if ($_POST) {
            if ($this->form_validation->run()) {
                if ($this->authme->login(set_value('user_login'), set_value('user_password'))) {
                    // Redirect to your logged in landing page here
                    redirect($this->config->item("base_url").'index.php/home');
                } else {
                    $data['error'] = '<p class="error flashmessage">Your username and/or password is incorrect.</p>';
                }
            } else $data['error'] = validation_errors('<p class="error flashmessage">','</p>');
        }
        $data["hidelogin"] = true;
        $this->load->view('public_header', $data);
        $this->load->view('login', $data);
        $this->load->view('footer', $data);

    }

    public function logout()
    {
        if(!logged_in()) redirect($this->config->item("base_url").'index.php/home/login');

        // Redirect to your logged out landing page here
        $this->authme->logout($this->config->item("base_url").'index.php/home');
    }

    
    public function forgot()
    {
        // Redirect to your logged in landing page here
        if(logged_in()) redirect($this->config->item("base_url").'index.php/home');

        $this->load->library('form_validation');
        $this->load->helper('form');
        $data['success'] = false;

        $this->form_validation->set_rules('user_email', 'Email', 'required|valid_email|callback_email_exists');

        if ($this->form_validation->run()) {
            $email = $this->input->post('user_email');
            $this->load->model('Authme_model');
            $user = $this->Authme_model->get_user_by_email($email);
            $slug = md5($user->user_id . $user->user_email . date('Ymd'));

            $this->load->library('email');
            $this->email->from('noreply@'.$_SERVER["SERVER_NAME"], 'Server Monitor'); // Change these details
            $this->email->to($email);
            $this->email->subject('Reset your Password');
            $this->email->message('To reset your password please click the link below and follow the instructions:

'. site_url('home/reset/'. $user->user_id .'/'. $slug) .'

If you did not request to reset your password then please just ignore this email and no changes will occur.

Note: This reset code will expire after '. date('j M Y') .'.');
            $this->email->send();

            $data['success'] = true;
        }
        $this->load->view('public_header', $data);
        $this->load->view('forgot_password', $data);
        $this->load->view('footer', $data);
    }

    
    public function email_exists($email)
    {
        $this->load->model('Authme_model');

        if ($this->Authme_model->get_user_by_email($email)) {
            return true;
        } else {
            $this->form_validation->set_message('email_exists', 'We couldn\'t find that email address in our system.');

            return false;
        }
    }

    
    public function reset()
    {
        // Redirect to your logged in landing page here
        if(logged_in()) redirect($this->config->item("base_url").'index.php/home');

        $this->load->library('form_validation');
        $this->load->helper('form');
        $data['success'] = false;

        $user_id = $this->uri->segment(3);
        if(!$user_id) show_error('Invalid reset code.');
        $hash = $this->uri->segment(4);
        if(!$hash) show_error('Invalid reset code.');

        $this->load->model('Authme_model');
        $user = $this->Authme_model->get_user($user_id);
        if(!$user) show_error('Invalid reset code.');
        $slug = md5($user->user_id . $user->user_email . date('Ymd'));
        if($hash != $slug) show_error('Invalid reset code.');

        $this->form_validation->set_rules('user_password', 'Password', 'required|min_length['. $this->config->item('authme_password_min_length') .']');
        $this->form_validation->set_rules('password_conf', 'Confirm Password', 'required|matches[user_password]');
        if ($this->form_validation->run()) {
            $this->authme->reset_password($user->user_id, $this->input->post('user_password'));
            $data['success'] = true;
        } else $data['message'] = validation_errors('<p class="error flashmessage">', '</p>');
        $this->load->view('public_header', $data);
        $this->load->view('reset_password', $data);
        $this->load->view('footer', $data);

    }

    public function build_public_list($server, $server_details=false)
    {
        $onlineclass = "offline";
        if ($server_details !== false) {
            switch ($server_details->res_http_code) {
                case "200": $online = "Online"; $onlineclass = "online"; break;
                case "401": $online = "Replace connector script"; break;
            }
        }
        $online = ($server_details !== false) ? ($server_details->res_http_code == "200") ? "Online" : "Offline" : "unknown";
        $online = ($server_details !== false) ? ($server_details->res_http_code == "401") ? "Replace connector script" : $online : "unknown";
        $load = ($server_details !== false) ? $server_details->res_load : "unknown";
        $response_time = ($server_details !== false) ? $server_details->res_ping_time."ms" : "unknown";
        $model = ($server_details !== false) ? $server_details->res_model : "unknown";
        $processes = ($server_details !== false) ? $server_details->res_processes : "unknown";
        $memory = ($server_details !== false) ? $server_details->res_memory : "unknown";
        $uptime = ($server_details !== false) ? ' - '.$server_details->res_uptime : "unknown";
        $s = '';
        if (isset($server_details->res_services) && !empty($server_details->res_services)) {
            $all_services = unserialize(base64_decode($server_details->res_services));
            foreach ($all_services as $sname => $service) {
                $mark = (strtolower($service) === "online") ? '<i class="icon-checkmark-circle greentext"></i>' : '<i class="icon-cancel-circle redtext"></i>';
                $s .= '<div class="row"><h3>'.$sname.'</h3><div class="row-details">'.$mark.$service.'</span></div></div>';
            }
        }
        $onlinemark = (strtolower($online) === "online") ? '<i class="icon-checkmark-circle greentext"></i>' : '<i class="icon-cancel-circle redtext"></i>';
        $server_desc = (isset($server->server_desc) && !empty($server->server_desc)) ? '<div class="row"><div class="server-desc">'.$server->server_desc.'</div></div>' : '';
        $edit_button = (logged_in()) ? '<a style="float:right;" class="button redbutton2" href="'.$this->config->item("base_url").'index.php/servers/view_server/'.$server->server_id.'/">Edit</a>' : '';
        $expand_button = '<a style="float:left; margin: 2px 7px;" class="expand point-down" href="#"><i class="icon-arrow-down3"></i></a>';
        //if(strtolower($online) !== "online") $response_time = '';
        return '<div id="box" class="box '.$onlineclass.'">
                <div class="reload-box">
                <div class="label">'.$expand_button.$server->server_name.$edit_button.'</div>

                <div class="inner-box">
                    '.$server_desc.'
                    <div class="row"><h3>Server</h3><div class="row-details">'.$onlinemark.$online.$uptime.'</div></div>
                    <div class="row additional"><h3>IP Address</h3><div class="row-details">'.long2ip($server->server_ip).'</div></div>
                    <div class="row"><h3>Load</h3><div class="row-details">'.$load.'</div></div>
                    <div class="row additional"><h3>Response</h3><div class="row-details">'.$response_time.'</div></div>
                    <div class="row additional"><h3>Model</h3><div class="row-details">'.$model.'</div></div>
                    
                    <div class="row additional"><h3>Processes</h3><div class="row-details">'.$processes.'</div></div>
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
            <div class="table-box">
                <div class="col col1"><div class="disk-ref"><i class="icon-globe server-icon"></i> '.$server->server_name.'</div></div>
                <div class="col col2">'.long2ip($server->server_ip).'</div>
                <div class="col col3">'.$onlinemark.$online.'</div>
                <div class="col col4">'.$load.'</div>
                <div class="col col5">'.$response_time.'</div>
                <div class="col col6"><a href="'.$this->config->item("base_url").'index.php/servers/view_server/'.$server->server_id.'/" class="button redbutton2">View details</a></div>
                <div style="clear:both;"></div>
            </div>';

    }

}
