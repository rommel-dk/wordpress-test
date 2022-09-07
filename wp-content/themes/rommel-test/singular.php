<?php
defined( 'ABSPATH' ) || exit;

/**
 * The template for displaying all singular content.
 */
get_header();

while ( have_posts() ) :
	the_post();

	if ( 'page' == get_post_type() ) {
		get_template_part( 'parts/content-page' );
	} else {
		get_template_part( 'parts/content-post' );
	}

endwhile;

get_footer();
