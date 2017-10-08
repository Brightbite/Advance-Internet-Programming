<?php
include 'cHome.php';
class Test_controller extends PHPUnit_Framework_TestCase
{

  private $controller;
  public function testHome()
  {
  	$this->requireController('cHome'); // assuming you have a applications/controllers/Home.php
  	$CI = new cHome();
  	$CI->index();
  }
}


 ?>
