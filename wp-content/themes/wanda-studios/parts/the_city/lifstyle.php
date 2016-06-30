<?php
/**
 * Lifstyle section for City page
 */
$lifestyle_background = get_field('lifestyle_background');
$lifestyle_title = get_field('lifestyle_title');
$lifestyle_content = get_field('lifestyle_content');
if($lifestyle_background && $lifestyle_title && $lifestyle_content):?>
    <div class="lifestyle_destination fixed_full_bg" style="background-image: url(<?php echo $lifestyle_background['url']; ?>)">
        <div class="text">
            <div class="table">
                <div class="td">
                    <h2>
                        <?php echo $lifestyle_title; ?>
                    </h2>
                    <div class="txt">
                        <?php echo apply_filters('the_content', $lifestyle_content); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif;
