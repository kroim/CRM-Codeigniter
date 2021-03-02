<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class clients_model extends CI_Model
{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
        $this->load->model('sales_model');
    }

    //get the username & password from Login_tb
    function get_clients()
    {
        $this->db->select('*');

        $this->db->from('client_tb');

        $query = $this->db->get();

        return $query->result();
    }
    function get_client($id){
        $this->db->from('client_tb');
        $this->db->where('PK_clientID', $id);
        $query = $this->db->get();
        return $query->result();
    }
    function delete_clients($id){
        $this->db->where('PK_clientID', $id +0);
        $this->db->delete('client_tb');
    }

    function export_clients($ids){
        $this->db->from('client_tb');
        $jquery = "SELECT * FROM client_tb WHERE PK_clientID = '" . $ids[0] . "'";
        for($i = 1; $i < sizeof($ids); $i++){
            $jquery .= " OR PK_clientID = '" . $ids[$i] . "'";
        }
        $export = $this->db->query($jquery);
        return $export;
    }

    function property($id){
        $this->db->from('property_tb');
        $this->db->where('FK_clientID', $id);
        $query = $this->db->get();
        return $query->result();
    }
    // delete clients from staffID
    function deleteclients_from_staffID($id){
        $this->db->select('PK_clientID');
        $this->db->from('client_tb');
        $this->db->where('FK_saleID', $id);
        $query = $this->db->get();
        $num = $query->num_rows();
        if ($num > 0) {
            $clients_pre = $query->result();
            for($i = 0; $i < $num; $i++){
                $this->sales_model->deleteproperty_from_clientID($clients_pre[$i]->PK_clientID);
            }
            $this->db->where('FK_saleID', $id);
            $this->db->delete('client_tb');
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