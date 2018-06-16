<?php

function customizer_library_get_default( $setting ) {

	$customizer_library = Customizer_Library::Instance();
	$options = $customizer_library->get_options();

	if ( isset( $options[ $setting ]['default'] ) ) {
		return $options[ $setting ]['default'];
	}
}

function customizer_library_get_choices( $setting ) {

	$customizer_library = Customizer_Library::Instance();
	$options = $customizer_library->get_options();

	if ( isset( $options[ $setting ]['choices'] ) ) {
		return $options[ $setting ]['choices'];
	}
}

function customizer_library_hex_to_rgb( $hex ) {

	// Remove "#" if it was added
	$color = trim( $hex, '#' );

	// Return empty array if invalid value was sent
	if ( ! ( 3 === strlen( $color ) ) && ! ( 6 === strlen( $color ) ) ) {
		return array();
	}

	// If the color is three characters, convert it to six.
	if ( 3 === strlen( $color ) ) {
		$color = $color[0] . $color[0] . $color[1] . $color[1] . $color[2] . $color[2];
	}

	// Get the red, green, and blue values
	$red   = hexdec( $color[0] . $color[1] );
	$green = hexdec( $color[2] . $color[3] );
	$blue  = hexdec( $color[4] . $color[5] );

	// Return the RGB colors as an array
	return array( 'r' => $red, 'g' => $green, 'b' => $blue );

}

function customizer_library_remove_theme_mods() {

	$customizer_library = Customizer_Library::Instance();
	$options = $customizer_library->get_options();

	if ( $options ) {
		foreach ( $options as $option ) {
			if ( isset( $option['id'] ) ) {
				remove_theme_mod( $option['id'] );
			}
		}
	}
}
