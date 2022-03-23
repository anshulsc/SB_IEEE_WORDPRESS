<?php
/**
 * Contains Function that removes no-js class from HTML if AMP is not active.
 *
 * @package     pixelpop
 * @author      PixelPop
 * @copyright   Copyright (c)., PixelPop
 * @since       PixelPop 1.0.0
 */

namespace PixelPop;

use function PixelPop\pixelpop;
use function add_action;

/**
 * Function that removes no-js class from HTML if AMP is not active.
 */
function pixelpop_remove_nojs_class() {
	if ( ! pixelpop()->is_amp() ) {
		?>
		<script id="remove-no-js">document.documentElement.classList.remove( 'no-js' );</script>
		<?php
	}
}

add_action( 'wp_head', 'PixelPop\pixelpop_remove_nojs_class' );


