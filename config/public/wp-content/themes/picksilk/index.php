<?php /*
Theme Name: PickSilk
Theme URI: http://www.bakbak.io
Description: A ecommerce theme inspired by chumbak website
Version: 1.0
Author: biplav
Author URI: http://www.bakbak.io
Tags: Tags to locate your theme in the WordPress theme repository
*/
?>
<?php get_header(); 
global $woo_options;
?>
<?php
woo_main_before();
if( isset( $woo_options['woo_stand_first'] ) ) {
      echo '<div class="stand-first">';
          echo stripslashes( $woo_options['woo_stand_first'] );
          echo '</div>';
    } 
  if ( is_front_page() || is_home() ) {
    // Include the featured content template.
    get_template_part('front_page');
  } else {
    woo_loop_before();
    if ( have_posts() ) { 
    while ( have_posts() ) { 
        the_post();
        get_template_part( 'content', get_post_format() );
        }
    }
    woo_loop_after();
  }
  woo_main_after();
?>
<?php get_footer(); ?>

