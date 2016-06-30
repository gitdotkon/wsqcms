<?php
/**
 * Template name: The City Page
 * @var $post WP_Post
 */
get_header();
if(have_posts()){
    while(have_posts()){
        the_post();
        // Header
        show_template('content/header-with-menu', array(
                'class' => 'stiky fixed',
                'menu_list' => get_about_menu_list($post->post_parent),
                'menu_item_class' => ''
        ));
        // First screen
        show_template('the_studios/first-screen');
        // About Gingdao
        show_template('the_city/about-qingdao');
        // Short description
        show_template('the_city/short-description');
        // Surround
        show_template('the_city/surrounding');
        // Historical background
        show_template('the_city/historical-background');
        // Climate
        show_template('the_city/climate');
        // Travel time
        show_template('the_city/travel-time');
        // Lifstyle
        show_template('the_city/lifstyle');
    }
}
get_footer();