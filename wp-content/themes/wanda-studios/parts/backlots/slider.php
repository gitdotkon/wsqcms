<?php
/**
 * Slider for Backlots page
 * @var $section
 */
if($section && !empty($section['slider'])):?>
    <div class="stage_detail_slider normal_slider">
        <div class="flexslider">
            <ul>
                <?php foreach ($section['slider'] as $slide): ?>
                    <li>
                        <img src="<?php echo $slide['image']['url']; ?>" alt="">
                        <div class="text hide-for-html"><?php echo $slide['caption']; ?></div>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
<?php endif;
