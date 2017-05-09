<?php

    $items = array(
        'evernote', 'vimeo', 'twitter', 'skype', 'renren', 'github', 'rdio', 'linkedin', 'behance', 'dropbox',
        'flickr', 'instagram', 'vkontakte', 'facebook', 'tumblr', 'picasa', 'dribbble', 'stumbleupon', 'lastfm',
        'gplus', 'google-circles', 'youtube-play', 'youtube', 'pinterest', 'smashing', 'soundcloud', 'flattr', 
        'odnoklassniki', 'mixi', 'rss'
    );

    $has_social_items   = false;

    foreach( $items as $item ){
        $url = tempo_options::get( $item );
        $has_social_items = $has_social_items || !empty( $item );
    }

    if( !$has_social_items )
        return;
?>

    <!-- social items wrapper -->
    <div class="sarmys-social">

        <?php
            foreach( $items as $item ){
                $url = tempo_options::get( $item );

                if( !empty( $url ) ){
                    echo '<a href="' . esc_url( $url ) . '" class="tempo-icon-' . esc_attr( $item ) . '" target="_blank"></a>';
                }
            }
        ?>

    </div><!-- end social items wrapper -->