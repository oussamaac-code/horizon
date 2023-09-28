<?php


// register widgets
function register_new_widgets( $widgets_manager ) {

	get_template_part('/core/elementor/widgets/widget', 'faq');
	get_template_part('/core/elementor/widgets/widget', 'about');

	$widgets_manager->register( new \Elementor_Widget_1() );
	$widgets_manager->register( new \Elementor_Widget_2() );


}
add_action( 'elementor/widgets/register', 'register_new_widgets' );


// register new categories
function add_elementor_widget_categories( $elements_manager ) {

	
	$elements_manager->add_category(
		'wildzoo',
		[
			'title' => esc_html__( 'Wildzoo', 'textdomain' ),
			'icon' => 'fa fa-plug',
		]
	);

}
add_action( 'elementor/elements/categories_registered', 'add_elementor_widget_categories' );