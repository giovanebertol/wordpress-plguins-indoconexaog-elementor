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
class BdevsGallery extends \Elementor\Widget_Base {

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
        return 'bdevs-gallery';
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
        return __( 'Gallery', 'conexaog-elementor' );
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
        return 'eicon-person';
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
        return [ 'gallery' ];
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
                'label' => esc_html__( 'Gallery', 'conexaog-elementor' ),
            ]   
        );
        $this->add_control(
            'tabs',
            [
                'label' => esc_html__( 'Items', 'conexaog-elementor' ),
                'type' => Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name'        => 'choose_style',
                        'label'     => esc_html__( 'Choose Style', 'conexaog-elementor' ),
                        'type'      => Controls_Manager::SELECT,
                        'dynamic' => [ 'active' => true ],
                        'options'   => [
                            '1'  => esc_html__( 'Small image', 'conexaog-elementor' ),
                            '2'  => esc_html__( 'Big image', 'conexaog-elementor' ),
                        ],
                        'default'   => '1',
                    ],
                    [
                        'name'    => 'Gallery_image',
                        'label'   => esc_html__( 'Image', 'conexaog-elementor' ),
                        'type'    => Controls_Manager::MEDIA,
                         'default'     => esc_html__( '' , 'conexaog-elementor' ),
                        'dynamic' => [ 'active' => true ],
                    ],
                    [
                        'name'        => 'margin_bottom',
                        'label'       => esc_html__( 'Margin Bottom:', 'conexaog-elementor' ),
                        'type'        => Controls_Manager::NUMBER,
                        'dynamic'     => [ 'active' => true ],
                        'default'     => esc_html__( '0' , 'conexaog-elementor' ),
                        'label_block' => true,
                    ],
                    [
                        'name'        => 'padding_left',
                        'label'       => esc_html__( 'Padding Left:', 'conexaog-elementor' ),
                        'type'        => Controls_Manager::NUMBER,
                        'dynamic'     => [ 'active' => true ],
                        'default'     => esc_html__( '15' , 'conexaog-elementor' ),
                        'label_block' => true,
                    ],
                    [
                        'name'        => 'padding_right',
                        'label'       => esc_html__( 'Padding Right:', 'conexaog-elementor' ),
                        'type'        => Controls_Manager::NUMBER,
                        'dynamic'     => [ 'active' => true ],
                        'default'     => esc_html__( '15' , 'conexaog-elementor' ),
                        'label_block' => true,
                    ],
                ],
            ]
        );
        $this->add_control(
            'content_left',
            [
                'label'       => __( 'Content Left:', 'conexaog-elementor' ),
                'type'        => Controls_Manager::WYSIWYG,
                'placeholder' => __( 'Enter your content', 'conexaog-elementor' ),
                'default'     => __( 'This is content', 'conexaog-elementor' ),
                'label_block' => true,
            ]
        ); 
        $this->add_control(
            'content_right',
            [
                'label'       => __( 'Content Right:', 'conexaog-elementor' ),
                'type'        => Controls_Manager::WYSIWYG,
                'placeholder' => __( 'Enter your content', 'conexaog-elementor' ),
                'default'     => __( 'This is content', 'conexaog-elementor' ),
                'label_block' => true,
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
        <!-- Architecture Projects Area start -->
        <section class="project-details">
            <div class="container">
                <div class="content">
                    <div class="mb-64 galley text-center wow fadeInLeft delay-0-1s">                        
                        <div class="row">
                            <?php foreach ( $settings['tabs'] as $item ) :  ?>
                            <?php if( wp_kses_post($item['choose_style']) == '2'){ ?>
                            <div class="col-sm-8 col-lg-8 img" style="margin-bottom:<?php echo wp_kses_post($item['margin_bottom']); ?>px;">
                                <?php if(isset($item['Gallery_image']['url']) && $item['Gallery_image']['url'] != ''){?>
                                <img style="padding-left:<?php echo wp_kses_post($item['padding_left']); ?>px; padding-right:<?php echo wp_kses_post($item['padding_right']); ?>px;" src="<?php echo wp_kses_post($item['Gallery_image']['url']); ?>" alt="Gallery">
                                <?php } ?>
                            </div>
                            <?php } else { ?>
                            <div class="col-sm-4 col-lg-4 img" style="margin-bottom:<?php echo wp_kses_post($item['margin_bottom']); ?>px;">
                                <?php if(isset($item['Gallery_image']['url']) && $item['Gallery_image']['url'] != ''){?>
                                <img style="padding-left:<?php echo wp_kses_post($item['padding_left']); ?>px; padding-right:<?php echo wp_kses_post($item['padding_right']); ?>px;" src="<?php echo wp_kses_post($item['Gallery_image']['url']); ?>" alt="Gallery">
                                <?php } ?>
                            </div>
                            <?php } ?>
                            <?php endforeach; ?>
                        </div>                        
                    </div>
                    <div class="mb-64 align-items-center">  
                        <div class="row wow fadeInLeft delay-0-1s">
                            <?php if(isset($settings['content_left']) && $settings['content_left'] != ''){?>
                            <div class="col-lg-6 text-left">
                                <?php print wp_kses_post($settings['content_left']); ?>
                            </div>
                            <?php } ?>
                            <?php if(isset($settings['content_right']) && $settings['content_right'] != ''){?>
                            <div class="col-lg-6 text-right">
                                <?php print wp_kses_post($settings['content_right']); ?>
                            </div>
                            <?php } ?>
                        </div>       
                    </div> 
                </div>
            </div>
        </section>
    <?php
    }

}


