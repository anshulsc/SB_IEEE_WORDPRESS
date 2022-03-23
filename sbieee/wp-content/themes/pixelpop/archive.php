<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package pixelpop
 */

namespace PixelPop;

get_header();

pixelpop()->print_styles( 'pixelpop-content' );

	/**
	 * Functions hooked into pixelpop_archive_main add_action
	 * Function 'pixelpop_archive_main' location - "inc/hooks/content-hooks.php"
	 *
	 * Hook for everything, makes for better elementor theming support.
	 *
	 * @hooked pixelpop_archive_main  - 10
	 *
	 * @since 1.0.0
	 */
	do_action( 'pixelpop_archive_main' );

get_footer();
