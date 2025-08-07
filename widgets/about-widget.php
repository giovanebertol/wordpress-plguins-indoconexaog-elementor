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
class BdevsAbout extends \Elementor\Widget_Base {

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
        return 'bdevs-about';
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
        return __( 'About', 'conexaog-elementor' );
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
        return 'eicon-user-circle-o';
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
        return [ 'about' ];
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
            'section_content_left',
            [
                'label' => esc_html__( 'About', 'conexaog-elementor' ),
            ]   
        );
        $this->add_control(
            'tabs',
            [
                'label' => esc_html__( 'Items', 'conexaog-elementor' ),
                'type' => Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name'        => 'rotate_title',
                        'label'       => esc_html__( 'Rotate Title:', 'conexaog-elementor' ),
                        'type'        => Controls_Manager::TEXT,
                        'dynamic'     => [ 'active' => true ],
                        'default'     => esc_html__( '1 - WHO WE ARE' , 'conexaog-elementor' ),
                        'label_block' => true,
                    ],
                    [
                        'name'        => 'content_1',
                        'label'       => esc_html__( 'Content 1:', 'conexaog-elementor' ),
                        'type'        => Controls_Manager::TEXTAREA,
                        'dynamic'     => [ 'active' => true ],
                        'default'     => esc_html__( 'This is content' , 'conexaog-elementor' ),
                        'label_block' => true,
                    ],
                    [
                        'name'        => 'content_2',
                        'label'       => esc_html__( 'Content 2:', 'conexaog-elementor' ),
                        'type'        => Controls_Manager::TEXTAREA,
                        'dynamic'     => [ 'active' => true ],
                        'default'     => esc_html__( 'This is content' , 'conexaog-elementor' ),
                        'label_block' => true,
                    ],
                    [
                        'name'    => 'big_image',
                        'label'   => esc_html__( 'Big Image', 'conexaog-elementor' ),
                        'type'    => Controls_Manager::MEDIA,
                         'default'     => esc_html__( '' , 'conexaog-elementor' ),
                        'dynamic' => [ 'active' => true ],
                    ],
                    [
                        'name'    => 'small_image',
                        'label'   => esc_html__( 'Small Image', 'conexaog-elementor' ),
                        'type'    => Controls_Manager::MEDIA,
                         'default'     => esc_html__( '' , 'conexaog-elementor' ),
                        'dynamic' => [ 'active' => true ],
                    ],
                    [
                        'name'        => 'rotate_p',
                        'label'       => esc_html__( 'Rotate Text On Image:', 'conexaog-elementor' ),
                        'type'        => Controls_Manager::TEXT,
                        'dynamic'     => [ 'active' => true ],
                        'default'     => esc_html__( 'WHO WE ARE' , 'conexaog-elementor' ),
                        'label_block' => true,
                    ],
                    [
                        'name'        => 'rotate_p_width',
                        'label'       => esc_html__( 'Rotate Text Width:', 'conexaog-elementor' ),
                        'type'        => Controls_Manager::NUMBER,
                        'dynamic'     => [ 'active' => true ],
                        'default'     => esc_html__( '' , 'conexaog-elementor' ),
                        'label_block' => true,
                    ],
					[
                        'name'        => 'rotate_p_top',
                        'label'       => esc_html__( 'Rotate Text Position Top:', 'conexaog-elementor' ),
                        'type'        => Controls_Manager::NUMBER,
                        'dynamic'     => [ 'active' => true ],
                        'default'     => esc_html__( '66' , 'conexaog-elementor' ),
                        'label_block' => true,
                    ],
					[
                        'name'        => 'rotate_p_right',
                        'label'       => esc_html__( 'Rotate Text Position Right:', 'conexaog-elementor' ),
                        'type'        => Controls_Manager::NUMBER,
                        'dynamic'     => [ 'active' => true ],
                        'default'     => esc_html__( '-36' , 'conexaog-elementor' ),
                        'label_block' => true,
                    ],
                    [
                        'name'        => 'number',
                        'label'       => esc_html__( 'Number:', 'conexaog-elementor' ),
                        'type'        => Controls_Manager::NUMBER,
                        'dynamic'     => [ 'active' => true ],
                        'default'     => esc_html__( '1' , 'conexaog-elementor' ),
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
    extract($settings); ?>
    <!-- About Area start -->
        <section class="about-area py-128">
            <div class="container d-flex">                  
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <?php $i=1; ?>
                    <?php foreach ( $settings['tabs'] as $item ) :  ?>
                    <li class="nav-item" role="presentation">
                        <div class="nav-link <?php if($i==1) { echo 'active';} ?>" id="about-tab<?php echo $i; ?>" data-bs-toggle="tab" data-bs-target="#about-tab-pane<?php echo $i; ?>" type="button" role="tab" aria-selected="<?php if($i==1) { echo 'true';} else{echo 'false';} ?>">
                            <div class="about-content">
                                <div class="text">
                                    <?php if(isset($item['rotate_title']) && $item['rotate_title'] != ''){?>
                                    <h4 class="h4-rotate"><?php print wp_kses_post($item['rotate_title']); ?></h4>
                                    <?php } ?>
                                    <?php if(isset($item['content_1']) && $item['content_1'] != ''){?>
                                    <p class="wow fadeInUp delay-0-2s"><?php print wp_kses_post($item['content_1']); ?></p>
                                    <?php } ?>
                                    <?php if(isset($item['content_2']) && $item['content_2'] != ''){?>
                                    <p class="wow fadeInUp delay-0-3s"><?php print wp_kses_post($item['content_2']); ?></p>
                                    <?php } ?>
                                </div>
                                <div>
                                    <?php if(isset($item['big_image']['url']) && $item['big_image']['url'] != ''){?>
                                   
                                    <img class="big-image wow zoomIn" src="<?php echo wp_kses_post($item['big_image']['url']); ?>" alt="hero image" title="hero image">
                                   
                                    <?php } ?>
                                    <?php if(isset($item['rotate_p']) && $item['rotate_p'] != ''){?>
                                    <p class="p-rotate custom-rotate<?php echo $i;?>"><?php print wp_kses_post($item['rotate_p']); ?></p>
									<style type="text/css">
    									<?php if(isset($item['rotate_p_top']) && $item['rotate_p_top'] != ''){?>
										.custom-rotate<?php echo $i;?> {
										    top: <?php print wp_kses_post($item['rotate_p_top']); ?>px!important;
                                            z-index: 1;
                                            width: 200px;
										}
										<?php } ?>
										<?php if(isset($item['rotate_p_right']) && $item['rotate_p_right'] != ''){?>
										.custom-rotate<?php echo $i;?> {
										    right: <?php print wp_kses_post($item['rotate_p_right']); ?>px!important;
                                            z-index: 1;
                                            width: 200px;
										}
										<?php } ?>
                                        <?php if(isset($item['rotate_p_width']) && $item['rotate_p_width'] != ''){?>
										.custom-rotate<?php echo $i;?> {
										    width: <?php print wp_kses_post($item['rotate_p_width']); ?>px!important;
                                            z-index: 1;
                                            text-align: center;
                                            width: 200px;
										}
										<?php } ?>
                                    </style>
                                    <?php } ?>
                                    <?php if(isset($item['number']) && $item['number'] != ''){?>
                                    <h1 class="number"><?php print wp_kses_post($item['number']); ?></h1>
                                    <?php } ?>
                                </div>
                                <?php if(isset($item['small_image']['url']) && $item['small_image']['url'] != ''){?>
                                <div class="about-image-wrapper">
                                    <img class="small-image" src="<?php echo wp_kses_post($item['small_image']['url']); ?>" alt="hero image" title="hero image">
                                </div>
                                <?php } ?>
                            </div>       
                        </div>
                    </li>
                    <?php $i++; ?>
                    <?php endforeach; ?>
                </ul>                                                
            </div>
        </section>
        <!-- About Area end -->
    <?php
    }
}


