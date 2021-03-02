<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 4/8/2017
 * Time: 10:04 PM
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class staff extends CI_Controller
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