<?php
/**
 * Single Product Price, including microdata for SEO
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $post, $product;
?>
<div itemprop="offers" itemscope itemtype="http://schema.org/Offer" class="woo-price">

	<?php
	if($product->is_in_stock()) {
		echo sprintf('<p itemprop="price" class="price"><mark>%s</mark></p>',$product->get_price_html());		
		echo sprintf('<meta itemprop="priceCurrency" content="%s"/>',get_woocommerce_currency());
		echo '<link itemprop="availability" href="http://schema.org/InStock" />';
	} else {
		echo '<p class="bg-danger">Out Of Stock</p>';
		echo '<link itemprop="availability" href="http://schema.org/OutOfStock" />';
	}
	?>
	

</div>