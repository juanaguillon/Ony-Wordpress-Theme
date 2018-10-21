<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<script><?php if ( class_exists( 'WooCommerce') && is_checkout() ): ?>var is_checkout_page = true;<?php endif; ?></script>
		<meta charset="<?php bloginfo( 'charset' ) ?>">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title><?php bloginfo( 'name' ); ?></title>	
		<?php require 'inc/page-custom.php'; ?>
		<?php require 'inc/style.php'; echo $css_style_custom; ?>
		
		<?php wp_head(); ?>
		
</head>
<body <?php body_class();?>>
	<header class='header_site' id="header_site" >
		<?php if ( has_nav_menu ( 'secondary') ): ?>
			<div class="secondary_menu ">
				<?php 
				wp_nav_menu( array(
					'theme_location' => 'secondary',
					'menu_class'     => 'nav-secondary_menu witter',
					'container_id'   => 'container_nav_menu_secondary',
					'before' => "<span class='before'>",
					'after'  => "</span>",
					'link_before' => '<div class="link_before">',
					'link_after' => '</div>'
				));
				?>
			</div>
		<?php endif; ?>
		<div class='header_section witter'>				
			<div>
				<h3 id='title_site'>					
					<a href="<?php echo esc_url( home_url ('/') ); ?>"><?php bloginfo( 'name' ) ?></a>
				</h3>
				<div id='description_site'>
					<p><?php bloginfo( 'description' ); ?></p>		
				</div>					
			</div>
			<?php if ( ! get_option('ony-option-main-menu') || get_option('ony-option-main-menu') == 'transition' ): ?>				

				<span id="display_menu_primary" class="display_menu_primary" title="<?php echo __("Display Menu",'ony') ?>"><i class="fa fa-angle-down"></i></span>	
				
			<?php endif; ?>
		</div>
	</header>
	<?php if (has_nav_menu( 'primary' )): ?>
	
	<div class='primary_menu'>
		<?php 
		wp_nav_menu( array(
			'theme_location' => 'primary',			
			'menu_class'     => 'nav_menu_primary witter',
			'container_id'   => 'container_nav_menu_primary'
			) );

		?>
		
	</div>
	
<?php elseif( ! has_nav_menu( 'primary') ): ?>
	<div class="primary_menu">
		<div id="container_nav_menu_primary">
			<ul class="nav_menu_primary witter" id="menu-primer-menu">

				<?php if ( current_user_can('edit_theme_options')): ?>
					<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-22">
						
						<a href="<?php echo esc_url( admin_url( 'customize.php') ) ?>"><?php echo __('Create a new Menu' , 'ony'); ?></a>
					</li>					
				<?php endif; ?>

				<?php if( class_exists( 'WooCommerce') ): ?>
					
					<li class="menu-item menu-item-type-post_type"><a href="<?php echo WC()->cart->get_checkout_url(); ?>">Checkout</a></li>
					<li class="menu-item menu-item-type-post_type "><a href="<?php echo WC()->cart->get_cart_url(); ?>">Cart</a></li>
					<li class="menu-item menu-item-type-post_type"><a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id')); ?>">My Account</a></li>		
					<li class="menu-item menu-item-type-post_type"><a href="<?php echo get_permalink( woocommerce_get_page_id('shop')) ?>">Shop</a></li>		
					<li class="menu-item menu-item-type-post_type"><a href="<?php echo get_permalink( woocommerce_get_page_id('pay')) ?>">Pay Account</a></li>


				<?php endif; ?>
				
			</ul>

		</div>
	</div>

<?php endif; ?>

<?php if ( get_option('ony-sidebar-position') == "left" || get_option('ony-sidebar-position') == "right"){

	get_sidebar();

} ?>	


</body>