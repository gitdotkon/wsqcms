<?php
/**
 * Spec table
 * @var $stage_tax_size_m
 * @var $stage_tax_size_ft
 */
?>
<div class="specs">
    <div class="specs_inner">
        <div class="table">
            <div class="td">
                <h3><?php _w('Stage Specifications'); ?></h3>
                <div class="specs_list">
                    <ul>
                        <li>
                            <div class="label">
                                <span><?php _w('Stage Size'); ?></span>
                            </div>
                            <div class="spec"><?php echo $stage_tax_size_m . 'sqm/' . $stage_tax_size_ft . 'sqf'; ?></div>
                            <div class="clear"></div>
                            <span class="dot"></span>
                        </li>
                        <?php if($dimensions = get_field('dimensions')): ?>
                            <li>
                                <div class="label">
                                    <span><?php _w('Dimensions') ?></span>
                                </div>
                                <div class="spec"><?php echo $dimensions; ?></div>
                                <div class="clear"></div>
                                <span class="dot"></span>
                            </li>
                        <?php endif; ?>
                        <?php if($height = get_field('height')): ?>
                            <li>
                                <div class="label">
                                    <span><?php _w('Height'); ?></span>
                                </div>
                                <div class="spec"><?php echo $height; ?></div>
                                <div class="clear"></div>
                                <span class="dot"></span>
                            </li>
                        <?php endif; ?>
                        <?php if($electrical = get_field('electrical')): ?>
                            <li>
                                <div class="label">
                                    <span><?php _w('Electrical'); ?></span>
                                </div>
                                <div class="spec">
                                    <?php show_spec($electrical); ?>
                                </div>
                                <div class="clear"></div>
                                <span class="dot"></span>
                            </li>
                        <?php endif; ?>
                        <?php if($pit = get_field('pit')): ?>
                            <li>
                                <div class="label">
                                    <span><?php _w('Pit'); ?></span>
                                </div>
                                <div class="spec"><?php echo $pit; ?></div>
                                <div class="clear"></div>
                                <span class="dot"></span>
                            </li>
                        <?php endif; ?>
                        <?php if($support_rooms = get_field('support_rooms')): ?>
                            <li>
                                <div class="label">
                                    <span><?php _w('Support Rooms'); ?></span>
                                </div>
                                <div class="spec"><?php show_spec($support_rooms); ?></div>
                                <div class="clear"></div>
                                <span class="dot"></span>
                            </li>
                        <?php endif; ?>
                        <?php if($air_conditioning = get_field('air_conditioning')): ?>
                            <li>
                                <div class="label">
                                    <span><?php _w('Air conditioning'); ?></span>
                                </div>
                                <div class="spec"><?php echo $air_conditioning; ?></div>
                                <div class="clear"></div>
                                <span class="dot"></span>
                            </li>
                        <?php endif; ?>
                        <?php if($nr_rating = get_field('nr_rating')): ?>
                            <li>
                                <div class="label">
                                    <span><?php _w('NR Rating'); ?></span>
                                </div>
                                <div class="spec"><?php echo $nr_rating; ?></div>
                                <div class="clear"></div>
                                <span class="dot"></span>
                            </li>
                        <?php endif; ?>
                        <?php if($stage_door = get_field('stage_door')): ?>
                            <li>
                                <div class="label">
                                    <span><?php _w('Stage Door') ?></span>
                                </div>
                                <div class="spec"><?php echo $stage_door; ?></div>
                                <div class="clear"></div>
                                <span class="dot"></span>
                            </li>
                        <?php endif; ?>
                        <?php if($ittelecoms = get_field('ittelecoms')): ?>
                            <li>
                                <div class="label">
                                    <span><?php _w('IT/Telecoms') ?></span>
                                </div>
                                <div class="spec"><?php show_spec($ittelecoms); ?></div>
                                <div class="clear"></div>
                                <span class="dot"></span>
                            </li>
                        <?php endif; ?>
                        <?php if($miscellaneous = get_field('miscellaneous')): ?>
                            <li>
                                <div class="label">
                                    <span><?php _w('Miscellaneous'); ?></span>
                                </div>
                                <div class="spec"><?php show_spec($miscellaneous); ?></div>
                                <div class="clear"></div>
                                <span class="dot"></span>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>