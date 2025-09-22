<?php

use Roots\Sage\Setup;
use Roots\Sage\Wrapper;

?>

<!doctype html>
<html <?php language_attributes(); ?>>
<?php get_template_part( 'templates/head' ); ?>
<body class="<?php
    echo join( ' ', get_body_class( $class ) );

    if ( get_current_blog_id() == 2 ) {
        echo ' theme--green';
    }
    if ( get_current_blog_id() == 1) {
        echo ' theme--orange';
    } ?>">
<!--[if IE]>
<div class="alert alert-warning">
    <?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your
    browser</a> to improve your experience.', 'sage'); ?>
</div>
<![endif]-->
<?php
do_action( 'get_header' );
get_template_part( 'templates/header' );

$page_type = $post->post_type;
?>

<main class="page page--<?php echo $page_type; ?>" role="main">
    <?php include Wrapper\template_path(); ?>
</main>

<?php
do_action( 'get_footer' );
get_template_part( 'templates/footer' );
wp_footer();
?>
</body>
</html>
