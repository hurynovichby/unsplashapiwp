<?php
function register_custom_block() {
    acf_register_block_type(array(
        'name'              => 'unsplash-slider-block',
        'title'             => __('Unsplash Slider Block'),
        'description'       => __('Блок Gutenberg для отображения изображений из Unsplash в слайдере.'),
        'render_template'   => 'template-parts/block-unsplash-slider.php',
        'category'          => 'widgets',
        'icon'              => 'images-alt2',
        'keywords'          => array( 'unsplash', 'slider', 'acf' ),
    ));
}
add_action('acf/init', 'register_custom_block');
