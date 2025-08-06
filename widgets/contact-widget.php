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
class BdevsContact extends \Elementor\Widget_Base {

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
        return 'bdevs-contact';
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
        return __( 'Contact', 'conexaog-elementor' );
    }

    /**
     * Get widget icon.
     *
     * Retrieve Conexaog About widget icon.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget icon.
     */
    public function get_icon() {
        return 'eicon-headphones';
    }

    /**
     * Get widget categories.
     *
     * Retrieve the list of categories the Conexaog About widget belongs to.
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
        return [ 'contact' ];
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
                'label' => esc_html__( 'Contact', 'conexaog-elementor' ),
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
        $this->add_control(
            'heading',
            [
                'label'       => __( 'Heading:', 'conexaog-elementor' ),
                'type'        => Controls_Manager::TEXT,
                'placeholder' => __( 'Enter your heading', 'conexaog-elementor' ),
                'default'     => __( 'We’re here to help You', 'conexaog-elementor' ),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'description',
            [
                'label'       => __( 'Description:', 'conexaog-elementor' ),
                'type'        => Controls_Manager::TEXTAREA,
                'placeholder' => __( 'Enter your description', 'conexaog-elementor' ),
                'default'     => __( 'This is description', 'conexaog-elementor' ),
                'label_block' => true,
            ]
        );
     	$this->add_control(
            'tabs',
            [
                'label' => esc_html__( 'Information:', 'conexaog-elementor' ),
                'type' => Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name'        => 'choose_style',
                        'label'     => esc_html__( 'Choose Style', 'conexaog-elementor' ),
                        'type'      => Controls_Manager::SELECT,
                        'dynamic' => [ 'active' => true ],
                        'options'   => [
                            '1'  => esc_html__( 'Phone', 'conexaog-elementor' ),
                            '2'  => esc_html__( 'Email', 'conexaog-elementor' ),
                            '3'  => esc_html__( 'Text', 'conexaog-elementor' ),
                        ],
                        'default'   => '1',
                    ],
                    [
                        'name'        => 'icon',
                        'label'       => esc_html__( 'Icon:', 'conexaog-elementor' ),
                        'type'        => Controls_Manager::TEXT,
                        'dynamic'     => [ 'active' => true ],
                        'default'     => esc_html__( 'fa-phone-volume' , 'conexaog-elementor' ),
                        'label_block' => true,
                    ],
                    [
                        'name'        => 'detail',
                        'label'       => esc_html__( 'Detail:', 'conexaog-elementor' ),
                        'type'        => Controls_Manager::TEXTAREA,
                        'dynamic'     => [ 'active' => true ],
                        'default'     => esc_html__( '+61 (313) 8376 6284' , 'conexaog-elementor' ),
                        'label_block' => true,
                    ],
                ],
            ]
        );
        $this->end_controls_section();

        /** 
        *   Layout section 
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
        <!-- Contact Form Area start -->
        <section class="contact-area" >
            <div class="container">
                <div class="row justify-content-between contact-content">
                    <div class="col-lg-9 ct-form wow fadeInRight delay-0-2s">
                        <?php print do_shortcode(html_entity_decode( $settings['shortcode'] )); ?>
                    </div>
                    <div class="contact-info wow fadeInLeft delay-0-2s">
                        <div class="section-title mb-32">
                            <?php if(isset($settings['heading']) && $settings['heading'] != ''){?>
                            <h5 class="mb-32"><?php print wp_kses_post($settings['heading']); ?></h5>
                            <?php } ?>
                            <?php if(isset($settings['description']) && $settings['description'] != ''){?>
                            <p><?php print wp_kses_post($settings['description']); ?></p>
                            <?php } ?>
                        </div>
                        <?php foreach ( $settings['tabs'] as $item ) : ?>
                        <div class="contact-info-item">
                            <?php if(isset($item['icon']) && $item['icon'] != ''){?>
                            <i class="fas <?php print wp_kses_post($item['icon']); ?>"></i> 
                            <?php } ?>
                            <?php if( wp_kses_post($item['choose_style']) == '1'): ?>
                            <a href="callto:<?php print wp_kses_post($item['detail']); ?>"><?php print wp_kses_post($item['detail']); ?></a>
                            <?php elseif( wp_kses_post($item['choose_style']) == '2'): ?>
                            <a href="mailto:<?php print wp_kses_post($item['detail']); ?>"><?php print wp_kses_post($item['detail']); ?></a>
                            <?php else : ?>
                                <span class="text"><?php print wp_kses_post($item['detail']); ?></span>
                            <?php endif; ?>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </section>
        <!-- Contact Form Area end -->
    <?php
    }
}


