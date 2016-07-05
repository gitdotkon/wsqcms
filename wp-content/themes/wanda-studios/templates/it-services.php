<?php
/**
 * Template name: IT Services Page
 * @var $post WP_Post
 */
get_header();
if(have_posts()){
    while(have_posts()){
        the_post();
        // Header
        show_template('content/header-with-menu', array(
            'class' => 'stiky fixed',
            'menu_list' => get_workshop_menu_list($post->ID),
            'menu_item_class' => 'vertical-delimiter',
            'link_class' => 'sync-item'
        ));
        // First screen
        show_template('facilities/child-page-first-screen');
        //Services
        show_template('it-services/services');
        // Why Wanda
        show_template('the_studios/why-wanda');
    }
}
get_footer();