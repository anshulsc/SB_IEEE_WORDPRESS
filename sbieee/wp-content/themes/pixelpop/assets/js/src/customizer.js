/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {
	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
			$( '.ppop-footer-title span' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
			$( '.footer-site-description' ).text( to );
		} );
	} );

	wp.customize( 'pixelpop_container_width', function( value ) {
		// When the value changes.
		value.bind( function( newval ) {
			// Generate the CSS.
			const cssContent = '.col-full{max-width:' + newval + 'px;}';

			// Check if we already have a <style> in the <head> referencing this control.
			if (
				null === document.getElementById( 'kirki-postmessage-pixelpop_container_width' ) ||
				'undefined' === typeof document.getElementById( 'kirki-postmessage-pixelpop_container_width' )
			) {
				// Append the <style> to the <head>.
				jQuery( 'head' ).append( '<style id="ppop-postmessage-pixelpop_container_width"></style>' );
			}

			// Add the CSS to the <style> and append.
			jQuery( '#ppop-postmessage-pixelpop_container_width' ).text( cssContent );
		} );
	} );

	wp.customize( 'pixelpop_narrow_content_max_width', function( value ) {
		// When the value changes.
		value.bind( function( newval ) {
			// Generate the CSS.
			const cssContent = '.ppop-layout-narrow-content .content-area{max-width:' + newval + 'px;}';

			// Check if we already have a <style> in the <head> referencing this control.
			if (
				null === document.getElementById( 'kirki-postmessage-pixelpop_narrow_content_max_width' ) ||
				'undefined' === typeof document.getElementById( 'kirki-postmessage-pixelpop_narrow_content_max_width' )
			) {
				// Append the <style> to the <head>.
				jQuery( 'head' ).append( '<style id="ppop-postmessage-pixelpop_narrow_content_max_width"></style>' );
			}

			// Add the CSS to the <style> and append.
			jQuery( '#ppop-postmessage-pixelpop_narrow_content_max_width' ).text( cssContent );
		} );
	} );

	wp.customize( 'pixelpop_container_top_bottom_padding_mobile', function( value ) {
		// When the value changes.
		value.bind( function( newval ) {
			// Generate the CSS.
			const cssContent = '@media (max-width: 500px){.site-content{padding:' + newval + 'px 0;}}';

			// Check if we already have a <style> in the <head> referencing this control.
			if (
				null === document.getElementById( 'kirki-postmessage-pixelpop_container_top_bottom_padding_mobile' ) ||
				'undefined' === typeof document.getElementById( 'kirki-postmessage-pixelpop_container_top_bottom_padding_mobile' )
			) {
				// Append the <style> to the <head>.
				jQuery( 'head' ).append( '<style id="ppop-postmessage-pixelpop_container_top_bottom_padding_mobile"></style>' );
			}

			// Add the CSS to the <style> and append.
			jQuery( '#ppop-postmessage-pixelpop_container_top_bottom_padding_mobile' ).text( cssContent );
		} );
	} );

	wp.customize( 'pixelpop_container_let_right_padding_mobile', function( value ) {
		// When the value changes.
		value.bind( function( newval ) {
			// Generate the CSS.
			const cssContent = '@media (max-width: 500px){.col-full{margin: 0 ' + newval + 'px;}}';

			// Check if we already have a <style> in the <head> referencing this control.
			if (
				null === document.getElementById( 'kirki-postmessage-pixelpop_container_let_right_padding_mobile' ) ||
				'undefined' === typeof document.getElementById( 'kirki-postmessage-pixelpop_container_let_right_padding_mobile' )
			) {
				// Append the <style> to the <head>.
				jQuery( 'head' ).append( '<style id="ppop-postmessage-pixelpop_container_let_right_padding_mobile"></style>' );
			}

			// Add the CSS to the <style> and append.
			jQuery( '#ppop-postmessage-pixelpop_container_let_right_padding_mobile' ).text( cssContent );
		} );
	} );

	wp.customize( 'pixelpop_container_top_bottom_padding_tablet', function( value ) {
		// When the value changes.
		value.bind( function( newval ) {
			// Generate the CSS.(max-width: 900px) and (min-width: 768px)
			const cssContent = '@media (max-width: 767px) and (min-width: 500px){.site-content{padding:' + newval + 'px 0;}}';

			// Check if we already have a <style> in the <head> referencing this control.
			if (
				null === document.getElementById( 'kirki-postmessage-pixelpop_container_top_bottom_padding_tablet' ) ||
				'undefined' === typeof document.getElementById( 'kirki-postmessage-pixelpop_container_top_bottom_padding_tablet' )
			) {
				// Append the <style> to the <head>.
				jQuery( 'head' ).append( '<style id="ppop-postmessage-pixelpop_container_top_bottom_padding_tablet"></style>' );
			}

			// Add the CSS to the <style> and append.
			jQuery( '#ppop-postmessage-pixelpop_container_top_bottom_padding_tablet' ).text( cssContent );
		} );
	} );

	wp.customize( 'pixelpop_container_let_right_padding_tablet', function( value ) {
		// When the value changes.
		value.bind( function( newval ) {
			// Generate the CSS.
			const cssContent = '@media (max-width: 767px) and (min-width: 500px){.col-full{margin: 0 ' + newval + 'px;}}';

			// Check if we already have a <style> in the <head> referencing this control.
			if (
				null === document.getElementById( 'kirki-postmessage-pixelpop_container_let_right_padding_tablet' ) ||
				'undefined' === typeof document.getElementById( 'kirki-postmessage-pixelpop_container_let_right_padding_tablet' )
			) {
				// Append the <style> to the <head>.
				jQuery( 'head' ).append( '<style id="ppop-postmessage-pixelpop_container_let_right_padding_tablet"></style>' );
			}

			// Add the CSS to the <style> and append.
			jQuery( '#ppop-postmessage-pixelpop_container_let_right_padding_tablet' ).text( cssContent );
		} );
	} );

	wp.customize( 'pixelpop_container_top_bottom_padding_desktop', function( value ) {
		// When the value changes.
		value.bind( function( newval ) {
			// Generate the CSS.
			const cssContent = '@media (min-width: 768px){.site-content{padding:' + newval + 'px 0;}}';

			// Check if we already have a <style> in the <head> referencing this control.
			if (
				null === document.getElementById( 'kirki-postmessage-pixelpop_container_top_bottom_padding_desktop' ) ||
				'undefined' === typeof document.getElementById( 'kirki-postmessage-pixelpop_container_top_bottom_padding_desktop' )
			) {
				// Append the <style> to the <head>.
				jQuery( 'head' ).append( '<style id="ppop-postmessage-pixelpop_container_top_bottom_padding_desktop"></style>' );
			}

			// Add the CSS to the <style> and append.
			jQuery( '#ppop-postmessage-pixelpop_container_top_bottom_padding_desktop' ).text( cssContent );
		} );
	} );

	wp.customize( 'pixelpop_container_let_right_padding_desktop', function( value ) {
		// When the value changes.
		value.bind( function( newval ) {
			// Generate the CSS.
			const cssContent = '@media (min-width: 768px){.col-full{padding: 0 ' + newval + 'px;}}';

			// Check if we already have a <style> in the <head> referencing this control.
			if (
				null === document.getElementById( 'kirki-postmessage-pixelpop_container_let_right_padding_desktop' ) ||
				'undefined' === typeof document.getElementById( 'kirki-postmessage-pixelpop_container_let_right_padding_desktop' )
			) {
				// Append the <style> to the <head>.
				jQuery( 'head' ).append( '<style id="ppop-postmessage-pixelpop_container_let_right_padding_desktop"></style>' );
			}

			// Add the CSS to the <style> and append.
			jQuery( '#ppop-postmessage-pixelpop_container_let_right_padding_desktop' ).text( cssContent );
		} );
	} );

	wp.customize( 'pixelpop_mobile_logo_height', function( value ) {
		// When the value changes.
		value.bind( function( newval ) {
			// Generate the CSS.
			const cssContent = '@media (max-width: 767px){.ppop-header-logo img, .ppop-header-logo.svg-logo a svg, .ppop-mobile-header-logo img, .ppop-transparent-header-logo img{height: ' + newval + 'px;}}';

			// Check if we already have a <style> in the <head> referencing this control.
			if (
				null === document.getElementById( 'kirki-postmessage-pixelpop_mobile_logo_height' ) ||
				'undefined' === typeof document.getElementById( 'kirki-postmessage-pixelpop_mobile_logo_height' )
			) {
				// Append the <style> to the <head>.
				jQuery( 'head' ).append( '<style id="ppop-postmessage-pixelpop_mobile_logo_height"></style>' );
			}

			// Add the CSS to the <style> and append.
			jQuery( '#ppop-postmessage-pixelpop_mobile_logo_height' ).text( cssContent );
		} );
	} );

	wp.customize( 'pixelpop_logo_height', function( value ) {
		// When the value changes.
		value.bind( function( newval ) {
			// Generate the CSS.
			const cssContent = '@media (min-width: 768px){.ppop-header-logo img, .ppop-header-logo.svg-logo a svg, .ppop-mobile-header-logo img, .ppop-transparent-header-logo img{height: ' + newval + 'px;}}';

			// Check if we already have a <style> in the <head> referencing this control.
			if (
				null === document.getElementById( 'kirki-postmessage-pixelpop_logo_height' ) ||
				'undefined' === typeof document.getElementById( 'kirki-postmessage-pixelpop_logo_height' )
			) {
				// Append the <style> to the <head>.
				jQuery( 'head' ).append( '<style id="ppop-postmessage-pixelpop_logo_height"></style>' );
			}

			// Add the CSS to the <style> and append.
			jQuery( '#ppop-postmessage-pixelpop_logo_height' ).text( cssContent );
		} );
	} );

	wp.customize( 'pixelpop_footer_logo_width', function( value ) {
		// When the value changes.
		value.bind( function( newval ) {
			// Generate the CSS.
			const cssContent = '.ppop-footer-logo img{width: ' + newval + 'px;}';

			// Check if we already have a <style> in the <head> referencing this control.
			if (
				null === document.getElementById( 'kirki-postmessage-pixelpop_footer_logo_width' ) ||
				'undefined' === typeof document.getElementById( 'kirki-postmessage-pixelpop_footer_logo_width' )
			) {
				// Append the <style> to the <head>.
				jQuery( 'head' ).append( '<style id="ppop-postmessage-pixelpop_footer_logo_width"></style>' );
			}

			// Add the CSS to the <style> and append.
			jQuery( '#ppop-postmessage-pixelpop_footer_logo_width' ).text( cssContent );
		} );
	} );

	wp.customize( 'pixelpop_primary_header_layout', function( value ) {
		// When the value changes.
		value.bind( function( newval ) {
			// Generate the CSS.
			const cssClassPreview = 'preview-primary-layout-' + newval + '';

			if ( newval === 'left' ) {
				jQuery( '.site-header' ).removeClass( 'primary-layout-left' );
				jQuery( '.site-header' ).removeClass( 'primary-layout-right' );
				jQuery( '.site-header' ).removeClass( 'primary-layout-center' );
				jQuery( '.site-header' ).removeClass( 'preview-primary-layout-right' );
				jQuery( '.site-header' ).removeClass( 'preview-primary-layout-center' );
				jQuery( '.site-header' ).addClass( cssClassPreview );
			} else if ( newval === 'center' ) {
				jQuery( '.site-header' ).removeClass( 'primary-layout-left' );
				jQuery( '.site-header' ).removeClass( 'primary-layout-right' );
				jQuery( '.site-header' ).removeClass( 'primary-layout-center' );
				jQuery( '.site-header' ).removeClass( 'preview-primary-layout-left' );
				jQuery( '.site-header' ).removeClass( 'preview-primary-layout-right' );
				jQuery( '.site-header' ).addClass( cssClassPreview );
			} else if ( newval === 'right' ) {
				jQuery( '.site-header' ).removeClass( 'primary-layout-left' );
				jQuery( '.site-header' ).removeClass( 'primary-layout-right' );
				jQuery( '.site-header' ).removeClass( 'primary-layout-center' );
				jQuery( '.site-header' ).removeClass( 'preview-primary-layout-left' );
				jQuery( '.site-header' ).removeClass( 'preview-primary-layout-center' );
				jQuery( '.site-header' ).addClass( cssClassPreview );
			}
		} );
	} );

	wp.customize( 'pixelpop_blog_archive_layout', function( value ) {
		// When the value changes.
		value.bind( function( newval ) {
			// Generate the CSS.
			const cssClass = 'layout-' + newval + '';

			if ( newval === 'grid' ) {
				jQuery( '.ppop-post-archive-wrap' ).removeClass( 'layout-full-width' );
				jQuery( '.ppop-post-archive-wrap' ).removeClass( 'layout-list' );
				jQuery( '.ppop-post-archive-wrap' ).addClass( cssClass );
			} else if ( newval === 'list' ) {
				jQuery( '.ppop-post-archive-wrap' ).removeClass( 'layout-full-width' );
				jQuery( '.ppop-post-archive-wrap' ).removeClass( 'layout-grid' );
				jQuery( '.ppop-post-archive-wrap' ).addClass( cssClass );
			} else if ( newval === 'full-width' ) {
				jQuery( '.ppop-post-archive-wrap' ).removeClass( 'layout-grid' );
				jQuery( '.ppop-post-archive-wrap' ).removeClass( 'layout-list' );
				jQuery( '.ppop-post-archive-wrap' ).addClass( cssClass );
			}
		} );
	} );

	wp.customize( 'zeethem_blog_grid_column', function( value ) {
		// When the value changes.
		value.bind( function( newval ) {
			// Generate the CSS.
			const cssClass = 'col-' + newval + '';

			if ( newval === '1' ) {
				jQuery( '.ppop-post-archive-wrap' ).removeClass( 'col-2' );
				jQuery( '.ppop-post-archive-wrap' ).removeClass( 'col-3' );
				jQuery( '.ppop-post-archive-wrap' ).removeClass( 'col-4' );
				jQuery( '.ppop-post-archive-wrap' ).addClass( cssClass );
			} else if ( newval === '2' ) {
				jQuery( '.ppop-post-archive-wrap' ).removeClass( 'col-1' );
				jQuery( '.ppop-post-archive-wrap' ).removeClass( 'col-3' );
				jQuery( '.ppop-post-archive-wrap' ).removeClass( 'col-4' );
				jQuery( '.ppop-post-archive-wrap' ).addClass( cssClass );
			} else if ( newval === '3' ) {
				jQuery( '.ppop-post-archive-wrap' ).removeClass( 'col-1' );
				jQuery( '.ppop-post-archive-wrap' ).removeClass( 'col-2' );
				jQuery( '.ppop-post-archive-wrap' ).removeClass( 'col-4' );
				jQuery( '.ppop-post-archive-wrap' ).addClass( cssClass );
			} else if ( newval === '4' ) {
				jQuery( '.ppop-post-archive-wrap' ).removeClass( 'col-1' );
				jQuery( '.ppop-post-archive-wrap' ).removeClass( 'col-2' );
				jQuery( '.ppop-post-archive-wrap' ).removeClass( 'col-3' );
				jQuery( '.ppop-post-archive-wrap' ).addClass( cssClass );
			}
		} );
	} );

	wp.customize( 'zeethem_blog_grid_fluid_toggle', function( value ) {
		// When the value changes.
		value.bind( function( newval ) {
			// Generate the CSS.
			const cssClass = 'fluid';
			if ( newval === true ) {
				jQuery( '.ppop-post-archive-wrap' ).addClass( cssClass );
			} else {
				jQuery( '.ppop-post-archive-wrap' ).removeClass( cssClass );
			}
		} );
	} );

	wp.customize( 'pixelpop_single_blog_featured_image_layout', function( value ) {
		// When the value changes.
		value.bind( function( newval ) {
			// Generate the CSS.
			const cssClass = 'blog-image-' + newval + '';

			if ( newval === 'full-width' ) {
				jQuery( '.single-post' ).removeClass( 'blog-image-contained' );
				jQuery( '.single-post' ).addClass( cssClass );
			} else if ( newval === 'contained' ) {
				jQuery( '.single-post' ).removeClass( 'blog-image-full-width' );
				jQuery( '.single-post' ).addClass( cssClass );
			}
		} );
	} );

	wp.customize( 'pixelpop_page_featured_image_layout', function( value ) {
		// When the value changes.
		value.bind( function( newval ) {
			// Generate the CSS.
			const cssClass = 'page-image-' + newval + '';

			if ( newval === 'full-width' ) {
				jQuery( '.page' ).removeClass( 'page-image-contained' );
				jQuery( '.page' ).addClass( cssClass );
			} else if ( newval === 'contained' ) {
				jQuery( '.page' ).removeClass( 'page-image-full-width' );
				jQuery( '.page' ).addClass( cssClass );
			}
		} );
	} );

	wp.customize( 'pixelpop_single_post_narrow_content', function( value ) {
		// When the value changes.
		value.bind( function( newval ) {
			// Generate the CSS.
			const cssClass = 'ppop-layout-narrow-content';

			if ( newval === true ) {
				jQuery( '.single-post' ).addClass( cssClass );
			} else if ( newval === false ) {
				jQuery( '.single-post' ).removeClass( cssClass );
			}
		} );
	} );

	wp.customize( 'pixelpop_page_narrow_content', function( value ) {
		// When the value changes.
		value.bind( function( newval ) {
			// Generate the CSS.
			const cssClass = 'ppop-layout-narrow-content';

			if ( newval === true ) {
				jQuery( '.page' ).addClass( cssClass );
			} else if ( newval === false ) {
				jQuery( '.page' ).removeClass( cssClass );
			}
		} );
	} );

	// Header text color.
	// wp.customize( 'header_textcolor', function( value ) {
	// 	value.bind( function( to ) {
	// 		if ( 'blank' === to ) {
	// 			$( '.site-title, .site-description' ).css( {
	// 				clip: 'rect(1px, 1px, 1px, 1px)',
	// 				position: 'absolute',
	// 			} );
	// 		} else {
	// 			$( '.site-title, .site-description' ).css( {
	// 				clip: 'auto',
	// 				position: 'relative',
	// 			} );
	// 			$( '.site-title a, .site-description' ).css( {
	// 				color: to,
	// 			} );
	// 		}
	// 	} );
	// } );
}( jQuery ) );
