<?php get_template_part( 'templates/page', 'header' ); ?>

<?php if ( ! have_posts() ) : ?>
    <?php get_template_part( 'templates/content', '404' ); ?>
<?php endif; ?>

    <div class="page__content">
        <div class="container-fluid">

            <?php while ( have_posts() ) : the_post(); ?>
                <?php get_template_part( 'templates/content', get_post_type() != 'post' ? get_post_type() : get_post_format() ); ?>
            <?php endwhile; ?>

        </div>

    </div>

<?php wp_reset_postdata(); ?>

<?php //get_template_part('templates/component', 'breadcrumbs'); ?>

<?php get_template_part( 'templates/block', 'order' ); ?>

<?php //the_posts_navigation(); ?>