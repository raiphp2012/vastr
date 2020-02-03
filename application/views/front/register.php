                  
<!-- start login page -->
<div class="blockSign">
    <div id="formContent">
        <ul class="tab-group">
            <li class="tab active"><a href="#signin">Sign In</a></li>
            <li class="tab"><a href="#signup">Sign Up</a></li>
        </ul>
        <div class="tab-content">
            <div id="signin">
                <h1>Welcome </h1>
              <form action="<?php echo base_url(); ?>login-user" method="POST">
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
                    <input type="email" required autocomplete="off" placeholder="Email Adress" name="user_email" id="signin"
                        class="fadeIn " />
                        <span class="messages text-danger"><?php  echo form_error('user_email')  ?></span>
                    <input type="password" required autocomplete="off" placeholder="Password" name="password" id="password" class="fadeIn ">
                    <span class="messages text-danger"><?php  echo form_error('password')  ?></span>
                    <input type="submit" value="Sign In" name="submit"></input>
                    <p id="formFooter"><a href="#">Forgot Password?</a></p>
                </form>
            </div>
            <div id="signup">
                    <h1>Sign up Now </h1>
                <form action="<?php echo base_url();?>register" method="POST">
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
                    <input type="text" required autocomplete="off"  name="user_name" placeholder="User Name">
                    <span class="messages text-danger"><?php  echo form_error('user_name')  ?></span>
                    <input type="text" required autocomplete="off" name="first_name" placeholder="First Name" >
                     <span class="messages text-danger"><?php  echo form_error('first_name')  ?></span>
                    <input type="text" required autocomplete="off" name="last_name"  placeholder="Last Name">
                     <span class="messages text-danger"><?php  echo form_error('last_name')  ?></span>

                    <input type="email" required autocomplete="off" name="user_email" placeholder="Email Id"/>
                     <span class="messages text-danger"><?php  echo form_error('user_email')  ?></span>

                    <input type="password" required autocomplete="off" name="user_password" placeholder="password">
                     <span class="messages text-danger"><?php  echo form_error('user_password')  ?></span>

                    <input type="submit" value="Sign Up" name="submit"></input>
                </form>
            </div>
        </div>
    </div>
</div>




<!-- end of login page -->

        <!-- Footer
        ============================================= -->
