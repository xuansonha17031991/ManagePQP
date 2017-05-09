<?php
    if( tempo_options::get( 'breadcrumbs' ) ){

        $nav = '';
        if( !tempo_options::get( 'breadcrumbs-nav' ) )
            $nav = 'no-nav';
?>
        <!-- breadcrumbs wrapper -->
        <div class="tempo-breadcrumbs <?php echo esc_attr( $nav ); ?>">

            <?php tempo_get_template_part( 'templates/breadcrumbs/prepend', '404' ); ?>


            <!-- main container -->
            <div <?php echo tempo_container_class( 'main' ); ?>>
                <div <?php echo tempo_row_class(); ?>>

                    <!-- content -->
                    <div <?php echo tempo_content_class(); ?>>
                        <div <?php echo tempo_row_class(); ?>>

                            <?php tempo_get_template_part( 'templates/breadcrumbs/before-content', '404' ); ?>


                            <!-- navigation and headline -->
                            <div <?php echo tempo_full_class(); ?>>

                                <?php tempo_get_template_part( 'templates/breadcrumbs/prepend-content', '404' ); ?>


                                <?php if( tempo_options::get( 'breadcrumbs-nav' ) ) : ?>
                                    <!-- navigation -->
                                    <nav class="tempo-navigation">

                                        <?php tempo_get_template_part( 'templates/breadcrumbs/prepend-nav', '404' ); ?>

                                        <ul class="tempo-menu-list">

                                            <?php tempo_get_template_part( 'templates/breadcrumbs/prepend-list', '404' ); ?>

                                            <?php echo tempo_breadcrumbs::home(); ?>

                                            <?php tempo_get_template_part( 'templates/breadcrumbs/after-home', '404' ); ?>

                                            <?php tempo_get_template_part( 'templates/breadcrumbs/append-list', '404' ); ?>

                                        </ul>

                                        <?php tempo_get_template_part( 'templates/breadcrumbs/append-nav', '404' ); ?>

                                    </nav><!-- end navigation -->
                                <?php endif; ?>


                                <?php tempo_get_template_part( 'templates/breadcrumbs/after-nav', '404' ); ?>


                                <!-- headline / end -->
                                <h1 id="tempo-headline-404" class="tempo-headline"><?php printf( __( 'Error %s' , 'tempo' ) , number_format_i18n( 404 ) ); ?></h1>

                                <?php tempo_get_template_part( 'templates/breadcrumbs/append-content', '404' ); ?>

                            </div><!-- end navigation and headline -->


                            <?php tempo_get_template_part( 'templates/breadcrumbs/after-content', '404' ); ?>

                        </div>
                    </div><!-- end content -->

                </div>
            </div><!-- end main container -->


            <!-- delimiter container -->
            <div <?php echo tempo_container_class( 'delimiter' ); ?>>
                <div <?php echo tempo_row_class(); ?>>

                    <!-- content -->
                    <div <?php echo tempo_content_class(); ?>>
                        <div <?php echo tempo_row_class(); ?>>

                            <div <?php echo tempo_full_class(); ?>>
                                <hr/>
                            </div>

                        </div>
                    </div><!-- end content -->

                </div>
            </div><!-- end delimiter container -->


            <?php tempo_get_template_part( 'templates/breadcrumbs/append', '404' ); ?>

        </div><!-- end breadcrumbs wrapper -->
<?php
    }
?>
