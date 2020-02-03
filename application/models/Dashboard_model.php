<?php
/**
 * 
 */
class Dashboard_model extends CI_Model
{
  
    function get_cat()
      {
        $qry = $this->db->query("SELECT * FROM `category` LIMIT 3 ");
        // echo $this->db->last_query();
        if(isset($qry) && $qry->num_rows()>0)
        {
          return $qry->result_array();
        }else{
          return False;
        }
      }
      function all_cat()
      {
        $qry = $this->db->query("SELECT * FROM category WHERE status='1' ");
        if(isset($qry) && $qry->num_rows()>0)
        {
          return $qry->result_array();
        }else{
          return False;
        }
      }
          function all_subcat()
      {
        $qry = $this->db->query("SELECT * FROM subcategory WHERE status='1' ORDER BY category_id ");
        if(isset($qry) && $qry->num_rows()>0)
        {
          return $qry->result_array();
        }else{
          return False;
        }
      } 
          function all_subchild()
      {
        $qry = $this->db->query("SELECT * FROM subchild WHERE status='1' ORDER BY sub_id ");
        if(isset($qry) && $qry->num_rows()>0)
        {
          return $qry->result_array();
        }else{
          return False;
        }
      } 

      function get_winter()
      {
        $qry = $this->db->query("SELECT * FROM category WHERE status='1' AND  cate_name='T-Shirt' ");
        if(isset($qry) && $qry->num_rows()>0)
        {
          return $qry->row_array();
        }else{
          return False;
        }
      }


      function get_bags()
      {
        $qry = $this->db->query("SELECT * FROM category WHERE status='1' AND  cate_name='Bag & Backup' ");
        if(isset($qry) && $qry->num_rows()>0)
        {
          return $qry->row_array();
        }else{
          return False;
        }
      }

        function get_subcate($id)
      {
        $qry = $this->db->query("SELECT * FROM  subchild WHERE status='1' AND  category_id=$id LIMIT 0,4 ");
        if(isset($qry) && $qry->num_rows()>0)
        {
          return $qry->result_array();
        }else{
          return False;
        }
      }   

        function get_latest_product()
      {
        $qry = $this->db->query("SELECT * FROM product WHERE status='1' ORDER BY pro_date DESC  LIMIT 8 ");
        if(isset($qry) && $qry->num_rows()>0)
        {
          return $qry->result_array();
        }else{
          return False;
        }
      }

          function getproduct_category($id,$type)
      {
        $arraydata =array();
        if($type=='subchild'){
        $qry = $this->db->query("SELECT * FROM product WHERE pro_child=$id  ");
         $namequery1 = $this->db->query("SELECT sub_child_name FROM subchild WHERE id=$id  ");

          if(isset($namequery1) && $namequery1->num_rows()>0)
        {
        $arraydata['title'] = $namequery1->row_array();
          }

      }else if($type=='cat'){
        $qry = $this->db->query("SELECT * FROM product WHERE pro_category_id=$id  ");
         $namequery1 = $this->db->query("SELECT cate_name FROM category WHERE cat_id=$id  ");

          if(isset($namequery1) && $namequery1->num_rows()>0)
        {
        $arraydata['title'] = $namequery1->row_array();
          }

      }else{ 
        $qry = $this->db->query("SELECT * FROM product WHERE pro_sub_category=$id  ");
         $namequery1 = $this->db->query("SELECT sub_cat_name FROM subcategory WHERE sub_id=$id  ");
      }

        if(isset($namequery1) && $namequery1->num_rows()>0)
        {
        $arraydata['title'] = $namequery1->row_array();
          }
      
        if(isset($qry) && $qry->num_rows()>0)
        {
          $arraydata['productdata'] = $qry->result_array();
        }else{
          return False;
        }
        return $arraydata;
      } 



        function getfilter($id,$type,$size,$color)
      {
        $arraydata =array();
        if($type=='subchild'){
        $qry = $this->db->query("SELECT * FROM product WHERE pro_child=$id AND pro_color='$color' AND pro_size='$size'  ");
         $namequery1 = $this->db->query("SELECT sub_child_name FROM subchild WHERE id=$id  ");

          if(isset($namequery1) && $namequery1->num_rows()>0)
        {
        $arraydata['title'] = $namequery1->row_array();
          }

      }else if($type=='cat'){
        $qry = $this->db->query("SELECT * FROM product WHERE pro_category_id=$id  AND  pro_color='$color' AND pro_size='$size' ");
         $namequery1 = $this->db->query("SELECT cate_name FROM category WHERE cat_id=$id  ");

          if(isset($namequery1) && $namequery1->num_rows()>0)
        {
        $arraydata['title'] = $namequery1->row_array();
          }

      }else{ 
        $qry = $this->db->query("SELECT * FROM product WHERE pro_sub_category=$id AND  pro_color='$color' AND pro_size='$size' ");
         $namequery1 = $this->db->query("SELECT sub_cat_name FROM subcategory WHERE sub_id=$id  ");
      }

        if(isset($namequery1) && $namequery1->num_rows()>0)
        {
        $arraydata['title'] = $namequery1->row_array();
          }
      
        if(isset($qry) && $qry->num_rows()>0)
        {
          $arraydata['productdata'] = $qry->result_array();
        }else{
          return False;
        }
        return $arraydata;
      }

       function getfilter1($type,$size,$color)
       {
                
        $qry = $this->db->query("SELECT *   FROM product WHERE  pro_color='$color' AND pro_size='$size' AND pro_type='$type' ");
        // echo $this->db->last_query();die();
        if(isset($qry) && $qry->num_rows()>0)
        {
          return $qry->result_array();
        }else{
          return False;
        }

       }

      function get_title($id)
      {
        $qry = $this->db->query("SELECT * FROM category WHERE cat_id=$id ");
        if(isset($qry) && $qry->num_rows()>0)
        {
          return $qry->row_array();
        }else{
          return False;
        }
      }

        
        function top_banner()
      {
        $qry = $this->db->query("SELECT * FROM top_banner WHERE status='1' ");
        if(isset($qry) && $qry->num_rows()>0)
        {
          return $qry->row_array();
        }else{
          return False;
        }
      }
        function register($data)

        {
          if($this->db->insert('tbl_user',$data)){
               $insert_id = $this->db->insert_id();

               $qry = $this->db->query("SELECT * FROM tbl_user WHERE user_id=$insert_id ");
               return $qry->row_array();
          }else{
            return False;
          }

        }
        public function checkexistcart($pid,$uid)
        {
              $qry = $this->db->query("SELECT * FROM cart WHERE delete_status='0' AND  pro_id=$pid AND user_id=$uid" );
              if(isset($qry) && $qry->num_rows()>0){
                return "Item Alerday Exists";
              }
        }

        function add_to_cart($pro_id,$user_id,$c_price,$c_quantity,$size,$color)
        {
        
           $data  = array('pro_id' =>$pro_id,'user_id'=>$user_id,'c_price'=>$c_price,'c_quantity'=>$c_quantity,'size'=>$size,'colour'=>$color,'status'=>1,'delete_status'=>'0' );
           $qry = $this->db->insert('cart',$data);
          if($qry){
            return "Cart Add Successfullty";
          }
          else{
            return False;
          }     
        }

        function add_to_wishlist($pro_id,$user_id)
        {
              // $qry = $this->db->query("SELECT * FROM cart WHERE pro_id=$pro_id AND user_id=$user_id");
              //  if($qry->num_rows()<0){
           $data  = array('pro_id' =>$pro_id,'user_id'=>$user_id,'status'=>1,'delete_status'=>'0' );
           $qry1 = $this->db->insert('wishlist',$data);
           // echo $this->db->last_query();die();
          if($qry){
            return "Wishlist Add Successfullty";
          }
          else{
            return False;
          }
        // }else{
        //  return "Item Alerady Exists";

        // }
        
        }
     public function count_cart(){
        $u_id=$this->session->user_id;
        $this->db->where('user_id',$u_id);
        $this->db->where('delete_status','0');
      $data=$this->db->get('cart');
      return $data->num_rows();
   
      
      }  public function wishliat(){
        $u_id=$this->session->user_id;
        $this->db->where('user_id',$u_id);
        $this->db->where('delete_status','0');
      $data=$this->db->get('wishlist');
      return $data->num_rows();
   
      
      }
      public function cart_item($id)
      {
        $this->db->select('*')
           ->from('cart')
           ->join('product', 'cart.pro_id = product.pro_id')
           ->where('user_id',$id)
           ->where('delete_status','0');
           $data = $this->db->get();
           return $data->result_array(); 
           
      }
   public function wishlist($id)
      {
        $this->db->select('*')
           ->from('wishlist')
           ->join('product', 'wishlist.pro_id = product.pro_id')
           ->where('user_id',$id)
           ->where('delete_status','0');
           $data = $this->db->get();
           return $data->result_array(); 
      }

      public function cartqtyupdate($qty,$cart_id)
      {
    // $this->db->set('status','1');
        $data = array('c_quantity' =>$qty);
    $this->db->where('cart_id',$cart_id);
    $this->db->update('cart',$data);
    return TRUE;
      }

         public function get_filter($color,$size)
      {
        // print_r($color);
    $qry = $this->db->query("SELECT * FROM product WHERE pro_color='$color' OR pro_size='$size' ");
    $dta  = $this->db->last_query();
   return $dta;
      }
      function get_size()
      {
         $data=$this->db->get('size');
         return $data->result_array();
       
      }

     //     function get_color($type)
     //  {
     //    // $colors = array();
     //      $info = [];
     //     $qry=$this->db->query("SELECT DISTINCT pro_color FROM product where pro_type ='$type' ");
     //     // echo $this->db->last_query();die();
     //     if(isset($qry) && $qry->num_rows()>0){
     //     $product =  $qry->result_array();
     //   }
     //     foreach ($product as $key => $value) {
     //       $pro_color = $value['pro_color']; 
     //       $colors = explode('/', $pro_color);
     //      for ($i=0; $i <sizeof($colors) ; $i++) { 
     //           $procolor =  $colors[$i];

     //    $colordata =$this->db->query("SELECT * FROM color where c_code ='$procolor' ");
     //     $colors['colors'] =  $colordata->result_array();
         
          
       
     // }
     //   }
     // return $colors;  
     //  }





      function del_to_cart($pro_id,$user_id)
      {
        $this->db->where('pro_id',$pro_id,'user_id',$user_id);
        $this->db->delete('cart');
        return true;
      }  function del_to_wish($pro_id,$user_id)
      {
        $this->db->where('pro_id',$pro_id,'user_id',$user_id);
        $this->db->delete('wishlist');
        return true;
      } function sproduct($pro_id)
      {
       $qry = $this->db->query("SELECT * FROM product WHERE pro_id=$pro_id ");
        if($qry && $qry->num_rows()>0){
        return $qry->row_array();
      }else{
        return False;
      }
    }

    function relted_product($pro_id)
      {
        // print_r($pro_id);die();
       $qry = $this->db->query("SELECT * FROM product WHERE pro_category_id=$pro_id ");
       
        if($qry && $qry->num_rows()>0){
        return $qry->result_array();
      }else{
        return False;
      }
    }

      function update_qnty($pro_id,$user_id,$qnty)
      {
        $this->db->where('pro_id',$pro_id,'user_id',$user_id);

        $data = array('c_quantity' =>$qnty);
         $this->db->set('c_quantity',$qnty);
        $this->db->update('cart');
        return true;
      }  function update_size($pro_id,$user_id,$size)
      {
        $this->db->where('pro_id',$pro_id,'user_id',$user_id);
        $data = array('size' =>$size);
         $this->db->set('size',$size);
        $this->db->update('cart');
        return true;
      } 
      function update_color($pro_id,$user_id,$color)
      {
        $this->db->where('pro_id',$pro_id,'user_id',$user_id);
        $data = array('colour' =>$color);
         $this->db->set('colour',$color);
        $this->db->update('cart');
        return true;
      }
      function cart_size($pro_id)
      {
       // $user_id = $_SESSION['user_id'];
        $qry = $this->db->query("SELECT pro_size FROM product WHERE pro_id=$pro_id ");

        if(isset($qry) && $qry->num_rows()>0){
        return $qry->row_array();
      }
    }

        function cart_size1($pro_id)
      {
       $user_id = $_SESSION['user_id'];
        $qry = $this->db->query("SELECT size FROM cart WHERE pro_id=$pro_id AND user_id=$user_id ");

        if(isset($qry) && $qry->num_rows()>0){
        return $qry->row_array();
      }
      } 
        function cart_color1($pro_id)
      {
       $user_id = $_SESSION['user_id'];
        $qry = $this->db->query("SELECT colour FROM cart WHERE pro_id=$pro_id AND user_id=$user_id ");

        if(isset($qry) && $qry->num_rows()>0){
        return $qry->row_array();
      }
      } 


       function cart_color($pro_id)
      {
       // $user_id = $_SESSION['user_id'];
        $qry = $this->db->query("SELECT pro_color FROM product WHERE pro_id=$pro_id ");

        if(isset($qry) && $qry->num_rows()>0){
        return $qry->row_array();
      }
      }


        function all_color()
      {
     $qry = $this->db->query("SELECT c_id FROM color ");

        if(isset($qry) && $qry->num_rows()>0){
        return $qry->row_array();
      }

      
      } 

        function cart_qnty($pro_id)
      {
      $user_id = $_SESSION['user_id'];
        $qry = $this->db->query("SELECT c_quantity FROM cart WHERE pro_id=$pro_id AND user_id='$user_id' ");
   
      if(isset($qry) && $qry->num_rows()>0){
        return $qry->row_array();
      }
      }
      public function cartprice($user_id)
   {
        $this->db->where('user_id',$user_id);
    $data=$this->db->get('cart');
    $ttl_price = $data->result_array();
    $price=0;
    foreach($ttl_price AS $key=>$value)
    {
        $price+=$value['c_quantity']*$value['c_price'];
    }
    return $price;
   }

    public function couponcheck($couponname)
    {
        $date=date('Y-m-d');
        $this->db->where('promo_name',$couponname);
        $this->db->where('exp_date>=',$date);
        // $this->db->where('cu_quantity>=',1);
        $data=$this->db->get('promocode');
        if($data->num_rows()>0)
        {
            return TRUE;    
        }
        else
        {
            return FALSE;
        }
    }
        public function couponamount($couponname)
    {
        $this->db->where('promo_name',$couponname);
        $data=$this->db->get('promocode');
        if($data->num_rows()>0)
        {
            return $data->row_array();    
        }
    }       public function type_product($type)
    {
        $this->db->where('pro_type',$type);
        $data=$this->db->get('product');
        if($data->num_rows()>0)
        {
            return $data->result_array();    
        }
    }  

       public function profile($id)
    {
        $this->db->where('user_id',$id);
        $data=$this->db->get('tbl_user');
        if($data->num_rows()>0)
        {
            return $data->row_array();    
        }
    }

    function checkout($user_id)
    {


      $qry = $this->db->query("SELECT * FROM shipping_address WHERE user_id= $user_id");

      if(isset($qry) && $qry->num_rows()>0){
        return $qry->row_array();
      }else{
        return False;
      }
    }

    function update_shipping($data)
    {
      $user_id = $_SESSION['user_id']; 
       $qry =  $this->db->query("SELECT user_id FROM shipping_address WHERE user_id=$user_id");
          if(isset($qry) && $qry->num_rows()>0){
         $this->db->where('user_id',$user_id);
        $this->db->update('shipping_address',$data);
       // echo $this->db->last_query();die();
      }else{
        $data['user_id'] = $user_id;
        $this->db->insert('shipping_address',$data);
       // echo $this->db->last_query();die();

      }
      return TRUE;
    }

    function ttl_amnt()
    {
      $user_id = $_SESSION['user_id'];
      $qry = $this->db->query("SELECT *  FROM cart WHERE user_id=$user_id AND delete_status='0' ");
      if(isset($qry) && $qry->num_rows()>0){
        return $qry->result_array();
      }else{
        return FALSE;
      }
    }
    function ttl_qnty()
    {
      $user_id = $_SESSION['user_id'];
      $qry = $this->db->query("SELECT sum(c_quantity) as ttl_qnty FROM cart WHERE user_id=$user_id AND delete_status='0' ");
        if(isset($qry) && $qry->num_rows()>0){
        return $qry->row_array();
      }else{
        return FALSE;
      }
    }

    function transction($user_id,$order_id)
    {
      $total_price  = 0;
      $dis_name  = 'N/A';
      $dis_amnt  = 0;
      if(isset($_SESSION['coupon']['discount_amnt']) &&  $_SESSION['coupon']['discount_amnt']!=''){
   $dis_amnt = $_SESSION['coupon']['discount_amnt'];
  }
      if(isset($_SESSION['coupon']['promo_name']) &&  $_SESSION['coupon']['promo_name']!=''){
   $dis_name = $_SESSION['coupon']['promo_name'];
  }

  
      $product_id = array();
      $qry = $this->db->query("SELECT *  FROM cart WHERE user_id=$user_id AND delete_status='0' ");
      if(isset($qry) && $qry->num_rows()>0){
        $data =  $qry->result_array();

        foreach ($data as $key => $value) {
            $pro_id = $value['pro_id'];
            $qnty = $value['c_quantity'];
            $size = $value['size'];
            $price = $value['c_price'];
            $color = $value['colour'];
              $product_id[] = array($pro_id,$qnty,$size,$price,$color);
        }
       $p_id =   json_encode($product_id);
       // print_r($p_id);die();
          $qry1 = $this->db->query("SELECT id  FROM shipping_address WHERE user_id=$user_id ");
            $dlvry_id1 = $qry1->row_array();
            $dlvry_id =  ($dlvry_id1['id']);

              $qry = $this->db->query("SELECT *  FROM cart WHERE user_id=$user_id AND delete_status='0' ");
      if(isset($qry) && $qry->num_rows()>0){
        $ttl_qnty =  $qry->result_array();
      }
    foreach ($ttl_qnty as $key => $row) {
    $total_price+=$row['c_quantity']*$row['c_price'];
    $product_id = $row['pro_id'];
      $qry = $this->db->query("SELECT *  FROM product WHERE pro_id=$product_id ");
      if(isset($qry) && $qry->num_rows()>0){
        $ttl_product =  $qry->result_array();
      foreach ($ttl_product as $key => $value) {
        $pro_name = $value['pro_name'];
       // echo $pro_name;
    
         $ch = curl_init();
         $message = 'ORDERID:'.$order_id.'productNAME:'.$pro_name.'Product Quantity'.$row['c_quantity'].'product price'.$row['c_price'];
           $timeout = 5;
           $url1=("http://prathamvision.in/sendsms.jsp?user=PrathamVision&password=123456&mobiles=7404587641&sms=".$message."&senderid=PRTHAM");   
           $url = urlencode($url1);                 
                    curl_setopt($ch, CURLOPT_URL, $url);
                    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($ch, CURLOPT_HEADER, false);
                    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
                    $data = curl_exec($ch);
                    curl_close($ch);
}
  }
    }

// print_r($url1);die();
      $amount = ($total_price - $dis_amnt);
      // print_r($amount);die();
       $data = array('product_id' =>$p_id,'user_id'=>$user_id,'amount'=>$amount,'promo_code'=>$dis_amnt,'order_id'=>$order_id,'dlvry_address'=>$dlvry_id,'status'=>'success' );
     $qry4 =   $this->db->insert('transction_history',$data);
              $insert_id = $this->db->insert_id();

      $this->db->where('user_id',$user_id);
      // $qry3 =  $this->db->delete('cart');

       // if($qry3){
   $qry8 = $this->db->query("SELECT order_id   FROM transction_history WHERE id=$insert_id ");
        // return $insert_id;
   // echo $this->db->last_query();die();
      if($qry8){
        return $qry8->row_array();
      }
     // }   
      }else{
        return FALSE;
      }
    }
    // function get_payment($id)
    // {
     
    //     $qry = $this->db->query("SELECT   FROM transction_history WHERE user_id=$id ");
    //     echo $this->db->last_query();die();
    //       if(isset($qry) && $qry->num_rows()>0){
    //     return $qry->row_array();
    //   }else{
    //     return FALSE;
    //   }
    // }
       function update_profile($data)
    {
      $user_id = $_SESSION['user_id']; 
         $this->db->where('user_id',$user_id);
      $qry =   $this->db->update('tbl_user',$data);
      if($qry)
      {
        return true;
      }else{
        return False;
      }
    }  

    function myorders($user_id){
      $qry = $this->db->query("SELECT *  FROM transction_history WHERE user_id=$user_id ");
      if(isset($qry) && $qry->num_rows()>0){
        return   $qry->result_array();
      }else{
        return False;
      }
    }   

     function myproduct($o_id){
      // print_r($o_id);die();
      // $data[] = '';
      $p_id[] = '';
      $qry = $this->db->query("SELECT *  FROM transction_history WHERE order_id='$o_id' ");

      if(isset($qry) && $qry->num_rows()>0){
       $data =   $qry->result_array();
       foreach ($data as $key => $value) {
       $pid['product_id'] =   $value['product_id'];
     // var_export($pid);
      $a = array ($pid['product_id']);
      $info=[];
      foreach($a as $val){
        $b=json_decode($val);
       foreach($b as $v){
              $pro_id = $v[0];
              $qnty = $v[1];
              $size = $v[2];
              $price = $v[3];
              $color = $v[4];
              $rowdata['pid']=$pro_id;;
              $rowdata['qnty']=$qnty;
              $rowdata['price']=$price;
              $rowdata['color']=$color;
              $qry = $this->db->query("SELECT * FROM product WHERE pro_id=$pro_id");
              if(isset($qry) && $qry->num_rows()>0){
                $rowdata['product'] =  $qry->row_array();
               
              }
             $info[]=$rowdata;
         } 


return $info; 
}

// die();
}  
      }else{
        return False;
      }
      
    }   

    function del_order($order_id,$user_id)
    {
    $this->db->set('order_id',$order_id);
    $this->db->where('order_id',$order_id);
    $this->db->delete('transction_history');
    return TRUE;
    }   

     public function get_all_search_product($search){
        $this->db->select('*');
        $this->db->from('product');
        $this->db->join('category', 'category.cat_id=product.pro_category_id');
        $this->db->join('subcategory', 'subcategory.sub_id=product.pro_sub_category');
        // $this->db->join('brand', 'brand.brand_id=product.brand_id');
        // $this->db->join('tbl_user', 'tbl_user.user_id=product.product_author');
        $this->db->order_by('product.pro_id', 'DESC');
        // $this->db->where('product.publication_status', 1);
        $this->db->like('product.pro_name',$search,'both');
        $this->db->or_like('product.pro_sort_desc',$search,'both');
        $this->db->or_like('product.pro_sort_desc',$search,'both');
        $this->db->or_like('product.pro_full_desc',$search,'both');
        $this->db->or_like('category.cate_name',$search,'both');
        $this->db->or_like('subcategory.sub_cat_name',$search,'both');
        // $this->db->or_like('brand.brand_name',$search,'both');
        $info = $this->db->get();
       // echo $this->db->last_query();die();
        return $info->result();

    } 

    function ship_detail()
    {
      $user_id = $_SESSION['user_id'];
       $qry = $this->db->query("SELECT *  FROM  shipping_address WHERE user_id='$user_id' ");
            if(isset($qry) && $qry->num_rows()>0){
                return   $qry->row_array();
               
              }else{
                return False;
              }
    
} 
}
?>