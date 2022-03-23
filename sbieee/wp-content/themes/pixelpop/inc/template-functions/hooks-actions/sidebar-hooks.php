<?php
/**
 * Calls in content for sidebar using theme hooks.
 *
 * @package pixelpop
 */

namespace PixelPop;

use function PixelPop\pixelpop;
use function add_action;

defined( 'ABSPATH' ) || exit;

/**
 * Add Primary Sidebar
 *
 * @since 1.0.0
 */
function pixelpop_add_primary_sidebar() {
	if ( pixelpop_is_primary_sidebar_active() ) {
		add_action( 'pixelpop_layout_primary_after', 'PixelPop\pixelpop_get_sidebar', 10 );
	} else {
		remove_action( 'pixelpop_layout_primary_after', 'PixelPop\pixelpop_get_sidebar', 10 );
	}
}
add_action( 'wp', 'PixelPop\pixelpop_add_primary_sidebar' );
add_action( 'pixelpop_primary_sidebar', 'PixelPop\pixelpop_primary_sidebar', 10 );
