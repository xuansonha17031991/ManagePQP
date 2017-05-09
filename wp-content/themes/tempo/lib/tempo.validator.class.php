<?php
	if( !class_exists( 'tempo_validator' ) ){
		class tempo_validator{
			static function get( $option, $value )
			{
				$options = tempo_cfgs::get( 'options' );
				$args = isset( $options[ $option ] ) ? (array)$options[ $option ] : array();

				$rett = null;

				if( isset( $args[ 'input' ][ 'validator' ] ) ){
					if( method_exists( 'tempo_validator', $args[ 'input' ][ 'validator' ] ) ){
						$rett = call_user_func_array( array( 'tempo_validator', $args[ 'input' ][ 'validator' ] ), array( $value ) );
					}

					/**
					 *	if exists different methods for get and set
					 */
					else if( method_exists( 'tempo_validator', 'get_' . $args[ 'input' ][ 'validator' ] ) ){
						$rett = call_user_func_array( array( 'tempo_validator', 'get_' . $args[ 'input' ][ 'validator' ] ), array( $value ) );
					}
				}

				else if( isset( $args[ 'input' ][ 'type' ] ) ){
					if( method_exists( 'tempo_validator', $args[ 'input' ][ 'type' ] ) ){
						$rett = call_user_func_array( array( 'tempo_validator', $args[ 'input' ][ 'type' ] ), array( $value ) );
					}

					/**
					 *	if exists different methods for get and set
					 */
					else if( method_exists( 'tempo_validator', 'get_' . $args[ 'input' ][ 'type' ] ) ){
						$rett = call_user_func_array( array( 'tempo_validator', 'get_' . $args[ 'input' ][ 'type' ] ), array( $value ) );
					}

					//else - show notification
				}

				else{
					// show notification
					$rett = esc_attr( $value );	
				}

				return $rett;
			}

			static function set( $option, $value )
			{
				$options = tempo_cfgs::get( 'options' );
				$args = isset( $options[ $option ] ) ? (array)$options[ $option ] : array();

				$rett = null;

				if( isset( $args[ 'input' ][ 'validator' ] ) ){
					if( method_exists( 'tempo_validator', $args[ 'input' ][ 'validator' ] ) ){
						$rett = call_user_func_array( array( 'tempo_validator', $args[ 'input' ][ 'validator' ] ), array( $value ) );
					}

					/**
					 *	if exists different methods for get and set
					 */
					else if( method_exists( 'tempo_validator', 'set_' . $args[ 'input' ][ 'validator' ] ) ){
						$rett = call_user_func_array( array( 'tempo_validator', 'set_' . $args[ 'input' ][ 'validator' ] ), array( $value ) );
					}
				}

				else if( isset( $args[ 'input' ][ 'type' ] ) ){
					if( method_exists( 'tempo_validator', $args[ 'input' ][ 'type' ] ) ){
						$rett = call_user_func_array( array( 'tempo_validator', $args[ 'input' ][ 'type' ] ), array( $value ) );
					}

					/**
					 *	if exists different methods for get and set
					 */
					else if( method_exists( 'tempo_validator', 'set_' . $args[ 'input' ][ 'type' ] ) ){
						$rett = call_user_func_array( array( 'tempo_validator', 'set_' . $args[ 'input' ][ 'type' ] ), array( $value ) );
					}

					//else - show notification
				}

				else{
					// show notification
					$rett = esc_attr( $value );	
				}

				return $rett;
			}

			static function attr( $value )
			{
				return esc_attr( $value );
			}

			static function real( $value )
			{
				return floatval( $value );
			}

			static function int( $value )
			{
				return intval( $value );
			}

			static function number( $value )
			{
				return absint( $value );
			}

			static function range( $value )
			{
				return intval( $value );
			}

			static function percent( $value )
			{
				$value = absint( $value );

	        	return $value >= 0 && $value <= 100 ? $value : null;
			}

			static function email( $value )
			{
				return is_email( $value );
			}

			static function url( $value )
			{
				return esc_url( $value );
			}

			static function text( $value )
			{
				return sanitize_text_field( $value );
			}

			static function textarea( $value )
			{
				return esc_textarea( $value );
			}

			static function copyright( $value )
			{
				return wp_kses( $value, array(
		            'a' => array(
		                'href'  => array(),
		                'title' => array(),
		                'class' => array(),
		                'id'    => array()
		            ),
		            'br'        => array(),
		            'em'        => array(),
		            'strong'    => array(),
		            'span'      => array()
		        ));
			}

			static function css( $value )
			{
				return wp_filter_nohtml_kses( $value );
			}

			static function select( $value )
			{
				return esc_attr( $value );
			}

			static function checkbox( $value )
			{
				return absint( $value ) ? true : false;
			}

			static function logic( $value )
			{
				return absint( $value ) ? true : false;
			}

			static function color( $value )
			{
				if ( '' === $value )
			        return '';
			    
				if ( preg_match('|^#([A-Fa-f0-9]{3}){1,2}$|', $value ) )
			        return $value;
			}

			static function upload( $value )
			{
				return esc_url( $value );
			}

			static function icon_select( $value )
			{
				return esc_attr( $value );
			}

			static function get_json( $value )
		    {
		        return ( $v = (array)json_decode( $value ) ) && is_array( $v ) ? $v : array();
		    }

		    static function set_json( $value )
		    {
		    	return wp_json_encode(($v = $value) && is_array( $v ) ? $v : array());
		    }
		}
	}
?>