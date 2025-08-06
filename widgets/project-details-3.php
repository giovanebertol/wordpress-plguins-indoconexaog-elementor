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
class BdevsProjectDetails3 extends \Elementor\Widget_Base {

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
        return 'bdevs-project-details-3';
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
        return __( 'project Details 3', 'conexaog-elementor' );
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
        return [ 'project details 3' ];
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
                'label' => esc_html__( 'Project Details 3', 'conexaog-elementor' ),
            ]   
        );
        $this->add_control(
            'project_info_title',
            [
                'label'       => __( 'Project Info Title:', 'conexaog-elementor' ),
                'type'        => Controls_Manager::TEXTAREA,
                'placeholder' => __( 'Enter your text', 'conexaog-elementor' ),
                'default'     => __( 'ABOUT THIS PROJECT', 'conexaog-elementor' ),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'project_info',
            [
                'label'       => __( 'Project Info:', 'conexaog-elementor' ),
                'type'        => Controls_Manager::TEXTAREA,
                'placeholder' => __( 'Enter your text', 'conexaog-elementor' ),
                'default'     => __( 'This is info', 'conexaog-elementor' ),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'share_title',
            [
                'label'       => __( 'Share Title:', 'conexaog-elementor' ),
                'type'        => Controls_Manager::TEXT,
                'placeholder' => __( 'Enter your text', 'conexaog-elementor' ),
                'default'     => __( 'Share: ', 'conexaog-elementor' ),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'type_title',
            [
                'label'       => __( 'Type Title:', 'conexaog-elementor' ),
                'type'        => Controls_Manager::TEXT,
                'placeholder' => __( 'Enter your text', 'conexaog-elementor' ),
                'default'     => __( 'Types: ', 'conexaog-elementor' ),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'title',
            [
                'label'       => __( 'Title:', 'conexaog-elementor' ),
                'type'        => Controls_Manager::TEXTAREA,
                'placeholder' => __( 'Enter your title', 'conexaog-elementor' ),
                'default'     => __( 'MODERN INTERIOR DESIGN', 'conexaog-elementor' ),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'text1',
            [
                'label'       => __( 'Content 1:', 'conexaog-elementor' ),
                'type'        => Controls_Manager::WYSIWYG,
                'placeholder' => __( 'Enter your content', 'conexaog-elementor' ),
                'default'     => __( 'This is content', 'conexaog-elementor' ),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'tabs',
            [
                'label' => esc_html__( 'Items', 'conexaog-elementor' ),
                'type' => Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name'        => 'item',
                        'label'       => esc_html__( 'Text:', 'conexaog-elementor' ),
                        'type'        => Controls_Manager::TEXTAREA,
                        'dynamic'     => [ 'active' => true ],
                        'default'     => esc_html__( 'This is text' , 'conexaog-elementor' ),
                        'label_block' => true,
                    ],                                      
                ],
                'prevent_empty' => false,
            ]
        );
        $this->add_control(
            'text2',
            [
                'label'       => __( 'Content 2:', 'conexaog-elementor' ),
                'type'        => Controls_Manager::WYSIWYG,
                'placeholder' => __( 'Enter your content', 'conexaog-elementor' ),
                'default'     => __( 'This is content', 'conexaog-elementor' ),
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
            'show_share',
            [
                'label'   => esc_html__( 'Show Share', 'conexaog-elementor' ),
                'type'    => Controls_Manager::SWITCHER,
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'show_types',
            [
                'label'   => esc_html__( 'Show Types', 'conexaog-elementor' ),
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
        <section class="project-details-02 pb-128">
            <div class="container">                                        
                <div class="row detail-info wow fadeInLeft delay-0-1s">  
                    <div class="col-lg-3 left">
                        <div class="block-left">
                            <?php if(isset($settings['project_info_title']) && $settings['project_info_title'] != ''){?>
                            <h5 class="mb-16"><?php print wp_kses_post($settings['project_info_title']); ?></h5>
                            <?php } ?>
                            <?php if(isset($settings['project_info']) && $settings['project_info'] != ''){?>
                            <p><?php print wp_kses_post($settings['project_info']); ?></p>
                            <?php } ?>
                        </div>           
                        <?php if ( $settings['show_share'] ) : ?>             
                        <div class="footer-social block-left">  
                            <?php if(isset($settings['share_title']) && $settings['share_title'] != ''){?>
                            <span><?php print wp_kses_post($settings['share_title']); ?></span> 
                            <?php } ?>
                            <span class='st_facebook_hcount'></span>
                            <span class='st_instagram_hcount'></span>  
                            <span class='st_linkedin_hcount'></span>  
                            <script type="text/javascript" src="https://w.sharethis.com/button/buttons.js"></script>
                            <script type="text/javascript">stLight.options({publisher: "ur-6a7e320d-37d8-511-633d-4264e3ae8c", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>
                        </div>
                        <?php endif; ?>
                        <?php if ( $settings['show_types'] ) : ?>      
                        <div class="pro-tags block-left">
                            <?php if(isset($settings['type_title']) && $settings['type_title'] != ''){?>
                            <h5 class="mb-16"><?php print wp_kses_post($settings['type_title']); ?></h5>
                            <?php } ?>
                            <ul class="tag-list">
                                <?php
                                $args = array(
                                    'taxonomy' => 'type3',
                                );
                                $types = get_categories($args);
                                foreach($types as $type) :
                                $url = get_term_link($type);
                                ?>
                                <li><a href="<?php echo $url; ?>"><?php echo esc_attr($type->name); ?></a></li>
                                <?php endforeach; ?> 
                            </ul>
                        </div>
                        <?php endif; ?>
                    </div>     
                    <div class="col-lg-9 right">
                        <?php if(isset($settings['title']) && $settings['title'] != ''){?>
                        <h2 class="mb-16"><?php print wp_kses_post($settings['title']); ?></h2>
                        <?php } ?>
                        <?php if(isset($settings['text1']) && $settings['text1'] != ''){?>
                        <p><?php print wp_kses_post($settings['text1']); ?></p>
                        <?php } ?>
                        <ul class="mb-16 detail-list-text">
                            <?php foreach ( $settings['tabs'] as $item ) :  ?>
                                <?php if(isset($item['item']) && $item['item'] != ''){?>
                                <li><i class="fa-solid fa-check"></i> <?php print wp_kses_post($item['item']); ?></li>
                                <?php } ?>
                            <?php endforeach; ?>
                        </ul>
                        <?php if(isset($settings['text2']) && $settings['text2'] != ''){?>
                        <p><?php print wp_kses_post($settings['text2']); ?></p>
                        <?php } ?>
                    </div>
                </div>       
            </div>
        </section>
    <?php
    }
}


