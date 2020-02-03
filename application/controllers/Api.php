<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require(APPPATH.'/libraries/REST_Controller.php');
class Api extends CI_Controller
{
       public function __construct() {
               parent::__construct();
               $this->load->model('Login_model');

       }  
         
          public   function randomstring($length = 10) 
   {
      $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
      $charactersLength = strlen($characters);
      $randomString = '';
      for ($i = 0; $i < $length; $i++) {
          $randomString .= $characters[rand(0, $charactersLength - 1)];
      }
      return $randomString;
   }
       public function user_get(){
         $r = $this->Login_model->read();
         if($r){
         // $data = json_encode($r);
           $response = array('response'=>$r,'status'=>'ok' );
         }else{
           $response = array('response'=>401,'status'=>'error' );
         }
         echo json_encode($response);
       }
       public function user_put(){
        
           $id = $this->uri->segment(3);
           $data = array('name' => $this->input->get('name'),
           'pass' => $this->input->get('pass'),
           'type' => $this->input->get('type')
           );
            $r = $this->Login_model->user_update($id,$data);
         $data['data'] = json_encode($r);
              print_r($data);
       }

       public function register(){
          $token = $_POST['token'];
       $phone = $_POST['user_phone'];
       $email = $_POST['user_email'];
      
              if($token==''){
                   $response = array('response'=>'Field Blank','status'=>'Error' );
              }else{
                $existingphone = $this->Login_model->existingphone($phone,$token);
                if($existingphone){
                   $response = array('response'=>$existingphone,'status'=>'success' );
                 }else{
             $data = array('user_phone' =>$phone,'token'=>$token,'user_email'=>$email);
             
                $r = $this->Login_model->register($data);
                if($r){
             $response = array('response'=>$r,'status'=>'success' );
         }else{
           $response = array('response'=>401,'status'=>'Error' );
         }
     }
   }

         echo json_encode($response);
   }

   public function user_update()
   {
     $phone = $_POST['user_phone'];
     $user_name = $_POST['user_name'];
     $user_password = $_POST['user_password'];
     $user_email = $_POST['user_email'];
     $first_name = $_POST['first_name'];
     $last_name = $_POST['last_name'];
     $state = $_POST['state'];
     $city = $_POST['city'];
     $user_type = $_POST['user_type'];

     if($phone=='' || $user_name=='' || $user_password=='' || $user_email=='' || $first_name=='' || $last_name=='' || $state=='' || $city=='' || $user_type==''){
            $response  = array('response' =>"Field Empty" ,'status'=>'error' ); 
     }else{
      $data = array('user_name' =>$user_name,'user_password'=>$user_password,'user_email'=>$user_email,'first_name'=>$first_name,'last_name'=>$last_name,'state'=>$state,'city'=>$city,'user_type'=>$user_type);
      $u = $this->Login_model->user_register($phone,$data);
      if($u)
      {
        $response = array('response'=>$u,'status'=>'success' );
      }

     }
     echo json_encode($response);
   }
       
       public function user_delete(){
           $id = $this->uri->segment(3);
           $r = $this->Login_model->user_delete($id);
         if($r){
           $response = array('response'=>$r,'status'=>'success' );
         }else{
           $response = array('response'=>'Data Not Found','status'=>'error' );
         }
          echo json_encode($response); 
       }
            function get_all_states()
       {
       $r = $this->Login_model->get_all_states();
         if($r){
           $response = array('response'=>$r,'status'=>'success' );
         }else{
           $response = array('response'=>'Data Not Found','status'=>'error' );
         }
         echo json_encode($response);
       }
  
    function get_all_citis($id)
       {
         $c = $this->Login_model->get_all_citis($id);
         if($c){
           $response = array('response'=>$c,'status'=>'success' );
         }else{
           $response = array('response'=>'Data Not Found','status'=>'error' );
         }
         echo json_encode($response);
       }
     public function user_profile_update()
   {
    $user_id = $_POST['user_id'];
     $phone = $_POST['phone_number'];
     $name = $_POST['name'];
     $email_id = $_POST['email_id'];
     $gender = $_POST['gender'];
     $state = $_POST['state'];
     $city = $_POST['city'];
     $dob = $_POST['dob'];

     if($phone=='' || $name=='' || $email_id=='' || $gender=='' || $state=='' || $city=='' || $dob==''){
            $response  = array('response' =>"Field Empty" ,'status'=>'error' ); 
     }else{
      $data = array('name' =>$name,'email_id'=>$email_id,'gender'=>$gender,'state'=>$state,'city'=>$city,'dob'=>$dob);
      $u = $this->Login_model->user_profile_update($user_id,$data);
      if($u)
      {
        $response = array('response'=>$u,'status'=>'success' );
      }

     }
     echo json_encode($response);
   } 
  
  
      function uddate_token()
   {
    
    $firebase_token = $_POST['firebase_token'];
    $user_id = $_POST['user_id'];

    if($firebase_token=='' || $user_id==''){
         $response  = array('response' =>"Field Empty" ,'status'=>'error' ); 
     }else{
    $data = array('token' =>$firebase_token);
  $qry =   $this->Login_model->uddate_token($user_id,$data);
                if($qry)
                {
                  $response  = array('response' =>$qry,'status'=>'success');
                }
   }
echo json_encode($response);
}
  function all_category()
{
  $all_category=$this->Login_model->all_category();
      if($all_category){
    $response = array('response'=>$all_category);
  }else{
     $response  = array('response' =>"Something Error" ,'status'=>'error' ); 
  }
    echo json_encode($response);


}

function all_sub_category($id)
{
  $all_sub_category=$this->Login_model->all_sub_category($id);
      if($all_sub_category){
    $response = array('response'=>$all_sub_category);
  }else{
     $response  = array('response' =>"Something Error" ,'status'=>'error' ); 
  }
    echo json_encode($response);


}
function all_brand()
{
  $all_brand=$this->Login_model->all_brand();
      if($all_brand){
    $response = array('response'=>$all_brand,'status'=>'success');
  }else{
     $response  = array('response' =>"Something Error" ,'status'=>'error' ); 
  }
    echo json_encode($response);

}
function add_to_cart()
{
  //print_r($_POST);die;
  $user_id = $_POST['user_id'];
  $pro_id = $_POST['product_id'];
  $size = $_POST['size'];
  $colour = $_POST['colour'];

  if($user_id=='' || $pro_id==''){
    $response  = array('response' =>'Field Blank' ,'status'=>'error' );

  }else{
    $data = array('user_id' =>$user_id,'pro_id'=>$pro_id,'size'=>$size,'colour'=>$colour);
    $qry =   $this->Login_model->add_to_cart($data);
                if($qry)
                {
                  $response  = array('response' =>$qry,'status'=>'success');
                }else{
                   $response  = array('response' =>'Something Wrong','error'=>'ok');
                }

  }
  echo json_encode($response);
}

function add_to_wishlist()
{
  //print_r($_POST);die;
  $user_id = $_POST['user_id'];
  $pro_id = $_POST['product_id'];

  if($user_id=='' || $pro_id==''){
    $response  = array('response' =>'Field Blank' ,'status'=>'error' );

  }else{
    $data = array('user_id' =>$user_id,'pro_id'=>$pro_id);
    $qry =   $this->Login_model->add_to_wishlist($data);
                if($qry)
                {
                  $response  = array('response' =>$qry,'status'=>'success');
                }else{
                   $response  = array('response' =>'Something Wrong','error'=>'ok');

                }

  }
  echo json_encode($response);
}

public function view_wishlist()
{
  $user_id = $_POST['user_id'];
         $c = $this->Login_model->view_wishlist($user_id);

         if($c){
           $response = array('response'=>$c,'status'=>'success' );
         }else{
           $response = array('response'=>'Data Not Found','status'=>'error' );
         }
         echo json_encode($response);
       
}


public function view_cart()
{
  $user_id = $_POST['user_id'];

         $c = $this->Login_model->view_cart($user_id);
         if($c){
           $response = array('response'=>$c,'status'=>'success' );
         }else{
           $response = array('response'=>'Data Not Found','status'=>'error' );
         }
         echo json_encode($response);
       
}
public function get_single_product()
{
  $cat_id = $_POST['cat_id'];
  $brand_id = $_POST['brand_id'];
  $pro_quantity = $_POST['pro_quantity'];

         $c = $this->Login_model->get_single_product($cat_id,$brand_id,$pro_quantity);
         if($c){
           $response = array('response'=>$c,'status'=>'success' );
         }else{
           $response = array('response'=>'Data Not Found','status'=>'error' );
         }
         echo json_encode($response);
       
       }




         public function cart_delete(){
       $pro_id = $_POST['id'];
        $user_id = $_POST['user_id'];
       $color = $_POST['color'];
       $size = $_POST['size'];
         //  $id = $this->uri->segment(3);
           $d = $this->Login_model->cart_delete($pro_id,$color,$size,$user_id);
        if($d){
          $response = array('response'=>$d,'data'=>'success');
        }else
        {
           $response = array('response'=>'Data Not Found','status'=>'error' );

        }
         echo json_encode($response);

       } 



         public function wishlist_delete(){
       $pro_id = $_POST['id'];
        $user_id = $_POST['user_id'];
         //  $id = $this->uri->segment(3);
           $d = $this->Login_model->wishlist_delete($pro_id,$user_id);
        if($d){
          $response = array('response'=>$d,'data'=>'success');
        }else
        {
           $response = array('response'=>'Data Not Found','status'=>'error' );

        }
         echo json_encode($response);

       }

       public function add_delivery_address()
       {
      $user_id = $_POST['user_id'];
     $dlvry_address = $_POST['dlvry_address'];
  $phone_no = $_POST['phone_no'];
      $flat = $_POST['flat']; 
     $street= $_POST['street'];
    $landmark = $_POST['landmark'];
       $address_type = $_POST['address_type'];
       $lat = $_POST['lat'];
       $lng = $_POST['lng'];
   
         if($user_id=='' || $dlvry_address=='' ){
            $response  = array('response' =>"Field Empty" ,'status'=>'error' ); 
     }else{
       $data = array('user_id' =>$user_id,'od_address'=>$dlvry_address,'phone_no'=>$phone_no,'flat '=>$flat,'street' =>$street,'landmark'=>$landmark,'address_type'=>$address_type,'lat'=>$lat,'lng'=>$lng);
      $u = $this->Login_model->add_delivery_address($data);
      if($u)
      {
        $response = array('response'=>$u,'status'=>'success' );
      }
       }
       echo json_encode($response);
     }   


        public function get_delivery_address()
       {
      $user_id = $_POST['user_id'];
     // print_r($user_id);die();
         if($user_id==''){
            $response  = array('response' =>"Field Empty" ,'status'=>'error' ); 
     }else{
      $data = $this->Login_model->get_delivery_address($user_id);
      // echo  $thisresponse($data,200);
      if($data)
      {
            // echo  $this->response($data);
        $response = array('response'=>$data,'status'=>'success' );
      }
      else
        {
           $response = array('response'=>'Data Not Found','status'=>'error' );

        }
       }

       echo json_encode($data);
   
     }
       public function del_delivery_address(){
           $id =$_POST['dlvry_id'];
           $d = $this->Login_model->del_delivery_address($id);
        if($d){
          $response = array('response'=>$d,'data'=>'success');
        }else
        {
           $response = array('response'=>'Data Not Found','status'=>'error' );

        }
         echo json_encode($response);

       }

            public function add_feedback()
       {
      $user_id = $_POST['user_id'];
     $product_id = $_POST['product_id'];
     $description = $_POST['feedback'];
   
         if($user_id=='' || $product_id=='' ){
            $response  = array('response' =>"Field Empty" ,'status'=>'error' ); 
     }else{
      $data = array('user_id' =>$user_id,'pro_id'=>$product_id,'description'=>$description);
      $u = $this->Login_model->add_feedback($data);
      if($u)
      {
        $response = array('response'=>$u,'status'=>'success' );
      }
       }
       echo json_encode($response);
     }

        public function get_feedback($id)
        {
      $u = $this->Login_model->get_feedback($id);
      if($u)
      {
        $response = array('response'=>$u,'status'=>'success' );
      }
           echo json_encode($response);
       }

       public function upload_img1()
    {
     $user_id  = $this->input->post('user_id');
    $image  = $this->input->post('image');
$image = base64_decode($this->input->post("img_front"));
$image_name = md5(uniqid(rand(), true));
$filename = $image_name . '.' . 'png';
//rename file name with random number
$path = "assets/".$filename;
//image uploading folder path
file_put_contents($path . $filename, $image);
// image is bind and upload to respective folde

// $data_insert = array('front_img'=>$filename);
   $data = array('user_image' =>$filename);
      $u = $this->Login_model->upload_image($user_id,$data);
if($u) {
        $response = array('response'=>$u,'status'=>'success' );
      }
        echo json_encode($response);
}


function get_promocode()
{
    $data = $this->Login_model->get_promocode();
    if($data){
    $response  = array('response' =>$data,'status'=>'success');
  }
   else
        {
           $response = array('response'=>'Data Not Found','status'=>'error' );

        }
     echo json_encode($response);

}
//        public function get_delevery_status()
// {
//   $user_id = $_POST['user_id'];

//          $c = $this->Login_model->get_delevery_status($cat_id);
//          if($c){
//            $response = array('response'=>$c,'status'=>'ok' );
//          }else{
//            $response = array('response'=>'Data Not Found','status'=>'error' );
//          }
//          echo response($response);
       
//        }

function  banner_descount_products()
{
     $brand_id = $_POST['brand_id'];
     $cat_id = $_POST['cat_id'];

         $c = $this->Login_model->banner_descount_product($brand_id,$cat_id);
         if($c){
           $response = array('response'=>$c,'status'=>'success' );
         }else{
           $response = array('response'=>'Data Not Found','status'=>'error' );
         }
         echo json_encode($response);
}
  function add_user_referal_code()
  {
    $user_id = $_POST['user_id'];
         $c = $this->Login_model->add_user_referal_code($user_id);
         if($c){
           $response = array('data'=>$c, 'message'=>'new referal code for this user', 'code'=>200 );
         }else{
           $response = array('response'=>'Data Not Found','status'=>'error', 'code'=>404 );
         }
         echo json_encode($response);
  }
  
  
      function add_redemeed_data()
  {
    $redemeed_id = $_POST['redemeed_id'];
    $referal_code = $_POST['referal_code'];
         $c = $this->Login_model->add_user_referal_code($redemeed_id,$referal_code);
         if($c){
           $response = array('message'=>'Referal code already used.','status'=>'success');
         }else{
           $response = array('response'=>'Data Not Found','status'=>'error');
         }
         echo json_encode($response);
  }
  
  function get_wallet_data()
  {
      $user_id = $_POST['user_id'];
         $c = $this->Login_model->get_wallet_data($user_id);
         if($c){
           $response = array('data'=>$c,'message'=>'Wallet','code'=>200,'status'=>'success');
         }else{
           $response = array('response'=>'Data Not Found','status'=>'error');
         }
         echo json_encode($response);
  }
    function getbanner()
  {
         $c = $this->Login_model->getbanner();
         if($c){
           $response = array('data'=>$c,  'status'=>'success');
         }else{
           $response = array('response'=>'Data Not Found','status'=>'error', 'code'=>404 );
         }
         echo json_encode($response);
  }
      function app_image()
  {
         $c = $this->Login_model-> app_image();
         if($c){
           $response = array('data'=>$c,  'status'=>'success');
         }else{
           $response = array('response'=>'Data Not Found','status'=>'error', 'code'=>404 );
         }
         echo json_encode($response);
  }
  
          function get_latest_product()
  {
         $c = $this->Login_model->get_latest_product();
         if($c){
           $response = array('data'=>$c,  'status'=>'success');
         }else{
           $response = array('response'=>'Data Not Found','status'=>'error', 'code'=>404 );
         }
         echo json_encode($response);
  }


        public function recent_product($user_id,$pro_id){
              if($pro_id==''){
                   $response = array('response'=>'Field Blank','status'=>'Error' );
              }else{
           $check_product = $this->Login_model->check_product($user_id,$pro_id);
                if($check_product){
             $response = array('response'=>$check_product,'status'=>'success' );
        }else{
             $data = array('user_id' =>$user_id,'pro_id'=>$pro_id);
      
                $r = $this->Login_model->recent_product($data);
                if($r){
             $response = array('response'=>$r,'status'=>'success' );
         }else{
           $response = array('response'=>401,'status'=>'Error' );
         }
        }
        }

         echo json_encode($response);
    }
  
   function get_recent_product($id)
  {
    
         $c = $this->Login_model->get_recent_product($id);
         if($c){
           $response = array('data'=>$c,  'status'=>'success');
         }else{
           $response = array('response'=>'Data Not Found','status'=>'error', 'code'=>404 );
         }
         echo json_encode($response);
  }
  
             function all_product($cat_id='',$sub_id='',$c_id=NULL,$gender=NULL)
  {                  
           $cat_id = $_POST['cat_id'];
           $sub_id = $_POST['sub_id'];
           $c_id = $_POST['c_id'];
           $gender = $_POST['gender'];
          
         $c = $this->Login_model->all_product($cat_id,$sub_id,$c_id,$gender);
         if($c){
           $response = array('data'=>$c,  'status'=>'success');
         }else{
           $response = array('response'=>'Data Not Found','status'=>'error', 'code'=>404 );
         }
         echo json_encode($response);
  }
  function save_contact()
  {
    if($_REQUEST==$_POST){
      $fname = $_POST['fname'];
      $email = $_POST['email'];
      $website = $_POST['website'];
      $msg = $_POST['msg'];
    $data = array('fname'=>$fname,'email'=>$email,'website'=>$website,'msg'=>$msg);
         $c = $this->Login_model->save_contact($data);
         if($c){
           $response = array('data'=>$c, 'message'=>'Thanks', 'code'=>200 );
         }else{
           $response = array('response'=>'Something Wrong','status'=>'error', 'code'=>404 );
         }
         echo json_encode($response);
  }
  }
  
               function get_gender($gender)
  {                  
         $c = $this->Login_model->get_gender($gender);
         if($c){
           $response = array('data'=>$c,  'status'=>'success');
         }else{
           $response = array('response'=>'Data Not Found','status'=>'error', 'code'=>404 );
         }
         echo json_encode($response);
  }
  

        function save_transction()
    {
          $data = array();
           $order_id = $_POST['order_id'];
           $user_id = $_POST['user_id'];
           $product_id = $_POST['product_id'];
           $amount = $_POST['amount'];
           $promo_code = $_POST['promo_code'];
           $dlvry_address = $_POST['dlvry_address']; 
           $status = $_POST['status']; 
           for ($i=0; $i<sizeof(json_decode($product_id)) ; $i++) { 

            $id = json_decode($product_id)[$i]->id;
            $count = json_decode($product_id)[$i]->count;
            $size = json_decode($product_id)[$i]->size;
            $colour = json_decode($product_id)[$i]->colour;
            $data[]  = array($id,$count,$size,$colour);
        
            }       
              $data1 = array('product_id' =>json_encode($data),'order_id'=>$order_id,'amount'=>$amount,'promo_code'=>$promo_code,'dlvry_address'=>$dlvry_address,'user_id'=>$user_id,'status'=>$status);

         $c = $this->Login_model->save_transction($data1);
         if($c){
           $response = array('data'=>$c,  'status'=>'success');
         }else{
           $response = array('response'=>'Data Not Found','status'=>'error', 'code'=>404 );
         }
         echo json_encode($response);
    }

    function get_transction()
    {
      $user_id = $_POST['user_id'];
     $c = $this->Login_model->get_transction($user_id);
         if($c){
           $response = array('data'=>$c,  'status'=>'success');
         }else{
           $response = array('response'=>'Data Not Found','status'=>'error', 'code'=>404 );
         }
         echo json_encode($response);
    }
    

               function all_size()
  {                  
         $c = $this->Login_model->all_size();
         if($c){
           $response = array('data'=>$c,  'status'=>'success');
         }else{
           $response = array('response'=>'Data Not Found','status'=>'error', 'code'=>404 );
         }
         echo json_encode($response);
  }
  
      function all_sub_subchild($id,$cat_id)
{
  $all_sub_category=$this->Login_model->all_sub_subchild($id,$cat_id);
      if($all_sub_category){
    $response = array('response'=>$all_sub_category);
  }else{
     $response  = array('response' =>"Something Error" ,'status'=>'error' ); 
  }
    echo json_encode($response);

}

}

?>