/**
 * File woocommerce.js.
 *
 * WooCommerce main javascript file.
 *
 */

//====================================================//
//      Calculating Header Height for Popups          //
//====================================================//
jQuery( document ).ready( function( $ ) {
	let headerheight = 0;
	let adminbarheight = 0;

	$( window ).on( 'resize', function() {
		headerheight = $( '.site-header' ).height();

		if ( $( 'body.admin-bar' ).length ) {
			if ( $( window ).width() < 782 ) {
				adminbarheight = 46;
				headerheight = headerheight + adminbarheight;
			} else {
				adminbarheight = 32;
				headerheight = headerheight + adminbarheight;
			}
		} else {
			adminbarheight = 0;
		}

		$( '.pixelpop-woo-product-filter-content, .ppop-myaccount-secondary' ).css( {
			top: headerheight,
		} );

		$( window ).scroll( function() {
			const scroll = $( window ).scrollTop();
			if ( scroll > 0 ) {
				$( '.pixelpop-woo-product-filter-content, .ppop-myaccount-secondary' ).css( {
					top: adminbarheight,
				} );
			} else {
				$( '.pixelpop-woo-product-filter-content, .ppop-myaccount-secondary' ).css( {
					top: headerheight,
				} );
			}
		} );
	} );
	$( window ).trigger( 'resize' );
} );

//====================================================//
//      Woocommerce Product Share Popup Open          //
//====================================================//

jQuery( document ).ready( function( $ ) {
	$( '.pixelpop-woo-share-popup-open' ).on( 'click', function() {
		$( '.ppop-social-share-popup-wrap' ).toggleClass( 'show' );
	} );
} );

//====================================================//
//      Woocommerce Checkout Coupon Toggle          //
//====================================================//
jQuery( document ).ready( function( $ ) {
	$( '.pixelpop-form-coupon-toggle' ).on( 'click', function() {
		$( '.pixelpop-checkout-coupon-wrap' ).toggleClass( 'show' );
	} );

	$( '.pixelpop-form-coupon-close' ).on( 'click', function() {
		$( '.pixelpop-checkout-coupon-wrap' ).toggleClass( 'show' );
	} );
} );

//====================================================//
//    Woocommerce Checkout Login Form Toggle             //
//====================================================//
jQuery( document ).ready( function( $ ) {
	$( '.ppop-showlogin' ).on( 'click', function() {
		$( '.ppop-woo-login-form-wrap' ).toggleClass( 'show' );
	} );

	$( '.ppop-login-form-close' ).on( 'click', function() {
		$( '.ppop-woo-login-form-wrap' ).toggleClass( 'show' );
	} );
} );

//====================================================//
//         Woocommerce Product Filter Toggle          //
//====================================================//
jQuery( document ).ready( function( $ ) {
	$( '.ppop-product-filter-toggle' ).on( 'click', function() {
		$( '.pixelpop-woo-product-filter-content' ).toggleClass( 'active' );
	} );

	$( '.woo-product-filter-close' ).on( 'click', function() {
		$( '.pixelpop-woo-product-filter-content' ).toggleClass( 'active' );
	} );
} );

//====================================================//
//    Woocommerce Checkout Cart Item Toggle             //
//====================================================//
jQuery( document ).ready( function( $ ) {
	$( '.ppop-checkout-cart-item-toggle' ).on( 'click', function() {
		$(
			'.woocommerce .checkout.woocommerce-checkout .ppop-checkout-cart-items'
		).toggle( 100 );
		$( '.ppop-checkout-cart-item-toggle' ).toggleClass( 'rotate' );
	} );
} );

//====================================================//
//          Woocommerce Sticky Notice                 //
//====================================================//
jQuery( document ).ready( function( $ ) {
	$( '.woocommerce-cart .woocommerce-error' ).append(
		'<i class="ppop-icon ppop-icon-x ppop-notice-toggle"></i>'
	);

	$( '.woocommerce-error .ppop-notice-toggle' ).on( 'click', function() {
		$( this )
			.parents( '.woocommerce-error' )
			.slideToggle( 100 );
	} );

	$( '.woocommerce-cart .woocommerce-info' ).append(
		'<i class="ppop-icon ppop-icon-x ppop-notice-toggle"></i>'
	);

	$( '.woocommerce-info .ppop-notice-toggle' ).on( 'click', function() {
		$( this ).parents( '.woocommerce-info' ).slideToggle( 100 );
	} );

	$( '.woocommerce-cart .woocommerce-message' ).append(
		'<i class="ppop-icon ppop-icon-x ppop-notice-toggle"></i>'
	);

	$( '.woocommerce-message .ppop-notice-toggle' ).on( 'click', function() {
		$( this )
			.parents( '.woocommerce-message' )
			.slideToggle( 100 );
	} );

	$( '.woocommerce.single-product .woocommerce-message' ).append(
		'<i class="ppop-icon ppop-icon-x ppop-notice-toggle"></i>'
	);

	// $( '.woocommerce-message .ppop-notice-toggle' ).on( 'click', function() {
	// 	$( this )
	// 		.parents( '.woocommerce-message' )
	// 		.slideToggle( 100 );
	// } );
} );

jQuery( document ).ready( function( $ ) {
	$( '.woocommerce-checkout .woocommerce-error' ).append(
		'<i class="ppop-icon ppop-icon-x ppop-notice-toggle"></i>'
	);

	$( '.ppop-notice-toggle' ).on( 'click', function() {
		$( this )
			.parents( '.woocommerce-checkout .woocommerce-error' )
			.slideToggle( 100 );
	} );

	$( '.woocommerce-checkout .woocommerce-info' ).append(
		'<i class="ppop-icon ppop-icon-x ppop-notice-toggle"></i>'
	);

	$( '.ppop-notice-toggle' ).on( 'click', function() {
		$( this )
			.parents( '.woocommerce-checkout .woocommerce-info' )
			.slideToggle( 100 );
	} );

	$( '.woocommerce-checkout .woocommerce-message' ).append(
		'<i class="ppop-icon ppop-icon-x ppop-notice-toggle"></i>'
	);

	$( '.ppop-notice-toggle' ).on( 'click', function() {
		$( this )
			.parents( '.woocommerce-checkout .woocommerce-message' )
			.slideToggle( 100 );
	} );
} );

setTimeout( function() {
	jQuery( '.woocommerce-cart .woocommerce-message' ).fadeOut( 'fast' );
	jQuery( '.woocommerce-cart .woocommerce-info' ).fadeOut( 'fast' );
	jQuery( '.woocommerce-cart .woocommerce-error' ).fadeOut( 'fast' );
}, 5000 );
