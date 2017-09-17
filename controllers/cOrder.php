<?php
defined('BASEPATH' OR exit('No direct script access allowed'));

class cOrder extends CI_Controller {

  function __construct(){
          parent::__construct();
          $this->load->helper('url');
          $this->load->library('cart');
          $this->load->library('session');
          // $this->load->library('paypalexpress');
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
    $this->load->view('vCart',$index); //load view
    $this->load->view('template/footer');

  }

  public function saveorder1($paymentType){

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
              $nOrder = $cDate.$cMonth.$cYear.'-'.$nNext;
          }

          $OrderDate = $cYear.'-'.$cMonth.'-'.$cDate.' '.$cTime;

          //save order
          $OrderData = array('OrderID' => $nOrder,
                             'CustomerID' => $custID,
                             'PaymentID' => $custID,
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

                      //  echo var_dump($order_detail);

                       // Insert product imformation with order detail, store in cart also store in database.

                      $this->MOrder->msaveOrderDetail($order_detail);
             }

          }
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
         $this->cart->destroy();
          // redirect('receipt/1');
  }

  public function saveorder2($paymentType){

        $custName = $this->session->userdata('customerNameSess');

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
              // $nOrder = $aLastOrder[0].'-'.$nNext;
              $nOrder = $cDate.$cMonth.$cYear.'-'.$nNext;
          }

          $OrderDate = $cYear.'-'.$cMonth.'-'.$cDate.' '.$cTime;

          //save order
          $OrderData = array('OrderID' => $nOrder,
                             'CustomerID' => $custID,
                             'PaymentID' => $custID,
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

          }
          // $cName = $this->input->post('cName');
        
          $DataPayment = array('OrderID' =>  $nOrder,
                              'PaymentType' => '2',
                              'PaymentAmount' => $this->cart->total(),
                              'CardName' => $custName.'(Paypal)',
                              'CardNumber' => 'Paypal',
                              'CardExpire' => '-',
                              'CardVerify' => '-'
        );
        $this->MOrder->mSavepayment($DataPayment);
        $this->cart->destroy();
          redirect('receipt/2');


  }

}
?>
