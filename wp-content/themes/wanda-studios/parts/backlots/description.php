<?php
/**
 * Description for Backlots page
 * @var $section
 */
if($section): ?>
    <div class="hws">
        <ul>
            <?php foreach ($section as $item):?>
                <li>
                    <div class="img">
                        <img src="<?php echo $item['short_description_background']['url']; ?>" alt="">
                    </div>
                    <div class="text">
                        <div class="table">
                            <div class="td">
                                <h3><?php echo $item['title']; ?></h3>
                                <div class="desc">
                                    <?php echo $item['short_section_description']; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif;
