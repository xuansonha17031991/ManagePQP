<?php tempo_get_header( 'blog' ); ?>

	<?php tempo_get_template_part( 'templates/prepend', 'blog' ); ?>

	<?php tempo_get_template_part( 'templates/breadcrumbs/blog' ); ?>

	<?php tempo_get_template_part( 'templates/breadcrumbs/after', 'blog' ); ?>
        
    <!-- page -->
    <div id="tempo-page" <?php echo tempo_page_class( 'template-blog' ); ?>>

        <!-- container -->
        <div <?php echo tempo_container_class(); ?>>
            <div <?php echo tempo_row_class(); ?>>
        
                <!-- content -->
                <div <?php echo tempo_content_class(); ?>>
                    <div <?php echo tempo_row_class(); ?>>

                		<?php tempo_get_template_part( 'templates/section/before', 'blog' ); ?>

                        <?php tempo_get_template_part( 'templates/loop', 'blog' ); ?>

                        <?php tempo_get_template_part( 'templates/section/after', 'blog' ); ?>

                    </div>
                </div><!-- end content -->

            </div>
        </div><!-- end container -->

    </div><!-- end page -->

    <?php tempo_get_template_part( 'templates/append', 'blog' ); ?>

<?php tempo_get_footer( 'blog' ); ?>