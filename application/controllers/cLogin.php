<?php
defined('BASEPATH' OR exit('No direct script access allowed'));

class cLogin extends CI_Controller {

  function __construct(){
          parent::__construct();
          $this->load->library('session');
          $this->load->helper('url');
          $this->load->model('mLogin','MLogin'); //load model first before view
          // $this->load->library('encryption');
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
    $this->load->view('vLogscreen',$index); //load view
    $this->load->view('template/footer');

  }
  public function signIn()
  {

          //  echo $this->security->get_csrf_hash();
          //  echo 'and';/
           //echo $this->input->post('csrf_val');
           $csrf = array(
                'name' => $this->security->get_csrf_token_name(),
                'hash' => $this->security->get_csrf_hash()
               //  'csrf' => $csrf
            );
          //
            $username   =     $this->input->post('username');
            $password   =     $this->input->post('password');
          //   // echo $res;


            // $pwE = $this->encrypt->encode($password)
            $pwE = md5($password);
            
            // $pwE nc = base64_encode($password);

            // $csinfo = $this->MLogin->Login($username,$pwEnc);
            $csinfo = $this->MLogin->Login($username,$pwE);
            // echo $password   =     $this->input->post('password');
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
          //       redirect('#',refresh);
            }


       //
      //  echo  $this->log_info();
  }
  public function log_info(){
          return $this->session->userdata('username_sess');
  }


    // public function validate(){
      // $this->load->helper(array('form', 'url'));
      // $this->load->library('form_validation');
      //
      // if ($this->form_validation->run() == FALSE)
      // {
      //         $this->load->view('myform');
      // }
      // else
      // {
      //         $this->load->view('formsuccess');
      // }
    // }

}
?>
