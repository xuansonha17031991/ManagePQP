<?php
    if( tempo_options::get( 'breadcrumbs' ) ){

        $nav = '';
        if( !tempo_options::get( 'breadcrumbs-nav' ) )
            $nav = 'no-nav';
?>
        <!-- breadcrumbs wrapper -->
        <div class="tempo-breadcrumbs <?php echo esc_attr( $nav ); ?>">

            <?php tempo_get_template_part( 'templates/breadcrumbs/prepend', 'archive' ); ?>


            <!-- main container -->
            <div <?php echo tempo_container_class( 'main' ); ?>>
                <div <?php echo tempo_row_class(); ?>>

                    <!-- content -->
                    <div <?php echo tempo_content_class(); ?>>
                        <div <?php echo tempo_row_class(); ?>>

                            <?php tempo_get_template_part( 'templates/breadcrumbs/before-content', 'archive' ); ?>


                            <!-- navigation and headline -->
                            <div <?php echo tempo_large_class( ); ?>>

                                <?php tempo_get_template_part( 'templates/breadcrumbs/prepend-content', 'archive' ); ?>


                                <?php if( tempo_options::get( 'breadcrumbs-nav' ) ) : ?>
                                    <!-- navigation -->
                                    <nav class="tempo-navigation">

                                        <?php tempo_get_template_part( 'templates/breadcrumbs/prepend-nav', 'archive' ); ?>

                                        <ul class="tempo-menu-list">

                                            <?php tempo_get_template_part( 'templates/breadcrumbs/prepend-list', 'archive' ); ?>

                                            <?php echo tempo_breadcrumbs::home(); ?>

                                            <?php tempo_get_template_part( 'templates/breadcrumbs/after-home', 'archive' ); ?>

                                            <?php
                                                if ( is_day() ){
                                                    $day    = get_the_date( );
                                                    $m      = get_the_date( 'm' );
                                                    $d      = get_the_date( 'd' );

                                                    $month  = get_the_date( 'F' );
                                                    $year   = get_the_date( 'Y' );
                                                    $FY     = get_the_date( 'F Y' );

                                                    echo '<li><a href="' . esc_url( get_year_link( $year ) ) . '" title="' . sprintf( __( 'Yearly archives - %s' , 'tempo' ), esc_attr( $year ) ) . '">'  . $year . '</a></li>';
                                                    echo '<li><a href="' . esc_url( get_month_link( $year, $m ) ) . '" title="' . sprintf( __( 'Monthly archives - %s' , 'tempo' ), esc_attr( $FY ) ) . '">'  . $month . '</a></li>';
                                                    echo '<li><time datetime="' . esc_attr( get_the_date( 'Y-m-d' ) ) . '">' . $d . '</time></li>';

                                                    $title  = __( 'Daily Archives' , 'tempo' );

                                                }else if ( is_month() ){
                                                    $month  = get_the_date( 'F' );
                                                    $year   = get_the_date( 'Y' );

                                                    echo '<li><a href="' . esc_url( get_year_link( $year ) ) . '" title="' . sprintf( __( 'Yearly archives - %s' , 'tempo' ), esc_attr( $year ) ) . '">'  . $year . '</a></li>';
                                                    echo '<li><time datetime="' . esc_attr( get_the_date( 'Y-m-d' ) ) . '">' . $month . '</time></li>';

                                                    $title  = __( 'Monthly Archives' , 'tempo' );

                                                }else if ( is_year() ){
                                                    $year   = get_the_date( 'Y' );
                                                    echo '<li><time datetime="' . esc_attr( get_the_date( 'Y-m-d' ) ) . '">'  . $year . '</time></li>';

                                                    $title  = __( 'Yearly Archives' , 'tempo' );

                                                }else{
                                                    $year   = __( 'Archives' , 'tempo' );
                                                    echo '<li>' . $year . '</li>';
                                                    $title  = $year;
                                                }
                                            ?>

                                            <?php tempo_get_template_part( 'templates/breadcrumbs/append-list', 'archive' ); ?>

                                        </ul>

                                        <?php tempo_get_template_part( 'templates/breadcrumbs/append-nav', 'archive' ); ?>

                                    </nav><!-- end navigation -->
                                <?php endif; ?>


                                <?php tempo_get_template_part( 'templates/breadcrumbs/after-nav', 'archive' ); ?>


                                <!-- headline / end -->
                                <h1 id="tempo-headline-archive" class="tempo-headline"><?php echo esc_html( $title ); ?></h1>

                                <?php tempo_get_template_part( 'templates/breadcrumbs/append-content', 'archive' ); ?>

                            </div><!-- end navigation and headline -->


                            <!-- counter -->
                            <div <?php echo tempo_small_class( 'details' ); ?>>

                                <?php global $wp_query; ?>
                                <?php echo tempo_breadcrumbs::count( $wp_query ); ?>

                            </div><!-- end counter -->


                            <?php tempo_get_template_part( 'templates/breadcrumbs/after-content', 'archive' ); ?>

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


            <?php tempo_get_template_part( 'templates/breadcrumbs/append', 'archive' ); ?>

        </div><!-- end breadcrumbs wrapper -->
<?php
    }
?>
