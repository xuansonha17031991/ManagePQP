<?php global $post; ?>

<?php tempo_get_template_part( 'templates/article/hentry/before' ); ?>

<div class="tempo-hentry">

    <?php tempo_get_template_part( 'templates/article/hentry/prepend' ); ?>

    <?php
        $more_label     = __( 'Read More %s' , 'tempo' );
        $more_icon      = apply_filters( 'tempo_read_more_visible_icon', null );
        $more_icon_sm   = apply_filters( 'tempo_read_more_hidden_icon', '<i class="tempo-icon-right-big"></i>' );

        $more  = '<span class="hidden-xs">' . trim( sprintf( esc_html( $more_label ), $more_icon ) ) . '</span>';
        $more .= '<span class="hidden-sm hidden-md hidden-lg">' . $more_icon_sm . '</span>';

        if( !empty( $post -> post_excerpt ) ){
            the_excerpt();

            echo '<a href="' . esc_url( get_permalink( $post -> ID ) ) . '" class="more-link">';
            echo $more;
            echo '</a>';
        }
        else{
            the_content( $more );
        }
    ?>

    <?php tempo_get_template_part( 'templates/article/hentry/append' ); ?>

    <div class="clear clearfix"></div>
</div>

<?php tempo_get_template_part( 'templates/article/hentry/after' ); ?>
