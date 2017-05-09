<?php tempo_get_header( 'archive' ); ?>

    <?php tempo_get_template_part( 'templates/prepend', 'archive' ); ?>

    <?php tempo_get_template_part( 'templates/breadcrumbs/archive' ); ?>

    <?php tempo_get_template_part( 'templates/breadcrumbs/after', 'archive' ); ?>

    <!-- page -->
    <div id="tempo-page" <?php echo tempo_page_class( 'template-archive' ); ?>>

        <!-- container -->
        <div <?php echo tempo_container_class(); ?>>
            <div <?php echo tempo_row_class(); ?>>

                <!-- content -->
                <div <?php echo tempo_content_class(); ?>>
                    <div <?php echo tempo_row_class(); ?>>

                        <?php tempo_get_template_part( 'templates/section/before', 'archive' ); ?>

                        <?php tempo_get_template_part( 'templates/loop', 'archive' ); ?>

                        <?php tempo_get_template_part( 'templates/section/after', 'archive' ); ?>

                    </div>
                </div><!-- end content -->

            </div>
        </div><!-- end conainer -->

    </div><!-- end page -->

    <?php tempo_get_template_part( 'templates/append', 'archive' ); ?>

<?php tempo_get_footer( 'archive' ); ?>