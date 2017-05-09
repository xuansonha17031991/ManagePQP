<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="profile" href="http://gmpg.org/xfn/11" />
        <?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
        <?php endif; ?>
        <?php wp_head(); ?>
    </head>

    <?php
        $classes = 'tempo-has-header';

        if( !tempo_has_header() ){
            $classes = 'tempo-not-has-header';
        }
    ?>

    <body <?php body_class( esc_attr( apply_filters( 'tempo_body_classes', $classes ) ) ); ?>>

        <?php get_template_part( 'templates/body/prepend', 'page' ); ?>

        <?php tempo_get_template_part( 'templates/body/prepend', 'page' ); ?>

        <?php tempo_get_template_part( 'templates/header/menu/collapsed', 'page' ); ?>

        <?php tempo_get_template_part( 'templates/website-wrapper/before', 'page' ); ?>

        <div class="tempo-website-wrapper">

            <?php tempo_get_template_part( 'templates/website-wrapper/prepend', 'page' ); ?>

            <?php tempo_get_template_part( 'templates/header/before', 'page' ); ?>

            <header id="tempo-header" class="tempo-header" role="banner">

                <?php tempo_get_template_part( 'templates/header/prepend', 'page' ); ?>

                <?php tempo_get_template_part( 'templates/header/topper/before', 'page' ); ?>

                <?php tempo_get_template_part( 'templates/header/topper', 'page' ); ?>

                <?php tempo_get_template_part( 'templates/header/topper/after', 'page' ); ?>

                <?php tempo_get_template_part( 'templates/header/partial', 'page' ); ?>

                <?php tempo_get_template_part( 'templates/header/append', 'page' ); ?>

            </header>

            <?php tempo_get_template_part( 'templates/header/after', 'page' ); ?>
