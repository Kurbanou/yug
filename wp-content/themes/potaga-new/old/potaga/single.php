<div class="page__type">
    <div class="container-fluid">
        <h1>Статьи</h1>
    </div>
</div>

<article class="page__body">
    <header class="page__header" data-parallax="scroll" data-image-src="<?php the_field( 'potinni-post-header' ); ?>"
            data-natural-width="1980" data-natural-height="792">
        <div class="page__title">
            <h1><?php the_title(); ?></h1>
        </div>
    </header>
    <div class="page__content">
        <div class="page__post">
            <?php the_content(); ?>
        </div>
    </div>
    <footer class="page__footer">
        <div class="page__meta">
            <time class="updated" datetime="<?= get_post_time( 'c', true ); ?>"><?= get_the_date(); ?></time>
        </div>
        <?php wp_link_pages( [
            'before' => '<nav class="page-nav"><p>' . __( 'Pages:', 'sage' ),
            'after'  => '</p></nav>'
        ] ); ?>
        <hr>
        <a class="button button--rounded button--orange button--left" href="/articles">Все статьи</a>
    </footer>
</article>

<?php //get_template_part('templates/component', 'breadcrumbs'); ?>
<?php get_template_part( 'templates/block', 'order' ); ?>
