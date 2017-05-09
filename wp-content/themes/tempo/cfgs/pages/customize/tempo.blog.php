<?php

	/**
	 *	Appearance / Customize / Blog - config settings
	 */

	$cfgs = tempo_cfgs::merge( (array)tempo_cfgs::get( 'customize' ), array(
	 	'tempo-blog' => array(
			'title'		=> __( 'Blog' , 'tempo' ),
			'priority' 	=> 50,
			'fields'	=> array(
				'blog-categories' => array(
					'title'			=> __( 'Display Categories', 'tempo' ),
					'description'	=> __( 'enable / disable Categories for blog posts.', 'tempo' ),
					'priority' 		=> 10,
					'input'		=> array(
						'type'		=> 'checkbox',
						'default'	=> true
					)
				),
				'blog-author' => array(
					'title'			=> __( 'Display Author', 'tempo' ),
					'description'	=> __( 'enable / disable Author for blog posts.', 'tempo' ),
					'priority' 		=> 15,
					'input'		=> array(
						'type'		=> 'checkbox',
						'default'	=> true
					)
				),
				'blog-time' => array(
					'title'			=> __( 'Display Date / Time', 'tempo' ),
					'description'	=> __( 'enable / disable Date or / and Time for blog posts.', 'tempo' ),
					'priority' 		=> 20,
					'input'		=> array(
						'type'		=> 'checkbox',
						'default'	=> true
					)
				)
			)
		)
	));

	tempo_cfgs::set( 'customize', $cfgs );
?>
