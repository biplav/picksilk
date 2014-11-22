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
      			<ol class="carousel-indicators">
        		<?php for($i = 0; $i < count($products); $i++) {
          			if($i == 0) echo '<li data-target="#categoryCarousel" data-slide-to="0" class="active"></li>';
          			else echo sprintf('<li data-target="#categoryCarousel" data-slide-to="%s"></li>',$count);
        			}
        		?>
      			</ol>
      			<div class="carousel-inner">
					<?php //wc_get_template_part( 'content', 'product' ); ?>
					<?php 
          $first = TRUE;
          foreach($products as $product) {
            $image_src = has_post_thumbnail( $product->post->ID ) ? get_the_post_thumbnail($product->post->ID, 'shop_single') : 'data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==';
            $product_name=esc_attr($product->post->post_title ? $product->post->post_title : $product->post->ID);
            $product_url=get_permalink( $product->post->ID );
            $product_description=$product->post->post_content ;
            $product_price=$_product->get_price_html();
            $active =$first ? 'active' : '';
            echo sprintf('<div class="item %s"><img class="baseImg thumbnail media-object" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" >%s</img><div class="container"><div class="carousel-caption"><h1>%s</h1><p>%s</p><p><a class="btn btn-lg btn-primary" href="%s" role="button">%s</a></p></div></div></div>',$active,$image_src,$product_name,$product_description,$product_url,$product_price);
            $first=FALSE;
          }
        ?>
    	</div>
		<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>	

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

	<?php
		/**
		 * woocommerce_sidebar hook
		 *
		 * @hooked woocommerce_get_sidebar - 10
		 */
		do_action( 'woocommerce_sidebar' );
	?>

<?php get_footer( 'shop' ); ?>