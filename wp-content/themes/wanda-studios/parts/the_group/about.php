<?php
/**
 * About Screen for Group page
 */
$about_title = get_field('about_title');
$about_background = get_field('about_background');
$about_content = get_field('about_content');
if($about_title):?>
    <div class="stage_box hr_box">
        <div class="hw_img_bg">
            <div class="hw_img_bg_inner" style="background-image: url(<?php echo $about_background['url']; ?>)">

            </div>
        </div>
        <div class="block_box_title_wrapper">
            <div class="table">
                <div class="td">
                    <h2><?php echo $about_title; ?></h2>
                </div>
            </div>
        </div>
        <?php if($about_content): ?>
            <div class="specs">
                <div class="specs_inner">
                    <div class="table">
                        <div class="td">
                            <div class="specs_list" id="round">
                                <ul>
                                    <?php foreach ($about_content as $item): ?>
                                        <li class="text-line">
                                            <strong><?php echo $item['subtitle']; ?></strong>
                                            <?php if(count($item['content_list'])>1): ?>
                                                <ul>
                                                    <?php foreach ($item['content_list'] as $content): ?>
                                                        <li>
                                                            <?php echo $content['text_line']; ?>
                                                        </li>
                                                    <?php endforeach; ?>
                                                </ul>
                                            <?php else: ?>
                                                <?php echo $item['content_list'][0]['text_line']; ?>
                                            <?php endif; ?>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
<?php endif;
