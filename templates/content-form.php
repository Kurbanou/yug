<?php

$form_id = get_sub_field('feedback-form');
echo do_shortcode('[contact-form-7 id="' . $form_id . '"]');