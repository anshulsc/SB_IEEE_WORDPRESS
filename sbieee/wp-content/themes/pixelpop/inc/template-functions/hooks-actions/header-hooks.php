<?php
/**
 * Calls in content for header using theme hooks.
 *
 * @package pixelpop
 */

namespace PixelPop;

use function PixelPop\pixelpop;
use function add_action;

defined( 'ABSPATH' ) || exit;

// Header Actions.
add_action( 'pixelpop_header', 'PixelPop\pixelpop_header', 10 );
add_action( 'pixelpop_main_header', 'PixelPop\pixelpop_primary_header', 10 );
add_action( 'pixelpop_primary_header_content', 'PixelPop\pixelpop_primary_header_content', 10 );

add_action( 'pixelpop_header_content_before', 'PixelPop\pixelpop_header_mobile_menu', 10 );
add_action( 'pixelpop_header_content', 'PixelPop\pixelpop_header_site_branding', 10 );
add_action( 'pixelpop_site_branding_content', 'PixelPop\pixelpop_main_logo', 10 );
add_action( 'wp', 'PixelPop\pixelpop_main_site_logos' );
add_action( 'pixelpop_site_logo', 'PixelPop\pixelpop_site_logo_mobile_img', 20 );
add_action( 'pixelpop_site_logo', 'PixelPop\pixelpop_site_transparent_header_logo_img', 30 );

add_action( 'pixelpop_site_branding_content', 'PixelPop\pixelpop_site_name_and_tag', 20 );
add_action( 'pixelpop_header_content', 'PixelPop\pixelpop_header_main_navigation', 20 );
add_action( 'pixelpop_header_content', 'PixelPop\pixelpop_header_icon_navigation', 30 );

// add_action('pixelpop_header_icon_navigation_items','pixelpop_header_account_menu', 30);
// add_filter('wp_nav_menu_items', 'add_mobile_user_account_logged_in', 10, 2);
// add_filter('wp_nav_menu_items', 'add_mobile_user_account_logged_out', 10, 2);

add_action( 'pixelpop_primary_mobile_nav_before', 'PixelPop\pixelpop_mobile_header_search', 10 );
add_action( 'pixelpop_content_start', 'PixelPop\pixelpop_below_header', 10 );
add_action( 'pixelpop_content_start', 'PixelPop\pixelpop_content_start', 20 );
add_action( 'pixelpop_before_main_content', 'PixelPop\pixelpop_content_width_wrapper_before', 10 );

/**
 * PixelPop Icon Menu Structure.
 *
 * @since 1.0.0
 */
function pixelpop_header_icon_menu_structure() {

	$header_icon_menu_structure = get_theme_mod( 'pixelpop_icon_menu_structure', array( 'search', 'cart', 'theme' ) );

	if ( is_array( $header_icon_menu_structure ) ) {

		foreach ( $header_icon_menu_structure as $icon_menu_structure ) {

			switch ( $icon_menu_structure ) {

				// Search Icon.
				case 'search':
					add_action( 'pixelpop_header_icon_navigation_items', 'PixelPop\pixelpop_header_icon_menu_search', 30 );
					break;

				// Cart Icon.
				case 'cart':
					add_action( 'pixelpop_header_icon_navigation_items', 'PixelPop\pixelpop_woocommerce_header_cart', 30 );
					break;

					// Dark/Light Theme Switch Icon.
				case 'theme':
					add_action( 'pixelpop_header_icon_navigation_items', 'PixelPop\pixelpop_header_icon_menu_switch_theme', 30 );
					break;
			}
		}
	}

}

add_action( 'wp', 'PixelPop\pixelpop_header_icon_menu_structure' );


