<?php
    if( tempo_options::get( 'breadcrumbs' ) ){

        global $post;

        $nav = '';
        if( !tempo_options::get( 'breadcrumbs-nav' ) )
            $nav = 'no-nav';
?>
        <!-- breadcrumbs wrapper -->
        <div class="tempo-breadcrumbs <?php echo esc_attr( $nav ); ?>">

            <?php tempo_get_template_part( 'templates/breadcrumbs/prepend', 'author' ); ?>


            <!-- main container -->
            <div <?php echo tempo_container_class( 'main' ); ?>>
                <div <?php echo tempo_row_class(); ?>>

                    <!-- content -->
                    <div <?php echo tempo_content_class(); ?>>
                        <div <?php echo tempo_row_class(); ?>>

                            <?php tempo_get_template_part( 'templates/breadcrumbs/before-content', 'author' ); ?>


                            <!-- navigation and headline -->
                            <div <?php echo tempo_large_class(); ?>>

                                <?php tempo_get_template_part( 'templates/breadcrumbs/prepend-content', 'author' ); ?>


                                <?php if( tempo_options::get( 'breadcrumbs-nav' ) ) : ?>
                                    <!-- navigation -->
                                    <nav class="tempo-navigation">

                                        <?php tempo_get_template_part( 'templates/breadcrumbs/prepend-nav', 'author' ); ?>

                                        <ul class="tempo-menu-list">

                                            <?php tempo_get_template_part( 'templates/breadcrumbs/prepend-list', 'author' ); ?>

                                            <?php echo tempo_breadcrumbs::home(); ?>

                                            <?php tempo_get_template_part( 'templates/breadcrumbs/after-home', 'author' ); ?>

                                            <li><?php _e( 'Author' , 'tempo' ); ?></li>

                                            <?php tempo_get_template_part( 'templates/breadcrumbs/append-list', 'author' ); ?>

                                        </ul>

                                        <?php tempo_get_template_part( 'templates/breadcrumbs/append-nav', 'author' ); ?>

                                    </nav><!-- end navigation -->
                                <?php endif; ?>


                                <?php tempo_get_template_part( 'templates/breadcrumbs/after-nav', 'author' ); ?>


                                <!-- headline / end -->
                                <h1 id="tempo-headline-author" class="tempo-headline"><?php  echo esc_html( get_the_author_meta( 'display_name' , $post -> post_author ) ) ?></h1>

                                <?php tempo_get_template_part( 'templates/breadcrumbs/append-content', 'author' ); ?>

                            </div><!-- end navigation and headline -->


                            <!-- avatar -->
                            <div <?php echo tempo_small_class( 'details' ); ?>>

                                <div class="avatar-wrapper">
                                    <?php echo get_avatar( $post -> post_author, 90, get_template_directory_uri() . '/media/img/default-avatar.png' ); ?>
                                </div>

                            </div><!-- end avatar -->


                            <?php tempo_get_template_part( 'templates/breadcrumbs/after-content', 'author' ); ?>

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


            <?php tempo_get_template_part( 'templates/breadcrumbs/append', 'author' ); ?>

        </div><!-- end breadcrumbs wrapper -->
<?php
    }
?>
