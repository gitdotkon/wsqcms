<?php
/**
 * Template name: Contact us Page
 * @var $post WP_Post
 */
get_header();
if(have_posts()) {
    while (have_posts()) {
        the_post();
        show_template('content/header-with-menu', array(
            'class' => 'stiky fixed'
        ));

        show_template('contact/contact-screen');
        show_template('contact/map');
    }
}
get_footer();