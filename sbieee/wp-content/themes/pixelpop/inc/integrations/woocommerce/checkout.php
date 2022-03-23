<?php
/**
 * WooCommerce Checkout Fuctions for PixelPop
 *
 * @link https://woocommerce.com/
 *
 * @package     pixelpop
 * @author      PixelPop
 * @copyright   Copyright (c), PixelPop
 * @since       PixelPop 1.0.0
 */

namespace PixelPop;

use function PixelPop\pixelpop;
use function add_action;
use function add_filter;

defined( 'ABSPATH' ) || exit;

/**
 * Single Product Layout.
 *
 * @return void
 */
function pixelpop_woocommerce_checkout_layout() {

	if ( is_checkout() ) {
		// remove_action( 'woocommerce_before_checkout_form', 'woocommerce_checkout_login_form', 10 );
		remove_action( 'woocommerce_before_checkout_form', 'woocommerce_checkout_coupon_form', 10 );

		// remove_action( 'woocommerce_checkout_order_review', 'woocommerce_order_review', 10 );
		// remove_action( 'woocommerce_checkout_order_review', 'woocommerce_checkout_payment', 20 );

		add_action( 'woocommerce_before_checkout_form', 'PixelPop\pixelpop_checkout_coupon', 10 );


		add_action( 'woocommerce_before_checkout_form', 'PixelPop\pixelpop_checkout_wrapper_before', 10 );

			// add_action( 'woocommerce_checkout_before_customer_details', 'PixelPop\pixelpop_checkout_primary_wrap_before', 10 );
				// add_action( 'woocommerce_before_checkout_form', 'woocommerce_checkout_login_form', 20 );
			// add_action( 'woocommerce_checkout_after_customer_details', 'PixelPop\pixelpop_checkout_primary_wrap_after', 100 );

			// add_action( 'woocommerce_checkout_before_order_review', 'PixelPop\pixelpop_checkout_secondary_wrap_before', 10 );
				// add_action( 'woocommerce_checkout_order_review', 'woocommerce_order_review', 10 );
				add_action( 'woocommerce_checkout_order_review', 'PixelPop\pixelpop_checkout_coupon_link', 15 );
				// add_action( 'woocommerce_checkout_order_review', 'woocommerce_checkout_payment', 20 );
			// add_action( 'woocommerce_after_cart', 'PixelPop\pixelpop_checkout_secondary_wrap_after', 40 );

		add_action( 'woocommerce_after_checkout_form', 'PixelPop\pixelpop_checkout_wrapper_after', 100 );

	}

}
add_action( 'wp', 'PixelPop\pixelpop_woocommerce_checkout_layout' );


/**
 * Checkout Wrap
 *
 * Open the wrapping divs.
 *
 * @return void
 */
function pixelpop_checkout_wrapper_before() {
	?>
		<div class="ppop-checkout-wrap">
	<?php
}

/**
 * Checkout Wrap
 *
 * Close the wrapping divs.
 *
 * @return void
 */
function pixelpop_checkout_wrapper_after() {
	?>
		</div><!-- .ppop-checkout-wrap -->
	<?php
}

/**
 * Checkout Coupon Form
 *
 * @return void
 */
function pixelpop_checkout_coupon() {

	if ( wc_coupons_enabled() ) {

		?>

		<div class="pixelpop-checkout-coupon-wrap">

			<form class="pixelpop-form-coupon z-layout-box z-border-0 z-position-relative z-pad-20" method="post" >

				<i class="ppop-icon ppop-icon-x pixelpop-form-coupon-close"></i>

				<h3 class="z-pad-0"><?php esc_html_e( 'Apply Coupon', 'pixelpop' ); ?></h3>

				<p><?php esc_html_e( 'If you have a coupon code, please apply it below.', 'pixelpop' ); ?></p>

				<div class="pixelpop-form-content z-d-flex">
					<input type="text" name="coupon_code" class="input-text" placeholder="<?php esc_attr_e( 'Coupon code', 'pixelpop' ); ?>" id="coupon_code" value="" />
					<button type="submit" class="button" name="apply_coupon" value="<?php esc_attr_e( 'Apply coupon', 'pixelpop' ); ?>">
						<?php esc_attr_e( 'Apply', 'pixelpop' ); ?>
					</button>

				</div>
			</form>

		</div>

		<?php
	}
}

/**
 * Checkout Coupon Toggle Link
 *
 * @return void
 */
function pixelpop_checkout_coupon_link() {

	if ( wc_coupons_enabled() ) {

		?>

		<div class="pixelpop-form-coupon-link z-mar-b-15 z-pad-15 z-border-b">
			<span class="pixelpop-form-coupon-toggle z-hov-shadow-s z-d-block z-layout-box z-text-primary z-cursor-pointer z-fw-600 z-pad-10 z-pad-l-45 z-position-relative">
				<i class="ppop-icon ppop-icon-tag"></i>
				<?php esc_html_e( 'Apply Coupon', 'pixelpop' ); ?>
			</span>
		</div>

		<?php
	}
}

/**
 * Checkout Cart Item
 *
 * @return void
 */
function pixelpop_checkout_cart_items() {
	?>
	<div class="ppop-checkout-cart-items z-mar-15 z-mar-t-0 z-layout-box">
		<table class="ppop-checkout-cart-items-table z-mar-0">
			<thead>
				<tr>
					<th class="product-name"><?php esc_html_e( 'Product', 'pixelpop' ); ?></th>
					<th class="product-total"><?php esc_html_e( 'Subtotal', 'pixelpop' ); ?></th>
				</tr>
			</thead>
			<tbody>
				<?php
				do_action( 'woocommerce_review_order_before_cart_contents' );

				foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
					$_product = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );

					if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_checkout_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
						?>
						<tr class="<?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">
							<td class="product-name">
								<?php echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) ) . '&nbsp;'; ?>
								<?php echo apply_filters( 'woocommerce_checkout_cart_item_quantity', ' <strong class="product-quantity">' . sprintf( '&times;&nbsp;%s', $cart_item['quantity'] ) . '</strong>', $cart_item, $cart_item_key ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
								<?php echo wc_get_formatted_cart_item_data( $cart_item ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
							</td>
							<td class="product-total">
								<?php echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
							</td>
						</tr>
						<?php
					}
				}

				do_action( 'woocommerce_review_order_after_cart_contents' );
				?>
			</tbody>
		</table>
	</div>
	<?php
}
