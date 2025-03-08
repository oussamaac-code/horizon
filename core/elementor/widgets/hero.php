<?php 
/**
 * 
 * Widget file
 * 
 * @package Horizon
 */

class Elementor_Widget_1 extends \Elementor\Widget_Base {

    public function get_name() {
		return 'hero';
	}

	public function get_title() {
		return esc_html__( 'Hero', 'textdomain' );
	}

	public function get_icon() {
		return 'eicon-code';
	}

	public function get_custom_help_url() {
		return 'https://go.elementor.com/widget-name';
	}

	public function get_categories() {
		return [ 'Custom Theme' ];
	}

	public function get_keywords() {
		return [ 'hero' ];
	}

    protected function register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Content', 'elementor-oembed-widget' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'title',
			[
				'label' => esc_html__( 'Heading', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Enter your title', 'textdomain' ),
			]
		);
        $this->add_control(
			'sub-title',
			[
				'label' => esc_html__( 'Sub Title', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Enter Sub Title', 'textdomain' ),
			]
		);
        $this->add_control(
			'text',
			[
				'label' => esc_html__( 'Text', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Enter Text here', 'textdomain' ),
			]
		);

        // button

        $this->add_control(
			'button',
			[
				'label' => esc_html__( 'button', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Button', 'textdomain' ),
			]
		);

        // url
        $this->add_control(
			'link',
			[
				'label' => esc_html__( 'Link', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::URL,
				'options' => [ 'url', 'is_external', 'nofollow' ],
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
				],
				'label_block' => true,
			]
		);



        // list

		$repeater = new \Elementor\Repeater();

        $repeater->add_control(
			'text',
			[
				'label' => esc_html__( 'Text', 'elementor-list-widget' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'List Item', 'elementor-list-widget' ),
				'default' => esc_html__( 'List Item', 'elementor-list-widget' ),
				'label_block' => true,
			]
		);


        $repeater->add_control(
			'image',
			[
				'label' => esc_html__( 'Choose Image', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

        $this->add_control(
			'list',
			[
				'label' => esc_html__( 'List Items', 'elementor-list-widget' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),           /* Use our repeater */
				'default' => [
					[
						'text' => esc_html__( 'List Item #1', 'elementor-list-widget' ),
						
					],
					[
						'text' => esc_html__( 'List Item #2', 'elementor-list-widget' ),
						
					]
				],
				'title_field' => '{{{ text }}}',
			]
		);

		$this->end_controls_section();


	}

    protected function render() {

		$settings = $this->get_settings_for_display();
        $this->add_inline_editing_attributes( 'title', 'basic' );
        ;?>

        <section class="hero">

            
        </section>



	<?php }

}
