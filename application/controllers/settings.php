<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class settings extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library("authme");
        $this->load->model("server_model");
        if( $this->session->userdata('logged_in') !== true) redirect($this->config->item("base_url").'index.php/home');
    }

    public function index()
    {
        $data = array();
        $settings = $this->server_model->get_settings();

        if (!empty($_POST)) {
            $this->server_model->save_settings();
            $settings = $this->server_model->get_settings();
            $data["message"] = '<p class="success flashmessage">Settings updated</p>';
        } else {
            foreach ($settings as $name => $value) {
                $_POST[$name] = $value;
            }
        }

        $data["setting_display_public"] = $settings->setting_display_public;
        $this->load->view('header', $data);
        $this->load->view('settings', $data);
        $this->load->view('footer', $data);
    }

}

