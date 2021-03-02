<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class add_clients_model extends CI_Model{

    public function add_new($client){
        $this->db->insert('client_tb', $client);
        $this->db->insert_id();
    }
    public function update_client($client){
        $this->db->where('PK_clientID', $client['PK_clientID']);
        $this->db->update('client_tb', $client);
        //$this->db->insert_id();
    }
    function check_user($client)
    {
        $first_name = $client['client_firstname'];// get fiest name
        $last_name = $client['client_lastname'];// get last name
        var_dump($first_name, $last_name);
        $this->db->select('PK_clientID');
        $this->db->from('client_tb');
        $this->db->where('client_firstname', $first_name);
        $this->db->where('client_lastname', $last_name);
        $query = $this->db->get();
        $num = $query->num_rows();
        if ($num > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    function check_id($client)
    {
        $id = $client['PK_clientID'];// get PK_clientID
        $this->db->select('PK_clientID');
        $this->db->from('client_tb');
        $this->db->where('PK_clientID', $id);
        $query = $this->db->get();
        $num = $query->num_rows();
        if ($num > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}