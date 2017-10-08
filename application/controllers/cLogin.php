<?php
defined('BASEPATH' OR exit('No direct script access allowed'));

class cLogin extends CI_Controller {

  function __construct(){
          parent::__construct();
          $this->load->library('session');
          $this->load->helper('url');
          $this->load->model('mLogin','MLogin');
  }

  public function index()
  {
    $header = array(
      'title' => 'Login',
      'keywords' => 'shopping',
      'description' => 'this is web application for online retailer',
      'author' => 'Kunanon Pititheerachot #12634123 UTS'
    );

    $index = array(
      'top' => 'Home'
    );

    $data = array();
    $this->load->view('template/header',$header);
    $this->load->view('vLogscreen',$index);
    $this->load->view('template/footer');

  }
  public function signIn()
  {
           $csrf = array(
                'name' => $this->security->get_csrf_token_name(),
                'hash' => $this->security->get_csrf_hash()
            );

            $username   =     $this->input->post('username');
            $password   =     $this->input->post('password');

            $pwE = md5($password);

            $csinfo = $this->MLogin->Login($username,$pwE);
            if ($csinfo == 'empty') {
              echo 'false';
            }else{
              echo $csinfo->PrivilegeID;

              $cusdata = array( 'customerIDSess'   =>   $csinfo->CustomerID,
                                'customerNameSess' =>   $csinfo->CustomerFirstname,
                                'customerLastSess' =>   $csinfo->CustomerLastname,
                                'PrivilegeID'      =>   $csinfo->PrivilegeID,
                                'usernameSess'     =>   $csinfo->Username,
                                'customerAddr1Sess'=>   $csinfo->CustomerAddr1,
                                'customerAddr2Sess'=>   $csinfo->CustomerAddr2,
                                'customerCitySess' =>   $csinfo->City,
                                'customerStateSess'=>   $csinfo->State,
                                'customerPostcodeSess'=>  $csinfo->Postcode,
                                'customerCountrySess' => $csinfo->Country,
                                'customerTelSess'  =>   $csinfo->CustomerTel,
                                'customerEmailSess'=>   $csinfo->Email,
                                'csrf' => $csrf
                              );

                $this->session->set_userdata($cusdata);
            }
  }
}
?>
