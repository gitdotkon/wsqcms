<?php
require get_template_directory().'/phpmailer/PHPMailerAutoload.php';
add_action('rest_api_init', 'fa_register_api_hooks');
function fa_register_api_hooks()
{
    register_rest_route(FA_API_NAMESPACE, '/team/', array(
        'methods' => 'GET',
        'callback' => 'fa_get_all_team',
    ));
    register_rest_route(FA_API_NAMESPACE, '/items/', array(
        'methods' => 'GET',
        'callback' => 'fa_get_item_detail',
    ));
    register_rest_route(FA_API_NAMESPACE, '/contact-us/', array(
        'methods' => 'POST',
        'callback' => 'validate_captcha',
    ));
    register_rest_route(FA_API_NAMESPACE, '/send-mail/', array(
        'methods' => 'POST',
        'callback' => 'send_mail',
    ));
    register_rest_route(FA_API_NAMESPACE, '/apply-form/', array(
        'methods' => 'POST',
        'callback' => 'apply_career',
    ));
    register_rest_route(FA_API_NAMESPACE, '/news/', array(
        'methods' => 'GET',
        'callback' => 'get_news',
    ));
    register_rest_route(FA_API_NAMESPACE, '/videos/', array(
        'methods' => 'GET',
        'callback' => 'get_videos',
    ));
    register_rest_route(FA_API_NAMESPACE, '/galleries/', array(
        'methods' => 'GET',
        'callback' => 'get_galleries',
    ));
    register_rest_route(FA_API_NAMESPACE, '/gallery-items/', array(
        'methods' => 'GET',
        'callback' => 'get_galleries_images',
    ));
    register_rest_route(FA_API_NAMESPACE, '/search/', array(
        'methods' => 'GET',
        'callback' => 'get_search_result',
    ));
}
function check_code($c1, $c2){
    return trim(md5($c1)) == $c2;
}
function apply_career(){
    $return = '';
    if($_SESSION['captcha'] == md5($_POST['captcha'])){
        $emailto = $_POST['apply_email'];
        $message_template = get_field('career_apply_email_body', 'options');
        $message_prepared = str_replace(array('[job_title]', '[name]', '[phone]', '[email]', '[message]'), array(
            esc_html($_POST['job_title'])?esc_html($_POST['job_title']):"",
            esc_html($_POST['name'])?esc_html($_POST['name']):"",
            esc_html($_POST['phone'])?esc_html($_POST['phone']):"",
            esc_html($_POST['email'])?esc_html($_POST['email']):"",
            esc_html($_POST['message'])
        ), $message_template);
        $body = apply_filters('the_content', $message_prepared);

        $mail = new PHPMailer;

        $email = get_field('email_for_apply_career', 'options');
        $mail->isSMTP();
        $mail->SMTPDebug = 0;
        $mail->SMTPAuth = true;
        $mail->Port = get_field('smtp_host', 'options')?:25;
        $mail->Host = get_field('smtp_host', 'options')?:'mail.wanda.com.cn';
        $mail->Port = get_field('smtp_port', 'options')?:'25';
        $mail->Username = get_field('smtp_user', 'options')?:'fc_0206';
        $mail->Password = get_field('password', 'options')?:'d5ntfh03';
        $mail->setFrom(get_field('email_from', 'options')?:'fc_0206@wanda.com.cn');
        //$mail->addAddress('dylan@flow.asia', 'Dylan');
        $mail->addAddress(get_field('email_for_apply_career', 'options')?:'dylan@flow.asia', 'Dylan');
        //    $mail->addAddress('info@wandastudios.com', 'Wanda Studios');
        $mail->Subject = get_field('career_apply_subject', 'options')?:'Contact from Wanda Studios';
        $mail->msgHTML($body);
        if(isset($_FILES['file'])){
            $mail->AddAttachment($_FILES['file']['tmp_name'],
                $_FILES['file']['name']);
        }
    //
    ////send the message, check for errors
        $mail->send();
        $return['status'] = '1';
    }else{
        $return['status'] = '-1';
    }
    $response = new WP_REST_Response($return);
    $response->header('Access-Control-Allow-Origin', '*');
    return $response;
}
function validate_captcha(){
    $return = '';
    if(isset($_SESSION['captcha']) && isset($_POST['validation'])){
        $return['cookie'] = $_POST['cookie'];
        $return['validation'] = $_SESSION['captcha'];
        if(check_code($_POST['validation'], $_SESSION['captcha'])){
            $return['status'] = 1;
        }else{//error
            $return['status'] = 0;
        }
    }else{
        $return['bolt'] = 'bolt';
    }

    $response = new WP_REST_Response($return);
    $response->header('Access-Control-Allow-Origin', '*');
    return $response;
}

function send_mail(){
    $return = '';

    $message_template = get_field('contact_us_email_body', 'options');
    $message_prepared = str_replace(array('[subject]', '[name]', '[email]', '[company]', '[message]'), array(
        $_POST['subject']?:"",
        $_POST['name']?:"",
        $_POST['email']?:"",
        $_POST['company']?:"",
        $_POST['message']?:""
    ), $message_template);
    $body = apply_filters('the_content', $message_prepared);
    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->SMTPDebug = 0;
    $mail->SMTPAuth = true;
    $mail->Port = get_field('smtp_port', 'options')?:25;
    $mail->Host = get_field('smtp_host', 'options')?:'mail.wanda.com.cn';
    $mail->Port = get_field('smtp_port', 'options')?:'25';
    $mail->Username = get_field('smtp_user', 'options')?:'fc_0206';
    $mail->Password = get_field('password', 'options')?:'d5ntfh03';
    $mail->setFrom(get_field('email_from', 'options')?:'fc_0206@wanda.com.cn');
    //$mail->addAddress('dylan@flow.asia', 'Dylan');
    $mail->addAddress(get_field('email_for_contact_us', 'options')?:'dylan@flow.asia', 'Dylan');
    //    $mail->addAddress('info@wandastudios.com', 'Wanda Studios');
    $mail->Subject = get_field('contact_us_subject', 'options')?:__('Contact from Wanda Studios');
    $mail->msgHTML($body);
//
////send the message, check for errors
    $mail->send();
    $return['status'] = 'Success';
    $response = new WP_REST_Response($return);
    $response->header('Access-Control-Allow-Origin', '*');
    return $response;
}
function get_search_result()
{
    $return = '';
    if($_GET['s']){
        $args = array(
            's' => $_GET['s'],
            'posts_per_page' => -1,
            'post_type' => array('post', 'page')
        );
        $search_result = get_query_posts($args);
        $results = array();
        if($search_result){
            foreach ($search_result as $item){
                $results[] = array(
                    'title' => $item->post_title,
                    'url' => get_permalink($item->ID),
                    'excerpt' => apply_filters('the_content', $item->post_excerpt)
                );
            }
        }
        $return['results'] = $results;
    }
    
    $response = new WP_REST_Response($return);
    $response->header('Access-Control-Allow-Origin', '*');
    return $response;
}
function get_galleries_images(){
    $return = '';
    if($_GET['gallery_id']){
        $images_prepared = get_site_transient('galley_images_'.$_GET['gallery_id']);
        if(!$images_prepared){
            $images = get_field('images', $_GET['gallery_id']);
            $images_prepared = array();
            if($images){
                foreach ($images as $image){
                    $images_prepared[] = array(
                        'full' => $image['url'],
                        'mobile' => $image['sizes']['large']
                    );
                }
                set_site_transient('galley_images_'.$_GET['gallery_id'], $images_prepared, 3600);
            }
        }
        $return['images_list'] = $images_prepared;
    }else{
        $return['status'] = 0;
    }
    
    $response = new WP_REST_Response($return);
    $response->header('Access-Control-Allow-Origin', '*');
    return $response;
}
function fa_get_item_detail(){
    $return = '';
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $item_type = get_post_type($id);
        $custom_fields = get_post_custom($id);
        $return['type'] = $item_type;
        $tmp_meta = array();
        foreach ($custom_fields as $key=>$value){
            if($key[0] != '_'){
                $tmp_meta[$key] = $value;
            }
        }
        $return['meta'] = $tmp_meta;
    }

    $response = new WP_REST_Response($return);
    $response->header('Access-Control-Allow-Origin', '*');
    return $response;
}

function get_videos(){
    $return = '';
    $offset = 0;
    $per_page = 6;
    $return['available'] = 1;
    if($_GET['videos_count']){
        $offset = $_GET['videos_count'];
    }
    if($_GET['videos_per_page']){
        $per_page = $_GET['videos_per_page'];
    }
    $args = array(
        'post_type' => 'video',
        'posts_per_page' => $per_page,
        'offset' => $offset
    );
    $videos_list = get_query_posts($args);
    if($videos_list){
        foreach ($videos_list as $video){
            $file = get_field('video', $video->ID);
            $return['videos'][] = array(
                'title' => $video->post_title,
                'file' => $file['url'],
                'thumb' => get_attached_img_url($video->ID)?:get_stylesheet_directory_uri().'/images/gallery.jpg'
            );
        }
        if(count($videos_list)<= $per_page){
            $return['available'] = 0;
        }
    }else{
        $return['available'] = 0;
    }

    $response = new WP_REST_Response($return);
    $response->header('Access-Control-Allow-Origin', '*');
    return $response;
}
function get_galleries(){
    $return = '';
    $offset = 0;
    $per_page = 6;
    $return['available'] = 1;
    if($_GET['gallery_count']){
        $offset = $_GET['gallery_count'];
    }
    if($_GET['gallery_per_page']){
        $per_page = $_GET['gallery_per_page'];
    }
    $args = array(
        'post_type' => 'gallery',
        'posts_per_page' => $per_page,
        'offset' => $offset
    );
    $gallery_list = get_query_posts($args);
    if($gallery_list){
        foreach ($gallery_list as $gallery){
            $images = get_field('images', $gallery->ID);
                if($images){
                    $return['gallery'][] = array(
                    'title' => $gallery->post_title,
                    'count' => count($images),
                    'thumb' => $images[0]['url']?:get_stylesheet_directory_uri().'/images/gallery.jpg'
                );
            }
        }
        if(count($gallery_list)<= $per_page){
            $return['available'] = 0;
        }
    }else{
        $return['available'] = 0;
    }

    $response = new WP_REST_Response($return);
    $response->header('Access-Control-Allow-Origin', '*');
    return $response;
}
function get_news(){
    $return = '';
    $offset = 0;
    $per_page = 6;
	global $sitepress;
	if (method_exists($sitepress, 'switch_lang') && isset($_GET['lng']) && $_GET['lng'] !== $sitepress->get_default_language()) {
		$sitepress->switch_lang($_GET['lng'], true);
	}
    $return['available'] = 1;
    if($_GET['news_count']){
        $offset = $_GET['news_count'];
    }
    if($_GET['news_per_page']){
        $per_page = $_GET['news_per_page'];
    }
    $args_all = array(
        'post_type' => 'post',
        'posts_per_page' => -1,
    );
    $args = array(
        'post_type' => 'post',
        'posts_per_page' => $per_page,
        'offset' => $offset
    );
    if($_GET['cat']){
        $args['cat'] = (int)$_GET['cat'];
        $args_all['cat'] = (int)$_GET['cat'];
    }
	$news_list = new WP_Query($args);
    if($news_list->posts){
        foreach ($news_list->posts as $news){
            $cats = get_the_category($news->ID);
            $cat = $cats[0]->name;
            $return['news'][] = array(
                'title' => get_field('short_title', $news->ID)?:$news->post_title,
                'url' => get_permalink($news->ID),
                'excerpt' => $news->post_excerpt,
                'thumb' => get_attached_img_url($news->ID),
                'month' => date('M', strtotime($news->post_date)),
                'day' => date('d', strtotime($news->post_date)),
                'cat' => $cat?:__('News')
            );
        }
        $all_count = new WP_Query($args_all);
        $return['available'] = count($all_count->posts);
    }else{
        $return['available'] = 0;
    }
    
	$return['args'] = $args;
	$return['ns'] = $news_list;
    $response = new WP_REST_Response($return);
    $response->header('Access-Control-Allow-Origin', '*');
    return $response;
}
