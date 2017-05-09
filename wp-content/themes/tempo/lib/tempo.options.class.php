<?php
	if( !class_exists( 'tempo_options' ) ){
		class tempo_options{
			static function get( $option, $default = null )
			{
				if( empty( $default ) )
					$default = self::def( $option );

				return call_user_func_array( array( 'tempo_validator', 'get' ), array( $option, get_theme_mod( $option, $default ) ) );
			}

			static function val( $option, $default = null )
			{
				return get_theme_mod( $option, $default );
			}

			static function set( $option, $value, $default = null )
			{
				if( empty( $default ) )
					$default = self::def( $option );

				$value = call_user_func_array( array( 'tempo_validator', 'set' ), array( $option, $value ) );

				if( empty( $value ) && empty( $default ) )
					return;

				set_theme_mod( $option, $value );
			}

			static function is_set( $option )
			{
				$rett 	= true;
				$def 	= self::def( $option );
				$val 	= self::val( $option, $def );

				if( $val == $def )
					$rett = false;

				return $rett;
			}

			static function def( $option )
			{
				$options = tempo_cfgs::get( 'options' );
				$default = null;

				$opt = isset( $options[ $option ] ) ? (array)$options[ $option ] : array();

				if( isset( $opt[ 'input' ] ) && isset( $opt[ 'input' ][ 'default' ] ) )
					$default = $opt[ 'input' ][ 'default' ];

				return $default;
			}

			static function delete( $option )
    		{
        		return remove_theme_mod( $option );
    		}
		}
	}
?>
