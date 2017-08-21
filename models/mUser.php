<?php
 defined('BASEPATH' OR exit('No direct script access allowed'));
 class mUser extends CI_Model
 {

       function __construct()
       {
           parent::__construct();
       }

       public function mUserList(){
              // ใช้ฟังก์ชั่นของ CI ในการสร้าง Statement
              // $this->db->select('*');
              // $this->db->from('register');
              // $query = $this->db->get();
              // if ($query->num_rows() > 0) {
              //     return $query->result();
              // }else{
              //     return 'empty';
              // }

              //เขียนแบบ SQL Statement
              $SQL = "SELECT * FROM register";
              $query = $this->db->query($SQL);
              if ($query->num_rows() > 0) {
                  return $query->result();
              }else{
                  return 'empty';
              }
       }


       public  function mSave($data){
               if ($this->db->insert('register',$data)) { //INSERT .... INTO register
                  return 'success';
               }else{
                  return 'error';
               }
       }

       //extends
       public function mRemove($data){
         if ($this->db->delete('register',$data)) { // DELETE FROM register ....
            return 'delete success';
         }else{
            return 'error';
         }
       }
      //extends
       public function mUpdate($id,$data){
            $this->db->where('ID',$id); // WHERE id = ' ';                      //got it from google
            if ($this->db->update('register',$data)) { // UPDATE SET ...
              return "success"; //test javascript
            }else{
              return 'error';
         }
       }


 }

 ?>
