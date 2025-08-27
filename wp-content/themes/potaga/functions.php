<?php
/**
 * Sage includes
 *
 * The $sage_includes array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 *
 * Please note that missing files will produce a fatal error.
 *
 * @link https://github.com/roots/sage/pull/1042
 */
$sage_includes = [
    'lib/assets.php',    // Scripts and stylesheets
    'lib/extras.php',    // Custom functions
    'lib/setup.php',     // Theme setup
    'lib/titles.php',    // Page titles
    'lib/wrapper.php',   // Theme wrapper class
    'lib/customizer.php', // Theme customizer
    'lib/acf.php' // ACF export file
];

foreach ( $sage_includes as $file ) {
    if ( ! $filepath = locate_template( $file ) ) {
        trigger_error( sprintf( __( 'Error locating %s for inclusion', 'sage' ), $file ), E_USER_ERROR );
    }

    require_once $filepath;
}
unset( $file, $filepath );

function create_project_post_type() {

    $labels = array(
        'name'               => _x( 'Проекты', 'Post Type General Name', 'text_domain' ),
        'singular_name'      => _x( 'Проекты', 'Post Type Singular Name', 'text_domain' ),
        'menu_name'          => __( 'Проекты', 'text_domain' ),
        'name_admin_bar'     => __( 'Проект', 'text_domain' ),
        'parent_item_colon'  => __( 'Проект:', 'text_domain' ),
        'all_items'          => __( 'Все проекты', 'text_domain' ),
        'add_new_item'       => __( 'Добавить новый проект', 'text_domain' ),
        'add_new'            => __( 'Добавить новый', 'text_domain' ),
        'new_item'           => __( 'Новый проект', 'text_domain' ),
        'edit_item'          => __( 'Редактировать проект', 'text_domain' ),
        'update_item'        => __( 'Обновить проект', 'text_domain' ),
        'view_item'          => __( 'Посмотреть проект', 'text_domain' ),
        'search_items'       => __( 'Найти проект', 'text_domain' ),
        'not_found'          => __( 'Не найдено', 'text_domain' ),
        'not_found_in_trash' => __( 'Не найдино в Корзине', 'text_domain' ),
    );
    $args   = array(
        'label'               => __( 'Проект', 'text_domain' ),
        'description'         => __( 'Тип записи для проектов компании', 'text_domain' ),
        'labels'              => $labels,
        'supports'            => array(),
//'taxonomies'          => array( 'category', 'post_tag' ),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'menu_icon'           => 'dashicons-lightbulb',
        'menu_position'       => 5,
        'show_in_admin_bar'   => true,
        'show_in_nav_menus'   => true,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
    );
    register_post_type( 'project', $args );

}

add_action( 'init', 'create_project_post_type', 0 );

function create_service_post_type() {

    $labels = array(
        'name'               => _x( 'Услуги', 'Post Type General Name', 'text_domain' ),
        'singular_name'      => _x( 'Услуги', 'Post Type Singular Name', 'text_domain' ),
        'menu_name'          => __( 'Услуги', 'text_domain' ),
        'name_admin_bar'     => __( 'Услуга', 'text_domain' ),
        'parent_item_colon'  => __( 'Услуга:', 'text_domain' ),
        'all_items'          => __( 'Все услуги', 'text_domain' ),
        'add_new_item'       => __( 'Добавить новую услугу', 'text_domain' ),
        'add_new'            => __( 'Добавить новую', 'text_domain' ),
        'new_item'           => __( 'Новая услугу', 'text_domain' ),
        'edit_item'          => __( 'Редактировать услугу', 'text_domain' ),
        'update_item'        => __( 'Обновить услугу', 'text_domain' ),
        'view_item'          => __( 'Посмотреть услугу', 'text_domain' ),
        'search_items'       => __( 'Найти услугу', 'text_domain' ),
        'not_found'          => __( 'Не найдено', 'text_domain' ),
        'not_found_in_trash' => __( 'Не найдино в Корзине', 'text_domain' ),
    );
    $args   = array(
        'label'               => __( 'Услуга', 'text_domain' ),
        'description'         => __( 'Тип записи для услуг оказываемых компанией', 'text_domain' ),
        'labels'              => $labels,
        'supports'            => array(),
//'taxonomies'          => array( 'category', 'post_tag' ),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'menu_icon'           => 'dashicons-awards',
        'menu_position'       => 5,
        'show_in_admin_bar'   => true,
        'show_in_nav_menus'   => true,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
    );
    register_post_type( 'service', $args );

}

add_action( 'init', 'create_service_post_type', 0 );

function create_video_post_type() {

    $labels = array(
        'name'               => _x( 'Видео', 'Post Type General Name', 'text_domain' ),
        'singular_name'      => _x( 'Видео', 'Post Type Singular Name', 'text_domain' ),
        'menu_name'          => __( 'Видео', 'text_domain' ),
        'name_admin_bar'     => __( 'Видео', 'text_domain' ),
        'parent_item_colon'  => __( 'Видео:', 'text_domain' ),
        'all_items'          => __( 'Все видео', 'text_domain' ),
        'add_new_item'       => __( 'Добавить новое видео', 'text_domain' ),
        'add_new'            => __( 'Добавить новое', 'text_domain' ),
        'new_item'           => __( 'Новое видео', 'text_domain' ),
        'edit_item'          => __( 'Редактировать видео', 'text_domain' ),
        'update_item'        => __( 'Обновить видео', 'text_domain' ),
        'view_item'          => __( 'Посмотреть видео', 'text_domain' ),
        'search_items'       => __( 'Найти видео', 'text_domain' ),
        'not_found'          => __( 'Не найдено', 'text_domain' ),
        'not_found_in_trash' => __( 'Не найдино в Корзине', 'text_domain' ),
    );
    $args   = array(
        'label'               => __( 'Видео', 'text_domain' ),
        'description'         => __( 'Тип записи для видео', 'text_domain' ),
        'labels'              => $labels,
        'supports'            => array(),
//'taxonomies'          => array( 'category', 'post_tag' ),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'menu_icon'           => 'dashicons-video-alt3',
        'menu_position'       => 5,
        'show_in_admin_bar'   => true,
        'show_in_nav_menus'   => true,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
    );
    register_post_type( 'video', $args );

}

add_action( 'init', 'create_video_post_type', 0 );



/*
 * Вывод одного контента на сеть сайтов
 */

function ptg_multisite_content($blog_id, $post_type, $per_page, $template_part) {
    if ( is_multisite() ) {
        switch_to_blog( absint($blog_id) );
    }

    $query = new WP_Query( [
        'post_type'      => $post_type,
        'posts_per_page' => $per_page
    ] );

    while ( $query->have_posts() ) : $query->the_post();

        get_template_part( 'templates/content', $template_part );

    endwhile;

    wp_reset_postdata();

    if ( is_multisite() ) {
        restore_current_blog();
    }
}

function my_acf_init() {
    acf_update_setting('google_api_key', 'AIzaSyAg2pFXWVXWWvodOWNTlnzXC60A6NTJYbc');
}

add_action('acf/init', 'my_acf_init');

if (!is_admin()) {
  add_filter('show_admin_bar', '__return_false');
}



function generate_toc($content) {
  $matches = [];
  preg_match_all('/<h([2-6])[^>]*>(.*?)<\/h\1>/', $content, $matches, PREG_SET_ORDER);

  if (!$matches) return $content;

  $toc = '<div class="post-toc"><div class="post-toc_title">Содержание</div><ul>';
  $prev_level = 2;
  $i = 0;

  foreach ($matches as $match) {
    $level = (int)$match[1];
    $title = strip_tags($match[2]);
    $anchor = 'toc-' . $i;

    // Вставляем якорь в заголовок
    $content = str_replace($match[0], '<h' . $level . ' id="' . $anchor . '">' . $match[2] . '</h' . $level . '>', $content);

    // Управляем вложенностью
    if ($level > $prev_level) {
      $toc .= str_repeat('<ul class="sub">', $level - $prev_level);
    } elseif ($level < $prev_level) {
      $toc .= str_repeat('</ul>', $prev_level - $level);
    }

    $toc .= '<li><a href="#' . $anchor . '">' . esc_html($title) . '</a></li>';
    $prev_level = $level;
    $i++;
  }

  // Закрываем оставшиеся списки
  $toc .= str_repeat('</ul>', $prev_level - 2);
  $toc .= '</ul></div>';

  return $toc . $content;
}

add_filter('the_content', 'generate_toc');
