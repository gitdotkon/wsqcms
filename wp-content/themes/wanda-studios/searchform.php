<?php
?>
<div class="search_form">
<!--    <a href="#" id="close_search" class="close_search"><span class="icon-7"></span>--><?php //_w('Back'); ?><!--</a>-->
    <form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ) ?>">
        <input type="text" name="s" id="s" placeholder="<?php _w('Search by keyword...'); ?>" value="<?php echo get_search_query() ?>"/>
        <span class="icon-60"></span>
        <input type="submit" id="searchsubmit" value=""/>
    </form>
</div>
