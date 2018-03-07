<?php 

/**
 * Archivo de edicion para el carrito 
*/

if ( ! defined('ABSPATH') ){
  exit;
}



do_action( 'woocommerce_before_cart' );

?> 

<form class="woocomerce-cart-form" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post" >

  <table class="cart-table">
    <thead>
      <tr>
        <th class="cart-table-th product-remove"><i class="fa fa-times"></i></th>
        <th class="cart-table-th product-thumbnail"><?php _e('Image Preview','ony') ?></th>
        <th class="cart-table-th product-name"><?php _e('Product','woocommerce'); ?></th>
        <th class="cart-table-th product-price"><?php _e('Price','woocommerce'); ?></th>
        <th class="cart-table-th product-quantity"><?php _e('Quantity','woocommerce'); ?></th> 
        <th class="cart-table-th product-subtotal"><?php _e('Total','woocommerce'); ?></th>
      </tr>
    </thead>
    <tbody>
      <?php 
      do_action('woocommerce_before_cart_contents'); 
      $count = 1;
      foreach( WC()->cart->get_cart() as $cart_ik => $cart_i ){

        $for_product  = apply_filters( 'woocommerce_cart_item_product' , $cart_i['data'] , $cart_i , $cart_ik );
        
        $product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_i['product_id'],$cart_i, $cart_ik );

        if( $for_product && $for_product->exists() && apply_filters('woocommerce_cart_item_visible' , true, $cart_i, $cart_ik ) ){

          $product_link = apply_filters( 'woocommerce_cart_item_permalink', $for_product->is_visible()? $for_product->get_permalink( $cart_i) : '',$cart_i, $cart_ik );
          if ( $count == 1){
            $class_tr = "tr1";
            $count++;
          }else if( $count == 2){
            $class_tr = "tr2";
            $count =1;
          }
          ?>
          
          <tr class="woocommerce-cart-form__cart-item <?php esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_i, $cart_ik )); echo ' ' . $class_tr; ?>" >

            <td class="product-remove">
            <?php 
            echo apply_filters('woocommerce_cart_item_remove_link',sprintf("<a href='%s' class='remove-item' arial-label='%s' data-product_id='%s' data-product_sku='%s'><i class='fa fa-times'></i></a> ", 
            esc_url( WC()->cart->get_remove_url( $cart_ik) ),
            esc_attr( __('Remove this item','woocommerce') ),
            esc_attr( $product_id ),
            esc_attr( $for_product->get_sku() )
            ) //Final sprinf
            , $cart_ik ); //Final apply_filters
             ?>
            </td>
            <td class="product-image" data-title="<?php esc_attr_e('Image','woocommerce') ?>">
              <?php 
              if( ! $product_link ){
                echo apply_filters('woocommerce_cart_item_thumbnail',$for_product->get_image(),$cart_i,$cart_ik);
              }else{
                echo apply_filters('woocommerce_cart_item_thumbnail',sprintf("<a href='%s'>%s</a>",
                $product_link,
                $for_product->get_image()
                ),//Final sprinf
                $cart_i,$cart_ik
              );
              }              

              if ( $for_product->backorders_require_notification() && $for_product->is_on_backorder( $cart_i['quantity'] )){
                echo '<p class="backorder_notification">' . esc_html__('Available on backorder','woocommerce'). '</p>';
              }

               ?>
            </td>
            <td class="product-name" data-title="<?php esc_attr_e('Product','woocommerce'); ?>">
              <?php if( ! $product_link ){

                echo apply_filters('woocommerce_cart_item_name',$for_product->get_name(),$cart_i,$cart_ik);
                
              }else{
                echo apply_filters('woocommerce_cart_item_name', sprintf("<a href='%s'>%s</a>",
                esc_url( $product_link ),
                $for_product->get_name()), //Final sprinf
                $cart_i,$cart_ik );
              }
              echo WC()->cart->get_item_data( $cart_i );
              ?>   
                         
            </td>
            <td class="product-price" data-title="<?php esc_attr_e('Price','woocommerce'); ?>">

            <?php 
            
            echo apply_filters('woocommerce_cart_item_price', WC()->cart->get_product_price( $for_product ), $cart_i, $cart_ik );

             ?>                                          
            </td>
            <td class="product-quantity" data-title="<?php esc_attr_e('Price','woocommerce'); ?>">
              <?php 

              if ( $for_product->is_sold_individually() ){
                $product_quantity = sprintf('1 <input type="hidden" name="cart[%s][qty]" value="1"', $cart_ik);
              }else{
                $product_quantity = woocommerce_quantity_input( array(
                  'input_name'  => "cart[{$cart_ik}][qty]",
                  'input_value' => $cart_i['quantity'],
                  'max_value'   => $for_product->get_max_purchase_quantity(),
                  'min_value'   => '0',
                ),$for_product,false);
              }

              echo apply_filters('woocommerce_cart_item_cuantity',$product_quantity,$cart_ik,$cart_i);
              
               ?>
              
            </td>
            <td class="product-subtotal" data-title="<?php esc_attr_e( 'Total', 'woocommerce' ); ?>">
							<?php
								echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $for_product, $cart_i['quantity'] ), $cart_i, $cart_ik );
							?>
						</td>
          </tr>
          
          <?php
        }// Final if principal
      }//Final de foreach
      
      do_action( 'woocommerce_cart_contents' );
      ?>
      	<tr>
				<td colspan="6" class="actions">

					<?php if ( wc_coupons_enabled() ) { ?>
						<div class="cart-up">
							<div class="cart-coupon">
                <label for="coupon_code"><?php _e( 'Coupon:', 'woocommerce' ); ?></label> <input type="text" name="coupon_code" class="input-text" id="coupon_code" value="" placeholder="<?php esc_attr_e( 'Coupon code', 'woocommerce' ); ?>" /> <input type="submit" class="button" name="apply_coupon" value="<?php esc_attr_e( 'Apply coupon', 'woocommerce' ); ?>" />
              </div>
							<div class="cart-update-cart">
                <?php do_action( 'woocommerce_cart_coupon' ); ?>
                <input type="submit" class="button" name="update_cart" value="<?php esc_attr_e( 'Update cart', 'woocommerce' ); ?>" />
                <?php wp_nonce_field( 'woocommerce-cart' ); ?>
              </div>
						</div>
            <?php } ?>
            
          <?php do_action( 'woocommerce_cart_actions' ); ?>
          					
				</td>
			</tr>

			<?php do_action( 'woocommerce_after_cart_contents' ); ?>
      

    </tbody>
  </table>
  <?php do_action('woocommerce_after_cart_table'); ?>
</form>
<div class="cart-collaterals">
  <?php 
    remove_action( 'woocommerce_cart_collaterals','woocommerce_cross_sell_display' );
    add_action('woocommerce_cart_collaterals', 'woocommerce_cart_totals');
    do_action('woocommerce_cart_collaterals');
  ?>
</div>
<div class="cart-cross">
  <?php    
   remove_action('woocommerce_cart_collaterals' , 'woocommerce_cart_totals');
   add_action( 'woocommerce_cart_collaterals' , 'woocommerce_cross_sell_display');
   do_action('woocommerce_cart_collaterals');
  ?>
</div>

<?php // do_action( 'woocommerce_after_cart' ); ?>