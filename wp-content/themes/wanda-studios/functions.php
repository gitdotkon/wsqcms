<?php
/**
 * Functions
 */
require_once 'inc/defines.php';
require_once 'inc/helpers.php';
require_once 'inc/rest_api.php';
require_once 'inc/dynamic_admin.php';
require_once 'inc/options_page.php';
/******************************************************************************
 * Global Functions
 ******************************************************************************/

// By adding theme support, we declare that this theme does not use a
// hard-coded <title> tag in the document head, and expect WordPress to
// provide it for us.
add_theme_support('title-tag');

//  Add widget support shortcodes
add_filter('widget_text', 'do_shortcode');

// Support for Featured Images
add_theme_support('post-thumbnails');

// Custom Background
add_theme_support('custom-background', array('default-color' => 'fff'));

// Custom Header
//	add_theme_support( 'custom-header', array(
//		'default-image' => get_template_directory_uri() . '/images/custom-logo.png',
//		'height'        => '200',
//		'flex-height'    => true,
//		'uploads'       => true,
//		'header-text'   => false
//	) );

// Add HTML5 elements
add_theme_support('html5', array('comment-list', 'search-form', 'comment-form',));

// Register Navigation Menu
register_nav_menus(array(
    'left-main-menu' => 'Left Main Menu',
    'middle-main-menu' => 'Middle Main Menu',
    'right-main-menu' => 'Right Main Menu',
    'header-menu' => 'Header Menu',
    'footer-menu' => 'Footer Menu'
));

// Navigation Menu Adjustments

/* Add class to navigation sub-menu */

class foundation_navigation extends Walker_Nav_Menu
{

    function start_lvl(&$output, $depth = 0, $args = array())
    {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class=\"dropdown_menu dropdown\">\n";
    }

    function display_element($element, &$children_elements, $max_depth, $depth = 0, $args, &$output)
    {
        $id_field = $this->db_fields['id'];
        if (!empty($children_elements[$element->$id_field])) {
            $element->classes[] = 'has-dropdown';
        }
        Walker_Nav_Menu::display_element($element, $children_elements, $max_depth, $depth, $args, $output);
    }
}

/* Display Pages In Navigation Menu */
if (!function_exists('foundation_page_menu')) :
    function foundation_page_menu()
    {
        $pages_args = array(
            'sort_column' => 'menu_order, post_title',
            'menu_class' => '',
            'include' => '',
            'exclude' => '',
            'echo' => true,
            'show_home' => false,
            'link_before' => '',
            'link_after' => ''
        );

        wp_page_menu($pages_args);
    }
endif;


// Create pagination
function foundation_pagination($query = '')
{
    if (empty($query)) {
        global $wp_query;
        $query = $wp_query;
    }

    $big = 999999999;

    $links = paginate_links(array(
            'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
            'format' => '?paged=%#%',
            'prev_next' => true,
            'prev_text' => '&laquo;',
            'next_text' => '&raquo;',
            'current' => max(1, get_query_var('paged')),
            'total' => $query->max_num_pages,
            'type' => 'list'
        )
    );

    $pagination = str_replace('page-numbers', 'pagination', $links);

    echo $pagination;
}

// Register Sidebars
function foundation_widgets_init()
{
    /* Sidebar Right */

    register_sidebar(array(
        'id' => 'foundation_footer_1',
        'name' => __('Footer 1'),
        'description' => __('This widget area is located on the footer of each page.'),
        'before_widget' => '<div id="%1$s" class="foot_widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h5>',
        'after_title' => '</h5>',
    ));
    register_sidebar(array(
        'id' => 'foundation_footer_2',
        'name' => __('Footer 2'),
        'description' => __('This widget area is located on the footer of each page.'),
        'before_widget' => '<div id="%1$s" class="foot_widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h5>',
        'after_title' => '</h5>',
    ));
    register_sidebar(array(
        'id' => 'foundation_footer_3',
        'name' => __('Footer 3'),
        'description' => __('This widget area is located on the footer of each page.'),
        'before_widget' => '<div id="%1$s" class="foot_widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h5>',
        'after_title' => '</h5>',
    ));
    register_sidebar(array(
        'id' => 'foundation_footer_4',
        'name' => __('Footer 4'),
        'description' => __('This widget area is located on the footer of each page.'),
        'before_widget' => '<div id="%1$s" class="foot_widget foot_widget_last %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h5>',
        'after_title' => '</h5>',
    ));
}

add_action('widgets_init', 'foundation_widgets_init');

// Remove #more anchor from posts
function remove_more_jump_link($link)
{
    $offset = strpos($link, '#more-');
    if ($offset) {
        $end = strpos($link, '"', $offset);
    }
    if ($end) {
        $link = substr_replace($link, '', $offset, $end - $offset);
    }
    return $link;
}

add_filter('the_content_more_link', 'remove_more_jump_link');


/******************************************************************************************************************************
 * Enqueue Scripts and Styles for Front-End
 *******************************************************************************************************************************/

//Run Sick slider on HOME page
include_once(TEMPLATEPATH . '/inc/home-slider.php');


function foundation_scripts_and_styles()
{
    if (!is_admin()) {

// Load Stylesheets
        //core
        wp_enqueue_style('owl.carousel', get_template_directory_uri() . '/css/plugins/owl.carousel.css', null, null);
        wp_enqueue_style('jquery.scrollbar', get_template_directory_uri() . '/css/plugins/jquery.scrollbar.css', null, null);
        wp_enqueue_style('slick', get_template_directory_uri() . '/css/slick.css', null, null);
        wp_enqueue_style('custom', get_template_directory_uri() . '/css/custom.css', null, null);
        wp_enqueue_style('media-screen', get_template_directory_uri() . '/css/media-screen.css', null, null);


// Load JavaScripts
        //core
        wp_enqueue_script('jquery', get_template_directory_uri() . '/js/plugins/jquery-1.10.2.min.js', null, null, true);
        wp_enqueue_script('modernize', get_template_directory_uri() . '/js/plugins/modernizr-custom.js', null, null, true);

        //plugins
        wp_enqueue_script('underscore', get_template_directory_uri() . '/js/plugins/underscore.js', null, null, true);
        wp_enqueue_script('mousewheel', get_template_directory_uri() . '/js/plugins/jquery.mousewheel.min.js', null, null, true);
        wp_enqueue_script('swipe', get_template_directory_uri() . '/js/plugins/jquery.touchSwipe.min.js', null, null, true);
        wp_enqueue_script('owl.carousel', get_template_directory_uri() . '/js/plugins/owl.carousel.min.js', null, null, true);
        wp_enqueue_script('slick', get_template_directory_uri() . '/js/plugins/slick.min.js', null, null, true);
        wp_enqueue_script('flexslider', get_template_directory_uri() . '/js/plugins/jquery.flexslider-min.js', null, null, true);
        wp_enqueue_script('scrollbar', get_template_directory_uri() . '/js/plugins/jquery.scrollbar.min.js', null, null, true);
        wp_enqueue_script('nicescroll', get_template_directory_uri() . '/js/plugins/jquery.nicescroll.min.js', null, null, true);
        wp_enqueue_script('mh', get_template_directory_uri() . '/js/plugins/jquery.matchHeight-min.js', null, null, true);
        wp_enqueue_script('imagesloaded', get_template_directory_uri() . '/js/plugins/imagesloaded.pkgd.min.js', null, null, true);
        wp_enqueue_script('masonry', get_template_directory_uri() . '/js/plugins/masonry.pkgd.min.js', null, null, true);
        if (is_page_template('templates/careers-page.php')) {
            wp_enqueue_script('nicefile', get_template_directory_uri() . '/js/plugins/jquery.nicefileinput.min.js', null, null, true);
            wp_enqueue_script('validation', get_template_directory_uri() . '/js/plugins/Validform_v5.3.2_min.js', null, null, true);
        }
        wp_enqueue_script('global', get_template_directory_uri() . '/js/src/main.js', null, null, true); /* This should go first */
        wp_enqueue_script('animate', get_template_directory_uri() . '/js/animate.js', null, null, true); /* This should go first */
        $js_options = array(
            'ajax_url' => admin_url('admin-ajax.php'),
            'rest_nonce' => wp_create_nonce('wp_rest'),
            'api_base' => rest_url() . FA_API_NAMESPACE,
        );

        if (is_page_template('templates/template-contact.php')) {
            //$options = get_option('theme_settings');
            if (isChina()) { // client located in China, use Baidu map
                $baidu_code = get_field('baidu_key', 'options');
                wp_register_script('baidu-maps-script-api', 'http://api.map.baidu.com/api?v=2.0&ak=' . $baidu_code, false, true);
                wp_enqueue_script('baidu-maps-script-api');
                $js_options['map_type'] = 'baidu';
            } else {
                $google_code = get_field('google_key', 'options');
                wp_register_script('google-maps-script-api', 'http://maps.google.cn/maps/api/js?key=' . $google_code, false, true);
                wp_enqueue_script('google-maps-script-api');
                $js_options['map_type'] = 'google';

            }
            $lat = get_field('map_latitude');
            $lang = get_field('map_longitude');
            $js_options['lat'] = $lat;
            $js_options['lang'] = $lang;
        }

        wp_localize_script('global', 'flow', $js_options);
        //custom javascript


    }
}

add_action('wp_enqueue_scripts', 'foundation_scripts_and_styles');

/* Admin style */
function admin_style()
{
    wp_enqueue_style("style-admin", get_bloginfo('stylesheet_directory') . "/css/admin.css");
    wp_enqueue_script('custom-admin', get_template_directory_uri() . '/js/admin.js', null, null, true);
}

add_action('admin_head', 'admin_style');

// Install Recommended plugins
require_once dirname(__FILE__) . '/inc/plugin-activation.php';

function my_theme_register_required_plugins()
{
    $plugins = array(
        /** This is an example of how to include a plugin pre-packaged with a theme */
        array(
            'name' => 'Advanced Custom Fields Pro (b3JkZXJfaWQ9NTU1MDd8dHlwZT1kZXZlbG9wZXJ8ZGF0ZT0yMDE1LTA1LTA2IDExOjUzOjM1)', // The plugin name
            'slug' => 'advanced-custom-fields-pro', // The plugin slug (typically the folder name)
            'source' => 'http://ready-for-feedback2.com/plugins/advanced-custom-fields-pro.zip', // The plugin source
            'required' => false,
        ),
        array(
            'name' => 'Custom Post Type UI', // The plugin name
            'slug' => 'custom-post-type-ui', // The plugin slug (typically the folder name)
            'source' => 'https://downloads.wordpress.org/plugin/custom-post-type-ui.1.2.4.zip', // The plugin source
            'required' => false,
        ),
        array(
            'name' => 'Blade', // The plugin name
            'slug' => 'blade', // The plugin slug (typically the folder name)
            'source' => 'https://downloads.wordpress.org/plugin/blade.0.3.7.zip', // The plugin source
            'required' => true,
        ),
        array(
            'name' => 'Gravity Forms (86a265e9644d0b79e4ccce71a582fc7e)', // The plugin name
            'slug' => 'gravity-forms', // The plugin slug (typically the folder name)
            'source' => 'http://ready-for-feedback2.com/plugins/gravityforms.zip', // The plugin source
            'required' => false,
        ),
        array(
            'name' => 'Login LockDown', // The plugin name
            'slug' => 'login-lockdown', // The plugin slug (typically the folder name)
            'source' => 'https://downloads.wordpress.org/plugin/login-lockdown.1.6.1.zip', // The plugin source
            'required' => false,
        ),
        array(
            'name' => 'WordPress SEO by Yoast', // The plugin name
            'slug' => 'wordpress-seo', // The plugin slug (typically the folder name)
            'source' => 'https://downloads.wordpress.org/plugin/wordpress-seo.3.1.zip', // The plugin source
            'required' => false,
        ),
        array(
            'name' => 'Google Analytics by Yoast', // The plugin name
            'slug' => 'google-analytics-for-wordpress', // The plugin slug (typically the folder name)
            'source' => 'https://downloads.wordpress.org/plugin/google-analytics-for-wordpress.5.4.6.zip', // The plugin source
            'required' => false,
        ),
        array(
            'name' => 'WordPress Duplicator', // The plugin name
            'slug' => 'duplicator', // The plugin slug (typically the folder name)
            'source' => 'https://downloads.wordpress.org/plugin/duplicator.1.1.4.zip', // The plugin source
            'required' => false,
        ),
        array(
            'name' => 'Black Studio TinyMCE Widget', // The plugin name
            'slug' => 'black-studio-tinymce-widget', // The plugin slug (typically the folder name)
            'source' => 'https://downloads.wordpress.org/plugin/black-studio-tinymce-widget.2.2.8.zip', // The plugin source
            'required' => false,
        ),
        array(
            'name' => 'UserSnap', // The plugin name
            'slug' => 'usersnap', // The plugin slug (typically the folder name)
            'source' => 'https://downloads.wordpress.org/plugin/usersnap.4.3.zip', // The plugin source
            'required' => false,
        )
    );
    tgmpa($plugins);
}

add_action('tgmpa_register', 'my_theme_register_required_plugins');

// Stick Admin Bar To The Top
if (!is_admin()) {
    add_action('get_header', 'my_filter_head');

    function my_filter_head()
    {
        remove_action('wp_head', '_admin_bar_bump_cb');
    }

    function stick_admin_bar()
    {
        echo "
			<style type='text/css'>
				body.admin-bar {margin-top:32px}
				@media screen and (max-width: 782px) {
					body.admin-bar { margin-top: 46px }
				}
				@media screen and (max-width: 600px) {
					body.admin-bar { margin-top:46px; }
					html #wpadminbar{ margin-top: 0px; }
				}
			</style>
			";
    }

    add_action('admin_head', 'stick_admin_bar');
    add_action('wp_head', 'stick_admin_bar');
}

// Customize Login Screen
function wordpress_login_styling()
{ ?>
    <style type="text/css">
        .login #login h1 a {
            background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/images/sign-in-logo.png');
            background-size: contain;
            background-position: 50% 50%;
            width: auto;
            height: 170px;
        }

        body.login {
            background-color: #f1f1f1;
        <?php if ($bg_image = get_background_image()) {?> background-image: url('<?php echo $bg_image ?>') !important;
        <?php } ?> background-repeat: repeat;
            background-position: center center;
        }

        ;

    </style>
<?php }

add_action('login_enqueue_scripts', 'wordpress_login_styling');

function admin_logo_custom_url()
{
    $site_url = get_bloginfo('url');
    return ($site_url);
}

add_filter('login_headerurl', 'admin_logo_custom_url');

// ACF Pro Options Page

if (function_exists('acf_add_options_page')) {

    acf_add_options_page(array(
        'page_title' => 'Theme General Settings',
        'menu_title' => 'Theme Settings',
        'menu_slug' => 'theme-general-settings',
        'capability' => 'edit_posts',
        'redirect' => false
    ));

}

/*********************** PUT YOU FUNCTIONS BELOW ********************************/

// add_image_size( 'name', width, height, array('center','center'));

add_filter('gform_confirmation_anchor', '__return_false');


/*******************************************************************************/
/* Add template name column */

$dynamic_admin = new DynamicAdmin();
$dynamic_admin->addField('page', 'template', 'Page Template', 'template_detail_field_for_page');
$dynamic_admin->addField('team', 'position', 'Position', 'position_detail_field_for_team');
$dynamic_admin->addField('career', 'area', 'Area', 'area_field_for_career');
$dynamic_admin->addField('stage', 'stage_cat', 'Stage category', 'stage_cat_field_for_stage');

$dynamic_admin->run();
//
//$geo = new GeoTarget_Shortcodes();
//echo $geo->geot_filter(array('country'=>'Ukraine'), true);


function get_custom_class()
{
    $class = ' ';
    if (is_page_template('templates/stages-page.php')) {
        $class .= ' footer_bottom';
        return $class;
    }
    if (!is_front_page() && !is_page_template('templates/about-page.php') && !is_page_template('templates/facilities-page.php')) { // if not front and stage page
        $class .= 'footer_visible';
    } else {
        $class .= ' footer_bottom';
    }
    return $class;
}

function fixed_height()
{
    if (is_page_template('templates/about-page.php') || is_page_template('templates/facilities-page.php')) {
        echo 'full-height';
    }
}



//function save_order_function( $post_ID ) {
//	$old_status = $_POST['post_status'];
//	$new_status = $_POST['order_status'];
//
//	wp_mail('dimonpdaa@gmail.com','',  $old_status . ' ' . $new_status );
//}
//add_action( 'save_post', 'save_order_function' );
