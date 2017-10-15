<?php
defined('BASEPATH' OR exit('No direct script access allowed'));
class mCatalog extends CI_Model
{
      function __construct()
      {
          parent::__construct();
      }

//catalogue menu
      public function mCatalogList(){
            $SQL = "SELECT * FROM category ";
            $query = $this->db->query($SQL);
            if ($query->num_rows() > 0) {
              return $query->result();
            }else{
              return 'empty';
            }
      }
}
 ?>
