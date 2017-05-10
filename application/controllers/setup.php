<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class setup extends CI_Controller
{
    protected $PasswordHash;

    public function __construct()
    {
        parent::__construct();
        if(!file_exists("install/install.sql")) header("Location: ".$this->config->item("base_url"));
    }

    public function index()
    {
        $db_config_path = 'application/config/database.php';
        $message = NULL;
        if (!empty($_POST)) {
            if ($this->validate_post($_POST) == true) {
                if(!filter_var($this->input->post('user_email'), FILTER_VALIDATE_EMAIL)) $message = $this->show_message('error','Please use a valid email address.');
                
                if ($this->write_config($_POST) == false) {
                    $message = $this->show_message('error',"The database configuration file could not be written, please chmod application/config/database.php file to 777");
                } elseif ($this->create_database($_POST) == false) {
                    $message = $this->show_message('error',"The database could not be created, please verify your settings.");
                } elseif ($this->create_tables($_POST) == false) {
                    $message = $this->show_message('error',"The database tables could not be created, please verify your settings.");
                }

                // create default user
                if (!isset($message)) {

                    $admindata["adminsetup"]["user_name"] = $_POST["user_name"];
                    $admindata["adminsetup"]["user_login"] = $_POST["user_login"];
                    $admindata["adminsetup"]["user_password"] = $_POST["user_password"];
                    $admindata["adminsetup"]["user_email"] = $_POST["user_email"];

                    $this->session->set_userdata($admindata);
                    redirect($this->config->item("base_url").'index.php/setup/post_setup/');

                }

            } else {
                $message = $this->show_message('error','Not all fields have been filled in correctly. The host, username, password, and database name are required as are all Admin settings fields.');
            }
        }
        $data["message"] = $message;
        $data["db_config_path"] = $db_config_path;
        $data["hidelogin"] = true;
        $this->load->view('public_header', $data);
        $this->load->view('setup', $data);
        $this->load->view('footer', $data);
    }

    public function post_setup()
    {
        $this->load->database();
        $this->load->model("server_model");
        $this->load->library("authme");
        $this->load->model("authme_model");
        if (!$this->db->table_exists('users')) {
            usleep(250000);
            redirect($this->config->item("base_url").'index.php/setup/post_setup/');
            exit;
        }

        $adminsetup = $this->session->userdata('adminsetup');

        $password = $this->authme->hashed_password($adminsetup["user_password"]);
        $this->authme_model->create_master($adminsetup["user_login"], $password, $adminsetup["user_name"], $adminsetup["user_email"]);

        deleteDir('install');

        $hash = sha1(uniqid());
        $data["setting_unique"] = $hash;
        $this->db->where('setting_id', "1");
        $this->db->update('settings', $data);

        $this->session->unset_userdata('adminsetup');

        redirect($this->config->item("base_url"));
    }

    private function create_database($data)
    {

        $mysqli = @new mysqli($data['hostname'],$data['username'],$data['password']);
        
        if($mysqli->connect_errno) return false;

       
        $mysqli->query("CREATE DATABASE IF NOT EXISTS ".$data['database']);

        $mysqli->close();

        return true;
    }

    
    private function create_tables($data)
    {
        // Connect to the database
        $mysqli = new mysqli($data['hostname'],$data['username'],$data['password'],$data['database']);

        
        if($mysqli->connect_errno)

            return false;

        
        $query = file_get_contents('install/install.sql');

        $mysqli->multi_query($query);

        
        $mysqli->close();

        return true;
    }


    private function validate_post($data)
    {
        

        return !empty($data['hostname']) && !empty($data['username']) && !empty($data['database']) && !empty($data['user_name']) && !empty($data['user_login']) && !empty($data['user_password']) && !empty($data['user_email']);
    }

    private function show_message($type,$message)
    {
        return $message;
    }

    private function write_config($data)
    {
        $template_path 	= 'application/config/database_temp.php';
        $output_path 	= 'application/config/database.php';

        $database_file = file_get_contents($template_path);

        $new  = str_replace("%HOSTNAME%",$data['hostname'],$database_file);
        $new  = str_replace("%USERNAME%",$data['username'],$new);
        $new  = str_replace("%PASSWORD%",$data['password'],$new);
        $new  = str_replace("%DATABASE%",$data['database'],$new);

        $handle = fopen($output_path,'w+');

        @chmod($output_path,0777);

        if (is_writable($output_path)) {

            // Write the file
            if (fwrite($handle,$new)) {
                return true;
            } else {
                return false;
            }

        } else {
            return false;
        }
    }

}

