<section class="jumbotron" id="jumbotron">
    <div class="container-w">
        <div class="jumbotron__body">
            <h1><?php the_sub_field('jumbotron-title'); ?></h1>
            <div class="jumbotron-description">
                <?php the_sub_field('jumbotron-description'); ?>
            </div>

            <div class="jumbotron__btns">
                <button class="has-icon lite" onclick="window.open('<?php the_sub_field('jumbotron-file'); ?>', '_blank')"><span>Презентация<span style="text-transform: lowercase;">.pdf</span></span>
                    <svg width="25" height="24" viewBox="0 0 25 24" style="fill: none;">
                        <path d="M12.3152 11.5037V20.0037M12.3152 20.0037L15.3152 17.0037M12.3152 20.0037L9.3152 17.0037M8.3152 7.03973C9.06315 7.14785 9.75601 7.49516 10.2902 8.02973M17.8152 14.0037C19.3342 14.0037 20.3152 12.7727 20.3152 11.2537C20.3151 10.6523 20.118 10.0676 19.7539 9.58893C19.3897 9.11031 18.8788 8.76424 18.2992 8.60373C18.21 7.48218 17.7452 6.42349 16.9799 5.59882C16.2146 4.77414 15.1935 4.23169 14.0817 4.05915C12.9699 3.88662 11.8325 4.09408 10.8532 4.64802C9.87392 5.20195 9.1101 6.06996 8.6852 7.11173C7.79063 6.86375 6.83418 6.9813 6.02628 7.43851C5.21837 7.89572 4.62518 8.65515 4.3772 9.54972C4.12922 10.4443 4.24677 11.4007 4.70399 12.2087C5.1612 13.0166 5.92063 13.6097 6.8152 13.8577" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>

            </div>
        </div>
    </div>
</section>