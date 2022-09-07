<?php
defined( 'ABSPATH' ) || exit;

if ( function_exists( 'yoast_breadcrumb' ) ) : ?>
	<?php yoast_breadcrumb( '<div class="breadcrumbs">', '</p>' ); ?>
<?php endif; ?>