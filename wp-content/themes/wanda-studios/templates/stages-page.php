<?php
/**
 * Template name: Stages Page
 * @var $post WP_Post
 */
get_header();
if(have_posts()){
    while(have_posts()){
        the_post();
        $stage_tax_list = get_terms( array(
            'taxonomy' => 'stage_cat',
            'hide_empty' => false,
        ));
        // Header
        show_template('content/header-for-stage', array(
            'stage_tax' => $stage_tax_list
        ));


        echo '<div class="wrapper">';
        show_template('stages/stage-first-slide', array(
            'cat_list' => $stage_tax_list
        ));
        foreach ($stage_tax_list as $key => $tax){
            show_template('stages/stage-slide', array(
                'tax' => $tax,
                'class' => $key == 0?'mobile_stage_slide':''
            ));
        }
        show_template('facilities/hexagonal-menu');
        echo '<div class="screen_slide screen_slide_hidden"></div>';
        foreach ($stage_tax_list as $key => $tax){
            show_template('stages/stage-screen-slide', array(
                'tax' => $tax,
                'class' => $key == 0?'screen_slide_active':'',
                'id' => $key+1,
                'count' => get_count_stage($tax->term_id)
            ));
        }

        //3D map
        if($map_code = get_field('3d_map')): ?>
            <div class="fl_btn_box left animate_left">
                <a href="#lightbox" data-id="<?php echo $map_code; ?>" class="btn lightbox_btn map_btn">
                    <span>
                        <?php _w('View 3D Map'); ?>
                        <span class="icon-8"></span>
                    </span>
                </a>
            </div>
        <?php endif;

        show_template('stages/stage-nav', array(
            'stage_cat' => $stage_tax_list
        ));
        
        // Slider
        show_template('stages/stages-slider', array(
            'stage_cat' => $stage_tax_list
        ));
        echo '<div id="mobile_stage"><ul></ul></div>';
        echo '</div>';
    }
}
get_footer();