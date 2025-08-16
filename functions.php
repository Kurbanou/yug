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


/**
 * "Хлебные крошки" для WordPress
 * автор: Dimox
 * версия: 2015.09.14
 * лицензия: MIT
 */
function ptg_breadcrumbs() {

    /* === ОПЦИИ === */
    $text['home']     = 'Главная'; // текст ссылки "Главная"
    $text['category'] = 'Архив рубрики "%s"'; // текст для страницы рубрики
    $text['search']   = 'Результаты поиска по запросу "%s"'; // текст для страницы с результатами поиска
    $text['tag']      = 'Записи с тегом "%s"'; // текст для страницы тега
    $text['author']   = 'Статьи автора %s'; // текст для страницы автора
    $text['404']      = 'Ошибка 404'; // текст для страницы 404
    $text['page']     = 'Страница %s'; // текст 'Страница N'
    $text['cpage']    = 'Страница комментариев %s'; // текст 'Страница комментариев N'

    $wrap_before    = '<div class="breadcrumbs"><ol class="breadcrumbs__body">'; // открывающий тег обертки
    $wrap_after     = '</ol></div><!-- .breadcrumbs -->'; // закрывающий тег обертки
    $sep            = ' › '; // разделитель между "крошками"
    $sep_before     = '<span class="breadcrumbs__separator">'; // тег перед разделителем
    $sep_after      = '</span>'; // тег после разделителя
    $show_home_link = 1; // 1 - показывать ссылку "Главная", 0 - не показывать
    $show_on_home   = 0; // 1 - показывать "хлебные крошки" на главной странице, 0 - не показывать
    $show_current   = 1; // 1 - показывать название текущей страницы, 0 - не показывать
    $before         = '<li class="active">'; // тег перед текущей "крошкой"
    $after          = '</li>'; // тег после текущей "крошки"
    /* === КОНЕЦ ОПЦИЙ === */

    global $post;
    $home_link      = home_url( '/' );
    $link_before    = '<li><span itemscope itemtype="http://data-vocabulary.org/Breadcrumb">';
    $link_after     = '</span></li>';
    $link_attr      = ' itemprop="url"';
    $link_in_before = '<span itemprop="title">';
    $link_in_after  = '</span>';
    $link           = $link_before . '<a href="%1$s"' . $link_attr . '>' . $link_in_before . '%2$s' . $link_in_after . '</a>' . $link_after;
    $frontpage_id   = get_option( 'page_on_front' );
    $parent_id      = $post->post_parent;
    $sep            = ' ' . $sep_before . $sep . $sep_after . ' ';

    if ( is_home() || is_front_page() ) {

        if ( $show_on_home ) {
            echo $wrap_before . '<a href="' . $home_link . '">' . $text['home'] . '</a>' . $wrap_after;
        }

    } else {

        echo $wrap_before;
        if ( $show_home_link ) {
            echo sprintf( $link, $home_link, $text['home'] );
        }

        if ( is_category() ) {
            $cat = get_category( get_query_var( 'cat' ), false );
            if ( $cat->parent != 0 ) {
                $cats = get_category_parents( $cat->parent, true, $sep );
                $cats = preg_replace( "#^(.+)$sep$#", "$1", $cats );
                $cats = preg_replace( '#<a([^>]+)>([^<]+)<\/a>#', $link_before . '<a$1' . $link_attr . '>' . $link_in_before . '$2' . $link_in_after . '</a>' . $link_after, $cats );
                if ( $show_home_link ) {
                    echo $sep;
                }
                echo $cats;
            }
            if ( get_query_var( 'paged' ) ) {
                $cat = $cat->cat_ID;
                echo $sep . sprintf( $link, get_category_link( $cat ), get_cat_name( $cat ) ) . $sep . $before . sprintf( $text['page'], get_query_var( 'paged' ) ) . $after;
            } else {
                if ( $show_current ) {
                    echo $sep . $before . sprintf( $text['category'], single_cat_title( '', false ) ) . $after;
                }
            }

        } elseif ( is_search() ) {
            if ( have_posts() ) {
                if ( $show_home_link && $show_current ) {
                    echo $sep;
                }
                if ( $show_current ) {
                    echo $before . sprintf( $text['search'], get_search_query() ) . $after;
                }
            } else {
                if ( $show_home_link ) {
                    echo $sep;
                }
                echo $before . sprintf( $text['search'], get_search_query() ) . $after;
            }

        } elseif ( is_day() ) {
            if ( $show_home_link ) {
                echo $sep;
            }
            echo sprintf( $link, get_year_link( get_the_time( 'Y' ) ), get_the_time( 'Y' ) ) . $sep;
            echo sprintf( $link, get_month_link( get_the_time( 'Y' ), get_the_time( 'm' ) ), get_the_time( 'F' ) );
            if ( $show_current ) {
                echo $sep . $before . get_the_time( 'd' ) . $after;
            }

        } elseif ( is_month() ) {
            if ( $show_home_link ) {
                echo $sep;
            }
            echo sprintf( $link, get_year_link( get_the_time( 'Y' ) ), get_the_time( 'Y' ) );
            if ( $show_current ) {
                echo $sep . $before . get_the_time( 'F' ) . $after;
            }

        } elseif ( is_year() ) {
            if ( $show_home_link && $show_current ) {
                echo $sep;
            }
            if ( $show_current ) {
                echo $before . get_the_time( 'Y' ) . $after;
            }

        } elseif ( is_single() && ! is_attachment() ) {
            if ( $show_home_link ) {
                echo $sep;
            }
            if ( get_post_type() != 'post' ) {
                $post_type = get_post_type_object( get_post_type() );
                $slug      = $post_type->rewrite;
                printf( $link, $home_link . '/' . $slug['slug'] . '/', $post_type->labels->singular_name );
                if ( $show_current ) {
                    echo $sep . $before . get_the_title() . $after;
                }
            } else {
                $cat  = get_the_category();
                $cat  = $cat[0];
                $cats = get_category_parents( $cat, true, $sep );
                if ( ! $show_current || get_query_var( 'cpage' ) ) {
                    $cats = preg_replace( "#^(.+)$sep$#", "$1", $cats );
                }
                $cats = preg_replace( '#<a([^>]+)>([^<]+)<\/a>#', $link_before . '<a$1' . $link_attr . '>' . $link_in_before . '$2' . $link_in_after . '</a>' . $link_after, $cats );
                echo $cats;
                if ( get_query_var( 'cpage' ) ) {
                    echo $sep . sprintf( $link, get_permalink(), get_the_title() ) . $sep . $before . sprintf( $text['cpage'], get_query_var( 'cpage' ) ) . $after;
                } else {
                    if ( $show_current ) {
                        echo $before . get_the_title() . $after;
                    }
                }
            }

            // custom post type
        } elseif ( ! is_single() && ! is_page() && get_post_type() != 'post' && ! is_404() ) {
            $post_type = get_post_type_object( get_post_type() );
            if ( get_query_var( 'paged' ) ) {
                echo $sep . sprintf( $link, get_post_type_archive_link( $post_type->name ), $post_type->label ) . $sep . $before . sprintf( $text['page'], get_query_var( 'paged' ) ) . $after;
            } else {
                if ( $show_current ) {
                    echo $sep . $before . $post_type->label . $after;
                }
            }

        } elseif ( is_attachment() ) {
            if ( $show_home_link ) {
                echo $sep;
            }
            $parent = get_post( $parent_id );
            $cat    = get_the_category( $parent->ID );
            $cat    = $cat[0];
            if ( $cat ) {
                $cats = get_category_parents( $cat, true, $sep );
                $cats = preg_replace( '#<a([^>]+)>([^<]+)<\/a>#', $link_before . '<a$1' . $link_attr . '>' . $link_in_before . '$2' . $link_in_after . '</a>' . $link_after, $cats );
                echo $cats;
            }
            printf( $link, get_permalink( $parent ), $parent->post_title );
            if ( $show_current ) {
                echo $sep . $before . get_the_title() . $after;
            }

        } elseif ( is_page() && ! $parent_id ) {
            if ( $show_current ) {
                echo $sep . $before . get_the_title() . $after;
            }

        } elseif ( is_page() && $parent_id ) {
            if ( $show_home_link ) {
                echo $sep;
            }
            if ( $parent_id != $frontpage_id ) {
                $breadcrumbs = array();
                while ( $parent_id ) {
                    $page = get_page( $parent_id );
                    if ( $parent_id != $frontpage_id ) {
                        $breadcrumbs[] = sprintf( $link, get_permalink( $page->ID ), get_the_title( $page->ID ) );
                    }
                    $parent_id = $page->post_parent;
                }
                $breadcrumbs = array_reverse( $breadcrumbs );
                for ( $i = 0; $i < count( $breadcrumbs ); $i ++ ) {
                    echo $breadcrumbs[ $i ];
                    if ( $i != count( $breadcrumbs ) - 1 ) {
                        echo $sep;
                    }
                }
            }
            if ( $show_current ) {
                echo $sep . $before . get_the_title() . $after;
            }

        } elseif ( is_tag() ) {
            if ( get_query_var( 'paged' ) ) {
                $tag_id = get_queried_object_id();
                $tag    = get_tag( $tag_id );
                echo $sep . sprintf( $link, get_tag_link( $tag_id ), $tag->name ) . $sep . $before . sprintf( $text['page'], get_query_var( 'paged' ) ) . $after;
            } else {
                if ( $show_current ) {
                    echo $sep . $before . sprintf( $text['tag'], single_tag_title( '', false ) ) . $after;
                }
            }

        } elseif ( is_author() ) {
            global $author;
            $author = get_userdata( $author );
            if ( get_query_var( 'paged' ) ) {
                if ( $show_home_link ) {
                    echo $sep;
                }
                echo sprintf( $link, get_author_posts_url( $author->ID ), $author->display_name ) . $sep . $before . sprintf( $text['page'], get_query_var( 'paged' ) ) . $after;
            } else {
                if ( $show_home_link && $show_current ) {
                    echo $sep;
                }
                if ( $show_current ) {
                    echo $before . sprintf( $text['author'], $author->display_name ) . $after;
                }
            }

        } elseif ( is_404() ) {
            if ( $show_home_link && $show_current ) {
                echo $sep;
            }
            if ( $show_current ) {
                echo $before . $text['404'] . $after;
            }

        } elseif ( has_post_format() && ! is_singular() ) {
            if ( $show_home_link ) {
                echo $sep;
            }
            echo get_post_format_string( get_post_format() );
        }

        echo $wrap_after;

    }
} // end of ptg_breadcrumbs()

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