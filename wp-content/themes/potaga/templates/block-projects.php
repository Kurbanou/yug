<section class="projects" id="projects">
    <div class="container-fluid">
        <div class="projects__title">
            <h1><?php the_sub_field('projects-title'); ?></h1>
            <hr>
        </div>

        <div class="projects__content">

            <?php //ptg_multisite_content(1, 'project', 4, 'project'); ?>

            <?php $query = new WP_Query([
                'post_type' => 'project',
                'posts_per_page' => 4
            ]); ?>

            <?php while($query->have_posts()) : $query->the_post(); ?>

                <?php get_template_part('templates/content', 'project'); ?>

            <?php
                endwhile;
                wp_reset_postdata();
            ?>

        </div>

        <a href="/project" class="button button--rounded button--orange button--right">Все проекты</a>
    </div>
</section>