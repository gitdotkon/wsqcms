<?php
/**
 * Main menu
 */
?>
<div class="main_nav">
    <div class="main_nav_inner">
        <div class="main_nav_box">
            <!-- Cut into form.php -->
            <?php get_search_form(); ?>
            <!-- -->
            
            <div class="main_nav_list">
                <div class="left">
                    <?php wp_nav_menu( array( 'theme_location' => 'left-main-menu' )); ?>
                </div>
                <div class="middle">
                    <?php wp_nav_menu( array( 'theme_location' => 'middle-main-menu' )); ?>
                </div>
                <div class="right">
                    <?php wp_nav_menu( array( 'theme_location' => 'right-main-menu' )); ?>
                </div>
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
    <script type="text/template" id="search-item">
        <% _.each(results, function(item, index){ %>
            <div class="result-article">
                <h2><a href="<%= item.url %>"><%= item.title %></a></h2>
                <div class="short">
                    <%= item.excerpt %>
                </div>
            </div>
        <% }); %>
    </script>
</div>
