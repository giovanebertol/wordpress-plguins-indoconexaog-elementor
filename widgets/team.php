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
class BdevsTeam extends \Elementor\Widget_Base {

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
        return 'bdevs-team';
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
        return __( 'Team', 'bdevs-elementor' );
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
        return [ 'team' ];
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
                'label' => esc_html__( 'Team', 'bdevs-elementor' ),
            ]   
        );
        $this->add_control(
            'heading',
            [
                'label'       => __( 'Heading:', 'bdevs-elementor' ),
                'type'        => Controls_Manager::TEXT,
                'placeholder' => __( 'Enter your heading', 'bdevs-elementor' ),
                'default'     => __( 'Our Team', 'bdevs-elementor' ),
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
                        'name'    => 'team_image',
                        'label'   => esc_html__( 'Image', 'bdevs-elementor' ),
                        'type'    => Controls_Manager::MEDIA,
                         'default'     => esc_html__( '' , 'bdevs-elementor' ),
                        'dynamic' => [ 'active' => true ],
                    ],
                    [
                        'name'        => 'stars_select',
                        'label'     => esc_html__( 'Star Ratings:', 'bdevs-elementor' ),
                        'type'      => Controls_Manager::SELECT,
                        'dynamic' => [ 'active' => true ],
                        'options'   => [
                        '1'  => esc_html__( '1 Star', 'bdevs-elementor' ),
                        '2'  => esc_html__( '2 Stars', 'bdevs-elementor' ),
                        '3'  => esc_html__( '3 Stars', 'bdevs-elementor' ),
                        '4'  => esc_html__( '4 Stars', 'bdevs-elementor' ),
                        '5'  => esc_html__( '5 Stars', 'bdevs-elementor' ),
                        ],
                        'default'   => '5',
                    ],
                    [
                        'name'        => 'team_name',
                        'label'       => esc_html__( 'Name:', 'bdevs-elementor' ),
                        'type'        => Controls_Manager::TEXT,
                        'dynamic'     => [ 'active' => true ],
                        'default'     => esc_html__( 'Chris Evan' , 'bdevs-elementor' ),
                        'label_block' => true,
                    ],                   
                    [
                        'name'        => 'job',
                        'label'       => esc_html__( 'Job:', 'bdevs-elementor' ),
                        'type'        => Controls_Manager::TEXT,
                        'dynamic'     => [ 'active' => true ],
                        'default'     => esc_html__( 'Lead architect' , 'bdevs-elementor' ),
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
        ?>
        <!-- Team Area start -->
        <section class="team-area py-128">
            <div class="container">
                <?php if ( $settings['show_heading'] ) : ?>
                <div class="d-flex section-heading mb-96">
                    <?php if(isset($settings['heading']) && $settings['heading'] != ''){?>
                    <div class="section-title">
                        <h2 class="wow fadeInUp delay-0-2s"><?php print wp_kses_post($settings['heading']); ?></h2>
                    </div>
                    <?php } ?>
                    <?php if ( $settings['show_button'] ) : ?>
                    <div class="carousel-buttons">
                        <button class="prev" type="button" data-bs-target="#teamCarousel" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"><i class="fa fa-long-arrow-left"></i></span>
                        </button>
                        <button class="" type="button" data-bs-target="#teamCarousel" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"><i class="fa fa-long-arrow-right"></i></span>
                        </button>
                    </div>
                    <?php endif; ?>
                </div>   
                <?php endif; ?>
                <div class="row justify-content-center">
                    <div id="teamCarousel" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner" role="listbox">
                            <?php $j=1; ?>
                            <?php foreach ( $settings['tabs'] as $item ) :  ?>
                            <div class="row carousel-item <?php if($j==1) { echo 'active';} ?>">
                                <div class="col-md-4 team-item-wrap">
                                    <div class="team-item text-center">
                                        <?php if(isset($item['team_image']['url']) && $item['team_image']['url'] != ''){?>
                                        <div class="team-img">
                                            <img src="<?php echo wp_kses_post($item['team_image']['url']); ?>" alt="Team">
                                        </div>
                                        <?php } ?>
                                        <div class="text">
                                            <?php if( wp_kses_post($item['stars_select']) == '1'): ?>
                                            <div >
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star un-rate"></i>
                                                <i class="fa fa-star un-rate"></i>
                                                <i class="fa fa-star un-rate"></i>
                                                <i class="fa fa-star un-rate"></i>
                                            </div>
                                            <?php elseif( wp_kses_post($item['stars_select']) == '2'): ?>
                                            <div >
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star un-rate"></i>
                                                <i class="fa fa-star un-rate"></i>
                                                <i class="fa fa-star un-rate"></i>
                                            </div>
                                            <?php elseif( wp_kses_post($item['stars_select']) == '3'): ?>
                                            <div >
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star un-rate"></i>
                                                <i class="fa fa-star un-rate"></i>
                                            </div>
                                            <?php elseif( wp_kses_post($item['stars_select']) == '4'): ?>
                                            <div >
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star un-rate"></i>
                                            </div>
                                            <?php elseif( wp_kses_post($item['stars_select']) == '5'): ?>
                                            <div >
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <?php endif; ?> 
                                            <?php if(isset($item['team_name']) && $item['team_name'] != ''){?>
                                            <h5><?php print wp_kses_post($item['team_name']); ?></h5>
                                            <?php } ?>
                                            <?php if(isset($item['job']) && $item['job'] != ''){?>
                                            <p><?php print wp_kses_post($item['job']); ?></p>
                                            <?php } ?> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php $j++; ?>
                        <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Team Area end -->
    <?php
    }

}


