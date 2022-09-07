<?php
defined( 'ABSPATH' ) || exit; ?>
<!DOCTYPE HTML>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>"/>
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php do_action( 'wp_body_open' ); ?>
<div id="wrap">
	<?php get_template_part( 'parts/site-header' ); ?>
	<main id="siteMain" class="site-main">
		<?php do_action( 'site_main_section_before' ); ?>
		<div id="siteMainSection" class="site-main-section">
			<?php do_action( 'site_main_content_before' ); ?>