<div class="page__type">
    <div class="container-fluid">
        <h1>Проекты</h1>
    </div>
</div>

<article class="page__body">
    <?php
    $header_image = get_field( 'potinni-project-header' );
    ?>
    <header class="page__header page__header--project" data-parallax="scroll"
            data-image-src="<?php echo $header_image['url']; ?>"
            data-natural-width="<?php echo $header_image['width']; ?>"
            data-natural-height="<?php echo $header_image['height']; ?>">
        <div class="page__title">
            <h1><?php the_title(); ?></h1>
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
    <footer class="page__footer">
        <?php wp_link_pages( [
            'before' => '<nav class="page-nav"><p>' . __( 'Pages:', 'sage' ),
            'after'  => '</p></nav>'
        ] ); ?>
        <hr>
        <a href="/project" class="button button--rounded button--orange button--left">Все проекты</a>
    </footer>
</article>

<?php //get_template_part('templates/component', 'breadcrumbs'); ?>
<?php get_template_part( 'templates/block', 'order' ); ?>