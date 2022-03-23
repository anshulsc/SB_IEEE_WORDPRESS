<?php
/**
 * PixelPop Theme Customizer File.
 *
 * @package pixelpop
 */

namespace PixelPop\Customizer;

use function PixelPop\pixelpop;
use WP_Customize_Manager;
use function add_action;
use function bloginfo;
use function wp_enqueue_script;
use function get_theme_file_uri;
use function get_theme_file_path;


add_action( 'customize_register', 'PixelPop\Customizer\action_customize_register' );
add_action( 'customize_preview_init', 'PixelPop\Customizer\action_enqueue_customize_preview_js' );

/**
 * Adds postMessage support for site title and description, plus a custom Theme Options section.
 *
 * @param WP_Customize_Manager $wp_customize Customizer manager instance.
 */
function action_customize_register( WP_Customize_Manager $wp_customize ) {

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	$wp_customize->get_control( 'custom_logo' )->priority       = 10;
	$wp_customize->get_control( 'blogname' )->priority          = 30;
	$wp_customize->get_control( 'blogdescription' )->priority   = 60;
	$wp_customize->get_control( 'site_icon' )->priority         = 200;
	$wp_customize->remove_control( 'display_header_text' );
	$wp_customize->remove_control( 'header_textcolor' );
	$wp_customize->get_control( 'background_color' )->section = 'background_image';
	$wp_customize->remove_section( 'background_image' );
	$wp_customize->get_control( 'header_image' )->section  = 'pixelpop_primary_header_section';
	$wp_customize->get_control( 'header_image' )->priority = 200;
	$wp_customize->get_section( 'colors' )->panel          = 'pixelpop_global_settings_panel';
	$wp_customize->remove_control( 'background_color' );
	$wp_customize->get_control( 'background_image' )->section  = 'colors';
	$wp_customize->get_control( 'background_image' )->priority = 200;
	$wp_customize->get_section( 'title_tagline' )->panel       = 'pixelpop_global_settings_panel';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => function() {
					bloginfo( 'name' );
				},
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => function() {
					bloginfo( 'description' );
				},
			)
		);
	}

	/**
	 * Theme options.
	 */
	$wp_customize->add_section(
		'theme_options',
		array(
			'title'    => __( 'Theme Options', 'pixelpop' ),
			'priority' => 130, // Before Additional CSS.
		)
	);
}

/**
 * Load PixelPop Kirki Class.
 */
require_once get_template_directory() . '/inc/customizer/class-customizer-kirki.php'; // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound

/**
 * Load global customizer controls.
 */
require get_template_directory() . '/inc/customizer/controls/global-controls.php'; // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound

/**
 * Load blog and pages customizer controls.
 */
require get_template_directory() . '/inc/customizer/controls/blog-and-page-controls.php'; // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound

/**
 * Load header customizer controls.
 */
require get_template_directory() . '/inc/customizer/controls/header-controls.php'; // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound

/**
 * Load footer customizer controls.
 */
require get_template_directory() . '/inc/customizer/controls/footer-controls.php'; // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound

/**
 * Enqueues JavaScript to make Customizer preview reload changes asynchronously.
 */
function action_enqueue_customize_preview_js() {
	wp_enqueue_script(
		'pixelpop-customizer',
		get_theme_file_uri( '/assets/js/customizer.min.js' ),
		array( 'customize-preview' ),
		pixelpop()->get_asset_version( get_theme_file_path( '/assets/js/customizer.min.js' ) ),
		true
	);
}

/**
 * Enqueues JavaScript to make Customizer preview reload changes asynchronously.
 */
function pixelpop_customizer_controls_scripts() {
	wp_enqueue_script(
		'pppop-customizer-controls-scripts',
		get_theme_file_uri( '/assets/js/customizer-controls.min.js' ),
		array( 'jquery' ),
		pixelpop()->get_asset_version( get_theme_file_path( '/assets/js/customizer-controls.min.js' ) ),
		true
	);
}
add_action( 'customize_controls_print_scripts', 'PixelPop\Customizer\pixelpop_customizer_controls_scripts' );

/**
 * Enqueues JavaScript to make Customizer preview reload changes asynchronously.
 */
// function pixelpop_customizer_controls_styles() {
// 	wp_enqueue_style( 'pppop-toolkit-customizer-controls-styles', plugin_dir_url( __FILE__ ) . 'css/customizer-controls.css', array(), '1.0.0', 'all' );
// }
// add_action( 'customize_controls_print_styles', 'pixelpop_toolkit_customizer_controls_styles' );
