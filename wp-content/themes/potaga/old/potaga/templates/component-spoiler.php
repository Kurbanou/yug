<?php if (have_rows('spoiler-settings')) :
  while (have_rows('spoiler-settings')) : the_row(); ?>
    <div class="spoiler">
      <div class="container-fluid">

        <a class="spoiler__title" role="button" href="#" aria-expanded="true" aria-controls="collapseOne">
          <?php the_sub_field('spoiler-title', 'spoiler-settings'); ?>
        </a>

        <div class="spoiler__collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
          <?php if (get_sub_field('spoiler-columns') == 'one') : ?>
            <div class="spoiler__content typography">
              <?php the_sub_field('spoiler-content'); ?>
            </div>
          <?php elseif (get_sub_field('spoiler-columns') == 'two') : ?>
            <div class="spoiler__content--left typography">
              <?php the_sub_field('spoiler-content-left'); ?>
            </div>
            <div class="spoiler__content--right typography">
              <?php the_sub_field('spoiler-content-right'); ?>
            </div>
          <?php endif; ?>
        </div>

      </div>
    </div>
  <?php endwhile; ?>
<?php endif; ?>