<?php
defined('BASEPATH' OR exit('No direct script access allowed'));

class cRegister extends CI_Controller {

  function __construct(){
          parent::__construct();
          $this->load->helper('url');
          $this->load->model('mRegister','MRegister');
  }

  public function index()
  {
    if ($this->session->has_userdata('customerNameSess')) {
        $custname = $this->session->userdata('customerNameSess');
    }else {
        $custname = '';
    }

    if ($this->session->has_userdata('PrivilegeID')) {
        $PrivilegeID = $this->session->userdata('PrivilegeID');
    }else {
        $PrivilegeID = '';
    }
    $csrf = array(
         'name' => $this->security->get_csrf_token_name(),
         'hash' => $this->security->get_csrf_hash()
     );

    $header = array(
      'title' => 'Register Page',
      'keywords' => 'shopping',
      'description' => 'Register',
      'author' => 'Kunanon Pititheerachot #12634123 UTS',
      'custname' => $custname,
      'PrivilegeID'=> $PrivilegeID,
      'privid' => $PrivilegeID,
      'csrf' => $csrf
    );
    $index = array(
      'top' => 'Create Account',
      'topic' => 'Personal Details',
      'csrf' => $csrf
    );

    $this->load->view('template/header',$header);
    $this->load->view('vRegister',$index);
    $this->load->view('template/footer');
  }

}

?>
