<section class="jumbotron" id="jumbotron">
    <div class="container">
        <div class="jumbotron__body">
            <h1 class="jumbotron__title"><?php the_sub_field( 'jumbotron-title' ); ?></h1>
            <?php the_sub_field( 'jumbotron-description' ); ?>
            <p><a class="button button--jumbotron button--rounded" target="_blank"
                  href="<?php the_sub_field( 'jumbotron-file' ); ?>" role="button">Презентация</a></p>
            <div class="jumbotron__badge"></div>
        </div>
    </div>
</section>