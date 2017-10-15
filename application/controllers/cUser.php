<?php
defined('BASEPATH' OR exit('No direct script access allowed'));

class cUser extends CI_Controller {

  function __construct(){
          parent::__construct();
          $this->load->library('session');
          $this->load->helper('url');
          $this->load->model('mUser','MUser');
  }

  public function index()
  {
    //call user login user's name session
      if ($this->session->has_userdata('customerNameSess')) {
          $custname = $this->session->userdata('customerNameSess');
      }else {
          $custname = '';
      }
      //priviledge from session
      if ($this->session->has_userdata('PrivilegeID')) {
          $PrivilegeID = $this->session->userdata('PrivilegeID');
      }else {
          $PrivilegeID = '';
      }
      //priviledge checking for admin page
       if (isset($PrivilegeID)){
         if ($PrivilegeID == ''){
            echo "<script>   alert('You are not allowed !'); window.location = 'home'; </script>";
         }else if ($PrivilegeID == '1'){
           echo "<script>   alert('You are not allowed !'); window.location = 'home'; </script>";
         }else{
         }
       }
       //check csrf token
       $csrf = array(
            'name' => $this->security->get_csrf_token_name(),
            'hash' => $this->security->get_csrf_hash()
        );

      $header = array(
        'title' => 'Userpage',
        'keywords' => 'shopping',
        'description' => 'Userpage',
        'author' => 'Kunanon Pititheerachot #12634123 UTS',
        'custname' => $custname,
        'PrivilegeID'=> $PrivilegeID,
        'privid' => $PrivilegeID,
        'csrf' => $csrf
      );

      $pvlList = $this->MUser->mPrivilegeList();

      $index = array(
        'top' => 'User list',
        'PrivilegeID'=> $PrivilegeID,
        'PrivList' => $pvlList,
        'csrf' => $csrf
      );

      $this->load->view('template/header',$header);
      $this->load->view('vUser',$index);
      $this->load->view('template/footer');
  }

//show userlist in user page
  public function userlist(){
    if ($this->session->has_userdata('PrivilegeID')) {
        $PrivilegeID = $this->session->userdata('PrivilegeID');
    }else {
        $PrivilegeID = '';
    }
    //priviledge checking for accessing to admin page
    if (isset($PrivilegeID)){
      if ($PrivilegeID == ''){
         echo "<script>   alert('You are not allowed !'); window.location = 'home'; </script>";
      }else if ($PrivilegeID == '1'){
        echo "<script>   alert('You are not allowed !'); window.location = 'home'; </script>";
      }else{
      }
    }
    //csrf token
    $csrf = array(
         'name' => $this->security->get_csrf_token_name(),
         'hash' => $this->security->get_csrf_hash()
      );
          $aData = array(
            'csrf' => $csrf
          );
    //get input from search box vUser
         $firstname_f = $this->input->get('fristname_f');
         $lastname_f = $this->input->get('lastname_f');
         $email_f = $this->input->get('email_f');

         $aData['aUser'] = $this->MUser->mUserList($firstname_f ,$lastname_f ,$email_f);

         $this->load->view('vUserList',$aData);
  }

//vUser register
  public function save(){
      $csrf = array(
           'name' => $this->security->get_csrf_token_name(),
           'hash' => $this->security->get_csrf_hash()
        );
      $privilege = $this->input->post('sPrivilege');
      $firstname = $this->input->post('sFirstname');
      $lastname = $this->input->post('sLastname');
      $address1 = $this->input->post('sAddress1');
      $address2 = $this->input->post('sAddress2');
      $city = $this->input->post('sCity');
      $state = $this->input->post('sState');
      $postcode = $this->input->post('sPostcode');
      $country = $this->input->post('sCountry');
      $username = $this->input->post('sUsername');
      $password = $this->input->post('sPassword');
      $email = $this->input->post('sEmail');
      $tel = $this->input->post('sTel');
      $action_mode = $this->input->post('action_mode');
      $pwEnc = md5($password);
      //register new account
      if ($action_mode == '1') {
        $data = array('CustomerFirstname' =>$firstname ,
                      'CustomerLastname'=>$lastname,
                      'CustomerAddr1' => $address1,
                      'CustomerAddr2' => $address2,
                      'City' => $city,
                      'State' => $state,
                      'Postcode' => $postcode,
                      'Country' => $country,
                      'Username' => $username,
                      'Password' => $pwEnc,
                      'Email' => $email,
                      'CustomerTel' => $tel,
                      'PrivilegeID' => $privilege
                    );
         $res = $this->MUser->mSave($data);
      //edit exist user
      }else{
        $id = $this->input->post('UserID');
        $data = array(
                        'CustomerFirstname' =>$firstname ,
                        'CustomerLastname'=>$lastname,
                        'CustomerAddr1' => $address1,
                        'CustomerAddr2' => $address2,
                        'City' => $city,
                        'State' => $state,
                        'Postcode' => $postcode,
                        'Country' => $country,
                        'Username' => $username,
                        'Password' => $pwEnc,
                        'Email' => $email,
                        'CustomerTel' => $tel,
                        'PrivilegeID' => $privilege
                    );
                    $res = $this->MUser->mEdit($id,$data);
                    echo $res;
      }
  }

//delete user
  public function remove(){
      $id = $this->input->get('UserID');
      $data = array('CustomerID' => $id);
      $res = $this->MUser->mRemove($data);
      echo $res;
  }

//reset password
  public function update(){
      $email = $this->input->post('sEmail');
      $password = $this->input->post('sPassword');
      $pwEnc = md5($password);
      $data = array('Password' => $pwEnc);
      $res = $this->MUser->mUpdate($email,$data);
      echo $res;
  }
  
}
?>
