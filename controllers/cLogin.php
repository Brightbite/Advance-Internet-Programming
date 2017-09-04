<?php
defined('BASEPATH' OR exit('No direct script access allowed'));

class cLogin extends CI_Controller {

  function __construct(){
          parent::__construct();
          $this->load->helper('url');
          $this->load->model('mLogin','MLogin'); //load model first before view
  }

  public function index()
  {
    $header = array(
      'title' => 'Login',
      'keywords' => 'shopping',
      'description' => 'this is web application for online retailer',
      'author' => 'Kunanon Pititheerachot #12634123 UTS'
    );

    $index = array(
      'top' => 'Home'
    );

    $data = array();
    $this->load->view('template/header',$header);
    $this->load->view('vHome',$index); //load view
    $this->load->view('template/footer');

  }
  public function signIn()
          {
            $email      = $this->input->post('email');
            $password   = $this->input->post('password');
            $res = $this->MLogin->Login($email,$password);
            echo $res;
          }

    // public function validate(){
      // $this->load->helper(array('form', 'url'));
      // $this->load->library('form_validation');
      //
      // if ($this->form_validation->run() == FALSE)
      // {
      //         $this->load->view('myform');
      // }
      // else
      // {
      //         $this->load->view('formsuccess');
      // }
    // }

}
?>
