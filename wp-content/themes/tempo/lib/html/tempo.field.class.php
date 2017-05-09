<?php

	if( !class_exists( 'tempo_field' ) ){

		/*
		 * 	$args = array(
		 * 		...
		 *
		 * 		'id'		=> 'HTML DOM Attribute'
		 * 		'class' 	=> 'HTML DOM Attribute',
		 * 		'format' 	=> [ 'across' | 'linear' ],
		 *
		 ****/

		class tempo_field
		{
			private $attr;
			private $input;

			function __construct()
			{
				$this -> attr 	= new tempo_attr();
				$this -> input 	= new tempo_input();
			}

			function get( $args )
			{
				if( isset( $args[ 'format' ] ) && method_exists( $this, $args[ 'format' ] ) ) {
		            $rett = call_user_func_array( array( $this, $args[ 'format' ] ) , array( $args ) );
		        }
		        else{
		            ob_start();
		            print_r( $args );
		            $data = ob_get_clean();
		            
		            $bt = debug_backtrace();
		            $caller = array_shift( $bt );
		            
		            $rett  	= '<pre>' . $caller[ 'file' ] . ' : ' . $caller[ 'line' ];
		            $rett  .= '<br>Not found the field FORMAT : [ ' . esc_attr( $this -> attr -> slug( $args ) ) . ' ]';
		            $rett  .= '<br>' . $data .'</pre>';
		        }

		        return $rett;
			}

			function none( $args )
			{
				if( isset( $args[ 'input' ] ) ) {

		        	$args 	= apply_filters( 'tempo_attr__class', $args, 'tempo-field none' );

		        	if( isset( $args[ 'input' ][ 'type' ] ) )
		        		$args 	= apply_filters( 'tempo_attr__class', $args, 'tempo-' . esc_attr( $args[ 'input' ][ 'type' ] ) );

		            $rett  	= '<div ' . $this -> attr -> get( 'id', $args ) . ' ' . $this -> attr -> get( 'class', $args ) . '>';
		            
		            if( isset( $args[ 'title' ] ) || isset( $args[ 'description' ] ) ){
			            $rett  .= '<div class="tempo-field-title">';

			            // label
			            if( isset( $args[ 'title' ] ) )
			            	$rett .= '<label ' . $this -> attr -> get( 'for', $args[ 'input' ] ) . '>' . $args[ 'title' ] . '</label>';

			            // hint ( small description )
			            if( isset( $args[ 'description' ] ) )
			            	$rett .= '<small class="tempo-description">' . $args[ 'description' ] . '</small>';

			            $rett .= '</div>';
		        	}

		            $rett .= '<div class="tempo-field-input">';
		            $rett .= $this -> input -> get( $args[ 'input' ] );
		            $rett .= '</div>';

		            $rett .= '<div class="clear"></div>';

		            $rett .= '</div>';
		        }
		        else{
		        	$rett = __( 'Input not found', 'tempo' ); 
		        }
		        
		        return $rett;
			}

			function across( $args )
			{
				return $this -> format( 'across', $args );
			}

			function linear( $args )
			{
				return $this -> format( 'linear', $args );
			}

			function social( $args )
			{
				if( isset( $args[ 'input' ] ) ) {

		        	$args 	= apply_filters( 'tempo_attr__class', $args, 'tempo-field social' );

		        	if( isset( $args[ 'input' ][ 'type' ] ) )
		        		$args 	= apply_filters( 'tempo_attr__class', $args, 'tempo-' . esc_attr( $args[ 'input' ][ 'type' ] ) );

		            $rett  	= '<div ' . $this -> attr -> get( 'id', $args ) . ' ' . $this -> attr -> get( 'class', $args ) . '>';
		            
		            $rett  .= '<div class="tempo-field-icon">';

		            //- ICON -//
		            if( isset( $args[ 'icon' ] ) ){
		            	$rett .= '<i class="tempo-icon-' . esc_attr( $args[ 'icon' ] ) . '"></i>';
		            }

		            $rett .= '</div>';

		            $rett .= '<div class="tempo-field-input">';
		            $rett .= $this -> input -> get( $args[ 'input' ] );
		            $rett .= '</div>';

		            $rett .= '<div class="clear"></div>';

		            $rett .= '</div>';
		        }
		        else{
		        	$rett = __( 'Input not found', 'tempo' ); 
		        }
		        
		        return $rett;
			}

			private function format( $format, $args )
			{	        
		        if( isset( $args[ 'input' ] ) ) {

		        	$args 	= apply_filters( 'tempo_attr__class', $args, 'tempo-field ' . esc_attr( $format ) );

		        	if( isset( $args[ 'input' ][ 'type' ] ) )
		        		$args 	= apply_filters( 'tempo_attr__class', $args, 'tempo-' . esc_attr( $args[ 'input' ][ 'type' ] ) );


		            $rett  	= '<div ' . $this -> attr -> get( 'id', $args ) . ' ' . $this -> attr -> get( 'class', $args ) . '>';
		            
		            $rett  .= '<div class="tempo-field-title">';

		            //- LABEL -//
		            if( isset( $args[ 'title' ] ) ){
		            	$rett .= '<label ' . $this -> attr -> get( 'for', $args[ 'input' ] ) . '>' . $args[ 'title' ] . '</label>';
		            }

		            // - HINT / SMALL DESCRIPTION -//
		            if( isset( $args[ 'description' ] ) ){
		            	$rett .= '<small class="tempo-description">' . $args[ 'description' ] . '</small>';
		        	}

		            $rett .= '</div>';

		            $rett .= '<div class="tempo-field-input">';
		            $rett .= $this -> input -> get( $args[ 'input' ] );
		            $rett .= '</div>';

		            $rett .= '<div class="clear"></div>';

		            $rett .= '</div>';
		        }
		        else{
		        	$rett = __( 'Input not found', 'tempo' ); 
		        }
		        
		        return $rett;
			}
		}
	}
?>