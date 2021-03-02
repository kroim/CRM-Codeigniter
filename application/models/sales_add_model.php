<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class sales_add_model extends CI_Model{

    public function add_new($sales){
        $this->db->insert('property_tb', $sales);
        $this->db->insert_id();
    }
    public function sales_update($sales){
        $this->db->where('PK_PPID', $sales['PK_PPID']);
        $this->db->update('property_tb', $sales);
    }
//    function check_user($sales)
//    {
//        $first_name = $sales['staff_firstname'];// get fiest name
//        $last_name = $sales['staff_lastname'];// get last name
//        var_dump($first_name, $last_name);
//        $this->db->select('PK_staffID');
//        $this->db->from('staff_tb');
//        $this->db->where('staff_firstname', $first_name);
//        $this->db->where('staff_lastname', $last_name);
//        $query = $this->db->get();
//        $num = $query->num_rows();
//        if ($num > 0) {
//            return TRUE;
//        } else {
//            return FALSE;
//        }
//    }
    function check_id($sales)
    {
        $id = $sales['PK_PPID'];// get PK_clientID
        $this->db->select('PK_PPID');
        $this->db->from('property_tb');
        $this->db->where('PK_PPID', $id);
        $query = $this->db->get();
        $num = $query->num_rows();
        if ($num > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}