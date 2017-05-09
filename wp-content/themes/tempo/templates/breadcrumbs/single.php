<?php
    global $post;

    if( !apply_filters( 'tempo_post_breadcrumbs', tempo_options::get( 'breadcrumbs' ) && tempo_options::get( 'breadcrumbs-nav' ), $post -> ID ) )
        return;

    $nav = '';
    if( !tempo_options::get( 'breadcrumbs-nav' ) )
        $nav = 'no-nav';
?>

    <!-- breadcrumbs wrapper -->
    <div class="tempo-breadcrumbs">

        <?php tempo_get_template_part( 'templates/breadcrumbs/prepend', 'post' ); ?>


        <!-- main container -->
        <div <?php echo tempo_container_class( 'main' ); ?>>
            <div <?php echo tempo_row_class(); ?>>

                <!-- content -->
                <div <?php echo tempo_content_class(); ?>>
                    <div <?php echo tempo_row_class(); ?>>

                        <?php tempo_get_template_part( 'templates/breadcrumbs/before-content', 'post' ); ?>


                        <!-- navigation and headline -->
                        <div <?php echo tempo_full_class(); ?>>

                            <?php tempo_get_template_part( 'templates/breadcrumbs/prepend-content', 'post' ); ?>


                            <!-- navigation -->
                            <nav class="tempo-navigation">

                                <?php tempo_get_template_part( 'templates/breadcrumbs/prepend-nav', 'post' ); ?>

                                <ul class="tempo-menu-list">

                                    <?php tempo_get_template_part( 'templates/breadcrumbs/prepend-list', 'post' ); ?>

                                    <?php echo tempo_breadcrumbs::home(); ?>

                                    <?php tempo_get_template_part( 'templates/breadcrumbs/after-home', 'post' ); ?>

                                    <?php
                                        $categories = get_the_category( $post -> ID );
                                        $cats = array();

                                        // convert to array
                                        if( !empty( $categories ) ){
                                            foreach ( $categories as $i => $cat ){
                                                $cats[] = (array)$cat;
                                            }

                                            // sort descendent by term_id
                                            $categories = tempo_cfgs::sksort( $cats, 'term_id' );

                                            foreach( $categories as $c ){
                                                echo tempo_breadcrumbs::categories( absint( $c[ 'term_id' ] ) );
                                                break;
                                            }
                                        }
                                    ?>

                                    <?php tempo_get_template_part( 'templates/breadcrumbs/append-list', 'post' ); ?>

                                </ul>

                                <?php tempo_get_template_part( 'templates/breadcrumbs/append-nav', 'post' ); ?>

                            </nav><!-- end navigation -->


                            <?php tempo_get_template_part( 'templates/breadcrumbs/after-nav', 'post' ); ?>


                            <?php tempo_get_template_part( 'templates/breadcrumbs/append-content', 'post' ); ?>

                        </div><!-- end navigation and headline -->


                        <?php tempo_get_template_part( 'templates/breadcrumbs/after-content', 'post' ); ?>

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


        <?php tempo_get_template_part( 'templates/breadcrumbs/append', 'post' ); ?>

    </div><!-- end breadcrumbs wrapper -->
