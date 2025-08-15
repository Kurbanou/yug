<div class="spoiler">
    <div class="spoiler__body">
        <a class="spoiler__title" role="button" href="#" aria-expanded="true" aria-controls="collapseOne">
            <?php the_sub_field('spoiler-title'); ?>
        </a>


        <div class="spoiler__collapse collapse in" role="tabpanel" aria-labelledby="headingOne">

            <?php if(get_sub_field('spoiler-columns') == 'one') : ?>
                <div class="spoiler__content">
                    <?php the_sub_field('spoiler-content'); ?>
                </div>
            <?php elseif(get_sub_field('spoiler-columns') == 'two') : ?>
                <div class="spoiler__content spoiler__content--left">
                    <?php the_sub_field('spoiler-content-left'); ?>
                </div>
                <div class="spoiler__content spoiler__content--right">
                    <?php the_sub_field('spoiler-content-right'); ?>
                </div>
            <?php endif; ?>

        </div>
    </div>
</div>