<?php
/**
 * Template name: Facilities Page
 */
get_header();
$page_list = get_field('page_list');
if($page_list):?>
    <div class="wrapper">
        <div class="image-container" id="fade-image">
            <?php foreach ($page_list as $page): ?>
                <?php if($page['background_image']): ?>
                    <div class="img <?php if(reset($page_list) == $page){echo 'active';} ?>" style="background-image: url(<?php echo $page['background_image']['url']; ?>)"> </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
        <ul class="page-list-description" id="page_list_desc">
            <?php foreach ($page_list as $page): ?>
                <li>
                    <div class="mobile_bg" style="background-image: url(<?php echo $page['background_image']['sizes']['large']; ?>)">

                    </div>
                    <a href="<?php echo get_permalink($page['page_link'])?:'#'; ?>">
                        <div class="table">
                            <div class="td">
                                <h2><?php echo $page['title']; ?></h2>
                                <div class="txt">
                                    <div class="txt_inner">
                                        <div class="txt_inner_box">
                                            <div class="text">
                                                <?php echo $page['subtitle']; ?>
                                            </div>
                                            <span class="btn_medium">
                                                <?php _w('View'); ?>
                                            </span>
                                        </div>
                                        <div class="txt_hover">
                                            <div class="text">
                                                <?php echo $page['subtitle']; ?>
                                            </div>
                                            <span class="btn_medium">
                                                <?php _w('View'); ?>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
        <?php show_template('content/white-header', array('class' => 'simple-header')); ?>
        <script>
            (function($){
                $(document).ready(function(){

                });
            })(jQuery);
        </script>
    </div>
<?php endif;
get_footer();