<?php

/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       http://localhost:8080/wordpress/
 * @since      1.0.0
 *
 * @package    Connect
 * @subpackage Connect/public/partials
 */


if ( ! function_exists( 'aa_link_shortcode' ) ) {
	// Add the action.
	add_action( 'plugins_loaded', function() {
		// Add the shortcode.
		add_shortcode( 'link', 'aa_link_shortcode' );
	});
	/**
	 * Shortcode Function
	 *
	 * @param  Attributes $atts l|t URL TEXT.
	 * @return string
	 * @since  1.0.0
	 */
	function aa_link_shortcode( $atts ) {
		// Text Default.
		$text_default = __( 'About Me', 'ABS' );
		// Save $atts.
		$_atts = shortcode_atts( array(
			'u'  => '/',           // URL.
			't'  => $text_default, // Text.
		), $atts );
		// URL.
		$_url = $_atts['u'];
		// Text.
		$_text = $_atts['t'];
		// Return it, Safe in PHP 7.0.
		$_return = '<a href="' . $_url . '"> ' . $_text . ' </a>';
		// Return the data.
		return $_return;
	}
} // End if().
?>