<?php
class Unsplash_API {
  private $client_id;

  public function __construct($client_id) {
      $this->client_id = $client_id;
  }

  public function get_photos($keyword, $count, $orientation) {
      // Если текущий пользователь администратор, просто делаем запрос к API без кэширования
      if (is_admin()) {
          return $this->make_api_request($keyword, $count, $orientation);
      }

      // Формируем URL запроса к API Unsplash
      $url = 'https://api.unsplash.com/photos/random?client_id=' . $this->client_id . '&count=' . $count . '&query=' . urlencode($keyword) . '&orientation=' . $orientation;

      // Получаем данные через кэширование WordPress
      $cache_key = 'unsplash_' . md5($url);
      $photos = get_transient($cache_key);

      // Если данных нет в кэше, делаем запрос к API и кэшируем результат
      if (empty($photos)) {
          $photos = $this->make_api_request($keyword, $count, $orientation);
          set_transient($cache_key, $photos, HOUR_IN_SECONDS);
      }

      return $photos;
  }

  private function make_api_request($keyword, $count, $orientation) {
      $url = 'https://api.unsplash.com/photos/random?client_id=' . $this->client_id . '&count=' . $count . '&query=' . urlencode($keyword) . '&orientation=' . $orientation;
      $response = wp_remote_get($url);
      if (!is_wp_error($response)) {
          $body = wp_remote_retrieve_body($response);
          return json_decode($body);
      }
      return array();
  }
}

?>
