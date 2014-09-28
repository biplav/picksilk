<?php
add_action( 'woocommerce_archive_description', 'woocommerce_category_image', 2 );
function woocommerce_category_image($term_id) {
   $thumbnail_id = get_woocommerce_term_meta( $term_id, 'thumbnail_id', true );
   $image = wp_get_attachment_url( $thumbnail_id );
   return $image;
}
?>