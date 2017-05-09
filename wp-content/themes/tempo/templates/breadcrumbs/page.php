<?php
    global $post;

	if( !apply_filters( 'tempo_page_breadcrumbs', tempo_options::get( 'breadcrumbs' ), $post -> ID ) )
        return;

    $nav = '';
    if( !tempo_options::get( 'breadcrumbs-nav' ) )
        $nav = 'no-nav';
?>

    <!-- breadcrumbs wrapper -->
    <div class="tempo-breadcrumbs <?php echo esc_attr( $nav ); ?>">

    	<?php tempo_get_template_part( 'templates/breadcrumbs/prepend', 'page' ); ?>


        <!-- main container -->
        <div <?php echo tempo_container_class( 'main' ); ?>>
            <div <?php echo tempo_row_class(); ?>>

                <!-- content -->
                <div <?php echo tempo_content_class(); ?>>
                    <div <?php echo tempo_row_class(); ?>>

                    	<?php tempo_get_template_part( 'templates/breadcrumbs/before-content', 'page' ); ?>


                        <!-- navigation and headline -->
                        <div <?php echo tempo_full_class(); ?>>

                        	<?php tempo_get_template_part( 'templates/breadcrumbs/prepend-content', 'page' ); ?>


                            <?php if( tempo_options::get( 'breadcrumbs-nav' ) ) : ?>
                                <!-- navigation -->
                                <nav class="tempo-navigation">

                                    <?php tempo_get_template_part( 'templates/breadcrumbs/prepend-nav', 'page' ); ?>

                                    <ul class="tempo-menu-list">

                                    	<?php tempo_get_template_part( 'templates/breadcrumbs/prepend-list', 'page' ); ?>

                                        <?php echo tempo_breadcrumbs::home(); ?>

                                        <?php tempo_get_template_part( 'templates/breadcrumbs/after-home', 'page' ); ?>

                                        <?php echo tempo_breadcrumbs::pages( $post ); ?>

                                        <?php tempo_get_template_part( 'templates/breadcrumbs/append-list', 'page' ); ?>

                                    </ul>

                                    <?php tempo_get_template_part( 'templates/breadcrumbs/append-nav', 'page' ); ?>

                                </nav><!-- end navigation -->
                            <?php endif; ?>


                            <?php tempo_get_template_part( 'templates/breadcrumbs/after-nav', 'page' ); ?>


                            <!-- headline / end -->
                            <h1 id="tempo-headline-page" class="tempo-headline"><?php the_title(); ?></h1>

                            <?php tempo_get_template_part( 'templates/breadcrumbs/append-content', 'page' ); ?>

                        </div><!-- end navigation and headline -->


                        <?php tempo_get_template_part( 'templates/breadcrumbs/after-content', 'page' ); ?>

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


        <?php tempo_get_template_part( 'templates/breadcrumbs/append', 'page' ); ?>

    </div><!-- end breadcrumbs wrapper -->
