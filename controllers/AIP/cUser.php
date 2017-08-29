<?php
defined('BASEPATH' OR exit('No direct script access allowed'));

class cUser extends CI_Controller {

  function __construct(){
          parent::__construct();
          $this->load->helper('url');
          $this->load->model('AIP/mUser','MUser'); //load model first before view
  }

  public function index()
  {
    $data = array();
    $this->load->view('AIP/vUser',$data); //load view
  }
  //showing updated table load from model
  public function aUserlist(){
         $aData = array();

         $firstname_f = $this->input->get('fristname_f');       //get post data from view page
         $lastname_f = $this->input->get('lastname_f');
         $gender_f = $this->input->get('gender_f');

         $aData['aUser'] = $this->MUser->mUserList($firstname_f ,$lastname_f ,$gender_f);
         $this->load->view('AIP/vUserList',$aData);
  }

  public function aSave(){
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
  public function aRemove(){
      $id = $this->input->get('UserID');
      $data = array('ID' => $id);
      $res = $this->MUser->mRemove($data);
      echo $res;
  }


}
?>
