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
class BdevsWorkProcess extends \Elementor\Widget_Base {

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
        return 'bdevs-work-process';
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
        return __( 'Work Process', 'bdevs-elementor' );
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
        return 'eicon-person';
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
        return [ 'work process' ];
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
                'label' => esc_html__( 'Work Process', 'bdevs-elementor' ),
            ]   
        ); 
        $this->add_control(
            'heading',
            [
                'label'       => __( 'Heading:', 'bdevs-elementor' ),
                'type'        => Controls_Manager::TEXT,
                'placeholder' => __( 'Enter your heading', 'bdevs-elementor' ),
                'default'     => __( 'WORK PROCESS', 'bdevs-elementor' ),
                'label_block' => true,
            ]
        ); 
        $this->add_control(
            'link_button',
            [
                'label'       => __( 'Link Button:', 'bdevs-elementor' ),
                'type'        => Controls_Manager::TEXT,
                'placeholder' => __( 'Enter your link', 'bdevs-elementor' ),
                'default'     => __( '#', 'bdevs-elementor' ),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'button',
            [
                'label'       => __( 'Button:', 'bdevs-elementor' ),
                'type'        => Controls_Manager::TEXT,
                'placeholder' => __( 'Enter your button', 'bdevs-elementor' ),
                'default'     => __( 'Contact us', 'bdevs-elementor' ),
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
                        'name'        => 'number',
                        'label'       => esc_html__( 'Number:', 'bdevs-elementor' ),
                        'type'        => Controls_Manager::TEXT,
                        'dynamic'     => [ 'active' => true ],
                        'default'     => esc_html__( '01' , 'bdevs-elementor' ),
                        'label_block' => true,
                    ],
                    [
                        'name'        => 'title',
                        'label'       => esc_html__( 'Title:', 'bdevs-elementor' ),
                        'type'        => Controls_Manager::TEXT,
                        'dynamic'     => [ 'active' => true ],
                        'default'     => esc_html__( 'IDEAS' , 'bdevs-elementor' ),
                        'label_block' => true,
                    ],     
                    [
                        'name'        => 'text',
                        'label'       => esc_html__( 'Text:', 'bdevs-elementor' ),
                        'type'        => Controls_Manager::TEXTAREA,
                        'dynamic'     => [ 'active' => true ],
                        'default'     => esc_html__( 'This is text' , 'bdevs-elementor' ),
                        'label_block' => true,
                    ],
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
        $this->add_control(
            'show_heading',
            [
                'label'   => esc_html__( 'Show Heading', 'bdevs-elementor' ),
                'type'    => Controls_Manager::SWITCHER,
                'default' => 'yes',
            ]
        );
        $this->end_controls_section();

    }

    public function render() {
        $settings  = $this->get_settings_for_display();
        extract($settings); 
        ?>
        <!-- Timeline Area start -->
        <section class="timeline-area py-128 black-90-bg">
            <div class="container">
                <?php if ( $settings['show_heading'] ) : ?>
                <div class="row section-heading mb-96">
                    <?php if(isset($settings['heading']) && $settings['heading'] != ''){?>
                    <div class="section-title  col-sm-6 col-lg-6">
                        <h2 class="wow fadeInUp delay-0-2s"><?php print wp_kses_post($settings['heading']); ?></h2>
                    </div>
                    <?php } ?>
                    <?php if(isset($settings['link_button']) && $settings['link_button'] != ''){?>
                    <div class="button  col-sm-6 col-lg-6">
                        <a class="theme-btn" href="<?php print wp_kses_post($settings['link_button']); ?>"><?php print wp_kses_post($settings['button']); ?></a>  
                    </div>
                    <?php } ?>
                </div> 
                <?php endif; ?>
                <div class="row align-items-center">                   
                    <div class=" col-md-2 col-lg-2">
                       <div class="timeline-content wow fadeInRight delay-0-2s">
                            <?php foreach ( $settings['tabs'] as $item ) :  ?>
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
                    <div class=" col-md-10 col-lg-10">
                        <div class="timeline-images wow fadeInLeft delay-0-2s">
                            <?php foreach ( $settings['tabs'] as $item ) :  ?>
                            <div>
                                <div class="content">
                                    <?php if(isset($item['title']) && $item['title'] != ''){?>
                                    <span class="h5 title"><?php print wp_kses_post($item['title']); ?></span>
                                    <?php } ?>
                                    <?php if(isset($item['text']) && $item['text'] != ''){?>
                                    <p class="description"><?php print wp_kses_post($item['text']); ?></p>
                                    <?php } ?>
                               </div>
                                <?php if(isset($item['wp_image']['url']) && $item['wp_image']['url'] != ''){?>
                                <img src="<?php echo wp_kses_post($item['wp_image']['url']); ?>" alt="Timeline">
                                <?php } ?>
                            </div>
                            <?php endforeach; ?>                           
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php if (is_admin()) { ?>
        <script type="text/javascript">
        if ($('.timeline-images').length) {
            $('.timeline-images').slick({
                dots: false,
                infinite: true,
                autoplay: false,
                autoplaySpeed: 5000,
                arrows: false,
                vertical: false,
                speed: 1000,
                fade: true,
                asNavFor: '.timeline-content',
                variableWidth: false,
                focusOnSelect: false,
                slidesToShow: 1,
                slidesToScroll: 1,
            });
        }

        // ## Timeline Content Slider
        if ($('.timeline-content').length) {
            $('.timeline-content').slick({
                dots: false,
                infinite: true,
                autoplay: false,
                autoplaySpeed: 5000,
                arrows: false,
                vertical: true,
                speed: 1000,
                asNavFor: '.timeline-images',
                variableWidth: false,
                focusOnSelect: true,
                slidesToShow: 4,
                slidesToScroll: 1,
            });
        }
        </script>   
        <?php } ?>
    <?php
    }

}


