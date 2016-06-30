<?php
/**
 * Holdings section for Group page
 */
$holdings_title = get_field('holdings_title');
$logos = get_field('logos');
$holdings_background = get_field('holdings_background');
if($logos && $holdings_title && $holdings_background):?>
    <div class="block_box vendors_tenants holdings fixed_full_bg" style="background-image: url(<?php echo $holdings_background['url']; ?>)">
        <h2><?php echo $holdings_title; ?></h2>
        <ul>
            <?php foreach ($logos as $logo): ?>
                <li>
                    <div class="table">
                        <div class="td">
                            <img src="<?php echo $logo['url']; ?>" alt="">
                        </div>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif;
