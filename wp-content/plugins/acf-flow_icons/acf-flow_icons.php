<?php

/*
Plugin Name: Advanced Custom Fields: Wanda Studio Icons
Plugin URI: PLUGIN_URL
Description: Icons Set for Wanda Studios
Version: 1.0.0
Author: Flow Asia
Author URI: http://flow.asia
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

// exit if accessed directly
if( ! defined( 'ABSPATH' ) ) exit;


// check if class already exists
if( !class_exists('acf_plugin_flow_icons') ) :

	require_once 'classes/nav_menu_edit_custom.php';
class acf_plugin_flow_icons {
	
	/*
	*  __construct
	*
	*  This function will setup the class functionality
	*
	*  @type	function
	*  @date	17/02/2016
	*  @since	1.0.0
	*
	*  @param	n/a
	*  @return	n/a
	*/
	
	function __construct() {
		
		// vars
		$this->settings = array(
			'version'	=> '1.0.0',
			'url'		=> plugin_dir_url( __FILE__ ),
			'path'		=> plugin_dir_path( __FILE__ )
		);
		
		
		// set text domain
		// https://codex.wordpress.org/Function_Reference/load_plugin_textdomain
		load_plugin_textdomain( 'acf-flow_icons', false, plugin_basename( dirname( __FILE__ ) ) . '/lang' );
		
		$custom_menu = new CustomMenu();
		// include field
		add_action('acf/include_field_types', 	array($this, 'include_field_types')); // v5
		add_action('acf/register_fields', 		array($this, 'include_field_types')); // v4

		add_action('admin_head', array($this, 'admin_style'));
		
	}

	function admin_style(){
		wp_register_script( 'acf-input-flow_icons-menu', plugin_dir_url( __FILE__ )."assets/js/select.js");
		wp_enqueue_script('acf-input-flow_icons-menu');
		wp_enqueue_style("flow-icon", plugin_dir_url( __FILE__ )."assets/css/input.css");
	}
	/*
	*  include_field_types
	*
	*  This function will include the field type class
	*
	*  @type	function
	*  @date	17/02/2016
	*  @since	1.0.0
	*
	*  @param	$version (int) major ACF version. Defaults to 4
	*  @return	n/a
	*/
	
	function include_field_types( $version = 4 ) {
		
		// include
		include_once('fields/acf-flow_icons-v' . $version . '.php');
		
	}
	
}


// initialize
new acf_plugin_flow_icons();


// class_exists check
endif;
	
?>