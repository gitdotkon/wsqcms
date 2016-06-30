<?php
/**
 * @var $count;
 */
?>
<a href="<?php echo get_bloginfo('url') ?>" class="logo animate_left">
    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/wanda-top-white.svg" alt=""/>
</a>
<a href="#" class="menu_btn animate_right">
    <span class="icon-1"></span>
</a>
<?php
$social_links = get_field('social', 'options');
if($social_links):?>
    <div class="social_btns">
        <?php foreach ($social_links as $link): ?>
            <a href="<?php echo $link['url']?:'#'; ?>" target="_blank" class="facebook animate_left">
                <span class="<?php echo $link['icons'] ?>"></span>
            </a>
        <?php endforeach; ?>
    </div>
<?php  endif; ?>
<a href="#" class="livechat_btn animate_right"></a>
<a href="#" class="livechat_btn livechat_btn_up animate_right">
    <span class="icon-4"></span><?php _w('Live Chat'); ?>
</a>
<div class="nav_container">
    <div class="table">
        <div class="td">
            <div class="nav">
                <ul>
                    <?php for($i=0; $i<=$count; $i++): ?>
                        <li <?php if($i == 0){echo 'class="active"' ;} ?>><a href="#"></a></li>
                    <?php endfor; ?>
                </ul>
            </div>
        </div>
    </div>
</div>