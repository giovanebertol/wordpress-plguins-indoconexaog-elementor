<?php
/**
 * Blog Cards – Soft
 * Visual de cards brancos com pill de categoria, sombra suave e CTA.
 * Usa suas variáveis CSS (—main-color, —heading-color, —black-*, —blue-120).
 */
namespace ConexaogElementor\Widget;

use Elementor\Controls_Manager;

if ( ! defined('ABSPATH') ) exit;

class BlogCardsSoft extends \Elementor\Widget_Base {

  public function get_name()        { return 'cg-blog-cards-soft'; }
  public function get_title()       { return __('Blog Cards – Soft', 'conexaog-elementor'); }
  public function get_icon()        { return 'eicon-posts-grid'; }
  public function get_categories()  { return ['conexaog-elementor']; }
  public function get_script_depends(){ return []; }

  protected function _register_controls() {
    $this->start_controls_section('content', ['label' => __('Conteúdo', 'conexaog-elementor')]);

    $this->add_control('heading', [
      'label' => __('Título da seção', 'conexaog-elementor'),
      'type' => Controls_Manager::TEXT,
      'default' => 'Blog',
      'label_block' => true,
    ]);

    $this->add_control('heading_align', [
      'label' => __('Alinhar título', 'conexaog-elementor'),
      'type'  => Controls_Manager::CHOOSE,
      'options' => [
        'left'   => [ 'title' => __('Esq.', 'conexaog-elementor'), 'icon' => 'eicon-text-align-left' ],
        'center' => [ 'title' => __('Centro', 'conexaog-elementor'), 'icon' => 'eicon-text-align-center' ],
        'right'  => [ 'title' => __('Dir.', 'conexaog-elementor'), 'icon' => 'eicon-text-align-right' ],
      ],
      'default' => 'left',
    ]);

    $this->add_control('subheading', [
      'label' => __('Sub‑heading (quando centralizado)', 'conexaog-elementor'),
      'type'  => Controls_Manager::TEXT,
      'placeholder' => __('DESTAQUES', 'conexaog-elementor'),
      'default' => '',
      'label_block' => true,
    ]);

    $this->add_control('section_desc', [
        'label' => __('Descrição da seção', 'conexaog-elementor'),
        'type'  => Controls_Manager::TEXTAREA,
        'rows'  => 3,
        'placeholder' => __('Um texto curto explicando esta área do blog…', 'conexaog-elementor'),
        'default' => '',
    ]);

    $this->add_control('button_text', [
      'label' => __('Texto do botão', 'conexaog-elementor'),
      'type' => Controls_Manager::TEXT,
      'default' => 'Veja Mais',
    ]);

    $this->add_control('button_link', [
      'label' => __('Link do botão', 'conexaog-elementor'),
      'type' => Controls_Manager::URL,
      'default' => ['url' => home_url('/blog')],
    ]);

    $this->add_control('button_pos', [
      'label' => __('Posição do botão', 'conexaog-elementor'),
      'type'  => Controls_Manager::SELECT,
      'default' => 'top-right',
      'options' => [
        'none'          => __('Oculto', 'conexaog-elementor'),
        'top-left'      => __('Topo – esquerda', 'conexaog-elementor'),
        'top-right'     => __('Topo – direita', 'conexaog-elementor'),
        'under-title'   => __('Abaixo do título', 'conexaog-elementor'),
        'bottom-center' => __('Rodapé da seção (centro)', 'conexaog-elementor'),
      ],
    ]);

    $this->add_control('posts_per_page', [
      'label' => __('Quantidade de posts', 'conexaog-elementor'),
      'type' => Controls_Manager::NUMBER,
      'default' => 6, 'min' => 1, 'max' => 12,
    ]);

    $this->add_control('order', [
      'label' => __('Ordem', 'conexaog-elementor'),
      'type' => Controls_Manager::SELECT,
      'default' => 'DESC',
      'options' => ['DESC' => __('Mais recentes', 'conexaog-elementor'), 'ASC' => __('Mais antigos', 'conexaog-elementor')],
    ]);

    $this->add_control('excerpt_len', [
      'label' => __('Resumo (palavras)', 'conexaog-elementor'),
      'type'  => Controls_Manager::NUMBER,
      'default' => 26, 'min' => 5, 'max' => 60,
    ]);

    $this->end_controls_section();
  }

  public function render() {
    $s = $this->get_settings_for_display();

    $ppp  = !empty($s['posts_per_page']) ? (int)$s['posts_per_page'] : 6;
    $ord  = ($s['order'] === 'ASC') ? 'ASC' : 'DESC';
    $q = new \WP_Query([
      'post_type'      => 'post',
      'posts_per_page' => $ppp,
      'orderby'        => 'date',
      'order'          => $ord,
    ]);

    $align   = !empty($s['heading_align']) ? $s['heading_align'] : 'left';
    $has_btn = !empty($s['button_text']) && !empty($s['button_link']['url']);
    $btn_html = $has_btn
      ? '<a class="theme-btn soft-grid__cta" href="'.esc_url($s['button_link']['url']).'">'.esc_html($s['button_text']).'</a>'
      : '';

    ?>
    <section class="blog-area blog-soft-grid py-128">
      <div class="container">

        <div class="row section-heading mb-30 align-<?php echo esc_attr($align); ?>">
          <div class="section-title <?php echo $align==='center' ? 'col-12' : 'col-sm-6'; ?>">
            <?php if($align==='center' && !empty($s['subheading'])): ?>
            <div class="cg-subheading">
                <?php echo esc_html($s['subheading']); ?>
            </div>
            <div class="cg-underline"></div>
            <?php endif; ?>

            <?php if(!empty($s['heading'])): ?>
              <h2><?php echo esc_html($s['heading']); ?></h2>
            <?php endif; ?>

            <?php if ( ! empty( $s['section_desc'] ) ): ?>
            <div class="soft-grid__desc">
                <?php echo wp_kses_post( wpautop( $s['section_desc'] ) ); ?>
            </div>
            <?php endif; ?>

            <?php if($s['button_pos']==='under-title' && $has_btn): ?>
              <div class="soft-grid__btn under-title"><?php echo $btn_html; ?></div>
            <?php endif; ?>
          </div>

          <?php if(in_array($s['button_pos'], ['top-left','top-right'], true) && $has_btn && $align!=='center'): ?>
            <div class="button col-sm-6" style="text-align:<?php echo $s['button_pos']==='top-right'?'right':'left'; ?>">
              <?php echo $btn_html; ?>
            </div>
          <?php endif; ?>
        </div>

        <div class="row">
          <?php
          while($q->have_posts()): $q->the_post();
            $thumb = get_the_post_thumbnail_url(get_the_ID(), 'large');
            $cats  = get_the_terms(get_the_ID(), 'category');
            $cat   = (!is_wp_error($cats) && !empty($cats)) ? $cats[0]->name : '';
          ?>
          <div class="col-lg-4 col-md-6 item d-flex">
            <article class="soft-card">
              <a href="<?php echo esc_url(get_permalink()); ?>" class="soft-card__media">
                <?php if($thumb): ?>
                  <img src="<?php echo esc_url($thumb); ?>" alt="<?php echo esc_attr(get_the_title()); ?>">
                <?php endif; ?>
                <?php if($cat): ?>
                  <span class="soft-card__pill"><?php echo esc_html($cat); ?></span>
                <?php endif; ?>
              </a>

              <div class="soft-card__body">
                <h5 class="soft-card__title">
                  <a href="<?php echo esc_url(get_permalink()); ?>">
                    <?php echo esc_html(get_the_title()); ?>
                  </a>
                </h5>

                <p class="soft-card__excerpt">
                  <?php echo esc_html( wp_trim_words( wp_strip_all_tags(get_the_excerpt()), (int)$s['excerpt_len'], '…' ) ); ?>
                </p>

                <a class="soft-card__read" href="<?php echo esc_url(get_permalink()); ?>">
                  <?php esc_html_e('Ver Artigo', 'indoconexaog'); ?> <span aria-hidden="true">→</span>
                </a>
              </div>
            </article>
          </div>
          <?php endwhile; wp_reset_postdata(); ?>
        </div>

        <?php if($s['button_pos']==='bottom-center' && $has_btn): ?>
          <div class="soft-grid__btn bottom-center"><?php echo $btn_html; ?></div>
        <?php endif; ?>

      </div>
    </section>
    <?php
  }
}
