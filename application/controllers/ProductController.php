
<?php
//author:N.Nadeeshani
//last modified data:2020-08-01
class ProductController extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session'); 
        $this->load->model('ProductCategoryModel', '', TRUE);
    }

    public function Index()
    {
    	$whereArr = array("active"=>1);

        $data['product_data']=$this->ProductCategoryModel->getSelectData("*","product",$whereArr);

    	$this->load->view('Dashboard/product_list', $data);
    }

    public function Add_View()
    {
        $whereArr = array("active"=>1);

        $data['product_category_list']=$this->ProductCategoryModel->getSelectData("*","product_category",$whereArr);

    	$this->load->view('Dashboard/product_add', $data);
    }

    public function Add_Product()
    {
        //create photo name
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < 10; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
       // echo $randomString; die();
        // Product Photo Upload Code : Start //    
        $pathPhoto = "./uploads/product_photo/" . $randomString;
        //$subdirectory = $path . "/profilepic/";
        if (!is_dir($pathPhoto)) { //create the folder if it's not already exists
            mkdir($pathPhoto, 0755, TRUE);
        }

        //var_dump($subdirectory);die;
        $config['upload_path'] = $pathPhoto;
        $config['allowed_types'] = 'gif|jpg|png';
        // $config['max_size'] = '204887';
        // $config['max_width'] = '1624568';
        // $config['max_height'] = '1268675';
        $config['file_name'] = $randomString;

        $this->load->library('upload', $config);


        if (!$this->upload->do_upload("pimage")) {
            $error = array('error' => $this->upload->display_errors());

            echo json_encode($error); //$error;
        } else {
            //$data = array('upload_data' => $this->upload->data());
            $result = $this->upload->data();
            $fileext = $result['file_name'];
            // Product Photo Upload Code : End //  

            $dataArr = array(
                "product_name" => $this->input->post("product_name"),
                "product_categry" => $this->input->post("product_categry"),
                "price" => $this->input->post("price"),
                "description" => $this->input->post("description"),
                "image" => $fileext,
            ); 

           $this->ProductCategoryModel->insertData("product", $dataArr); 

           redirect('ProductController/Index'); 
        }    	
    }

    public function Sell_Product()
    {
        $whereArr = array("stock_id"=>$this->input->post("stock_id"));

        $items_ordered=$this->ProductCategoryModel->getSelectData("items_to_invoice","stock",$whereArr);

            if(empty($items_ordered)){
                $items_ordered = 0;
            }
           
            $new_items_ordered = (int)$items_ordered[0]->items_to_invoice + (int)$this->input->post("quantity");

            $stockArr = array(
                "items_to_invoice" => $new_items_ordered
            ); 

        $is_inserted = $this->ProductCategoryModel->updateData("stock", $stockArr, $whereArr); 

        redirect('Welcome/Index'); 
        //this process will continue to generate order - it was not coded in this basic stage
    }

    

}