<?php
 defined('BASEPATH' OR exit('No direct script access allowed'));
 class mLogin extends CI_Model
 {
       function __construct()
       {
           parent::__construct();
       }

       public function Login ($username,$password){
           $SQL = 'SELECT *
                   FROM customer
                   WHERE Username = '.$this->db->escape($username). 'AND Password =' .$this->db->escape($password); //escape for preventing SQL injection
         $query = $this->db->query($SQL);
          if ($query->num_rows() > 0) {
            return $query->row();
          }else{
            return 'empty';
          }
       }

}
?>
