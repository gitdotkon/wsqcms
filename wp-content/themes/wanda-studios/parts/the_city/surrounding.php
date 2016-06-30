<?php
/**
 * Surrounding screen for City page
 */
$suround_background = get_field('suround_background');
$surround_title = get_field('surround_title');
$surronund_content = get_field('surronund_content');
$links = get_field('links');
if($suround_background):?>
    <div class="surroundings fixed_full_bg" style="background-image: url(<?php echo $suround_background['url']; ?>)">
        <div class="text">
            <div class="text_inner">
                <div class="table">
                    <div class="td">
                        <h2><?php echo $surround_title; ?></h2>
                        <div class="txt">
                            <?php echo apply_filters('the_content', $surronund_content); ?>
                        </div>
                        <?php if($links): ?>
                            <div class="btns">
                                <?php foreach ($links as $link): ?>
                                    <a href="<?php echo $link['url']?:'#' ?>" target="_blank">
                                        <?php echo $link['link_title']; ?>
                                    </a>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    </div>

                </div>
            </div>
        </div>
    </div>
<?php endif;
