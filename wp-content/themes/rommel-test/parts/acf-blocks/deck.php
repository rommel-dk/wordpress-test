<?php
defined( 'ABSPATH' ) || exit;

/**
 * Deck Template.
 *
 * @var array $block The block settings and attributes.
 * @var string $content The block inner HTML (empty).
 * @var bool $is_preview True during AJAX preview.
 * @var int|string $post_id The post ID this block is saved to.
 */

$className = theme_get_block_settings( $block, [
	'className',
] );

// Build default template.
$template = [
	[
		'core/heading',
		[
			'placeholder' => __( 'Add a small Heading', THEME_TEXTDOMAIN ),
			'level'       => 5,
			'className'   => 'has-caps-s-font-size'
		],
	],
	[
		'core/heading',
		[
			'placeholder' => __( 'Add a Heading', THEME_TEXTDOMAIN ),
			'level'       => 2,
			'className'   => 'has-heading-l-font-size'
		],
	],
	[
		'core/paragraph',
		[
			'placeholder' => __( 'Add a Paragraph', THEME_TEXTDOMAIN ),
			'className'   => 'has-m-font-size has-weight-medium'
		],
	],
	[
		'core/buttons',
		[],
		[
			[
				'core/button',
				[],
			],
		],
	],
];

// Define allowed inner blocks.
$allowed_blocks = [
	'core/heading',
	'core/paragraph',
	'core/buttons',
	'core/button',
];

// Get fields.
$image = get_field( 'text_and_media_image' );
$flip  = get_field( 'text_and_media_flip' );

// Get layout type and class
$deck_content = get_field( 'deck_content' );
$layout_class = '';

$water_drop_image = get_field( 'water_drop_image' );
?>
<div id="<?php theme_acf_block_get_id( $block ); ?>" class="deck-container-outer alignfull">
	<div class="deck-container alignfull">
		<div class="deck <?php esc_attr_e( $className ); ?>">
			<div class="deck__inner-content">
				<InnerBlocks
						template="<?php echo esc_attr( wp_json_encode( $template ) ); ?>"
						allowedBlocks="<?php echo esc_attr( wp_json_encode( $allowed_blocks ) ); ?>"
				/>
			</div>
			<?php if ( $water_drop_image ) : ?>
				<div class="deck__layout-content">
					<div class="water-drop-image-shadow">
						<div class="water-drop-image">
							<?php echo wp_get_attachment_image( $water_drop_image, 'full' ); ?>
						</div>
					</div>
					<span class="water-drop-bg"></span>
				</div>
			<?php endif; ?>
		</div>
	</div>
</div>
