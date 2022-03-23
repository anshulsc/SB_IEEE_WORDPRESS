<?php
/**
 * Customizer Controls for Footer.
 *
 * @package pixelpop
 */

// FOOTER SECTION
PixelPop_Kirki::add_panel( 'pixelpop_footer_panel', array(
    'priority'    => 20,
    'title'       => esc_html__( 'Footer Settings', 'pixelpop' ),
) );

PixelPop_Kirki::add_section( 'pixelpop_footer_branding_section', array(
    'title'          => esc_html__( 'Footer Branding', 'pixelpop' ),
    'panel'          => 'pixelpop_footer_panel',
    'priority'       => 10,
) );

PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'        => 'switch',
	'settings'    => 'pixelpop_footer_branding_toggle',
	'label'       => esc_html__( 'Footer Branding', 'pixelpop' ),
	'section'     => 'pixelpop_footer_branding_section',
	'default'     => '1',
	'choices'     => [
		'on'  => esc_html__( 'Enable', 'pixelpop' ),
		'off' => esc_html__( 'Disable', 'pixelpop' ),
	],
] );

PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'        => 'checkbox',
	'settings'    => 'pixelpop_footer_site_title',
	'label'       => esc_html__( 'Site Title', 'pixelpop' ),
	'section'     => 'pixelpop_footer_branding_section',
	'default'     => true,
	'active_callback' => [
		[
			'setting'  => 'pixelpop_footer_branding_toggle',
			'operator' => '===',
			'value'    => true,
		]
	],
] );

PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'        => 'checkbox',
	'settings'    => 'pixelpop_footer_site_tagline',
	'label'       => esc_html__( 'Site Tagline', 'pixelpop' ),
	'section'     => 'pixelpop_footer_branding_section',
	'default'     => true,
	'active_callback' => [
		[
			'setting'  => 'pixelpop_footer_branding_toggle',
			'operator' => '===',
			'value'    => true,
		]
	],
] );

PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'        => 'image',
	'settings'    => 'pixelpop_footer_logo',
	'label'       => esc_html__( 'Footer Logo', 'pixelpop' ),
	'section'     => 'pixelpop_footer_branding_section',
	'default'     => '',
	'active_callback' => [
		[
			'setting'  => 'pixelpop_footer_branding_toggle',
			'operator' => '===',
			'value'    => true,
		]
	],
] );

PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'        => 'slider',
	'settings'    => 'pixelpop_footer_logo_width',
	'label'       => esc_html__( 'Logo Width', 'pixelpop' ),
	'section'     => 'pixelpop_footer_branding_section',
	'default'     => 150,
	'choices'     => [
		'min'  => 0,
		'max'  => 1000,
		'step' => 1,
	],
	'output' => array(
		array(
			'element'  => '.ppop-footer-logo img',
			'property' => 'width',
			'units'	   => 'px',
		),
	),
	'transport' => 'postMessage',
	'active_callback' => [
		[
			'setting'  => 'pixelpop_footer_branding_toggle',
			'operator' => '===',
			'value'    => true,
		],
		[
			'setting'  => 'pixelpop_footer_logo',
			'operator' => '!==',
			'value'    => '',
		]
	],
] );

PixelPop_Kirki::add_section( 'pixelpop_footer_social_section', array(
    'title'          => esc_html__( 'Social Icons', 'pixelpop' ),
    'panel'          => 'pixelpop_footer_panel',
    'priority'       => 20,
) );

PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'        => 'custom',
	'settings'    => 'pixelpop_info_footer_social_icons',
	'section'     => 'pixelpop_footer_social_section',
	'default'     => '<p class="ppop-customizer-custom-info">' . __( 'Social Links settings are available in this section - ', 'pixelpop' ) . '<strong>' . __( 'Global Settings > Social Follow', 'pixelpop' ) . '</strong>.</p>',
] );

PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'        => 'switch',
	'settings'    => 'pixelpop_footer_social_icons_toggle',
	'label'       => esc_html__( 'Social Icons', 'pixelpop' ),
	'section'     => 'pixelpop_footer_social_section',
	'default'     => '0',
	'choices'     => [
		'on'  => esc_html__( 'Enable', 'pixelpop' ),
		'off' => esc_html__( 'Disable', 'pixelpop' ),
	],
] );

PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'        => 'select',
	'settings'    => 'pixelpop_footer_social_icons_location',
	'label'       => esc_html__( 'Location', 'pixelpop' ),
	'section'     => 'pixelpop_footer_social_section',
	'default'     => 'footer-branding',
	'placeholder' => esc_html__( 'Select a location...', 'pixelpop' ),
	'choices'     => [
		'footer-branding' => esc_html__( 'Footer Branding', 'pixelpop' ),
		'footer-info' => esc_html__( 'Footer Info', 'pixelpop' ),
	],
	'multiple'    => 0,
	'active_callback' => [
		[
			'setting'  => 'pixelpop_footer_social_icons_toggle',
			'operator' => '===',
			'value'    => true,
		],
	],
] );

PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'        => 'slider',
	'settings'    => 'pixelpop_footer_branding_social_icons_height_width',
	'label'       => esc_html__( 'Height & Width', 'pixelpop' ),
	'section'     => 'pixelpop_footer_social_section',
	'default'     => 30,
	'choices'     => [
		'min'  	 => 0,
		'max'  	 => 60,
		'step'	 => 1,
		'suffix' => 'px',
	],
	'output' => array(
		array(
			'element'  => '.ppop-footer-branding .ppop-social-follow-buttons-wrap .ppop-social-icons li a',
			'property' => 'height',
			'units'	   => 'px',
		),
		array(
			'element'  => '.ppop-footer-branding .ppop-social-follow-buttons-wrap .ppop-social-icons li a',
			'property' => 'width',
			'units'	   => 'px',
		),

		array(
			'element'  => '.ppop-footer-branding .ppop-social-follow-buttons-wrap .ppop-social-icons li a i:before',
			'property' => 'line-height',
			'units'	   => 'px',
		),
	),
	'transport' => 'auto',
	'active_callback' => [
		[
			'setting'  => 'pixelpop_footer_social_icons_toggle',
			'operator' => '===',
			'value'    => true,
		],
		[
			'setting'  => 'pixelpop_footer_social_icons_location',
			'operator' => '===',
			'value'    => 'footer-branding',
		]
	],
] );

PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'        => 'slider',
	'settings'    => 'pixelpop_footer_branding_social_icons_font_size',
	'label'       => esc_html__( 'Font Size', 'pixelpop' ),
	'section'     => 'pixelpop_footer_social_section',
	'default'     => 18,
	'choices'     => [
		'min'  	 => 0,
		'max'  	 => 30,
		'step'	 => 1,
		'suffix' => 'px',
	],
	'output' => array(
		array(
			'element'  => '.ppop-footer-branding .ppop-social-follow-buttons-wrap .ppop-social-icons li a',
			'property' => 'font-size',
			'units'	   => 'px',
		),
	),
	'transport' => 'auto',
	'active_callback' => [
		[
			'setting'  => 'pixelpop_footer_social_icons_toggle',
			'operator' => '===',
			'value'    => true,
		],
		[
			'setting'  => 'pixelpop_footer_social_icons_location',
			'operator' => '===',
			'value'    => 'footer-branding',
		]
	],
] );

PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'        => 'slider',
	'settings'    => 'pixelpop_footer_branding_social_icons_spacing',
	'label'       => esc_html__( 'Spacing', 'pixelpop' ),
	'section'     => 'pixelpop_footer_social_section',
	'default'     => 5,
	'choices'     => [
		'min'  	 => 0,
		'max'  	 => 20,
		'step'	 => 1,
		'suffix' => 'px',
	],
	'output' => array(
		array(
			'element'  => '.ppop-footer-branding .ppop-social-follow-buttons-wrap .ppop-social-icons li',
			'property' => 'margin',
			'units'	   => 'px',
		),
	),
	'transport' => 'auto',
	'active_callback' => [
		[
			'setting'  => 'pixelpop_footer_social_icons_toggle',
			'operator' => '===',
			'value'    => true,
		],
		[
			'setting'  => 'pixelpop_footer_social_icons_location',
			'operator' => '===',
			'value'    => 'footer-branding',
		]
	],
] );

PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'        => 'dimensions',
	'settings'    => 'pixelpop_footer_branding_social_icons_margin',
	'label'       => esc_html__( 'Margin', 'pixelpop' ),
	'section'     => 'pixelpop_footer_social_section',
	'default'     => [
		'top'    => '20px',
		'right'  => '0px',
		'bottom' => '0px',
		'left'   => '0px',
	],
	'transport' => 'auto',
	'output'      => array(
		array(
			'element'     => '.ppop-footer-branding .ppop-social-follow-buttons-wrap',
			'property'    => 'margin',
		),
	),
	'active_callback' => [
		[
			'setting'  => 'pixelpop_footer_social_icons_toggle',
			'operator' => '===',
			'value'    => true,
		],
		[
			'setting'  => 'pixelpop_footer_social_icons_location',
			'operator' => '===',
			'value'    => 'footer-branding',
		]
	],
] );

PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'        => 'dimensions',
	'settings'    => 'pixelpop_footer_branding_social_icons_padding',
	'label'       => esc_html__( 'Padding', 'pixelpop' ),
	'section'     => 'pixelpop_footer_social_section',
	'default'     => [
		'top'    => '0px',
		'right'  => '0px',
		'bottom' => '0px',
		'left'   => '0px',
	],
	'transport' => 'auto',
	'output'      => array(
		array(
			'element'     => '.ppop-footer-branding .ppop-social-follow-buttons-wrap',
			'property'    => 'padding',
		),
	),
	'active_callback' => [
		[
			'setting'  => 'pixelpop_footer_social_icons_toggle',
			'operator' => '===',
			'value'    => true,
		],
		[
			'setting'  => 'pixelpop_footer_social_icons_location',
			'operator' => '===',
			'value'    => 'footer-branding',
		]
	],
]);

PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'        => 'slider',
	'settings'    => 'pixelpop_footer_info_social_icons_height_width',
	'label'       => esc_html__( 'Height & Width', 'pixelpop' ),
	'section'     => 'pixelpop_footer_social_section',
	'default'     => 26,
	'choices'     => [
		'min'  	 => 0,
		'max'  	 => 100,
		'step'	 => 1,
		'suffix' => 'px',
	],
	'output' => array(
		array(
			'element'  => '.ppop-footer-info-social .ppop-social-icons li .ppop-social-icon',
			'property' => 'height',
			'units'	   => 'px',
		),
		array(
			'element'  => '.ppop-footer-info-social .ppop-social-icons li .ppop-social-icon',
			'property' => 'width',
			'units'	   => 'px',
		),

		array(
			'element'  => '.ppop-footer-info-social .ppop-social-icons li .ppop-social-icon i:before',
			'property' => 'line-height',
			'units'	   => 'px',
		),
	),
	'transport' => 'auto',
	'active_callback' => [
		[
			'setting'  => 'pixelpop_footer_social_icons_toggle',
			'operator' => '===',
			'value'    => true,
		],
		[
			'setting'  => 'pixelpop_footer_social_icons_location',
			'operator' => '===',
			'value'    => 'footer-info',
		]
	],
] );

PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'        => 'slider',
	'settings'    => 'pixelpop_footer_info_social_icons_font_size',
	'label'       => esc_html__( 'Font Size', 'pixelpop' ),
	'section'     => 'pixelpop_footer_social_section',
	'default'     => 14,
	'choices'     => [
		'min'  	 => 0,
		'max'  	 => 30,
		'step'	 => 1,
		'suffix' => 'px',
	],
	'output' => array(
		array(
			'element'  => '.ppop-footer-info-social .ppop-social-icons li .ppop-social-icon',
			'property' => 'font-size',
			'units'	   => 'px',
		),
	),
	'transport' => 'auto',
	'active_callback' => [
		[
			'setting'  => 'pixelpop_footer_social_icons_toggle',
			'operator' => '===',
			'value'    => true,
		],
		[
			'setting'  => 'pixelpop_footer_social_icons_location',
			'operator' => '===',
			'value'    => 'footer-info',
		]
	],
] );

PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'        => 'slider',
	'settings'    => 'pixelpop_footer_info_social_icons_spacing',
	'label'       => esc_html__( 'Spacing', 'pixelpop' ),
	'section'     => 'pixelpop_footer_social_section',
	'default'     => 5,
	'choices'     => [
		'min'  	 => 0,
		'max'  	 => 20,
		'step'	 => 1,
		'suffix' => 'px',
	],
	'output' => array(
		array(
			'element'  => '.ppop-footer-info-social .ppop-social-icons li',
			'property' => 'margin',
			'units'	   => 'px',
		),
	),
	'transport' => 'auto',
	'active_callback' => [
		[
			'setting'  => 'pixelpop_footer_social_icons_toggle',
			'operator' => '===',
			'value'    => true,
		],
		[
			'setting'  => 'pixelpop_footer_social_icons_location',
			'operator' => '===',
			'value'    => 'footer-info',
		]
	],
] );

PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'        => 'dimensions',
	'settings'    => 'pixelpop_footer_info_social_icons_margin',
	'label'       => esc_html__( 'Margin', 'pixelpop' ),
	'section'     => 'pixelpop_footer_social_section',
	'default'     => [
		'top'  => '0px',
		'right' => '0px',
		'bottom'  => '0px',
		'left' => '0px',
	],
	'transport' => 'auto',
	'output'      => array(
		array(
			'element'     => '.ppop-footer-info .ppop-footer-info-social',
			'property'    => 'margin',
		),
	),
	'active_callback' => [
		[
			'setting'  => 'pixelpop_footer_social_icons_toggle',
			'operator' => '===',
			'value'    => true,
		],
		[
			'setting'  => 'pixelpop_footer_social_icons_location',
			'operator' => '===',
			'value'    => 'footer-info',
		]
	],
] );

PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'        => 'dimensions',
	'settings'    => 'pixelpop_footer_info_social_icons_padding',
	'label'       => esc_html__( 'Padding', 'pixelpop' ),
	'section'     => 'pixelpop_footer_social_section',
	'default'     => [
		'top'    => '0px',
		'right'  => '0px',
		'bottom' => '0px',
		'left'   => '0px',
	],
	'transport' => 'auto',
	'output'      => array(
		array(
			'element'     => '.ppop-footer-info .ppop-footer-info-social',
			'property'    => 'padding',
		),
	),
	'active_callback' => [
		[
			'setting'  => 'pixelpop_footer_social_icons_toggle',
			'operator' => '===',
			'value'    => true,
		],
		[
			'setting'  => 'pixelpop_footer_social_icons_location',
			'operator' => '===',
			'value'    => 'footer-info',
		]
	],
]);

PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'        => 'radio-buttonset',
	'settings'    => 'pixelpop_footer_social_icons_position',
	'label'       => esc_html__( 'Position', 'pixelpop' ),
	'section'     => 'pixelpop_footer_social_section',
	'default'     => 'right',
	'choices'     => [
		'left' 	=> esc_html__( 'Left', 'pixelpop' ),
		'right'	=> esc_html__( 'Right', 'pixelpop' ),
	],
	'active_callback' => [
		[
			'setting'  => 'pixelpop_footer_social_icons_toggle',
			'operator' => '===',
			'value'    => true,
		],
		[
			'setting'  => 'pixelpop_footer_social_icons_location',
			'operator' => '===',
			'value'    => 'footer-info',
		]
	],
] );

PixelPop_Kirki::add_section( 'pixelpop_footer_widgets_section', array(
    'title'          => esc_html__( 'Footer Widget', 'pixelpop' ),
    'panel'          => 'pixelpop_footer_panel',
    'priority'       => 30,
) );

PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'        => 'switch',
	'settings'    => 'pixelpop_footer_widgets_toggle',
	'label'       => esc_html__( 'Footer Widgets', 'pixelpop' ),
	'section'     => 'pixelpop_footer_widgets_section',
	'default'     => '1',
	'choices'     => [
		'on'  => esc_html__( 'Enable', 'pixelpop' ),
		'off' => esc_html__( 'Disable', 'pixelpop' ),
	],
] );

PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'        => 'radio-buttonset',
	'settings'    => 'pixelpop_footer_widgets_column',
	'label'       => esc_html__( 'Columns', 'pixelpop' ),
	'section'     => 'pixelpop_footer_widgets_section',
	'default'     => '4',
	'choices'     => [
		'1' => esc_html__( '1', 'pixelpop' ),
		'2'	=> esc_html__( '2', 'pixelpop' ),
		'3' => esc_html__( '3', 'pixelpop' ),
		'4'	=> esc_html__( '4', 'pixelpop' ),
		'5' => esc_html__( '5', 'pixelpop' ),
		'6'	=> esc_html__( '6', 'pixelpop' ),
	],
	'active_callback' => [
		[
			'setting'  => 'pixelpop_footer_widgets_toggle',
			'operator' => '===',
			'value'    => true,
		],
	],
] );
