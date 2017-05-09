<?php tempo_get_header( 'search' ); ?>

    <?php tempo_get_template_part( 'templates/prepend', 'search' ); ?>

    <?php tempo_get_template_part( 'templates/breadcrumbs/search' ); ?>

    <?php tempo_get_template_part( 'templates/breadcrumbs/after', 'search' ); ?>

    <!-- page -->
    <div id="tempo-page" <?php echo tempo_page_class( 'template-search' ); ?>>

        <!-- container -->
        <div <?php echo tempo_container_class(); ?>>
            <div <?php echo tempo_row_class(); ?>>

                <!-- content -->
                <div <?php echo tempo_content_class(); ?>>
                    <div <?php echo tempo_row_class(); ?>>

                        <?php tempo_get_template_part( 'templates/section/before', 'search' ); ?>

                        <?php tempo_get_template_part( 'templates/loop', 'search' ); ?>

                        <?php tempo_get_template_part( 'templates/section/after', 'search' ); ?>

                    </div>
                </div><!-- end content -->

            </div>
        </div><!-- end container -->

    </div><!-- end page -->

    <?php tempo_get_template_part( 'templates/append', 'search' ); ?>

<?php tempo_get_footer( 'search' ); ?>