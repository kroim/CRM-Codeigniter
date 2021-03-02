<?php
class csv extends CI_Controller
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
        $this->load->model('csv_model');
        $this->load->model('staff_add_model');
        $this->load->model('sales_add_model');
        $this->load->model('clients_model');
        $this->load->model('staff_model');
    }
    function index()
    {
        $this->load->view('uploadCsvView');
    }
    function uploadData()
    {
        $err_msg = $this->csv_model->uploadData();
        $data = array('title' => 'Clients');
        $this->load->view('header', $data);
        $clients = $this->clients_model->get_clients();
        $staffs = array();
        for($i = 0; $i < sizeof($clients); $i++)
        {
            $staffs[$i] = $this->staff_model->get_staff($clients[$i]->FK_saleID);
        }
        $data1 = array('clients' => $clients, 'staffs' => $staffs, 'err_msg'=>$err_msg, 'fontsize'=>$this->clients_model->get_font());

        $this->load->view('clients_view', $data1);
        $this->load->view('footer');
//        redirect('clients');
    }
    function staffUpload(){
        $this->load->view('staffLoadView');
    }
    function staffUploadData(){
        $err_msg = $this->csv_model->staffUploadData();
        $dept = array();
        $data = array('title' => 'Staffs');
        $this->load->view('header', $data);
        $staff = $this->staff_model->get_staffs();
        for($i=0; $i<sizeof($staff);$i++){
            $dept[$i] = $this->staff_model->get_dept($staff[$i]->FK_department);
        }
        $data1 = array('staff' => $staff, 'dept' => $dept, 'err_msg'=>$err_msg, 'fontsize'=>$this->staff_model->get_font());

        $this->load->view('staff_view', $data1);

        $this->load->view('footer');
//        redirect('staff');
    }
    function salesUpload(){
        $this->load->view('salesLoadView');
    }
    function salesUploadData(){
        $this->csv_model->salesUploadData();
        redirect('sales');
    }

    function createcsv(){
        $this->load->dbutil();
        $this->load->helper('file');
        $this->load->helper('download');
        $delimiter = ",";
        $newline = "\r\n";
        $filename = "filename.csv";
        $query = "SELECT * FROM Login_tb";

        $result = $this->db->query($query);

        var_dump($result);

        $data = $this->dbutil->csv_from_result($result, $delimiter, $newline);
        var_dump($data);
        $data1 = '"PK_LoginID","login_name","login_password","status" "1","admin","21232f297a57a5a743894a0e4a801fc3","active" "2","Eddy","817ac4898a54568561273707d3c2b90a","active" ';
        echo "</br>";
        var_dump($data1);
        force_download($filename, $data);

    }
}
?>