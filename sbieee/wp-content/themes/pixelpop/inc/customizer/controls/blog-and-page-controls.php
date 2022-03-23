<?php
/**
 * Customizer Controls for Blog and Page.
 *
 * @package pixelpop
 */

// HEADER PANEL
PixelPop_Kirki::add_panel( 'pixelpop_blog_and_page_panel', array(
    'priority'    => 20,
    'title'       => esc_html__( 'Blog & Page Settings', 'pixelpop' ),
) );

  /////////////////////////////////////////////////////////////////////////
 //							BLOG ARCHIVE SECTION						//
/////////////////////////////////////////////////////////////////////////
PixelPop_Kirki::add_section( 'pixelpop_blog_archive_section', array(
    'title'          => esc_html__( 'Blog Home (Archive)', 'pixelpop' ),
    'panel'          => 'pixelpop_blog_and_page_panel',
    'priority'       => 10,
) );

PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'        => 'custom',
	'settings'    => 'pixelpop_title_blog_archive_layout',
	'section'     => 'pixelpop_blog_archive_section',
		'default'         => '<h3 class="ppop-customizer-custom-heading">' . __( 'Layout', 'pixelpop' ) . '</h3>',
] );

PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'        => 'radio-buttonset',
	'settings'    => 'pixelpop_blog_archive_sidebar_layout',
	'label'       => esc_html__( 'Sidebar Layout', 'pixelpop' ),
	'section'     => 'pixelpop_blog_archive_section',
	'default'     => 'none',
	'choices'     => [
		'left'   => esc_html__( 'Left', 'pixelpop' ),
		'none' => esc_html__( 'None', 'pixelpop' ),
		'right'  => esc_html__( 'Right', 'pixelpop' ),
	],
] );

PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'        => 'radio-image',
	'settings'    => 'pixelpop_blog_archive_layout',
	'label'       => esc_html__( 'Layout', 'pixelpop' ),
	'section'     => 'pixelpop_blog_archive_section',
	'default'     => 'grid',
	'choices'     => [
		'grid'				=> get_template_directory_uri() . '/assets/images/blog-layout-grid.svg',
		'list'				=> get_template_directory_uri() . '/assets/images/blog-layout-list.svg',
		'full-width'		=> get_template_directory_uri() . '/assets/images/blog-layout-fullwidth.svg',
	],
	'transport' => 'postMessage',
] );

PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'        => 'radio-buttonset',
	'settings'    => 'zeethem_blog_grid_column',
	'label'       => esc_html__( 'Columns', 'pixelpop' ),
	'section'     => 'pixelpop_blog_archive_section',
	'default'     => '3',
	'priority'    => 10,
	'choices'     => [
		'1'	=> esc_html__( '1', 'pixelpop' ),
		'2'	=> esc_html__( '2', 'pixelpop' ),
		'3'	=> esc_html__( '3', 'pixelpop' ),
		'4'	=> esc_html__( '4', 'pixelpop' ),
	],
	'active_callback' => [
		[
			'setting'  => 'pixelpop_blog_archive_layout',
			'operator' => '===',
			'value'    => 'grid',
		]
	],
	'transport' => 'postMessage',
] );

PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'        => 'toggle',
	'settings'    => 'zeethem_blog_grid_fluid_toggle',
	'label'       => esc_html__( 'Fluid Grid Layout', 'pixelpop' ),
	'description' => esc_html__( 'Resize blog layout automatically depending on the screen size to reduce white space on the page', 'pixelpop' ),
	'section'     => 'pixelpop_blog_archive_section',
	'default'     => '0',
	'active_callback' => [
		[
			'setting'  => 'pixelpop_blog_archive_layout',
			'operator' => '===',
			'value'    => 'grid',
		]
	],
	'transport' => 'postMessage',
] );

// PixelPop_Kirki::add_field( 'pixelpop_customizer', [
// 	'type'        => 'custom',
// 	'settings'    => 'pixelpop_title_blog_archive_disable_elements',
// 	'section'     => 'pixelpop_blog_archive_section',
// 		'default'         => '<h3 class="ppop-customizer-custom-heading">' . __( 'Show/Hide Elements', 'pixelpop' ) . '</h3>',
// ] );

// PixelPop_Kirki::add_field( 'pixelpop_customizer', [
// 	'type'        => 'switch',
// 	'settings'    => 'pixelpop_blog_archive_featured_image',
// 	'label'       => esc_html__( 'Featured Image', 'pixelpop' ),
// 	'section'     => 'pixelpop_blog_archive_section',
// 	'default'     => '1',
// 	'choices'     => [
// 		'on'  => esc_html__( 'Show', 'pixelpop' ),
// 		'off' => esc_html__( 'Hide', 'pixelpop' ),
// 	],
// ] );

// PixelPop_Kirki::add_field( 'pixelpop_customizer', [
// 	'type'        => 'switch',
// 	'settings'    => 'pixelpop_blog_archive_title',
// 	'label'       => esc_html__( 'Title', 'pixelpop' ),
// 	'section'     => 'pixelpop_blog_archive_section',
// 	'default'     => '1',
// 	'choices'     => [
// 		'on'  => esc_html__( 'Show', 'pixelpop' ),
// 		'off' => esc_html__( 'Hide', 'pixelpop' ),
// 	],
// ] );

// PixelPop_Kirki::add_field( 'pixelpop_customizer', [
// 	'type'        => 'switch',
// 	'settings'    => 'pixelpop_blog_archive_meta',
// 	'label'       => esc_html__( 'Meta', 'pixelpop' ),
// 	'section'     => 'pixelpop_blog_archive_section',
// 	'default'     => '0',
// 	'choices'     => [
// 		'on'  => esc_html__( 'Show', 'pixelpop' ),
// 		'off' => esc_html__( 'Hide', 'pixelpop' ),
// 	],
// ] );

// PixelPop_Kirki::add_field( 'pixelpop_customizer', [
// 	'type'        => 'checkbox',
// 	'settings'    => 'pixelpop_blog_archive_meta_category',
// 	'label'       => esc_html__( 'Category', 'pixelpop' ),
// 	'section'     => 'pixelpop_blog_archive_section',
// 	'default'     => true,
// 	'active_callback' => [
// 		[
// 			'setting'  => 'pixelpop_blog_archive_meta',
// 			'operator' => '===',
// 			'value'    => true,
// 		]
// 	],
// ] );

// PixelPop_Kirki::add_field( 'pixelpop_customizer', [
// 	'type'        => 'checkbox',
// 	'settings'    => 'pixelpop_blog_archive_meta_tags',
// 	'label'       => esc_html__( 'Tags', 'pixelpop' ),
// 	'section'     => 'pixelpop_blog_archive_section',
// 	'default'     => false,
// 	'active_callback' => [
// 		[
// 			'setting'  => 'pixelpop_blog_archive_meta',
// 			'operator' => '===',
// 			'value'    => true,
// 		]
// 	],
// ] );

// PixelPop_Kirki::add_field( 'pixelpop_customizer', [
// 	'type'        => 'checkbox',
// 	'settings'    => 'pixelpop_blog_archive_meta_read_time',
// 	'label'       => esc_html__( 'Read Time', 'pixelpop' ),
// 	'section'     => 'pixelpop_blog_archive_section',
// 	'default'     => false,
// 	'active_callback' => [
// 		[
// 			'setting'  => 'pixelpop_blog_archive_meta',
// 			'operator' => '===',
// 			'value'    => true,
// 		]
// 	],
// ] );

// PixelPop_Kirki::add_field( 'pixelpop_customizer', [
// 	'type'        => 'switch',
// 	'settings'    => 'pixelpop_blog_archive_excerpt',
// 	'label'       => esc_html__( 'Excerpt', 'pixelpop' ),
// 	'section'     => 'pixelpop_blog_archive_section',
// 	'default'     => '1',
// 	'choices'     => [
// 		'on'  => esc_html__( 'Show', 'pixelpop' ),
// 		'off' => esc_html__( 'Hide', 'pixelpop' ),
// 	],
// ] );

// PixelPop_Kirki::add_field( 'pixelpop_customizer', [
// 	'type'        => 'switch',
// 	'settings'    => 'pixelpop_blog_archive_read_more',
// 	'label'       => esc_html__( 'Read More Button', 'pixelpop' ),
// 	'section'     => 'pixelpop_blog_archive_section',
// 	'default'     => '0',
// 	'choices'     => [
// 		'on'  => esc_html__( 'Show', 'pixelpop' ),
// 		'off' => esc_html__( 'Hide', 'pixelpop' ),
// 	],
// ] );

// PixelPop_Kirki::add_field( 'pixelpop_customizer', [
// 	'type'        => 'switch',
// 	'settings'    => 'pixelpop_blog_archive_footer',
// 	'label'       => esc_html__( 'Footer', 'pixelpop' ),
// 	'section'     => 'pixelpop_blog_archive_section',
// 	'default'     => '1',
// 	'choices'     => [
// 		'on'  => esc_html__( 'Show', 'pixelpop' ),
// 		'off' => esc_html__( 'Hide', 'pixelpop' ),
// 	],
// ] );

// PixelPop_Kirki::add_field( 'pixelpop_customizer', [
// 	'type'        => 'checkbox',
// 	'settings'    => 'pixelpop_blog_archive_footer_author_avatar',
// 	'label'       => esc_html__( 'Author avatar', 'pixelpop' ),
// 	'section'     => 'pixelpop_blog_archive_section',
// 	'default'     => true,
// 	'active_callback' => [
// 		[
// 			'setting'  => 'pixelpop_blog_archive_footer',
// 			'operator' => '===',
// 			'value'    => true,
// 		]
// 	],
// ] );

// PixelPop_Kirki::add_field( 'pixelpop_customizer', [
// 	'type'        => 'checkbox',
// 	'settings'    => 'pixelpop_blog_archive_footer_author_avatar',
// 	'label'       => esc_html__( 'Author avatar', 'pixelpop' ),
// 	'section'     => 'pixelpop_blog_archive_section',
// 	'default'     => true,
// 	'active_callback' => [
// 		[
// 			'setting'  => 'pixelpop_blog_archive_footer',
// 			'operator' => '===',
// 			'value'    => true,
// 		]
// 	],
// ] );

// PixelPop_Kirki::add_field( 'pixelpop_customizer', [
// 	'type'        => 'checkbox',
// 	'settings'    => 'pixelpop_blog_archive_footer_author_name',
// 	'label'       => esc_html__( 'Author name', 'pixelpop' ),
// 	'section'     => 'pixelpop_blog_archive_section',
// 	'default'     => true,
// 	'active_callback' => [
// 		[
// 			'setting'  => 'pixelpop_blog_archive_footer',
// 			'operator' => '===',
// 			'value'    => true,
// 		]
// 	],
// ] );

// PixelPop_Kirki::add_field( 'pixelpop_customizer', [
// 	'type'        => 'checkbox',
// 	'settings'    => 'pixelpop_blog_archive_footer_publish_date',
// 	'label'       => esc_html__( 'Publish Date', 'pixelpop' ),
// 	'section'     => 'pixelpop_blog_archive_section',
// 	'default'     => true,
// 	'active_callback' => [
// 		[
// 			'setting'  => 'pixelpop_blog_archive_footer',
// 			'operator' => '===',
// 			'value'    => true,
// 		]
// 	],
// ] );

// PixelPop_Kirki::add_field( 'pixelpop_customizer', [
// 	'type'        => 'checkbox',
// 	'settings'    => 'pixelpop_blog_archive_footer_comments',
// 	'label'       => esc_html__( 'Comments', 'pixelpop' ),
// 	'section'     => 'pixelpop_blog_archive_section',
// 	'default'     => true,
// 	'active_callback' => [
// 		[
// 			'setting'  => 'pixelpop_blog_archive_footer',
// 			'operator' => '===',
// 			'value'    => true,
// 		]
// 	],
// ] );

  /////////////////////////////////////////////////////////////////////////
 //								SINGLE BLOG								//
/////////////////////////////////////////////////////////////////////////
PixelPop_Kirki::add_section( 'pixelpop_single_blog_section', array(
    'title'          => esc_html__( 'Single Blog', 'pixelpop' ),
    'panel'          => 'pixelpop_blog_and_page_panel',
    'priority'       => 20,
) );

PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'        => 'radio-buttonset',
	'settings'    => 'pixelpop_single_blog_sidebar_layout',
	'label'       => esc_html__( 'Sidebar Layout', 'pixelpop' ),
	'section'     => 'pixelpop_single_blog_section',
	'default'     => 'none',
	'choices'     => [
		'left'   => esc_html__( 'Left', 'pixelpop' ),
		'none' => esc_html__( 'None', 'pixelpop' ),
		'right'  => esc_html__( 'Right', 'pixelpop' ),
	],
] );

PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'        => 'switch',
	'settings'    => 'pixelpop_single_post_narrow_content',
	'label'       => esc_html__( 'Narrow Content', 'pixelpop' ),
	'section'     => 'pixelpop_single_blog_section',
	'default'     => '1',
	'choices'     => [
		'on'  => esc_html__( 'Enable', 'pixelpop' ),
		'off' => esc_html__( 'Disable', 'pixelpop' ),
	],
	'active_callback' => [
		[
			'setting'  => 'pixelpop_single_blog_sidebar_layout',
			'operator' => '===',
			'value'    => 'none',
		]
	],
	'transport' => 'postMessage',
] );

PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'        => 'custom',
	'settings'    => 'pixelpop_title_single_post_featured_image',
	'section'     => 'pixelpop_single_blog_section',
		'default'         => '<h3 class="ppop-customizer-custom-heading">' . __( 'Featured Image', 'pixelpop' ) . '</h3>',
] );

PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'        => 'radio-image',
	'settings'    => 'pixelpop_single_blog_featured_image_layout',
	'label'       => esc_html__( 'Featured Image Style', 'pixelpop' ),
	'section'     => 'pixelpop_single_blog_section',
	'default'     => 'full-width',
	'choices'     => [
		'full-width'	=> get_template_directory_uri() . '/assets/images/single-post-layout-img-fullwidth.svg',
		'contained'		=> get_template_directory_uri() . '/assets/images/single-post-layout-img-contained.svg',
	],
	'transport' => 'postMessage',
] );

PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'        => 'custom',
	'settings'    => 'pixelpop_title_single_post_structure',
	'section'     => 'pixelpop_single_blog_section',
		'default'         => '<h3 class="ppop-customizer-custom-heading">' . __( 'Post Structure', 'pixelpop' ) . '</h3>',
] );

PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'        => 'sortable',
	'settings'    => 'pixelpop_single_post_header_structure',
	'label'       => esc_html__( 'Header Structure', 'pixelpop' ),
	'section'     => 'pixelpop_single_blog_section',
	'default'     => [
		'image',
		'title'
	],
	'choices'     => [
		'image' => esc_html__( 'Featured Image', 'pixelpop' ),
		'title' => esc_html__( 'Title', 'pixelpop' ),
	],
] );

PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'        => 'sortable',
	'settings'    => 'pixelpop_single_post_footer_structure',
	'label'       => esc_html__( 'Footer Structure', 'pixelpop' ),
	'section'     => 'pixelpop_single_blog_section',
	'default'     => [
		'post-navigation',
		'related-posts',
		'author-box',
		'comments'
	],
	'choices'     => [
		'post-navigation' => esc_html__( 'Post Navigation', 'pixelpop' ),
		'related-posts' => esc_html__( 'Related Posts', 'pixelpop' ),
		'author-box' => esc_html__( 'Author Box', 'pixelpop' ),
		'comments' => esc_html__( 'Comments', 'pixelpop' )
	],
] );

// PixelPop_Kirki::add_field( 'pixelpop_customizer', [
// 	'type'        => 'custom',
// 	'settings'    => 'pixelpop_title_single_post_meta',
// 	'section'     => 'pixelpop_single_blog_section',
// 		'default'         => '<h3 class="ppop-customizer-custom-heading">' . __( 'Meta', 'pixelpop' ) . '</h3>',
// ] );

// PixelPop_Kirki::add_field( 'pixelpop_customizer', [
// 	'type'        => 'switch',
// 	'settings'    => 'pixelpop_single_post_header_meta',
// 	'label'       => esc_html__( 'Header Meta', 'pixelpop' ),
// 	'section'     => 'pixelpop_single_blog_section',
// 	'default'     => '1',
// 	'choices'     => [
// 		'on'  => esc_html__( 'Show', 'pixelpop' ),
// 		'off' => esc_html__( 'Hide', 'pixelpop' ),
// 	],
// ] );

// PixelPop_Kirki::add_field( 'pixelpop_customizer', [
// 	'type'        => 'checkbox',
// 	'settings'    => 'pixelpop_single_post_header_meta_author_avatar',
// 	'label'       => esc_html__( 'Author avatar', 'pixelpop' ),
// 	'section'     => 'pixelpop_single_blog_section',
// 	'default'     => true,
// 	'active_callback' => [
// 		[
// 			'setting'  => 'pixelpop_single_post_header_meta',
// 			'operator' => '===',
// 			'value'    => true,
// 		]
// 	],
// ] );

// PixelPop_Kirki::add_field( 'pixelpop_customizer', [
// 	'type'        => 'checkbox',
// 	'settings'    => 'pixelpop_single_post_header_meta_author_name',
// 	'label'       => esc_html__( 'Author name', 'pixelpop' ),
// 	'section'     => 'pixelpop_single_blog_section',
// 	'default'     => true,
// 	'active_callback' => [
// 		[
// 			'setting'  => 'pixelpop_single_post_header_meta',
// 			'operator' => '===',
// 			'value'    => true,
// 		]
// 	],
// ] );

// PixelPop_Kirki::add_field( 'pixelpop_customizer', [
// 	'type'        => 'checkbox',
// 	'settings'    => 'pixelpop_single_post_header_meta_publish_date',
// 	'label'       => esc_html__( 'Publish Date', 'pixelpop' ),
// 	'section'     => 'pixelpop_single_blog_section',
// 	'default'     => true,
// 	'active_callback' => [
// 		[
// 			'setting'  => 'pixelpop_single_post_header_meta',
// 			'operator' => '===',
// 			'value'    => true,
// 		]
// 	],
// ] );

// PixelPop_Kirki::add_field( 'pixelpop_customizer', [
// 	'type'        => 'checkbox',
// 	'settings'    => 'pixelpop_single_post_header_meta_share',
// 	'label'       => esc_html__( 'Social Share', 'pixelpop' ),
// 	'section'     => 'pixelpop_single_blog_section',
// 	'default'     => true,
// 	'active_callback' => [
// 		[
// 			'setting'  => 'pixelpop_single_post_header_meta',
// 			'operator' => '===',
// 			'value'    => true,
// 		]
// 	],
// ] );

// PixelPop_Kirki::add_field( 'pixelpop_customizer', [
// 	'type'        => 'checkbox',
// 	'settings'    => 'pixelpop_single_post_header_meta_comments',
// 	'label'       => esc_html__( 'Comments', 'pixelpop' ),
// 	'section'     => 'pixelpop_single_blog_section',
// 	'default'     => true,
// 	'active_callback' => [
// 		[
// 			'setting'  => 'pixelpop_single_post_header_meta',
// 			'operator' => '===',
// 			'value'    => true,
// 		]
// 	],
// ] );

// PixelPop_Kirki::add_field( 'pixelpop_customizer', [
// 	'type'        => 'checkbox',
// 	'settings'    => 'pixelpop_single_post_header_meta_like',
// 	'label'       => esc_html__( 'Post Like Button', 'pixelpop' ),
// 	'section'     => 'pixelpop_single_blog_section',
// 	'default'     => true,
// 	'active_callback' => [
// 		[
// 			'setting'  => 'pixelpop_single_post_header_meta',
// 			'operator' => '===',
// 			'value'    => true,
// 		]
// 	],
// ] );

// PixelPop_Kirki::add_field( 'pixelpop_customizer', [
// 	'type'        => 'switch',
// 	'settings'    => 'pixelpop_single_post_footer_meta',
// 	'label'       => esc_html__( 'Footer Meta', 'pixelpop' ),
// 	'section'     => 'pixelpop_single_blog_section',
// 	'default'     => '1',
// 	'choices'     => [
// 		'on'  => esc_html__( 'Show', 'pixelpop' ),
// 		'off' => esc_html__( 'Hide', 'pixelpop' ),
// 	],
// ] );

// PixelPop_Kirki::add_field( 'pixelpop_customizer', [
// 	'type'        => 'checkbox',
// 	'settings'    => 'pixelpop_single_post_footer_meta_category',
// 	'label'       => esc_html__( 'Categories', 'pixelpop' ),
// 	'section'     => 'pixelpop_single_blog_section',
// 	'default'     => true,
// 	'active_callback' => [
// 		[
// 			'setting'  => 'pixelpop_single_post_footer_meta',
// 			'operator' => '===',
// 			'value'    => true,
// 		]
// 	],
// ] );

// PixelPop_Kirki::add_field( 'pixelpop_customizer', [
// 	'type'        => 'checkbox',
// 	'settings'    => 'pixelpop_single_post_footer_meta_tags',
// 	'label'       => esc_html__( 'Tags', 'pixelpop' ),
// 	'section'     => 'pixelpop_single_blog_section',
// 	'default'     => true,
// 	'active_callback' => [
// 		[
// 			'setting'  => 'pixelpop_single_post_footer_meta',
// 			'operator' => '===',
// 			'value'    => true,
// 		]
// 	],
// ] );

  /////////////////////////////////////////////////////////////////////////
 //									PAGE								//
/////////////////////////////////////////////////////////////////////////
PixelPop_Kirki::add_section( 'pixelpop_page_section', array(
    'title'          => esc_html__( 'Page', 'pixelpop' ),
    'panel'          => 'pixelpop_blog_and_page_panel',
    'priority'       => 20,
) );

PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'        => 'radio-buttonset',
	'settings'    => 'pixelpop_page_sidebar_layout',
	'label'       => esc_html__( 'Sidebar Layout', 'pixelpop' ),
	'section'     => 'pixelpop_page_section',
	'default'     => 'none',
	'choices'     => [
		'left'   => esc_html__( 'Left', 'pixelpop' ),
		'none' => esc_html__( 'None', 'pixelpop' ),
		'right'  => esc_html__( 'Right', 'pixelpop' ),
	],
] );

PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'        => 'switch',
	'settings'    => 'pixelpop_page_narrow_content',
	'label'       => esc_html__( 'Narrow Content', 'pixelpop' ),
	'section'     => 'pixelpop_page_section',
	'default'     => '0',
	'choices'     => [
		'on'  => esc_html__( 'Enable', 'pixelpop' ),
		'off' => esc_html__( 'Disable', 'pixelpop' ),
	],
	'transport' => 'postMessage',
	'active_callback' => [
		[
			'setting'  => 'pixelpop_single_blog_sidebar_layout',
			'operator' => '===',
			'value'    => 'none',
		]
	],
] );

PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'        => 'custom',
	'settings'    => 'pixelpop_title_page_featured_image',
	'section'     => 'pixelpop_page_section',
		'default'         => '<h3 class="ppop-customizer-custom-heading">' . __( 'Featured Image', 'pixelpop' ) . '</h3>',
] );

PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'        => 'radio-image',
	'settings'    => 'pixelpop_page_featured_image_layout',
	'label'       => esc_html__( 'Featured Image Style', 'pixelpop' ),
	'section'     => 'pixelpop_page_section',
	'default'     => 'full-width',
	'choices'     => [
		'full-width'	=> get_template_directory_uri() . '/assets/images/single-post-layout-img-fullwidth.svg',
		'contained'		=> get_template_directory_uri() . '/assets/images/single-post-layout-img-contained.svg',
	],
	'transport' => 'postMessage',
] );

PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'        => 'custom',
	'settings'    => 'pixelpop_title_page_structure',
	'section'     => 'pixelpop_page_section',
		'default'         => '<h3 class="ppop-customizer-custom-heading">' . __( 'Page Structure', 'pixelpop' ) . '</h3>',
] );

PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'        => 'sortable',
	'settings'    => 'pixelpop_page_header_structure',
	'label'       => esc_html__( 'Header Structure', 'pixelpop' ),
	'section'     => 'pixelpop_page_section',
	'default'     => [
		'image',
		'title'
	],
	'choices'     => [
		'image' => esc_html__( 'Featured Image', 'pixelpop' ),
		'title' => esc_html__( 'Title', 'pixelpop' ),
	],
] );
