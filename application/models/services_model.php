<?php


class services_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    
    public function get_all_services()
    {
        $query = $this->db->query("SELECT * FROM services WHERE service_active = '1'");
        if ($query->num_rows() > 0) {
            $result = $query->result();

            return $result;
        } else return false;
    }

    
    public function set_services($server_id)
    {
        $this->empty_services($server_id);
        $this->add_services($server_id);
        $this->session->set_flashdata('message', 'Services updated');
    }

    private function empty_services($server_id)
    {
        $this->db->where('lnk_server_id', $server_id);
        $this->db->delete('servers_services');
    }

    
    private function add_services($server_id)
    {
        $active = $this->input->post('active');
        $service = $this->input->post('lnk_service_port');
        foreach ($active as $a => $v) {
            $data[] = array("lnk_server_id" => $server_id, "lnk_service_id" => $a, "lnk_service_port" => $service[$a]);
        }
        //die(print_r($data));
        $this->db->insert_batch('servers_services', $data);
    }
    public function remove_server_service($server_id, $service_id)
    {
        $data = array("lnk_server_id" => $server_id, "lnk_service_id" => $service_id);
        $this->db->where($data);
        $this->db->delete('servers_services');
    }

    public function get_services($server_id)
    {
        $query = $this->db->query("SELECT * FROM servers_services LEFT JOIN services ON lnk_service_id = service_id WHERE lnk_server_id = '".$server_id."' AND service_active = '1'");
        if ($query->num_rows() > 0) {
            $result = $query->result();
            foreach ($result as $res) {
                $array["services"][$res->service_name] = $res->lnk_service_port;
            }

            return $array;
        } else return false;
    }

    public function add_service()
    {
        $data = array("service_name" => $this->input->post("service_name"), "service_default_port" => $this->input->post("service_default_port"), "service_active" => "1");
        $this->db->insert('services', $data);
    }
    public function delete_service($id)
    {
        $this->db->where('service_id',  $id);
        $this->db->delete('services');
    }

}
