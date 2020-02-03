<?php
 class User_model extends CI_Model

 {
 			function get_cat()
 			{
 				$qry = $this->db->query("SELECT * FROM category WHERE status='1' ");
 				if(isset($qry) && $qry->num_rows()>0)
 				{
 					return $qry->result_array();
 				}else{
 					return False;
 				}
 			}
   }
   ?>


