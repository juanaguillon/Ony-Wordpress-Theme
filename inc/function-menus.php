<?php

// Funciones ingresada a el admin menu.

if (! defined("ABSPATH")) {
	exit();
}

if (! function_exists('ony_list_options')) {
	function ony_list_options(){

		wp_enqueue_style('admin-ony',get_template_directory_uri() . '/styles/admin-ony.css');
		$options = array(
			/*
			*Options Radius :
			ony-option-main-menu : Vista del menu.
			display-short-description: Mostrar la descripcion corta en el shop, relate products, etc.
			sidebar-position: Posicion del sidebar (Der,izq etc)
			*/
			'ony-option-main-menu', 
			'ony-display-short-description',
			'ony-sidebar-position'
		);
		if (isset($_POST["set_ony_changes"])) {
			
			$newvals = array(
				$_POST["option-main-menu"],
				$_POST["display-short-description"],
				$_POST["sidebar-position"]
			);

			$options_val = array_combine($options, $newvals);
							
			foreach($options_val as $option => $post){

				if( "" != $post ){
					if(update_option($option,$post)){
						$save = true;
					}
				}					
      }	        				
		}				

		?>				
		
		<form action="#" method="post" id="ony-list-options">			
			<div class="wrap">	
			<h2><?php echo __('ony Options','ony') ?></h2>	
				<?php if ( isset($save) && $save ): ?>
					<div class="notice updated is-dismissible">
						<p><b><?php echo __('Changes saved','ony'); ?></b></p>
					</div>
				<?php endif;?>		
				<div class="title-ony">
					<h3><?php echo __('General Options','ony') ?></h3>
				</div>
				<div class="content-ony-wordpress-options">
					<table class="table-woocommerce-options table-options">
						<!-- start table -->

						<tr class="tr1">
							<td class="td-left">
								<h4><?php echo __('View style of main menu','ony'); ?></h4>								
							</td>
							<td class="td-right">									
								<label>
									<input type="radio" name="option-main-menu" value="transition">
									<?php echo __('Transition Menu (Default)','ony');?>
								</label>
								<label>
									<input type="radio" name="option-main-menu" value="static">
									<?php echo __('Static Menu','ony');?>
								</label>															
								<label>
									<input type="radio" name="option-main-menu" value="sticky" >
									<?php echo __('Sticky Menu','ony');?>
								</label>								
							</td>
						</tr>
						<!-- end tr1 -->
						<tr class="tr2">
							<td class="td-left">
								<h4><?php echo __('Position sidebar','ony'); ?></h4>
							</td>
							<td class="td-right">
								<label>
									<input type="radio" name="sidebar-position" value="left">
									<?php echo __('Left (Default)','ony'); ?>
								</label>
								<label>
									<input type="radio" name="sidebar-position" value="right">
									<?php echo __('Right','ony'); ?>
								</label>
								<label>
									<input type="radio" name="sidebar-position" value="st-left">
									<?php echo __('Static left','ony'); ?>
								</label>
								<label>
									<input type="radio" name="sidebar-position" value="st-right">
									<?php echo __('Static Right','ony'); ?>
								</label>
								<label>
									<input type="radio" name="sidebar-position" value="none">
									<?php echo __('None','ony'); ?>
								</label>
							</td>
						</tr>	
						<!-- end tr2 -->						
					</table>
				</div>

				<?php 

				// Se creará esta sentencia en caso de existir la clase WooCommerce

				if ( class_exists('WooCommerce') ): ?>
	
					<div class="title-ony">
						<h3><?php echo __("WooCommerce Options",'ony') ?></h3>
					</div>
					<div class="content-ony-woocommerce-options">
						<table class="table-woocommerce-options table-options">							
							<tr class="tr1">
								<td class="td-left">
									<h4><?php echo __('Display short description','ony') ?></h4>									
								</td>
								<td class="td-right">
									<label>		
										<input type="radio" name="display-short-description" value="on">
										<?php echo __('On (Default)','ony'); ?>								
									</label>
									<label>	
										<input type="radio" name="display-short-description" value="off">
										<?php echo __('Off','ony') ?>									
									</label>
								</td>
							</tr>
						</table>
					</div>
					
				<?php endif; ?>
				<input type="submit" value="<?php echo __('Save','ony'); ?>" class="button button-primary" name="set_ony_changes">
			</div>
		</form>
		<script type="text/javascript">(function($){
		<?php
		foreach ($options as $key) {
			if (get_option($key)) {		
			?>			
				$('#ony-list-options input[value="<?php echo get_option($key); ?>"]').attr('checked','checked');
			<?php
			}

		}

		?>
		})(jQuery);</script>
		<?php

	}

}


	