<?php
defined('BASEPATH' OR exit('No direct script access allowed'));

class cLogout extends CI_Controller {

  function __construct(){
          parent::__construct();
          $this->load->library('session');
          $this->load->helper('url');
          $this->load->model('mUser','MUser'); //load model first before view
  }

  public function index()
  {

    $this->session->sess_destroy();
    echo "<script> window.location='home';</script>";
  }
}
?>
