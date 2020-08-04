
<?php
//author:N.Nadeeshani
//last modified data:2020-08-03
class SellerController extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session'); 
        $this->load->model('ProductCategoryModel', '', TRUE);
    }

    public function Index()
    {
    	$whereArr = array("active"=>1);

        $data['seller_data']=$this->ProductCategoryModel->getSelectData("*","seller",$whereArr);

    	$this->load->view('Dashboard/seller_list', $data);
    }

    public function Add_View()
    {       
    	$this->load->view('Dashboard/seller_add');
    }

    public function Add_Seller()
    {
    	$dataArr = array(
            "s_name" => $this->input->post("seller_name"),
            "DOB" => $this->input->post("dob"),
            "address" => $this->input->post("address"),
            "contact_no" => $this->input->post("contact"),
            "NIC" => $this->input->post("nic"),
        ); 

       $this->ProductCategoryModel->insertData("seller", $dataArr); 

       redirect('SellerController/Index'); 
    }

    

}