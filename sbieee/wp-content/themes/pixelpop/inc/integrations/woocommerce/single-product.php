<?php
/**
 * WooCommerce Single Product Fuctions for PixelPop
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
function pixelpop_woocommerce_single_product_layout() {

	if ( is_product() ) {
		//Remove Default Content Width Wrapper
		remove_action( 'pixelpop_before_main_content','PixelPop\pixelpop_content_width_wrapper_before', 10 );
		remove_action( 'pixelpop_after_main_content','PixelPop\pixelpop_content_width_wrapper_after', 10 );

		remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
		remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );
		remove_action( 'woocommerce_before_single_product', 'woocommerce_output_all_notices', 10 );

		remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );
		remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
		remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
		remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10 );
		remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 20 );

		// First Section Start.
		add_action( 'woocommerce_before_single_product_summary', 'PixelPop\pixelpop_single_product_first_section_before', 10 );
			// Before Product Summary.
			add_action( 'woocommerce_before_single_product_summary', 'woocommerce_breadcrumb', 20 );
			add_action( 'woocommerce_before_single_product_summary', 'woocommerce_output_all_notices', 30 );

			// Summary Wrapper Start.
			add_action( 'woocommerce_before_single_product_summary', 'PixelPop\pixelpop_woocommerce_single_product_summary_wrapper_before', 40 );
				add_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 55 );
				add_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 50 );
				add_action( 'woocommerce_before_single_product_summary', 'PixelPop\pixelpop_single_product_mobile_gallery', 50 );
				// Summary Details Wrapper Start.
				add_action( 'woocommerce_single_product_summary', 'PixelPop\pixelpop_woocommerce_single_product_summary_details_wrapper_before', 1 );
				// Summary Details Wrapper End.
				add_action( 'woocommerce_single_product_summary', 'PixelPop\pixelpop_woocommerce_single_product_summary_details_wrapper_after', 100 );
			// Summary Wrapper End.
			add_action( 'woocommerce_after_single_product_summary', 'PixelPop\pixelpop_woocommerce_single_product_summary_wrapper_after', 10 );

		// First Section End.
		add_action( 'woocommerce_after_single_product_summary', 'PixelPop\pixelpop_single_product_first_section_after', 20 );

		// Second Section Start.
		add_action( 'woocommerce_after_single_product_summary', 'PixelPop\pixelpop_single_product_second_section_before', 30 );
			add_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 40 );
		// Second Section End.
		add_action( 'woocommerce_after_single_product_summary', 'PixelPop\pixelpop_single_product_second_section_after', 50 );

		// Third Section Start.
		add_action( 'woocommerce_after_single_product_summary', 'PixelPop\pixelpop_single_product_third_section_before', 60 );
			add_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 70 );
			add_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 80 );
		// Third Section Start.
		add_action( 'woocommerce_after_single_product_summary', 'PixelPop\pixelpop_single_product_third_section_after', 90 );



		// Reviews
		remove_action( 'woocommerce_review_before', 'woocommerce_review_display_gravatar', 10 );
		add_action( 'woocommerce_review_before_comment_meta', 'woocommerce_review_display_gravatar', 5 );

	}

}
add_action( 'wp', 'PixelPop\pixelpop_woocommerce_single_product_layout' );

/**
 * Shop Loop Item Footer Wrap Before Content.
 *
 * Open the wrapping divs.
 *
 * @return void
 */
function pixelpop_single_product_first_section_before() {
	?>
		<div class="ppop-single-product-first-section z-pad-t-40 z-pad-b-40 z-lm-pad-0 z-lm-mar-0 z-lm-bg-layout-primary">
			<div class="col-full">
	<?php
}

/**
 * Shop Loop Item Footer Wrap Before Content.
 *
 * Open the wrapping divs.
 *
 * @return void
 */
function pixelpop_single_product_first_section_after() {
	?>
			</div><!-- .col-full -->
		</div><!-- .ppop-single-product-first-section -->
	<?php
}

/**
 * Shop Loop Item Footer Wrap Before Content.
 *
 * Open the wrapping divs.
 *
 * @return void
 */
function pixelpop_single_product_second_section_before() {
	?>
		<div class="ppop-single-product-second-section z-pad-t-50 z-pad-b-50">
			<div class="col-full">
	<?php
}

/**
 * Shop Loop Item Footer Wrap Before Content.
 *
 * Open the wrapping divs.
 *
 * @return void
 */
function pixelpop_single_product_second_section_after() {
	?>
			</div><!-- .col-full -->
		</div><!-- .ppop-single-product-second-section -->
	<?php
}

/**
 * Shop Loop Item Footer Wrap Before Content.
 *
 * Open the wrapping divs.
 *
 * @return void
 */
function pixelpop_single_product_third_section_before() {
	?>
		<div class="ppop-single-product-third-section z-pad-0">
			<div class="col-full">
	<?php
}

/**
 * Shop Loop Item Footer Wrap Before Content.
 *
 * Open the wrapping divs.
 *
 * @return void
 */
function pixelpop_single_product_third_section_after() {
	?>
			</div><!-- .col-full -->
		</div><!-- .ppop-single-product-second-section -->
	<?php
}

/**
 * Shop Loop Item Footer Wrap Before Content.
 *
 * Open the wrapping divs.
 *
 * @return void
 */
function pixelpop_woocommerce_single_product_summary_wrapper_before() {
	?>
		<div class="ppop-single-product-summary-wrap z-position-relative z-mar-b-20 z-lm-mar-0">
			<div class="ppop-single-product-summary z-d-flex z-flex-wrap z-justify-content-between z-lm-flex-column">
	<?php
}

/**
 * Shop Loop Item Footer Wrap Before Content.
 *
 * Open the wrapping divs.
 *
 * @return void
 */
function pixelpop_woocommerce_single_product_summary_wrapper_after() {
	?>
			</div><!-- ppop-single-product-summary -->
		</div><!-- ppop-single-product-summary-wrap -->
	<?php
}

/**
 * Shop Loop Item Footer Wrap Before Content.
 *
 * Open the wrapping divs.
 *
 * @return void
 */
function pixelpop_woocommerce_single_product_summary_details_wrapper_before() {
	?>
		<div class="ppop-single-product-summary-details-wrap">
	<?php
}

/**
 * Shop Loop Item Footer Wrap Before Content.
 *
 * Open the wrapping divs.
 *
 * @return void
 */
function pixelpop_woocommerce_single_product_summary_details_wrapper_after() {
	?>
		</div><!-- ppop-single-product-summary-details-wrap -->
	<?php
}

/**
 * Single Product Mobile Image Gallery.
 *
 * Open the wrapping divs.
 *
 * @return void
 */
function pixelpop_single_product_mobile_gallery() {
	if ( ! function_exists( 'wc_get_gallery_image_html' ) ) {
		return;
	}

	global $product;

	$columns           = apply_filters( 'woocommerce_product_thumbnails_columns', 4 );
	$post_thumbnail_id = $product->get_image_id();
	$wrapper_classes   = apply_filters(
		'woocommerce_single_product_image_gallery_classes',
		array(
			'woocommerce-product-gallery',
			'woocommerce-product-gallery--' . ( $product->get_image_id() ? 'with-images' : 'without-images' ),
			'woocommerce-product-gallery--columns-' . absint( $columns ),
			'images',
		)
	);
	?>
	<div class="ppop-mobile-gallery <?php echo esc_attr( implode( ' ', array_map( 'sanitize_html_class', $wrapper_classes ) ) ); ?>" data-columns="<?php echo esc_attr( $columns ); ?>" style="opacity: 0; transition: opacity .25s ease-in-out;">
		<figure class="woocommerce-product-gallery__wrapper z-mar-0">
			<?php
			if ( $product->get_image_id() ) {
				$html = wc_get_gallery_image_html( $post_thumbnail_id, true );
			} else {
				$html  = '<div class="woocommerce-product-gallery__image--placeholder">';
				$html .= sprintf( '<img src="%s" alt="%s" class="wp-post-image" />', esc_url( wc_placeholder_img_src( 'woocommerce_single' ) ), esc_html__( 'Awaiting product image', 'pixelpop' ) );
				$html .= '</div>';
			}

			echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', $html, $post_thumbnail_id ); // phpcs:disable WordPress.XSS.EscapeOutput.OutputNotEscaped

			do_action( 'woocommerce_product_thumbnails' );
			?>
		</figure>
	</div>
	<?php
}

/**
 * Filer WooCommerce Flexslider options - Add Navigation Arrows
 */
function ppop_update_woo_flexslider_options( $options ) {

	$options['directionNav']	= true;
	$options['animation']		= 'slide';
	$options['smoothHeight']	= true;
	$options['controlNav']		= 'thumbnails';
	$options['slideshow']		= true;
	$options['animationLoop']	= true;
	$options['allowOneSlide']	= true;

	return $options;
}
add_filter( 'woocommerce_single_product_carousel_options', 'PixelPop\ppop_update_woo_flexslider_options' );


