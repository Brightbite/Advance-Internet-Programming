<?php
defined('BASEPATH' OR exit('No direct script access allowed'));

class cUser extends CI_Controller {

  function __construct(){
          parent::__construct();
          $this->load->helper('url');
          $this->load->model('RP/mUser','MUser'); //load model first before view
  }

  public function index()
  {
    $header = array(
      'title' => 'Homepage',
    );
    $data = array();
    $this->load->view('RP/template/header'); //header
    $this->load->view('RP/vUser',$data); //load view
    $this->load->view('RP/template/footer'); //footer
  }
  //showing updated table load from model
  public function rUserlist(){
         $aData = array();

         $firstname_f = $this->input->get('fristname_f');       //get post data from view page
         $lastname_f = $this->input->get('lastname_f');
         $gender_f = $this->input->get('gender_f');

         $aData['aUser'] = $this->MUser->mUserList($firstname_f ,$lastname_f ,$gender_f);
         $this->load->view('RP/vUserList',$aData);
  }

  public function rSave(){
      //receive parameter from view page
      $firstname = $this->input->post('sFirstname');       //get post data from view page
      $lastname = $this->input->post('sLastname');
      $dob = $this->input->post('sDob');
      $gender = $this->input->post('sGender');
      $action_mode = $this->input->post('action_mode');

      if ($action_mode == '1') {
        //save new user to register
        $data = array('Firstname' =>$firstname ,        //store data from view page as array
                      'Lastname'=>$lastname,
                      'DOB'=>$dob,
                      'Gender'=>$gender
                    );
         $res = $this->MUser->mSave($data);
         echo $res;
      }else{
        //update request
        $id = $this->input->post('UserID');
        $data = array(                        //store array before send to Model
                      'Firstname' => $firstname,
                      'Lastname' => $lastname,
                      'DOB' => $dob,
                      'Gender' => $gender
                    );
                    $res = $this->MUser->mUpdate($id,$data);      //result
                    echo $res;
      }
  }

  //deleting
  public function rRemove(){
      $id = $this->input->get('UserID');
      $data = array('ID' => $id);
      $res = $this->MUser->mRemove($data);
      echo $res;
  }


}
?>
