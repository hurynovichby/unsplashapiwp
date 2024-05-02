<?php
function my_theme_enqueue_styles() {
    wp_enqueue_style( 'style', get_stylesheet_uri() );
}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );


function enqueue_swiper_scripts_styles() {
  // Подключаем стили из файла style.css
  wp_enqueue_style('custom-style', get_template_directory_uri() . '/assets/css/style.css', array(), null, 'all');


  // Подключаем стили Swiper
  wp_enqueue_style('swiper-style', 'https://unpkg.com/swiper/swiper-bundle.min.css');

  // Подключаем скрипты Swiper
  wp_enqueue_script('swiper-script', 'https://unpkg.com/swiper/swiper-bundle.min.js', array(), null, true);

  // Подключаем скрипт custom.js
  wp_enqueue_script('custom-script', get_template_directory_uri() . '/assets/js/custom.js', array('swiper-script'), null, true);
}
add_action('wp_enqueue_scripts', 'enqueue_swiper_scripts_styles');

function enqueue_bootstrap() {
  wp_enqueue_script('bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js', array('jquery'), '4.5.2', true);
  wp_enqueue_style('bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css', array(), '4.5.2', 'all');
}
add_action('wp_enqueue_scripts', 'enqueue_bootstrap');
