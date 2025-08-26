<?php

namespace Roots\Sage\Extras;

use Roots\Sage\Setup;

/**
 * Add <body> classes
 */
function body_class($classes) {
  // Add page slug if it doesn't exist
  if (is_single() || is_page() && !is_front_page()) {
    if (!in_array(basename(get_permalink()), $classes)) {
      $classes[] = basename(get_permalink());
    }
  }

  // Add class if sidebar is active
  if (Setup\display_sidebar()) {
    $classes[] = 'sidebar-primary';
  }

  return $classes;
}
// add_filter('body_class', __NAMESPACE__ . '\\body_class');

/**
 * Clean up the_excerpt()
 */
function excerpt_more() {
  return ' &hellip; <a href="' . get_permalink() . '">' . __('Continued', 'sage') . '</a>';
}
// add_filter('excerpt_more', __NAMESPACE__ . '\\excerpt_more');

/**
 * Ajax пагинация записей
 */
function ptg_load_more(){
  $args = unserialize(stripslashes($_POST['query']));
  $args['paged'] = $_POST['page'] + 1; // следующая страница
  $args['post_status'] = 'publish';

  $query = new \WP_Query($args);
  if( $query->have_posts() ):
    while($query->have_posts()): $query->the_post();

      get_template_part('templates/content', $args['post_type'] );

    endwhile;
  endif;
  wp_reset_postdata();
  die();
}

// add_action('wp_ajax_loadmore', __NAMESPACE__ . '\\ptg_load_more');
// add_action('wp_ajax_nopriv_loadmore', __NAMESPACE__ . '\\ptg_load_more');

/**
 * Изменение вывода галереи через шоткод
 * Смотреть функцию gallery_shortcode в http://wp-kama.ru/code?file_path=/wp-includes/media.php
 * $output = apply_filters( 'post_gallery', '', $attr );
 */

function ptg_gallery_output($output, $attr)
{
  $ids_arr = explode(',', $attr['ids']);
  $ids_arr = array_map('trim', $ids_arr);

  $pictures = get_posts(array(
      'posts_per_page' => -1,
      'post__in' => $ids_arr,
      'post_type' => 'attachment',
      'orderby' => 'post__in',
  ));
//  var_dump($pictures);

  if (!$pictures) return 'Запрос вернул пустой результат.';

  // Вывод
  $out = '<div class="carousel carousel--slider">';

  // Выводим каждую картинку из галереи
  foreach ($pictures as $pic) {
//    $src = $pic->guid;
    $id = $pic->ID;
    $src = wp_get_attachment_image_src($id, 'ptg-carousel')[0];
    $src_full = wp_get_attachment_image_src($id, 'full')[0];
    $t = esc_attr($pic->post_title);
    $title = ($t && false === strpos($src, $t)) ? $t : '';

    $caption = ($pic->post_excerpt != '' ? $pic->post_excerpt : $title);

    $out .= '<figure class="carousel__image">
        <a href="' . $src_full . '"><img src="' . $src . '" alt="' . $title . '" /></a>' .
        ($caption ? "<figcaption class='carousel__caption'>$caption</figcaption>" : '') .
        '</figure>';
  }

  $out .= '</div>';

  return $out;
}

// add_filter('post_gallery', __NAMESPACE__ . '\\ptg_gallery_output', 10, 2);

/**
 * Отключаем Emoji
 */
// Почему то отключается поддержка зображений галереи tinymce
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
//remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
//remove_action( 'admin_print_styles', 'print_emoji_styles' );
remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
//
//function ptg_disable_wp_emojis_in_tinymce( $plugins ) {
//  if ( is_array( $plugins ) ) {
//    return array_diff( $plugins, array( 'wpemoji' ) );
//  } else {
//    return array();
//  }
//}
//
//add_filter( 'tiny_mce_plugins', 'ptg_disable_wp_emojis_in_tinymce' );

/**
 * Удаляем мусор из head
 */
remove_action( 'wp_head', 'feed_links', 2 ); // Удаляет ссылки RSS-лент записи и комментариев
remove_action( 'wp_head', 'feed_links_extra', 3 ); // Удаляет ссылки RSS-лент категорий и архивов

remove_action( 'wp_head', 'rsd_link' ); // Удаляет RSD ссылку для удаленной публикации
remove_action( 'wp_head', 'wlwmanifest_link' ); // Удаляет ссылку Windows для Live Writer

remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0); // Удаляет короткую ссылку
remove_action( 'wp_head', 'wp_generator' ); // Удаляет информацию о версии WordPress
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 ); // Удаляет ссылки на предыдущую и следующую статьи

//remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );
//remove_action( 'wp_head', 'wp_oembed_add_host_js' );

/**
 * Поддержка svg
 */
add_filter('upload_mimes', __NAMESPACE__. '\\ptg_svg_support');

function ptg_svg_support($param) {
  $param['svg'] = 'image/svg+xml';
  return $param;
}

/**
 * Отключить wp-embed
 */
function ptg_deregister_scripts(){
  wp_deregister_script( 'wp-embed' );
}
add_action( 'wp_footer', __NAMESPACE__. '\\ptg_deregister_scripts' );
