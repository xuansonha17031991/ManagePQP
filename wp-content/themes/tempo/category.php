<?php tempo_get_header( 'category' ); ?>

    <?php tempo_get_template_part( 'templates/prepend', 'category' ); ?>

    <?php tempo_get_template_part( 'templates/breadcrumbs/category' ); ?>

    <?php tempo_get_template_part( 'templates/breadcrumbs/after', 'category' ); ?>

    <!-- page -->
    <div id="tempo-page" <?php echo tempo_page_class( 'template-category' ); ?>>

        <!-- container -->
        <div <?php echo tempo_container_class(); ?>>
            <div <?php echo tempo_row_class(); ?>>

                <!-- content -->
                <div <?php echo tempo_content_class(); ?>>
                    <div <?php echo tempo_row_class(); ?>>

                        <?php tempo_get_template_part( 'templates/section/before', 'category' ); ?>

                        <?php tempo_get_template_part( 'templates/loop', 'category' ); ?>

                        <?php tempo_get_template_part( 'templates/section/after', 'category' ); ?>

                    </div>
                </div><!-- end content -->

            </div>
        </div><!-- end container -->

    </div><!-- end page -->

    <?php tempo_get_template_part( 'templates/append', 'category' ); ?>

<?php tempo_get_footer( 'category' ); ?>