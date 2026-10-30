/**
 * Elevator settings page: preview a track. One plays at a time; clicking again stops it.
 */
( function() {

    'use strict';

    var audio = null;
    var activeButton = null;

    function stop() {
        if ( audio ) {
            audio.pause();
            audio = null;
        }
        if ( activeButton ) {
            activeButton.textContent = activeButton.getAttribute( 'data-play' );
            activeButton = null;
        }
    }

    function onClick( event ) {
        var button = event.currentTarget;
        var wasActive = ( button === activeButton );

        stop();

        if ( wasActive ) {
            return;
        }

        audio = new Audio( button.getAttribute( 'data-src' ) );
        activeButton = button;
        button.textContent = button.getAttribute( 'data-stop' );
        audio.addEventListener( 'ended', stop, false );
        audio.play().catch( stop );
    }

    document.addEventListener( 'DOMContentLoaded', function() {
        var buttons = document.querySelectorAll( '.elevator-preview' );
        for ( var i = 0; i < buttons.length; i++ ) {
            buttons[ i ].addEventListener( 'click', onClick, false );
        }
    } );

})();
