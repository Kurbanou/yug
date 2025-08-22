<section class="articles" id="articles">
  <div class="container">
    <div class="articles__title">
      <div class="section-title">
        <div class="section-title_icon">
          <svg width="25" height="24" viewBox="0 0 25 24">
            <path
              d="M13.4105 2.41976C12.6655 2.1218 11.8345 2.1218 11.0895 2.41976L8.4445 3.47776L17.8135 7.23026L21.4855 5.76126C21.3138 5.61898 21.121 5.50427 20.914 5.42126L13.4105 2.41976ZM16.1315 7.90326L6.762 4.15076L3.586 5.42076C3.375 5.50576 3.183 5.62076 3.0145 5.76126L12.25 9.45576L16.1315 7.90326ZM2.25 7.39376C2.25 7.20076 2.276 7.01176 2.3255 6.83176L11.625 10.5518V21.7473C11.4419 21.7107 11.2626 21.6571 11.0895 21.5873L3.586 18.5853C3.1918 18.4276 2.85385 18.1555 2.61573 17.804C2.3776 17.4526 2.25022 17.0378 2.25 16.6133V7.39376ZM13.4105 21.5868C13.2358 21.6568 13.0573 21.7103 12.875 21.7473V10.5518L22.1745 6.83176C22.224 7.01226 22.25 7.20126 22.25 7.39426V16.6133C22.2499 17.0379 22.1225 17.4528 21.8844 17.8043C21.6463 18.1559 21.3083 18.4281 20.914 18.5858L13.4105 21.5868Z"
            />
          </svg>
        </div>
        наш блог
      </div>
      <h2>
        <?php the_sub_field( 'articles-title' ); ?>
      </h2>
    </div>

    <div class="articles_content">
      <?php
                $query = new WP_Query([
                    'post_type'      =>
      'post', 'posts_per_page' => 2, 'orderby' => 'date', 'order' => 'DESC' ]);
      ?>

      <?php while ($query->have_posts()) : $query->the_post(); ?>
        <article class="article-card">
            <?php
                    // Изображение записи
                    if (has_post_thumbnail()) :
                        $img_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
                        $img_alt = get_the_title();
                    ?>
            <div class="article-card__image">
            <img
                src="<?php echo esc_url($img_url); ?>"
                alt="<?php echo esc_attr($img_alt); ?>"
                loading="lazy"
            />
            </div>
            <?php endif; ?>

            <div class="article-card__content">
                <div class="article-card__title"><?php the_title(); ?></div>

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
                    <span class="tag">История</span>
                    <span class="tag">Рекомендации</span>
                </div>
                <?php endif; ?>

                <?php
                // Первый абзац.
                $content = apply_filters('the_content', get_the_content());
                preg_match('/<p>(.*?)<\/p>/', $content, $matches);
                $first_paragraph = isset($matches[1]) ? $matches[1] : ''; ?>

                <?php if ($first_paragraph) : ?>
                <p class="article-card__excerpt">
                    <?php echo esc_html($first_paragraph); ?>
                </p>
                <?php endif; ?>

                
            </div>
            <a href="<?php the_permalink(); ?>" class="article-card__link">
                <div class="article__more">
                    Подробнее
                    <div class="icon">
                        <svg width="12" height="11" viewBox="0 0 12 11">
                            <path
                                fill-rule="evenodd"
                                clip-rule="evenodd"
                                d="M2.00763 10.6565L9.19934 3.46477L9.19934 8.12173L11.1992 8.12173L11.1992 0.0507736L3.12852 0.0511051L3.12852 2.05091L7.78505 2.05061L0.59341 9.24226L2.00763 10.6565Z"
                            />
                        </svg>
                    </div>
                </div>
            </a>
        </article>
      <?php endwhile; ?>
      <?php wp_reset_postdata(); ?>
    </div>
  </div>
   <div class="container">
        <button class="section-button" onclick="location.href='/articles'">Все статьи</button>        
    </div>
</section>
