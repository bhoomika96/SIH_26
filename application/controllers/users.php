<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class users extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model("server_model");
        $this->load->library("authme");
        $this->load->model("authme_model");
        $this->load->library('gravatar');
        if( $this->session->userdata('logged_in') !== true) redirect($this->config->item("base_url")."index.php/home/login");
    }

    public function index()
    {
        $data = array();
        //print_r($var);
        $all_users = $this->authme_model->get_users();
        $data["user_count"] = $this->authme_model->get_user_count();
        $display_all_users = '';
        foreach ($all_users as $user) {
            $display_all_users .= $this->build_user_line($user);
        }
        $data["all_users"] = $display_all_users;

        $this->load->view('header', $data);
        $this->load->view('users', $data);
        $this->load->view('footer', $data);
    }
    public function add_user()
    {
        $data = array();
        if (!empty($_POST)) {
            $this->authme->signup($_POST["user_login"], $_POST["user_password"]);
            $this->session->set_flashdata('message', '<p class="success flashmessage">User successfully created</p>');
            redirect($this->config->item("base_url").'index.php/users/');

        }
        $data["edittype"] = "Add";
        $this->load->view('header', $data);
        $this->load->view('edit_user', $data);
        $this->load->view('footer', $data);
    }

    public function edit_user($user_id)
    {
        $data = array();
        $user = $this->authme_model->get_user($user_id);
        if ($user_id === user("user_id") || user("user_master") === "1") {
            if (!empty($_POST)) {
                $this->authme_model->save_user($user_id);
                $this->session->set_flashdata('message', '<p class="success flashmessage">User successfully updated</p>');
                redirect($this->config->item("base_url").'index.php/users/');
            } else {
                foreach ($user as $name => $value) {
                    $_POST[$name] = $value;
                }
            }
            $data["edittype"] = "Edit";
            $data["user_id"] = $user_id;
            $this->load->view('header', $data);
            $this->load->view('edit_user', $data);
            $this->load->view('footer', $data);
        } else {
            $this->session->set_flashdata('message', '<p class="error">You do not have permission to edit that user</p>');
            redirect($this->config->item("base_url").'index.php/users/');
        }
    }

    public function delete_user($user_id)
    {
        if ($user_id !== "1") { // don't delete master user
            $this->authme_model->delete_user($user_id);
            $this->session->set_flashdata('message', '<p class="success flashmessage">User deleted</p>');
            redirect($this->config->item("base_url").'index.php/users/');
        }
    }

    public function build_user_line($user)
    {
        $lastlogin = ($user->last_login === "0000-00-00 00:00:00") ? "Never" : time_ago($user->last_login)." ago";

        return '
            <div class="table-box user-box">
                <div class="col col1"><div class="disk-ref"><img class="user-gravatar" src="'.$this->gravatar->get_gravatar($user->user_email, NULL, 34).'" alt="'.$user->user_name.'" /> '.$user->user_name.'</div><div class="disk-name">'.$user->user_email.'</div></div>
                <div class="col col2">Last login: <span class="lightertext small">'.$lastlogin.'</span></div>
                <div class="col col3"><a class="button redbutton2" href="'.$this->config->item("base_url").'index.php/users/edit_user/'.$user->user_id.'/">Edit user</a></div>
                <div style="clear:both;"></div>
            </div>';

    }

}

