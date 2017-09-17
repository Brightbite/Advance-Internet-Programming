<?php
defined('BASEPATH' OR exit('No direct script access allowed'));

class cHome extends CI_Controller {

  function __construct(){
          parent::__construct();
          $this->load->library('session');
          $this->load->helper('url');
          $this->load->model('mProduct','MProduct'); //load model first before view
          $this->load->model('mCatalog','MCatalog'); //load model first before view
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


    //Product Recommend
    $oGroupRecommend = $this->MRecommend->getGruopRecommend($custID);
    if (is_array($oGroupRecommend)){
        $i = 0;
        $arrayGroup = array();
        foreach ($oGroupRecommend as $group ) {
              $arrayGroup[$i]  = $group->CategoryID;
              $i++;
        }

        $tgroupRecommend = implode("','", $arrayGroup);
        $groupRecommend = "'".$tgroupRecommend."'";

    }else{
        $groupRecommend = 'ALL';
    }

    $productRecommend = $this->MRecommend->mRecommendation($groupRecommend);
    // productRecommend

    $header = array(
      'title' => 'Homepage',
      'keywords' => 'shopping',
      'description' => 'this is web application for online retailer',
      'author' => 'Kunanon Pititheerachot #12634123 UTS',
      'custname'=> $custname,
      'custlast'=>$custlast,
      'privid' => $PrivilegeID
    );

    // $pvlList = $this->MProduct->mProDetail();
    $aCatalog = $this->MCatalog->mCatalogList();

    $index = array(
      'top' => 'Home',
      'Catalog' => $aCatalog,
      'productRecommend' => $productRecommend
    );


    $data = array();
    $this->load->view('template/header',$header);
    $this->load->view('vHome',$index); //load view
    $this->load->view('template/footer');

  }
  // public function login(){
  //
  // }

}
?>
