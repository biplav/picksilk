<?php
add_action( 'woocommerce_archive_description', 'woocommerce_category_image', 2 );
function woocommerce_category_image($term_id) {
   $thumbnail_id = get_woocommerce_term_meta( $term_id, 'thumbnail_id', true );
   $image = wp_get_attachment_url( $thumbnail_id );
   return $image;
}

add_theme_support( 'woocommerce' );

add_filter( 'woocommerce_product_tabs', 'sb_woo_remove_reviews_tab', 98);
function sb_woo_remove_reviews_tab($tabs) {
	unset($tabs['reviews']);
	return $tabs;
}

remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10);
?>