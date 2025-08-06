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
class BdevsProjectDetails2 extends \Elementor\Widget_Base {

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
        return 'bdevs-project-details-2';
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
        return __( 'project Details 2', 'conexaog-elementor' );
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
        return 'eicon-blockquote';
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
        return [ 'project details 2' ];
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
                'label' => esc_html__( 'Project Details 2', 'conexaog-elementor' ),
            ]   
        );
        $this->add_control(
            'detail_image',
            [
                'label'   => esc_html__( 'Detail Image', 'conexaog-elementor' ),
                'type'    => Controls_Manager::MEDIA,
                'dynamic' => [ 'active' => true ],
                'description' => esc_html__( 'Add image from here', 'conexaog-elementor' ),
            ]
        );
		$this->add_control(
            'choose_style',
            [
                'label'     => esc_html__( 'Choose Text Style', 'conexaog-elementor' ),
                'type'      => Controls_Manager::SELECT,
                'options'   => [
                    'style_1'  => esc_html__( 'Two columns text', 'conexaog-elementor' ),
                    'style_2'  => esc_html__( 'One column text', 'conexaog-elementor' ),
                ],
                'default'   => 'style_1',
            ]
        );
        $this->add_control(
            'text1',
            [
                'label'       => __( 'Content 1:', 'conexaog-elementor' ),
                'type'        => Controls_Manager::WYSIWYG,
                'placeholder' => __( 'Enter your content', 'conexaog-elementor' ),
                'default'     => __( 'This is content', 'conexaog-elementor' ),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'tabs',
            [
                'label' => esc_html__( 'Items', 'conexaog-elementor' ),
                'type' => Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name'        => 'item',
                        'label'       => esc_html__( 'Text:', 'conexaog-elementor' ),
                        'type'        => Controls_Manager::TEXTAREA,
                        'dynamic'     => [ 'active' => true ],
                        'default'     => esc_html__( 'This is text' , 'conexaog-elementor' ),
                        'label_block' => true,
                    ],                                      
                ],
                'prevent_empty' => false,
            ]
        );
        $this->add_control(
            'text2',
            [
                'label'       => __( 'Content 2:', 'conexaog-elementor' ),
                'type'        => Controls_Manager::WYSIWYG,
                'placeholder' => __( 'Enter your content', 'conexaog-elementor' ),
                'default'     => __( 'This is content', 'conexaog-elementor' ),
                'label_block' => true,
            ]
        );        
        $this->add_control(
            'text3',
            [
                'label'       => __( 'Content 3:', 'conexaog-elementor' ),
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
                    <div class="mb-64 align-items-center">
                        <?php if(isset($settings['detail_image']['url']) && $settings['detail_image']['url'] != ''){?>
                        <div class="row detail-image mb-64 wow fadeInLeft delay-0-1s">
                            <img src="<?php echo wp_kses_post($settings['detail_image']['url']); ?>" alt="Apartment">
                        </div>   
                        <?php } ?>
                        <div class="row mb-64 wow fadeInLeft delay-0-1s">
							<?php $style = $settings['choose_style'];?>
        					<?php if( $style == 'style_1' ): ?> 
                            <div class="col-lg-6 text-left">
                                <?php if(isset($settings['text1']) && $settings['text1'] != ''){?>
                                <p><?php print wp_kses_post($settings['text1']); ?></p>
                                <?php } ?>
                                <ul class="list mb-16">
                                    <?php foreach ( $settings['tabs'] as $item ) :  ?>
                                        <?php if(isset($item['item']) && $item['item'] != ''){?>
                                        <li><i class="fa-solid fa-check"></i> <?php print wp_kses_post($item['item']); ?></li>
                                        <?php } ?>
                                    <?php endforeach; ?>
                                </ul>
                                <?php if(isset($settings['text2']) && $settings['text2'] != ''){?>
                                <p><?php print wp_kses_post($settings['text2']); ?></p>
                                <?php } ?>
                            </div>
                            <div class="col-lg-6 text-right">
                                <?php if(isset($settings['text3']) && $settings['text3'] != ''){?>
                                <p><?php print wp_kses_post($settings['text3']); ?></p>
                                <?php } ?>
                            </div>
							<?php elseif( $style == 'style_2' ): ?> 
							<div class="col-lg-12">
                                <?php if(isset($settings['text1']) && $settings['text1'] != ''){?>
                                <p><?php print wp_kses_post($settings['text1']); ?></p>
                                <?php } ?>
                                <ul class="list mb-16">
                                    <?php foreach ( $settings['tabs'] as $item ) :  ?>
                                        <?php if(isset($item['item']) && $item['item'] != ''){?>
                                        <li><i class="fa-solid fa-check"></i> <?php print wp_kses_post($item['item']); ?></li>
                                        <?php } ?>
                                    <?php endforeach; ?>
                                </ul>
                                <?php if(isset($settings['text2']) && $settings['text2'] != ''){?>
                                <p><?php print wp_kses_post($settings['text2']); ?></p>
                                <?php } ?>
                            </div>
                            <div class="col-lg-12">
                                <?php if(isset($settings['text3']) && $settings['text3'] != ''){?>
                                <p><?php print wp_kses_post($settings['text3']); ?></p>
                                <?php } ?>
                            </div>
							<?php endif; ?>
                        </div>       
                    </div>    
                </div>
            </div>
        </section>
    <?php
    }
}


