<?php
/**
 * Template name: Media Center Page
 * @var $post WP_Post
 */
get_header();
if(have_posts()){
    while(have_posts()){
        the_post();
        // Header
        show_template('content/header-media-center', array(
            'class' => 'stiky fixed'
        ));
        // First screen
        show_template('media-center/first-screen');

        echo '<div class="tabs">';
            echo '<div class="tab tab-active" id="news">';
                show_template('media-center/news-list');
            echo '</div>';

            echo '<div class="tab" id="photo">';
                show_template('media-center/gallery-list');
            echo '</div>';

            echo '<div class="tab" id="video">';
                show_template('media-center/video-list');
            echo '</div>';
        echo '</div>';

    }
}
get_footer();