<section class="partners">
    <div class="container-fluid">
        <div class="partners__title">
            <h1><?php the_sub_field('partners-title'); ?></h1>
            <hr>
        </div>

        <?php
            $images = get_sub_field('partners-images');
            if ($images) :
        ?>

        <div class="carousel carousel--partners">

        <?php foreach ($images as $image) : ?>
            <div class="item">
                <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
            </div>
        <?php endforeach; ?>

        </div>

        <?php endif; ?>

    </div>
</section>