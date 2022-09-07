<?php
defined( 'ABSPATH' ) || exit;
?>
<header class="entry-header alignwide">
	<?php if ( has_post_thumbnail() ) : ?>
		<div class="entry-header__image">
			<?php the_post_thumbnail( 'large' ); ?>
		</div>
	<?php endif; ?>
	<div class="entry-header__content">
		<h1 class="entry-header__title entry-title"><?php the_title(); ?></h1>
	</div>
</header>
