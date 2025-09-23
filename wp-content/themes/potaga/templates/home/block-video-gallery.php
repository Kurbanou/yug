<section class="video-gallery blick" id="video">
    <div class="container-w">
        <div class="section-title">
            <div class="section-title_icon">
                <svg width="25" height="24" viewBox="0 0 25 24">
                    <path d="M8.251 4.00391H16.251V6.00091H18.251V4.00391C18.7813 4.00417 19.2897 4.215 19.6646 4.59005C20.0394 4.96509 20.25 5.47365 20.25 6.00391V18.0039C20.25 18.5342 20.0394 19.0427 19.6646 19.4178C19.2897 19.7928 18.7813 20.0036 18.251 20.0039V18.0009H16.251V20.0039H8.251V18.0009H6.251V20.0039C5.72057 20.0039 5.21086 19.7932 4.83579 19.4181C4.46071 19.043 4.25 18.5343 4.25 18.0039V6.00391C4.25 5.47347 4.46071 4.96477 4.83579 4.58969C5.21086 4.21462 5.71957 4.00391 6.25 4.00391L6.251 6.00091H8.251V4.00391ZM10.25 15.0039L14.75 12.0039L10.25 9.00391V15.0039ZM18.251 16.0009V13.0009H16.251V16.0009H18.251ZM18.251 11.0009V8.00091H16.251V11.0009H18.251ZM8.251 16.0009V13.0009H6.251V16.0009H8.251ZM8.251 11.0009V8.00091H6.251V11.0009H8.251Z" />
                </svg>
            </div>
            видео
        </div>
        <h2><?php the_sub_field('video-title'); ?></h2>
        <div class="video-gallery__block">
            <?php
            $query = new WP_Query([
                'post_type' => 'video',
                'posts_per_page' => 999999
            ]);

            if ($query->have_posts()) :
                while ($query->have_posts()) : $query->the_post();
                    $title = get_the_title();
                    $video_url = get_field('ptg-video');
                    $thumbnail_url = get_field('ptg-video-thumbnail');
            ?>
                    <div class="video-gallery__block_item">
                        <?php if ($video_url): ?>
                            <a href="<?php echo esc_url($video_url); ?>"
                                class="video-card"
                                target="_blank"
                                rel="noopener"
                                style="background-image:  linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)),url('<?php echo esc_url($thumbnail_url); ?>');">
                            </a>
                        <?php endif; ?>
                        <div class="video-card__title"><?php echo esc_html($title); ?></div>

                        <svg class="video-card__icon" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                            viewBox="0 0 71 71" style="enable-background:new 0 0 71 71;" xml:space="preserve">

                            <path class="st0" d="M35.5,3.5c-17.7,0-32,14.3-32,32c0,17.7,14.3,32,32,32s32-14.3,32-32C67.5,17.8,53.2,3.5,35.5,3.5z M29,47V24
                            l19,11.5L29,47z" />
                        </svg>

                    </div>
            <?php
                endwhile;
            else :
                echo '<p>Видео не найдены.</p>';
            endif;

            wp_reset_postdata();
            ?>

        </div>
        <a href="/video" class="button section-button">Все видео</a>
    </div>
</section>