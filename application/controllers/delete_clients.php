<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 4/8/2017
 * Time: 10:04 PM
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class delete_clients extends CI_Controller
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
        //load the login model
        $this->load->model('clients_model');
        $this->load->model('staff_model');
        $this->load->model('sales_model');
    }
    public function index(){
//        if(isset($_POST['checkid'])){
//            foreach($_POST['checkid'] as $id){
//                $this->clients_model->delete_clients($id);
//            }
//        }
        if(isset($_POST['checkid'])){
            if(isset($_POST['delete_submit'])){
                foreach($_POST['checkid'] as $id){
                    $this->sales_model->deleteproperty_from_clientID($id);
                    $this->clients_model->delete_clients($id);
                }
            }
            if(isset($_POST['export_submit'])){
                $this->load->dbutil();
                $this->load->helper('file');
                $this->load->helper('download');
                $delimiter = ",";
                $newline = "\r\n";
                $filename = "clients.csv";
                $ids = array();
                foreach($_POST['checkid'] as $id){
                    array_push($ids, $id);
                }
                $result = $this->clients_model->export_clients($ids);
                $data = $this->dbutil->csv_from_result($result, $delimiter, $newline);
                force_download($filename, $data);
            }

        }
        $data = array('title' => 'Clients');
        $this->load->view('header', $data);
        $clients = $this->clients_model->get_clients();
        $staffs = array();
        for($i = 0; $i < sizeof($clients); $i++)
        {
            $staffs[$i] = $this->staff_model->get_staff($clients[$i]->FK_saleID);
        }
        $data1 = array('clients' => $clients, 'staffs' => $staffs, 'fontsize'=>$this->clients_model->get_font());;
        $this->load->view('clients_view', $data1);
        $this->load->view('footer');
    }
}