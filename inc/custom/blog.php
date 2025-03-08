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

function horizon_customize_blog_register( $wp_customize ) {
	
    // Settings
    $wp_customize->add_setting('horizon_theme_blog_template1', array(
        'default' => '',
        'transport' => 'refresh'
    ) );
    $wp_customize->add_setting('horizon_theme_author_template1', array(
        'default' => '',
        'transport' => 'refresh'
    ) );
   
    // Panel
    $wp_customize->add_panel('horizon_blog_panel', array(
        'title' => __('Blog', 'textdomain'),
        'description' => 'All Blog settings: choose posts page templates and enter Author settings ', 
        'priority'=> 160
    ) );

    // Section
    $wp_customize->add_section('horizon_theme_blog_templates', array(
        'panel' => 'horizon_blog_panel',
        'title' => __('Posts Page Templates', 'textdomain'),
        'description' => __( 'Choose the Template that you like for the Blog page.' ),
    ) );

    $wp_customize->add_section('horizon_theme_blog_author', array(
        'panel' => 'horizon_blog_panel',
        'title' => __('Author', 'textdomain'),
        'description' => __( 'Some author settings and informations about person.' ),
    ) );
    

    // Controls
    $wp_customize->add_control('horizon_theme_author_template1', array(
        'label' => __( 'Templates', 'theme_textdomain' ),
        'type' => 'select',
        'choices' => array( 
            'template1' => __( 'Template 1' ),
            'template2' => __( 'Template 2' ),
            'template3' => __( 'Template 3' ),
            'template4' => __( 'Template 4' ),

        ),
        'settings' => 'horizon_theme_author_template1',
        'section' => 'horizon_theme_blog_author',
        
    ) );
    $wp_customize->add_control('horizon_theme_blog_template1', array(
        'label' => __( 'Templates', 'theme_textdomain' ),
        'type' => 'select',
        'choices' => array( 
            'template1' => __( 'Template 1' ),
            'template2' => __( 'Template 2' ),
            'template3' => __( 'Template 3' ),
            'template4' => __( 'Template 4' ),
            'template5' => __( 'Template 5' ),
            'template6' => __( 'Template 6' )

        ),
        'settings' => 'horizon_theme_blog_template1',
        'section' => 'horizon_theme_blog_templates',
        
    ) );
   
}
add_action( 'customize_register', 'horizon_customize_blog_register' );


function _s_customize_preview_js() {
	wp_enqueue_script( 'hr-customizer', get_template_directory_uri() . '/asset/js/customizer.js',  array('customize-controls' ), true );

    wp_localize_script( 'hr-customizer', 'page_urls', array(
        'blog'=> get_option( 'page_for_posts' ),
    ) );

}
add_action( 'customize_controls_init', '_s_customize_preview_js' );


