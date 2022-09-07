<?php
defined( 'ABSPATH' ) || exit;

/**
 * The primary navigation.
 */
$nav = wp_nav_menu(
	[
		'theme_location' => 'header',
		'menu_class'     => 'site-navigation__nav-primary',
		'container'      => false,
		'items_wrap'     => '<ul class="%2$s">%3$s</ul>',
		'fallback_cb'    => false,
		'walker'         => new Theme_Walker_Nav_Menu,
		'depth'          => 2,
		'echo'           => false,
	]
);
?>
<div id="siteNavigation" class="site-navigation" role="menu" aria-labelledby="menubutton">
	<button id="menubutton"
			class="menu-toggle"
			aria-haspopup="true"
			aria-controls="site-header-navigation"
			aria-label="<?php _e( 'Open Menu', THEME_TEXTDOMAIN ); ?>">
		<span class="menu-toggle__bar"></span>
		<span class="menu-toggle__bar"></span>
		<span class="menu-toggle__bar"></span>
	</button>
	<?php echo $nav; ?>
</div>