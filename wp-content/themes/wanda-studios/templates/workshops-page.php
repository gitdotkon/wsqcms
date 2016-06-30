<?php
/**
 * Template name: Workshop Page
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
            'menu_item_class' => ''
        ));
        // First screen
        show_template('facilities/child-page-first-screen');
        echo '<div class="tabs">';
        show_template('workshops/tile');
        show_template('workshops/section-slider');
        echo '</div>';
    }
}
get_footer();