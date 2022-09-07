<?php
defined( 'ABSPATH' ) || exit;
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php do_action( 'theme_before_entry_content', get_post_type() ); ?>
	<div class="entry-content">
		<?php the_content(); ?>
	</div>
	<?php do_action( 'theme_after_entry_content', get_post_type() ); ?>
</article>
