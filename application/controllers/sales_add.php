<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 4/8/2017
 * Time: 10:04 PM
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class sales_add extends CI_Controller
{
    public $data;
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->helper('html');
        $this->load->database();
        $this->load->library('form_validation');
        $this->load->helper(array('form', 'url'));
        $this->load->model('sales_model');
        $this->load->model('sales_add_model');
    }
    function index()
    {
    }
    function add_new(){
        echo "add_new";
        $data = array('title' => 'Sales');
        $this->load->view('header', $data);
        $data1 = array('sales' => $this->sales_model->get_salesall(), 'fontsize'=>$this->sales_model->get_font());
        $this->load->view('sales_view', $data1);
        $this->load->view('footer');
    }
    function save()
    {
        if($this->input->post('FK_staffID') == "" || $this->input->post('FK_clientID') == "" || $this->input->post('FK_SPID') == ""){
            redirect('sales');
        }
        else{

            $sales = array(
//                    'PK_clientID' => $this->input->post('PK_clientID'),
                'PP_lotnumber' => $this->input->post('PP_lotnumber'),
                'PP_apptnumber' => $this->input->post('PP_apptnumber'),
                'PP_price' => $this->input->post('PP_price'),
                'FK_staffID' => $this->input->post('FK_staffID'),
                'FK_clientID' => $this->input->post('FK_clientID'),
                'PP_comments' => $this->input->post('PP_comments'),
                'FK_SPID' => $this->input->post('FK_SPID')
            );

            //if($this->sales_add_model->check_user($sales) == false){
            $this->sales_add_model->add_new($sales);
            //}
            redirect('sales');
        }
    }
    function update()
    {
        if($this->input->post('FK_staffID') == "" || $this->input->post('FK_clientID') == "" || $this->input->post('FK_SPID') == ""){
            redirect('sales');
        }
        else{

            $sales = array(
                'PK_PPID' => $this->input->post('PK_PPID'),
                'PP_lotnumber' => $this->input->post('PP_lotnumber'),
                'PP_apptnumber' => $this->input->post('PP_apptnumber'),
                'PP_price' => $this->input->post('PP_price'),
                'FK_staffID' => $this->input->post('FK_staffID'),
                'FK_clientID' => $this->input->post('FK_clientID'),
                'PP_comments' => $this->input->post('PP_comments'),
                'FK_SPID' => $this->input->post('FK_SPID')
            );
            $this->sales_add_model->sales_update($sales);
            redirect('sales');
        }
    }

}
?>