<?php
/**
 * Template Name: Gallery Template
 */
?>

<?php get_template_part( 'templates/page', 'header' ); ?>

<?php if ( ! have_posts() ) : ?>
    <?php get_template_part( 'templates/content', '404' ); ?>
<?php endif; ?>

    <div class="page__content">
        <div class="container-fluid">
            <div class="row">
                <?php
                // check if the flexible content field has rows of data
                if ( have_rows( 'ptg-builder', 44 ) ):

                    // loop through the rows of data
                    while ( have_rows( 'ptg-builder', 44 ) ) : the_row();
                        if ( get_row_layout() == 'ptg-gallery' ):

                            // Установим переменные пагинации
                            $gallery = get_sub_field( 'gallery-images' );
                            $images = [ ];
                            $images_per_page = 20;
                            $total_images = count( $gallery );
                            $total_pages = ceil( $total_images / $images_per_page );
                            $current_page = get_query_var( 'page' ) ? get_query_var( 'page' ) : 1;
                            $starting_point = ( ( $current_page - 1 ) * $images_per_page );

                            if ( $gallery ) {
                                $images = array_slice( $gallery, $starting_point, $images_per_page );
                                set_query_var( 'images', $images );
                            }


                            if ( $images ) :
                                foreach ( $images as $image ) : ?>

                                    <figure class="photo">
                                        <a href="<?php echo $image['sizes']['large']; ?>"
                                           title="<?php echo $image['title']; ?>">
                                            <img src="<?php echo $image['sizes']['ptg-gallery']; ?>"
                                                 alt="<?php echo $image['alt']; ?>">
                                        </a>
                                    </figure>

                                    <?php
                                endforeach;
                            endif;

                        endif;
                    endwhile;

                else :

                    // no layouts found

                endif;

                ?>

            </div>
        </div>
        <?php

        function ptg_bootstrap_pagination( $total, $current ) {
            $pages = paginate_links( array(
                'base'      => get_permalink() . '%#%' . '/',
                'format'    => '?paged=%#%',
                'current'   => $current,
                'total'     => $total,
                'prev_next' => true,
                'type'      => 'array',
                'prev_text' => __( '« Назад' ),
                'next_text' => __( 'Далее »' ),
            ) );
            if ( is_array( $pages ) ) {
                echo '<ul class="pagination">';

                foreach ( $pages as $page ) {
                    if ( $page == $current ) {
                        echo "<li class='active'>$page</li>";
                    } else {
                        echo "<li>$page</li>";
                    }
                }
                echo '</ul>';
            }
        }

        ?>

    </div>

    <div class="page__footer">
        <div class="container-fluid">
            <?php ptg_bootstrap_pagination( $total_pages, $current_page ); ?>
        </div>
    </div>

<?php get_template_part( 'templates/block', 'order' ); ?>