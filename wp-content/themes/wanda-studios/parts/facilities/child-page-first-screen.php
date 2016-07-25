<?php
/**
 * First screen for child page of Facilities page
 * @var $links array
 * @var $btn_class;
 */
$background = get_field('background');
$description = get_field('subtitle');
$links = get_field('section_list');
$map_code = get_field('3d_map');
if($background):?>
    <div class="first-screen facilities-page-screen">
        <div class="desktop-bg full-bg" style="background-image: url(<?php echo $background['url']; ?>)"></div>
        <div class="mobile-bg full-bg"  style="background-image: url(<?php echo $background['sizes']['large']; ?>)"></div>
        <div class="table home_screen">
            <div class="td">
                <h1 class="animate_up">
                    <?php the_title(); ?>
                </h1>
                <div class="animate_up">
                    <?php echo apply_filters('the_content', $description); ?>
                </div>
                <?php if($links): ?>
                    <div class="screen_btns">
                        <?php foreach ($links as $key => $link): ?>
                            <div class="animate_up">
                                <a href="#<?php echo prepare_id($link['title']); ?>" class="hover_btn workshop_btn <?php if($btn_class){echo $btn_class;}; ?>">
                                    <span class="table">
                                        <span class="td">
                                            <?php echo $link['title']; ?>
                                        </span>
                                    </span>
                                </a>
                            </div>
                            <?php if(is_page_template('templates/post-production-page.php') && $key == 4): ?>
                                <div class="sec_rounds"></div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

            </div>
        </div>
        <?php show_template('facilities/hexagonal-menu'); ?>
        <?php if($map_code): ?>
            <div class="fl_btn_box left animate_left">
                <a href="<?php echo $map_code; ?>" data-id="<?php echo $map_code; ?>" target="_blank" class="go-to btn lightbox_btn">
                    <span class="icon-8"></span>
                    <?php _w('View 3D Map'); ?>
                </a>
            </div>
        <?php endif; ?>
        <a href="#" class="dark next_screen next_screen_trigger" id="next_screen">
            <span class="next_screen_mouse">
                <span class="next_screen_mousewheel">
                </span>
            </span>
        </a>
    </div>
<?php endif;
