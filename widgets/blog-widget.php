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
class BdevsBlog extends \Elementor\Widget_Base {

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
        return 'bdevs-blog';
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
        return __( 'Blog', 'bdevs-elementor' );
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
        return 'eicon-post-list';
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
        return [ 'blog' ];
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
                'label' => esc_html__( 'Blog', 'bdevs-elementor' ),
            ]   
        );    
        $this->add_control(
            'heading',
            [
                'label'       => __( 'heading:', 'bdevs-elementor' ),
                'type'        => Controls_Manager::TEXT,
                'placeholder' => __( 'Enter your heading', 'bdevs-elementor' ),
                'default'     => __( 'LATEST NEWS', 'bdevs-elementor' ),
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
                'default'     => __( 'More News', 'bdevs-elementor' ),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'posts_per_page',
            [
                'label'       => __( 'Posts Per Page:', 'bdevs-elementor' ),
                'type'        => Controls_Manager::TEXT,
                'placeholder' => __( 'Enter your posts per page', 'bdevs-elementor' ),
                'default'     => __( '3', 'bdevs-elementor' ),
                'label_block' => true,
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
        if ($settings['sortby']=='sortby_style_1') {
            $sortby = 'DESC';
        }
        if ($settings['sortby']=='sortby_style_2') {
            $sortby = 'ASC';
        }
        ?>
        <!-- Blog Area start -->
        <section class="blog-area blog-home py-128 black-100-bg">
            <div class="container">
                <?php if ( $settings['show_heading'] ) : ?>
               <div class="row section-heading mb-96">
                    <?php if(isset($settings['heading']) && $settings['heading'] != ''){?>
                    <div class="section-title col-sm-6 col-lg-6">
                        <h2 class="wow fadeInUp delay-0-2s"><?php print wp_kses_post($settings['heading']); ?></h2>
                    </div>
                    <?php } ?>
                    <?php if(isset($settings['link_button']) && $settings['link_button'] != ''){?>
                    <div class="button col-sm-6 col-lg-6">
                        <a class="theme-btn" href="<?php print wp_kses_post($settings['link_button']); ?>"><?php print wp_kses_post($settings['button']); ?></a>  
                    </div>
                    <?php } ?>
                </div> 
                <?php endif; ?>    
                <div class="row">
                    <?php
                    $posts_per_page = $settings['posts_per_page'];
                    $wp_query = new \WP_Query(array('posts_per_page' => $posts_per_page,'post_type' => 'post',  'orderby' => 'ID', 'order' => $sortby));     
                    $args = new \WP_Query(array(   
                        'post_type' => 'post', 
                    )); 
                    $i=1;
                    while ($wp_query -> have_posts()) : $wp_query -> the_post(); 
                    ?>
                    <?php if($i%2==1) { ?>
                    <div class="col-lg-4 item text-center">
                        <div class="blog-item wow fadeInUp delay-0-2s black-30-bg ">
                            <div class="content ">                               
                                <h6><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h6>
                                <hr>
                                <span><i class="fal fa-calendar-alt"></i> <?php the_time(get_option( 'date_format' ));?></span>
                                <?php if ( has_post_thumbnail() ) { ?>
                                <div class="image">
                                    <img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id());?>" alt="Blog">
                                </div>
                                <?php } ?>
                                <ul class="blog-meta mb-16">
                                    <li>
                                        <i class="fal fa-user"></i>
                                        <?php the_author_posts_link(); ?>
                                    </li>
                                    <li>
                                        <i class="fal fa-comment-dots"></i> <?php comments_number( esc_html__('0', 'indoconexaog'), esc_html__('1', 'indoconexaog'), esc_html__('%', 'indoconexaog') ); ?>
                                    </li>
                                </ul>
                                <p><?php if(isset($indoconexaog_redux_demo['blog_excerpt'])){?>
                                        <?php echo esc_attr(indoconexaog_excerpt($indoconexaog_redux_demo['blog_excerpt'])); ?>
                                        <?php }else{?>
                                        <?php echo esc_attr(indoconexaog_excerpt(30)); ?>
                                        <?php } ?></p>
                                <a href="<?php the_permalink();?>" class="theme-btn"><?php if(isset($indoconexaog_redux_demo['read_more'])){?>
                                <?php echo wp_specialchars_decode(esc_attr($indoconexaog_redux_demo['read_more']));?>
                                <?php }else{?>
                                <?php echo esc_html__( 'Read More ', 'indoconexaog' );?> 
                                <?php } ?></a>  
                            </div>
                        </div>
                    </div>
                    <?php } elseif($i%2==0) { ?>
                    <div class="col-lg-4 item text-center">
                        <div class="blog-item wow fadeInUp delay-0-2s black-120-bg ">
                            <div class="content ">                               
                                <h6><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h6>
                                <hr>
                                <span><i class="fal fa-calendar-alt"></i> <?php the_time(get_option( 'date_format' ));?></span>
                                <?php if ( has_post_thumbnail() ) { ?>
                                <div class="image">
                                    <img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id());?>" alt="Blog">
                                </div>
                                <?php } ?>
                                <ul class="blog-meta mb-16">
                                    <li>
                                        <i class="fal fa-user"></i>
                                        <?php the_author_posts_link(); ?>
                                    </li>
                                    <li>
                                        <i class="fal fa-comment-dots"></i> <?php comments_number( esc_html__('0', 'indoconexaog'), esc_html__('1', 'indoconexaog'), esc_html__('%', 'indoconexaog') ); ?>
                                    </li>
                                </ul>
                                <p><?php if(isset($indoconexaog_redux_demo['blog_excerpt'])){?>
                                        <?php echo esc_attr(indoconexaog_excerpt($indoconexaog_redux_demo['blog_excerpt'])); ?>
                                        <?php }else{?>
                                        <?php echo esc_attr(indoconexaog_excerpt(30)); ?>
                                        <?php } ?></p>
                                <a href="<?php the_permalink();?>" class="theme-btn"><?php if(isset($indoconexaog_redux_demo['read_more'])){?>
                                <?php echo wp_specialchars_decode(esc_attr($indoconexaog_redux_demo['read_more']));?>
                                <?php }else{?>
                                <?php echo esc_html__( 'Read More ', 'indoconexaog' );?> 
                                <?php } ?></a>  
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    <?php $i++; ?>
                    <?php endwhile; ?> 
                </div>
            </div>
        </section>
        <!-- Blog Area end -->
    <?php
    }
}
