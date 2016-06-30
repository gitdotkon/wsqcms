<?php
/**
 * Historical background for City page
 */
$historical_title = get_field('historical_title');
$historical_content = get_field('historical_content');
$historical_links = get_field('historical_links');
if($historical_content && $historical_title):?>
    <div class="historical_bg">
        <div class="historical_bg_inner">
            <h2><?php echo $historical_title; ?></h2>
            <div class="hbg_slider">
                <?php echo apply_filters('the_content', $historical_content); ?>
                <?php if($historical_links): ?>
                    <div class="hbg_slider_btns">
                        <ul>
                            <?php foreach ($historical_links as $historical_link): ?>
                                <li>
                                    <a href="<?php echo $historical_link['url']?:'#'; ?>" class="table" target="_blank">
                                        <span class="td">
                                            <?php echo $historical_link['link_title']; ?>
                                        </span>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php endif;
