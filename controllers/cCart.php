<?php
defined('BASEPATH' OR exit('No direct script access allowed'));

class cCart extends CI_Controller {

  function __construct(){
          parent::__construct();
          $this->load->library('session');
          $this->load->helper('url');
          $this->load->model('mCart','MCart'); //load model first before view
  }

  public function index()
  {
    if ($this->session->has_userdata('PrivilegeID')) {
        $PrivilegeID = $this->session->userdata('PrivilegeID');
    }else {
        $PrivilegeID = '';
    }

    if ($this->session->has_userdata('customerNameSess')) {
        $custname = $this->session->userdata('customerNameSess');
    }else {
        $custname = '';
    }

    if ($this->session->has_userdata('customerLastSess')) {
        $custlast = $this->session->userdata('customerLastSess');
    }else {
        $custlast = '';
    }

    if ($this->session->has_userdata('csOderID')) {
        $custOdId= $this->session->userdata('csOderID');
    }else {
        $custOdId = '';
    }
    if ($this->session->has_userdata('csOderNumber')) {
        $custOdNum = $this->session->userdata('csOderNumber');
    }else {
        $custOdNum = '';
    }
    if ($this->session->has_userdata('csID')) {
        $custID = $this->session->userdata('csID');
    }else {
        $custID = '';
    }


    $header = array(
      'title' => 'My Account',
      'keywords' => 'account',
      'description' => 'this is web application for online retailer',
      'author' => 'Kunanon Pititheerachot #12634123 UTS',
      'custname'=> $custname,
      'custlast'  => $custlast

    );

    $index = array(
      'top' => 'Home',
      ''  => $custname,
      ''  => $custlast
    );

    $data = array();
    $this->load->view('template/header',$header);
    $this->load->view('vCart',$index); //load view
    $this->load->view('template/footer');
    // $pvlList = $this->MCart->mCartuser();
  }

  public function usercart(){
          $cartData = array();

        //  $firstname_f = $this->input->get('fristname_f');       //get post data from view page
        //  $lastname_f = $this->input->get('lastname_f');
        //  $email_f = $this->input->get('email_f');

         $cartData['cartUser'] = $this->MCart->mCartuser();
         $this->load->view('vCart',$cartData);
  }
}
?>
