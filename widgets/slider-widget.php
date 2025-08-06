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
class BdevsSlider extends \Elementor\Widget_Base {

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
        return 'bdevs-slider';
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
        return __( 'Slider', 'bdevs-elementor' );
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
        return 'eicon-banner';
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
        return [ 'slider' ];
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
                'label' => esc_html__( 'Slider', 'bdevs-elementor' ),
            ]   
        ); 
        $this->add_control(
            'choose_style',
            [
                'label'     => esc_html__( 'Choose Style', 'bdevs-elementor' ),
                'type'      => Controls_Manager::SELECT,
                'options'   => [
                    'style_1'  => esc_html__( 'Manual Upload', 'bdevs-elementor' ),
                    'style_2'  => esc_html__( 'Get Projects', 'bdevs-elementor' ),
                ],
                'default'   => 'style_1',
            ]
        );
        $this->add_control(
            'tabs',
            [
                'label' => esc_html__( 'Items', 'bdevs-elementor' ),
                'type' => Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name'    => 'slider_image',
                        'label'   => esc_html__( 'Image', 'bdevs-elementor' ),
                        'type'    => Controls_Manager::MEDIA,
                         'default'     => esc_html__( '' , 'bdevs-elementor' ),
                        'dynamic' => [ 'active' => true ],
                    ],
                    [
                        'name'        => 'rotate',
                        'label'       => esc_html__( 'Rotate Text:', 'bdevs-elementor' ),
                        'type'        => Controls_Manager::TEXT,
                        'dynamic'     => [ 'active' => true ],
                        'default'     => esc_html__( 'DESIGN' , 'bdevs-elementor' ),
                        'label_block' => true,
                    ],
                    [
                        'name'        => 'left',
                        'label'       => esc_html__( 'Rotate Left:', 'bdevs-elementor' ),
                        'type'        => Controls_Manager::NUMBER,
                        'dynamic'     => [ 'active' => true ],
                        'default'     => esc_html__( '-282' , 'bdevs-elementor' ),
                        'label_block' => true,
                    ],
                    [
                        'name'        => 'bottom',
                        'label'       => esc_html__( 'Rotate Bottom:', 'bdevs-elementor' ),
                        'type'        => Controls_Manager::NUMBER,
                        'dynamic'     => [ 'active' => true ],
                        'default'     => esc_html__( '255' , 'bdevs-elementor' ),
                        'label_block' => true,
                    ],
                    [
                        'name'        => 'title',
                        'label'       => esc_html__( 'Title:', 'bdevs-elementor' ),
                        'type'        => Controls_Manager::TEXTAREA,
                        'dynamic'     => [ 'active' => true ],
                        'default'     => esc_html__( 'This is title' , 'bdevs-elementor' ),
                        'label_block' => true,
                    ],
                    [
                        'name'        => 'link_button',
                        'label'       => esc_html__( 'Link Button:', 'bdevs-elementor' ),
                        'type'        => Controls_Manager::TEXT,
                        'dynamic'     => [ 'active' => true ],
                        'default'     => esc_html__( '#' , 'bdevs-elementor' ),
                        'label_block' => true,
                    ],
                    [
                        'name'        => 'button',
                        'label'       => esc_html__( 'Button:', 'bdevs-elementor' ),
                        'type'        => Controls_Manager::TEXT,
                        'dynamic'     => [ 'active' => true ],
                        'default'     => esc_html__( 'Read More' , 'bdevs-elementor' ),
                        'label_block' => true,
                    ],
                ],
                'condition' => [
                    'choose_style' => ['style_1'],
                ]
            ]
        );
        $this->add_control(
            'posts_per_page',
            [
                'label'       => __( 'Posts Per Page:', 'bdevs-elementor' ),
                'type'        => Controls_Manager::TEXT,
                'placeholder' => __( 'Enter your posts per page', 'bdevs-elementor' ),
                'default'     => __( '4', 'bdevs-elementor' ),
                'label_block' => true,
                'condition' => [
                    'choose_style' => ['style_2'],
                ]
            ]
        );
        $this->add_control(
            'sortby',
            [
                'label'     => esc_html__( 'Sort', 'bdevs-elementor' ),
                'type'      => Controls_Manager::SELECT,
                'options'   => [
                    'sortby_style_1'  => esc_html__( 'Newest', 'bdevs-elementor' ),
                    'sortby_style_2'  => esc_html__( 'Oldest', 'bdevs-elementor' ),
                ],
                'default'   => 'sortby_style_1',
                'condition' => [
                    'choose_style' => ['style_2'],
                ]
            ]
        );
        $this->add_control(
            'tabs2',
            [
                'label' => esc_html__( 'Rotate Text', 'bdevs-elementor' ),
                'type' => Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name'        => 'rotate',
                        'label'       => esc_html__( 'Rotate Text:', 'bdevs-elementor' ),
                        'type'        => Controls_Manager::TEXT,
                        'dynamic'     => [ 'active' => true ],
                        'default'     => esc_html__( 'DESIGN' , 'bdevs-elementor' ),
                        'label_block' => true,
                    ],
                    [
                        'name'        => 'left',
                        'label'       => esc_html__( 'Rotate Left:', 'bdevs-elementor' ),
                        'type'        => Controls_Manager::NUMBER,
                        'dynamic'     => [ 'active' => true ],
                        'default'     => esc_html__( '-282' , 'bdevs-elementor' ),
                        'label_block' => true,
                    ],
                    [
                        'name'        => 'bottom',
                        'label'       => esc_html__( 'Rotate Bottom:', 'bdevs-elementor' ),
                        'type'        => Controls_Manager::NUMBER,
                        'dynamic'     => [ 'active' => true ],
                        'default'     => esc_html__( '255' , 'bdevs-elementor' ),
                        'label_block' => true,
                    ],                    
                ],
                'condition' => [
                    'choose_style' => ['style_2'],
                ]
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
    <?php $style = $settings['choose_style'];?>
    <?php if( $style == 'style_1' ): ?> 
    <section class="hero-area mt-92 pb-64 black-120-bg">
        <div class="container pb-64">          
            <div class="carousel slide" id="recipeCarousel" data-bs-ride="carousel">               
                <div class="carousel-indicators">
                    <?php $i=0; ?>
                    <?php foreach ( $settings['tabs'] as $item ) :  ?>
                    <button type="button" data-bs-target="#recipeCarousel" data-bs-slide-to="<?php echo $i; ?>" class="<?php if($i==0) { echo 'active';} ?>" aria-current="<?php if($i==0) { echo 'true';} ?>" aria-label="Slide <?php echo $i+1; ?>"></button>
                    <?php $i++; ?>
                    <?php endforeach; ?> 
                </div>                    
                <div class=" carousel-inner" role="listbox">
                    <?php $j=1; ?>
                    <?php foreach ( $settings['tabs'] as $item ) :  ?>
                    <div class="row carousel-item <?php if($j==1){echo 'active';} ?>">
                        <div class="d-flex">
                            <?php if(isset($item['rotate']) && $item['rotate'] != ''){?>
                            <div class="col-lg-2">
                                <h1 class="rotate-hero" style="left: <?php print wp_kses_post($item['left']); ?>px; bottom: <?php print wp_kses_post($item['bottom']); ?>px;"><?php print wp_kses_post($item['rotate']); ?></h1>
                            </div>
                            <?php } ?>
                            <div class="col-lg-10 d-flex hero-text-img">
                                <div class="hero-content">
                                    <div class="wow fadeInUp delay-0-1s">
                                        <?php if(isset($item['title']) && $item['title'] != ''){?>
                                        <h6><?php print wp_kses_post($item['title']); ?></h6>
                                        <?php } ?>
                                        <?php if(isset($item['link_button']) && $item['link_button'] != ''){?>
                                        <a href="<?php print wp_kses_post($item['link_button']); ?>" class="hero-btn wow fadeInUp delay-0-1s"><?php print wp_kses_post($item['button']); ?>
                                            <span class="btn-icon">
                                                <span class="circle"></span>
                                                <span class="dot"></span>
                                                <span class="line"></span>
                                                <span class="fa fa-long-arrow-right"></span>
                                            </span>
                                        </a>
                                        <?php } ?>
                                    </div>
                                </div>
                                <?php if(isset($item['slider_image']['url']) && $item['slider_image']['url'] != ''){?>
                                <div class="bg-img">                                        
                                    <a href="<?php print wp_kses_post($item['link_button']); ?>">   
                                        <img class="hero-img <?php if($j==1){echo 'wow zoomIn';} ?>" src="<?php echo wp_kses_post($item['slider_image']['url']); ?>" alt="slider image">
                                    </a>                                        
                                </div>
                                <?php } ?>
                            </div>
                        </div>                                                  
                    </div>
                    <?php $j++; ?>
                    <?php endforeach; ?> 
                </div>
            </div>                  
        </div>
    </section>
    <?php elseif( $style == 'style_2' ): ?> 
    <section class="hero-area mt-92 pb-64 black-120-bg">
        <div class="container pb-64">
            <div class="carousel slide" id="recipeCarousel" data-bs-ride="carousel">               
                <div class="carousel-indicators">
                    <?php $i2=0; ?>
                    <?php $post_number = $settings['posts_per_page'];
                    $wp_query = new \WP_Query(array('posts_per_page' => $post_number,'post_type' => 'project',  'orderby' => 'ID', 'order' => $sortby));     
                    $args = new \WP_Query(array(   
                        'post_type' => 'project', 
                    ));  
                    while ($wp_query -> have_posts()) : $wp_query -> the_post(); ?> 
                    <button type="button" data-bs-target="#recipeCarousel" data-bs-slide-to="<?php echo $i2; ?>" class="<?php if($i2==0) { echo 'active';} ?>" aria-current="<?php if($i2==0) { echo 'true';} ?>" aria-label="Slide <?php echo $i2+1; ?>"></button>
                    <?php $i2++; ?>
                    <?php endwhile; ?> 
                </div>
                <div class=" carousel-inner" role="listbox">
                    <?php if ($settings['sortby']=='sortby_style_1') {
                        $sortby = 'DESC';
                    }
                    if ($settings['sortby']=='sortby_style_2') {
                        $sortby = 'ASC';
                    } ?>                       
                    <?php $post_number = $settings['posts_per_page'];
                    $wp_query = new \WP_Query(array('posts_per_page' => $post_number,'post_type' => 'project',  'orderby' => 'ID', 'order' => $sortby));     
                    $args = new \WP_Query(array(   
                        'post_type' => 'project', 
                    ));  
                    $j2=1;
                    while ($wp_query -> have_posts()) : $wp_query -> the_post(); ?> 
                    <div class="row carousel-item <?php if($j2==1){echo 'active';} ?>">
                        <div class="d-flex">
                            <?php 
                            $d=1;
                            foreach ( $settings['tabs2'] as $item2 ) :  ?>
                            <?php if($j2==$d){ ?>
                            <?php if(isset($item2['rotate']) && $item2['rotate'] != ''){?>
                            <div class="col-lg-2">
                                <h1 class="rotate-hero" style="left: <?php print wp_kses_post($item2['left']); ?>px; bottom: <?php print wp_kses_post($item2['bottom']); ?>px;"><?php print wp_kses_post($item2['rotate']); ?></h1>
                            </div>
                            <?php } ?>
                            <?php } ?>
                            <?php $d++; ?>
                            <?php endforeach; ?> 
                            <div class="col-lg-10 d-flex hero-text-img">
                                <div class="hero-content">
                                    <div class="wow fadeInUp delay-0-1s">
                                        <h6><?php the_title(); ?></h6>
                                        <a href="<?php the_permalink(); ?>" class="hero-btn wow fadeInUp delay-0-1s"><?php if(isset($indoconexaog_redux_demo['read_more'])){?>
                                        <?php echo wp_specialchars_decode(esc_attr($indoconexaog_redux_demo['read_more']));?>
                                        <?php }else{?>
                                        <?php echo esc_html__( 'Read More ', 'indoconexaog' );?> 
                                        <?php } ?>
                                            <span class="btn-icon">
                                                <span class="circle"></span>
                                                <span class="dot"></span>
                                                <span class="line"></span>
                                                <span class="fa fa-long-arrow-right"></span>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                                <?php if ( has_post_thumbnail() ) { ?>
                                <div class="bg-img">                                        
                                    <a href="<?php the_permalink(); ?>">   
                                        <img class="hero-img <?php if($j2==1){echo 'wow zoomIn';} ?>" src="<?php echo wp_get_attachment_url(get_post_thumbnail_id());?>" alt="slider image">
                                    </a>                                        
                                </div>
                                <?php } ?>
                            </div>
                        </div>                                                  
                    </div>
                    <?php $j2++; ?>
                    <?php endwhile; ?> 
                </div>               
            </div>                  
        </div>
    </section>
    <?php endif; ?>
    <?php
    }

}

