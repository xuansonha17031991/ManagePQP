<?php

	/**
	 *	Appearance / Tempo FAQ - config settings
	 */

	$settings = tempo_cfgs::merge( (array)tempo_cfgs::get( 'settings' ), array(
		'appearance' => array(
			'tempo-faq' => array(
			    'menu' => array(
			        'title'     => __( 'Theme FAQ', 'tempo' )
			    ),
			    'priority'	=> 1,
			    'update'	=> false,
			    'sections' 	=> array(
			    	'faq' => array(
			    		'title' 		=> __( 'Frequently Asked Questions', 'tempo' ),
			    		'description'	=> __( 'Please read this small guide and follow the instructions. This guide will help you customize the theme for your needs.', 'tempo' ),
						'priority' 		=> 1,
			    		'columns' 		=> array(

			    			// COLUMNS
							'left' =>  array(
								'layout' 			=> array(
									'sm'	=> 12,
									'md'	=> 6,
									'lg'	=> 6,
								),

								// BOXES
								'boxes' 			=> array(
									array(
										'title' 	=> __( 'Welcome Message!', 'tempo' ),
										'template'	=> 'templates/admin/appearance/faq/welcome',
									),
									array(
										'title'		=> __( 'Translate the Theme ( Localization )', 'tempo' ),
										'template'  => 'templates/admin/appearance/faq/translate'
									),
									array(
										'title'		=> __( 'Custom CSS and Customizations', 'tempo' ),
										'template'  => 'templates/admin/appearance/faq/custom-css',
									)
									// license
								)
							),
							'right' => array(
								'layout' 			=> array(
									'sm'	=> 12,
									'md'	=> 6,
									'lg'	=> 6,
								),
								'boxes' 			=> array(
									array(
										'title'		=> __( 'Customize the Theme', 'tempo' ),
										'template'  => 'templates/admin/appearance/faq/customizer'
									)
								)
							)
			    		),

			    		'save' => true
				    ),
					'zeon' => array(
						'title' 		=> __( 'Tempo Premium', 'tempo' ),
						'description'	=> sprintf( __( 'Activate premium features and get extended core functionality without the risk of loosing any data or settings %1s with our %2s that upgrades our Tempo free WordPress theme.', 'tempo' ) , '<br/>', '<a href="' . esc_url( tempo_core::theme( 'premium-faq' ) ) . '" title="' . esc_attr( tempo_core::theme( 'description' ) )  . '" target="_blank">' . __( 'Tempo Premium Solution', 'tempo' ) . '</a>' ),
						'template'  	=> 'templates/admin/appearance/faq/premium'
					),
					'support' => array(
						'title' 		=> __( 'Support and Feadback', 'tempo' ),
						'description'	=> sprintf( __( 'If you have questions about the theme or the theme features then you are welcome to use our forum.%s Also if you found bugs please provide us a feedback.', 'tempo' ), '<br/>' ),
						'template'  	=> 'templates/admin/appearance/faq/support',
						'priority' 		=> 20,
						'style' 		=> array(
							'border-top'		=> '1px solid rgba( 0,0,0, 0.1 )',
							'border-bottom'		=> '1px solid rgba( 0,0,0, 0.1 )',
							'margin-top' 		=> '100px',
							'padding-bottom' 	=> '100px'
						)
					)
				)
			)
		)
	));

	if( tempo_core::is_active_premium() )
		unset( $settings['appearance']['tempo-faq']['sections']['zeon'] );

	tempo_cfgs::set( 'settings', $settings );
?>
