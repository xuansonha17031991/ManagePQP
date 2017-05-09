<?php tempo_get_header( 'post' ); ?>

    <?php tempo_get_template_part( 'templates/prepend', 'post' ); ?>

    <?php tempo_get_template_part( 'templates/breadcrumbs/single', 'post' ); ?>

    <?php tempo_get_template_part( 'templates/breadcrumbs/after', 'post' ); ?>

    <!-- page -->
    <div id="tempo-page" <?php echo tempo_page_class( 'template-single' ); ?>>

        <!-- container -->
        <div <?php echo tempo_container_class(); ?>>
            <div <?php echo tempo_row_class(); ?>>

                <!-- content -->
                <div <?php echo tempo_content_class(); ?>>
                    <div <?php echo tempo_row_class(); ?>>

                        <?php tempo_get_template_part( 'templates/section/before', 'post' ); ?>

                        <section <?php echo tempo_single_section_class( $post -> ID, 'tempo-section single post' ); ?>>

                            <?php tempo_get_template_part( 'templates/section/prepend', 'post' ); ?>

                            <?php
                                if( have_posts() ){
                                    while( have_posts() ){
                                        the_post();
                                        tempo_get_template_part( 'templates/single', 'post' );
                                    }
                                }
                            ?>

                            <?php tempo_get_template_part( 'templates/section/append', 'post' ); ?>

                        </section>

                        <?php tempo_get_template_part( 'templates/section/after', 'post' ); ?>

                    </div>
                </div><!-- end content -->
            
            </div>
        </div><!-- container -->

    </div><!-- end page -->

    <?php tempo_get_template_part( 'templates/append', 'post' ); ?>

<?php tempo_get_footer( 'post' ); ?>