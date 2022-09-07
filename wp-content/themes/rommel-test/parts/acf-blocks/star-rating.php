<?php
defined( 'ABSPATH' ) || exit;

/**
 * Star rating Block Template.
 *
 * @var array $block The block settings and attributes.
 * @var string $content The block inner HTML (empty).
 * @var bool $is_preview True during AJAX preview.
 * @var int|string $post_id The post ID this block is saved to.
 */
$className = theme_get_block_settings( $block, [
	'className',
] );
?>
<div id="<?php theme_acf_block_get_id( $block ); ?>" class="star-rating <?php esc_attr_e( $className ); ?>">
	<?php theme_block_star_rating_get_rating( get_field( 'star_rating' ) ); ?>
</div>
