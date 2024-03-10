<?php 
/**
 * 
 * Widget file
 * 
 * @package Horizon
 */

class Elementor_Widget_2 extends \Elementor\Widget_Base {

    public function get_name() {
		return 'about';
	}

	public function get_title() {
		return esc_html__( 'About', 'textdomain' );
	}

	public function get_icon() {
		return 'eicon-code';
	}

	public function get_custom_help_url() {
		return 'https://go.elementor.com/widget-name';
	}

	public function get_categories() {
		return [ 'wildzoo' ];
	}

	public function get_keywords() {
		return [ 'about' ];
	}

    protected function register_controls() {

		$this->start_controls_section(
			'content_sections',
			[
				'label' => esc_html__( 'Content', 'elementor-oembed-widget' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);


        // name
        $this->add_control(
            'name',
            [
                'label' => esc_html__( 'Name', 'textdomain' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => esc_html__( 'Name', 'textdomain' ),
            ]
        );


        // title
		$this->add_control(
			'title_text',
			[
				'label' => esc_html__( 'Heading', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Title', 'textdomain' ),
			]
		);


        // content
        $this->add_control(
			'description',
			[
				'label' => esc_html__( 'Description', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => esc_html__( 'Default description', 'textdomain' ),
				'placeholder' => esc_html__( 'Type your description here', 'textdomain' ),
			]
		);


        // link title
        $this->add_control(
			'link_text',
			[
				'label' => esc_html__( 'Link text', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Text', 'textdomain' ),
			]
		);


        // link url
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


        // image
        $this->add_control(
			'image',
			[
				'label' => esc_html__( 'Choose Image', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);


		$this->end_controls_section();



	}

    protected function render() {

		$settings = $this->get_settings_for_display();
        $this->add_inline_editing_attributes( 'title', 'basic' );
        ;?>

        <section class="about">
            <div class="container">
                <div class="row">
                    <img src="<?php echo $settings['image']['url'] ;?>" alt="about me">
                </div>
                <div class="row">
                    <span><?php echo $settings['name'] ;?></span>
                    <h1><?php echo $settings['title_text'] ;?></h1>
                    <span class="bio">short bio</span>
                    <br>
                    <br>
                    <?php echo $settings['description'] ;?>
                    <a <?php echo $this->get_render_attribute_string( 'link' ); ?> class="cta"> <?php echo $settings['link_text'] ;?> &nbsp <i class="ri-file-edit-line"></i></a>
                </div>
            </div>
        </section>
      

	<?php }

   
}



