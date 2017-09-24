<?php
defined('BASEPATH' OR exit('No direct script access allowed'));

class cCatalog_Detail extends CI_Controller {

  function __construct(){
          parent::__construct();
          $this->load->library('session');
          $this->load->helper('url');
          // load cookie helper
          $this->load->helper('cookie');
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
    $this->add_count($arrayProduct);
  }

  function add_count($arrayProduct)
    {
      $custID = $this->session->userdata('customerIDSess');
      $aData = array('CustomerID' => $custID,
                         'CategoryID' => $arrayProduct);
    // this line will return the cookie which has slug name
      $check_visitor = $this->input->cookie(urldecode($aData), FALSE);
    // this line will return the visitor ip address
      $ip = $this->input->ip_address();
    // if the visitor visit this article for first time then //
     //set new cookie and update article_views column  ..
    //you might be notice we used slug for cookie name and ip
    //address for value to distinguish between articles  views
        if ($check_visitor == false) {
            $cookie = array(
                "name"   => urldecode($aData),
                "value"  => "$ip",
                "expire" =>  time() + 7200,
                "secure" => false
            );
            $this->input->set_cookie($cookie);
            $this->news->update_counter(urldecode($aData));
        }
    }
}
?>
