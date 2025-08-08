<?php
namespace ConexaogElementor\Widget;

use Elementor\Controls_Manager;

if ( ! defined('ABSPATH') ) exit;

class HeroAboutBanner extends \Elementor\Widget_Base {

    public function get_name() { return 'cg-hero-about'; }
    public function get_title() { return __('Hero – Sobre (Marini)', 'conexaog-elementor'); }
    public function get_icon() { return 'eicon-heading'; }
    public function get_categories() { return ['conexaog-elementor']; }
    public function get_script_depends() { return [ 'conexaog-elementor' ]; }

    protected function _register_controls() {

        // — Conteúdo
        $this->start_controls_section('content', [
            'label' => __('Conteúdo', 'conexaog-elementor'),
        ]);

        $this->add_control('style', [
            'label'   => __('Estilo do texto', 'conexaog-elementor'),
            'type'    => Controls_Manager::SELECT,
            'default' => 'dark',
            'options' => [
                'dark'  => __('Claro (texto branco)', 'conexaog-elementor'),
                'light' => __('Escuro (texto preto)', 'conexaog-elementor'),
            ],
        ]);

        $this->add_control('bg_image', [
            'label'   => __('Imagem de fundo', 'conexaog-elementor'),
            'type'    => Controls_Manager::MEDIA,
            'dynamic' => [ 'active' => true ],
            'description' => __('Se vazio, usa a imagem destacada da página.', 'conexaog-elementor'),
        ]);

        $this->add_control('overlay_color', [
            'label'   => __('Cor do overlay', 'conexaog-elementor'),
            'type'    => Controls_Manager::COLOR,
            'default' => 'rgba(0,0,0,0.35)',
        ]);

        $this->add_control('heading', [
            'label'       => __('Título', 'conexaog-elementor'),
            'type'        => Controls_Manager::TEXT,
            'label_block' => true,
            'placeholder' => __('(vazio = usar título da página)', 'conexaog-elementor'),
            'default'     => '',
        ]);

        $this->add_control('description', [
            'label'       => __('Descrição', 'conexaog-elementor'),
            'type'        => Controls_Manager::TEXTAREA,
            'rows'        => 4,
            'default'     => 'Há mais de 21 anos, a Marini Construções atua para entregar lares que unem beleza, tecnologia e sustentabilidade, garantindo mais conforto, segurança e qualidade de vida.',
        ]);

        $this->add_control('show_button', [
            'label'   => __('Mostrar botão', 'conexaog-elementor'),
            'type'    => Controls_Manager::SWITCHER,
            'default' => 'yes',
        ]);

        $this->add_control('button_text', [
            'label'   => __('Texto do botão', 'conexaog-elementor'),
            'type'    => Controls_Manager::TEXT,
            'default' => 'Conheça nossa história',
            'condition' => ['show_button' => 'yes'],
        ]);

        $this->add_control('button_link', [
            'label'   => __('Link do botão', 'conexaog-elementor'),
            'type'    => Controls_Manager::URL,
            'dynamic' => [ 'active' => true ],
            'default' => ['url' => '#historia', 'is_external' => false, 'nofollow' => false],
            'condition' => ['show_button' => 'yes'],
        ]);

        // — Breadcrumb
        $this->add_control('show_breadcrumb', [
            'label'   => __('Mostrar breadcrumb', 'conexaog-elementor'),
            'type'    => Controls_Manager::SWITCHER,
            'default' => 'yes',
            'separator' => 'before',
        ]);

        $this->add_control('home_text', [
            'label' => __('Texto "Home"', 'conexaog-elementor'),
            'type'  => Controls_Manager::TEXT,
            'default' => 'Home',
            'condition' => ['show_breadcrumb' => 'yes'],
        ]);

        

        $this->end_controls_section();

        // — Layout
        $this->start_controls_section('layout', [
            'label' => __('Layout', 'conexaog-elementor'),
        ]);

        $this->add_responsive_control('align', [
            'label'   => __('Alinhamento', 'conexaog-elementor'),
            'type'    => Controls_Manager::CHOOSE,
            'options' => [
                'left'   => ['title' => __('Esq.', 'conexaog-elementor'),   'icon' => 'eicon-text-align-left'],
                'center' => ['title' => __('Centro', 'conexaog-elementor'), 'icon' => 'eicon-text-align-center'],
                'right'  => ['title' => __('Dir.', 'conexaog-elementor'),   'icon' => 'eicon-text-align-right'],
            ],
            'default'      => 'center',
            'prefix_class' => 'elementor%s-align-',
        ]);

        $this->add_control('top_space', [
            'label'   => __('Padding top (classe)', 'conexaog-elementor'),
            'type'    => Controls_Manager::SELECT,
            'default' => 'pt-324',
            'options' => [
                'pt-250'=>'pt-250', 'pt-300'=>'pt-300', 'pt-324'=>'pt-324'
            ],
        ]);

        $this->add_control('bottom_space', [
            'label'   => __('Padding bottom (classe)', 'conexaog-elementor'),
            'type'    => Controls_Manager::SELECT,
            'default' => 'pb-250',
            'options' => [
                'pb-200'=>'pb-200', 'pb-230'=>'pb-230', 'pb-250'=>'pb-250'
            ],
        ]);

        $this->add_responsive_control(
            'max_width_title',
            [
                'label' => __('Largura Máx. do Título', 'conexaog-elementor'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 400,
                        'max' => 1200,
                    ],
                ],
                'default' => [
                    'size' => 800,
                    'unit' => 'px',
                ],
                'selectors' => [
                    '{{WRAPPER}} .banner-content h1' => 'max-width: {{SIZE}}{{UNIT}}; margin-left:auto; margin-right:auto;',
                ],
            ]
        );

        $this->add_responsive_control(
            'max_width_desc',
            [
                'label' => __('Largura Máx. do Texto', 'conexaog-elementor'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 300,
                        'max' => 1000,
                    ],
                ],
                'default' => [
                    'size' => 700,
                    'unit' => 'px',
                ],
                'selectors' => [
                    '{{WRAPPER}} .banner-content p' => 'max-width: {{SIZE}}{{UNIT}}; margin-left:auto; margin-right:auto;',
                ],
            ]
        );


        $this->end_controls_section();
    }

    public function render() {
        $s = $this->get_settings_for_display();

        // ID do objeto atual (página/post) — funciona no Elementor + front
        $object_id = get_queried_object_id();

        // Título: preferir o informado; se vazio, usar o título da página
        $heading_text = !empty($s['heading']) ? $s['heading'] : get_the_title($object_id);

        // Imagem de fundo: preferir a do controle; se vazio, imagem destacada da página
        $bg_url = '';
        if ( !empty($s['bg_image']['url']) ) {
            $bg_url = $s['bg_image']['url'];
        } else {
            $featured = $object_id ? get_the_post_thumbnail_url($object_id, 'full') : '';
            if ( $featured ) $bg_url = $featured;
        }

        $classes  = ['banner-area', $s['top_space'], $s['bottom_space']];
        $classes[] = ($s['style']==='light') ? 'text-black' : '';

        $bg_attr = $bg_url ? ' style="background-image:url('.esc_url($bg_url).');"' : '';

        // Overlay inline
        $overlay_style = '';
        if (!empty($s['overlay_color'])) {
            $overlay_style = ' style="background:'.$s['overlay_color'].';"';
        }

        // Breadcrumb bits
        $show_bc   = !empty($s['show_breadcrumb']) && $s['show_breadcrumb']==='yes';
        $home_text = !empty($s['home_text']) ? $s['home_text'] : 'Home';
        ?>
        <section class="<?php echo esc_attr(implode(' ', $classes)); ?>"<?php echo $bg_attr; ?>>
            <span class="cg-hero-overlay"<?php echo $overlay_style; ?>></span>

            <div class="container <?php echo ($s['align']==='center') ? 'text-center' : ''; ?>">
                <div class="row align-items-center justify-content-between">
                    <div class="banner-content wow fadeInUp delay-0-2s">
                        <?php if( $heading_text ): ?>
                            <h1><?php echo esc_html($heading_text); ?></h1>
                        <?php endif; ?>
                        <?php if( $show_bc ): ?>
                            <div class="">
                                <ul class="breadcrumb wow fadeInUp delay-0-4s">
                                    <li class="breadcrumb-item">
                                        <a href="<?php echo esc_url(home_url('/')); ?>">
                                            <?php echo esc_html($home_text); ?>
                                        </a>
                                    </li>
                                    <?php if( $heading_text ): ?>
                                        <li class="breadcrumb-item"><?php echo esc_html(get_the_title($object_id)); ?></li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        <?php endif; ?>

                        <?php if(!empty($s['description'])): ?>
                            <p class="mt-32"><?php echo esc_html($s['description']); ?></p>
                        <?php endif; ?>

                        <?php if( !empty($s['show_button']) && $s['show_button']==='yes' && !empty($s['button_text']) ):
                            $link = !empty($s['button_link']['url']) ? $s['button_link']['url'] : '#';
                            $target = !empty($s['button_link']['is_external']) ? ' target="_blank"' : '';
                            $rel    = !empty($s['button_link']['nofollow']) ? ' rel="nofollow"' : '';
                            // $btn_class = ($s['style']==='light') ? 'stroke-btn' : 'btn-white-bg';
                        ?>
                            <div class="mt-32">
                                <a class="bt_acao <?php echo esc_attr($btn_class); ?>" href="<?php echo esc_url($link); ?>"<?php echo $target.$rel; ?>>
                                    <?php echo esc_html($s['button_text']); ?>
                                </a>
                            </div>
                        <?php endif; ?>

                        

                    </div>
                </div>
            </div>

            <style>
                .banner-area { position: relative; background-size: cover; background-position: center; }
                .banner-area .cg-hero-overlay{ position:absolute; inset:0; content:""; display:block; z-index:0; }
                .banner-area .banner-content{ position: relative; z-index:1; }
            </style>
        </section>
        <?php
    }
}
