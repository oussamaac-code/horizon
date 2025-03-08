<?php
/**
 * 
 * Elementor Widgets
 * 
 * Build and Register you widgets of the theme
 * 
 * @package Horizon
 */

function register_new_widgets( $widgets_manager ) {


	get_template_part('/core/elementor/widgets/hero');
	get_template_part('/core/elementor/widgets/contact');
	get_template_part('/core/elementor/widgets/contact-info');
	get_template_part('/core/elementor/widgets/wrapper');
	get_template_part('/core/elementor/widgets/newsletter');
	get_template_part('/core/elementor/widgets/heading');
	get_template_part('/core/elementor/widgets/icons');


	$widgets_manager->register( new \Elementor_Widget_1() );
	$widgets_manager->register( new \Elementor_Widget_2() );
	$widgets_manager->register( new \Elementor_Widget_3() );
	$widgets_manager->register( new \Elementor_Widget_4() );
	$widgets_manager->register( new \Elementor_Widget_5() );
	$widgets_manager->register( new \Elementor_Widget_6() );
	$widgets_manager->register( new \Elementor_Widget_7() );


}
add_action( 'elementor/widgets/register', 'register_new_widgets' );


/**
 * 
 * register new categories
 */
function add_elementor_widget_categories( $elements_manager ) {
	
	$elements_manager->add_category(
		'customtheme',
		[
			'title' => esc_html__( 'Custom Theme', 'textdomain' ),
			'icon' => 'fa fa-plug',
		]
	);

}
add_action( 'elementor/elements/categories_registered', 'add_elementor_widget_categories' );