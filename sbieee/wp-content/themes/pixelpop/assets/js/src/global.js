/**
 * File global.js.
 *
 * Main JavaScript file of the theme.
 */

function checkClick( event ) {
	if ( event.type === 'click' ) {
		return true;
	} else if ( event.type === 'keypress' ) {
		const code = event.charCode || event.keyCode;
		if ( ( code === 32 ) || ( code === 13 ) ) {
			return true;
		}
	} else {
		return false;
	}
}

// jQuery( document ).ready( function( $ ) {
// 	$( 'input[type=checkbox]' ).on( 'keypress', function( event ) {
// 		if ( event.which === 13 ) {
// 			$( this ).prop( 'checked', ! $( this ).prop( 'checked' ) );
// 		}
// 	} );
// } );

jQuery( document ).ready( function( $ ) {
	$( '#theme-switch-button' ).on( 'keypress', function( event ) {
		if ( event.which === 13 ) {
			this.checked = ! this.checked;
		}
	} );
} );

//====================================================//
//                Header Search Toggle                //
//====================================================//

jQuery( document ).ready( function( $ ) {
	$( '.ppop-header-search-icon' ).on( 'click', function() {
		if ( checkClick( event ) === true ) {
			$( '.ppop-header-search-form' ).toggleClass( 'active' );
		}
	} );

	$( '.ppop-header-search-close' ).on( 'click', function() {
		if ( checkClick( event ) === true ) {
			$( '.ppop-header-search-form' ).toggleClass( 'active' );
		}
	} );
} );

//====================================================//
//               Mobile Main Menu Toggle              //
//====================================================//
jQuery( document ).ready( function( $ ) {
	$( '.ppop-hamburger-menu' ).on( 'click', function() {
		if ( checkClick( event ) === true ) {
			$( this ).toggleClass( 'is-active' );
			$( '.ppop-mobile-nav' ).toggleClass( 'show' );
			$( '.site-content' ).toggleClass( 'blur' );
		}
	} );

	$( '.ppop-nav-close-btn' ).on( 'click', function() {
		if ( checkClick( event ) === true ) {
			$( '.ppop-hamburger-menu' ).toggleClass( 'is-active' );
			$( '.ppop-mobile-nav' ).toggleClass( 'show' );
			$( '.ppop-hamburger-menu' ).focus();
			$( '.site-content' ).toggleClass( 'blur' );
		}
	} );
} );

//====================================================//
//         Mobile Menu Toggle Background Blur         //
//====================================================//
// jQuery( document ).ready( function( $ ) {
// 	$( '.ppop-hamburger' ).on( 'click', function() {
// 		if ( checkClick( event ) === true ) {
// 			$( '.site-content' ).toggleClass( 'blur' );
// 		}
// 	} );
// } );

//====================================================//
//              Header Account Menu Toggle            //
//====================================================//
jQuery( document ).ready( function( $ ) {
	$( '.ppop-header-account-menu .account-menu-link' ).on( 'click', function() {
		if ( checkClick( event ) === true ) {
			$( '.account-menu-box' ).toggle( 100 );
		}
	} );

	$( '.ppop-header-profile .account-menu-link' ).on( 'click', function() {
		if ( checkClick( event ) === true ) {
			$( '.account-menu-box' ).toggle( 100 );
		}
	} );
} );

//====================================================//
//         Mobile Sub Menu Toggle                //
//====================================================//
jQuery( document ).ready( function( $ ) {
	$( '.main-navigation .menu-item-has-children' ).children( 'a' )
		.after( '<button role="button" class="mob-menu-toggle" id="mob-menu-toggle"><i class="ppop-icon ppop-icon-chevron-down"></i></i></button>' );

	$( '.main-navigation .mob-menu-toggle' ).on( 'click', function() {
		if ( checkClick( event ) === true ) {
			$( this ).siblings( 'ul' ).slideToggle( 100 );
		}
	} );
} );

jQuery( document ).ready( function( $ ) {
	$( window ).scroll( function() {
		const scroll = $( window ).scrollTop();
		if ( scroll > 0 ) {
			$( '.site-header' ).addClass( 'stick-to-top' );
			$( '#site-navigation.show' ).addClass( 'stick-to-top' );
			$( '#site-navigation' ).addClass( 'scrolled' );
		} else {
			$( '.site-header' ).removeClass( 'stick-to-top' );
			$( '#site-navigation.show' ).removeClass( 'stick-to-top' );
			$( '#site-navigation' ).removeClass( 'scrolled' );
		}
	} );
} );

//====================================================//
//         Mobile Comment Replys Toggle                //
//====================================================//
jQuery( document ).ready( function( $ ) {
	$( '.comment.parent' ).children( '.comment-body' ).children( '.comment-details' ).children( '.comment-footer' ).children( '.comment-reply-link' )
		.after( '<a href="#openreply" class="comment-replys-toggle" id="comment-replys-toggle">View Replys<i class="ppop-icon ppop-icon-chevron-down"></i></i></button>' );

	$( '.comment.parent .comment-replys-toggle' ).on( 'click', function() {
		if ( checkClick( event ) === true ) {
			$( this ).parents( '.comment-body' ).siblings( '.children' ).slideToggle( 100 );
		}
	} );
} );

//====================================================//
//               Social Share Copy Link               //
//====================================================//
// eslint-disable-next-line no-unused-vars
function copyLink() {
	const copyText = document.getElementById( 'ppop-copy-link' );
	copyText.select();
	copyText.setSelectionRange( 0, 99999 );
	document.execCommand( 'copy' );
}

jQuery( document ).ready( function( $ ) {
	$( '.pixelpop-copy-post-link button' ).on( 'click', function() {
		if ( checkClick( event ) === true ) {
			$( '.ppop-link-copied-msg' ).show().delay( 5000 ).fadeOut();
		}
	} );
} );

jQuery( document ).ready( function( $ ) {
	$( '.pixelpop-popup-open' ).on( 'click', function() {
		if ( checkClick( event ) === true ) {
			$( this ).siblings( '.ppop-social-share-popup-wrap' ).toggleClass( 'show' );
		}
	} );
} );

jQuery( document ).ready( function( $ ) {
	$( '.pixelpop-popup-close' ).on( 'click', function() {
		if ( checkClick( event ) === true ) {
			$( this ).parents( '.pixelpop-popup-wrap' ).toggleClass( 'show' );
		}
	} );
} );

jQuery( document ).ready( function( $ ) {
	$( '.pixelpop-related-posts' ).each( function() {
		let highestBox = 0;

		$( this ).find( '.ppop-related-post' ).each( function() {
			if ( $( this ).height() > highestBox ) {
				highestBox = $( this ).height();
			}
		} );

		$( this ).find( '.ppop-related-post' ).height( highestBox );
	} );
} );

//====================================================//
//                BBpress Topic Toggle                //
//====================================================//
jQuery( document ).ready( function( $ ) {
	$( '.ppop-new-topic-toggle-button' ).on( 'click', function() {
		if ( checkClick( event ) === true ) {
			$( '#bbpress-forums .bbp-topic-form' ).toggleClass( 'active' );
		}
	} );
} );

jQuery( document ).ready( function( $ ) {
	$( '.ppop-close-new-topic' ).on( 'click', function() {
		if ( checkClick( event ) === true ) {
			$( '#bbpress-forums .bbp-topic-form' ).toggleClass( 'active' );
		}
	} );
} );
