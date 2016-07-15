<?php
/**
 * PrevNext parts
 */

if(is_singular('stage')){
    // Left link info
    $stage_tax = get_the_terms(get_the_ID(), 'stage_cat');
    $stage_tax           = $stage_tax[0];
    $left_link = get_field('stage_prev_link_url', 'options') . '#' . $stage_tax->name;
    $left_link_title = get_field('stage_prev_title', 'options');
    $left_link_background = get_field('stage_prev_background', 'options');
// Right link info
    $right_link = get_field('stage_next_link_url', 'options');
    $right_link_title = get_field('stage_next_title', 'options');
    $right_link_background = get_field('stage_next_background', 'options');
}else{
    // Left link info
    $left_link = get_field('left_page_link');
    $left_link_title = get_field('left_title');
    $left_link_background = get_field('left_background_image');
// Right link info
    $right_link = get_field('right_page_link');
    $right_link_title = get_field('right_title');
    $right_link_background = get_field('right_background_image');
}

if($left_link_background || $right_link_background):?>
    <div class="page-nav-container">
        <?php if($left_link_background): ?>
            <a href="<?php echo $left_link?:'#'; ?>" class="left-nav-link nav-link" >
                <div class="bg" style="background-image: url(<?php echo $left_link_background['url']; ?>)"></div>
                <div class="table">
                    <div class="td">
                        <span class="round-icon icon-11"></span>
                        <span class="nav-title">
                            <?php echo $left_link_title; ?>
                        </span>
                    </div>
                </div>
            </a>
        <?php endif; ?>
        <?php if($right_link_background): ?>
            <a href="<?php echo $right_link?:'#'; ?>"  class="right-nav-link nav-link" >
                <div class="bg" style="background-image: url(<?php echo $right_link_background['url']; ?>);"></div>
                <div class="table">
                    <div class="td">
                        <span class="nav-title">
                            <?php echo $right_link_title; ?>
                        </span>
                        <span class="round-icon icon-9"></span>
                    </div>
                </div>
            </a>
        <?php endif; ?>
    </div>
<?php endif;
