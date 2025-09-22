<section class="photo-gallery" id="gallery">
    <div class="container-fluid">

        <?php if ( get_sub_field('gallery-title-boolean') ) : ?>
        <div class="photo-gallery__title">
            <h1><?php the_sub_field('gallery-title'); ?></h1>
            <hr>
        </div>
        <?php endif; ?>

        <div class="row">
            <?php
            $images = get_sub_field('gallery-images');
            if ($images) :
                ?>

                <div class="carousel carousel--gallery">

                    <?php foreach ($images as $image) : ?>
                      <a href="<?php echo $image['sizes']['large']; ?>">
                        <figure>
                            <img src="<?php echo $image['sizes']['ptg-slider']; ?>" alt="<?php echo $image['alt']; ?>">
                            <figcaption><?php echo $image['title']; ?></figcaption>
                        </figure>
                      </a>

                    <?php endforeach; ?>

                </div>

                <a href="/gallery" class="button button--rounded button--gray button--right">Все фото</a>

            <?php endif; ?>
        </div>
    </div>
</section>