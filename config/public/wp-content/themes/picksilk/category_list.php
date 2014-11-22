<div class="category">

<?php
    $args = array(
    'number'     => $number,
    'orderby'    => $orderby,
    'order'      => $order,
    'hide_empty' => $hide_empty,
    'include'    => $ids
);

$product_categories = get_terms( 'product_cat', $args );

$count = count($product_categories);
 if ( $count > 0 ){
     echo "<div class='row category_background'>";
     $i=0;
     foreach ( $product_categories as $product_category ) {
     	$image_url = woocommerce_category_image($product_category->term_id);
     	if(!empty($image_url)) {
			echo '<a href="' . get_term_link( $product_category ) . '"><div class="col-xs-6 col-md-4"> <div class="thumbnail"><img class="img-responsive media-object" data-src="holder.js/100%x200/random/text:'.$product_category->name.' " alt="'.$product_category->name.'" src="'.$image_url.'""><div class="caption"><h3 class="category_caption_background">'.$product_category->name.'</h3></div></div></div></a>';
     	} else {
			echo '<a href="' . get_term_link( $product_category ) . '"><div class="col-xs-6 col-md-4"> <img class="thumbnail img-responsive" data-src="holder.js/100%x200/random/text:'.$product_category->name.' " alt="'.$product_category->name.'"></div></a>';
     	}       	
       	$i++;
       	if($i == 3) {
       		echo "</div><div class='row'>";
       		$i=0;
       	}
     }
     echo "</div>";
 }
 ?>
 </div>

