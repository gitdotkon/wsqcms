<?php
/**
 * Template name: The Studios Page
 * @var $post WP_Post
 */
get_header();
if(have_posts()){
    while(have_posts()){
        the_post();
        show_template('content/header-with-menu', array(
            'class' => 'stiky fixed',
            'menu_list' => get_about_menu_list($post->post_parent),
            'menu_item_class' => '')
        );
        // first screen
        show_template('the_studios/first-screen');
        // Quote section
        show_template('the_studios/quote');
        // Introduction section
        show_template('the_studios/introduction');
        // Team section
        show_template('the_studios/team-slider');
        // Film banner
        show_template('the_studios/film-banner');
        // Why Wanda
        show_template('the_studios/why-wanda');
    }
}
get_footer();