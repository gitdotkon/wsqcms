<?php
/**
 * Template name: Careers Page
 * @var $post WP_Post
 */
get_header();
if(have_posts()){
    while(have_posts()){
        the_post();
        // Header
        show_template('content/header-with-filter');
        // First screen
        show_template('careers/first-screen');

        $args = array(
            'post_type' => 'career',
            'posts_per_page' => -1
        );
        $careers = get_query_posts($args);
        if($careers):?>
            <div class="mobile_filter_box">
                <?php show_template('careers/filter-box'); ?>
            </div>
            <div class="careers" id="job_list">
                <div class="careers_inner">
                    <?php foreach ($careers as $career):
                        $location = get_the_terms($career->ID, 'area');
                        ?>
                        <div class="job" data-apply="<?php echo get_field('apply', $career->ID); ?>" data-location="<?php echo strtolower($location[0]->name); ?>" data-title="<?php echo strtolower(str_replace(' ', '_', $career->post_title)); ?>">
                            <div class="title">
                                <?php echo $career->post_title; ?>
                                <div class="job_toggle">
                                    <?php _w('Area: '); echo $location[0]->name; ?>
                                    <span class="icon">
                                        <span class="icon-54"></span>
                                        <span class="icon-55"></span>
                                    </span>
                                </div>
                            </div>
                            <div class="desc">
                                <div class="desc_inner">
                                    <div class="desc_div">
                                        <h3><?php _w('Responsibility'); ?></h3>
                                        <?php echo apply_filters('the_content', get_field('responsibility', $career->ID)); ?>
                                    </div>
                                    <div class="desc_div desc_div_fr">
                                        <h3><?php _w('Qualification'); ?></h3>
                                        <?php echo apply_filters('the_content', get_field('qulification', $career->ID)); ?>
                                    </div>
                                    <div class="clear text_center">
                                        <a href="#apply_wrapper_1" class="apply_btn"><?php _w('Apply'); ?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="apply_wrapper" id="apply_wrapper_1">
                <div class="table">
                    <div class="td">
                        <div class="apply_box">
                            <h3><?php _w('Apply for This Position'); ?></h3>
                            <form id="apply_form" enctype="multipart/form-data">
                                <input type="hidden" name="job_title" id="job_title" value=""/>
                                <input type="hidden" name="apply_email" id="apply_email" value=""/>
                                <div class="apply_form_item require">
                                    <input type="text" name="name" placeholder="<?php _w('Name'); ?>"/>
                                    <span class="wrong">
                                        <?php _w('Please enter your name') ?>
                                    </span>
                                </div>
                                <div class="apply_form_item  require">
                                    <input type="text" name="phone" placeholder="<?php _w('Phone'); ?>"/>
                                    <span class="wrong">
                                        <?php _w('The phone number you entered is not valid'); ?>
                                    </span>
                                </div>
                                <div class="apply_form_item  require">
                                    <input type="text" name="email" placeholder="<?php _w('Email'); ?>"/>
                                    <span class="wrong">
                                        <?php _w('The email address you entered is not valid'); ?>
                                    </span>
                                </div>
                                <div class="apply_form_item">
                                    <input type="file" name="file" data-title="<?php _w('Upload Your Resume'); ?>" class="nicefileinput nice"/>
                                </div>
                                <div class="apply_form_item">
                                    <textarea name="message" placeholder="<?php _w('Drop a line...'); ?>"></textarea>
                                </div>
                                <div class="apply_form_item">
                                    <input type="submit" value="<?php _w('Submit'); ?>"/>
                                </div>
                            </form>
                            <a href="#" class="apply_close"></a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif;
    }
}
get_footer();