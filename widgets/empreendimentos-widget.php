<?php
namespace ConexaogElementor\Widget;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class EmpreendimentosWidget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'empreendimentos-widget';
    }

    public function get_title() {
        return __( 'Galeria de Empreendimentos', 'conexaog-elementor' );
    }

    public function get_icon() {
        return 'eicon-gallery-grid'; // Ícone apropriado para uma galeria
    }

    public function get_categories() {
        // Certifique-se de que 'conexaog-elementor' é a sua categoria de widgets
        return [ 'conexaog-elementor' ];
    }

    public function get_keywords() {
        return [ 'empreendimentos', 'galeria', 'portfolio', 'status' ];
    }

    /**
     * Define os controles do widget no painel do Elementor.
     */
    protected function _register_controls() {
        // CORREÇÃO: Usando $this-> em vez de $this.
        $this->start_controls_section(
            'section_content_query',
            [
                'label' => __( 'Configurações da Galeria', 'conexaog-elementor' ),
            ]
        );

        // CORREÇÃO: Usando $this-> em vez de $this.
        $this->add_control(
            'posts_per_page',
            [
                'label'   => __( 'Empreendimentos a Exibir', 'conexaog-elementor' ),
                'type'    => Controls_Manager::NUMBER,
                'default' => 9,
                'description' => __( 'Use -1 para exibir todos.', 'conexaog-elementor' ),
            ]
        );

        // CORREÇÃO: Usando $this-> em vez de $this.
        $this->end_controls_section();
    }

    /**
     * Renderiza o HTML do widget no front-end.
     */
    protected function render() {
        // CORREÇÃO: Usando $this-> em vez de $this.
        $settings = $this->get_settings_for_display();
        $prefix = '_cmb_';
        
        // 1. Busca os termos (status) para criar os filtros
        $terms = get_terms([
            'taxonomy'   => 'status_empreendimento',
            'hide_empty' => true, // Só mostra status que têm pelo menos um empreendimento
        ]);
        ?>
        <section class="empreendimentos-gallery-section">
            <div class="container">
                <?php if (!is_wp_error($terms) && !empty($terms)) : ?>
                <ul class="empreendimento-filter-tabs">
                    <li class="active" data-filter="*"><a><?php _e('Todos', 'indoconexaog'); ?></a></li>
                    <?php foreach ($terms as $term) : ?>
                        <li data-filter=".status-<?php echo esc_attr($term->slug); ?>"><a><?php echo esc_html($term->name); ?></a></li>
                    <?php endforeach; ?>
                </ul>
                <?php endif; ?>

                <div class="row empreendimentos-grid">
                    <?php
                    // 2. Busca os posts do tipo "Empreendimento"
                    $args = array(
                        'post_type'      => 'empreendimento',
                        'posts_per_page' => $settings['posts_per_page'],
                        'orderby'        => 'date',
                        'order'          => 'DESC',
                    );
                    $empreendimentos_query = new \WP_Query($args);

                    if ($empreendimentos_query->have_posts()) :
                        while ($empreendimentos_query->have_posts()) : $empreendimentos_query->the_post();
                            // 3. Pega os dados de cada empreendimento
                            $resumo = rwmb_meta($prefix . 'resumo');
                            $status_terms = get_the_terms(get_the_ID(), 'status_empreendimento');
                            $status_classes = '';
                            $status_name = '';

                            if ($status_terms && !is_wp_error($status_terms)) {
                                // Cria as classes de filtro
                                foreach($status_terms as $term) {
                                    $status_classes .= ' status-' . $term->slug;
                                }
                                // Pega o nome do primeiro status para exibir no card
                                $status_name = $status_terms[0]->name;
                            }
                    ?>
                        <div class="col-lg-4 col-md-6 empreendimento-item <?php echo esc_attr($status_classes); ?>">
                            <div class="empreendimento-card">
                                <a href="<?php the_permalink(); ?>" class="empreendimento-card__image-link">
                                    <?php if (has_post_thumbnail()) :
                                        the_post_thumbnail('large'); // Imagem principal
                                    else : ?>
                                        <img src="<?php echo plugin_dir_url(__FILE__) . '../assets/img/placeholder.png'; ?>" alt="<?php the_title(); ?>">
                                    <?php endif; ?>
                                    
                                    <?php if ($status_name) : ?>
                                        <span class="empreendimento-card__status"><?php echo esc_html($status_name); ?></span>
                                    <?php endif; ?>
                                </a>
                                <div class="empreendimento-card__content">
                                    <h3 class="empreendimento-card__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                    <?php if ($resumo) : ?>
                                        <p class="empreendimento-card__resumo"><?php echo esc_html($resumo); ?></p>
                                    <?php endif; ?>
                                    <a href="<?php the_permalink(); ?>" class="empreendimento-card__link"><?php _e('Ver Detalhes', 'indoconexaog'); ?></a>
                                </div>
                            </div>
                        </div>
                    <?php
                        endwhile;
                        wp_reset_postdata();
                    endif;
                    ?>
                </div>
            </div>
        </section>
        <?php
    }
}