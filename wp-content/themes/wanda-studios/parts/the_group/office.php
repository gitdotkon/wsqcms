<?php
/**
 * Office section for Group page
 */
$office_title = get_field('office_title');
$office_content = get_field('office_content');
$office_image = get_field('office_image');
if($office_content && $office_title): ?>
    <div class="seasons_climate">
        <div class="text">
            <h2><?php echo $office_title; ?></h2>
            <div class="txt">
                <?php echo apply_filters('the_content', $office_content); ?>
            </div>
        </div>
        <?php if($office_image): ?>
            <div class="img">
                <img src="<?php echo $office_image['url']; ?>" alt="">
            </div>
        <?php endif; ?>
    </div>
<?php endif;
