<?php
/**
 * Template name: Post-production Page
 * @var $post WP_Post
 */
get_header();
if(have_posts()){
    while(have_posts()){
        the_post();
        // Header
        show_template('content/header-with-menu', array(
            'class' => 'stiky fixed',
            'menu_list' => false,
            'menu_item_class' => 'vertical-delimiter',
            'link_class' => 'sync-item'
        ));
        // First screen
        show_template('facilities/child-page-first-screen', array('btn_class' => 'sync-item'));

//        $section = get_field('section_list');
//        if($section){
//
//            echo '<div class="tabs">';
//            foreach ($section as $item){
//                $class = '';
//                if(reset($section) == $item){
//                    $class = ' tab-active';
//                }
//                echo '<div class="tab '.$class.'" id="'.prepare_id($item['title']).'">';
//                // Description detail
//                show_template('backlots/description', array('section' => $section));
//                show_template('backlots/features', array('section' => $item));
//                show_template('backlots/slider', array('section' => $item));
//                echo '</div>';
//            }
//            echo '</div>';
//        }
    }
}
get_footer();