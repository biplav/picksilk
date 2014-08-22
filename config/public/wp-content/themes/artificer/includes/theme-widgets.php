<?php
/*-----------------------------------------------------------------------------------*/
/* Load the widgets, with support for overriding the widget via a child theme.
/*-----------------------------------------------------------------------------------*/

$widgets = array(
				'includes/widgets/widget-woo-adspace.php', 
				'includes/widgets/widget-woo-blogauthor.php', 
				'includes/widgets/widget-woo-embed.php', 
				'includes/widgets/widget-woo-flickr.php', 
				'includes/widgets/widget-woo-search.php', 
				'includes/widgets/widget-woo-twitter.php', 
				'includes/widgets/widget-woo-subscribe.php'/*,
				'includes/widgets/widget-woo-price-filter.php'*/
				);

// Allow child themes/plugins to add widgets to be loaded.
$widgets = apply_filters( 'woo_widgets', $widgets );
				
	foreach ( $widgets as $w ) {
		locate_template( $w, true );
	}

/*---------------------------------------------------------------------------------*/
/* Deregister Default Widgets */
/*---------------------------------------------------------------------------------*/
if (!function_exists( 'woo_deregister_widgets')) {
	function woo_deregister_widgets(){
	    unregister_widget( 'WP_Widget_Search' ); 
		//unregister_widget( 'WC_Widget_Price_Filter' ); 
	}
	//register_widget( 'WC_Widget_Price_Filter_Custom');
}
add_action( 'widgets_init', 'woo_deregister_widgets' );  

/*---------------------------------------------------------------------------------*/
/* Dequeue Dojo tabs styles (1.1+) */
/*---------------------------------------------------------------------------------*/
/*add_action( 'after_setup_theme', 'woo_dequeue_woodojo_tabs_styles' );

function woo_dequeue_woodojo_tabs_styles () {
	wp_dequeue_style( 'woodojo_tabs' );
} */

?>