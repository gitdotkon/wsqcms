<?php
/**
 * Template name: Test Page
 */
get_header();
    for($i=1; $i<100; $i++){
        echo '<span style="color: #000; display: inline-block; font-size: 40px; margin: 20px;" class="icon-'.$i.'"></span>';
    }
get_footer();?>
