<?php
namespace ConexaogElementor\Widget;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class SliderPostWidget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'slider-post-widget';
    }

    public function get_title() {
        return __( 'Slider (Dinâmico)', 'conexaog-elementor' );
    }

    public function get_icon() {
        return 'eicon-slides';
    }

    public function get_categories() {
        // Certifique-se de que 'conexaog-elementor' é a categoria correta
        return [ 'conexaog-elementor' ];
    }

    public function get_keywords() {
        return [ 'slider', 'post', 'dinamico', 'hero' ];
    }

    /**
     * Define os controles do widget no painel do Elementor.
     */
    protected function _register_controls() {
        $this->start_controls_section(
            'section_content_query',
            [
                'label' => __( 'Configuração do Slider', 'conexaog-elementor' ),
            ]
        );

        $this->add_control(
            'slider_location',
            [
                'label' => __( 'Exibir Slides de Qual Local?', 'conexaog-elementor' ),
                'type' => Controls_Manager::SELECT,
                'description' => __( 'Selecione o grupo de slides a ser exibido com base na localização definida no cadastro de cada slide.', 'conexaog-elementor' ),
                'options' => [
                    'home' => __( 'Home', 'conexaog-elementor' ),
                    // Você pode adicionar mais opções aqui no futuro, se necessário
                ],
                'default' => 'home',
            ]
        );

        $this->end_controls_section();
    }

    /**
     * Renderiza o HTML do widget no front-end.
     */
    protected function render() {
        $settings = $this->get_settings_for_display();
        $location = $settings['slider_location'];
        $prefix = '_cmb_';

        // 1. Configura a consulta para buscar os slides do Post Type
        $args = array(
            'post_type'      => 'slider',
            'posts_per_page' => -1,
            'meta_query'     => array(
                array(
                    'key'     => $prefix . 'slider_localizacao',
                    'value'   => $location,
                    'compare' => '=',
                ),
            ),
            'orderby'        => 'date', // ou 'menu_order' se quiser ordenar manualmente
            'order'          => 'ASC',
        );
        $slider_query = new \WP_Query($args);

        // 2. Verifica se encontrou slides e inicia a renderização
        if ($slider_query->have_posts()) :
            $slider_id = 'slider-' . $this->get_id(); // ID único para o carrossel
        ?>
        <section class="hero-area mt-92 pb-40 black-120-bg">
            <div class="container pb-64">
                <div class="carousel slide" id="<?php echo esc_attr($slider_id); ?>" data-bs-ride="carousel">
                    
                    <div class="carousel-indicators">
                        <?php for ($i = 0; $i < $slider_query->post_count; $i++) : ?>
                            <button type="button" data-bs-target="#<?php echo esc_attr($slider_id); ?>" data-bs-slide-to="<?php echo $i; ?>" class="<?php if($i==0) echo 'active'; ?>" aria-current="<?php if($i==0) echo 'true'; ?>"></button>
                        <?php endfor; ?>
                    </div>
                    
                    <div class="carousel-inner" role="listbox">
                        <?php $j = 0; while ($slider_query->have_posts()) : $slider_query->the_post();
                            // 3. Pega os dados de cada slide
                            $botao_texto     = rwmb_meta($prefix . 'slider_botao_texto');
                            $botao_url       = rwmb_meta($prefix . 'slider_botao_url');
                            $texto_destaque  = rwmb_meta($prefix . 'slider_texto_destaque');
                            $img_desktop_data = rwmb_meta($prefix . 'slider_imagem_desktop', ['limit' => 1]);
                            $img_mobile_data  = rwmb_meta($prefix . 'slider_imagem_mobile', ['limit' => 1]);
                            
                            $img_desktop = $img_desktop_data ? reset($img_desktop_data)['full_url'] : '';
                            $img_mobile  = $img_mobile_data ? reset($img_mobile_data)['full_url'] : $img_desktop;
                        ?>
                        <div class="row carousel-item <?php if($j==0) echo 'active'; ?>">
                            <div class="d-flex">
                                <?php if ($texto_destaque) : ?>
                                <div class="col-lg-2">
                                    <h1 class="rotate-hero" style="left: -282px; bottom: 255px;"><?php echo esc_html($texto_destaque); ?></h1>
                                </div>
                                <?php endif; ?>

                                <div class="col-lg-10 d-flex hero-text-img">
                                    <div class="hero-content">
                                        <div class="wow fadeInUp">
                                            <h6><?php the_title(); ?></h6>
                                            <?php if ($botao_texto && $botao_url) : ?>
                                            <a href="<?php echo esc_url($botao_url); ?>" class="hero-btn wow fadeInUp">
                                                <?php echo esc_html($botao_texto); ?>
                                                <span class="btn-icon">
                                                    <span class="circle"></span>
                                                    <span class="dot"></span>
                                                    <span class="line"></span>
                                                    <span class="fa-solid fa-arrow-right"></span>
                                                </span>
                                            </a>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <?php if ($img_desktop) : ?>
                                    <div class="bg-img">
                                        <a href="<?php echo esc_url($botao_url); ?>">
                                            <picture>
                                                <source media="(max-width: 767px)" srcset="<?php echo esc_url($img_mobile); ?>">
                                                <img class="hero-img wow zoomIn" src="<?php echo esc_url($img_desktop); ?>" alt="<?php the_title(); ?>">
                                            </picture>
                                        </a>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <?php $j++; endwhile; ?>
                    </div>
                </div>
            </div>
        </section>
        <?php
        endif;
        wp_reset_postdata(); // Restaura o post principal
    }
}