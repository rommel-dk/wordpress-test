<?php
defined( 'ABSPATH' ) || exit;

/**
 * Hooks for BEM classes in places where WP generates the HTML.
 */
class Theme_Bem {

	/**
	 * Boostrap class.
	 */
	public function __construct() {

		// Header (for menu classes, see menus.php)
		add_filter( 'get_custom_logo', [ $this, 'change_logo_class' ] );

		// Post pagination
		add_filter( 'next_posts_link_attributes', [ $this, 'next_posts_link_attributes' ] );
		add_filter( 'previous_posts_link_attributes', [ $this, 'previous_posts_link_attributes' ] );

		// Post links
		add_filter( 'next_post_link', [ $this, 'change-next_post_link' ] );
		add_filter( 'previous_post_link', [ $this, 'change-previous_post_link' ] );

		// Taxonomies
		add_filter( 'the_tags', [ $this, 'add_tag_link_class' ] );
		add_filter( 'the_category', [ $this, 'add_category_list_classes' ] );
	}

	/**
	 * Change the custom logo html classes.
	 *
	 * @param $html
	 *
	 * @return string
	 */
	public function change_logo_class( $html ): string {
		$html = str_replace( 'class="custom-logo-link"', 'class="site-brand__link"', $html );

		return str_replace( 'class="custom-logo"', 'class="site-brand__logo"', $html );
	}

	/**
	 * Custom posts navigation next link
	 *
	 * @return string
	 */
	public function next_posts_link_attributes(): string {
		return 'class="pagination__link pagination__link--next"';
	}

	/**
	 * Custom posts navigation previous link
	 *
	 * @return string
	 */
	public function previous_posts_link_attributes(): string {
		return 'class="pagination__link pagination__link--previous"';
	}

	/**
	 * Custom next post link.
	 *
	 * @param $format
	 *
	 * @return string
	 */
	public function change_next_post_link( $format ): string {
		return str_replace( 'href=', 'class="post-nav__link post-nav__link--next" href=', $format );
	}

	/**
	 * Custom previous post link.
	 *
	 * @param $format
	 *
	 * @return string
	 */
	public function change_previous_post_link( $format ): string {
		return str_replace( 'href=', 'class="post-nav__link post-nav__link--previous" href=', $format );
	}

	/**
	 * Add class to tag links called via the_tags().
	 *
	 * @param $html
	 *
	 * @return string
	 */
	public function add_tag_link_class( $html ): string {
		return str_replace( 'href=', 'class="tags__link" href=', $html );
	}

	/**
	 * Add class to category links called via the_categories().
	 *
	 * @param $html
	 *
	 * @return string
	 */
	public function add_category_list_classes( $html ): string {
		$str = str_replace( 'class="post-categories"', 'class="categories__list"', $html );
		$str = str_replace( '<li>', '<li class="categories__item">', $str );
		$str = str_replace( 'href=', 'class="categories__link" href=', $str );

		return $str;
	}
}

new Theme_Bem();
