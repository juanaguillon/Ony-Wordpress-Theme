<?php 

require "function-menus.php";

function ony_admin_menu(){

	add_menu_page( __('Options Ony', 'ony') , __('Ony','ony'), 'manage_options' , 'ony_menu' , 'ony_list_options' , 'dashicons-star-filled' , 70 );	
	
}
add_action( 'admin_menu' , 'ony_admin_menu');

?>
