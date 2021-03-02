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
    }
    function index()
    {
        $this->load->view('uploadCsvView');
    }
    function uploadData()
    {
        $this->csv_model->uploadData();
        redirect('clients');
    }
    function staffUpload(){
        $this->load->view('staffLoadView');
    }
    function staffUploadData(){
        $this->csv_model->staffUploadData();
        redirect('staff');
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