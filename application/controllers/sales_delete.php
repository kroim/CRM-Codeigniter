<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 4/8/2017
 * Time: 10:04 PM
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class sales_delete extends CI_Controller
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
        $this->load->model('clients_model');
        $this->load->model('staff_model');
        $this->load->model('sales_model');
    }
    public function index(){
        if(isset($_POST['checkid'])){
            if(isset($_POST['delete_submit'])){
                foreach($_POST['checkid'] as $id){
                    $this->sales_model->sales_delete($id);
                }
            }
            if(isset($_POST['export_submit'])){

                $this->load->dbutil();
                $this->load->helper('file');
                $this->load->helper('download');
                $delimiter = ",";
                $newline = "\r\n";
                $filename = "sales.csv";
                $ids = array();
                foreach($_POST['checkid'] as $id){
                    array_push($ids, $id);
                }

                $result = $this->sales_model->sales_export($ids);
                $data = $this->dbutil->csv_from_result($result, $delimiter, $newline);
                force_download($filename, $data);
            }

        }
        $data = array('title' => 'Sales');
        $this->load->view('header', $data);


        $property = $this->sales_model->get_property();
        $department = array();
        $project = array();
        $projectdeveloper = array();
        $clients = array();
        $staffs = array();
        for($i = 0; $i < sizeof($property); $i++){
            $clients[$i] = $this->clients_model->get_client($property[$i]->FK_clientID);
            $staffs[$i] = $this->staff_model->get_staff($property[$i]->FK_staffID);
            $department[$i] = $this->sales_model->get_department($staffs[$i][0]->FK_department);
            $project[$i] = $this->sales_model->get_project($property[$i]->FK_SPID);
            $projectdeveloper[$i] = $this->sales_model->get_projectdeveloper($project[$i][0]->FK_PDID);
        }
        $data1 = array('property'=>$property, 'clients'=>$clients, 'staffs'=>$staffs, 'department'=>$department, 'project'=>$project, 'projectdeveloper'=>$projectdeveloper, 'fontsize'=>$this->sales_model->get_font());

        $this->load->view('sales_view', $data1);

        $this->load->view('footer');
    }
}