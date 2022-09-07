<?php
defined( 'ABSPATH' ) || exit;

if ( function_exists( 'acf_add_local_field_group' ) ):

	acf_add_local_field_group( array(
		'key'                   => 'group_62fb6ea863e0a',
		'title'                 => 'Block: Star rating',
		'fields'                => array(
			array(
				'key'               => 'field_62fb6ed0b14d9',
				'label'             => 'Star rating',
				'name'              => 'star_rating',
				'type'              => 'range',
				'instructions'      => '',
				'required'          => 0,
				'conditional_logic' => 0,
				'wrapper'           => array(
					'width' => '',
					'class' => '',
					'id'    => '',
				),
				'default_value'     => 5,
				'min'               => 0,
				'max'               => 5,
				'step'              => '0.5',
				'prepend'           => '',
				'append'            => '',
			),
		),
		'location'              => array(
			array(
				array(
					'param'    => 'block',
					'operator' => '==',
					'value'    => 'acf/star-rating',
				),
			),
		),
		'menu_order'            => 0,
		'position'              => 'normal',
		'style'                 => 'default',
		'label_placement'       => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen'        => '',
		'active'                => true,
		'description'           => '',
		'show_in_rest'          => 0,
	) );

endif;