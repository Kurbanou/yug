<section class="discover">
    <div class="discover__body">
        <div class="discover__image">
            <img src="<?php the_sub_field( 'discover-image' ); ?>" alt="<?php the_sub_field( 'discover-title' ); ?>">
        </div>
        <div class="discover__content">
            <h3 class="discover__title"><?php the_sub_field( 'discover-title' ); ?></h3>
            <a href="/order" class="button button--rounded button--orange">Узнать</a>
            <!--            <a href="#" class="button button--rounded button--orange" data-toggle="modal" data-target="#discover">Узнать</a>-->
        </div>
    </div>
</section>

<!--<div class="modal fade" id="discover" tabindex="-1" role="dialog">-->
<!--    <div class="modal__dialog" role="document">-->
<!--        <div class="modal__content">-->
<!--            <div class="modal__header">-->
<!--                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>-->
<!--                <h4 class="modal__title">Узнать</h4>-->
<!--            </div>-->
<!--            <div class="modal__body">-->
<!--                --><?php ////get_template_part('templates/content', 'form');
//                echo do_shortcode('[contact-form-7 id="570"]');
//                ?>
<!--            </div>-->
<!--            <div class="modal__footer">-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->