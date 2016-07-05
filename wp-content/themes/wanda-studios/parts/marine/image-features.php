<?php
/**
 * Image features for Marine page
 * @var $section
 */
if($section && !empty($section['image_features'])):?>
    <div class="three_cols">
        <ul>
            <?php foreach ($section['image_features'] as $image_feature): ?>
                <li style="background-image: url(<?php echo $image_feature['background_image']['url']; ?>)">
                    <div class="text">
                        <div class="table">
                            <div class="td">
                                <div class="text_box">
                                    <?php echo $image_feature['title'] ?>
                                </div>
                                <?php if(!empty($image_feature['subtitle'])): ?>
                                    <div class="three_cols_subtitle">
                                        <?php echo $image_feature['subtitle']; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif;

