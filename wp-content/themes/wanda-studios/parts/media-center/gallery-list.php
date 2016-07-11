<?php
/**
 * Gallery list for Media page
 */
$post_per_page = 6;
$post_count = wp_count_posts('gallery');
$post_count = (int)$post_count->publish;

$args = array(
    'post_type' => 'gallery',
    'posts_per_page' => $post_per_page
);
$gallery_list = get_query_posts($args);
if($gallery_list):?>
    <div class="gallery photo_gallery">
        <div class="gallery_inner">
            <input type="hidden" id="gallery_per_page" value="<?php echo $post_per_page; ?>">
            <input type="hidden" id="gallery_count" value="<?php echo $post_per_page; ?>">
            <ul id="gallery_container">
                <?php foreach ($gallery_list as $key => $gallery):
                    $gallery_images = get_field('images', $gallery->ID);
                    if($gallery_images):?>
                        <li <?php if($key%3 == 0){echo 'class="no_ml"';} ?>>
                            <a href="#lightbox3" class="show_gallery view_video">
                                <div class="img" style="background-image: url(<?php echo $gallery_images[0]['url']?:get_stylesheet_directory_uri().'/images/gallery.jpg'; ?>)">
                                    <div class="text">
                                        <div class="table">
                                            <div class="td">
                                                <h3><?php echo $gallery->post_title; ?></h3>
                                                <div class="desc">(<?php echo count($gallery_images); ?>)</div>
                                                <span class="view_btn"><?php _w('View'); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                    <?php endif; ?>
                <?php endforeach; ?>
            </ul>
            <div class="load_more" style="<?php if($post_count <= $post_per_page){echo 'display: none;';} ?>">
                <a href="#" class="load_more_btn" id="more_gallery"><?php _w('View More'); ?></a>
            </div>
        </div>
        <script id="gallery-item" type="text/template">
            <% _.each(galleries, function(item, index){ %>
            <li>
                <a href="#lightbox3" class="show_gallery view_video" data-id="<%= item.file %>">
                    <div class="img" style="background-image: url(<%= item.thumb %>)">
                        <div class="text">
                            <div class="table">
                                <div class="td">
                                    <h3><%= item.title %></h3>
                                    <div class="desc">(<%= item.count %>)</div>
                                    <span class="view_btn"><?php _w('View'); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </li>
            <% }); %>
        </script>
    </div>
<?php endif;
