<?php
/**
 * @var $stage_tax_name
 * @var $stage_tax_size_m
 * @var $stage_tax_size_ft
 */
?>
<?php if($map = get_field('3d_map')): ?>
    <a href="<?php echo $map; ?>" data-id="<?php echo $map; ?>" target="_blank" class="go-to btn map_btn lightbox_btn">
            <span><?php _w('View 3D Map'); ?>
                <span class="icon-8"></span>
            </span>
    </a>
<?php endif; ?>
<div class="text_box">
    <div class="table">
        <div class="td">
            <div class="stage_screen_tile"></div>
            <h2><?php the_title(); ?></h2>
            <h3><?php echo $stage_tax_size_m . __('sqm'). ' / ' . $stage_tax_size_ft . __('sqf'); ?></h3>
            <div class="stage-desc">
                <?php if($c_title = get_field('c_title')): ?>
                    <strong><?php echo $c_title; ?></strong><?php //echo __('Connected with ') . get_the_title(); ?>
                <?php endif; ?>

                <?php the_content(); ?>
            </div>
            <?php if($cad_map = get_field('cad_map')): ?>
                <a href="<?php echo $cad_map['url']; ?>" class="btn hover_btn btn_mr_30 btn_hide" target="_blank" download>
                    <span><?php _w('CAD Drawing'); ?></span>
                </a>
            <?php endif; ?>
            <?php if($pdf_map = get_field('pdf_map')): ?>
                <a href="<?php echo $pdf_map['url']; ?>" class="btn hover_btn" target="_blank" download>
                    <span><?php _w('Download PDF Profile'); ?></span>
                </a>
            <?php endif; ?>

        </div>
    </div>
    
</div>

