<?php tempo_get_header( 'author' ); ?>

    <?php tempo_get_template_part( 'templates/prepend', 'author' ); ?>

    <?php tempo_get_template_part( 'templates/breadcrumbs/author' ); ?>

    <?php tempo_get_template_part( 'templates/breadcrumbs/after', 'author' ); ?>

    <!-- page -->
    <div id="tempo-page" <?php echo tempo_page_class( 'template-author' ); ?>>

        <!-- container -->
        <div <?php echo tempo_container_class(); ?>>
            <div <?php echo tempo_row_class(); ?>>

                <!-- content -->
                <div <?php echo tempo_content_class(); ?>>
                    <div <?php echo tempo_row_class(); ?>>
        
                        <?php tempo_get_template_part( 'templates/section/before', 'author' ); ?>

                        <?php tempo_get_template_part( 'templates/loop', 'author' ); ?>

                        <?php tempo_get_template_part( 'templates/section/after', 'author' ); ?>

                    </div>
                </div><!-- end content -->

            </div>
        </div><!-- end container -->

    </div><!-- end page -->

    <?php tempo_get_template_part( 'templates/append', 'author' ); ?>

<?php tempo_get_footer( 'author' ); ?>