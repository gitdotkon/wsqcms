<?php
/**
 * Video list for Media page
 */
$post_per_page = 6;
$post_count = wp_count_posts('video');
$post_count = (int)$post_count->publish;
$args = array(
    'post_type' => 'video',
    'posts_per_page' => $post_per_page
);
$video_list = get_query_posts($args);
if($video_list): ?>
    <div class="gallery gallery_videos">
        <div class="gallery_inner">
            <input type="hidden" id="video_per_page" value="<?php echo $post_per_page; ?>">
            <input type="hidden" id="videos_count" value="<?php echo $post_per_page; ?>">
            <ul id="video_container">
            <?php foreach ($video_list as $key => $video):
                $video_file = get_field('video', $video->ID);
                ?>
                <li <?php if($key%3 == 0){echo 'class="no_ml"';} ?>>
                    <a href="#lightbox2" class="video-gallery view_video" data-id="<?php echo $video_file; ?>">
                        <div class="img" style="background-image: url(<?php echo get_attached_img_url($video->ID)?:get_stylesheet_directory_uri().'/images/gallery.jpg'; ?>)">
                            <div class="text">
                                <div class="table">
                                    <div class="td">
                                        <div class="video_title">
                                            <?php echo $video->post_title; ?>
                                            <span class="icon-22"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </li>
            <?php endforeach; ?>
            </ul>
            <div class="load_more" style="<?php if($post_count <= $post_per_page){echo 'display: none;';} ?>">
                <a href="" class="load_more_btn" id="more_video"><?php _w('View More'); ?></a>
            </div>
        </div>
        <script id="video-item" type="text/template">
            <% _.each(videos, function(item, index){ %>
                <li>
                    <a href="#lightbox2" class="video-gallery view_video" data-id="<%= item.file %>">
                        <div class="img" style="background-image: url(<%= item.thumb %>)">
                            <div class="text">
                                <div class="table">
                                    <div class="td">
                                        <div class="video_title">
                                            <%= item.title %>
                                            <span class="icon-22"></span>
                                        </div>
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