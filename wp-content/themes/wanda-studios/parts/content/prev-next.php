<?php
/**
 * PrevNext parts
 */
// Left link info
$left_link = get_field('left_page_link');
$left_link_title = get_field('left_title');
$left_link_background = get_field('left_background_image');
// Right link info
$right_link = get_field('right_page_link');
$right_link_title = get_field('right_title');
$right_link_background = get_field('right_background_image');

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
