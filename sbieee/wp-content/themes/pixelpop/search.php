<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
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
