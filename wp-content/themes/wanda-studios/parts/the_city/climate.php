<?php
/**
 * Climate Section for City page
 */
$climate_title = get_field('climate_title');
$climate_content = get_field('climate_content');
$legend_image = get_field('legend_image');
$content_image = get_field('content_image');
if($climate_content):?>
    <div class="seasons_climate">
        <div class="text">
            <h2><?php echo $climate_title; ?></h2>
            <div class="txt">
                <?php echo apply_filters('the_content', $climate_content); ?>
            </div>
            <?php if($legend_image): ?>
                <div class="sc_notes">
                    <img src="<?php echo $legend_image['url']; ?>" alt="">
                </div>
            <?php endif; ?>
        </div>
        <?php if($content_image): ?>
            <div class="img">
                <img src="<?php echo $content_image['url']; ?>" alt="">
            </div>
        <?php endif; ?>
    </div>
<?php endif;
