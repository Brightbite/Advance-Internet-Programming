<?php
defined('BASEPATH' OR exit('No direct script access allowed'));

class cUser extends CI_Controller {

  function __construct(){
          parent::__construct();
          $this->load->helper('url');
          $this->load->model('mUser','MUser'); //load model first before view
  }


  public function index()
  {

    //$this->load->controller('cmenu','CMenu');
    //$this->MMenu->MTest(); //M IN C
    //$this->CMenu->index(); //C IN C
    // $z = 100;
    // $x = 200;
    // $data['z'] = $z;
    // $data['x'] = $x;
    $data = array();

    $this->load->view('vUser',$data); //load view
  }

  public function cuserlist(){
         $aData = array();
        //  ดึงข้อมูลผู้ใช้
         $aData['aUser'] = $this->MUser->mUserList();
         $this->load->view('vUserList',$aData);
  }

  public function save(){

      $firstname = $this->input->post('sFirstname');            //get post data from view page
      $lastname = $this->input->post('sLastname');
      $dob = $this->input->post('sDob');
      $gender = $this->input->post('sGender');
      $action_mode = $this->input->post('action_mode');






      if ($action_mode == '1') {
        //save new
        $data = array('Firstname' =>$firstname ,                  //store data from view page as array and put it to database
                      'Lastname'=>$lastname,
                      'DOB'=>$dob,
                      'Gender'=>$gender
                    );
         $res = $this->MUser->mSave($data);
         echo $res;
      }else{
        // update

        $id = $this->input->post('UserID');
        $data = array(                        //store array before send to Model   'ID' = db_column  =>  $id = variable that stored parameter from view.
                      'Firstname' => $firstname,
                      'Lastname' => $lastname,
                      'DOB' => $dob,
                      'Gender' => $gender
                    );
                    $res = $this->MUser->mUpdate($id,$data);            //send
                    echo $res;

      }

  }

  //extends
  public function remove(){

    $id = $this->input->get('UserID');

    $data = array('ID' => $id);
    $res = $this->MUser->mRemove($data);
    echo $res;
  }


}
?>
