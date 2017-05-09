<?php
    if( !tempo_options::get( 'header-templates' ) )
        return;

	$image 	= esc_url( get_header_image() );

    if( empty( $image ) )
        return;

    $alt = '404 - Resource not found';

?>
    <div class="sarmys-404-wrapper">

    	<div class="parallax" style="background-image: url(<?php echo esc_url( $image ); ?>);">
            <img src="<?php echo esc_url( $image ); ?>" alt="<?php echo esc_attr( $alt ); ?>" class="parallax-image"/>
        </div>

        <!-- mask - a transparent foil over the header image -->
        <div class="tempo-header-mask"></div>
