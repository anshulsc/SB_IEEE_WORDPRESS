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

/**
 * Enqueue Font Awsome to the theme.
 */
function pixelpop_fontawesome() {
	wp_enqueue_style( 'pixelpop-font-awesome-free', get_stylesheet_directory_uri() . '/assets/fonts/font-awesome/css/all.min.css', false, '1.0.0' );
}

add_action( 'wp_enqueue_scripts', 'PixelPop\pixelpop_fontawesome' );

/**
 * Enqueue Feather Icons to the theme.
 */
function pixelpop_feathericons() {
	wp_enqueue_style( 'pixelpop-feather-icons', get_stylesheet_directory_uri() . '/assets/fonts/feather/feather-icons.css', false, '1.0.0' );
}

add_action( 'wp_enqueue_scripts', 'PixelPop\pixelpop_feathericons' );

/**
 * Enqueue Star Icons to the theme.
 */
function pixelpop_star_icons() {
	wp_enqueue_style( 'pixelpop-stars-icons', get_stylesheet_directory_uri() . '/assets/fonts/pixelpop-stars/pixelpop-stars.css', false, '1.0.0' );
}

add_action( 'wp_enqueue_scripts', 'PixelPop\pixelpop_star_icons' );
