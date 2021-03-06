<?php

@include 'TabGeo/country.php';

define('COUNTRY_CODE', get_country());

function renderStageSpec($stage_id){
    $stage_specification_arr = array(
        'stage_size' => 'Stage size',
        'dimensions' => 'Dimensions',
        'height' => 'Height',
        'electrical' => 'Electrical',
        'pit' => 'Pit',
        'support_rooms' => 'Support rooms',
        'air_conditioning' => 'Air conditioning',
        'nr_rating' => 'NR rating',
        'stage_door' => 'Stage door',
        'ittelecoms' => 'IT/Telecoms',
        'miscellaneous' => 'Miscellaneous'
    );
    foreach ($stage_specification_arr as $key=>$spec_label){
        $label = __($spec_label, FA_THEME);
        $val = get_field($key, $stage_id);
        $explode_val = explode('<br>', $val);
        
    }
}
/* include template part*/
/**
 * @param string $file
 * @param mixed $args
 * @param string $default_folder
 * @author DimonPDAA, SemAlley
 * */
function show_template($file, $args = null, $default_folder = 'parts'){
    $file = $default_folder . '/' . $file . '.php';
    if($args){
        extract($args);
    }
    if( locate_template($file) ){
        include( locate_template($file) );//Theme Check free. Child themes support.
    }
}

/* get thumbnail image */
/**
 * @var int $id
 * @var string $size = 'full'
 * @return string
 * @author DimonPDAA
 */
function get_attached_img_url($id, $size = "full"){
    $img = wp_get_attachment_image_src(get_post_thumbnail_id($id), $size);
    return $img[0];
}
/**
 * return post array or false
 * @var array $args
 * @return array
 * */
function get_query_posts($args){
    $posts = new WP_Query($args);
    if($posts->have_posts()){
        return $posts->posts;
    }
    return false;
}
/** Share to Weibo
 * @param $id integer
 * @return string share link
 */
function getWeiboShareUrl($id){
    return 'http://service.weibo.com/share/share.php?url=' . get_permalink($id) . '&appkey=&title=' . get_the_title($id) . '&pic=&ralateUid=&language=zh_cn';
}
/** Show translation content
 * @param $content string
 * @author SemAlley 
 */
function _w($content = '')
{
    echo __($content, FA_THEME);
}

function get_news_class($i){
    $class = '';
    $class_array = array(
        'news_item_w2_h2',
        'news_item_w2 news_item_fr',
        'news_item_w2 news_item_fr',
        'news_item_h2',
        'news_item_h2 news_item_ml',
        'news_item_w2_h2 news_item_fr'
    );
    return $class_array[$i];
}


function getQrImg(){
    $social = get_field('social', 'options');
    foreach($social as $link){
        if(isset($link['image'])){
            return $link['image']['url'];
        }
    }
}
/* Dynamic admin functions */
function template_detail_field_for_page($column_name, $post_id){
    if( $column_name == 'template' ){
        $template_name = str_replace('.php','',get_post_meta( $post_id, '_wp_page_template', true ));
        echo '<span style="text-transform: capitalize;">'.substr($template_name, strpos($template_name, '/'), strlen($template_name)).' Page</span>';
    }
    return;
}

function position_detail_field_for_team($column_name, $post_id){
    if($column_name == 'position'){
        $position = get_field('position', $post_id);
        echo $position;
    }
    return;
}

function area_field_for_career($column_name, $post_id){
    if($column_name == 'area'){
        $area = get_the_terms($post_id, 'area');
        if($area && isset($area[0])){
            echo $area[0]->name;
        }
    }
    return;
}

function stage_cat_field_for_stage($column_name, $post_id){
    if($column_name == 'stage_cat'){
        $stage_cats = get_the_terms($post_id, 'stage_cat');
        if($stage_cats && isset($stage_cats[0])){
            echo $stage_cats[0]->name;
        }
    }
    return;
}
/**
* Return country code by IP
 */
function get_country(){
    $ip = $_SERVER['REMOTE_ADDR'];
    $country_code = \TabGeo\country($ip);
    return $country_code;
}

function isChina(){
//    $related_to_china = array(
//        'CH'
//    );
//    return in_array(COUNTRY_CODE, $related_to_china);
    $isChina = do_shortcode('[geot country="China"]1[/geot]');
    return $isChina;
}

function bg($image){
    if($image){
        $style = 'background-image: url('.is_array($image)?$image['url']:$image.')';
        echo $style;
    }
}

function get_video($id){
    $key = 'video_yooko';
    if(isChina()){
        $key = 'video_youtoube';
    }
    $video_url = get_field($key, $id);
    return $video_url;
}

function get_about_menu_list($id){
    $parent_title = get_the_title($id);
    $parent_url = get_permalink($id);
    $menu_list = array();
    array_push($menu_list, array('title' => $parent_title, 'url' => $parent_url, 'active' => false));

    $page_list = get_field('page_list', $id);
    if($page_list){
        $current_link = get_permalink();

        foreach ($page_list as $item){
            array_push($menu_list, array(
                'title' => strip_tags($item['title']),
                'url' => get_permalink($item['page_link']),
                'active' => get_the_ID() == $item['page_link'])
            );
        }
    }
    return $menu_list;
}
function prepare_id($str){
    return strtolower(str_replace(array(' ', '/', '&'), '_', strip_tags(html_entity_decode($str))));
}
function get_workshop_menu_list($id){
    $section_list = get_field('section_list', $id);
    $menu_list = array();
    if($section_list){
        foreach ($section_list as $page){
            array_push($menu_list, array(
                'title' => strip_tags(html_entity_decode($page['title'])),
                'url' => '#'.prepare_id($page['title']),
                'active' => false
            ));
        }
        return $menu_list;
    }
    return false;
}

function show_spec($text){
    $text_arr = explode("\n", $text);
    if($text_arr){
        if(count($text_arr)>0){
            echo $text_arr[0];
            for($i=1; $i<count($text_arr); $i++){
                echo '<div class="tree_line">';
                echo $text_arr[$i];
                echo '</div>';
            }
        }else{
            echo $text_arr[0];
        }
    }
}

function get_count_stage($tax_id){
	$args = array(
		'post_type' => 'stage',
		'posts_per_page' => '-1',
		'tax_query' => array(
			array(
				'taxonomy' => 'stage_cat',
				'field' => 'term_id',
				'terms' => $tax_id
			)
		)
	);
	$stages = get_query_posts($args);
	if($stages){
		return count($stages);
	}
    return get_term($tax_id, 'stage_cat')->count;
}

function get_word($num){
    $words = array(
        __('One'),
        __('two'),
        __('third'),
        __('four'),
        __('five'),
        __('six'),
        __('seven'),
        __('eight'),
        __('nine'),
        __('ten'),
        __('Eleven'),
        //__('Twelve'),
        __('Twelve'),
        __('Thirteen'),
        __('Fourteen'),
        __('Fifteen'),
        __('Sixteen'),
        __('Eighteen'),
        __('Nineteen'),
    );
    return $words[$num-1];
}
function trim_excerpt($text) {
    return rtrim($text,'[...]');
}
add_filter('get_the_excerpt', 'trim_excerpt');

function alx_browser_body_class($classes)
{
    global $is_lynx, $is_gecko, $is_IE, $is_opera, $is_NS4, $is_safari, $is_chrome, $is_iphone;

    if ($is_lynx) $classes[] = 'lynx';
    elseif ($is_gecko) $classes[] = 'gecko';
    elseif ($is_opera) $classes[] = 'opera';
    elseif ($is_NS4) $classes[] = 'ns4';
    elseif ($is_safari) $classes[] = 'safari';
    elseif ($is_chrome) $classes[] = 'chrome';
    elseif ($is_IE) {
        $browser = $_SERVER['HTTP_USER_AGENT'];
        $browser = substr("$browser", 25, 8);
        if ($browser == "MSIE 7.0") {
            $classes[] = 'ie7';
            $classes[] = 'ie';
        } elseif ($browser == "MSIE 6.0") {
            $classes[] = 'ie6';
            $classes[] = 'ie';
        } elseif ($browser == "MSIE 8.0") {
            $classes[] = 'ie8';
            $classes[] = 'ie';
        } elseif ($browser == "MSIE 9.0") {
            $classes[] = 'ie9';
            $classes[] = 'ie';
        } else {
            $classes[] = 'ie';
        }
    } else $classes[] = 'unknown';

    if ($is_iphone) $classes[] = 'iphone';

    return $classes;
}

add_filter('body_class', 'alx_browser_body_class');
