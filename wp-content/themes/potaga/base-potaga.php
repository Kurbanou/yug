<?php

use Roots\Sage\Setup;
use Roots\Sage\Wrapper;

?>

<!doctype html>
<html <?php language_attributes(); ?>>
<?php get_template_part( 'templates/head' ); ?>
<body class="<?php

    if ( is_user_logged_in() ) {
        echo 'logged-in';
    }
    if ( get_current_blog_id() == 2) {
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
?>

<main class="main" role="main">
    <?php include Wrapper\template_path(); ?>
</main>

<?php if ( Setup\display_sidebar() ) : ?>
    <aside class="sidebar">
        <?php include Wrapper\sidebar_path(); ?>
    </aside>
<?php endif; ?>

<?php
do_action( 'get_footer' );
get_template_part( 'templates/footer' );
wp_footer();
?>
</body>
</html>
