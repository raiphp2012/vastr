
<div class="pcoded-inner-content">

<div class="main-body">
<div class="page-wrapper">

<div class="page-body">
<div class="row">
<div class="col-sm-12">

<div class="card">
<div class="card-header">
<h5>All Promo Code</h5>
</div>
<!-- <button class="right">Add Category</button> -->
	<div class="card-block">
    <?php
    if (isset($delete)) 
    {
        ?>
        <div class="alert alert-success">
            <?php echo $delete ?>
        </div>
        <?php
    }
    ?>
    <?php
    if (isset($active)) 
    {
        ?>
        <div class="alert alert-success">
            <?php echo $active ?>
        </div>
        <?php
    }
    ?>
    <?php
    if (isset($deactivate)) 
    {
        ?>
        <div class="alert alert-success">
            <?php echo $deactivate ?>
        </div>
        <?php
    }
    ?>
<div class="dt-responsive table-responsive">
<table id="simpletable" class="table table-striped table-bordered nowrap">
<thead>
<tr>
<th>S.no</th>
<th>Promo Code Name</th>
<th>Status</th>
<th>Action</th>
</tr>
</thead>
<tbody>
	<?php 
    if(isset($all_promo) && $all_promo!=''){
			$i=0;
		foreach ($all_promo as $key => $value) {
			$i++;
	?>
 <tr>
<td><?php echo $i; ?></td>
<td><?php echo $value['promo_name']?></td>
	        <td>
            <?php
            if ($value['status']=='1') 
            {
                ?>
                <a href="<?php echo site_url().'/admincontroller/view_promo/deactive/'.$value['p_id']; ?>"  class="btn btn-success btn-sm">
                    Active
                </a>
                <?php
            }
            else
            {
                ?>
                <a href="<?php echo site_url().'/admincontroller/view_promo/active/'.$value['p_id']; ?>"  class="btn btn-danger btn-sm">
                    Deactive
                </a>
                <?php

            }
            ?>
        </td>
<td>
	<button class="btn btn-success">
	<a href="<?php echo base_url(); ?>edit_promo/<?php echo $value['p_id']; ?>">View
</button></a>
<!-- <button class="btn btn-danger">
		<a href="<?php echo site_url(); ?>/admincontroller/delete/<?php echo $value['p_id']; ?>">Delete</a></button> -->

            <a href="<?php echo site_url().'/admincontroller/view_promo/delete/'.$value['p_id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are You Sure To Delete')">
                Delete
            </a>

	</td>
</tr>
<?php } }?>
</tbody>
</table>
</div>
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