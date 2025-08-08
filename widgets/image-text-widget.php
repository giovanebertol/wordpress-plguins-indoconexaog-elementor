<?php
namespace ConexaogElementor\Widget;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Image_Size;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class ImageTextWidget extends Widget_Base {

    public function get_name() {
        return 'image-text-widget';
    }

    public function get_title() {
        return __( 'Seção Imagem e Texto', 'conexaog-elementor' );
    }

    public function get_icon() {
        return 'eicon-columns';
    }

    public function get_categories() {
        return [ 'conexaog-elementor' ];
    }

    protected function _register_controls() {

        // === Conteúdo ===
        $this->start_controls_section(
            'section_content',
            [ 'label' => __( 'Conteúdo', 'conexaog-elementor' ) ]
        );

        // Título
        $this->add_control(
            'title',
            [
                'label'       => __( 'Título', 'conexaog-elementor' ),
                'type'        => Controls_Manager::TEXT,
                'default'     => __( 'Parceria ambiental com competência', 'conexaog-elementor' ),
                'label_block' => true,
            ]
        );

        // Descrição (Alterado para WYSIWYG)
        $this->add_control(
            'description',
            [
                'label'   => __( 'Descrição', 'conexaog-elementor' ),
                'type'    => Controls_Manager::WYSIWYG,
                'default' => __( '<p>Investimos no desenvolvimento sustentável e buscamos estar na vanguarda da proteção ambiental. Assim, criamos uma cultura de cuidado aos ambientes naturais por toda a vida.</p>', 'conexaog-elementor' ),
            ]
        );

        // Botão
        $this->add_control(
            'button_text',
            [
                'label'   => __( 'Texto do Botão', 'conexaog-elementor' ),
                'type'    => Controls_Manager::TEXT,
                'default' => __( 'Serviços', 'conexaog-elementor' ),
            ]
        );
        $this->add_control(
            'button_link',
            [
                'label'       => __( 'Link do Botão', 'conexaog-elementor' ),
                'type'        => Controls_Manager::URL,
                'placeholder' => __( 'https://seu-link.com', 'conexaog-elementor' ),
                'show_external' => true,
                'default'     => [
                    'url'         => '#servicos',
                    'is_external' => false,
                    'nofollow'    => true,
                ],
            ]
        );
        
        // --- SELETOR DE MÍDIA ---
        $this->add_control(
            'media_type',
            [
                'label'   => __( 'Tipo de Mídia', 'conexaog-elementor' ),
                'type'    => Controls_Manager::CHOOSE,
                'options' => [
                    'image' => [
                        'title' => __( 'Imagem', 'conexaog-elementor' ),
                        'icon'  => 'eicon-image-bold',
                    ],
                    'video' => [
                        'title' => __( 'Vídeo', 'conexaog-elementor' ),
                        'icon'  => 'eicon-video-camera',
                    ],
                ],
                'default' => 'image',
                'toggle'  => false,
            ]
        );

        // Imagem principal
        $this->add_control(
            'primary_image',
            [
                'label'   => __( 'Escolha a Imagem', 'conexaog-elementor' ),
                'type'    => Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'media_type' => 'image',
                ],
            ]
        );
        
        // Imagem de hover (opcional)
        $this->add_control(
            'hover_image',
            [
                'label'       => __( 'Imagem de Hover (opcional)', 'conexaog-elementor' ),
                'type'        => Controls_Manager::MEDIA,
                'default'     => [ 'url' => '' ],
                'description' => 'Se preenchida, aparecerá ao passar o mouse sobre a imagem principal.',
                'condition'   => [
                    'media_type' => 'image',
                ],
            ]
        );

        // Vídeo Principal
        $this->add_control(
            'primary_video',
            [
                'label'     => __( 'Escolha o Vídeo', 'conexaog-elementor' ),
                'type'      => Controls_Manager::MEDIA,
                'media_types' => [ 'video' ],
                'condition' => [
                    'media_type' => 'video',
                ],
            ]
        );

        // Imagem de fundo (opcional)
        $this->add_control(
            'background_image',
            [
                'label'       => __( 'Imagem de Fundo (opcional)', 'conexaog-elementor' ),
                'type'        => Controls_Manager::MEDIA,
                'default'     => [ 'url' => '' ],
                'description' => 'Se não escolher, somente o degradê será exibido.',
                'separator'   => 'before',
            ]
        );

        $this->add_control(
        'form_shortcode',
        [
            'label' => __( 'Shortcode do Formulário', 'conexaog-elementor' ),
            'type'  => Controls_Manager::TEXT,
            'description' => 'Cole aqui o shortcode do seu Contact Form 7 (ou outro).',
        ]
        );


        $this->end_controls_section();

        // === Estilo e Layout ===
        $this->start_controls_section(
            'section_style',
            [
                'label' => __( 'Layout e Estilo', 'conexaog-elementor' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        // Posição da Imagem
        $this->add_control(
            'image_position',
            [
                'label'   => __( 'Posição da Mídia', 'conexaog-elementor' ),
                'type'    => Controls_Manager::CHOOSE,
                'options' => [
                    'left'  => [
                        'title' => __( 'Esquerda', 'conexaog-elementor' ),
                        'icon'  => 'eicon-h-align-left',
                    ],
                    'right' => [
                        'title' => __( 'Direita', 'conexaog-elementor' ),
                        'icon'  => 'eicon-h-align-right',
                    ],
                ],
                'default' => 'left',
                'toggle'  => false,
            ]
        );
        
        // Cores do Degradê
        $this->add_control(
            'gradient_color_start',
            [
                'label'   => __( 'Cor Início do Degradê', 'conexaog-elementor' ),
                'type'    => Controls_Manager::COLOR,
                'default' => '#0e2644',
            ]
        );
        $this->add_control(
            'gradient_color_end',
            [
                'label'   => __( 'Cor Fim do Degradê', 'conexaog-elementor' ),
                'type'    => Controls_Manager::COLOR,
                'default' => '#3C5F89',
            ]
        );

        // *** NOVO CONTROLE DE ALTURA RESPONSIVO ***
        $this->add_responsive_control(
            'media_max_height',
            [
                'label' => __( 'Altura Máxima da Mídia', 'conexaog-elementor' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', 'vh' ],
                'range' => [
                    'px' => [
                        'min' => 100,
                        'max' => 1000,
                    ],
                    'vh' => [
                        'min' => 10,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    // Aplica a altura máxima no container da mídia
                    '{{WRAPPER}} .texto_slide .esquerda .mask_img' => 'max-height: {{SIZE}}{{UNIT}};',
                ],
                'description' => __( 'Defina uma altura máxima para a imagem ou vídeo. Use o ícone de dispositivo para ajustar para mobile.', 'conexaog-elementor' ),
                'separator' => 'before',
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $s = $this->get_settings_for_display();

        // Botão
        if ( empty($s['button_link']['url']) ) {
            $this->add_render_attribute('button','href','#servicos');
        } else {
            $this->add_link_attributes('button',$s['button_link']);
        }

        // Fundo
        $fundo_style = sprintf(
            "--gradient-color-start:%s; --gradient-color-end:%s;%s",
            esc_attr($s['gradient_color_start']),
            esc_attr($s['gradient_color_end']),
            !empty($s['background_image']['url'])
                ? " --background-image:url('".esc_url($s['background_image']['url'])."');"
                : ''
        );

        // Classe posição
        $pos_class = 'image-position-'.$s['image_position'];

        ?>
        <section id="servicos" class="texto_slide <?php echo esc_attr($pos_class); ?>">
            <div class="fundo" style="<?php echo $fundo_style; ?>"></div>
            <div class="centro">
                <div class="esquerda">
                    <div class="wrapper">
                        <div class="mask_img">
                            <?php if ( $s['media_type'] === 'image' && !empty($s['primary_image']['url']) ): ?>
                                
                                <img class="primary" src="<?php echo esc_url($s['primary_image']['url']); ?>" alt="<?php echo esc_attr(get_post_meta($s['primary_image']['id'], '_wp_attachment_image_alt', true)); ?>">
                                
                                <?php if ( !empty($s['hover_image']['url']) ): ?>
                                    <img class="hover" src="<?php echo esc_url($s['hover_image']['url']); ?>" alt="<?php echo esc_attr(get_post_meta($s['hover_image']['id'], '_wp_attachment_image_alt', true)); ?>">
                                <?php endif; ?>

                            <?php elseif ( $s['media_type'] === 'video' && !empty($s['primary_video']['url']) ): ?>
                                
                                <video class="primary-video" autoplay muted loop playsinline src="<?php echo esc_url($s['primary_video']['url']); ?>"></video>

                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="direita">
                    <h2 class="fonte-titulo"><?php echo esc_html($s['title']); ?></h2>
                    <div class="descricao-wrapper">
                        <?php echo wp_kses_post($s['description']); ?>
                    </div>
                    <div class="newsletter-form">
                        <?php echo do_shortcode( $s['form_shortcode'] ); ?>
                    </div>
                    
                    <?php if ( !empty($s['button_text']) ): ?>
                        <a <?php echo $this->get_render_attribute_string('button'); ?> class="bt_acao">
                            <?php echo esc_html($s['button_text']); ?>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </section>
        <?php
    }
}
