<?php
defined( 'ABSPATH' ) || exit;

/**
 * Message Template.
 *
 * @var array $block The block settings and attributes.
 * @var string $content The block inner HTML (empty).
 * @var bool $is_preview True during AJAX preview.
 * @var int|string $post_id The post ID this block is saved to.
 */
$className = theme_get_block_settings( $block, [
	'className',
	'backgroundColor',
	'textColor',
	'align'
] );

// Build default template.
$template = [
	[
		'core/paragraph',
		[
			'placeholder' => __( 'Add a short message', THEME_TEXTDOMAIN ),
			'className'   => 'has-m-font-size has-weight-medium',
		],
	],
	[
		'core/button',
		[
			'placeholder'   => __( 'Add a button text', THEME_TEXTDOMAIN ),
			'button-layout' => 'text-inside-has-arrow',
			'target' => '_blank',
		],
	],
];

// Define allowed inner blocks.
$allowed_blocks = [
	'core/paragraph',
	'core/button',
];
?>
<div id="<?php theme_acf_block_get_id( $block ); ?>" class="message-container <?php esc_attr_e( $className ); ?>">
	<div class="message__inner-blocks">
		<InnerBlocks
				template="<?php echo esc_attr( wp_json_encode( $template ) ); ?>"
				allowedBlocks="<?php echo esc_attr( wp_json_encode( $allowed_blocks ) ); ?>"
				templateLock="all"
		/>
	</div>
</div>