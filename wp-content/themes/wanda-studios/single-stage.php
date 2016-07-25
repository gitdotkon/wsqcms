<?php
/**
 * Single page for stage type
 */
get_header();
if(have_posts()){
    while(have_posts()){
        the_post();
        // Header
        show_template('content/header-with-menu', array(
            'class' => 'stiky fixed white-header'
        ));
        //Stage detail
        show_template('stages/single-stage-detail');
        // Slider
        show_template('stages/single-stage-slider');
    }
}
get_footer();