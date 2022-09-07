<?php
defined( 'ABSPATH' ) || exit;

/**
 * Custom theme menu.
 */
class Theme_Walker_Nav_Menu extends Walker_Nav_Menu {
	/**
	 * Start item.
	 *
	 * @param $output
	 * @param $depth
	 * @param $args
	 *
	 * @return void
	 */
	public function start_lvl( &$output, $depth = 0, $args = null ) {
		if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
			$t = '';
			$n = '';
		} else {
			$t = "\t";
			$n = "\n";
		}
		$indent = str_repeat( $t, $depth );

		// Default class.
		$classes = [ 'sub-menu custom-scrollbar' ];

		/**
		 * Filters the CSS class(es) applied to a menu list element.
		 *
		 * @param string[] $classes Array of the CSS classes that are applied to the menu `<ul>` element.
		 * @param stdClass $args An object of `wp_nav_menu()` arguments.
		 * @param int $depth Depth of menu item. Used for padding.
		 *
		 * @since 4.8.0
		 *
		 */
		$class_names = implode( ' ', apply_filters( 'nav_menu_submenu_css_class', $classes, $args, $depth ) );
		$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

		$output .= "{$n}{$indent}<ul$class_names>{$n}";
		$output .= '<li class="secondary-btn sub-menu-return"><span class="icon-arrow-left"></span>' . __( 'Return', THEME_TEXTDOMAIN ) . '</li>';
		$output .= '<li class="sub-menu--gradient"></li>';
	}

	/**
	 * Start element.
	 *
	 * @param $output
	 * @param $item
	 * @param $depth
	 * @param $args
	 * @param $id
	 *
	 * @return void
	 */
	public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
		$indent      = ( $depth ) ? str_repeat( "\t", $depth ) : '';
		$class_names = $value = '';
		$classes     = empty( $item->classes ) ? [] : (array) $item->classes;
		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
		$class_names = ' class="' . esc_attr( $class_names ) . '"';

		$output .= $indent . '<li id="menu-item-' . $item->ID . '"' . $value . $class_names . '>';

		$attributes = ! empty( $item->attr_title ) ? ' title="' . esc_attr( $item->attr_title ) . '"' : '';
		$attributes .= ! empty( $item->target ) ? ' target="' . esc_attr( $item->target ) . '"' : '';
		$attributes .= ! empty( $item->xfn ) ? ' rel="' . esc_attr( $item->xfn ) . '"' : '';
		$attributes .= ! empty( $item->url ) ? ' href="' . esc_attr( $item->url ) . '"' : '';

		$description = ! empty( $item->description ) ? '<span>' . esc_attr( $item->description ) . '</span>' : '';

		$item_output = $args->before;
		$item_output .= ( $args->walker->has_children && $depth != 1 ? '<div class="toggle-sub-menu"' : '<a' ) . $attributes . '><span class="menu-item__inner">';
		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID );
		$item_output .= $description . $args->link_after;
		$item_output .= '</span></a>';
		$item_output .= '</span>' . ( $args->walker->has_children && $depth != 1 ? '</div>' : '</a>' );
		$item_output .= $args->after;
		$output      .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
}