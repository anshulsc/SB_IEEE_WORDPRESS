<?php
function avadanta_invest_sections_settings( $wp_customize ) {
    $wp_customize->remove_setting( 'avadanta_menubar_bg_color' );
     $wp_customize->remove_setting( 'avadanta_menu_item_color' );
      $wp_customize->remove_setting( 'avadanta_menu_item_hover_color' );
       $wp_customize->remove_setting( 'avadanta_submenu_item_hover_color' );
       $wp_customize->remove_section( 'avadanta_site_settings' );
       $wp_customize->remove_section( 'avadanta_navigation_settings' );
        $wp_customize->remove_control('blogdescription');
        



     $wp_customize->add_section('avadanta_top_header_settings',
        array(
            'priority'    => null,
            'title'       => esc_html__('Top Header Options', 'avadanta-invest'),
            'description' => '',
            'panel'       => 'section_settings',
            'priority'    => 1,
        )
    );


     $wp_customize->add_setting('avadanta_top_header_enable',
        array(
            'sanitize_callback' => 'avadanta_sanitize_checkbox',
            'default'           => 0,
        )
    );
    $wp_customize->add_control('avadanta_top_header_enable',
        array(
            'type'        => 'checkbox',
            'label'       => esc_html__('Enable Header Top Section?', 'avadanta-invest'),
            'section'     => 'avadanta_top_header_settings',
            'description' => esc_html__('Check this box to Enable Top Header section.', 'avadanta-invest'),
        )
    );


    $wp_customize->add_setting('avadanta_header_social_url',   
        array(
            'sanitize_callback' => 'esc_url_raw',
            'default'           => '',
            ));

    $wp_customize->add_control('avadanta_header_social_url',
        array(
            'label'       => esc_html__('Facebook url', 'avadanta-invest'),
            'section'     => 'avadanta_top_header_settings',
            'type'        => 'url',
        )
    );
       $wp_customize->add_setting('avadanta_header_insta_social_url',   
        array(
            'sanitize_callback' => 'esc_url_raw',
            'default'           => '',
            ));

    $wp_customize->add_control('avadanta_header_insta_social_url',
        array(
            'label'       => esc_html__('Instagram url', 'avadanta-invest'),
            'section'     => 'avadanta_top_header_settings',
            'type'        => 'url',
        )
    );
        $wp_customize->add_setting('avadanta_header_twitter_social_url',   
        array(
            'sanitize_callback' => 'esc_url_raw',
            'default'           => '',
            ));

    $wp_customize->add_control('avadanta_header_twitter_social_url',
        array(
            'label'       => esc_html__('Twitter url', 'avadanta-invest'),
            'section'     => 'avadanta_top_header_settings',
            'type'        => 'url',
        )
    );

        $wp_customize->add_setting('avadanta_header_youtube_social_url',   
        array(
            'sanitize_callback' => 'esc_url_raw',
            'default'           => '',
            ));

    $wp_customize->add_control('avadanta_header_youtube_social_url',
        array(
            'label'       => esc_html__('Youtube url', 'avadanta-invest'),
            'section'     => 'avadanta_top_header_settings',
            'type'        => 'url',
        )
    );

    $wp_customize->add_setting('avadanta_header_phone',   
        array(
            'sanitize_callback' => 'avadanta_sanitize_text',
            'default'           => '',
            ));

    $wp_customize->add_control('avadanta_header_phone',
        array(
            'label'       => esc_html__('Phone No.', 'avadanta-invest'),
            'section'     => 'avadanta_top_header_settings',
            'type'        => 'text',
        )
    );  



        $wp_customize->add_setting('avadanta_header_email',   
        array(
            'sanitize_callback' => 'avadanta_sanitize_text',
            'default'           => '',
            ));

    $wp_customize->add_control('avadanta_header_email',
        array(
            'label'       => esc_html__('Email', 'avadanta-invest'),
            'section'     => 'avadanta_top_header_settings',
            'type'        => 'text',
        )
    );  

        $wp_customize->add_setting('avadanta_header_address',   
        array(
            'sanitize_callback' => 'avadanta_sanitize_text',
            'default'           =>'',
            ));

    $wp_customize->add_control('avadanta_header_address',
        array(
            'label'       => esc_html__('Address', 'avadanta-invest'),
            'section'     => 'avadanta_top_header_settings',
            'type'        => 'text',
        )
    ); 

     

            $wp_customize->add_setting('avadanta_theme_color_scheme',array(
        'default' => esc_html__('#aa6e82','avadanta-invest'),
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    
    $wp_customize->add_control(
        new WP_Customize_Color_Control($wp_customize,'avadanta_theme_color_scheme',array(
            'label' => esc_html__('Theme Color','avadanta-invest'),           
            'description' => esc_html__('Change Theme Color','avadanta-invest'),
            'section' => 'colors',
            'settings' => 'avadanta_theme_color_scheme'
        ))
    );
}
add_action( 'customize_register', 'avadanta_invest_sections_settings', 30);