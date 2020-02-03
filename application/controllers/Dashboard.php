<?php 
/**
 * 
 */
class Dashboard extends CI_Controller
{
    public function __construct()
    {
      parent::__construct();
           $this->load->library('form_validation');
           $this->load->model('Login_model');
           $this->load->model('Dashboard_model');
           $this->load->library('email');
           $this->load->library('session'); 
            // $this->load->library('paypal_lib');          
     }
  

public function index()
{
     $data['category'] = $this->Dashboard_model->get_cat();
      $data['get_winter'] = $this->Dashboard_model->get_winter();
      $this->load->view('front/default/top2',$data);
      $this->load->view('front/default/header');
      $this->load->view('front/front2/index');
      $this->load->view('front/default/footer');
}

function carts()
{
   $user_id = $_SESSION['user_id'];
     $data['cart_item'] = $this->Dashboard_model->cart_item($user_id);
  $this->load->view('front/front2/cart',$data);
  $this->load->view('front/default/footer');
}
function wishlist()
{
    $user_id = $_SESSION['user_id'];
     $data['wish_item'] = $this->Dashboard_model->wishlist($user_id);
  $this->load->view('front/front2/wish',$data);
    $this->load->view('front/default/footer');
}
function checkout()
{
     $user_id = $_SESSION['user_id'];
     $data['checkout'] = $this->Dashboard_model->checkout($user_id);
      $this->load->view('front/front2/check',$data);
      $this->load->view('front/default/footer');
}
function form()
{
  $this->load->view('front/front2/form');
}
function single($url)
{
  $this->load->view('front/front2/single_pro');
}

public function product($type,$id)
{
    $size=0;
    $color=0;
      $id1 = substr($id, 3);
      $data['type'] = $type;
      $data['id'] = $id1;
      if(isset($_POST['size']) && $_POST['size']!=''){
        if(isset($_POST['color']) && $_POST['color']!=''){
        $size = $_POST['size'];
        $color = $_POST['color'];

         $pro_color=implode('/',$color); 
          $pro_size=implode(',',$size); 
          // print_r($pro_size);die();
          $data['product'] = $this->Dashboard_model->getfilter($id1,$type,$pro_size,$pro_color);
     $this->load->view('front/default/top2',$data);
  $this->load->view('front/front2/product',$data);
  $this->load->view('front/default/footer');
       
      }

    }else{
         $data['product'] = $this->Dashboard_model->getproduct_category($id1,$type);
        $this->load->view('front/default/top2',$data);
      $this->load->view('front/front2/product',$data);
    $this->load->view('front/default/footer');
    }
}

public function type_product($type)
{
       $size=0;
    $color=0;
      $data['type'] = $type;
      if(isset($_POST['size']) && $_POST['size']!=''){
        if(isset($_POST['color']) && $_POST['color']!=''){
        $size = $_POST['size'];
        $color = $_POST['color'];

         $pro_color=implode('/',$color); 
          $pro_size=implode(',',$size); 
          $data['title'] = $type;
          $data['product'] = $this->Dashboard_model->getfilter1($type,$pro_size,$pro_color);
     $this->load->view('front/default/top2',$data);
  $this->load->view('front/front2/product_type',$data);
  $this->load->view('front/default/footer');
       
      }

    }else{
       $data['title'] = $type;
       // $data3['color'] = $this->Dashboard_model->get_color($type);
       $data['product'] = $this->Dashboard_model->type_product($type);
       $this->load->view('front/default/top2',$data);
       $this->load->view('front/front2/product_type',$data);
       $this->load->view('front/default/footer');
     }
}


public function register()
{
  $this->load->view('front/front2/form');
     $this->load->view('front/default/footer');
}
function registerprocess()
{
  $this->form_validation->set_rules('user_name','User Name','required|trim');
  $this->form_validation->set_rules('first_name','First Name','required|trim');
  $this->form_validation->set_rules('last_name','Last Name','required|trim');
  $this->form_validation->set_rules('user_email','User Name','required|trim');
  if ($this->form_validation->run() == FALSE)
  {   
    $this->load->view('front/front2/form');
    $this->load->view('front/default/footer');
  }else{
    unset($_POST['submit']);
    $data = $this->Dashboard_model->register($_POST);
    if($data){
      $username = $data['user_email'];
      $pass = $data['user_password'];
      $admindata = $this->Login_model->uservalid($username,$pass);
      if($admindata){
        $this->session->set_userdata(array('user_id'=>$admindata['user_id'],'user_name'=>$admindata['user_name'],'user_password'=>$admindata['user_password'],'user_password'=>$admindata['user_password'],'first_name'=>$admindata['first_name'],'last_name'=>$admindata['last_name'],'state'=>$admindata['state'],'city'=>$admindata['city']));
      }
      if($admindata){
       $data['category'] = $this->Dashboard_model->get_cat();
       $data['get_winter'] = $this->Dashboard_model->get_winter();
       $this->load->view('front/default/top2',$data);
       $this->load->view('front/default/header');
       $this->load->view('front/front2/index');
       $this->load->view('front/default/footer');
     }
   }
   else
   {
    $this->session->set_flashdata('error', 'Something Went Wrong');
    redirect('Dashboard/register');  
  }
}


}
 

    function sproduct($url)
   {
     $data['product'] = $this->Dashboard_model->sproduct($url);
     $this->load->view('front/front2/single_pro',$data);
     $this->load->view('front/default/footer');
   }

   function profile()
   {
     $user_id = $_SESSION['user_id'];
     $data['detaial'] = $this->Dashboard_model->profile($user_id);
    $this->load->view('front/front2/profile',$data);
     // $this->load->view('front/default/footer');
   }
   function transction()
   {
        $randomNumber = rand(1, 1000000); 
            $data['randomNumber'] = $randomNumber;
     $user_id = $_SESSION['user_id'];
     $o_id = $this->Dashboard_model->transction($user_id,$randomNumber);
      // print_r($o_id['order_id']);die();
     // print_r($data['transction']);die();
      $data['myproduct'] = $this->Dashboard_model->myproduct($o_id['order_id']);
      // $data['get_payment'] = $this->Dashboard_model->get_payment($user_id);
     // $this->load->view('front/default/top2');
     // $this->load->view('front/default/header');
     // $this->load->view('front/front2/thanku',$data);
    $this->load->view('front/front2/payment',$data);
     // $this->load->view('front/default/footer');
   }

   function myorders()
   {
     $user_id = $_SESSION['user_id'];
     $data['myorders'] = $this->Dashboard_model->myorders($user_id);
       $this->load->view('front/front2/myorders',$data);
   }  

   function myproduct($o_id)
   {
        $data['myproduct'] = $this->Dashboard_model->myproduct($o_id);
        $data['ship_detail'] = $this->Dashboard_model->ship_detail();
        $this->load->view('front/front2/myproduct',$data);
   }

     function search()
   {
      $search = $this->input->get('search');

        // print_r($search);die();
       
        if(!empty($search)){
            $data = array();
            $data['get_all_product'] = $this->Dashboard_model->get_all_search_product($search);
            $data['search'] = $search;

            // print_r($data['get_all_product']);die();

            if ($data['get_all_product']) {
           
     $this->load->view('front/front2/search_pro',$data);
     // $this->load->view('front/default/footer');
            } else {
                redirect('error');
            }
        }
        else {
                redirect('error');
            }
    }

    function payment()
    { 
         // $data['user_info'] = $this->Dashboard_model->get_payment_info($search);
        $randomNumber = rand(1, 1000000); 
     $user_id = $_SESSION['user_id'];
     // $this->buy($user_id);die();
     $data['transction'] = $this->Dashboard_model->transction($user_id,$randomNumber);
     // print($data['transction']);die();
     $data['randomNumber'] = $randomNumber;
     $this->load->view('front/default/top2');
     $this->load->view('front/default/header');
     // $this->load->view('front/front2/thanku',$data);
             $this->load->view('front/front2/payment');
     $this->load->view('front/default/footer');
  
    }

    function payu()
    {
            $user_id = $_SESSION['user_id'];
            $data['checkout'] = $this->Dashboard_model->checkout($user_id);
           $this->load->view('front/front2/payu',$data);
    }
    function contact()
    {

     $data['category'] = $this->Dashboard_model->get_cat();
        $this->load->view('front/default/top2',$data);
     $this->load->view('front/default/header');
     $this->load->view('front/front2/contact_us');
     $this->load->view('front/default/footer');
    }
function about()
    {
     $data['category'] = $this->Dashboard_model->get_cat();
        $this->load->view('front/default/top2',$data);
     $this->load->view('front/default/header');
     $this->load->view('front/front2/about_us');
     $this->load->view('front/default/footer');
    }

    function faq()
    {
     $data['category'] = $this->Dashboard_model->get_cat();
        $this->load->view('front/default/top2',$data);
     $this->load->view('front/default/header');
     $this->load->view('front/front2/faq');
     $this->load->view('front/default/footer');
    }

}
?>