<?php
    $bg_color   = esc_attr( get_theme_mod( 'background_color', '#e5e5e5' ) );
    $bg_image   = esc_url( get_theme_mod( 'background_image' ) );
?>

<style type="text/css" id="background">
    body{
        background-color: <?php echo esc_attr( $bg_color ); ?>;

        <?php
            if( !empty( $bg_image ) ){
        ?>
                background-image: url(<?php echo esc_url( $bg_image ); ?>);
                background-repeat: <?php echo esc_attr( get_theme_mod( 'background_repeat' , 'repeat' ) ); ?>;
                background-position: <?php echo esc_attr( get_theme_mod( 'background_position_x' , 'center' ) ); ?>;
                background-attachment: <?php echo esc_attr( get_theme_mod( 'background_attachment' , 'fixed' ) ); ?>;
        <?php
            }
        ?>
    }
</style>

<style type="text/css" id="hyphens">
    <?php if( tempo_options::is_set( 'hyphens' ) ) : ?>

        <?php if( tempo_options::get( 'hyphens' ) ) : ?>
            *{
                -webkit-hyphens: auto;
                   -moz-hyphens: auto;
                        hyphens: auto;
            }
        <?php endif; ?>

        <?php if( tempo_options::is_set( 'header-hyphens' ) && tempo_options::get( 'header-hyphens' ) ) : ?>
            div.tempo-header-partial{
                -webkit-hyphens: auto;
                   -moz-hyphens: auto;
                        hyphens: auto;
            }
        <?php else : ?>
            div.tempo-header-partial{
                -webkit-hyphens: none;
                   -moz-hyphens: none;
                        hyphens: none;
            }
        <?php endif; ?>

        <?php if( tempo_options::is_set( 'headings-hyphens' ) && tempo_options::get( 'headings-hyphens' ) ) : ?>
            h1, h2, h3, h4, h5, h6{
                -webkit-hyphens: auto;
                   -moz-hyphens: auto;
                        hyphens: auto;
            }
        <?php else : ?>
            h1, h2, h3, h4, h5, h6{
                -webkit-hyphens: none;
                   -moz-hyphens: none;
                        hyphens: none;
            }
        <?php endif; ?>

        <?php if( tempo_options::is_set( 'content-hyphens' ) && tempo_options::get( 'content-hyphens' ) ) : ?>
            .hentry{
                -webkit-hyphens: auto;
                   -moz-hyphens: auto;
                        hyphens: auto;
            }

            <?php if( !( tempo_options::is_set( 'headings-hyphens' ) && tempo_options::get( 'headings-hyphens' ) ) ) : ?>
                .hentry h1,
                .hentry h2,
                .hentry h3,
                .hentry h4,
                .hentry h5,
                .hentry h6{
                    -webkit-hyphens: none;
                       -moz-hyphens: none;
                            hyphens: none;
                }
            <?php endif; ?>

        <?php else : ?>
            .hentry{
                -webkit-hyphens: none;
                   -moz-hyphens: none;
                        hyphens: none;
            }
        <?php endif; ?>


    <?php else : ?>

        <?php if( tempo_options::is_set( 'header-hyphens' ) && tempo_options::get( 'header-hyphens' ) ) : ?>
            div.tempo-header-partial{
                -webkit-hyphens: auto;
                   -moz-hyphens: auto;
                        hyphens: auto;
            }
        <?php endif; ?>

        <?php if( tempo_options::is_set( 'headings-hyphens' ) && tempo_options::get( 'headings-hyphens' ) ) : ?>
            h1, h2, h3, h4, h5, h6{
                -webkit-hyphens: auto;
                   -moz-hyphens: auto;
                        hyphens: auto;
            }
        <?php endif; ?>

        <?php if( tempo_options::is_set( 'content-hyphens' ) && tempo_options::get( 'content-hyphens' ) ) : ?>
            .hentry{
                -webkit-hyphens: auto;
                   -moz-hyphens: auto;
                        hyphens: auto;
            }

            <?php if( !( tempo_options::is_set( 'headings-hyphens' ) && tempo_options::get( 'headings-hyphens' ) ) ) : ?>
                .hentry h1,
                .hentry h2,
                .hentry h3,
                .hentry h4,
                .hentry h5,
                .hentry h6{
                    -webkit-hyphens: none;
                       -moz-hyphens: none;
                            hyphens: none;
                }
            <?php endif; ?>
        <?php endif; ?>

    <?php endif; ?>
</style>

<?php

    /**
     *  This hook allow enable and disable
     *  default site indentity custom style
     */

    if( apply_filters( 'tempo_site_identity_style', true ) ) : ?>

        <style type="text/css" id="site-title-color">
            <?php
                if( tempo_options::is_set( 'site-title-color' ) ||
                    tempo_options::is_set( 'site-title-transp' ) ||
                    tempo_options::is_set( 'site-title-h-color' ) ) :

                    $hex        = tempo_options::get( 'site-title-color' );
                    $transp     = tempo_options::get( 'site-title-transp' );
                    $transp_h   = tempo_options::get( 'site-title-h-transp' );

                    $rgba       = 'rgba( ' . tempo_hex2rgb( $hex ) . ', ' . number_format( floatval( $transp / 100 ), 2 ) . ' )';
                    $rgba_h     = 'rgba( ' . tempo_hex2rgb( $hex ) . ', ' . number_format( floatval( $transp_h / 100 ), 2 ) . ' )';
            ?>
                    header.tempo-header div.tempo-topper div.tempo-site-identity a.tempo-site-title{
                        color: <?php echo esc_attr( $rgba ); ?>;
                    }
                    header.tempo-header div.tempo-topper div.tempo-site-identity a.tempo-site-title:hover{
                        color: <?php echo esc_attr( $rgba_h ); ?>;
                    }

            <?php endif; ?>
        </style>

        <style type="text/css" id="tagline-color">
            <?php
                if( tempo_options::is_set( 'tagline-color' ) ||
                    tempo_options::is_set( 'tagline-transp' ) ||
                    tempo_options::is_set( 'tagline-h-color' ) ) :

                    $hex        = tempo_options::get( 'tagline-color' );
                    $transp     = tempo_options::get( 'tagline-transp' );
                    $transp_h   = tempo_options::get( 'tagline-h-transp' );

                    $rgba       = 'rgba( ' . tempo_hex2rgb( $hex ) . ', ' . number_format( floatval( $transp / 100 ), 2 ) . ' )';
                    $rgba_h     = 'rgba( ' . tempo_hex2rgb( $hex ) . ', ' . number_format( floatval( $transp_h / 100 ), 2 ) . ' )';
            ?>

                    header.tempo-header div.tempo-topper div.tempo-site-identity a.tempo-site-description{
                        color: <?php echo esc_attr( $rgba ); ?>;
                    }
                    header.tempo-header div.tempo-topper div.tempo-site-identity a.tempo-site-description:hover{
                        color: <?php echo esc_attr( $rgba_h ); ?>;
                    }

            <?php endif; ?>
        </style>

<?php endif; ?>

<?php

    /**
     *  This hook allow enable and disable
     *  default menu custom style
     */

    if( apply_filters( 'tempo_menu_style', true ) ) : ?>

        <style type="text/css" id="menu-link-color">
            <?php
                if( tempo_options::is_set( 'menu-link-color' ) ||
                    tempo_options::is_set( 'menu-link-transp' ) ) :

                    $hex        = tempo_options::get( 'menu-link-color' );
                    $transp     = tempo_options::get( 'menu-link-transp' );
                    $rgba       = 'rgba( ' . tempo_hex2rgb( $hex ) . ', ' . number_format( floatval( $transp / 100 ), 2 ) . ' )';
            ?>
                    header.tempo-header nav ul li a,
                    header.tempo-header nav button.tempo-btn-collapse{
                        color: <?php echo esc_attr( $rgba ); ?>;
                    }

            <?php endif; ?>
        </style>

        <style type="text/css" id="menu-link-h-color">
            <?php
                if( tempo_options::is_set( 'menu-link-h-color' ) ||
                    tempo_options::is_set( 'menu-link-h-transp' ) ) :

                    $hex        = tempo_options::get( 'menu-link-h-color' );
                    $transp     = tempo_options::get( 'menu-link-h-transp' );
                    $rgba       = 'rgba( ' . tempo_hex2rgb( $hex ) . ', ' . number_format( floatval( $transp / 100 ), 2 ) . ' )';
            ?>

                    header.tempo-header nav ul li.current-menu-ancestor > a,
                    header.tempo-header nav ul li.current-menu-item > a,
                    header.tempo-header nav ul li:hover > a,
                    header.tempo-header nav button.tempo-btn-collapse:hover{
                        color: <?php echo esc_attr( $rgba ); ?>;
                    }

            <?php endif; ?>
        </style>

<?php endif; ?>

<style type="text/css" id="header-bkg-color">
    <?php if( tempo_options::is_set( 'header-bkg-color' ) ) :  ?>

        div.tempo-header-partial{
            background-color: <?php echo tempo_options::get( 'header-bkg-color' ); ?>;
        }

    <?php endif; ?>
</style>

<style type="text/css" id="header-height">
    <?php
        if( tempo_options::is_set( 'header-height' ) ) :
            $height = tempo_options::get( 'header-height' );
    ?>
        header.tempo-header div.tempo-header-partial{
            height: <?php echo absint( $height ); ?>px;
        }

        @media (max-width: 991px ){
            header.tempo-header div.tempo-header-partial{
                height: <?php echo absint( $height * 991/1170 ); ?>px;
            }
        }

        @media (max-width: 767px ){
            header.tempo-header div.tempo-header-partial{
                height: <?php echo absint( $height * 767/1170 ); ?>px;
            }
        }

        @media (max-width: 520px ){
            header.tempo-header div.tempo-header-partial{
                height: <?php echo absint( $height * 520/1170 ); ?>px;
            }
        }

    <?php endif; ?>
</style>

<style type="text/css" id="header-mask-color">
    <?php
        if( tempo_options::is_set( 'header-mask-color' ) ||
            tempo_options::is_set( 'header-mask-transp' ) ) :

            $hex        = tempo_validator::color( tempo_options::get( 'header-mask-color' ) );
            $transp     = absint( tempo_options::get( 'header-mask-transp' ) );
            $rgba       = 'rgba( ' . tempo_hex2rgb( $hex ) . ', ' . number_format( floatval( $transp / 100 ), 2 ) . ' )';
    ?>
            header.tempo-header div.tempo-header-partial .tempo-header-mask{
                background-color: <?php echo esc_attr( $rgba ); ?>;
            }

    <?php endif; ?>
</style>

<style type="text/css" id="header-headline-color">
    <?php if( tempo_options::is_set( 'header-headline-color' ) ) :  ?>

        header.tempo-header div.tempo-header-partial .tempo-header-headline{
            color: <?php echo tempo_options::get( 'header-headline-color' ); ?>;
        }

    <?php endif; ?>
</style>

<style type="text/css" id="header-description-color">
    <?php
        if( tempo_options::is_set( 'header-description-color' ) ) :

            $hex    = tempo_options::get( 'header-description-color' );
            $rgba1  = 'rgba( ' . tempo_hex2rgb( $hex ) . ', 0.8 )';
            $rgba2  = 'rgba( ' . tempo_hex2rgb( $hex ) . ', 1.0 )';
    ?>
            header.tempo-header div.tempo-header-partial .tempo-header-description{
                color: <?php echo esc_attr( $rgba1 ); ?>;
            }
            header.tempo-header div.tempo-header-partial .tempo-header-description:hover{
                color: <?php echo esc_attr( $rgba2 ); ?>;
            }

    <?php endif; ?>
</style>

<style type="text/css" id="breadcrumbs-space">
    <?php
        if( tempo_options::is_set( 'breadcrumbs-space' ) ) :
            $padding = tempo_options::get( 'breadcrumbs-space' );
    ?>
            div.tempo-breadcrumbs div.tempo-container.main{
                padding-top: <?php echo absint($padding); ?>px;
                padding-bottom: <?php echo absint($padding); ?>px;
            }

            @media (max-width: 991px ){
                div.tempo-breadcrumbs div.tempo-container.main{
                    padding-top: <?php echo absint($padding * 991/1170); ?>px;
                    padding-bottom: <?php echo absint($padding * 991/1170); ?>px;
                }
            }

            @media (max-width: 767px ){
                div.tempo-breadcrumbs div.tempo-container.main{
                    padding-top: <?php echo absint($padding * 767/1170); ?>px;
                    padding-bottom: <?php echo absint($padding * 767/1170); ?>px;
                }
            }

            @media (max-width: 520px ){
                div.tempo-breadcrumbs div.tempo-container.main{
                    padding-top: <?php echo absint($padding * 520/1170); ?>px;
                    padding-bottom: <?php echo absint($padding * 520/1170); ?>px;
                }
            }

    <?php endif; ?>
</style>

<style type="text/css" id="custom-css">
    <?php
        if( tempo_options::is_set( 'custom-css' ) ){
            echo tempo_options::get( 'custom-css' );
        }
    ?>
</style>
