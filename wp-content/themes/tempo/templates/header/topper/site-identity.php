<?php
    $custom_logo        = tempo_options::get( 'logo' );
    $has_custom_logo    = !empty( $custom_logo );

    if ( function_exists( 'the_custom_logo' ) ){
        if( has_custom_logo() ){
            $has_custom_logo = has_custom_logo();
        }
    }

    $has_identity = apply_filters( 'tempo_has_custom_logo', !$has_custom_logo );

    if( !$has_custom_logo && !$has_identity ){
        return;
    }

    $classes = '';

    if( !$has_identity ){
        $classes = 'not-has-identity';
    }

    echo '<div class="tempo-site-identity ' . esc_attr( $classes ) . '">';

    $site_title         = get_bloginfo( 'name' );
    $site_description   = get_bloginfo( 'description' );

    // wordpress custom logo
    if ( function_exists( 'the_custom_logo' ) ) {
        if( $has_custom_logo = has_custom_logo() ){
            the_custom_logo();
        }
    }

    // tempo custom logo
    else{

        $cfgs               = tempo_cfgs::get( 'custom-logo' );
        $max_width          = isset( $cfgs[ 'width' ] ) ? absint( $cfgs[ 'width' ] ) : 235;
        $max_height         = isset( $cfgs[ 'height' ] ) ? absint( $cfgs[ 'height' ] ) : 70;

        $site_logo          = tempo_options::get( 'logo' );

        // site identity
        if( !empty( $site_logo ) ){

            $style = '';
            $has_custom_logo = true;

            if( function_exists( 'getimagesize' ) ){
                $margin = -16;
                $image  = getimagesize( $site_logo );

                if( isset( $image[ 0 ] ) && isset( $image[ 1 ] ) ){
                    $width  = absint( $image[ 0 ] );
                    $height = absint( $image[ 1 ] );

                    if( $width > $max_width ){
                        $h = intval( $max_width * $height / $width );

                        if( $h < $max_height )
                            $margin = intval( ( 38 - $h ) / 2 );
                    }
                    else if( $height > $max_height ){
                        $margin = -16;
                    }
                }

                $style = 'style="margin-top:' . intval( $margin ) . 'px; margin-bottom:' . intval( $margin ) . 'px;"';
            }

            echo '<a class="custom-logo-link" href="' . esc_url( home_url( '/' ) ) . '" title="' . esc_attr( $site_title . ' - ' . $site_description ) . '" ' . $style . '>';
            echo '<img src="' . esc_url( $site_logo ) . '" alt="' . esc_attr( $site_title . ' - ' . $site_description ) . '" itemprop="logo"/>';
            echo '</a>';
        }
    }

    // title and description
    if( apply_filters( 'tempo_has_custom_logo', !$has_custom_logo ) ){

        // blog title
        if( apply_filters( 'tempo_dispaly_site_title', true ) && !empty( $site_title ) ){
            echo '<a class="tempo-site-title" href="' . esc_url( home_url( '/' ) ) . '" title="' . esc_attr( $site_title . ' - ' . $site_description ) . '">';
            bloginfo( 'name' );
            echo '</a>';
        }

        tempo_get_template_part( 'templates/header/topper/site-identity-between' );

        // blog description
        if( apply_filters( 'tempo_dispaly_site_description', true ) && !empty( $site_description ) ){
            echo '<a class="tempo-site-description" href="' . esc_url( home_url( '/' ) ) . '" title="' . esc_attr( $site_title . ' - ' . $site_description ) . '">';
            bloginfo( 'description' );
            echo '</a>';
        }
    }

    echo '</div>';
?>
