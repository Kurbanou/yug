<section class="singl-post">
        <?php
        $bg_url = get_field('potinni-post-header');
        $style = $bg_url ? ' style="background-image: url(' . esc_url($bg_url) . ');"' : '';
        ?>

        <div class="singl-post__top"<?php echo $style; ?>>


        <div class="singl-post__top_content">
            <div class="singl-post__top_content_meta">
                <?php
                // Дата в формате "9 октября, 2024 год"
                $date = get_the_date('j F, Y');
                $date = str_replace(
                    ['January','February','March','April','May','June','July','August','September','October','November','December'],
                    ['января','февраля','марта','апреля','мая','июня','июля','августа','сентября','октября','ноября','декабря'],
                    $date
                );
                ?>
                <div class="article-card__date">
                    <?php echo esc_html($date); ?>
                    год
                </div>
                <?php
                // Метки: История, Рекомендации и т.д.                    
                $tags = get_the_tags();
                if ($tags) :
                ?>
                <div class="article-card__tags">
                    <?php foreach ($tags as $tag) : ?>
                    <span class="tag"><?php echo esc_html($tag->name); ?></span>
                    <?php endforeach; ?>
                </div>
                <?php else : ?>
                <div class="article-card__tags">                    
                    <span class="tag-first">статья</span>
                    <span class="tag">История</span>
                    <span class="tag">Рекомендации</span>
                </div>
                <?php endif; ?>
                <div class="article-card__title"><?php the_title(); ?></div>

            </div>
            <div class="singl-post__top_content_autor">
            <div class="foto__autor">
                <?php
                $author_id = get_the_author_meta('ID');
                $avatar = get_field('profile_image', 'user_' . $author_id);
                $fio = get_field('full_name', 'user_' . $author_id);
                $position = get_field('position', 'user_' . $author_id);

                if ($avatar) {
                echo '<img src="' . esc_url($avatar['url']) . '" alt="Фото автора" style="width:80px; border-radius:50%;">';
                } else {
                echo get_avatar($author_id, 80); // fallback на Gravatar
                }
                ?>
            </div>
            <div class="data__autor">
                <span>Автор статьи:</span>
                <span><?php echo esc_html($fio); ?></span>
                <span><?php echo esc_html($position); ?></span>
            </div>
            </div>
        </div>
        
    </div>



    <div class="container">  
        <div class="page__post2">
            <?php the_content(); ?>
            
        </div>
        <?php 
            if (have_rows('accordion_blocks')) {
                while (have_rows('accordion_blocks')) {
                    the_row();
                    $title = get_sub_field('title');
                    $content = get_sub_field('content');
                 echo '<details class="accordion">';
                    echo '<summary class="accordion-title">' . esc_html($title) . '</summary>';
                    echo '<div class="accordion-content">' . $content . '</div>';
                    echo '</details>';
                }
            }
        ?>  
        
 
    </div>
    
</section>
<?php get_template_part('templates/block-services'); ?>
<?php get_template_part('templates/block-connect'); ?>

