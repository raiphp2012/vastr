<div class="pcoded-inner-content">

<div class="main-body">
<div class="page-wrapper">

<div class="page-body">
 <div class="row">
<div class="col-sm-12">

<div class="card">
<div class="card-header">
<h5>Sub Category Add</h5>
<!-- <span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span> -->
</div>

<div class="card-block">
<h4 class="sub-title">Add Sub Category</h4>
<form action="<?php echo base_url(); ?>subcategoryaction" method="post" enctype="multipart/form-data">

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
<label class="col-sm-2 col-form-label">Category Name</label>

<div class="col-sm-10">
<select name="cate_id" class="form-control form-control-default fill">
	<<?php foreach ($all_category as $key => $value){ ?>
	
	<option value="<?php echo $value['cat_id']?>"><?php echo $value[
		'cate_name']; ?></option>
	<?php }?>
</select>
</div>
</div>
<div class="form-group row">
<label class="col-sm-2 col-form-label">Sub Category Name</label>

<div class="col-sm-10">
<input type="text" class="form-control" name="sub_cat_name">
</div>
</div>
<div class="form-group row">
<label class="col-sm-2 col-form-label">Upload File</label>
<div class="col-sm-10">
<input type="file" class="form-control" name="subcate_image">
<span class="text-danger">Recommended Size(1800x400)</span> 
</div>
</div>
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