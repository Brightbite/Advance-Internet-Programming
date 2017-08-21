<?php
defined('BASEPATH' OR exit('No direct script access allowed'));

class Cmenu extends CI_Controller {

  function __construct(){
          parent::__construct();
          $this->load->helper('url');
  }

  public function index(){
      $this->mymenu();
  }

  private function mymenu(){
          echo "Menu";
  }

  protected function testmenu(){
         echo "testmenu";
  }

}
 ?>
