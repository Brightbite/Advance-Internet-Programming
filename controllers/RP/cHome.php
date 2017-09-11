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
    $this->load->view('RP/template/header',$header);
    $this->load->view('RP/vHome',$index); //load view
    $this->load->view('RP/template/footer');

  }
  //showing updated table load from model
}
?>
