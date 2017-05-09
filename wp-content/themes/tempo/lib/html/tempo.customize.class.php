<?php
	if( !class_exists( 'tempo_customize' ) ){
		class tempo_customize
		{
			function register( $wp_customize )
			{
				$cfgs = (array)tempo_cfgs::get( 'customize' );

				foreach( $cfgs as $panel_slug => $panel ){
					if( !isset( $panel[ 'slug' ] ) ){
						$panel[ 'slug' ] = $panel_slug;
					}

					if( isset( $panel[ 'sections' ] ) ){
						call_user_func_array( array( $this, 'panel' ), array( $wp_customize, $panel ) );
					}
					else if( isset( $panel[ 'fields' ] ) ){
						call_user_func_array( array( $this, 'section' ), array( $wp_customize, $panel ) );
					}
				}
			}

			function panel( $wp_customize, $args )
			{
				if( empty( $args[ 'slug' ] ) ){
					return;
				}

				$panel_args = wp_parse_args( $args, array(
					'title' 		=> __( 'Missing Panel Title', 'tempo' ),
					'priority'      => 10,
            		'capability'    => 'edit_theme_options'
				));

				$wp_customize -> add_panel( $args[ 'slug' ] , $panel_args );

				if( !isset( $args[ 'sections' ] ) ){
					return;
				}

				if( empty( $args[ 'sections' ] ) ){
					return;
				}

				foreach( $args[ 'sections' ] as $section_slug => $section ){
					if( !isset( $section[ 'slug' ] ) ){
						$section[ 'slug' ] = $section_slug;
					}

					if( !isset( $section[ 'panel-slug' ] ) ){
						$section[ 'panel-slug' ] = $args[ 'slug' ];
					}

					call_user_func_array( array( $this, 'section' ), array( $wp_customize, $section ) );
				}
			}

			function section( $wp_customize, $args )
			{
				if( empty( $args[ 'slug' ] ) ){
					return;
				}

				$section_args = array(
					'title' 		=> __( 'Missing Section Title', 'tempo' ),
					'priority'      => 0,
            		'capability'    => 'edit_theme_options'
				);

				if( isset( $args[ 'title' ] ) && !empty( $args[ 'title' ] ) ){
					$section_args[ 'title' ] = $args[ 'title' ];
				}

				if( isset( $args[ 'priority' ] ) && !empty( $args[ 'priority' ] ) ){
					$section_args[ 'priority' ] = $args[ 'priority' ];
				}

				if( isset( $args[ 'capability' ] ) && !empty( $args[ 'capability' ] ) ){
					$section_args[ 'capability' ] = $args[ 'capability' ];
				}

				if( !empty( $args[ 'panel-slug' ] ) ){
					$section_args[ 'panel' ] = $args[ 'panel-slug' ];
				}

				if( !empty( $args[ 'description' ] ) ){
					$section_args[ 'description' ] = $args[ 'description' ];
				}

				if( isset( $args[ 'callback' ] ) ){
					$section_args[ 'active_callback' ] = $args[ 'callback' ];
				}

				$wp_customize -> add_section( $args[ 'slug' ] , $section_args );

				if( empty( $args[ 'fields' ] ) ){
					return;
				}

				foreach( $args[ 'fields' ] as $field_slug => $field ){
					if( !is_array( $field ) || empty( $field ) ){
						call_user_func_array( array( $this, 'unsupport' ), array( $wp_customize, $field_slug ) );
						continue;
					}

					if( !isset( $field[ 'settings' ] ) ){
						$field[ 'settings' ] = $field_slug;
					}

					if( !isset( $field[ 'section' ] ) ){
						$field[ 'section' ] = $args[ 'slug' ];
					}

					if( !isset( $field[ 'input' ][ 'type' ] ) ){
						continue;
					}

					if( method_exists( $this , $field[ 'input' ][ 'type' ] ) ){
						call_user_func_array( array( $this, $field[ 'input' ][ 'type' ] ), array( $wp_customize, $field ) );
					}
					else{
						// print_r( $fields );
					}
				}
			}

			function unsupport( $wp_customize, $field_slug )
			{
				$wp_customize -> add_setting( $field_slug );
            	$wp_customize -> add_control( $field_slug, array( 'theme_supports' => false ) );
			}

			function int( $wp_customize, $args )
			{
				if( empty( $args[ 'settings' ] ) ){
					return;
				}

				if( empty( $args[ 'section' ] ) ){
					return;
				}

				$settings = array(
	                'transport'         => 'postMessage',
	                'sanitize_callback' => array( 'tempo_validator', 'int' ),
	                'capability'        => 'edit_theme_options'
	            );

	            $control = array(
	                'section'           => $args[ 'section' ],
	                'settings'          => $args[ 'settings' ],
	                'type'              => 'number',
	                'input_attrs'       => array(
	                )
				);

				if( isset( $args[ 'input' ][ 'default' ] ) ){
	            	$settings[ 'default' ] = (int)$args[ 'input' ][ 'default' ];
	            	$control[ 'input_attrs' ][ 'data-deff' ] = (int)$args[ 'input' ][ 'default' ];
	            }

	            if( isset( $args[ 'priority' ] ) )
	            	$settings[ 'priority' ] = absint( $args[ 'priority' ] );

	            if( isset( $args[ 'callback' ] ) )
	            	$control[ 'active_callback' ] = $args[ 'callback' ];

				if( !empty( $args[ 'title' ] ) )
					$control[ 'label' ] = $args[ 'title' ];

				if( !empty( $args[ 'description' ] ) )
					$control[ 'description' ] = $args[ 'description' ];

				if( !empty( $args[ 'input' ][ 'min' ] ) )
					$control[ 'input_attrs' ][ 'min' ] = (int)$args[ 'input' ][ 'min' ];

				if( !empty( $args[ 'input' ][ 'max' ] ) )
					$control[ 'input_attrs' ][ 'max' ] = (int)$args[ 'input' ][ 'max' ];

				if( !empty( $args[ 'input' ][ 'step' ] ) )
					$control[ 'input_attrs' ][ 'step' ] = (int)$args[ 'input' ][ 'step' ];

				if( !empty( $args[ 'input' ][ 'unit' ] ) )
					$control[ 'input_attrs' ][ 'data-unit' ] = (int)$args[ 'input' ][ 'data-unit' ];

				$wp_customize -> add_setting( $args[ 'settings' ], $settings );
	            $wp_customize -> add_control( $args[ 'settings' ], $control );
			}

			function number( $wp_customize, $args )
			{
				if( empty( $args[ 'settings' ] ) ){
					return;
				}

				if( empty( $args[ 'section' ] ) ){
					return;
				}

				$settings = array(
	                'transport'         => 'postMessage',
	                'sanitize_callback' => array( 'tempo_validator', 'number' ),
	                'capability'        => 'edit_theme_options'
	            );

	            $control = array(
	                'section'           => $args[ 'section' ],
	                'settings'          => $args[ 'settings' ],
	                'type'              => 'number',
	                'input_attrs'       => array(
	                )
				);

				if( isset( $args[ 'input' ][ 'default' ] ) ){
	            	$settings[ 'default' ] = absint( $args[ 'input' ][ 'default' ] );
	            	$control[ 'input_attrs' ][ 'data-deff' ] = absint( $args[ 'input' ][ 'default' ] );
	            }

	            if( isset( $args[ 'priority' ] ) ){
	            	$settings[ 'priority' ] = absint( $args[ 'priority' ] );
	            }

	            if( isset( $args[ 'callback' ] ) )
	            	$control[ 'active_callback' ] = $args[ 'callback' ];

				if( !empty( $args[ 'title' ] ) ){
					$control[ 'label' ] = $args[ 'title' ];
				}

				if( !empty( $args[ 'description' ] ) ){
					$control[ 'description' ] = $args[ 'description' ];
				}

				if( !empty( $args[ 'input' ][ 'min' ] ) ){
					$control[ 'input_attrs' ][ 'min' ] = absint( $args[ 'input' ][ 'min' ] );
				}

				if( !empty( $args[ 'input' ][ 'max' ] ) ){
					$control[ 'input_attrs' ][ 'max' ] = absint( $args[ 'input' ][ 'max' ] );
				}

				if( !empty( $args[ 'input' ][ 'step' ] ) ){
					$control[ 'input_attrs' ][ 'step' ] = absint( $args[ 'input' ][ 'step' ] );
				}

				if( !empty( $args[ 'input' ][ 'unit' ] ) ){
					$control[ 'input_attrs' ][ 'data-unit' ] = esc_attr( $args[ 'input' ][ 'data-unit' ] );
				}

				$wp_customize -> add_setting( $args[ 'settings' ], $settings );
	            $wp_customize -> add_control( $args[ 'settings' ], $control );
			}

			function url( $wp_customize, $args )
			{
				if( empty( $args[ 'settings' ] ) ){
					return;
				}

				if( empty( $args[ 'section' ] ) ){
					return;
				}

				$settings = array(
	                'transport'         => 'refresh',
	                'sanitize_callback' => 'esc_url_raw',
	                'capability'        => 'edit_theme_options'
	            );

	            $control = array(
	                'section'           => $args[ 'section' ],
	                'settings'          => $args[ 'settings' ],
	                'type'              => 'url'
				);

				if( isset( $args[ 'input' ][ 'default' ] ) ){
	            	$settings[ 'default' ] = esc_url( $args[ 'input' ][ 'default' ] );
	            }

	            if( isset( $args[ 'priority' ] ) ){
	            	$settings[ 'priority' ] = absint( $args[ 'priority' ] );
	            }

	            if( isset( $args[ 'transport' ] ) ){
	            	$settings[ 'transport' ] = esc_attr( $args[ 'transport' ] );
	            }

	            if( isset( $args[ 'callback' ] ) )
	            	$control[ 'active_callback' ] = $args[ 'callback' ];

				if( !empty( $args[ 'title' ] ) ){
					$control[ 'label' ] = $args[ 'title' ];
				}

				if( !empty( $args[ 'description' ] ) ){
					$control[ 'description' ] = $args[ 'description' ];
				}

				$wp_customize -> add_setting( $args[ 'settings' ], $settings );
	            $wp_customize -> add_control( $args[ 'settings' ], $control );
			}

			function text( $wp_customize, $args )
			{
				if( empty( $args[ 'settings' ] ) ){
					return;
				}

				if( empty( $args[ 'section' ] ) ){
					return;
				}

				$settings = array(
	                'transport'         => 'postMessage',
	                'sanitize_callback' => 'sanitize_text_field',
	                'capability'        => 'edit_theme_options'
	            );

	            $control = array(
	                'section'           => $args[ 'section' ],
	                'settings'          => $args[ 'settings' ],
	                'type'              => 'text',
	                'input_attrs'       => array(
	                )
				);

				if( isset( $args[ 'input' ][ 'default' ] ) ){
	            	$settings[ 'default' ] = sanitize_text_field( $args[ 'input' ][ 'default' ] );
	            }

	            if( isset( $args[ 'priority' ] ) ){
	            	$settings[ 'priority' ] = absint( $args[ 'priority' ] );
	            }

	            if( isset( $args[ 'callback' ] ) )
	            	$control[ 'active_callback' ] = $args[ 'callback' ];

				if( !empty( $args[ 'title' ] ) ){
					$control[ 'label' ] = $args[ 'title' ];
				}

				if( !empty( $args[ 'description' ] ) ){
					$control[ 'description' ] = $args[ 'description' ];
				}

				$wp_customize -> add_setting( $args[ 'settings' ], $settings );
	            $wp_customize -> add_control( $args[ 'settings' ], $control );
			}

			function textarea( $wp_customize, $args )
			{
				if( empty( $args[ 'settings' ] ) ){
					return;
				}

				if( empty( $args[ 'section' ] ) ){
					return;
				}

				$settings = array(
	                'transport'         => 'postMessage',
	                'sanitize_callback' => 'esc_textarea',
	                'capability'        => 'edit_theme_options'
	            );

	            $control = array(
	                'section'           => $args[ 'section' ],
	                'settings'          => $args[ 'settings' ],
	                'type'              => 'textarea',
	                'input_attrs'       => array(
	                )
				);

				if( isset( $args[ 'input' ][ 'default' ] ) ){
	            	$settings[ 'default' ] = esc_textarea( $args[ 'input' ][ 'default' ] );
	            }

	            if( isset( $args[ 'priority' ] ) ){
	            	$settings[ 'priority' ] = absint( $args[ 'priority' ] );
	            }

	            if( isset( $args[ 'callback' ] ) )
	            	$control[ 'active_callback' ] = $args[ 'callback' ];

				if( !empty( $args[ 'title' ] ) ){
					$control[ 'label' ] = $args[ 'title' ];
				}

				if( !empty( $args[ 'description' ] ) ){
					$control[ 'description' ] = $args[ 'description' ];
				}

				$wp_customize -> add_setting( $args[ 'settings' ], $settings );
	            $wp_customize -> add_control( $args[ 'settings' ], $control );
			}

			function copyright( $wp_customize, $args )
			{
				if( empty( $args[ 'settings' ] ) ){
					return;
				}

				if( empty( $args[ 'section' ] ) ){
					return;
				}

				$settings = array(
	                'transport'         => 'refresh',
	                'sanitize_callback' => array( 'tempo_validator', 'copyright' ),
	                'capability'        => 'edit_theme_options'
	            );

	            $control = array(
	                'section'           => $args[ 'section' ],
	                'settings'          => $args[ 'settings' ],
	                'type'              => 'textarea',
	                'input_attrs'       => array(
	                )
				);

				if( isset( $args[ 'input' ][ 'default' ] ) ){
	            	$settings[ 'default' ] = tempo_validator::copyright( $args[ 'input' ][ 'default' ] );
	            }

	            if( isset( $args[ 'priority' ] ) ){
	            	$settings[ 'priority' ] = absint( $args[ 'priority' ] );
	            }

	            if( isset( $args[ 'callback' ] ) )
	            	$control[ 'active_callback' ] = $args[ 'callback' ];

				if( !empty( $args[ 'title' ] ) ){
					$control[ 'label' ] = $args[ 'title' ];
				}

				if( !empty( $args[ 'description' ] ) ){
					$control[ 'description' ] = $args[ 'description' ];
				}

				$wp_customize -> add_setting( $args[ 'settings' ], $settings );
	            $wp_customize -> add_control( $args[ 'settings' ], $control );
			}

			function css( $wp_customize, $args )
			{
				if( empty( $args[ 'settings' ] ) ){
					return;
				}

				if( empty( $args[ 'section' ] ) ){
					return;
				}

				$settings = array(
	                'transport'         	=> 'refresh',
	                'sanitize_callback'    	=> 'wp_filter_nohtml_kses',
					'sanitize_js_callback' 	=> 'wp_filter_nohtml_kses',
	                'capability'        	=> 'edit_theme_options'
	            );

	            $control = array(
	                'section'           	=> $args[ 'section' ],
	                'settings'          	=> $args[ 'settings' ],
	                'type'              	=> 'textarea',
	                'input_attrs'       	=> array(
	                )
				);

				if( isset( $args[ 'input' ][ 'default' ] ) ){
	            	$settings[ 'default' ] = wp_filter_nohtml_kses( $args[ 'input' ][ 'default' ] );
	            }

	            if( isset( $args[ 'priority' ] ) ){
	            	$settings[ 'priority' ] = absint( $args[ 'priority' ] );
	            }

	            if( isset( $args[ 'callback' ] ) )
	            	$control[ 'active_callback' ] = $args[ 'callback' ];

				if( !empty( $args[ 'title' ] ) ){
					$control[ 'label' ] = $args[ 'title' ];
				}

				if( !empty( $args[ 'description' ] ) ){
					$control[ 'description' ] = $args[ 'description' ];
				}

				$wp_customize -> add_setting( $args[ 'settings' ], $settings );
	            $wp_customize -> add_control( $args[ 'settings' ], $control );
			}

			function range( $wp_customize, $args )
			{
				if( empty( $args[ 'settings' ] ) ){
					return;
				}

				if( empty( $args[ 'section' ] ) ){
					return;
				}

				$settings = array(
	                'transport'         => 'postMessage',
	                'sanitize_callback' => array( 'tempo_validator', 'range' ),
	                'capability'        => 'edit_theme_options'
	            );

	            $control = array(
	                'section'           => $args[ 'section' ],
	                'settings'          => $args[ 'settings' ],
	                'type'              => 'range',
	                'input_attrs'       => array(
	                )
				);

				if( isset( $args[ 'input' ][ 'validator' ] ) ){
	            	$settings[ 'sanitize_callback' ] = $args[ 'input' ][ 'validator' ];
	            }

	            if( isset( $args[ 'callback' ] ) )
	            	$control[ 'active_callback' ] = $args[ 'callback' ];

				if( isset( $args[ 'input' ][ 'default' ] ) ){
	            	$settings[ 'default' ] = (int)$args[ 'input' ][ 'default' ];
	            	$control[ 'input_attrs' ][ 'data-deff' ] = (int)$args[ 'input' ][ 'default' ];
	            }

	            if( isset( $args[ 'priority' ] ) ){
	            	$settings[ 'priority' ] = absint( $args[ 'priority' ] );
	            }

				if( isset( $args[ 'title' ] ) && !empty( $args[ 'title' ] ) ){
					$control[ 'label' ] = $args[ 'title' ];
				}

				if( isset( $args[ 'description' ] ) && !empty( $args[ 'description' ] ) ){
					$control[ 'description' ] = $args[ 'description' ];
				}

				if( isset( $args[ 'input' ][ 'min' ] ) && !empty( $args[ 'input' ][ 'min' ] ) ){
					$control[ 'input_attrs' ][ 'min' ] = (int)$args[ 'input' ][ 'min' ];
				}

				if( isset( $args[ 'input' ][ 'max' ] ) && !empty( $args[ 'input' ][ 'max' ] ) ){
					$control[ 'input_attrs' ][ 'max' ] = (int)$args[ 'input' ][ 'max' ];
				}

				if( isset( $args[ 'input' ][ 'step' ] ) && !empty( $args[ 'input' ][ 'step' ] ) ){
					$control[ 'input_attrs' ][ 'step' ] = (int)$args[ 'input' ][ 'step' ];
				}

				if( isset( $args[ 'input' ][ 'unit' ] ) && !empty( $args[ 'input' ][ 'unit' ] ) ){
					$control[ 'input_attrs' ][ 'data-unit' ] = esc_attr( $args[ 'input' ][ 'unit' ] );
				}

				$wp_customize -> add_setting( $args[ 'settings' ], $settings );
	            $wp_customize -> add_control( $args[ 'settings' ], $control );
			}

			function percent( $wp_customize, $args )
			{
				if( !isset( $args[ 'input' ][ 'validator' ] ) || empty( $args[ 'input' ][ 'validator' ] ) ){
					$args[ 'input' ][ 'validator' ] = array( 'tempo_validator', 'percent' );
				}

				if( !isset( $args[ 'input' ][ 'min' ] ) || empty( $args[ 'input' ][ 'min' ] ) ){
					$args[ 'input' ][ 'min' ] = 0;
				}

				if( !isset( $args[ 'input' ][ 'max' ] ) || empty( $args[ 'input' ][ 'max' ] ) ){
					$args[ 'input' ][ 'max' ] = 100;
				}

				if( !isset( $args[ 'input' ][ 'step' ] ) || empty( $args[ 'input' ][ 'step' ] ) ){
					$args[ 'input' ][ 'step' ] = 1;
				}

				if( !isset( $args[ 'input' ][ 'unit' ] ) || empty( $args[ 'input' ][ 'unit' ] ) ){
					$args[ 'input' ][ 'unit' ] = '%';
				}

				$this -> range( $wp_customize, $args );
			}

			function select( $wp_customize, $args )
			{
				if( empty( $args[ 'settings' ] ) ){
					return;
				}

				if( empty( $args[ 'section' ] ) ){
					return;
				}

				$settings = array(
	                'transport'         => 'refresh',
	                'sanitize_callback' => array( 'tempo_validator', 'select' ),
	                'capability'        => 'edit_theme_options'
	            );

	            $control = array(
	                'section'           => $args[ 'section' ],
	                'settings'          => $args[ 'settings' ],
	                'type'              => 'select',
	                'choices'       	=> array(
	                )
				);

	            if( isset( $args[ 'input' ][ 'validator' ] ) ){

	            	if( method_exists( 'tempo_validator' , $args[ 'input' ][ 'validator' ] ) ){
	            		$settings[ 'sanitize_callback' ] = array( 'tempo_validator', $args[ 'input' ][ 'validator' ] );
	            	}

	            	else if( function_exists( $args[ 'input' ][ 'validator' ] ) ){
	            		$settings[ 'sanitize_callback' ] = $args[ 'input' ][ 'validator' ];
	            	}
	            }

				if( isset( $args[ 'input' ][ 'default' ] ) ){
	            	$settings[ 'default' ] = esc_attr( $args[ 'input' ][ 'default' ] );
	            }

	            if( isset( $args[ 'priority' ] ) ){
	            	$settings[ 'priority' ] = absint( $args[ 'priority' ] );
	            }

	            if( isset( $args[ 'callback' ] ) )
	            	$control[ 'active_callback' ] = $args[ 'callback' ];

				if( !empty( $args[ 'title' ] ) ){
					$control[ 'label' ] = $args[ 'title' ];
				}

				if( !empty( $args[ 'description' ] ) ){
					$control[ 'description' ] = $args[ 'description' ];
				}

				if( !empty( $args[ 'input' ][ 'options' ] ) ){
					$control[ 'choices' ] = (array)$args[ 'input' ][ 'options' ];
				}

				$wp_customize -> add_setting( $args[ 'settings' ], $settings );
	            $wp_customize -> add_control( $args[ 'settings' ], $control );
			}

			function checkbox( $wp_customize, $args )
			{
				if( empty( $args[ 'settings' ] ) ){
					return;
				}

				if( empty( $args[ 'section' ] ) ){
					return;
				}

				$settings = array(
	                'transport'         => 'refresh',
	                'sanitize_callback' => array( 'tempo_validator', 'logic' ),
	                'capability'        => 'edit_theme_options'
	            );

	            $control = array(
	                'section'           => $args[ 'section' ],
	                'settings'          => $args[ 'settings' ],
	                'type'              => 'checkbox'
				);

				if( isset( $args[ 'input' ][ 'default' ] ) ){
	            	$settings[ 'default' ] = (bool)$args[ 'input' ][ 'default' ];
	            }

	            if( isset( $args[ 'priority' ] ) ){
	            	$settings[ 'priority' ] = absint( $args[ 'priority' ] );
	            }

	            if( isset( $args[ 'transport' ] ) ){
	            	$settings[ 'transport' ] = esc_attr( $args[ 'transport' ] );
	            }

	            if( isset( $args[ 'callback' ] ) )
	            	$control[ 'active_callback' ] = $args[ 'callback' ];

				if( !empty( $args[ 'title' ] ) ){
					$control[ 'label' ] = $args[ 'title' ];
				}

				if( !empty( $args[ 'description' ] ) ){
					$control[ 'description' ] = $args[ 'description' ];
				}

				$wp_customize -> add_setting( $args[ 'settings' ], $settings );
	            $wp_customize -> add_control( $args[ 'settings' ], $control );
			}

			function logic( $wp_customize, $args )
			{
				if( empty( $args[ 'settings' ] ) ){
					return;
				}

				if( empty( $args[ 'section' ] ) ){
					return;
				}

				$settings = array(
	                'transport'         => 'refresh',
	                'sanitize_callback' => array( 'tempo_validator', 'logic' ),
	                'capability'        => 'edit_theme_options'
	            );

	            $control = array(
	                'section'           => $args[ 'section' ],
	                'settings'          => $args[ 'settings' ],
	                'type'              => 'checkbox'
				);

				if( isset( $args[ 'input' ][ 'default' ] ) ){
	            	$settings[ 'default' ] = (bool)$args[ 'input' ][ 'default' ];
	            }

	            if( isset( $args[ 'priority' ] ) ){
	            	$settings[ 'priority' ] = absint( $args[ 'priority' ] );
	            }

	            if( isset( $args[ 'transport' ] ) ){
	            	$settings[ 'transport' ] = esc_attr( $args[ 'transport' ] );
	            }

	            if( isset( $args[ 'callback' ] ) )
	            	$control[ 'active_callback' ] = $args[ 'callback' ];

				if( !empty( $args[ 'title' ] ) ){
					$control[ 'label' ] = $args[ 'title' ];
				}

				if( !empty( $args[ 'description' ] ) ){
					$control[ 'description' ] = $args[ 'description' ];
				}

				$wp_customize -> add_setting( $args[ 'settings' ], $settings );
	            $wp_customize -> add_control( $args[ 'settings' ], $control );
			}

			function color( $wp_customize, $args )
			{
            	if( empty( $args[ 'settings' ] ) ){
					return;
				}

				if( empty( $args[ 'section' ] ) ){
					return;
				}

				$settings = array(
					'transport'         => 'postMessage',
                	'sanitize_callback' => 'sanitize_hex_color',
	                'capability'        => 'edit_theme_options'
	            );

	            $control = array(
	                'section'           => $args[ 'section' ],
	                'settings'          => $args[ 'settings' ]
				);

	            if( isset( $args[ 'input' ][ 'transport' ] ) ){
	            	$settings[ 'transport' ] = $args[ 'input' ][ 'transport' ];
	            }

				if( isset( $args[ 'input' ][ 'default' ] ) ){
	            	$settings[ 'default' ] = sanitize_hex_color( $args[ 'input' ][ 'default' ] );
	            }

	            if( isset( $args[ 'priority' ] ) ){
	            	$settings[ 'priority' ] = absint( $args[ 'priority' ] );
	            }

	            if( isset( $args[ 'callback' ] ) )
	            	$control[ 'active_callback' ] = $args[ 'callback' ];

				if( !empty( $args[ 'title' ] ) ){
					$control[ 'label' ] = $args[ 'title' ];
				}

				if( !empty( $args[ 'description' ] ) ){
					$control[ 'description' ] = $args[ 'description' ];
				}

				$wp_customize -> add_setting( $args[ 'settings' ], $settings );
	            $wp_customize -> add_control( new WP_Customize_Color_Control( $wp_customize, $args[ 'settings' ], $control ) );
			}

			function upload( $wp_customize, $args )
			{
				if( empty( $args[ 'settings' ] ) ){
					return;
				}

				if( empty( $args[ 'section' ] ) ){
					return;
				}

				$settings = array(
					'transport'         => 'refresh',
	                'sanitize_callback' => 'esc_url_raw',
	                'capability'        => 'edit_theme_options'
	            );

	            $control = array(
	                'section'           => $args[ 'section' ],
	                'settings'          => $args[ 'settings' ]
				);

				if( isset( $args[ 'input' ][ 'transport' ] ) ){
	            	$settings[ 'transport' ] = $args[ 'input' ][ 'transport' ];
	            }

	            if( isset( $args[ 'input' ][ 'default' ] ) ){
	            	$settings[ 'default' ] = esc_url( $args[ 'input' ][ 'default' ] );
	            }

	            if( isset( $args[ 'priority' ] ) ){
	            	$settings[ 'priority' ] = absint( $args[ 'priority' ] );
	            }

	            if( isset( $args[ 'callback' ] ) )
	            	$control[ 'active_callback' ] = $args[ 'callback' ];

				if( !empty( $args[ 'title' ] ) ){
					$control[ 'label' ] = $args[ 'title' ];
				}

				if( !empty( $args[ 'description' ] ) ){
					$control[ 'description' ] = $args[ 'description' ];
				}

				$wp_customize -> add_setting( $args[ 'settings' ], $settings );
	            $wp_customize -> add_control( new WP_Customize_Upload_Control( $wp_customize, $args[ 'settings' ], $control ) );
			}
		}
	}
?>
