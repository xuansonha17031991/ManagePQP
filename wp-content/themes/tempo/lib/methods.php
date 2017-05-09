<?php


	{   /////	 GENERAL - TOOLS AND FUNCTIONS    /////


        /**
		 *	Convert HEX Color to RGB Coor
		 */

        function tempo_hex2rgb( $hex )
        {
            $hex = str_replace( "#", "", $hex );

            if( strlen( $hex ) == 3 ) {
                $r = hexdec( substr( $hex, 0, 1 ) . substr( $hex, 0, 1 ) );
                $g = hexdec( substr( $hex, 1, 1 ) . substr( $hex, 1, 1 ) );
                $b = hexdec( substr( $hex, 2, 1 ) . substr( $hex, 2, 1 ) );
            } else {
                $r = hexdec( substr( $hex, 0, 2 ) );
                $g = hexdec( substr( $hex, 2, 2 ) );
                $b = hexdec( substr( $hex, 4, 2 ) );
            }

            $rgb = array( $r, $g, $b );
            return implode( ",", $rgb );
        }


        /**
		 *	Change the HEX Color brightness.
		 *	The step can be: from -255 to 255.
		 */

        function tempo_brightness( $hex, $steps )
        {
            $steps = max( -255, min( 255, $steps ) );

            $hex = str_replace( '#', '', $hex );
            if ( strlen( $hex ) == 3 ) {
                $hex =
                str_repeat( substr( $hex, 0, 1 ), 2) .
                str_repeat( substr( $hex, 1, 1 ), 2 ) .
                str_repeat( substr( $hex, 2, 1 ), 2 );
            }

            $r = hexdec( substr( $hex, 0, 2 ) );
            $g = hexdec( substr( $hex, 2, 2 ) );
            $b = hexdec( substr( $hex, 4, 2 ) );

            $r = max( 0, min( 255, $r + $steps ) );
            $g = max( 0, min( 255, $g + $steps ) );
            $b = max( 0, min( 255, $b + $steps ) );

            $r_hex = str_pad( dechex( $r ), 2, '0', STR_PAD_LEFT );
            $g_hex = str_pad( dechex( $g ), 2, '0', STR_PAD_LEFT );
            $b_hex = str_pad( dechex( $b ), 2, '0', STR_PAD_LEFT );

            return '#' . $r_hex . $g_hex . $b_hex;
        }

        /**
         *  Categories
         */

        function tempo_post_categories( $post_id, $asc = true )
        {
            $categories = get_the_category( absint( $post_id ) );
            $cats       = array();

            // convert to array
            if( empty( $categories ) )
                return array();

            foreach ( $categories as $i => $cat ){
                $cats[] = (array)$cat;
            }

            return tempo_cfgs::sksort( $cats, 'term_id', $asc );
        }

        function tempo_the_post_categories( $post_id, $sep = null )
        {
            $categories = tempo_post_categories( $post_id );

            $i = 0;

            foreach( $categories as $c ){
                $category_link = get_category_link( $c[ 'term_id' ] );

                if( $i++ )
                    echo $sep;

                if( is_wp_error( $category_link ) )
                    continue;

                echo '<a href="' . esc_url( $category_link ) . '" class="category tempo-category-' . absint( $c[ 'term_id' ] ) . '" title="' . sprintf( __( 'See articles from category - %s' , 'tempo' ), esc_attr( $c[ 'name' ] ) ) . '">' . esc_html( $c[ 'name' ] ) . '</a>';
            }
        }

        /**
         *  Related Posts
         */

        function tempo_related_posts( $p, $tax, $nr = 3 )
        {
            $terms  = wp_get_post_terms( $p -> ID, $tax );

            $query_terms = array();

            foreach( $terms as $index => $t ){
                $query_terms[] = $t -> term_id;
            }

            if( empty( $query_terms ) ){
                return;
            }

            $args = array(
                'post_type'     => $p -> post_type,
                'tax_query'     => array(
                    array(
                        'taxonomy' => $tax,
                        'field'    => 'id',
                        'terms'    => $query_terms,
                    ),
                ),
                'post__not_in'  => array( $p -> ID ),
                'posts_per_page'=> $nr
            );

            $query = new WP_Query( $args );

            if( count( $query -> posts ) == 0 ){
                return;
            }

            $rett = array();

            foreach( $query -> posts as $post ){
                $rett[] = $post;
            }

            return $rett;
        }

		/**
         *  Check if the current page is set as Front Page
         */

		function tempo_is_front_page( $post_id )
		{
			$is_enb_front_page      = get_option( 'show_on_front' ) == 'page';
			$is_front_page          = intval( get_option( 'page_on_front' ) ) == absint( $post_id );

			return $is_enb_front_page && $is_front_page;
		}

		/**
         *  Check if the current page is set as Blog Page
         */

		function tempo_is_blog_page()
		{
			$is_enb_blog_page       = get_option( 'show_on_front' ) == 'posts';
			$is_blog_page           = is_home() || is_front_page();

			return $is_enb_blog_page && $is_blog_page;
		}

		/**
         *  Check if on the Front Page is displayd the Blog
         */

		function tempo_is_blog()
		{
			return is_home() || is_front_page();
		}
    }



	{   /////	TEMPLATES AND CONTENT - FUNCTIONS AND FILTERS    /////

        /**
         *  myThem.es get Template with check action
         *  you can overwrite the template from child themes and also
         *  from plugins by using the action 'tempo_get_template_part'
         */

        function tempo_get_template_part( $slug, $name = '' )
        {
            do_action( "get_template_part_{$slug}", $slug, $name );

            $templates = array();

            if ( $name )
                $templates[] = "{$slug}-{$name}.php";

            $templates[] = "{$slug}.php";

            $template = apply_filters( 'tempo_get_template_part', locate_template( $templates ), $templates );

            if ( $template )
                include( $template );
        }


        /**
         *  myThem.es get Header with check action
         *  you can overwrite the template from child themes and also
         *  from plugins by using the action 'tempo_get_header'
         */

        function tempo_get_header( $name = null )
        {
            do_action( 'get_header', $name ); // Core WordPress hook

            $templates = array();

            if ( $name )
                $templates[] = "header-{$name}.php";

            $templates[] = 'header.php';

            $template = apply_filters( 'tempo_get_header', locate_template( $templates ), $templates );

            if ( $template )
                include( $template );
        }


        /**
         *  myThem.es get Footer with check action
         *  you can overwrite the template from child themes and also
         *  from plugins by using the action 'tempo_get_header'
         */

        function tempo_get_footer( $name = null )
        {
            do_action( 'get_footer', $name ); // Core WordPress hook

            $templates = array();

            if ( $name )
                $templates[] = "footer-{$name}.php";

            $templates[] = 'footer.php';

            $template = apply_filters( 'tempo_get_footer', locate_template( $templates ), $templates );

            if ( $template )
                include( $template );
        }


        /**
         *  myThem.es get Footer with check action
         *  you can overwrite the template from child themes and also
         *  from plugins by using the action 'tempo_get_header'
         */

        function tempo_get_sidebar( $name = null )
        {
            do_action( 'get_sidebar', $name ); // Core WordPress hook

            $templates = array();

            if ( $name )
                $templates[] = "sidebar-{$name}.php";

            $templates[] = 'sidebar.php';

            $template = apply_filters( 'tempo_get_sidebar', locate_template( $templates ), $templates );

            if ( $template )
                include( $template );
        }


        /**
         *  Get content from config settings
         *  content can be extracted from settings or from template
         *  this function is active used for admin config settings
         */

        function tempo_get_content( $args )
        {
            $rett = '';

            if( isset( $args[ 'template' ] ) && !empty( $args[ 'template' ] ) ){
                ob_start();

                if( is_array( $args[ 'template' ] ) && count( $args[ 'template' ] ) == 2 ){
                    tempo_get_template_part( $args[ 'template' ][ 0 ], $args[ 'template' ][ 1 ] );
                }
                else{
                    tempo_get_template_part( $args[ 'template' ] );
                }

                $rett .= ob_get_clean();
            }

            if( isset( $args[ 'content' ] ) && !empty( $args[ 'content' ] ) )
                $rett .= $args[ 'content' ];

            return $rett;
        }
    }



    {	/////	FLEX CONTAINER AND ITEM - FUNCTIONS AND FILTERS    /////

    	/**
	     *  Flex Container class
	     */
	    function tempo_flex_container_class( $classes = null, $valign = null )
	    {
	        $valign = apply_filters( 'tempo_flex_container_class', $valign );

	        if( empty( $valign ) )
	            $valign = 'tempo-valign-middle';

	        return 'class="' . esc_attr( trim( 'tempo-flex-container ' . trim( $classes ) . ' ' . $valign ) ) . '"';
	    }

	    /**
	     *  Flex Item class
	     */
	    function tempo_flex_item_class( $classes = null, $align = null )
	    {
	        $align = apply_filters( 'tempo_flex_item_class', $align );

	        if( empty( $align ) )
	            $align = 'tempo-align-center';

	        return 'class="' . esc_attr( trim( 'tempo-flex-item ' . trim( $classes ) . ' ' . $align ) ) . '"';
	    }
    }



    {	/////	CONTENT, CONTAINER, ROW AND COLUMNS - FUNCTIONS AND FILTERS    /////

    	/**
    	 *	By default all classes are compatible
    	 *	just with bootstrap framework (v 3.3.5 ).
    	 */


    	/**
    	 *	Page Classes
    	 */

        function tempo_page_class( $classes = null )
        {
            $classes = apply_filters( 'tempo_page_class', $classes );

            return 'class="' . esc_attr( trim( "tempo-page {$classes}" ) ) . '"';
        }

        /**
         *	Container Classes
         */

        function tempo_container_class( $classes = null, $container = null )
        {
            $container = apply_filters( 'tempo_container_class', $container );

            // to do in the next version: get from configs
            if( empty( $container ) )
                $container = 'container';

            return 'class="' . esc_attr( trim( "tempo-container {$classes} {$container}" ) ) . '"';
        }

        /**
         *	Row Classes
         */

        function tempo_row_class( $classes = null, $row = null )
        {
            $row = apply_filters( 'tempo_row_class', $row );

            // to do in the next version: get from configs
            if( empty( $row ) )
                $row = 'row';

            return 'class="' . esc_attr( trim( "tempo-row {$classes} {$row}" ) ) . '"';
        }

        /**
         *  Content Classes.
         */

        function tempo_content_class( $classes = null, $length = null )
        {
            $length = apply_filters( 'tempo_content_length', $length );

            // to do in the next version: get from configs
            if( empty( $length ) )
                $length = 'col-lg-8 col-lg-offset-2';

            return 'class="' . esc_attr( trim( "{$classes} {$length}" ) ) . '"';
        }

        /**
         *	Full column classes.
         */

        function tempo_full_class( $classes = null, $length = null )
        {
            $length = apply_filters( 'tempo_full_length', $length );

            // to do in the next version: get from configs
            if( empty( $length ) )
                $length = 'col-lg-12';

            return 'class="' . esc_attr( trim( "{$classes} {$length}" ) ) . '"';
        }

        /**
         *	Large column classes.
         */
        function tempo_large_class( $classes = null, $length = null )
        {
            $length = apply_filters( 'tempo_large_length', $length );

            // to do in the next version: get from configs
            if( empty( $length ) )
                $length = 'col-sm-9 col-md-9 col-lg-8';

            return 'class="' . esc_attr( trim( "{$classes} {$length}" ) ) . '"';
        }

        /**
         *	Small column classes.
         */
        function tempo_small_class( $classes = null, $length = null )
        {
            $length = apply_filters( 'tempo_small_length', $length );

            // to do in the next version: get from configs
            if( empty( $length ) )
                $length = 'col-sm-3 col-md-3 col-lg-4';

            return 'class="' . esc_attr( trim( "{$classes} {$length}" ) ) . '"';
        }
    }



    {	/////	SECTIONS (CLASS) - FUNCTION AND FILTERS (LENGTH)    /////

	    /**
	     *  Front Page - section class and length filter
	     *  is used to get section class length for template front-page.php
	     */

	    function tempo_front_page_section_class( $classes = null, $length = null )
	    {
            $length = apply_filters( 'tempo_front_page_section_length', $length );

            // to do in the next version: get from configs
            if( empty( $length ) )
                $length = 'col-lg-12';

            return 'class="' . esc_attr( trim( "{$classes} {$length}" ) ) . '"';
	    }

	    /**
	     *  Page - section class and length filter
	     *  is used to get section class length for template page.php
	     */

	    function tempo_page_section_class( $post_id, $classes = null, $length = null )
	    {
            $length = apply_filters( 'tempo_page_section_length', $length, $post_id );

            // to do in the next version: get from configs
            if( empty( $length ) )
                $length = 'col-lg-12';

	        return 'class="' . esc_attr( trim( "{$classes} {$length}" ) ) . '"';
	    }

	    /**
	     *  Single - section class and length filter
	     *  is used to get section class length for template single.php
	     */

	    function tempo_single_section_class( $post_id, $classes = null, $length = null )
	    {
            $length = apply_filters( 'tempo_single_section_length', $length, $post_id );

            // to do in the next version: get from configs
	        if( empty( $length ) )
                $length = 'col-lg-12';

	        return 'class="' . esc_attr( trim( "{$classes} {$length}" ) ) . '"';
	    }

	    /**
	     *  Loop - section class and length filter
	     *  is used to get section class length for templates:
	     *  archive.php, author.php, category.php, index.php, search.php and tag.php
	     */

	    function tempo_loop_section_class( $classes = null, $length = null )
	    {
            $length = apply_filters( 'tempo_loop_section_length', $length );

            // to do in the next version: get from configs
	        if( empty( $length ) )
                $length = 'col-lg-12';

	        return 'class="' . esc_attr( trim( "{$classes} {$length}" ) ) . '"';
	    }

	    /**
	     *  404 - section class and length filter
	     *  is used to get section class length for templates: 404.php
	     */

	    function tempo_404_section_class( $classes = null, $length = null )
	    {
            $length = apply_filters( 'tempo_404_section_length', $length );

            // to do in the next version: get from configs
            if( empty( $length ) )
                $length = 'col-lg-12';

            return 'class="' . esc_attr( trim( "{$classes} {$length}" ) ) . '"';
	    }
	}



	{	/////	NOT FOUND FUNCTIONS AND FILTERS    /////

		/**
	     *  Message - not found
	     */
	    function tempo_not_found_message( $message = null )
	    {
            $message = apply_filters( 'tempo_not_found_message', $message );

            // to do in the next version: get from configs
	        if( empty( $message ) )
	            $message = __( 'Resource not found', 'tempo' );

	        return $message;
	    }

	    /**
	     *  Description - not found
	     */
	    function tempo_not_found_description( $description = null )
	    {
            $description = apply_filters( 'tempo_not_found_description', $description );

	        if( empty( $description ) ){
	            $description = __( 'We apologize but this page, post or resource does not exist or can not be found.', 'tempo' );

	            if( is_search() )
	                $description = __( 'We apologize, but we couldn\'t find anything matching your search request. Please try to search for a different term or topic.', 'tempo' );
	        }

	        return $description;
	    }

	}



	{	/////	COMMENTS - FUNCTIONS AND FILTERS    /////

		/**
	     *  Comments Class
	     */
	    function tempo_comments_class( $classes = null, $special = null )
	    {
	        $special = apply_filters( 'tempo_comments_class' , $special );

	        return 'class="' . esc_attr( trim( "{$classes} {$special}" ) ) . '"';
	    }
	}
?>
