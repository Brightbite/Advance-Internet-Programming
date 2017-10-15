<?php
 defined('BASEPATH' OR exit('No direct script access allowed'));
 class mRecommend extends CI_Model
 {
       function __construct()
       {
           parent::__construct();
       }

//group of three recommendation in home page
       public function mRecommendation(){
         $SQL = "SELECT
         product.ProductID,
         product.ProductName,
         product.ProductDesc,
         product.CategoryID,
         product.Picture,
         product.Price
         FROM product";
         $SQL.=" ORDER BY RAND() LIMIT 3";
         $query = $this->db->query($SQL);
         if ($query->num_rows() > 0) {
           return $query->result();
         }else{
           return 'empty';
         }
       }

//big one recommendation in home page
       public function mRecImage(){

         $SQL = "SELECT
         product.ProductID,
         product.ProductName,
         product.ProductDesc,
         product.CategoryID,
         product.Picture,
         product.Price
         FROM
         product";

         $SQL.=" ORDER BY RAND() LIMIT 1";
         $query = $this->db->query($SQL);
         if ($query->num_rows() > 0) {
           return $query->row();
         }else{
           return 'empty';
         }
       }
}
?>
