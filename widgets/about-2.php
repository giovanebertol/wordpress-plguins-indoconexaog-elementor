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
class BdevsAbout2 extends \Elementor\Widget_Base {

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
        return 'bdevs-about-2';
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
        return __( 'About 2', 'bdevs-elementor' );
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
        return 'eicon-user-circle-o';
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
        return [ 'about 2' ];
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
            'section_content_left',
            [
                'label' => esc_html__( 'About 2', 'bdevs-elementor' ),
            ]   
        );
        $this->add_control(
            'heading',
            [
                'label'       => __( 'Heading:', 'bdevs-elementor' ),
                'type'        => Controls_Manager::TEXT,
                'placeholder' => __( 'Enter your heading', 'bdevs-elementor' ),
                'default'     => __( 'Where imagination meets reality', 'bdevs-elementor' ),
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
                        'name'        => 'title',
                        'label'       => esc_html__( 'Title:', 'bdevs-elementor' ),
                        'type'        => Controls_Manager::TEXTAREA,
                        'dynamic'     => [ 'active' => true ],
                        'default'     => esc_html__( 'Who We Are' , 'bdevs-elementor' ),
                        'label_block' => true,
                    ],
                    [
                        'name'        => 'content',
                        'label'       => esc_html__( 'Content:', 'bdevs-elementor' ),
                        'type'        => Controls_Manager::TEXTAREA,
                        'dynamic'     => [ 'active' => true ],
                        'default'     => esc_html__( 'This is content' , 'bdevs-elementor' ),
                        'label_block' => true,
                    ],                   
                ],
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
                'default'     => __( 'Contact Us', 'bdevs-elementor' ),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'image_1',
            [
                'label'   => esc_html__( 'Image', 'bdevs-elementor' ),
                'type'    => Controls_Manager::MEDIA,
                'dynamic' => [ 'active' => true ],
                'description' => esc_html__( 'Add image from here', 'bdevs-elementor' ),
            ]
        ); 
        $this->add_control(
            'image_2',
            [
                'label'   => esc_html__( 'Image Hover', 'bdevs-elementor' ),
                'type'    => Controls_Manager::MEDIA,
                'dynamic' => [ 'active' => true ],
                'description' => esc_html__( 'Add image from here', 'bdevs-elementor' ),
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
    extract($settings); ?>
    <!-- About Style 2 Start -->
    <section class="about-style-2 py-128">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-6 col-lg-6 left">
                    <div class="section-title wow fadeInUp delay-0-3s">
                        <?php if(isset($settings['heading']) && $settings['heading'] != ''){?>
                        <h2><?php print wp_kses_post($settings['heading']); ?></h2>
                        <?php } ?>
                        <div class="wow fadeInUp delay-0-4s mb-45">
                            <ul class="tab-style-one nav nav-pills nav-fill mb-32 wow fadeInUp delay-0-4s">
                                <?php $i=1; ?>
                                <?php foreach ( $settings['tabs'] as $item ) :  ?>
                                <li class="nav-item">
                                    <a class="nav-link <?php if($i==1) { echo 'active';} ?>" data-bs-toggle="tab" href="#apart-tap<?php echo $i; ?>"><?php print wp_kses_post($item['title']); ?></a>
                                </li>
                                <?php $i++; ?>
                                <?php endforeach; ?> 
                            </ul>
                            <div class="tab-content">
                                <?php $j=1; ?>
                                <?php foreach ( $settings['tabs'] as $item ) :  ?>
                                <div class="tab-pane fade <?php if($j==1) { echo 'show active';} ?>" id="apart-tap<?php echo $j; ?>">
                                    <?php if(isset($item['content']) && $item['content'] != ''){?>
                                    <p><?php print wp_kses_post($item['content']); ?></p>
                                    <?php } ?>
                                </div>
                                <?php $j++; ?>
                                <?php endforeach; ?> 
                            </div>
                        </div>
                        <?php if(isset($settings['link_button']) && $settings['link_button'] != ''){?>
                        <div class="button">
                            <a class="btn-white-bg" href="<?php print wp_kses_post($settings['link_button']); ?>"><?php print wp_kses_post($settings['button']); ?></a>  
                        </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="imgs">
                        <?php if(isset($settings['image_1']['url']) && $settings['image_1']['url'] != ''){?>
                        <img src="<?php echo esc_url($settings['image_1']['url']);?>" alt="about image">
                        <?php } ?>
                        <?php if(isset($settings['image_2']['url']) && $settings['image_2']['url'] != ''){?>
                        <img class="hovershow" src="<?php echo esc_url($settings['image_2']['url']);?>" alt="about image">
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About Style 2 End -->
    <?php
    }
}


