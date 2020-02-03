<?php 
/**
 * 
 */
class Admin_model extends CI_model
{
	
	function add_category($data)
	{
		$data['status'] = '1';
		$qry = $this->db->insert('category',$data);
		if($qry){
			return true;
		}else{
			return false;
		}
	}


	  public function cateactive($id)
  {
    $this->db->set('status','1');
    $this->db->where('cat_id',$id);
    $this->db->update('category');
    return TRUE;
  }	


    public function subcateactive($id)
  {
    $this->db->set('status','1');
    $this->db->where('sub_id',$id);
    $this->db->update('subcategory');
    return TRUE;
  }
	  public function catedeactive($id)
  {
    $this->db->set('status','0');
    $this->db->where('cat_id',$id);
    $this->db->update('category');
    return TRUE;
  }	
    public function subcatedeactive($id)
  {
    $this->db->set('status','0');
    $this->db->where('sub_id',$id);
    $this->db->update('subcategory');
    return TRUE;
  }
   public function catedelete($id)
  {
    $this->db->set('cat_id',$id);
    $this->db->where('cat_id',$id);
    $this->db->delete('category');
    return TRUE;
  } 
  public function productdelete($id)
  {
    $this->db->set('pro_id',$id);
    $this->db->where('pro_id',$id);
    $this->db->delete('product');
    return TRUE;
  } 
     public function cartedelete($id)
  {
    $this->db->set('cart_id',$id);
    $this->db->where('cart_id',$id);
    $this->db->delete('cart');
    return TRUE;
  }  
   public function subcatedelete($id)
  {
    $this->db->set('sub_id',$id);
    $this->db->where('sub_id',$id);
    $this->db->delete('subcategory');
    return TRUE;
  }  

   public function subchidelete($id)
  {
    $this->db->set('id',$id);
    $this->db->where('id',$id);
    $this->db->delete('subchild');
    return TRUE;
  }  

   public function topdelete($id)
  {
    $this->db->set('id',$id);
    $this->db->where('id',$id);
    $this->db->delete('top_banner');
    return TRUE;
  } 

  public function bottomdelete($id)
  {
    $this->db->set('id',$id);
    $this->db->where('id',$id);
    $this->db->delete('bottom_banner');
    return TRUE;
  }
  	  public function topactive($id)
  {
    $this->db->set('status','1');
    $this->db->where('id',$id);
    $this->db->update('top_banner');
    return TRUE;
  }	   

   public function subchildactive($id)
  {
    print_r($id);die();
    $this->db->set('status','1');
    $this->db->where('id',$id);
    $this->db->update('subchild');
    return TRUE;
  } 

   public function subchilddeactive($id)
  {
    // print_r($id);die();
    
    $this->db->set('status','1');
    $this->db->where('id',$id);
    $this->db->update('subchild');
    return TRUE;
  }  

     public function productactive($id)
  {
    $this->db->set('status','0');
    $this->db->where('pro_id',$id);
    $this->db->update('product');
    return TRUE;
  }
     public function productdeactive($id)
  {
    $this->db->set('status','0');
    $this->db->where('pro_id',$id);
    $this->db->update('product');
    return TRUE;
  } 

    public function bottomactive($id)
  {
    $this->db->set('status','1');
    $this->db->where('id',$id);
    $this->db->update('bottom_banner');
    return TRUE;
  }	

  	  public function topdeactive($id)
  {
    $this->db->set('status','0');
    $this->db->where('id',$id);
    $this->db->update('top_banner');
    return TRUE;
  }	  	  public function bottomdeactive($id)
  {
    $this->db->set('status','0');
    $this->db->where('id',$id);
    $this->db->update('bottom_banner');
    return TRUE;
  }	

	function add_subcategory($data)
	{
			$data['status'] = '1';
		$qry = $this->db->insert('subcategory',$data);
		if($qry){
			return true;
		}else{
			return false;
		}
	}
	function add_top_banner($data)
	{
			$data['status'] = '1';
		$qry = $this->db->insert('top_banner',$data);
		if($qry){
			return true;
		}else{
			return false;
		}
	}	function add_bottom_banner($data)
	{
			$data['status'] = '1';
		$qry = $this->db->insert('bottom_banner',$data);
		if($qry){
			return true;
		}else{
			return false;
		}
	}
	function view_Category()
	{
		$qry = $this->db->get('category');
	if($qry && $qry->num_rows()){
			return $qry->result_array();
}else{
	return False;
	}
} function view_sub_sategory()
  {
    $qry = $this->db->get('subcategory');
  if($qry && $qry->num_rows()){
      return $qry->result_array();
}else{
  return False;
  }
}


	function view_top()
	{
		$qry = $this->db->get('top_banner');
	if($qry && $qry->num_rows()){
			return $qry->result_array();
}else{
	return False;
	}
}

function view_bottom()
	{
		$qry = $this->db->get('bottom_banner');
	if($qry && $qry->num_rows()){
			return $qry->result_array();
}else{
	return False;
	}
}

	function edit_top($id)
	{
		$this->db->where('id',$id);
		$qry = $this->db->get('top_banner');
	if($qry && $qry->num_rows()){
			return $qry->row_array();

}else{
	return False;
	}
} 

function edit_bottom($id)
  {
    $this->db->where('id',$id);
    $qry = $this->db->get('bottom_banner');
  if($qry && $qry->num_rows()){
      return $qry->row_array();

}else{
  return False;
  }
}

	function edit_cate($id)
	{
		$this->db->where('cat_id',$id);
		$qry = $this->db->get('category');
	if($qry && $qry->num_rows()){
			return $qry->row_array();

}else{
	return False;
	}
}
   function categoryupdate($id,$data){
        $this->db->where('cat_id',$id);
        $qry = $this->db->update('category',$data);
        if($qry){
          return true;
        }else{
          return false;
        }

      }     function top_update($id,$data){
        $this->db->where('id',$id);
        $qry = $this->db->update('top_banner',$data);
        if($qry){
          return true;
        }else{
          return false;
        }

      }   



         function bottom_update($id,$data){
        $this->db->where('id',$id);
        $qry = $this->db->update('bottom_banner',$data);
        if($qry){
          return true;
        }else{
          return false;
        }

      }   

      function subcatupdate($id,$data){
        $this->db->where('sub_id',$id);
        $qry = $this->db->update('subcategory',$data);
        if($qry){
          return true;
        }else{
          return false;
        }

      }

// function categoryupdate($data,$id)
// {
// 	$this->db->where('cat_id',$id);
// 	$this->db->update('category',$data);
// }

function view_subcategory()
{
	$this->db->select('*');
$this->db->from('subcategory');
$this->db->join('category','category.cat_id = subcategory.category_id');
$qry = $this->db->get();
	// echo $this->db->last_query();die();
	if($qry && $qry->num_rows()){
		return $qry->result_array();
	}else{
		return false;
	}
}
function view_subchild()
{
  $this->db->select('*');
$this->db->from('subchild');
$this->db->join('category','category.cat_id = subchild.category_id');
$this->db->join('subcategory','subcategory.sub_id = subchild.sub_id');
$qry = $this->db->get();
  // echo $this->db->last_query();die();
  if($qry && $qry->num_rows()){
    return $qry->result_array();
  }else{
    return false;
  }
}


function edit_subcate($id)
{
	$this->db->select('*');
	$this->db->where('sub_id',$id);
$this->db->from('subcategory');
$this->db->join('category','category.cat_id = subcategory.category_id');
$qry = $this->db->get();
	// echo $this->db->last_query();die();
	if($qry && $qry->num_rows()){
		return $qry->row_array();
	}else{
		return false;
	}
}


function edit_subchild($id)
{
  $this->db->select('*');
  $this->db->where('id',$id);
$this->db->from('subchild');
$this->db->join('category','category.cat_id = subchild.category_id');
$this->db->join('subcategory','subcategory.sub_id = subchild.sub_id');
$qry = $this->db->get();
  // echo $this->db->last_query();die();
  if($qry && $qry->num_rows()){
    return $qry->row_array();
  }else{
    return false;
  }
}

function all_cat()
  {
    $this->db->where('status','1');
    $qry = $this->db->get('category');
  if($qry && $qry->num_rows()){
      return $qry->result_array();
}else{
  return False;
  }
}

function all_subcat()
  {
    $this->db->where('status','1');
    $qry = $this->db->get('subcategory');
  if($qry && $qry->num_rows()){
      return $qry->result_array();
}else{
  return False;
  }
}function all_subchild()
  {
    $this->db->where('status','1');
    $qry = $this->db->get('subchild');
  if($qry && $qry->num_rows()){
      return $qry->result_array();
}else{
  return False;
  }
}

  function add_brand($data)
  {
    $data['status'] = '1';
    $qry = $this->db->insert('brand',$data);
    if($qry){
      return true;
    }else{
      return false;
    }
  } 

   function add_color($data)
  {
    $data['status'] = '1';
    $qry = $this->db->insert('color',$data);
    if($qry){
      return true;
    }else{
      return false;
    }
  }

  function view_brand()
  {
    $qry = $this->db->get('brand');
  if($qry && $qry->num_rows()){
      return $qry->result_array();
}else{
  return False;
  }
}  function view_color()
  {
    $qry = $this->db->get('color');
  if($qry && $qry->num_rows()){
      return $qry->result_array();
}else{
  return False;
  }
}
function edit_color($id)
  {
    $this->db->where('c_id',$id);
    $qry = $this->db->get('color');
  if($qry && $qry->num_rows()){
      return $qry->row_array();
}else{
  return False;
  }
}

    public function coloractive($id)
  {
    $this->db->set('status','1');
    $this->db->where('c_id',$id);
    $this->db->update('color');
    return TRUE;
  }    public function branactive($id)
  {
    $this->db->set('status','1');
    $this->db->where('brand_id',$id);
    $this->db->update('brand');
    return TRUE;
  } 

   public function colordeactive($id)
  {
    $this->db->set('status','0');
    $this->db->where('c_id',$id);
    $this->db->update('color');
    return TRUE;
  }  
function edit_brand($id)
  {
    $this->db->where('brand_id',$id);
    $qry = $this->db->get('brand');
  if($qry && $qry->num_rows()){
      return $qry->row_array();

}else{
  return False;
  }
}

    public function brandactive($id)
  {
    $this->db->set('status','1');
    $this->db->where('brand_id',$id);
    $this->db->update('brand');
    return TRUE;
  } 
    public function branddeactive($id)
  {
    $this->db->set('status','0');
    $this->db->where('brand_id',$id);
    $this->db->update('brand');
    return TRUE;
  }
   public function branddelete($id)
  {
    $this->db->set('brand_id',$id);
    $this->db->where('brand_id',$id);
    $this->db->delete('brand');
    return TRUE;
  }  

  public function colordelete($id)
  {
    $this->db->set('c_id',$id);
    $this->db->where('c_id',$id);
    $this->db->delete('color');
    return TRUE;
  } 


    function brandupdate($id,$data){
        $this->db->where('brand_id',$id);
        $qry = $this->db->update('brand',$data);
        if($qry){
          return true;
        }else{
          return false;
        }

      } 

      function colorupdate($id,$data){
        $this->db->where('c_id',$id);
        $qry = $this->db->update('color',$data);
        if($qry){
          return true;
        }else{
          return false;
        }

      } 

        function all_brand()
  {
    $this->db->where('status','1');
    $qry = $this->db->get('brand');
  if($qry && $qry->num_rows()){
      return $qry->result_array();
}else{
  return False;
  }
}        function all_color()
  {
    $this->db->where('status','1');
    $qry = $this->db->get('color');
  if($qry && $qry->num_rows()){
      return $qry->result_array();
}else{
  return False;
  }
} 
    function all_size()
  {
    $this->db->where('status','1');
    $qry = $this->db->get('size');
  if($qry && $qry->num_rows()){
      return $qry->result_array();
}else{
  return False;
  }
}

function productadd($data)
{
  if($this->db->insert('product',$data)){
        return true;
}else{
  return false;
}
}

function add_promo($data)
{
  if($this->db->insert('promocode',$data)){
        return true;
}else{
  return false;
}
}

function view_promo()
{
  $qry = $this->db->get('promocode');
  if($qry  && $qry->num_rows()>0){
    return $qry->result_array();
  
  }else{
    return False;
  }
}
function edit_promo($id)
{
  $this->db->where('p_id',$id);
  $qry = $this->db->get('promocode');
  if($qry  && $qry->num_rows()>0){
    return $qry->row_array();
  
  }else{
    return False;
  }
}
   function promoupdate($id,$data){
        $this->db->where('p_id',$id);
        $qry = $this->db->update('promocode',$data);
        if($qry){
          return true;
        }else{
          return false;
        }

      }
        public function promodelete($id)
  {
    $this->db->set('p_id',$id);
    $this->db->where('p_id',$id);
    $this->db->delete('promocode');
    return TRUE;
  }
     public function promoactive($id)
  {
    $this->db->set('status','1');
    $this->db->where('p_id',$id);
    $this->db->update('promocode');
    return TRUE;
  } 
    public function promodeactive($id)
  {
    $this->db->set('status','0');
    $this->db->where('p_id',$id);
    $this->db->update('promocode');
    return TRUE;
  }
function all_product()
{
  $qry = $this->db->get('product');
  if($qry  && $qry->num_rows()>0){
    return $qry->result_array();
  
  }else{
    return False;
  }
}

function edit_product($id)
{
  $this->db->where('pro_id',$id);
  $qry = $this->db->get('product');
  if($qry  && $qry->num_rows()>0){
    return $qry->row_array();
  
  }else{
    return False;
  }
}

function cart_data()
{
      $this->db->select('*')
        ->from('cart')
        ->join('product', 'cart.pro_id = product.pro_id')
        ->join('tbl_user', 'cart.user_id = tbl_user.user_id');
        $data = $this->db->get();
        return $data->result_array();
}

function get_sub_cat($id)
{
  $this->db->where('status','1');
  $this->db->where('category_id',$id);
  $qry = $this->db->get('subcategory');
	//echo $this->db->last_query();die;
		
  if($qry && $qry->num_rows()>0)
  {
    return $qry->result_array();
  }else{
    return False;
  }
}

function get_subchild($id)
{
  $this->db->where('status','1');
  $this->db->where('sub_id',$id);
  $qry = $this->db->get('subchild');
  // echo $this->db->last_query();die;
    
  if($qry && $qry->num_rows()>0)
  {
    return $qry->result_array();
  }else{
    return False;
  }
}
	

function add_subchild($data)
{
  $data['status'] = '1';
  if($this->db->insert('subchild',$data)){
        return true;
}else{
  return false;
}
}
	function get_sub_child($id)
{
  $this->db->where('status','1');
  $this->db->where('category_id',$id);
  $qry = $this->db->get('subcategory');
	//echo $this->db->last_query();die;
		  if($qry && $qry->num_rows()>0)
  {
    return $qry->result_array();
  }else{
    return False;
  }
}


function subchildupdate($id,$data)
{
    $this->db->where('id',$id);
        $qry = $this->db->update('subchild',$data);
        // echo $this->db->last_query();die();
        if($qry){
          return true;
        }else{
          return false;
        }
}
	




}
?>