<article class="article">
  <header class="article__box">
    <?php the_post_thumbnail(); ?>
    <a class="article__link" href="<?php the_permalink(); ?>">
      <h2 class="article__title"><?php the_title(); ?></h2>
    </a>
  </header>
</article>