<?php
/**
 * Theme Customizer
 *
 * @package horizon
 *
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

function horizon_customize_header_register( $wp_customize ) {
	
    // Settings
    $wp_customize->add_setting('horizon_header_logo', array(
        'default' => '',
        'transport' => 'refresh'
    ) );
    $wp_customize->add_setting('horizon_header_logo_dark', array(
        'default' => '',
        'transport' => 'refresh'
    ) );

    $wp_customize->add_setting('horizon_header_sticky', array(
        'default' => '',
        'transport' => 'refresh'
    ) );
    $wp_customize->add_setting('horizon_header_cta_text', array(
        'default' => '',
        'transport' => 'refresh'
    ) );
    $wp_customize->add_setting('horizon_header_cta_link', array(
        'default' => '',
        'transport' => 'refresh'
    ) );
   


    // Section
    $wp_customize->add_section('horizon_theme_header', array(
        'title' => __('Header', 'textdomain'),
        'priority' => 1,
    ) );
    

    // ** Controls **

    // Logos
    $wp_customize->add_control( new WP_Customize_Media_Control ( $wp_customize, 'image_control3', array(
        'label' => __( 'Logo White', 'theme_textdomain' ),
        'priority' => 0,
        'section' => 'horizon_theme_header',
        'mime_type' => 'image',
        'settings' => 'horizon_header_logo',
    ) ) );
    $wp_customize->add_control( new WP_Customize_Media_Control ( $wp_customize, 'image_control1', array(
        'label' => __( 'Logo Dark', 'theme_textdomain' ),
        'priority' => 0,
        'section' => 'horizon_theme_header',
        'mime_type' => 'image',
        'settings' => 'horizon_header_logo_dark',
    ) ) );

    $wp_customize->add_control('horizon_header_sticky', array(
        'label' => __( 'Activate Sticky header', 'theme_textdomain' ),
        'priority' => 0,
        'section' => 'horizon_theme_header',
        'type' => 'checkbox',
        'settings' => 'horizon_header_sticky',
    ) );
    $wp_customize->add_control('horizon_header_cta_text', array(
        'label' => __( 'Button Title', 'theme_textdomain' ),
        'priority' => 0,
        'section' => 'horizon_theme_header',
        'type' => 'text',
        'settings' => 'horizon_header_cta_text',
    ) );
    $wp_customize->add_control('horizon_header_cta_link', array(
        'label' => __( 'Button Link', 'theme_textdomain' ),
        'priority' => 0,
        'section' => 'horizon_theme_header',
        'type' => 'text',
        'settings' => 'horizon_header_cta_link',
    ) );
    
   
}
add_action( 'customize_register', 'horizon_customize_header_register' );

