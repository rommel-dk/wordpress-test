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
		'name'            => 'accordion',
		'title'           => __( 'Accordion', THEME_TEXTDOMAIN ),
		'description'     => __( 'A custom accordion block.', THEME_TEXTDOMAIN ),
		'render_template' => 'theme_acf_blocks_render_block',
		'icon'            => 'arrow-down-alt2',
		'supports'        => [
			'anchor' => true,
		],
		'category'        => THEME_TEXTDOMAIN,
		'keywords'        => array_merge( [
			THEME_TEXTDOMAIN,
			THEME_CUSTOMER_NAME
		], [ /* Insert block specifc keywords here as an array */ ] )
	] );
} );
