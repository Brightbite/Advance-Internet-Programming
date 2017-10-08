<?php
defined('BASEPATH' OR exit('No direct script access allowed'));

class cLogout extends CI_Controller {

  function __construct(){
          parent::__construct();
          $this->load->library('session');
          $this->load->helper('url');
          $this->load->model('mUser','MUser');
  }

  public function index()
  {
    $this->session->sess_destroy();
    $this->session->unset_userdata('customerNameSess');
    echo "<script> window.location = 'home';</script>";
  }
}
?>
