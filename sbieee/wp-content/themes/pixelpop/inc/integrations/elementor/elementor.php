<?php
/**
 * Elementor Compatibility File for PixelPop
 *
 * @link https://elementor.com/
 *
 * @package     pixelpop
 * @author      PixelPop
 * @copyright   Copyright (c), PixelPop
 * @since       PixelPop 1.0.0
 */

namespace Elementor;

// If Elementor not exist then return.
if ( ! class_exists( '\Elementor\Plugin' ) ) {
	return;
}

/**
 * PixelPop Elementor Compatibility
 */
if ( ! class_exists( 'PixelPop_Elementor' ) ) :

	/**
	 * PixelPop Elementor Compatibility
	 *
	 * @since 1.0.0
	 */
	class PixelPop_Elementor {

		/**
		 * Member Variable
		 *
		 * @var object instance
		 */
		private static $instance;

		/**
		 * Initiator
		 */
		public static function get_instance() {
			if ( ! isset( self::$instance ) ) {
				self::$instance = new self;
			}
			return self::$instance;
		}

		/**
		 * Constructor
		 */
		public function __construct() {
			add_action( 'wp', array( $this, 'elementor_default_setting' ), 20 );
			add_action( 'elementor/preview/init', array( $this, 'elementor_default_setting' ) );
			add_action( 'elementor/preview/enqueue_styles', array( $this, 'elementor_overlay_zindex' ) );
		}

		/**
		 * Elementor Content layout set as Page Builder
		 *
		 * @return void
		 */
		public function elementor_default_setting() {

			if ( 'post' == get_post_type() ) {
				return;
			}

			// don't modify post meta settings if we are not on Elementor's edit page.
			if ( ! $this->is_elementor_editor() ) {
				return;
			}

			global $post;
			$id = get_the_ID();

			if ( isset( $post ) && empty( $page_builder_layout ) && ( is_admin() || is_singular() ) ) {

				if ( empty( $post->post_content ) && $this->is_elementor_activated( $id ) ) {

					update_post_meta( $id, 'pixelpop_sidebar_layout_metabox', 'none' );
					update_post_meta( $id, 'pixelpop_content_layout_metabox', 'page-builder' );
				}
			}

		}

		/**
		 * Add z-index CSS for elementor's drag drop
		 *
		 * @return void
		 */
		public function elementor_overlay_zindex() {

			// return if we are not on Elementor's edit page.
			if ( ! $this->is_elementor_editor() ) {
				return;
			}

			?>

			<style type="text/css" id="ast-elementor-overlay-css">
				.elementor-editor-active .elementor-element > .elementor-element-overlay {
					z-index: 9999;
				}

				.elementor-editor-active .site-header{
					z-index: 1;
				}


				.ppop-layout-page-builder.elementor-page .ppop-post-title,
				.ppop-layout-page-builder.elementor-page .site-content #secondary.secondary  {
					display: none;
				}

				.ppop-layout-page-builder.elementor-page .site-content .col-full {
					padding: 0;
					margin: 0;
					max-width: unset;
				}
			</style>

			<?php
		}

		/**
		 * Check is elementor activated.
		 *
		 * @param int $id Post/Page Id.
		 * @return boolean
		 */
		public function is_elementor_activated( $id ) {
			if ( version_compare( ELEMENTOR_VERSION, '1.5.0', '<' ) ) {
				return ( 'builder' === Plugin::$instance->db->get_edit_mode( $id ) );
			} else {
				return Plugin::$instance->db->is_built_with_elementor( $id );
			}
		}

		/**
		 * Check if Elementor Editor is open.
		 *
		 * @since  1.2.7
		 *
		 * @return boolean True IF Elementor Editor is loaded, False If Elementor Editor is not loaded.
		 */
		private function is_elementor_editor() {
			if ( ( isset( $_REQUEST['action'] ) && 'elementor' == $_REQUEST['action'] ) ||
				isset( $_REQUEST['elementor-preview'] )
			) {
				return true;
			}

			return false;
		}

	}

	PixelPop_Elementor::get_instance();

endif;

