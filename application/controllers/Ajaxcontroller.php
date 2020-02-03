<?php

/**
 * 
 */
class Ajaxcontroller extends CI_Controller
{
	
	function __construct()
	{
			parent::__construct();
		  $this->load->library('form_validation');
           $this->load->model('Dashboard_model');
           $this->load->model('Admin_model');
           $this->load->library('email');
	}

	function get_sub_cat($id)
	{
		$data = $this->Admin_model->get_sub_cat($id);
		echo json_encode($data);
	}

		function get_subchild($id)
	{
		$data = $this->Admin_model->get_subchild($id);
		echo json_encode($data);
	}
    function add_to_cart()
    {
        $user_id =  $_SESSION['user_id'];
      $pro_id =   $this->input->post('pro_id');
      $c_price =   $this->input->post('c_price');
      $c_quantity =   $this->input->post('c_quantity');
      $psize =   $this->input->post('psize');
      $color =   $this->input->post('color');
      $data = $this->Dashboard_model->checkexistcart($pro_id,$user_id);
      if($data){
        echo json_encode($data);
      }else{
      $data = $this->Dashboard_model->add_to_cart($pro_id,$user_id,$c_price,$c_quantity,$psize,$color);
      echo json_encode($data);
  }
}   

 function add_to_wishlist()
    {
        $user_id =  $_SESSION['user_id'];
      $pro_id =   $this->input->post('pro_id');
      $data = $this->Dashboard_model->add_to_wishlist($pro_id,$user_id);
      echo json_encode($data);
  
}

 function update_qnty()
    {
        $user_id =  $_SESSION['user_id'];
      $qnty =   $this->input->post('qnty');
      $pro_id =   $this->input->post('pro_id');
        $data = $this->Dashboard_model->update_qnty($pro_id,$user_id,$qnty);
      echo json_encode($data);
  
} 
function updatesize()
    {
        $user_id =  $_SESSION['user_id'];
      $size =   $this->input->post('size');
      $pro_id =   $this->input->post('pro_id');
        $data = $this->Dashboard_model->update_size($pro_id,$user_id,$size);
      echo json_encode($data);
  
}function updatecolor()
    {
        $user_id =  $_SESSION['user_id'];
      $color =   $this->input->post('color');
      $pro_id =   $this->input->post('pro_id');
        $data = $this->Dashboard_model->update_color($pro_id,$user_id,$color);
      echo json_encode($data);
  
}
 function del_to_cart()
    {
      $user_id =  $_SESSION['user_id'];
      $pro_id =   $this->input->post('pro_id');
      $data = $this->Dashboard_model->del_to_cart($pro_id,$user_id);
      echo json_encode($data);
  
}

 function del_to_wish()
    {
      $user_id =  $_SESSION['user_id'];
      $pro_id =   $this->input->post('pro_id');
      $data = $this->Dashboard_model->del_to_wish($pro_id,$user_id);
      echo json_encode($data);
  
} function delorder()
    {
      $user_id =  $_SESSION['user_id'];
      $order_id =   $this->input->post('order_id');
      $data = $this->Dashboard_model->del_order($order_id,$user_id);
      echo json_encode($data);
  
}
  function wishliat(){
    $res = $this->Dashboard_model->wishliat();
    echo $res;
   }

 function quantity(){
    $res = $this->Dashboard_model->count_cart();
    echo $res;
   }
   function cartqtyupdate()
   {
   $qty =  $this->input->post('qty');
   $cart_id =  $this->input->post('cart_id');
    $res = $this->Dashboard_model->cartqtyupdate($qty,$cart_id);
    echo $res;

   }

       public function coupon()
    {
      $discount['promo_name']=0;
        $coupon_name=$_POST['coupon_name'];
        $coupen_check=$this->Dashboard_model->couponcheck($coupon_name);
        if($coupen_check)
        {
             $this->session->coupon=$coupon_name;
             $discount=$this->Dashboard_model->couponamount($this->session->coupon);
           $coupon_name =  $this->session->coupon=$discount;
              $dis_type=$discount['dis_type'];
             $discount=$discount['discount_amnt'];
             // $discount=$discount['promo_name'];
             $discount=TRUE;
            $this->session->dis_rate;
            echo " Your Code Apply Successfully";
        }
        else
        {
            echo " Wrong Coupon Code";
        }

    }

    function update_shipping()
    {
        $first_name =   $this->input->post('first_name');
        $last_name =   $this->input->post('last_name');
        $flat =   $this->input->post('flat');
        $street =   $this->input->post('street');
        $user_email =   $this->input->post('user_email');
        $phone_no =   $this->input->post('phone_no');
        $od_address =   $this->input->post('od_address');
        $country =   $this->input->post('country');
        $state =   $this->input->post('state');
        $city =   $this->input->post('city');
        $postal_code =   $this->input->post('postal_code');
        $landmark =   $this->input->post('landmark');
        $data = array('first_name' =>$first_name ,'last_name' =>$last_name , 'flat' =>$flat , 'street' =>$street , 'user_email' =>$user_email , 'phone_no' =>$phone_no , 'od_address' =>$od_address , 'country' =>$country ,'state' =>$state,'city' =>$city,'postal_code' =>$postal_code,'landmark' =>$landmark,'landmark' =>$landmark );
        $res = $this->Dashboard_model->update_shipping($data);
        if($res){
          echo "Shipping Address Update Successfully";
        }else{
          echo "Something Wrong";
        }




    }

        function update_profile()
    {
        $first_name =   $this->input->post('first_name');
        $last_name =   $this->input->post('last_name');
        $user_email =   $this->input->post('user_email');
        $phone_no =   $this->input->post('user_phone');
        // $country =   $this->input->post('country');
        $state =   $this->input->post('state');
        $city =   $this->input->post('city');
        $data = array('first_name' =>$first_name ,'last_name' =>$last_name ,'user_email'=>$user_email , 'user_phone' =>$phone_no ,'state' =>$state,'city' =>$city);
        $res = $this->Dashboard_model->update_profile($data);
        if($res){
          echo "Shipping Address Update Successfully";
        }else{
          echo "Something Wrong";
        }




    }
}

?>