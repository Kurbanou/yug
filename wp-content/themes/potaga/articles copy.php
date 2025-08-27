<?php
/**
 * Template Name: Articles Template
 */
?>

<?php get_template_part( 'templates/page', 'header' ); ?>

<?php if ( ! have_posts() ) : ?>
    <?php get_template_part( 'templates/content', '404' ); ?>
<?php endif; ?>

<?php
$query = new WP_Query( [
    'post_type'      => 'post',
    'posts_per_page' => 12
] );
?>

    <div class="page__content">
        <div class="container-fluid">
            <div class="row">
                <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                    <?php get_template_part( 'templates/content', get_post_type() != 'post' ? get_post_type() : get_post_format() ); ?>
                <?php endwhile; ?>
            </div>
        </div>
    </div>

<?php if ( $query->max_num_pages > 1 ) : ?>
    <div class="page__footer">
        <div class="container-fluid">
            <script>
                var ajaxurl = '<?php echo site_url(); ?>/wp-admin/admin-ajax.php',
                    posts = '<?php echo serialize( $query->query_vars ); ?>',
                    current_page = <?php echo ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1; ?>,
                    max_pages = <?php echo $query->max_num_pages; ?>;
            </script>
            <div id="more" class="button button--rounded button--orange button--more">Еще статьи</div>
        </div>
    </div>
<?php endif; ?>
<?php wp_reset_postdata(); ?>

<?php //get_template_part('templates/component', 'breadcrumbs'); ?>

<?php get_template_part( 'templates/block', 'order' ); ?>