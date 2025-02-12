<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from colorlib.com//polygon/admindek/default/auth-sign-in-social.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 11 Sep 2019 13:16:52 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
<title>Admindek | Admin Template</title>


<!--[if lt IE 10]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="description" content="Admindek Bootstrap admin template made using Bootstrap 4 and it has huge amount of ready made feature, UI components, pages which completely fulfills any dashboard needs." />
<meta name="keywords" content="bootstrap, bootstrap admin template, admin theme, admin dashboard, dashboard template, admin template, responsive" />
<meta name="author" content="colorlib" />

<link rel="icon" href="https://colorlib.com//polygon/admindek/files/assets/images/favicon.ico" type="image/x-icon">

<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet"><link href="https://fonts.googleapis.com/css?family=Quicksand:500,700" rel="stylesheet">

<link rel="stylesheet" type="text/css" href="<?php echo base_url();; ?>assets/files/bower_components/bootstrap/css/bootstrap.min.css">

<link rel="stylesheet" href="<?php echo base_url();; ?>assets/files/assets/pages/waves/css/waves.min.css" type="text/css" media="all"> <link rel="stylesheet" type="text/css" href="<?php echo base_url();; ?>assets/files/assets/icon/feather/css/feather.css">

<link rel="stylesheet" type="text/css" href="<?php echo base_url();; ?>assets/files/assets/icon/themify-icons/themify-icons.css">

<link rel="stylesheet" type="text/css" href="<?php echo base_url();; ?>assets/files/assets/icon/icofont/css/icofont.css">

<link rel="stylesheet" type="text/css" href="<?php echo base_url();; ?>assets/files/assets/icon/font-awesome/css/font-awesome.min.css">

<link rel="stylesheet" type="text/css" href="<?php echo base_url();; ?>assets/files/assets/css/style.css"><link rel="stylesheet" type="text/css" href="<?php echo base_url();; ?>assets/files/assets/css/pages.css">
</head>
<body themebg-pattern="theme1">

<div class="theme-loader">
<div class="loader-track">
<div class="preloader-wrapper">
<div class="spinner-layer spinner-blue">
<div class="circle-clipper left">
<div class="circle"></div>
</div>
<div class="gap-patch">
<div class="circle"></div>
</div>
<div class="circle-clipper right">
<div class="circle"></div>
</div>
</div>
<div class="spinner-layer spinner-red">
<div class="circle-clipper left">
<div class="circle"></div>
</div>
<div class="gap-patch">
<div class="circle"></div>
</div>
<div class="circle-clipper right">
<div class="circle"></div>
</div>
</div>
<div class="spinner-layer spinner-yellow">
<div class="circle-clipper left">
<div class="circle"></div>
</div>
<div class="gap-patch">
<div class="circle"></div>
</div>
<div class="circle-clipper right">
<div class="circle"></div>
</div>
</div>
<div class="spinner-layer spinner-green">
<div class="circle-clipper left">
<div class="circle"></div>
</div>
<div class="gap-patch">
<div class="circle"></div>
</div>
<div class="circle-clipper right">
<div class="circle"></div>
</div>
</div>
</div>
</div>
</div>

<section class="login-block">

<div class="container-fluid">
<div class="row">
<div class="col-sm-12">

<form class="md-float-material form-material" action="<?php echo site_url(); ?>/login/loginprocess" method='post'>
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
<div class="text-center">
<img src="<?php echo base_url(); ?>assets/files/assets/images/logo.png" alt="logo.png">
</div>
<div class="auth-box card">
<div class="card-block">
<div class="row m-b-20">
<div class="col-md-12">
<h3 class="text-center txt-primary">Sign In</h3>
</div>
</div>
<div class="form-group form-primary">
<input type="text" name="username" class="form-control" required="">
<span class="form-bar"></span>
<label class="float-label">Username</label>
</div>
<div class="form-group form-primary">
<input type="password" name="password" class="form-control" required="">
<span class="form-bar"></span>
<label class="float-label">Password</label>
</div>
<div class="row m-t-25 text-left">
<div class="col-12">
<div class="forgot-phone text-right float-right">
<a href="auth-reset-password.html" class="text-right f-w-600"> Forgot Password?</a>
</div>
</div>
</div>
<div class="row m-t-30">
<div class="col-md-12">
<input type="submit" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20" name="submit" value="Login">
</div>
</div>
</div>
</div>
</form>

</div>

</div>

</div>

</div>

</section>
<script type="ecd61b9c9cf98502c4dd4818-text/javascript" src="<?php echo base_url();; ?>assets/files/bower_components/jquery/js/jquery.min.js"></script>
<script type="ecd61b9c9cf98502c4dd4818-text/javascript" src="<?php echo base_url();; ?>assets/files/bower_components/jquery-ui/js/jquery-ui.min.js"></script>
<script type="ecd61b9c9cf98502c4dd4818-text/javascript" src="<?php echo base_url();; ?>assets/files/bower_components/popper.js/js/popper.min.js"></script>
<script type="ecd61b9c9cf98502c4dd4818-text/javascript" src="<?php echo base_url();; ?>assets/files/bower_components/bootstrap/js/bootstrap.min.js"></script>

<script src="<?php echo base_url();; ?>assets/files/assets/pages/waves/js/waves.min.js" type="ecd61b9c9cf98502c4dd4818-text/javascript"></script>

<script type="ecd61b9c9cf98502c4dd4818-text/javascript" src="<?php echo base_url();; ?>assets/files/bower_components/jquery-slimscroll/js/jquery.slimscroll.js"></script>

<script type="ecd61b9c9cf98502c4dd4818-text/javascript" src="<?php echo base_url();; ?>assets/files/bower_components/modernizr/js/modernizr.js"></script>
<script type="ecd61b9c9cf98502c4dd4818-text/javascript" src="<?php echo base_url();; ?>assets/files/bower_components/modernizr/js/css-scrollbars.js"></script>
<script type="ecd61b9c9cf98502c4dd4818-text/javascript" src="<?php echo base_url();; ?>assets/files/assets/js/common-pages.js"></script>

<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13" type="ecd61b9c9cf98502c4dd4818-text/javascript"></script>
<script type="ecd61b9c9cf98502c4dd4818-text/javascript">
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>
<script src="../../../../ajax.cloudflare.com/cdn-cgi/scripts/95c75768/cloudflare-static/rocket-loader.min.js" data-cf-settings="ecd61b9c9cf98502c4dd4818-|49" defer=""></script></body>

<!-- Mirrored from colorlib.com//polygon/admindek/default/auth-sign-in-social.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 11 Sep 2019 13:16:52 GMT -->
</html>
