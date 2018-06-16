<?php

/*

    Plugin Name: Halloween Plugin
    Plugin URI: http:// example.com/ wordpress-plugins/ halloween-plugin
    Description: This is a brief description of my plugin
    Version: 1.0
    Author: Michael Myers
    Author URI: http:// example.com
    License: GPLv2

    Copyright 2016 Jesse Wollin
    email: jessewollin@gmail.com

    This program is free software; you can redistribute it and/ or
    modify it under the terms of the GNU General Public License
    as published by the Free Software Foundation; either version 2
    of the License, or (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.

    See the GNU General Public License for more details.
    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software Foundation, Inc.,
    51 Franklin St, Fifth Floor, Boston, MA 02110-1301 USA

*/

$howdy = __( 'Howdy Neighbor!', 'prowp-plugin');
$error_number = 6980;
$error_field = "Email";

echo _x( 'Editor', 'user role', 'prowp-plugin' );
echo _x( 'Editor', 'rich-text editor', 'prowp-plugin');

printf( __( 'Error Code %1$d: %2$s is  field', 'prowp-plugin' ),
    $error_number, $error_field );

register_activation_hook( __FILE__, 'prowp_install' );

function prowp_install() {
    global $wp_version;

    if ( version_compare( $wp_version, '3.5', '<' ) ) {
        wp_die( 'This plugin requires Wordpress version 3.5 or higher' );
    }
}

register_deactivation_hook( __FILE__, 'prowp_deactivate()');

function prowp_deactivate() {

}

add_action( 'init', 'prowp_init' );

function prowp_init() {
    load_plugin_text_domain( 'prowp-plugin', false, plugin_basename( dirname( __FILE__ ).'/localization' ) );
}
?>
<form method="post">
    <?php wp_nonce_field( 'prowp_settings_form_save', 'prowp_nonce_field' ); ?>
    Enter your name:
    <input type="text" name="text">
    <input type="submit" name="submit" value="Save Options" />
</form>

<?php

function prowp_update_options() {
    if ( isset( $_POST['submit'] ) ) {
        // Check nonce for security
        check_admin_referer( 'prowp_settings_form_save', 'prowp_nonce_field' );

        // Nonce passed
    }
}



