<?php global $post; ?>

<?php tempo_get_template_part( 'templates/article/title/before' ); ?>

<h2 class="tempo-title article">

	<?php tempo_get_template_part( 'templates/article/title/prepend' ); ?>

    <?php if( !empty( $post -> post_title ) ) { ?>

        <a href="<?php echo esc_url( get_permalink( $post ) ); ?>" title="<?php echo esc_attr( get_the_title( $post ) ); ?>"><?php the_title(); ?></a>

    <?php } else { ?>

        <a href="<?php echo esc_url( get_permalink( $post ) ); ?>"><?php _e( 'Read more about ..' , 'tempo' ) ?></a>

    <?php } ?>

    <?php tempo_get_template_part( 'templates/article/title/append' ); ?>

</h2>

<?php tempo_get_template_part( 'templates/article/title/after' ); ?>
