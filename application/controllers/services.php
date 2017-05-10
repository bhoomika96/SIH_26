<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class services extends CI_Controller
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
        if (isset($_POST) && !empty($_POST)) {
            if (isset($_POST["action"]) && !empty($_POST["action"])) {
                switch ($_POST["action"]) {
                    case "add_service":
                        $this->services_model->add_service();
                        redirect($this->config->item("base_url")."index.php/services/");
                        break;
                }
            }
        }

        $service_details = $this->build_service_list();

        $data["service_details"] = $service_details;

        $this->load->view('header', $data);
        $this->load->view('services', $data);
        $this->load->view('footer', $data);
    }

    public function delete_service($id)
    {
        $this->services_model->delete_service($id);
        redirect($this->config->item("base_url")."index.php/services/");
    }

    public function build_service_list()
    {
        $service_list = $this->services_model->get_all_services();
        $s = '';
        if (isset($service_list) && !empty($service_list)) {
            foreach ($service_list as $service) {
                $checkval = '';
                $defval = $service->service_default_port;
                $asev = (isset($all_services["services"]) && !empty($all_services["services"])) ? $all_services["services"] : array();
                $s .= '<div class="row"><h3>'.$service->service_name.'</h3><div class="row-details"><input type="text" class="text" name="lnk_service_port['.$service->service_id.']" value="'.$defval.'" /></div><div class="row-details textright"><a class="button redbutton2" href="'.$this->config->item("base_url").'index.php/services/delete_service/'.$service->service_id.'/">Delete</a></div></div>';
            }
        }

        return '<div id="service" class="box services"><form method="post" class="row-fluid" action="'.$_SERVER["PHP_SELF"].'">
                <div class="reload-box">
                <div class="label">Current Services</div>

                <div class="inner-box">
                    '.$s.'
                    <div class="butrow textcenter"><input type="submit" class="button redbutton2 largebutton" value="Save" /></div>
                </div>
                </div>
            </form></div>';
    }

}
