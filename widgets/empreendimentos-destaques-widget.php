<?php
namespace ConexaogElementor\Widget;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class EmpreendimentosDestaquesWidget extends Widget_Base {

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
        // --- Seção de Conteúdo ---
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

        // Dentro do _register_controls(), logo após main_title:
        $this->add_control(
            'title_style',
            [
                'label'   => __( 'Estilo do Título', 'conexaog-elementor' ),
                'type'    => Controls_Manager::CHOOSE,
                'options' => [
                    'style-1' => [
                        'title' => __( 'Fundo', 'conexaog-elementor' ),
                        'icon'  => 'eicon-text-overlay',
                    ],
                    'style-2' => [
                        'title' => __( 'Linha', 'conexaog-elementor' ),
                        'icon'  => 'eicon-hr',
                    ],
                    'style-3' => [
                        'title' => __( 'Badge + Linha + Título', 'conexaog-elementor' ),
                        'icon'  => 'eicon-post-list',
                    ],
                ],
                'default' => 'style-1',
                'toggle'  => false,
            ]
        );

        $this->end_controls_section();

        // --- Seção de Estilo ---
        $this->start_controls_section(
            'section_style_options',
            [
                'label' => __( 'Estilo do Card', 'conexaog-elementor' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'card_style',
            [
                'label' => __( 'Escolha o Estilo', 'conexaog-elementor' ),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'style-1' => [
                        'title' => __( 'Estilo 1 (Ribbon)', 'conexaog-elementor' ),
                        'icon' => 'eicon-gallery-grid',
                    ],
                    'style-2' => [
                        'title' => __( 'Estilo 2 (Linha)', 'conexaog-elementor' ),
                        'icon' => 'eicon-post-list',
                    ],
                ],
                'default' => 'style-1',
                'toggle' => false,
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $prefix = '_cmb_';
        $card_style = $settings['card_style']; // Pega o estilo selecionado
        
        $status_terms = get_terms(['taxonomy' => 'status_empreendimento', 'hide_empty' => true]);

        if (empty($status_terms) || is_wp_error($status_terms)) return;
        ?>
        <section class="destaques-section py-128">
            <div class="container">
                <div class="section-title-with-bg <?php echo esc_attr( $settings['title_style'] ); ?>">
                    <span class="background-text"><?php echo esc_html( $settings['background_text'] ); ?></span>
                    <h2 class="main-title"><?php echo esc_html( $settings['main_title'] ); ?></h2>
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
                                    <div class="card-destaque <?php echo esc_attr($card_style); // Adiciona a classe de estilo ?>">
                                        <a href="<?php the_permalink(); ?>" class="card-destaque__image-link">
                                            <?php if (has_post_thumbnail()) :
                                                echo get_the_post_thumbnail(get_the_ID(), 'large');
                                            endif; ?>
                                        </a>
                                        <div class="card-destaque__content">
                                            <?php if ($card_style === 'style-2'): // Lógica para o Estilo 2 ?>
                                                <span class="card-destaque__badge"><?php echo esc_html($term->name); ?></span>
                                                <hr class="card-destaque__separator">
                                            <?php endif; ?>

                                            <h3 class="card-destaque__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                            
                                            <?php if ($resumo) : ?>
                                                <p class="card-destaque__resumo"><?php echo esc_html($resumo); ?></p>
                                            <?php endif; ?>
                                        </div>
                                        
                                        <?php if ($card_style === 'style-1'): // Ribbon apenas para o Estilo 1 ?>
                                            <div class="card-destaque__ribbon"><span><?php echo esc_html($term->name); ?></span></div>
                                        <?php endif; ?>
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
