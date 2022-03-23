<?php
/**
 * WooCommerce Cart Fuctions for PixelPop
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
function pixelpop_woocommerce_cart_layout() {

	if ( is_cart() ) {
		remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cart_totals', 10 );

		add_action( 'woocommerce_before_cart', 'PixelPop\pixelpop_cart_wrapper_before', 10 );

			add_action( 'woocommerce_before_cart', 'PixelPop\pixelpop_cart_primary_wrap_before', 20 );
			add_action( 'woocommerce_after_cart', 'PixelPop\pixelpop_cart_primary_wrap_after', 10 );

			add_action( 'woocommerce_after_cart', 'PixelPop\pixelpop_cart_secondary_wrap_before', 20 );
				add_action( 'woocommerce_after_cart', 'woocommerce_cart_totals', 30 );
				add_action( 'woocommerce_proceed_to_checkout', 'PixelPop\pixelpop_cart_coupon', 5 );
			add_action( 'woocommerce_after_cart', 'PixelPop\pixelpop_cart_secondary_wrap_after', 40 );

		add_action( 'woocommerce_after_cart', 'PixelPop\pixelpop_cart_wrapper_after', 100 );

	}

}
add_action( 'wp', 'PixelPop\pixelpop_woocommerce_cart_layout' );


/**
 * Cart Wrap
 *
 * Open the wrapping divs.
 *
 * @return void
 */
function pixelpop_cart_wrapper_before() {
	?>
		<div class="ppop-cart-wrap z-grid">
	<?php
}

/**
 * Cart Wrap
 *
 * Close the wrapping divs.
 *
 * @return void
 */
function pixelpop_cart_wrapper_after() {
	?>
		</div><!-- .ppop-cart-wrap -->
	<?php
}


/**
 * Cart Primary Wrap
 *
 * Open the wrapping divs.
 *
 * @return void
 */
function pixelpop_cart_primary_wrap_before() {
	?>
		<div class="ppop-cart-primary z-g-col-8 z-lm-g-col-12">
	<?php
}


/**
 * Cart Primary Wrap
 *
 * Close the wrapping divs.
 *
 * @return void
 */
function pixelpop_cart_primary_wrap_after() {
	?>
		</div><!-- .ppop-cart-primary -->
	<?php
}


/**
 * Cart Secondary Wrap
 *
 * Open the wrapping divs.
 *
 * @return void
 */
function pixelpop_cart_secondary_wrap_before() {
	?>
		<div class="ppop-cart-secondary z-g-col-4 z-lm-g-col-12">
			<div class="ppop-cart-secondary-content">
	<?php
}


/**
 * Cart Secondary Wrap
 *
 * Close the wrapping divs.
 *
 * @return void
 */
function pixelpop_cart_secondary_wrap_after() {
	?>
			</div><!-- .ppop-cart-secondary-content -->
		</div><!-- .ppop-cart-secondary -->
	<?php
}

/**
 * Cart Coupon Form
 *
 * @return void
 */
function pixelpop_cart_coupon() {
	if ( wc_coupons_enabled() ) {
		?>
		<div class="coupon clear">
			<form class="ppop-coupon-form z-mar-b-15 z-d-flex" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">
				<input type="text" name="coupon_code" class="input-text" id="coupon_code" value="" placeholder="<?php esc_attr_e( 'Coupon Code', 'pixelpop' ); ?>" />
				<button type="submit" class="button" name="apply_coupon" value="<?php esc_attr_e( 'Apply coupon', 'pixelpop' ); ?>"><?php esc_html_e( 'Apply', 'pixelpop' ); ?></button>
			</form>
			<?php do_action( 'woocommerce_cart_coupon' ); ?>
		</div>
		<?php
	}
}

/**
 * Cart Fragments.
 *
 * Ensure cart contents update when products are added to the cart via AJAX.
 *
 * @param array $fragments Fragments to refresh via AJAX.
 * @return array Fragments to refresh via AJAX.
 */
function pixelpop_woocommerce_cart_link_fragment( $fragments ) {
	ob_start();
	pixelpop_header_icon_menu_cart_link();
	$fragments['a.ppop-header-cart-icon'] = ob_get_clean();

	return $fragments;
}
add_filter( 'woocommerce_add_to_cart_fragments', 'PixelPop\pixelpop_woocommerce_cart_link_fragment' );


/**
 * Cart Link.
 *
 * Displayed a link to the cart including the number of items present and the cart total.
 *
 * @return void
 */
function pixelpop_header_icon_menu_cart_link() {

	?>
	<a class="ppop-header-cart-icon icon-menu-icon z-icon" href="<?php echo esc_url( wc_get_cart_url() ); ?>" >
		<i class="ppop-icon ppop-icon-shopping-bag gg"></i>
		<span class="cart-count z-icon-count <?php if ( WC()->cart->get_cart_contents_count() == 0 ) { echo "hide"; } ?>"><?php echo esc_html( WC()->cart->get_cart_contents_count() ); ?></span>
	</a>
	<?php
}

/**
 * Empty Cart.
 *
 * Display empty cart page.
 *
 * @return void
 */
function pixelpop_add_content_empty_cart() {

	?>
	<div class="ppop-woo-empty-cart-box">
		<div class="empty-cart-box-content">
			<img src="<?php echo esc_url( get_template_directory_uri() . "/assets/images/pixelpop-empty-cart.svg"); ?>">
			<h2>Your cart is empty!</h2>
			<div class="empty-cart-buttons">
				<a class="button" href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>"><?php esc_html_e('Return to shop', 'pixelpop'); ?></a>
				<a class="button border-style" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e('Return to home', 'pixelpop'); ?></a>
			</div>
		</div>
	</div>
	<?php
}
add_action( 'woocommerce_cart_is_empty', 'PixelPop\pixelpop_add_content_empty_cart' );


 

/**
 * Cross sell Columns.
 *
 * @return void
 */
function pixelpop_cross_sells_columns( $columns ) {
return 3;
}
add_filter( 'woocommerce_cross_sells_columns', 'PixelPop\pixelpop_cross_sells_columns' );
