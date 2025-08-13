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
                    'gallery' => [
                        'title' => __( 'Galeria', 'conexaog-elementor' ),
                        'icon'  => 'eicon-gallery-grid',
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

        $this->add_control(
            'image_gallery',
            [
                'label' => __( 'Adicionar Imagens', 'conexaog-elementor' ),
                'type' => Controls_Manager::GALLERY,
                'default' => [],
                'condition' => [
                    'media_type' => 'gallery',
                ],
            ]
        );

        $this->add_control(
            'gallery_video_url',
            [
                'label' => __( 'URL do Vídeo para Galeria (Opcional)', 'conexaog-elementor' ),
                'type' => Controls_Manager::TEXT,
                'placeholder' => __( 'https://vimeo.com/...', 'conexaog-elementor' ),
                'description' => __( 'Adicione uma URL de vídeo para incluir um botão de play na galeria.', 'conexaog-elementor' ),
                'condition' => [
                    'media_type' => 'gallery',
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
        
        // CONTROLE: Altura da Galeria (apenas este widget)
        $this->add_responsive_control(
            'media_max_height',
            [
                'label' => __( 'Altura da Galeria', 'conexaog-elementor' ),
                'type'  => Controls_Manager::SLIDER,
                'size_units' => [ 'px', 'vh' ],
                'range' => [
                    'px' => [ 'min' => 100, 'max' => 1200 ],
                    'vh' => [ 'min' => 10,  'max' => 100  ],
                ],
                'selectors' => [
                    // Força a altura e desativa proporção fixa neste widget
                    '{{WRAPPER}} .generic-gallery-grid' => 'height: {{SIZE}}{{UNIT}} !important; max-height: none !important; aspect-ratio: auto !important;',
                    // Evita que filhos imponham altura mínima
                    '{{WRAPPER}} .generic-gallery-grid > *' => 'min-height: 0 !important;',
                    // Garante que as imagens preencham as células
                    '{{WRAPPER}} .generic-gallery-grid .gallery-image' => 'height: 100% !important; object-fit: cover;',
                    // Garantia nos wrappers internos do seu widget
                    '{{WRAPPER}} .texto_slide .esquerda, {{WRAPPER}} .texto_slide .esquerda .wrapper, {{WRAPPER}} .texto_slide .esquerda .mask_img' => 'height: auto !important; max-height: none !important;',
                ],
                'description' => __( 'Defina a altura da galeria (este widget).', 'conexaog-elementor' ),
                'separator' => 'before',
            ]
        );


        // LARGURA DA GALERIA (wrap da coluna esquerda)
        $this->add_responsive_control(
            'gallery_width',
            [
                'label' => __( 'Largura da Galeria', 'conexaog-elementor' ),
                'type'  => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%', 'vw' ],
                'range' => [
                    'px' => [ 'min' => 200, 'max' => 1200 ],
                    '%'  => [ 'min' => 10,  'max' => 100  ],
                    'vw' => [ 'min' => 10,  'max' => 100  ],
                ],
                'selectors' => [
                    // Remove o teto do tema e aplica a largura escolhida
                    '{{WRAPPER}} .texto_slide .esquerda .wrapper' => 'max-width: {{SIZE}}{{UNIT}} !important; width: {{SIZE}}{{UNIT}} !important;',
                    // Garante que a grid ocupe 100% da área do wrapper
                    '{{WRAPPER}} .texto_slide .esquerda .wrapper .generic-gallery-grid' => 'width: 100% !important;',
                ],
            ]
        );

        // LARGURA MÁXIMA DO CONTAINER
        $this->add_responsive_control(
            'container_max_width',
            [
                'label' => __( 'Máx. largura do container', 'conexaog-elementor' ),
                'type'  => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%', 'vw' ],
                'range' => [
                    'px' => [ 'min' => 600, 'max' => 1920 ],
                    '%'  => [ 'min' => 50,  'max' => 100  ],
                    'vw' => [ 'min' => 50,  'max' => 100  ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .texto_slide .centro' => 'max-width: {{SIZE}}{{UNIT}} !important;',
                ],
                'default' => [ 'size' => 1200, 'unit' => 'px' ],
                'separator' => 'before',
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $s = $this->get_settings_for_display();

        $widget_id = $this->get_id();
        echo '<style>
        .elementor-element-' . esc_attr($widget_id) . ' .esquerda,
        .elementor-element-' . esc_attr($widget_id) . ' .esquerda .wrapper { height:auto; }
        </style>';

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

                            <?php // INÍCIO DA ALTERAÇÃO: Renderização da galeria com correção para lightbox duplo
                            elseif ( $s['media_type'] === 'gallery' && !empty($s['image_gallery']) ):
                                // Verifica se a função helper existe antes de chamá-la
                                if ( function_exists('render_diferenciais_gallery') ) {
                                    
                                    // Captura o HTML da galeria para modificá-lo
                                    ob_start();
                                    
                                    echo render_diferenciais_gallery($s['image_gallery'], [
                                        'gallery_id'           => 'widget-gallery-' . $this->get_id(),
                                        'show_counter'         => true,
                                        'enable_video'         => !empty($s['gallery_video_url']),
                                        'video_url'            => $s['gallery_video_url'],
                                        'enable_animations'    => true,
                                        'max_visible_images'   => 8,
                                    ]);
                                    
                                    $gallery_html = ob_get_clean();
                                    
                                    // Adiciona o atributo 'data-elementor-open-lightbox="no"' em todos os links <a>
                                    // para impedir que o lightbox padrão do Elementor seja acionado junto com o da galeria.
                                    $modified_html = str_replace('<a ', '<a data-elementor-open-lightbox="no" ', $gallery_html);
                                    
                                    echo $modified_html;

                                } else {
                                    // Mensagem de fallback caso a função não exista
                                    echo '<p style="color: red; background: white; padding: 10px;">A função `render_diferenciais_gallery` não foi encontrada. Verifique se o helper está carregado.</p>';
                                    // Como alternativa, mostra a primeira imagem da galeria
                                    $first_image = reset($s['image_gallery']);
                                    if ($first_image && isset($first_image['url'])) {
                                        echo '<img src="' . esc_url($first_image['url']) . '" alt="Primeira imagem da galeria">';
                                    }
                                }
                            endif; 
                            // FIM DA ALTERAÇÃO ?>
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
