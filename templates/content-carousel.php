<?php

    $images = get_sub_field('carousel');

    if ($images) : ?>

    <div class="carousel carousel--partners">

        <?php foreach ($images as $image) : ?>
            <div class="item">
                <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
            </div>
        <?php endforeach; ?>

    </div>

<?php endif; ?>