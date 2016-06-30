<?php
/**
 * Introduction Section for  The Studios
 */
$intro_background_image = get_field('intro_background_image');
$intro_title = get_field('intro_title');
$intro_subtitle = get_field('intro_subtitle');
$intro_text_1 = get_field('intro_text_1');
$intro_text_2 = get_field('intro_text_2');
?>
<div class="block_box">
    <?php if($intro_title): ?>
        <h2><?php echo $intro_title; ?></h2>
    <?php endif; ?>
    <?php if($intro_subtitle): ?>
        <h3><?php echo $intro_subtitle; ?></h3>
    <?php endif; ?>
</div>
<div class="introduction">
    
    <?php if($intro_background_image): ?>
        <div class="mobile_img">
            <img src="<?php echo $intro_background_image['sizes']['large']; ?>" alt="<?php echo $intro_subtitle; ?>">   
        </div>
        <div class="introduction-bg bg" style="background-image: url(<?php echo $intro_background_image['url']; ?>)">
            <?php if($intro_text_1): ?>
                <div class="round_text">
                    <div class="table">
                        <div class="td">
                            <div class="round_text_box">
                                <div class="round_text_inner">
                                    <div class="table">
                                        <div class="td">
                                            <?php echo apply_filters('the_content', $intro_text_1); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <?php if($intro_text_2): ?>
                <div class="text">
                    <div class="text_inner">
                        <div class="table">
                            <div class="td">
                                <div class="text_inner_box">
                                    <?php echo apply_filters('the_content', $intro_text_2); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    <?php endif; ?>
</div>

