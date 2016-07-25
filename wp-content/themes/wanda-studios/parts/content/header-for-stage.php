<?php
/**
 * Header for Stage
 * @var $stage_tax
 * @var $class
 */
$has_tax = false;
if(is_singular('stage')){
    $current_stage_tax = get_the_terms(get_the_ID(), 'stage_cat');
    $has_tax = $current_stage_tax[0]->term_id;
}
$link_to_stage = get_field('stage_prev_link_url', 'options')
?>
<div class="header stiky fixed <?php if($class){echo $class;} ?>" id="header">
    <a href="<?php echo get_bloginfo('url') ?>" class="logo animate_left">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/wanda-top-red.svg" class="red-logo" alt=""/>
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/wanda-top-white.svg" class="white-logo" alt=""/>
    </a>
    <?php if($stage_tax): ?>
        <div class="stage_screen_btns_wrapper">
            <div class="stage_screen_btns">
                <?php foreach ($stage_tax as $tax): ?>
                    <span <?php if($has_tax == $tax->term_id){echo 'class="active"';} ?>>
                        <a href="<?php echo $link_to_stage . '#'.$tax->name; ?>" data-hash="<?php echo $tax->name; ?>"><?php echo $tax->name; ?></a>
                    </span>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="mobile_stages_slider_nav">
            <ul>
                <?php foreach ($stage_tax as $tax): ?>
                    <li  <?php if($has_tax == $tax->term_id){echo 'class="active"';} ?>>
                        <a href="<?php echo $link_to_stage . '#'.$tax->name; ?>" data-hash="<?php echo $tax->name; ?>"><?php echo $tax->name . __(' sound stage '); ?><span class="grey">(<?php echo get_count_stage($tax->term_id)  ; ?>)</span></a>
                    </li>
                <?php endforeach; ?>
            </ul>

        </div>
    <?php endif; ?>
    <a href="#" class="menu_btn animate_right">
        <span class="icon-1"></span>
    </a>
</div>
