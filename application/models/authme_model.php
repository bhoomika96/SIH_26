<?php

class Authme_Model extends CI_Model
{

    public $users_table;

    public function __construct()
    {
        parent::__construct();

        $this->load->database();
        $this->config->load('authme');
        $this->users_table = "users";

    }

    public function get_user($user_id)
    {
        $query = $this->db->get_where($this->users_table, array('user_id' => $user_id));
        if($query->num_rows()) return $query->row();

        return false;
    }

    public function get_user_by_email($email)
    {
        $query = $this->db->get_where($this->users_table, array('user_email' => $email));
        if($query->num_rows()) return $query->row();

        return false;
    }

    public function get_user_by_login($username)
    {
        $query = $this->db->get_where($this->users_table, array('user_login' => $username));
        if($query->num_rows()) return $query->row();

        return false;
    }

    public function get_users($order_by = 'user_id', $order = 'asc', $limit = 0, $offset = 0)
    {
        $this->db->order_by($order_by, $order);
        if($limit) $this->db->limit($limit, $offset);
        $query = $this->db->get($this->users_table);

        return $query->result();
    }

    public function get_user_count()
    {
        return $this->db->count_all($this->users_table);
    }

    public function create_user($username, $password)
    {
        $data = array(
            'user_active' => "1",
            'user_master' => "0",
            'user_login' => $username,
            'user_password' => $password, // Should be hashed
            'user_added' => date('Y-m-d H:i:s')
        );

        if($this->input->post('user_email') !== '') $data['user_email'] = filter_var($this->input->post('user_email'), FILTER_SANITIZE_EMAIL);
        if($this->input->post('user_name') !== '') $data['user_name'] = $this->input->post('user_name');

        $this->db->insert($this->users_table, $data);

        return $this->db->insert_id();
    }

    public function save_user($user_id)
    {
        $password = $this->input->post('user_password');
        //die($password);
        $data = array(
            'user_name' => $this->input->post('user_name', true),
            'user_email' => $this->input->post('user_email', true),
            'user_login' => $this->input->post('user_login', true)
            );
        if($this->input->post('user_active') !== '') $data['user_active'] = $this->input->post('user_active');

        $this->db->where('user_id', $user_id);
        $this->db->update('users', $data);

        if (!empty($password)) {
            $this->authme->reset_password($user_id, $password);
        }
    }

    public function email_details($email, $username, $password)
    {

        $this->load->model('Authme_model');
        $this->load->library('email');
        $this->email->from('noreply@'.$_SERVER["SERVER_NAME"], 'Server Monitor'); // Change these details
        $this->email->to($email);
        $this->email->subject('Your login details for the SIH26 monitor at '.$_SERVER["SERVER_NAME"]);
        $this->email->message('Please find attached your login details for the Computer monitor at '.$_SERVER["SERVER_NAME"].'

username: '. $username.'
password: '. $password.'

Please store these details somewhere safe.');
        $this->email->send();
    }

    public function create_master($username, $password, $name, $email)
    {
        $data = array(
            'user_id' => "1",
            'user_active' => "1",
            'user_master' => "1",
            'user_login' => $username,
            'user_name' => $name,
            'user_email' => $email,
            'user_password' => $password, // Should be hashed
            'user_added' => date('Y-m-d H:i:s')
        );
        $this->db->insert($this->users_table, $data);
    }

    public function refreshUser()
    {
        //$this->load->library('session');
        $user = $this->get_user(user('user_id'));
        $this->session->set_userdata('user', $user);
    }

    public function update_user($user_id, $data)
    {
        $this->db->where('user_id', $user_id);
        $this->db->update($this->users_table, $data);
    }

    public function delete_user($user_id)
    {
        $this->db->delete($this->users_table, array('user_id' => $user_id));
    }
}
