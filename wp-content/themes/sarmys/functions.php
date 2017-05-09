<?php
	//remove_theme_mods();

	/**
     *  Load Widgets classes
     */

    function sarmys_autoload_widgets( $class_name )
    {
        if( preg_match( "/^sarmys_widget_/", $class_name ) ){

            $class_file  = str_replace( '_', '-', str_replace( 'sarmys_widget_', '', $class_name ) );
            $class_path  = get_stylesheet_directory() . '/widgets/sarmys.' . $class_file . '.class.php';

            if( is_file( $class_path ) ){
                include_once  $class_path;
            }
        }
    }

    spl_autoload_register( 'sarmys_autoload_widgets' );


    /**
	 *	Register Widgets
	 */

    function sarmys_register_widgets()
	{
		register_widget( 'sarmys_widget_post_categories' );
		register_widget( 'sarmys_widget_post_tags' );
		register_widget( 'sarmys_widget_post_meta' );
	}

	add_action( 'widgets_init', 'sarmys_register_widgets' );


    /**
     *	Extends parent Theme Settings
     */

    function sarmys_load_configs()
    {
		include_once get_stylesheet_directory() . '/cfgs/options.php';

	    include_once get_stylesheet_directory() . '/cfgs/main.php';
		include_once get_stylesheet_directory() . '/cfgs/pages/appearance/faq.php';
	    include_once get_stylesheet_directory() . '/cfgs/pages/customize/site-identity.php';
	    include_once get_stylesheet_directory() . '/cfgs/pages/customize/colors.php';
	    include_once get_stylesheet_directory() . '/cfgs/pages/customize/tempo.menu.php';
	    include_once get_stylesheet_directory() . '/cfgs/pages/customize/tempo.header.php';
	    include_once get_stylesheet_directory() . '/cfgs/pages/customize/tempo.breadcrumbs.php';
		include_once get_stylesheet_directory() . '/cfgs/pages/customize/tempo.blog.php';
		include_once get_stylesheet_directory() . '/cfgs/pages/customize/tempo.post.php';
	    include_once get_stylesheet_directory() . '/cfgs/pages/customize/tempo.layout.php';
		include_once get_stylesheet_directory() . '/cfgs/pages/customize/tempo.others.php';

	    include_once get_stylesheet_directory() . '/cfgs/sidebars/cfgs.php';
	}

    add_action( 'tempo_load_cfgs', 'sarmys_load_configs' );


    function sarmys_setup_theme()
    {
        /**
         *  Internationalizations and Localization
         */

        load_child_theme_textdomain( 'sarmys', get_stylesheet_directory() . '/languages' );
    }

    add_action( 'after_setup_theme', 'sarmys_setup_theme', 1 );


    /**
     *	Include child Styles and Scripts
     */

    function sarmys_enqueue_styles()
	{
		$ver = tempo_core::theme( 'Version' );

		// disable parent fontS AND SETTINGS
		wp_deregister_style( 'tempo-google-font-1' );
		wp_dequeue_style( 'tempo-google-font-1' );

		wp_deregister_style( 'tempo-settings-google-font-1' );
		wp_dequeue_style( 'tempo-settings-google-font-1' );

		wp_deregister_style( 'tempo-google-font-2' );
		wp_dequeue_style( 'tempo-google-font-2' );

		wp_deregister_style( 'tempo-settings-google-font-2' );
		wp_dequeue_style( 'tempo-settings-google-font-2' );


		$font_1 = 'Montserrat:400,700';
		$font_2 = 'Noto+Sans:400,400italic,700,700italic&subset=latin,greek,greek-ext,devanagari,vietnamese,cyrillic-ext,latin-ext';
		$font_3 = 'Quicksand:300,400,700';


		wp_register_style( 'tempo-google-font-1',           	'//fonts.googleapis.com/css?family=' . esc_attr( $font_1 ), null, $ver );
		wp_register_style( 'tempo-google-font-2',           	'//fonts.googleapis.com/css?family=' . esc_attr( $font_2 ), null, $ver );
		wp_register_style( 'sarmys-google-font-3',           	'//fonts.googleapis.com/css?family=' . esc_attr( $font_3 ), null, $ver );

		wp_register_style( 'sarmys-typography',					get_stylesheet_directory_uri() . '/media/css/typography.min.css', null, $ver );
		wp_register_style( 'sarmys-settings',					get_stylesheet_directory_uri() . '/media/css/settings.min.css', null, $ver );
		wp_register_style( 'sarmys-menu',						get_stylesheet_directory_uri() . '/media/css/menu.min.css', null, $ver );
		wp_register_style( 'sarmys-header',						get_stylesheet_directory_uri() . '/media/css/header.min.css', null, $ver );
		wp_register_style( 'sarmys-blog',						get_stylesheet_directory_uri() . '/media/css/blog.min.css', null, $ver );
		wp_register_style( 'sarmys-forms',						get_stylesheet_directory_uri() . '/media/css/forms.min.css', null, $ver );
		wp_register_style( 'sarmys-single',						get_stylesheet_directory_uri() . '/media/css/single.min.css', null, $ver );
		wp_register_style( 'sarmys-comments',					get_stylesheet_directory_uri() . '/media/css/comments.min.css', null, $ver );
		wp_register_style( 'sarmys-widgets',					get_stylesheet_directory_uri() . '/media/css/widgets.min.css', null, $ver );

		wp_register_style( 'sarmys-footer',						get_stylesheet_directory_uri() . '/media/css/footer.min.css', null, $ver );
		wp_register_style( 'sarmys-jetpack',					get_stylesheet_directory_uri() . '/media/css/jetpack.min.css', null, $ver );

		// include child font settings
		wp_register_style( 'tempo-settings-google-font-1', 		get_stylesheet_directory_uri() . '/media/css/settings-google-font-1.min.css', null, $ver );
		wp_register_style( 'tempo-settings-google-font-2', 		get_stylesheet_directory_uri() . '/media/css/settings-google-font-2.min.css', null, $ver );
		wp_register_style( 'sarmys-settings-google-font-3', 	get_stylesheet_directory_uri() . '/media/css/settings-google-font-3.min.css', null, $ver );


		$dependency = array(
			'tempo-google-font-1',
			'tempo-google-font-2',
			'sarmys-google-font-3',

			'sarmys-typography',
			'sarmys-settings',
			'sarmys-menu',
			'sarmys-header',
			'sarmys-blog',
			'sarmys-forms',
			'sarmys-single',
			'sarmys-comments',
			'sarmys-widgets',

			'sarmys-footer',
			'sarmys-jetpack',

			'tempo-settings-google-font-1',
			'tempo-settings-google-font-2',
			'sarmys-settings-google-font-3'
		);

		wp_enqueue_style( 'sarmys-style', 						get_stylesheet_uri(), $dependency, $ver );

		// Load the Internet Explorer specific stylesheet.
        wp_enqueue_style( 'sarmys-ie',                       	get_stylesheet_directory_uri() . '/media/css/ie.min.css', null, $ver );
        wp_style_add_data( 'sarmys-ie', 'conditional', 'IE' );


		wp_register_script( 'sarmys-functions', 				get_stylesheet_directory_uri() . '/media/js/functions.js', array( 'jquery' ), $ver, true );
        wp_enqueue_script( 'sarmys-functions' );
	}

	add_action( 'wp_enqueue_scripts', 'sarmys_enqueue_styles' );



	{	////	HEADER

		/**
         *  Custom Logo
         */

		function sarmys_has_custom_logo( $dispaly )
		{
			global $wp_customize;

			$display = (bool)get_theme_mod( 'header_text' );

			if( empty( $wp_customize ) )
				$display = (bool)get_theme_mod( 'header_text', true );

			return $display;
		}

		add_filter( 'tempo_has_custom_logo', 'sarmys_has_custom_logo' );

		/**
    	 *	Disable default parent custom style
    	 */

    	function sarmys_has_header( $has_header )
	    {
			if( is_front_page() ){
				global $post;

				if( !$has_header ){
					$thumbnail 	= get_post( get_post_thumbnail_id( $post ) );
			        $has_header = has_post_thumbnail( $post ) && isset( $thumbnail -> ID ) && wp_attachment_is( 'image', $thumbnail );
				}

				return $has_header;
			}

			if( is_singular() ){
				global $post;

				if( !$has_header ){
					$thumbnail 	= get_post( get_post_thumbnail_id( $post ) );
			        $has_header = has_post_thumbnail( $post ) && isset( $thumbnail -> ID ) && wp_attachment_is( 'image', $thumbnail );
				}
			}

			if( is_404() ){
				$has_header = false;
			}

	    	return $has_header;
	    }

		add_filter( 'tempo_has_header', 'sarmys_has_header' );

		function sarmys_header_partial( $partial )
		{
		    if( is_singular() ){
		        global $post;

				if( empty( $partial ) || $partial == 'default' || $partial == 'template-hero-image' )
		        	$partial = 'template-portfolio';

		        // just if has thumbnail
		        $thumbnail          = get_post( get_post_thumbnail_id( $post ) );
		        $has_post_thumbnail = has_post_thumbnail( $post ) && isset( $thumbnail -> ID ) && wp_attachment_is( 'image', $thumbnail );

		        if( !(tempo_has_header() || $has_post_thumbnail) )
		            $partial = null;

		        if( tempo_is_front_page( $post -> ID ) )
		            $partial = null;
		    }

		    else if( !tempo_is_blog_page() ) {
		        $partial = 'wp-template';
		    }

			return $partial;
		}

		add_filter( 'tempo_header_partial' , 'sarmys_header_partial', 20, 1 );


		function sarmys_blog_categories( $rett )
		{
			return true;
		}

		add_filter( 'tempo_blog_categories', 'sarmys_blog_categories' );



		function sarmys_blog_author( $rett )
		{
			return true;
		}

		add_filter( 'tempo_blog_author', 'sarmys_blog_author' );
		add_filter( 'sarmys_blog_author', 'sarmys_blog_author' );



		function sarmys_blog_time( $rett )
		{
			return true;
		}

		add_filter( 'tempo_blog_time', 'sarmys_blog_time' );
		add_filter( 'sarmys_blog_time', 'sarmys_blog_time' );

		function sarmys_blog_comments( $rett )
		{
			return true;
		}

		add_filter( 'sarmys_blog_comments', 'sarmys_blog_comments' );


		function sarmys_blog_views( $rett )
		{
			return true;
		}

		add_filter( 'sarmys_blog_views', 'sarmys_blog_views' );


		function sarmys_meta_post_time( $rett )
		{
			return true;
		}

		add_filter( 'tempo_meta_post_time', 'sarmys_meta_post_time' );
		add_filter( 'sarmys_meta_post_time', 'sarmys_meta_post_time' );
		add_filter( 'sarmys_meta_page_time', 'sarmys_meta_post_time' );


		function sarmys_meta_post_author( $rett )
		{
			return true;
		}

		add_filter( 'tempo_meta_post_author', 'sarmys_meta_post_author' );
		add_filter( 'sarmys_meta_post_author', 'sarmys_meta_post_author' );
		add_filter( 'sarmys_meta_page_author', 'sarmys_meta_post_author' );


		function sarmys_meta_post_comments( $rett )
		{
			return true;
		}

		add_filter( 'sarmys_meta_post_comments', 'sarmys_meta_post_comments' );
		add_filter( 'sarmys_meta_page_comments', 'sarmys_meta_post_comments' );


		function sarmys_meta_post_views( $rett )
		{
			return true;
		}

		add_filter( 'sarmys_meta_post_views', 'sarmys_meta_post_views' );
		add_filter( 'sarmys_meta_page_views', 'sarmys_meta_post_views' );


		function sarmys_post_categories( $rett, $post_id )
		{
			return true;
		}

		add_filter( 'tempo_post_categories', 'sarmys_post_categories', 10, 2 );


		function sarmys_post_tags( $rett, $post_id )
		{
			return true;
		}

		add_filter( 'tempo_post_tags', 'sarmys_post_tags', 10, 2 );


		function sarmys_post_author_box( $rett )
		{
			return true;
		}

		add_filter( 'tempo_post_author_box', 'sarmys_post_author_box' );
		add_filter( 'sarmys_post_author_box', 'sarmys_post_author_box' );




    	function sarmys_customize_js_files( $files )
	    {
	    	$files[ 'sarmys-customize' ] = get_stylesheet_directory_uri() . '/media/admin/js/customize.js';

	    	return $files;
	    }

    	add_filter( 'tempo_customize_js_files', 'sarmys_customize_js_files' );


		function sarmys_mix_height()
		{
	    	$headline       = tempo_options::get( 'header-headline' );
    		$description    = tempo_options::get( 'header-description' );

			$btn_1 			= tempo_options::get( 'header-btn-1' );
    		$btn_2 			= tempo_options::get( 'header-btn-2' );

    		return ( $headline || $description ) && ( $btn_1 || $btn_2 );
		}

		function sarmys_default_header_classes( $classes )
		{
			if( sarmys_mix_height() )
				$classes .= ' mix-header';

			return esc_attr( trim( $classes ) );
		}

		add_filter( 'tempo_default_header_classes', 'sarmys_default_header_classes' );

		function sarmys_header_height( $height )
		{
			if( sarmys_mix_height() )
        		$height = tempo_options::get( 'header-text-space' ) + tempo_options::get( 'header-btns-space' );

        	return $height;
		}

		add_filter( 'tempo_header_height', 'sarmys_header_height' );

		/**
		 *  Flex Container - get vertical position from plugin settings
		 */

		function sarmys_flex_container_class( $valign )
		{
			if( empty( $valign ) && $mix_height = sarmys_mix_height() )
				$valign = 'tempo-valign-' . tempo_options::get( 'header-text-vertical-align' );

			return esc_attr( trim( $valign ) );
		}

		add_filter( 'tempo_flex_container_class', 'sarmys_flex_container_class' );

		/**
		 *	Flex text Container - get style
		 */
		function sarmys_header_text_wrapper_style( $style )
		{
			if( sarmys_mix_height() )
		        $style	= 'height: ' . absint( tempo_options::get( 'header-text-space' ) ) . 'px;';

		    return $style;
		}

		add_filter( 'tempo_header_text_wrapper_style', 'sarmys_header_text_wrapper_style' );

		/**
		 *  Flex Item - get horizontal position from plugin settings
		 */

		function sarmys_flex_item_class( $align )
		{
			if( empty( $align ) )
				$align = 'tempo-align-' . tempo_options::get( 'header-horizontal-align' );

			return esc_attr( trim( $align ) );
		}

		add_filter( 'tempo_flex_item_class', 'sarmys_flex_item_class' );
	}



	/**
	 *	Hide Breadcrumbs for single posts
	 */

	function sarmys_post_breadcrumbs( $value, $post_id )
	{
		return false;
	}

	add_filter( 'tempo_post_breadcrumbs', 'sarmys_post_breadcrumbs', 10, 2 );


	function sarmys_single_thumbnail( $display, $post_id )
	{
		return false;
	}

	add_filter( 'tempo_page_thumbnail', 'sarmys_single_thumbnail', 10, 2 );
	add_filter( 'tempo_post_thumbnail', 'sarmys_single_thumbnail', 10, 2 );

	{	////	LAYOUT


		/**
		 *	Define website Content width
		 */

		function sarmys_content_width( $width )
		{
    		return 1600;
    	}

    	add_filter( 'tempo_content_width', 'sarmys_content_width' );


		/**
		 *	Content full length
		 */

		function sarmys_full_length( $length )
 		{
			$layout = new tempo_layout();

			if( is_singular() ){
				global $post;

				$layout = new tempo_layout( $post -> post_type, $post -> ID );

				if( tempo_is_front_page( $post -> ID ) )
					$layout = new tempo_layout( 'front-page' );
			}

			return 'col-lg-12 sarmys-layout-' . $layout -> layout;
		}

		add_filter( 'tempo_full_length', 'sarmys_full_length' );

		/**
		 *	Content Length
		 */

		function sarmys_content_length( $length )
		{
			$length = 'col-lg-12';
			$layout = new tempo_layout();

			if( is_singular() ){
				global $post;

				$layout = new tempo_layout( $post -> post_type, $post -> ID );

				if( tempo_is_front_page( $post -> ID ) )
					$layout = new tempo_layout( 'front-page' );
			}

			if( $layout -> layout == 'full' )
				$length = 'col-lg-10 col-lg-offset-1';

			return $length;
		}

		add_filter( 'tempo_content_length', 'sarmys_content_length' );


	    /**
	     *	Front Page Section Length
	     */

	    function sarmys_front_page_section_length( $length )
	    {
	        $layout = new tempo_layout( 'front-page' );
	        return $layout -> classes();
	    }

	    add_filter( 'tempo_front_page_section_length', 'sarmys_front_page_section_length' );


	    /**
	     *	Singular Post / Page Section Length
	     */

	    function sarmys_singular_section_length( $length, $post_id )
	    {
	    	if( empty( $post_id ) )
	    		return;

	    	$post = get_post( $post_id );

	        $layout = new tempo_layout( $post -> post_type );
	        return $layout -> classes();
	    }

	    add_filter( 'tempo_page_section_length', 'sarmys_singular_section_length', 10, 2 );
	    add_filter( 'tempo_single_section_length', 'sarmys_singular_section_length', 10, 2 );


	    /**
	     *	Loop Section Length + Blog View Class
	     */

	    function sarmys_loop_section_length( $layout )
	    {
	        $layout = new tempo_layout();
	        return esc_attr( $layout -> classes() . ' tempo-blog-classic' );
	    }

	    add_filter( 'tempo_loop_section_length', 'sarmys_loop_section_length' );



	    ///// SIDEBARS ACTIONS /////

	    /**
	     *	Left Sidebars
	     */

	    function sarmys_left_sidebar( $slug, $name )
	    {
	    	if( is_404() )
	    		return;

		    /**
		     *	get sidebar
		     */

	    	$layout = new tempo_layout( $name );

	    	if( is_singular() && !( is_front_page() || is_home() ) ){
	    		global $post;

	    		$layout = new tempo_layout( $name );
	    	}

			// left sidebar
	        $layout -> sidebar( 'left' );
	    }

	    add_action( 'get_template_part_templates/section/before', 'sarmys_left_sidebar', 10, 2 );

	    /**
	     *	Right Sidebars
	     */

	    function sarmys_right_sidebar( $slug, $name )
	    {
	    	if( is_404() )
	    		return;

		    /**
		     *	get sidebar
		     */

	    	$layout = new tempo_layout( $name );

	    	if( is_singular() && !( is_front_page() || is_home() ) ){
	    		global $post;

	    		$layout = new tempo_layout( $name );
	    	}

	    	// right sidebar
	        $layout -> sidebar( 'right' );
	    }

	    add_action( 'get_template_part_templates/section/after', 'sarmys_right_sidebar', 10, 2 );
	}



	/**
	 *	Comments Submit button Classes
	 */

	function sarmys_submi_comment_class( $classes )
	{
		return 'tempo-btn btn-hover-empty icon-left';
	}

	add_filter( 'tempo_submi_comment_class', 'sarmys_submi_comment_class' );


	/**
	 *	Footer Social
	 */

	function sarmys_footer_social( $slug, $name )
    {
    	tempo_get_template_part( 'templates/footer/prepend-social' );
    }

    add_action( 'get_template_part_templates/footer/prepend', 'sarmys_footer_social', 10, 2 );
?>
