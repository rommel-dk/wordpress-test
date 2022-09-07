<?php
defined( 'ABSPATH' ) || exit;

/**
 * Featured Pages Template.
 *
 * @var array $block The block settings and attributes.
 * @var string $content The block inner HTML (empty).
 * @var bool $is_preview True during AJAX preview.
 * @var int|string $post_id The post ID this block is saved to.
 */
$className = theme_get_block_settings( $block, [
	'className',
] );

$allowedColumnBlocks = [
	'core/heading',
	'core/paragraph',
	'core/buttons',
	'core/button',
];

// Build default template.
$template = [
	[
		'core/heading',
		[
			'placeholder' => __( 'Add a Heading', THEME_TEXTDOMAIN ),
			'level'       => 2,
			'className'   => 'has-heading-m-font-size',
			'textAlign'   => 'center'
		],
	],
	[
		'core/group',
		[
			'backgroundColor' => 'gray-light',
			'align'           => 'full',
			'waves-before'    => true
		],
		[
			[
				'core/columns',
				[
					'align' => 'full',
				],
				[
					/* Column 1 */
					[
						'core/column',
						[
							'width'           => '16.667%',
							'backgroundColor' => 'white',
							'allowedBlocks'   => $allowedColumnBlocks,
						],
					],
					/* Column 2 */
					[
						'core/column',
						[
							'width'           => '16.667%',
							'backgroundColor' => 'white',
							'allowedBlocks'   => $allowedColumnBlocks,
						],
					],
					/* Column 3 */
					[
						'core/column',
						[
							'width'           => '16.667%',
							'backgroundColor' => 'white',
							'allowedBlocks'   => $allowedColumnBlocks,
						],
					],
					/* Column 4 */
					[
						'core/column',
						[
							'width'           => '16.667%',
							'backgroundColor' => 'blue-light',
							'allowedBlocks'   => $allowedColumnBlocks,
						],
					],
					/* Column 5 */
					[
						'core/column',
						[
							'width'           => '33.333%',
							'backgroundColor' => 'blue-dark',
							'allowedBlocks'   => $allowedColumnBlocks,
						],
					],
				],
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
	'core/groups',
	'core/columns',
];
?>
<div id="<?php theme_acf_block_get_id( $block ); ?>" class="featured-pages <?php esc_attr_e( $className ); ?>">
	<InnerBlocks
			template="<?php echo esc_attr( wp_json_encode( $template ) ); ?>"
			allowedBlocks="<?php echo esc_attr( wp_json_encode( $allowed_blocks ) ); ?>"
	/>
</div>
