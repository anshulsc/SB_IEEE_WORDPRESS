<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package pixelpop
 */

namespace PixelPop;

get_header();

pixelpop()->print_styles( 'pixelpop-content' );

	/**
	 * Functions hooked into pixelpop_single_main add_action
	 * Function 'pixelpop_single_main' location - "inc/hooks/content-hooks.php"
	 *
	 * Hook for everything, makes for better elementor theming support.
	 *
	 * @hooked pixelpop_single_main  - 10
	 *
	 * @since 1.0.0
	 */
	do_action( 'pixelpop_single_main' );

get_footer();
