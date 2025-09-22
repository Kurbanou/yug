<section class="text <?php if (get_sub_field('border-bottom-boolean')) { echo 'text--underlined';} ?>">
  <div class="text__container">
    <div class="text__body">
      <div class="text__row">
        <?php if (get_sub_field('text-title-boolean')) : ?>

          <div class="text__title">
            <h2><?php the_sub_field('text-title'); ?></h2>
            <hr>
          </div>

        <?php endif; ?>

        <?php if (get_sub_field('text-columns') == 'one') : ?>

          <div class="text__content">
            <?php the_sub_field('text-content'); ?>
          </div>

        <?php elseif (get_sub_field('text-columns') == 'two') : ?>

          <div class="text__content text__content--left">
            <?php the_sub_field('text-content-left'); ?>
          </div>

          <div class="text__content text__content--right">
            <?php the_sub_field('text-content-right'); ?>
          </div>

        <?php endif; ?>
      </div>

    </div>

  </div>
</section>