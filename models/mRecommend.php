<?php
 defined('BASEPATH' OR exit('No direct script access allowed'));
 class mRecommend extends CI_Model
 {
       function __construct()
       {
           parent::__construct();
       }

       public function getGruopRecommend($CustomerID=''){

               if (isset($CustomerID)){
                 if ($CustomerID != ''){
                   $CustomerID = $CustomerID;
                 }else{
                   $CustomerID = '';
                 }
               }
            //  echo 'model'.$CustomerID;


               $SQL = "SELECT history.CategoryID  FROM  history  ";
               if ($CustomerID != '') {
                  $SQL.=" WHERE CustomerID = '$CustomerID' ";
               }
               $SQL.="  ORDER BY   history.Visited_Times DESC  LIMIT 2 ";

               $query = $this->db->query($SQL);
               if ($query->num_rows() > 0) {
                 return $query->result();
               }else{
                 return 'empty';
               }
       }

       public function mRecommendation($groupRecommend){
         if (isset($groupRecommend)){
           if ($groupRecommend != ''){
             $groupRecommend = $groupRecommend;
           }else{
             $groupRecommend = '';
           }
         }

         $SQL = "SELECT
         product.ProductID,
         product.ProductName,
         product.ProductDesc,
         product.CategoryID,
         product.Picture,
         product.Price
         FROM
         product";

         if ($groupRecommend != '') {
            $SQL.=" WHERE CategoryID IN($groupRecommend) ";
         }

         $SQL.=" ORDER BY RAND() LIMIT 3";

         $query = $this->db->query($SQL);
         if ($query->num_rows() > 0) {
           return $query->result();
         }else{
           return 'empty';
         }
       }

       public function mRecImage($groupRecommend){
         if (isset($groupRecommend)){
           if ($groupRecommend != ''){
             $groupRecommend = $groupRecommend;
           }else{
             $groupRecommend = '';
           }
         }
         $SQL = "SELECT
         product.ProductID,
         product.ProductName,
         product.ProductDesc,
         product.CategoryID,
         product.Picture,
         product.Price
         FROM
         product";
         if ($groupRecommend != '') {
            $SQL.=" WHERE CategoryID IN($groupRecommend) ";
         }
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
