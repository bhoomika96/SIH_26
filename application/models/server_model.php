<?php


class server_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

   
    public function get_all_servers()
    {
        $query = $this->db->query("SELECT * FROM servers WHERE server_active = '1'");
        if ($query->num_rows() > 0) {
           return $query->result();
        } else return false;
    }

   
    public function get_server($server_id)
    {
        $query = $this->db->query("SELECT * FROM servers WHERE server_id = '".$server_id."'");
        if ($query->num_rows() > 0) {
           return $query->row();
        } else return false;
    }

    
    public function get_all_users($active=true)
    {
        $get_active = ($active===true) ? " WHERE user_active = '1'" : "";
        $query = $this->db->query("SELECT * FROM users".$get_active);
        if ($query->num_rows() > 0) {
           return $query->result();
        } else return false;
    }

    
    public function get_response_details($server, $time)
    {
        if($time === false) return false;
        $query = $this->db->query("SELECT * FROM server_responses WHERE res_server_id = '".$server."' AND res_time = '".$time."'");
        if ($query->num_rows() > 0) {
           return $query->row();
        } else return false;
    }

    
    public function notify_check_details($server)
    {
        $query = $this->db->query("SELECT * FROM server_responses WHERE res_server_id = '".$server."' ORDER BY res_time DESC LIMIT 2");
        if ($query->num_rows() > 0) {
           return $query->result();
        } else return false;
    }

    
    public function get_settings()
    {
        $query = $this->db->query("SELECT * FROM settings WHERE setting_id = '1'");
        if ($query->num_rows() > 0) {
           return $query->row();
        } else return false;
    }

    
    public function unset_first_install()
    {
        $data["setting_first_install"] = "1";
        $this->db->where('setting_id', "1");
        $this->db->update('settings', $data);
    }

    public function save_settings()
    {
        $data = array(
            "setting_display_public" => $this->input->post("setting_display_public"),
            "setting_high_load" => $this->input->post("setting_high_load"),
            "setting_high_load_win" => $this->input->post("setting_high_load_win"),
            "setting_email_notification" => $this->input->post("setting_email_notification")
            );
        $this->db->where('setting_id', "1");
        $this->db->update('settings', $data);
    }

    
    public function save_description($server_id)
    {
        $data = array(
            "server_desc" => $this->input->post("server_desc")
        );
        $this->db->where('server_id', $server_id);
        $this->db->update('servers', $data);
    }

    
    public function add_server($json, $server_script_address)
    {
        $details = json_decode($json);
        $data["server_name"] = $details->hostname;
        $data["server_ip"] = $details->ip;
        $data["server_added"] = date("Y-m-d H:i:s");
        $data["server_script_address"] = $server_script_address;
        //check first
        $query = $this->db->query("SELECT * FROM servers WHERE server_ip = '".$details->ip."'");
        if ($query->num_rows() > 0) {
            $server = $query->row();

            return '<p class="error">Error: A server with this IP address already exists, to view this server <a href="'.$this->config->item("base_url").'index.php/servers/view_server/'.$server->server_id.'/">click here</a></p>';
        } else {
            if ($this->db->insert('servers', $data)) {
                //die($this->db->last_query());
                $last_id = $this->db->insert_id();

                return '<p class="success">The server was successfully registered, <a href="'.$this->config->item("base_url").'index.php/servers/view_server/'.$last_id.'/">click here</a> to view/configure it or add another server below</p>';
            } else {
                return '<p class="error">Error: There was a problem adding the server to the database - '.$this->db->_error_message().'</p>';
            }

        }
    }

   
    public function delete_server($server_id)
    {
        $this->db->where('lnk_server_id', $server_id);
        $this->db->delete('servers_services');
        $this->db->where('server_id', $server_id);
        $this->db->delete('servers');
        $this->db->where('res_server_id', $server_id);
        $this->db->delete('server_responses');
    }

   

    public function view_public()
    {
        $query = $this->db->query("SELECT setting_display_public FROM settings WHERE setting_id = '1'");
        if ($query->num_rows() > 0) {
            $data = $query->row();

            return $data->setting_display_public;
        } else return 0;
    }
}
