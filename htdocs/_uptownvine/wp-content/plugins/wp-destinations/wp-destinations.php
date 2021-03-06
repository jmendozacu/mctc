<?php
/*
 *
 * Plugin Name: WP Destinations
 * Plugin URI: http://www.jessewollin.com/uptownvine
 * Description: WP Destinations gives you the ability to create a map on the front of the site with the ability to see the posts through using modals.
 * Version: 1.0
 * Author: Jesse Wollin
 * Author URI: http://www.jessewollin.com
 * License: GPLv2
 *
 * Copyright 2016 Jesse Wollin
 * email: jessewollin@gmail.com

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

// Start the engines!
add_action( 'load-post.php', 'wp_destinations_setup' );
add_action( 'load-post-new.php', 'wp_destinations_setup' );
// Set it up gangsta!
function wp_destinations_setup() {
    // Alright sparky, give me an admin page
    add_action(
        'admin_menu',
        'wp_destinations_admin_page'
    );
    // Add meta boxes on the 'add_meta_boxes' hook
    add_action(
        'add_meta_boxes',
        'wp_destinations_add_post_meta_boxes',
        10,
        2
    );
    // Add javascript for google map inside Post Editing
    add_action(
        'admin_enqueue_scripts',
        'google_geocode_enqueue',
        20,
        1.2,
        true
    );
    // Save post meta boxes on the 'save_post' hook
    add_action(
        'save_post',
        'wp_destinations_save_post_meta',
        10,
        2
    );
}
add_action(
    'wp_enqueue_scripts',
    'load_jquery'
);
function wp_destination_frontend_scripts() {
    wp_register_script(
        'map',
        plugins_url('js/map.js', __FILE__),
        '',
        '1.0',
        true
    );
    wp_register_script(
        'google_map',
        'https://maps.googleapis.com/maps/api/js?key=AIzaSyD63RYEq0JDHrSHggZMFFcOFfsSd35lld0'
    );
    wp_enqueue_script(
        'google_map'
    );
    wp_enqueue_script(
        'map'
    );
    wp_enqueue_style(
        'wp_destinations_styles',
        plugins_url( '/css/wp-destinations-style.css', __FILE__ )
    );
}
function load_jquery() {
    if ( ! wp_script_is( 'jquery', 'enqueued' )) {

        //Enqueue
        wp_enqueue_script( 'jquery' );

    }
}
add_action( 'wp_enqueue_scripts', 'wp_destination_frontend_scripts' );
function google_geocode_enqueue($hook) {
    if( $hook != 'edit.php' && $hook != 'post.php' && $hook != 'post-new.php' )
        return;
    wp_enqueue_script(
        'jQuery',
        'https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js'
    );
    wp_enqueue_script(
        'google-map',
        'https://maps.googleapis.com/maps/api/js?key=AIzaSyD63RYEq0JDHrSHggZMFFcOFfsSd35lld0'
    );
    wp_enqueue_script(
        'custom-js',
        plugins_url( 'wp-destinations/js/admin-map.js' , dirname(__FILE__) )
    );
}
// Create one or more meta boxes to be displayed on the post editor screen
function wp_destinations_add_post_meta_boxes() {
	add_meta_box(
		'wp-destinations',                                  // Unique ID
		esc_html__( 'WP Destinations', 'WP Destinations' ), // Title
		'wp_destinations_meta_box_callback', 		        // Callback Function
		'post', 									        // Admin Post
		'normal', 									        // Context
		'high'										        // Priority
	);
}
// Display the post meta box
function wp_destinations_meta_box_callback( $object ) {
    wp_nonce_field( basename( __FILE__ ), 'wp_destinations_meta_boxes_nonce' );
    $wp_destinations_address = esc_attr( get_post_meta( $object->ID, 'wp_destinations_address', true ) );
    $get_latitude = esc_attr( get_post_meta( $object->ID, 'wp_destinations_latitude', true ) );
    $get_longitude = esc_attr( get_post_meta( $object->ID, 'wp_destinations_longitude', true ) );
    $get_latitude = str_replace( '-', '.', $get_latitude );
    $get_longitude = str_replace( '-', '.', $get_longitude );
    if ( $get_latitude[0] == '.' ) {
        $get_latitude[0] = str_replace('.', '-', $get_latitude[0] );
    }
    if ( $get_longitude[0] == '.' ) {
        $get_longitude[0] = str_replace('.', '-', $get_longitude[0] );
    }
    ?>
    <p>
        <label for='wp-destinations-address'><?php _e( 'Add a location address', 'example' ); ?></label>
        <br />
        <input class='widefat' type='text' name='wp-destinations-address' id='wp-destinations-address' value='<?php echo new_address_detail($wp_destinations_address); ?>' size='30' />
        <a id="get-coords" class="button widefat button-primary button-large" style="margin: 10px 0 10px 0;" onclick="getWPDestinationCoords();">Get the Coordinates</a>
        <label for='wp-destinations-post-lats'>Latitude</label>
        <br />
        <input type='text' name='wp-destinations-post-lats' id='wp-destinations-post-lats' value='<?php echo $get_latitude; ?>' size='30' />
        <br />
        <label for='wp-destinations-post-longs'>Longitude</label>
        <br />
        <input type='text' name='wp-destinations-post-longs' id='wp-destinations-post-longs' value='<?php echo $get_longitude; ?>' size='30' />
    </p>
    <div id='admin-map' style='height: 300px; width: 100%;'></div>
    <?php
}
// Returns string without dashes
function new_address_detail( $wp_destinations_location_string ) {
    $wp_destinations_location_string = str_replace( '-', ' ', $wp_destinations_location_string);
    return $wp_destinations_location_string;
}
function wp_destinations_save_post_meta( $post_id, $post) {
	// Verify the nonce before proceeding
	if ( !isset( $_POST['wp_destinations_meta_boxes_nonce'] ) || !wp_verify_nonce( $_POST['wp_destinations_meta_boxes_nonce'], basename( __FILE__ ) ) )
    return $post_id;

    // Get the post type object.
  	$post_type = get_post_type_object( $post->post_type );

  	// Check if the current user has permission to edit the post
  	if ( !current_user_can( $post_type->cap->edit_post, $post_id ) ) {
        return $post_id;
    }

  	// Get the posted data and sanitize it for use as an HTML class
  	$new_address_meta_value = ( isset( $_POST['wp-destinations-address'] ) ? sanitize_title_with_dashes( $_POST['wp-destinations-address'] ) : '' );
    $new_latitude_meta_value = ( isset( $_POST['wp-destinations-post-lats'] ) ? sanitize_text_field( $_POST['wp-destinations-post-lats'] ) : '' );
    $new_longitude_meta_value = ( isset( $_POST['wp-destinations-post-longs'] ) ? sanitize_text_field( $_POST['wp-destinations-post-longs'] ) : '' );

    // Get the meta key.
  	$meta_address_key = 'wp_destinations_address';
    $meta_latitude_key = 'wp_destinations_latitude';
    $meta_longitude_key = 'wp_destinations_longitude';

    // Get the meta value of the custom field key
  	$meta_address_value = get_post_meta( $post_id, $meta_address_key, true );

    // If a new meta value was added and there was no previous value, add it
  	if ( $new_address_meta_value && '' == $meta_address_value ) {
        add_post_meta( $post_id, $meta_address_key, $new_address_meta_value, true );
        add_post_meta( $post_id, $meta_latitude_key, $new_latitude_meta_value, true );
        add_post_meta( $post_id, $meta_longitude_key, $new_longitude_meta_value, true );
    }
  	// If the new meta value does not match the old value, update it
  	else if ( $new_address_meta_value && $new_address_meta_value != $meta_address_value ) {
        update_post_meta( $post_id, $meta_address_key, $new_address_meta_value );
        update_post_meta( $post_id, $meta_latitude_key, $new_latitude_meta_value );
        update_post_meta( $post_id, $meta_longitude_key, $new_longitude_meta_value );
    }
  	// If there is no new meta value but an old value exists, delete it
  	else if ( '' == $new_address_meta_value && $meta_address_value ) {
        delete_post_meta( $post_id, $meta_address_key, $new_address_meta_value );
        delete_post_meta( $post_id, $meta_latitude_key, $new_latitude_meta_value );
        delete_post_meta( $post_id, $meta_longitude_key, $new_longitude_meta_value );
    }
    return $post_id;
}