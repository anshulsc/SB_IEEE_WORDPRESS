<?php
/**
 * WooCommerce Product Archive Fuctions for PixelPop
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
 * Product Archive Layout.
 *
 * @return void
 */
function pixelpop_woocommerce_product_archive_layout() {

	remove_action( 'woocommerce_before_shop_loop', 'woocommerce_output_all_notices', 10 );
	remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );

	add_action( 'woocommerce_before_shop_loop', 'PixelPop\pixelpop_woocommerce_shop_loop_before_open', 10 );
	add_action( 'woocommerce_before_shop_loop', 'PixelPop\pixelpop_woocommerce_product_archive_filter', 20 );
	add_action( 'woocommerce_before_shop_loop', 'PixelPop\pixelpop_woocommerce_shop_loop_before_close', 40 );

	remove_action( 'woocommerce_after_shop_loop', 'woocommerce_pagination', 10 );
	add_action( 'woocommerce_after_shop_loop', 'woocommerce_result_count', 10 );
	add_action( 'woocommerce_after_shop_loop', 'PixelPop\pixelpop_blog_home_number_pagination', 20 );

	remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
	remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );

	add_action( 'woocommerce_before_shop_loop_item', 'PixelPop\pixelpop_woo_loop_product_img_link_open', 10 );
	add_action( 'woocommerce_before_shop_loop_item_title', 'PixelPop\pixelpop_woo_loop_product_img_link_close', 20 );

	remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
	add_action( 'woocommerce_before_shop_loop_item_title', 'PixelPop\pixelpop_woocommerce_shop_loop_item_addtocart_before', 30 );
	add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_add_to_cart', 30 );
	add_action( 'woocommerce_before_shop_loop_item_title', 'PixelPop\pixelpop_woocommerce_shop_loop_item_addtocart_after', 30 );

	add_action( 'woocommerce_before_shop_loop_item_title', 'PixelPop\pixelpop_woo_loop_product_content_link_open', 40 );
	add_action( 'woocommerce_after_shop_loop_item_title', 'PixelPop\pixelpop_woo_loop_product_content_link_close', 20 );

}
add_action( 'wp', 'PixelPop\pixelpop_woocommerce_product_archive_layout' );

/**
 * Shop loop before content (Product Filter)
 *
 * Open the wrapping divs.
 *
 * @return void
 */
function pixelpop_woocommerce_shop_loop_before_open() {
	?>
		<div class="ppop-product-loop-filter-content">
	<?php
}


/**
 * Woocommerce Product Archive Filter
 *
 * @return void
 */
function pixelpop_woocommerce_product_archive_filter() {
	?>
		<div class="pixelpop-woo-product-filter">
			<div class="ppop-product-filter-toggle">
				<i class="ppop-icon ppop-icon-filter"></i>
				<span><?php esc_html_e( 'Filter', 'pixelpop' ); ?></span>
			</div>
		</div>

		<div class="pixelpop-woo-product-filter-content">
			<div class="ppop-filter-close">
				<span class="woo-product-filter-close">⤫</span>
			</div>
			<?php dynamic_sidebar( 'ppop-woo-product-filter' ); ?>
		</div>
	<?php
}

/**
 * Shop loop before content (Product Filter)
 *
 * Close the wrapping divs.
 *
 * @return void
 */
function pixelpop_woocommerce_shop_loop_before_close() {
	?>
		</div>
	<?php
}

/**
 * Insert the opening anchor tag for products in the loop.
 */
function pixelpop_woo_loop_product_img_link_open() {
	global $product;

	$link = apply_filters( 'pixelpop_woocommerce_loop_product_img_link', get_the_permalink(), $product );

	echo '<a href="' . esc_url( $link ) . '" class="ppop-woo-product-loop-img-link">';
}

/**
 * Insert the closing anchor tag for products in the loop.
 */
function pixelpop_woo_loop_product_img_link_close() {
	echo '</a>';
}

/**
 * Insert the opening anchor tag for products in the loop.
 */
function pixelpop_woo_loop_product_content_link_open() {
	global $product;

	$link = apply_filters( 'pixelpop_woocommerce_loop_product_content_link', get_the_permalink(), $product );

	echo '<a href="' . esc_url( $link ) . '" class="ppop-woo-product-loop-content-link z-text-center z-pad-15 z-sm-pad-10">';
}

/**
 * Insert the closing anchor tag for products in the loop.
 */
function pixelpop_woo_loop_product_content_link_close() {
	echo '</a>';
}

/**
 * Shop Loop Item Footer Wrap Before Content.
 *
 * Open the wrapping divs.
 *
 * @return void
 */
function pixelpop_woocommerce_shop_loop_item_addtocart_before() {
	?>
		<div class="ppop-product-loop-addtocart">
	<?php
}

/**
 * Shop Loop Item Footer Wrap After Content.
 *
 * Close the wrapping divs.
 *
 * @return void
 */
function pixelpop_woocommerce_shop_loop_item_addtocart_after() {
	?>
		</div><!-- ppop-product-loop-addtocart -->
	<?php
}
