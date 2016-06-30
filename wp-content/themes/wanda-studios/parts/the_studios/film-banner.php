<?php
/**
 * Film banner slider with Studios page
 */
$film_banner = get_field('banners');
$film_bg = get_field('banner_background');
if($film_banner):?>
    <div class="film-banner">
        <div class="carousel_slider owl-carousel" style="background-image: url(<?php echo $film_bg['url']; ?>)">
            <?php foreach ($film_banner as $item): ?>
                <div class="carousel_item">
                    <img src="<?php echo $item['url']; ?>" alt="<?php echo $item['title']; ?>">
                </div>
            <?php endforeach; ?>
        </div>
    </div>
<?php endif;
