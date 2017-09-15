<?php
defined('BASEPATH' OR exit('No direct script access allowed'));

class cCheckout extends CI_Controller {

  function __construct(){
          parent::__construct();
          $this->load->library('cart');
          $this->load->library('session');
          // $this->load->library('paypalexpress');
          $this->load->model('mOrder','MOrder');
          $this->load->helper('url');
  }

  public function index()
  {
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

    if ($this->session->has_userdata('PrivilegeID')) {
        $PrivilegeID = $this->session->userdata('PrivilegeID');
    }else {
        $PrivilegeID = '';
    }


    $header = array(
      'title' => 'Checkout',
      'keywords' => 'checkout',
      'description' => 'this is web application for online retailer',
      'author' => 'Kunanon Pititheerachot #12634123 UTS',
      'custname'=> $custname,
      'custlast'  => $custlast,
      'privid' => $PrivilegeID

    );

    $shippingFirstname = $this->input->post('sFname');
    $shippingLastname = $this->input->post('sLname');
    $shippingAddr = $this->input->post('sAddr');
    $shippingAddr2 = $this->input->post('sAddr2');
    $shippingCity = $this->input->post('sCity');
    $shippingState = $this->input->post('sState');
    $shippingPostcode = $this->input->post('sPostcode');
    $shippingCountry = $this->input->post('sCountry');
    $shippingEmail = $this->input->post('sEmails');
    $shippingTel = $this->input->post('sTels');

    $address = array('shippingFirstname' => $shippingFirstname,
                      'shippingLastname' => $shippingLastname,
                      'shippingAddr' => $shippingAddr,
                      'shippingAddr2' => $shippingAddr2,
                      'shippingCity' => $shippingCity,
                      'shippingState' => $shippingState,
                      'shippingPostcode' => $shippingPostcode,
                      'shippingCountry' => $shippingCountry,
                      'shippingEmail' => $shippingEmail,
                      'shippingTel' => $shippingTel
                      );

    $this->session->set_userdata($address);
    $this->load->view('template/header',$header);

    $this->load->view('vCheckout',$address);
    $this->load->view('template/cartfooter');

  }

  // public function saveorder($paymentType){
  //
  //
  //   echo $this->session->userdata('shippingFirstname');
  //
  //
  // }

  public function saveorder($paymentType){

        if ($this->session->has_userdata('customerIDSess')) {
            $custID = $this->session->userdata('customerIDSess');
        }else {
            $custID = '';
        }

        if ($this->session->has_userdata('shippingFirstname')) {
            $shipFirstName = $this->session->userdata('shippingFirstname');
        }else {
            $shipFirstName = '';
        }

          $olastOrder =  $this->MOrder->mgetOrderID();
          $tlastOrder = $olastOrder->OrderID;
          date_default_timezone_set("Australia/Sydney");
          //echo $tlastOrder;
          $cDate = date('d');
          $cMonth = date('m');
          $cYear = date('Y');
          $cTime = date('H:i:s');
          if ($tlastOrder == 'empty') {
              $nOrder = $cDate.$cMonth.$cYear.'-1';
          }else{

              $aLastOrder = explode("-",$tlastOrder);
              echo $aLastOrder[1];
              $nNext = $aLastOrder[1] + 1;
              $nOrder = $aLastOrder[0].'-'.$nNext;
          }

          $OrderDate = $cYear.'-'.$cMonth.'-'.$cDate.' '.$cTime;

          //save order
          $OrderData = array('OrderID' => $nOrder,
                             'CustomerID' => $custID,
                             'OrderTotal' => $this->cart->total(),
                             'PaymentType' => $paymentType,
                             'ShippingName' => $shipFirstName,
                             'OrderDate' => $OrderDate
         );
         $this->MOrder->msaveOrder($OrderData);

          if ($cart = $this->cart->contents()){
              foreach ($cart as $item){
                       $order_detail = array(
                       'OrderID' => $nOrder,
                       'ProductID' => $item['id'],
                       'Quantity' => $item['qty'],
                       'Price' => $item['price']
                       );

                       echo var_dump($order_detail);

                       // Insert product imformation with order detail, store in cart also store in database.

                      $this->MOrder->msaveOrderDetail($order_detail);
             }

             $this->cart->destroy();
          }

          redirect('home');


  }

}
?>
