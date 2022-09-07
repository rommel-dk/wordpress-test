<?php
defined( 'ABSPATH' ) || exit;

/**
 * Theme Scripts and styles.
 */
function theme_scripts_enqueue_frontend() {

	// Default theme assets.
	wp_enqueue_style( 'theme-main', esc_url( THEME_ASSETS_DIR . '/css/styles.css' ), null, THEME_VERSION );

	// Object fit image polyfill.
	wp_enqueue_script( 'object-fit-images-polyfill', esc_url( THEME_ASSETS_DIR . '/libs/ofi.js' ), [], THEME_VERSION, true );
}

add_action( 'wp_enqueue_scripts', 'theme_scripts_enqueue_frontend', 15 );

/**
 * IE via polyfills.
 *
 * Support for...
 * - Custom Properties
 * - forEach on a NodeList
 */
function theme_scripts_ie_polyfills() {
	?>
	<script id="polyfills-ie">
		if (window.MSInputMethodContext && document.documentMode) {
			if (typeof NodeList.prototype.forEach !== 'function') {
				NodeList.prototype.forEach = Array.prototype.forEach;
			}

			function appendTag(tag, atts) {
				var el = document.createElement(tag);
				for (var attr in atts) {
					el[attr] = atts[attr]
				}
				document.head.appendChild(el)
			}

			appendTag('script', {src: '<?php echo esc_url( THEME_ASSETS_DIR . '/libs/ie11CustomProperties.js' ); ?>'});
		}
	</script>
	<?php
}

add_action( 'wp_head', 'theme_scripts_ie_polyfills', 11 );
