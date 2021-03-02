<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class messages_model extends CI_Model
{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }

    //get the username & password from Login_tb
    function get_clients()
    {
        $this->db->select('*');

        $this->db->from('client_tb');

        $query = $this->db->get();

        return $query->result();
    }
    function get_staffs()
    {
        $this->db->select('*');

        $this->db->from('staff_tb');

        $query = $this->db->get();

        return $query->result();
    }

}?>