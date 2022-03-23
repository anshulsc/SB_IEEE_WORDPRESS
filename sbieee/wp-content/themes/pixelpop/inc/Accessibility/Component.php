<?php
/**
 * PixelPop\Accessibility\Component class
 *
 * @package pixelpop
 */

namespace PixelPop\Accessibility;

use PixelPop\Component_Interface;
use function PixelPop\pixelpop;
use WP_Post;
use function add_action;
use function add_filter;
use function wp_enqueue_script;
use function get_theme_file_uri;
use function get_theme_file_path;
use function wp_script_add_data;
use function wp_localize_script;

/**
 * Class for improving accessibility among various core features.
 */
class Component implements Component_Interface {

	/**
	 * Gets the unique identifier for the theme component.
	 *
	 * @return string Component slug.
	 */
	public function get_slug() : string {
		return 'accessibility';
	}

	/**
	 * Adds the action and filter hooks to integrate with WordPress.
	 */
	public function initialize() {
		// add_action( 'wp_enqueue_scripts', array( $this, 'action_enqueue_navigation_script' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'action_enqueue_global_script' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'action_enqueue_splide_script' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'action_enqueue_slider_script' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'action_enqueue_woocommerce_script' ) );
		add_action( 'customize_controls_print_scripts', array( $this, 'pixelpop_customizer_controls_scripts' ) );
		add_action( 'wp_print_footer_scripts', array( $this, 'action_print_skip_link_focus_fix' ) );
		add_filter( 'nav_menu_link_attributes', array( $this, 'filter_nav_menu_link_attributes_aria_current' ), 10, 2 );
		add_filter( 'page_menu_link_attributes', array( $this, 'filter_nav_menu_link_attributes_aria_current' ), 10, 2 );
	}

	/**
	 * Enqueues a script that improves navigation menu accessibility.
	 */
	public function action_enqueue_navigation_script() {

		// If the AMP plugin is active, return early.
		if ( pixelpop()->is_amp() ) {
			return;
		}

		// Enqueue the navigation script.
		wp_enqueue_script(
			'pixelpop-navigation',
			get_theme_file_uri( '/assets/js/navigation.min.js' ),
			array(),
			pixelpop()->get_asset_version( get_theme_file_path( '/assets/js/navigation.min.js' ) ),
			false
		);
		wp_script_add_data( 'pixelpop-navigation', 'async', true );
		wp_script_add_data( 'pixelpop-navigation', 'precache', true );
		wp_localize_script(
			'pixelpop-navigation',
			'pixelpopScreenReaderText',
			array(
				'expand'   => __( 'Expand child menu', 'pixelpop' ),
				'collapse' => __( 'Collapse child menu', 'pixelpop' ),
			)
		);
	}

	/**
	 * Enqueues a script that improves navigation menu accessibility.
	 */
	public function action_enqueue_global_script() {

		// If the AMP plugin is active, return early.
		if ( pixelpop()->is_amp() ) {
			return;
		}

		// Enqueue the navigation script.
		wp_enqueue_script(
			'pixelpop-global',
			get_theme_file_uri( '/assets/js/global.min.js' ),
			array( 'jquery' ),
			pixelpop()->get_asset_version( get_theme_file_path( '/assets/js/global.min.js' ) ),
			false
		);
		wp_script_add_data( 'pixelpop-global', 'async', true );
		wp_script_add_data( 'pixelpop-global', 'precache', true );
	}

	/**
	 * Check if the current page needs slider script.
	 */
	public function slider_script_active() {
		$slider_script_active = false;

		if ( class_exists( 'Pixelpop_Toolkit' ) ) {
			if ( function_exists( 'pixelpop_tool_blog_layouts_plus' ) ) {
				if ( is_home() ) {
					$slider_script_active = true;
				}
			}
		}

		if ( class_exists( 'WooCommerce' ) ) {
			if ( is_product() ) {
				$slider_script_active = true;
			}
		}

		return $slider_script_active;
	}

	/**
	 * Enqueues a script that improves navigation menu accessibility.
	 */
	public function action_enqueue_slider_script() {

		// If the AMP plugin is active, return early.
		if ( pixelpop()->is_amp() ) {
			return;
		}

		if ( true === $this->slider_script_active() ) {

			// Enqueue the navigation script.
			wp_enqueue_script(
				'pixelpop-slider',
				get_theme_file_uri( '/assets/js/vendor/slick.js' ),
				array( 'jquery' ),
				pixelpop()->get_asset_version( get_theme_file_path( '/assets/js/vendor/slick.js' ) ),
				false
			);
			wp_script_add_data( 'pixelpop-slider', 'async', true );
			wp_script_add_data( 'pixelpop-slider', 'precache', true );

		}
	}

	/**
	 * Enqueues a Splide Slider Script.
	 */
	public function action_enqueue_splide_script() {

		// If the AMP plugin is active, return early.
		if ( pixelpop()->is_amp() ) {
			return;
		}

		// Enqueue the navigation script.
		wp_enqueue_script(
			'pixelpop-splide',
			get_theme_file_uri( '/assets/js/vendor/splide.min.js' ),
			array( 'jquery' ),
			pixelpop()->get_asset_version( get_theme_file_path( '/assets/js/vendor/splide.min.js' ) ),
			false
		);
		wp_script_add_data( 'pixelpop-splide', 'async', true );
		wp_script_add_data( 'pixelpop-splide', 'precache', true );
	}

	/**
	 * Enqueues a script for woocommerce pages.
	 */
	public function action_enqueue_woocommerce_script() {

		// If the AMP plugin is active, return early.
		if ( pixelpop()->is_amp() ) {
			return;
		}

		if ( class_exists( 'WooCommerce' ) ) {
			if ( is_woocommerce() || is_cart() || is_checkout() || is_account_page() ) {
				// Enqueue the navigation script.
				wp_enqueue_script(
					'pixelpop-woocommerce',
					get_theme_file_uri( '/assets/js/woocommerce.min.js' ),
					array( 'jquery' ),
					pixelpop()->get_asset_version( get_theme_file_path( '/assets/js/woocommerce.min.js' ) ),
					false
				);
				wp_script_add_data( 'pixelpop-woocommerce', 'async', true );
				wp_script_add_data( 'pixelpop-woocommerce', 'precache', true );

			}
		}

	}

	/**
	 * Enqueues a script for customizer controls.
	 */
	public function pixelpop_customizer_controls_scripts() {

		wp_enqueue_script(
			'pixelpop-cusyomizer-controls',
			get_theme_file_uri( '/assets/js/customizer-controls.min.js' ),
			array( 'jquery' ),
			pixelpop()->get_asset_version( get_theme_file_path( '/assets/js/customizer-controls.min.js' ) ),
			false
		);

	}

	/**
	 * Prints an inline script to fix skip link focus in IE11.
	 *
	 * The script is not enqueued because it is tiny and because it is only for IE11,
	 * thus it does not warrant having an entire dedicated blocking script being loaded.
	 *
	 * Since it will never need to be changed, it is simply printed in its minified version.
	 *
	 * @link https://git.io/vWdr2
	 */
	public function action_print_skip_link_focus_fix() {

		// If the AMP plugin is active, return early.
		if ( pixelpop()->is_amp() ) {
			return;
		}

		// Print the minified script.
		?>
		<script>
		/(trident|msie)/i.test(navigator.userAgent)&&document.getElementById&&window.addEventListener&&window.addEventListener("hashchange",function(){var t,e=location.hash.substring(1);/^[A-z0-9_-]+$/.test(e)&&(t=document.getElementById(e))&&(/^(?:a|select|input|button|textarea)$/i.test(t.tagName)||(t.tabIndex=-1),t.focus())},!1);
		</script>
		<?php
	}

	/**
	 * Filters the HTML attributes applied to a menu item's anchor element.
	 *
	 * Checks if the menu item is the current menu item and adds the aria "current" attribute.
	 *
	 * @param array   $atts The HTML attributes applied to the menu item's `<a>` element.
	 * @param WP_Post $item The current menu item.
	 * @return array Modified HTML attributes
	 */
	public function filter_nav_menu_link_attributes_aria_current( array $atts, WP_Post $item ) : array {
		if ( isset( $item->current ) ) {
			if ( $item->current ) {
				$atts['aria-current'] = 'page';
			}
		} elseif ( ! empty( $item->ID ) ) {
			global $post;

			if ( ! empty( $post->ID ) && (int) $post->ID === (int) $item->ID ) {
				$atts['aria-current'] = 'page';
			}
		}

		return $atts;
	}
}
