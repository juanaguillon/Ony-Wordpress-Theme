<?php 

// Exit if access directly.
if ( ! defined( 'ABSPATH')){
	exit;
}
/**
* Si es necesario cambiar el icono de algun metodo de pago.
*/
class Ony_require_images
{
	private $url_icon = "";
	
	function __construct( $url )
	{
		$this->url_icon = get_template_directory_uri() . '/inc/images/' .  $url . '.png';
	}

	public function change_icon_gateway(){
		return $this->url_icon;
	}
}

 ?>