<div class="pcoded-inner-content">

<div class="main-body">
<div class="page-wrapper">

<div class="page-body">
 <div class="row">
<div class="col-sm-12">

<div class="card">
<div class="card-header">
<h5>Top Banner Update</h5>
<span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>
</div>
<?php if(isset($error)){?>
<div class="alert alert-danger alert-dismissible fade show" role="alert">
   <?php echo $error; ?>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<?php }?>

<?php if(isset($success)){?>
<div class="alert alert-success alert-dismissible fade show" role="alert">
   <?php echo $success; ?>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<?php }?>
<div class="card-block">
<h4 class="sub-title">Add Category</h4>
<form method="post" enctype="multipart/form-data" action="<?php  echo site_url();  ?>admincontroller/top_edit/<?php  echo  $edit_top['id'];  ?>/update">
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


<div class="form-group row" hidden>
<div class="col-sm-10">
<input type="text" class="form-control" name="id" value="<?php echo $edit_top['id']?>">
</div>
</div>

<div class="form-group row">
<label class="col-sm-2 col-form-label">Upload File</label>

<div class="col-sm-10">
    <?php 
    if (isset($upload_error))
    {
        ?>
        <div class="alert alert-danger"><?php echo $upload_error;?></div>
        <?php
    }
 ?>
<input type="file" class="form-control" name="b_image"  id="b_image">
<span class="messages text-danger"></span>
<span class="text-danger">Recommended Size(1800x400)</span>    

 <br>
 <br>
 <img src="<?php echo base_url();    ?>assets/images/<?php  echo $edit_top['b_image'];   ?>" height="100px">
 <br>
 <br>

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