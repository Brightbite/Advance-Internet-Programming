<?php
defined('BASEPATH' OR exit('No direct script access allowed'));

class cMyaccount extends CI_Controller {

  function __construct(){
          parent::__construct();
          $this->load->helper('url');
          // $this->load->model('mLogin','MLogin'); //load model first before view
  }

  public function index()
  {
    $header = array(
      'title' => 'Homepage',
      'keywords' => 'shopping',
      'description' => 'this is web application for online retailer',
      'author' => 'Kunanon Pititheerachot #12634123 UTS'
    );

    $index = array(
      'top' => 'Home'
    );

    $data = array();
    $this->load->view('template/header',$header);
    $this->load->view('vMyaccount',$index); //load view
    $this->load->view('template/footer');

  }
  // public function login(){
  //
  // }

}
?>
