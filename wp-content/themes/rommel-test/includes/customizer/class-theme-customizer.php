<?php
defined( 'ABSPATH' ) || exit;

/**
 * Class Theme_Customizer
 */
class Theme_Customizer {

	/**
	 * Instance of this class.
	 *
	 * @var Theme_Customizer
	 */
	private static $instance;

	/**
	 * @var string $option_key
	 */
	public $option_key = 'theme_options';

	/**
	 * Theme_Customizer constructor.
	 */
	public function __construct() {
		add_action( 'customize_register', [
			$this,
			'customizer_register_settings',
		] );
	}

	/**
	 * @return Theme_Customizer
	 */
	static function get_instance(): Theme_Customizer {
		if ( null == self::$instance ) {
			self::$instance = new Theme_Customizer();
		}

		return self::$instance;
	}

	/**
	 * Get theme options from customizer.
	 *
	 * @param string $optionKey
	 * @param $default
	 *
	 * @return mixed
	 */
	public function get_options( string $optionKey = '', $default = [] ) {
		$options = get_theme_mod( $this->option_key, $default );
		if ( empty( $optionKey ) ) {
			return $options;
		}
		if ( isset( $options[ $optionKey ] ) ) {
			return $options[ $optionKey ];
		}

		return $default;
	}

	/**
	 * Customizer register settings.
	 *
	 * @param WP_Customize_Manager $wp_customize
	 */
	public function customizer_register_settings( \WP_Customize_Manager $wp_customize ) {

		// Require custom control.
		if ( ! class_exists( 'Theme_Separator_Customize_Control' ) ) {
			require_once( __DIR__ . '/controls/class-theme-separator-customize-control.php' );
		}

		// Set the transport method for change updates for native settings.
		$wp_customize->get_setting( 'blogname' )->transport        = 'postMessage';
		$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

		// Move title_tagline to header panel.
		$wp_customize->get_section( 'title_tagline' )->panel    = 'business';
		$wp_customize->get_section( 'title_tagline' )->priority = 0;

		// Move the order of tagline options.
		$wp_customize->get_control( 'blogname' )->priority        = 1;
		$wp_customize->get_control( 'blogdescription' )->priority = 3;

		/**
		 * Add a business panel.
		 */
		$wp_customize->add_panel(
			'business',
			[
				'title' => __( 'Business', THEME_TEXTDOMAIN ),
			]
		);

		/**
		 * Contact email.
		 */
		$wp_customize->add_section(
			'business_email',
			[
				'title' => __( 'Email address', THEME_TEXTDOMAIN ),
				'panel' => 'business'
			]
		);
		$wp_customize->add_setting(
			"{$this->option_key}[contact][email]",
			[
				'sanitize_callback' => 'sanitize_text_field',
			]
		);
		$wp_customize->add_control(
			"{$this->option_key}[contact][email]",
			[
				'label'   => __( 'E-mail', THEME_TEXTDOMAIN ),
				'section' => 'business_email',
				'type'    => 'text',
			]
		);

		/**
		 * Contact phone.
		 */
		$wp_customize->add_section(
			'business_phone',
			[
				'title' => __( 'Phone number', THEME_TEXTDOMAIN ),
				'panel' => 'business'
			]
		);
		$wp_customize->add_setting(
			"{$this->option_key}[contact][phone]",
			[
				'sanitize_callback' => 'sanitize_text_field',
			]
		);
		$wp_customize->add_control(
			"{$this->option_key}[contact][phone]",
			[
				'label'   => __( 'Phone number', THEME_TEXTDOMAIN ),
				'section' => 'business_phone',
				'type'    => 'text',
			]
		);

		/**
		 * Contact opening hours.
		 */
		$wp_customize->add_section(
			'business_open_hours',
			[
				'title' => __( 'Opening hours', THEME_TEXTDOMAIN ),
				'panel' => 'business'
			]
		);
		$wp_customize->add_setting(
			"{$this->option_key}[contact][opening_hours]",
			[
				'sanitize_callback' => 'sanitize_textarea_field',
			]
		);

		$wp_customize->add_control(
			"{$this->option_key}[contact][opening_hours]",
			[
				'label'       => __( 'Opening hours', THEME_TEXTDOMAIN ),
				'section'     => 'business_open_hours',
				'type'        => 'textarea',
				'description' => __( "Insert the company's opening hours seperated by line breaks here. The line will only break if you press enter.", THEME_TEXTDOMAIN ),
			]
		);

		/**
		 * Contact address.
		 */
		$wp_customize->add_section(
			'business_address',
			[
				'title' => __( 'Address', THEME_TEXTDOMAIN ),
				'panel' => 'business'
			]
		);
		$wp_customize->add_setting(
			"{$this->option_key}[contact][address]",
			[
				'sanitize_callback' => 'sanitize_textarea_field',
			]
		);

		$wp_customize->add_control(
			"{$this->option_key}[contact][address]",
			[
				'label'       => __( 'Address', THEME_TEXTDOMAIN ),
				'section'     => 'business_address',
				'type'        => 'textarea',
				'description' => __( 'Insert address related information here seperated by line breaks here. The line will only break if you press enter.', THEME_TEXTDOMAIN ),
			]
		);

		/**
		 * Social media section.
		 */
		$wp_customize->add_section(
			'business_social',
			[
				'title' => __( 'Social media', THEME_TEXTDOMAIN ),
				'panel' => 'business'
			]
		);
		foreach ( get_theme_support( 'social-media' )[0] as $key => $name ) {
			$wp_customize->add_setting(
				"{$this->option_key}[contact][social][{$key}}]",
				[
					'sanitize_callback' => 'sanitize_text_field',
				]
			);
			$wp_customize->add_control(
				"{$this->option_key}[contact][social][{$key}}]",
				[
					'label'   => $name,
					'section' => 'business_social',
					'type'    => 'text',
				]
			);
		}
	}
}

new Theme_Customizer();
