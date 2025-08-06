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
class BdevsProjectDetailsSlider extends \Elementor\Widget_Base {

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
        return 'bdevs-project-details-slider';
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
        return __( 'Project Details Slider', 'conexaog-elementor' );
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
        return 'eicon-accordion';
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
        return [ 'project details slider' ];
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
                'label' => esc_html__( 'Project Details Slider', 'conexaog-elementor' ),
            ]   
        );
        $this->add_control(
            'tabs',
            [
                'label' => esc_html__( 'Items', 'conexaog-elementor' ),
                'type' => Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name'    => 'detail_image',
                        'label'   => esc_html__( 'Image', 'conexaog-elementor' ),
                        'type'    => Controls_Manager::MEDIA,
                         'default'     => esc_html__( '' , 'conexaog-elementor' ),
                        'dynamic' => [ 'active' => true ],
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
        <!-- Architecture Projects Area start -->
        <section class="project-details-02 pt-128">
            <div class="container">
                <div class="row detail-images align-items-center mb-64 wow fadeInLeft delay-0-1s">
                    <div class="col-xs-12 carousel slide" id="detailCarousel" data-bs-ride="carousel">
                        <div class="carousel-buttons">
                            <button class="prev" type="button" data-bs-target="#detailCarousel" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"><i class="fa-solid fa-arrow-left"></i></span>
                            </button>
                            <button class="" type="button" data-bs-target="#detailCarousel" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"><i class="fa-solid fa-arrow-right"></i></span>
                            </button>
                        </div>                        
                        <div class="row carousel-inner" role="listbox">
                            <?php $i=1; ?>
                            <?php foreach ( $settings['tabs'] as $item ) :  ?>
                            <?php if(isset($item['detail_image']['url']) && $item['detail_image']['url'] != ''){?>
                            <div class="carousel-item <?php if($i==1) { echo 'active';} ?>">
                                <img src="<?php echo wp_kses_post($item['detail_image']['url']); ?>" alt="project">
                            </div>
                            <?php } ?>
                            <?php $i++; ?>
                            <?php endforeach; ?>
                        </div>   
                        <div class="col-xs-12 carousel-indicators">
                            <div class="row carousel-list-images gap-30">
                                <?php $j=0; ?>
                                <?php foreach ( $settings['tabs'] as $item ) :  ?>
                                <div class="col-md-3 col-lg-3 button-img">
                                    <button type="button" data-bs-target="#detailCarousel" data-bs-slide-to="<?php echo $j;?>" class="<?php if($j==0) { echo 'active';} ?>" aria-current="<?php if($j==0) { echo 'true';} ?>" aria-label="Slide <?php echo $j+1;?>">
                                        <?php if(isset($item['detail_image']['url']) && $item['detail_image']['url'] != ''){?>
                                        <img src="<?php echo wp_kses_post($item['detail_image']['url']); ?>" alt="project">
                                        <?php } ?>
                                    </button>
                                </div>                                
                                <?php $j++; ?>
                                <?php endforeach; ?>
                            </div>              
                        </div>                              
                    </div>                          
                </div>                              
            </div>
        </section>
        <!-- Architecture Projects Area end -->       
    <?php
    }
}


