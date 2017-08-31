<?php
defined('BASEPATH' OR exit('No direct script access allowed'));

class cProduct extends CI_Controller {

  function __construct(){
          parent::__construct();
          $this->load->helper('url');
          //$this->load->model('RP/mUser','MUser'); //load model first before view
  }

  public function index()
  {
    $header = array(
      'title' => 'Product',
      'keywords' => 'shopping',
      'description' => 'this is web application for online retailer',
      'author' => 'Kunanon Pititheerachot #12634123 UTS'
    );

    $index = array(
      'top' => 'Product'
    );

    $data = array();
    $this->load->view('template/header',$header);
    $this->load->view('vProduct',$index); //load view
    $this->load->view('template/footer');

  }
  //showing updated table load from model
}
?>
