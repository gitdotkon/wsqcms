<?php
/**
 * Way section
 * @var $section
 */
if($section && !empty($section['ways_title']) && !empty($section['water_tanks'])):?>
    <div class="block block_2">
        <div class="block_inner">
            <h2><?php echo $section['ways_title']; ?></h2>
            <ul>
                <?php foreach ($section['water_tanks'] as $water_tank): ?>
                    <li <?php if(reset($section['water_tanks']) == $water_tank){ echo 'class="no_ml"'; } ?>>
                        <img src="<?php echo $water_tank['image']['url'] ?>" alt="<?php echo $water_tank['caption']; ?>">
                        <?php echo $water_tank['caption']; ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
<?php endif;
