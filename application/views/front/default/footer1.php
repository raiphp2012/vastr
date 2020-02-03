
        <footer id="footer" class='footer' >
                        <div class="container">

                <!-- Footer Widgets
                ============================================= -->
                <div class="footer-widgets-wrap clearfix">
                    
    <div class='col_one_third' >
        <div id="text-2" class="widget widget_text"><div class="fancy-title title-border" ><h4>QUICKLINKS</h4></div>        
            <div class="textwidget">
            
<?php 
                $category = $this->Dashboard_model->all_cat();
                foreach ($category as $key => $value) {
                ?>  
                <a href="<?php echo base_url(); ?>get-product/<?php 
                                echo 'cat';?>/<?php echo $value['cat_id']; ?>"><?php echo $value['cate_name']; ?></a><br>

                                        
                                    <?php }?>
            </div>
        </div>
        <!-- <div id="text-3" class="widget widget_text"><div class="fancy-title title-border" ><h4>Quick lilnks</h4></div>         <div class="textwidget">
        <p><a href=""></a><br /></p>
        </div>
        </div> -->
    </div>
    <div class='col_one_third' >
        <div id="text-2" class="widget widget_text"><div class="fancy-title title-border" ><h4>CUSTOMER SERVICES</h4></div>     
            <div class="textwidget">
            <p><a href="<?php echo base_url(); ?>contact">Contact us</a><br />
                <a href="<?php echo base_url(); ?>about">About us</a><br />
                <a href="<?php echo base_url(); ?>faq">FAQ</a><br />
               
            </p>
            </div>
        </div><div id="text-3" class="widget widget_text"><div class="fancy-title title-border" ><h4>Address</h4></div>         <div class="textwidget"><p>C-260,Sec-63, Noida(UP)<br />
</p>
</div>
        </div>  </div>
    <div class='col_one_third col_last' >
        <div id="text-4" class="widget widget_text">            <div class="textwidget"><div role="form" class="wpcf7" id="wpcf7-f3920-o1" lang="en-US" dir="ltr">
<div class="screen-reader-response"></div>
<form action="http://ignitethemes.net/wp/rhapsody/home3/#wpcf7-f3920-o1" method="post" class="wpcf7-form" novalidate="novalidate">
<div style="display: none;">
<input type="hidden" name="_wpcf7" value="3920" />
<input type="hidden" name="_wpcf7_version" value="4.3.1" />
<input type="hidden" name="_wpcf7_locale" value="en_US" />
<input type="hidden" name="_wpcf7_unit_tag" value="wpcf7-f3920-o1" />
<input type="hidden" name="_wpnonce" value="fac11a9527" />
</div>
<p> <span class="wpcf7-form-control-wrap your-name"><input type="text" name="your-name" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false" placeholder="Name*" /></span> </p>
<p> <span class="wpcf7-form-control-wrap your-email"><input type="email" name="your-email" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email" aria-required="true" aria-invalid="false" placeholder="Email*" /></span> </p>
<p> <span class="wpcf7-form-control-wrap your-subject"><input type="text" name="your-subject" value="" size="40" class="wpcf7-form-control wpcf7-text" aria-invalid="false" placeholder="Subject" /></span> </p>
<p> <span class="wpcf7-form-control-wrap your-message"><textarea name="your-message" cols="40" rows="10" class="wpcf7-form-control wpcf7-textarea" aria-invalid="false" placeholder="Message"></textarea></span> </p>
<p><input type="submit" value="Send" class="wpcf7-form-control wpcf7-submit" /></p>
<div class="wpcf7-response-output wpcf7-display-none"></div></form></div></div>
        </div>  </div>


                </div>

            </div>        
            
            <!-- Copyrights
            ============================================= -->
            <div id="copyrights">

                <div class="container clearfix">

                    <div class="col_half">
                                                                        <a href="http://prathamvision.com/" class="footer-logo standard-logo" ><img src="<?php echo base_url(); ?>/assets/wp-content/themes/rhapsody/images/logo.png" alt="Logo" ></a>
                                                
                                                <a href="" class="footer-logo retina-logo" ><img src="<?php echo base_url(); ?>/assets/wp-content/themes/rhapsody/images/footer-logo-large.html" alt="Retina Logo" ></a>   
                        
                        Copyright &copy; 2019 Vastr. All Rights Reserved.                    </div>

                    <div class="col_half col_last tright">
                        <div class="copyrights-menu copyright-links clearfix">
                            <a href='http://prathamvision.com/'>FAQ</a><a href='http://prathamvision.com/'>Store</a><a href='http://prathamvision.com/'>Blog</a>                           
                        </div>
                        <div class="fright clearfix">
                                                        <a href="#" class="social-icon si-small si-borderless nobottommargin si-facebook" >
                                <i class="icon-facebook"></i>
                                <i class="icon-facebook"></i>
                            </a>
                                                        <a href="#" class="social-icon si-small si-borderless nobottommargin si-twitter" >
                                <i class="icon-twitter"></i>
                                <i class="icon-twitter"></i>
                            </a>
                                                        <a href="#" class="social-icon si-small si-borderless nobottommargin si-gplus" >
                                <i class="icon-gplus"></i>
                                <i class="icon-gplus"></i>
                            </a>
                                                        
                        </div>
                    </div>

                </div>

            </div><!-- #copyrights end -->

        </footer><!-- #footer end -->

    </div><!-- #wrapper end -->

    <!-- Footer Scripts
    ============================================= -->
    <script type="text/javascript">



</script><script type='text/javascript' src='<?php echo base_url(); ?>assets/wp-content/themes/rhapsody/js/functions988b.html?ver=20152306'></script>
<script type='text/javascript' src='<?php echo base_url(); ?>assets/wp-includes/js/comment-reply.min1f6a.html?ver=4.6.15'></script>
<script type='text/javascript' src='<?php echo base_url(); ?>assets/wp-content/plugins/beaver-builder-lite-version/js/jquery.waypoints.min8de3.html?ver=1.6.0.1'></script>
<script type='text/javascript' src='<?php echo base_url(); ?>assets/wp-content/uploads/bb-plugin/cache/2983-layout6b2c.html?ver=9c2dfa887b6cef9e2d5b79637a8e5163'></script>
<script type='text/javascript' src='<?php echo base_url(); ?>assets/wp-content/plugins/contact-form-7431/includes/js/jquery.form.mind03d.js?ver=3.51.0-2014.06.20'></script>

<script type='text/javascript' src='<?php echo base_url(); ?>assets/wp-content/plugins/contact-form-7431/includes/js/scripts5b31.js?ver=4.3.1'></script>
<script type='text/javascript'>
/* <![CDATA[ */

/* ]]> */
</script>
<script type='text/javascript' src='<?php echo base_url(); ?>assets/wp-content/plugins/woocommerce/assets/js/frontend/add-to-cart.mina117.js?ver=2.6.11'></script>
<script type='text/javascript' src='<?php echo base_url(); ?>assets/wp-content/plugins/woocommerce/assets/js/jquery-blockui/jquery.blockUI.min44fd.js?ver=2.70'></script>
<script type='text/javascript'>
/* <![CDATA[ */

/* ]]> */
</script>
<script type='text/javascript' src='<?php echo base_url(); ?>assets/wp-content/plugins/woocommerce/assets/js/frontend/woocommerce.mina117.js?ver=2.6.11'></script>
<script type='text/javascript' src='<?php echo base_url(); ?>assets/wp-content/plugins/woocommerce/assets/js/jquery-cookie/jquery.cookie.min330a.js?ver=1.4.1'></script>
<script type='text/javascript'>
/* <![CDATA[ */

/* ]]> */
</script>
<script type='text/javascript' src='<?php echo base_url(); ?>assets/wp-content/plugins/woocommerce/assets/js/frontend/cart-fragments.mina117.js?ver=2.6.11'></script>
<script type='text/javascript' src='<?php echo base_url(); ?>/assets/wp-content/plugins/woocommerce/assets/js/frontend/cart-fragments.mina117.js?ver=2.6.11'></script>
<script type='text/javascript' src='<?php echo base_url(); ?>assets/wp-includes/js/wp-embed.min1f6a.js?ver=4.6.15'></script>



    <script>
 /* form js */
 $('.form').find('input, textarea').on('keyup blur focus', function (e) {
  
  var $this = $(this),
      label = $this.prev('label');

      if (e.type === 'keyup') {
            if ($this.val() === '') {
          label.removeClass('active highlight');
        } else {
          label.addClass('active highlight');
        }
    } else if (e.type === 'blur') {
        if( $this.val() === '' ) {
            label.removeClass('active highlight'); 
            } else {
            label.removeClass('highlight');   
            }   
    } else if (e.type === 'focus') {
      
      if( $this.val() === '' ) {
            label.removeClass('highlight'); 
            } 
      else if( $this.val() !== '' ) {
            label.addClass('highlight');
            }
    }

});

$('.tab a').on('click', function (e) {
  
  e.preventDefault();
  
  $(this).parent().addClass('active');
  $(this).parent().siblings().removeClass('active');
  
  target = $(this).attr('href');

  $('.tab-content > div').not(target).hide();
  
  $(target).fadeIn(600);
  
});
 </script>

 
</body>


</html>