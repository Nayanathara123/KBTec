
<?php
//author:N.Nadeeshani
//last modified data:2020-08-01
class ProductCategoryController extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session'); 
        $this->load->model('ProductCategoryModel', '', TRUE);
    }

    public function Index(){

    	$whereArr = array("active"=>1);

        $data['category_data']=$this->ProductCategoryModel->getSelectData("*","product_category",$whereArr);

    	$this->load->view('Dashboard/product_category_list', $data);
    }

    public function Add_View(){

    	$this->load->view('Dashboard/product_category_add');
    }

    public function Add_Category()
    {
    	$dataArr = array(
            "pc_name" => $this->input->post("name"),
            "description" => $this->input->post("description"),
        ); 

       $this->ProductCategoryModel->insertData("product_category", $dataArr); 

       $this->session->set_flashdata('item','item-value'); 

       redirect('ProductCategoryController/Index'); 
    }

    

}