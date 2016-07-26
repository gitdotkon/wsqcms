<?php

class acf_field_sketchfab_model extends acf_field {
	
	
	/*
	*  __construct
	*
	*  This function will setup the field type data
	*
	*  @type	function
	*  @date	5/03/2014
	*  @since	5.0.0
	*
	*  @param	n/a
	*  @return	n/a
	*/
	
	function __construct() {
		
		/*
		*  name (string) Single word, no spaces. Underscores allowed
		*/
		
		$this->name = 'sketchfab_model';
		
		
		/*
		*  label (string) Multiple words, can include spaces, visible when selecting a field type
		*/
		
		$this->label = __('Sketchfab 3D Model', 'acf-sketchfab_model');
		
		
		/*
		*  category (string) basic | content | choice | relational | jquery | layout | CUSTOM GROUP NAME
		*/
		
		$this->category = 'basic';
		
		
		/*
		*  defaults (array) Array of default settings which are merged into the field object. These are used later in settings
		*/
		
		$this->defaults = array(
			'font_size'	=> 14,
		);
		
		
		/*
		*  l10n (array) Array of strings that are used in JavaScript. This allows JS strings to be translated in PHP and loaded via:
		*  var message = acf._e('sketchfab_model', 'error');
		*/
		
		$this->l10n = array(
			'error'	=> __('Error! Please enter a higher value', 'acf-sketchfab_model'),
		);
		
				
		// do not delete!
    	parent::__construct();
    	
	}
	
	
	/*
	*  render_field_settings()
	*
	*  Create extra settings for your field. These are visible when editing a field
	*
	*  @type	action
	*  @since	3.6
	*  @date	23/01/13
	*
	*  @param	$field (array) the $field being edited
	*  @return	n/a
	*/
	
	function render_field_settings( $field ) {
		
		/*
		*  acf_render_field_setting
		*
		*  This function will create a setting for your field. Simply pass the $field parameter and an array of field settings.
		*  The array of settings does not require a `value` or `prefix`; These settings are found from the $field array.
		*
		*  More than one setting can be added by copy/paste the above code.
		*  Please note that you must also have a matching $defaults value for the field name (font_size)
		*/
		
//		acf_render_field_setting( $field, array(
//			'label'			=> __('Autostart','acf-sketchfab_model'),
//			'instructions'	=> __('','acf-sketchfab_model'),
//			'type'			=> 'true_false',
//			'name'			=> 'autostart',
//			'prepend'		=> '',
//		));
//		acf_render_field_setting( $field, array(
//			'label'			=> __('Preload','acf-sketchfab_model'),
//			'instructions'	=> __('','acf-sketchfab_model'),
//			'type'			=> 'true_false',
//			'name'			=> 'preload',
//			'prepend'		=> '',
//		));
//		acf_render_field_setting( $field, array(
//			'label'			=> __('Camera','acf-sketchfab_model'),
//			'instructions'	=> __('','acf-sketchfab_model'),
//			'type'			=> 'true_false',
//			'name'			=> 'camera',
//			'prepend'		=> '',
//		));
//		acf_render_field_setting( $field, array(
//			'label'			=> __('Annotation','acf-sketchfab_model'),
//			'instructions'	=> __('','acf-sketchfab_model'),
//			'type'			=> 'true_false',
//			'name'			=> 'annotation',
//			'prepend'		=> '',
//		));

	}
	
	
	
	/*
	*  render_field()
	*
	*  Create the HTML interface for your field
	*
	*  @param	$field (array) the $field being rendered
	*
	*  @type	action
	*  @since	3.6
	*  @date	23/01/13
	*
	*  @param	$field (array) the $field being edited
	*  @return	n/a
	*/
	
	function render_field( $field ) {
		
		
		/*
		*  Review the data of $field.
		*  This will show what data is available
		*/
		/*
		*  Create a simple text input using the 'font_size' setting.
		*/

		?>
		<div class="sketchfab-container">
			<input type="text" name="<?php echo esc_attr($field['name']) ?>" value="<?php echo esc_attr($field['value']['value']) ?>" />
			<a href="" class="link-to"></a>
			<div class="sketchfab-control">
				<label for="<?php echo esc_attr($field['key']); ?>autostart">
					<input id="<?php echo esc_attr($field['key']); ?>autostart" type="checkbox" name="<?php echo esc_attr($field['key']); ?>[autostart_c]" <?php if($field['value']['autostart']){echo 'checked'; } ?>>
					Autostart
				</label>
			</div>
			<div class="sketchfab-control">
				<label for="<?php echo esc_attr($field['key']); ?>preload">
					<input type="checkbox" name="<?php echo esc_attr($field['key']); ?>[preload_c]" id="<?php echo esc_attr($field['key']); ?>preload" <?php if($field['value']['preload']){echo 'checked'; } ?>>
					Preload
				</label>
			</div>
			<div class="sketchfab-control">
				<label for="<?php echo esc_attr($field['key']); ?>camera">
					<input type="checkbox" name="<?php echo esc_attr($field['key']); ?>[camera_c]" id="<?php echo esc_attr($field['key']); ?>camera"  <?php if($field['value']['camera']){echo 'checked'; } ?>>
					Camera
				</label>
			</div>
			<div class="sketchfab-control">
				<label for="<?php echo esc_attr($field['key']); ?>annotation">
					<input type="checkbox"
						   class="annotations-setting-visible"
						   name="<?php echo esc_attr($field['key']); ?>[annotation_c]"
						   id="<?php echo esc_attr($field['key']); ?>annotation"
						   <?php if($field['value']['annotation']){echo 'checked'; } ?>>
					Annotation
				</label>
			</div>
			<div class="sketchfab-control-group-numbers" style="display: <?php if($field['value']['annotation']){echo 'block;';}else{echo 'none;';} ?>">
				<div class="sketchfab-control">
					<label for="<?php echo esc_attr($field['key']); ?>annotation_num">
						<span><?php echo __('Annotation point number: ') ?></span>
						<input type="number"
							   id="<?php echo esc_attr($field['key']); ?>annotation_num"
							   name="<?php echo esc_attr($field['key']); ?>[annotation_num]"
							   value="<?php echo $field['value']['annotation_num']?:0; ?>"
							   step="1" min="0">
					</label>
				</div>
				<div class="sketchfab-control">
					<label for="<?php echo esc_attr($field['key']); ?>annotation_cycle">
						<span><?php echo __('Annotation time period: '); ?></span>
						<input type="number"
							   id="<?php echo esc_attr($field['key']); ?>annotation_cycle"
							   name="<?php echo esc_attr($field['key']); ?>[annotation_cycle]"
							   value="<?php echo $field['value']['annotation_cycle']?:0; ?>"
							   step="1" min="0">
					</label>
				</div>
			</div>
		</div>

		<?php
	}
	
		
	/*
	*  input_admin_enqueue_scripts()
	*
	*  This action is called in the admin_enqueue_scripts action on the edit screen where your field is created.
	*  Use this action to add CSS + JavaScript to assist your render_field() action.
	*
	*  @type	action (admin_enqueue_scripts)
	*  @since	3.6
	*  @date	23/01/13
	*
	*  @param	n/a
	*  @return	n/a
	*/

	
	
	function input_admin_enqueue_scripts() {
		
		$dir = plugin_dir_url( __FILE__ );
		
		
		// register & include JS
		wp_register_script( 'acf-input-sketchfab_model', "{$dir}js/input.js" );
		wp_enqueue_script('acf-input-sketchfab_model');
		
		
		// register & include CSS
		wp_register_style( 'acf-input-sketchfab_model', "{$dir}css/input.css" ); 
		wp_enqueue_style('acf-input-sketchfab_model');
		
		
	}
	
	
	
	
	/*
	*  input_admin_head()
	*
	*  This action is called in the admin_head action on the edit screen where your field is created.
	*  Use this action to add CSS and JavaScript to assist your render_field() action.
	*
	*  @type	action (admin_head)
	*  @since	3.6
	*  @date	23/01/13
	*
	*  @param	n/a
	*  @return	n/a
	*/

	/*
		
	function input_admin_head() {
	
		
		
	}
	
	*/
	
	
	/*
   	*  input_form_data()
   	*
   	*  This function is called once on the 'input' page between the head and footer
   	*  There are 2 situations where ACF did not load during the 'acf/input_admin_enqueue_scripts' and 
   	*  'acf/input_admin_head' actions because ACF did not know it was going to be used. These situations are
   	*  seen on comments / user edit forms on the front end. This function will always be called, and includes
   	*  $args that related to the current screen such as $args['post_id']
   	*
   	*  @type	function
   	*  @date	6/03/2014
   	*  @since	5.0.0
   	*
   	*  @param	$args (array)
   	*  @return	n/a
   	*/
   	
   	/*
   	
   	function input_form_data( $args ) {
	   	
		
	
   	}
   	
   	*/
	
	
	/*
	*  input_admin_footer()
	*
	*  This action is called in the admin_footer action on the edit screen where your field is created.
	*  Use this action to add CSS and JavaScript to assist your render_field() action.
	*
	*  @type	action (admin_footer)
	*  @since	3.6
	*  @date	23/01/13
	*
	*  @param	n/a
	*  @return	n/a
	*/

	/*
		
	function input_admin_footer() {
	
		
		
	}
	
	*/
	
	
	/*
	*  field_group_admin_enqueue_scripts()
	*
	*  This action is called in the admin_enqueue_scripts action on the edit screen where your field is edited.
	*  Use this action to add CSS + JavaScript to assist your render_field_options() action.
	*
	*  @type	action (admin_enqueue_scripts)
	*  @since	3.6
	*  @date	23/01/13
	*
	*  @param	n/a
	*  @return	n/a
	*/

	/*
	
	function field_group_admin_enqueue_scripts() {
		
	}
	
	*/

	
	/*
	*  field_group_admin_head()
	*
	*  This action is called in the admin_head action on the edit screen where your field is edited.
	*  Use this action to add CSS and JavaScript to assist your render_field_options() action.
	*
	*  @type	action (admin_head)
	*  @since	3.6
	*  @date	23/01/13
	*
	*  @param	n/a
	*  @return	n/a
	*/

	/*
	
	function field_group_admin_head() {
	
	}
	
	*/


	/*
	*  load_value()
	*
	*  This filter is applied to the $value after it is loaded from the db
	*
	*  @type	filter
	*  @since	3.6
	*  @date	23/01/13
	*
	*  @param	$value (mixed) the value found in the database
	*  @param	$post_id (mixed) the $post_id from which the value was loaded
	*  @param	$field (array) the field array holding all the field options
	*  @return	$value
	*/
	

	
	function load_value( $value, $post_id, $field ) {
		
		return $value;
		
	}
	

	
	
	/*
	*  update_value()
	*
	*  This filter is applied to the $value before it is saved in the db
	*
	*  @type	filter
	*  @since	3.6
	*  @date	23/01/13
	*
	*  @param	$value (mixed) the value found in the database
	*  @param	$post_id (mixed) the $post_id from which the value was loaded
	*  @param	$field (array) the field array holding all the field options
	*  @return	$value
	*/
	

	
	function update_value( $value, $post_id, $field ) {
		$res = array();
		$key = $field['key'];
		$res['preload']           = $_REQUEST[$key]["preload_c"]?1:0;
		$res['camera']            = $_REQUEST[$key]["camera_c"]?1:0;
		$res['annotation']        = $_REQUEST[$key]["annotation_c"]?1:0;
		$res['autostart']         = $_REQUEST[$key]["autostart_c"]?1:0;
		$res['annotation_cycle']  = $_REQUEST[$key]["annotation_cycle"]?:0;
		$res['annotation_num']    = $_REQUEST[$key]["annotation_num"]?:0;
		$res['value']             = $value;
		return $res;
	}
	

	
	
	/*
	*  format_value()
	*
	*  This filter is appied to the $value after it is loaded from the db and before it is returned to the template
	*
	*  @type	filter
	*  @since	3.6
	*  @date	23/01/13
	*
	*  @param	$value (mixed) the value which was loaded from the database
	*  @param	$post_id (mixed) the $post_id from which the value was loaded
	*  @param	$field (array) the field array holding all the field options
	*
	*  @return	$value (mixed) the modified value
	*/
		

	
	function format_value( $value, $post_id, $field ) {
		if(empty($value['value'])){
			return false;
		}
		$url = 'https://sketchfab.com/models/'.$value['value'].'/embed?autostart='.($value['autostart']?'1':'0').'&preload='.($value['preload']?'1':'0').'&camera='.($value['camera']?'1':'0');
		// bail early if no value
		if($value['annotation'] && $value['annotation_cycle']>0){
			$url .= '&annotation_cycle='.$value['annotation_cycle'];
		}
		if($value['annotation'] && $value['annotation_num']){
			if($value['annotation_cycle']>0){
				$url .= '&annotation='.($value['annotation_num']-1);
			}else{
				$url .= '&annotation='.$value['annotation_num'];
			}
		}
		// return
		return $url;
	}
	

	
	
	/*
	*  validate_value()
	*
	*  This filter is used to perform validation on the value prior to saving.
	*  All values are validated regardless of the field's required setting. This allows you to validate and return
	*  messages to the user if the value is not correct
	*
	*  @type	filter
	*  @date	11/02/2014
	*  @since	5.0.0
	*
	*  @param	$valid (boolean) validation status based on the value and the field's required setting
	*  @param	$value (mixed) the $_POST value
	*  @param	$field (array) the field array holding all the field options
	*  @param	$input (string) the corresponding input name for $_POST value
	*  @return	$valid
	*/
	
	/*
	
	function validate_value( $valid, $value, $field, $input ){
		
		// Basic usage
		if( $value < $field['custom_minimum_setting'] )
		{
			$valid = false;
		}
		
		
		// Advanced usage
		if( $value < $field['custom_minimum_setting'] )
		{
			$valid = __('The value is too little!','acf-sketchfab_model'),
		}
		
		
		// return
		return $valid;
		
	}
	
	*/
	
	
	/*
	*  delete_value()
	*
	*  This action is fired after a value has been deleted from the db.
	*  Please note that saving a blank value is treated as an update, not a delete
	*
	*  @type	action
	*  @date	6/03/2014
	*  @since	5.0.0
	*
	*  @param	$post_id (mixed) the $post_id from which the value was deleted
	*  @param	$key (string) the $meta_key which the value was deleted
	*  @return	n/a
	*/
	
	/*
	
	function delete_value( $post_id, $key ) {
		
		
		
	}
	
	*/
	
	
	/*
	*  load_field()
	*
	*  This filter is applied to the $field after it is loaded from the database
	*
	*  @type	filter
	*  @date	23/01/2013
	*  @since	3.6.0	
	*
	*  @param	$field (array) the field array holding all the field options
	*  @return	$field
	*/
	

	
	function load_field( $field ) {
		
		return $field;
		
	}	
	

	
	
	/*
	*  update_field()
	*
	*  This filter is applied to the $field before it is saved to the database
	*
	*  @type	filter
	*  @date	23/01/2013
	*  @since	3.6.0
	*
	*  @param	$field (array) the field array holding all the field options
	*  @return	$field
	*/
	

	
	function update_field( $field ) {
		
		return $field;
		
	}	
	

	
	
	/*
	*  delete_field()
	*
	*  This action is fired after a field is deleted from the database
	*
	*  @type	action
	*  @date	11/02/2014
	*  @since	5.0.0
	*
	*  @param	$field (array) the field array holding all the field options
	*  @return	n/a
	*/
	
	/*
	
	function delete_field( $field ) {
		
		
		
	}	
	
	*/
	
	
}


// create field
new acf_field_sketchfab_model();

?>
