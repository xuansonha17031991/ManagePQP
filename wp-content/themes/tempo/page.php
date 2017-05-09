<?php tempo_get_header( 'page' ); ?>

    <?php tempo_get_template_part( 'templates/prepend', 'page' ); ?>

    <?php
        if( have_posts() ){
            while( have_posts() ){
                the_post();

            tempo_get_template_part( 'templates/breadcrumbs/page' );

            tempo_get_template_part( 'templates/breadcrumbs/after', 'page' );
        ?>

            <!-- page -->
            <div id="tempo-page" <?php echo tempo_page_class( 'template-page' ); ?>>

                <!-- container -->
                <div <?php echo tempo_container_class(); ?>>
                    <div <?php echo tempo_row_class(); ?>>

                        <!-- content -->
                        <div <?php echo tempo_content_class(); ?>>
                            <div <?php echo tempo_row_class(); ?>>

                                <?php tempo_get_template_part( 'templates/section/before', 'page' ); ?>

                                <section <?php echo tempo_page_section_class( $post -> ID, 'tempo-section page' ); ?>>

                                    <?php tempo_get_template_part( 'templates/section/prepend', 'page' ); ?>

                                    <?php tempo_get_template_part( 'templates/page/before' ); ?>

                                    <?php tempo_get_template_part( 'templates/page' ); ?>

                                    <?php tempo_get_template_part( 'templates/page/after' ); ?>

                                    <?php tempo_get_template_part( 'templates/section/append', 'page' ); ?>

                                </section>

                                <?php tempo_get_template_part( 'templates/section/after', 'page' ); ?>

                            </div>
                        </div><!-- content -->
                    
                    </div>
                </div><!-- container -->

            </div><!-- page -->
    <?php
            }
        }
    ?>

    <?php tempo_get_template_part( 'templates/append', 'page' ) ?>

<?php tempo_get_footer( 'page' ); ?>