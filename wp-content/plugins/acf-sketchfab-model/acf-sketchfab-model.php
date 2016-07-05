<?php

/*
Plugin Name: Advanced Custom Fields: Sketchfab 3D Model
Plugin URI: www.flow.asia
Description: Sketchfab 3D Model
Version: 1.0.0
Author: Flow Asia
Author URI: www.flow.asia
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/




// 1. set text domain
// Reference: https://codex.wordpress.org/Function_Reference/load_plugin_textdomain
load_plugin_textdomain( 'acf-sketchfab_model', false, dirname( plugin_basename(__FILE__) ) . '/lang/' ); 




// 2. Include field type for ACF5
// $version = 5 and can be ignored until ACF6 exists
function include_field_types_sketchfab_model( $version ) {
	
	include_once('acf-sketchfab-model-v5.php');
	
}

add_action('acf/include_field_types', 'include_field_types_sketchfab_model');	




// 3. Include field type for ACF4
function register_fields_sketchfab_model() {
	
	include_once('acf-sketchfab-model-v4.php');
	
}

add_action('acf/register_fields', 'register_fields_sketchfab_model');	



	
?>