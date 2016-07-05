<?php
/**
 * Description detail for Marine page
 * @var $section
 */
if($section):
    $detail_description_title = $section['detail_description_title'];
    $background = $section['background'];
    $content_description = $section['content_description'];
    ?>
    <div class="fl_specs">
        <div class="img" style="background-image: url(<?php echo $background['url']; ?>)">
            <div class="img_text">
                <div class="table">
                    <div class="td">
                        <h2><?php echo $detail_description_title; ?></h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="text">
            <div class="table">
                <div class="td">
                    <?php
                    $table = $section['table_detail'];
                    //Detail table 
                    show_template('marine/table', array('table' => $table));
                    ?>

                </div>
            </div>
        </div>
    </div>
    <div class="block block_1">
        <div class="block_inner">
            <div class="text">
                <?php echo apply_filters('the_content', $content_description); ?>
            </div>
        </div>
    </div>
<?php endif;