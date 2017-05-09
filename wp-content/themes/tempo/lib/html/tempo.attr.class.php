<?php
	if( !class_exists( 'tempo_attr' ) ){
		class tempo_attr
		{
    		function get( $attr, $args, $just_value = false )
    		{
    			$rett 	= null;
    			$value 	= null;
    			$slug 	= $this -> slug( $args );

    			switch( $attr ){
		            case 'for':
		            case 'id' :{
		            	$value = $slug;

		                if( isset( $args[ 'id' ] ) && !empty( $args[ 'id' ] ) )
		            		$value = esc_attr( $args[ 'id' ] );

		                break;
		            }
		            case 'name' :{
		                $value = $this -> name( $args );
		                break;
		            }
		            case 'value' :{
		            	$value = $this -> value( $args );
		            	break;
		            }
		            case 'class' :{
		            	$args = apply_filters( 'tempo_attr__class', $args, $slug );

				    	if( !empty( $args[ 'class' ] ) )
				    		$value = esc_attr( trim( $args[ 'class' ] ) );

		                break;
		            }
		            case 'min' :
		            case 'max' :
		            case 'step':{
		                if( !empty( $args[ $attr ] ) )
				    		$value = intval( $args[ $attr ] );
				    	
		                break;
		            }
		            case 'data-unit':{
		                if( !empty( $args[ 'unit' ] ) )
				    		$value = esc_attr( trim( $args[ 'unit' ] ) );

		                break;
		            }
		            case 'style' :{
		            	$value = $this -> style( $args );

		            	break;
		            }
		            case 'data-default' :
		            case 'data-default-color' :{
		                if( isset( $args[ 'default' ] ) )
		                    $value = $args[ 'default' ];

		                break;
		            }
		        }
      
		        if( !empty( $value ) )
		            $rett = esc_attr( $attr ) . '="' . esc_attr( $value ) . '"';

		        if( $just_value )
		        	$rett = esc_attr( $value );
        
        		return $rett;
    		}


		    function slug( $args )
		    {
		    	$rett = null;

		    	if( isset( $args[ 'slug' ] ) && !empty( $args[ 'slug' ] ) )
		    		$rett = esc_attr( $args[ 'slug' ] );

		    	return $rett;
		    }

		    static function _slug( $args, $slug )
		    {
		    	if( !isset( $args[ 'slug' ] ) )
		    		$args[ 'slug' ] = $slug;

		    	return $args;
		    }

		    static function _class( $args, $classes )
		    {
	    		if( isset( $args[ 'class' ] ) )
	    			$classes = esc_attr( trim( $args[ 'class' ] . ' ' . $classes ) );

	    		if( !empty( $classes ) )
	    			$args[ 'class' ] = esc_attr( trim( $classes ) );

		    	return $args;
		    }

		    function name( $args )
		    {
		    	$name = $this -> slug( $args );

                if( isset( $args[ 'name' ] ) && !empty( $args[ 'name' ] ) )
            		$name = esc_attr( $args[ 'name' ] );

            	return $name;
		    }

		    function value( $args )
		    {
		    	$rett 	= null;
		    	$opt 	= $this -> name( $args );

		    	if( isset( $args[ 'value' ] ) ){
		    		$rett = $args[ 'value' ];
		    	}
		    	else if( isset( $args[ 'theme_mod' ] ) && !(bool)$args[ 'theme_mod' ] ){
		    		$rett = isset( $args[ 'default' ] ) ? $args[ 'default' ] : null;
		    	}
		    	else{
		    		$rett = tempo_options::get( $opt );
		    	}

		    	return $rett;
		    }

		    function style( $args )
    		{
    			$rett = '';

    			if( isset( $args[ 'style' ] ) && !empty( $args[ 'style' ] ) && is_array( $args[ 'style' ] ) ){
    				foreach( $args[ 'style' ] as $property => $value ){
    					$rett .= esc_attr( $property . ':' . $value . ';' );
    				}
    			}

    			return $rett;
    		}
		}

		add_filter( 'tempo_attr__slug', 		array( 'tempo_attr', '_slug' ), 10, 2 );
		add_filter( 'tempo_attr__class',		array( 'tempo_attr', '_class' ), 10, 2 );
	}
?>