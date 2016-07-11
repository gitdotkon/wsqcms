<?php
/**
 * Header with menu
 * @var $class
 * @var $menu_list
 * @var $menu_item_class
 * @var $link_class;
 */
$current_link = get_permalink(get_the_ID());
?>
<div class="header <?php if($class){echo $class;} ?>" id="header">
    <a href="<?php echo get_bloginfo('url') ?>" class="logo animate_left">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/wanda-top-red.svg" class="red-logo" alt=""/>
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/wanda-top-white.svg" class="white-logo" alt=""/>
    </a>
    <ul class="header-menu" id="header-menu">
        <li class=" vertical-delimiter">
            <a href="#news" class="sync-item"><?php _w('News'); ?></a>
        </li>
        <li class="sync-item vertical-delimiter">
            <a href="#photo"  class="sync-item"><?php _w('Photo gallery'); ?></a>
        </li>
        <li class="sync-item vertical-delimiter">
            <a href="#video"  class="sync-item"><?php _w('Video'); ?></a>
        </li>
    </ul>
    <a href="#" class="livechat_btn animate_right"></a>
    <a href="#" class="livechat_btn livechat_btn_up animate_right">
        <span class="icon-4"></span><?php _w('Live Chat'); ?>
    </a>
    <a href="#" class="menu_btn animate_right">
        <span class="icon-1"></span>
    </a>
</div>
