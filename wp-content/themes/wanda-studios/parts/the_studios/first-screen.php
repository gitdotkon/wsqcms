<?php
/**
 * First screen for City page
 * @var $video_title string
 */
$background_image = get_field('backgound_image');

$map_code = get_field('3d_map');
$video_code = get_field('video');
if($background_image):?>
    <div class="first-screen about-page-screen">
        <div class="desktop-bg full-bg" style="background-image: url(<?php echo $background_image['url']; ?>)"></div>
        <div class="mobile-bg full-bg"  style="background-image: url(<?php echo $background_image['sizes']['large']; ?>)"></div>
        <div class="table home_screen">
            <div class="td">
                <h1 class="animate_up">
                    <?php the_title(); ?>
                </h1>
                <div class="animate_up">
                    <?php
                    $description_list = get_field('description_list');
                    if($description_list && is_page_template('templates/the-studios-page.php')): ?>
                        <?php show_template('the_studios/description-list', array('description' => $description_list)); ?>
                    <?php else: ?>
                        <?php if($subtitle = get_field('subtitle')): ?>
                            <?php echo $subtitle; ?>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <a href="#" class="dark next_screen next_screen_trigger" id="next_screen">
            <span class="next_screen_mouse">
                <span class="next_screen_mousewheel">
                </span>
            </span>
        </a>
        <?php if($map_code): ?>
            <div class="fl_btn_box left animate_left">
                <a href="<?php echo $map_code; ?>" data-id="<?php echo $map_code; ?>" target="_blank" class="go-to btn lightbox_btn">
                    <span class="icon-8"></span>
                    <?php _w('View 3D Map'); ?>
                </a>
            </div>
        <?php endif; ?>
        <?php if($video_code): ?>
            <div class="fl_btn_box right animate_right">
                <a href="#lightbox2" data-id="<?php echo $video_code; ?>" class="btn view_video lightbox_btn">
                    <span class="icon-22"></span>
                    <?php _w($video_title?:'View Video'); ?>
                </a>
            </div>
        <?php endif; ?>
    </div>
<?php endif;
