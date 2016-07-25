<?php
/**
 * Tile section for workshop page
 */
$section_list = get_field('section_list');
if($section_list):?>
    <div class="tab tab-active tab_tile">
        <div class="work_shops four-tile" id="workshop_four_tile">
            <?php foreach ($section_list as $section): ?>
                <div class="work_shops_tile" style="background-image: url(<?php echo $section['background_preview']['url']; ?>)" id="<?php echo prepare_id($section['title']); ?>">
                    <div class="work_shop">
                        <div class="title">
                            <div class="table">
                                <div class="td">
                                    <h2><?php echo $section['title']; ?></h2>
                                    <span class="btn_medium">
                                        <?php _w('View'); ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
<?php endif;
