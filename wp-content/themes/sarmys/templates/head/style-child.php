<style type="text/css" id="background-color">
    <?php $color = esc_attr( '#' . get_theme_mod( 'background_color', 'f3f5f8' ) ); ?>

    body div.tempo-website-wrapper{
        background-color: <?php echo $color; ?>;
    }
</style>

<style type="text/css" id="background-image">
    body div.tempo-website-wrapper{

        <?php $image = esc_url( get_theme_mod( 'background_image' ) ); ?>

        <?php if( !empty( $image ) ) : ?>

            background-image: url(<?php echo esc_url( $image ); ?>);
            background-repeat: <?php echo esc_attr( get_theme_mod( 'background_repeat' , 'repeat' ) ); ?>;
            background-position: <?php echo esc_attr( get_theme_mod( 'background_position_x' , 'center' ) ); ?>;
            background-attachment: <?php echo esc_attr( get_theme_mod( 'background_attachment' , 'scroll' ) ); ?>;

        <?php endif; ?>
    }
</style>
