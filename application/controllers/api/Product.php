
<?php
   
require APPPATH . 'libraries/REST_Controller.php';
     
class Product extends REST_Controller {
    
	  /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function __construct() {
       parent::__construct();
       $this->load->database();
       $this->load->helper('url');
       $this->load->model('ProductModel', '', TRUE);
       $this->load->model('ProductCategoryModel', '', TRUE);
    }
       
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
	public function index_get($id = 0)
	{
        $data = $this->input->request_headers();

        $dbkeys=$this->ProductCategoryModel->getSelectData("key","keys",null);
        foreach ($dbkeys as $key => $value) {
            $keyValue = $value->key;
        }

        if($keyValue == $data['admin'])
        {
            if(!empty($id)){
                $data = $this->db->get_where("product", ['p_id' => $id])->row_array();
            }else{
                $data = $this->db->get("product")->result();
            }
         
            $this->response($data, REST_Controller::HTTP_OK);
        }
        else
        {
            $this->response("Wrong Credentials", REST_Controller::HTTP_OK);
        }
	}
      
    /**
     * POST Data from this method.
     *
     * @return Response
    */
    public function index_post()
    {
        $data = $this->input->request_headers();

        $dbkeys=$this->ProductCategoryModel->getSelectData("key","keys",null);
        foreach ($dbkeys as $key => $value) {
            $keyValue = $value->key;
        }

        if($keyValue == $data['admin'])
        {
            $input = $this->input->post();
            $this->db->insert('product',$input);
         
            $this->response(['Product created successfully.'], REST_Controller::HTTP_OK);
        }
        else
        {
            $this->response("Wrong Credentials", REST_Controller::HTTP_OK);
        }
    } 
     
    /**
     * PUT method.
     *
     * @return Response
    */
    public function index_put($id)
    {
        $data = $this->input->request_headers();

        $dbkeys=$this->ProductCategoryModel->getSelectData("key","keys",null);
        foreach ($dbkeys as $key => $value) {
            $keyValue = $value->key;
        }

        if($keyValue == $data['admin'])
        {
            $input = $this->put();
            $this->db->update('product', $input, array('id'=>$id));
         
            $this->response(['Product updated successfully.'], REST_Controller::HTTP_OK);
        }
        else
        {
            $this->response("Wrong Credentials", REST_Controller::HTTP_OK);
        }
    }
     
    /**
     * DELETE method.
     *
     * @return Response
    */
    public function index_delete($id)
    {
        $data = $this->input->request_headers();

        $dbkeys=$this->ProductCategoryModel->getSelectData("key","keys",null);
        foreach ($dbkeys as $key => $value) {
            $keyValue = $value->key;
        }

        if($keyValue == $data['admin'])
        {
            $this->db->delete('product', array('id'=>$id));
           
            $this->response(['Product deleted successfully.'], REST_Controller::HTTP_OK);
        }
        else
        {
            $this->response("Wrong Credentials", REST_Controller::HTTP_OK);
        }
    }

    // Get product list by seller 
    public function productsBySeller_get($id=0)
    {   
        $data = $this->input->request_headers();

        $dbkeys=$this->ProductCategoryModel->getSelectData("key","keys",null);
        foreach ($dbkeys as $key => $value) {
            $keyValue = $value->key;
        }

        if($keyValue == $data['admin'])
        { 
            $data = $this->ProductModel->getProductBySeller($id);

            $this->response($data, REST_Controller::HTTP_OK);
        }
        else
        {
            $this->response("Wrong Credentials", REST_Controller::HTTP_OK);
        }
    }

    // Get seller details for a product 
    public function SellerDataProduct_get($id=0)
    {   
        $data = $this->input->request_headers();

        $dbkeys=$this->ProductCategoryModel->getSelectData("key","keys",null);
        foreach ($dbkeys as $key => $value) {
            $keyValue = $value->key;
        }

        if($keyValue == $data['admin'])
        { 
            $data = $this->ProductModel->SellerDataProduct($id);
            
            $this->response($data, REST_Controller::HTTP_OK);
        }
        else
        {
            $this->response("Wrong Credentials", REST_Controller::HTTP_OK);
        }
    }

    //test method
    // public function Test_get($id=0)
    // {   
        
    //     //$this->input->cookie();
    //     //$this->input->server();
    //     $data = $this->input->request_headers();

    //     $dbkeys=$this->ProductCategoryModel->getSelectData("key","keys",null);
    //     foreach ($dbkeys as $key => $value) {
    //         $keyValue = $value->key;
    //     }
    //     //var_dump($dbkeys); 
    //     if($keyValue == $data['admin']){
    //         $this->response("Ok", REST_Controller::HTTP_OK);
    //     }
    //     else{
    //         $this->response("Wrong", REST_Controller::HTTP_OK);
    //     }
        
    // }
    	
}