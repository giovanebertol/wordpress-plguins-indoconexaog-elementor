<?php
namespace ConexaogElementor\Widget;

use Elementor\Controls_Manager;
use Elementor\Repeater;
use Elementor\Group_Control_Background;

if ( ! defined('ABSPATH') ) exit;

class TimelineYears extends \Elementor\Widget_Base {
    public function get_name(){ return 'bdevs-timeline-years'; }
    public function get_title(){ return __('Timeline por Anos', 'conexaog-elementor'); }
    public function get_icon(){ return 'eicon-time-line'; }
    public function get_categories(){ return ['conexaog-elementor']; }

    protected function _register_controls(){
        $this->start_controls_section('content', ['label'=>__('Itens','conexaog-elementor')]);

        $rep = new Repeater();
        $rep->add_control('year', [
            'label'=>__('Ano','conexaog-elementor'),
            'type'=>Controls_Manager::TEXT,
            'default'=>'2000',
        ]);
        $rep->add_control('title', [
            'label'=>__('Título','conexaog-elementor'),
            'type'=>Controls_Manager::TEXT,
            'default'=>'Fundada em 2000, em Bento Gonçalves — RS',
            'label_block'=>true
        ]);
        $rep->add_control('text', [
            'label'=>__('Descrição','conexaog-elementor'),
            'type'=>Controls_Manager::TEXTAREA,
            'rows'=>4,
            'default'=>'Texto do marco…',
        ]);
        $rep->add_control('image', [
            'label'=>__('Imagem de fundo','conexaog-elementor'),
            'type'=>Controls_Manager::MEDIA,
        ]);

        $this->add_control('items', [
            'label'=>__('Marcos','conexaog-elementor'),
            'type'=>Controls_Manager::REPEATER,
            'fields'=>$rep->get_controls(),
            'title_field'=>'{{{ year }}} — {{{ title }}}',
            'default'=>[
                ['year'=>'2000','title'=>'Fundada em 2000…'],
                ['year'=>'2005','title'=>'Expansão regional'],
                ['year'=>'2010','title'=>'Primeiro edifício…'],
            ],
        ]);

        $this->end_controls_section();

        // Estilo/Background geral (se quiser usar)
        $this->start_controls_section('style', [
            'label'=>__('Estilo','conexaog-elementor'),
            'tab'=>Controls_Manager::TAB_STYLE,
        ]);
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name'=>'panel_overlay',
                'label'=>__('Overlay no painel','conexaog-elementor'),
                'types'=>['classic','gradient'],
                'selector'=>'{{WRAPPER}} .yt-panel__overlay',
            ]
        );
        $this->end_controls_section();
    }

    protected function render(){
        $s = $this->get_settings_for_display();
        $uid = 'yt-'.substr(md5(uniqid('', true)), 0, 6);
        ?>
        <section class="yt" id="<?php echo esc_attr($uid); ?>">
            <div class="yt__inner container">
                <div class="yt__left">
                    <ol class="yt-nav" role="tablist" aria-orientation="vertical">
                        <?php foreach(($s['items']??[]) as $i=>$it): ?>
                        <li class="yt-nav__item" role="presentation">
                            <button
                                class="yt-nav__btn<?php echo $i===0?' is-active':''; ?>"
                                role="tab"
                                aria-selected="<?php echo $i===0?'true':'false'; ?>"
                                aria-controls="<?php echo $uid; ?>-panel-<?php echo $i; ?>"
                                id="<?php echo $uid; ?>-tab-<?php echo $i; ?>"
                                data-index="<?php echo $i; ?>">
                                <span class="yt-nav__year h3"><?php echo esc_html($it['year'] ?? ''); ?></span>
                                <span class="yt-nav__dot" aria-hidden="true"></span>
                            </button>
                        </li>
                        <?php endforeach; ?>
                    </ol>
                </div>

                <div class="yt__right">
                    <?php foreach(($s['items']??[]) as $i=>$it):
                        $img = !empty($it['image']['url']) ? esc_url($it['image']['url']) : '';
                    ?>
                    <article
                        class="yt-panel<?php echo $i===0?' is-active':''; ?>"
                        role="tabpanel"
                        id="<?php echo $uid; ?>-panel-<?php echo $i; ?>"
                        aria-labelledby="<?php echo $uid; ?>-tab-<?php echo $i; ?>"
                        <?php if($img): ?> style="--yt-bg:url('<?php echo $img; ?>')"<?php endif; ?>>
                        <div class="yt-panel__overlay"></div>
                        <div class="yt-panel__content">
                            <?php if(!empty($it['title'])): ?>
                                <h3 class="h3 yt-panel__title"><?php echo esc_html($it['title']); ?></h3>
                            <?php endif; ?>
                            <?php if(!empty($it['text'])): ?>
                                <p class="yt-panel__text"><?php echo esc_html($it['text']); ?></p>
                            <?php endif; ?>
                        </div>
                    </article>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <script>
        (function(){
          const root = document.currentScript.closest('.elementor-widget');
          const wrap = root.querySelector('.yt');
          if(!wrap) return;
          const tabs = [...wrap.querySelectorAll('.yt-nav__btn')];
          const panels = [...wrap.querySelectorAll('.yt-panel')];

          function activate(i){
            tabs.forEach((b,idx)=>{
              b.classList.toggle('is-active', idx===i);
              b.setAttribute('aria-selected', idx===i ? 'true' : 'false');
            });
            panels.forEach((p,idx)=>{
              p.classList.toggle('is-active', idx===i);
            });
          }

          tabs.forEach((btn, idx)=>{
            btn.addEventListener('click', ()=> activate(idx));
            btn.addEventListener('keydown', (e)=>{
              if(e.key==='ArrowUp' || e.key==='ArrowLeft'){ e.preventDefault(); activate(Math.max(0, idx-1)); tabs[Math.max(0, idx-1)].focus(); }
              if(e.key==='ArrowDown' || e.key==='ArrowRight'){ e.preventDefault(); activate(Math.min(tabs.length-1, idx+1)); tabs[Math.min(tabs.length-1, idx+1)].focus(); }
            });
          });

          // hash suportado: #year-2005 ativa automaticamente
          const hash = (location.hash||'').replace('#','');
          if(hash.startsWith('year-')){
            const y = hash.split('year-')[1];
            const idx = tabs.findIndex(b=>b.textContent.trim() === y);
            if(idx>=0) activate(idx);
          }
        })();
        </script>
        <?php
    }
}
