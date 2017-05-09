<?php

	/**
	 *	Appearance / Customize / Additional - config settings
	 */

	$cfgs = tempo_cfgs::merge( (array)tempo_cfgs::get( 'customize' ), array(
	 	'tempo-additional' => array(
			'title'		=> __( 'Additional' , 'tempo' ),
			'priority' 	=> 40,
			'fields'	=> array(
				'gallery-style' => array(
					'title'			=> __( 'Gallery Style [ Tempo ]', 'tempo' ),
	                'description'	=> __( 'enable / disable Tempo Gallery Style.', 'tempo' ),
	                'priority' 		=> 10,
					'input'		=> array(
						'type'		=> 'checkbox',
						'default'	=> true
					)
				),
				'hyphens' => array(
					'title'			=> __( 'Website Content Auto Hyphens', 'tempo' ),
					'description'	=> __( 'enable / disable Auto Hyphens for all website content. This option can be overwritten by options below.', 'tempo' ),
					'priority' 		=> 45,
					'input'		=> array(
						'type'		=> 'checkbox',
						'default'	=> false
					)
				),
				'header-hyphens' => array(
					'title'			=> __( 'Header text Auto Hyphens', 'tempo' ),
					'description'	=> __( 'enable / disable Auto Hyphens for Header Text', 'tempo' ),
					'priority' 		=> 50,
					'input'		=> array(
						'type'		=> 'checkbox',
						'default'	=> false
					)
				),
				'headings-hyphens' => array(
					'title'			=> __( 'Headings Auto Hyphens', 'tempo' ),
					'description'	=> __( 'enable / disable Auto Hyphens for Headings', 'tempo' ),
					'priority' 		=> 55,
					'input'		=> array(
						'type'		=> 'checkbox',
						'default'	=> false
					)
				),
				'content-hyphens' => array(
					'title'			=> __( 'Content Auto Hyphens', 'tempo' ),
					'description'	=> __( 'enable / disable Auto Hyphens for Post content Text', 'tempo' ),
					'priority' 		=> 60,
					'input'		=> array(
						'type'		=> 'checkbox',
						'default'	=> false
					)
				)
			)
		)
	));

	tempo_cfgs::set( 'customize', $cfgs );
?>
