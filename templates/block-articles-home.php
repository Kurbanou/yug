<section class="articles" id="articles">
    <div class="container-fluid">
        <div class="articles__title">
            <h1><?php the_sub_field( 'articles-title' ); ?></h1>
            <hr>
        </div>

        <div class="articles__content">

            <?php
                // Показываем один контент для сети сайтов
                //ptg_multisite_content(1, 'post', 3, 'content');
            ?>

            <?php $query = new WP_Query( [
                'post_type'      => 'post',
                'posts_per_page' => 3
            ] ); ?>

            <?php while ( $query->have_posts() ) : $query->the_post(); ?>

                <?php get_template_part( 'templates/content', 'content' ); ?>

                <?php
            endwhile;
            wp_reset_postdata();
            ?>

        </div>
        <a href="/articles" class="button button--right button--orange button--rounded">Все статьи</a>
    </div>
</section>