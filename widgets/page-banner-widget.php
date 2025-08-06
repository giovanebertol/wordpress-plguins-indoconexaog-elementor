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
class BdevsPageBanner extends \Elementor\Widget_Base {

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
        return 'bdevs-page-banner';
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
        return __( 'Page Banner', 'conexaog-elementor' );
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
        return 'eicon-banner';
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
        return [ 'page banner' ];
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
                'label' => esc_html__( 'Page Banner', 'conexaog-elementor' ),
            ]   
        );
        $this->add_control(
            'choose_style',
            [
                'label'     => esc_html__( 'Choose Style', 'conexaog-elementor' ),
                'type'      => Controls_Manager::SELECT,
                'options'   => [
                    'style_1'  => esc_html__( 'Text White', 'conexaog-elementor' ),
                    'style_2'  => esc_html__( 'Text Black', 'conexaog-elementor' ),
                ],
                'default'   => 'style_1',
            ]
        );
        $this->add_control(
            'banner_image',
            [
                'label'   => esc_html__( 'Image', 'conexaog-elementor' ),
                'type'    => Controls_Manager::MEDIA,
                'dynamic' => [ 'active' => true ],
                'description' => esc_html__( 'Add image from here', 'conexaog-elementor' ),
            ]
        );          
        $this->add_control(
            'home_text',
            [
                'label'       => __( 'Home Text:', 'conexaog-elementor' ),
                'type'        => Controls_Manager::TEXT,
                'placeholder' => __( 'Enter your home text', 'conexaog-elementor' ),
                'default'     => __( 'Home', 'conexaog-elementor' ),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'current_page',
            [
                'label'       => __( 'Current Page:', 'conexaog-elementor' ),
                'type'        => Controls_Manager::TEXT,
                'placeholder' => __( 'Enter your current page', 'conexaog-elementor' ),
                'default'     => __( 'This is current page', 'conexaog-elementor' ),
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
            'show_breadcrumb',
            [
                'label'   => esc_html__( 'Show Breadcrumb', 'conexaog-elementor' ),
                'type'    => Controls_Manager::SWITCHER,
                'default' => 'yes',
            ]
        );
        $this->end_controls_section();

    }

    public function render() {
    $settings  = $this->get_settings_for_display();
    extract($settings); ?>  
    <?php $style = $settings['choose_style'];?>
    <?php if( $style == 'style_1' ): ?> 
    <?php if(isset($settings['banner_image']['url']) && $settings['banner_image']['url'] != ''){?>
    <section class="banner-area pt-324 pb-250" style="background-image: url(<?php echo wp_kses_post($settings['banner_image']['url']); ?>);">
    <?php } else { ?>
    <section class="banner-area pt-324 pb-250">
    <?php } ?>
        <div class="container text-center">
            <div class="row align-items-center justify-content-between">
                <div class="banner-content wow fadeInUp delay-0-2s">
                    <?php if(isset($settings['current_page']) && $settings['current_page'] != ''){?>
                    <h1><?php print wp_kses_post($settings['current_page']); ?></h1>
                    <?php } ?>
                    <?php if ( $settings['show_breadcrumb'] ) : ?>
                    <div class="mt-32">
                        <ul class="breadcrumb wow fadeInUp delay-0-4s">
                            <?php if(isset($settings['home_text']) && $settings['home_text'] != ''){?>
                            <li class="breadcrumb-item"><a href="<?php echo esc_url(home_url('/')); ?>"><?php print wp_kses_post($settings['home_text']); ?></a></li>
                            <?php } ?>
                            <?php if(isset($settings['current_page']) && $settings['current_page'] != ''){?>
                            <li class="breadcrumb-item"><?php print wp_kses_post($settings['current_page']); ?></li>
                            <?php } ?>
                        </ul>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
    <?php elseif( $style == 'style_2' ): ?> 
    <?php if(isset($settings['banner_image']['url']) && $settings['banner_image']['url'] != ''){?>
    <section class="banner-area text-black pt-324 pb-250" style="background-image: url(<?php echo wp_kses_post($settings['banner_image']['url']); ?>);">
    <?php } else { ?>
    <section class="banner-area text-black pt-324 pb-250">
    <?php } ?>
        <div class="container text-center">
            <div class="row align-items-center justify-content-between">
                <div class="banner-content wow fadeInUp delay-0-2s">
                    <?php if(isset($settings['current_page']) && $settings['current_page'] != ''){?>
                    <h1><?php print wp_kses_post($settings['current_page']); ?></h1>
                    <?php } ?>
                    <?php if ( $settings['show_breadcrumb'] ) : ?>
                    <div class="mt-32">
                        <ul class="breadcrumb wow fadeInUp delay-0-4s">
                            <?php if(isset($settings['home_text']) && $settings['home_text'] != ''){?>
                            <li class="breadcrumb-item"><a href="<?php echo esc_url(home_url('/')); ?>"><?php print wp_kses_post($settings['home_text']); ?></a></li>
                            <?php } ?>
                            <?php if(isset($settings['current_page']) && $settings['current_page'] != ''){?>
                            <li class="breadcrumb-item"><?php print wp_kses_post($settings['current_page']); ?></li>
                            <?php } ?>
                        </ul>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
    <?php endif; ?>
    <?php
    }

}


