<div class="filter_box">
    <div class="span filter_location_wrapper">
        <i class="current" data-default="<?php _w('By Location'); ?>" data-current="0"><?php _w('By Location'); ?></i>
        <?php
        $locations = get_terms(array(
            'hide_empty' => false,
            'taxonomy' => 'area',
        ));
        ?>
        <?php if($locations): ?>
            <ul class="filter_location">
                <?php foreach ($locations as $location): ?>
                    <li data-location="<?php echo strtolower($location->name); ?>"><?php echo $location->name; ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
        <div class="icon-10"></div>
    </div>
    <div class="span filter_title_wrapper">
        <i class="current" data-default="<?php _w('By Title'); ?>" data-current="0"><?php _w('By Title'); ?></i>
        <?php 
            $args = array(
                'post_type' => 'career',
                'posts_per_page' => -1
            );
            $careers = get_query_posts($args);
            $title_list = array();
            foreach ($careers as $career){
                if(!in_array($career->post_title, $title_list)){
                    $title_list[] = $career->post_title;
                }
            }
        ?>
        <?php if($title_list): ?>
            <ul class="filter_title">
                <?php foreach ($title_list as $title): ?>
                    <li data-title="<?php echo strtolower(str_replace(' ', '_', $title)) ?>"><?php echo $title; ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
        <div class="icon-10"></div>
    </div>
    <a href="" class="filter_reset"><?php _w('Reset'); ?></a>
</div>