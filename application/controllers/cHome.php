<?php
defined('BASEPATH' OR exit('No direct script access allowed'));

class cHome extends CI_Controller {

  function __construct(){
          parent::__construct();
          $this->load->library('session');
          $this->load->library('cart');
          $this->load->helper('url');
          $this->load->model('mProduct','MProduct');
          $this->load->model('mCatalog','MCatalog');
          $this->load->model('mRecommend','MRecommend');
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

    if ($this->session->has_userdata('PrivilegeID')) {
        $PrivilegeID = $this->session->userdata('PrivilegeID');
    }else {
        $PrivilegeID = '';
    }
    if ($this->session->has_userdata('customerIDSess')) {
        $custID = $this->session->userdata('customerIDSess');
    }else {
        $custID = '';
    }

    $csrf = array(
         'name' => $this->security->get_csrf_token_name(),
         'hash' => $this->security->get_csrf_hash()
     );
    //recommend product in homepage
    $productRecommend = $this->MRecommend->mRecommendation();
    $productRecImage= $this->MRecommend->mRecImage();

    $header = array(
      'title' => 'Homepage',
      'keywords' => 'shopping',
      'description' => 'this is web application for online retailer',
      'author' => 'Kunanon Pititheerachot #12634123 UTS',
      'custname'=> $custname,
      'custlast'=>$custlast,
      'privid' => $PrivilegeID,
      'csrf' => $csrf
    );

    $aCatalog = $this->MCatalog->mCatalogList();

    $index = array(
      'top' => 'Home',
      'Catalog' => $aCatalog,
      'productRecommend' => $productRecommend,
      'productRecImage' => $productRecImage,
      'csrf' => $csrf
    );


    $data = array();
    $this->load->view('template/header',$header);
    $this->load->view('vHome',$index);
    $this->load->view('template/footer');
  }
}
?>
