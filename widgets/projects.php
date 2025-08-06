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
class BdevsProjects extends \Elementor\Widget_Base {

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
        return 'bdevs-projects';
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
        return __( 'Projects', 'conexaog-elementor' );
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
        return 'eicon-post-list';
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
        return [ 'projects' ];
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
                'label' => esc_html__( 'Projects', 'conexaog-elementor' ),
            ]
        );
        $this->add_control(
            'choose_style',
            [
                'label'     => esc_html__( 'Choose Style', 'conexaog-elementor' ),
                'type'      => Controls_Manager::SELECT,
                'options'   => [
                    'style_1'  => esc_html__( 'Projects 01', 'conexaog-elementor' ),
                    'style_2'  => esc_html__( 'Projects 02', 'conexaog-elementor' ),
                    'style_3'  => esc_html__( 'Projects 03', 'conexaog-elementor' ),
                    'style_4'  => esc_html__( 'Projects 04', 'conexaog-elementor' ),
                    'style_5'  => esc_html__( 'Projects 05', 'conexaog-elementor' ),
                ],
                'default'   => 'style_3',
            ]
        );
        $this->add_control(
            'subheading',
            [
                'label'       => __( 'Subheading:', 'conexaog-elementor' ),
                'type'        => Controls_Manager::TEXT,
                'placeholder' => __( 'Enter your subheading', 'conexaog-elementor' ),
                'default'     => __( 'ARCHITECTURE PROJECTS', 'conexaog-elementor' ),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'heading',
            [
                'label'       => __( 'Heading:', 'conexaog-elementor' ),
                'type'        => Controls_Manager::TEXT,
                'placeholder' => __( 'Enter your heading', 'conexaog-elementor' ),
                'default'     => __( 'LATEST WORKS', 'conexaog-elementor' ),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'all',
            [
                'label'       => __( 'ALL:', 'conexaog-elementor' ),
                'type'        => Controls_Manager::TEXT,
                'placeholder' => __( 'Enter your text', 'conexaog-elementor' ),
                'default'     => __( 'ALL', 'conexaog-elementor' ),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'posts_per_page',
            [
                'label'       => __( 'Posts Per Page:', 'conexaog-elementor' ),
                'type'        => Controls_Manager::TEXT,
                'placeholder' => __( 'Enter your posts per page', 'conexaog-elementor' ),
                'default'     => __( '4', 'conexaog-elementor' ),
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
            'button',
            [
                'label'       => __( 'Button:', 'conexaog-elementor' ),
                'type'        => Controls_Manager::TEXT,
                'placeholder' => __( 'Enter your text', 'conexaog-elementor' ),
                'default'     => __( 'MORE PROJECTS', 'conexaog-elementor' ),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'link_button',
            [
                'label'       => __( 'Link Button:', 'conexaog-elementor' ),
                'type'        => Controls_Manager::TEXT,
                'placeholder' => __( 'Enter your link', 'conexaog-elementor' ),
                'default'     => __( '#', 'conexaog-elementor' ),
                'label_block' => true,
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'section_content_pagination',
            [
                'label' => esc_html__( 'Pagination', 'conexaog-elementor' ),
            ]
        );
        $this->add_control(
            'prev_next_style',
            [
                'label'     => esc_html__( 'Choose Prev and Next Style', 'conexaog-elementor' ),
                'type'      => Controls_Manager::SELECT,
                'options'   => [
                    'btn_style_1'  => esc_html__( 'Text', 'conexaog-elementor' ),
                    'btn_style_2'  => esc_html__( 'Icon', 'conexaog-elementor' ),
                ],
                'default'   => 'btn_style_1',
            ]
        );
        $this->add_control(
            'prev_text',
            [
                'label'       => __( 'Prev:', 'conexaog-elementor' ),
                'type'        => Controls_Manager::TEXT,
                'placeholder' => __( 'Enter your text', 'conexaog-elementor' ),
                'default'     => __( 'Prev', 'conexaog-elementor' ),
                'label_block' => true,
                'condition' => [
                    'prev_next_style' => ['btn_style_1'],
                ]
            ]
        );
        $this->add_control(
            'next_text',
            [
                'label'       => __( 'Next:', 'conexaog-elementor' ),
                'type'        => Controls_Manager::TEXT,
                'placeholder' => __( 'Enter your text', 'conexaog-elementor' ),
                'default'     => __( 'Next', 'conexaog-elementor' ),
                'label_block' => true,
                'condition' => [
                    'prev_next_style' => ['btn_style_1'],
                ]
            ]
        );
        $this->add_control(
            'prev_icon',
            [
                'label' => esc_html__( 'Prev Icon', 'conexaog-elementor' ),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fa fa-solid fa-chevron-left',
                    'library' => 'fa-solid',
                ],
                'condition' => [
                    'prev_next_style' => ['btn_style_2'],
                ]
            ]
        );
        $this->add_control(
            'next_icon',
            [
                'label' => esc_html__( 'Next Icon', 'conexaog-elementor' ),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fa fa-solid fa-chevron-right',
                    'library' => 'fa-solid',
                ],
                'condition' => [
                    'prev_next_style' => ['btn_style_2'],
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
            ]
        );
        $this->add_control(
            'show_filter_tab',
            [
                'label'   => esc_html__( 'Show Filter Tab', 'conexaog-elementor' ),
                'type'    => Controls_Manager::SWITCHER,
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'show_button',
            [
                'label'   => esc_html__( 'Show Button', 'conexaog-elementor' ),
                'type'    => Controls_Manager::SWITCHER,
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'show_pagination',
            [
                'label'   => esc_html__( 'Show Pagination', 'conexaog-elementor' ),
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
        $indoconexaog_redux_demo = get_option('redux_demo');
        ?>
        <?php $style = $settings['choose_style'];?>
        <?php if( $style == 'style_1' ): ?>
        <!-- Architecture Projects Area start -->
        <section class="projects-01 py-128">
            <div class="container">
                <?php if ( $settings['show_heading'] ) : ?>
                <div class="row rel z-1 justify-content-center">
                    <div class="section-title text-center mb-96 wow fadeInUp delay-0-2s">
                        <?php if(isset($settings['subheading']) && $settings['subheading'] != ''){?>
                        <span class="sub-title mb-16"><?php print wp_kses_post($settings['subheading']); ?></span>
                        <?php } ?>
                        <?php if(isset($settings['heading']) && $settings['heading'] != ''){?>
                        <h2><?php print wp_kses_post($settings['heading']); ?></h2>
                        <?php } ?>
                    </div>
                </div>
                <?php endif; ?>
                <?php if ( $settings['show_filter_tab'] ) : ?>
                <ul class="project-filter tab-style-one justify-content-center nav nav-pills nav-fill mb-96 wow fadeInUp delay-0-4s">
                    <li data-filter="*" class="nav-item current">
                        <a class="nav-link"><?php print wp_kses_post($settings['all']); ?></a>
                    </li>
                    <?php $args1 = array(
                    'taxonomy' => 'category3',
                    );
                    $cats = get_categories($args1);
                    if(is_array($cats)) {
                    foreach($cats as $cat) :
                    ?>
                    <li class="nav-item" data-filter=".<?php echo wp_kses_post( $cat->slug )?>">
                        <a class="nav-link"><?php echo wp_kses_post($cat->name);?></a>
                    </li>
                    <?php endforeach ?>
                    <?php   } ?>
                </ul>
                <?php endif; ?>
                <div class="tab-content tab-pane project-active">
                    <?php $post_number = $settings['posts_per_page'];
                    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
                    $wp_query = new \WP_Query(array('paged' => $paged,'posts_per_page' => $post_number,'post_type' => 'project',  'orderby' => 'ID', 'order' => $sortby));
                    $args = new \WP_Query(array(
                        'post_type' => 'project',
                    ));
                    while ($wp_query -> have_posts()) : $wp_query -> the_post(); ?>
                    <?php $fi1_style = get_post_meta(get_the_ID(),'_cmb_fi1_style', true); ?>
                    <?php $description = get_post_meta(get_the_ID(),'_cmb_description', true); ?>
                    <?php $p_featured_image_1 = get_post_meta(get_the_ID(),'_cmb_p_featured_image_1', true); ?>
                        <?php if($fi1_style =='stye_2'){ ?>
                        <div class="col-lg-6 item <?php $cats = get_the_terms(get_the_ID(),'category3'); if(is_array($cats)) { foreach($cats as $cat) {  echo wp_kses_post($cat->slug).' '; } }?>">
                            <div class="row apartment-image wow fadeInLeft delay-0-1s">
                                <?php if(isset($p_featured_image_1) && $p_featured_image_1 != '') { ?>
                                <a href="<?php the_permalink(); ?>">
                                    <img src="<?php echo wp_get_attachment_url($p_featured_image_1);?>" alt="project image">
                                </a>
                                <?php } ?>
                                <div class="carousel-caption d-md-block">
                                    <?php
                                    $catssingle = get_the_terms(get_the_ID(),'category3');
                                    if(is_array($catssingle)) { ?>
                                    <span class="sub-title mb-16">
                                        <?php           
                                        foreach($catssingle as $catsingle) { ?>
                                        <a href="<?php echo get_category_link( $catsingle->term_id ) ?>"><?php echo esc_attr($catsingle->name);?></a>
                                        <?php } ?>
                                    </span>
                                    <?php } ?>
                                    <a href="<?php the_permalink(); ?>"><h5 class="mb-32"><?php the_title(); ?></h5></a>
                                    <?php if(isset($description) && $description != '') { ?>
                                    <p class="mb-32"><?php echo wp_kses_post($description);?></p>
                                    <?php } ?>
                                    <?php if(isset($indoconexaog_redux_demo['read_more']) && $indoconexaog_redux_demo['read_more'] != ''){?>
                                    <div>
                                        <a href="<?php the_permalink(); ?>" class="hero-btn ">
                                        <?php echo wp_specialchars_decode(esc_attr($indoconexaog_redux_demo['read_more']));?>
                                            <span class="btn-icon">
                                                <span class="circle"></span>
                                                <span class="dot"></span>
                                                <span class="line"></span>
                                                <span class="fa-solid fa-arrow-right"></span>
                                            </span>
                                        </a>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <?php } else { ?>
                        <div class="col-lg-12 item <?php $cats = get_the_terms(get_the_ID(),'category3'); if(is_array($cats)) {foreach($cats as $cat) {  echo wp_kses_post($cat->slug).' '; }} ?>" >
                            <div class="row apartment-image wow fadeInLeft delay-0-1s">
                                <?php if(isset($p_featured_image_1) && $p_featured_image_1 != '') { ?>
                                <a href="<?php the_permalink(); ?>">
                                    <img src="<?php echo wp_get_attachment_url($p_featured_image_1);?>" alt="project image">
                                </a>
                                <?php } ?>
                                <div class="carousel-caption d-md-block">
                                    <?php
                                    $catssingle = get_the_terms(get_the_ID(),'category3');
                                    if(is_array($catssingle)) {?>
                                    <span class="sub-title mb-16">
                                        <?php
                                        foreach($catssingle as $catsingle) { ?>
                                        <a href="<?php echo get_category_link( $catsingle->term_id ) ?>"><?php echo esc_attr($catsingle->name);?></a>
                                        <?php } ?>
                                    </span>
                                    <?php } ?>
                                    <a href="<?php the_permalink(); ?>"><h5 class="mb-32"><?php the_title(); ?></h5></a>
                                    <?php if(isset($description) && $description != '') { ?>
                                    <p class="mb-32"><?php echo wp_kses_post($description);?></p>
                                    <?php } ?>
                                    <?php if(isset($indoconexaog_redux_demo['read_more']) && $indoconexaog_redux_demo['read_more'] != ''){?>
                                    <div>
                                        <a href="<?php the_permalink(); ?>" class="hero-btn ">
                                        <?php echo wp_specialchars_decode(esc_attr($indoconexaog_redux_demo['read_more']));?>
                                            <span class="btn-icon">
                                                <span class="circle"></span>
                                                <span class="dot"></span>
                                                <span class="line"></span>
                                                <span class="fa-solid fa-arrow-right"></span>
                                            </span>
                                        </a>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    <?php endwhile; ?>
                    <?php if ( $settings['show_pagination'] ) : ?>
                    <div class="col-lg-12">
                        <?php                         
                            global $paged; // current page
                            if(empty($paged)) $paged = 1;
                            $pages = $wp_query->max_num_pages;
                            if(!$pages){
                                $pages = 1;
                            }
                            if($pages != 1){
                                echo '<ul class="pagination flex-wrap justify-content-center wow fadeInUp delay-0-2s">';
                                if($settings['prev_next_style'] == 'btn_style_1'){
                                    if($paged > 1) echo '<li><a class="prev page-numbers" href="'.get_pagenum_link($paged - 1).'" >'.$settings['prev_text'].'</a></li>';
                                } else {
                                    if($paged > 1) echo '<li><a class="prev page-numbers" href="'.get_pagenum_link($paged - 1).'" ><i class="'.$settings['prev_icon']['value'].'"></i></a></li>';
                                }
                                for($page = 1; $page <= $pages; $page++){
                                echo wp_kses_post($page == $paged ) ? '<li class="active"><a href="'.get_pagenum_link($page).'"><span class="page-numbers">'. $page. '<span class="sr-only">(current)</span></span></a></li>' : '<li ><a class="page-numbers" href="'.get_pagenum_link($page).'">'. $page. '</a></li>';
                             }
                            if($settings['prev_next_style'] == 'btn_style_1'){
                                if($paged <= $pages - 1) echo '<li><a class="next page-numbers" href="'.get_pagenum_link($paged + 1).'" >'.$settings['next_text'].'</a></li>';
                            } else {
                                if($paged <= $pages - 1) echo '<li><a class="next page-numbers" href="'.get_pagenum_link($paged + 1).'" ><i class="'.$settings['next_icon']['value'].'"></i></a></li>';
                            }

                            echo "</ul>\n";
                            }
                        ?>
                    </div>
                    <?php endif; ?>
                    <?php if ( $settings['show_button'] ) : ?>
                    <?php if(isset($settings['link_button']) && $settings['link_button'] != ''){?>
                    <div class="col-lg-12 text-center">
                        <a class="loadmore primary-readmore mt-0" href="<?php print wp_kses_post($settings['link_button']); ?>"><?php print wp_kses_post($settings['button']); ?></a>
                    </div>
                    <?php } ?>
                    <?php endif; ?>
                </div>
            </div>
        </section>
        <!-- Architecture Projects Area end -->
        <?php elseif( $style == 'style_2' ): ?>
        <!-- Architecture Projects Area start -->
        <section class="projects-02 py-128">
            <div class="container">
                <?php if ( $settings['show_heading'] ) : ?>
                <div class="row rel z-1 justify-content-center">
                    <div class="section-title text-center mb-96 wow fadeInUp delay-0-2s">
                        <?php if(isset($settings['subheading']) && $settings['subheading'] != ''){?>
                        <span class="sub-title mb-16"><?php print wp_kses_post($settings['subheading']); ?></span>
                        <?php } ?>
                        <?php if(isset($settings['heading']) && $settings['heading'] != ''){?>
                        <h2><?php print wp_kses_post($settings['heading']); ?></h2>
                        <?php } ?>
                    </div>
                </div>
                <?php endif; ?>
                <?php if ( $settings['show_filter_tab'] ) : ?>
                <ul class="project-filter tab-style-one justify-content-center nav nav-pills nav-fill mb-96 wow fadeInUp delay-0-4s">
                    <li data-filter="*" class="nav-item current">
                        <a class="nav-link"><?php print wp_kses_post($settings['all']); ?></a>
                    </li>
                    <?php $args1 = array(
                    'taxonomy' => 'category3',
                    );
                    $cats = get_categories($args1);
                    if(is_array($cats)) {
                    foreach($cats as $cat) :
                    ?>
                    <li class="nav-item" data-filter=".<?php echo wp_kses_post( $cat->slug )?>">
                        <a class="nav-link"><?php echo wp_kses_post($cat->name);?></a>
                    </li>
                    <?php endforeach ?>
                    <?php } ?>
                </ul>
                <?php endif; ?>
                <div class="tab-content tab-pane project-active">
                    <?php $post_number = $settings['posts_per_page'];
                    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
                    $wp_query = new \WP_Query(array('paged' => $paged,'posts_per_page' => $post_number,'post_type' => 'project',  'orderby' => 'ID', 'order' => $sortby));
                    $args = new \WP_Query(array(
                        'post_type' => 'project',
                    ));
                    $i=1;
                    while ($wp_query -> have_posts()) : $wp_query -> the_post(); ?>
                    <?php $fi2_style = get_post_meta(get_the_ID(),'_cmb_fi2_style', true); ?>
                    <?php $description = get_post_meta(get_the_ID(),'_cmb_description', true); ?>
                    <?php $p_featured_image_2_b = get_post_meta(get_the_ID(),'_cmb_p_featured_image_2_b', true); ?>
                    <?php $p_featured_image_2_a = get_post_meta(get_the_ID(),'_cmb_p_featured_image_2_a', true); ?>
                        <?php if($fi2_style =='stye_3'){ ?>
                        <div class="mb-128 pro-02-item col-sm-4 col-lg-4 item <?php $cats = get_the_terms(get_the_ID(),'category3'); if(is_array($cats)) { foreach($cats as $cat) {  echo wp_kses_post($cat->slug).' '; }} ?>">
                            <div class="pro-02-images pro-02-images-<?php echo $i;?>">
                                <div class="image-container">
                                    <?php if(isset($p_featured_image_2_b) && $p_featured_image_2_b != '') { ?>
                                    <img class="image-before slider-image" src="<?php echo wp_get_attachment_url($p_featured_image_2_b);?>" alt="Apartment">
                                    <?php } ?>
                                    <?php if(isset($p_featured_image_2_a) && $p_featured_image_2_a != '') { ?>
                                    <img class="image-after slider-image" src="<?php echo wp_get_attachment_url($p_featured_image_2_a);?>" alt="Apartment">
                                    <?php } ?>
                                </div>
                                <input type="range" min="0" max="100" value="50" class="buttonslider buttonslider<?php echo $i;?>" aria-label="percentage of before photo shown">
                                <div class="slider-line"></div>
                                <div class="slider-button" aria-hidden="true"></div>
                            </div>
                            <div class="row project-02-caption d-md-block">
                                <a href="<?php the_permalink(); ?>"><h5><?php the_title(); ?></h5></a>
                            </div>
                        </div>
                        <?php } elseif($fi2_style =='stye_2'){ ?>
                        <div class="pro-02-item col-lg-6 item <?php $cats = get_the_terms(get_the_ID(),'category3'); if(is_array($cats)) { foreach($cats as $cat) {  echo wp_kses_post($cat->slug).' '; } }?>">
                            <div class="pro-02-images pro-02-images-<?php echo $i;?>">
                                <div class="image-container">
                                    <?php if(isset($p_featured_image_2_b) && $p_featured_image_2_b != '') { ?>
                                    <img class="image-before slider-image" src="<?php echo wp_get_attachment_url($p_featured_image_2_b);?>" alt="Apartment">
                                    <?php } ?>
                                    <?php if(isset($p_featured_image_2_a) && $p_featured_image_2_a != '') { ?>
                                    <img class="image-after slider-image" src="<?php echo wp_get_attachment_url($p_featured_image_2_a);?>" alt="Apartment">
                                    <?php } ?>
                                </div>
                                <input type="range" min="0" max="100" value="50" class="buttonslider buttonslider<?php echo $i;?>" aria-label="percentage of before photo shown">
                                <div class="slider-line"></div>
                                <div class="slider-button" aria-hidden="true"></div>
                            </div>
                            <div class="row project-02-caption d-md-block">
                                <a href="<?php the_permalink(); ?>"><h5><?php the_title(); ?></h5></a>
                            </div>
                        </div>
                        <?php } else { ?>
                        <div class="mb-128 pro-02-item col-lg-12 justify-content-center align-items-center item <?php $cats = get_the_terms(get_the_ID(),'category3'); if(is_array($cats)) {foreach($cats as $cat) {  echo wp_kses_post($cat->slug).' '; } }?>">
                            <div class="pro-02-images pro-02-images-<?php echo $i;?>">
                                <div class="image-container">
                                    <?php if(isset($p_featured_image_2_b) && $p_featured_image_2_b != '') { ?>
                                    <img class="image-before slider-image" src="<?php echo wp_get_attachment_url($p_featured_image_2_b);?>" alt="Apartment">
                                    <?php } ?>
                                    <?php if(isset($p_featured_image_2_a) && $p_featured_image_2_a != '') { ?>
                                    <img class="image-after slider-image" src="<?php echo wp_get_attachment_url($p_featured_image_2_a);?>" alt="Apartment">
                                    <?php } ?>
                                </div>
                                <input type="range" min="0" max="100" value="50" class="buttonslider buttonslider<?php echo $i;?>" aria-label="percentage of before photo shown">
                                <div class="slider-line"></div>
                                <div class="slider-button" aria-hidden="true"></div>
                            </div>
                            <div class="row project-02-caption d-md-block">
                                <a href="<?php the_permalink(); ?>"><h5><?php the_title(); ?></h5></a>
                            </div>
                        </div>
                        <?php } ?>
                    <?php $i++; ?>
                    <?php endwhile; ?>
                    <?php if ( $settings['show_pagination'] ) : ?>
                    <div class="col-lg-12">
                        <?php                         
                            global $paged; // current page
                            if(empty($paged)) $paged = 1;
                            $pages = $wp_query->max_num_pages;
                            if(!$pages){
                                $pages = 1;
                            }
                            if($pages != 1){
                                echo '<ul class="pagination flex-wrap justify-content-center wow fadeInUp delay-0-2s">';
                                if($settings['prev_next_style'] == 'btn_style_1'){
                                    if($paged > 1) echo '<li><a class="prev page-numbers" href="'.get_pagenum_link($paged - 1).'" >'.$settings['prev_text'].'</a></li>';
                                } else {
                                    if($paged > 1) echo '<li><a class="prev page-numbers" href="'.get_pagenum_link($paged - 1).'" ><i class="'.$settings['prev_icon']['value'].'"></i></a></li>';
                                }
                                for($page = 1; $page <= $pages; $page++){
                                echo wp_kses_post($page == $paged ) ? '<li class="active"><a href="'.get_pagenum_link($page).'"><span class="page-numbers">'. $page. '<span class="sr-only">(current)</span></span></a></li>' : '<li ><a class="page-numbers" href="'.get_pagenum_link($page).'">'. $page. '</a></li>';
                             }
                            if($settings['prev_next_style'] == 'btn_style_1'){
                                if($paged <= $pages - 1) echo '<li><a class="next page-numbers" href="'.get_pagenum_link($paged + 1).'" >'.$settings['next_text'].'</a></li>';
                            } else {
                                if($paged <= $pages - 1) echo '<li><a class="next page-numbers" href="'.get_pagenum_link($paged + 1).'" ><i class="'.$settings['next_icon']['value'].'"></i></a></li>';
                            }

                            echo "</ul>\n";
                            }
                        ?>
                    </div>
                    <?php endif; ?>
                    <?php if ( $settings['show_button'] ) : ?>
                    <?php if(isset($settings['link_button']) && $settings['link_button'] != ''){?>
                    <div class="col-lg-12 text-center">
                        <a class="loadmore primary-readmore mt-0" href="<?php print wp_kses_post($settings['link_button']); ?>"><?php print wp_kses_post($settings['button']); ?></a>
                    </div>
                    <?php } ?>
                    <?php endif; ?>
                </div>
            </div>
        </section>
        <!-- Architecture Projects Area end -->
        <?php elseif( $style == 'style_4' ): ?>
        <!-- Architecture Projects Area start -->
        <section class="projects-04 py-128">
            <div class="container-fluid">
                <?php if ( $settings['show_heading'] ) : ?>
                <div class="row rel z-1 justify-content-center">
                    <div class="section-title text-center mb-96 wow fadeInUp delay-0-2s">
                        <?php if(isset($settings['subheading']) && $settings['subheading'] != ''){?>
                        <span class="sub-title mb-16"><?php print wp_kses_post($settings['subheading']); ?></span>
                        <?php } ?>
                        <?php if(isset($settings['heading']) && $settings['heading'] != ''){?>
                        <h2><?php print wp_kses_post($settings['heading']); ?></h2>
                        <?php } ?>
                    </div>
                </div>
                <?php endif; ?>
                <?php if ( $settings['show_filter_tab'] ) : ?>
                <ul class="project-filter tab-style-one justify-content-center nav nav-pills nav-fill mb-96 wow fadeInUp delay-0-4s">
                    <li data-filter="*" class="nav-item current">
                        <a class="nav-link"><?php print wp_kses_post($settings['all']); ?></a>
                    </li>
                    <?php $args1 = array(
                    'taxonomy' => 'category3',
                    );
                    $cats = get_categories($args1);
                    if(is_array($cats)) {
                    foreach($cats as $cat) :
                    ?>
                    <li class="nav-item" data-filter=".<?php echo wp_kses_post( $cat->slug )?>">
                        <a class="nav-link"><?php echo wp_kses_post($cat->name);?></a>
                    </li>
                    <?php endforeach ?>
                    <?php } ?>
                </ul>
                <?php endif; ?>
                <div class="tab-content tab-pane project-active">
                    <?php $post_number = $settings['posts_per_page'];
                    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
                    $wp_query = new \WP_Query(array('paged' => $paged,'posts_per_page' => $post_number,'post_type' => 'project',  'orderby' => 'ID', 'order' => $sortby));
                    $args = new \WP_Query(array(
                        'post_type' => 'project',
                    ));
                    $i=1;
                    while ($wp_query -> have_posts()) : $wp_query -> the_post(); ?>
                    <?php $description = get_post_meta(get_the_ID(),'_cmb_description', true); ?>
                    <?php $p_featured_image_4 = get_post_meta(get_the_ID(),'_cmb_p_featured_image_4', true); ?>
                    <?php if($i%2 == 1){ ?>
                    <div class="row mb-128 align-items-center odd-pro item <?php $cats = get_the_terms(get_the_ID(),'category3'); if(is_array($cats)) { foreach($cats as $cat) {  echo wp_kses_post($cat->slug).' '; }} ?>">
                        <?php if(isset($p_featured_image_4) && $p_featured_image_4 != '') { ?>
                        <div class="col-lg-7 wow fadeInLeft delay-0-1s pro-img">
                            <a href="<?php the_permalink(); ?>"><img src="<?php echo wp_get_attachment_url($p_featured_image_4);?>" alt="Apartment"></a>
                        </div>
                        <?php } ?>
                        <div class="col-lg-5 wow fadeInRight delay-0-1s pro-content" >
                            <div class="pro-04-text black-120-bg">
                                <?php
                                    $catssingle = get_the_terms(get_the_ID(),'category3');
                                    if(is_array($catssingle)) { ?>
                                <span class="sub-title">
                                    <?php                               
                                        foreach($catssingle as $catsingle) { ?>
                                    <a href="<?php echo get_category_link( $catsingle->term_id ) ?>"><?php echo esc_attr($catsingle->name);?></a>
                                        <?php } ?>                                  
                                </span>
                                <?php } ?>
                                <a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
                                <?php if(isset($description) && $description != '') { ?>
                                <div class="pro-desc-04 mb-80">
                                    <p><?php echo wp_kses_post($description);?></p>
                                </div>
                                <?php } ?>
                                <?php if(isset($indoconexaog_redux_demo['read_more']) && $indoconexaog_redux_demo['read_more'] != ''){?>
                                <div>
                                    <a href="<?php the_permalink(); ?>" class="stroke-btn">
                                    <?php echo wp_specialchars_decode(esc_attr($indoconexaog_redux_demo['read_more']));?>                                
                                    </a>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <?php } else { ?>
                    <div class="row mb-128 align-items-center even-pro item <?php $cats = get_the_terms(get_the_ID(),'category3'); if(is_array($cats)) { foreach($cats as $cat) {  echo wp_kses_post($cat->slug).' '; }} ?>">
                        <div class="col-lg-5 wow fadeInRight delay-0-1s pro-content" >
                            <div class="pro-04-text black-120-bg">
                                <?php
                                    $catssingle = get_the_terms(get_the_ID(),'category3');
                                    if(is_array($catssingle)) {?>
                                <span class="sub-title">
                                    <?php
                                    foreach($catssingle as $catsingle) { ?>
                                    <a href="<?php echo get_category_link( $catsingle->term_id ) ?>"><?php echo esc_attr($catsingle->name);?></a>
                                    <?php } ?>                                  
                                </span>
                                <?php } ?>
                                <a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
                                <?php if(isset($description) && $description != '') { ?>
                                <div class="pro-desc-04 mb-80">
                                    <p><?php echo wp_kses_post($description);?></p>
                                </div>
                                <?php } ?>
                                <?php if(isset($indoconexaog_redux_demo['read_more']) && $indoconexaog_redux_demo['read_more'] != ''){?>
                                <div>
                                    <a href="<?php the_permalink(); ?>" class="stroke-btn">
                                    <?php echo wp_specialchars_decode(esc_attr($indoconexaog_redux_demo['read_more']));?>                                
                                    </a>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                        <?php if(isset($p_featured_image_4) && $p_featured_image_4 != '') { ?>
                        <div class="col-lg-7 wow fadeInLeft delay-0-1s pro-img">
                            <a href="<?php the_permalink(); ?>"><img src="<?php echo wp_get_attachment_url($p_featured_image_4);?>" alt="Apartment"></a>
                        </div>
                        <?php } ?>
                    </div>
                    <?php } ?>
                    <?php $i++; ?>
                    <?php endwhile; ?>
                    <?php if ( $settings['show_pagination'] ) : ?>
                    <div class="col-lg-12">
                        <?php                         
                            global $paged; // current page
                            if(empty($paged)) $paged = 1;
                            $pages = $wp_query->max_num_pages;
                            if(!$pages){
                                $pages = 1;
                            }
                            if($pages != 1){
                                echo '<ul class="pagination flex-wrap justify-content-center wow fadeInUp delay-0-2s">';
                                if($settings['prev_next_style'] == 'btn_style_1'){
                                    if($paged > 1) echo '<li><a class="prev page-numbers" href="'.get_pagenum_link($paged - 1).'" >'.$settings['prev_text'].'</a></li>';
                                } else {
                                    if($paged > 1) echo '<li><a class="prev page-numbers" href="'.get_pagenum_link($paged - 1).'" ><i class="'.$settings['prev_icon']['value'].'"></i></a></li>';
                                }
                                for($page = 1; $page <= $pages; $page++){
                                echo wp_kses_post($page == $paged ) ? '<li class="active"><a href="'.get_pagenum_link($page).'"><span class="page-numbers">'. $page. '<span class="sr-only">(current)</span></span></a></li>' : '<li ><a class="page-numbers" href="'.get_pagenum_link($page).'">'. $page. '</a></li>';
                             }
                            if($settings['prev_next_style'] == 'btn_style_1'){
                                if($paged <= $pages - 1) echo '<li><a class="next page-numbers" href="'.get_pagenum_link($paged + 1).'" >'.$settings['next_text'].'</a></li>';
                            } else {
                                if($paged <= $pages - 1) echo '<li><a class="next page-numbers" href="'.get_pagenum_link($paged + 1).'" ><i class="'.$settings['next_icon']['value'].'"></i></a></li>';
                            }

                            echo "</ul>\n";
                            }
                        ?>
                    </div>
                    <?php endif; ?>
                    <?php if ( $settings['show_button'] ) : ?>
                    <?php if(isset($settings['link_button']) && $settings['link_button'] != ''){?>
                    <div class="col-lg-12 text-center">
                        <a class="loadmore primary-readmore mt-0" href="<?php print wp_kses_post($settings['link_button']); ?>"><?php print wp_kses_post($settings['button']); ?></a>
                    </div>
                    <?php } ?>
                    <?php endif; ?>
                </div>
            </div>
        </section>
        <!-- Architecture Projects Area end -->
        <?php elseif( $style == 'style_5' ): ?>
        <!-- Architecture Projects Area start -->
        <section class="projects-05 py-128">
            <div class="container-fluid">
                <?php if ( $settings['show_heading'] ) : ?>
                <div class="row rel z-1 justify-content-center">
                    <div class="section-title text-center mb-96 wow fadeInUp delay-0-2s">
                        <?php if(isset($settings['subheading']) && $settings['subheading'] != ''){?>
                        <span class="sub-title mb-16"><?php print wp_kses_post($settings['subheading']); ?></span>
                        <?php } ?>
                        <?php if(isset($settings['heading']) && $settings['heading'] != ''){?>
                        <h2><?php print wp_kses_post($settings['heading']); ?></h2>
                        <?php } ?>
                    </div>
                </div>
                <?php endif; ?>
                <?php if ( $settings['show_filter_tab'] ) : ?>
                <ul class="project-filter tab-style-one justify-content-center nav nav-pills nav-fill mb-96 wow fadeInUp delay-0-4s">
                    <li data-filter="*" class="nav-item current">
                        <a class="nav-link"><?php print wp_kses_post($settings['all']); ?></a>
                    </li>
                    <?php $args1 = array(
                    'taxonomy' => 'category3',
                    );
                    $cats = get_categories($args1);
                    if(is_array($cats)) {
                    foreach($cats as $cat) :
                    ?>
                    <li class="nav-item" data-filter=".<?php echo wp_kses_post( $cat->slug )?>">
                        <a class="nav-link"><?php echo wp_kses_post($cat->name);?></a>
                    </li>
                    <?php endforeach ?>
                    <?php } ?>
                </ul>
                <?php endif; ?>
                <div class="tab-content tab-pane project-active">
                    <?php $post_number = $settings['posts_per_page'];
                    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
                    $wp_query = new \WP_Query(array('paged' => $paged,'posts_per_page' => $post_number,'post_type' => 'project',  'orderby' => 'ID', 'order' => $sortby));
                    $args = new \WP_Query(array(
                        'post_type' => 'project',
                    ));
                    $i=1;
                    while ($wp_query -> have_posts()) : $wp_query -> the_post(); ?>
                    <?php $description = get_post_meta(get_the_ID(),'_cmb_description', true); ?>
                    <?php $p_featured_image_5_1 = get_post_meta(get_the_ID(),'_cmb_p_featured_image_5_1', true); ?>
                    <?php $p_featured_image_5_2 = get_post_meta(get_the_ID(),'_cmb_p_featured_image_5_2', true); ?>
                    <?php if($i%2 == 1){ ?>
                    <div class="mb-128 row align-items-center pro-05-items item <?php $cats = get_the_terms(get_the_ID(),'category3'); if(is_array($cats)) { foreach($cats as $cat) {  echo wp_kses_post($cat->slug).' '; } }?>">
                        <div class="col-md-6 col-lg-6 pr-64 wow fadeInLeft delay-0-1s pro-05-item">
                            <?php if(isset($p_featured_image_5_1) && $p_featured_image_5_1 != '') { ?>
                            <a href="<?php the_permalink(); ?>"><img src="<?php echo wp_get_attachment_url($p_featured_image_5_1);?>" alt="Apartment"></a>
                            <?php } ?>
                            <div class="pro-05-title-left">
                                <?php
                                    $catssingle = get_the_terms(get_the_ID(),'category3');
                                    if(is_array($catssingle)) {?>
                                <span class="category mb-32">
                                    <?php foreach($catssingle as $catsingle) { ?>
                                    <a href="<?php echo get_category_link( $catsingle->term_id ) ?>"><?php echo esc_attr($catsingle->name);?></a>
                                    <?php }  ?>
                                </span>
                                <?php }  ?>
                                <a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
                            </div>
                        </div>
                        <?php if(isset($p_featured_image_5_2) && $p_featured_image_5_2 != '') { ?>
                        <div class="col-md-6 col-lg-6 pl-64 wow fadeInLeft delay-0-1s pro-05-item">
                            <a href="<?php the_permalink(); ?>"><img src="<?php echo wp_get_attachment_url($p_featured_image_5_2);?>" alt="Apartment"></a>
                        </div>
                        <?php } ?>
                    </div>
                    <?php } elseif($i%2 == 0) { ?>
                    <div class="mb-128 row align-items-center pro-05-items item <?php $cats = get_the_terms(get_the_ID(),'category3');if(is_array($cats)) { foreach($cats as $cat) {  echo wp_kses_post($cat->slug).' '; }} ?>">
                        <?php if(isset($p_featured_image_5_1) && $p_featured_image_5_1 != '') { ?>
                        <div class="col-md-6 col-lg-6 pr-64 wow fadeInLeft delay-0-1s pro-05-item">
                            <a href="<?php the_permalink(); ?>"><img src="<?php echo wp_get_attachment_url($p_featured_image_5_1);?>" alt="Apartment"></a>
                        </div>
                        <?php } ?>
                        <div class="col-md-6 col-lg-6 pl-64 wow fadeInLeft delay-0-1s pro-05-item">
                            <?php if(isset($p_featured_image_5_2) && $p_featured_image_5_2 != '') { ?>
                            <a href="<?php the_permalink(); ?>"><img src="<?php echo wp_get_attachment_url($p_featured_image_5_2);?>" alt="Apartment"></a>
                            <?php } ?>
                            <div class="pro-05-title-right">
                                <?php
                                    $catssingle = get_the_terms(get_the_ID(),'category3');
                                    if(is_array($catssingle)) {  ?>
                                <span class="category mb-32">      
                                    <?php foreach($catssingle as $catsingle) { ?>
                                    <a href="<?php echo get_category_link( $catsingle->term_id ) ?>"><?php echo esc_attr($catsingle->name);?></a>
                                    <?php }  ?>
                                </span>
                                <?php }  ?>
                                <a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    <?php $i++; ?>
                    <?php endwhile; ?>
                    <?php if ( $settings['show_pagination'] ) : ?>
                    <div class="col-lg-12">
                        <?php                         
                            global $paged; // current page
                            if(empty($paged)) $paged = 1;
                            $pages = $wp_query->max_num_pages;
                            if(!$pages){
                                $pages = 1;
                            }
                            if($pages != 1){
                                echo '<ul class="pagination flex-wrap justify-content-center wow fadeInUp delay-0-2s">';
                                if($settings['prev_next_style'] == 'btn_style_1'){
                                    if($paged > 1) echo '<li><a class="prev page-numbers" href="'.get_pagenum_link($paged - 1).'" >'.$settings['prev_text'].'</a></li>';
                                } else {
                                    if($paged > 1) echo '<li><a class="prev page-numbers" href="'.get_pagenum_link($paged - 1).'" ><i class="'.$settings['prev_icon']['value'].'"></i></a></li>';
                                }
                                for($page = 1; $page <= $pages; $page++){
                                echo wp_kses_post($page == $paged ) ? '<li class="active"><a href="'.get_pagenum_link($page).'"><span class="page-numbers">'. $page. '<span class="sr-only">(current)</span></span></a></li>' : '<li ><a class="page-numbers" href="'.get_pagenum_link($page).'">'. $page. '</a></li>';
                             }
                            if($settings['prev_next_style'] == 'btn_style_1'){
                                if($paged <= $pages - 1) echo '<li><a class="next page-numbers" href="'.get_pagenum_link($paged + 1).'" >'.$settings['next_text'].'</a></li>';
                            } else {
                                if($paged <= $pages - 1) echo '<li><a class="next page-numbers" href="'.get_pagenum_link($paged + 1).'" ><i class="'.$settings['next_icon']['value'].'"></i></a></li>';
                            }

                            echo "</ul>\n";
                            }
                        ?>
                    </div>
                    <?php endif; ?>
                    <?php if ( $settings['show_button'] ) : ?>
                    <?php if(isset($settings['link_button']) && $settings['link_button'] != ''){?>
                    <div class="col-lg-12 text-center">
                        <a class="loadmore primary-readmore mt-0" href="<?php print wp_kses_post($settings['link_button']); ?>"><?php print wp_kses_post($settings['button']); ?></a>
                    </div>
                    <?php } ?>
                    <?php endif; ?>
                </div>
            </div>
        </section>
        <!-- Architecture Projects Area end -->
        <?php else: ?>
        <section class="architecture-area py-128">
            <div class="container">
                <?php if ( $settings['show_heading'] ) : ?>
                <div class="row rel z-1 justify-content-center">
                    <div class="section-title text-center mb-96 wow fadeInUp delay-0-2s">
                        <?php if(isset($settings['subheading']) && $settings['subheading'] != ''){?>
                        <span class="sub-title mb-16"><?php print wp_kses_post($settings['subheading']); ?></span>
                        <?php } ?>
                        <?php if(isset($settings['heading']) && $settings['heading'] != ''){?>
                        <h2><?php print wp_kses_post($settings['heading']); ?></h2>
                        <?php } ?>
                    </div>
                </div>
                <?php endif; ?>
                <?php if ( $settings['show_filter_tab'] ) : ?>
                <ul class="project-filter tab-style-one justify-content-center nav nav-pills nav-fill mb-96 wow fadeInUp delay-0-4s">
                    <li data-filter="*" class="nav-item current">
                        <a class="nav-link"><?php print wp_kses_post($settings['all']); ?></a>
                    </li>
                    <?php $args1 = array(
                    'taxonomy' => 'category3',
                    );
                    $cats = get_categories($args1);
                    if(is_array($cats)) {
                    foreach($cats as $cat) :
                    ?>
                    <li class="nav-item" data-filter=".<?php echo wp_kses_post( $cat->slug )?>">
                        <a class="nav-link"><?php echo wp_kses_post($cat->name);?></a>
                    </li>
                    <?php endforeach ?>
                    <?php } ?>
                </ul>
                <?php endif; ?>
                <div class="tab-content tab-pane project-active">
                    <?php $post_number = $settings['posts_per_page'];
                    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
                    $wp_query = new \WP_Query(array('paged' => $paged,'posts_per_page' => $post_number,'post_type' => 'project',  'orderby' => 'ID', 'order' => $sortby));
                    $args = new \WP_Query(array(
                        'post_type' => 'project',
                    ));
                    while ($wp_query -> have_posts()) : $wp_query -> the_post(); ?>
                    <?php $fi3_style = get_post_meta(get_the_ID(),'_cmb_fi3_style', true); ?>
                    <?php $description = get_post_meta(get_the_ID(),'_cmb_description', true); ?>
                    <?php $p_featured_image_3 = get_post_meta(get_the_ID(),'_cmb_p_featured_image_3', true); ?>
                        <?php if($fi3_style =='stye_2'){ ?>
                        <div class="col-lg-6 item <?php $cats = get_the_terms(get_the_ID(),'category3'); if(is_array($cats)) { foreach($cats as $cat) {  echo wp_kses_post($cat->slug).' '; } }?>">
                            <?php if(isset($p_featured_image_3) && $p_featured_image_3 != '') { ?>
                            <div class="row apartment-image wow fadeInLeft delay-0-1s">
                                <a href="<?php the_permalink(); ?>">
                                    <img src="<?php echo wp_get_attachment_url($p_featured_image_3);?>" alt="project image">
                                </a>
                            </div>
                            <?php } ?>
                            <div class="row apartment-content wow fadeInRight delay-0-1s rp-0">
                                <div class="pro-title-haft">
                                    <a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
                                    <?php
                                        $catssingle = get_the_terms(get_the_ID(),'category3');
                                        if(is_array($catssingle)) {     ?>
                                    <span class="category">
                                        <?php       
                                        foreach($catssingle as $catsingle) { ?>
                                        <a href="<?php echo get_category_link( $catsingle->term_id ) ?>"><?php echo esc_attr($catsingle->name);?></a>
                                        <?php } ?>
                                    </span>
                                    <?php } ?>
                                </div>
                                <?php if(isset($description) && $description != '') { ?>
                                <div class="pro-desc-haft">
                                    <p><?php echo wp_kses_post($description);?></p>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                        <?php } else { ?>
                        <div class="col-lg-12 item <?php $cats = get_the_terms(get_the_ID(),'category3'); if(is_array($cats)) { foreach($cats as $cat) {  echo wp_kses_post($cat->slug).' '; }} ?>">
                            <?php if(isset($p_featured_image_3) && $p_featured_image_3 != '') { ?>
                            <div class="row apartment-image wow fadeInLeft delay-0-1s">
                                <a href="<?php the_permalink(); ?>">
                                    <img src="<?php echo wp_get_attachment_url($p_featured_image_3);?>" alt="project image">
                                </a>
                            </div>
                            <?php } ?>
                            <div class="row apartment-content wow fadeInRight delay-0-1s rp-0">
                                <div class="col-lg-6 pro-title">
                                    <a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
                                    <?php
                                        $catssingle = get_the_terms(get_the_ID(),'category3');
                                        if(is_array($catssingle)) { ?>
                                    <span class="category">
                                        <?php
                                        foreach($catssingle as $catsingle) { ?>
                                        <a href="<?php echo get_category_link( $catsingle->term_id ) ?>"><?php echo esc_attr($catsingle->name);?></a>
                                        <?php } ?>
                                    </span>
                                    <?php } ?>
                                </div>
                                <?php if(isset($description) && $description != '') { ?>
                                <div class="col-lg-6 pro-desc">
                                    <p><?php echo wp_kses_post($description);?></p>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                        <?php } ?>
                    <?php endwhile; ?>
                    <?php if ( $settings['show_pagination'] ) : ?>
                    <div class="col-lg-12">
                        <?php                         
                            global $paged; // current page
                            if(empty($paged)) $paged = 1;
                            $pages = $wp_query->max_num_pages;
                            if(!$pages){
                                $pages = 1;
                            }
                            if($pages != 1){
                                echo '<ul class="pagination flex-wrap justify-content-center wow fadeInUp delay-0-2s">';
                                if($settings['prev_next_style'] == 'btn_style_1'){
                                    if($paged > 1) echo '<li><a class="prev page-numbers" href="'.get_pagenum_link($paged - 1).'" >'.$settings['prev_text'].'</a></li>';
                                } else {
                                    if($paged > 1) echo '<li><a class="prev page-numbers" href="'.get_pagenum_link($paged - 1).'" ><i class="'.$settings['prev_icon']['value'].'"></i></a></li>';
                                }
                                for($page = 1; $page <= $pages; $page++){
                                echo wp_kses_post($page == $paged ) ? '<li class="active"><a href="'.get_pagenum_link($page).'"><span class="page-numbers">'. $page. '<span class="sr-only">(current)</span></span></a></li>' : '<li ><a class="page-numbers" href="'.get_pagenum_link($page).'">'. $page. '</a></li>';
                             }
                            if($settings['prev_next_style'] == 'btn_style_1'){
                                if($paged <= $pages - 1) echo '<li><a class="next page-numbers" href="'.get_pagenum_link($paged + 1).'" >'.$settings['next_text'].'</a></li>';
                            } else {
                                if($paged <= $pages - 1) echo '<li><a class="next page-numbers" href="'.get_pagenum_link($paged + 1).'" ><i class="'.$settings['next_icon']['value'].'"></i></a></li>';
                            }

                            echo "</ul>\n";
                            }
                        ?>
                    </div>
                    <?php endif; ?>
                    <?php if ( $settings['show_button'] ) : ?>
                    <?php if(isset($settings['link_button']) && $settings['link_button'] != ''){?>
                    <div class="col-lg-12 text-center">
                        <a class="loadmore primary-readmore mt-0" href="<?php print wp_kses_post($settings['link_button']); ?>"><?php print wp_kses_post($settings['button']); ?></a>
                    </div>
                    <?php } ?>
                    <?php endif; ?>
                </div>
            </div>
        </section>
        <?php endif; ?>
    <?php
    }
}
