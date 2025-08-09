<?php
namespace ConexaogElementor\Widget;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Image_Size;
use Elementor\Group_Control_Typography;

if ( ! defined('ABSPATH') ) exit;

class MariniContactHero extends \Elementor\Widget_Base {

    public function get_name() { return 'marini-contact-hero'; }
    public function get_title() { return __('Marini Contact Hero', 'conexaog-elementor'); }
    public function get_icon() { return 'eicon-call-to-action'; }
    public function get_categories() { return [ 'conexaog-elementor' ]; }
    public function get_script_depends() { return [ 'conexaog-elementor' ]; }

    protected function _register_controls() {

        // Conteúdo principal
        $this->start_controls_section('content_section', [
            'label' => __('Conteúdo', 'conexaog-elementor')
        ]);

        $this->add_control('use_redux_data', [
            'label' => __('Usar dados globais (Redux)', 'conexaog-elementor'),
            'type'  => Controls_Manager::SWITCHER,
            'default' => 'yes',
        ]);

        // Sobrescrever Título (fallback: contact_title do Redux)
        $this->add_control('headline', [
            'label' => __('Título', 'conexaog-elementor'),
            'type'  => Controls_Manager::TEXT,
            'placeholder' => __('Fale com a Marini', 'conexaog-elementor'),
            'label_block' => true,
        ]);

        // Subtítulo opcional
        $this->add_control('subheadline', [
            'label' => __('Subtítulo', 'conexaog-elementor'),
            'type'  => Controls_Manager::TEXTAREA,
            'rows'  => 2,
            'placeholder' => __('Estamos prontos para ajudar você a escolher seu novo lar.', 'conexaog-elementor'),
        ]);

        // BG opcional
        $this->add_control('bg_image', [
            'label' => __('Imagem de Fundo', 'conexaog-elementor'),
            'type'  => Controls_Manager::MEDIA,
            'default' => [],
        ]);
        $this->add_group_control(Group_Control_Image_Size::get_type(), [
            'name' => 'bg_image_size',
            'default' => 'full',
        ]);

        // CTA opcional
        $this->add_control('cta_text', [
            'label' => __('Texto do Botão', 'conexaog-elementor'),
            'type'  => Controls_Manager::TEXT,
            'placeholder' => __('Fale Conosco', 'conexaog-elementor'),
        ]);
        $this->add_control('cta_url', [
            'label' => __('Link do Botão', 'conexaog-elementor'),
            'type'  => Controls_Manager::URL,
            'placeholder' => 'https://',
        ]);

        $this->add_control('form_shortcode', [
            'label'       => __('Formulário de Contato (Shortcode)', 'conexaog-elementor'),
            'type'        => Controls_Manager::TEXTAREA,
            'placeholder' => '[contact-form-7 id="123" title="Formulário de Contato"]',
            'rows'        => 2,
            'description' => __('Cole aqui o shortcode do seu formulário (Contact Form 7, WPForms, Fluent Forms, etc.)', 'conexaog-elementor'),
        ]);



        $this->end_controls_section();

        // Estilo
        $this->start_controls_section('style_section', [
            'label' => __('Estilo', 'conexaog-elementor'),
            'tab'   => Controls_Manager::TAB_STYLE,
        ]);

        $this->add_control('overlay_color', [
            'label' => __('Cor do Overlay', 'conexaog-elementor'),
            'type'  => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .mch-hero::before' => 'background: {{VALUE}}',
            ],
            'default' => 'rgba(0,0,0,.45)',
        ]);

        $this->add_group_control(Group_Control_Typography::get_type(), [
            'name' => 'headline_typo',
            'label'=> __('Tipografia Título', 'conexaog-elementor'),
            'selector' => '{{WRAPPER}} .mch-headline',
        ]);

        $this->add_group_control(Group_Control_Typography::get_type(), [
            'name' => 'subhead_typo',
            'label'=> __('Tipografia Subtítulo', 'conexaog-elementor'),
            'selector' => '{{WRAPPER}} .mch-subheadline',
        ]);

        $this->end_controls_section();
    }

    public function render() {
        $s = $this->get_settings_for_display();

        // Redux (mesma lógica de antes)
        $redux = get_option('redux_demo', []);
        $contact_title = $redux['contact_title'] ?? '';
        $phone  = $redux['phone']   ?? '';
        $email  = $redux['email']   ?? '';
        $addr   = $redux['address'] ?? '';
        $socials = [
            'facebook'  => $redux['link_facebook']  ?? '',
            'dribbble'  => $redux['link_dribbble']  ?? '',
            'instagram' => $redux['link_instagram'] ?? '',
            'linkedin'  => $redux['link_linkedin']  ?? '',
        ];
        $social_icons = [
            'facebook'  => $redux['facebook']  ?? 'fa-facebook-f',
            'dribbble'  => $redux['dribbble']  ?? 'fa-dribbble',
            'instagram' => $redux['instagram'] ?? 'fa-instagram',
            'linkedin'  => $redux['linkedin']  ?? 'fa-linkedin-in',
        ];

        $headline = (!empty($s['use_redux_data']) && 'yes' === $s['use_redux_data'])
            ? ($s['headline'] ?: $contact_title ?: __('Fale com a Marini', 'conexaog-elementor'))
            : ($s['headline'] ?: __('Fale com a Marini', 'conexaog-elementor'));

        $subheadline = $s['subheadline'] ?? '';

        // BG opcional
        $bg = '';
        if (!empty($s['bg_image']['id'])) {
            $src = wp_get_attachment_image_url($s['bg_image']['id'], $s['bg_image_size_size'] ?: 'full');
            if ($src) $bg = esc_url($src);
        }

        $cta_text = $s['cta_text'] ?? '';
        $cta_url  = (!empty($s['cta_url']['url'])) ? $s['cta_url']['url'] : '';
        $phone_href = $phone ? preg_replace('/[^0-9+]/', '', $phone) : '';

        ?>
        <section class="mch-hero" style="<?php echo $bg ? 'background-image:url('.esc_url($bg).')' : ''; ?>">
        <div class="mch-overlay"></div>
        <div class="container">

            <div class="row mch-grid">
            <!-- Esquerda: cards + sociais -->
            <div class="col-lg-5">
                <div class="mch-card-grid">
                    <!-- Títulos -->
                    <?php if ($headline || $subheadline): ?>
                    <header class="mch-header">
                        <?php if ($headline): ?><h2 class="mch-headline"><?php echo esc_html($headline); ?></h2><?php endif; ?>
                        <?php if ($subheadline): ?><p class="mch-subheadline"><?php echo esc_html($subheadline); ?></p><?php endif; ?>
                    </header>
                    <?php endif; ?>

                    <?php if ($addr): ?>
                        <div class="mch-card">
                        <div class="mch-card-icon"><i class="fa-solid fa-location-dot"></i></div>
                        <div class="mch-card-body">
                            <span class="mch-card-label"><?php _e('Endereço', 'conexaog-elementor'); ?></span>
                            <p class="mch-card-text"><?php echo wp_kses_post($addr); ?></p>
                        </div>
                        </div>
                    <?php endif; ?>

                    <?php if ($phone): ?>
                        <div class="mch-card">
                        <div class="mch-card-icon"><i class="fa-solid fa-phone"></i></div>
                        <div class="mch-card-body">
                            <span class="mch-card-label"><?php _e('Telefone', 'conexaog-elementor'); ?></span>
                            <p class="mch-card-text">
                            <a href="tel:<?php echo esc_attr($phone_href); ?>"><?php echo esc_html($phone); ?></a>
                            </p>
                        </div>
                        </div>
                    <?php endif; ?>

                    <?php if ($email): ?>
                        <div class="mch-card">
                        <div class="mch-card-icon"><i class="fa-solid fa-envelope"></i></div>
                        <div class="mch-card-body">
                            <span class="mch-card-label"><?php _e('E-mail', 'conexaog-elementor'); ?></span>
                            <p class="mch-card-text">
                            <a href="mailto:<?php echo esc_attr($email); ?>"><?php echo esc_html($email); ?></a>
                            </p>
                        </div>
                        </div>
                    <?php endif; ?>
                </div>

                <?php if (array_filter($socials)): ?>
                <div class="mch-socials">
                    <?php foreach ($socials as $net => $url): if (!$url) continue; ?>
                    <a href="<?php echo esc_url($url); ?>" target="_blank" rel="noopener">
                        <i class="fab <?php echo esc_attr($social_icons[$net]); ?>"></i>
                    </a>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>

                <?php if ($cta_text && $cta_url): ?>
                <div class="mch-cta-left">
                    <a class="theme-btn hero-slide-btn" href="<?php echo esc_url($cta_url); ?>">
                    <?php echo esc_html($cta_text); ?>
                    </a>
                </div>
                <?php endif; ?>
            </div>

            <!-- Direita: formulário -->
            <div class="col-lg-7">
                <?php if (!empty($s['form_shortcode'])): ?>
                <div class="mch-form-panel">
                    <?php echo do_shortcode($s['form_shortcode']); ?>
                </div>
                <?php endif; ?>
            </div>
            </div>
        </div>
        </section>

        <?php
    }

}
