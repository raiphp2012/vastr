<?php 
/**
 * 
 */
class Login extends CI_Controller
{
	
	// function __construct()
	// {

	// }

	function login1()
	{
		$this->load->view('admin/pages/login');
	}
	 public function loginprocess()
    {
    	$this->form_validation->set_rules('username','User Name','required|trim');
        $this->form_validation->set_rules('password','Password','required|trim');
        if ($this->form_validation->run())
        {

                $username=$this->input->post('username');
                $password=$this->input->post('password');
                // $password=md5($password);
                $this->load->model('Login_model');
                $admindata = $this->Login_model->adminvalid($username,$password);
                if($admindata)
                {
                     $this->session->set_userdata(array('user_type'=>$admindata['a_type'],'id'=>$admindata['a_id'],'username'=>$admindata['a_user'],'password'=>$admindata['password']));
                    if($admindata['a_id']=='3')
                    {
                       redirect('admincontroller/index');
                    }
                    else
                    {
                        redirect('admincontroller');
                    }
                }                       
                else
                {
                    $this->session->set_flashdata('error', 'Invalid Username/Password');
                    redirect('Login/login1');
                }
        }
        else
        {

                $this->load->view('admincontroller/index');
        }

    }

    public function logout()
    {
    	$this->session->unset_userdata('id');
    $this->session->sess_destroy();
    	// $this->session->sess_destroy();
    	redirect('login/login1');
    }



     public function user_login()
    {
        $this->form_validation->set_rules('user_email','Email Id','required|trim');
        $this->form_validation->set_rules('password','Password','required|trim');
        if ($this->form_validation->run())
        {

                $username=$this->input->post('user_email');
                $password=$this->input->post('password');
                // $password=md5($password);
                $this->load->model('Login_model');
                $admindata = $this->Login_model->uservalid($username,$password);
                if($admindata)
                {
                     $this->session->set_userdata(array('user_id'=>$admindata['user_id'],'user_name'=>$admindata['user_name'],'user_password'=>$admindata['user_password']));
                    if($admindata)
                    {
                   redirect('Dashboard');
                    }
                    else
                    {
                    $this->load->model('Dashboard_model');
          $data['category'] = $this->Dashboard_model->get_cat();
      $data['get_winter'] = $this->Dashboard_model->get_winter();
      $this->load->view('front/default/top2',$data);
      $this->load->view('front/default/header');
      $this->load->view('front/front2/index');
      $this->load->view('front/default/footer1');
                    }
                }                       
                else
                {
                     $this->load->model('Dashboard_model');
                    $this->session->set_flashdata('error', 'Invalid Username/Password');
         $this->load->view('front/front2/form');
     $this->load->view('front/default/footer1'); 
                }
        }
        else
        {
       $this->load->model('Dashboard_model');
       $data['category'] = $this->Dashboard_model->get_cat();
       $data['get_winter'] = $this->Dashboard_model->get_winter();
      $this->load->view('front/default/header');
      $this->load->view('Dasboard/index',$data);
      $this->load->view('front/default/footer');
        }

    }

   public function userlogout()
    {
      $this->session->unset_userdata('user_id');
    $this->session->sess_destroy();
      // $this->session->sess_destroy();
      redirect('Dashboard/register');
    }
}
?>