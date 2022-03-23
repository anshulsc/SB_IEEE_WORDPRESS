<?php
/**
 * Elementor Pro Compatibility File for PixelPop
 *
 * @link https://elementor.com/
 *
 * @package     pixelpop
 * @author      PixelPop
 * @copyright   Copyright (c), PixelPop
 * @since       PixelPop 1.0.0
 */

namespace Elementor;

// If plugin - 'Elementor' not exist then return.
if ( ! class_exists( '\Elementor\Plugin' ) || ! class_exists( 'ElementorPro\Modules\ThemeBuilder\Module' ) ) {
	return;
}

namespace ElementorPro\Modules\ThemeBuilder\ThemeSupport;

use Elementor\TemplateLibrary\Source_Local;
use ElementorPro\Modules\ThemeBuilder\Classes\Locations_Manager;
use ElementorPro\Modules\ThemeBuilder\Module;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * PixelPop Elementor Compatibility
 */
if ( ! class_exists( 'PixelPop_Elementor_Pro' ) ) :

	/**
	 * PixelPop Elementor Compatibility
	 *
	 * @since 1.0.0
	 */
	class PixelPop_Elementor_Pro {

		/**
		 * Member Variable
		 *
		 * @var object instance
		 */
		private static $instance;

		/**
		 * Initiator
		 *
		 * @since 1.2.7
		 * @return object Class object.
		 */
		public static function get_instance() {
			if ( ! isset( self::$instance ) ) {
				self::$instance = new self();
			}
			return self::$instance;
		}

		/**
		 * Constructor
		 */
		public function __construct() {
			// Add locations.
			add_action( 'elementor/theme/register_locations', array( $this, 'register_elementor_locations' ) );
			add_action( 'wp', array( $this, 'override_meta' ), 0 );
		}

		/**
		 * Register Elementor Locations
		 *
		 * @param object $manager Location manager.
		 * @return void
		 */
		public function register_elementor_locations( $elementor_theme_manager ) {
			$elementor_theme_manager->register_all_core_location();
			$elementor_theme_manager->register_location(
				'header',
				array(
					'hook'         => 'pixelpop_header',
					'remove_hooks' => array( 'PixelPop\pixelpop_header' ),
				)
			);
			$elementor_theme_manager->register_location(
				'footer',
				array(
					'hook'         => 'pixelpop_footer',
					'remove_hooks' => array( 'PixelPop\pixelpop_footer' ),
				)
			);
			$elementor_theme_manager->register_location(
				'single',
				array(
					'hook'         => 'pixelpop_single_main',
					'remove_hooks' => array( 'PixelPop\pixelpop_single_main' ),
				)
			);
			$elementor_theme_manager->register_location(
				'archive',
				array(
					'hook'         => 'pixelpop_archive_main',
					'remove_hooks' => array( 'PixelPop\pixelpop_archive_main' ),
				)
			);
		}

		/**
		 * Override sidebar, title etc with post meta
		 *
		 * @return void
		 */
		public function override_meta() {

			// don't override meta for `elementor_library` post type.
			if ( 'elementor_library' == get_post_type() ) {
				return;
			}

			// Override post meta for single pages.
			$documents_single = Module::instance()->get_conditions_manager()->get_documents_for_location( 'single' );
			if ( $documents_single ) {
				foreach ( $documents_single as $document ) {
					add_filter( 'body_class', array( $this, 'render_body_class' ), 99 );
					remove_action('pixelpop_content_start','PixelPop\pixelpop_below_header', 10);
					remove_action('pixelpop_content_start','PixelPop\pixelpop_content_start', 20);
					remove_action('pixelpop_content_end','PixelPop\pixelpop_content_end', 10);
				}
			}

			// Override post meta for archive pages.
			$documents_archive = Module::instance()->get_conditions_manager()->get_documents_for_location( 'archive' );
			if ( $documents_archive ) {
				foreach ( $documents_archive as $document ) {
					add_filter( 'body_class', array( $this, 'render_body_class' ), 99 );
					remove_action('pixelpop_content_start','PixelPop\pixelpop_below_header', 10);
					remove_action('pixelpop_content_start','PixelPop\pixelpop_content_start', 20);
					remove_action('pixelpop_content_end','PixelPop\pixelpop_content_end', 10);
				}
			}
		}

		function render_body_class( $classes ) {
			$classes[] = 'pixelpop-elementor-theme-builder';

			return $classes;
		}

	}


	PixelPop_Elementor_Pro::get_instance();

endif;
