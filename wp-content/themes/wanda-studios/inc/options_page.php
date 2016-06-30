<?php

add_action('admin_init', 'theme_settings_init');
add_action('admin_menu', 'add_settings_page');

function theme_settings_init(){
    register_setting('theme_settings', 'theme_settings');
}
function add_settings_page(){
    add_menu_page(__('Global Settings'), __('Global Settings'), 'manage_options', 'settings', 'theme_settings_page');
}

function theme_settings_page(){
    if(!isset($_REQUEST['updated'])){
        $_REQUEST['updated'] = false;
    }
    ?>
    <div id="icon-options-general"></div>
    <h2 id="title"><?php _e( 'Theme Settings' ) //your admin panel title ?></h2>

    <?php
    if ( false !== $_REQUEST['updated'] ) : ?>
        <div><p><strong><?php _e( 'Options saved' ); ?></strong></p></div>
    <?php endif; ?>
    <form method="post" action="options.php">
    <?php settings_fields( 'theme_settings' ); ?>
    <?php $options = get_option( 'theme_settings' ); ?>

        <table>
            <tr valign="middle">
                <th scope="row"><?php _e( 'Google map key' ); ?>:</th>
                <td>
                    <input id="theme_settings[google_map_key]" type="text" size="40" name="theme_settings[google_map_key]" value="<?php esc_attr_e( $options['google_map_key'] ); ?>" />
                </td>
            </tr>
            <tr valign="middle">
                <th scope="row"><?php _e( 'Baidu map key' ); ?>:</th>
                <td>
                    <input id="theme_settings[baidu_map_key]" type="text" size="40" name="theme_settings[baidu_map_key]" value="<?php esc_attr_e( $options['baidu_map_key'] ); ?>" />
                </td>
            </tr>
        </table>
        <p><input name="submit" id="submit" value="Save Changes" type="submit"></p>
    </form>
    <?php
}