<section class="services" id="services">
    <div class="container-fluid">
        <div class="services__title">
            <h1><?php the_sub_field('services-title'); ?></h1>
            <hr>
        </div>

        <div class="services__content">

            <?php //ptg_multisite_content(1, 'service', 4, 'service'); ?>

            <?php $query = new WP_Query([
                'post_type' => 'service',
                'posts_per_page' => 4
            ]); ?>

            <?php while($query->have_posts()) : $query->the_post(); ?>

            <?php get_template_part('templates/content', 'service'); ?>

            <?php
                endwhile;
                wp_reset_postdata();
            ?>

        </div>
    </div>
</section>