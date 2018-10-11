<?php

/**
 * @package ony
 * @since 1.1.0
 * 
 * Esta funcion determinara el valor de una 'option'. 
 * $option sera la opcion a buscar.
 * $val_search será el valor que se enviara para lograr si es verdadero el valor que ha sido ingresada a dicha opcion.
 * $is_none Si se deja en default, permitira que, retorne un "true" a la funcion, en caso de que no exista ningun valor en la opcion.
 */
if ( ! defined ( 'ABSPATH' )){
	exit;
}

function includes(){
	$complete_url = dirname( __FILE__ );
	include_once(  $complete_url . '/inc/class/class-require-images.php' );
}
includes();

function ony_check_woo(){
	
	if ( class_exists( 'WooCommerce')){
		return true;
	}else{
		return false;
	}
	
}
function mt_check_option($option,$val_search,$is_none = false ){

	if( is_array($val_search) ){
		for ($i=0; $i < count($val_search) ; $i++) { 
			
			if( get_option( $option ) == $val_search[ $i ] ){
				return true;
			}
			
		}
	}else{

		if ( $is_none ){
			if( get_option($option) == $val_search || ! get_option($option)){
				return true;
			}
		}else{
			if(get_option($option) == $val_search ){
				return true;
			}
		}

	}

}


function ony_setup(){


	load_theme_textdomain( 'ony', get_template_directory() . '/languages' );

	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'woocommerce' );


	function ony_loader(){		
		
		wp_enqueue_style( 'style', get_template_directory_uri() .  '/styles/style.css' );
		wp_enqueue_script( 'pages', get_template_directory_uri() . '/js/pages.js', array ( 'jquery'));
		wp_enqueue_style( 'fonts' , get_template_directory_uri() . '/styles/FA/css/font-awesome.min.css');

		
		
		if( class_exists('WooCommerce') ){
			wp_enqueue_style( 'woo_style' , get_template_directory_uri() . '/styles/woocommerce.css');
			wp_enqueue_script( 'products', get_template_directory_uri(). '/js/products.js');
		}
		

	}
	
	function ony_load_script_customize(){
		wp_enqueue_script( 'customize' , get_template_directory_uri() . '/js/customizer.js' );

	}

	add_action( 'wp_enqueue_scripts' , 'ony_loader');
	add_action( 'customize_preview_init' , 'ony_load_script_customize');	
	

	
	require 'customizer/sections.php';
	require 'customizer/settings.php';
	require 'customizer/controls.php';
	require 'customizer/customizer.php';
	
	require 'inc/admin-menu.php';

	
	register_nav_menus( array(

		'primary'   => 'Menú Primario',
		'secondary' => 'Menú Secundario'

	) );
	


}
add_action('after_setup_theme' , 'ony_setup');
add_filter( 'woocommerce_enqueue_styles' , '__return_false');


function ony_options(){
	if (get_option( 'ony_act_background')) {
		$current_color[1] = get_option( 'ony_act_background');

	}else{

		$current_color[1] = get_option( 'ony_background');
	}
	
	$current_color[0] = get_option( 'ony_header_background');
	$current_color[2] = get_option( 'ony_sidebar_background');
	$current_color[3] = get_option( 'ony_post_background');
	$current_color[4] = get_option( 'ony_font_link');
	$current_color[5] = get_option( 'ony_link_hover');
	$current_color[6] = get_option( 'ony_title_color');
	$current_color[7] = get_option( 'ony_submit_color');
	$current_color[8] = get_option( 'ony_background_comment');
	return $current_color;
}

function ony_add_lines_style(){
	
	$color = get_option( 'ony_colors_scheme' );
	if ($color == "custom") {
		
		$current_color = ony_options();
 		
	}else{
		$set_color = ony_set_colors_scheme();
	
		$current_color = $set_color[$color]['colors'];
	}

	?>
	<style>
		#header_site{
			background-color: <?php echo $current_color[0]; ?>;
		}
		.edit_post_admin i, .carc_post i{
			color: <?php echo $current_color[0]?>;
		}
		body{
			background-color: <?php echo $current_color[1]; ?>;
		}
		#sidebar{
			background-color: <?php echo $current_color[2]; ?>;
		}
		.new_post, .content-area{
			background-color: <?php echo $current_color[3] ?>; 
		}
		.post-title a, .widget ul a{
			color: <?php echo $current_color[4]; ?>;
		}
		.post-title a:hover, .widget ul a:hover{
			color: <?php echo $current_color[5] ?>;
		}
		#title_site a{
			color: <?php echo $current_color[6] ?>;
		}		
		.comment-respond{
			border-color: <?php $current_color[7] ?>;
		}
		.submit{
			background-color: <?php echo $current_color[7] ?>; 
		}
		.comment-list, .comment-respond{
			background-color: <?php echo $current_color[8] ?> ; 
		}

	</style>
	<?php
	
		
}

function ony_widgets_init(){

	register_sidebar( array(
		'name'          => 'Nuevo Registro de Sidebar',
		'id'            => 'sidebar-1',
		'description'   => 'Añade widges a este sidebar',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>'
	) );

}

add_filter('woocommerce_paypal_icon',array(
	new Ony_require_images('icon-paypal'),
	'change_icon_gateway'
));

add_action( 'widgets_init' , 'ony_widgets_init');
add_action( 'wp_head' , 'ony_add_lines_style');

