<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package pixelpop
 */

namespace PixelPop;

if ( ! pixelpop()->is_primary_sidebar_active() ) {
	return;
}

pixelpop()->print_styles( 'pixelpop-sidebar', 'pixelpop-widgets' );

/**
 * The pixelpop_before_sidebar hook.
 *
 * @since 1.0.0
 */
do_action( 'pixelpop_before_sidebar' );

/**
 * Functions hooked into pixelpop_primary_sidebar add_action
 *
 * @hooked pixelpop_primary_sidebar  - 10
 *
 * @since 1.0.0
 */
do_action( 'pixelpop_primary_sidebar' );

/**
 * The pixelpop_after_sidebar hook.
 *
 * @since 1.0.0
 */
do_action( 'pixelpop_after_sidebar' );
