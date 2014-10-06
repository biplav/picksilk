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
	//unset($tabs['description']);
	unset($tabs['category']);
	return $tabs;
}

remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10);

add_action( 'woocommerce_before_my_page', 'wc_print_notices', 10 );

add_action('woo_main_before','woo_display_breadcrumbs',10);
if (!function_exists( 'woo_display_breadcrumbs')) {
	function woo_display_breadcrumbs() {
		global $woo_options;
		if (!is_home()) {
			if ( isset( $woo_options['woo_breadcrumbs_show'] ) && $woo_options['woo_breadcrumbs_show'] == 'true' ) {
			echo '<section id="breadcrumbs">';
				woo_breadcrumbs();
			echo '</section><!--/#breadcrumbs -->';
			}
		}
	} // End woo_display_breadcrumbs()
} // End IF Statement

?>