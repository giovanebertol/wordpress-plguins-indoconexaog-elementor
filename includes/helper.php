<?php 
namespace ConexaogElementor\Helper;

// BDT Position
function element_pack_position() {
    $position_options = [
        ''              => esc_html__('Default', 'conexaog-elementor'),
        'top-left'      => esc_html__('Top Left', 'conexaog-elementor') ,
        'top-center'    => esc_html__('Top Center', 'conexaog-elementor') ,
        'top-right'     => esc_html__('Top Right', 'conexaog-elementor') ,
        'center'        => esc_html__('Center', 'conexaog-elementor') ,
        'center-left'   => esc_html__('Center Left', 'conexaog-elementor') ,
        'center-right'  => esc_html__('Center Right', 'conexaog-elementor') ,
        'bottom-left'   => esc_html__('Bottom Left', 'conexaog-elementor') ,
        'bottom-center' => esc_html__('Bottom Center', 'conexaog-elementor') ,
        'bottom-right'  => esc_html__('Bottom Right', 'conexaog-elementor') ,
    ];

    return $position_options;
}