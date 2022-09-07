<?php
defined( 'ABSPATH' ) || exit;

/**
 * Include ACF Exports.
 */
require_once 'acf/fields/blocks/block-accordion.php';
require_once 'acf/fields/blocks/block-deck.php';
require_once 'acf/fields/blocks/block-featured-pages.php';
require_once 'acf/fields/blocks/block-star-rating.php';

/**
 * Include ACF Blocks.
 */
require_once 'acf/blocks/accordion.php';
require_once 'acf/blocks/deck.php';
require_once 'acf/blocks/featured-pages.php';
require_once 'acf/blocks/message.php';
require_once 'acf/blocks/star-rating.php';

/**
 * Callback function used to render the ACF block calling it.
 *
 * All the ACF blocks registered in theme_acf_blocks_init() has render_callback
 * set to this function, which then takes the supplied block's name and looks
 * for its template in "partials/acf-blocks".
 *
 * @param array $block
 */
function theme_acf_blocks_render_block( $block, $content, $is_preview, $post_id ) {
	$slug = str_replace( 'acf/', '', $block['name'] );
	if ( file_exists( get_theme_file_path( "/parts/acf-blocks/{$slug}.php" ) ) ) {
		include get_theme_file_path( "/parts/acf-blocks/{$slug}.php" );
	}
}

/**
 * Get the block ID.
 *
 * @param array $block
 * @param bool $echo
 *
 * @return string|mixed
 */
function theme_acf_block_get_id( array $block, bool $echo = true ) {
	$block_id = esc_attr( $block['anchor'] ?? '' );
	if ( ! $echo ) {
		return $block_id;
	}

	echo $block_id;
}

/**
 * Get block settings.
 *
 * @param array $block
 * @param array $settings
 *
 * @return string
 */
function theme_get_block_settings(
	array $block, array $settings = [
	'className',
	'align',
	'textColor',
	'backgroundColor'
]
): string {
	$className = '';

	if ( in_array( 'className', $settings ) ) {
		$className = theme_acf_get_class_name( $className, $block );
	}

	if ( in_array( 'align', $settings ) ) {
		$className = theme_acf_get_align_settings( $className, $block );
	}

	if ( in_array( 'textColor', $settings ) ) {
		$className = theme_acf_get_text_color_settings( $className, $block );
	}

	if ( in_array( 'backgroundColor', $settings ) ) {
		$className = theme_acf_get_background_color_settings( $className, $block );
	}

	return $className;
}

/**
 * Get block classname
 *
 * @param string $className
 * @param $block
 *
 * @return string
 */
function theme_acf_get_class_name( string $className, $block ): string {
	if ( ! empty( $block['className'] ) ) {
		$className .= sprintf( ' %s', $block['className'] );
	}

	return $className;
}

/**
 * @param string $className
 * @param $block
 *
 * @return string
 */
function theme_acf_get_align_settings( string $className, $block ): string {
	if ( ! empty( $block['align'] ) ) {
		$className .= sprintf( ' align%s', $block['align'] );
	}

	return $className;
}

/**
 * @param string $className
 * @param $block
 *
 * @return string
 */
function theme_acf_get_text_color_settings( string $className, $block ): string {
	if ( ! empty( $block['textColor'] ) ) {
		$className .= sprintf( ' has-text-color has-%s-color', $block['textColor'] );
	}

	return $className;
}

/**
 * @param string $className
 * @param $block
 *
 * @return string
 */
function theme_acf_get_background_color_settings( string $className, $block ): string {
	if ( ! empty( $block['backgroundColor'] ) ) {
		$className .= sprintf( ' has-background has-%s-background-color', $block['backgroundColor'] );
	}

	return $className;
}

/**
 * Add custom categories to editor.
 *
 * @param array $categories
 *
 * @return array
 */
function theme_acf_block_category( array $categories ): array {
	$categories[] = [
		'slug'  => THEME_TEXTDOMAIN,
		'title' => THEME_CUSTOMER_NAME
	];

	return $categories;
}

add_filter( 'block_categories_all', 'theme_acf_block_category' );

/**
 * Helper function for empty blocks which expects content to be added after adding the block.
 *
 * @param $block_name
 *
 * @return void
 */
function theme_acf_block_empty_assistance( $block_name, $content_in_sidebar = false ) {
	?>
	<div class="editor-guide">
		<h2><?php _e( $block_name . ' block', THEME_TEXTDOMAIN ); ?></h2>
		<?php if ( $content_in_sidebar ) : ?>
			<p><?php _e( 'Select the block and add content in the right sidebar to get started.', THEME_TEXTDOMAIN ); ?></p>
		<?php else: ?>
			<p><?php _e( 'Select the block and click <span class="dashicons dashicons-edit"></span> to edit.', THEME_TEXTDOMAIN ); ?></p>
		<?php endif; ?>
	</div>
	<?php
}
