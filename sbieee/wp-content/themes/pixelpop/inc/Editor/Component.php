<?php
/**
 * PixelPop\Editor\Component class
 *
 * @package pixelpop
 */

namespace PixelPop\Editor;

use PixelPop\Component_Interface;
use function add_action;
use function add_theme_support;

/**
 * Class for integrating with the block editor.
 *
 * @link https://wordpress.org/gutenberg/handbook/extensibility/theme-support/
 */
class Component implements Component_Interface {

	/**
	 * Gets the unique identifier for the theme component.
	 *
	 * @return string Component slug.
	 */
	public function get_slug() : string {
		return 'editor';
	}

	/**
	 * Adds the action and filter hooks to integrate with WordPress.
	 */
	public function initialize() {
		add_action( 'after_setup_theme', array( $this, 'action_add_editor_support' ) );
	}

	/**
	 * Adds support for various editor features.
	 */
	public function action_add_editor_support() {
		// Add support for editor styles.
		add_theme_support( 'editor-styles' );

		// Add support for default block styles.
		add_theme_support( 'wp-block-styles' );

		// Add support for wide-aligned images.
		add_theme_support( 'align-wide' );

		/**
		 * Add support for color palettes.
		 *
		 * To preserve color behavior across themes, use these naming conventions:
		 * - Use primary and secondary color for main variations.
		 * - Use `theme-[color-name]` naming standard for standard colors (red, blue, etc).
		 * - Use `custom-[color-name]` for non-standard colors.
		 *
		 * Add the line below to disable the custom color picker in the editor.
		 * add_theme_support( 'disable-custom-colors' );
		 */
		add_theme_support(
			'editor-color-palette',
			array(
				array(
					'name'  => __( 'Primary', 'pixelpop' ),
					'slug'  => 'theme-primary',
					'color' => '#ff5a6e',
				),
				array(
					'name'  => __( 'Secondary', 'pixelpop' ),
					'slug'  => 'theme-secondary',
					'color' => '#ff8a6e',
				),
				array(
					'name'  => __( 'Layout Primary', 'pixelpop' ),
					'slug'  => 'layout-primary',
					'color' => '#fff',
				),
				array(
					'name'  => __( 'Layout Primary', 'pixelpop' ),
					'slug'  => 'layout-secondary',
					'color' => '#f6f6f6',
				),
				array(
					'name'  => __( 'Layout Tertiary', 'pixelpop' ),
					'slug'  => 'layout-tertiary',
					'color' => '#f1f1f1',
				),
				array(
					'name'  => __( 'Font', 'pixelpop' ),
					'slug'  => 'font',
					'color' => '#333',
				),
				array(
					'name'  => __( 'Font Secondary', 'pixelpop' ),
					'slug'  => 'font-secondary',
					'color' => '#999',
				),
				array(
					'name'  => __( 'Heading', 'pixelpop' ),
					'slug'  => 'heading',
					'color' => '#000',
				),
				array(
					'name'  => __( 'Heading Secondary', 'pixelpop' ),
					'slug'  => 'heading-secondary',
					'color' => '#161616',
				),
				array(
					'name'  => __( 'Red', 'pixelpop' ),
					'slug'  => 'theme-red',
					'color' => '#ff2b2b',
				),
				array(
					'name'  => __( 'Green', 'pixelpop' ),
					'slug'  => 'theme-green',
					'color' => '#15d91d',
				),
				array(
					'name'  => __( 'Blue', 'pixelpop' ),
					'slug'  => 'theme-blue',
					'color' => '#178bf1',
				),
				array(
					'name'  => __( 'Yellow', 'pixelpop' ),
					'slug'  => 'theme-yellow',
					'color' => '#f1c20f',
				),
				array(
					'name'  => __( 'Black', 'pixelpop' ),
					'slug'  => 'theme-black',
					'color' => '#000',
				),
				array(
					'name'  => __( 'Grey', 'pixelpop' ),
					'slug'  => 'theme-grey',
					'color' => '#95A5A6',
				),
				array(
					'name'  => __( 'White', 'pixelpop' ),
					'slug'  => 'theme-white',
					'color' => '#fff',
				),
			)
		);

		/*
		 * Add support custom font sizes.
		 *
		 * Add the line below to disable the custom color picker in the editor.
		 * add_theme_support( 'disable-custom-font-sizes' );
		 */
		add_theme_support(
			'editor-font-sizes',
			array(
				array(
					'name'      => __( 'Regular', 'pixelpop' ),
					'shortName' => __( 'R', 'pixelpop' ),
					'size'      => 16,
					'slug'      => 'regular',
				),
				array(
					'name'      => __( 'Small', 'pixelpop' ),
					'shortName' => __( 'S', 'pixelpop' ),
					'size'      => 14,
					'slug'      => 'small',
				),
				array(
					'name'      => __( 'Medium', 'pixelpop' ),
					'shortName' => __( 'M', 'pixelpop' ),
					'size'      => 26,
					'slug'      => 'medium',
				),
				array(
					'name'      => __( 'Large', 'pixelpop' ),
					'shortName' => __( 'L', 'pixelpop' ),
					'size'      => 40,
					'slug'      => 'large',
				),
				array(
					'name'      => __( 'Larger', 'pixelpop' ),
					'shortName' => __( 'XL', 'pixelpop' ),
					'size'      => 50,
					'slug'      => 'larger',
				),
				array(
					'name'      => __( 'Heading 1', 'pixelpop' ),
					'shortName' => __( 'H1', 'pixelpop' ),
					'size'      => 32,
					'slug'      => 'h1',
				),
				array(
					'name'      => __( 'Heading 2', 'pixelpop' ),
					'shortName' => __( 'H2', 'pixelpop' ),
					'size'      => 26,
					'slug'      => 'h2',
				),
				array(
					'name'      => __( 'Heading 3', 'pixelpop' ),
					'shortName' => __( 'H3', 'pixelpop' ),
					'size'      => 20,
					'slug'      => 'h3',
				),
				array(
					'name'      => __( 'Heading 4', 'pixelpop' ),
					'shortName' => __( 'H4', 'pixelpop' ),
					'size'      => 16,
					'slug'      => 'h4',
				),
				array(
					'name'      => __( 'Heading 5', 'pixelpop' ),
					'shortName' => __( 'H5', 'pixelpop' ),
					'size'      => 14,
					'slug'      => 'h5',
				),
			)
		);
	}
}
