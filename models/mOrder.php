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
      // SELECT * FROM ORDER_DETAIL_TABLE ORD
      // LEFT JOIN PRODUCT_TABLE PDT
      // ON ORD.PRODUCT_ID_COULUMN = PDT.PRODUCT_ID_COULUMN
      // WHERE ORD.ORDER_ID_COLUMN = 'LAST_ORDER_ID'

  public function mgetLastOrder($LastOrderID){
    $SQL = "SELECT ORD.OrderID,
            ORD.ProductImage,
            ORD.ProductID,
            ORD.ProductName,
            ORD.Quantity,
            ORD.Price,
            PAY.PaymentID,
            PAY.CardName,
            PAY.CardNumber,
            PAY.CardExpire
            FROM order_detail ORD
            INNER JOIN payment PAY
            ON ORD.OrderID = PAY.OrderID
            WHERE ORD.OrderID = '$LastOrderID'            ";

        $query = $this->db->query($SQL);
        if ($query->num_rows() > 0) {
            return  $query->result();
        }else{
          return 'empty';
        }
  }

  public function mgetLastPayment($LastOrderID){
        $SQL = "SELECT *
                FROM payment
                WHERE OrderID = '$LastOrderID'";
        $query = $this->db->query($SQL);
        if ($query->num_rows() > 0) {
          return $query->row();
        }else{
          return 'empty';
        }
  }

  public function mgetHistory($CustomerID){
      $SQL = "SELECT ORD.*, PAY.*, DET.*
              FROM orders ORD, payment_type PAY, order_detail DET
              WHERE CustomerID = '$CustomerID'
              GROUP BY
              OrderDate DESC LIMIT 5
              ";

              $query = $this->db->query($SQL);
              if ($query->num_rows() > 0) {
                  return  $query->result();
              }else{
                return 'empty';
              }
  }

}

?>
