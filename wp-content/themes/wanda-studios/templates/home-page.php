<?php
/**
 * Template name: Home Page
 */
get_header();
$id = get_the_ID();
?>
<div class="wrapper">
    <?php 
        // First homepage screen 
        show_template('home/first-screen', array('id' => $id));

        // Slide list
        if($section_list = get_field('section_list')){
            foreach ($section_list as $item){
                show_template('home/slide', array('section'=>$item));
            }
            echo '<div class="screen_slide screen_slide_hidden screen_slide_active"></div>';
            // Screen slide

            foreach ($section_list as $item){
                show_template('home/screen-slide', array('section'=>$item));
            }
            // Nav container
            show_template('home/nav-container', array('count'=> count($section_list)));
        }

    ?>
</div>
<?php 
get_footer();