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
class BdevsServices extends \Elementor\Widget_Base {

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
        return 'bdevs-services';
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
        return __( 'Services', 'conexaog-elementor' );
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
        return 'eicon-apps';
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
        return [ 'services' ];
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
                'label' => esc_html__( 'Services', 'conexaog-elementor' ),
            ]   
        );
        $this->add_control(
            'choose_style',
            [
                'label'     => esc_html__( 'Choose Style', 'conexaog-elementor' ),
                'type'      => Controls_Manager::SELECT,
                'options'   => [
                    'style_1'  => esc_html__( 'Style 1', 'conexaog-elementor' ),
                    'style_2'  => esc_html__( 'Style 2', 'conexaog-elementor' ),
                ],
                'default'   => 'style_1',
            ]
        );
        $this->add_control(
            'background_color',
            [
                'label'       => __( 'Background Color:', 'conexaog-elementor' ),
                'type'        => Controls_Manager::COLOR,
                'placeholder' => __( 'Background Color', 'conexaog-elementor' ),
                'default'     => __( '#101010', 'conexaog-elementor' ),
                'label_block' => true,
                'condition' => [
                    'choose_style' => ['style_1'],
                ]
            ]
        );
        $this->add_control(
            'text_color',
            [
                'label'       => __( 'Text Color:', 'conexaog-elementor' ),
                'type'        => Controls_Manager::COLOR,
                'placeholder' => __( 'Text Color', 'conexaog-elementor' ),
                'default'     => __( '#fff', 'conexaog-elementor' ),
                'label_block' => true,
                'condition' => [
                    'choose_style' => ['style_1'],
                ]
            ]
        );
        $this->add_control(
            'button_color',
            [
                'label'       => __( 'Button Border Color:', 'conexaog-elementor' ),
                'type'        => Controls_Manager::COLOR,
                'placeholder' => __( 'Button Border Color', 'conexaog-elementor' ),
                'default'     => __( '#ffffff', 'conexaog-elementor' ),
                'label_block' => true,
                'condition' => [
                    'choose_style' => ['style_1'],
                ]
            ]
        );
        $this->add_control(
            'arrow_color',
            [
                'label'       => __( 'Button Arrow Color:', 'conexaog-elementor' ),
                'type'        => Controls_Manager::COLOR,
                'placeholder' => __( 'Button Arrow Color', 'conexaog-elementor' ),
                'default'     => __( '#141414', 'conexaog-elementor' ),
                'label_block' => true,
                'condition' => [
                    'choose_style' => ['style_1'],
                ]
            ]
        );
        $this->add_control(
            'heading',
            [
                'label'       => __( 'Heading:', 'conexaog-elementor' ),
                'type'        => Controls_Manager::TEXT,
                'placeholder' => __( 'Enter your heading', 'conexaog-elementor' ),
                'default'     => __( 'SERVICES', 'conexaog-elementor' ),
                'label_block' => true,
                'condition' => [
                    'choose_style' => ['style_1'],
                ]
            ]
        );
        $this->add_control(
            'posts_per_page',
            [
                'label'       => __( 'Posts Per Page:', 'conexaog-elementor' ),
                'type'        => Controls_Manager::TEXT,
                'placeholder' => __( 'Enter your posts per page', 'conexaog-elementor' ),
                'default'     => __( '5', 'conexaog-elementor' ),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'sortby',
            [
                'label'     => esc_html__( 'Sort', 'conexaog-elementor' ),
                'type'      => Controls_Manager::SELECT,
                'options'   => [
                    'sortby_style_1'  => esc_html__( 'Newest', 'conexaog-elementor' ),
                    'sortby_style_2'  => esc_html__( 'Oldest', 'conexaog-elementor' ),
                ],
                'default'   => 'sortby_style_1',
            ]
        );
        $this->add_control(
            'arrow_right',
            [
                'label'       => __( 'Arrow Right:', 'conexaog-elementor' ),
                'type'        => Controls_Manager::TEXT,
                'placeholder' => __( 'Enter your arrow right', 'conexaog-elementor' ),
                'default'     => __( 'fa-arrow-right', 'conexaog-elementor' ),
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
        $this->add_control(
            'show_heading',
            [
                'label'   => esc_html__( 'Show Heading', 'conexaog-elementor' ),
                'type'    => Controls_Manager::SWITCHER,
                'default' => 'yes',
                'condition' => [
                    'choose_style' => ['style_1'],
                ]
            ]
        );
        $this->add_control(
            'show_button',
            [
                'label'   => esc_html__( 'Show Button', 'conexaog-elementor' ),
                'type'    => Controls_Manager::SWITCHER,
                'default' => 'yes',
                'condition' => [
                    'choose_style' => ['style_1'],
                ]
            ]
        );
        $this->end_controls_section();

    }

    public function render() {
    $settings  = $this->get_settings_for_display();
    extract($settings); ?>
    <?php $style = $settings['choose_style'] ?>
    <?php if( $style == 'style_1' ): ?> 
        <section class="service-area black-120-bg py-128 justify-content-center">
            <style type="text/css">
                .service-area.black-120-bg{
                    background-color: <?php echo wp_kses_post($settings['background_color']); ?>!important;
                }
                .service-area h2,
                .carousel-item .carousel-caption .big-text,
                .carousel-item .carousel-caption p,
                .carousel-item .carousel-caption a{
                    color: <?php echo wp_kses_post($settings['text_color']); ?>!important;
                }
                @media(min-width: 992px){
                    .light-mode .service-area h2,
                    .service-area h2,
                    .carousel-item .carousel-caption .big-text{
                        text-shadow: 2px 0 <?php echo wp_kses_post($settings['text_color']); ?>!important;
                    }
                }
                .carousel-buttons button{
                    border: 1px solid <?php echo wp_kses_post($settings['button_color']); ?>!important;
                }
                .carousel-buttons button span i{
                    color: <?php echo wp_kses_post($settings['arrow_color']); ?>!important;
                }
            </style>
            <div class="container-fluid">
                <?php if ( $settings['show_heading'] ) : ?>
                <div class="container d-flex section-heading mb-96">
                    <?php if(isset($settings['heading']) && $settings['heading'] != ''){?>
                    <div class="section-title">
                        <h2 class="wow fadeInUp delay-0-2s"><?php print wp_kses_post($settings['heading']); ?></h2>
                    </div>
                    <?php } ?>
                    <?php if ( $settings['show_button'] ) : ?>
                    <div class="carousel-buttons">
                        <button class="prev" type="button" data-bs-target="#servicerecipeCarousel" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"><i class="fa-solid fa-arrow-left"></i></span>
                        </button>
                        <button class="" type="button" data-bs-target="#servicerecipeCarousel" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"><i class="fa-solid fa-arrow-right"></i></span>
                        </button>
                    </div>
                    <?php endif; ?>
                </div>   
                <?php endif; ?>             
                <div class="carousel slide justify-content-center" id="servicerecipeCarousel" data-bs-ride="carousel">
                    <div class="carousel-inner" role="listbox">
                        <?php 
                        if ($settings['sortby']=='sortby_style_1') {
                            $sortby = 'DESC';
                        }
                        if ($settings['sortby']=='sortby_style_2') {
                            $sortby = 'ASC';
                        } ?>
                        <?php $post_number = $settings['posts_per_page'];
                        $wp_query = new \WP_Query(array('posts_per_page' => $post_number,'post_type' => 'service',  'orderby' => 'ID', 'order' => $sortby));     
                        $args = new \WP_Query(array(   
                            'post_type' => 'service', 
                        ));  
                        $i=1;
                        while ($wp_query -> have_posts()) : $wp_query -> the_post(); ?> 
                        <?php $sv_description = get_post_meta(get_the_ID(),'_cmb_sv_description', true); ?>
                        <div class="carousel-item <?php if($i==1) { echo 'active';} ?>">         
                            <div class="col-lg-6 service-act">
                                <?php if ( has_post_thumbnail() ) { ?>
                                <a href="<?php the_permalink(); ?>"><img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id());?>"></a>
                                <?php } ?>
                                <div class="carousel-caption">
                                    <div class="big-text mb-16"><?php the_title(); ?></div>
                                    <?php if(isset($sv_description) && $sv_description != '') { ?>
                                    <p class="mb-32"><?php echo wp_kses_post($sv_description);?></p>
                                    <?php } ?>
                                    <?php if(isset($settings['arrow_right']) && $settings['arrow_right'] != ''){?>
                                    <a href="<?php the_permalink(); ?>"><span class="right-arrow"><i class="fa <?php print wp_kses_post($settings['arrow_right']); ?>"></i></span></a>
                                    <?php } ?>
                                </div>                               
                            </div>            
                        </div>
                        <?php $i++; ?>
                        <?php endwhile; ?> 
                    </div>
                </div>                                                               
            </div>
        </section>
        <!-- Services Section End -->
        <?php if (is_admin()) { ?>
        <script type="text/javascript">
            if ($('#servicerecipeCarousel .carousel-item').length) {
                let serviceitems = document.querySelectorAll('#servicerecipeCarousel .carousel-item')
                serviceitems.forEach((el) => {
                    const minPerSlide = 3
                    let next = el.nextElementSibling            
                    for (var i=1; i<minPerSlide; i++) {
                        if (!next) {
                            next = serviceitems[0]
                        }   
                        let cloneChild = next.cloneNode(true)
                        el.appendChild(cloneChild.children[0])
                        next = next.nextElementSibling
                    }
                })
            }
        </script>   
        <?php } ?>
    <?php elseif( $style == 'style_2' ): ?> 
        <!-- Service Section Start -->
        <section class="service-area-2 black-90-bg py-128 justify-content-center">
            <div class="container">
                <div class="row">
                    <?php 
                    if ($settings['sortby']=='sortby_style_1') {
                        $sortby = 'DESC';
                    }
                    if ($settings['sortby']=='sortby_style_2') {
                        $sortby = 'ASC';
                    } ?>
                    <?php $post_number = $settings['posts_per_page'];
                    $wp_query = new \WP_Query(array('posts_per_page' => $post_number,'post_type' => 'service',  'orderby' => 'ID', 'order' => $sortby));     
                    $args = new \WP_Query(array(   
                        'post_type' => 'service', 
                    ));  
                    $i=1;
                    while ($wp_query -> have_posts()) : $wp_query -> the_post(); ?> 
                    <?php $sv_description = get_post_meta(get_the_ID(),'_cmb_sv_description', true); ?>
                    <?php $sv_icon = get_post_meta(get_the_ID(),'_cmb_sv_icon', true); ?>
                    <div class="col-xs-4 col-lg-4 service-item">
                        <?php if(isset($sv_icon) && $sv_icon != '') { ?>
                        <div class="icon"><i class="fa <?php echo wp_kses_post($sv_icon);?>"></i></div>
                        <?php } ?>
                        <a href="<?php the_permalink(); ?>"><h5><?php the_title(); ?></h5></a>
                        <?php if(isset($sv_description) && $sv_description != '') { ?>
                        <p><?php echo wp_kses_post($sv_description);?></p>
                        <?php } ?>
                        <?php if(isset($settings['arrow_right']) && $settings['arrow_right'] != ''){?>
                        <a href="<?php the_permalink(); ?>"><span class="right-arrow"><i class="fa <?php print wp_kses_post($settings['arrow_right']); ?>"></i></span></a>
                        <?php } ?>
                    </div>
                    <?php $i++; ?>
                    <?php endwhile; ?> 
                </div>                                                       
            </div>
        </section>
        <!-- Services Section End -->
    <?php endif; ?>
    <?php
    }
}


