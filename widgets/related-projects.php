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
class BdevsRelatedProjects extends \Elementor\Widget_Base {

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
        return 'bdevs-related-projects';
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
        return __( 'Related Projects', 'bdevs-elementor' );
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
        return [ 'related projects' ];
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
                'label' => esc_html__( 'Related Projects', 'bdevs-elementor' ),
            ]   
        );  
        $this->add_control(
            'prev',
            [
                'label'       => __( 'Prev:', 'bdevs-elementor' ),
                'type'        => Controls_Manager::TEXT,
                'placeholder' => __( 'Enter your text', 'bdevs-elementor' ),
                'default'     => __( 'Prev', 'bdevs-elementor' ),
                'label_block' => true,
            ]
        );      
        $this->add_control(
            'next',
            [
                'label'       => __( 'Next:', 'bdevs-elementor' ),
                'type'        => Controls_Manager::TEXT,
                'placeholder' => __( 'Enter your text', 'bdevs-elementor' ),
                'default'     => __( 'Next', 'bdevs-elementor' ),
                'label_block' => true,
            ]
        );  
        $this->add_control(
            'projects_link',
            [
                'label'       => __( 'Projects Link:', 'bdevs-elementor' ),
                'type'        => Controls_Manager::TEXTAREA,
                'placeholder' => __( 'Enter your link to projects page', 'bdevs-elementor' ),
                'default'     => __( '#', 'bdevs-elementor' ),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'posts_per_page',
            [
                'label'       => __( 'Posts Per Page:', 'bdevs-elementor' ),
                'type'        => Controls_Manager::TEXT,
                'placeholder' => __( 'Enter your posts per page', 'bdevs-elementor' ),
                'default'     => __( '2', 'bdevs-elementor' ),
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
        <!-- Related Projects Area start -->
        <section class="related-projects py-128 black-10-bg">
            <div class="container">
                <div class="content align-items-center">
                    <div class="row mb-64 wow fadeInLeft delay-0-1s">
                        <?php if(isset($settings['prev']) && $settings['prev'] != ''){?>
                            <?php $post_number = $settings['posts_per_page'];
                            $wp_query = new \WP_Query(array('posts_per_page' => $post_number,'post_type' => 'project',  'orderby' => 'ID', 'order' => $sortby));     
                            $args = new \WP_Query(array(   
                                'post_type' => 'project', 
                            ));  
                            $j1=0;
                            while ($wp_query -> have_posts()) : $wp_query -> the_post(); ?>
                            <?php $j1++;?>
                            <?php if ($j1==1) {?> 
                            <a class="prev-pro" type="button" href="<?php the_permalink(); ?>">
                                <i class="fa fa-long-arrow-left"></i> <?php print wp_kses_post($settings['prev']); ?>
                            </a>
                            <?php } ?>
                            <?php endwhile; ?> 
                        <?php } ?>
                        <!-- link to projects page -->
                        <?php if(isset($settings['projects_link']) && $settings['projects_link'] != ''){?>
                        <a href="<?php print wp_kses_post($settings['projects_link']); ?>"><i class="fa fa-table"></i></a>
                        <?php } ?>
                        
                        <?php if(isset($settings['next']) && $settings['next'] != ''){?>
                            <?php $post_number = $settings['posts_per_page'];
                            $wp_query = new \WP_Query(array('posts_per_page' => $post_number,'post_type' => 'project',  'orderby' => 'ID', 'order' => $sortby));     
                            $args = new \WP_Query(array(   
                                'post_type' => 'project', 
                            ));  
                            $j2=0;
                            while ($wp_query -> have_posts()) : $wp_query -> the_post(); ?>
                            <?php $j2++;?>
                            <?php if ($j2==2) {?> 
                            <a class="next-pro" type="button" href="<?php the_permalink(); ?>">
                                <?php print wp_kses_post($settings['next']); ?> <i class="fa fa-long-arrow-right"></i>
                            </a>
                            <?php } ?>
                            <?php endwhile; ?> 
                        <?php } ?>
                    </div>   
                    <div class="row wow fadeInLeft delay-0-1s">
                        <?php $post_number = $settings['posts_per_page'];
                        $wp_query = new \WP_Query(array('posts_per_page' => $post_number,'post_type' => 'project',  'orderby' => 'ID', 'order' => $sortby));     
                        $args = new \WP_Query(array(   
                            'post_type' => 'project', 
                        ));  
                        $j=0;
                        while ($wp_query -> have_posts()) : $wp_query -> the_post(); ?> 
                        <?php $description = get_post_meta(get_the_ID(),'_cmb_description', true); ?>
                        <?php $j++;?>
                        <?php if ($j%2==1) {?>
                        <div class="col-lg-6 related-left">
                            <div class="row black-100-bg">
                                <?php if ( has_post_thumbnail() ) { ?>
                                <div class="col-xs-12 col-sm-6  col-lg-6">
                                    <a href="<?php the_permalink(); ?>"><img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id());?>" alt="<?php the_title_attribute(); ?>"></a>
                                </div>
                                <?php  } ?>
                                <div class="col-xs-12 col-sm-6 col-lg-6 related-text">
                                    <a href="<?php the_permalink(); ?>"><h5 class="mb-16"><?php the_title(); ?></h5></a>
                                    <ul class="blog-meta mb-20">
                                        <li>
                                            <i class="fal fa-calendar-alt"></i> 
                                            <?php the_time(get_option('date_format')); ?>
                                        </li>
                                        <li>
                                            <i class="fal fa-user"></i>
                                            <?php the_author_posts_link(); ?>
                                        </li>
                                    </ul>
                                    <?php if(isset($description) && $description != '') { ?>
                                    <p><?php echo wp_kses_post($description);?></p>
                                    <?php } ?>
                                </div>
                            </div>                            
                        </div>
                        <?php } else { ?>
                        <div class="col-lg-6 related-right">
                            <div class="row white-bg ">
                                <div class="col-xs-12 col-sm-6 col-lg-6 related-text">
                                    <a href="<?php the_permalink(); ?>"><h5 class="mb-16"><?php the_title(); ?></h5></a>
                                    <ul class="blog-meta mb-20">
                                        <li>
                                            <i class="fal fa-calendar-alt"></i> 
                                            <?php the_time(get_option('date_format')); ?>
                                        </li>
                                        <li>
                                            <i class="fal fa-user"></i>
                                            <?php the_author_posts_link(); ?>
                                        </li>
                                    </ul>
                                    <?php if(isset($description) && $description != '') { ?>
                                    <p><?php echo wp_kses_post($description);?></p>
                                    <?php } ?>
                                </div>
                                <?php if ( has_post_thumbnail() ) { ?>
                                <div class="col-xs-12 col-sm-6 col-lg-6">
                                    <a href="<?php the_permalink(); ?>"><img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id());?>" alt="<?php the_title_attribute(); ?>"></a>
                                </div>
                                <?php } ?>
                            </div>  
                        </div>
                        <?php } ?>
                        <?php endwhile; ?> 
                    </div>       
                </div>
            </div>
        </section>
        <!-- Related Projects Area end -->
    <?php
    }
}
