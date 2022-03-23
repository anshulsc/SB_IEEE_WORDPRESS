<?php
/**
 * WooCommerce My Accout Fuctions for PixelPop
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
function pixelpop_woocommerce_myaccount_layout() {
	if ( is_account_page() ) {

		remove_action( 'woocommerce_account_navigation', 'woocommerce_account_navigation' );

		add_action( 'pixelpop_content_start', 'PixelPop\pixelpop_myaccount_wrapper_before', 1 );

			add_action( 'pixelpop_content_start', 'PixelPop\pixelpop_myaccount_secondary_wrap_before', 2 );
				add_action( 'pixelpop_content_start', 'PixelPop\pixelpop_myaccount_navigation', 3 );
				add_action( 'pixelpop_myaccount_before_navigation', 'PixelPop\pixelpop_myaccount_navigation_hamburger', 10 );

			add_action( 'pixelpop_content_start', 'PixelPop\pixelpop_myaccount_secondary_wrap_after', 4 );

			add_action( 'pixelpop_content_start', 'PixelPop\pixelpop_myaccount_primary_wrap_before', 5 );
			add_action( 'pixelpop_after_site', 'PixelPop\pixelpop_myaccount_primary_wrap_after', 90 );

		add_action( 'pixelpop_after_site', 'PixelPop\pixelpop_myaccount_wrapper_after', 100 );

	}

}
add_action( 'wp', 'PixelPop\pixelpop_woocommerce_myaccount_layout' );

/**
 * My Account Wrap
 *
 * Open the wrapping divs.
 *
 * @return void
 */
function pixelpop_myaccount_wrapper_before() {
	?>
		<div id="ppop-myaccount-wrap" class="ppop-woodash-off">
		<script type="text/javascript">
			// function to set a given theme/color-scheme
			function setWooDash(WooDashStatus) {
				localStorage.setItem('WooDash', WooDashStatus);
				document.getElementById("ppop-myaccount-wrap").className = WooDashStatus;
			}

			// function to toggle between light and dark theme
			function toggleWooDash() {
				if (localStorage.getItem('WooDash') === 'ppop-woodash-off') {
					setWooDash('ppop-woodash-on');
				} else {
					setWooDash('ppop-woodash-off');
				}
			}

			// Immediately invoked function to set the theme on initial load
			(function () {
				if (localStorage.getItem('WooDash') === 'ppop-woodash-on') {
					setWooDash('ppop-woodash-on');
				} else {
					setWooDash('ppop-woodash-off');

				}
			})();
		</script>
	<?php
}

/**
 * Cart Wrap
 *
 * Close the wrapping divs.
 *
 * @return void
 */
function pixelpop_myaccount_wrapper_after() {
	?>
		</div><!-- #ppop-myaccount-wrap -->
	<?php
}

/**
 * Cart Primary Wrap
 *
 * Open the wrapping divs.
 *
 * @return void
 */
function pixelpop_myaccount_primary_wrap_before() {
	?>
		<div class="ppop-myaccount-primary">
	<?php
}

/**
 * Cart Primary Wrap
 *
 * Close the wrapping divs.
 *
 * @return void
 */
function pixelpop_myaccount_primary_wrap_after() {
	?>
		</div><!-- .ppop-myaccount-primary -->
	<?php
}

/**
 * Cart Secondary Wrap
 *
 * Open the wrapping divs.
 *
 * @return void
 */
function pixelpop_myaccount_secondary_wrap_before() {
	?>
		<div class="ppop-myaccount-secondary">
			<div class="ppop-myaccount-secondary-content">
	<?php
}

/**
 * Cart Secondary Wrap
 *
 * Close the wrapping divs.
 *
 * @return void
 */
function pixelpop_myaccount_secondary_wrap_after() {
	?>
			</div><!-- .ppop-myaccount-secondary-content -->
		</div><!-- .ppop-myaccount-secondary -->
	<?php
}

/**
 * My Account Navigation
 *
 * @return void
 */
function pixelpop_myaccount_navigation() {
	do_action( 'pixelpop_myaccount_before_navigation' );
	wc_get_template( 'myaccount/navigation.php' );
	do_action( 'pixelpop_myaccount_after_navigation' );
}

/**
 * My Account Navigation Hamburger
 *
 * @return void
 */
function pixelpop_myaccount_navigation_hamburger() {
	?>
	<div class="ppop-account-nav-hamburger">
		<button onclick="toggleWooDash()" class="ppop-hamburger-toggle ppop-woo-account-menu-toggle anm1">
			<span><?php esc_html_e( 'toggle menu', 'pixelpop' ); ?></span>
		</button>
	</div>
	<?php
}
