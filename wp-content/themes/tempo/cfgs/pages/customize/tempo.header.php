<?php

	/**
	 *	Appearance / Customize / Header Settings - config settings
	 */

	$cfgs = tempo_cfgs::merge( (array)tempo_cfgs::get( 'customize' ), array(
		'tempo-header' => array(
			'title'         => __( 'Header Elements', 'tempo' ),
	        'priority'      => 35,
			'sections'		=> array(
				'tempo-header-general' => array(
					'title'			=> __( 'General' , 'tempo' ),
					'priority'		=> 10,
					'fields'		=> array(
						'header-front-page' => array(
							'title'			=> __( 'Display Header on Front Page', 'tempo' ),
							'input'			=> array(
								'type'			=> 'checkbox',
								'default'		=> true,
							)
						),
						'header-blog-page' => array(
							'title'			=> __( 'Display Header on Blog Page', 'tempo' ),
							'input'			=> array(
								'type'			=> 'checkbox',
								'default'		=> true,
							)
						),
						'header-templates' => array(
							'title'			=> __( 'Display Header on Templates', 'tempo' ),
	                    	'description'  	=> __( 'enabale / disable header on: Archives, Categories, Tags, Author, 404 and Search Results.' , 'tempo' ),
							'input'			=> array(
								'type'			=> 'checkbox',
								'default'		=> true,
							)
						),
						'header-single-post' => array(
							'title'			=> __( 'Display Header on Single Post', 'tempo' ),
							'input'			=> array(
								'type'			=> 'checkbox',
								'default'		=> true,
							)
						),
						'header-single-page' => array(
							'title'			=> __( 'Display Header on Single Page', 'tempo' ),
							'input'			=> array(
								'type'			=> 'checkbox',
								'default'		=> true,
							)
						),
						'header-single-page' => array(
							'title'			=> __( 'Display Header on Single Page', 'tempo' ),
							'input'			=> array(
								'type'			=> 'checkbox',
								'default'		=> true,
							)
						),
					)
				),
				'tempo-header-appearance' => array(
					'title'			=> __( 'Appearance' , 'tempo' ),
					'priority'		=> 15,
					'fields'		=> array(
						'header-height' => array(
							'title'			=> __( 'Header height', 'tempo' ),
							'priority'		=> 5,
							'input'			=> array(
								'type'			=> 'range',
								'min'       	=> 256,
	                        	'max'       	=> 800,
	                        	'step'      	=> 1,
	                        	'unit' 			=> 'px',
	                        	'default' 		=> 450
							)
						),
						'header-bkg-color' => array(
							'title'			=> __( 'Background Color', 'tempo' ),
							'priority'		=> 10,
							'input'			=> array(
								'type'			=> 'color',
	                        	'default' 		=> '#ffffff'
							)
						),
						'header-mask-color' => array(
							'title'			=> __( 'Mask Color', 'tempo' ),
							'priority'		=> 15,
							'input'			=> array(
								'type'			=> 'color',
	                        	'default' 		=> '#000000'
							)
						),
						'header-mask-transp' => array(
							'title'			=> __( 'Mask Opacity', 'tempo' ),
	                    	'description'   => __( 'by default the mask is a dark transparent foil over the header background image.' , 'tempo' ),
	                    	'priority'		=> 20,
							'input'			=> array(
								'type'			=> 'percent',
	                        	'default' 		=> 40
							)
						)
					)
				),
				'tempo-header-headline' => array(
					'title'			=> __( 'Headline' , 'tempo' ),
					'priority'		=> 20,
					'fields'		=> array(
						'header-headline' => array(
							'title'			=> __( 'Display Headline', 'tempo' ),
							'priority'		=> 10,
							'input'			=> array(
								'type'			=> 'checkbox',
								'default'		=> true,
							)
						),
						'header-headline-text' => array(
							'title'			=> __( 'Headline Text', 'tempo' ),
							'priority'		=> 15,
							'input'			=> array(
								'type'			=> 'text'
							)
						),
						'header-headline-color' => array(
							'title'			=> __( 'Headline Color', 'tempo' ),
							'priority'		=> 20,
							'input'			=> array(
								'type'			=> 'color',
	                        	'default' 		=> '#ffffff'
							)
						),
					)
				),
				'tempo-header-description' => array(
					'title'			=> __( 'Description' , 'tempo' ),
					'priority'		=> 25,
					'fields'		=> array(
						'header-description' => array(
							'title'			=> __( 'Display Description', 'tempo' ),
							'priority'		=> 10,
							'input'			=> array(
								'type'			=> 'checkbox',
								'default'		=> true,
							)
						),
						'header-description-text' => array(
							'title'			=> __( 'Description Text', 'tempo' ),
							'priority'		=> 15,
							'input'			=> array(
								'type'			=> 'text'
							)
						),
						'header-description-color' => array(
							'title'			=> __( 'Description Color', 'tempo' ),
							'priority'		=> 20,
							'input'			=> array(
								'type'			=> 'color',
	                        	'default' 		=> '#ffffff'
							)
						),
					)
				)
			)
		)
	));

	tempo_cfgs::set( 'customize', $cfgs );
?>
