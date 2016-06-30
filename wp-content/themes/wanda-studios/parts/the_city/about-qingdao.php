<?php
/**
 * About Qingdao Section for City page
 */
$qingdao_background_image = get_field('qingdao_background_image');
$about_qingdao_title = get_field('about_qingdao_title');
$qingdao_about_content = get_field('qingdao_about_content');
if($qingdao_about_content):?>
    <div class="fl_specs about_qd">
        <div class="img" style="background-image: url(<?php echo $qingdao_background_image['url']; ?>)">
            <div class="table">
                <div class="td">
                    <h2><?php echo $about_qingdao_title; ?></h2>
                </div>
            </div>
        </div>
        <div class="text">
            <div class="table">
                <div class="td">
                    <?php echo apply_filters('the_content', $qingdao_about_content); ?>
                </div>
            </div>
        </div>
    </div>
<?php endif;
