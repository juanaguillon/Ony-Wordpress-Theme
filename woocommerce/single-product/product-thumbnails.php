<?php 

if ( ! defined("ABSPATH") || ! class_exists( "WooCommerce") ) {
  exit;
}

global $product, $post;

$attc_galery = $product->get_gallery_image_ids(  );
if ( $attc_galery && has_post_thumbnail(  )  ) {  
  
  echo "<div class='thumbs-gallery-images'>";

  array_unshift($attc_galery, get_post_thumbnail_id( get_the_ID() ) );

  foreach ($attc_galery as $atg) {
    $thumbnail = wp_get_attachment_image_src( $atg, 'shop_thumbnail');
    $full_image = wp_get_attachment_image_src( $atg, 'full' );
    $atts = array(
      'title'                   => get_post_field( 'post_title'  , $atg ),
      'data-caption'            => get_post_field( 'post_excerpt', $atg ),
      'data-src'                => $full_image[0],
      'data-large_image'        => $full_image[0],
      'data-large_image_width'  => $full_image[1],
      'data-large_image_height' => $full_image[2]
    );

    $html .= "<div data-thumb='" . esc_url( $thumbnail[0] ) . "' class='woocommerce_product_gallery__images'>";    
    $html .= wp_get_attachment_image( $atg , 'shop_thumbnail', false, $atts );
    $html .= "</div>";    
  }
  echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', $html);
  echo "</div>";
}

