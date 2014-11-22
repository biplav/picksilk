<?php
    
    $args = array( 'post_type' => 'product', 'posts_per_page' => 3, 'meta_query' => array( array('key' => '_visibility','value' => array('catalog', 'visible'),'compare' => 'IN'),array('key' => '_featured','value' => 'yes')) );
    $loop = new WP_Query( $args );
    $products = array();

    while ( $loop->have_posts() ) : $loop->the_post(); $_product;

    if ( function_exists( 'get_product' ) ) {
      $_product = get_product( $loop->post->ID );
    } else {
      $_product = new WC_Product( $loop->post->ID );
    }
    //echo var_dump($_product);
    array_push($products,$_product);;
  ?>
  <?php endwhile; 
  ?>

<!-- Carousel
    ================================================== -->
    <div class="container" style="padding-top:65px">
    <div class="row" >
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <?php for($i = 0; $i < count($products); $i++) {
          if($i == 0) echo '<li data-target="#myCarousel" data-slide-to="0" class="active"></li>';
          else echo sprintf('<li data-target="#myCarousel" data-slide-to="%s"></li>',$count);
        }
        ?>
      </ol>
      <div class="carousel-inner">
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
    </div><!-- /.carousel -->
</div>
