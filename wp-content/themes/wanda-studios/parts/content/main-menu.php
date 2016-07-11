<?php
/**
 * Main menu
 */
?>
<div class="main_nav">
    <div class="main_nav_inner">
        <div class="main_nav_box">
            <!-- Cut into form.php -->
            <div class="search_form">
                <form>
                    <input type="text" placeholder="Search by keyword..."/>
                    <span class="icon-60"></span>
                    <input type="submit" value=""/>
                </form>
            </div>
            <!-- -->
            <div class="main_nav_list">
                <div class="left"></div>
                <div class="meddle"></div>
                <div class="right"></div>
                <div class="clear"></div>
            </div>
            <?php show_template('content/lang-switcher'); ?>
        </div>
    </div>
    <div class="main_nav_header">
        <a href="<?php echo get_bloginfo('url') ?>" class="main_nav_logo">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/wanda-top-red.svg" alt=""> 
        </a>
        <a href="#" class="main_nav_close"><span class="icon-59"></span></a>
    </div>
</div>
