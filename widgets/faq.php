<?php
namespace BdevsElementor\Widget;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;

/**
 * Bdevs Elementor Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class BdevsFAQ extends \Elementor\Widget_Base {

    /**
     * Get widget name.
     *
     * Retrieve Bdevs Elementor widget name.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name() {
        return 'bdevs-faq';
    }

    /**
     * Get widget title.
     *
     * Retrieve Bdevs Elementor widget title.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title() {
        return __( 'FAQ', 'bdevs-elementor' );
    }

    /**
     * Get widget icon.
     *
     * Retrieve Bdevs About widget icon.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget icon.
     */
    public function get_icon() {
        return 'eicon-help';
    }

    /**
     * Get widget categories.
     *
     * Retrieve the list of categories the Bdevs About widget belongs to.
     *
     * @since 1.0.0
     * @access public
     *
     * @return array Widget categories.
     */
    public function get_categories() {
        return [ 'bdevs-elementor' ];
    }

    public function get_keywords() {
        return [ 'faq' ];
    }

    public function get_script_depends() {
        return [ 'bdevs-elementor'];
    }

    // BDT Position
    protected function element_pack_position() {
        $position_options = [
            ''              => esc_html__('Default', 'bdevs-elementor'),
            'top-left'      => esc_html__('Top Left', 'bdevs-elementor') ,
            'top-center'    => esc_html__('Top Center', 'bdevs-elementor') ,
            'top-right'     => esc_html__('Top Right', 'bdevs-elementor') ,
            'center'        => esc_html__('Center', 'bdevs-elementor') ,
            'center-left'   => esc_html__('Center Left', 'bdevs-elementor') ,
            'center-right'  => esc_html__('Center Right', 'bdevs-elementor') ,
            'bottom-left'   => esc_html__('Bottom Left', 'bdevs-elementor') ,
            'bottom-center' => esc_html__('Bottom Center', 'bdevs-elementor') ,
            'bottom-right'  => esc_html__('Bottom Right', 'bdevs-elementor') ,
        ];

        return $position_options;
    }

    protected function _register_controls() {
        
        $this->start_controls_section(
            'section_content_heading',
            [
                'label' => esc_html__( 'FAQ', 'bdevs-elementor' ),
            ]   
        );
        $this->add_control(
            'title',
            [
                'label'       => __( 'Title:', 'bdevs-elementor' ),
                'type'        => Controls_Manager::TEXT,
                'placeholder' => __( 'Enter your title', 'bdevs-elementor' ),
                'default'     => __( 'FREQUENTLY ASKED QUESTIONS', 'bdevs-elementor' ),
                'label_block' => true,
            ]
        ); 
        $this->add_control(
            'title_top',
            [
                'label'       => __( 'Title Top Position:', 'bdevs-elementor' ),
                'type'        => Controls_Manager::NUMBER,
                'placeholder' => __( 'Enter your number', 'bdevs-elementor' ),
                'default'     => __( '122', 'bdevs-elementor' ),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'title_left',
            [
                'label'       => __( 'Title Left Position:', 'bdevs-elementor' ),
                'type'        => Controls_Manager::NUMBER,
                'placeholder' => __( 'Enter your number', 'bdevs-elementor' ),
                'default'     => __( '-128', 'bdevs-elementor' ),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'tabs',
            [
                'label' => esc_html__( 'Items', 'bdevs-elementor' ),
                'type' => Controls_Manager::REPEATER,
                'fields' => [                   
                    [
                        'name'    => 'ruler_active_dark',
                        'label'   => esc_html__( 'Ruler Active Dark Mode', 'bdevs-elementor' ),
                        'type'    => Controls_Manager::MEDIA,
                         'default'     => esc_html__( '' , 'bdevs-elementor' ),
                        'dynamic' => [ 'active' => true ],
                    ], 
                    [
                        'name'    => 'ruler_active_light',
                        'label'   => esc_html__( 'Ruler Active Light Mode', 'bdevs-elementor' ),
                        'type'    => Controls_Manager::MEDIA,
                         'default'     => esc_html__( '' , 'bdevs-elementor' ),
                        'dynamic' => [ 'active' => true ],
                    ],
                    [
                        'name'    => 'ruler',
                        'label'   => esc_html__( 'Ruler', 'bdevs-elementor' ),
                        'type'    => Controls_Manager::MEDIA,
                         'default'     => esc_html__( '' , 'bdevs-elementor' ),
                        'dynamic' => [ 'active' => true ],
                    ],                                 
                    [
                        'name'        => 'number',
                        'label'       => esc_html__( 'Number:', 'bdevs-elementor' ),
                        'type'        => Controls_Manager::TEXT,
                        'dynamic'     => [ 'active' => true ],
                        'default'     => esc_html__( '01' , 'bdevs-elementor' ),
                        'label_block' => true,
                    ],
                    [
                        'name'        => 'question',
                        'label'       => esc_html__( 'question:', 'bdevs-elementor' ),
                        'type'        => Controls_Manager::TEXTAREA,
                        'dynamic'     => [ 'active' => true ],
                        'default'     => esc_html__( 'This is question' , 'bdevs-elementor' ),
                        'label_block' => true,
                    ],
                    [
                        'name'        => 'description',
                        'label'       => esc_html__( 'Description:', 'bdevs-elementor' ),
                        'type'        => Controls_Manager::TEXTAREA,
                        'dynamic'     => [ 'active' => true ],
                        'default'     => esc_html__( 'This is description' , 'bdevs-elementor' ),
                        'label_block' => true,
                    ],
                    [
                        'name'        => 'answer',
                        'label'       => esc_html__( 'Answer:', 'bdevs-elementor' ),
                        'type'        => Controls_Manager::TEXTAREA,
                        'dynamic'     => [ 'active' => true ],
                        'default'     => esc_html__( 'This is answer' , 'bdevs-elementor' ),
                        'label_block' => true,
                    ],
                    [
                        'name'    => 'wp_image',
                        'label'   => esc_html__( 'Image', 'bdevs-elementor' ),
                        'type'    => Controls_Manager::MEDIA,
                         'default'     => esc_html__( '' , 'bdevs-elementor' ),
                        'dynamic' => [ 'active' => true ],
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
                'label' => esc_html__( 'Layout', 'bdevs-elementor' ),
            ]
        );

        $this->add_responsive_control(
            'align',
            [
                'label'   => esc_html__( 'Alignment', 'bdevs-elementor' ),
                'type'    => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__( 'Left', 'bdevs-elementor' ),
                        'icon'  => 'fa fa-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__( 'Center', 'bdevs-elementor' ),
                        'icon'  => 'fa fa-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__( 'Right', 'bdevs-elementor' ),
                        'icon'  => 'fa fa-align-right',
                    ],
                    'justify' => [
                        'title' => esc_html__( 'Justified', 'bdevs-elementor' ),
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
    <section class="faq-area py-128 black-110-bg">
            <div class="container">
                <div class="row align-items-center">   
                    <?php if(isset($settings['title']) && $settings['title'] != ''){?>               
                    <div class="col-sm-1 col-lg-1">
                        <p class="faq-p-rotate">
                            <?php print wp_kses_post($settings['title']); ?>
                            <?php if((isset($settings['title_top']) && $settings['title_top'] != '') || (isset($settings['title_left']) && $settings['title_left'] != '')){?>  
                            <style type="text/css">
                                .faq-p-rotate {
                                    top: <?php print wp_kses_post($settings['title_top']); ?>px;
                                    left: <?php print wp_kses_post($settings['title_left']); ?>px;
                                }
                            </style>
                            <?php } ?>    
                        </p>
                    </div>
                    <?php } ?> 
                    <div class="mobile-ml-96 col-sm-3 col-lg-3">
                       <div class="timeline-content wow fadeInRight delay-0-2s">
                            <?php 
                            foreach ( $settings['tabs'] as $item ) :  
                            ?>
                           <div class="timeline-item">
                                <?php if(isset($item['ruler_active_dark']['url']) && $item['ruler_active_dark']['url'] != ''){?>
                                <img class="ishow ruler-active-dark" src="<?php echo wp_kses_post($item['ruler_active_dark']['url']); ?>" alt="ruler image">
                                <?php } ?>
                                <?php if(isset($item['ruler_active_light']['url']) && $item['ruler_active_light']['url'] != ''){?>
                                <img class="ishow ruler-active-light" src="<?php echo wp_kses_post($item['ruler_active_light']['url']); ?>" alt="ruler image">
                                <?php } ?>
                                <?php if(isset($item['ruler']['url']) && $item['ruler']['url'] != ''){?>
                                <img class="ifade" src="<?php echo wp_kses_post($item['ruler']['url']); ?>" alt="ruler image">
                                <?php } ?>
                                <?php if(isset($item['number']) && $item['number'] != ''){?>
                                <div class="icon h2"><?php print wp_kses_post($item['number']); ?></div>
                                <?php } ?>
                            </div>
                            <?php endforeach; ?>
                       </div>
                    </div>
                    <div class="col-sm-8 col-lg-8">
                        <div class="timeline-images wow fadeInLeft delay-0-2s">
                            <?php 
                            foreach ( $settings['tabs'] as $item ) :  
                            ?>
                            <div class="content" style="background-image: url(<?php echo wp_kses_post($item['wp_image']['url']); ?>);">
                                <div class="faq-text">
                                    <?php if(isset($item['question']) && $item['question'] != ''){?>
                                    <span class="h5 title mb-32"><?php print wp_kses_post($item['question']); ?></span>      
                                    <?php } ?>                            
                                    <?php if(isset($item['description']) && $item['description'] != ''){?>
                                    <h6 class="mb-32"><?php print wp_kses_post($item['description']); ?></h6>
                                    <?php } ?>
                                    <?php if(isset($item['answer']) && $item['answer'] != ''){?>
                                    <p><?php print wp_kses_post($item['answer']); ?></p>
                                    <?php } ?>
                               </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php
    }

}


