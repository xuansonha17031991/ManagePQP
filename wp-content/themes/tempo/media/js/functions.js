/**
 *  Callback Function
 */

 ;var tempo_callback = function( callback, args ){
    (function( c, p ) {
        try{
            c( p );
        }catch ( e ){
            if (e instanceof SyntaxError) {
                console.log( (e.message) );
            }
        }
    })( callback, args );
};


 /**
 *  Images Loaded
 *
 *  Allow to run a callback function after
 *  loading all images from a dom element
 *
 *  eg:
 *
 *  tempo_images.loaded( '.gallery-wrapper', function(){
 *      jQuery( '.tempo-wrapper' ).masonry();
 *  });
 */

;var tempo__images = {
    _class : function(){
        this.loaded = function( el, callback ){
            var total = jQuery( el ).find( 'img' ).length;

            jQuery( el ).find( 'img' ).each(function(){
                var image = new Image();

                image.onload = function(){
                    total--;

                    if( total == 0 ){
                        callback();
                    }
                }

                image.src = jQuery( this ).attr( 'src' );
            });
        }
    }
};

var tempo_images = new tempo__images._class();



/**
 *  jQuery Tools
 *  tempo_height    - setting a proportional height based on current width.
 *  hasAttr         - check if DOM element has an attribute
 *
 *  eg:
 *  jQuery( '.tempo-youtube-thumbnail' ).tempo_height( 16/9 )
 */

;(function( $, window ){

    // tempo height
    $.fn.tempo_height = function( ratio ){
        if( typeof ratio == 'undefined' || ratio == 0 )
            ratio = 16/9;

        return this.each(function(){
            if ( !$.data(this, 'ratio_instantiated' ) ){
                $.data(this, 'ratio_instantiated', (function( el, ratio ){

                    var resize = function( ratio ){

                        var

                        width   = parseInt( jQuery( el ).width() ),
                        height  = parseInt( width / ratio );

                        jQuery( el ).css({ 'height' : height + 'px' });
                    }

                    resize( ratio );

                    // reset height on resize
                    jQuery( window ).resize(function(){
                        resize( ratio );
                    });

                })( this, ratio ));
            }
        });
    };

    $.fn.tempo_min_height = function( w, ratio ){
        if( typeof ratio == 'undefined' || ratio == 0 )
            ratio = 16/9;

        return this.each(function(){
            if ( !$.data(this, 'ratio_instantiated' ) ){
                $.data(this, 'ratio_instantiated', (function( el, ratio ){

                    var resize = function( ratio ){

                        var

                        width   = parseInt( jQuery( el ).width() ),
                        height  = parseInt( width / ratio );

                        if( w > width )
                            jQuery( el ).css({ 'height' : height + 'px' });
                    }

                    resize( ratio );

                    // reset height on resize
                    jQuery( window ).resize(function(){
                        resize( ratio );
                    });

                })( this, ratio ));
            }
        });
    };

    // has attribute
    $.fn.hasAttr = function( name ){
        return this.attr( name ) !== undefined;
    };

})( jQuery, window);



/////   SETUP    /////


jQuery(document).ready(function(){

    // Header Menu
    jQuery( 'header nav.tempo-navigation.nav-collapse button.tempo-btn-collapse' ).click(function(){

        var nav = jQuery( 'div.tempo-navigation-wrapper.nav-collapse' );

        if( !jQuery( nav ).hasClass( 'collapse-in' ) ){
            if( jQuery( nav ).hasClass( 'collapse-out' ) ){
                jQuery( nav ).removeClass( 'collapse-out' );
            }

            jQuery( nav ).addClass( 'collapse-in' );

            jQuery( 'body' ).css({ 'overflow' : 'hidden' });

            jQuery( nav ).find( 'div.tempo-navigation-shadow' ).click(function(){
                if( jQuery( nav ).hasClass( 'collapse-in' ) ){
                    jQuery( nav ).addClass( 'collapse-out' ).removeClass( 'collapse-in' );
                }

                jQuery( 'body' ).css({ 'overflow' : 'initial' });
            });
        }
    });


    // video thumbnail ratio 16:9
    jQuery( 'div.tempo-video-thumbnail' ).tempo_height();


    // grid and portfolio with masonry
    tempo_images.loaded( 'div.tempo-shortcode.posts div.loop-row', function(){
        jQuery( 'div.tempo-shortcode.posts div.loop-row' ).masonry();

        // reset masonry on resize
        jQuery(window).resize(function(){
            jQuery( 'div.tempo-shortcode.posts div.loop-row' ).masonry();
        });
    });

    // grid and portfolio with masonry
    tempo_images.loaded( 'section.tempo-blog-grid div.row', function(){
        jQuery( 'section.tempo-blog-grid div.row' ).masonry();

        // reset masonry on resize
        jQuery(window).resize(function(){
            jQuery( 'section.tempo-blog-grid div.row' ).masonry();
        });
    });

    // grid and portfolio with masonry
    tempo_images.loaded( 'section.tempo-blog-portfolio div.row', function(){
        jQuery( 'section.tempo-blog-portfolio div.row' ).masonry();

        // reset masonry on resize
        jQuery(window).resize(function(){
            jQuery( 'section.tempo-blog-portfolio div.row' ).masonry();
        });
    });


    // gallery with masonry
    tempo_images.loaded( '.tempo-gallery', function(){
        jQuery( '.tempo-gallery' ).masonry();

        // reset masonry on resize
        jQuery(window).resize(function(){
            jQuery( '.tempo-gallery' ).masonry();
        });
    });


    // header and foorter sidebars with masonry
    tempo_images.loaded( 'aside .widgets-row', function(){
        jQuery( 'aside .widgets-row' ).masonry();

        // reset masonry on resize
        jQuery(window).resize(function(){
            jQuery( 'aside .widgets-row' ).masonry();
        });
    });


    // Counter UP on scroll page
    jQuery('.counter').counterUp({
        delay: 10,
        time: 1500
    });


    /**
     *  Comments
     *
     *  show / hide button
     *  show comments list after submit a comments
     */

    jQuery( 'div.comments-list-collapse a' ).click(function(){
        jQuery( this ).parent().fadeOut('slow');
        jQuery( 'div.tempo-comments-wrapper' ).fadeIn('slow');
    });

    // show comments after submit
    if( document.location.href.match( /^(.*)#comment\-[0-9]+/ ) ){
        var comments = jQuery( 'div#comments.tempo-comments-wrapper' );

        if( comments.length && !jQuery( comments ).hasClass( 'tempo-not-collapsing' ) ){
            jQuery( comments ).addClass( 'tempo-not-collapsing' );
        }
    }
});
