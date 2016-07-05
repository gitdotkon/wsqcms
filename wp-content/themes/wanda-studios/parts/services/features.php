<?php
/**
 * Features list for Services page
 * @var $data
 */
if($data && !empty($data['features_list'])): ?>
    <div class="block pre_production">
        <h2><?php echo $data['title']; ?></h2>
        <div class="pre_production_inner">
            <ul>
                <?php foreach ($data['features_list'] as $key => $item): ?>
                    <li>
                        <div class="icon icon_<?php echo $key+1; ?>">
                            <span class="<?php echo $item['icon']; ?>"></span>
                        </div>
                        <div class="line_title"><?php echo $item['title']; ?></div>
                        <?php echo $item['detail']; ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
<?php endif;
