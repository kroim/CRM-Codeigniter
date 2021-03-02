<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class staff_add_model extends CI_Model{

    public function add_new($staff){
        $this->db->insert('staff_tb', $staff);
        $this->db->insert_id();
    }
    public function staff_update($staff){
        $this->db->where('PK_staffID', $staff['PK_staffID']);
        $this->db->update('staff_tb', $staff);
    }
    function check_user($staff)
    {
        $first_name = $staff['staff_firstname'];// get fiest name
        $last_name = $staff['staff_lastname'];// get last name
        $this->db->select('PK_staffID');
        $this->db->from('staff_tb');
        $this->db->where('staff_firstname', $first_name);
        $this->db->where('staff_lastname', $last_name);
        $query = $this->db->get();
        $num = $query->num_rows();
        if ($num > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    function check_id($staff)
    {
        $id = $staff['PK_staffID'];// get PK_clientID
        $this->db->select('PK_staffID');
        $this->db->from('staff_tb');
        $this->db->where('PK_staffID', $id);
        $query = $this->db->get();
        $num = $query->num_rows();
        if ($num > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}