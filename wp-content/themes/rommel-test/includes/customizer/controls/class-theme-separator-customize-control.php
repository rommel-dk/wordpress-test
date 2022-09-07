<?php
defined( 'ABSPATH' ) || exit;

/**
 * Class Theme_Separator_Customize_Control
 */
class Theme_Separator_Customize_Control extends WP_Customize_Control {

	/**
	 * @var string
	 */
	public $type = 'theme-separator';

	/**
	 * Render the control's content.
	 */
	public function render_content() {
		$style = 'font-size: 1rem;  color: #555d66; margin-top: 0; margin-bottom:0.5rem; padding-bottom: 0.5rem; border-bottom: 1px solid #999;';
		printf( '<p style="%s">%s</p>', $style, $this->label );
	}
}
