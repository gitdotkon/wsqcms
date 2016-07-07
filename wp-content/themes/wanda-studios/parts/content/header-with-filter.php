<?php
/**
 * Header with menu
 */
$current_link = get_permalink(get_the_ID());
?>
<div class="header stiky fixed" id="header">
    <a href="<?php echo get_bloginfo('url') ?>" class="logo animate_left">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/wanda-top-red.svg" class="red-logo" alt=""/>
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/wanda-top-white.svg" class="white-logo" alt=""/>
    </a>
    <?php show_template('careers/filter-box'); ?>
    <a href="#" class="menu_btn animate_right">
        <span class="icon-1"></span>
    </a>
</div>
