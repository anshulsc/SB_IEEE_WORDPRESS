<?php
/**
 * WordPress Gutenburg Compatibility File for PixelPop
 *
 * @package     PixelPop
 * @author      PixelPop
 * @copyright   Copyright (c)., PixelPop
 * @since       PixelPop 1.0.0
 */

/**
 * Gutenburg setup function.
 *
 * See: https://developer.wordpress.org/block-editor/developers/themes/theme-support/
 */
function pixelpop_gutenburg_setup() {

	// Add theme support for Editor Styles.
	add_theme_support( 'editor-styles' );
	add_editor_style( 'css/editor-style.css' );

	// Add theme support for Responsive embeds
	add_theme_support( 'responsive-embeds' );

	// Add theme support for Wide Images
	add_theme_support( 'align-wide' );

	// -- Disable custom font sizes
	// add_theme_support( 'disable-custom-font-sizes' );

	// Add theme support for Editor Font Styles
	add_theme_support( 'editor-font-sizes', array(
		array(
			'name'      => __( 'small', 'pixelpop' ),
			'shortName' => __( 'S', 'pixelpop' ),
			'size'      => 12,
			'slug'      => 'small'
		),
		array(
			'name'      => __( 'regular', 'pixelpop' ),
			'shortName' => __( 'M', 'pixelpop' ),
			'size'      => 16,
			'slug'      => 'regular'
		),
		array(
			'name'      => __( 'large', 'pixelpop' ),
			'shortName' => __( 'L', 'pixelpop' ),
			'size'      => 26,
			'slug'      => 'large'
		),
	) );

	// -- Disable Custom Colors
	// add_theme_support( 'disable-custom-colors' );

	// Add theme support for Editor Color Palette
	add_theme_support( 'editor-color-palette', array(
		array(
			'name'  => __( 'Primary Color', 'pixelpop' ),
			'slug'  => 'primary',
			'color'	=> '#ff5a6e',
		),
		array(
			'name'  => __( 'Secondary Color', 'pixelpop' ),
			'slug'  => 'secondary',
			'color' => '#ff8a6e',
		),
		array(
			'name'  => __( 'Blue', 'pixelpop' ),
			'slug'  => 'blue',
			'color' => '#2196F3',
		),
		array(
			'name'	=> __( 'Black', 'pixelpop' ),
			'slug'	=> 'black',
			'color'	=> '#000',
		),
		array(
			'name'	=> __( 'White', 'pixelpop' ),
			'slug'	=> 'white',
			'color'	=> '#fff',
		),
	) );

	// Add theme support for custom line height
	add_theme_support( 'custom-line-height' );

	// Add theme support for custom spacing
	add_theme_support('custom-spacing');
}
add_action( 'after_setup_theme', 'pixelpop_gutenburg_setup' );
