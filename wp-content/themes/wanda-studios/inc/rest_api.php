<?php
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
}

function fa_get_all_team()
{
    $return = '';

    
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