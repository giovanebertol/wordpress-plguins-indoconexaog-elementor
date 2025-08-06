<?php
namespace ConexaogElementor\Widget;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;

/**
 * Conexao G Elementor Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class BdevsCTA extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve Conexao G Elementor widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'bdevs-cta';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve Conexao G Elementor widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'CTA', 'conexaog-elementor' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve Conexaog Project widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-price-table';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the Conexaog Project widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'conexaog-elementor' ];
	}

	public function get_keywords() {
		return [ 'cta' ];
	}

	public function get_script_depends() {
		return [ 'conexaog-elementor'];
	}

	// BDT Position
	protected function element_pack_position() {
	    $position_options = [
	        ''              => esc_html__('Default', 'conexaog-elementor'),
	        'top-left'      => esc_html__('Top Left', 'conexaog-elementor') ,
	        'top-center'    => esc_html__('Top Center', 'conexaog-elementor') ,
	        'top-right'     => esc_html__('Top Right', 'conexaog-elementor') ,
	        'center'        => esc_html__('Center', 'conexaog-elementor') ,
	        'center-left'   => esc_html__('Center Left', 'conexaog-elementor') ,
	        'center-right'  => esc_html__('Center Right', 'conexaog-elementor') ,
	        'bottom-left'   => esc_html__('Bottom Left', 'conexaog-elementor') ,
	        'bottom-center' => esc_html__('Bottom Center', 'conexaog-elementor') ,
	        'bottom-right'  => esc_html__('Bottom Right', 'conexaog-elementor') ,
	    ];

	    return $position_options;
	}

	protected function _register_controls() {
		$this->start_controls_section(
			'section_content_heading',
			[
				'label' => esc_html__( 'Call To Action', 'conexaog-elementor' ),
			]	
		);	
		$this->add_control(
            'cta_image',
            [
                'label'   => esc_html__( 'Background Image', 'conexaog-elementor' ),
                'type'    => Controls_Manager::MEDIA,
                'dynamic' => [ 'active' => true ],
                'description' => esc_html__( 'Add image from here', 'conexaog-elementor' ),
            ]
        ); 
        $this->add_control(
            'subheading',
            [
                'label'       => __( 'Subheading:', 'conexaog-elementor' ),
                'type'        => Controls_Manager::TEXT,
                'placeholder' => __( 'Enter your subheading', 'conexaog-elementor' ),
                'default'     => __( 'SUBSCRIBE', 'conexaog-elementor' ),
                'label_block' => true,
            ]
        );
		$this->add_control(
            'tabs',
            [
                'label' => esc_html__( 'Heading:', 'conexaog-elementor' ),
                'type' => Controls_Manager::REPEATER,
                'fields' => [                   
                    [
                        'name'        => 'choose_style',
                        'label'     => esc_html__( 'Style:', 'conexaog-elementor' ),
                        'type'      => Controls_Manager::SELECT,
                        'dynamic' => [ 'active' => true ],
                        'options'   => [
                            'style_1'  => esc_html__( 'Default', 'conexaog-elementor' ),
                            'style_2'  => esc_html__( 'White', 'conexaog-elementor' ),
                        ],
                        'default'   => 'style_1',
                    ],
                    [
                        'name'        => 'heading',
                        'label'       => esc_html__( 'Heading:', 'conexaog-elementor' ),
                        'type'        => Controls_Manager::TEXT,
                        'dynamic'     => [ 'active' => true ],
                        'default'     => esc_html__( 'Want some design' , 'conexaog-elementor' ),
                        'label_block' => true,
                    ],
                    
                ],
            ]
        );
        $this->add_control(
            'shortcode',
            [
                'label'   => esc_html__( 'Shortcode:', 'conexaog-elementor' ),
                'type'    => Controls_Manager::TEXT,
                'dynamic' => [ 'active' => true ],
                'default'       => __('Contact Shortcode here', 'conexaog-elementor'),
                'description' => esc_html__( 'Add Your shortcode here', 'conexaog-elementor' ),
                'label_block' => true,
            ]
        );
		$this->end_controls_section();
		
		/** 
		*	Layout section 
		**/
		$this->start_controls_section(
			'section_content_layout',
			[
				'label' => esc_html__( 'Layout', 'conexaog-elementor' ),
			]
		);

		$this->add_responsive_control(
			'align',
			[
				'label'   => esc_html__( 'Alignment', 'conexaog-elementor' ),
				'type'    => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'conexaog-elementor' ),
						'icon'  => 'fa fa-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'conexaog-elementor' ),
						'icon'  => 'fa fa-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'conexaog-elementor' ),
						'icon'  => 'fa fa-align-right',
					],
					'justify' => [
						'title' => esc_html__( 'Justified', 'conexaog-elementor' ),
						'icon'  => 'fa fa-align-justify',
					],
				],
				'prefix_class' => 'elementor%s-align-',
				'description'  => 'Use align to match position',
				'default'      => 'left',
			]
		);
		$this->end_controls_section();

	}

	public function render() {
		$settings  = $this->get_settings_for_display();
		extract($settings);
		?>
		<!-- CTA Area start -->
        <section class="cta-area pt-140 pb-110 bgs-cover" style="background-image: url(<?php echo esc_url($settings['cta_image']['url']);?>);">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="video-content-part text-center wow fadeInUp delay-0-2s">
                    	<?php if(isset($settings['subheading']) && $settings['subheading'] != ''){?>
                        <span class="sub-title"><?php print wp_kses_post($settings['subheading']); ?></span>
                    	<?php } ?>
                        <div class="cta-content wow fadeInUp delay-0-4s">
                        	<h2>
                        	<?php foreach ( $settings['tabs'] as $item ) : ?>                            
                        	<?php if( wp_kses_post($item['choose_style']) == 'style_2'){ ?>
                            <span class="white"><?php print wp_kses_post($item['heading']); ?></span>
                            <?php } else { ?>
                            <?php print wp_kses_post($item['heading']); ?>
                        	<?php } ?>
                            <?php endforeach; ?>
                            </h2>
                        </div>
                        <?php print do_shortcode(html_entity_decode( $settings['shortcode'] )); ?>
                    </div>
                </div>
            </div>
        </section>
        <!-- CTA Area end -->
	<?php
	}

}