<?php
/**
 * Single Product Thumbnails
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.3
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $post, $product, $woocommerce;

$attachment_ids = $product->get_gallery_attachment_ids();

if ( $attachment_ids ) {
	?>
<div class="thumbnails">
    <div id="productImageCarousel" class="carousel slide" data-ride="carousel">
    <?php
            
            $loop2 = 0;
            $columns2 = apply_filters( 'woocommerce_product_thumbnails_columns', 4 );
            $count2 = 0;
            ?>
        <ol class="carousel-indicators">
        	
       		<?php
				foreach ( $attachment_ids as $attachment_id ) {
					$count2++;
                    if($count2 == 0) {
                        echo '<li data-target="#productImageCarousel" data-slide-to="<?php echo $count2; ?>" class="active">';
                    }
					echo '</li><li data-target="#productImageCarousel" data-slide-to="'.$count2.'" class="">';
				}
			?>
            </li>
        </ol>
    	<div class="carousel-inner">
			<?php
            
            $loop = 0;
            $columns = apply_filters( 'woocommerce_product_thumbnails_columns', 4 );
            $count = 0;
            ?>
            
            <?php
            foreach ( $attachment_ids as $attachment_id ) {
                $classes = array( 'zoom' );
                
                if ( $loop == 0 || $loop % $columns == 0 )
                    $classes[] = 'first';
    
                if ( ( $loop + 1 ) % $columns == 0 )
                    $classes[] = 'last';
    
                $image_link = wp_get_attachment_url( $attachment_id );
                if ( ! $image_link )
                    continue;
    
                $image       = wp_get_attachment_image( $attachment_id, apply_filters( 'single_product_small_thumbnail_size', 'shop_thumbnail' ) );
                $image_class = esc_attr( implode( ' ', $classes ) );
                $image_title = esc_attr( get_the_title( $attachment_id ) );
                
                /*if($count == 0)
                {
                    echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', sprintf( '<div class="item">', $image_link, $image_class, $image_title, $image ), $attachment_id, $post->ID, $image_class );
                }*/
                //echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', sprintf( '<a href="%s" class="%s" title="%s"  rel="prettyPhoto[product-gallery]">%s</a>', $image_link, $image_class, $image_title, $image ), $attachment_id, $post->ID, $image_class );
                if($count == 0) {
                    echo '<div class="item active">';
                } else {
                    echo '<div class="item">';
                }
                echo sprintf('<img class="baseImg thumbnail media-object" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw=="><img src="%s" alt="%s" class="productImage"/></img> ',$image_link,$image_title); 
                echo sprintf('<div class="carousel-caption">%s</div></div>',the_title());
                $count ++;
            }
        ?>
        </div>
        <!-- Controls -->
        <a class="left carousel-control" href="#productImageCarousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
        <a class="right carousel-control" href="#productImageCarousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
        </a>    
        </div>
</div>
	<?php
}?>