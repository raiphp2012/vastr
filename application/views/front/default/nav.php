<header id="header"  class='transparent-header full-header' >

    <div id="header-wrap">

        <div class="container clearfix">

            <div id="primary-menu-trigger"><i class="icon-reorder"></i></div>
            
            <!-- Logo
            ============================================= -->
            <div id="logo">
               <a href="<?php echo base_url(); ?>" class="standard-logo" data-dark-logo=""  ><img src="<?php echo base_url(); ?>assets/wp-content/themes/rhapsody/images/logo.png" width="100%"  alt="Logo" ></a>
                <a href="index.html" class="retina-logo"   ><img src="index.html" alt="Retina Logo"  ></a>   
 
                
            </div><!-- #logo end -->         
            

			<nav id="primary-menu">


				<ul>
				<?php 
	
				$category = $this->Dashboard_model->all_cat();
				foreach ($category as $key => $value) {
				?>
		
				     
		<li class='mega-menu sub-menu '><a class='megamenu' href='<?php echo base_url(); ?>get-product/<?php 
								echo 'cat';?>/<?php echo $value['cat_id']; ?>'><?php echo $value['cate_name']; ?></a>
					<div class="mega-menu-content style-2 col-5 clearfix" >
						<?php $sub = $this->Dashboard_model->all_subcat();
				foreach ($sub as $key => $value1) {
					if($value1['category_id'] == $value['cat_id']){
					
				?>
				
		
					<ul class="dropdown">
			
					   <li class='mega-menu-title sub-menu '><a href='<?php echo base_url(); ?>get-product/<?php 
								echo 'subcat';?>/<?php echo $value1['sub_id']; ?>' ><?php echo $value1['sub_cat_name']; ?></a>
			<?php 

			$subchild = $this->Dashboard_model->all_subchild();
			// print_r($subchild);
			if(isset($subchild) && $subchild!=''){
				foreach ($subchild as $key => $value2) {
					if($value2['sub_id'] == $value1['sub_id']){
					
				?>
						<ul>

						   <li class=''><a href='<?php echo base_url(); ?>get-product/<?php echo 'subchild'?>/<?php echo $value2['id']?>' ><?php echo $value2['sub_child_name']; ?></a></li>
						</ul>
						<?php }}}?>

					    </li>
					    	
					
					</ul>
					<?php }}?>
					</div>
				</li>
			<?php } ?>


				   <li style="text-align: center !important;" class='sub-menu ' ><a href='#' ><input type="search" id="srch" placeholder="search"></a>
					<div class="search_icon">
						<button id="my_sch"><img src="<?php echo base_url(); ?>/assets/images/search.png" width="20%"></button>
 
					</div>
				   </li>
	<?php 
    $res = $this->Dashboard_model->count_cart();
   ?>
				   <li style="text-align: center !important;" class='sub-menu ' ><a href='<?php echo site_url(); ?>cart-item' >
				  <img src="<?php echo base_url(); ?>/assets/images/shop.png" width="70%" ></a>
				   	<div id="result" style="z-index: 9; margin-top: -35px; font-size:18px;"><?php echo $res; ?></div>


				   



				   	<!-- <span ></span> -->
				
				   </li>
				   <li style="text-align: center !important;" class='sub-menu ' ><a href='<?php echo base_url(); ?>wishlist' ><img src="<?php echo base_url(); ?>/assets/images/wishlist.png" width="70%"></a>
				
				   </li>
				   <li class='sub-menu ' ><a href='form.html' ><img src="<?php echo base_url(); ?>/assets/images/profile.png" width="70%"></a>
					
					<ul style="width:120%; ">
					<!-- <li class=''><a href='form.html' >Login</a></li> -->
					<li class=''><a href='<?php echo base_url(); ?>ulogout' >Sign Up</a></li>
				   </ul>
				   </li>

				  
				 
				
				
			
			</ul>
			</nav>             
            
        </div>

  </div>

</header><