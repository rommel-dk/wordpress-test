<?php
defined( 'ABSPATH' ) || exit;

get_header(); ?>
<?php if ( have_posts() ): ?>
	<div class="post-list">
		<?php while ( have_posts() ): the_post(); ?>
			<?php get_template_part( 'parts/post-list', 'item' ) ?>
		<?php endwhile; ?>
	</div>
<?php endif; ?>
<?php
get_footer();
