<?php
 defined('BASEPATH' OR exit('No direct script access allowed'));
 class mUser extends CI_Model
 {
       function __construct()
       {
           parent::__construct();
       }
       //updated list
       public function mUserList($fname, $lname, $email){
              //SQL Statement
              $SQL = "SELECT * FROM member WHERE 1 ";
              if ($fname !='') {
                  $SQL.=" AND Firstname LIKE '%$fname%'";
              }
              if ($lname !='') {
                  $SQL.=" AND Lastname LIKE '%$lname%'";
              }
              if ($email !=''){
                $SQL.=" AND email LIKE '%$email%'";
              }
              // echo $SQL;
              $query = $this->db->query($SQL);
              if ($query->num_rows() > 0) {
                return $query->result();
              }else{
                return 'empty';
              }
       }
       //Add function
       public  function mSave($data){
              if ($this->db->insert('member',$data)) { //INSERT .... INTO register
                return 'success';
              }else{
                return 'error';
              }
       }

       //Delete function
       public function mRemove($data){
            if ($this->db->delete('member',$data)) { // DELETE FROM register ....
              return 'delete success';
            }else{
              return 'error';
            }

       }

      //Update function
       public function mUpdate($id,$data){
            $this->db->where('ID',$id); // WHERE id = ' ';
            if ($this->db->update('member',$data)) { // UPDATE SET ...
              return "success";
            }else{
              return 'error';
         }
       }

 }
 ?>
