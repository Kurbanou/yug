<section class="video-gallery" id="video">
    <div class="container-fluid">
        <div class="video-gallery__title">
            <h1><?php the_sub_field('video-title'); ?></h1>
            <hr>
        </div>

        <div class="video-gallery__content">

            <?php //ptg_multisite_content(1, 'video', 3, 'video'); ?>

            <?php $query = new WP_Query([
                'post_type' => 'video',
                'posts_per_page' => 3
            ]); ?>

            <?php while($query->have_posts()) : $query->the_post(); ?>

                <?php get_template_part('templates/content', 'video'); ?>

                <?php
            endwhile;
            wp_reset_postdata();
            ?>

        </div>
        <a href="/video" class="button button--rounded button--orange button--right">Все видео</a>
    </div>
</section>