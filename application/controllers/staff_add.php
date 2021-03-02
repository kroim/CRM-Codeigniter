<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 4/8/2017
 * Time: 10:04 PM
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class staff_add extends CI_Controller
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
        $this->load->model('staff_model');
        $this->load->model('staff_add_model');
    }
    function index()
    {
    }
    function add_new(){
        echo "add_new";
        $data = array('title' => 'Staffs');
        $this->load->view('header', $data);
        $data1 = array('staff' => $this->staff_model->get_clients(), 'fontsize'=>$this->staff_model->get_font());
        $this->load->view('staff_view', $data1);
        $this->load->view('footer');
    }
    function save()
    {
        if($this->input->post('staff_firstname') == "" || $this->input->post('staff_lastname') == ""){
            redirect('staff');
        }
        else{

            $staff = array(
//                    'PK_clientID' => $this->input->post('PK_clientID'),
                'staff_firstname' => $this->input->post('staff_firstname'),
                'staff_lastname' => $this->input->post('staff_lastname'),
                'staff_phone' => $this->input->post('staff_phone'),
                'staff_email' => $this->input->post('staff_email'),
                'staff_wechat' => $this->input->post('staff_wechat'),
                'staff_employment_status' => $this->input->post('staff_employment_status'),
                'staff_jobtitle' => $this->input->post('staff_jobtitle'),
                'staff_messagetoclient' => $this->input->post('staff_messagetoclient'),
                'staff_comments' => $this->input->post('staff_comments'),
                'FK_department' => $this->input->post('FK_department')
            );

            if($this->staff_add_model->check_user($staff) == false){
                $this->staff_add_model->add_new($staff);
            }
            redirect('staff');
        }
    }
    function update()
    {
        if($this->input->post('staff_firstname') == "" || $this->input->post('staff_lastname') == ""){
            redirect('staff');
        }
        else{

            $staff = array(
                'PK_staffID' => $this->input->post('PK_staffID'),
                'staff_firstname' => $this->input->post('staff_firstname'),
                'staff_lastname' => $this->input->post('staff_lastname'),
                'staff_phone' => $this->input->post('staff_phone'),
                'staff_email' => $this->input->post('staff_email'),
                'staff_wechat' => $this->input->post('staff_wechat'),
                'staff_employment_status' => $this->input->post('staff_employment_status'),
                'staff_jobtitle' => $this->input->post('staff_jobtitle'),
                'staff_messagetoclient' => $this->input->post('staff_messagetoclient'),
                'staff_comments' => $this->input->post('staff_comments'),
                'FK_department' => $this->input->post('FK_department')
            );
            var_dump($staff);
            $this->staff_add_model->staff_update($staff);
            redirect('staff');
        }
    }

}
?>