<?php
/**
 * @var $section
 */
if($section):?>
    <div class="slide">
        <div class="mobile_slide_bg" style="background-image: url(<?php echo $section['left_background']['sizes']['large']; ?>)"></div>
        <div class="big_pic up" style="background-image: url(<?php echo $section['left_background']['url']; ?>)"></div>
        <div class="side_pic">
            <img src="<?php echo $section['right_background']['url']; ?>" alt="<?php echo $section['title']; ?>"/>
        </div>
        <div class="screen_tile mobile_screen_tile" style="background-color: <?php echo $section['line_color']?:'#fff'; ?>"></div>
        <div class="mobile_text">
            <div class="table">
                <div class="td">
                    <h2><?php echo $section['title']?:''; ?></h2>
                    <div class="text">
                        <?php echo $section['description']?:''; ?>
                    </div>
                    <?php if($section['description_link_page'] && $section['description_link_title']): ?>
                        <a href="<?php echo $section['description_link_page']?:'#' ?>" class="btn red_btn incentive_btn">
                            <?php echo $section['description_link_title']?:''; ?>
                        </a>
                    <?php endif; ?>
                    <?php if($section['detail_link_page']): ?>
                        <div class="mobile_more">
                            <a href="<?php echo $section['detail_link_page']?:''; ?>">
                                <div class="title animate_up">
                                    <?php echo $section['detail_link_title']?:''; ?>
                                </div>
                                <div class="ico animate_up">
                                    <span class="icon-9"></span>
                                </div>
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
<?php endif;
