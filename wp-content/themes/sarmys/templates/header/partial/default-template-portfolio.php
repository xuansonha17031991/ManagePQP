<?php
	global $post;

    // header image
    $thumbnail 		= get_post( get_post_thumbnail_id( $post -> ID ) );
    $image 			= null;

    if( has_post_thumbnail( $post -> ID ) && isset( $thumbnail -> ID ) || tempo_has_header() ){

    	$media = wp_get_attachment_image_src( $thumbnail -> ID, apply_filters( 'sarmys_header_thumbnail_size', 'sarmys-header' ) );

		if( isset( $media[ 0 ] ) )
			$image = esc_url( $media[ 0 ] );

		if( empty( $image ) )
			$image = esc_url( get_header_image() );
?>
		<div class="tempo-header-partial tempo-portfolio overflow-wrapper" style="background-image: url(<?php echo esc_url( $image ); ?>);">

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
	                		<div <?php echo tempo_content_class(); ?>>
	                			<div <?php echo tempo_row_class(); ?>>

						    		<?php
					    				$type = $post -> post_type;
					    				tempo_get_template_part( "templates/header/partial/portfolio/{$type}" );
						    		?>

								</div>
							</div><!-- end content -->

		    			</div>
		    		</div><!-- end main container -->

		    	</div>
		    </div><!-- end flex elements -->

		</div>
<?php
	}
?>
