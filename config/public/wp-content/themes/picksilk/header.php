<!DOCTYPE html>
<html class="">	
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width">
<meta name="robots" content="INDEX,FOLLOW">
<style type="text/css">
	@import url(http://fonts.googleapis.com/css?family=Open+Sans:400,600,700,300,800);
	@import url(http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz:700,200);
	@font-face {
		font-family: Diavlo_II;
		src: url("<?php echo get_template_directory_uri(); ?>/fonts/Diavlo_II_37/Diavlo_BOOK_II_37.otf") format("opentype");
}

 </style>
<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/img/favicon.ico" type="image/x-icon">
<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/img/favicon.ico" type="image/x-icon">
<?php 
global $woocommerce;
wp_head(); ?>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
<!-- Optional theme -->
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
<link rel="stylesheet" href="//getbootstrap.com/examples/carousel/carousel.css">

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" />
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/holder/2.4.0/holder.js"></script>
</head>
<body class="">
  <div id="bodyStart" class="container"> <!-- start of the body -->
	 <div class="navbar navbar-fixed-top" role="navigation">
      <div class="help_header">
      <div class="container">
        <div class="collapse navbar-collapse pull-left">
          <ul class="nav navbar-nav">
            <li><div class="help_text">Call Us: 080 - 40909240<div></li></ul>
        </div>
        <div class="collapse navbar-collapse pull-right">
          <ul class="nav navbar-nav">
            <li><div class="help_text">help@picksilk.com<div></li></ul>
        </div>
        </div>

      </div>
      <div class="header">
        <div class="container" style="padding-top: 5px;padding-left: 0px;">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
          </button>
          <table>
          <td>
          <a class="navbar-brand" href="/" ><div class="header_text">picksilk</div></a>
          </td><td>
          <div class="slogan_text">
          pick the silk <br/> that suits you
          </div>
          </td>
          </table>
        </div>
      <div class="collapse navbar-collapse pull-right">
          <ul class="nav navbar-nav">
            <li><a href="<?php echo $woocommerce->cart->get_checkout_url(); ?>"><span class='glyphicon glyphicon-shopping-cart cart-logo'></span></a></li>
            <!--<li><a href="<?php echo wp_login_url( get_permalink() ); ?>"><span class='glyphicon glyphicon-user'></span></a></li> -->
          </ul>
        </div><!--/.nav-collapse -->
      </div>
      </div>
        <div class="container" >
          <ul class="nav nav-tabs">
            <li role="presentation"><a href="#"><div class="menu_text">All Sarees</div></a></li>
            <li role="presentation"><a href="#"><div class="menu_text">Designer Sarees</div></a></li>
            <li role="presentation"><a href="#"><div class="menu_text">Traditional Sarees</div></a></li>
            <li role="presentation"><a href="#"><div class="menu_text">About Us</div></a></li> 
            <li role="presentation"><a href="#"><div class="menu_text">Contact Us</div></a></li> 
          </ul>
        </div>
      </div>
   
    <?php
      do_action( 'woocommerce_before_my_page_page' );
    ?>