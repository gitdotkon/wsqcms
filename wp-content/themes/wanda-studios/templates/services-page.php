<?php
/**
 * Template name: Services Page
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
        show_template('services/first-screen', array('btn_class' => 'sync-item')); // Services screne

        $section = get_field('section_list');
        if($section){

            echo '<div class="tabs">';
            foreach ($section as $item){
                $class = '';
                if(reset($section) == $item){
                    $class = ' tab-active';
                }
                echo '<div class="tab '.$class.'" id="'.prepare_id($item['title']).'">';
                if(!empty($item['content_list'])){
                    $content_list = $item['content_list'];
                    foreach ($content_list as $content_box){
                        if(!empty($content_box['acf_fc_layout'])){
                            show_template('services/'.$content_box['acf_fc_layout'], array('data' => $content_box));
                        }
                    }
                }
                
                // Description detail
//                show_template('backlots/description', array('section' => $section));
//                show_template('backlots/features', array('section' => $item));
//                show_template('backlots/slider', array('section' => $item));
                echo '</div>';
            }
            echo '</div>';
        }
        // Why Wanda
        show_template('the_studios/why-wanda');
    }
}
get_footer();