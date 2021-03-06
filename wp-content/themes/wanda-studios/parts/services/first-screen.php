<?php
/**
 * First Screen for Services page
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
                    <div class="sv_icons">
                        <ul>
                            <?php foreach ($links as $key=>$link): ?>
                                <li <?php if(reset($links) == $link){echo 'class="active"';} ?>>
                                    <a href="#<?php echo prepare_id($link['title']); ?>">
                                        <span class="icon icon_<?php echo $key+1; ?>">

                                        </span>
                                        <?php echo $link['title']; ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>

            </div>
        </div>
        <?php if($map_code): ?>
            <div class="fl_btn_box left animate_left">
                <a href="<?php echo $map_code; ?>" data-id="<?php echo $map_code; ?>"target="_blank" class="btn go-to lightbox_btn">
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
