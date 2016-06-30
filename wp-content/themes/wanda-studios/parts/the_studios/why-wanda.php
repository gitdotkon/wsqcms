<?php
/**
 * Why Wanda Section for Studios page
 */
$why_title = get_field('why_title');
$why_features = get_field('why_features');
if($why_features):?>
    <div class="film_with_us">
        <h2><?php echo $why_title; ?></h2>
        <div class="film_with_us_cols">
            <div class="film_with_us_cols_inner">
                <?php foreach ($why_features as $key => $item): ?>
                    <div class="film_with_us_col film_with_us_col_<?php echo $key++; ?>">
                        <h3>
                            <div class="table">
                                <div class="td">
                                    <?php echo $item['title']; ?>
                                </div>
                            </div>
                            <span class="<?php echo $item['icon']; ?>"></span>
                        </h3>

                            <?php if($item['texts']): ?>
                                <ul>
                                    <?php foreach ($item['texts'] as $text): ?>
                                        <li>
                                            <?php echo strip_tags($text['content']); ?>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>

                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
<?php endif;
