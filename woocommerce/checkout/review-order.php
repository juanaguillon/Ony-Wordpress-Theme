<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<div class="shop_table woocommerce-checkout-review-order-table">
	<div>
		<div>
			<div class="ahead-product-name ht-title"><?php _e( 'List product', 'ony' ); ?></div>			
		</div>
	</div>
	<div class="loop_list_products">
		<?php
			do_action( 'woocommerce_review_order_before_cart_contents' );

			foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
				$_product = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );

				if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_checkout_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
					?>
					<div class="<?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item__review', $cart_item, $cart_item_key ) ); ?>">
						<div class="product-name">
							<?php echo apply_filters(
							 'woocommerce_cart_item_name', 
							 $_product->get_name(), 
							 $cart_item, $cart_item_key ) . '&nbsp;'; ?><i class="fa fa-angle-down"></i></div>
						<div class="show_information_order_review">
							<div class="cart_item_quantity">
								<div class="cart_item_attr">
									<span><?php _e('Quantity','ony'); ?></span>
								</div>
								<div class="cart_item_val">
									<?php 
									echo apply_filters( 'woocommerce_checkout_cart_item_quantity', 
									sprintf( '&times; %s', $cart_item['quantity'] ), 
									$cart_item, $cart_item_key ); 
									 ?>									
								</div>
							</div>
							<?php 
							 if( $_product->is_type( 'variation')):
							 	?>
								<div class="cart_item_data">
									<div class="cart_item_attr">
										<span><?php _e('More attributes','ony') ?></span>
									</div>
									<div class="cart_item_val">
										<?php echo WC()->cart->get_item_data( $cart_item ); ?>									
									</div>
								</div>
							 	<?php
							 endif;
							?>							
							<div class="cart_item_total">
								<div class="cart_item_attr">
									<span><?php _e('Price','ony'); ?></span>
								</div>
								<div class="cart_item_val">
									<?php
									echo apply_filters( 'woocommerce_cart_item_subtotal', 
									WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), 
									$cart_item, 
									$cart_item_key ); 								
									?>									
								</div>								
							</div>
						</div>						
						
					</div>
					<?php
				}
			}

			do_action( 'woocommerce_review_order_after_cart_contents' );
		?>
	</div>
	<div class="order-review-total-count">
		<h3 class="ht-title">
			<?php _e('Cart Totals','ony'); ?>
		</h3>
		<div class="cart-subtotal">
			<div class="cart-preval"><?php _e( 'Subtotal', 'woocommerce' ); ?></div>
			<div class="cart-eval"><?php wc_cart_totals_subtotal_html(); ?></div>
		</div>

		<?php foreach ( WC()->cart->get_coupons() as $code => $coupon ) : ?>
			<div class="cart-discount coupon-<?php echo esc_attr( sanitize_title( $code ) ); ?>">
				<div><?php wc_cart_totals_coupon_label( $coupon ); ?></div>
				<div><?php wc_cart_totals_coupon_html( $coupon ); ?></div>
			</div>
		<?php endforeach; ?>

		<?php if ( WC()->cart->needs_shipping() && WC()->cart->show_shipping() ) : ?>


		<div class="total-shipping">
			<?php do_action( 'woocommerce_review_order_before_shipping' ); ?>
			<div class="cart-total-shipping"><?php wc_cart_totals_shipping_html(); ?></div>
			<?php do_action( 'woocommerce_review_order_after_shipping' ); ?>
		</div>	


		<?php endif; ?>

		<?php foreach ( WC()->cart->get_fees() as $fee ) : ?>
			<div class="fee">
				<div><?php echo esc_html( $fee->name ); ?></div>
				<div><?php wc_cart_totals_fee_html( $fee ); ?></div>
			</div>
		<?php endforeach; ?>

		<?php if ( wc_tax_enabled() && 'excl' === WC()->cart->tax_display_cart ) : ?>
			<?php if ( 'itemized' === get_option( 'woocommerce_tax_total_display' ) ) : ?>
				<?php foreach ( WC()->cart->get_tax_totals() as $code => $tax ) : ?>
					<div class="tax-rate tax-rate-<?php echo sanitize_title( $code ); ?>">
						<div><?php echo esc_html( $tax->label ); ?></div>
						<div><?php echo wp_kses_post( $tax->formatted_amount ); ?></div>
					</div>
				<?php endforeach; ?>
			<?php else : ?>
				<div class="tax-total">
					<div><?php echo esc_html( WC()->countries->tax_or_vat() ); ?></div>
					<div><?php wc_cart_totals_taxes_total_html(); ?></div>
				</div>
			<?php endif; ?>
		<?php endif; ?>

		<?php do_action( 'woocommerce_review_order_before_order_total' ); ?>

		<div class="order-total">
			<div class="cart-preval"><?php _e( 'Total', 'woocommerce' ); ?></div>
			<div class="cart-eval"><?php wc_cart_totals_order_total_html(); ?></div>
		</div>

		<?php do_action( 'woocommerce_review_order_after_order_total' ); ?>

	</div>
</div>
