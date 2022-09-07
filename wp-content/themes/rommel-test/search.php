<?php
defined( 'ABSPATH' ) || exit;

get_header();

global $wp_query;
?>
	<div class="archive-content">
		<div class="archive-content-header">
			<h1 class="archive-content-header__title"><?php _e( 'Search results', THEME_TEXTDOMAIN ); ?></h1>
			<div class="archive-content-header__content">
				<p class="wp-block-paragraph">
					<?php
					$count = $wp_query->found_posts;
					printf(
						_n( 'Your search for "%s" gave %d result', 'Your search for "%s" gave %d results', $count, THEME_TEXTDOMAIN ),
						$wp_query->get('s'),
						$count
					);
					?>
				</p>
				<?php get_search_form(); ?>
			</div>
		</div>

		<div class="archive-content__container container">
			<div class="archive-content__inner">
				<div class="post-list-items">
					<?php if ( have_posts() ): ?>
						<?php while ( have_posts() ): the_post(); ?>
							<?php get_template_part( 'parts/post-list', 'item' ) ?>
						<?php endwhile; ?>
					<?php else: ?>
						<?php get_template_part( 'parts/content-none' ); ?>
					<?php endif; ?>
				</div> <!-- .post-list-items -->
			</div> <!-- .archive-content__inner -->
		</div> <!-- .archive-content__container -->
	</div> <!-- .archive-content -->
<?php
get_footer();
