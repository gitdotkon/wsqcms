<?php
/**
 * Stage first slide
 * @var $cat_list
 */
$subtitle = get_field('subtitle');
$background = get_field('background');

?>
<div class="slide slide_active" >
    <div class="slide_bg slide_bg_ed" style="background-image: url(<?php echo $background['url']; ?>)"></div>
    <img src="<?php echo $background['url']; ?>" alt="" class="image_loader">
    <div class="mobile_slide_bg" style="background-image: url(<?php echo $background['sizes']['large']; ?>)"></div>
    <div class="table">
        <div class="td_bottom">
            <div class="home_screen stages_home_screen">
                <h2 class="animate_up "><?php the_title(); ?></h2>
                <div class="animate_up">
                    <div class="light_stxt"><?php echo apply_filters('the_content', $subtitle); ?></div>
                </div>
                <?php if($cat_list): ?>
                    <div class="stage_screen_btns">
                        <?php foreach ($cat_list as $item):
                            $stage_tax_key       = $item->taxonomy . '_' . $item->term_id;
                            $stage_tax_size_m    = get_field('stage_size_m', $stage_tax_key);
                            $stage_tax_size_ft   = get_field('stage_size_ft', $stage_tax_key);
                            ?>
                            <span class="animate_up">
                                <a href="#" data-hash="<?php echo $item->name; ?>">
                                    <div class="stage_btn_txt">
                                        <?php echo $item->name; ?>
                                    </div>
                                    <div class="stage_btn_hover">
                                        <div class="table">
                                            <div class="td">
                                                <?php echo $stage_tax_size_m .  __('m') . '<sup>2</sup>'; ?>
                                                <div class="stage_btn_hr"></div>
                                                <?php echo $stage_tax_size_ft . __('m') . '<sup>2</sup>'; ?>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </span>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <a href="#" class="next_screen next_screen_ed dark"><span class="next_screen_mouse"><span class="next_screen_mousewheel"></span></span></a>
</div>
