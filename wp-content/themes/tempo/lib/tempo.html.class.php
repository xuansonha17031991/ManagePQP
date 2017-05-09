<?php
	if( !class_exists( 'tempo_html' ) ){

		function tempo_autoload_html( $class_name )
		{
		    if( preg_match( "/^tempo_/", $class_name ) ){
		        $class_file = str_replace( '_', '-', str_replace( 'tempo_', '', $class_name ) );
		        $class_path  = get_template_directory() . '/lib/html/tempo.' . $class_file . '.class.php';

		        if( is_file( $class_path ) ){
		            include_once  $class_path;
		        }
		    }
		}

		spl_autoload_register( 'tempo_autoload_html' );

		class tempo_html
		{
			static $attr;
			static function attr( $type, $args )
			{
				$attr = new tempo_attr();

				return $attr -> get( $type, $args );
			}

			static $input;
			static function input( $args )
			{
				$input = new tempo_input(); 

				return $input -> get( $args );
			}

			static $field;
			static function field( $args )
			{
				$field = new tempo_field(); 

				return $field -> get( $args );
			}

			static $notification;
			static function notification( $args )
			{
				$notification = new tempo_notification();

				return $notification -> get( $args );
			}

			static $box;
			static function box( $args )
			{
				$box = new tempo_box();

				return $box -> get( $args );
			}

			static $column;
			static function column( $args )
			{
				$column = new tempo_column();

				return $column -> get( $args );
			}

			static $section;
			static function section( $args )
			{
				$section = new tempo_section();

				return $section -> get( $args );
			}

			static $customize;
			static function customize( $api )
			{
				$customize = new tempo_customize();
				
				$customize -> register( $api );
			}

			static $domain;
			static function domain( $item, $pages )
			{
				$domain = new tempo_domain();

				$domain -> get( $item, $pages );
			}
		}

		tempo_html::$attr 			= new tempo_attr();
		tempo_html::$input 			= new tempo_input();
		tempo_html::$field 			= new tempo_field();
		tempo_html::$notification 	= new tempo_notification();
		tempo_html::$box 			= new tempo_box();
		tempo_html::$column 		= new tempo_column();
		tempo_html::$section 		= new tempo_section();
		tempo_html::$customize 		= new tempo_customize();
		tempo_html::$domain 		= new tempo_domain();
	}
?>