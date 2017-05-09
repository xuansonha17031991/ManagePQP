<?php

if( !class_exists( 'tempo_core' ) ){

    class tempo_core
    {
        // author
        static function author( $key )
        {
            $cfgs = tempo_cfgs::get( 'author' );

            $rett = null;

            if( isset( $cfgs[ $key ] ) )
                $rett = $cfgs[ $key ];

            return $rett;
        }

        // zeon
        static function zeon( $key, $name = null )
        {
            $cfgs = tempo_cfgs::get( 'zeon' );

            $rett = null;

            if( isset( $cfgs[ $key ] ) )
                $rett = $cfgs[ $key ];

            return $rett;
        }

        // theme
        static function theme( $key, $name = null )
        {
            $cfgs   = tempo_cfgs::get( 'themes' );
            $theme  = wp_get_theme();
            $rett   = null;

            if( empty( $name ) )
                $name = $theme -> get( 'Name' );

            if( isset( $cfgs[ $name ] ) && isset( $cfgs[ $name ][ $key ]  ) ){
                $rett = $cfgs[ $name ][ $key ];
            }

            else{
                $rett = $theme -> get( $key );
            }

            return $rett;
        }

        static function bitly( $item, $url, $current = null )
        {
            $cfgs   = tempo_cfgs::get( 'bitly' );
            $theme  = wp_get_theme();
            $rett   = $theme -> get( 'AuthorURI' );

            if( empty( $current ) ){
                $rett       = $theme -> get( 'ThemeURI' );
                $current    = strtolower( str_replace( ' ', '-', $theme -> get( 'Name' ) ) );
            }

            if( isset( $cfgs[ $current ] ) && isset( $cfgs[ $current ][ $item ] ) && isset( $cfgs[ $current ][ $item ][ $url ] ) )
                $rett = esc_url( $cfgs[ $current ][ $item ][ $url ] );

            return $rett;
        }

        // check if is active premium version
        static function is_active_premium()
        {
            return function_exists( 'zeon_plugin_dir' );
        }
    }

}
?>
