<?php
namespace ConexaogElementor\Widget;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Background; // <<< ADD

if ( ! defined('ABSPATH') ) exit;

class BdevsAchievements extends \Elementor\Widget_Base {
    public function get_name() { return 'bdevs-achievements'; }
    public function get_title(){ return __('Achievements', 'conexaog-elementor'); }
    public function get_icon() { return 'eicon-counter'; }
    public function get_categories(){ return ['conexaog-elementor']; }
    public function get_script_depends(){ return ['conexaog-elementor']; }

    protected function _register_controls() {
        $this->start_controls_section('section_content', [
            'label' => esc_html__('Achievements', 'conexaog-elementor'),
        ]);

        // Imagens (duas) no estilo vitrine
        $this->add_control('image_left_1', [
            'label' => esc_html__('Imagem esquerda – 01', 'conexaog-elementor'),
            'type'  => Controls_Manager::MEDIA,
        ]);
        $this->add_control('image_left_2', [
            'label' => esc_html__('Imagem esquerda – 02', 'conexaog-elementor'),
            'type'  => Controls_Manager::MEDIA,
        ]);

        // Título opcional
        $this->add_control('heading', [
            'label'       => esc_html__('Título (opcional)', 'conexaog-elementor'),
            'type'        => Controls_Manager::TEXT,
            'placeholder' => __('Nossos Números', 'conexaog-elementor'),
            'default'     => __('É fácil confiar na Marini', 'conexaog-elementor'),
            'label_block' => true,
        ]);

        // Repeater dos indicadores
        $this->add_control('items', [
            'label'  => esc_html__('Indicadores', 'conexaog-elementor'),
            'type'   => Controls_Manager::REPEATER,
            'fields' => [
                [
                    'name'  => 'count_to',
                    'label' => esc_html__('Número final', 'conexaog-elementor'),
                    'type'  => Controls_Manager::NUMBER,
                    'default' => 1200,
                ],
                [
                    'name'  => 'suffix',
                    'label' => esc_html__('Sufixo (ex.: +, K, %)', 'conexaog-elementor'),
                    'type'  => Controls_Manager::TEXT,
                    'default' => '',
                ],
                [
                    'name'  => 'label',
                    'label' => esc_html__('Rótulo', 'conexaog-elementor'),
                    'type'  => Controls_Manager::TEXT,
                    'default' => esc_html__('Happy Clients', 'conexaog-elementor'),
                ],
            ],
            'default' => [
                ['count_to'=>1200, 'suffix'=>'K',  'label'=>'Clientes Felizes'],
                ['count_to'=>21,   'suffix'=>'+',  'label'=>'Anos de Experiência'],
                ['count_to'=>30,   'suffix'=>'+',  'label'=>'Parceiros'],
                ['count_to'=>50,   'suffix'=>'+',  'label'=>'Projetos Entregues'],
            ],
            'title_field' => '{{{ label }}}',
        ]);

        $this->end_controls_section();

        // Layout
        $this->start_controls_section('section_layout', [
            'label' => esc_html__('Layout', 'conexaog-elementor'),
        ]);

        $this->add_responsive_control('align', [
            'label' => esc_html__('Alinhamento do texto', 'conexaog-elementor'),
            'type'  => Controls_Manager::CHOOSE,
            'options' => [
                'left'   => [ 'title'=>__('Esq.', 'conexaog-elementor'), 'icon'=>'eicon-text-align-left' ],
                'center' => [ 'title'=>__('Centro', 'conexaog-elementor'), 'icon'=>'eicon-text-align-center' ],
                'right'  => [ 'title'=>__('Dir.', 'conexaog-elementor'), 'icon'=>'eicon-text-align-right' ],
            ],
            'default' => 'left',
            'prefix_class' => 'elementor%s-align-',
        ]);

        $this->end_controls_section();

        // === NOVO: Estilo do Background & Overlay (imagem + gradiente) ===
        $this->start_controls_section('section_style_background', [
            'label' => esc_html__('Background & Overlay', 'conexaog-elementor'),
            'tab'   => Controls_Manager::TAB_STYLE,
        ]);

        // Imagem de fundo / gradiente no próprio wrapper
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name'     => 'section_background',
                'label'    => esc_html__('Imagem de Fundo', 'conexaog-elementor'),
                'types'    => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .achievements-split',
            ]
        );

        // Gradiente de overlay no ::before (por cima do fundo)
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name'     => 'overlay_gradient',
                'label'    => esc_html__('Overlay (Gradiente)', 'conexaog-elementor'),
                'types'    => ['gradient'],
                'selector' => '{{WRAPPER}} .achievements-split::before',
            ]
        );

        // Opacidade do overlay
        $this->add_control('overlay_opacity', [
            'label' => esc_html__('Opacidade do Overlay', 'conexaog-elementor'),
            'type'  => Controls_Manager::SLIDER,
            'range' => [
                'px' => ['min' => 0, 'max' => 1, 'step' => 0.01],
            ],
            'default' => ['size' => 0.35],
            'selectors' => [
                '{{WRAPPER}} .achievements-split::before' => 'opacity: {{SIZE}};',
            ],
        ]);

        $this->end_controls_section();
    }

    public function render() {
        $s = $this->get_settings_for_display();
        $img1 = !empty($s['image_left_1']['url']) ? esc_url($s['image_left_1']['url']) : '';
        $img2 = !empty($s['image_left_2']['url']) ? esc_url($s['image_left_2']['url']) : '';
        ?>
        <section class="achievements-split py-128"><!-- wrapper recebe bg e overlay via controles -->
            <div class="container">
                <div class="row gx-5 align-items-center">
                    <!-- Coluna imagens -->
                    <div class="col-lg-6 mb-64 mb-lg-0">
                        <div class="split-images">
                            <?php if($img1): ?>
                                <img class="split-img split-img--primary" src="<?php echo $img1; ?>" alt="">
                            <?php endif; ?>
                            <?php if($img2): ?>
                                <img class="split-img split-img--secondary" src="<?php echo $img2; ?>" alt="">
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- Coluna indicadores -->
                    <div class="col-lg-6">
                        <?php if(!empty($s['heading'])): ?>
                            <h2 class="mb-48"><?php echo esc_html($s['heading']); ?></h2>
                        <?php endif; ?>

                        <div class="achievements-list">
                            <?php if(!empty($s['items']) && is_array($s['items'])):
                                $i=1;
                                foreach($s['items'] as $it):
                                    $count = isset($it['count_to']) ? (float)$it['count_to'] : 0;
                                    $suffix = isset($it['suffix']) ? $it['suffix'] : '';
                                    $label  = isset($it['label']) ? $it['label'] : '';
                            ?>
                            <div class="achievements-item d-flex align-items-baseline">
                                <div class="achievements-step h5"><?php echo str_pad($i, 2, '0', STR_PAD_LEFT); ?></div>
                                <div class="achievements-content">
                                    <div class="achievements-line"></div>
                                    <div class="achievements-meta">
                                        <div class="achievements-number h2" data-count="<?php echo esc_attr($count); ?>">
                                            0
                                        </div>
                                        <?php if($suffix!==''): ?>
                                            <span class="achievements-suffix h3"><?php echo esc_html($suffix); ?></span>
                                        <?php endif; ?>
                                    </div>
                                    <div class="achievements-label h5"><?php echo esc_html($label); ?></div>
                                </div>
                            </div>
                            <?php $i++; endforeach; endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Script de contagem (frontend + editor) -->
        <script>
        (function(){
            const els = document.querySelectorAll('.achievements-number[data-count]');
            if(!els.length) return;

            const animate = (el) => {
                const end = parseFloat(el.getAttribute('data-count')) || 0;
                const dur = 1400;
                const start = 0;
                const t0 = performance.now();

                const step = (now) => {
                    const p = Math.min((now - t0) / dur, 1);
                    const eased = (1 - Math.pow(1 - p, 3));
                    el.textContent = Math.floor(start + (end - start) * eased);
                    if(p < 1) requestAnimationFrame(step);
                };
                requestAnimationFrame(step);
            };

            const io = new IntersectionObserver((entries) => {
                entries.forEach(e => {
                    if(e.isIntersecting){
                        const n = e.target;
                        if(!n.dataset.ran){
                            n.dataset.ran = '1';
                            animate(n);
                        }
                    }
                });
            }, {threshold: 0.25});

            els.forEach(el => io.observe(el));
        })();
        </script>
        <?php
    }
}
