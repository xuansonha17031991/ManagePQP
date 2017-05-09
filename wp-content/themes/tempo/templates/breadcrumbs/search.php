<?php
    if( tempo_options::get( 'breadcrumbs' ) ){

    $nav = '';
    if( !tempo_options::get( 'breadcrumbs-nav' ) )
        $nav = 'no-nav';
?>
        <!-- breadcrumbs wrapper -->
        <div class="tempo-breadcrumbs <?php echo esc_attr( $nav ); ?>">

            <?php tempo_get_template_part( 'templates/breadcrumbs/prepend', 'search' ); ?>


            <!-- main container -->
            <div <?php echo tempo_container_class( 'main' ); ?>>
                <div <?php echo tempo_row_class(); ?>>

                    <!-- content -->
                    <div <?php echo tempo_content_class(); ?>>
                        <div <?php echo tempo_row_class(); ?>>

                            <?php tempo_get_template_part( 'templates/breadcrumbs/before-content', 'search' ); ?>


                            <!-- navigation and headline -->
                            <div <?php echo tempo_large_class(); ?>>

                                <?php tempo_get_template_part( 'templates/breadcrumbs/prepend-content', 'search' ); ?>


                                <?php if( tempo_options::get( 'breadcrumbs-nav' ) ) : ?>
                                    <!-- navigation -->
                                    <nav class="tempo-navigation">

                                        <?php tempo_get_template_part( 'templates/breadcrumbs/prepend-nav', 'search' ); ?>

                                        <ul class="tempo-menu-list">

                                            <?php tempo_get_template_part( 'templates/breadcrumbs/prepend-list', 'search' ); ?>

                                            <?php echo tempo_breadcrumbs::home(); ?>

                                            <?php tempo_get_template_part( 'templates/breadcrumbs/after-home', 'search' ); ?>

                                            <?php tempo_get_template_part( 'templates/breadcrumbs/append-list', 'search' ); ?>

                                        </ul>

                                        <?php tempo_get_template_part( 'templates/breadcrumbs/append-nav', 'search' ); ?>

                                    </nav><!-- end navigation -->
                                <?php endif; ?>


                                <?php tempo_get_template_part( 'templates/breadcrumbs/after-nav', 'search' ); ?>


                                <!-- headline / end -->
                                <h1 id="tempo-headline-search" class="tempo-headline"><?php printf( __( 'Search results for "%s"', 'tempo' ), get_search_query() ); ?></h1>

                                <?php tempo_get_template_part( 'templates/breadcrumbs/append-content', 'search' ); ?>

                            </div><!-- end navigation and headline -->


                            <!-- counter -->
                            <div <?php echo tempo_small_class( 'details' ); ?>>

                                <?php global $wp_query; ?>
                                <?php echo tempo_breadcrumbs::count( $wp_query ); ?>

                            </div><!-- end counter -->


                            <?php tempo_get_template_part( 'templates/breadcrumbs/after-content', 'search' ); ?>

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


            <?php tempo_get_template_part( 'templates/breadcrumbs/append', 'search' ); ?>

        </div><!-- end breadcrumbs wrapper -->
<?php
    }
?>
