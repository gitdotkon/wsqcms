<?php
/**
 * @var $stage_tax_name
 * @var $stage_tax_size_m
 * @var $stage_tax_size_ft
 */
?>
<?php if($map = get_field('3d_map')): ?>
    <a href="#lightbox" data-id="<?php echo $map; ?>" class="btn map_btn lightbox_btn">
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
            <h3><?php echo $stage_tax_size_m . __('sqm') . $stage_tax_size_ft . __('sqf'); ?></h3>
            <div class="stage-desc">
                <strong><?php echo __('Connected with ') . get_the_title(); ?></strong>
                <?php the_content(); ?>
            </div>
            <a href="" class="btn hover_btn btn_mr_30 btn_hide" target="_blank">
                <span><?php _w('Download CAD Map'); ?></span>
            </a>
            <a href="" class="btn hover_btn" target="_blank">
                <span><?php _w('Download PDF Map'); ?></span>
            </a>
        </div>
    </div>
    
</div>

