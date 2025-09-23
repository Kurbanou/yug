<section class="contacts" id="contacts">

    <div class="container-fluid">
        <div class="contacts__title">
            <h1><?php the_sub_field( 'contacts-title' ); ?></h1>
            <hr>
        </div>

        <div class="info">
            <a href="tel:<?php the_sub_field( 'contacts-phone' ); ?>" class="info__phone">
                <?php the_sub_field( 'contacts-phone' ); ?>
            </a>
            <a href="mailto:<?php the_sub_field( 'contacts-email' ); ?>" class="info__email">
                <?php the_sub_field( 'contacts-email' ); ?>
            </a>
            <a href="#" class="info__address">
                <?php the_sub_field( 'contacts-address' ); ?>
            </a>
        </div>
    </div>

    <?php

    $location = get_sub_field( 'contacts-map' );

    if ( ! empty( $location ) ): ?>
        <div class="map">
            <div class="marker" data-lat="<?php echo $location['lat']; ?>"
                 data-lng="<?php echo $location['lng']; ?>"></div>
        </div>
    <?php endif; ?>

</section>