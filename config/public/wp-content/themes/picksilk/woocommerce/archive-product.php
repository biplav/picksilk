<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive.
 *
 * Override this template by copying it to yourtheme/woocommerce/archive-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

get_header( 'shop' ); ?>

	<?php
		/**
		 * woocommerce_before_main_content hook
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 */
		do_action( 'woocommerce_before_main_content' );
	?>
	<div class="container" style="padding-top:50px">

		<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>

			<h1 class="page-title"><?php woocommerce_page_title(); ?></h1>

		<?php endif; ?>

		<?php do_action( 'woocommerce_archive_description' ); ?>

		<?php if ( have_posts() ) : ?>

			<?php
				/**
				 * woocommerce_before_shop_loop hook
				 *
				 * @hooked woocommerce_result_count - 20
				 * @hooked woocommerce_catalog_ordering - 30
				 */
				do_action( 'woocommerce_before_shop_loop' );
			?>

			<?php woocommerce_product_loop_start(); ?>

				<?php woocommerce_product_subcategories(); ?>

				<?php 
					$products = array();
					$count = 0;
					while ( have_posts() ) : the_post(); 
					if ( function_exists( 'get_product' ) ) {
      					$_product = get_product( get_the_ID() );
    				} else {
      					$_product = new WC_Product( get_the_ID() );
    				}
					array_push($products,$_product);
					//echo var_dump($_product);
					$count++;
				?>
				<?php endwhile; // end of the loop. ?>
				<!-- Indicators -->
      			
					<?php //wc_get_template_part( 'content', 'product' ); ?>
					<?php 
          $first = TRUE;
          $i = 1;
          echo '<div class="row">';
          foreach($products as $product) {
          	$image_src =wp_get_attachment_image_src( get_post_thumbnail_id($product->post->ID), $size);
          	$image_src = $image_src[0];
			$product_name=esc_attr($product->post->post_title ? $product->post->post_title : $product->post->ID);
            $product_url=get_permalink( $product->post->ID );
            $product_description=$product->post->post_content ;
            $product_price=$product->get_price_html();
            echo '<a href="' . $product_url . '"><div class="col-xs-6 col-md-4"> <div class="thumbnail"><img class="img-responsive media-object" data-src="holder.js/100%x200/random/text:'.$product_name.' " alt="'.$product_name.'" src="'.$image_src.'""><div class="caption category_caption_background"><h3 class="">'.$product_name.'</h3><p>'.$product_price.'</p></div></div></div></a>';
            //echo sprintf('<div class="item %s"><img class="baseImg thumbnail media-object" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" >%s</img><div class="container"><div class="carousel-caption"><h1>%s</h1><p>%s</p><p><a class="btn btn-lg btn-primary" href="%s" role="button">%s</a></p></div></div></div>',$active,$image_src,$product_name,$product_description,$product_url,$product_price);
            if($i == 3 ) {
            	echo '</div><div class="row">';
            	$i=0;
            }
            $i=$i+1;
          }
         echo "</div>"; 
        ?>
		
			<?php woocommerce_product_loop_end(); ?>

			<?php
				/**
				 * woocommerce_after_shop_loop hook
				 *
				 * @hooked woocommerce_pagination - 10
				 */
				do_action( 'woocommerce_after_shop_loop' );
			?>

		<?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

			<?php wc_get_template( 'loop/no-products-found.php' ); ?>

		<?php endif; ?>

	<?php
		/**
		 * woocommerce_after_main_content hook
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		do_action( 'woocommerce_after_main_content' );
	?>
</div>
	<?php
		/**
		 * woocommerce_sidebar hook
		 *
		 * @hooked woocommerce_get_sidebar - 10
		 */
		do_action( 'woocommerce_sidebar' );
	?>

<?php get_footer( 'shop' ); ?>