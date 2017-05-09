<?php tempo_get_header( 'front-page' ); ?>

    <?php tempo_get_template_part( 'templates/prepend', 'front-page' ); ?>

    <!-- page -->
    <div id="tempo-page" <?php echo tempo_page_class( 'front-page' ); ?>>

        <!-- container -->
        <div <?php echo tempo_container_class(); ?>>
            <div <?php echo tempo_row_class(); ?>>

            <?php if( get_option( 'show_on_front' ) == 'page' ){ ?>

                <?php

                    /**
                     *  Front Page Content
                     */

                    while( have_posts() ){
                        the_post();
                ?>
                        <!-- content -->
                        <div <?php echo tempo_content_class(); ?>>
                            <div <?php echo tempo_row_class(); ?>>

                                <?php tempo_get_template_part( 'templates/section/before', 'front-page' ); ?>

                                <section <?php echo tempo_front_page_section_class( 'tempo-section page front-page' ); ?>>

                                    <?php tempo_get_template_part( 'templates/section/prepend', 'front-page' ); ?>

                                    <?php tempo_get_template_part( 'templates/page/before', 'front-page' ); ?>

                                    <?php tempo_get_template_part( 'templates/front-page' ); ?>

                                    <?php tempo_get_template_part( 'templates/page/after', 'front-page' ); ?>

                                    <?php tempo_get_template_part( 'templates/section/append', 'front-page' ); ?>

                                </section>

                                <?php tempo_get_template_part( 'templates/section/after', 'front-page' ); ?>

                            </div>
                        </div><!-- end content -->
                <?php
                    }
                ?>

            <?php }else if( have_posts() ) { ?>

                <?php

                    /**
                     *  Blog Contant
                     */
                ?>

                    <!-- content -->
                    <div <?php echo tempo_content_class(); ?>>
                        <div <?php echo tempo_row_class(); ?>>

                            <?php tempo_get_template_part( 'templates/section/before', 'loop-front-page' ); ?>

                            <?php tempo_get_template_part( 'templates/loop', 'front-page' ); ?>

                            <?php tempo_get_template_part( 'templates/section/after', 'loop-front-page' ); ?>

                        </div>
                    </div><!-- end content -->

            <?php }else{ ?>

                <?php

                    /**
                     *  Not found posts
                     */
                ?>

                    <!-- content -->
                    <div <?php echo tempo_content_class(); ?>>
                        <div <?php echo tempo_row_class(); ?>>

                            <?php tempo_get_template_part( 'templates/section/before', 'front-page' ); ?>

                            <section <?php echo tempo_front_page_section_class( 'tempo-section tempo-404 not-found front-page' ); ?>>

                                <?php tempo_get_template_part( 'templates/section/prepend', 'front-page' ); ?>

                                <?php tempo_get_template_part( 'templates/not-found', 'front-page' ); ?>

                                <?php tempo_get_template_part( 'templates/section/append', 'front-page' ); ?>

                            </section>

                            <?php tempo_get_template_part( 'templates/section/after', 'front-page' ); ?>

                        </div>
                    </div><!-- end content -->

            <?php } ?>


            </div>
        </div><!-- end container -->

    </div><!-- end page -->

    <?php tempo_get_template_part( 'templates/append', 'front-page' ); ?>

<?php tempo_get_footer( 'front-page' ); ?>
