<?php
include 'config.php';
class Test_config extends PHPUnit_Framework_TestCase
{

  private $config;
  public function setup() {
          $this->load->helper('url');
          $this->config = new config();
          echo base_url;
  }

  // /**
  // * @dataProvider additionConfig
  // */
  //
  // public function testAdd($a, $b, $expected) {
  //         $this->assertEquals($expected, $this->calculate->add($a, $b));
  // }
  //
  // /**
  // * @dataProvider multiplicationProvider
  // */
  //
  // public function testMultiplication($a, $b, $expected) {
  //         $this->assertEquals($expected, $this->calculate->multiplication($a, $b));
  // }
  //
  // public function additionConfig()
  // {
  //     return [
  //     'base_url' => ['http://aipretail.azurewebsites.net/'],
  //     ];
  // }
  //
  //
  //   public function multiplicationProvider()
  //   {
  //       return [
  //       '0*1=0' => [0, 1, 0],
  //       '1*5=5' => [1, 5, 5]
  //       ];
  //   }

}


 ?>
