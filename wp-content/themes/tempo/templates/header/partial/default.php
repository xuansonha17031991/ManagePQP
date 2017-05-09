<?php
    if( !tempo_has_header() )
        return;

    $headline           = tempo_options::get( 'header-headline' );
    $headline_text      = tempo_options::get( 'header-headline-text' );

    $description        = tempo_options::get( 'header-description' );
    $description_text   = tempo_options::get( 'header-description-text' );

    $image              = esc_url( get_header_image() );
    $classes            = apply_filters( 'tempo_default_header_classes', 'tempo-header-partial overflow-wrapper' );
?>

<div class="<?php echo esc_attr( $classes ); ?>" style="background-image: url(<?php echo esc_url( $image ); ?>);">

    <?php tempo_get_template_part( 'templates/header/partial/prepend' ); ?>

    <!-- mask - a transparent foil over the header image -->
    <div class="tempo-header-mask"></div>

    <!-- flex container -->
    <div <?php echo tempo_flex_container_class( 'tempo-header-text-wrapper' ); ?>>
        <div <?php echo tempo_flex_item_class(); ?>>

            <?php tempo_get_template_part( 'templates/header/partial/flex-item/prepend' ); ?>

            <?php
                // headline
                if( $headline ){
                    echo '<a class="tempo-header-headline" href="' . esc_url( home_url( '/' ) ) . '" title="' . esc_attr( $headline_text ) . '">';
                    echo esc_html( $headline_text );
                    echo '</a>';
                }

                tempo_get_template_part( 'templates/header/image/between-text' );

                // description
                if( $description ){
                    echo '<a class="tempo-header-description" href="' . esc_url( home_url( '/' ) ) . '" title="' . esc_attr( $description_text ) . '">';
                    echo esc_html( $description_text );
                    echo '</a>';
                }
            ?>

            <?php tempo_get_template_part( 'templates/header/partial/flex-item/append' ); ?>

        </div>
    </div><!-- end flex container -->

    <?php tempo_get_template_part( 'templates/header/partial/append' ); ?>
</div>
