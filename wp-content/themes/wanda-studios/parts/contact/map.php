<?php
/**
 * Map for Contact us
 */
$latitude = get_field('latitude');
$longitude = get_field('longitude');
$map = get_field('map_image');
?>
<?php if($map = get_field('map_image')): ?>
    <div class="map">
        <img src="<?php echo $map['url']; ?>" alt="">
    </div>
<?php endif; ?>
<?php if($mobile_map = get_field('mobile_map_image')): ?>
    <div class="map mobile-map">
        <img src="<?php echo $mobile_map['url']; ?>" alt="">
    </div>
<?php endif; ?>

