<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class sales_model extends CI_Model
{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }

    //get the username & password from Login_tb
    function get_property()
    {
        $this->db->select('*');

        $this->db->from('property_tb');

        $query = $this->db->get();

        return $query->result();
    }
    function get_sales($id){
        $this->db->from('property_tb');
        $this->db->where('PK_PPID', $id);
        $query = $this->db->get();
        return $query->result();
    }
    function get_department($id){
        $this->db->from('department_tb');
        $this->db->where('PK_deptID', $id);
        $query = $this->db->get();
        return $query->result();
    }
    function get_project($id){
        $this->db->from('project_tb');
        $this->db->where('PK_SPID', $id);
        $query = $this->db->get();
        return $query->result();
    }
    function get_projectdeveloper($id){
        $this->db->from('projectdeveloper_tb');
        $this->db->where('PK_PDID', $id);
        $query = $this->db->get();
        return $query->result();
    }
    function sales_delete($id){
        $this->db->where('PK_PPID', $id);
        $this->db->delete('property_tb');
    }

    function sales_export($ids){
        $this->db->from('property_tb');
        $jquery = "SELECT * FROM property_tb WHERE  PK_PPID = '" . $ids[0] . "'";
        for($i = 1; $i < sizeof($ids); $i++){
            $jquery .= " OR PK_PPID = '" . $ids[$i] . "'";
        }
        $export = $this->db->query($jquery);
        return $export;
    }
    // get property from clientID in property_tb and the field is deleted
    function deleteproperty_from_clientID($id){
        $this->db->select('PK_PPID');
        $this->db->from('property_tb');
        $this->db->where('FK_clientID', $id);
        $query = $this->db->get();
        $num = $query->num_rows();
        if ($num > 0) {
            $this->db->where('FK_clientID', $id);
            $this->db->delete('property_tb');
        }
    }
    // delete property from staffID
    function deleteproperty_from_staffID($id){
        $this->db->select('PK_PPID');
        $this->db->from('property_tb');
        $this->db->where('FK_staffID', $id);
        $query = $this->db->get();
        $num = $query->num_rows();
        if ($num > 0) {
            $this->db->where('FK_staffID', $id);
            $this->db->delete('property_tb');
        }
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