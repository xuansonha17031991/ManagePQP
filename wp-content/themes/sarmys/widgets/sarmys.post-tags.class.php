<?php

	/**
     *  Post Tags
     *	This widget can be used only for single post template
     */

	if( !class_exists( 'sarmys_widget_post_tags' ) ){

		class sarmys_widget_post_tags extends WP_Widget
		{
			/**
             *  Widget Constructor
             */

		    function __construct()
		    {
		        parent::__construct( 'sarmys_widget_post_tags', __( 'Post Tags', 'sarmys' ) . ' [' . tempo_core::theme( 'Name' ) . ']', array(
		            'classname'     => 'tempo_widget_post_tags',
		            'description'   => __( 'This widget can be used only for single.php template', 'sarmys' )
		        ));
		    }

		    /**
             *  Widget Preview
             */

		    function widget( $args, $instance )
		    {
		        global $post;

		        // extract args
		        extract( $args , EXTR_SKIP );

		        $instance = wp_parse_args( (array) $instance, array(
		            'title' => __( 'Post Tags', 'sarmys' )
		        ));

		        if( is_singular( 'post' ) && has_tag( ) ){

		            echo $before_widget;

		            if( !empty( $instance[ 'title' ] ) ){
		                echo $before_title;
		                echo apply_filters( 'widget_title', esc_attr( $instance[ 'title' ] ), $instance, $this -> id_base );
		                echo $after_title;
		            }

		            echo '<div class="tagcloud">';

		            $tags = wp_get_post_tags( $post -> ID );

		            foreach( $tags as $t => $tag ){
		                $link = esc_url( get_tag_link( $tag -> term_id ) );

		                if( is_wp_error( $link ) )
		                    continue;

		                echo '<a href="' . esc_url( $link ) . '" rel="tag" title="' . esc_attr( $tag -> name ) . '" data-count="' . absint( $tag -> count ) . '">' . esc_html( $tag -> name ) . '</a>';
		            }

		            echo '<div class="clearfix"></div>';
		            echo '</div>';

		            echo $after_widget;
		        }
		    }

		    /**
             *  Widget Update
             */

		    function update( $new_instance, $old_instance )
		    {
		        $instance               = $old_instance;
		        $instance[ 'title' ]    = sanitize_text_field( $new_instance[ 'title' ] );

		        return $instance;
		    }

		    /**
             *  Widget Form ( admin side )
             */

		    function form( $instance )
		    {
		        $instance = wp_parse_args( (array) $instance, array(
		            'title' => null
		        ));

		        echo '<p>';
		        echo '<label for="' . esc_attr( $this -> get_field_id( 'title' ) ) . '">' . __( 'Title', 'sarmys' );
		        echo '<input type="text" class="widefat" id="' . esc_attr( $this -> get_field_id( 'title' ) ) . '" name="' . esc_attr( $this -> get_field_name( 'title' ) ) . '" value="' . esc_attr( sanitize_text_field( $instance[ 'title' ] ) ) . '" />';
		        echo '</label>';
		        echo '</p>';
		    }
		}
	}
?>
