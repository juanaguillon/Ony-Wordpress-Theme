<?php 


if ( ! defined ( 'ABSPATH') ){
  return;
}

?>
<div id="product-<?php the_ID(); ?>" <?php post_class(); ?> >
	
	<?php 

	$woo_sp = 'woocommerce_show_product_';
	$woo = 'woocommerce_before_single_product_summary';
	$removes[$woo] = array(
		$woo_sp . 'sale_flash' => 10,
		$woo_sp . 'images'     => 20
	);
	$woo_ts = 'woocommerce_template_single_';
	$wos = 'woocommerce_single_product_summary';
	$WC_S = "WC_Structured_Data::generate_product_data()";
	$removes[$wos] = array(

		$woo_ts . 'title'       => 5,
		$woo_ts . 'rating'      => 10,
		$woo_ts . 'price'       => 10,
		$woo_ts . 'excerpt'     => 20,
		$woo_ts . 'add_to_cart' => 30,
		$woo_ts . 'meta'        => 40,
		$woo_ts . 'sharing'     => 50,
		$WC_S                   => 60
	);
	$woo_as = 'woocommerce_after_single_product_summary';
	$woo_o = 'woocommerce_';

	$removes[$woo_as] = array(
		$woo_o . 'output_product_data_tabs'  => 10,
		$woo_o . 'upsell_display'            => 15,
		$woo_o . 'output_related_products'   => 20
	);

	foreach ($removes[$woo] as $rem => $value) {
		remove_action( $woo , $rem , $value ); 
	}
	foreach( $removes[$wos] as $rems => $vals ){
		remove_action( $wos , $rems , $vals );
	}
	foreach( $removes[$woo_as] as $resm => $vels){
		remove_action($woo_as , $resm , $vels);
	}

	add_action( $woo , 'woocommerce_show_product_' . 'sale_flash' , 10 );
	add_action( $woo , 'woocommerce_show_product_' . 'images' , 5);
	?>
	
	<div class="woo-flash-images">		
		<?php do_action( $woo ); ?>
	
	</div>
	
	<?php

	add_action( 'woocommerce_single_product_summary' , 'woocommerce_template_single_' . 'price'       , 10 );
	add_action( 'woocommerce_single_product_summary' , 'woocommerce_template_single_' . 'rating'      , 15);
	add_action( 'woocommerce_single_product_summary' , 'woocommerce_template_single_' . 'excerpt'     , 20);
	add_action( 'woocommerce_single_product_summary' , 'woocommerce_template_single_' . 'title'       , 5);
	add_action( 'woocommerce_single_product_summary' , 'woocommerce_template_single_' . 'add_to_cart' , 35);
	add_action( 'woocommerce_single_product_summary' , 'woocommerce_template_single_' . 'sharing'     , 30);
	add_action( 'woocommerce_single_product_summary' , 'woocommerce_template_single_' . 'meta'        , 25);	
	 
	add_action('woocommerce_after_single_product_summary' , 'woocommerce_' . 'upsell_display'          , 5);
	add_action('woocommerce_after_single_product_summary' , 'woocommerce_' . 'output_product_data_tabs', 10);
	add_action('woocommerce_after_single_product_summary' , 'woocommerce_' . 'output_related_products' , 20);

	
	?>
	<div class="woo-description">
		<?php do_action( $wos ); ?>
	</div>
	<div class="woo-info">
		<?php do_action( $woo_as ); ?> 
	</div>
	
	<div class="modal-ending-image" style="display:none">	
			<div>			
				<span id="close-preview-gallery-images">X</span>
				<img src="" id="result-preview-image">
				<div class="result-preview-images"></div>
			</div>
		</div>
	</div>	
</div>