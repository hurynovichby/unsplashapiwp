<?php
// Подключаем файл с классом Unsplash_API
require_once(get_template_directory() . '/includes/unsplash-api.php');

// Получаем значения полей ACF
$title = get_field('block_title');
$description = get_field('block_description');
$keyword = get_field('search_keyword');
$image_count = get_field('image_count');
$orientation = get_field('orientation');

// Создаем экземпляр класса Unsplash_API
$client_id = '0WLCRBv_ZDhMYDgUvfRXomFgjzUacjlD80GYgSQMRD8'; // Замените на ваш ключ API
$unsplash_api = new Unsplash_API($client_id);

// Получаем фотографии с указанными параметрами
$photos = $unsplash_api->get_photos($keyword, $image_count, $orientation);
?>

<section class="block block--unsplash-slider">
  <div class="container">
    <div class="row">
      <div class="block__head">
        <h2 class="block__title"><?php echo esc_html($title); ?></h2>
        <p class="block__description"><?php echo esc_html($description); ?></p>
      </div>

      <div class="swiper swiper-container">
        <div class="swiper-wrapper">
          <?php foreach ($photos as $photo) : ?>
            <div class="swiper-slide">
              <img class="rounded" src="<?php echo esc_url($photo->urls->regular); ?>" alt="<?php echo esc_attr($photo->alt_description); ?>">
            </div>
          <?php endforeach; ?>
        </div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
      </div>
      <div class="swiper-pagination"></div>
    </div>
  </div>
</section>