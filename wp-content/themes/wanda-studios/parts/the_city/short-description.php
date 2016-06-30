<?php
/**
 * Short description for City page
 */
$description_list = get_field('description_list');
if($description_list):?>
    <div class="about_cols">
        <?php foreach ($description_list as $key => $list): ?>
            <div class="about_col <?php if(reset($description_list) != $list){echo ' about_col_' . ($key+1);} ?>">
                <h3><?php echo $list['title']; ?></h3>
                <?php if(isset($list['list'])): ?>
                    <ul>
                        <?php foreach ($list['list'] as $item): ?>
                            <li>
                                <div class="red"><?php echo $item['title'] ?></div>
                                <?php echo $item['description'] ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif;
