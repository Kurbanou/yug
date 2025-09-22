<article class="page__body">
    <?php
    $header_image = get_field( 'ptg-service-header' );
    ?>
    <header class="page__header page__header--service" data-parallax="scroll"
            data-image-src="<?php echo $header_image['url']; ?>"
            data-natural-width="<?php echo $header_image['width']; ?>"
            data-natural-height="<?php echo $header_image['height']; ?>">
        <div class="container-fluid">
            <div class="row">
                <div class="page__thumbnail">
                    <img src="<?php the_field( 'potinni-service-image' ); ?>" alt="">
                </div>
                <div class="page__description">
                    <h2><?php the_title(); ?></h2>
                    <?php the_field( 'potinni-service-description' ); ?>
                </div>
            </div>
        </div>
    </header>

    <div class="page__content">
        <?php
        if ( have_rows( 'ptg-builder' ) ):
            while ( have_rows( 'ptg-builder' ) ) : the_row();
                include( TEMPLATEPATH . '/templates/builder.php' );
            endwhile;
        endif;
        ?>
    </div>
</article>

<?php //get_template_part('templates/component', 'breadcrumbs'); ?>
<?php get_template_part( 'templates/block', 'order' ); ?>