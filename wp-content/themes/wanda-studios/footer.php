<?php
/**
 * Footer
 */
/* PrevNext nav begin */
show_template('content/prev-next');
/* PrevNext nav end */

$social = get_field('social', 'options');
$map = get_field('view_3d_map', 'option');
?>
<div class="footer">
    <div class="foot_box">
        <a href="<?php echo get_bloginfo('url') ?>" class="foot_logo_a">
            <img src="<?php echo get_stylesheet_directory_uri() ?>/images/wanda-footer.svg" alt="" class="foot_logo"/>
        </a>
        <?php if($social): ?>
            <ul class="foot_share">
                <?php foreach ($social as $item): ?>
                    <li>
                        <a href="<?php echo $item['url']?:''; ?>" target="_blank">
                            <span class="<?php echo $item['icons']; ?>"></span>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
        <a href="#lightbox" data-id="<?php echo $map; ?>" class="btn map_btn lightbox_btn">
            <span><i><?php _w('View 3D Map'); ?></i>
                <span class="icon-8"></span>
            </span>
        </a>
    </div>
    <div class="foot_widgets">
        <?php
            for($i=1; $i<=4; $i++){
                dynamic_sidebar('foundation_footer_'.$i);
            }
        ?>
        <div class="foot_mobile">
            <div class="clear">
                <a href="#" class="back_top mobile_back_top">
                    <span class="icon-12"></span>
                </a>
            </div>
            <?php if($email = get_field('email', 'options')): ?>
                <strong><?php _w('Email'); ?></strong>
                <a href="mailto:<?php echo $email ?>"><?php echo $email; ?></a>
            <?php endif; ?>
            <?php if($address = get_field('address', 'options')): ?>
                <strong><?php _w('Mailing Address'); ?></strong>
                <address>
                    <?php echo $address; ?>
                </address>
            <?php endif; ?>
        </div>
        <div class="foot_right">
            <a href="#" class="back_top"><span class="icon-12"></span></a>
            <div class="qrcode">
                <?php if($qr_code = get_field('qr_code', 'options')): ?>
                    <img src="<?php echo $qr_code['url']; ?>" alt="">
                    <span>
                        <?php _w('Follow Us'); ?>
                        <br>
                        <?php _w('On WeChat'); ?>
                    </span>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="copyright">
        <div class="copyright-inner">
            <?php echo apply_filters('the_content', get_field('copyright', 'options')); ?>
        </div>
    </div>
</div>
<div class="lightbox" id="lightbox">
    <iframe class="iframe" width="640" height="480"
            src="" frameborder="0" allowfullscreen
            mozallowfullscreen="true" webkitallowfullscreen="true" onmousewheel=""></iframe>
    <a href="#" class="lightbox_close"></a>
</div>
<div class="lightbox" id="lightbox2">
    <video id="video" src=""></video>
    <a href="#" class="lightbox_close"></a>
</div>
<?php

wp_footer(); ?>
</body>
</html>
