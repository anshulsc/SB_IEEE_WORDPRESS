<?php
/**
 * Global Customizer Controls.
 *
 * @package pixelpop
 */

PixelPop_Kirki::add_config( 'pixelpop_customizer', array(
	'capability'    => 'edit_theme_options',
	'option_type'   => 'theme_mod',
) );


    //////////////////////////////////////////////////////////////////////////////////////
   //////////////////////////////////////////////////////////////////////////////////////
  //								GLOBAL SETTINGS 								  //
 //////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////

// GLOBAL PANEL
PixelPop_Kirki::add_panel( 'pixelpop_global_settings_panel', array(
    'priority'    => 5,
    'title'       => esc_html__( 'Global Settings', 'pixelpop' ),
) );

  /////////////////////////////////////////////////////////////////////////
 //								SITE IDENTITY							//
/////////////////////////////////////////////////////////////////////////



  /////////////////////////////////////////////////////////////////////////
 //								CONTAINER								//
/////////////////////////////////////////////////////////////////////////

PixelPop_Kirki::add_section( 'pixelpop_container_section', array(
    'title'          => esc_html__( 'Container', 'pixelpop' ),
    'panel'          => 'pixelpop_global_settings_panel',
    'priority'       => 20,
) );

PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'        => 'slider',
	'settings'    => 'pixelpop_container_width',
	'label'       => esc_html__( 'Container Width', 'pixelpop' ),
	'section'     => 'pixelpop_container_section',
	'default'     => 1200,
	'choices'     => [
		'min'  	 => 0,
		'max'  	 => 2000,
		'step'	 => 1,
		'suffix' => 'px',
	],
	'output' => array(
		array(
			'element'  => '.col-full',
			'property' => 'max-width',
			'units'	   => 'px',
		),
	),
	'transport' => 'postMessage',
] );

PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'        => 'slider',
	'settings'    => 'pixelpop_narrow_content_max_width',
	'label'       => esc_html__( 'Narrow Content Max Width', 'pixelpop' ),
	'section'     => 'pixelpop_container_section',
	'default'     => 750,
	'choices'     => [
		'min'  	 => 0,
		'max'  	 => 2000,
		'step'	 => 1,
		'suffix' => 'px',
	],
	'output' => array(
		array(
			'element'  => '.ppop-layout-narrow-content .content-area',
			'property' => 'max-width',
			'units'	   => 'px',
		),
	),
	'transport' => 'postMessage',
] );

PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'        => 'custom',
	'settings'    => 'pixelpop_title_container_spacing',
	'section'     => 'pixelpop_container_section',
	'default'         => '<h3 class="ppop-customizer-custom-heading top-space-30 bottom-space-10">' . __( 'Container Spacing', 'pixelpop' ) . '</h3>',
] );

PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'        => 'custom',
	'settings'    => 'pixelpop_title_spacing_desktop',
	'section'     => 'pixelpop_container_section',
	'default'         => '<h3 style="margin-bottom: -12px; padding: 10px; padding-bottom: 13px;" class="ppop-ppop-customizer-small-heading">' . __( 'Desktop Spacing', 'pixelpop' ) . '</h3>',
] );

PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'        => 'slider',
	'settings'    => 'pixelpop_container_top_bottom_padding_desktop',
	'label'       => esc_html__( 'Top & Bottom Spacing', 'pixelpop' ),
	'section'     => 'pixelpop_container_section',
	'default'     => 30,
	'choices'     => [
		'min'    => 0,
		'max'    => 200,
		'step'   => 1,
		'suffix' => 'px',
	],
	'output' => array(
		array(
			'element'  => 'body.pixelpop-theme',
			'property' => '--container-vertical-spacing',
			'units'    => 'px',
		),
	),
	'transport' => 'auto',
] );

PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'        => 'slider',
	'settings'    => 'pixelpop_container_let_right_padding_desktop',
	'label'       => esc_html__( 'Left & Right Spacing', 'pixelpop' ),
	'section'     => 'pixelpop_container_section',
	'default'     => 30,
	'choices'     => [
		'min'  	 => 0,
		'max'  	 => 200,
		'step'	 => 1,
		'suffix' => 'px',
	],
	'output' => array(
		array(
			'element'  => 'body.pixelpop-theme',
			'property' => '--container-horizontal-spacing',
			'units'	   => 'px',
		),
	),
	'transport' => 'auto',
] );

PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'        => 'custom',
	'settings'    => 'pixelpop_title_spacing_tablet',
	'section'     => 'pixelpop_container_section',
	'default'         => '<h3 style="margin-top: 15px; margin-bottom: -12px; padding: 10px; padding-bottom: 13px;" class="ppop-ppop-customizer-small-heading">' . __( 'Tablet Spacing', 'pixelpop' ) . '</h3>',
] );

PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'        => 'slider',
	'settings'    => 'pixelpop_container_top_bottom_padding_tablet',
	'label'       => esc_html__( 'Top & Bottom Spacing', 'pixelpop' ),
	'section'     => 'pixelpop_container_section',
	'default'     => 20,
	'choices'     => [
		'min'  	 => 0,
		'max'  	 => 200,
		'step'	 => 1,
		'suffix' => 'px',
	],
	'output' => array(
		array(
			'element'  => 'body.pixelpop-theme',
			'property' => '--container-vertical-spacing',
			'units'    => 'px',
			'media_query' => '@media (max-width: 767px) and (min-width: 500px)',
		),
	),
	'transport' => 'auto',
] );

PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'        => 'slider',
	'settings'    => 'pixelpop_container_let_right_padding_tablet',
	'label'       => esc_html__( 'Left & Right Spacing', 'pixelpop' ),
	'section'     => 'pixelpop_container_section',
	'default'     => 20,
	'choices'     => [
		'min'  	 => 0,
		'max'  	 => 200,
		'step'	 => 1,
		'suffix' => 'px',
	],
	'output' => array(
		array(
			'element'  => 'body.pixelpop-theme',
			'property' => '--container-horizontal-spacing',
			'units'	   => 'px',
			'media_query' => '@media (max-width: 767px) and (min-width: 500px)',
		),
	),
	'transport' => 'auto',
] );

PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'        => 'custom',
	'settings'    => 'pixelpop_title_spacing_mobile',
	'section'     => 'pixelpop_container_section',
	'default'         => '<h3 style="margin-top: 15px; margin-bottom: -12px; padding: 10px; padding-bottom: 13px;" class="ppop-ppop-customizer-small-heading">' . __( 'Mobile Spacing', 'pixelpop' ) . '</h3>',
] );

PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'        => 'slider',
	'settings'    => 'pixelpop_container_top_bottom_padding_mobile',
	'label'       => esc_html__( 'Top & Bottom Spacing', 'pixelpop' ),
	'section'     => 'pixelpop_container_section',
	'default'     => 15,
	'choices'     => [
		'min'  	 => 0,
		'max'  	 => 200,
		'step'	 => 1,
		'suffix' => 'px',
	],
	'output' => array(
		array(
			'element'  => 'body.pixelpop-theme',
			'property' => '--container-vertical-spacing',
			'units'    => 'px',
			'media_query' => '@media (max-width: 500px)',
		),
	),
	'transport' => 'auto',
] );

PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'        => 'slider',
	'settings'    => 'pixelpop_container_let_right_padding_mobile',
	'label'       => esc_html__( 'Left & Right Spacing', 'pixelpop' ),
	'section'     => 'pixelpop_container_section',
	'default'     => 15,
	'choices'     => [
		'min'  	 => 0,
		'max'  	 => 200,
		'step'	 => 1,
		'suffix' => 'px',
	],
	'output' => array(
		array(
			'element'  => 'body.pixelpop-theme',
			'property' => '--container-horizontal-spacing',
			'units'	   => 'px',
			'media_query' => '@media (max-width: 500px)',
		),
	),
	'transport' => 'auto',
] );


  /////////////////////////////////////////////////////////////////////////
 //								TYPOGRAPHY								//
/////////////////////////////////////////////////////////////////////////

PixelPop_Kirki::add_section( 'pixelpop_typography_section', array(
    'title'          => esc_html__( 'Typography', 'pixelpop' ),
    'panel'          => 'pixelpop_global_settings_panel',
    'priority'       => 30,
) );

PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'        => 'custom',
	'settings'    => 'pixelpop_empty_typography',
	'section'     => 'pixelpop_typography_section',
	'default'         => '',
] );

PixelPop_Kirki::add_section( 'pixelpop_base_typography_section', array(
    'title'          => esc_html__( 'Base Typography', 'pixelpop' ),
    'section'          => 'pixelpop_typography_section',
    'priority'       => 10,
) );

PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'        => 'typography',
	'settings'    => 'pixelpop_base_typography_setting',
	'label'       => esc_html__( 'Base Typography', 'pixelpop' ),
	'section'     => 'pixelpop_base_typography_section',
	'default'     => [
		'font-family'    => 'Nunito',
		'variant'        => 'regular',
		'font-size'      => '16px',
		'line-height'    => '1.5',
		'letter-spacing' => '0',
	],
	'priority'    => 10,
	'transport'   => 'auto',
	'output'      => [
		[
			'element' => 'body',
		],
	],
] );

PixelPop_Kirki::add_section( 'pixelpop_heading_typography_section', array(
    'title'          => esc_html__( 'Heading Typography', 'pixelpop' ),
    'section'          => 'pixelpop_typography_section',
    'priority'       => 10,
) );

PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'        => 'typography',
	'settings'    => 'pixelpop_h1_typography',
	'label'       => esc_html__( 'H1 Typography', 'pixelpop' ),
	'section'     => 'pixelpop_heading_typography_section',
	'default'     => [
		'font-family'    => 'inherit',
		'variant'        => '500',
		'font-size'      => '32px',
		'line-height'    => '1.4',
		'letter-spacing' => '0',
		'text-transform' => 'none',
	],
	'priority'    => 10,
	'transport'   => 'auto',
	'output'      => [
		[
			'element' => 'h1',
		],
	],
] );

PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'        => 'typography',
	'settings'    => 'pixelpop_h2_typography',
	'label'       => esc_html__( 'H2 Typography', 'pixelpop' ),
	'section'     => 'pixelpop_heading_typography_section',
	'default'     => [
		'font-family'    => 'inherit',
		'variant'        => '500',
		'font-size'      => '26px',
		'line-height'    => '1.4',
		'letter-spacing' => '0',
		'text-transform' => 'none',
	],
	'priority'    => 10,
	'transport'   => 'auto',
	'output'      => [
		[
			'element' => 'h2',
		],
	],
] );

PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'        => 'typography',
	'settings'    => 'pixelpop_h3_typography',
	'label'       => esc_html__( 'H3 Typography', 'pixelpop' ),
	'section'     => 'pixelpop_heading_typography_section',
	'default'     => [
		'font-family'    => 'inherit',
		'variant'        => '600',
		'font-size'      => '20px',
		'line-height'    => '1.4',
		'letter-spacing' => '0',
		'text-transform' => 'none',
	],
	'priority'    => 10,
	'transport'   => 'auto',
	'output'      => [
		[
			'element' => 'h3',
		],
	],
] );

PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'        => 'typography',
	'settings'    => 'pixelpop_h4_typography',
	'label'       => esc_html__( 'H4 Typography', 'pixelpop' ),
	'section'     => 'pixelpop_heading_typography_section',
	'default'     => [
		'font-family'    => 'inherit',
		'variant'        => '600',
		'font-size'      => '18px',
		'line-height'    => '1.4',
		'letter-spacing' => '0',
		'text-transform' => 'none',
	],
	'priority'    => 10,
	'transport'   => 'auto',
	'output'      => [
		[
			'element' => 'h4',
		],
	],
] );

PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'        => 'typography',
	'settings'    => 'pixelpop_h5_typography',
	'label'       => esc_html__( 'H5 Typography', 'pixelpop' ),
	'section'     => 'pixelpop_heading_typography_section',
	'default'     => [
		'font-family'    => 'inherit',
		'variant'        => '800',
		'font-size'      => '13px',
		'line-height'    => '1.4',
		'letter-spacing' => '0.15em',
		'text-transform' => 'uppercase',
	],
	'priority'    => 10,
	'transport'   => 'auto',
	'output'      => [
		[
			'element' => 'h5',
		],
	],
] );

PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'        => 'typography',
	'settings'    => 'pixelpop_h6_typography',
	'label'       => esc_html__( 'H6 Typography', 'pixelpop' ),
	'section'     => 'pixelpop_heading_typography_section',
	'default'     => [
		'font-family'    => 'inherit',
		'variant'        => '800',
		'font-size'      => '15px',
		'line-height'    => '1.4',
		'letter-spacing' => '0',
		'text-transform' => 'none',
	],
	'priority'    => 10,
	'transport'   => 'auto',
	'output'      => [
		[
			'element' => 'h6',
		],
	],
] );


  /////////////////////////////////////////////////////////////////////////
 //								COLORS									//
/////////////////////////////////////////////////////////////////////////

PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'        => 'color',
	'settings'    => 'pixelpop_primary_color',
	'label'       => __( 'Primary Theme Color', 'pixelpop' ),
	'section'     => 'colors',
	'default'     => '#ff5a6e',
	'choices'     => [
		'alpha' => true,
	],
	'output' => array(
		array(
			'element'  => '.ppop-light-theme',
			'property' => '--color-primary',
		),
		array(
			'element'  => '.ppop-dark-theme',
			'property' => '--color-primary',
		),
	),
	'transport' => 'auto',
] );

PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'        => 'color',
	'settings'    => 'pixelpop_secondary_color',
	'label'       => __( 'Secondary Theme Color', 'pixelpop' ),
	'section'     => 'colors',
	'default'     => '#ff8a6e',
	'choices'     => [
		'alpha' => true,
	],
	'output' => array(
		array(
			'element'  => '.ppop-light-theme',
			'property' => '--color-secondary',
		),
		array(
			'element'  => 'html.ppop-dark-theme',
			'property' => '--color-secondary',
		),
	),
	'transport' => 'auto',
] );

PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'        => 'color',
	'settings'    => 'pixelpop_link_color',
	'label'       => __( 'Link Color', 'pixelpop' ),
	'section'     => 'colors',
	'default'     => 'var(--color-primary)',
	'choices'     => [
		'alpha' => true,
	],
	'output' => array(
		array(
			'element'  => ':root',
			'property' => '--color-link',
		),
	),
	'transport' => 'auto',
] );

PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'        => 'color',
	'settings'    => 'pixelpop_link_hover_color',
	'label'       => __( 'Link Hover Color', 'pixelpop' ),
	'section'     => 'colors',
	'default'     => 'var(--color-secondary)',
	'choices'     => [
		'alpha' => true,
	],
	'output' => array(
		array(
			'element'  => ':root',
			'property' => '--color-link-visited',
		),
		array(
			'element'  => ':root',
			'property' => '--color-link-active',
		),
	),
	'transport' => 'auto',
] );


  /////////////////////////////////////////////////////////////////////////
 //								SOCIAL SHARE							//
/////////////////////////////////////////////////////////////////////////

// SOCIAL FOLLOW SECTION
PixelPop_Kirki::add_section( 'pixelpop_social_follow_section', array(
    'title'          => esc_html__( 'Social Follow', 'pixelpop' ),
    'panel'          => 'pixelpop_global_settings_panel',
    'priority'       => 50,
) );

// Facebook
PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'        => 'custom',
	'settings'    => 'pixelpop_social_follow_facebook_icon',
	'section'     => 'pixelpop_social_follow_section',
		'default'         => '<i class="ppop-customizer-social-icon fab fa-facebook-f"></i>',
] );

PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'        => 'toggle',
	'settings'    => 'pixelpop_social_follow_facebook_enable',
	'label'       => esc_html__( 'Facebook', 'pixelpop' ),
	'section'     => 'pixelpop_social_follow_section',
	'default'     => '0',
] );

PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'     => 'link',
	'settings' => 'pixelpop_social_follow_facebook_link',
	'label'    => __( 'Link', 'pixelpop' ),
	'section'  => 'pixelpop_social_follow_section',
	'default'  => '#',
	'active_callback' => [
		[
			'setting'  => 'pixelpop_social_follow_facebook_enable',
			'operator' => '===',
			'value'    => true,
		]
	],
] );


// twitter
PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'        => 'custom',
	'settings'    => 'pixelpop_social_follow_twitter_icon',
	'section'     => 'pixelpop_social_follow_section',
		'default'         => '<i class="ppop-customizer-social-icon fab fa-twitter"></i>',
] );

PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'        => 'toggle',
	'settings'    => 'pixelpop_social_follow_twitter_enable',
	'label'       => esc_html__( 'Twitter', 'pixelpop' ),
	'section'     => 'pixelpop_social_follow_section',
	'default'     => '0',
] );

PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'     => 'link',
	'settings' => 'pixelpop_social_follow_twitter_link',
	'label'    => __( 'Link', 'pixelpop' ),
	'section'  => 'pixelpop_social_follow_section',
	'default'  => '#',
	'active_callback' => [
		[
			'setting'  => 'pixelpop_social_follow_twitter_enable',
			'operator' => '===',
			'value'    => true,
		]
	],
] );


// instagram
PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'        => 'custom',
	'settings'    => 'pixelpop_social_follow_instagram_icon',
	'section'     => 'pixelpop_social_follow_section',
		'default'         => '<i class="ppop-customizer-social-icon fab fa-instagram"></i>',
] );

PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'        => 'toggle',
	'settings'    => 'pixelpop_social_follow_instagram_enable',
	'label'       => esc_html__( 'Instagram', 'pixelpop' ),
	'section'     => 'pixelpop_social_follow_section',
	'default'     => '0',
] );

PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'     => 'link',
	'settings' => 'pixelpop_social_follow_instagram_link',
	'label'    => __( 'Link', 'pixelpop' ),
	'section'  => 'pixelpop_social_follow_section',
	'default'  => '#',
	'active_callback' => [
		[
			'setting'  => 'pixelpop_social_follow_instagram_enable',
			'operator' => '===',
			'value'    => true,
		]
	],
] );


// linkedin
PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'        => 'custom',
	'settings'    => 'pixelpop_social_follow_linkedin_icon',
	'section'     => 'pixelpop_social_follow_section',
		'default'         => '<i class="ppop-customizer-social-icon fab fa-linkedin-in"></i>',
] );

PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'        => 'toggle',
	'settings'    => 'pixelpop_social_follow_linkedin_enable',
	'label'       => esc_html__( 'Linkedin', 'pixelpop' ),
	'section'     => 'pixelpop_social_follow_section',
	'default'     => '0',
] );

PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'     => 'link',
	'settings' => 'pixelpop_social_follow_linkedin_link',
	'label'    => __( 'Link', 'pixelpop' ),
	'section'  => 'pixelpop_social_follow_section',
	'default'  => '#',
	'active_callback' => [
		[
			'setting'  => 'pixelpop_social_follow_linkedin_enable',
			'operator' => '===',
			'value'    => true,
		]
	],
] );


// dribbble
PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'        => 'custom',
	'settings'    => 'pixelpop_social_follow_dribbble_icon',
	'section'     => 'pixelpop_social_follow_section',
		'default'         => '<i class="ppop-customizer-social-icon fab fa-dribbble"></i>',
] );

PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'        => 'toggle',
	'settings'    => 'pixelpop_social_follow_dribbble_enable',
	'label'       => esc_html__( 'Dribbble', 'pixelpop' ),
	'section'     => 'pixelpop_social_follow_section',
	'default'     => '0',
] );

PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'     => 'link',
	'settings' => 'pixelpop_social_follow_dribbble_link',
	'label'    => __( 'Link', 'pixelpop' ),
	'section'  => 'pixelpop_social_follow_section',
	'default'  => '#',
	'active_callback' => [
		[
			'setting'  => 'pixelpop_social_follow_dribbble_enable',
			'operator' => '===',
			'value'    => true,
		]
	],
] );


// pinterest
PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'        => 'custom',
	'settings'    => 'pixelpop_social_follow_pinterest_icon',
	'section'     => 'pixelpop_social_follow_section',
		'default'         => '<i class="ppop-customizer-social-icon fab fa-pinterest-p"></i>',
] );

PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'        => 'toggle',
	'settings'    => 'pixelpop_social_follow_pinterest_enable',
	'label'       => esc_html__( 'Pinterest', 'pixelpop' ),
	'section'     => 'pixelpop_social_follow_section',
	'default'     => '0',
] );

PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'     => 'link',
	'settings' => 'pixelpop_social_follow_pinterest_link',
	'label'    => __( 'Link', 'pixelpop' ),
	'section'  => 'pixelpop_social_follow_section',
	'default'  => '#',
	'active_callback' => [
		[
			'setting'  => 'pixelpop_social_follow_pinterest_enable',
			'operator' => '===',
			'value'    => true,
		]
	],
] );


// tumblr
PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'        => 'custom',
	'settings'    => 'pixelpop_social_follow_tumblr_icon',
	'section'     => 'pixelpop_social_follow_section',
		'default'         => '<i class="ppop-customizer-social-icon fab fa-tumblr"></i>',
] );

PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'        => 'toggle',
	'settings'    => 'pixelpop_social_follow_tumblr_enable',
	'label'       => esc_html__( 'Tumblr', 'pixelpop' ),
	'section'     => 'pixelpop_social_follow_section',
	'default'     => '0',
] );

PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'     => 'link',
	'settings' => 'pixelpop_social_follow_tumblr_link',
	'label'    => __( 'Link', 'pixelpop' ),
	'section'  => 'pixelpop_social_follow_section',
	'default'  => '#',
	'active_callback' => [
		[
			'setting'  => 'pixelpop_social_follow_tumblr_enable',
			'operator' => '===',
			'value'    => true,
		]
	],
] );


// medium
PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'        => 'custom',
	'settings'    => 'pixelpop_social_follow_medium_icon',
	'section'     => 'pixelpop_social_follow_section',
		'default'         => '<i class="ppop-customizer-social-icon fab fa-medium"></i>',
] );

PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'        => 'toggle',
	'settings'    => 'pixelpop_social_follow_medium_enable',
	'label'       => esc_html__( 'Medium', 'pixelpop' ),
	'section'     => 'pixelpop_social_follow_section',
	'default'     => '0',
] );

PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'     => 'link',
	'settings' => 'pixelpop_social_follow_medium_link',
	'label'    => __( 'Link', 'pixelpop' ),
	'section'  => 'pixelpop_social_follow_section',
	'default'  => '#',
	'active_callback' => [
		[
			'setting'  => 'pixelpop_social_follow_medium_enable',
			'operator' => '===',
			'value'    => true,
		]
	],
] );


// meetup
PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'        => 'custom',
	'settings'    => 'pixelpop_social_follow_meetup_icon',
	'section'     => 'pixelpop_social_follow_section',
		'default'         => '<i class="ppop-customizer-social-icon fab fa-meetup"></i>',
] );

PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'        => 'toggle',
	'settings'    => 'pixelpop_social_follow_meetup_enable',
	'label'       => esc_html__( 'Meetup', 'pixelpop' ),
	'section'     => 'pixelpop_social_follow_section',
	'default'     => '0',
] );

PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'     => 'link',
	'settings' => 'pixelpop_social_follow_meetup_link',
	'label'    => __( 'Link', 'pixelpop' ),
	'section'  => 'pixelpop_social_follow_section',
	'default'  => '#',
	'active_callback' => [
		[
			'setting'  => 'pixelpop_social_follow_meetup_enable',
			'operator' => '===',
			'value'    => true,
		]
	],
] );


// quora
PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'        => 'custom',
	'settings'    => 'pixelpop_social_follow_quora_icon',
	'section'     => 'pixelpop_social_follow_section',
		'default'         => '<i class="ppop-customizer-social-icon fab fa-quora"></i>',
] );

PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'        => 'toggle',
	'settings'    => 'pixelpop_social_follow_quora_enable',
	'label'       => esc_html__( 'Quora', 'pixelpop' ),
	'section'     => 'pixelpop_social_follow_section',
	'default'     => '0',
] );

PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'     => 'link',
	'settings' => 'pixelpop_social_follow_quora_link',
	'label'    => __( 'Link', 'pixelpop' ),
	'section'  => 'pixelpop_social_follow_section',
	'default'  => '#',
	'active_callback' => [
		[
			'setting'  => 'pixelpop_social_follow_quora_enable',
			'operator' => '===',
			'value'    => true,
		]
	],
] );


// reddit
PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'        => 'custom',
	'settings'    => 'pixelpop_social_follow_reddit_icon',
	'section'     => 'pixelpop_social_follow_section',
		'default'         => '<i class="ppop-customizer-social-icon fab fa-reddit-alien"></i>',
] );

PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'        => 'toggle',
	'settings'    => 'pixelpop_social_follow_reddit_enable',
	'label'       => esc_html__( 'Reddit', 'pixelpop' ),
	'section'     => 'pixelpop_social_follow_section',
	'default'     => '0',
] );

PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'     => 'link',
	'settings' => 'pixelpop_social_follow_reddit_link',
	'label'    => __( 'Link', 'pixelpop' ),
	'section'  => 'pixelpop_social_follow_section',
	'default'  => '#',
	'active_callback' => [
		[
			'setting'  => 'pixelpop_social_follow_reddit_enable',
			'operator' => '===',
			'value'    => true,
		]
	],
] );


// rss
PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'        => 'custom',
	'settings'    => 'pixelpop_social_follow_rss_icon',
	'section'     => 'pixelpop_social_follow_section',
		'default'         => '<i class="ppop-customizer-social-icon fas fa-rss"></i>',
] );

PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'        => 'toggle',
	'settings'    => 'pixelpop_social_follow_rss_enable',
	'label'       => esc_html__( 'RSS', 'pixelpop' ),
	'section'     => 'pixelpop_social_follow_section',
	'default'     => '0',
] );

PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'     => 'link',
	'settings' => 'pixelpop_social_follow_rss_link',
	'label'    => __( 'Link', 'pixelpop' ),
	'section'  => 'pixelpop_social_follow_section',
	'default'  => '#',
	'active_callback' => [
		[
			'setting'  => 'pixelpop_social_follow_rss_enable',
			'operator' => '===',
			'value'    => true,
		]
	],
] );


// skype
PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'        => 'custom',
	'settings'    => 'pixelpop_social_follow_skype_icon',
	'section'     => 'pixelpop_social_follow_section',
		'default'         => '<i class="ppop-customizer-social-icon fab fa-skype"></i>',
] );

PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'        => 'toggle',
	'settings'    => 'pixelpop_social_follow_skype_enable',
	'label'       => esc_html__( 'Skype', 'pixelpop' ),
	'section'     => 'pixelpop_social_follow_section',
	'default'     => '0',
] );

PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'     => 'link',
	'settings' => 'pixelpop_social_follow_skype_link',
	'label'    => __( 'Link', 'pixelpop' ),
	'section'  => 'pixelpop_social_follow_section',
	'default'  => '#',
	'active_callback' => [
		[
			'setting'  => 'pixelpop_social_follow_skype_enable',
			'operator' => '===',
			'value'    => true,
		]
	],
] );


// vimeo
PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'        => 'custom',
	'settings'    => 'pixelpop_social_follow_vimeo_icon',
	'section'     => 'pixelpop_social_follow_section',
		'default'         => '<i class="ppop-customizer-social-icon fab fa-vimeo"></i>',
] );

PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'        => 'toggle',
	'settings'    => 'pixelpop_social_follow_vimeo_enable',
	'label'       => esc_html__( 'Vimeo', 'pixelpop' ),
	'section'     => 'pixelpop_social_follow_section',
	'default'     => '0',
] );

PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'     => 'link',
	'settings' => 'pixelpop_social_follow_vimeo_link',
	'label'    => __( 'Link', 'pixelpop' ),
	'section'  => 'pixelpop_social_follow_section',
	'default'  => '#',
	'active_callback' => [
		[
			'setting'  => 'pixelpop_social_follow_vimeo_enable',
			'operator' => '===',
			'value'    => true,
		]
	],
] );


// vk
PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'        => 'custom',
	'settings'    => 'pixelpop_social_follow_vk_icon',
	'section'     => 'pixelpop_social_follow_section',
		'default'         => '<i class="ppop-customizer-social-icon fab fa-vk"></i>',
] );

PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'        => 'toggle',
	'settings'    => 'pixelpop_social_follow_vk_enable',
	'label'       => esc_html__( 'VK', 'pixelpop' ),
	'section'     => 'pixelpop_social_follow_section',
	'default'     => '0',
] );

PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'     => 'link',
	'settings' => 'pixelpop_social_follow_vk_link',
	'label'    => __( 'Link', 'pixelpop' ),
	'section'  => 'pixelpop_social_follow_section',
	'default'  => '#',
	'active_callback' => [
		[
			'setting'  => 'pixelpop_social_follow_vk_enable',
			'operator' => '===',
			'value'    => true,
		]
	],
] );


// xing
PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'        => 'custom',
	'settings'    => 'pixelpop_social_follow_xing_icon',
	'section'     => 'pixelpop_social_follow_section',
		'default'         => '<i class="ppop-customizer-social-icon fab fa-xing"></i>',
] );

PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'        => 'toggle',
	'settings'    => 'pixelpop_social_follow_xing_enable',
	'label'       => esc_html__( 'Xing', 'pixelpop' ),
	'section'     => 'pixelpop_social_follow_section',
	'default'     => '0',
] );

PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'     => 'link',
	'settings' => 'pixelpop_social_follow_xing_link',
	'label'    => __( 'Link', 'pixelpop' ),
	'section'  => 'pixelpop_social_follow_section',
	'default'  => '#',
	'active_callback' => [
		[
			'setting'  => 'pixelpop_social_follow_xing_enable',
			'operator' => '===',
			'value'    => true,
		]
	],
] );


// youtube
PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'        => 'custom',
	'settings'    => 'pixelpop_social_follow_youtube_icon',
	'section'     => 'pixelpop_social_follow_section',
		'default'         => '<i class="ppop-customizer-social-icon fab fa-youtube"></i>',
] );

PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'        => 'toggle',
	'settings'    => 'pixelpop_social_follow_youtube_enable',
	'label'       => esc_html__( 'Youtube', 'pixelpop' ),
	'section'     => 'pixelpop_social_follow_section',
	'default'     => '0',
] );

PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'     => 'link',
	'settings' => 'pixelpop_social_follow_youtube_link',
	'label'    => __( 'Link', 'pixelpop' ),
	'section'  => 'pixelpop_social_follow_section',
	'default'  => '#',
	'active_callback' => [
		[
			'setting'  => 'pixelpop_social_follow_youtube_enable',
			'operator' => '===',
			'value'    => true,
		]
	],
] );

// buffer
PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'        => 'custom',
	'settings'    => 'pixelpop_social_follow_buffer_icon',
	'section'     => 'pixelpop_social_follow_section',
		'default'         => '<i class="ppop-customizer-social-icon fab fa-buffer"></i>',
] );

PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'        => 'toggle',
	'settings'    => 'pixelpop_social_follow_buffer_enable',
	'label'       => esc_html__( 'Buffer', 'pixelpop' ),
	'section'     => 'pixelpop_social_follow_section',
	'default'     => '0',
] );

PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'     => 'link',
	'settings' => 'pixelpop_social_follow_buffer_link',
	'label'    => __( 'Link', 'pixelpop' ),
	'section'  => 'pixelpop_social_follow_section',
	'default'  => '#',
	'active_callback' => [
		[
			'setting'  => 'pixelpop_social_follow_buffer_enable',
			'operator' => '===',
			'value'    => true,
		]
	],
] );


// digg
PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'        => 'custom',
	'settings'    => 'pixelpop_social_follow_digg_icon',
	'section'     => 'pixelpop_social_follow_section',
		'default'         => '<i class="ppop-customizer-social-icon fab fa-digg"></i>',
] );

PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'        => 'toggle',
	'settings'    => 'pixelpop_social_follow_digg_enable',
	'label'       => esc_html__( 'Digg', 'pixelpop' ),
	'section'     => 'pixelpop_social_follow_section',
	'default'     => '0',
] );

PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'     => 'link',
	'settings' => 'pixelpop_social_follow_digg_link',
	'label'    => __( 'Link', 'pixelpop' ),
	'section'  => 'pixelpop_social_follow_section',
	'default'  => '#',
	'active_callback' => [
		[
			'setting'  => 'pixelpop_social_follow_digg_enable',
			'operator' => '===',
			'value'    => true,
		]
	],
] );


// behance
PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'        => 'custom',
	'settings'    => 'pixelpop_social_follow_behance_icon',
	'section'     => 'pixelpop_social_follow_section',
		'default'         => '<i class="ppop-customizer-social-icon fab fa-behance"></i>',
] );

PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'        => 'toggle',
	'settings'    => 'pixelpop_social_follow_behance_enable',
	'label'       => esc_html__( 'Behance', 'pixelpop' ),
	'section'     => 'pixelpop_social_follow_section',
	'default'     => '0',
] );

PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'     => 'link',
	'settings' => 'pixelpop_social_follow_behance_link',
	'label'    => __( 'Link', 'pixelpop' ),
	'section'  => 'pixelpop_social_follow_section',
	'default'  => '#',
	'active_callback' => [
		[
			'setting'  => 'pixelpop_social_follow_behance_enable',
			'operator' => '===',
			'value'    => true,
		]
	],
] );


// hacker news
PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'        => 'custom',
	'settings'    => 'pixelpop_social_follow_hackernews_icon',
	'section'     => 'pixelpop_social_follow_section',
		'default'         => '<i class="ppop-customizer-social-icon fab fa-hacker-news"></i>',
] );

PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'        => 'toggle',
	'settings'    => 'pixelpop_social_follow_hackernews_enable',
	'label'       => esc_html__( 'Hacker News', 'pixelpop' ),
	'section'     => 'pixelpop_social_follow_section',
	'default'     => '0',
] );

PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'     => 'link',
	'settings' => 'pixelpop_social_follow_hackernews_link',
	'label'    => __( 'Link', 'pixelpop' ),
	'section'  => 'pixelpop_social_follow_section',
	'default'  => '#',
	'active_callback' => [
		[
			'setting'  => 'pixelpop_social_follow_hackernews_enable',
			'operator' => '===',
			'value'    => true,
		]
	],
] );


// github
PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'        => 'custom',
	'settings'    => 'pixelpop_social_follow_github_icon',
	'section'     => 'pixelpop_social_follow_section',
		'default'         => '<i class="ppop-customizer-social-icon fab fa-github"></i>',
] );

PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'        => 'toggle',
	'settings'    => 'pixelpop_social_follow_github_enable',
	'label'       => esc_html__( 'Github', 'pixelpop' ),
	'section'     => 'pixelpop_social_follow_section',
	'default'     => '0',
] );

PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'     => 'link',
	'settings' => 'pixelpop_social_follow_github_link',
	'label'    => __( 'Link', 'pixelpop' ),
	'section'  => 'pixelpop_social_follow_section',
	'default'  => '#',
	'active_callback' => [
		[
			'setting'  => 'pixelpop_social_follow_github_enable',
			'operator' => '===',
			'value'    => true,
		]
	],
] );


// soundcloud
PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'        => 'custom',
	'settings'    => 'pixelpop_social_follow_soundcloud_icon',
	'section'     => 'pixelpop_social_follow_section',
		'default'         => '<i class="ppop-customizer-social-icon fab fa-soundcloud"></i>',
] );

PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'        => 'toggle',
	'settings'    => 'pixelpop_social_follow_soundcloud_enable',
	'label'       => esc_html__( 'Soundcloud', 'pixelpop' ),
	'section'     => 'pixelpop_social_follow_section',
	'default'     => '0',
] );

PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'     => 'link',
	'settings' => 'pixelpop_social_follow_soundcloud_link',
	'label'    => __( 'Link', 'pixelpop' ),
	'section'  => 'pixelpop_social_follow_section',
	'default'  => '#',
	'active_callback' => [
		[
			'setting'  => 'pixelpop_social_follow_soundcloud_enable',
			'operator' => '===',
			'value'    => true,
		]
	],
] );


// delicious
PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'        => 'custom',
	'settings'    => 'pixelpop_social_follow_delicious_icon',
	'section'     => 'pixelpop_social_follow_section',
		'default'         => '<i class="ppop-customizer-social-icon fab fa-delicious"></i>',
] );

PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'        => 'toggle',
	'settings'    => 'pixelpop_social_follow_delicious_enable',
	'label'       => esc_html__( 'Delicious', 'pixelpop' ),
	'section'     => 'pixelpop_social_follow_section',
	'default'     => '0',
] );

PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'     => 'link',
	'settings' => 'pixelpop_social_follow_delicious_link',
	'label'    => __( 'Link', 'pixelpop' ),
	'section'  => 'pixelpop_social_follow_section',
	'default'  => '#',
	'active_callback' => [
		[
			'setting'  => 'pixelpop_social_follow_delicious_enable',
			'operator' => '===',
			'value'    => true,
		]
	],
] );


// spotify
PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'        => 'custom',
	'settings'    => 'pixelpop_social_follow_spotify_icon',
	'section'     => 'pixelpop_social_follow_section',
		'default'         => '<i class="ppop-customizer-social-icon fab fa-spotify"></i>',
] );

PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'        => 'toggle',
	'settings'    => 'pixelpop_social_follow_spotify_enable',
	'label'       => esc_html__( 'Spotify', 'pixelpop' ),
	'section'     => 'pixelpop_social_follow_section',
	'default'     => '0',
] );

PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'     => 'link',
	'settings' => 'pixelpop_social_follow_spotify_link',
	'label'    => __( 'Link', 'pixelpop' ),
	'section'  => 'pixelpop_social_follow_section',
	'default'  => '#',
	'active_callback' => [
		[
			'setting'  => 'pixelpop_social_follow_spotify_enable',
			'operator' => '===',
			'value'    => true,
		]
	],
] );


// yahoo
PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'        => 'custom',
	'settings'    => 'pixelpop_social_follow_yahoo_icon',
	'section'     => 'pixelpop_social_follow_section',
		'default'         => '<i class="ppop-customizer-social-icon fab fa-yahoo"></i>',
] );

PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'        => 'toggle',
	'settings'    => 'pixelpop_social_follow_yahoo_enable',
	'label'       => esc_html__( 'Yahoo', 'pixelpop' ),
	'section'     => 'pixelpop_social_follow_section',
	'default'     => '0',
] );

PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'     => 'link',
	'settings' => 'pixelpop_social_follow_yahoo_link',
	'label'    => __( 'Link', 'pixelpop' ),
	'section'  => 'pixelpop_social_follow_section',
	'default'  => '#',
	'active_callback' => [
		[
			'setting'  => 'pixelpop_social_follow_yahoo_enable',
			'operator' => '===',
			'value'    => true,
		]
	],
] );


// deviantart
PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'        => 'custom',
	'settings'    => 'pixelpop_social_follow_deviantart_icon',
	'section'     => 'pixelpop_social_follow_section',
		'default'         => '<i class="ppop-customizer-social-icon fab fa-deviantart"></i>',
] );

PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'        => 'toggle',
	'settings'    => 'pixelpop_social_follow_deviantart_enable',
	'label'       => esc_html__( 'DeviantArt', 'pixelpop' ),
	'section'     => 'pixelpop_social_follow_section',
	'default'     => '0',
] );

PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'     => 'link',
	'settings' => 'pixelpop_social_follow_deviantart_link',
	'label'    => __( 'Link', 'pixelpop' ),
	'section'  => 'pixelpop_social_follow_section',
	'default'  => '#',
	'active_callback' => [
		[
			'setting'  => 'pixelpop_social_follow_deviantart_enable',
			'operator' => '===',
			'value'    => true,
		]
	],
] );

// flickr
PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'        => 'custom',
	'settings'    => 'pixelpop_social_follow_flickr_icon',
	'section'     => 'pixelpop_social_follow_section',
		'default'         => '<i class="ppop-customizer-social-icon fab fa-flickr"></i>',
] );

PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'        => 'toggle',
	'settings'    => 'pixelpop_social_follow_flickr_enable',
	'label'       => esc_html__( 'Flickr', 'pixelpop' ),
	'section'     => 'pixelpop_social_follow_section',
	'default'     => '0',
] );

PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'     => 'link',
	'settings' => 'pixelpop_social_follow_flickr_link',
	'label'    => __( 'Link', 'pixelpop' ),
	'section'  => 'pixelpop_social_follow_section',
	'default'  => '#',
	'active_callback' => [
		[
			'setting'  => 'pixelpop_social_follow_flickr_enable',
			'operator' => '===',
			'value'    => true,
		]
	],
] );


// stumbleupon
PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'        => 'custom',
	'settings'    => 'pixelpop_social_follow_stumbleupon_icon',
	'section'     => 'pixelpop_social_follow_section',
		'default'         => '<i class="ppop-customizer-social-icon fab fa-stumbleupon"></i>',
] );

PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'        => 'toggle',
	'settings'    => 'pixelpop_social_follow_stumbleupon_enable',
	'label'       => esc_html__( 'StumbleUpon', 'pixelpop' ),
	'section'     => 'pixelpop_social_follow_section',
	'default'     => '0',
] );

PixelPop_Kirki::add_field( 'pixelpop_customizer', [
	'type'     => 'link',
	'settings' => 'pixelpop_social_follow_stumbleupon_link',
	'label'    => __( 'Link', 'pixelpop' ),
	'section'  => 'pixelpop_social_follow_section',
	'default'  => '#',
	'active_callback' => [
		[
			'setting'  => 'pixelpop_social_follow_stumbleupon_enable',
			'operator' => '===',
			'value'    => true,
		]
	],
] );
