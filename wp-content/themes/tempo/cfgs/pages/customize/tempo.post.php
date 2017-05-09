<?php

	/**
	 *	Appearance / Customize / Single Post / General - config settings
	 */

	$cfgs = tempo_cfgs::merge( (array)tempo_cfgs::get( 'customize' ), array(
	 	'tempo-post' => array(
			'title'		=> __( 'Single Post' , 'tempo' ),
			'priority' 	=> 55,
			'sections'	=> array(
				'tempo-post-general' => array(
					'title'			=> __( 'General' , 'tempo' ),
					'priority'		=> 10,
					'fields'		=> array(
						'post-categories' => array(
							'title'			=> __( 'Display Categories', 'tempo' ),
							'description'	=> __( 'enable / disable Categories for single post.', 'tempo' ),
							'priority'		=> 10,
							'input'		=> array(
								'type'		=> 'checkbox',
								'default'	=> true
							)
						),
						'post-author' => array(
							'title'			=> __( 'Display Author', 'tempo' ),
							'description'	=> __( 'enable / disable Author for single post.', 'tempo' ),
							'priority'		=> 15,
							'input'		=> array(
								'type'		=> 'checkbox',
								'default'	=> true
							)
						),
						'post-time' => array(
							'title'			=> __( 'Display Date / Time', 'tempo' ),
							'description'	=> __( 'enable / disable Date or / and Time for single post.', 'tempo' ),
							'priority'		=> 20,
							'input'		=> array(
								'type'		=> 'checkbox',
								'default'	=> true
							)
						),
						'post-tags' => array(
							'title'			=> __( 'Display Tags', 'tempo' ),
							'description'	=> __( 'enable / disable Tags for single post ( bottom tags ).', 'tempo' ),
							'priority'		=> 25,
							'input'		=> array(
								'type'		=> 'checkbox',
								'default'	=> true
							)
						),
						'post-author-box' => array(
							'title'			=> __( 'Display Author Details', 'tempo' ),
							'description'	=> __( 'enable / disable Author Details for single post ( bottom author box ).', 'tempo' ),
							'priority'		=> 30,
							'input'		=> array(
								'type'		=> 'checkbox',
								'default'	=> true
							)
						)
					)
				)
			)
		)
	));

	tempo_cfgs::set( 'customize', $cfgs );
?>
