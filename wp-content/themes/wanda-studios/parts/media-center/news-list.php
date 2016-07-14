<?php
/**
 * News list for Media Center page
 */
$post_per_page = 6;
$post_count = wp_count_posts('post');
$post_count = (int)$post_count->publish;
$post_cats = get_categories(array('type' => 'post'));
$args = array(
    'post_type' => 'post',
    'posts_per_page' => $post_per_page
);
if($_GET['cat']){
    $args['category_name'] = $_GET['cat'];
}
$news_list = get_query_posts($args);
if($_GET['cat']){
    $post_count = count($news_list);
}
if($news_list):?>
    <div class="news">
        <?php if($post_cats): ?>
            <select  class="sub-cat" id="mobile_sub-cat">
                <option value=""><?php echo _('All'); ?></option>
                <?php foreach ($post_cats as $post_cat): ?>
                    <option value="<?php echo $post_cat->slug ?>" <?php if($_GET['cat'] == $post_cat->slug){echo 'selected'; } ?>>
                        <?php echo $post_cat->name; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        <?php endif; ?>
        <div class="news_inner" id="news_container">
            <input type="hidden" id="news_per_page" value="<?php echo $post_per_page; ?>">
            <input type="hidden" id="news_count" value="<?php if(count($news_list)<=$post_per_page){echo count($news_list);}else{echo $post_per_page;} ?>">
            <input type="hidden" id="news_category" value="<?php if($_GET['cat']){echo $_GET['cat'];} ?>">
            <?php $i=0; foreach ($news_list as $key => $news):
                if($i>=6){
                    $i = 0;
                }
                $post_cat = get_the_category($news->ID);
                ?>
                <div class="news_item <?php echo get_news_class($i++); ?>">
                    <a href="<?php get_permalink($news->ID); ?>" class="img" style="background-image: url(<?php echo get_attached_img_url($news->ID); ?>)">
                        <div class="date">
                            <div class="table">
                                <div class="td">
                                    <div class="month"><?php echo date('M', strtotime($news->post_date)); ?></div>
                                    <?php echo date('d', strtotime($news->post_date)); ?>
                                </div>
                            </div>
                        </div>
                    </a>
                    <div class="text">
                        <div class="category"><?php if($post_cat[0]){echo $post_cat[0]->name;}else{_w('News');} ?></div>
                        <h2 class="title">
                            <a href="<?php echo get_permalink($news->ID); ?>">
                                <?php echo get_field('short_title', $news->ID)?:$news->post_title; ?>
                            </a>
                        </h2>
                        <div class="desc">
                            <?php echo $news->post_excerpt; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="load_more" style="<?php if($post_count <= $post_per_page){echo 'display: none;';} ?>">
            <a href="" class="load_more_btn" id="more_news"><?php _w('View More'); ?></a>
        </div>
        <script id="news-item" type="text/template">
            <%
            var i = 0;
            function get_news_class(id){
                var class_list = [
                'news_item_w2_h2',
                'news_item_w2 news_item_fr',
                'news_item_w2 news_item_fr',
                'news_item_h2',
                'news_item_h2 news_item_ml',
                'news_item_w2_h2 news_item_fr'
                ];
                return class_list[id];
            }
            %>
            <% _.each(news, function(item, index){
            if(i>=6){i = 0;}
            %>
            <div class="news_item <%= get_news_class(i++) %>">
                <a href="<%= item.url %>" class="img" style="background-image: url(<%= item.thumb %>)">
                    <div class="date">
                        <div class="table">
                            <div class="td">
                                <div class="month"><%= item.month %></div>
                                <%= item.day %>
                            </div>
                        </div>
                    </div>
                </a>
                <div class="text">
                    <div class="category"><%= item.cat %></div>
                    <h2 class="title">
                        <a href="<%= item.url %>">
                            <%= item.title %>
                        </a>
                    </h2>
                    <div class="desc">
                        <%= item.excerpt %>
                    </div>
                </div>
            </div>
            <% }); %>
        </script>
    </div>
<?php endif;
