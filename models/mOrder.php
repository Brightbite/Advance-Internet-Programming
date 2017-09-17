<?php
 defined('BASEPATH' OR exit('No direct script access allowed'));
 class mOrder extends CI_Model
 {
       function __construct()
       {
           parent::__construct();
       }

  public function mgetOrderID(){
    $SQL = "SELECT
              orders.OrderID
              FROM
              orders
              GROUP BY
              orders.OrderDate DESC LIMIT 1
              ";

        $query = $this->db->query($SQL);
        if ($query->num_rows() > 0) {
            return  $query->row();
        }else{
          return 'empty';
        }
  }

  public function mSavepayment($DataPayment){
    $this->db->insert('payment',$DataPayment);
  }

  public function msaveOrder($OrderData){
      $this->db->insert('orders',$OrderData);
  }

  public function msaveOrderDetail($OrderData){
      $this->db->insert('order_detail',$OrderData);
  }
}

?>
