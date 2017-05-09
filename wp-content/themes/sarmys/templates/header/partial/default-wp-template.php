<?php
    if( !tempo_has_header() )
        return;

	if( tempo_is_blog() ){
		$page 		= get_page( absint( get_option( 'page_for_posts' ) ) );

		if( isset( $page -> ID ) ){
			$thumbnail 	= get_post( get_post_thumbnail_id( $page ) );
			$media 		= wp_get_attachment_image_src( $thumbnail -> ID, apply_filters( 'sarmys_header_thumbnail_size', 'sarmys-header' ) );

			if( isset( $media[ 0 ] ) )
				$image = esc_url( $media[ 0 ] );
		}
	}

	if( empty( $image ) )
		$image = esc_url( get_header_image() );
?>
	<div class="tempo-header-partial tempo-portfolio wp-templates overflow-wrapper" style="background-image: url(<?php echo esc_url( $image ); ?>);">

		<?php tempo_get_template_part( 'templates/header/partial/prepend' ); ?>

		<!-- mask - a transparent foil over the header image -->
		<div class="tempo-header-mask"></div>

		<!-- flex elements -->
	    <div class="tempo-flex-container tempo-valign-middle">
	    	<div class="tempo-flex-item tempo-align-center">

	    		<!-- main container -->
	    		<div <?php echo tempo_container_class( 'main' ); ?>>
            		<div <?php echo tempo_row_class(); ?>>

						<!-- content -->
                		<div <?php echo tempo_content_class( 'sarmys-layout-full' ); ?>>
                			<div <?php echo tempo_row_class(); ?>>

					    		<?php
                                    $type = null;

                                    if( tempo_is_blog() ){
                                        $type = 'blog';
                                    }

                                    else if( is_category() ){
                                        $type = 'category';
                                    }

                                    else if( is_tag() ){
                                        $type = 'tag';
                                    }

                                    else if( is_search() ){
                                        $type = 'search';
                                    }

                                    else if( is_author() ){
                                        $type = 'author';
                                    }

                                    else if( is_archive() ){
                                        $type = 'archive';
                                    }

				    				tempo_get_template_part( "templates/header/partial/default-wp-{$type}" );
					    		?>

							</div>
						</div><!-- end content -->

	    			</div>
	    		</div><!-- end main container -->

	    	</div>
	    </div><!-- end flex elements -->

	</div>
