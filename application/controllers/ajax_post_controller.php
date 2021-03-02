<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ajax_Post_Controller extends CI_Controller {
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
// Show view Page
    public function index(){

    }

// This function call from AJAX
    public function user_data_submit() {

        $fontsize = $this->input->post('fontsize');
        $this->clients_model->set_font($fontsize);
    }
    public function update_clients(){
        //var_dump($this->input->post('PK_clientID'));
//        $data = array('title' => 'Clients');
//        $this->load->view('header', $data);
        $id = $this->input->post('PK_clientID');
//        var_dump($this->clients_model->get_client($id));
        $testdata = $this->clients_model->get_client($id);
        //$data1 = array('update_clients' => $this->clients_model->get_client($id));
        //var_dump($data1);
        echo json_encode($testdata, true);
//        $this->output->set_content_type('application/json');
//        $this->output->set_output(json_encode(  $data1 ));
//        var_dump($data1);

//        $this->load->view('clients_view', $data1);
//        $this->load->view('footer');
    }
    public function update_staff(){
        $id = $this->input->post('PK_staffID');
        $stdata = $this->staff_model->get_staff($id);
        echo json_encode($stdata, true);
    }
    public function update_sales(){
        $id = $this->input->post('PK_PPID');
        $salesdata = $this->sales_model->get_sales($id);
        echo json_encode($salesdata, true);
    }
    public function get_property(){
        $id = $this->input->post('FK_clientID');
        //echo json_encode($id,true);
        $prodata = $this->clients_model->property($id);
        echo json_encode($prodata, true);
    }
}