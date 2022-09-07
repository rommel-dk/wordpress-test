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
		'name'            => 'star-rating',
		'title'           => __( 'Star rating', THEME_TEXTDOMAIN ),
		'description'     => __( 'A star rating block.', THEME_TEXTDOMAIN ),
		'render_callback' => 'theme_acf_blocks_render_block',
		'icon'            => 'star-filled',
		'mode'            => 'preview',
		'supports'        => [
			'anchor' => true,
			'align'  => false,
			'mode'   => false,
		],
		'category'        => THEME_TEXTDOMAIN,
		'keywords'        => array_merge( [
			THEME_TEXTDOMAIN,
			THEME_CUSTOMER_NAME
		], [ /* Insert block specifc keywords here as an array */ ] )
	] );
} );

/**
 * Turn star rating into star icons.
 *
 * @param $star_rating
 *
 * @return void
 */
function theme_block_star_rating_get_rating( $star_rating ) {
	for ( $i = 1; $i <= $star_rating; $i ++ ) {
		echo '<span class="icon-star-full"></span>';
	}
	if ( strpos( $star_rating, '.' ) ) {
		echo '<span class="icon-star-half"></span>';
		$i ++;
	}
	while ( $i <= 5 ) {
		echo '<span class="icon-star-empty"></span>';
		$i ++;
	}
}