<?php
    if( tempo_options::get( 'breadcrumbs' ) ){

        $nav = '';
        if( !tempo_options::get( 'breadcrumbs-nav' ) )
            $nav = 'no-nav';
?>
        <!-- breadcrumbs wrapper -->
        <div class="tempo-breadcrumbs <?php echo esc_attr( $nav ); ?>">

            <?php tempo_get_template_part( 'templates/breadcrumbs/prepend', 'category' ); ?>


            <!-- main container -->
            <div <?php echo tempo_container_class( 'main' ); ?>>
                <div <?php echo tempo_row_class(); ?>>

                    <!-- content -->
                    <div <?php echo tempo_content_class(); ?>>
                        <div <?php echo tempo_row_class(); ?>>

                            <?php tempo_get_template_part( 'templates/breadcrumbs/before-content', 'category' ); ?>


                            <!-- navigation and headline -->
                            <div <?php echo tempo_large_class(); ?>>

                                <?php tempo_get_template_part( 'templates/breadcrumbs/prepend-content', 'category' ); ?>


                                <?php if( tempo_options::get( 'breadcrumbs-nav' ) ) : ?>
                                    <!-- navigation -->
                                    <nav class="tempo-navigation">

                                        <?php tempo_get_template_part( 'templates/breadcrumbs/prepend-nav', 'category' ); ?>

                                        <ul class="tempo-menu-list">

                                            <?php tempo_get_template_part( 'templates/breadcrumbs/prepend-list', 'category' ); ?>

                                            <?php echo tempo_breadcrumbs::home(); ?>

                                            <?php tempo_get_template_part( 'templates/breadcrumbs/after-home', 'category' ); ?>

                                            <?php echo tempo_breadcrumbs::categories( absint( get_query_var( 'cat' ) ) ); ?>

                                            <?php tempo_get_template_part( 'templates/breadcrumbs/prepend-list', 'category' ); ?>
                                        </ul>

                                        <?php tempo_get_template_part( 'templates/breadcrumbs/append-nav', 'category' ); ?>

                                    </nav><!-- end navigation -->
                                <?php endif; ?>


                                <?php tempo_get_template_part( 'templates/breadcrumbs/after-nav', 'category' ); ?>


                                <!-- headline / end -->
                                <h1 id="tempo-headline-category" class="tempo-headline"><?php _e( 'Category Archives', 'tempo' ); ?></h1>

                                <?php tempo_get_template_part( 'templates/breadcrumbs/append-content', 'category' ); ?>

                            </div><!-- end navigation and headline -->


                            <!-- counter -->
                            <div <?php echo tempo_small_class( 'details' ); ?>>

                                <?php global $wp_query; ?>
                                <?php echo tempo_breadcrumbs::count( $wp_query ); ?>

                            </div><!-- end counter -->


                            <?php tempo_get_template_part( 'templates/breadcrumbs/after-content', 'category' ); ?>

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


            <?php tempo_get_template_part( 'templates/breadcrumbs/append', 'blog' ); ?>

        </div><!-- end breadcrumbs wrapper -->
<?php
    }
?>
