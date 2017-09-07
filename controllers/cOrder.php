<?php
defined('BASEPATH' OR exit('No direct script access allowed'));

class cOrder extends CI_Controller {

  function __construct(){
          parent::__construct();
          $this->load->helper('url');
          // $this->load->model('mLogin','MLogin'); //load model first before view
  }

  public function index()
  {
    $header = array(
      'title' => 'Order',
      'keywords' => 'shopping',
      'description' => 'this is web application for online retailer',
      'author' => 'Kunanon Pititheerachot #12634123 UTS'
    );

    $index = array(
      'top' => 'order'
    );

    $data = array();
    $this->load->view('template/header',$header);
    $this->load->view('vOrder',$index); //load view
    $this->load->view('template/footer');

  }
  // public function login(){
  //
  // }

}
?>
