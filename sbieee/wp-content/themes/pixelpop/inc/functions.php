<?php
/**
 * The `pixelpop()` function.
 *
 * @package pixelpop
 */

namespace PixelPop;

/**
 * Provides access to all available template tags of the theme.
 *
 * When called for the first time, the function will initialize the theme.
 *
 * @return Template_Tags Template tags instance exposing template tag methods.
 */
function pixelpop() : Template_Tags {
	static $theme = null;

	if ( null === $theme ) {
		$theme = new Theme();
		$theme->initialize();
	}

	return $theme->template_tags();
}

/**
 * Load the header template functions.
 */
require get_template_directory() . '/inc/integrations/plugin-activation/plugin-activation.php';

/**
 * Load the header template functions.
 */
require get_template_directory() . '/inc/template-functions/header-functions.php';

/**
 * Load the header hooks.
 */
require get_template_directory() . '/inc/template-functions/hooks-actions/header-hooks.php';

/**
 * Load the content hooks.
 */
require get_template_directory() . '/inc/template-functions/hooks-actions/content-hooks.php';

/**
 * Load the sidebar hooks.
 */
require get_template_directory() . '/inc/template-functions/hooks-actions/sidebar-hooks.php';

/**
 * Load the footer hooks.
 */
require get_template_directory() . '/inc/template-functions/hooks-actions/footer-hooks.php';

/**
 * Load the footer template functions.
 */
require get_template_directory() . '/inc/template-functions/footer-functions.php';

/**
 * Load the content template functions.
 */
require get_template_directory() . '/inc/template-functions/content-functions.php';

/**
 * Load Font enqueue file.
 */
require get_template_directory() . '/inc/font-icons/enqueue-font-icons.php';

/**
 * Load Dynamic CSS  Classes functions.
 */
require get_template_directory() . '/inc/dynamic-classes.php';

/**
 * Kirki - Including Kirki Files
 */
// include_once get_template_directory() . '/inc/integrations/kirki/kirki.php';

/**
 * Load main customizer file.
 */
require get_template_directory() . '/inc/customizer/customizer.php';

/**
 * Functions for adding theme options page.
 */
require get_template_directory() . '/inc/theme-options/theme-options.php';

/**
 * Meta Box - Meta Box functions for PixelPop.
 */
if ( defined( 'CMB2_LOADED' ) ) {
	require get_template_directory() . '/inc/theme-options/meta-box/metabox.php';
}

/**
 * Load BBpress compatibility file.
 */
if ( class_exists( 'bbPress' ) ) {
	require get_template_directory() . '/inc/integrations/bbpress/bbpress.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/integrations/woocommerce/woocommerce.php';
}

/**
 * Load Elementor compatibility file.
 */
if ( class_exists( '\Elementor\Plugin' ) ) {
	require get_template_directory() . '/inc/integrations/elementor/elementor.php';
}

/**
 * Load Elementor Pro compatibility file.
 */
if ( class_exists( '\Elementor\Plugin' ) ) {
	require get_template_directory() . '/inc/integrations/elementor/elementor-pro.php';
}

/**
 * Load Gutenburg compatibility file.
 */
require get_template_directory() . '/inc/integrations/gutenberg/gutenberg.php';


/**
 * Contains Function that removes no-js class from HTML if AMP is not active.
 */
require get_template_directory() . '/inc/AMP/remove-no-js.php';
