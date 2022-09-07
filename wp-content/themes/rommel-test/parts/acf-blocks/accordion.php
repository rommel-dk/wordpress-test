<?php
defined( 'ABSPATH' ) || exit;

/**
 * Accordion Block Template.
 *
 * @var array $block The block settings and attributes.
 * @var string $content The block inner HTML (empty).
 * @var bool $is_preview True during AJAX preview.
 * @var int|string $post_id The post ID this block is saved to.
 */
$className = theme_get_block_settings( $block, [
	'className',
	'align'
] );

if ( $is_preview && ! have_rows( 'accordions' ) ) : ?>
	<?php theme_acf_block_empty_assistance( $block["title"] ); ?>
<?php endif; ?>
<?php if ( have_rows( 'accordions' ) ): ?>
	<div id="<?php theme_acf_block_get_id( $block ); ?>" class="block-accordions <?php esc_attr_e( $className ); ?>">
		<?php
		while ( have_rows( 'accordions' ) ) :
			the_row();
			$heading       = get_sub_field( 'heading' );
			$default_state = get_sub_field( 'open' );
			$content       = get_sub_field( 'content' );
			?>
			<details class="block-accordion" <?php echo $default_state ? 'open' : ''; ?>>
				<summary class="block-accordion__summary">
					<?php echo $heading; ?>
				</summary>
				<div class="block-accordion__content">
					<?php echo $content; ?>
				</div>
			</details>
		<?php endwhile; ?>
	</div>
<?php endif;
