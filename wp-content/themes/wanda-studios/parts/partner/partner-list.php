<?php
/**
 * Partners log for partner directory page
 * @var $section
 */
if($section):
    ?>
    <div class="block_box vendors_tenants">
        <h2><?php echo $section['content_title']; ?></h2>
        <div class="text"><?php echo $section['description']; ?></div>
        <?php if($section['partner_logo_list']):
            $logo_parts = array_chunk($section['partner_logo_list'], 5);
            foreach ($logo_parts as $part): ?>
                <ul>
                    <?php foreach ($part as $item): ?>
                        <li>
                            <a href="<?php echo  $item['url']?:'#'; ?>">
                                <div class="table">
                                    <div class="td">
                                        <img src="<?php echo  $item['image']['url']; ?>" alt="">
                                    </div>
                                </div>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endforeach; ?>

        <?php endif; ?>
    </div>
<?php endif;
