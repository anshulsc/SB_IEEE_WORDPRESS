<?php
/**
 * Builds the main Layout meta box.
 *
 * @package pixelpop
 */

defined( 'ABSPATH' ) || exit;

add_action( 'cmb2_admin_init', 'pixelpop_single_layout_metabox' );
/**
 * Define the metabox and field configurations.
 */
function pixelpop_single_layout_metabox() {

	/**
	 * Initiate the metabox
	 */
	$cmb = new_cmb2_box(
		array(
			'id'            => 'pixelpop_layout_metabox',
			'title'         => __( 'PixelPop Settings', 'pixelpop' ),
			'object_types'  => array( 'page', 'post' ),
			'context'       => 'side',
			'priority'      => 'low',
			'show_names'    => true,
			'cmb_styles'    => true,
		)
	);

	$cmb->add_field(
		array(
			'name'             => __( 'Transparent Header', 'pixelpop' ),
			'id'               => 'pixelpop_transparent_header_metabox',
			'type'             => 'select',
			'show_option_none' => false,
			'default'          => 'default',
			'options'          => array(
				'default'     => __( 'Default(Customizer Settings)', 'pixelpop' ),
				'enabled'     => __( 'Enabled', 'pixelpop' ),
				'disabled'    => __( 'Disabled', 'pixelpop' ),
			),
		)
	);

	$cmb->add_field(
		array(
			'name'             => __( 'Content Layout', 'pixelpop' ),
			'id'               => 'pixelpop_content_layout_metabox',
			'type'             => 'select',
			'show_option_none' => false,
			'default'          => 'default',
			'options'          => array(
				'default'        => __( 'Default', 'pixelpop' ),
				'full-width'     => __( 'Full Width(Streched)', 'pixelpop' ),
				'page-builder'   => __( 'Page Builder', 'pixelpop' ),
			),
		)
	);

	$cmb->add_field(
		array(
			'name'             => __( 'Featured Image Layout', 'pixelpop' ),
			'id'               => 'pixelpop_featured_image_metabox',
			'type'             => 'select',
			'show_option_none' => false,
			'default'          => 'default',
			'options'          => array(
				'default'        => __( 'Default(Customizer Settings)', 'pixelpop' ),
				'full-width'     => __( 'Full Width', 'pixelpop' ),
				'contained'      => __( 'Contained', 'pixelpop' ),
			),
		)
	);

	$cmb->add_field(
		array(
			'name'             => __( 'Sidebar', 'pixelpop' ),
			'id'               => 'pixelpop_sidebar_layout_metabox',
			'type'             => 'select',
			'show_option_none' => false,
			'default'          => 'default',
			'options'          => array(
				'default'  => __( 'Default(Customizer Settings)', 'pixelpop' ),
				'left'     => __( 'Left Sidebar', 'pixelpop' ),
				'right'    => __( 'Right Sidebar', 'pixelpop' ),
				'none'     => __( 'No Sidebar', 'pixelpop' ),
			),
		)
	);

}
