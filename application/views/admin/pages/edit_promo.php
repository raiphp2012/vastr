<div class="pcoded-inner-content">

<div class="main-body">
<div class="page-wrapper">

<div class="page-body">
 <div class="row">
<div class="col-sm-12">

<div class="card">
<div class="card-header">
<h5>Promo Code update</h5>
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
<h4 class="sub-title">Update Promo Code</h4>
<form method="post" enctype="multipart/form-data" action="<?php  echo site_url();  ?>admincontroller/promo_edit/<?php  echo $edit_promo['p_id']; ?>/update">

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
<input type="text" class="form-control" name="p_id" value="<?php echo $edit_promo['p_id']?>">
</div>
</div>

<div class="form-group row">
<label class="col-sm-2 col-form-label">Promo Code Name</label>

<div class="col-sm-10">
<input type="text" class="form-control" name="promo_name" value="<?php echo $edit_promo['promo_name'];?>">
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