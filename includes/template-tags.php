<?php

/**
 * Template Tags
 */

/**
 * Format the header/footer text by applying the same filters that are
 * used with post content.
 *
 * We could use `apply_filters( 'the_content' )` but some plugins
 * do strange things to this and we don't want to break anything
 *
 * @since 2.0
 */
function header_text_register_formatting_filters() {

	$filters = array(
		'do_shortcode',
		'wptexturize',
		'convert_smilies',
		'convert_chars',
		'wpautop',
		'shortcode_unautop',
		'capital_P_dangit',
	);

	foreach ( $filters as $filter ) {
		add_filter( 'get_header_text', $filter );
	}

}

function footer_text_register_formatting_filters() {

	$filters = array(
		'do_shortcode',
		'wptexturize',
		'convert_smilies',
		'convert_chars',
		'wpautop',
		'shortcode_unautop',
		'capital_P_dangit',
	);

	foreach ( $filters as $filter ) {
		add_filter( 'get_footer_text', $filter );
	}

}
add_action( 'init', 'header_text_register_formatting_filters' );
add_action( 'init', 'footer_text_register_formatting_filters' );

/**
 * Fetches the header/footer text from the database
 * with formatting functions applied
 *
 * @param  string $default What to use if no header/footer text is set
 * @return string          The formatted header/footer text
 *
 * @since  1.0
 */
function get_header_text( $default = '' ) {

	/* Retrieve the header text from the database */
	$header_text = get_option( 'theme_header_text', $default );

	/* Filter and return the text */
	return apply_filters( 'get_header_text', $header_text );
}

function get_footer_text( $default = '' ) {

	/* Retrieve the footer text from the database */
	$footer_text = get_option( 'theme_footer_text', $default );

	/* Filter and return the text */
	return apply_filters( 'get_footer_text', $footer_text );
}

/**
 * Retrieves the header/footer text and displays it if it is set
 * Nothing is displayed if the header/footer text is not set
 *
 * @uses   get_header_text()/get_footer_text() To retrieve the header/footer text
 *
 * @param  string $default   What to display if no text is set
 * @param  string $before    The text to display before the header/footer text
 * @param  string $after     The text to display after the header/footer text
 * @return void
 *
 * @since  1.0
 */
function header_text( $default = '', $before = '', $after = '' ) {
	$header_text = get_header_text( $default );

	if ( $header_text ) {
		echo $before . $header_text . $after;
	}
}

function footer_text( $default = '', $before = '', $after = '' ) {
	$footer_text = get_footer_text( $default );

	if ( $footer_text ) {
		echo $before . $footer_text . $after;
	}
}

/**
 * Add an action as an alternate way to add header/footer text
 */
add_action( 'header_text', 'header_text', 10, 3 );
add_action( 'footer_text', 'footer_text', 10, 3 );
