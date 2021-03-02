<?php
class add_clients extends CI_Controller
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
        $this->load->model('clients_model');
        $this->load->model('add_clients_model');
    }
    function index()
    {
    }
    function add_new(){
        echo "add_new";
        $data = array('title' => 'Clients');
        $this->load->view('header', $data);
        $data1 = array('clients' => $this->clients_model->get_clients(), 'fontsize'=>$this->clients_model->get_font());
        $this->load->view('clients_view', $data1);
        $this->load->view('footer');
    }
    function save()
    {

//        $this->form_validation->set_rules('PK_clientID','PK_clientID','trim|required');
//        $this->form_validation->set_rules('client_title','client_title','trim|required');
//        $this->form_validation->set_rules('client_firstname','client_firstname','trim|required');
//        $this->form_validation->set_rules('client_lastname','client_lastname','trim|required');
//        $this->form_validation->set_rules('client_phone','client_phone','trim|required');
//        $this->form_validation->set_rules('client_email','client_email','trim|required');
//        $this->form_validation->set_rules('client_wechat','client_wechat','trim|required');
//        $this->form_validation->set_rules('client_address','client_address','trim|required');
//        $this->form_validation->set_rules('client_NoOfPurchased','client_NoOfPurchased','trim|required');
//        $this->form_validation->set_rules('client_firb','client_firb','trim|required');
//        $this->form_validation->set_rules('client_Subscript','client_Subscriptions','trim|required');
//        $this->form_validation->set_rules('client_comments','client_comments','trim|required');
//        $this->form_validation->set_rules('FK_saleID','FK_saleID','trim|required');
//        if($this->form_validation->run() == false){
//            $this->add_new();
//           var_dump($_POST);
//            var_dump( $this->input->post('PK_clientID'));
//        }else{           $this->input->post('PK_clientID') == "" ||
            if($this->input->post('client_firstname') == "" || $this->input->post('client_lastname') == ""){
                redirect('clients');
            }
            else{
                if($this->input->post('client_firb') == "yes") $client_firb = 1;
                else if($this->input->post('client_firb') == "no") $client_firb = 0;
                if($this->input->post('client_Subscriptions') == "yes") $client_Subscriptions = 1;
                else if($this->input->post('client_Subscriptions') == "no") $client_Subscriptions = 0;
                $client = array(
//                    'PK_clientID' => $this->input->post('PK_clientID'),
                    'client_title' => $this->input->post('client_title'),
                    'client_firstname' => $this->input->post('client_firstname'),
                    'client_lastname' => $this->input->post('client_lastname'),
                    'client_phone' => $this->input->post('client_phone'),
                    'client_email' => $this->input->post('client_email'),
                    'client_wechat' => $this->input->post('client_wechat'),
                    'client_address' => $this->input->post('client_address'),
                    'client_NoOfPurchased' => $this->input->post('client_NoOfPurchased'),
                    'client_firb' => $client_firb,
                    'client_Subscriptions' => $client_Subscriptions,
                    'client_comments' => $this->input->post('client_comments'),
                    'FK_saleID' => $this->input->post('FK_saleID')
                );

                if($this->add_clients_model->check_user($client) == false){
                    $this->add_clients_model->add_new($client);
                }
                redirect('clients');
            }
    }
    function update()
    {
        if($this->input->post('client_firstname') == "" || $this->input->post('client_lastname') == ""){
            redirect('clients');
        }
        else{
            if($this->input->post('client_firb') == "yes") $client_firb = 1;
            else if($this->input->post('client_firb') == "no") $client_firb = 0;
            if($this->input->post('client_Subscriptions') == "yes") $client_Subscriptions = 1;
            else if($this->input->post('client_Subscriptions') == "no") $client_Subscriptions = 0;
            $client = array(
                'PK_clientID' => $this->input->post('PK_clientID'),
                'client_title' => $this->input->post('client_title'),
                'client_firstname' => $this->input->post('client_firstname'),
                'client_lastname' => $this->input->post('client_lastname'),
                'client_phone' => $this->input->post('client_phone'),
                'client_email' => $this->input->post('client_email'),
                'client_wechat' => $this->input->post('client_wechat'),
                'client_address' => $this->input->post('client_address'),
                'client_NoOfPurchased' => $this->input->post('client_NoOfPurchased'),
                'client_firb' => $client_firb,
                'client_Subscriptions' => $client_Subscriptions,
                'client_comments' => $this->input->post('client_comments'),
                'FK_saleID' => $this->input->post('FK_saleID')
            );
            var_dump($client);
            $this->add_clients_model->update_client($client);
            redirect('clients');
        }
    }

}
?>