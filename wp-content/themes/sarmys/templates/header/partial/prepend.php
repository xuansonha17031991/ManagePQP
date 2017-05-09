<?php
	$site_title         = get_bloginfo( 'name' );
	$site_description   = get_bloginfo( 'description' );
	$image 				= null;
	$alt 				= esc_attr( $site_title . ' - ' . $site_description );

	if( is_singular() ){
		global $post;

		$thumbnail 	= get_post( get_post_thumbnail_id( $post ) );
		$media 		= wp_get_attachment_image_src( $thumbnail -> ID, apply_filters( 'sarmys_header_thumbnail_size', 'sarmys-header' ) );

		if( isset( $media[ 0 ] ) )
			$image = esc_url( $media[ 0 ] );
	}
	else if( tempo_is_blog() ){
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
	<div class="parallax" style="background-image: url(<?php echo esc_url( $image ); ?>);">
		<img src="<?php echo esc_url( $image ); ?>" alt="<?php echo esc_attr( $alt); ?>" class="parallax-image"/>
	</div>
