<?php
/**
 * Hexagonal menu
 */
global $post;
$parent_id = $post->post_parent;
$section_list = get_field('page_list', $parent_id);
if($section_list):?>
    <div class="round_nav rn_animate_fade">
        <div class="round_nav_inner">
            <div class="round_nav_icon">
                <div class="icon-35"></div>
            </div>
            <div class="round_nav_inner_box">
                <?php foreach ($section_list as $key => $page): ?>
                    <span class="round_nav_<?php echo $key+1; if($page['page_link'] == get_the_ID()){echo ' round_nav_active';} ?>"></span>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="round_nav_ul">
            <ul>
                <?php foreach ($section_list as $key => $page): ?>
                    <li>
                        <a href="<?php echo get_permalink($page['page_link']); ?>" class="round_nav_a_<?php echo $key+1; ?>">
                            <span><?php echo $page['title']; ?></span>
                            <div class="<?php echo $page['hexagonal_menu_icon']; ?>"></div>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
<?php endif;
