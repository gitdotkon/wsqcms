<?php
/**
 * First screen for Incentives page
 * @var $content_list array
 */
$background = get_field('background');
$description = get_field('description');
if($background):?>
    <div class="first-screen incentive-page-screen">
        <div class="desktop-bg full-bg" style="background-image: url(<?php echo $background['url']; ?>)"></div>
        <div class="mobile-bg full-bg"  style="background-image: url(<?php echo $background['sizes']['large']; ?>)"></div>
        <div class="table table home_screen">
            <div class="td">
                <h1 class="animate_up">
                    <?php the_title(); ?>
                </h1>
                <div class="animate_up text_box">
                    <?php if($description): ?>
                        <?php echo $description; ?>
                    <?php endif; ?>
                </div>
                <?php if($content_list): ?>
                    <div class="screen_btns sync">
                        <?php foreach ($content_list as $item): ?>
                            <div class="animate_up">
                                <a href="#<?php echo strtolower(str_replace(' ', '_', $item['tab_title'])) ?>" class="hover_btn sync-item incentive_btn <?php if(reset($content_list) == $item){echo 'active';} ?>">
                                <span class="table">
                                    <span class="td">
                                        <?php echo $item['round_title']; ?>
                                    </span>
                                </span>
                                </a>
                            </div>
                        <?php endforeach; ?>
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
