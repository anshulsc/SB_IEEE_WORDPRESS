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

add_action( 'pixelpop_content_end', 'PixelPop\pixelpop_content_end', 10 );
add_action( 'pixelpop_after_main_content', 'PixelPop\pixelpop_content_width_wrapper_after', 10 );
add_action( 'pixelpop_footer', 'PixelPop\pixelpop_footer', 10 );
add_action( 'pixelpop_footer_content', 'PixelPop\pixelpop_footer_info', 30 );

/**
 * PixelPop Footer Structure.
 *
 * @since 1.0.0
 */
function pixelpop_footer_structure() {

	if ( true === get_theme_mod( 'pixelpop_footer_branding_toggle', true ) ) {

		add_action( 'pixelpop_footer_content', 'PixelPop\pixelpop_footer_branding', 10 );

		if ( '' !== get_theme_mod( 'pixelpop_footer_logo', '' ) ) {
			add_action( 'pixelpop_footer_branding_content', 'PixelPop\pixelpop_footer_logo', 10 );
		}

		if ( true === get_theme_mod( 'pixelpop_footer_site_title', true ) ) {
			add_action( 'pixelpop_footer_branding_content', 'PixelPop\pixelpop_footer_site_title', 20 );
		}

		if ( true === get_theme_mod( 'pixelpop_footer_site_tagline', true ) ) {
			add_action( 'pixelpop_footer_branding_content', 'PixelPop\pixelpop_footer_site_description', 30 );
		}

		if ( true === get_theme_mod( 'pixelpop_footer_social_icons_toggle', true ) ) {
			if ( 'footer-branding' === get_theme_mod( 'pixelpop_footer_social_icons_location', 'footer-branding' ) ) {
				add_action( 'pixelpop_footer_branding_content', 'PixelPop\pixelpop_footer_social_links_below_branding', 40 );
			}
		}
	}

	if ( true === get_theme_mod( 'pixelpop_footer_social_icons_toggle', true ) ) {
		if ( 'footer-info' === get_theme_mod( 'pixelpop_footer_social_icons_location', 'footer-branding' ) ) {
			add_action( 'pixelpop_footer_info_content', 'PixelPop\pixelpop_footer_info_social_links', 20 );
		}
	}

	if ( true === get_theme_mod( 'pixelpop_footer_widgets_toggle', true ) ) {
		add_action( 'pixelpop_footer_content', 'PixelPop\pixelpop_footer_widgets', 20 );
	}

}
add_action( 'wp', 'PixelPop\pixelpop_footer_structure' );

