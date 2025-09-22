<section class="feedback">
    <div class="container-fluid">
        <?php if (get_sub_field('feedback-title-boolean')) : ?>
        <div class="feedback__title">
            <h2><?php the_sub_field('feedback-title'); ?></h2>
            <hr>
        </div>
        <?php endif; ?>
        <?php if (get_sub_field('feedback-subtitle-boolean')) : ?>
        <div class="feedback__subtitle">
            <h2><?php the_sub_field('feedback-subtitle'); ?></h2>
        </div>
        <?php endif; ?>

        <?php get_template_part('templates/content', 'form'); ?>
    </div>
</section>