<?php
/**
 * Template name: The Group Page
 * @var $post WP_Post
 */
get_header();
if(have_posts()) {
    while (have_posts()) {
        the_post();
        show_template('content/header-with-menu', array(
                'class' => 'stiky fixed',
                'menu_list' => get_about_menu_list($post->post_parent),
                'menu_item_class' => 'vertical-delimiter')
        );
        // first screen
        show_template('the_studios/first-screen', array('video_title' => 'Wanda Group'));
        // About section
        show_template('the_group/about');
        // Properties section
        show_template('the_group/properties');
        // Holdings section
        show_template('the_group/holdings');
        // Office section
        show_template('the_group/office');
    }
}
get_footer();