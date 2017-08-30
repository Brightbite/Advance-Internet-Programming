<?php
defined('BASEPATH' OR exit('No direct script access allowed'));

class cHome extends CI_Controller {

  function __construct(){
          parent::__construct();
          $this->load->helper('url');
          //$this->load->model('RP/mUser','MUser'); //load model first before view
  }

  public function index()
  {
    $data = array();
    $this->load->view('RP/template/header');
    $this->load->view('RP/vHome'); //load view
    $this->load->view('RP/template/footer');

  }
  //showing updated table load from model
}
?>
