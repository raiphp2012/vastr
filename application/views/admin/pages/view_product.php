    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
<div class="pcoded-inner-content">

<div class="main-body">
<div class="page-wrapper">

<div class="page-body">
<div class="row">
<div class="col-sm-12">

<div class="card">
<div class="card-header">
<h5>All Product</h5>
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
<th>Product Name</th>
<th>product Image</th>
<th>Status</th>
<th>Action</th>
</tr>
</thead>
<tbody>
	<?php 
			$i=0;
		foreach ($all_product as $key => $value) {
			$i++;
	?>
 <tr>
<td><?php echo $i; ?></td>
<td><?php echo $value['pro_name']?></td>
<td><img src="<?php   echo base_url()  ?>assets/images/<?php echo $value['pro_feat_image'];  ?>" height="100px"> </td>
	        <td>
            <?php
            if ($value['status']=='1') 
            {
                ?>
                <a href="<?php echo site_url().'/admincontroller/view_product/deactive/'.$value['pro_id']; ?>"  class="btn btn-success btn-sm">
                    Active
                </a>
                <?php
            }
            else
            {
                ?>
                <a href="<?php echo site_url().'/admincontroller/view_product/active/'.$value['pro_id']; ?>"  class="btn btn-danger btn-sm">
                    Deactive
                </a>
                <?php

            }
            ?>
        </td>
<td>
	<button class="btn btn-success">
	<a href="<?php echo base_url(); ?>edit_product/<?php echo $value['pro_id']; ?>">View
</button></a>
<!-- <button class="btn btn-danger">
		<a href="<?php echo site_url(); ?>/admincontroller/delete/<?php echo $value['pro_id']; ?>">Delete</a></button> -->
            <a href="<?php echo site_url().'/admincontroller/view_product/delete/'.$value['pro_id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are You Sure To Delete')">
                Delete
            </a>

	</td>
</tr>
<?php }?>
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

<!-- <script type="text/javascript" src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script> -->
<script type="text/javascript">
    $(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>>