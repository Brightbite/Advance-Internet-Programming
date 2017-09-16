<?php
 defined('BASEPATH' OR exit('No direct script access allowed'));
 class mProduct extends CI_Model
 {
       function __construct()
       {
           parent::__construct();
       }

       public function mProDetail($ProdID){
             $SQL = "SELECT * FROM product WHERE ProductID = '$ProdID'";


             $query = $this->db->query($SQL);
             if ($query->num_rows() > 0) {
               return $query->row();
             }else{
               return 'empty';
             }
       }

       public function mProductByCat($CatalogID){

               $SQL = "SELECT * FROM product WHERE CategoryID = '$CatalogID'";

               $query = $this->db->query($SQL);
               if ($query->num_rows() > 0) {
                 return $query->result();
               }else{
                 return 'empty';
               }
       }
}

?>
