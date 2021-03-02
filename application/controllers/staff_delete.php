<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 4/8/2017
 * Time: 10:04 PM
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class staff_delete extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->helper('html');
        $this->load->database();
        $this->load->library('form_validation');
        $this->load->model('staff_model');
        $this->load->model('clients_model');
        $this->load->model('sales_model');
    }
    public function index(){
        if(isset($_POST['checkid'])){
            if(isset($_POST['delete_submit'])){
                foreach($_POST['checkid'] as $id){
                    $this->clients_model->deleteclients_from_staffID($id);
                    $this->sales_model->deleteproperty_from_staffID($id);
                    $this->staff_model->staff_delete($id);
                }
            }
            if(isset($_POST['export_submit'])){
                $this->load->dbutil();
                $this->load->helper('file');
                $this->load->helper('download');
                $delimiter = ",";
                $newline = "\r\n";
                $filename = "staffs.csv";
                $ids = array();
                foreach($_POST['checkid'] as $id){
                    array_push($ids, $id);
                }
                $result = $this->staff_model->staff_export($ids);
                $data = $this->dbutil->csv_from_result($result, $delimiter, $newline);
                force_download($filename, $data);
            }

        }
        $data = array('title' => 'Staffs');
        $this->load->view('header', $data);
        $dept = array();
        $staff = $this->staff_model->get_staffs();
        for($i=0; $i<sizeof($staff);$i++){
            $dept[$i] = $this->staff_model->get_dept($staff[$i]->FK_department);
        }
        $data1 = array('staff' => $staff, 'dept' => $dept, 'fontsize'=>$this->staff_model->get_font());
        $this->load->view('staff_view', $data1);
        $this->load->view('footer');
    }
}