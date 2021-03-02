<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 4/8/2017
 * Time: 10:04 PM
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class sales extends CI_Controller
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
        $this->load->model('sales_model');
        $this->load->model('clients_model');
        $this->load->model('staff_model');
    }
    public function index(){
//        var_dump($this->session->userdata['loginuser']);
//        if($this->session->userdata['loginuser'] == NULL){
//            redirect('login');
//        }
        $this->load->library('session');
        $user_logged_in = $this->session->userdata('loginuser');
        $this->load->helper('url');
        if ($user_logged_in == FALSE)
        {
            redirect('/login');
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