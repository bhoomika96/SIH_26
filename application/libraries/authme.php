<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class authme
{
    private $CI;
    protected $PasswordHash;

    public function __construct()
    {
        if (!file_exists($path = dirname(__FILE__) . '/../vendor/PasswordHash.php')) {
            show_error('The phpass class file was not found.');
        }
        $this->CI =& get_instance();

        $this->CI->load->database();
        $this->CI->load->library('session');
        $this->CI->load->model('authme_model');
        $this->CI->config->load('authme');

        include($path);
        $this->PasswordHash = new PasswordHash(8, $this->CI->config->item('authme_portable_hashes'));
    }

    public function logged_in()
    {
        return $this->CI->session->userdata('logged_in');
    }

    public function login($username, $password)
    {
        $user = $this->CI->authme_model->get_user_by_login($username);
        if ($user) {
            //die($user->user_password." --- ".$this->PasswordHash->HashPassword($password));
            if ($this->PasswordHash->CheckPassword($password, $user->user_password)) {
                unset($user->password);
                $this->CI->session->set_userdata(array(
                    'logged_in' => true,
                    'user' => $user
                ));
                $this->CI->authme_model->update_user($user->user_id, array('last_login' => date('Y-m-d H:i:s')));

                return true;
            }
        }

        return false;
    }

    public function logout($redirect = false)
    {
        $this->CI->session->sess_destroy();
        if ($redirect) {
            $this->CI->load->helper('url');
            redirect($redirect, 'refresh');
        }
    }

    public function signup($username, $password)
    {
        $this->CI->load->library('email');
        $user = $this->CI->authme_model->get_user_by_login($username);
        $email = $this->CI->input->post("user_email");
        if($user) return false;
        //$data['base_url'] = $this->CI->config->item("base_url");
        $data['user_login'] = $username;
        $data['user_password'] = $password;

        $msg = $this->CI->load->view('email/header', $data, true);
        $msg .= $this->CI->load->view('email/signup', $data, true);
        $msg .= $this->CI->load->view('email/footer', $data, true);
        //die($msg);
        $this->CI->email->from('noreply@'.$_SERVER["SERVER_NAME"], 'Server Monitor');
        $this->CI->email->to($email);
        $this->CI->email->set_mailtype("html");
        $this->CI->email->subject('Server monitor login details');
        $this->CI->email->message($msg);

        $this->CI->email->send();

        $password = $this->PasswordHash->HashPassword($password);
        $this->CI->authme_model->create_user($username, $password);

        return true;
    }

    public function reset_password($user_id, $new_password)
    {
        $new_password = $this->PasswordHash->HashPassword($new_password);
        $this->CI->authme_model->update_user($user_id, array('user_password' => $new_password));
    }
    public function hashed_password($password)
    {
        return $this->PasswordHash->HashPassword($password);
    }

}

