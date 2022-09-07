<?php
defined( 'ABSPATH' ) || exit;
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php do_action( 'theme_before_entry_content', get_post_type() ); ?>
	<div class="entry-content">
		<?php the_content(); ?>
		<div class="publish-date">
			<?php _e( 'Published', THEME_TEXTDOMAIN ); ?>
			<?php the_date( 'd. M. Y' ); ?>
		</div>
	</div>
	<?php do_action( 'theme_after_entry_content', get_post_type() ); ?>
</article>

