<?php
 defined('BASEPATH' OR exit('No direct script access allowed'));
 class mUser extends CI_Model
 {
       function __construct()
       {
           parent::__construct();
       }

       public function mUserList($fname, $lname, $email){
              $SQL = "SELECT * FROM customer WHERE 1 ";
              if ($fname !='') {
                  $SQL.=" AND CustomerFirstname LIKE '%$fname%'";
              }
              if ($lname !='') {
                  $SQL.=" AND customerLastname  LIKE '%$lname%'";
              }
              if ($email !=''){
                  $SQL.=" AND Email     LIKE '%$email%'";
              }
              $query = $this->db->query($SQL);
              if ($query->num_rows() > 0) {
                return $query->result();
              }else{
                return 'empty';
              }
       }
       public  function mSave($data){
              if ($this->db->insert('customer',$data)) {
                return 'success';
              }else{
                return 'error';
              }
       }


       public function mRemove($data){
            if ($this->db->delete('customer',$data)) { 
              return 'delete success';
            }else{
              return 'error';
            }

       }

       public function mUpdate($email,$data){
            $this->db->where('Email',$email);
            if ($this->db->update('customer',$data)) {
              return "success";
            }else{
              return 'error';
         }
       }

       public function mPrivilegeList(){
             $SQL = "SELECT * FROM customer_privilege";
             $query = $this->db->query($SQL);
             if ($query->num_rows() > 0) {
               return $query->result();
             }else{
               return 'empty';
             }
       }

 }
 ?>
