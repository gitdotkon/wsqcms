<?php
/**
 * Stage screen slide
 * @var $tax
 * @var $class
 * @var $id
 * @var $count
 */
$tax_key = $tax->taxonomy . '_' . $tax->term_id;
$tax_bg = get_field('stage_background', $tax_key);
$stages_args = array(
    'post_type' => 'stage',
    'tax_query' => array(
        array(
            'taxonomy' => 'stage_cat',
            'field'    => 'term_id',
            'terms'    => array( $tax->term_id )
        )
    ),
    'posts_per_page' => -1,
    'cluster' => array(
        'key' => 'clusters',
        'type' => 'NUMERIC'
    ),
    'orderby'  => 'meta_value_num',
    'order'    => 'ASC'
);
$stages = get_query_posts($stages_args);
?>
<div class="screen_slide <?php //echo $class; ?>" data-hash="<?php echo $tax->name; ?>" data-id="<?php echo $id ?>" data-slider="#slider_<?php echo $tax->term_id ?>">
    
    <div class="side_pic">
        <div class="side_stage_pic">
            <?php if(count($stages) > 2): ?>
                <div class="stage_list stage_list_trigger">
                    <div class="table">
                        <div class="td">
                            <?php foreach ($stages as $stage): ?>
                                <a href="<?php echo get_permalink($stage->ID); ?>" class="stage_item_trigger <?php if(get_field('is_visible', $stage->ID) === false){echo 'inactive';} ?>">
                                    <div class="stage_list_a">
                                        <span class="stage_index">
                                            <?php echo $stage->post_title; ?>
                                        </span>
                                        <?php _w('Cluster :'); echo '<strong>'.get_field('clusters', $stage->ID).'</strong>'; ?>
                                    </div>
                                    <span class="icon-5"></span>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            <?php else: ?>
                <div class="table stage_list_trigger">
                    <div class="td">
                        <?php foreach ($stages as $stage): ?>
                            <div class="stage_pic stage_item_trigger  <?php if(get_field('is_visible', $stage->ID) === false){echo 'inactive';} ?>">
                                <div class="stage_pic_inner">
                                    <div class="stage_pic_bg"></div>
                                    <div class="table">
                                        <div class="td">
                                            <h2><?php echo $stage->post_title; ?></h2>
                                            <div class="stage_pic_text">
                                                <?php _w('Cluster :'); echo '<strong>'.get_field('clusters', $stage->ID).'</strong>'; ?>
                                            </div>
                                            <a href="<?php echo get_permalink($stage->ID) ?>" class="view_btn"><?php _w('View'); ?></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

