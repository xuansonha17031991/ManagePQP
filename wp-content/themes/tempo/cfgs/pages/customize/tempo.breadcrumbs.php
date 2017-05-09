<?php

	/**
	 *	Appearance / Customize / Breadcrumbs - config settings
	 */

	$cfgs = tempo_cfgs::merge( (array)tempo_cfgs::get( 'customize' ), array(
	 	'tempo-breadcrumbs' => array(
			'title'		=> __( 'Breadcrumbs' , 'tempo' ),
			'priority' 	=> 45,
			'fields'	=> array(
				'breadcrumbs' => array(
					'title'			=> __( 'Display Breadcrumbs', 'tempo' ),
					'priority' 		=> 5,
					'input'			=> array(
						'type'		=> 'checkbox',
						'default'	=> true
					)
				),
				'breadcrumbs-nav' => array(
					'title'			=> __( 'Display Navigation', 'tempo' ),
					'priority' 		=> 10,
					'input'			=> array(
						'type'		=> 'checkbox',
						'default'	=> true
					)
				),
				'breadcrumbs-space' => array(
					'title'			=> __( 'Space', 'tempo' ),
	                'description'   => __( 'inner top and bottom space allow you to change breadcrumbs height.', 'tempo' ),
					'priority' 		=> 15,
					'input'			=> array(
						'type'		=> 'range',
						'default'	=> 60,
						'min'		=> 0,
						'max'		=> 120,
						'step'		=> 1,
						'unit'		=> 'px'
					)
				),
				'breadcrumbs-home-text' => array(
					'title'			=> __( '"Home" text', 'tempo' ),
	                'description'   => __( 'breadcrumbs "Home" link text.', 'tempo' ),
					'priority' 		=> 20,
					'input'			=> array(
						'type'		=> 'text',
						'default'	=> __( 'Home', 'tempo' )
					)
				),
				'breadcrumbs-home-description' => array(
					'title'			=> __( '"Home" link description', 'tempo' ),
	                'description'   => __( 'breadcrumbs "Home" link description.', 'tempo' ),
					'priority' 		=> 25,
					'input'			=> array(
						'type'		=> 'textarea',
						'default'	=> __( 'go home', 'tempo' )
					)
				)
			)
		)
	));

	tempo_cfgs::set( 'customize', $cfgs );
?>
