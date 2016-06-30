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
    <?php if($menu_list): ?>
        <ul class="header-menu" id="header-menu">
        <?php foreach ($menu_list as $item): ?>
            <li class="<?php echo $menu_item_class; if($item['active']){echo ' active';} ?>">
                <a href="<?php echo $item['url']?:'#'; ?>" class="<?php echo $link_class; ?>"><?php echo $item['title']; ?></a>
            </li>
        <?php endforeach; ?>
        </ul>
    <?php endif; ?>
    <a href="#" class="menu_btn animate_right">
        <span class="icon-1"></span>
    </a>
</div>
