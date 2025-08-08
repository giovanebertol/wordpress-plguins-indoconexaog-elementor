<?php
namespace ConexaogElementor\Widget;

use Elementor\Controls_Manager;
use Elementor\Repeater;
use Elementor\Group_Control_Background;

if ( ! defined('ABSPATH') ) exit;

class TimelineVertical extends \Elementor\Widget_Base {
    public function get_name(){ return 'timeline-vertical'; }
    public function get_title(){ return __('Timeline Vertical', 'conexaog-elementor'); }
    public function get_icon(){ return 'eicon-time-line'; }
    public function get_categories(){ return ['conexaog-elementor']; }

    protected function _register_controls(){
        $this->start_controls_section('content', ['label'=>__('Conteúdo','conexaog-elementor')]);

        $rep = new Repeater();
        $rep->add_control('year', [
            'label'=>__('Ano/Período','conexaog-elementor'),
            'type'=>Controls_Manager::TEXT,
            'default'=>'2023',
        ]);
        $rep->add_control('title', [
            'label'=>__('Título','conexaog-elementor'),
            'type'=>Controls_Manager::TEXT,
            'default'=>'Altos do Borgo',
        ]);
        $rep->add_control('image', [
            'label'=>__('Imagem','conexaog-elementor'),
            'type'=>Controls_Manager::MEDIA,
        ]);
        $rep->add_control('desc', [
            'label'=>__('Descrição','conexaog-elementor'),
            'type'=>Controls_Manager::TEXTAREA,
            'rows'=>3,
        ]);
        $rep->add_control('link', [
            'label'=>__('Link (opcional)','conexaog-elementor'),
            'type'=>Controls_Manager::URL,
            'placeholder'=>'https://…',
        ]);

        $this->add_control('items', [
            'label'=>__('Itens','conexaog-elementor'),
            'type'=>Controls_Manager::REPEATER,
            'fields'=>$rep->get_controls(),
            'default'=>[
                ['year'=>'2014/2017','title'=>'Residencial Diamond'],
                ['year'=>'2017/2020','title'=>'Residencial Turquesa'],
                ['year'=>'2021/2024','title'=>'Jardim San Paulo'],
                ['year'=>'2022','title'=>'Terrace Residence'],
                ['year'=>'2023','title'=>'Altos do Borgo'],
                ['year'=>'2025','title'=>'Villaggio di Borgo'],
            ],
            'title_field'=>'{{{ year }}} — {{{ title }}}',
        ]);

        $this->end_controls_section();

        $this->start_controls_section('style', [
            'label'=>__('Estilo','conexaog-elementor'),
            'tab'=>Controls_Manager::TAB_STYLE,
        ]);

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name'=>'bg',
                'label'=>__('Fundo da seção','conexaog-elementor'),
                'types'=>['classic','gradient'],
                'selector'=>'{{WRAPPER}} .tlv',
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name'=>'overlay',
                'label'=>__('Overlay (gradiente)','conexaog-elementor'),
                'types'=>['gradient'],
                'selector'=>'{{WRAPPER}} .tlv::before',
            ]
        );

        $this->add_control('overlay_opacity', [
            'label'=>__('Opacidade do overlay','conexaog-elementor'),
            'type'=>Controls_Manager::SLIDER,
            'range'=>['px'=>['min'=>0,'max'=>1,'step'=>0.01]],
            'default'=>['size'=>0.25],
            'selectors'=>[
                '{{WRAPPER}} .tlv::before'=>'opacity: {{SIZE}};',
            ],
        ]);

        $this->end_controls_section();
    }

    protected function render(){
        $s = $this->get_settings_for_display();
        ?>
        <section class="tlv">
            <div class="tlv__rail" aria-hidden="true">
                <span class="tlv__progress"></span>
            </div>

            <div class="tlv__list">
                <?php foreach(($s['items']??[]) as $i=>$it):
                    $img = !empty($it['image']['url']) ? esc_url($it['image']['url']) : '';
                    $lnk = !empty($it['link']['url']) ? $it['link']['url'] : '';
                    $target = (!empty($it['link']['is_external'])) ? ' target="_blank" rel="noopener"' : '';
                ?>
                <article class="tlv__card" data-step="<?php echo $i+1; ?>">
                    <header class="tlv__head">
                        <div class="tlv__year h5"><?php echo esc_html($it['year'] ?? ''); ?></div>
                        <h3 class="tlv__title h4"><?php echo esc_html($it['title'] ?? ''); ?></h3>
                    </header>

                    <?php if($img): ?>
                    <figure class="tlv__media">
                        <?php if($lnk): ?><a href="<?php echo esc_url($lnk); ?>"<?php echo $target; ?>><?php endif; ?>
                            <img src="<?php echo $img; ?>" alt="">
                        <?php if($lnk): ?></a><?php endif; ?>
                    </figure>
                    <?php endif; ?>

                    <?php if(!empty($it['desc'])): ?>
                        <p class="tlv__desc"><?php echo esc_html($it['desc']); ?></p>
                    <?php endif; ?>
                </article>
                <?php endforeach; ?>
            </div>
        </section>

        <script>
        (function(){
        const root = document.currentScript.closest('.elementor-widget'); // escopo do widget
        const section = root.querySelector('.tlv');
        const list = root.querySelector('.tlv__list');
        const progress = root.querySelector('.tlv__progress');
        if(!section || !list || !progress) return;

        const cards = [...list.querySelectorAll('.tlv__card')];

        /* 1) Reveal suave quando card entra na viewport da PÁGINA */
        const io = new IntersectionObserver((entries)=>{
            entries.forEach(e=>{
            if(e.isIntersecting) e.target.classList.add('is-in');
            });
        }, { root: null, threshold: 0.12 });
        cards.forEach(c=>io.observe(c));

        /* 2) Progresso acompanha rolagem da página dentro da seção */
        const onScroll = ()=>{
            const rect = section.getBoundingClientRect();
            const vh = window.innerHeight || document.documentElement.clientHeight;

            // quanto da seção já foi visto (0 a 1)
            const start = Math.max(0, vh - rect.top);      // começa quando topo entra
            const total = rect.height + vh;                 // janela + altura da seção
            const pct = Math.min(1, Math.max(0, start / total));

            progress.style.height = (pct*100)+'%';
        };
        window.addEventListener('scroll', onScroll, {passive:true});
        window.addEventListener('resize', onScroll);
        onScroll();
        })();
        </script>

        <?php
    }
}
