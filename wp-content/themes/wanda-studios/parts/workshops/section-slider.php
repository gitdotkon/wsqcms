<?php
/**
 * Section slider for Workshop page
 */
$section_list = get_field('section_list');
if($section_list):?>
    <div class="tab tab_slider">
        <div class="work_shops" id="workshops_slider">
            <div class="flexslider">
                <ul class="slides">
                    <?php foreach ($section_list as $section): ?>
                        <li>
                            <div class="work_shop">
                                <div class="title">
                                    <div class="table">
                                        <div class="td">
                                            <h2><?php echo $section['title']; ?></h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="text">
                                    <div class="table">
                                        <div class="td">
                                            <div class="text_inner">
                                                <?php echo apply_filters('the_content', $section['content']); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <a href="#" class="work_shops_close">
                <span class="icon-59"></span>
            </a>
        </div>
    </div>
<?php endif;
