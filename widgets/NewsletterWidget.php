<?php
namespace ConexaogElementor\Widget;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class NewsletterWidget extends Widget_Base {

    public function get_name() {
        return 'newsletter-widget';
    }

    public function get_title() {
        return __( 'Seção de Newsletter', 'conexaog-elementor' );
    }

    public function get_icon() {
        return 'eicon-mail';
    }

    public function get_categories() {
        return [ 'conexaog-elementor' ];
    }

    protected function _register_controls() {
        // --- Seção de Conteúdo ---
        $this->start_controls_section(
            'section_content',
            [ 'label' => __( 'Conteúdo', 'conexaog-elementor' ) ]
        );

        $this->add_control(
            'title',
            [
                'label' => __( 'Título', 'conexaog-elementor' ),
                'type' => Controls_Manager::TEXT,
                'default' => __( 'Assine nossas novidades', 'conexaog-elementor' ),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'description',
            [
                'label' => __( 'Descrição', 'conexaog-elementor' ),
                'type' => Controls_Manager::WYSIWYG,
                'default' => __( '<p>Fique por dentro dos nossos lançamentos e novidades.</p>', 'conexaog-elementor' ),
            ]
        );

        $this->add_control(
            'form_shortcode',
            [
                'label' => __( 'Shortcode do Formulário', 'conexaog-elementor' ),
                'type' => Controls_Manager::TEXTAREA,
                'placeholder' => __( '[contact-form-7 id="123" title="Newsletter"]', 'conexaog-elementor' ),
                'description' => __( 'Cole aqui o shortcode do seu formulário (ex: Contact Form 7).', 'conexaog-elementor' ),
            ]
        );

        $this->end_controls_section();

        // --- Seção de Layout e Estilo ---
        $this->start_controls_section(
            'section_style_layout',
            [
                'label' => __( 'Layout e Fundo', 'conexaog-elementor' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'layout_style',
            [
                'label' => __( 'Estilo do Layout', 'conexaog-elementor' ),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'centered' => [
                        'title' => __( 'Centralizado', 'conexaog-elementor' ),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'image-text' => [
                        'title' => __( 'Imagem e Conteúdo', 'conexaog-elementor' ),
                        'icon' => 'eicon-columns',
                    ],
                ],
                'default' => 'centered',
                'toggle' => false,
            ]
        );

        $this->add_control(
            'image',
            [
                'label' => __( 'Escolha a Imagem', 'conexaog-elementor' ),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'layout_style' => 'image-text',
                ],
            ]
        );

        $this->add_control(
            'image_position',
            [
                'label' => __( 'Posição da Imagem', 'conexaog-elementor' ),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [ 'title' => __( 'Esquerda', 'conexaog-elementor' ), 'icon' => 'eicon-h-align-left' ],
                    'right' => [ 'title' => __( 'Direita', 'conexaog-elementor' ), 'icon' => 'eicon-h-align-right' ],
                ],
                'default' => 'left',
                'condition' => [
                    'layout_style' => 'image-text',
                ],
            ]
        );
        
        $this->add_control(
            'background_image',
            [
                'label' => __( 'Imagem de Fundo da Seção', 'conexaog-elementor' ),
                'type' => Controls_Manager::MEDIA,
                'separator' => 'before',
                'selectors' => [
                    '{{WRAPPER}} .newsletter-section' => 'background-image: url({{URL}});',
                ],
            ]
        );

        $this->add_control(
            'background_overlay',
            [
                'label' => __( 'Sobreposição de Fundo', 'conexaog-elementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .newsletter-section::before' => 'background-color: {{VALUE}};',
                ],
                'description' => 'Isso adiciona uma cor sobre a imagem de fundo para melhorar a legibilidade do texto.',
            ]
        );
        
        $this->add_control(
            'overlay_opacity',
            [
                'label' => __( 'Opacidade da Sobreposição', 'conexaog-elementor' ),
                'type' => Controls_Manager::SLIDER,
                'range' => [ 'px' => [ 'min' => 0, 'max' => 1, 'step' => 0.05 ] ],
                'default' => [ 'size' => 0.7 ],
                'selectors' => [
                    '{{WRAPPER}} .newsletter-section::before' => 'opacity: {{SIZE}};',
                ],
                'condition' => [
                    'background_overlay!' => '',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $layout_style = $settings['layout_style'];
        
        $section_classes = ['newsletter-section', $layout_style];
        if ($layout_style === 'image-text') {
            $section_classes[] = 'image-position-' . $settings['image_position'];
        }
        ?>
        <section class="<?php echo esc_attr(implode(' ', $section_classes)); ?>">
            <div class="newsletter-container">
                <?php if ($layout_style === 'image-text'): ?>
                    <div class="newsletter-image-col">
                        <?php if (!empty($settings['image']['url'])): ?>
                            <img src="<?php echo esc_url($settings['image']['url']); ?>" alt="<?php echo esc_attr(\Elementor\Control_Media::get_image_alt($settings['image'])); ?>">
                        <?php endif; ?>
                    </div>
                <?php endif; ?>

                <div class="newsletter-content-col">
                    <?php if (!empty($settings['title'])): ?>
                        <h2 class="newsletter-title"><?php echo esc_html($settings['title']); ?></h2>
                    <?php endif; ?>

                    <?php if (!empty($settings['description'])): ?>
                        <div class="newsletter-description">
                            <?php echo wp_kses_post($settings['description']); ?>
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($settings['form_shortcode'])): ?>
                        <div class="newsletter-form-wrapper">
                            <?php echo do_shortcode($settings['form_shortcode']); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </section>
        <?php
    }
}
