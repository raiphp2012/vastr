<div class="pcoded-inner-content">

<div class="main-body">
<div class="page-wrapper">

<div class="page-body">
 <div class="row">
<div class="col-sm-12">

<div class="card">
<div class="card-header">
<h5>Product Update</h5>
<span>Update class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>
</div>
<div class="card-block">
<h4 class="sub-title">Update Product</h4>
  <form method="post" enctype="multipart/form-data" action="<?php  echo site_url();  ?>/admincontroller/update_product/<?php  echo $edit_product['pro_id'];  ?>/update">
	<?php

    if ($this->session->flashdata('error'))
    {
        ?>
        <div class="alert alert-danger"><?php echo $this->session->flashdata('error'); ?></div>
        <?php
    }
    
    if ($this->session->flashdata('success'))
    {
        ?>
        <div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>
        <?php
    }
?>

<div class="form-group row">
<label class="col-sm-2 col-form-label">Product Name</label>
<div class="col-sm-10">
<input type="text" class="form-control" name="pro_name" value="<?php echo $edit_product['pro_name'];?>">
<span class="messages text-danger"><?php  echo form_error('pro_name')  ?></span>
</div>
</div>
<div class="form-group row">
<label class="col-sm-2 col-form-label">Product SKU</label>
<div class="col-sm-10">
<input type="text" class="form-control" name="pro_sku" value="<?php echo $edit_product['pro_sku']; ?>">
<span class="messages text-danger"><?php  echo form_error('pro_sku')  ?></span>
</div>
</div>
<div class="form-group row">
<label class="col-sm-2 col-form-label">Product Category</label>
<div class="col-sm-10">
<!-- <select name="cat_id" class="form-control fill" id="cat_id">

    <option value="disabled">Select Category</option>
    <?php 
                foreach ($all_cat as $key => $value) {
    ?>

<option value="<?php echo $value['cat_id']?>"><?php echo $value['cate_name']; ?></option>
<?php }?>
</select> -->
    <select name="cat_id" class="form-control fill" id="cat_id">
                                        <option value="">Select Category</option>
                                     <?php  
                                                // print_r($all_brand);
                                     foreach ($all_cat as $key => $value){ 

                                                 if($edit_product['pro_category_id']==$value['cat_id']){
                                            ?>
                                           <option selected="" value="<?php echo $value['cat_id'] ;?>"><?php echo $value['cate_name']?></option>
                                           <?php 
                                         }
                                           else
                                           {
                                            ?>
                                              <option  value="<?php echo $value['cat_id'] ;?>"><?php echo $value['cate_name']?></option>
                                     
                                           
                                           <?php } }?>
                                       </select> 
</div>
</div>
<div class="form-group row">
<label class="col-sm-2 col-form-label">Product sub  Category</label>
<div class="col-sm-10">
<select name="sub_id" class="form-control fill" id="sub_id">
    <option value="">Select Sub Category</option>
</select>
<span class="messages text-danger"><?php   echo form_error('sub_id')    ?></span>
</div>
</div>

<div class="form-group row">
<label class="col-sm-2 col-form-label">Product Brand</label>
<div class="col-sm-10">
    <select name="brand_id" class="form-control fill">
                                        <option value="">Select Brand</option>
                                     <?php  
                                               // print_r($all_brand);
                                     foreach ($all_brand as $key => $value){ 

                                                 if($edit_product['brand_id']==$value['brand_id']){
                                            ?>
                                           <option selected="" value="<?php echo $value['brand_id'] ;?>"><?php echo $value['brand_name']?></option>
                                           <?php 
                                         }
                                           else
                                           {
                                            ?>
                                              <option  value="<?php echo $value['brand_id'] ;?>"><?php echo $value['brand_name']?></option>
                                     
                                           
                                           <?php } }?>
                                       </select> 
</div>
</div>

<div class="form-group row">
<label class="col-sm-2 col-form-label">Product price</label>
<div class="col-sm-10">
<input type="text" class="form-control" name="pro_price" value="<?php echo $edit_product['pro_price']; ?>">
<span class="messages text-danger"><?php  echo form_error('pro_price')  ?></span>
</div>
</div>
<div class="form-group row">
<label class="col-sm-2 col-form-label">Product Sale Price</label>
<div class="col-sm-10">
<input type="text" class="form-control" name="pro_sale_price" value="<?php echo $edit_product['pro_sale_price']; ?>">
<span class="messages text-danger"><?php  echo form_error('pro_sale_price')  ?></span>
</div>
</div>

<div class="form-group row">
<label class="col-sm-2 col-form-label">Product Meta Content</label>
<div class="col-sm-10">
<input type="text" class="form-control" name="pro_meta_content" value="<?php echo $edit_product['pro_meta_content']; ?>">
<span class="messages text-danger"><?php  echo form_error('pro_meta_content')  ?></span>
</div>
</div>

<div class="form-group row">
<label class="col-sm-2 col-form-label">Sort Description</label>
<div class="col-sm-10">
<textarea rows="5" cols="5" class="form-control" placeholder="Default textarea" name="pro_sort_desc"><?php echo $edit_product['pro_sort_desc']?></textarea>
<span class="messages text-danger"><?php  echo form_error('pro_sort_desc')  ?></span>
</div>
</div>

<div class="form-group row">
<label class="col-sm-2 col-form-label">Full Description</label>
<div class="col-sm-10">
<textarea rows="5" cols="5" class="form-control" placeholder="Default textarea" name="pro_full_desc"><?php echo $edit_product['pro_full_desc']; ?></textarea>
<span class="messages text-danger"><?php  echo form_error('pro_full_desc')  ?></span>

</div>
</div>

<div class="form-group row">
<label class="col-sm-2 col-form-label">Product Image</label>
<div class="col-sm-10">
<input type="file" class="form-control" name="pro_feat_image">
<span class="text-danger">Recommended Size(1800x400)</span> 

 <br>
 <br>
 <img src="<?php echo base_url();    ?>assets/images/<?php  echo $edit_product['pro_feat_image'];   ?>" height="100px">
 <br>
 <br>
</div>
</div>
<div></div>

<div class="form-group row">
<label class="col-sm-2 col-form-label">Gallery Image</label>
<div class="col-sm-10">
<input type="file" class="form-control" name="files[]" multiple=''>
<span class="text-danger">Recommended Size(1800x400)</span> 
</div>
</div>
<div class="d-flex" id="gallery_fetch">
    

<?php
$images=$edit_product['pro_gallery_image'];
$images=explode('/',$images);
$count=count($images);
// echo $count;
// print_r($images);
for($i=0; $i<$count;$i++)
{
    ?>
        <img src="<?php echo base_url()  ?>images/<?php echo $images[$i]  ?>" height="100px" onclick="delete_image(this.id)" id="<?php echo $images[$i]  ?>"  />
    <?php
}

    
?>
</div>

<div class="form-group row">
<label class="col-sm-2 col-form-label">Product Type</label>
<div class="col-sm-10">
        <input type="checkbox" <?php  if($edit_product['pro_new']=="1"){echo "checked";} ?> name="pro_new" value="1" optional>new
        <input type="checkbox" <?php  if($edit_product['pro_popular']=="1"){echo "checked";} ?> name="pro_popular" value="1"  optional>popular
        <input type="checkbox" <?php  if($edit_product['pro_arrival']=="1"){echo "checked";} ?> name="pro_arrival" value="1" optional>arrival
</div>
</div>

<div class="form-group row">
<label class="col-sm-2">Select Colors</label>
<div class="col-sm-10">
</div>
</div>
    


<!-- <?php

foreach($color AS $key=>$row)
{
    ?>
<div class="form-group row">
<label class="col-sm-2"></label>
<div class="col-sm-10">
<input type="checkbox" name="color[]" value="<?php  echo $row['c_code'] ?>" >&nbsp;&nbsp;<div style="height:25px;width:25px;background-color:<?php  echo $row['c_code'] ?>!important;display:inline-block;"></div>&nbsp;&nbsp;<?php  echo $row['c_name'] ?><br><br>
</div>
</div>
    
    <?php
}


?> -->
<?php
foreach($color AS $key=>$row)
{
    ?>
<div class="form-group row">
<label class="col-sm-2"></label>
<div class="col-sm-10">
<input type="checkbox" 

<?php

$old_color=explode('/',$edit_product['pro_color']);

if (in_array($row['c_code'],$old_color ))
  {
  echo "checked";
  }
?>

name="color[]" value="<?php  echo $row['c_code'] ?>" >&nbsp;&nbsp;<div style="height:25px;width:25px;background-color:<?php  echo $row['c_code'] ?>!important;display:inline-block;"></div>&nbsp;&nbsp;<?php  echo $row['c_name'] ?><br><br>
</div>
</div>
    
    <?php
}
?>

<div align="center"><input type="submit" name="submit"></div>
</form>
</div>
</div>
</div>
</div>
</div>

</div>
</div>

<div id="styleSelector">
</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script type="text/javascript">
      $(document).ready(function(){ 
$("#cat_id").on('change',function(){
    var getValue=$(this).val();
    // alert(getValue);
        $.ajax({
          url:"<?php echo site_url(); ?>/ajaxcontroller/get_sub_cat/"+getValue,
          success: function (data) {     
                      // ('#city').val()     
                // alert(data);
                console.log(data);
                data = JSON.parse(data);
                data.forEach(function(datas){
                  $('#sub_id').append('<option value='+ datas.sub_id +'>' + datas.sub_cat_name + '</option>')
                })
            },
            error: function (xhr, ajaxOptions, thrownError) {
                swal("Error approved!", "Please try again", "error");
            }

        })
  });
});
        </script>