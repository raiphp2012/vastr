<div class="pcoded-inner-content">

<div class="main-body">
<div class="page-wrapper">

<div class="page-body">
 <div class="row">
<div class="col-sm-12">

<div class="card">
<div class="card-header">
<h5>Category Add</h5>
<span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>
</div>
<div class="card-block">
<h4 class="sub-title">Add Category</h4>
<form action="<?php echo base_url(); ?>bottombanneraction"method="post" enctype="multipart/form-data">
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
<!-- 
<div class="form-group row">
<label class="col-sm-2 col-form-label">Category Name</label>

<div class="col-sm-10">
<input type="text" class="form-control" name="cate_name">
<span class="messages text-danger"><?php  echo form_error('cate_name')  ?></span>
</div>
</div> -->
<div class="form-group row">
<label class="col-sm-2 col-form-label">Upload File</label>
<div class="col-sm-10">
<input type="file" class="form-control" name="b_image">
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