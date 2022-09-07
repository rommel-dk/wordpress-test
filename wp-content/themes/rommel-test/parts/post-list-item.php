<?php
/**
 * The template used for displaying post list items.
 */
defined( 'ABSPATH' ) || exit; ?>
<article id="post-<?php the_ID(); ?>" class="post-list__item">
	<div class="post-list__item-inner">
		<a href="<?php the_permalink(); ?>" class="post-list__image">
			<?php the_post_thumbnail(); ?>
		</a>
		<div class="post-list__content">
			<h3 class="post-list__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
			<div class="post-list__action wp-block-button">
				<a href="<?php the_permalink(); ?>" class="wp-block-button__link has-brand-background-color">
					<?php _e( 'Read more', THEME_TEXTDOMAIN ); ?>
				</a>
			</div>
		</div>
	</div>
</article>