<div class="service">
  <a class="service__link" href="<?php the_permalink(); ?>">
    <div class="service__thumbnail">
      <object id="service-<?php echo $post->ID; ?>" type="image/svg+xml" data="<?php the_field('ptg-service-image'); ?>" type=""></object>
    </div>
    <div class="service__title">
      <h3><?php the_title(); ?></h3>
    </div>
  </a>

  <div class="service__description">
    <?php the_field('ptg-service-description'); ?>
  </div>
</div>