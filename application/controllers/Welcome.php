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
	public function index()
	{
		$this->load->model('ProductModel', '', TRUE);
		$this->load->model('ProductCategoryModel', '', TRUE);

		$data['product_data'] = $this->ProductModel->ProductDetailsWithSellers();

		$whereArr = array("active"=>1);

        $data['category_data']=$this->ProductCategoryModel->getSelectData("*","product_category",$whereArr);

		$this->load->view('Website/Website', $data);
	}

	public function login_view()
	{
		$this->load->view('Dashboard/login');
	}
}
