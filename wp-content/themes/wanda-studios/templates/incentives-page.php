<?php
/**
 * Template name: Incentive Page
 * @var $post WP_Post
 */
get_header();
if(have_posts()){
    while(have_posts()){
        the_post();
        // Header

        // Prepare top menu
        $content_list = get_field('content_list');
        $top_menu = array();
        if($content_list){
            foreach ($content_list as $link){
                array_push($top_menu, array(
                    'url' => '#'.prepare_id($link['tab_title']),
                    'title' => $link['tab_title'],
                    'active' => reset($content_list) == $link
                ));
            }
        }
        // Prepare end
        show_template('content/header-with-menu', array(
            'class' => 'stiky fixed sync',
            'menu_list' => $top_menu,
            'menu_item_class' => 'vertical-delimiter',
            'link_class' => 'sync-item',
        ));
        // First screen
        show_template('incentives/first-screen', array('content_list'=>$content_list));

        // Content
        show_template('incentives/tabs', array('content_list'=>$content_list));
        
    }
}
get_footer();