<?php
defined( 'ABSPATH' ) || exit;

if ( $args['aria_label'] ) {
	$aria_label = 'aria-label="' . esc_attr( $args['aria_label'] ) . '" ';
} else {
	/*
	 * If there's no custom aria-label, we can set a default here. At the
	 * moment it's empty as there's uncertainty about what the default should be.
	 */
	$aria_label = '';
}
?>
<form role="search"<?php echo $aria_label; ?> method="get" class="search-form"
      action="<?php echo esc_url( home_url( '/' ) ) ?>">
	<span class="screen-reader-text"><?php _e( 'Search...:', THEME_TEXTDOMAIN ) ?></span>
	<div class="search-input-wrap menu-search">
		<input type="search" id="search-input-field" class="search-field"
		       placeholder="<?php _e( 'Search...', THEME_TEXTDOMAIN ) ?>"
		       value="<?php echo get_search_query() ?>" name="s"/>
		<span class="hide-search-form" id="hide-search"><?php _e( 'Hide', THEME_TEXTDOMAIN ); ?></span>
		<button type="submit" class="search-submit"/>
		<span class="screen-reader-text"><?php _e( 'Search', THEME_TEXTDOMAIN ) ?></span>
		</button>
	</div>
</form>