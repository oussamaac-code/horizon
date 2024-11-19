<?php
/**
 * Theme Customizer
 *
 * @package horizon
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function horizon_customize_register( $wp_customize ) {
	

    // Main Colors For Theme

    $wp_customize->add_setting('horizon_theme_main_color', array(
        'default' => '#0866FF',
        'transport' => 'refresh'
    ) );
    $wp_customize->add_setting('horizon_theme_main_darker_color', array(
        'default' => '#054bbb',
        'transport' => 'refresh'
    ) );

    $wp_customize->add_section('horizon_standard_colors', array(
        'title' => __('Standard Colors', 'textdomain'),
        'priority'=> 30
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'hr_theme_main_color_control', array(
        'label' => __( 'Main Color', 'textdomain' ),
        'section' => 'horizon_standard_colors',
        'settings' => 'horizon_theme_main_color'
    ) ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'hr_theme_main_darker_color_control', array(
        'label' => __( 'Secondary Color', 'textdomain' ),
        'section' => 'horizon_standard_colors',
        'settings' => 'horizon_theme_main_darker_color'
    ) ) );


}
add_action( 'customize_register', 'horizon_customize_register' );


/**
 * Binds CSS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function hr_customize_preview_css() { ;?>

    <style type="text/css">
        :root {
            --color-main: <?php echo get_theme_mod('horizon_theme_main_color') ;?> ;
            --color-main-darker: <?php echo get_theme_mod('horizon_theme_main_darker_color') ;?> ;
        }
    </style>

<?php }
add_action( 'wp_head', 'hr_customize_preview_css' );