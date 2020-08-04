
<?php
//author:N.Nadeeshani
//last modified data:2020-08-03
class ReportController extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session'); 
        $this->load->model('ReportModel', '', TRUE);
    }

    public function Index()
    {
        $data['report_data'] = $this->ReportModel->getProductStockReport();

    	$this->load->view('Dashboard/report_product_stock', $data);
    }

    

}