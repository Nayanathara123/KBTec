
<?php
//author:N.Nadeeshani
//last modified data:2020-08-03
class StockController extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session'); 
        $this->load->model('ProductCategoryModel', '', TRUE);
        $this->load->model('StockModel', '', TRUE);
    }

    public function Add_View()
    {   
        $whereArr = array("active"=>1);

        $data['seller_data']=$this->ProductCategoryModel->getSelectData("*","seller",$whereArr);
        $data['product_data']=$this->ProductCategoryModel->getSelectData("*","product",$whereArr);

    	$this->load->view('Dashboard/stock_add', $data);
    }

    public function Add_Stock()
    {
        $whereArr = array("active"=>1,
                    "p_id" => $this->input->post("product"),
                    "s_id" => $this->input->post("seller")
                    );
        $product_seller_exists = $this->ProductCategoryModel->getSelectData("*","product_seller",$whereArr);
        //var_dump($product_seller_exists); die;
        if (empty($product_seller_exists)) {

            $last_id_stock = $this->StockModel->getLastStockID("stock_id","stock");
            
            if(empty($last_id_stock)){
                $last_id_stock = 0;
            }
            //var_dump((int)$last_id_stock[0]->stock_id); die;
            $new_stock_id = (int)$last_id_stock[0]->stock_id + 1;

            $stockArr = array(
                "stock_id" => $new_stock_id,
                "total_items" => $this->input->post("TotItems"),
                "sold_items" => 0,
                "reorder_level" => $this->input->post("reorder"),
            ); 

           $is_inserted = $this->ProductCategoryModel->insertData("stock", $stockArr); 

           if($is_inserted == true){

                $dataArr = array(
                    "p_id" => $this->input->post("product"),
                    "s_id" => $this->input->post("seller"),
                    "stock_id" => $new_stock_id,
                ); 

                $this->ProductCategoryModel->insertData("product_seller", $dataArr); 
           }            
           redirect('StockController/Add_View'); 
        }
        else{
            echo "This product already exist. Not allowed for new entry. Please update the product stock";
        }
       
    }

    

}