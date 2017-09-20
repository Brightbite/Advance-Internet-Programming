<?php
defined('BASEPATH' OR exit('No direct script access allowed'));

class cCatalog_Detail extends CI_Controller {

  function __construct(){
          parent::__construct();
          $this->load->library('session');
          $this->load->helper('url');
          $this->load->model('mProduct','MProduct'); //load model first before view
          $this->load->model('mCatalog','MCatalog'); //load model first before view
  }

  public function index($productID)
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
       $csrf = array(
            'name' => $this->security->get_csrf_token_name(),
            'hash' => $this->security->get_csrf_hash()
        );

    $header = array(
      'title' => 'Product',
      'keywords' => 'shopping',
      'description' => 'this is web application for online retailer',
      'author' => 'Kunanon Pititheerachot #12634123 UTS',
      'custname' => $custname,
      'PrivilegeID'=> $PrivilegeID,
      'privid' => $PrivilegeID,
      'csrf' => $csrf

    );

    $aCatalog = $this->MCatalog->mCatalogList();

    $this->load->view('template/header',$header);
    $arrayProduct = array('Catalog'=>$aCatalog);
    $arrayProduct['ProductDetail'] = $this->MProduct->mProDetail($productID);
    $this->load->view('vCatalog_Detail',$arrayProduct);
    $this->load->view('template/footer');
  }
}
?>
