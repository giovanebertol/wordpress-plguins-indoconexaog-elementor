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
class BdevsTestimonial extends \Elementor\Widget_Base {

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
        return 'bdevs-testimonial';
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
        return __( 'Testimonial', 'conexaog-elementor' );
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
        return [ 'testimonial' ];
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
                'label' => esc_html__( 'Reviews', 'conexaog-elementor' ),
            ]   
        ); 
        $this->add_control(
            'tabs',
            [
                'label' => esc_html__( 'Items', 'conexaog-elementor' ),
                'type' => Controls_Manager::REPEATER,
                'fields' => [                                      
                    [
                        'name'        => 'stars_select',
                        'label'     => esc_html__( 'Star Ratings:', 'conexaog-elementor' ),
                        'type'      => Controls_Manager::SELECT,
                        'dynamic' => [ 'active' => true ],
                        'options'   => [
                        '1'  => esc_html__( '1 Star', 'conexaog-elementor' ),
                        '2'  => esc_html__( '2 Stars', 'conexaog-elementor' ),
                        '3'  => esc_html__( '3 Stars', 'conexaog-elementor' ),
                        '4'  => esc_html__( '4 Stars', 'conexaog-elementor' ),
                        '5'  => esc_html__( '5 Stars', 'conexaog-elementor' ),
                        ],
                        'default'   => '5',
                    ],
                    [
                        'name'        => 'text',
                        'label'       => esc_html__( 'Text:', 'conexaog-elementor' ),
                        'type'        => Controls_Manager::TEXTAREA,
                        'dynamic'     => [ 'active' => true ],
                        'default'     => esc_html__( 'This is text' , 'conexaog-elementor' ),
                        'label_block' => true,
                    ],
                    [
                        'name'    => 'author_image',
                        'label'   => esc_html__( 'Author Image', 'conexaog-elementor' ),
                        'type'    => Controls_Manager::MEDIA,
                        'default'     => esc_html__( '' , 'conexaog-elementor' ),
                        'dynamic' => [ 'active' => true ],
                    ], 
                    [
                        'name'        => 'name',
                        'label'       => esc_html__( 'Name:', 'conexaog-elementor' ),
                        'type'        => Controls_Manager::TEXT,
                        'dynamic'     => [ 'active' => true ],
                        'default'     => esc_html__( 'Olivia Carpenter' , 'conexaog-elementor' ),
                        'label_block' => true,
                    ],
                    [
                        'name'        => 'job',
                        'label'       => esc_html__( 'Job:', 'conexaog-elementor' ),
                        'type'        => Controls_Manager::TEXT,
                        'dynamic'     => [ 'active' => true ],
                        'default'     => esc_html__( 'Business analyst at Apple' , 'conexaog-elementor' ),
                        'label_block' => true,
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
    <!-- Reviews Area start -->
        <section class="reviews-area py-128 black-100-bg">
            <div class="container">
                <div class="testimonials-slider wow fadeInUp delay-0-4s">
                    <?php foreach ( $settings['tabs'] as $item ) : ?>
                    <div class="testimonial-item">
                        <?php if( wp_kses_post($item['stars_select']) == '1'): ?>
                        <div class="section-title text-center mb-96 wow fadeInUp delay-0-2s">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star un-rate"></i>
                            <i class="fa-solid fa-star un-rate"></i>
                            <i class="fa-solid fa-star un-rate"></i>
                            <i class="fa-solid fa-star un-rate"></i>
                        </div>
                        <?php elseif( wp_kses_post($item['stars_select']) == '2'): ?>
                        <div class="section-title text-center mb-96 wow fadeInUp delay-0-2s">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star un-rate"></i>
                            <i class="fa-solid fa-star un-rate"></i>
                            <i class="fa-solid fa-star un-rate"></i>
                        </div>
                        <?php elseif( wp_kses_post($item['stars_select']) == '3'): ?>
                        <div class="section-title text-center mb-96 wow fadeInUp delay-0-2s">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star un-rate"></i>
                            <i class="fa-solid fa-star un-rate"></i>
                        </div>
                        <?php elseif( wp_kses_post($item['stars_select']) == '4'): ?>
                        <div class="section-title text-center mb-96 wow fadeInUp delay-0-2s">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star un-rate"></i>
                        </div>
                        <?php elseif( wp_kses_post($item['stars_select']) == '5'): ?>
                        <div class="section-title text-center mb-96 wow fadeInUp delay-0-2s">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                        <?php endif; ?> 
                        <?php if(isset($item['text']) && $item['text'] != ''){?>
                        <div class="h2 author-text"><?php print wp_kses_post($item['text']); ?></div>
                        <?php } ?>   
                        <?php if(isset($item['author_image']['url']) && $item['author_image']['url'] != ''){?>
                        <img class="testi-img" src="<?php echo wp_kses_post($item['author_image']['url']); ?>" alt="Author">
                        <?php } ?>
                        <?php if(isset($item['name']) && $item['name'] != ''){?>
                        <h5><?php print wp_kses_post($item['name']); ?></h5>
                        <?php } ?>
                        <?php if(isset($item['job']) && $item['job'] != ''){?>
                        <p class="designations"><?php print wp_kses_post($item['job']); ?></p>
                        <?php } ?>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        <!-- Reviews Area end -->
    <?php if (is_admin()) { ?>
    <script type="text/javascript">
    if ($('.testimonials-slider').length) {
        $('.testimonials-slider').slick({
            infinite: true,
            arrows: true,
            dots: true,
            fade: true,
            autoplay: true,
            prevArrow: false,
            nextArrow: false,
            autoplaySpeed: 5000,
            pauseOnHover: false,
            slidesToScroll: 1,
            slidesToShow: 1,
        });
    }
    </script>   
    <?php } ?>
    <?php
    }

}


