<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 4/8/2017
 * Time: 10:05 PM
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class messages extends CI_Controller
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
        $this->load->model('messages_model');
    }
    public function index(){

        $data = array('title' => 'Messages Screen');
        $this->load->view('header', $data);
        $data1 = array('clients' => $this->messages_model->get_clients(), 'staffs'=>$this->messages_model->get_staffs());
        $this->load->view('messages_view', $data1);
        $this->load->view('footer');
    }
}