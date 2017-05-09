<?php

	/**
	 *	Appearance / Customize / Menu Appearance - config settings
	 */

	$cfgs = tempo_cfgs::merge( (array)tempo_cfgs::get( 'customize' ), array(
		'tempo-menu'		=> array(
			'title' 		=> __( 'Menu Appearance', 'tempo' ),
			'priority'      => 25,
			'fields'		=> array(
				'menu-visible' => array(
					'title'			=> __( 'Visible Menu', 'tempo' ),
					'description'	=> __( 'enable / disable menu visibility', 'tempo' ),
					'priority' 		=> 5,
					'input'		=> array(
						'type'		=> 'checkbox',
						'default'	=> false
					)
				),
				'menu-link-color'			=> array(
					'title'			=> __( 'Link Color', 'tempo' ),
					'priority'      => 10,
					'input'			=> array(
						'type'			=> 'color',
						'default' 		=> '#454545'
					)
				),
				'menu-link-transp'			=> array(
					'title'			=> __( 'Link Transparency', 'tempo' ),
					'priority'      => 15,
					'input'			=> array(
						'type'			=> 'percent',
						'default' 		=> 60
					)
				),
				'menu-link-h-color'			=> array(
					'title'			=> __( 'Link Color (over)', 'tempo' ),
					'description'   => __( 'When the mouse is over the Menu Link.', 'tempo' ),
					'priority'      => 20,
					'input'			=> array(
						'type'			=> 'color',
						'default' 		=> '#000000'
					)
				),
				'menu-link-h-transp'			=> array(
					'title'         => __( 'Link Transparency (over)', 'tempo' ),
	                'description'	=> __( 'When the mouse is over the Menu Link.', 'tempo' ),
	                'priority'      => 25,
					'input'			=> array(
						'type'			=> 'percent',
						'default' 		=> 100
					)
				),
			)
		)
	));

	tempo_cfgs::set( 'customize', $cfgs );
?>
