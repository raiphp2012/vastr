<?php 
   /**
    * 
    */
   class Admincontroller extends CI_Controller
   {
   		public function __construct()
   	{
   		parent::__construct();
           $this->load->library('form_validation');
           $this->load->model('Admin_model');
           $this->load->library('email');
           $this->load->library('session');
           // print_r($_SESSION);die();
           // $this->load->library('excel');
         // if(($this->session->userdata('username')))
         	if($_SESSION['password']=='')
               {
               		redirect('Login/login1');
               }else{

               }     
                     }
   	function index()
      	{
   		$data['title'] = "Index";
   		$this->load->view('admin/default/top');
   		$this->load->view('admin/default/header');
   		$this->load->view('admin/default/side',$data);
   		$this->load->view('admin/index');
   		$this->load->view('admin/default/footer');
   	}
   
   	function category_add()
   	{
   		$data['title'] = "Add Category";
   		$this->load->view('admin/default/top');
   		$this->load->view('admin/default/header');
   		$this->load->view('admin/default/side',$data);
   		$this->load->view('admin/pages/add_category');
   		$this->load->view('admin/default/footer');
   	}   
   
   	function categoryaction()
    {
           $this->form_validation->set_rules('cate_name','Category Name','required|trim|is_unique[category.cate_name]');
            if ($this->form_validation->run() == FALSE)
           {   
           $data['title'] = "Add Category";
   		$this->load->view('admin/default/top');
   		$this->load->view('admin/default/header');
   		$this->load->view('admin/default/side',$data);
   		$this->load->view('admin/pages/add_category');
   		$this->load->view('admin/default/footer');
   				}else{
   
   				$config['upload_path'] = 'assets/images/';
                   $config['allowed_types'] = 'gif|jpg|png|jpeg';
                   $config['max_width'] = '2000';
                   $config['min_width'] = '100';
                   // $config['max_height'] = '900';
                   // $config['min_height'] = '400';
                      $this->load->library('upload',$config);
                   if ($this->upload->do_upload('cate_image')) 
                   {
                       $data1['cate_image']=$this->upload->data();
            
               $data=array(
                               'cate_name'=>$this->input->post('cate_name'),
                               'category_image'=>$data1['cate_image']['file_name'],
                          );
               if($this->Admin_model->add_category($data))
               {
                   $this->session->set_flashdata('success', 'Category Added SuccessFully');
                   redirect('admincontroller/category_add');    
               }
               else
               {
                    $this->session->set_flashdata('error', 'Something Went Wrong');
                   redirect('admincontroller/category_add');    
               }
           }else{
           $data['upload_error']=$this->upload->display_errors();
           $data['title'] = "Add Category";
   		$this->load->view('admin/default/top');
   		$this->load->view('admin/default/header');
   		$this->load->view('admin/default/side',$data);
   		$this->load->view('admin/pages/add_category');
   		$this->load->view('admin/default/footer');
           }
       }
       }
   
      	function view_Category()
      	{
      		   if ($this->uri->segment(3)!='') 
           {
               $uri=$this->uri->segment(3);
               $id=$this->uri->segment(4);
                  if ($uri=='delete') 
               {
                   if($this->Admin_model->catedelete($id))
                   {
                       $data['delete']='Category Deleted SuccessFully';
                   }
               }
               if ($uri=='active') 
               {
                   if($this->Admin_model->cateactive($id))
                   {
                       $data['active']='Category Activated SuccessFully';
                   }
   
               }
               if ($uri=='deactive') 
               {
                   if($this->Admin_model->catedeactive($id))
                   {
                       $data['deactivate']='Category Deactivated SuccessFully';
                   }
               }
           }
      		$data['all_category'] = $this->Admin_model->view_Category();
   
   		$data['title'] = "All Category";
   		$this->load->view('admin/default/top');
   		$this->load->view('admin/default/header');
   		$this->load->view('admin/default/side',$data);
   		$this->load->view('admin/pages/view_category');
   		$this->load->view('admin/default/footer');
      	}
   
      	function edit_cate($id)
      	{
      		$data['edit_cate'] = $this->Admin_model->edit_cate($id);
      		$data['title'] = "Edit Category";
   		$this->load->view('admin/default/top');
   		$this->load->view('admin/default/header');
   		$this->load->view('admin/default/side',$data);
   		$this->load->view('admin/pages/edit_cate',$data);
   		$this->load->view('admin/default/footer');
      	} 
   
   
      	function category_edit($id)
      	{
   
           $id=$this->uri->segment(3);
      
   
   
              if ($this->uri->segment(4)=='update') 
               {
                   $this->form_validation->set_rules('cate_name','Category Name ','required|trim');
                   if ($this->form_validation->run())
                   { 
   
                       if ($_FILES['cate_image']['name']=="") 
                       {
                           $data=array(
                                   'cate_name'=>$this->input->post('cate_name')
                                   );
   
   
                              if($this->Admin_model->categoryupdate($id,$data))
                               {
                                   $this->session->set_flashdata('success', 'Category Updated SuccessFully');
                                                  	$data['edit_cate'] = $this->Admin_model->edit_cate($id);
      		$data['title'] = "Edit Category";
   		$this->load->view('admin/default/top');
   		$this->load->view('admin/default/header');
   		$this->load->view('admin/default/side',$data);
   		$this->load->view('admin/pages/edit_cate',$data);
   		$this->load->view('admin/default/footer'); 
                               }
                               else
                               {
            $this->session->set_flashdata('error', 'Something Went Wrong');
            $data['edit_cate'] = $this->Admin_model->edit_cate($id);
      		$data['title'] = "Edit Category";
   		$this->load->view('admin/default/top');
   		$this->load->view('admin/default/header');
   		$this->load->view('admin/default/side',$data);
   		$this->load->view('admin/pages/edit_cate',$data);
   		$this->load->view('admin/default/footer'); 
                               }
                       }
                       else
                       {
                           $config['upload_path'] = 'assets/images/';
                           $config['allowed_types'] = 'gif|jpg|png|jpeg';
                           $name = $_FILES['cate_image']['name'];
                           $config['max_width'] = '1800';
                           $config['min_width'] = '100';
                           // $config['max_height'] = '800';
                           // $config['min_height'] = '400';
                           $this->load->library('upload',$config);
                           if ($this->upload->do_upload('cate_image')) 
                           {
                               $data1['cate_image']=$this->upload->data();
                                $data=array(
                                       'cate_name'=>$this->input->post('cate_name'),
                                       'category_image'=>$data1['cate_image']['file_name'],
                                       );
                         
                               if($this->Admin_model->categoryupdate($id,$data))
                               {
                                   $this->session->set_flashdata('success', 'Category Updated SuccessFully');
                                  	$data['edit_cate'] = $this->Admin_model->edit_cate($id);
      		$data['title'] = "Edit Category";
   		$this->load->view('admin/default/top');
   		$this->load->view('admin/default/header');
   		$this->load->view('admin/default/side',$data);
   		$this->load->view('admin/pages/edit_cate',$data);
   		$this->load->view('admin/default/footer');     
                               }
                               else
                               {
   			$this->session->set_flashdata('error', 'Something Went Wrong');
              	$data['edit_cate'] = $this->Admin_model->edit_cate($id);
      		$data['title'] = "Edit Category";
   		$this->load->view('admin/default/top');
   		$this->load->view('admin/default/header');
   		$this->load->view('admin/default/side',$data);
   		$this->load->view('admin/pages/edit_cate',$data);
   		$this->load->view('admin/default/footer');
   
                               }
                           }
                           else
                           {
            $data['upload_error']=$this->upload->display_errors();
            $data['edit_cate'] = $this->Admin_model->edit_cate($id);
      		$data['title'] = "Edit Category";
   		$this->load->view('admin/default/top');
   		$this->load->view('admin/default/header');
   		$this->load->view('admin/default/side',$data);
   		$this->load->view('admin/pages/edit_cate',$data);
   		$this->load->view('admin/default/footer');
                           }
   
                       }
                   }
                   else
                   {
                  	$data['edit_cate'] = $this->Admin_model->edit_cate($id);
      		$data['title'] = "Edit Category";
   		$this->load->view('admin/default/top');
   		$this->load->view('admin/default/header');
   		$this->load->view('admin/default/side',$data);
   		$this->load->view('admin/pages/edit_cate',$data);
   		$this->load->view('admin/default/footer');
                   }
               }
               else
               {
               	$data['edit_cate'] = $this->Admin_model->edit_cate($id);
      		$data['title'] = "Edit Category";
   		$this->load->view('admin/default/top');
   		$this->load->view('admin/default/header');
   		$this->load->view('admin/default/side',$data);
   		$this->load->view('admin/pages/edit_cate',$data);
   		$this->load->view('admin/default/footer');
   
               } 
   
           
   
      	} 
   
      	function add_subcategory()
      	{
      		$data['all_category'] = $this->Admin_model->view_Category();
      		$data['title'] = "Add Sub Category";
   		$this->load->view('admin/default/top');
   		$this->load->view('admin/default/header');
   		$this->load->view('admin/default/side',$data);
   		$this->load->view('admin/pages/add_subcategory');
   		$this->load->view('admin/default/footer');
      	}
			function add_subchield()
      	{
      		$data['all_category'] = $this->Admin_model->view_Category();
      		$data['title'] = "Add Sub Category";
   		$this->load->view('admin/default/top');
   		$this->load->view('admin/default/header');
   		$this->load->view('admin/default/side',$data);
   		$this->load->view('admin/pages/add_subchield');
   		$this->load->view('admin/default/footer');
      	}
	       	function subchildaction()
      	{
   	      // print_r($_POST);die;
           $this->form_validation->set_rules('sub_child_name','Sub Category Name','required|trim');
				$this->form_validation->set_rules('sub_id','Sub Category Name','required|trim');
            $this->form_validation->set_rules('cate_id','Category Name','required|trim');
            if ($this->form_validation->run() == FALSE)
           {   
        	$data['all_category'] = $this->Admin_model->view_Category();
      		$data['title'] = "Add Sub Child Category";
   		$this->load->view('admin/default/top');
   		$this->load->view('admin/default/header');
   		$this->load->view('admin/default/side',$data);
   		$this->load->view('admin/pages/add_subchield');
   		$this->load->view('admin/default/footer');
   				}else{
              $config['upload_path'] = 'assets/images/';
                           $config['allowed_types'] = 'gif|jpg|png|jpeg';
                           $name = $_FILES['sub_child_image']['name'];
                           $config['max_width'] = '1800';
                           $config['min_width'] = '100';
                           // $config['max_height'] = '800';
                           // $config['min_height'] = '400';
                           $this->load->library('upload',$config);
                           if ($this->upload->do_upload('sub_child_image')) 
                           {
                               $data1['sub_child_image']=$this->upload->data();
                            $data=array(
                               'sub_id'=>$this->input->post('sub_id'),
                                'child_image'=>$data1['sub_child_image']['file_name'],
								                'sub_child_name'=>$this->input->post('sub_child_name'),
                               'category_id'=>$this->input->post('cate_id'),
                          );
               if($this->Admin_model->add_subchild($data))
               {
                   $this->session->set_flashdata('success', 'Sub Child Category Added SuccessFully');
                   redirect('admincontroller/add_subchield');    
               }
               else
               {
                    $this->session->set_flashdata('error', 'Something Went Wrong');
                   redirect('admincontroller/add_subchield');    
               }

             }else{
           $data['upload_error']=$this->upload->display_errors();
        $data['all_category'] = $this->Admin_model->view_Category();
          $data['title'] = "Add Sub Child Category";
      $this->load->view('admin/default/top');
      $this->load->view('admin/default/header');
      $this->load->view('admin/default/side',$data);
      $this->load->view('admin/pages/add_subchield');
      $this->load->view('admin/default/footer');
           }
       
   
   }
 
}
	     function view_subchild()
   {
            if ($this->uri->segment(3)!='') 
           {
               $uri=$this->uri->segment(3);
               // print_r($uri);die();
               $id=$this->uri->segment(4);
                  if ($uri=='delete') 
               {
                   if($this->Admin_model->subchidelete($id))
                   {
                       $data['delete']='Sub Child Category Deleted SuccessFully';
                   }
               }
               if ($uri=='active') 
               {
                   if($this->Admin_model->subchildactive($id))
                   {
                       $data['active']='Sub Child Category Activated SuccessFully';
                   }
   
               }
               if ($uri=='deactive') 
               {
                   if($this->Admin_model->subchilddeactive($id))
                   {
                       $data['deactivate']='Sub Child Category Deactivated SuccessFully';
                   }
               }
           }
           
        	       $data['all_sub_child'] = $this->Admin_model->view_subchild();

           		$data['title'] = "All Sub Child Category";
           		$this->load->view('admin/default/top');
           		$this->load->view('admin/default/header');
           		$this->load->view('admin/default/side',$data);
           		$this->load->view('admin/pages/view_subchild');
           		$this->load->view('admin/default/footer');
   }
	   function edit_subchild($id)
      	{
      		$data['all_category'] = $this->Admin_model->view_Category();
      		$data['all_sub_cate'] = $this->Admin_model->view_sub_sategory();
      		$data['edit_subcate'] = $this->Admin_model->edit_subchild($id);

      		$data['title'] = "Edit Sub Category";
   		$this->load->view('admin/default/top');
   		$this->load->view('admin/default/header');
   		$this->load->view('admin/default/side',$data);
   		$this->load->view('admin/pages/edit_subchild',$data);
   		$this->load->view('admin/default/footer');
      	}
   
      	function update_subchild()
     	{
   					// print_r($_POST);die();
                    $id=$this->uri->segment(3); 
              if ($this->uri->segment(4)=='update') 
               {
                   $this->form_validation->set_rules('sub_id','Sub Category Name ','required|trim');
                   $this->form_validation->set_rules('sub_child_name','Sub Child Category Name ','required|trim');
                   $this->form_validation->set_rules('cate_id','Category Name ','required|trim');
                   if ($this->form_validation->run())
                   { 
                           $data=array(
                                   'sub_id'=>$this->input->post('sub_id'),
                                   'sub_child_name'=>$this->input->post('sub_child_name'),
                                   'category_id'=>$this->input->post('cate_id')
                                   );
                      // print_r($data);die;
   
                              if($this->Admin_model->subchildupdate($id,$data))
                               {
                      $this->session->set_flashdata('success', 'Sub Child Category Updated SuccessFully');
                                             
          	$data['all_category'] = $this->Admin_model->view_Category();
      		$data['all_sub_cate'] = $this->Admin_model->view_sub_sategory();
      		$data['edit_subcate'] = $this->Admin_model->edit_subchild($id);

      		$data['title'] = "Edit Sub Category";
   		$this->load->view('admin/default/top');
   		$this->load->view('admin/default/header');
   		$this->load->view('admin/default/side',$data);
   		$this->load->view('admin/pages/edit_subchild',$data);
   		$this->load->view('admin/default/footer');
                              } else
                               {
          $this->session->set_flashdata('error', 'Something Went Wrong');
         	$data['all_category'] = $this->Admin_model->view_Category();
      		$data['all_sub_cate'] = $this->Admin_model->view_sub_sategory();
      		$data['edit_subcate'] = $this->Admin_model->edit_subchild($id);

      		$data['title'] = "Edit Sub Category";
   		$this->load->view('admin/default/top');
   		$this->load->view('admin/default/header');
   		$this->load->view('admin/default/side',$data);
   		$this->load->view('admin/pages/edit_subchild',$data);
   		$this->load->view('admin/default/footer');;
                               }
                  }
                   else
                   {
       	$data['all_category'] = $this->Admin_model->view_Category();
      		$data['all_sub_cate'] = $this->Admin_model->view_sub_sategory();
      		$data['edit_subcate'] = $this->Admin_model->edit_subchild($id);

      		$data['title'] = "Edit Sub Category";
   		$this->load->view('admin/default/top');
   		$this->load->view('admin/default/header');
   		$this->load->view('admin/default/side',$data);
   		$this->load->view('admin/pages/edit_subchild',$data);
   		$this->load->view('admin/default/footer');
               }
           }
               else
               {
       	$data['all_category'] = $this->Admin_model->view_Category();
      		$data['all_sub_cate'] = $this->Admin_model->view_sub_sategory();
      		$data['edit_subcate'] = $this->Admin_model->edit_subchild($id);

      		$data['title'] = "Edit Sub Category";
   		$this->load->view('admin/default/top');
   		$this->load->view('admin/default/header');
   		$this->load->view('admin/default/side',$data);
   		$this->load->view('admin/pages/edit_subchild',$data);
   		$this->load->view('admin/default/footer');
               } 
               }
   
      	function subcategoryaction()
      	{
   	  
           $this->form_validation->set_rules('sub_cat_name','Sub Category Name','required|trim|is_unique[category.cate_name]');
            $this->form_validation->set_rules('cate_id','Category Name','required|trim');
            if ($this->form_validation->run() == FALSE)
           {   
        	$data['all_category'] = $this->Admin_model->view_Category();
      		$data['title'] = "Add Sub Category";
   		$this->load->view('admin/default/top');
   		$this->load->view('admin/default/header');
   		$this->load->view('admin/default/side',$data);
   		$this->load->view('admin/pages/add_subcategory');
   		$this->load->view('admin/default/footer');
   				}else{

                            $config['upload_path'] = 'assets/images/';
                           $config['allowed_types'] = 'gif|jpg|png|jpeg';
                           $name = $_FILES['subcate_image']['name'];
                           $config['max_width'] = '1800';
                           $config['min_width'] = '100';
                           // $config['max_height'] = '800';
                           // $config['min_height'] = '400';
                           $this->load->library('upload',$config);
                           if ($this->upload->do_upload('subcate_image')) 
                           {
                               $data1['subcate_image']=$this->upload->data();

                            $data=array(
                              'sabcat_image'=>$data1['subcate_image']['file_name'],
                               'sub_cat_name'=>$this->input->post('sub_cat_name'),
                               'category_id'=>$this->input->post('cate_id'),
                          );
               if($this->Admin_model->add_subcategory($data))
               {
                   $this->session->set_flashdata('success', 'Sub Category Added SuccessFully');
                   redirect('admincontroller/add_subcategory');    
               }
               else
               {
                    $this->session->set_flashdata('error', 'Something Went Wrong');
                   redirect('admincontroller/add_subcategory');    
               }
           }else{
              $data['upload_error']=$this->upload->display_errors();
            $data['all_category'] = $this->Admin_model->view_Category();
          $data['title'] = "Add Sub Category";
      $this->load->view('admin/default/top');
      $this->load->view('admin/default/header');
      $this->load->view('admin/default/side',$data);
      $this->load->view('admin/pages/add_subcategory');
      $this->load->view('admin/default/footer');

           }
         }
       
   
   }
   
   function view_subcategory()
   {
   	if ($this->uri->segment(3)!='') 
  {

              $uri=$this->uri->segment(3);
               $id=$this->uri->segment(4);
                  if ($uri=='delete') 
               {
                   if($this->Admin_model->subcatedelete($id))
                   {
                       $data['delete']='Sub Category Deleted SuccessFully';
                   }
               }
               if ($uri=='active') 
           {
              if($this->Admin_model->subcateactive($id))
                   {
                       $data['active']='Sub Category Activated SuccessFully';
                   }
   
               }
              if ($uri=='deactive') 
              {
               
                 if($this->Admin_model->subcatedeactive($id))
                 {
                       $data['deactivate']='Sub Category Deactivated SuccessFully';
                 }
             }
         }
        	       $data['all_sub_cat'] = $this->Admin_model->view_subcategory();
           		$data['title'] = "Add Category";
           		$this->load->view('admin/default/top');
           		$this->load->view('admin/default/header');
           		$this->load->view('admin/default/side',$data);
           		$this->load->view('admin/pages/view_subcategory');
           		$this->load->view('admin/default/footer');
   }
   		function edit_subcate($id)
      	{
      		$data['all_category'] = $this->Admin_model->view_Category();
      		$data['edit_subcate'] = $this->Admin_model->edit_subcate($id);
      		$data['title'] = "Edit Sub Category";
   		$this->load->view('admin/default/top');
   		$this->load->view('admin/default/header');
   		$this->load->view('admin/default/side',$data);
   		$this->load->view('admin/pages/edit_subcate',$data);
   		$this->load->view('admin/default/footer');
      	}
   
      	function update_subcategory()
     	{
   
                    $id=$this->uri->segment(3); 
              if ($this->uri->segment(4)=='update') 
               {
                   $this->form_validation->set_rules('sub_cat_name','Sub Category Name ','required|trim');
                   $this->form_validation->set_rules('cate_id','Sub Category Name ','required|trim');
                   if ($this->form_validation->run())
                   { 
                  
                           $data=array(
                                   'sub_cat_name'=>$this->input->post('sub_cat_name'),
                                   'category_id'=>$this->input->post('cate_id')
                                   );
   
   
                              if($this->Admin_model->subcatupdate($id,$data))
                               {
                      $this->session->set_flashdata('success', 'Sub Category Updated SuccessFully');
                                             
          $data['all_category'] = $this->Admin_model->view_Category();
          $data['edit_subcate'] = $this->Admin_model->edit_subcate($id);
          $data['title'] = "Edit Sub Category";
      $this->load->view('admin/default/top');
      $this->load->view('admin/default/header');
      $this->load->view('admin/default/side',$data);
      $this->load->view('admin/pages/edit_subcate',$data);
      $this->load->view('admin/default/footer');
                               }
                               else
                               {
          $this->session->set_flashdata('error', 'Something Went Wrong');
          $data['all_category'] = $this->Admin_model->view_Category();
          $data['edit_subcate'] = $this->Admin_model->edit_subcate($id);
          $data['title'] = "Edit Sub Category";
      $this->load->view('admin/default/top');
      $this->load->view('admin/default/header');
      $this->load->view('admin/default/side',$data);
      $this->load->view('admin/pages/edit_subcate',$data);
      $this->load->view('admin/default/footer');
                               }
                                         }
                   else
                   {
          $data['all_category'] = $this->Admin_model->view_Category();
          $data['edit_subcate'] = $this->Admin_model->edit_subcate($id);
          $data['title'] = "Edit Sub Category";
      $this->load->view('admin/default/top');
      $this->load->view('admin/default/header');
      $this->load->view('admin/default/side',$data);
      $this->load->view('admin/pages/edit_subcate',$data);
      $this->load->view('admin/default/footer');
                   }
               }
               else
               {
          $data['all_category'] = $this->Admin_model->view_Category();
          $data['edit_subcate'] = $this->Admin_model->edit_subcate($id);
          $data['title'] = "Edit Sub Category";
      $this->load->view('admin/default/top');
      $this->load->view('admin/default/header');
      $this->load->view('admin/default/side',$data);
      $this->load->view('admin/pages/edit_subcate',$data);
      $this->load->view('admin/default/footer');
               } 
               }
   function brand()
    {
      $data['title'] = "Add Brand";
      $this->load->view('admin/default/top');
      $this->load->view('admin/default/header');
      $this->load->view('admin/default/side',$data);
      $this->load->view('admin/pages/add_brand');
      $this->load->view('admin/default/footer');
    }
          function brandaction()
        {
      
           $this->form_validation->set_rules('brand_name','Brand Name','required|trim|is_unique[category.cate_name]');
            if ($this->form_validation->run() == FALSE)
           {   
          $data['title'] = "Add Brand";
      $this->load->view('admin/default/top');
      $this->load->view('admin/default/header');
      $this->load->view('admin/default/side',$data);
      $this->load->view('admin/pages/add_brand');
      $this->load->view('admin/default/footer');
          }else{
                            $data=array(
                               'brand_name'=>$this->input->post('brand_name')                          );
               if($this->Admin_model->add_brand($data))
               {
                   $this->session->set_flashdata('success', 'Brand Added SuccessFully');
                   redirect('admincontroller/brand');    
               }
               else
               {
                    $this->session->set_flashdata('error', 'Something Went Wrong');
                   redirect('admincontroller/brand');    
               }
           }
       
   
   }


                function view_brand()
               {
                $uri=$this->uri->segment(3);
               $id=$this->uri->segment(4);
                  if ($uri=='delete') 
               {
                   if($this->Admin_model->branddelete($id))
                   {
                       $data['delete']='Brand Deleted SuccessFully';
                   }
               }
               if ($uri=='active') 
           {
              if($this->Admin_model->brandactive($id))
                   {
                       $data['active']='Brand Activated SuccessFully';
                   }
   
               }
              if ($uri=='deactive') 
              {
               
                 if($this->Admin_model->branddeactive($id))
                 {
                       $data['deactivate']='Brand Deactivated SuccessFully';
                 }
             }
         
             $data['all_brand'] = $this->Admin_model->view_brand();
              $data['title'] = "Add Category";
              $this->load->view('admin/default/top');
              $this->load->view('admin/default/header');
              $this->load->view('admin/default/side',$data);
              $this->load->view('admin/pages/view_brand');
              $this->load->view('admin/default/footer');

               
             }
                 function edit_brand($id)
            {
             $data['edit_brand'] = $this->Admin_model->edit_brand($id);
          $data['title'] = "Edit Brand ";
      $this->load->view('admin/default/top');
      $this->load->view('admin/default/header');
      $this->load->view('admin/default/side',$data);
      $this->load->view('admin/pages/edit_brand',$data);
      $this->load->view('admin/default/footer');
        }
            function brand_edit()
      {
                    $id=$this->uri->segment(3); 
              if ($this->uri->segment(4)=='update') 
               {
                   $this->form_validation->set_rules('barnd_name','Brand Name ','required|trim');
                   if ($this->form_validation->run())
                   { 
                           $data=array(
                                   'brand_name'=>$this->input->post('brand_name'),
                                   );
                              if($this->Admin_model->brandupdate($id,$data))
                               {
                      $this->session->set_flashdata('success', 'Brand Updated SuccessFully');
             $data['edit_brand'] = $this->Admin_model->edit_brand($id);
          $data['title'] = "Edit Sub Category";
      $this->load->view('admin/default/top');
      $this->load->view('admin/default/header');
      $this->load->view('admin/default/side',$data);
      $this->load->view('admin/pages/edit_subcate',$data);
      $this->load->view('admin/default/footer');
                               }
                               else
                               {
                                   $this->session->set_flashdata('error', 'Something Went Wrong');
          $data['edit_brand'] = $this->Admin_model->edit_brand($id);
          $data['title'] = "Edit Brand";
      $this->load->view('admin/default/top');
      $this->load->view('admin/default/header');
      $this->load->view('admin/default/side',$data);
      $this->load->view('admin/pages/edit_brand',$data);
      $this->load->view('admin/default/footer');
                               }
                }
              else
                   {
           $this->session->set_flashdata('error', 'Something Went Wrong');
          $data['edit_brand'] = $this->Admin_model->edit_brand($id);
          $data['title'] = "Edit Brand";
      $this->load->view('admin/default/top');
      $this->load->view('admin/default/header');
      $this->load->view('admin/default/side',$data);
      $this->load->view('admin/pages/edit_brand',$data);
      $this->load->view('admin/default/footer');
                   }
               }
               else
               {
          $data['edit_brand'] = $this->Admin_model->edit_brand($id);
          $data['title'] = "Edit Brand";
      $this->load->view('admin/default/top');
      $this->load->view('admin/default/header');
      $this->load->view('admin/default/side',$data);
      $this->load->view('admin/pages/edit_brand',$data);
      $this->load->view('admin/default/footer');
               } 
               }

               function top_banner()
               {
      $data['title'] = "Edit Sub Category";
      $this->load->view('admin/default/top');
      $this->load->view('admin/default/header');
      $this->load->view('admin/default/side',$data);
      $this->load->view('admin/pages/addtop_banner',$data);
      $this->load->view('admin/default/footer');

               }  

               function topbanneraction()
               {

          $config['upload_path'] = 'assets/images/';
                   $config['allowed_types'] = 'gif|jpg|png|jpeg';
                   $config['max_width'] = '1800';
                   $config['min_width'] = '400';
                   // $config['max_height'] = '900';
                   // $config['min_height'] = '400';
                      $this->load->library('upload',$config);
                   if ($this->upload->do_upload('b_image')) 
                   {
                       $data1['b_image']=$this->upload->data();
            
               $data=array(
                               'b_image'=>$data1['b_image']['file_name'],
                          );
               if($this->Admin_model->add_top_banner($data))
               {
                   $this->session->set_flashdata('success', 'Category Added SuccessFully');
                   redirect('admincontroller/top_banner');    
               }
               else
               {
                    $this->session->set_flashdata('error', 'Something Went Wrong');
                   redirect('admincontroller/top_banner');    
               }
           }else{
           $data['upload_error']=$this->upload->display_errors();
           $data['title'] = "Add Category";
      $this->load->view('admin/default/top');
      $this->load->view('admin/default/header');
      $this->load->view('admin/default/side',$data);
      $this->load->view('admin/pages/addtop_banner');
      $this->load->view('admin/default/footer');
           }
       }


                function view_top_banner()
               {
                $uri=$this->uri->segment(3);
               $id=$this->uri->segment(4);
                  if ($uri=='delete') 
               {
                   if($this->Admin_model->topdelete($id))
                   {
                       $data['delete']='Top Banner Deleted SuccessFully';
                   }
               }
               if ($uri=='active') 
           {
              if($this->Admin_model->topactive($id))
                   {
                       $data['active']='Top  Banner Activated SuccessFully';
                   }
   
               }
              if ($uri=='deactive') 
              {
               
                 if($this->Admin_model->topdeactive($id))
                 {
                       $data['deactivate']='Top Banner Deactivated SuccessFully';
                 }
             }
         
             $data['all_top'] = $this->Admin_model->view_top();
              $data['title'] = "Add Category";
              $this->load->view('admin/default/top');
              $this->load->view('admin/default/header');
              $this->load->view('admin/default/side',$data);
              $this->load->view('admin/pages/view_top_banner');
              $this->load->view('admin/default/footer');

               
             }

             function edit_top($id)
            {
             $data['edit_top'] = $this->Admin_model->edit_top($id);
          $data['title'] = "Edit Top Banner ";
      $this->load->view('admin/default/top');
      $this->load->view('admin/default/header');
      $this->load->view('admin/default/side',$data);
      $this->load->view('admin/pages/edit_top_banner',$data);
      $this->load->view('admin/default/footer');
        }    
        function top_edit()

        {
           $id=$this->uri->segment(3);   
              if ($this->uri->segment(4)=='update') 
               {   
                           $config['upload_path'] = 'assets/images/';
                           $config['allowed_types'] = 'gif|jpg|png|jpeg';
                           $name = $_FILES['b_image']['name'];
                           $config['max_width'] = '1800';
                           $config['min_width'] = '100';
                           // $config['max_height'] = '800';
                           // $config['min_height'] = '400';
                           $this->load->library('upload',$config);
                           if ($this->upload->do_upload('b_image')) 
                           {
                               $data1['b_image']=$this->upload->data();
                                $data=array(
                                       'b_image'=>$data1['b_image']['file_name'],
                                       );                         
                               if($this->Admin_model->top_update($id,$data))
                               {
                                   $this->session->set_flashdata('success', 'Banner Updated SuccessFully');
        $data['edit_top'] = $this->Admin_model->edit_top($id);
          $data['title'] = "Edit Top Banner ";
      $this->load->view('admin/default/top');
      $this->load->view('admin/default/header');
      $this->load->view('admin/default/side',$data);
      $this->load->view('admin/pages/edit_top_banner',$data);
      $this->load->view('admin/default/footer');   
                               }
                               else
                               {
        $this->session->set_flashdata('error', 'Something Went Wrong');
         $data['edit_top'] = $this->Admin_model->edit_top($id);
          $data['title'] = "Edit Top Banner ";
      $this->load->view('admin/default/top');
      $this->load->view('admin/default/header');
      $this->load->view('admin/default/side',$data);
      $this->load->view('admin/pages/edit_top_banner',$data);
      $this->load->view('admin/default/footer');
   
                               }
                           }
                           else
                           {
            $data['upload_error']=$this->upload->display_errors();
              $data['edit_top'] = $this->Admin_model->edit_top($id);
          $data['title'] = "Edit Top Banner ";
      $this->load->view('admin/default/top');
      $this->load->view('admin/default/header');
      $this->load->view('admin/default/side',$data);
      $this->load->view('admin/pages/edit_top_banner',$data);
      $this->load->view('admin/default/footer');
                           }
   
                       }else{
                         $this->session->set_flashdata('error', 'Something Went Wrong');
         $data['edit_top'] = $this->Admin_model->edit_top($id);
          $data['title'] = "Edit Top Banner ";
      $this->load->view('admin/default/top');
      $this->load->view('admin/default/header');
      $this->load->view('admin/default/side',$data);
      $this->load->view('admin/pages/edit_top_banner',$data);
      $this->load->view('admin/default/footer');

                       }
                      
                   }       



                    function bottom_banner()
               {
      $data['title'] = "Edit Sub Category";
      $this->load->view('admin/default/top');
      $this->load->view('admin/default/header');
      $this->load->view('admin/default/side',$data);
      $this->load->view('admin/pages/addbottom_banner',$data);
      $this->load->view('admin/default/footer');
               }  

               function bottombanneraction()
               {

          $config['upload_path'] = 'assets/images/';
                   $config['allowed_types'] = 'gif|jpg|png|jpeg';
                   $config['max_width'] = '1800';
                   $config['min_width'] = '400';
                   // $config['max_height'] = '900';
                   // $config['min_height'] = '400';
                      $this->load->library('upload',$config);
                   if ($this->upload->do_upload('b_image')) 
                   {
                       $data1['b_image']=$this->upload->data();
            
               $data=array(
                               'b_image'=>$data1['b_image']['file_name'],
                          );
               if($this->Admin_model->add_bottom_banner($data))
               {
                   $this->session->set_flashdata('success', 'Category Added SuccessFully');
                   redirect('admincontroller/bottom_banner');    
               }
               else
               {
                    $this->session->set_flashdata('error', 'Something Went Wrong');
                   redirect('admincontroller/bottom_banner');    
               }
           }else{
           $data['upload_error']=$this->upload->display_errors();
           $data['title'] = "Add Category";
      $this->load->view('admin/default/top');
      $this->load->view('admin/default/header');
      $this->load->view('admin/default/side',$data);
      $this->load->view('admin/pages/addbottom_banner');
      $this->load->view('admin/default/footer');
           }
       }


                function view_bottom_banner()
               {
                $uri=$this->uri->segment(3);
               $id=$this->uri->segment(4);
                  if ($uri=='delete') 
               {
                   if($this->Admin_model->bottomdelete($id))
                   {
                       $data['delete']='Bottom Banner Deleted SuccessFully';
                   }
               }
               if ($uri=='active') 
           {
              if($this->Admin_model->bottomactive($id))
                   {
                       $data['active']='Bottom  Banner Activated SuccessFully';
                   }
   
               }
              if ($uri=='deactive') 
              {
               
                 if($this->Admin_model->bottomdeactive($id))
                 {
                       $data['deactivate']='Bottom Banner Deactivated SuccessFully';
                 }
             }
         
             $data['all_bottom'] = $this->Admin_model->view_bottom();
              $data['title'] = "Add Bottom Banner";
              $this->load->view('admin/default/top');
              $this->load->view('admin/default/header');
              $this->load->view('admin/default/side',$data);
              $this->load->view('admin/pages/view_bottom_banner');
              $this->load->view('admin/default/footer');

               
             }

             function edit_bottom($id)
            {
             $data['edit_bottom'] = $this->Admin_model->edit_bottom($id);
          $data['title'] = "Edit Top Banner ";
      $this->load->view('admin/default/top');
      $this->load->view('admin/default/header');
      $this->load->view('admin/default/side',$data);
      $this->load->view('admin/pages/edit_bottom_banner',$data);
      $this->load->view('admin/default/footer');
        }

        function bottom_edit()

        {
           $id=$this->uri->segment(3); 
           // print_r($id);die();
              // if ($this->uri->segment(4)=='update') 
               {   
                                   
                           $config['upload_path'] = 'assets/images/';
                           $config['allowed_types'] = 'gif|jpg|png|jpeg';
                           $name = $_FILES['b_image']['name'];
                           $config['max_width'] = '2000';
                           $config['min_width'] = '100';
                           // $config['max_height'] = '800';
                           // $config['min_height'] = '400';
                           $this->load->library('upload',$config);
                           if ($this->upload->do_upload('b_image')) 
                           {
                               $data1['b_image']=$this->upload->data();
                                $data=array(
                                       'b_image'=>$data1['b_image']['file_name'],
                                       );                         
                               if($this->Admin_model->bottom_update($id,$data))
                               {
                                   $this->session->set_flashdata('success', 'Banner Updated SuccessFully');
        $data['edit_bottom'] = $this->Admin_model->edit_bottom($id);
          $data['title'] = "Edit Bottom Banner ";
      $this->load->view('admin/default/top');
      $this->load->view('admin/default/header');
      $this->load->view('admin/default/side',$data);
      $this->load->view('admin/pages/edit_bottom_banner',$data);
      $this->load->view('admin/default/footer');   
                               }
                               else
                               {
        $this->session->set_flashdata('error', 'Something Went Wrong');
         $data['edit_bottom'] = $this->Admin_model->edit_bottom($id);
          $data['title'] = "Edit Top Banner ";
      $this->load->view('admin/default/top');
      $this->load->view('admin/default/header');
      $this->load->view('admin/default/side',$data);
      $this->load->view('admin/pages/edit_bottom_banner',$data);
      $this->load->view('admin/default/footer');
   
                               }
                           }
                           else
                           {
              $data['upload_error']=$this->upload->display_errors();
              $data['edit_bottom'] = $this->Admin_model->edit_bottom($id);
              $data['title'] = "Edit Top Banner ";
              $this->load->view('admin/default/top');
              $this->load->view('admin/default/header');
              $this->load->view('admin/default/side',$data);
              $this->load->view('admin/pages/edit_bottom_banner',$data);
              $this->load->view('admin/default/footer');
                           }
   
                       }
                      
                   }    

                   function product()
                   {
                    $data['all_cat'] = $this->Admin_model->all_cat();
                    $data['all_subcat'] = $this->Admin_model->all_subcat();
                    $data['all_brand'] = $this->Admin_model->all_brand();
                    $data['color'] = $this->Admin_model->all_color();
                    $data['size'] = $this->Admin_model->all_size();
                    $data['title'] = "Add Products ";
                    $this->load->view('admin/default/top');
                    $this->load->view('admin/default/header');
                    $this->load->view('admin/default/side',$data);
                    $this->load->view('admin/pages/add_product',$data);
                    $this->load->view('admin/default/footer');
                   }

    //                   function productaction()
    //                {
    //                	  error_reporting(0);
    //     $this->form_validation->set_rules('pro_name','Product Title','required|trim');
    //     $this->form_validation->set_rules('pro_sku','Product Sku','required|trim');
    //     $this->form_validation->set_rules('cat_id','Product Category','required|trim');
    //     $this->form_validation->set_rules('sub_id','Product Sub Category','required|trim');
    //     $this->form_validation->set_rules('sub_child_id','Product Sub Child Category','required|trim');
    //     $this->form_validation->set_rules('brand_id','Product Brand','required|trim');
    //     // $this->form_validation->set_rules('pro_quantity','Product Qunatity','required|trim');
    //     $this->form_validation->set_rules('pro_price','Product Price','required|trim|numeric');
    //     $this->form_validation->set_rules('pro_sale_price','Product Sale Price','required|trim|numeric');
    //     $this->form_validation->set_rules('pro_sort_desc','Product Sort Description','required|trim');
    //     $this->form_validation->set_rules('pro_full_desc','Product Full Description','required|trim');
    //     $this->form_validation->set_rules('pro_meta_content','Product Meta Content','required|trim');
    //     // $this->form_validation->set_rules('color','Color','required|trim');
    //     // $this->form_validation->set_rules('pro_meta_keyword','Product Meta Keyword','trim');
    //     $this->form_validation->set_rules('pro_popular','NA','trim');
    //     $this->form_validation->set_rules('pro_new','NA','trim');
    //     $this->form_validation->set_rules('pro_arrival','NA','trim');
    //     $product_url = str_replace(" ","-",strtolower(trim($this->input->post('pro_name'))));
    //     $product_url = str_replace("&","and",$product_url);
    //     $product_url = str_replace("?"," ",$product_url);
    //     $product_url=$product_url."_".rand();
        
    //     if(!$_POST['color'])
    //     {
    //         $pro_color='NA';
    //     }
    //     else
    //     {
    //         $colors=$_POST['color'];
    //         $pro_color=implode('/',$colors); 
                                    
    //     }
    //  if ($this->form_validation->run() == FALSE)
    //        {   
    //               $data['all_cat'] = $this->Admin_model->all_cat();
    //                 $data['all_subcat'] = $this->Admin_model->all_subcat();
    //                 $data['sub_child_id'] = $this->Admin_model->all_subchild();
    //                 $data['all_brand'] = $this->Admin_model->all_brand();
    //                 $data['title'] = "Add Products ";
    //                 $this->load->view('admin/default/top');
    //                 $this->load->view('admin/default/header');
    //                 $this->load->view('admin/default/side',$data);
    //                 $this->load->view('admin/pages/add_product',$data);
    //                 $this->load->view('admin/default/footer');
    //       }else{ 
         
    //                 $config['upload_path'] = 'assets/images/';
    //                $config['allowed_types'] = 'gif|jpg|png|jpeg';
    //                $config['max_width'] = '1800';
    //                $config['min_width'] = '100';
    //                // $config['max_height'] = '900';
    //                // $config['min_height'] = '400';
    //                   $this->load->library('upload',$config);
    //                if ($this->upload->do_upload('pro_feat_image')) 
    //                {
    //                    $data1['pro_feat_image']=$this->upload->data();
    //   //                   $data = [];
   
    //   // $count = count($_FILES['files']['name']);
    
    //   // for($i=0;$i<$count;$i++){
    
    //   //   if(!empty($_FILES['files']['name'][$i])){
    
    //   //     $_FILES['file']['name'] = $_FILES['files']['name'][$i];
    //   //     $_FILES['file']['type'] = $_FILES['files']['type'][$i];
    //   //     $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
    //   //     $_FILES['file']['error'] = $_FILES['files']['error'][$i];
    //   //     $_FILES['file']['size'] = $_FILES['files']['size'][$i];
  
    //   //     $config['upload_path'] = 'assets/images/'; 
    //   //     $config['allowed_types'] = 'jpg|jpeg|png|gif';
    //   //     $config['max_size'] = '5000';
    //   //     $config['file_name'] = $_FILES['files']['name'][$i];
   
    //   //     $this->load->library('upload',$config); 
    
    //   //     if($this->upload->do_upload('file')){
    //   //       $uploadData = $this->upload->data();
    //   //       $filename = $uploadData['file_name'];
    //   //       $data2[$i]['pro_gallery'][] = $filename;
    //   //     }
    //   //   }

   
    //   // }
    //         $name_array = array();
    //     $count = count($_FILES['files']['size']);
    //     foreach($_FILES as $key=>$value)
    //     for($s=0; $s<=$count-1; $s++) {
    //     $_FILES['files']['name']=$value['name'][$s];
    //     $_FILES['files']['type']    = $value['type'][$s];
    //     $_FILES['files']['tmp_name'] = $value['tmp_name'][$s];
    //     $_FILES['files']['error'] = $value['error'][$s];
    //     $_FILES['files']['size']  = $value['size'][$s];   
    //         $config['upload_path'] = '/assets/images/';
    //        $config['allowed_types'] = 'gif|jpg|png|jpeg';
    //         // $config['max_size']    = '100';
    //         // $config['max_width']  = '1024';
    //         // $config['max_height']  = '768';
    //     $this->load->library('upload', $config);
    //     $this->upload->do_upload();
    //     $data = $this->upload->data();
    //     $name_array[] = $data['file_name'];
    //         }

    //         $galery_img = implode(',', $name_array);

    //                      $product=array(
    //                             'pro_name'=>$this->input->post('pro_name'),
    //                             'pro_url'=>$product_url,
    //                             'pro_sku'=>$this->input->post('pro_sku'),
    //                             'pro_category_id'=>$this->input->post('cat_id'),
    //                             'pro_sub_category'=>$this->input->post('sub_id'),
    //                             'pro_child'=>$this->input->post('sub_child_id'),
    //                             'brand_id'=>$this->input->post('sub_id'),
    //                             'pro_price'=>$this->input->post('pro_price'),
    //                             'pro_sale_price'=>$this->input->post('pro_sale_price'),
    //                             'pro_sort_desc'=>$this->input->post('pro_sort_desc'),
    //                             'pro_full_desc'=>$this->input->post('pro_full_desc'),
    //                             'pro_color'=>$pro_color,
    //                             'pro_meta_content'=>$this->input->post('pro_meta_content'),
    //                             // 'pro_meta_keyword'=>$this->input->post('pro_meta_keyword'),
    //                             'pro_feat_image'=>$data1['pro_feat_image']['file_name'],
    //                             'pro_gallery_image'=>$galery_img,
    //                             'pro_popular'=>$this->input->post('pro_popular'),
    //                             'pro_new'=>$this->input->post('pro_new'),
    //                             'pro_arrival'=>$this->input->post('pro_arrival'),
    //                             'status'=>'1',
    //                             'pro_date'=>date('Y-m-d')
    //                             );
    //                                         if($this->Admin_model->productadd($product))
    //                                         {
    //                                             $this->session->set_flashdata('success', 'Product Added SuccessFully');
    //                                             // $this->session->set_flashdata('error', 'But there  was no gallery image uploaded');
    //                                             redirect('admincontroller/product');  
    //                                         }
    //                                         else
    //                                         {
    //                                           $this->session->set_flashdata('error', 'Something went wrong ');
    //                                           redirect('admincontroller/product'); 
    //                                         }   
    //                                 // }
    //                }
    //                 else
    //                 {
    //                   // echo "last";die();
    //                   $data['all_cat'] = $this->Admin_model->all_cat();
    //                 $data['all_subcat'] = $this->Admin_model->all_subcat();
    //                 $data['all_brand'] = $this->Admin_model->all_brand();
    //                 $data['color'] = $this->Admin_model->all_color();
    //                   $data['upload_error']=$this->upload->display_errors();
    //                 $data['title'] = "Add Products ";
    //                 $this->load->view('admin/default/top');
    //                 $this->load->view('admin/default/header');
    //                 $this->load->view('admin/default/side',$data);
    //                 $this->load->view('admin/pages/add_product',$data);
    //                 $this->load->view('admin/default/footer');
    //                 }
    //         }        
    // }  
                                         function productaction()
                   {
                      error_reporting(0);
        $this->form_validation->set_rules('pro_name','Product Title','required|trim');
        $this->form_validation->set_rules('pro_sku','Product Sku','required|trim');
        $this->form_validation->set_rules('cat_id','Product Category','required|trim');
        $this->form_validation->set_rules('sub_id','Product Sub Category','required|trim');
        $this->form_validation->set_rules('sub_child_id','Product Sub Child Category','required|trim');
        $this->form_validation->set_rules('brand_id','Product Brand','required|trim');
        $this->form_validation->set_rules('pro_type','Product TYPE','required|trim');
        $this->form_validation->set_rules('pro_price','Product Price','required|trim|numeric');
        $this->form_validation->set_rules('pro_sale_price','Product Sale Price','required|trim|numeric');
        $this->form_validation->set_rules('pro_quantity','Product Qunatity','required|trim|numeric');
        $this->form_validation->set_rules('pro_sort_desc','Product Sort Description','required|trim');
        $this->form_validation->set_rules('pro_full_desc','Product Full Description','required|trim');
        $this->form_validation->set_rules('pro_meta_content','Product Meta Content','required|trim');
        // $this->form_validation->set_rules('color','Color','required|trim');
        // $this->form_validation->set_rules('pro_meta_keyword','Product Meta Keyword','trim');
        $this->form_validation->set_rules('pro_popular','NA','trim');
        $this->form_validation->set_rules('pro_new','NA','trim');
        $this->form_validation->set_rules('pro_arrival','NA','trim');
        $product_url = str_replace(" ","-",strtolower(trim($this->input->post('pro_name'))));
        $product_url = str_replace("&","and",$product_url);
        $product_url = str_replace("?"," ",$product_url);
        $product_url=$product_url."_".rand();
        
        if(!$_POST['color'])
        {
            $pro_color='NA';
        }
        else
        {
            $colors=$_POST['color'];
            $pro_color=implode('/',$colors); 
                                    
        } 

          if(!$_POST['size'])
        {
            $pro_size='NA';
        }
        else
        {
            $sizes=$_POST['size'];
            $pro_size=implode(',',$sizes); 
                                    
        }
     if ($this->form_validation->run() == FALSE)
           {   
                  $data['all_cat'] = $this->Admin_model->all_cat();
                    $data['all_subcat'] = $this->Admin_model->all_subcat();
                    $data['sub_child_id'] = $this->Admin_model->all_subchild();
                    $data['all_brand'] = $this->Admin_model->all_brand();
                    $data['title'] = "Add Products ";
                    $this->load->view('admin/default/top');
                    $this->load->view('admin/default/header');
                    $this->load->view('admin/default/side',$data);
                    $this->load->view('admin/pages/add_product',$data);
                    $this->load->view('admin/default/footer');
          }else{         
                    $config['upload_path'] = 'assets/images/';
                   $config['allowed_types'] = 'gif|jpg|png|jpeg';
                   $config['max_width'] = '1800';
                   $config['min_width'] = '100';
                   // $config['max_height'] = '900';
                   // $config['min_height'] = '400';
                      $this->load->library('upload',$config);
                   if ($this->upload->do_upload('pro_feat_image')) 
                   {
                       $data1['pro_feat_image']=$this->upload->data();
          $targetDir = "assets/images/";
    $allowTypes = array('jpg','png','jpeg','gif');
    
    $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = '';
    if(!empty(array_filter($_FILES['pro_gallery']['name']))){
        foreach($_FILES['pro_gallery']['name'] as $key=>$val){
            // File upload path
            $fileName = basename($_FILES['pro_gallery']['name'][$key]);
            $targetFilePath = $targetDir . $fileName;
            
            // Check whether file type is valid
            $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
            if(in_array($fileType, $allowTypes)){
                // Upload file to server
                if(move_uploaded_file($_FILES["pro_gallery"]["tmp_name"][$key], $targetFilePath)){
                    // Image db insert sql
                    $insertValuesSQL .= "".$fileName.",";
                }else{
                    $errorUpload .= $_FILES['pro_gallery']['name'][$key].', ';
                }
            }else{
                $errorUploadType .= $_FILES['pro_gallery']['name'][$key].', ';
            }
        }
                  $insertValuesSQL = trim($insertValuesSQL,',');
                         $product=array(
                                'pro_name'=>$this->input->post('pro_name'),
                                'pro_url'=>$product_url,
                                'pro_sku'=>$this->input->post('pro_sku'),
                                'pro_category_id'=>$this->input->post('cat_id'),
                                'pro_sub_category'=>$this->input->post('sub_id'),
                                'pro_child'=>$this->input->post('sub_child_id'),
                                'brand_id'=>$this->input->post('sub_id'),
                                'pro_price'=>$this->input->post('pro_price'),
                                'pro_type'=>$this->input->post('pro_type'),
                                'pro_sale_price'=>$this->input->post('pro_sale_price'),
                                'pro_quantity'=>$this->input->post('pro_quantity'),
                                'pro_sort_desc'=>$this->input->post('pro_sort_desc'),
                                'pro_full_desc'=>$this->input->post('pro_full_desc'),
                                'pro_color'=>$pro_color,
                                'pro_size'=>$pro_size,
                                'pro_meta_content'=>$this->input->post('pro_meta_content'),
                                // 'pro_meta_keyword'=>$this->input->post('pro_meta_keyword'),
                                'pro_feat_image'=>$data1['pro_feat_image']['file_name'],
                                // 'pro_gallery_image'=>$galery_img['pro_gallery'] ,
                                'pro_gallery_image'=>$insertValuesSQL,
                                'pro_popular'=>$this->input->post('pro_popular'),
                                'pro_new'=>$this->input->post('pro_new'),
                                'pro_arrival'=>$this->input->post('pro_arrival'),
                                'status'=>'1',
                                'pro_date'=>date('Y-m-d')
                                );
                                     // print_r($product);die;
                                            if($this->Admin_model->productadd($product))
                                            {
                                                $this->session->set_flashdata('success', 'Product Added SuccessFully');
                                                // $this->session->set_flashdata('error', 'But there  was no gallery image uploaded');
                                                redirect('admincontroller/product');  
                                            }
                                            else
                                            {
                                              $this->session->set_flashdata('error', 'Something went wrong ');
                                              redirect('admincontroller/product'); 
                                            }   
                                    }else{
                                        $this->session->set_flashdata('error', 'gallery Image not Uploaded ');
                                              redirect('admincontroller/product'); 

                                    }
                   }
                    else
                    {
                      // echo "last";die();
                          $this->session->set_flashdata('error', 'Something Wrong ');
                      $data['all_cat'] = $this->Admin_model->all_cat();
                    $data['all_subcat'] = $this->Admin_model->all_subcat();
                    $data['all_brand'] = $this->Admin_model->all_brand();
                    $data['color'] = $this->Admin_model->all_color();
                      $data['upload_error']=$this->upload->display_errors();
                    $data['title'] = "Add Products ";
                    $this->load->view('admin/default/top');
                    $this->load->view('admin/default/header');
                    $this->load->view('admin/default/side',$data);
                    $this->load->view('admin/pages/add_product',$data);
                    $this->load->view('admin/default/footer');
                    }
            }  

    }

    function view_product()
    {
             if ($this->uri->segment(3)!='') 
           {
               $uri=$this->uri->segment(3);
               $id=$this->uri->segment(4);
                  if ($uri=='delete') 
               {
                   if($this->Admin_model->productdelete($id))
                   {
                       $data['delete']='Products Deleted SuccessFully';
                   }
               }
               if ($uri=='active') 
               {
                   if($this->Admin_model->productactive($id))
                   {
                       $data['active']='Products Activated SuccessFully';
                   }
   
               }
               if ($uri=='deactive') 
               {
                   if($this->Admin_model->productdeactive($id))
                   {
                       $data['deactivate']='Products Deactivated SuccessFully';
                   }
               }
           }
                  $data['all_product'] = $this->Admin_model->all_product();
                    $data['title'] = "All Products ";
                    $this->load->view('admin/default/top');
                    $this->load->view('admin/default/header');
                    $this->load->view('admin/default/side',$data);
                    $this->load->view('admin/pages/view_product',$data);
                    $this->load->view('admin/default/footer');
      }
      function cart_data()
      {
           if ($this->uri->segment(3)!='') 
           {
               $uri=$this->uri->segment(3);
               $id=$this->uri->segment(4);
                  if ($uri=='delete') 
               {
                   if($this->Admin_model->cartedelete($id))
                   {
                       $data['delete']='Cart Item Deleted SuccessFully';
                   }
               }
           }
        $data['cart_data'] = $this->Admin_model->cart_data();
                    $data['title'] = "All Cart Data ";
                    $this->load->view('admin/default/top');
                    $this->load->view('admin/default/header');
                    $this->load->view('admin/default/side',$data);
                    $this->load->view('admin/pages/cart_data',$data);
                    $this->load->view('admin/default/footer');
      }
      function edit_product($id)
      {
                    $data['edit_product'] = $this->Admin_model->edit_product($id);
                    $data['all_cat'] = $this->Admin_model->all_cat();
                    $data['all_subcat'] = $this->Admin_model->all_subcat();
                    $data['all_subcat'] = $this->Admin_model->all_subcat();
                    $data['all_brand'] = $this->Admin_model->all_brand();
                    $data['color'] = $this->Admin_model->all_color();
                    $data['title'] = "Update Products ";
                    $this->load->view('admin/default/top');
                    $this->load->view('admin/default/header');
                    $this->load->view('admin/default/side',$data);
                    $this->load->view('admin/pages/edit_product',$data);
                    $this->load->view('admin/default/footer');
      }
      function update_product()
      {
  
                    $id=$this->uri->segment(3); 
              if ($this->uri->segment(4)=='update') 
               {
         $this->form_validation->set_rules('pro_name','Product Title','required|trim');
        $this->form_validation->set_rules('pro_sku','Product Sku','required|trim');
        $this->form_validation->set_rules('cat_id','Product Category','required|trim');
        $this->form_validation->set_rules('sub_id','Product Sub Category','required|trim');
        $this->form_validation->set_rules('brand_id','Product Brand','required|trim');
        // $this->form_validation->set_rules('pro_quantity','Product Qunatity','required|trim');
        $this->form_validation->set_rules('pro_price','Product Price','required|trim|numeric');
        $this->form_validation->set_rules('pro_sale_price','Product Sale Price','required|trim|numeric');
        $this->form_validation->set_rules('pro_sort_desc','Product Sort Description','required|trim');
        $this->form_validation->set_rules('pro_full_desc','Product Full Description','required|trim');
        $this->form_validation->set_rules('pro_meta_content','Product Meta Content','required|trim');
        // $this->form_validation->set_rules('pro_meta_keyword','Product Meta Keyword','trim');
        $this->form_validation->set_rules('pro_popular','NA','trim');
        $this->form_validation->set_rules('pro_new','NA','trim');
        $this->form_validation->set_rules('pro_arrival','NA','trim');
        $product_url = str_replace(" ","-",strtolower(trim($this->input->post('pro_name'))));
        $product_url = str_replace("&","and",$product_url);
        $product_url = str_replace("?"," ",$product_url);
        $product_url=$product_url."_".rand();      
                    if(!$_POST['color'])
                    {
                        $pro_color='NA';
                    }
                    else
                    {
                        $colors=$_POST['color'];
                        $pro_color=implode('/',$colors); 
                                                
                    }
                     if ($this->form_validation->run())
                   { 
                     $config['upload_path'] = 'assets/images/';
                   $config['allowed_types'] = 'gif|jpg|png|jpeg';
                   $config['max_width'] = '1800';
                   $config['min_width'] = '100';
                      $this->load->library('upload',$config);
                   if ($this->upload->do_upload('pro_feat_image')) 
                   {
         $data1['pro_feat_image']=$this->upload->data();
         $name_array = array();
        $count = count($_FILES['files']['size']);
        foreach($_FILES as $key=>$value)
        for($s=0; $s<=$count-1; $s++) {
        $_FILES['files']['name']=$value['name'][$s];
        $_FILES['files']['type']    = $value['type'][$s];
        $_FILES['files']['tmp_name'] = $value['tmp_name'][$s];
        $_FILES['files']['error'] = $value['error'][$s];
        $_FILES['files']['size']  = $value['size'][$s];   
            $config['upload_path'] = '/assets/images/';
           $config['allowed_types'] = 'gif|jpg|png|jpeg';
            // $config['max_size']    = '100';
            // $config['max_width']  = '1024';
            // $config['max_height']  = '768';
        $this->load->library('upload', $config);
        $this->upload->do_upload();
        $data = $this->upload->data();
        $name_array[] = $data['file_name'];
            }
            $galery_img = implode(',', $name_array);

                         $product=array(
                                'pro_name'=>$this->input->post('pro_name'),
                                'pro_url'=>$product_url,
                                'pro_sku'=>$this->input->post('pro_sku'),
                                'pro_category_id'=>$this->input->post('cat_id'),
                                'pro_sub_category'=>$this->input->post('sub_id'),
                                'brand_id'=>$this->input->post('sub_id'),
                                'pro_price'=>$this->input->post('pro_price'),
                                'pro_sale_price'=>$this->input->post('pro_sale_price'),
                                'pro_sort_desc'=>$this->input->post('pro_sort_desc'),
                                'pro_full_desc'=>$this->input->post('pro_full_desc'),
                                'pro_color'=>$pro_color,
                                'pro_meta_content'=>$this->input->post('pro_meta_content'),
                                // 'pro_meta_keyword'=>$this->input->post('pro_meta_keyword'),
                                'pro_feat_image'=>$data1['pro_feat_image']['file_name'],
                                'pro_gallery_image'=>$galery_img,
                                'pro_popular'=>$this->input->post('pro_popular'),
                                'pro_new'=>$this->input->post('pro_new'),
                                'pro_arrival'=>$this->input->post('pro_arrival'),
                                'status'=>'1',
                                'pro_date'=>date('Y-m-d')
                                );
                         //print_r($product);die();
                                            if($this->Admin_model->productadd($product))
                                            {
                                                $this->session->set_flashdata('success', 'Product Update SuccessFully');
                                                // $this->session->set_flashdata('error', 'But there  was no gallery image uploaded');
                                                redirect('admincontroller/view_product');  
                                            }
                                            else
                                            {
                                              $this->session->set_flashdata('error', 'Something went wrong ');
                                              redirect('admincontroller/product'); 
                                            }   
                                    // }




                   }else{
                   $this->session->set_flashdata('error', 'Something went wrong1 ');

                         $data['edit_product'] = $this->Admin_model->edit_product($id);
                    $data['all_cat'] = $this->Admin_model->all_cat();
                    $data['all_subcat'] = $this->Admin_model->all_subcat();
                    $data['all_brand'] = $this->Admin_model->all_brand();
                    $data['color'] = $this->Admin_model->all_color();
                    $data['title'] = "Update Products ";
                    $this->load->view('admin/default/top');
                    $this->load->view('admin/default/header');
                    $this->load->view('admin/default/side',$data);
                    $this->load->view('admin/pages/edit_product',$data);
                    $this->load->view('admin/default/footer');

                   }
                  
       }
               else
               {
                   $this->session->set_flashdata('error', 'Something went wrong2 ');
                     $data['edit_product'] = $this->Admin_model->edit_product($id);
                    $data['all_cat'] = $this->Admin_model->all_cat();
                    $data['all_subcat'] = $this->Admin_model->all_subcat();
                    $data['all_brand'] = $this->Admin_model->all_brand();
                    $data['color'] = $this->Admin_model->all_color();
                    $data['title'] = "Update Products ";
                    $this->load->view('admin/default/top');
                    $this->load->view('admin/default/header');
                    $this->load->view('admin/default/side',$data);
                    $this->load->view('admin/pages/edit_product',$data);
                    $this->load->view('admin/default/footer');
               } 
             }
               
             }

             function color()
             {
                    $data['title'] = "Add Color ";
                    $this->load->view('admin/default/top');
                    $this->load->view('admin/default/header');
                    $this->load->view('admin/default/side',$data);
                    $this->load->view('admin/pages/add_color',$data);
                    $this->load->view('admin/default/footer');
             }
	    function promocode()
             {
                    $data['title'] = "Add Promo Code ";
                    $this->load->view('admin/default/top');
                    $this->load->view('admin/default/header');
                    $this->load->view('admin/default/side',$data);
                    $this->load->view('admin/pages/add_promocode',$data);
                    $this->load->view('admin/default/footer');
             }
	        function promoaddaction()
             {
      
           $this->form_validation->set_rules('promo_name','Color Name','required|trim|is_unique[promocode.promo_name]');
            if ($this->form_validation->run() == FALSE)
           {   
          $data['title'] = "Add Promo Code";
      $this->load->view('admin/default/top');
      $this->load->view('admin/default/header');
      $this->load->view('admin/default/side',$data);
      $this->load->view('admin/pages/add_promocode');
      $this->load->view('admin/default/footer');
          }else{
                            $data=array(
                               'c_name'=>$this->input->post('c_name'),
                               'c_code'=>$this->input->post('c_code')

                                                        );
               if($this->Admin_model->add_color($data))
               {
                   $this->session->set_flashdata('success', 'Color Added SuccessFully');
                   redirect('admincontroller/color');    
               }
               else
               {
                    $this->session->set_flashdata('error', 'Something Went Wrong');
                   redirect('admincontroller/color');    
               }
           }
       
   
   }
             function coloraddaction()
             {
      
           $this->form_validation->set_rules('c_name','Color Name','required|trim|is_unique[color.c_name]');
           $this->form_validation->set_rules('c_code','Color Code','required|trim|is_unique[color.c_code]');
            if ($this->form_validation->run() == FALSE)
           {   
          $data['title'] = "Add Color";
      $this->load->view('admin/default/top');
      $this->load->view('admin/default/header');
      $this->load->view('admin/default/side',$data);
      $this->load->view('admin/pages/add_color');
      $this->load->view('admin/default/footer');
          }else{
                            $data=array(
                               'c_name'=>$this->input->post('c_name'),
                               'c_code'=>$this->input->post('c_code')

                                                        );
               if($this->Admin_model->add_color($data))
               {
                   $this->session->set_flashdata('success', 'Color Added SuccessFully');
                   redirect('admincontroller/color');    
               }
               else
               {
                    $this->session->set_flashdata('error', 'Something Went Wrong');
                   redirect('admincontroller/color');    
               }
           }
       
   
   }

   function view_color()
   {
                $uri=$this->uri->segment(3);
               $id=$this->uri->segment(4);
                  if ($uri=='delete') 
               {
                   if($this->Admin_model->colordelete($id))
                   {
                       $data['delete']='Color Deleted SuccessFully';
                   }
               }
               if ($uri=='active') 
           {
              if($this->Admin_model->coloractive($id))
                   {
                       $data['active']='Color Activated SuccessFully';
                   }
   
               }
              if ($uri=='deactive') 
              {
               
                 if($this->Admin_model->colordeactive($id))
                 {
                       $data['deactivate']='Color Deactivated SuccessFully';
                 }
             }
         
             $data['all_color'] = $this->Admin_model->view_color();
              $data['title'] = "ALL Color";
              $this->load->view('admin/default/top');
              $this->load->view('admin/default/header');
              $this->load->view('admin/default/side',$data);
              $this->load->view('admin/pages/view_color',$data);
              $this->load->view('admin/default/footer');

               
             }

             function edit_color($id)
             {
             $data['edit_color'] = $this->Admin_model->edit_color($id);
              $data['title'] = "Update Color";
              $this->load->view('admin/default/top');
              $this->load->view('admin/default/header');
              $this->load->view('admin/default/side',$data);
              $this->load->view('admin/pages/edit_color',$data);
              $this->load->view('admin/default/footer');


             }

             function color_edit()

             {
                $id=$this->uri->segment(3); 
              if ($this->uri->segment(4)=='update') 
               {
                   $this->form_validation->set_rules('c_name','Color Name ','required|trim');
                   $this->form_validation->set_rules('c_code','Color Code ','required|trim');
                   if ($this->form_validation->run())
                   { 
                           $data=array(
                                   'c_name'=>$this->input->post('c_name'),
                                   'c_code'=>$this->input->post('c_code'),
                                   );
                              if($this->Admin_model->colorupdate($id,$data))
                               {
                      $this->session->set_flashdata('success', 'Color Updated SuccessFully');
             $data['edit_color'] = $this->Admin_model->edit_color($id);
          $data['title'] = "Edit Color";
      $this->load->view('admin/default/top');
      $this->load->view('admin/default/header');
      $this->load->view('admin/default/side',$data);
      $this->load->view('admin/pages/edit_color',$data);
      $this->load->view('admin/default/footer');
                               }
                               else
                               {
             $this->session->set_flashdata('error', 'Something Went Wrong');
          $data['edit_color'] = $this->Admin_model->edit_color($id);
          $data['title'] = "Edit Color";
      $this->load->view('admin/default/top');
      $this->load->view('admin/default/header');
      $this->load->view('admin/default/side',$data);
      $this->load->view('admin/pages/edit_color',$data);
      $this->load->view('admin/default/footer');
                               }
                }
              else
                   {
           $this->session->set_flashdata('error', 'Something Went Wrong');
          $data['edit_color'] = $this->Admin_model->edit_color($id);
          $data['title'] = "Edit Brand";
      $this->load->view('admin/default/top');
      $this->load->view('admin/default/header');
      $this->load->view('admin/default/side',$data);
      $this->load->view('admin/pages/edit_color',$data);
      $this->load->view('admin/default/footer');
                   }
               }
               else
               {
          $data['edit_color'] = $this->Admin_model->edit_color($id);
          $data['title'] = "Edit Brand";
      $this->load->view('admin/default/top');
      $this->load->view('admin/default/header');
      $this->load->view('admin/default/side',$data);
      $this->load->view('admin/pages/edit_color',$data);
      $this->load->view('admin/default/footer');
               } 
               } 

             function promo()
    {
      $data['title'] = "Add promo Code";
      $this->load->view('admin/default/top');
      $this->load->view('admin/default/header');
      $this->load->view('admin/default/side',$data);
      $this->load->view('admin/pages/add_promo');
      $this->load->view('admin/default/footer');
    }
          function promoaction()
        {
      
           $this->form_validation->set_rules('promo_name','Promo Code Name','required|trim|is_unique[promocode.promo_name]');
            if ($this->form_validation->run() == FALSE)
           {   
          $data['title'] = "Add Promo Code";
      $this->load->view('admin/default/top');
      $this->load->view('admin/default/header');
      $this->load->view('admin/default/side',$data);
      $this->load->view('admin/pages/add_promo');
      $this->load->view('admin/default/footer');
          }else{
                            $data=array(
                               'promo_name'=>$this->input->post('promo_name')                          );
               if($this->Admin_model->add_promo($data))
               {
                   $this->session->set_flashdata('success', 'Promo Code Added SuccessFully');
                   redirect('admincontroller/promo');    
               }
               else
               {
                    $this->session->set_flashdata('error', 'Something Went Wrong');
                   redirect('admincontroller/promo');    
               }
           }
       
   
   }


                function view_promo()
               {
                $uri=$this->uri->segment(3);
               $id=$this->uri->segment(4);
                  if ($uri=='delete') 
               {
                   if($this->Admin_model->promodelete($id))
                   {
                       $data['delete']='Promo Code Deleted SuccessFully';
                   }
               }
               if ($uri=='active') 
           {
              if($this->Admin_model->promoactive($id))
                   {
                       $data['active']='Promo Code Activated SuccessFully';
                   }
   
               }
              if ($uri=='deactive') 
              {
               
                 if($this->Admin_model->promodeactive($id))
                 {
                       $data['deactivate']='Promo Code Deactivated SuccessFully';
                 }
             }
         
             $data['all_promo'] = $this->Admin_model->view_promo();

              $data['title'] = "Add promo Code";
              $this->load->view('admin/default/top');
              $this->load->view('admin/default/header');
              $this->load->view('admin/default/side',$data);
              $this->load->view('admin/pages/view_promo');
              $this->load->view('admin/default/footer');

               
             }
                 function edit_promo($id)
            {
             $data['edit_promo'] = $this->Admin_model->edit_promo($id);
          $data['title'] = "Edit Brand ";
      $this->load->view('admin/default/top');
      $this->load->view('admin/default/header');
      $this->load->view('admin/default/side',$data);
      $this->load->view('admin/pages/edit_promo',$data);
      $this->load->view('admin/default/footer');
        }
            function promo_edit()
      {
                    $id=$this->uri->segment(3); 
              if ($this->uri->segment(4)=='update') 
               {
                   $this->form_validation->set_rules('promo_name','Promo Code ','required|trim');
                   if ($this->form_validation->run())
                   { 
                           $data=array(
                                   'promo_name'=>$this->input->post('promo_name'),
                                   );
                              if($this->Admin_model->promoupdate($id,$data))
                               {
                      $this->session->set_flashdata('success', 'Promo Code Updated SuccessFully');
             $data['edit_promo'] = $this->Admin_model->edit_promo($id);
          $data['title'] = "Edit Promo Code";
      $this->load->view('admin/default/top');
      $this->load->view('admin/default/header');
      $this->load->view('admin/default/side',$data);
      $this->load->view('admin/pages/edit_promo',$data);
      $this->load->view('admin/default/footer');
                               }
                               else
                               {
                                   $this->session->set_flashdata('error', 'Something Went Wrong');
          $data['edit_promo'] = $this->Admin_model->edit_promo($id);
          $data['title'] = "Edit Brand";
      $this->load->view('admin/default/top');
      $this->load->view('admin/default/header');
      $this->load->view('admin/default/side',$data);
      $this->load->view('admin/pages/edit_promo',$data);
      $this->load->view('admin/default/footer');
                               }
                }
              else
                   {
           $this->session->set_flashdata('error', 'Something Went Wrong');
          $data['edit_promo'] = $this->Admin_model->edit_promo($id);
          $data['title'] = "Edit Brand";
      $this->load->view('admin/default/top');
      $this->load->view('admin/default/header');
      $this->load->view('admin/default/side',$data);
      $this->load->view('admin/pages/edit_promo',$data);
      $this->load->view('admin/default/footer');
                   }
               }
               else
               {
          $data['edit_promo'] = $this->Admin_model->edit_promo($id);
          $data['title'] = "Edit Brand";
      $this->load->view('admin/default/top');
      $this->load->view('admin/default/header');
      $this->load->view('admin/default/side',$data);
      $this->load->view('admin/pages/edit_brand',$data);
      $this->load->view('admin/default/footer');
               } 
               }

    }
   
   ?>