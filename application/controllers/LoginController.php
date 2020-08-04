
<?php
//author:N.Nadeeshani
//last modified data:2020-08-01
class LoginController extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session'); 
        $this->load->model('ProductCategoryModel', '', TRUE);
    }

    public function User_View()
    {
        $this->load->view('Dashboard/User_Add');
    }

    public function Add_User()
    {
        $pw = $this->input->post("pw");
        $cpw = $this->input->post("cpw");

        $whr = array("name" => $this->input->post("user_name"), "active" => 1);
        $result = $this->ProductCategoryModel->getSelectData("*", "system_user", $whr);

        if($pw == $cpw)
        {
            if(empty($result)){
                $dataArr = array(
                    "name" => $this->input->post("user_name"),
                    "password" => hash("sha256", $pw)
                ); 

                $this->ProductCategoryModel->insertData("system_user", $dataArr); 

                echo "User Created Successfully";
            }
            else {
                echo "User Already Exists";
            }
        }
        else{
            echo "Password and Confirm Password should be same";
        }        
    }

    public function login()
    {
        $username = $this->input->post("username");
        $password = $this->input->post("password"); 

        $whr = array("name" => $username, "password" => hash("sha256", $password));

        $result = $this->ProductCategoryModel->getSelectData("*", "system_user", $whr);

        if(!empty($result)){
            $this->load->view('Dashboard/dashboard');
        }
        else {
            echo "Please enter correct user name and password";
        }        
    }



}