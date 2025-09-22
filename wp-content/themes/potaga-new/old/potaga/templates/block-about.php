<section class="about" id="about">
    <div class="container-fluid">
        <h1 class="about__title"><?php the_sub_field( 'about-title' ); ?></h1>
        <hr>

        <div class="about__text">
            <?php the_sub_field( 'about-content' ); ?>
        </div>

        <div class="about__attention">
            <?php the_sub_field( 'about-attention' ); ?>
        </div>

    </div>
</section>