<?php
 defined('BASEPATH' OR exit('No direct script access allowed'));
 class mUser extends CI_Model
 {
       function __construct()
       {
           parent::__construct();
       }
       //updated list
       public function mUserList(){
              //SQL Statement
              $SQL = "SELECT * FROM register";
              $query = $this->db->query($SQL);
              if ($query->num_rows() > 0) {
                return $query->result();
              }else{
                return 'empty';
              }
       }
       //Add function
       public  function mSave($data){
              if ($this->db->insert('register',$data)) { //INSERT .... INTO register
                return 'success';
              }else{
                return 'error';
              }
       }

       //Delete function
       public function mRemove($data){
            if ($this->db->delete('register',$data)) { // DELETE FROM register ....
              return 'delete success';
            }else{
              return 'error';
            }

       }

      //Update function
       public function mUpdate($id,$data){
            $this->db->where('ID',$id); // WHERE id = ' ';
            if ($this->db->update('register',$data)) { // UPDATE SET ...
              return "success";
            }else{
              return 'error';
         }
       }

 }
 ?>
