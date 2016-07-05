<?php
/**
* @var $section
 */
if($section):?>
    <div class="screen_slide" data-hash="<?php echo str_replace(array(' ', "\r\n", "\n", "\r"), array('_'), strip_tags($section['title'])); ?>">
        <div class="screen_tile" style="background-color: <?php echo $section['line_color']?:'#fff'; ?>"></div>
        <div class="table">
            <div class="td">
                <div class="screen">
                    <div class="screen_inner">
                        <h2><?php echo $section['title']?:''; ?></h2>
                        <div class="text">
                            <?php echo $section['description']?:''; ?>
                        </div>
                        <?php if($section['description_link_page'] && $section['description_link_title']): ?>
                            <a href="<?php echo $section['description_link_page']?:'#' ?>" class="btn red_btn incentive_btn">
                                <?php echo $section['description_link_title']?:''; ?>
                            </a>
                        <?php endif; ?>
                        <?php if($section['3d_map_link']): ?>
                            <a href="#lightbox" data-id="<?php echo $section['3d_map_link'] ?>" class="btn hover_btn map_btn lightbox_btn">
                                <span>
                                    <?php echo _w('View 3D Map'); ?><span class="icon-8"></span>
                                </span></a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="side">
            <div class="table">
                <div class="td">
                    <a href="<?php echo $section['detail_link_page']?:''; ?>">
                        <div class="title animate_up">
                            <?php echo $section['detail_link_title']?:''; ?>
                        </div>
                        <div class="ico animate_up">
                            <span class="icon-9"></span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
<?php endif;