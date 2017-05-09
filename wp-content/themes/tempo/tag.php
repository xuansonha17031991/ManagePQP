<?php tempo_get_header( 'tag' ); ?>

    <?php tempo_get_template_part( 'templates/prepend', 'tag' ); ?>

    <?php tempo_get_template_part( 'templates/breadcrumbs/tag' ); ?>

    <?php tempo_get_template_part( 'templates/breadcrumbs/after', 'tag' ); ?>

    <!-- page -->
    <div id="tempo-page" <?php echo tempo_page_class( 'template-tag' ); ?>>

        <!-- container -->
        <div <?php echo tempo_container_class(); ?>>
            <div <?php echo tempo_row_class(); ?>>

                <!-- content -->
                <div <?php echo tempo_content_class(); ?>>
                    <div <?php echo tempo_row_class(); ?>>

                        <?php tempo_get_template_part( 'templates/section/before', 'tag' ); ?>

                        <?php tempo_get_template_part( 'templates/loop', 'tag' ); ?>

                        <?php tempo_get_template_part( 'templates/section/after', 'tag' ); ?>

                    </div>
                </div><!-- content -->

            </div>
        </div><!-- container -->

    </div><!-- page -->

    <?php tempo_get_template_part( 'templates/append', 'tag' ); ?>

<?php tempo_get_footer( 'tag' ); ?>