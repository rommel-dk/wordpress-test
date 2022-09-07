<?php
defined( 'ABSPATH' ) || exit;

/**
 * Fall back function for ACF get_field.
 *
 * When ACF isn't activated we don't want the theme to throw a fatal error, so
 * we define our own get_field function if it isn't present after the plugins
 * have loaded.
 */
add_action( 'plugins_loaded', function () {
	if ( ! function_exists( 'get_field' ) ) {
		function get_field( $selector, $post_id_or_term, $format_value = true ) {
			$field_value = '';
			if ( $post_id_or_term == 'option' ) {
				$field_value = get_option( 'option_' . $selector );
			} elseif ( $post_id_or_term instanceof WP_Term ) {
				get_term_meta( $post_id_or_term->term_id, $selector );
			} else {
				$field_value = get_post_meta( $post_id_or_term, $selector, true ) ?: '';
			}

			return $field_value;
		}
	}
} );

/**
 * Helper function to get theme options from customizer.
 *
 * @param string $optionKey
 * @param mixed $default
 *
 * @return mixed
 */
function theme_helpers_get_options( string $optionKey = '', $default = [] ) {
	return Theme_Customizer::get_instance()->get_options($optionKey, $default);
}
