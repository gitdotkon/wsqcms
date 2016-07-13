<?php
/**
 * Share menu
 */
?>
<div class="round_share">
    <a href="" class="round_share_btn"></a>
    <a href="http://api.qrserver.com/v1/create-qr-code/?size=150x150&data=<?php echo get_permalink(get_the_ID()); ?>" target="_blank" class="round_wechat"></a>
    <a href="http://service.weibo.com/share/share.php?url=<?php echo get_permalink(get_the_ID()); ?>&appkey=&title=<?php echo get_the_title(); ?>&pic=&ralateUid=&language=zh_cn" target="_blank" class="round_weibo"></a>
    <a href="http://twitter.com/share?url=<?php echo get_permalink(get_the_ID()); ?>&text=<?php echo get_the_title(); ?>" target="_blank" class="round_twitter"></a>
    <a href="http://www.facebook.com/sharer.php?u=<?php echo get_permalink(get_the_ID()); ?>" target="_blank" class="round_facebook"></a>
</div>
