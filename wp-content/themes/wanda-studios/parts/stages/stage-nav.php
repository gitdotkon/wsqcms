<?php
/**
 * Stage nav
 * @var $stage_cat
 */
?>
<div class="stage_screen_tile"></div>
<div class="stage_nav_container">
    <div class="dot_ul_wrapper">
        <div class="dot_ul_container">
            <ul class="dot_ul">
                <?php foreach ($stage_cat as $tax):
                    $stage_tax_key       = $tax->taxonomy . '_' . $tax->term_id;
                    $stage_tax_size_m    = get_field('stage_size_m', $stage_tax_key);
                    $stage_tax_size_ft   = get_field('stage_size_ft', $stage_tax_key);
                    ?>
                    <li>
                        <div class="stage_nav">
                            <div class="stage_nav_inner">

                            </div>
                            <span class="dot"></span>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
    <ul class="text_ul">
        <?php foreach ($stage_cat as $tax):
        $stage_tax_key       = $tax->taxonomy . '_' . $tax->term_id;
        $stage_tax_size_m    = get_field('stage_size_m', $stage_tax_key);
        $stage_tax_size_ft   = get_field('stage_size_ft', $stage_tax_key);
            $count = get_count_stage($tax->term_id);
        ?>
            <li>
                <div class="stage_nav">
                    <div class="a">
                        <div class="table">
                            <div class="td">
                                <div class="stage_nav_span">
                                    <?php echo get_word($count) . ' (' . $count . ')';
                                    ?>
                                    <small>
                                        <?php echo $stage_tax_size_m . __('m') . '<sup>2</sup>/' . $stage_tax_size_ft . __('ft') . '<sup>2</sup>'; ?>
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="#" class="stage_nav_a"></a>
            </li>
        <?php endforeach; ?>
    </ul>
</div>
