<?php
namespace ConexaogElementor\Widget;

use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class EmpreendimentosDestaquesWidget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'empreendimentos-destaques-widget';
    }

    public function get_title() {
        return __( 'Destaques de Empreendimentos', 'conexaog-elementor' );
    }

    public function get_icon() {
        return 'eicon-posts-group';
    }

    public function get_categories() {
        return [ 'conexaog-elementor' ];
    }

    protected function _register_controls() {
        $this->start_controls_section(
            'section_content',
            [
                'label' => __( 'Conteúdo do Título', 'conexaog-elementor' ),
            ]
        );

        $this->add_control(
            'background_text',
            [
                'label' => __( 'Texto de Fundo', 'conexaog-elementor' ),
                'type' => Controls_Manager::TEXT,
                'default' => __( 'DESTAQUES', 'conexaog-elementor' ),
            ]
        );

        $this->add_control(
            'main_title',
            [
                'label' => __( 'Título Principal', 'conexaog-elementor' ),
                'type' => Controls_Manager::TEXT,
                'default' => __( 'Nossos Empreendimentos', 'conexaog-elementor' ),
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $prefix = '_cmb_';
        
        $status_terms = get_terms(['taxonomy' => 'status_empreendimento', 'hide_empty' => true]);

        if (empty($status_terms) || is_wp_error($status_terms)) return;
        ?>
        <section class="destaques-section py-128">
            <div class="container">
                <div class="section-title-with-bg">
                    <span class="background-text"><?php echo esc_html($settings['background_text']); ?></span>
                    <h2 class="main-title"><?php echo esc_html($settings['main_title']); ?></h2>
                </div>

                <div class="row">
                    <?php 
                    foreach ($status_terms as $term) :
                        $args = [
                            'post_type'      => 'empreendimento',
                            'posts_per_page' => 1,
                            'orderby'        => 'date',
                            'order'          => 'DESC',
                            'tax_query'      => [['taxonomy' => 'status_empreendimento', 'field' => 'slug', 'terms' => $term->slug]],
                        ];
                        $query = new \WP_Query($args);

                        if ($query->have_posts()) :
                            while ($query->have_posts()) : $query->the_post();
                                $resumo = rwmb_meta($prefix . 'resumo');
                                ?>
                                <div class="col-lg-4 col-md-6">
                                    <div class="card-destaque">
                                        <a href="<?php the_permalink(); ?>" class="card-destaque__image-link">
                                            <?php if (has_post_thumbnail()) :
                                                // Passamos o ID do post atual para a função
                                                echo get_the_post_thumbnail(get_the_ID(), 'large');
                                            endif; ?>
                                        </a>
                                        <div class="card-destaque__content">
                                            <span class="card-destaque__badge"><?php echo esc_html($term->name); ?></span>
                                            <h3 class="card-destaque__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                            <?php if ($resumo) : ?>
                                                <p class="card-destaque__resumo"><?php echo esc_html($resumo); ?></p>
                                            <?php endif; ?>
                                        </div>
                                        <div class="card-destaque__ribbon"><span><?php echo esc_html($term->name); ?></span></div>
                                    </div>
                                </div>
                                <?php
                            endwhile;
                            wp_reset_postdata();
                        endif;
                    endforeach; 
                    ?>
                </div>
            </div>
        </section>
        <?php
    }
}