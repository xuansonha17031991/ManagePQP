<?php
if( !class_exists( 'tempo_gallery' ) ){

class tempo_gallery
{
	static function shortcode( $rett, $_attr )
	{
        if( !tempo_options::get( 'gallery-style' ) )
            return null;

		global $post;

        $attr = shortcode_atts( array(
            'order'                 => 'ASC',
            'orderby'               => 'menu_order ID',
            'id'                    => $post -> ID,
            'ids'                   => '',
            'itemtag'               => 'dl',
            'icontag'               => 'dt',
            'captiontag'            => 'dd',
            'columns'               => 3,
            'size'                  => 'thumbnail',
            'include'               => '',
            'exclude'               => '',
            'tempo_style'    			=> 'none'
        ) , $_attr );
        
        $cols = $attr[ 'columns' ];
        $ids = array();
        
        if( empty( $attr[ 'ids' ] ) ){
            
            $id         = intval( $attr[ 'id' ] );
            $orderby    = $attr[ 'order' ];
            $order      = $attr[ 'order' ];
            $include    = $attr[ 'include' ];
            $exclude    = $attr[ 'exclude' ];
            
            if ( 'RAND' == $attr[ 'order' ] ) {
                $orderby = 'none';
            }
            
            if ( !empty( $include ) ) {
                $attachments = get_posts( array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
            } elseif ( !empty( $exclude ) ) {
                $attachments = get_children( array( 'post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
            } else {
                $attachments = get_children( array( 'post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby ) );
            }
            
            foreach ( $attachments as $key => $val ) {
                $ids[ ] = $val -> ID ;
            }       
        }else{
            $ids = explode( ',' , $attr[ 'ids' ] );
        }

        $rett  = '<div class="tempo-gallery tempo-gallery-colls-' . absint( $cols ) . '">';
        
        foreach( $ids as $id ){
            
            $p = get_post( $id );

            if( !isset( $p -> ID ) ){
            	continue;
            }
            
            $media = wp_get_attachment_image_src( $id , 'tempo-classic' );
            //$full = wp_get_attachment_image_src( $id , 'full' );
            
            $rett .= '<figure class="tempo-gallery-item">';

            $rett .= '<div class="tempo-gallery-thumbnail">';
            $rett .= apply_filters( 'tempo_gallery_image_thumbnail', '<img src="' . esc_url( $media[ 0 ] ) . '" alt="' . esc_attr( get_the_title( $p -> ID ) ) . '"/>', $p );
            $rett .= '</div>';

            $rett .= '<figcaption>';
            $rett .= '<div class="tempo-gallery-content">';

            if( !empty( $p -> post_title ) ){
                $rett .= '<div class="tempo-gallery-title">';
                $rett .= apply_filters( 'tempo_gallery_image_title', get_the_title( $p ), $p );
                $rett .= '</div>';
            }

            $excerpt = strip_tags( $p -> post_excerpt );

            if( !empty( $excerpt ) ){
                $rett .= '<div class="tempo-gallery-caption">';
                $rett .= strip_tags( $p -> post_excerpt );
                $rett .= '</div>';    
            }
            
            $rett .= '</div>';
            $rett .= '</figcaption>';

            $rett .= '</figure>';
        }

        $rett .= '<div class="clearfix clear"></div>';
        $rett .= '</div>';

        return $rett;
	}
}
	
}   /* END IF CLASS EXISTS */
?>