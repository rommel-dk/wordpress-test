<?php
defined( 'ABSPATH' ) || exit;

/**
 * Remove Gutenberg Block Library CSS from loading on the frontend.
 */
function theme_editor_remove_wp_block_library_css() {
	wp_dequeue_style( 'wp-block-library' );
	wp_dequeue_style( 'wp-block-library-theme' );
}

add_action( 'wp_enqueue_scripts', 'theme_editor_remove_wp_block_library_css', 100 );

/**
 * Add Gutenberg editor assets.
 */
function theme_editor_enqueue_assets() {
	wp_enqueue_script( 'theme-gutenberg-editor-assets', esc_url( THEME_ASSETS_DIR . '/js/editor.assets.js' ), [
		'wp-blocks',
		'wp-dom',
	], THEME_VERSION, true );
}

add_action( 'enqueue_block_editor_assets', 'theme_editor_enqueue_assets' );

/**
 * Add a menu item for the Gutenberg Reusable blocks editor to the admin menu under tools.
 */
function theme_editor_admin_menu_add_reusable_blocks_link() {
	add_submenu_page(
		'tools.php',
		__( 'Reusable Blocks', THEME_TEXTDOMAIN ),
		__( 'Reusable Blocks', THEME_TEXTDOMAIN ),
		'edit_posts',
		'edit.php?post_type=wp_block'
	);
}

add_action( 'admin_menu', 'theme_editor_admin_menu_add_reusable_blocks_link' );
