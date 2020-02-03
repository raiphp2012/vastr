 

  <style>
   
  #demo .active, #selectable:hover{border: 0; padding: 0;}	

  </style> 
<div id="demo" class="carousel slide" data-ride="carousel">

  <!-- Indicators -->
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
  </ul>
  
  <!-- The slideshow -->
  <div id="carousel-example" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carousel-example" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example" data-slide-to="1"></li>
    <li data-target="#carousel-example" data-slide-to="2"></li>
  </ol>

  <div class="carousel-inner">
    <div class="item active">
      <a href="#"><img src="<?php echo base_url(); ?>assets/include/images/categories-banner.jpg" width="100%"></a>

    </div>
    <div class="item">
      <a href="#"><img src="<?php echo base_url(); ?>assets/include/images/categories-banner.jpg" width="100%"></a>
     </div>
    <div class="item">
      <a href="#"><img src="<?php echo base_url(); ?>assets/include/images/categories-banner.jpg" width="100%"></a>
    </div>
  </div>

  <a class="left carousel-control" href="#carousel-example" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
  </a>
  <a class="right carousel-control" href="#carousel-example" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
  </a>
</div>



<section id='content' class='' >
<div >
	<div class="banner_pic" >
	<img src="<?php echo base_url(); ?>assets/include/images/banner_cloathing.jpg" width="100%">
	
    </div>

<div class="fl-row fl-row-full-width fl-row-bg-photo fl-node-559d4fa261024" data-node="559d4fa261024">
	
	<!-- <div class="fl-row-content-wrap"> -->
		<div class="fl-row-content-wrap">
			<div class="pic_over">
			<div class="col-md-6">
					<a href="<?php echo site_url(); ?>ptype/FEMALE">
				<button id="m_shop" >Shop For Women</button></a>
			</div>
		</div>
			
	</div>
	<div class="pic_over2">
			<div class="col-md-6">
				<a href="<?php echo site_url(); ?>ptype/MALE">
				<button id="w_shop">Shop For men</button></a>
			</div>
			
	</div>
			<!-- <div class="col-md-6">
				<a href="<?php echo site_url(); ?>ptype/MALE">
				<button id="w_shop" class="pull-right" style="margin-right: 29px;">Shop For men</button></a>
			</div> -->
			
	</div>
	<div class="pic_over2">
			
			
	</div>
			
		<div class="fl-row-content fl-row-fixed-width fl-node-content">
		<div class="fl-col-group fl-node-559d4fa26140c" data-node="559d4fa26140c">
			<?php foreach ($category as $key => $value) {
			
			 ?>
		<div class="fl-col fl-col-small fl-node-559d4fa2617f4" style="width: 33.33%;" data-node="559d4fa2617f4">
		<div class="fl-col-content fl-node-content">
		<div class="fl-module fl-module-details_thumb fl-animation fl-slide-down fl-node-56134238c4329" data-node="56134238c4329"  data-animation-delay="0.25" >
	<div class="fl-module-content fl-node-content">
		<div class="feature-box  media-box fbox-bg" >
    <div class="fbox-media">
    	
        	<a href='<?php echo base_url(); ?>get-product/<?php 
								echo 'cat';?>/<?php echo $value['cat_id']; ?>' >
        	<img src="<?php echo base_url(); ?>assets/images/<?php echo $value['category_image']; ?>"  alt='' />
        </a>

                   
	</div>

    <div class="fbox-desc">
      <h3><?php echo $value['cate_name']; ?><span class="subtitle">For Men and Women</span></h3>
            </div>
</div>	</div>
</div>		</div>
	</div>
	<?php }?>

	</div>		</div>


	</div>
</div><div class="fl-row fl-row-full-width fl-row-bg-photo fl-row-bg-overlay dark fl-node-561b4db55ba55" data-node="561b4db55ba55">
	<div class="fl-row-content-wrap">
				<div class="fl-row-content fl-row-fixed-width fl-node-content">
		<div class="fl-col-group fl-node-561b4db5696d0" data-node="561b4db5696d0">
			<center>	<h1 style="color:#e6e6e6;"><h1 style="color:#e6e6e6;"><?php echo $get_winter['cate_name'];
						?></h1> </h1> </center>
						<?php $data1 = $this->Dashboard_model->get_subcate($get_winter['cat_id']);
							foreach ($data1 as $key => $value) {
											 ?>
			<div class="fl-col fl-col-small fl-node-561b4db569887" style="width: 25%;" data-node="561b4db569887">
		
				<div class="fl-col-content fl-node-content">
			
		<div class="fl-module fl-module-features_thumb fl-animation fl-slide-up fl-node-561b4dc7020eb" data-node="561b4dc7020eb"  data-animation-delay="0.25" >

			<div class="fl-module-content fl-node-content">
		
		<div class="feature-box fbox-center fbox-effect fbox-light">
				
    <div class="fbox-icon" >

        <a  href="<?php echo base_url(); ?>get-product/<?php 
								echo 'subchild';?>/<?php echo $value['id']; ?> " >
         <img src="<?php echo base_url(); ?>/assets/images/<?php echo $value['child_image']; ?>" width="50%">
        </a>
    </div>

    <h3><?php echo $value['sub_child_name']; ?></h3>
        <p>Best collection for men and women</p>
    </div>	</div>
</div>		</div>
	</div>
<?php }?>



	</div>		</div>
	</div>
</div>
	<?php $bags = $this->Dashboard_model->get_bags(); 
	?>
<div class="fl-row fl-row-full-width fl-row-bg-none fl-node-56204435158eb" data-node="56204435158eb">
	
</div><div class="fl-row fl-row-full-width fl-row-bg-parallax fl-row-bg-overlay fl-node-559d4fa263b1c" data-node="559d4fa263b1c" data-parallax-speed="2" data-parallax-image="<?php echo base_url(); ?>assets/include/wp-content/uploads/2015/07/10.jpg">
	<div class="fl-row-content-wrap">
				<div class="fl-row-content fl-row-fixed-width fl-node-content">
		<div class="fl-col-group fl-node-559d4fa263f04" data-node="559d4fa263f04">
		<div class="fl-col fl-node-559d4fa2642ec" style="width: 100%;" data-node="559d4fa2642ec">
		<div class="fl-col-content fl-node-content">
		<div class="fl-module fl-module-image_bg_cta fl-animation fl-fade-in fl-node-559d4fa2646d4" data-node="559d4fa2646d4"  data-animation-delay="0.25" >
	<div class="fl-module-content fl-node-content">
		<div class="section notopmargin nobottommargin notopborder dark" style="padding: 220px 0px;background:none;" >            
    <div class=" vertical-middle center clearfix" style="position: absolute; top: 50%; width: 100%; margin-top: -123px;">
        <div class="emphasis-title heading-block">
         <h3 style="font-size: 36px;"  data-animate="fadeInDown" ><?php echo $bags['cate_name']; ?></h3>
            <span data-animate='fadeIn' >For Men & Women </span>
        </div>
	<a href="<?php echo base_url(); ?>get-product/<?php 
								echo 'cat';?>/5" data-animate="none"  href="#" class="none animated button      button-reveal tright button-3d button-medium  " >
	<span>See More</span>
	 
	<i class="icon-chevron-right"></i>
	</a>  

    </div>                           
</div>	</div>
</div>		</div>
	</div>
	</div>		</div>
	</div>
</div>



<div class="fl-row fl-row-full-width fl-row-bg-photo fl-node-5685f4ba35197" data-node="5685f4ba35197">
	<div class="fl-row-content-wrap">
				<div class="fl-row-content fl-row-fixed-width fl-node-content">
		<div class="fl-col-group fl-node-5685f4ba44026" data-node="5685f4ba44026">
		<div class="fl-col fl-node-5685f4ba44270" style="width: 100%;" data-node="5685f4ba44270">
		<div class="fl-col-content fl-node-content">
		<div class="fl-module fl-module-rich-text fl-node-5685f4ba349cf" data-node="5685f4ba349cf"  data-animation-delay="0.0" >
	<div class="fl-module-content fl-node-content">
		<center><h1>Latest Product</h1></center>
		<div class="fl-rich-text">
	<p><div class="woocommerce columns-4">
			<ul class="products">
			<?php $product = $this->Dashboard_model->get_latest_product(); 
							if(isset($product) && $product!=''){
								foreach ($product as $key => $value) {
									# code...
								
		?>

	<li class="post-3512 product type-product status-publish has-post-thumbnail product_cat-clothes-rack  instock shipping-taxable purchasable product-type-simple test1 product-grid">
	<a href="<?php echo base_url(); ?>single/<?php echo $value['pro_id']; ?>" class="woocommerce-LoopProduct-link tesr"><img src="<?php echo base_url(); ?>assets/images/<?php echo $value['pro_feat_image']; ?>" class="attachment-shop_catalog size-shop_catalog wp-post-image" alt="<?php echo ucwords($value['pro_name']); ?>" title="<?php echo ucwords($value['pro_name']); ?>" srcset="" sizes="(max-width: 300px) 100vw, 300px" / style="height: 260px !important;"></a>

	<span class="price text-left product-content" >
	<h3><?php echo ucwords($value['pro_name']); ?></h3>
		<span class="woocommerce-Price-amount amount " style="padding-left:2px;"><span class="woocommerce-Price-currencySymbol" ><b > र </span><?php echo $value['pro_sale_price']; ?></span></b>&ensp;<span class="dress-card-crossed" style="text-decoration: line-through; font-size: 12px;" > र <?php echo $value['pro_price']; ?></span><span class="dress-card-off" >&ensp;<?php $sprice = $value['pro_sale_price']; 
	  $aprice = $value['pro_price'];
	 $pamnt =  ($sprice/$aprice) * 100; 
	 $ttlper = 100 - $pamnt; 
?></span><span style="color:#EE1C23; font-size: 12px; border-radius:50px;">(<?php echo number_format((float)$ttlper, 2, '.', ''); ?>%OFF)</span>
<div class="hv">
	<span class="price text-left" style="word-spacing: 0.01em;">
			<span class="woocommerce-Price-amount amount " style="padding-left: 5px;"><span class="woocommerce-Price-currencySymbol">SIZE:</span> 
			
				<?php $sizes=explode(',',$value['pro_size']);
						 for ($i=0; $i <sizeof($sizes) ; $i++) { 						 
						 ?>
			<span style="border-radius: 50%; padding: 2px;font-size: 17px;line-height: normal;"><a href="javascript:void(0)" class="selectable r act" id="selectable" onclick="selectText('<?php echo $sizes[$i]; ?>','<?php echo $value['pro_id']; ?>')" ><?php echo $sizes[$i]; ?></a>	
		 </span>
	<script >
		 #selectable[i].addEventListener("click", function() {
	  var current = document.getElementsByClassName("active");
	  current[0].className = current[0].className.replace(" active", "");
	  this.className += " active";
	  });</script>
	
				 <div id="selctedsize" style="font-size: 36px; border-radius: 31px; padding: 6px;margin-bottom: 63px;color: #da4242;" name="selctedsize" hidden=""><?php
	$selectsize=0;
	
		 echo $selectsize; ?> </div>
</span>	

	
<?php }?>
</span>
</span>
<span class="price text-left" style="word-spacing: 0.6em;">
<span class="woocommerce-Price-amount amount " style="padding-left: 5px;"><span class="woocommerce-Price-currencySymbol">COLOR: </span> 
			<?php 		
			$color=explode('/',$value['pro_color']);
				 	for ($i=0; $i <sizeof($color) ; $i++) { 						 
					 ?>
		<span style="border-radius: 50%;padding: 2px;font-size: 17px;line-height: normal;"><a href="javascript:void(0)" class="selectable r act" id="selectable" onclick="selectcolor('<?php echo $color[$i]; ?>','<?php echo $value['pro_id']; ?>')" style="background-color:<?php echo $color[$i];?>; border-radius: 50%; font-size: 1px; padding: 15px; margin-left: 10px;"></span></a>	
     </span>
     <span  id="selctedcolor" class="selctedcolor" name="selctedcolor" hidden="" onclick="selectcolor('<?php echo $color[$i]; ?>','<?php echo $value['pro_id']; ?>')"   style="font-size: 36px;background: #8fe2e2;border-radius: 31px; padding: 6px; margin-bottom: 0; color: #da4242;"> <?php
$selctedcolor=0;
     echo $selctedcolor; ?> </span>
   
<?php }?>
</span>
</span>
<a rel="nofollow" data-quantity="1" data-product_id="3512" data-product_sku="" class="button product_type_simple add_to_cart_button ajax_add_to_cart showhim"  href="javascript:void(0);" onclick="add_to_cart('<?php echo $value['pro_id']; ?>','<?php  echo $value['pro_sale_price'];  ?>','1')" >Add to cart   </a> 

</div>
<!-- <div class="showhim">HOVER ME
  <div class="showme">hai</div>
</div> -->
</li>
<?php } }?>

				
			</ul>

			
			</div>



		</p>
</div>	</div>
</div>		</div>
	</div>
	</div>		</div>
	</div>
</div>




<div class="fl-row fl-row-full-width fl-row-bg-parallax dark fl-node-559d4fa2675b5" data-node="559d4fa2675b5" data-parallax-speed="2" data-parallax-image="<?php echo base_url(); ?>assets/include/wp-content/uploads/2015/07/11.jpg">
	<a href="">	<div class="fl-row-content-wrap">
				<div class="fl-row-content fl-row-fixed-width fl-node-content">
		<div class="fl-col-group fl-node-559d4fa26799d" data-node="559d4fa26799d">
		<div class="fl-col fl-node-559d4fa267d85" style="width: 100%;" data-node="559d4fa267d85">
		<div class="fl-col-content fl-node-content">
		<div class="fl-module fl-module-twitter_slider fl-animation fl-slide-up fl-node-559d4fa26816d" data-node="559d4fa26816d"  data-animation-delay="0.25" >
	<div class="fl-module-content fl-node-content">
		<div style="padding: 110px 0px; " >
	<div class="testimonial-transparent-light " data-animation="slide" data-arrows="false">
		
		<div class="flexslider" style="width: auto;">
			<div class="slider-wrap">
<center><b style="font-size:45px !important; color:#ef6363 !important;">Footwear For Men & Women</b><br>
  <button id="foot_btn"> <a  href="<?php echo base_url(); ?>get-product/<?php 
								echo 'cat';?>/3" style="color:black; font-weight: bold; font-size:20px; ">View all</a></button>
</center>
			</div>
		</div>
	</div>
</div>

	</div>
</div>		</div>
	</div>
	</div>		</div>
	</div></a>
</div></div></section>


 <?php
       $session_value=isset($_SESSION['user_id']);
 			?>
<script type="text/javascript">
		           function selectText(size,pro_id)
            {    
                $.post("<?php echo site_url(); ?>/Ajaxcontroller/updatesize",{ 'pro_id' : pro_id,'size' : size},function(data, status){
                $("#selctedsize").html(size);
                console.log(data);
                // $("#selctedsize").css( 'background-color', 'transparent' );
				});
}

    function selectcolor(color,pro_id)
            {    
            	if (typeof color == "undefined" || color ==0){
            		alert("Please Select Color");
            	}else{
                $.post("<?php echo site_url(); ?>/Ajaxcontroller/updatecolor",{ 'pro_id' : pro_id,'color' : color},function(data, status){
              
                $("#selctedcolor").html(1); 
});
            }
}
	var session_value = "<?php echo $session_value ?>";
	// alert(session_value);

  function add_to_cart(id,c_price,c_quantity)
  {

  	  var psize = JSON.parse(document.getElementById('selctedsize').innerHTML); 
  	   var color = JSON.parse(document.getElementById('selctedcolor').innerHTML); 

  	 if (typeof psize == "undefined" || psize ==0){
  	 	alert('please Select Size First');
  	 }else{

  	 	 if (typeof color == "undefined" || color ==0){
  	 	alert('please Select Colour ');
  	 }else{
  		if (typeof session_value == "undefined" || session_value == ""){
  			   	window.location.href = "<?php echo site_url(); ?>Dashboard/register";
  
           }else{           	             $.post("<?php echo site_url(); ?>/Ajaxcontroller/add_to_cart",{ 'pro_id' : id,'c_price' : c_price, 'c_quantity' : c_quantity,'psize':psize,'color':color},function(data, status){
           	             	alert(data);

                     if (status=="success") {
                     $.post("<?php echo site_url(); ?>/Ajaxcontroller/quantity",function(data, status){
                        $("#result").html(data);
                      
                   });
                 }
  			  });
           }

           }
       }
       }
              
</script>
<style type="text/css">
	.showme {
  display: none;
}

.showhim:hover .showme {
  display: block;
}
</style>
   

        <!-- Footer
        ============================================= -->
