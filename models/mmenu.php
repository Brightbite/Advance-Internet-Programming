<?php
 defined('BASEPATH' OR exit('No direct script access allowed'));
 class mmenu extends CI_Model
 {

       function __construct()
       {

       }
       public function index(){
         echo 'menu model';
       }
       public  function MTest(){
               echo 'return from menu model';
       }
 }


 ?>
