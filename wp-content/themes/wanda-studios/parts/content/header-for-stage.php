<?php
/**
 * Header for Stage
 * @var $stage_tax
 */
?>
<div class="header stiky fixed" id="header">
    <a href="<?php echo get_bloginfo('url') ?>" class="logo animate_left">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/wanda-top-red.svg" class="red-logo" alt=""/>
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/wanda-top-white.svg" class="white-logo" alt=""/>
    </a>
    <?php if($stage_tax): ?>
        <div class="stage_screen_btns_wrapper">
            <div class="stage_screen_btns">
                <?php foreach ($stage_tax as $tax): ?>
                    <span>
                        <a href="#" data-hash="<?php echo $tax->name; ?>"><?php echo $tax->name; ?></a>
                    </span>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="mobile_stages_slider_nav">
            <ul>
                <?php foreach ($stage_tax as $tax): ?>
                    <li>
                        <a href="#" data-hash="<?php echo $tax->name; ?>"><?php echo $tax->name . __(' sound stage '); ?><span class="grey">(<?php echo get_count_stage($tax->term_id)  ; ?>)</span></a>
                    </li>
                <?php endforeach; ?>
            </ul>

        </div>
    <?php endif; ?>
    <a href="#" class="menu_btn animate_right">
        <span class="icon-1"></span>
    </a>
</div>
