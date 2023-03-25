( function( $ ) {

	$( document ).ready( function() {
		$( '.flex-viewport-wrapper' ).flexslider( {
			animation: "slide",
			slideshow: false,
			animationLoop: true,
			controlNav: false,
			directionNav: true,
			carousel: false,
			itemMargin: 0,
		} );
	} );

	$( window ).on( 'load', function() {
		// Triggers resize event to make sure video widgets in the footer maintain the correct aspect ratio
		setTimeout( function(){
			if ( typeof( Event ) === 'function' ) {
				window.dispatchEvent( new Event( 'resize' ) );
			} else {
				var event = window.document.createEvent( 'UIEvents' );
				event.initUIEvent( 'resize', true, false, window, 0 );
				window.dispatchEvent( event );
			}
		} );
	} );

} )( jQuery );
