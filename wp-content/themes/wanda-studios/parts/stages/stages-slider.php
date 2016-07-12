<?php
/**
 * Stages slider
 * @var $stage_cat
 */
if($stage_cat):?>
    <div class="stage-sliders">
        <?php foreach ($stage_cat as $tax):
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
            <div class="stage_list_slider" id="slider_<?php echo $tax->term_id ?>">
                <div class="flexslider">
                    <ul class="slides">
                        <?php foreach ($stages as $stage): ?>
                            <li>
                                <div class="stage_list_slide" style="background-image: url(<?php echo get_attached_img_url($stage->ID) ?>);"><img
                                        src="<?php echo get_attached_img_url($stage->ID) ?>" alt=""/></div>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif;
