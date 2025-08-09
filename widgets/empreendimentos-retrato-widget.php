<?php
namespace ConexaogElementor\Widget;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class EmpreendimentosRetratoWidget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'empreendimentos-retrato-widget';
    }

    public function get_title() {
        return __( 'Empreendimentos (Retrato)', 'conexaog-elementor' );
    }

    public function get_icon() {
        return 'eicon-gallery-portrait';
    }

    public function get_categories() {
        return [ 'conexaog-elementor' ];
    }

    protected function _register_controls() {
        // Controles do widget (ex: posts por página) podem ser adicionados aqui
    }

    protected function render() {
        $prefix = '_cmb_';
        $terms = get_terms(['taxonomy' => 'status_empreendimento', 'hide_empty' => true]);
        ?>
        <section class="empreendimentos-retrato-section py-128 ">
            <div class="container">
                <?php if (!is_wp_error($terms) && !empty($terms)) : ?>
                <ul class="empreendimento-filter-tabs">
                    <li class="active" data-filter="*"><a><?php _e('Todos', 'indoconexaog'); ?></a></li>
                    <?php foreach ($terms as $term) : ?>
                        <li data-filter=".status-<?php echo esc_attr($term->slug); ?>"><a><?php echo esc_html($term->name); ?></a></li>
                    <?php endforeach; ?>
                </ul>
                <?php endif; ?>

                <div class="row empreendimentos-grid-retrato">
                    <?php
                    $args = ['post_type' => 'empreendimento', 'posts_per_page' => -1];
                    $query = new \WP_Query($args);

                    if ($query->have_posts()) :
                        while ($query->have_posts()) : $query->the_post();
                            $resumo = rwmb_meta($prefix . 'resumo');
                            $status_terms = get_the_terms(get_the_ID(), 'status_empreendimento');
                            $status_classes = '';
                            $status_name = '';

                            if ($status_terms && !is_wp_error($status_terms)) {
                                foreach($status_terms as $term) { $status_classes .= ' status-' . $term->slug; }
                                $status_name = $status_terms[0]->name;
                            }
                    ?>
                        <div class="col-lg-4 col-md-6 empreendimento-item <?php echo esc_attr($status_classes); ?>">
                            <div class="card-retrato">
                                <a href="<?php the_permalink(); ?>" class="card-retrato__image-link">
                                    <?php if (has_post_thumbnail()) :
                                        the_post_thumbnail('large');
                                    endif; ?>
                                </a>
                                <div class="card-retrato__overlay"></div>
                                <div class="card-retrato__content">
                                    <?php if ($status_name) : ?>
                                        <span class="card-retrato__badge"><?php echo esc_html($status_name); ?></span>
                                    <?php endif; ?>
                                    <h3 class="card-retrato__title"><?php the_title(); ?></h3>
                                    <?php if ($resumo) : ?>
                                        <p class="card-retrato__resumo"><?php echo esc_html($resumo); ?></p>
                                    <?php endif; ?>
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