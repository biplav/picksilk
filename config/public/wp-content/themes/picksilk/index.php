<?php /*
Theme Name: Chumbak Like
Theme URI: http://www.bakbak.io
Description: A ecommerce theme inspired by chumbak website
Version: 1.0
Author: biplav
Author URI: http://www.bakbak.io
Tags: Tags to locate your theme in the WordPress theme repository
*/
?>
<?php get_header(); ?>

<!-- Carousel
    ================================================== -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="item active">
          <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="First slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>Offer 1</h1>
              <p>Note: If you're viewing this page via a <code>file://</code> URL, the "next" and "previous" Glyphicon buttons on the left and right might not load/display properly due to web browser security rules.</p>
              <p><a class="btn btn-lg btn-primary" href="#" role="button">Sign up today</a></p>
            </div>
          </div>
        </div>
        <div class="item">
          <img src="data:image/gif;base64,R0lGODlhAQABAIAAAGZmZgAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Second slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>Offer 2</h1>
              <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
              <p><a class="btn btn-lg btn-primary" href="#" role="button">Learn more</a></p>
            </div>
          </div>
        </div>
        <div class="item">
          <img src="data:image/gif;base64,R0lGODlhAQABAIAAAFVVVQAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Third slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>Offer 3</h1>
              <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
              <p><a class="btn btn-lg btn-primary" href="#" role="button">Browse gallery</a></p>
            </div>
          </div>
        </div>
      </div>
      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
    </div><!-- /.carousel -->

	<div class="container">
  		
  	
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
     echo "<div class='row'>";
     $i=0;
     foreach ( $product_categories as $product_category ) {
     	$image_url = woocommerce_category_image($product_category->term_id);
     	if(!empty($image_url)) {
			echo '<a href="' . get_term_link( $product_category ) . '"><div class="col-xs-6 col-md-4"> <img class="categoryThumbnail thumbnail img-responsive media-object" data-src="holder.js/100%x200/random/text:'.$product_category->name.' " alt="'.$product_category->name.'" src="'.$image_url.'""></div></a>';
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
	<?php get_footer(); ?>

