<section <?php echo tempo_loop_section_class( 'tempo-section loop' ); ?>>

    <?php tempo_get_template_part( 'templates/section/prepend', 'loop' ); ?>

    <?php tempo_get_template_part( 'templates/loop/before' ); ?>

    <?php
        if( have_posts() ){
            while( have_posts() ){
                the_post();
                tempo_get_template_part( 'templates/article', apply_filters( 'tempo_blog_view', null ) );
            }
        }
        else{
            tempo_get_template_part( 'templates/not-found', 'loop' );
        }
    ?>

    <?php tempo_get_template_part( 'templates/loop/after' ); ?>

    <?php tempo_get_template_part( 'templates/loop/pagination' ); ?>

    <?php tempo_get_template_part( 'templates/section/append', 'loop' ); ?>

</section>
