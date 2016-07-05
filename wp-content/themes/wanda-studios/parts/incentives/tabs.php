<?php
/**
 * Tabs
 * @var $content_list
 */
if($content_list):?>
    <?php foreach ($content_list as $content): ?>
        <div class="tab <?php if(reset($content_list) == $content){echo ' tab-active'; } ?>" id="<?php echo prepare_id($content['tab_title']); ?>">
            <div class="incentive block_box">
                <div class="content-inner">
                    <h1><?php echo $content['content_title']; ?></h1>
                    <div class="content">
                        <?php echo apply_filters('the_content', $content['content']); ?>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
<?php endif;
