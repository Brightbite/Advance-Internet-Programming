<?php
 defined('BASEPATH' OR exit('No direct script access allowed'));
 class mLogin extends CI_Model
 {
       function __construct()
       {
           parent::__construct();
       }

       public function Login ($username,$password){
           $SQL = "SELECT CustomerFirstname,CustomerLastname,Username,PrivilegeID FROM customer WHERE Username = '$username' AND Password = '$password'";

          //echo $SQL;
        //  $SQL = "SELECT firstname,lastname FROM member WHERE email = $email ";
        // //  if ($email == $loginData){
        // //    $SQL.=" AND email = '$email'";
        // //  }
         $query = $this->db->query($SQL);
          if ($query->num_rows() > 0) {
            return $query->row();
          }else{
            return 'empty';
          }
       }
}
?>