<?php
/**
 * Single page for stage type
 */
get_header();
if(have_posts()){
    while(have_posts()){
        the_post();
        // Header
        $stage_tax_list = get_terms( array(
            'taxonomy' => 'stage_cat',
            'hide_empty' => false,
        ));
        show_template('content/header-for-stage', array(
            'stage_tax' => $stage_tax_list,
            'class' => 'white-header'
        ));
        //Stage detail
        show_template('stages/single-stage-detail');
        // Slider
        show_template('stages/single-stage-slider');
    }
}
get_footer();