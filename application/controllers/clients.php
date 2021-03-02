<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 4/8/2017
 * Time: 10:04 PM
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class clients extends CI_Controller
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
    }
    public function index(){
//        var_dump($this->session);
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
        $data = array('title' => 'Clients');
        $this->load->view('header', $data);
        $clients = $this->clients_model->get_clients();
        $staffs = array();
        for($i = 0; $i < sizeof($clients); $i++)
        {
            $staffs[$i] = $this->staff_model->get_staff($clients[$i]->FK_saleID);
        }
        $data1 = array('clients' => $clients, 'staffs' => $staffs, 'fontsize'=>$this->clients_model->get_font());

        $this->load->view('clients_view', $data1);
        $this->load->view('footer');
        }
}
