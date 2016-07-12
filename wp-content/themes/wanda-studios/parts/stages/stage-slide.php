<?php
/**
 * Stage slide part
 * @var $tax
 * @var $class
 */
$tax_key = $tax->taxonomy . '_' . $tax->term_id;
$tax_bg = get_field('stage_background', $tax_key);
?>
<div class="slide <?php echo $class; ?>" data-hash="<?php $tax->name; ?>">
    <div class="big_pic up" style="background-image: url(<?php echo $tax_bg['url']; ?>)"></div>
</div>