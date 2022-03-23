<?php
/**
 * WooCommerce Compatibility File for PixelPop
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
 * WooCommerce setup function.
 *
 * @link https://docs.woocommerce.com/document/third-party-custom-theme-compatibility/
 * @link https://github.com/woocommerce/woocommerce/wiki/Enabling-product-gallery-features-(zoom,-swipe,-lightbox)
 * @link https://github.com/woocommerce/woocommerce/wiki/Declaring-WooCommerce-support-in-themes
 *
 * @return void
 */
function pixelpop_woocommerce_setup() {
	add_theme_support(
		'woocommerce',
		array(
			'thumbnail_image_width'         => 300,
			'single_image_width'            => 1000,
			'gallery_thumbnail_image_width' => 1000,
			'product_grid'                  => array(
				'default_rows'    => 3,
				'min_rows'        => 1,
				'default_columns' => 4,
				'min_columns'     => 1,
				'max_columns'     => 6,
			),
		)
	);
	// add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	// add_theme_support( 'wc-product-gallery-slider' );

}
add_action( 'after_setup_theme', 'PixelPop\pixelpop_woocommerce_setup' );

/**
 * WooCommerce specific scripts & stylesheets.
 *
 * @return void
 */
function pixelpop_woocommerce_scripts() {
	wp_enqueue_style( 'pixelpop-woocommerce-style', get_template_directory_uri() . '/css/woocommerce.css', array(), _S_VERSION );

	wp_enqueue_script('ppop-woocommerce-js', get_template_directory_uri() . '/js/woocommerce.js', array('jquery'), '', true );

	$font_path   = WC()->plugin_url() . '/assets/fonts/';
	$inline_font = '@font-face {
			font-family: "star";
			src: url("' . $font_path . 'star.eot");
			src: url("' . $font_path . 'star.eot?#iefix") format("embedded-opentype"),
				url("' . $font_path . 'star.woff") format("woff"),
				url("' . $font_path . 'star.ttf") format("truetype"),
				url("' . $font_path . 'star.svg#star") format("svg");
			font-weight: normal;
			font-style: normal;
		}';

	wp_add_inline_style( 'pixelpop-woocommerce-style', $inline_font );
}
// add_action( 'wp_enqueue_scripts', 'PixelPop\pixelpop_woocommerce_scripts' );

/**
 * Disable the default WooCommerce stylesheet.
 *
 * Removing the default WooCommerce stylesheet and enqueing your own will
 * protect you during WooCommerce core updates.
 *
 * @link https://docs.woocommerce.com/document/disable-the-default-stylesheet/
 */
add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

/**
 * Add 'woocommerce-active' class to the body tag.
 *
 * @param  array $classes CSS classes applied to the body tag.
 * @return array $classes modified to include 'woocommerce-active' class.
 */
function pixelpop_woocommerce_active_body_class( $classes ) {
	$classes[] = 'woocommerce-active';

	return $classes;
}
add_filter( 'body_class', 'PixelPop\pixelpop_woocommerce_active_body_class' );

/**
 * Related Products Args.
 *
 * @param array $args related products args.
 * @return array $args related products args.
 */
function pixelpop_woocommerce_related_products_args( $args ) {
	$defaults = array(
		'posts_per_page' => 4,
		'columns'        => 4,
	);

	$args = wp_parse_args( $defaults, $args );

	return $args;
}
add_filter( 'woocommerce_output_related_products_args', 'PixelPop\pixelpop_woocommerce_related_products_args' );

/**
 * WooCommerce sidebar
 *
 */
function pixelpop_woocommerce_sidebar() {
	remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );
}
add_action( 'wp', 'PixelPop\pixelpop_woocommerce_sidebar' );

/**
 * Remove default WooCommerce wrapper.
 */
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );

if ( ! function_exists( 'pixelpop_woocommerce_wrapper_before' ) ) {
	/**
	 * Before Content.
	 *
	 * Wraps all WooCommerce content in wrappers which match the theme markup.
	 *
	 * @return void
	 */
	function pixelpop_woocommerce_wrapper_before() {

		pixelpop()->print_styles( 'pixelpop-content' );
		pixelpop()->print_styles( 'pixelpop-woocommerce' );
		?>

		<div class="ppop-content-wrap ppop-woocommerce-wrap">
			<main id="primary" class="site-main full-width">
		<?php
	}
}
add_action( 'woocommerce_before_main_content', 'PixelPop\pixelpop_woocommerce_wrapper_before' );

if ( ! function_exists( 'pixelpop_woocommerce_wrapper_after' ) ) {
	/**
	 * After Content.
	 *
	 * Closes the wrapping divs.
	 *
	 * @return void
	 */
	function pixelpop_woocommerce_wrapper_after() {
		?>
			</main><!-- #main -->
			<?php
				// get_sidebar();
			?>
		</div><!-- ppop-content-wrap -->
		<?php
	}
}
add_action( 'woocommerce_after_main_content', 'PixelPop\pixelpop_woocommerce_wrapper_after' );


if ( ! function_exists( 'pixelpop_woocommerce_breadcrumbs' ) ) {
	/**
	 * Change several of the breadcrumb defaults
	 */
	function pixelpop_woocommerce_breadcrumbs() {
		return array(
			'delimiter'   => '<i class="ppop-icon ppop-icon-chevron-right ppop-woo-breadcrumb-sep"></i>',
			'wrap_before' => '<nav class="woocommerce-breadcrumb z-mar-b-15 z-pad-0 z-fs-5 z-text-def-2" itemprop="breadcrumb">',
			'wrap_after'  => '</nav>',
			'before'      => '',
			'after'       => '',
			'home'        => _x( 'Home', 'breadcrumb', 'pixelpop' ),
		);
	}
}
add_filter( 'woocommerce_breadcrumb_defaults', 'PixelPop\pixelpop_woocommerce_breadcrumbs' );

/**
 * Enqueue sticky script.
 */
function pixelpop_sticky_script() {
	wp_enqueue_script( 'pixelpop-sticky-sidebar', get_template_directory_uri() . '/assets/js/vendor/sticky.js', array(), true );
}
add_action( 'wp_enqueue_scripts', 'PixelPop\pixelpop_sticky_script' );

add_action( 'wp_footer', 'PixelPop\pixelpop_sticky_product_gallery_js', 100 );
function pixelpop_sticky_product_gallery_js() {

	$top_spacing = 30;
	$bottom_spacing = 100;

	if ( is_admin_bar_showing() ) {
		$top_spacing = 62;
	}

	if ( class_exists( 'WooCommerce' ) ) {
		if ( is_product() ) {
			?>
			<script type="text/javascript">
				var sidebar = new StickySidebar('.woocommerce .product .summary', {
					containerSelector: '.ppop-single-product-summary-wrap',
					innerWrapperSelector: '.ppop-single-product-summary-details-wrap',
					resizeSensor: true,
					minWidth: 768,
					topSpacing: <?php echo esc_attr( $top_spacing ); ?>,
					bottomSpacing: <?php echo esc_attr( $bottom_spacing ); ?>
				});
			</script>
			<?php
		}
	}
}

add_action( 'wp_footer', 'PixelPop\pixelpop_sticky_cart_total_js', 100 );
function pixelpop_sticky_cart_total_js() {

	$top_spacing = 30;
	$bottom_spacing = 30;

	if (is_admin_bar_showing()) {
		$top_spacing = 62;
	}

	if ( class_exists( 'WooCommerce' ) ) {
		if (is_cart()) {
			if ( WC()->cart->get_cart_contents_count() != 0 ) {
				?>
				<script type="text/javascript">
				    var sidebar = new StickySidebar('.ppop-cart-secondary', {
				        containerSelector: '.ppop-cart-wrap',
				        innerWrapperSelector: '.ppop-cart-secondary-content',
				        resizeSensor: true,
						minWidth: 768,
				        topSpacing: <?php echo esc_attr( $top_spacing ); ?>,
				        bottomSpacing: <?php echo esc_attr( $bottom_spacing ); ?>
				    });
				</script>
				<?php
			}
		}
	}
}

add_action( 'wp_footer', 'PixelPop\pixelpop_sticky_order_js', 100 );
function pixelpop_sticky_order_js() {

	$top_spacing = 30;
	$bottom_spacing = 30;

	if ( is_admin_bar_showing() ) {
		$top_spacing = 62;
	}

	if ( class_exists( 'WooCommerce' ) ) {
		if ( is_checkout() ) {
			?>
			<script type="text/javascript">
				var sidebar = new StickySidebar('.ppop-checkout-secondary', {
					 containerSelector: '.ppop-checkout-wrap',
					innerWrapperSelector: '.ppop-checkout-secondary-content',
					resizeSensor: true,
					minWidth: 768,
					topSpacing: <?php echo esc_attr( $top_spacing ); ?>,
					bottomSpacing: <?php echo esc_attr( $bottom_spacing ); ?>
				});
			</script>
			<?php
		}
	}
}

/**
 * Register Product Filter widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function ppop_woo_product_filter_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'WooCommerce Product Filter', 'pixelpop' ),
		'id'            => 'ppop-woo-product-filter',
		'description'   => esc_html__( 'This widget displays account menu in header account popup menu. You can add create a menu for account and add it as a widget here.', 'pixelpop' ),
		'before_widget' => '<div div id="%1$s" class="ppop-woo-product-filter-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<span class="ppop-woo-product-filter-title">',
		'after_title'   => '</span>',
	) );
}
add_action( 'widgets_init', 'PixelPop\ppop_woo_product_filter_widgets_init' );

/**
 * Woocommerce Global CSS Style hook.
 */
function pixelpop_woocommerce_preload_styles() {
	if ( is_cart() || is_checkout() || is_account_page() ) {
		pixelpop()->print_styles( 'pixelpop-woocommerce' );
	}
}
add_action( 'pixelpop_content_start', 'PixelPop\pixelpop_woocommerce_preload_styles', 1 );

/**
 * Woocommerce Single Product CSS Style hook.
 */
function pixelpop_woo_single_product_styles() {
	if ( is_product() ) {
		pixelpop()->print_styles( 'ppop-woo-single-product-style' );
	}
}
// add_action( 'pixelpop_content_start', 'PixelPop\pixelpop_woo_single_product_styles', 2 );

/**
 * Woocommerce Cart CSS Style hook.
 */
function pixelpop_woo_cart_styles() {
	if ( is_cart() ) {
		pixelpop()->print_styles( 'ppop-woo-cart-style' );
	}
}
add_action( 'pixelpop_content_start', 'PixelPop\pixelpop_woo_cart_styles', 2 );

/**
 * Woocommerce Checkout CSS Style hook.
 */
function pixelpop_woo_checkout_styles() {
	if ( is_checkout() ) {
		pixelpop()->print_styles( 'ppop-woo-checkout-style' );
	}
}
add_action( 'pixelpop_content_start', 'PixelPop\pixelpop_woo_checkout_styles', 2 );

/**
 * Woocommerce My Account CSS Style hook.
 */
function pixelpop_woo_account_styles() {
	if ( is_account_page() ) {
		pixelpop()->print_styles( 'ppop-woo-account-style' );
	}
}
add_action( 'pixelpop_content_start', 'PixelPop\pixelpop_woo_account_styles', 2 );





add_action( 'wp_footer', 'PixelPop\pixelpop_add_cart_quantity_plus_minus' );

function pixelpop_add_cart_quantity_plus_minus() {

	if ( ! is_product() && ! is_cart() ) return;

	wc_enqueue_js( "

		$(document).on( 'click', 'button.plus, button.minus', function() {

			var qty = $( this ).parent( '.quantity' ).find( '.qty' );
			var val = parseFloat(qty.val());
			var max = parseFloat(qty.attr( 'max' ));
			var min = parseFloat(qty.attr( 'min' ));
			var step = parseFloat(qty.attr( 'step' ));

			if ( $( this ).is( '.plus' ) ) {
			if ( max && ( max <= val ) ) {
				qty.val( max ).change();
			} else {
				qty.val( val + step ).change();
			}
			} else {
			if ( min && ( min >= val ) ) {
				qty.val( min ).change();
			} else if ( val > 1 ) {
				qty.val( val - step ).change();
			}
			}

		});

	" );
}


require get_template_directory() . '/inc/integrations/woocommerce/product-archive.php'; // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound

require get_template_directory() . '/inc/integrations/woocommerce/single-product.php'; // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound

require get_template_directory() . '/inc/integrations/woocommerce/cart.php'; // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound

require get_template_directory() . '/inc/integrations/woocommerce/checkout.php'; // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound

require get_template_directory() . '/inc/integrations/woocommerce/my-account.php'; // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
