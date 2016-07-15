<?php
/**
 * Single Stage detail
 */
$stage_tax           = get_the_terms(get_the_ID(), 'stage_cat');
$stage_tax           = $stage_tax[0];
$stage_tax_key       = $stage_tax->taxonomy . '_' .$stage_tax->term_id;
$stage_tax_bg        = get_field('stage_background', $stage_tax_key);
$stage_tax_name      = $stage_tax->name;
$stage_tax_size_m    = get_field('stage_size_m', $stage_tax_key);
$stage_tax_size_ft   = get_field('stage_size_ft', $stage_tax_key);

if($stage_tax):?>
    <div class="stage_box" style="background-image: url(<?php echo $stage_tax_bg['url']; ?>)">
        <?php
            show_template('stages/single-stage-description', array(
                'stage_tax_name' => $stage_tax_name,
                'stage_tax_size_m' => $stage_tax_size_m,
                'stage_tax_size_ft' => $stage_tax_size_ft
            ));
            show_template('stages/single-stage-spec', array(
                'stage_tax_size_m' => $stage_tax_size_m,
                'stage_tax_size_ft' => $stage_tax_size_ft
            ));
        ?>
    </div>
<?php endif;
