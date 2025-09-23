<?php

use Roots\Sage\Setup;
use Roots\Sage\Wrapper;

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<?php get_template_part('templates/head'); ?>

<body class="<?php
                if (is_user_logged_in()) echo 'logged-in';
                if (get_current_blog_id() == 2) echo ' theme-green';
                if (get_current_blog_id() == 1) echo ' theme-orange';
                ?>">


    <?php
    do_action('get_header');
    get_template_part('templates/header');
    ?>

    <main class="main" role="main">
        <?php include Wrapper\template_path(); ?>
    </main>

    <?php
    do_action('get_footer');
    get_template_part('templates/footer');
    wp_footer();
    ?>

</body>

</html>