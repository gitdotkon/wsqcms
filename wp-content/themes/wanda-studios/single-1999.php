<?php
/**
 * The template for displaying all single posts and attachments
 *
 */
get_header();
if(have_posts()){
    while(have_posts()){
        the_post();
        // Header
        show_template('content/white-header', array('class' => 'fixed white-header'));
        ?>
        <div class="press_detail">
            <div class="press_detail_inner">
                <div class="back_box">
                    <a href="<?php echo get_field('news_page_link', 'options')?get_field('news_page_link', 'options').'#news':"#"; ?>" class="back_btn">
                        <?php _w('Back'); ?>
                        <span class="icon-7"></span>
                    </a>
                </div>
                <div class="detail_title_box">
                    <h1 class="detail_title"><?php the_title(); ?></h1>
                    <?php show_template('content/share-round'); ?>
                </div>
                <div class="detail_meta">
                </div>
                <div class="content">
                    <?php if(has_post_thumbnail()): ?>
                        <p class="img-wrapper">
                            <?php the_post_thumbnail(); ?>
                        </p>
                    <?php endif; ?>
                    <?php the_content(); ?>
                </div>
            </div>
        </div>
        <?php
    }
}
get_footer();
