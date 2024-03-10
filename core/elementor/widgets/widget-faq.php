<?php 
/**
 * 
 * Widget file
 * 
 * @package Horizon
 */

class Elementor_Widget_1 extends \Elementor\Widget_Base {

    public function get_name() {
		return 'faq';
	}

	public function get_title() {
		return esc_html__( 'Faq', 'textdomain' );
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
		return [ 'faq' ];
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

        // list

		$this->add_control(
			'list',
			[
				'label' => esc_html__( 'Repeater List', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => [
					[
						'name' => 'list_title',
						'label' => esc_html__( 'Title', 'textdomain' ),
						'type' => \Elementor\Controls_Manager::TEXT,
						'default' => esc_html__( 'List Title' , 'textdomain' ),
						'label_block' => true,
					],
					[
						'name' => 'list_content',
						'label' => esc_html__( 'Content', 'textdomain' ),
						'type' => \Elementor\Controls_Manager::WYSIWYG,
						'default' => esc_html__( 'List Content' , 'textdomain' ),
						'show_label' => false,
					]
				],
				'default' => [
                    [
						'list_title' => esc_html__( 'Title #1', 'textdomain' ),
						'list_content' => esc_html__( 'Item content. Click the edit button to change this text.', 'textdomain' ),
					],
					
				],
				'title_field' => '{{{ list_title }}}',
			]
		);

		$this->end_controls_section();



	}

    protected function render() {

		$settings = $this->get_settings_for_display();
        $this->add_inline_editing_attributes( 'title', 'basic' );
        ;?>

        
        <section class="faq">

            <div class="container">

                <h2 <?php echo $this->get_render_attribute_string( 'title' ); ?> > <?php echo $settings['title'] ;?></h2>
                <br>
                <div class="accordion-container">

                    <?php if($settings['list']){ 
                        foreach( $settings['list'] as $item){ ;?>

                            <div class="ac <?php echo $item['_id'] ;?>">
                                <h2 class="ac-header">
                                    <button type="button" class="ac-trigger"><?php echo $item['list_title'] ;?></button>
                                </h2>
                                <div class="ac-panel">
                                    <?php echo $item['list_content'] ;?>
                                </div>
                            </div>

                        <?php }
                    } ;?>

                </div>

            </div>

        </section>


	<?php }

}
