<?php
defined( 'ABSPATH' ) || exit;

/**
 * Theme specific definitions.
 */
$template_url = is_main_site() ? get_template_directory_uri() : str_replace( get_blog_details()->path, '/', get_template_directory_uri() );
define( 'THEME_TEXTDOMAIN', 'rommel' );
define( 'THEME_CUSTOMER_NAME', __( 'Rommel', THEME_TEXTDOMAIN ) );
define( 'THEME_VERSION', wp_get_theme()->Version );
define( 'THEME_ASSETS_DIR', esc_url( $template_url ) . '/assets/dist' );
define( 'THEME_ASSETS_PATH', get_template_directory() . '/assets/dist' );

/**
 * Start loading the guts of the theme.
 */
require_once( __DIR__ . '/includes/class-theme-bem.php' );
require_once( __DIR__ . '/includes/class-theme-walker-nav-menu.php' );
require_once( __DIR__ . '/includes/helpers.php' );
require_once( __DIR__ . '/includes/scripts.php' );
require_once( __DIR__ . '/includes/theme.php' );
require_once( __DIR__ . '/includes/editor.php' );
require_once( __DIR__ . '/includes/customizer/class-theme-customizer.php' );

/**
 * Require ACF files, only if ACF exists.
 */
if ( class_exists( 'ACF' ) ) {
	require_once( __DIR__ . '/includes/acf.php' );
}
