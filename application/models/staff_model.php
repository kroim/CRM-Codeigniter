<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class staff_model extends CI_Model
{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }

    //get the username & password from Login_tb
    function get_staffs()
    {
        $this->db->select('*');

        $this->db->from('staff_tb');

        $query = $this->db->get();

        return $query->result();
    }
    function get_staff($id){
        $this->db->from('staff_tb');
        $this->db->where('PK_staffID', $id);
        $query = $this->db->get();
        return $query->result();
    }
    function get_dept($id){
        $this->db->from('department_tb');
        $this->db->where('PK_deptID', $id);
        $query = $this->db->get();
        return $query->result();
    }

    function staff_delete($id){
        $this->db->where('PK_staffID', $id +0);
        $this->db->delete('staff_tb');
    }

    function staff_export($ids){
        $this->db->from('staff_tb');
        $jquery = "SELECT * FROM staff_tb WHERE PK_staffID = '" . $ids[0] . "'";
        for($i = 1; $i < sizeof($ids); $i++){
            $jquery .= " OR PK_staffID = '" . $ids[$i] . "'";
        }
        $export = $this->db->query($jquery);
        return $export;
    }
    function set_font($font){
        $this->db->where('key', 'fontsize');
        $this->db->update('setting', array('value' => $font));
    }
    function get_font(){
        $this->db->select('*');
        $this->db->where('key', 'fontsize');
        $this->db->from('setting');

        $query = $this->db->get()->result();

        $string = 8;
        foreach ($query as $row)
        {
            $string = $row->value;
        }
        return $string;

    }

}?>