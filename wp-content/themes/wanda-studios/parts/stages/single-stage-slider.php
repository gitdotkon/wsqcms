<?php
/**
 * Slider for Stage detail page
 */
$slides = get_field('slides');
?>
<div class="stage_detail_slider normal_slider">
    <div class="flexslider">
        <ul>
            <?php foreach ($slides as $slide): ?>
                <li style="background-image: url(<?php echo $slide['image']['url']; ?>)">
                    <img src="<?php echo $slide['image']['url']; ?>" alt="">
                    <div class="text hide-for-html"><?php echo $slide['title']; ?></div>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>
