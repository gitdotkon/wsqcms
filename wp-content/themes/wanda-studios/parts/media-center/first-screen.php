<?php
/**
 * First screen for Media Center page
 * @var $links array
 * @var $btn_class;
 */
$background = get_field('background');
if($background):?>
    <div class="first-screen facilities-page-screen">
        <div class="desktop-bg full-bg" style="background-image: url(<?php echo $background['url']; ?>)"></div>
        <div class="mobile-bg full-bg"  style="background-image: url(<?php echo $background['sizes']['large']; ?>)"></div>
        <div class="table home_screen">
            <div class="td">
                <h1 class="animate_up">
                    <?php the_title(); ?>
                </h1>
                <div class="screen_btns">
                    <div class="animate_up ">
                        <a href="#news" class="hover_btn workshop_btn sync-item">
                            <div class="table">
                                <div class="td">
                                    <?php _w('News'); ?>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="animate_up">
                        <a href="#photo" class="hover_btn workshop_btn sync-item">
                            <div class="table">
                                <div class="td">
                                    <?php _w('Photo <br>Gallery'); ?>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="animate_up">
                        <a href="#video" class="hover_btn workshop_btn sync-item">
                            <div class="table">
                                <div class="td">
                                    <?php _w('Video <br> Gallery'); ?>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <a href="#" class="dark next_screen next_screen_trigger" id="next_screen">
            <span class="next_screen_mouse">
                <span class="next_screen_mousewheel">
                </span>
            </span>
        </a>
    </div>
<?php endif;
