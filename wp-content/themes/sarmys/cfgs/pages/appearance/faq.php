<?php

	/**
	 *	Appearance / Tempo FAQ - config settings
	 */

	$settings = tempo_cfgs::merge( (array)tempo_cfgs::get( 'settings' ), array(
		'appearance' => array(
			'tempo-faq' => array(
			    'sections' 	=> array(
			    	'faq' => array(
			    		'columns' 		=> array(
			    			// COLUMNS
							'right' => array(
								'boxes' 			=> array(
									array(
										'title'		=> __( 'Customize the Theme', 'sarmys' ),
										'template'  => 'templates/admin/appearance/faq/customizer'
									)
								)
							)
			    		)
				    ),
					'zeon' => array(
						'title' 		=> __( 'Sarmys Premium', 'sarmys' ),
						'description'	=> sprintf( __( 'Activate premium features and get extended core functionality without the risk of loosing any data or settings %1s with our %2s that upgrades our Sarmys free WordPress theme.', 'sarmys' ) , '<br/>', '<a href="' . esc_url( tempo_core::zeon( 'uri-description' ) ) . '" title="' . esc_attr( tempo_core::zeon( 'description' ) )  . '" target="_blank">' . __( 'Sarmys Premium Solution', 'sarmys' ) . '</a>' ),
					),
				)
			)
		)
	));

	if( tempo_core::is_active_premium() )
		unset( $settings['appearance']['tempo-faq']['sections']['zeon'] );

	tempo_cfgs::set( 'settings', $settings );
?>
