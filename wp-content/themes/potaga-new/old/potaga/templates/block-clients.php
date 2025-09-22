<section class="clients" id="clients">
    <div class="container-fluid">
        <div class="clients__title">
            <h1><?php the_sub_field( 'clients-title' ); ?></h1>
            <hr>
        </div>

        <?php
        $images = get_sub_field( 'clients-images' );
        if ( $images ) :
            ?>

            <div class="carousel carousel--clients">

                <?php foreach ( $images as $image ) : ?>
                    <div class="item"><img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>"></div>
                <?php endforeach; ?>

            </div>

        <?php endif; ?>

    </div>
</section>