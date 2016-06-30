<?php
/**
 * Properties section for Group page
 */
$property_title = get_field('property_title');
$property_subtitle = get_field('property_subtitle');
$property_list = get_field('property_list');
if($property_list):?>
    <div class="group_properties">
        <div class="group_properties_inner">
            <h2><?php echo $property_title; ?></h2>
            <?php echo $property_subtitle; ?>
            <div class="group_property_ul">
                <ul>
                    <?php foreach ($property_list as $key => $list): ?>
                        <li class="group_property_<?php echo $key+1; ?>">
                            <img src="<?php echo $list['image']['url'] ?>" alt="<?php echo $list['title']; ?>">
                            <span><?php echo $list['title']; ?></span>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
<?php endif;
