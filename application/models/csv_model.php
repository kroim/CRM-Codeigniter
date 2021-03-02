<?php
class csv_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->helper('html');
        $this->load->database();
        $this->load->library('form_validation');
        $this->load->helper(array('form', 'url'));
        $this->load->model('clients_model');
        $this->load->model('add_clients_model');
        $this->load->model('staff_model');
    }
    function uploadData()
    {
        $count=0;
        $fp = fopen($_FILES['userfile']['tmp_name'],'r') or die("can't open file");
        while($csv_line = fgetcsv($fp,1024))
        {
            $count++;
            if($count == 1)
            {
                continue;
            }//keep this if condition if you want to remove the first row
            for($i = 0, $j = count($csv_line); $i < $j; $i++)
            {
                $insert_csv = array();
                $insert_csv['PK_clientID'] = $csv_line[0];
                $insert_csv['client_title'] = $csv_line[1];
                $insert_csv['client_firstname'] = $csv_line[2];
                $insert_csv['client_lastname'] = $csv_line[3];
                $insert_csv['client_phone'] = $csv_line[4];
                $insert_csv['client_email'] = $csv_line[5];
                $insert_csv['client_wechat'] = $csv_line[6];
                $insert_csv['client_address'] = $csv_line[7];
                $insert_csv['client_NoOfPurchased'] = $csv_line[8];
                $insert_csv['client_firb'] = $csv_line[9];
                $insert_csv['client_Subscriptions'] = $csv_line[10];
                $insert_csv['client_comments'] = $csv_line[11];
                $insert_csv['FK_saleID'] = $csv_line[12];

            }
            $data = array(
                'PK_clientID' => $insert_csv['PK_clientID'] +0,
                'client_title' => $insert_csv['client_title'],
                'client_firstname' => $insert_csv['client_firstname'],
                'client_lastname' => $insert_csv['client_lastname'],
                'client_phone' => $insert_csv['client_phone'],
                'client_email' => $insert_csv['client_email'],
                'client_wechat' => $insert_csv['client_wechat'],
                'client_address' => $insert_csv['client_address'],
                'client_NoOfPurchased' => $insert_csv['client_NoOfPurchased'],
                'client_firb' => $insert_csv['client_firb'],
                'client_Subscriptions' => $insert_csv['client_Subscriptions'],
                'client_comments' => $insert_csv['client_comments'],
                'FK_saleID' => $insert_csv['FK_saleID']);

            if($this->add_clients_model->check_id($data) == TRUE){
                $this->db->where('PK_clientID', $data['PK_clientID']);
                $data['crane_features']=$this->db->update('client_tb', $data);
            }else if($this->add_clients_model->check_user($data) == FALSE){
                $data['crane_features']=$this->db->insert('client_tb', $data);
            }
        }
        fclose($fp) or die("can't close file");
        $data['success']="success";
        return $data;
    }
    function staffUploadData()
    {
        $count=0;
        $fp = fopen($_FILES['userfile']['tmp_name'],'r') or die("can't open file");
        while($csv_line = fgetcsv($fp,1024))
        {
            $count++;
            if($count == 1)
            {
                continue;
            }//keep this if condition if you want to remove the first row
            for($i = 0, $j = count($csv_line); $i < $j; $i++)
            {
                $insert_csv = array();
                $insert_csv['PK_staffID'] = $csv_line[0];
                $insert_csv['staff_firstname'] = $csv_line[1];
                $insert_csv['staff_lastname'] = $csv_line[2];
                $insert_csv['staff_phone'] = $csv_line[3];
                $insert_csv['staff_email'] = $csv_line[4];
                $insert_csv['staff_wechat'] = $csv_line[5];
                $insert_csv['staff_employment_status'] = $csv_line[6];
                $insert_csv['staff_jobtitle'] = $csv_line[7];
                $insert_csv['staff_messagetoclient'] = $csv_line[8];
                $insert_csv['staff_comments'] = $csv_line[9];
                $insert_csv['FK_department'] = $csv_line[10];

            }
            $data = array(
                'PK_staffID' => $insert_csv['PK_staffID'] +0,
                'staff_firstname' => $insert_csv['staff_firstname'],
                'staff_lastname' => $insert_csv['staff_lastname'],
                'staff_phone' => $insert_csv['staff_phone'],
                'staff_email' => $insert_csv['staff_email'],
                'staff_wechat' => $insert_csv['staff_wechat'],
                'staff_employment_status' => $insert_csv['staff_employment_status'],
                'staff_jobtitle' => $insert_csv['staff_jobtitle'],
                'staff_messagetoclient' => $insert_csv['staff_messagetoclient'],
                'staff_comments' => $insert_csv['staff_comments'],
                'FK_department' => $insert_csv['FK_department']);

            if($this->staff_add_model->check_id($data) == TRUE){
                $this->db->where('PK_staffID', $data['PK_staffID']);
                $data['crane_features']=$this->db->update('staff_tb', $data);
            }else if($this->staff_add_model->check_user($data) == FALSE){
                $data['crane_features']=$this->db->insert('staff_tb', $data);
            }
        }
        fclose($fp) or die("can't close file");
        $data['success']="success";
        return $data;
    }
    function salesUploadData()
    {
        $count=0;
        $fp = fopen($_FILES['userfile']['tmp_name'],'r') or die("can't open file");
        while($csv_line = fgetcsv($fp,1024))
        {
            $count++;
            if($count == 1)
            {
                continue;
            }//keep this if condition if you want to remove the first row
            for($i = 0, $j = count($csv_line); $i < $j; $i++)
            {
                $insert_csv = array();
                $insert_csv['PK_PPID'] = $csv_line[0];
                $insert_csv['PP_lotnumber'] = $csv_line[1];
                $insert_csv['PP_apptnumber'] = $csv_line[2];
                $insert_csv['PP_price'] = $csv_line[3];
                $insert_csv['FK_staffID'] = $csv_line[4];
                $insert_csv['FK_clientID'] = $csv_line[5];
                $insert_csv['PP_comments'] = $csv_line[6];
                $insert_csv['FK_SPID'] = $csv_line[7];
            }
            $data = array(
                'PK_PPID' => $insert_csv['PK_PPID'] +0,
                'PP_lotnumber' => $insert_csv['PP_lotnumber'],
                'PP_apptnumber' => $insert_csv['PP_apptnumber'],
                'PP_price' => $insert_csv['PP_price'],
                'FK_staffID' => $insert_csv['FK_staffID'],
                'FK_clientID' => $insert_csv['FK_clientID'],
                'PP_comments' => $insert_csv['PP_comments'],
                'FK_SPID' => $insert_csv['FK_SPID']);

            if($this->sales_add_model->check_id($data) == TRUE){

                $this->db->where('PK_PPID', $data['PK_PPID']);
                $data['crane_features']=$this->db->update('property_tb', $data);
            }else if($this->sales_add_model->check_id($data) == FALSE){
                $data['crane_features']=$this->db->insert('property_tb', $data);
            }
        }
        fclose($fp) or die("can't close file");
        $data['success']="success";
        return $data;
    }
}
?>