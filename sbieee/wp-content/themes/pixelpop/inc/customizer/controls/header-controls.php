<?php
/**
 * Customizer Controls for .
 *
 * @package pixelpop
 */

// $login_link    = esc_url( wp_login_url( get_permalink() ) );
// $register_link = esc_url( wp_registration_url() );
// $logout_link   = esc_url( wp_logout_url() );

// HEADER PANEL
PixelPop_Kirki::add_panel( 'pixelpop_header_settings_panel', array(
    'priority'    => 10,
    'title'       => esc_html__( 'Header Settings', 'pixelpop' ),
) );

  /////////////////////////////////////////////////////////////////////////
 //							HEADER BRANDING SECTION						//
/////////////////////////////////////////////////////////////////////////

PixelPop_Kirki::add_section( 'pixelpop_header_branding_section', array(
    'title'          => esc_html__( 'Branding', 'pixelpop' ),
    'section'          => 'pixelpop_primary_header_section',
) );

PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'        => 'radio-buttonset',
	'settings'    => 'pixelpop_header_branding_layout',
	'label'       => esc_html__( 'Branding Layout', 'pixelpop' ),
	'section'     => 'pixelpop_header_branding_section',
	'default'     => 'logo-and-info',
	'choices'     => [
		'logo-and-info'   => esc_html__( 'Logo and Site Info', 'pixelpop' ),
		'only-logo' => esc_html__( 'Only Logo', 'pixelpop' ),
		'only-info'  => esc_html__( 'Only Site Info', 'pixelpop' ),
	],
] );

PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'        => 'radio-buttonset',
	'settings'    => 'pixelpop_header_branding_logo_layout',
	'label'       => esc_html__( 'Logo and Site Info Layout', 'pixelpop' ),
	'section'     => 'pixelpop_header_branding_section',
	'default'     => 'inline',
	'choices'     => [
		'inline'   => esc_html__( 'Inline', 'pixelpop' ),
		'stacked' => esc_html__( 'Stacked', 'pixelpop' ),
	],
	'active_callback' => [
		[
			'setting'  => 'pixelpop_header_branding_layout',
			'operator' => '===',
			'value'    => 'logo-and-info',
		]
	],
] );

PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'        => 'radio-image',
	'settings'    => 'pixelpop_header_branding_inline_logo_align',
	'label'       => esc_html__( 'Logo Alignment', 'pixelpop' ),
	'section'     => 'pixelpop_header_branding_section',
	'default'     => 'left',
	'choices'     => [
		'left'				=> get_template_directory_uri() . '/assets/images/align-left.svg',
		'right'				=> get_template_directory_uri() . '/assets/images/align-right.svg',
	],
	// 'transport' => 'postMessage',
	'active_callback' => [
		[
			'setting'  => 'pixelpop_header_branding_layout',
			'operator' => '===',
			'value'    => 'logo-and-info',
		],
		[
			'setting'  => 'pixelpop_header_branding_logo_layout',
			'operator' => '===',
			'value'    => 'inline',
		]
	],
] );

PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'        => 'radio-image',
	'settings'    => 'pixelpop_header_branding_stacked_logo_align',
	'label'       => esc_html__( 'Logo Alignment', 'pixelpop' ),
	'section'     => 'pixelpop_header_branding_section',
	'default'     => 'left',
	'choices'     => [
		'left'				=> get_template_directory_uri() . '/assets/images/align-left.svg',
		'center'			=> get_template_directory_uri() . '/assets/images/align-center.svg',
		'right'				=> get_template_directory_uri() . '/assets/images/align-right.svg',
	],
	// 'transport' => 'postMessage',
	'active_callback' => [
		[
			'setting'  => 'pixelpop_header_branding_layout',
			'operator' => '===',
			'value'    => 'logo-and-info',
		],
		[
			'setting'  => 'pixelpop_header_branding_logo_layout',
			'operator' => '===',
			'value'    => 'stacked',
		]
	],
] );

PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'        => 'radio-image',
	'settings'    => 'pixelpop_header_branding_info_align',
	'label'       => esc_html__( 'Title & Tagline Alignment', 'pixelpop' ),
	'section'     => 'pixelpop_header_branding_section',
	'default'     => 'left',
	'choices'     => [
		'left'				=> get_template_directory_uri() . '/assets/images/align-left.svg',
		'center'			=> get_template_directory_uri() . '/assets/images/align-center.svg',
		'right'				=> get_template_directory_uri() . '/assets/images/align-right.svg',
	],
	// 'transport' => 'postMessage',
	'active_callback' => [
		[
			'setting'  => 'pixelpop_header_branding_layout',
			'operator' => '===',
			'value'    => 'only-info',
		]
	],
] );

PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'        => 'custom',
	'settings'    => 'pixelpop_title_site_logo',
	'section'     => 'pixelpop_header_branding_section',
	'default'         => '<h3 class="ppop-customizer-custom-heading">' . __( 'Site Logo', 'pixelpop' ) . '</h3>',
	'active_callback' => [
		[
			'setting'  => 'pixelpop_header_branding_layout',
			'operator' => '!==',
			'value'    => 'only-info',
		]
	],
] );

// PixelPop_Kirki::add_field( 'pixelpop_customizer', [
// 	'type'        => 'switch',
// 	'settings'    => 'svg_logo_toggle',
// 	'label'       => esc_html__( 'SVG Logo', 'pixelpop' ),
// 	'section'     => 'pixelpop_header_branding_section',
// 	'default'     => '0',
// 	'choices'     => [
// 		'on'  => esc_html__( 'Enable', 'pixelpop' ),
// 		'off' => esc_html__( 'Disable', 'pixelpop' ),
// 	],
// 	'active_callback' => [
// 		[
// 			'setting'  => 'pixelpop_header_branding_layout',
// 			'operator' => '!==',
// 			'value'    => 'only-info',
// 		]
// 	],
// ] );

// PixelPop_Kirki::add_field( 'pixelpop_customizer', [
// 	'type'        => 'code',
// 	'settings'    => 'svg_logo_editor',
// 	'label'       => esc_html__( 'SVG Logo HTML', 'pixelpop' ),
// 	'description' => esc_html__( 'Put your SVG HTML snippet in the editor. Recomended SVG Logo size - [ 50px * 50px ] ', 'pixelpop' ),
// 	'section'     => 'pixelpop_header_branding_section',
// 	'default'     => '',
// 	'choices'     => [
// 		'language' => 'html',
// 	],
// 	'active_callback' => [
// 		[
// 			'setting'  => 'svg_logo_toggle',
// 			'operator' => '!==',
// 			'value'    => false,
// 		],
// 		[
// 			'setting'  => 'pixelpop_header_branding_layout',
// 			'operator' => '!==',
// 			'value'    => 'only-info',
// 		]
// 	],

// ] );

PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'        => 'slider',
	'settings'    => 'pixelpop_logo_height',
	'label'       => esc_html__( 'Logo Height', 'pixelpop' ),
	'section'     => 'pixelpop_header_branding_section',
	'default'     => 50,
	'choices'     => [
		'min'  => 0,
		'max'  => 200,
		'step' => 1,
	],
	'output' => array(
		array(
			'element'  => '.ppop-header-logo img',
			'property' => 'height',
			'units'	   => 'px',
			'media_query' => '@media (min-width: 768px)',
		),
		array(
			'element'  => '.ppop-header-logo.svg-logo a svg',
			'property' => 'height',
			'units'	   => 'px',
			'media_query' => '@media (min-width: 768px)',
		),
		array(
			'element'  => '.ppop-mobile-header-logo img',
			'property' => 'height',
			'units'	   => 'px',
			'media_query' => '@media (min-width: 768px)',
		),
		array(
			'element'  => '.ppop-transparent-header-logo img',
			'property' => 'height',
			'units'	   => 'px',
			'media_query' => '@media (min-width: 768px)',
		),
	),
	'transport' => 'postMessage',
	'active_callback' => [
		[
			'setting'  => 'pixelpop_header_branding_layout',
			'operator' => '!==',
			'value'    => 'only-info',
		]
	],

] );

PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'        => 'custom',
	'settings'    => 'pixelpop_title_site_title',
	'section'     => 'pixelpop_header_branding_section',
	'default'         => '<h3 class="ppop-customizer-custom-heading">' . __( 'Site Info', 'pixelpop' ) . '</h3>',
	'active_callback' => [
		[
			'setting'  => 'pixelpop_header_branding_layout',
			'operator' => '!==',
			'value'    => 'only-logo',
		]
	],
] );

PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'        => 'checkbox',
	'settings'    => 'pixelpop_hide_title',
	'label'       => esc_html__( 'Hide Title', 'pixelpop' ),
	'section'     => 'pixelpop_header_branding_section',
	'default'     => false,
	'active_callback' => [
		[
			'setting'  => 'pixelpop_header_branding_layout',
			'operator' => '!==',
			'value'    => 'only-logo',
		]
	],
] );

// PixelPop_Kirki::add_field( 'pixelpop_customizer', [
// 	'type'            => 'checkbox',
// 	'settings'        => 'pixelpop_inline_logo_title',
// 	'label'           => esc_html__( 'Inline Logo & Title', 'pixelpop' ),
// 	'description'     => esc_html__( 'Show Logo and Site Title side-by-side. Works best if square logo is uploaded.', 'pixelpop' ),
// 	'section'         => 'pixelpop_header_branding_section',
// 	'default'         => true,
// 	'active_callback' => [
// 		[
// 			'setting'  => 'pixelpop_hide_title',
// 			'operator' => '!==',
// 			'value'    => true,
// 		]
// 	],
// ] );

PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'        => 'checkbox',
	'settings'    => 'pixelpop_hide_tagline',
	'label'       => esc_html__( 'Hide Tagline', 'pixelpop' ),
	'section'     => 'pixelpop_header_branding_section',
	'default'     => true,
	'active_callback' => [
		[
			'setting'  => 'pixelpop_header_branding_layout',
			'operator' => '!==',
			'value'    => 'only-logo',
		]
	],
] );

// PixelPop_Kirki::add_field( 'pixelpop_customizer', [
// 	'type'        => 'checkbox',
// 	'settings'    => 'pixelpop_centered_style',
// 	'label'       => esc_html__( 'Centered Logo & Title', 'pixelpop' ),
// 	'section'     => 'pixelpop_header_branding_section',
// 	'default'     => false,
// 	'active_callback' => [
// 		[
// 			'setting'  => 'pixelpop_hide_title',
// 			'operator' => '!==',
// 			'value'    => true,
// 		],
// 		[
// 			'setting'  => 'pixelpop_inline_logo_title',
// 			'operator' => '!==',
// 			'value'    => true,
// 		]
// 	],
// 	'priority'       => 50,
// ] );

  /////////////////////////////////////////////////////////////////////////
 //							PRIMARY HEADER SECTION						//
/////////////////////////////////////////////////////////////////////////

PixelPop_Kirki::add_section( 'pixelpop_primary_header_section', array(
    'title'          => esc_html__( 'Primary Header', 'pixelpop' ),
    'panel'          => 'pixelpop_header_settings_panel',
    'priority'       => 20,
) );

PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'        => 'radio-image',
	'settings'    => 'pixelpop_primary_header_layout',
	'label'       => esc_html__( 'Layout', 'pixelpop' ),
	'section'     => 'pixelpop_primary_header_section',
	'default'     => 'left',
	'priority'    => 10,
	'choices'     => [
		'left'   => get_template_directory_uri() . '/assets/images/header-left-logo.svg',
		'center' => get_template_directory_uri() . '/assets/images/header-center-logo.svg',
		'right'  => get_template_directory_uri() . '/assets/images/header-right-logo.svg',
	],
	'transport' => 'postMessage',
] );

// if ( function_exists( 'pixelpop_tool_header_buttons' ) ) {

// 	PixelPop_Kirki::add_field( 'pixelpop_customizer', [
// 		'type'        => 'custom',
// 		'settings'    => 'pixelpop_title_header_buttons',
// 		'section'     => 'pixelpop_primary_header_section',
// 			'default'         => '<h3 class="ppop-customizer-custom-heading">' . __( 'Header Buttons', 'pixelpop' ) . '</h3>',
// 	] );

// 	PixelPop_Kirki::add_field( 'pixelpop_customizer', [
// 		'type'        => 'switch',
// 		'settings'    => 'pixelpop_header_buttons_toggle',
// 		'label'       => esc_html__( 'Header Buttons', 'pixelpop' ),
// 		'section'     => 'pixelpop_primary_header_section',
// 		'default'     => 'off',
// 		'choices'     => [
// 			'on'  => esc_html__( 'Enable', 'pixelpop' ),
// 			'off' => esc_html__( 'Disable', 'pixelpop' ),
// 		],
// 	] );

// 	PixelPop_Kirki::add_field( 'pixelpop_customizer', [
// 		'type'        => 'repeater',
// 		'label'       => esc_html__( 'Header Buttons', 'pixelpop' ),
// 		'section'     => 'pixelpop_primary_header_section',
// 		'row_label' => [
// 			'type'  => 'field',
// 			'value' => esc_html__( 'Button', 'pixelpop' ),
// 			'field' => 'button_text',
// 		],
// 		'button_label' => esc_html__('"Add new" button (optional) ', 'pixelpop' ),
// 		'settings'     => 'pixelpop_header_buttons',
// 		'default'      => [
// 			[
// 				'button_text' => esc_html__( 'Login', 'pixelpop' ),
// 				'button_url'  => $login_link,
// 				'showto_logged_in'  => false,
// 				'showto_logged_out'  => true,
// 			],
// 			[
// 				'button_text' => esc_html__( 'Signup', 'pixelpop' ),
// 				'button_url'  => $register_link,
// 				'showto_logged_in'  => false,
// 				'showto_logged_out'  => true,
// 			],
// 			[
// 				'button_text' => esc_html__( 'Logout', 'pixelpop' ),
// 				'button_url'  => $logout_link,
// 				'showto_logged_in'  => true,
// 				'showto_logged_out'  => false,
// 			],
// 		],
// 		'fields' => [
// 			'button_text' => [
// 				'type'        => 'text',
// 				'label'       => esc_html__( 'Button Text', 'pixelpop' ),
// 				'description' => esc_html__( 'This will be the label for your Button', 'pixelpop' ),
// 				'default'     => '',
// 			],
// 			'button_url'  => [
// 				'type'        => 'text',
// 				'label'       => esc_html__( 'Button link', 'pixelpop' ),
// 				'description' => esc_html__( 'This will be the Button link (URL)', 'pixelpop' ),
// 				'default'     => '',
// 			],
// 			'showto_logged_in'  => [
// 				'type'        => 'checkbox',
// 				'label'       => esc_html__( 'Show to logged-in users', 'pixelpop' ),
// 				'default'     => true,
// 			],
// 			'showto_logged_out'  => [
// 				'type'        => 'checkbox',
// 				'label'       => esc_html__( 'Show to logged-out users', 'pixelpop' ),
// 				'default'     => true,
// 			],
// 		],
// 		'choices' => [
// 			'limit' => 5
// 		],
// 		'active_callback' => [
// 			[
// 				'setting'  => 'pixelpop_header_buttons_toggle',
// 				'operator' => '!==',
// 				'value'    => false,
// 			]
// 		],
// 	] );

// }


PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'        => 'custom',
	'settings'    => 'pixelpop_title_header_background',
	'section'     => 'pixelpop_primary_header_section',
		'default'         => '<h3 class="ppop-customizer-custom-heading">' . __( 'Background Image', 'pixelpop' ) . '</h3>',
	'priority'       => 190,
] );

  /////////////////////////////////////////////////////////////////////////
 //							SECONDARY HEADER SECTION					//
/////////////////////////////////////////////////////////////////////////

PixelPop_Kirki::add_section( 'pixelpop_secondary_header_section', array(
    'title'          => esc_html__( 'Secondary Header', 'pixelpop' ),
    'panel'          => 'pixelpop_header_settings_panel',
    'priority'       => 30,
) );

  /////////////////////////////////////////////////////////////////////////
 //							ICON NAVIGATION SECTION						//
/////////////////////////////////////////////////////////////////////////

PixelPop_Kirki::add_section( 'pixelpop_primary_header_icon_nav_section', array(
    'title'          => esc_html__( 'Icon Navigation', 'pixelpop' ),
    'section'          => 'pixelpop_primary_header_section',
) );

PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'        => 'toggle',
	'settings'    => 'pixelpop_icon_menu_toggle',
	'label'       => esc_html__( 'Header Icon Menu', 'pixelpop' ),
	'section'     => 'pixelpop_primary_header_icon_nav_section',
	'default'     => '1',
] );

PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'        => 'sortable',
	'settings'    => 'pixelpop_icon_menu_structure',
	'label'       => esc_html__( 'Icon Menu Structure', 'pixelpop' ),
	'section'     => 'pixelpop_primary_header_icon_nav_section',
	'default'     => [
		'search',
		'cart',
		'theme'
	],
	'choices'     => [
		'search' => esc_html__( 'Search', 'pixelpop' ),
		'cart' => esc_html__( 'Woocommerce Cart', 'pixelpop' ),
		'theme' => esc_html__( 'Switch Theme', 'pixelpop' )
	],
	'active_callback' => [
		[
			'setting'  => 'pixelpop_icon_menu_toggle',
			'operator' => '!==',
			'value'    => false,
		]
	],
] );

  /////////////////////////////////////////////////////////////////////////
 //							MOBILE HEADER SECTION						//
/////////////////////////////////////////////////////////////////////////
PixelPop_Kirki::add_section( 'pixelpop_mobile_header_section', array(
    'title'          => esc_html__( 'Mobile Header', 'pixelpop' ),
    'section'          => 'pixelpop_primary_header_section',
) );

PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'        => 'toggle',
	'settings'    => 'sticky_mobile_header_toggle',
	'label'       => esc_html__( 'Sticky Header', 'pixelpop' ),
	'section'     => 'pixelpop_mobile_header_section',
	'default'     => '1',
] );

PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'        => 'custom',
	'settings'    => 'pixelpop_title_mobile_logo',
	'section'     => 'pixelpop_mobile_header_section',
		'default'         => '<h3 class="ppop-customizer-custom-heading">' . __( 'Mobile Logo', 'pixelpop' ) . '</h3>',
] );

PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'        => 'image',
	'settings'    => 'pixelpop_mobile_logo',
	'label'       => esc_html__( 'Mobile Logo', 'pixelpop' ),
	'description' => esc_html__( 'Upload a different logo for mobile device.', 'pixelpop' ),
	'section'     => 'pixelpop_mobile_header_section',
	'default'     => '',
] );

PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'        => 'slider',
	'settings'    => 'pixelpop_mobile_logo_height',
	'label'       => esc_html__( 'Logo Height', 'pixelpop' ),
	'section'     => 'pixelpop_mobile_header_section',
	'default'     => 34,
	'choices'     => [
		'min'  => 0,
		'max'  => 200,
		'step' => 1,
	],
	'output' => array(
		array(
			'element'  => '.ppop-header-logo img',
			'property' => 'height',
			'units'	   => 'px',
			'media_query' => '@media (max-width: 767px)',
		),
		array(
			'element'  => '.ppop-header-logo.svg-logo a svg',
			'property' => 'height',
			'units'	   => 'px',
			'media_query' => '@media (max-width: 767px)',
		),
		array(
			'element'  => '.ppop-mobile-header-logo img',
			'property' => 'height',
			'units'	   => 'px',
			'media_query' => '@media (max-width: 767px)',
		),
		array(
			'element'  => '.ppop-transparent-header-logo img',
			'property' => 'height',
			'units'	   => 'px',
			'media_query' => '@media (max-width: 767px)',
		),
	),
	'transport' => 'postMessage',
] );

PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'        => 'custom',
	'settings'    => 'pixelpop_title_mobile_title_tagline',
	'section'     => 'pixelpop_mobile_header_section',
		'default'         => '<h3 class="ppop-customizer-custom-heading">' . __( 'Title & Tagline', 'pixelpop' ) . '</h3>',
] );

PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'        => 'checkbox',
	'settings'    => 'pixelpop_mobile_hide_title',
	'label'       => esc_html__( 'Hide Title', 'pixelpop' ),
	'section'     => 'pixelpop_mobile_header_section',
	'default'     => false,
	'active_callback' => [
		[
			'setting'  => 'pixelpop_hide_title',
			'operator' => '!==',
			'value'    => true,
		]
	],
] );

PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'        => 'checkbox',
	'settings'    => 'pixelpop_mobile_hide_tagline',
	'label'       => esc_html__( 'Hide Tagline', 'pixelpop' ),
	'section'     => 'pixelpop_mobile_header_section',
	'default'     => true,
	'active_callback' => [
		[
			'setting'  => 'pixelpop_hide_tagline',
			'operator' => '!==',
			'value'    => true,
		]
	],
] );

PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'        => 'custom',
	'settings'    => 'pixelpop_title_mobile_icons',
	'section'     => 'pixelpop_mobile_header_section',
		'default'         => '<h3 class="ppop-customizer-custom-heading">' . __( 'Mobile Icons', 'pixelpop' ) . '</h3>',
] );

PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'        => 'checkbox',
	'settings'    => 'pixelpop_mobile_header_cart_icon',
	'label'       => esc_html__( 'WooCommerce Cart Icon', 'pixelpop' ),
	'section'     => 'pixelpop_mobile_header_section',
	'default'     => true,
] );

PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'        => 'checkbox',
	'settings'    => 'pixelpop_mobile_menu_theme_icon',
	'label'       => esc_html__( 'Theme Switch Icon in menu', 'pixelpop' ),
	'section'     => 'pixelpop_mobile_header_section',
	'default'     => true,
] );

PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'        => 'custom',
	'settings'    => 'pixelpop_title_mobile_menu',
	'section'     => 'pixelpop_mobile_header_section',
		'default'         => '<h3 class="ppop-customizer-custom-heading">' . __( 'Mobile Menu', 'pixelpop' ) . '</h3>',
] );

PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'        => 'checkbox',
	'settings'    => 'pixelpop_mobile_menu_search',
	'label'       => esc_html__( 'Search in menu', 'pixelpop' ),
	'section'     => 'pixelpop_mobile_header_section',
	'default'     => true,
] );

PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'        => 'checkbox',
	'settings'    => 'pixelpop_mobile_menu_buttons',
	'label'       => esc_html__( 'Header buttons in menu', 'pixelpop' ),
	'section'     => 'pixelpop_mobile_header_section',
	'default'     => true,
] );


  /////////////////////////////////////////////////////////////////////////
 //						TRANSPARENT HEADER SECTION						//
/////////////////////////////////////////////////////////////////////////
PixelPop_Kirki::add_section( 'pixelpop_transparent_header_section', array(
    'title'          => esc_html__( 'Transparent Header', 'pixelpop' ),
    'panel'          => 'pixelpop_header_settings_panel',
    'priority'       => 50,
) );

PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'        => 'custom',
	'settings'    => 'pixelpop_title_transparent_header_logo',
	'section'     => 'pixelpop_transparent_header_section',
		'default'         => '<h3 class="ppop-customizer-custom-heading">' . __( 'Logo', 'pixelpop' ) . '</h3>',
] );

PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'        => 'image',
	'settings'    => 'pixelpop_transparent_header_logo',
	'label'       => esc_html__( 'Transparent Header Logo', 'pixelpop' ),
	'description' => esc_html__( 'Upload a different logo for transparent header.', 'pixelpop' ),
	'section'     => 'pixelpop_transparent_header_section',
	'default'     => '',
] );

PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'        => 'custom',
	'settings'    => 'pixelpop_title_transparent_header_colors',
	'section'     => 'pixelpop_transparent_header_section',
		'default'         => '<h3 class="ppop-customizer-custom-heading">' . __( 'Colors', 'pixelpop' ) . '</h3>',
] );

PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'        => 'color',
	'settings'    => 'pixelpop_transparent_header_site_title_color',
	'label'       => __( 'Site Title Color', 'pixelpop' ),
	'section'     => 'pixelpop_transparent_header_section',
	'default'     => '#fff',
	'choices'     => [
		'alpha' => true,
	],
	'output' => array(
		array(
			'element'  => '.site-header.transparent-header .site-branding .site-title',
			'property' => 'color',
			'media_query' => '@media (min-width: 768px)',
		),
	),
	'transport' => 'auto',
] );

PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'        => 'color',
	'settings'    => 'pixelpop_transparent_header_site_tagline_color',
	'label'       => __( 'Site Tagline Color', 'pixelpop' ),
	'section'     => 'pixelpop_transparent_header_section',
	'default'     => '#eee',
	'choices'     => [
		'alpha' => true,
	],
	'output' => array(
		array(
			'element'  => '.site-header.transparent-header .site-branding .site-description',
			'property' => 'color',
			'media_query' => '@media (min-width: 768px)',
		),
	),
	'transport' => 'auto',
] );

PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'        => 'color',
	'settings'    => 'pixelpop_transparent_header_menu_color',
	'label'       => __( 'Menu Color', 'pixelpop' ),
	'section'     => 'pixelpop_transparent_header_section',
	'default'     => '#fff',
	'choices'     => [
		'alpha' => true,
	],
	'output' => array(
		array(
			'element'  => '.site-header.transparent-header .main-navigation li a',
			'property' => 'color',
			'media_query' => '@media (min-width: 768px)',
		),
		array(
			'element'  => '.site-header.transparent-header .icon-navigation .icon-menu .icon-menu-item a',
			'property' => 'color',
			'media_query' => '@media (min-width: 768px)',
		),
		array(
			'element'  => '.site-header.transparent-header .icon-navigation .icon-menu .icon-menu-item i',
			'property' => 'color',
			'media_query' => '@media (min-width: 768px)',
		),
	),
	'transport' => 'auto',
] );

PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'        => 'color',
	'settings'    => 'pixelpop_transparent_header_menu_hover_color',
	'label'       => __( 'Menu Link Hover Color', 'pixelpop' ),
	'section'     => 'pixelpop_transparent_header_section',
	'default'     => '#ddd',
	'choices'     => [
		'alpha' => true,
	],
	'output' => array(
		array(
			'element'  => '.site-header.transparent-header .main-navigation li a:hover',
			'property' => 'color',
			'media_query' => '@media (min-width: 768px)',
		),
		array(
			'element'  => '.site-header.transparent-header .icon-navigation .icon-menu .icon-menu-item a:hover',
			'property' => 'color',
			'media_query' => '@media (min-width: 768px)',
		),
		array(
			'element'  => '.site-header.transparent-header .icon-navigation .icon-menu .icon-menu-item i:hover',
			'property' => 'color',
			'media_query' => '@media (min-width: 768px)',
		),
		array(
			'element'  => '.site-header.transparent-header .icon-navigation .icon-menu .icon-menu-item > span:hover',
			'property' => 'color',
			'media_query' => '@media (min-width: 768px)',
		),
	),
	'transport' => 'auto',
] );

PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'        => 'custom',
	'settings'    => 'pixelpop_title_transparent_bottom_border',
	'section'     => 'pixelpop_transparent_header_section',
		'default'         => '<h3 class="ppop-customizer-custom-heading">' . __( 'Bottom Border', 'pixelpop' ) . '</h3>',
] );

PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'        => 'slider',
	'settings'    => 'pixelpop_transparent_header_bottom_border',
	'label'       => esc_html__( 'Bottom Border Width', 'pixelpop' ),
	'section'     => 'pixelpop_transparent_header_section',
	'default'     => 1,
	'choices'     => [
		'min'  => 0,
		'max'  => 10,
		'step' => 1,
	],
	'output' => array(
		array(
			'element'  => '.site-header.transparent-header',
			'property' => 'border-bottom-width',
			'units'	   => 'px',
			'media_query' => '@media (min-width: 768px)',
		),
	),
	'transport' => 'auto',
] );

PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'        => 'color',
	'settings'    => 'pixelpop_transparent_header_bottom_border_color',
	'label'       => __( 'Menu Link Hover Color', 'pixelpop' ),
	'section'     => 'pixelpop_transparent_header_section',
	'default'     => 'rgba(255,255,255,0.1)',
	'choices'     => [
		'alpha' => true,
	],
	'output' => array(
		array(
			'element'  => '.site-header.transparent-header',
			'property' => 'border-bottom-color',
			'media_query' => '@media (min-width: 768px)',
		),
		array(
			'element'  => '.site-header.transparent-header .ppop-header-account-menu.logged-in:before',
			'property' => 'background',
			'media_query' => '@media (min-width: 768px)',
		),
		array(
			'element'  => '.site-header.transparent-header .ppop-header-account-menu.logged-in:after',
			'property' => 'background',
			'media_query' => '@media (min-width: 768px)',
		),
		array(
			'element'  => '.site-header.preview-primary-layout-center.transparent-header .site-branding:before',
			'property' => 'background',
			'media_query' => '@media (min-width: 768px)',
		),
		array(
			'element'  => '.site-header.primary-layout-center.transparent-header .site-branding:before',
			'property' => 'background',
			'media_query' => '@media (min-width: 768px)',
		),
	),
	'transport' => 'auto',
] );
