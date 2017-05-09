<?php
if( !class_exists( 'tempo_layout' ) ){

class tempo_layout
{
    public $classes     = null;
    public $layout      = null;
    public $sidebar     = null;
    public $template    = null;
    public $post_id     = null;

    function __construct( $template = '', $post_id = null )
    {
        $this -> template   = $template;
        $this -> post_id    = $post_id;
        $this -> layout     = $this -> get( 'layout' );
        $this -> sidebar    = $this -> get( 'sidebar' );

        if( $this -> layout == 'left' || $this -> layout == 'right' ){

            /**
             *  Content Classes
             */
            $content_class = apply_filters( 'tempo_layout_content_class', 'col-sm-8 col-md-9 col-lg-9', $this );
            $this -> classes[ 'content' ] = "tempo-content-layout layout-{$this -> layout} {$content_class}";

            /**
             *  Sidebar Classes
             */
            $sidebar_class = apply_filters( 'tempo_layout_sidebar_class', 'col-sm-4 col-md-3 col-lg-3', $this );
            $this -> classes[ 'sidebar' ]  = apply_filters( 'tempo_layout_sidebar_class', "tempo-sidebar-layout layout-{$this -> layout} {$sidebar_class}", $this );
        }

        /**
         *  Full Width Content
         */
        else if( $this -> layout == 'full' ){

            /**
             *  Content Classes
             */
            $content_class = apply_filters( 'tempo_layout_content_class', 'col-lg-12', $this );
            $this -> classes[ 'content' ] = "tempo-content-layout layout-{$this -> layout} {$content_class}";

            /**
             *  Sidebar Classes
             */
            $sidebar_class = apply_filters( 'tempo_layout_sidebar_class', 'col-lg-0', $this );
            $this -> classes[ 'sidebar' ]  = apply_filters( 'tempo_layout_sidebar_class', "tempo-sidebar-layout layout-{$this -> layout} {$sidebar_class}", $this );
        }

        /**
         *  Others Case
         */
        else{
            /**
             *  Content Classes
             */
            $content_class = apply_filters( 'tempo_layout_content_class', 'col-lg-12', $this );
            $this -> classes[ 'content' ] = "tempo-content-layout layout-{$this -> layout} {$content_class}";

            /**
             *  Sidebar Classes
             */
            $sidebar_class = apply_filters( 'tempo_layout_sidebar_class', 'col-lg-0', $this );
            $this -> classes[ 'sidebar' ]  = apply_filters( 'tempo_layout_sidebar_class', "tempo-sidebar-layout layout-{$this -> layout} {$sidebar_class}", $this );
        }
    }

    function get( $setting )
    {
        $rett       = null;
        $post_id    = $this -> post_id;
        $template   = $this -> template;

        switch( $template ){
            case 'page' :
            case 'post' : {
                $rett = tempo_options::get( $template . '-' . $setting  );
                $rett = apply_filters( "tempo_{$template}_get_{$setting}", $rett, $post_id );
                break;
            }
            case 'front-page' :{
                $rett = tempo_options::get( $template . '-' . $setting  );
                break;
            }
            default : {
                $rett = tempo_options::get( $setting  );
                $rett = apply_filters( "tempo_{$template}_get_{$setting}", $rett, $post_id );
                break;
            }
        }

        //tempo_deb::e( array( $rett, $template, $setting ) );
        return $rett;
    }

    function sidebar( $position )
    {
        if( $this -> layout == $position ){

            echo '<aside class="sidebar-content-wrapper layout-' . $this -> layout . ' ' . esc_attr( $this -> classes( 'sidebar' ) ) . '">';
            echo '<div class="sidebar-content">';

            if ( dynamic_sidebar( esc_attr( $this -> sidebar ) ) ){

            }

            echo '</div>';
            echo '</aside>';

            return;
        }
    }

    function classes( $side = null )
    {
        $rett = esc_attr( $this -> classes[ 'content' ] );

        if( isset( $this -> classes[ $side ] ) ){
            $rett = esc_attr( $this -> classes[ $side ] );
        }

        return $rett;
    }
}

}   /* END IF CLASS EXISTS */
?>
