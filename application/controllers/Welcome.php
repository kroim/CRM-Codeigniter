<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
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
	}
	public function index()
	{

		$this->load->library('session');
		$user_logged_in = $this->session->userdata('loginuser');
		$this->load->helper('url');
		if ($user_logged_in == FALSE)
		{
			redirect('/login');
		}
		else
		{
			$data = array('title' => 'welcome');
			$this->load->view('header', $data);
			$data1 = array('clients' => $this->clients_model->get_clients(), 'fontsize'=>$this->clients_model->get_font());
			$this->load->view('clients_view', $data1);
			$this->load->view('footer');
		}

	}
}
