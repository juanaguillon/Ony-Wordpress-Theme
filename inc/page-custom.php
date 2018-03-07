<script>
var ony_options = {};
		

<?php if ( mt_check_option('ony-option-main-menu','transition',true) ){ ?>
	ony_options.main_menu = 'transition';

<?php }elseif( get_option('ony-option-main-menu') == "sticky" ){ ?>

	ony_options.main_menu = 'sticky';

<?php }elseif( get_option('ony-option-main-menu') == "static" ){ ?>
	
	ony_options.main_menu = 'static'
	
<?php }

if ( ony_check_woo() ){
	?>
	ony_options.woo_exists = true;
	<?php
}



/*
* Aquí se estan ejecuntando, las funciones en que, el usuario, modifica la posición del sidebar.
*/

 if( mt_check_option('ony-sidebar-position','left',true) ){ ?>
	ony_options.sidebar_position = 'left';	

<?php }elseif( mt_check_option('ony-sidebar-position','right') ){ ?>
	ony_options.sidebar_position = 'right';	
<?php }

 ?></script>