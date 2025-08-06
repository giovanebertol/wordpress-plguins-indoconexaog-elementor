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
class BdevsInteriorArea extends \Elementor\Widget_Base {

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
        return 'bdevs-interior-area';
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
        return __( 'Interior Projects', 'bdevs-elementor' );
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
        return [ 'interior area' ];
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
                'label' => esc_html__( 'Interior Projects', 'bdevs-elementor' ),
            ]   
        );  
        $this->add_control(
            'subheading',
            [
                'label'       => __( 'Subheading:', 'bdevs-elementor' ),
                'type'        => Controls_Manager::TEXT,
                'placeholder' => __( 'Enter your subheading', 'bdevs-elementor' ),
                'default'     => __( 'INTERIOR PROJECTS', 'bdevs-elementor' ),
                'label_block' => true,
            ]
        );      
        $this->add_control(
            'heading',
            [
                'label'       => __( 'Heading:', 'bdevs-elementor' ),
                'type'        => Controls_Manager::TEXT,
                'placeholder' => __( 'Enter your heading', 'bdevs-elementor' ),
                'default'     => __( 'LATEST WORKS', 'bdevs-elementor' ),
                'label_block' => true,
            ]
        );  
        $this->add_control(
            'category_filter',
            [
                'label'       => __( 'Category:', 'bdevs-elementor' ),
                'type'        => Controls_Manager::TEXT,
                'placeholder' => __( 'Enter your category', 'bdevs-elementor' ),
                'default'     => __( 'INTERIOR', 'bdevs-elementor' ),
                'label_block' => true,
            ]
        );  
        $this->add_control(
            'all',
            [
                'label'       => __( 'ALL:', 'bdevs-elementor' ),
                'type'        => Controls_Manager::TEXT,
                'placeholder' => __( 'Enter your text', 'bdevs-elementor' ),
                'default'     => __( 'ALL', 'bdevs-elementor' ),
                'label_block' => true,
            ]
        );  
        $this->add_control(
            'posts_per_page',
            [
                'label'       => __( 'Posts Per Page:', 'bdevs-elementor' ),
                'type'        => Controls_Manager::TEXT,
                'placeholder' => __( 'Enter your posts per page', 'bdevs-elementor' ),
                'default'     => __( '9', 'bdevs-elementor' ),
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
        $this->add_control(
            'show_filter',
            [
                'label'   => esc_html__( 'Show Filter Menu', 'bdevs-elementor' ),
                'type'    => Controls_Manager::SWITCHER,
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'show_button',
            [
                'label'   => esc_html__( 'Show Button', 'bdevs-elementor' ),
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
        <!-- Interior Projects Section Start -->
        <section class="interior-area black-110-bg py-128 justify-content-center">
            <div class="container-fluid">
                <?php if ( $settings['show_heading'] ) : ?>
                <div class="container rel z-1 justify-content-center text-center">
                    <div class="text-center mb-96 wow fadeInUp delay-0-2s">
                        <?php if(isset($settings['subheading']) && $settings['subheading'] != ''){?>
                        <span class="sub-title mb-16"><?php print wp_kses_post($settings['subheading']); ?></span>
                        <?php } ?>
                        <?php if(isset($settings['heading']) && $settings['heading'] != ''){?>
                        <h2><?php print wp_kses_post($settings['heading']); ?></h2> 
                        <?php } ?>
                    </div>         
                </div>
                <?php endif; ?>
                <?php if ( $settings['show_filter'] ) : ?>
                <div class="container section-heading">
                    <div class="nav-fill-left">
                        <ul class="tab-style-one nav nav-pills nav-fill mb-96 wow fadeInUp delay-0-4s">
                            <li class="nav-item">
                                <a class="nav-link active" data-bs-toggle="tab" href="#inter-tap1"><?php print wp_kses_post($settings['all']); ?></a>
                                <?php if ( $settings['show_button'] ) : ?>
                                <div class="carousel-buttons">
                                    <button class="prev" type="button" data-bs-target="#interiorrecipeCarousel1" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"><i class="fa fa-long-arrow-left"></i></span>
                                    </button>
                                    <button class="" type="button" data-bs-target="#interiorrecipeCarousel1" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"><i class="fa fa-long-arrow-right"></i></span>
                                    </button>
                                </div>
                                <?php endif; ?>
                            </li>
                            <?php $args1 = array(
                            'taxonomy' => 'type3',
                            );
                            $types = get_categories($args1);
                            $i=2;
                            foreach($types as $type) :
                            ?>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#inter-tap<?php echo $i;?>"><?php echo wp_kses_post($type->name);?></a>
                                <?php if ( $settings['show_button'] ) : ?>
                                <div class="carousel-buttons">
                                    <button class="prev" type="button" data-bs-target="#interiorrecipeCarousel<?php echo $i;?>" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"><i class="fa fa-long-arrow-left"></i></span>
                                    </button>
                                    <button class="" type="button" data-bs-target="#interiorrecipeCarousel<?php echo $i;?>" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"><i class="fa fa-long-arrow-right"></i></span>
                                    </button>
                                </div>
                                <?php endif; ?>
                            </li>
                            <?php $i++; ?>
                            <?php endforeach ?>
                        </ul>
                    </div>                   
                </div>   
                <?php endif; ?>               
                <div class="tab-content">                   
                    <div class="tab-pane fade show active" id="inter-tap1">                         
                        <div class="carousel slide interior-nav" id="interiorrecipeCarousel1" data-bs-ride="carousel">
                            <div class="carousel-inner" role="listbox">
                                <?php $post_number = $settings['posts_per_page'];
                                $wp_query = new \WP_Query(array('posts_per_page' => $post_number,'post_type' => 'project',  'orderby' => 'ID', 'order' => $sortby));     
                                $args = new \WP_Query(array(   
                                    'post_type' => 'project', 
                                ));  
                                $j=0;
                                while ($wp_query -> have_posts()) : $wp_query -> the_post(); ?> 
                                <?php $description = get_post_meta(get_the_ID(),'_cmb_description', true); ?>
                                <?php $cats = get_the_terms(get_the_ID(),'category3'); 
                                foreach($cats as $cat) : ?>
                                    <?php if (strcmp(strtolower($cat->name),strtolower($settings['category_filter'])) == 0){ ?>
                                    <?php $j++; ?>
                                    <div class="carousel-item <?php if($j==1){echo 'active';} ?>">
                                        <div class="col-lg-6 interior-act">
                                            <?php if ( has_post_thumbnail() ) { ?>
                                            <a href="<?php the_permalink(); ?>"><img class="zoomIn" src="<?php echo wp_get_attachment_url(get_post_thumbnail_id());?>" alt="project image"></a>
                                            <?php } ?>
                                            <div class="carousel-caption">
                                                <span class="sub-title mb-16"><?php echo wp_kses_post($cat->name); ?></span>
                                                <a href="<?php the_permalink(); ?>"><h5 class="mb-32"><?php the_title(); ?></h5></a>
                                                <?php if(isset($description) && $description != '') { ?>
                                                <p class="mb-32"><?php echo wp_kses_post($description);?></p>
                                                <?php } ?>
                                                <a href="<?php the_permalink(); ?>" class="hero-btn"><?php if(isset($indoconexaog_redux_demo['read_more'])){?>
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
                                    </div>
                                    <?php } ?>
                                <?php endforeach ?>                               
                                <?php endwhile; ?> 
                            </div>
                        </div>  
                    </div>
                    <?php if ( $settings['show_filter'] ) : ?>
                    <?php $args1 = array(
                    'taxonomy' => 'type3',
                    );
                    $types = get_categories($args1);
                    $i2=2;
                    foreach($types as $type) :
                    ?>
                    <div class="tab-pane fade show" id="inter-tap<?php echo $i2;?>">                          
                        <div class="carousel slide interior-nav" id="interiorrecipeCarousel<?php echo $i2;?>" data-bs-ride="carousel">
                            <div class="carousel-inner" role="listbox">
                                <?php $post_number = $settings['posts_per_page'];
                                $wp_query = new \WP_Query(array('posts_per_page' => $post_number,'post_type' => 'project',  'orderby' => 'ID', 'order' => $sortby));     
                                $args = new \WP_Query(array(   
                                    'post_type' => 'project', 
                                ));  
                                $j2=0;
                                while ($wp_query -> have_posts()) : $wp_query -> the_post(); ?> 
                                <?php $description = get_post_meta(get_the_ID(),'_cmb_description', true); ?>
                                <?php $typessingle = get_the_terms(get_the_ID(),'type3');
                                foreach($typessingle as $typesingle) :
                                ?>
                                <?php if (strcmp($type->name,$typesingle->name) == 0){ ?>
                                    <?php $cats = get_the_terms(get_the_ID(),'category3'); 
                                    foreach($cats as $cat) : ?>
                                        <?php if (strcmp(strtolower($cat->name),strtolower($settings['category_filter'])) == 0){ ?>
                                        <?php $j2++; ?>
                                        <div class="carousel-item <?php if($j2==1){echo 'active';} ?>">
                                            <div class="col-lg-6 interior-act">
                                                <?php if ( has_post_thumbnail() ) { ?>
                                                <a href="<?php the_permalink(); ?>"><img class="zoomIn" src="<?php echo wp_get_attachment_url(get_post_thumbnail_id());?>" alt="project image"></a>
                                                <?php } ?>
                                                <div class="carousel-caption">
                                                    <span class="sub-title mb-16"><?php echo wp_kses_post($cat->name); ?> </span>
                                                    <a href="<?php the_permalink(); ?>"><h5 class="mb-32"><?php the_title(); ?></h5></a>
                                                    <?php if(isset($description) && $description != '') { ?>
                                                    <p class="mb-32"><?php echo wp_kses_post($description);?></p>
                                                    <?php } ?>
                                                    <a href="<?php the_permalink(); ?>" class="hero-btn"><?php if(isset($indoconexaog_redux_demo['read_more'])){?>
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
                                        </div>
                                        <?php } ?>
                                    <?php endforeach; ?>
                                <?php } ?>
                                <?php endforeach; ?>                               
                                <?php endwhile; ?>
                            </div>
                        </div>  
                    </div> 
                    <?php $i2++; ?>                  
                    <?php endforeach ?>
                    <?php endif; ?>
                </div>                                                             
            </div>
        </section>
        <!-- Interior Projects Section End -->
        <?php if (is_admin()) { ?>
        <script type="text/javascript">
        if ($('.interior-area .carousel-item').length) {
            let numbernavs = document.getElementsByClassName("interior-nav").length;            
            for(var d=1;d<=numbernavs;d++){
                let interitems = document.querySelectorAll('#interiorrecipeCarousel'+d+' .carousel-item')
                interitems.forEach((el) => {
                    const minPerSlide = 3
                    let next = el.nextElementSibling            
                    for (var i=1; i<minPerSlide; i++) {
                        if (!next) {
                            next = interitems[0]
                        }   
                        let cloneChild = next.cloneNode(true)
                        el.appendChild(cloneChild.children[0])
                        next = next.nextElementSibling
                    }
                })
            }
        }
        </script>   
        <?php } ?>
    <?php
    }
}
