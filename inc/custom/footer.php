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

function horizon_customize_footer_register( $wp_customize ) {
	
    // Settings
    $wp_customize->add_setting('horizon_footer_logo', array(
        'default' => '',
        'transport' => 'refresh'
    ) );
    $wp_customize->add_setting('horizon_theme_footer_description', array(
        'default' => '',
        'transport' => 'refresh'
    ) );
    $wp_customize->add_setting('horizon_theme_footer_facebook_link', array(
        'default' => '',
        'transport' => 'refresh'
    ) );
    $wp_customize->add_setting('horizon_theme_footer_instagram_link', array(
        'default' => '',
        'transport' => 'refresh'
    ) );
    $wp_customize->add_setting('horizon_footer_portfolio_link', array(
        'default' => '',
        'transport' => 'refresh'
    ) );
    $wp_customize->add_setting('horizon_footer_portfolio1', array(
        'default' => '',
        'transport' => 'refresh'
    ) );
    $wp_customize->add_setting('horizon_footer_portfolio2', array(
        'default' => '',
        'transport' => 'refresh'
    ) );
    $wp_customize->add_setting('horizon_footer_portfolio3', array(
        'default' => '',
        'transport' => 'refresh'
    ) );
    $wp_customize->add_setting('horizon_footer_portfolio4', array(
        'default' => '',
        'transport' => 'refresh'
    ) );
    $wp_customize->add_setting('horizon_footer_portfolio5', array(
        'default' => '',
        'transport' => 'refresh'
    ) );
    $wp_customize->add_setting('horizon_footer_portfolio6', array(
        'default' => '',
        'transport' => 'refresh'
    ) );


    // Section
    $wp_customize->add_section('horizon_theme_footer', array(
        'title' => __('Footer', 'textdomain'),
    ) );
    

    // Controls
    $wp_customize->add_control( new WP_Customize_Media_Control ( $wp_customize, 'image_control0', array(
        'label' => __( 'Logo', 'theme_textdomain' ),
        'priority' => 0,
        'section' => 'horizon_theme_footer',
        'mime_type' => 'image',
        'settings' => 'horizon_footer_logo',
    ) ) );
    $wp_customize->add_control('horizon_footer_description', array(
        'label' => __( 'Footer Description', 'theme_textdomain' ),
        'priority' => 0,
        'section' => 'horizon_theme_footer',
        'type' => 'textarea',
        'settings' => 'horizon_theme_footer_description',
    ) );
    $wp_customize->add_control('horizon_footer_facebook_link', array(
        'label' => __( 'Facebook Link', 'theme_textdomain' ),
        'priority' => 0,
        'section' => 'horizon_theme_footer',
        'type' => 'text',
        'settings' => 'horizon_theme_footer_facebook_link',
    ) );
    $wp_customize->add_control('horizon_footer_instagram_link', array(
        'label' => __( 'Instagram Link', 'theme_textdomain' ),
        'priority' => 0,
        'section' => 'horizon_theme_footer',
        'type' => 'text',
        'settings' => 'horizon_theme_footer_instagram_link',
    ) );
    $wp_customize->add_control( new WP_Customize_Media_Control ( $wp_customize, 'image_control', array(
        'label' => __( 'Image 1', 'theme_textdomain' ),
        'section' => 'horizon_theme_footer',
        'mime_type' => 'image',
        'settings' => 'horizon_footer_portfolio1',
    ) ) );
    $wp_customize->add_control( new WP_Customize_Media_Control ( $wp_customize, 'image_control1', array(
        'label' => __( 'Image 2', 'theme_textdomain' ),
        'section' => 'horizon_theme_footer',
        'mime_type' => 'image',
        'settings' => 'horizon_footer_portfolio2'
    ) ) );
    $wp_customize->add_control( new WP_Customize_Media_Control ( $wp_customize, 'image_control2', array(
        'label' => __( 'Image 3', 'theme_textdomain' ),
        'section' => 'horizon_theme_footer',
        'mime_type' => 'image',
        'settings' => 'horizon_footer_portfolio3'
    ) ) );
    $wp_customize->add_control( new WP_Customize_Media_Control ( $wp_customize, 'image_control3', array(
        'label' => __( 'Image 4', 'theme_textdomain' ),
        'section' => 'horizon_theme_footer',
        'mime_type' => 'image',
        'settings' => 'horizon_footer_portfolio4'
    ) ) );
    $wp_customize->add_control( new WP_Customize_Media_Control ( $wp_customize, 'image_control4', array(
        'label' => __( 'Image 5', 'theme_textdomain' ),
        'section' => 'horizon_theme_footer',
        'mime_type' => 'image',
        'settings' => 'horizon_footer_portfolio5'
    ) ) );
    $wp_customize->add_control( new WP_Customize_Media_Control ( $wp_customize, 'image_control5', array(
        'label' => __( 'Image 6', 'theme_textdomain' ),
        'section' => 'horizon_theme_footer',
        'mime_type' => 'image',
        'settings' => 'horizon_footer_portfolio6'
    ) ) );
   
}
add_action( 'customize_register', 'horizon_customize_footer_register' );

