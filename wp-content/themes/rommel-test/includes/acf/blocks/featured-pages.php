<?php
defined( 'ABSPATH' ) || exit;

/**
 * @Link https://www.advancedcustomfields.com/resources/acf_register_block_type/#examples
 */
add_action( 'acf/init', function () {
	if ( ! function_exists( 'acf_register_block' ) ) {
		return;
	}
	acf_register_block_type( [
		'name'            => 'featured-pages',
		'title'           => __( 'Featured pages', THEME_TEXTDOMAIN ),
		'description'     => __( 'A custom featured pages block.', THEME_TEXTDOMAIN ),
		'render_callback' => 'theme_acf_blocks_render_block',
		'icon'            => 'tide',
		'mode'            => 'preview',
		'supports'        => [
			'jsx'    => true,
			'align'  => false,
			'anchor' => true,
		],
		'category'        => THEME_TEXTDOMAIN,
		'keywords'        => array_merge( [
			THEME_TEXTDOMAIN,
			THEME_CUSTOMER_NAME
		], [ /* Insert block specifc keywords here as an array */ ] )
	] );
} );
