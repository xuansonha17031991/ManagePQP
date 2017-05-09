<!-- copyright wrapper -->
<div class="tempo-copyright">

    <!-- container -->
    <div <?php echo tempo_container_class(); ?>>
        <div <?php echo tempo_row_class(); ?>>

            <!-- content -->
            <div <?php echo tempo_content_class(); ?>>
                <div <?php echo tempo_row_class(); ?>>


                    <!-- copyright content -->
                    <div <?php echo tempo_full_class(); ?>>

                        <p>

                            <?php
                                /**
                                 *
                                 *  Content Copyright
                                 *  Customer can overwrite Content Copyright from the theme options
                                 *
                                 *  Appearance / Customize / Others / Copyright - option "Website Content Copyright"
                                 */
                            ?>

                            <span class="copyright"><?php echo tempo_options::get( 'website-copyright' ); ?></span>

                            <?php
                                /**
                                 *
                                 *  Tempo WordPress Theme Copyright and Credit Link
                                 *
                                 *  We strongly recommend do not alter, modify, change or / and overwrite this section.
                                 *  Also we strongly recommend do not alter, modify, change or / and overwrite the visula
                                 *  appearance for this section by using css rules or JavaScript code.
                                 *
                                 *  Before make some changes to this section please consult
                                 *  the license terms of use. Also you can discus this with
                                 *  your law consultant.
                                 *
                                 *  @link : http://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html
                                 */
                            ?>

                            <span><?php echo tempo_options::get( 'author-copyright' ); ?></span>

                        </p>

                    </div><!-- end copyright content -->


                </div>
            </div><!-- end content -->

        </div>
    </div><!-- end container -->

</div><!-- end copyright wrapper -->
