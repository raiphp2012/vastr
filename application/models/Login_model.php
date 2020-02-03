<?php
/**
 * 
 */
class Login_model extends CI_Model
{
  
     public function read(){

          $query = $this->db->query("SELECT * FROM `tbl_user`");

       return $query->result();

  }    

  public function existingphone($phone,$token){
      $qry = $this->db->query("SELECT * FROM `tbl_user` WHERE user_phone='$phone' AND token='$token'");
      if($qry){
    return $qry->row_array();
  }else{
    return False;
  }

  }

  public function check_email($email){
      $qry = $this->db->query("SELECT * FROM `tbl_user` WHERE user_email='$email'");
      if($qry){
    return $qry->row_array();
  }else{
    return False;
  }

  }
  
   public function register($data){


       if($this->db->insert('tbl_user',$data))

       {    
           return 'Data is inserted successfully';

       }
         else

       {
           return "Error has occured";

       }

   }

      public function user_register($phone,$data){

            $this->db->WHERE('user_phone',$phone);
       $qry = $this->db->update('tbl_user',$data);
        if($qry)
       {    
           return 'User Register successfully';

       }
         else

       {
           return "Error has occured";

       }
        }
  
  public function get_all_states(){
       $query = $this->db->query("SELECT * FROM `state`");

       return $query->result();

  }   

  public function get_all_citis($id){
       $query = $this->db->query("SELECT * FROM `citis` WHERE state_id=$id");

       return $query->result();
  }
  
        public function user_profile_update($user_id,$data){

        $this->db->WHERE('user_id',$user_id);
       $qry = $this->db->update('tbl_user',$data);
        if($qry)
       {    
           return 'Profile Updated successfully';

       }
         else

       {
           return "Error has occured";

       }

   }
  
      public function uddate_token($user_id,$data){

            $this->db->WHERE('user_id',$user_id);
       $qry = $this->db->update('tbl_user',$data);
        if($qry)
       {    
           return 'Token Updated successfully';

       }
         else

       {
           return "Error has occured";

       }

   } 
    public function upload_image($user_id,$data){
        $this->db->WHERE('user_id',$user_id);
       $qry = $this->db->update('tbl_user',$data);
        if($qry)
       {    
           return 'Profile Image Updated successfully';
       }
         else
       {
           return "Error has occured";

       }
   }
     function all_category()
   {
     $this->db->where('status','1');
   // $this->db->order_by('c_order','ASC');
    $data=$this->db->get('category');
    if($data){
    return $data->result_array();
  }else{
    return False;
  }
}
   function all_brand()
   {
     $this->db->where('status','1');
    $data=$this->db->get('brand');
    if($data){
    return $data->result_array();
  }else{
    return False;
  }
}

   function all_sub_category()
   {
  $qry = $this->db->query("SELECT * FROM subcategory WHERE status='1' ORDER BY category_id ");
        if(isset($qry) && $qry->num_rows()>0)
        {
        return $qry->result_array();
        }else{
        return 'No Data Avvaliable in to Databse';  
        }
}
  public function add_to_cart($data)
{
       if($this->db->insert('cart',$data))

       {    
           return 'Cart Added successfully';
       }
         else
       {
           return False;
       }
}

  public function view_cart($user_id)
  {
      //$qry = $this->db->query("SELECT * FROM `cart` WHERE user_id='$user_id' AND status='1' ");
          $this->db->select('*')
           ->from('cart')
           ->join('product', 'cart.pro_id = product.pro_id')
           ->where('user_id',$user_id);
           $data = $this->db->get();
           return $data->result_array(); 
  }  
    public function get_single_product($cat_id,$brand_id,$weight){
      $qry = $this->db->query("SELECT * FROM `product`  WHERE pro_category_id='$cat_id' AND brand_id=$brand_id AND pro_quantity='$weight' AND  status='1' ");
      if($qry){
    return $qry->result_array();
  }else{
    return False;
  }

  }  

  function cart_delete($id,$color,$size,$user_id)
  {
    $this->db->WHERE('pro_id',$id,'colour',$color,'size',$size,'user_id',$user_id);
    if($this->db->delete('cart')){
      return "Cart Item Delete successfully";
    }else{
          return False;
    }
  }

    function wishlist_delete($id,$user_id)
  {
    $this->db->WHERE('pro_id',$id,'user_id',$user_id);
    if($this->db->delete('wishlist')){
      return "Wishlist Item Delete successfully";
    }else{
          return False;
    }
  }
    function add_delivery_address($data)
  {
         if($this->db->insert('shipping_address',$data)){
              return "Address Added successfully";
              }else{
          return False;


              }
  } 
  function get_delivery_address($id)
  {
    //print_r($id);die();
      $qry = $this->db->query("SELECT *,(select user_name from  tbl_user where shipping_address.user_id = tbl_user.user_id ) as user_name FROM `shipping_address`  WHERE user_id='$id' ");
    //  echo $this->db->last_query();die();
      if($qry){
    // return $qry->result_array();
       return $qry->result();
  }else{
    return False;
  }
  }
     function get_feedback($id)
  {
      $qry = $this->db->query("SELECT *,(select pro_name from product where product_feedback.pro_id=product.pro_id) as product_name FROM `product_feedback` WHERE user_id!=$id ");
      if($qry && $qry->num_rows()){
       return $qry->result();
  }else{
    return "NO Data Found";
  }
  }

   function add_feedback($data)
  {
         if($this->db->insert('product_feedback',$data)){
              return "Feedback Added successfully";
              }else{
          return False;


              }
  }

  function del_delivery_address($id)
  {
       $this->db->WHERE('od_id',$id);
    if($this->db->delete('shipping_address')){
      return "Delivery Address Delete successfully";
    }else{
          return "Something Wrong";
    }
  }

  function get_promocode()
  {
    $this->db->WHERE('status',1);
    $query = $this->db->get(' promocode');
    if($query && $query->num_rows()>0){
          return $query->result();
  
    }else{
      return "No Data Found";
    }
  }
  
  function banner_descount_product($b_id,$c_id)
{
    $this->db->WHERE('status',1);
    $query = $this->db->get(' product');
    if($query && $query->num_rows()>0){
          return $query->result();
  
    }else{
      return "No Data Found";
    }
}
  
      function add_user_referal_code($user_id)
{
    //$this->db->WHERE('user_id',$user_id);
    $query = $this->db->query("select code as data from referal_code where user_id=$user_id ");
    if($query && $query->num_rows()>0){
          return $query->row();
  
    }else{
      return "No Data Found";
    }
}
  function add_redemeed_data($remeed_id,$code)
  {
  $query = $this->db->query("select * from referal_code where id=$remeed_id AND code=$code ");
    if($query && $query->num_rows()>0){
          return $query->row();
  
    }else{
      return "No Data Found";
    }
}
  
  function get_wallet_data($user_id)
  {
   $query = $this->db->query("select *,(select user_name from tbl_user where wallet.user_id=tbl_user.user_id) as user_name from wallet where user_id=$user_id");
    
    if($query && $query->num_rows()>0){
          return $query->result();
  
    }else{
      return "No Data Found";
    }
  }
function adminvalid($email,$pass)
{
  // print_r($email);die();
  $qry = $this->db->query("SELECT * FROM admin WHERE username='$email' AND password='$pass' ");
      if($qry && $qry->num_rows()>0){
        return $qry->row_array();
      }else{
        return False;
      }
}
function uservalid($email,$pass)
{
  // print_r($email);die();
  $qry = $this->db->query("SELECT * FROM tbl_user WHERE   user_email='$email' AND user_password='$pass' ");
  // echo $this->db->last_query();die();
      if($qry && $qry->num_rows()>0){
        return $qry->row_array();
      }else{
        return False;
      }
}
  function user_delete($id)
{
    $this->db->WHERE('user_id',$id);
    if($this->db->delete('tbl_user')){
      return "User Delete successfully";
    }else{
          return False;
    }
}
function getbanner()
{
  if($this->db->get('top_banner')){
    return row_array();
  }
}
      function app_image()
{
 $qry = $this->db->get('app_image');
 if($qry){
    return $qry->row_array();
  }else{
   return FALSE;
 }
} 
function get_latest_product()
      {
        $qry = $this->db->query("SELECT * FROM product WHERE status='1' AND pro_popular=1   LIMIT 8 ");
        if(isset($qry) && $qry->num_rows()>0)
        {
          return $qry->result_array();
        }else{
          return False;
        }
      }
    function get_recent_product($id)
      {
         $this->db->select('*')
           ->from('recent_product')
           ->join('product','recent_product.pro_id = product.pro_id')
           ->where('user_id',$id);
           $data = $this->db->get();
           return $data->result_array();
      }

      function all_product($cat_id,$sub_id,$c_id)
      {
        $product='';

        if($cat_id!='' && $sub_id!='' && $c_id!=''){
          $qry = $this->db->query("SELECT * FROM product WHERE pro_category_id=$cat_id AND pro_sub_category=$sub_id AND pro_child=$c_id");
          $product =  $qry->result_array();
        }else if ($cat_id!='' && $sub_id!=''){
           $qry = $this->db->query("SELECT * FROM product WHERE pro_category_id=$cat_id AND pro_sub_category=$sub_id ");
          $product =  $qry->result_array();

        }else if ($cat_id!=''){
           $qry = $this->db->query("SELECT * FROM product WHERE pro_category_id=$cat_id");
          $product =  $qry->result_array();

        }else{
                 $qry = $this->db->query("SELECT * FROM product");
          $product =  $qry->result_array();

        }

        return $product;
       
      }

      function save_transction($data)
      {
        $user_id = ($data['user_id']);
            if($this->db->insert('transction_history',$data))

       {    
        $this->db->where('user_id',$user_id);
        $this->db->delete('cart');
           return 'Data is inserted successfully';

       }
         else

       {
           return "Error has occured";

       }
      }

      function get_transction($user_id)
      {
        
      $qry =   $this->db->query("SELECT * FROM transction_history WHERE user_id=$user_id");
            if($qry && $qry->num_rows()>0){
              $data = $qry->row_array();
             $pro_id = json_decode($data['product_id']);
              for ($i=0; $i <$pro_id[0] ; $i++) { 
                
                
              }
             print_r($pro_id);
            
             die();
            }
      }
      function all_size()
      {
     $qry = $this->db->query("SELECT * FROM size");
      if($qry){
          return $qry->row_array();
      }
    }
	 function all_sub_subchild($sub_id,$cat_id)
{
    $qry = $this->db->query("SELECT * FROM subchild WHERE sub_id=$sub_id AND category_id=$cat_id ");
        if(isset($qry) && $qry->num_rows()>0)
        {
        return $qry->result_array();
        }else{
        return 'No Data Avvaliable in to Databse';  
        }
}
}

?>