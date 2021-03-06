<?php
defined('BASEPATH' OR exit('No direct script access allowed'));

class cOrder extends CI_Controller {

  function __construct(){
          parent::__construct();
          $this->load->helper('url');
          $this->load->library('cart');
          $this->load->library('session');
          $this->load->model('mOrder','MOrder');
  }

  public function index()
  {
    if ($this->session->has_userdata('PrivilegeID')) {
        $PrivilegeID = $this->session->userdata('PrivilegeID');
    }else {
        $PrivilegeID = '';
    }

    if ($this->session->has_userdata('customerNameSess')) {
        $custname = $this->session->userdata('customerNameSess');
    }else {
        $custname = '';
    }

    if ($this->session->has_userdata('customerLastSess')) {
        $custlast = $this->session->userdata('customerLastSess');
    }else {
        $custlast = '';
    }


    $header = array(
      'title' => 'My Account',
      'keywords' => 'account',
      'description' => 'this is web application for online retailer',
      'author' => 'Kunanon Pititheerachot #12634123 UTS',
      'custname'=> $custname,
      'custlast'  => $custlast

    );

    $index = array(
      'top' => 'Home',
      ''  => $custname,
      ''  => $custlast
    );

    $data = array();
    $this->load->view('template/header',$header);
    $this->load->view('vCart',$index);
    $this->load->view('template/footer');

  }
//credit card payment method
  public function saveorder1($paymentType){

        if ($this->session->has_userdata('customerIDSess')) {
            $custID = $this->session->userdata('customerIDSess');
        }else {
            $custID = '';
        }

        $shipFirstName = $this->session->userdata('shippingFirstname');
        $shippingLastname = $this->session->userdata('shippingLastname');
        $shippingAddr = $this->session->userdata('shippingAddr');
        $shippingAddr2 = $this->session->userdata('shippingAddr2');
        $shippingCity = $this->session->userdata('shippingCity');
        $shippingState = $this->session->userdata('shippingState');
        $shippingPostcode = $this->session->userdata('shippingPostcode');
        $shippingCountry = $this->session->userdata('shippingCountry');
        $shippingEmail = $this->session->userdata('shippingEmail');
        $shippingTel = $this->session->userdata('shippingTel');

        //check last order number
          $olastOrder =  $this->MOrder->mgetOrderID();
          $tlastOrder = $olastOrder->OrderID; //get orderID from last order
          date_default_timezone_set("Australia/Sydney");
          //setting time format
          $cDate = date('d');
          $cMonth = date('m');
          $cYear = date('Y');
          $cTime = date('H:i:s');
          //check if user has any purchase history if not create new one
          if ($tlastOrder == 'empty') {
              $nOrder = $cDate.$cMonth.$cYear.'-1';
          }else{
              $aLastOrder = explode("-",$tlastOrder);
              echo $aLastOrder[1];
              $nNext = $aLastOrder[1] + 1;
              $nOrder = $cDate.$cMonth.$cYear.'-'.$nNext;
          }

          $OrderDate = $cYear.'-'.$cMonth.'-'.$cDate.' '.$cTime;

          //save order
          $OrderData = array('OrderID' => $nOrder,
                             'CustomerID' => $custID,
                             'OrderQTY' => $this->cart->total_items(),
                             'OrderTotal' => $this->cart->total(),
                             'PaymentType' => $paymentType,
                             'OrderDate' => $OrderDate,
                             'ShippingFirstName' => $shipFirstName,
                             'ShippingLastName' => $shippingLastname,
                             'ShippingAddress1' => $shippingAddr,
                             'ShippingAddress2' => $shippingAddr2,
                             'ShippingCity' => $shippingCity,
                             'ShippingState' => $shippingState,
                             'ShippingPostcode' => $shippingPostcode,
                             'ShippingCountry' => $shippingCountry,
                             'ShippingEmail' => $shippingEmail,
                             'ShippingTel' => $shippingTel
         );
         $this->MOrder->msaveOrder($OrderData);

          if ($cart = $this->cart->contents()){
              foreach ($cart as $item){
                       $order_detail = array(
                       'OrderID' => $nOrder,
                       'ProductID' => $item['id'],
                       'ProductImage' => $item['image'],
                       'ProductName' => $item['name'],
                       'Quantity' => $item['qty'],
                       'Price' => $item['price']
                       );
                      $this->MOrder->msaveOrderDetail($order_detail);
             }

          }
          //card information
          $cAmount = $this->input->post('cAmount');
          $cName = $this->input->post('cName');
          $cNum  = $this->input->post('cNum');
          $cExpireM = $this->input->post('cExpireM');
          $cExpireY = $this->input->post('cExpireY');
          $cVerify = $this->input->post('cVerify');
          $cExpire = $cExpireM.'/'.$cExpireY;
          echo $cAmount;
          $DataPayment = array('OrderID' =>  $nOrder,
                              'PaymentType' => $paymentType,
                              'PaymentAmount' => $this->cart->total(),
                              'CardName' => $cName,
                              'CardNumber' => $cNum,
                              'CardExpire' => $cExpire,
                              'CardVerify' => $cVerify
        );

        $this->MOrder->mSavepayment($DataPayment);
        $summOrder = array('LastOrder' => $nOrder);
        $this->session->set_userdata($summOrder);
        $this->cart->destroy();
        redirect('receipt/1');
  }

//paypal payment method
  public function saveorder2($paymentType){
        $custName = $this->session->userdata('customerNameSess');

        if ($this->session->has_userdata('customerIDSess')) {
            $custID = $this->session->userdata('customerIDSess');
        }else {
            $custID = '';
        }
        $shipFirstName = $this->session->userdata('shippingFirstname');
        $shippingLastname = $this->session->userdata('shippingLastname');
        $shippingAddr = $this->session->userdata('shippingAddr');
        $shippingAddr2 = $this->session->userdata('shippingAddr2');
        $shippingCity = $this->session->userdata('shippingCity');
        $shippingState = $this->session->userdata('shippingState');
        $shippingPostcode = $this->session->userdata('shippingPostcode');
        $shippingCountry = $this->session->userdata('shippingCountry');
        $shippingEmail = $this->session->userdata('shippingEmail');
        $shippingTel = $this->session->userdata('shippingTel');

          //check last order number
          $olastOrder =  $this->MOrder->mgetOrderID();
          $tlastOrder = $olastOrder->OrderID; //get orderID from last order
          date_default_timezone_set("Australia/Sydney");
          //setting time format
          $cDate = date('d');
          $cMonth = date('m');
          $cYear = date('Y');
          $cTime = date('H:i:s');
          //check if user has any purchase history if not create new one
          if ($tlastOrder == 'empty') {
              $nOrder = $cDate.$cMonth.$cYear.'-1';
          }else{

              $aLastOrder = explode("-",$tlastOrder);
              echo $aLastOrder[1];
              $nNext = $aLastOrder[1] + 1;
              $nOrder = $cDate.$cMonth.$cYear.'-'.$nNext;
          }

          $OrderDate = $cYear.'-'.$cMonth.'-'.$cDate.' '.$cTime;

          //save order
          $OrderData = array('OrderID' => $nOrder,
                             'CustomerID' => $custID,
                             'OrderQTY' => $this->cart->total_items(),
                             'OrderTotal' => $this->cart->total(),
                             'PaymentType' => $paymentType,
                             'OrderDate' => $OrderDate,
                             'ShippingFirstName' => $shipFirstName,
                             'ShippingLastName' => $shippingLastname,
                             'ShippingAddress1' => $shippingAddr,
                             'ShippingAddress2' => $shippingAddr2,
                             'ShippingCity' => $shippingCity,
                             'ShippingState' => $shippingState,
                             'ShippingPostcode' => $shippingPostcode,
                             'ShippingCountry' => $shippingCountry,
                             'ShippingEmail' => $shippingEmail,
                             'ShippingTel' => $shippingTel
         );

         $this->MOrder->msaveOrder($OrderData);

          if ($cart = $this->cart->contents()){
              foreach ($cart as $item){
                       $order_detail = array(
                       'OrderID' => $nOrder,
                       'ProductID' => $item['id'],
                       'ProductImage' => $item['image'],
                       'ProductName' => $item['name'],
                       'Quantity' => $item['qty'],
                       'Price' => $item['price']
                       );
                      $this->MOrder->msaveOrderDetail($order_detail);
             }
          }

          $DataPayment = array('OrderID' =>  $nOrder,
                              'PaymentType' => '2',
                              'PaymentAmount' => $this->cart->total(),
                              'CardName' => $custName.'(Paypal)',
                              'CardNumber' => 'Paypal',
                              'CardExpire' => '-',
                              'CardVerify' => '-'
        );

        $this->MOrder->mSavepayment($DataPayment);
        $summOrder = array('LastOrder' => $nOrder);
        $this->session->set_userdata($summOrder);
        $this->cart->destroy();
        redirect('receipt/2');
  }
}
?>
