<?php
defined( 'ABSPATH' ) || exit;

/**
 * Setup theme base settings.
 */
function theme_setup() {

	// Make theme available for translation.
	load_theme_textdomain( THEME_TEXTDOMAIN, get_template_directory() . '/languages' );

	// Register navigation menus.
	register_nav_menus( [
		'header' => __( 'Header', THEME_TEXTDOMAIN ),
		'footer' => __( 'Footer', THEME_TEXTDOMAIN ),
	] );

	// Support HTML5.
	add_theme_support( 'html5', [
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
		'script',
		'style',
	] );

	// Enable featured image support.
	add_theme_support( 'post-thumbnails' );

	// Enable custom header support.
	add_theme_support( 'custom-logo' );

	// Let WordPress handle/insert <title> tag from header via wp_head() function.
	add_theme_support( 'title-tag' );

	// For the Block Editor.
	add_theme_support( 'align-wide' );
	add_theme_support( 'block-styles' );

	// WordPress editor styles.
	add_theme_support( 'editor-styles' );
	add_editor_style( 'assets/dist/css/editor-styles.css' );

	// Social media.
	add_theme_support(
		'social-media',
		[
			'facebook'  => __( 'Facebook', THEME_TEXTDOMAIN ),
			'instagram' => __( 'Instagram', THEME_TEXTDOMAIN ),
			'youtube'   => __( 'Youtube', THEME_TEXTDOMAIN ),
		]
	);

	// Disable gradients.
	add_theme_support( 'disable-custom-gradients' );
	add_theme_support(
		'editor-gradient-presets',
		[
			[
				'name'     => __( 'Bluegreen', THEME_TEXTDOMAIN ),
				'gradient' => 'linear-gradient(261.38deg, rgba(0, 147, 221, 0.59) 0.82%, #33BBAA 99.04%)',
				'slug'     => 'bluegreen-gradient',
			]
		]
	);

	// Responsive embeds.
	add_theme_support( 'responsive-embeds' );

	// Add theme color palette.
	add_theme_support( 'editor-color-palette', [
		[
			'name'  => esc_html__( 'Blue (brand)', THEME_TEXTDOMAIN ),
			'slug'  => 'brand',
			'color' => '#017DBC',
		],
		[
			'name'  => esc_html__( 'White', THEME_TEXTDOMAIN ),
			'slug'  => 'white',
			'color' => '#ffffff',
		],
		[
			'name'  => esc_html__( 'Light Gray', THEME_TEXTDOMAIN ),
			'slug'  => 'gray-light',
			'color' => '#F2F8FD',
		],
		[
			'name'  => esc_html__( 'Gray', THEME_TEXTDOMAIN ),
			'slug'  => 'gray',
			'color' => '#707A87',
		],
		[
			'name'  => esc_html__( 'Black', THEME_TEXTDOMAIN ),
			'slug'  => 'black',
			'color' => '#272E37',
		],
		[
			'name'  => esc_html__( 'Light Blue', THEME_TEXTDOMAIN ),
			'slug'  => 'blue-light',
			'color' => '#C6E5F6',
		],
	] );

	// Disable the custom font size feature.
	add_theme_support( 'disable-custom-font-sizes' );

	// Theme font-sizes.
	add_theme_support(
		'editor-font-sizes',
		[
			// Text sizes
			[
				'name' => __( 'Text XXS', THEME_TEXTDOMAIN ),
				'size' => 11,
				'slug' => 'xxs'
			],
			[
				'name' => __( 'Text XS', THEME_TEXTDOMAIN ),
				'size' => 14,
				'slug' => 'xs'
			],
			[
				'name' => __( 'Text S', THEME_TEXTDOMAIN ),
				'size' => 16,
				'slug' => 's'
			],
			[
				'name' => __( 'Text M', THEME_TEXTDOMAIN ),
				'size' => 18,
				'slug' => 'm'
			],
			[
				'name' => __( 'Text L', THEME_TEXTDOMAIN ),
				'size' => 22,
				'slug' => 'l'
			],
			[
				'name' => __( 'Text XL', THEME_TEXTDOMAIN ),
				'size' => 34,
				'slug' => 'xl'
			],
			// Heading sizes
			[
				'name' => __( 'Heading XXS', THEME_TEXTDOMAIN ),
				'size' => 23,
				'slug' => 'heading-xxs'
			],
			[
				'name' => __( 'Heading S', THEME_TEXTDOMAIN ),
				'size' => 34.01,
				'slug' => 'heading-s'
			],
			[
				'name' => __( 'Heading M', THEME_TEXTDOMAIN ),
				'size' => 42,
				'slug' => 'heading-m'
			],
			[
				'name' => __( 'Heading L', THEME_TEXTDOMAIN ),
				'size' => 52,
				'slug' => 'heading-l'
			],
			[
				'name' => __( 'Heading XL', THEME_TEXTDOMAIN ),
				'size' => 62,
				'slug' => 'heading-xl'
			],
			// Other sizes
			[
				'name' => __( 'Caps S', THEME_TEXTDOMAIN ),
				'size' => 13,
				'slug' => 'caps-s'
			],
			[
				'name' => __( 'Caps', THEME_TEXTDOMAIN ),
				'size' => 16.01,
				'slug' => 'caps'
			]
		]
	);
}

add_action( 'after_setup_theme', 'theme_setup' );

/**
 * Don't display "archive: {$post_title} on archive pages.
 *
 * @return string
 */
add_filter( 'get_the_archive_title_prefix', '__return_empty_string' );