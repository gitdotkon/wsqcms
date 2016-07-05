<?php
/**
 * Features section for Backlots page
 * @var $section
 */
if(!empty($section['features_list'])):?>
    <div class="red_cols">
        <?php $parts = array_chunk($section['features_list'], 3); ?>
        <?php foreach ($parts as $part): ?>
            <div class="red_cols_inner">
                <div class="red_cols_ul">
                    <ul>
                        <?php foreach ($part as $item): ?>
                            <li>
                                <div class="ico">
                                    <span class="<?php echo $item['icon']; ?>"></span>
                                </div>
                                <div class="text"><?php echo $item['text']; ?></div>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif;
