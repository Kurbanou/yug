<?php
/**
 * Template Name: Front Page Template
 */
?>

<?php
  if( have_rows('ptg-builder') ):
    while ( have_rows('ptg-builder') ) : the_row();
      include(TEMPLATEPATH.'/templates/builder-home.php');
    endwhile;
  endif;
?>


