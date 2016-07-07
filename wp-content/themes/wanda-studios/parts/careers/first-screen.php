<?php
/**
 * First screen for child page of Facilities page
 * @var $links array
 * @var $btn_class;
 */
$background = get_field('background');
$description = get_field('subtitle');
$icons = get_field('icons');
if($background):?>
    <div class="first-screen facilities-page-screen careers-page-screen">
        <div class="desktop-bg full-bg" style="background-image: url(<?php echo $background['url']; ?>)"></div>
        <div class="mobile-bg full-bg"  style="background-image: url(<?php echo $background['sizes']['large']; ?>)"></div>
        <div class="table home_screen">
            <div class="td">
                <h1 class="animate_up">
                    <?php the_title(); ?>
                </h1>
                <div class="animate_up">
                    <?php the_content(); ?>
                </div>
                <?php if($icons): ?>
                    <div class="animate_up">
                        <div class="cr_cols">
                            <ul>
                            <?php foreach ($icons as $key=>$icon): ?>
                                <li>
                                    <a href="">
                                        <div class="icon icon_<?php echo $key+1; ?>" style="background-image: url(<?php echo $icon['icon']['url']; ?>)"></div>
                                        <?php echo $icon['title']; ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                <?php endif; ?>

            </div>
        </div>
        <a href="#" class="dark next_screen next_screen_trigger" id="next_screen">
            <span class="next_screen_mouse">
                <span class="next_screen_mousewheel">
                </span>
            </span>
        </a>
    </div>
<?php endif;
