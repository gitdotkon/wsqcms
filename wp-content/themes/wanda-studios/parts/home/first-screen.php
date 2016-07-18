<?php
/**
* @var $id
 */
$home_bg = get_field('first_scree_background', $id);
$first_title = get_field('first_title', $id);
$second_title = get_field('second_title', $id);
$third_title = get_field('third_title', $id);
$map = get_field('3d_map', $id);
$mobile_bg = get_field('mobile_background');
?>
<div class="slide slide_active slide_animating">
    <div class="slide_bg slide_bg_ed" style="background-image: url(<?php echo $home_bg['url']; ?>)"></div>
    <img src="<?php echo $home_bg['url']; ?>" alt="" class="image_loader"/>
    <div class="mobile_slide_bg" style="background-image: url(<?php echo $mobile_bg['url']?:$home_bg['sizes']['large']; ?>)"></div>
    <div class="table">
        <div class="td">
            <div class="home_screen">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/360_view.png" class="all_view all_view_hidden" alt=""/>
                <div class="light animate_up">
                    <span class="lr_line"><?php echo $first_title; ?></span>
                </div>
                <h2 class="animate_up">
                    <?php echo $second_title; ?>
                </h2>
                <div class="light animate_up">
                    <?php echo $third_title; ?>
                </div>
                <div class="all_view_wrapper">
                    <a href="#lightbox" data-id="<?php echo $map; ?>" class="lightbox_btn">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/360_view.png" class="all_view" alt=""/>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <a href="#" class="next_screen">
        <span class="next_screen_mouse">
            <span class="next_screen_mousewheel"></span>
        </span>
    </a>
</div>
