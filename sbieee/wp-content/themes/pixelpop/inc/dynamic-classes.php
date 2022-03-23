<?php
/**
 * Dynamic CSS Classes for the theme.
 *
 * @package pixelpop
 */

namespace PixelPop;

use function PixelPop\pixelpop;
use function add_action;
use function add_filter;

defined( 'ABSPATH' ) || exit;

/**
 * Get header classes
 *
 * @param string $class element classes.
 * @since 1.0.0
 */
function get_ppop_header_class( $class = '' ) {

	$classes = array();

	$classes[] = 'z-bg-layout-primary z-mar-0 z-pad-0 z-top-0 z-start-0 z-border-b z-position-relative';

	if ( is_singular() ) {
		if ( get_post_meta( get_the_ID(), 'pixelpop_transparent_header_metabox', true ) === 'enabled' ) {
			$classes[] = 'transparent-header';
		}
	}

	if ( true === get_theme_mod( 'sticky_mobile_header_toggle', true ) ) {
		$classes[] = 'mobile-sticky';
	}

	if ( 'left' === get_theme_mod( 'pixelpop_primary_header_layout', 'left' ) ) {
		$classes[] = 'primary-layout-left';
	} elseif ( 'center' === get_theme_mod( 'pixelpop_primary_header_layout', 'left' ) ) {
		$classes[] = 'primary-layout-center';
	} elseif ( 'right' === get_theme_mod( 'pixelpop_primary_header_layout', 'left' ) ) {
		$classes[] = 'primary-layout-right';
	}

	if ( ! empty( $class ) ) {
		if ( ! is_array( $class ) ) {
			$class = preg_split( '#\s+#', $class );
		}
		$classes = array_merge( $classes, $class );
	} else {
		// Ensure that we always coerce class to being an array.
		$class = array();
	}

	$classes = array_map( 'esc_attr', $classes );

	/**
	 * Filters the list of CSS class names.
	 *
	 * @since 2.8.0
	 *
	 * @param string[] $classes An array of class names.
	 * @param string[] $class   An array of additional class names added to the element.
	 */
	$classes = apply_filters( 'pixelpop_header_class', $classes, $class );

	return array_unique( $classes );
}

/**
 * Header Classes
 *
 * @param string $class element classes.
 * @since 1.0.0
 */
function pixelpop_header_class( $class = '' ) {
	// Separates class names with a single space, collates class names for the element.
	echo esc_attr( implode( ' ', get_ppop_header_class( $class ) ) );
}

/**
 * Get branding classes
 *
 * @param string $class element classes.
 * @since 1.0.0
 */
function get_ppop_header_branding_class( $class = '' ) {

	$classes = array();

	$branding_classes                 = '';
	$branding_main_layout             = '';
	$branding_title                   = '';
	$branding_mobile_title            = '';
	$branding_tagline                 = '';
	$branding_mobile_tagline          = '';
	$branding_main_logo               = '';
	$branding_logo                    = '';
	$branding_transparent_logo        = '';
	$branding_mobile_logo             = '';
	$branding_layout                  = '';
	$branding_centered                = '';
	$branding_mobile_logo             = '';
	$branding_transparent_header      = 'transparent-header-inactive';
	$branding_transparent_header_logo = '';

	if ( has_custom_logo() ) {
		$branding_main_logo = 'main-logo-active';
	} else {
		$branding_main_logo = 'main-logo-inactive';
	}

	if ( 'only-info' === get_theme_mod( 'pixelpop_header_branding_layout', 'logo-and-info' ) ) {
		$branding_logo = 'hide-logo';
	} else {
		$branding_logo = 'show-logo';
	}

	$branding_main_layout = 'main-layout-' . get_theme_mod( 'pixelpop_header_branding_layout', 'logo-and-info' ) . '';

	if ( 'only-logo' === get_theme_mod( 'pixelpop_header_branding_layout', 'logo-and-info' ) ) {
		$branding_title = 'hide-title';
	} elseif ( 'logo-and-info' === get_theme_mod( 'pixelpop_header_branding_layout', 'logo-and-info' ) || 'only-info' === get_theme_mod( 'pixelpop_header_branding_layout', 'logo-and-info' ) ) {
		if ( true === get_theme_mod( 'pixelpop_hide_title', false ) ) {
			$branding_title = 'hide-title';
		} else {
			$branding_title = 'show-title';
		}
	} else {
		$branding_title = 'show-title';
	}

	if ( 'only-logo' === get_theme_mod( 'pixelpop_header_branding_layout', 'logo-and-info' ) ) {
		$branding_tagline = 'hide-tagline';
	} elseif ( 'logo-and-info' === get_theme_mod( 'pixelpop_header_branding_layout', 'logo-and-info' ) || 'only-info' === get_theme_mod( 'pixelpop_header_branding_layout', 'logo-and-info' ) ) {
		if ( true === get_theme_mod( 'pixelpop_hide_tagline', true ) ) {
			$branding_tagline = 'hide-tagline';
		} else {
			$branding_tagline = 'show-tagline';
		}
	} else {
		$branding_tagline = 'show-tagline';
	}

	if ( 'logo-and-info' === get_theme_mod( 'pixelpop_header_branding_layout', 'logo-and-info' ) ) {
		if ( 'inline' === get_theme_mod( 'pixelpop_header_branding_logo_layout', 'inline' ) ) {
			$branding_layout = 'inline-layout';
		} elseif ( 'stacked' === get_theme_mod( 'pixelpop_header_branding_logo_layout', 'inline' ) ) {
			$branding_layout = 'stacked-layout';
		}
	}

	$branding_inline_alignment       = get_theme_mod( 'pixelpop_header_branding_inline_logo_align', 'left' );
	$branding_inline_alignment_class = '';
	$branding_stacked_alignment       = get_theme_mod( 'pixelpop_header_branding_stacked_logo_align', 'left' );
	$branding_stacked_alignment_class = '';
	$branding_info_alignment       = get_theme_mod( 'pixelpop_header_branding_info_align', 'left' );
	$branding_info_alignment_class = '';

	if ( 'logo-and-info' === get_theme_mod( 'pixelpop_header_branding_layout', 'logo-and-info' ) ) {
		if ( 'inline' === get_theme_mod( 'pixelpop_header_branding_logo_layout', 'inline' ) ) {
			$branding_inline_alignment_class = 'inline-align-' . $branding_inline_alignment . '';
		} elseif ( 'stacked' === get_theme_mod( 'pixelpop_header_branding_logo_layout', 'inline' ) ) {
			$branding_stacked_alignment_class = 'stacked-align-' . $branding_stacked_alignment . '';
		}
	}

	if ( 'only-info' === get_theme_mod( 'pixelpop_header_branding_layout', 'logo-and-info' ) ) {
		$branding_info_alignment_class = 'info-align-' . $branding_info_alignment . '';
	}

	// if ( true === get_theme_mod( 'pixelpop_centered_style', true ) ) {
	// 	$branding_centered = 'centered';
	// } else {
	// 	$branding_centered = 'not-centered';
	// }

	if ( true === get_theme_mod( 'pixelpop_mobile_hide_title', false ) ) {
		$branding_mobile_title = 'mobile-hide-title';
	} else {
		$branding_mobile_title = 'mobile-show-title';
	}

	if ( true === get_theme_mod( 'pixelpop_mobile_hide_tagline', true ) ) {
		$branding_mobile_tagline = 'mobile-hide-tagline';
	} else {
		$branding_mobile_tagline = 'mobile-show-tagline';
	}

	if ( '' !== get_theme_mod( 'pixelpop_mobile_logo', '' ) ) {
		$branding_mobile_logo = 'mobile-logo-active';
	} else {
		$branding_mobile_logo = 'mobile-logo-inactive';
	}

	if ( is_singular() ) {
		if ( get_post_meta( get_the_ID(), 'pixelpop_transparent_header_metabox', true ) === 'enabled' ) {
			$branding_transparent_header = 'transparent-header-active';
		} else {
			$branding_transparent_header = 'transparent-header-inactive';
		}


		if ( '' !== get_theme_mod( 'pixelpop_transparent_header_logo', '' ) ) {
			$branding_transparent_header_logo = 'transparent-header-logo-active';
		} else {
			$branding_transparent_header_logo = 'transparent-header-logo-inactive';
		}
	}

	$classes[] = '';

	$classes[] = $branding_main_layout;
	$classes[] = $branding_title;
	$classes[] = $branding_mobile_title;
	$classes[] = $branding_tagline;
	$classes[] = $branding_mobile_tagline;
	$classes[] = $branding_logo;
	$classes[] = $branding_transparent_logo;
	$classes[] = $branding_mobile_logo;
	$classes[] = $branding_layout;
	$classes[] = $branding_inline_alignment_class;
	$classes[] = $branding_stacked_alignment_class;
	$classes[] = $branding_info_alignment_class;
	$classes[] = $branding_mobile_logo;
	$classes[] = $branding_transparent_header;
	$classes[] = $branding_transparent_header_logo;
	$classes[] = $branding_main_logo;

	if ( ! empty( $class ) ) {
		if ( ! is_array( $class ) ) {
			$class = preg_split( '#\s+#', $class );
		}
		$classes = array_merge( $classes, $class );
	} else {
		// Ensure that we always coerce class to being an array.
		$class = array();
	}

	$classes = array_map( 'esc_attr', $classes );

	/**
	 * Filters the list of CSS class names.
	 *
	 * @since 2.8.0
	 *
	 * @param string[] $classes An array of class names.
	 * @param string[] $class   An array of additional class names added to the element.
	 */
	$classes = apply_filters( 'pixelpop_header_branding_class', $classes, $class );

	return array_unique( $classes );
}

/**
 * Branding Classes
 *
 * @param string $class element classes.
 * @since 1.0.0
 */
function pixelpop_header_branding_class( $class = '' ) {
	// Separates class names with a single space, collates class names for the element.
	echo esc_attr( implode( ' ', get_ppop_header_branding_class( $class ) ) );
}

/**
 * Get header below content classes
 *
 * @param string $class element classes.
 * @since 1.0.0
 */
function get_ppop_header_below_content_class( $class = '' ) {

	$classes = array();

	$mobile_header_sticky = '';

	if ( true === get_theme_mod( 'sticky_mobile_header_toggle', true ) ) {
		$mobile_header_sticky = 'mobile-sticky-header';
	} else {
		$mobile_header_sticky = '';
	}

	$classes[] = $mobile_header_sticky;

	if ( ! empty( $class ) ) {
		if ( ! is_array( $class ) ) {
			$class = preg_split( '#\s+#', $class );
		}
		$classes = array_merge( $classes, $class );
	} else {
		// Ensure that we always coerce class to being an array.
		$class = array();
	}

	$classes = array_map( 'esc_attr', $classes );

	/**
	 * Filters the list of CSS class names.
	 *
	 * @since 2.8.0
	 *
	 * @param string[] $classes An array of class names.
	 * @param string[] $class   An array of additional class names added to the element.
	 */
	$classes = apply_filters( 'pixelpop_header_below_content_class', $classes, $class );

	return array_unique( $classes );
}

/**
 * Header below content Classes
 *
 * @param string $class element classes.
 * @since 1.0.0
 */
function pixelpop_header_below_content_class( $class = '' ) {
	// Separates class names with a single space, collates class names for the element.
	echo esc_attr( implode( ' ', get_ppop_header_below_content_class( $class ) ) );
}

/**
 * Get Blog Archive Wrap Classes
 *
 * @param string $class element classes.
 * @since 1.0.0
 */
function get_ppop_blog_archive_wrap_class( $class = '' ) {

	$classes = array();

	$archive_layout             = '';
	$archive_grid_column_number = get_theme_mod( 'zeethem_blog_grid_column', '3' );
	$archive_grid_column        = 'col-' . $archive_grid_column_number . ' ';
	$archive_grid_fluid         = '';

	if ( 'grid' === get_theme_mod( 'pixelpop_blog_archive_layout', 'grid' ) ) {
		$classes[]      = $archive_grid_column;
		$archive_layout = 'layout-grid ';
	} elseif ( 'list' === get_theme_mod( 'pixelpop_blog_archive_layout', 'grid' ) ) {
		$archive_layout = 'layout-list ';
	} elseif ( 'full-width' === get_theme_mod( 'pixelpop_blog_archive_layout', 'grid' ) ) {
		$archive_layout = 'layout-full-width ';
	}

	if ( true === get_theme_mod( 'zeethem_blog_grid_fluid_toggle', false ) ) {
		$archive_grid_fluid = 'fluid ';
	}

	if ( 'grid' === get_theme_mod( 'pixelpop_blog_archive_layout', 'grid' ) ) {
		$classes[] = $archive_grid_column;
	}

	$classes[] = $archive_layout;
	$classes[] = $archive_grid_fluid;

	if ( ! empty( $class ) ) {
		if ( ! is_array( $class ) ) {
			$class = preg_split( '#\s+#', $class );
		}
		$classes = array_merge( $classes, $class );
	} else {
		// Ensure that we always coerce class to being an array.
		$class = array();
	}

	$classes = array_map( 'esc_attr', $classes );

	/**
	 * Filters the list of CSS class names.
	 *
	 * @since 2.8.0
	 *
	 * @param string[] $classes An array of class names.
	 * @param string[] $class   An array of additional class names added to the element.
	 */
	$classes = apply_filters( 'pixelpop_blog_archive_wrap_class', $classes, $class );

	return array_unique( $classes );
}

/**
 * Blog Archive Wrap Classes
 *
 * @param string $class element classes.
 * @since 1.0.0
 */
function pixelpop_blog_archive_wrap_class( $class = '' ) {
	// Separates class names with a single space, collates class names for the element.
	echo esc_attr( implode( ' ', get_ppop_blog_archive_wrap_class( $class ) ) );
}

/**
 * Get Single Blog Wrap Classes
 *
 * @param string $class element classes.
 * @since 1.0.0
 */
function get_ppop_single_blog_wrap_class( $class = '' ) {

	$classes = array();

	if ( get_post_meta( get_the_ID(), 'pixelpop_featured_image_metabox', true ) === 'full-width' || get_post_meta( get_the_ID(), 'pixelpop_featured_image_metabox', true ) === 'contained' ) {
		$featured_image_layout_class = get_post_meta( get_the_ID(), 'pixelpop_featured_image_metabox', true );
	} else {
		$featured_image_layout_class = get_theme_mod( 'pixelpop_single_blog_featured_image_layout', 'full-width' );
	}
	$featured_image_layout       = 'featured-image-' . $featured_image_layout_class . ' ';
	$classes[]                   = $featured_image_layout;

	if ( ! empty( $class ) ) {
		if ( ! is_array( $class ) ) {
			$class = preg_split( '#\s+#', $class );
		}
		$classes = array_merge( $classes, $class );
	} else {
		// Ensure that we always coerce class to being an array.
		$class = array();
	}

	$classes = array_map( 'esc_attr', $classes );

	/**
	 * Filters the list of CSS class names.
	 *
	 * @since 2.8.0
	 *
	 * @param string[] $classes An array of class names.
	 * @param string[] $class   An array of additional class names added to the element.
	 */
	$classes = apply_filters( 'pixelpop_single_blog_wrap_class', $classes, $class );

	return array_unique( $classes );
}

/**
 * Single Blog Wrap Classes
 *
 * @param string $class element classes.
 * @since 1.0.0
 */
function pixelpop_single_blog_wrap_class( $class = '' ) {
	// Separates class names with a single space, collates class names for the element.
	echo esc_attr( implode( ' ', get_ppop_single_blog_wrap_class( $class ) ) );
}

/**
 * Get footer classes
 *
 * @param string $class element classes.
 * @since 1.0.0
 */
function get_ppop_footer_class( $class = '' ) {

	$classes = array();

	if ( ! empty( $class ) ) {
		if ( ! is_array( $class ) ) {
			$class = preg_split( '#\s+#', $class );
		}
		$classes = array_merge( $classes, $class );
	} else {
		// Ensure that we always coerce class to being an array.
		$class = array();
	}

	$classes = array_map( 'esc_attr', $classes );

	/**
	 * Filters the list of CSS class names.
	 *
	 * @since 2.8.0
	 *
	 * @param string[] $classes An array of class names.
	 * @param string[] $class   An array of additional class names added to the element.
	 */
	$classes = apply_filters( 'ppop_header_class', $classes, $class );

	return array_unique( $classes );
}

/**
 * Footer Classes
 *
 * @param string $class element classes.
 * @since 1.0.0
 */
function pixelpop_footer_classes( $class = '' ) {
	// Separates class names with a single space, collates class names for the element.
	echo esc_attr( implode( ' ', get_ppop_footer_class( $class ) ) );
}

/**
 * Get footer widget classes
 *
 * @param string $class element classes.
 * @since 1.0.0
 */
function get_ppop_footer_widgit_column_class( $class = '' ) {

	$classes = array();

	if ( true === get_theme_mod( 'pixelpop_footer_widgets_toggle', true ) ) {
		$col       = get_theme_mod( 'pixelpop_footer_widgets_column', '4' );
		$classes[] = 'z-grid-col-' . $col . '';
	}

	if ( ! empty( $class ) ) {
		if ( ! is_array( $class ) ) {
			$class = preg_split( '#\s+#', $class );
		}
		$classes = array_merge( $classes, $class );
	} else {
		// Ensure that we always coerce class to being an array.
		$class = array();
	}

	$classes = array_map( 'esc_attr', $classes );

	/**
	 * Filters the list of CSS class names.
	 *
	 * @since 2.8.0
	 *
	 * @param string[] $classes An array of class names.
	 * @param string[] $class   An array of additional class names added to the element.
	 */
	$classes = apply_filters( 'pixelpop_footer_widgit_column_class', $classes, $class );

	return array_unique( $classes );
}

/**
 * Footer widget classes
 *
 * @param string $class element classes.
 * @since 1.0.0
 */
function pixelpop_footer_widgit_column_class( $class = '' ) {
	// Separates class names with a single space, collates class names for the element.
	echo esc_attr( implode( ' ', get_ppop_footer_widgit_column_class( $class ) ) );
}

/**
 * Get footer info classes
 *
 * @param string $class element classes.
 * @since 1.0.0
 */
function get_ppop_footer_info_class( $class = '' ) {

	$classes = array();

	if ( true === get_theme_mod( 'pixelpop_footer_social_icons_toggle', true ) ) {
		if ( 'footer-info' === get_theme_mod( 'pixelpop_footer_social_icons_location', 'footer-branding' ) ) {
			$classes[] = 'has-social-icons';
			$classes[] = 'two-column';
		}

		if ( 'left' === get_theme_mod( 'pixelpop_footer_social_icons_position', 'right' ) ) {
			$classes[] = 'social-icons-left';
		} elseif ( 'right' === get_theme_mod( 'pixelpop_footer_social_icons_position', 'right' ) ) {
			$classes[] = 'social-icons-right';
		}
	}

	if ( ! empty( $class ) ) {
		if ( ! is_array( $class ) ) {
			$class = preg_split( '#\s+#', $class );
		}
		$classes = array_merge( $classes, $class );
	} else {
		// Ensure that we always coerce class to being an array.
		$class = array();
	}

	$classes = array_map( 'esc_attr', $classes );

	/**
	 * Filters the list of CSS class names.
	 *
	 * @since 2.8.0
	 *
	 * @param string[] $classes An array of class names.
	 * @param string[] $class   An array of additional class names added to the element.
	 */
	$classes = apply_filters( 'pixelpop_footer_info_class', $classes, $class );

	return array_unique( $classes );
}

/**
 * Footer info classes
 *
 * @param string $class element classes.
 * @since 1.0.0
 */
function pixelpop_footer_info_class( $class = '' ) {
	// Separates class names with a single space, collates class names for the element.
	echo esc_attr( implode( ' ', get_ppop_footer_info_class( $class ) ) );
}

/**
 * Get Container classes
 *
 * @param string $class element classes.
 * @since 1.0.0
 */
function get_ppop_container_class( $class = '' ) {

	$classes = array();

	$container_classes = 'sidebar-none';

	if ( is_home() || is_front_page() || ( is_archive() && 'post' === get_post_type() ) ) {
		if ( 'left' === get_theme_mod( 'pixelpop_blog_archive_sidebar_layout', 'none' ) ) {
			$container_classes = 'sidebar-left';
		} elseif ( 'right' === get_theme_mod( 'pixelpop_blog_archive_sidebar_layout', 'none' ) ) {
			$container_classes = 'sidebar-right';
		} elseif ( 'none' === get_theme_mod( 'pixelpop_blog_archive_sidebar_layout', 'none' ) ) {
			$container_classes = 'sidebar-none';
		}
	}

	if ( is_singular() ) {

		if ( get_post_meta( get_the_ID(), 'pixelpop_sidebar_layout_metabox', true ) === 'left' ) {
			$container_classes = 'sidebar-left';
		} elseif ( get_post_meta( get_the_ID(), 'pixelpop_sidebar_layout_metabox', true ) === 'right' ) {
			$container_classes = 'sidebar-right';
		} elseif ( get_post_meta( get_the_ID(), 'pixelpop_sidebar_layout_metabox', true ) === 'none' ) {
			$container_classes = 'sidebar-none';
		} else {
			$container_classes = 'sidebar-none';

			if ( is_singular( 'post' ) ) {
				if ( 'left' === get_theme_mod( 'pixelpop_single_blog_sidebar_layout', 'none' ) ) {
					$container_classes = 'sidebar-left';
				} elseif ( 'right' === get_theme_mod( 'pixelpop_single_blog_sidebar_layout', 'none' ) ) {
					$container_classes = 'sidebar-right';
				} elseif ( 'none' === get_theme_mod( 'pixelpop_single_blog_sidebar_layout', 'none' ) ) {
					$container_classes = 'sidebar-none';
				}
			}

			if ( is_singular( 'page' ) ) {
				if ( 'left' === get_theme_mod( 'pixelpop_page_sidebar_layout', 'none' ) ) {
					$container_classes = 'sidebar-left';
				} elseif ( 'right' === get_theme_mod( 'pixelpop_page_sidebar_layout', 'none' ) ) {
					$container_classes = 'sidebar-right';
				} elseif ( 'none' === get_theme_mod( 'pixelpop_page_sidebar_layout', 'none' ) ) {
					$container_classes = 'sidebar-none';
				}
			}
		}
	}

	$classes[] = $container_classes;

	if ( ! empty( $class ) ) {
		if ( ! is_array( $class ) ) {
			$class = preg_split( '#\s+#', $class );
		}
		$classes = array_merge( $classes, $class );
	} else {
		// Ensure that we always coerce class to being an array.
		$class = array();
	}

	$classes = array_map( 'esc_attr', $classes );

	/**
	 * Filters the list of CSS class names.
	 *
	 * @since 2.8.0
	 *
	 * @param string[] $classes An array of class names.
	 * @param string[] $class   An array of additional class names added to the element.
	 */
	$classes = apply_filters( 'pixelpop_container_class', $classes, $class );

	return array_unique( $classes );
}

/**
 * Container classes
 *
 * @param string $class element classes.
 * @since 1.0.0
 */
function pixelpop_container_class( $class = '' ) {
	// Separates class names with a single space, collates class names for the element.
	echo esc_attr( implode( ' ', get_ppop_container_class( $class ) ) );
}

/**
 * Single Layout Body Classes
 *
 * @param string $classes element classes.
 * @since 1.0.0
 */
function pixelpop_single_layout_body_class( $classes ) {

	$featured_image_layout = '';
	$conent_layout         = '';
	$sidebar_layout        = '';

	if ( is_singular( 'post' ) ) {

		if ( get_post_meta( get_the_ID(), 'pixelpop_featured_image_metabox', true ) === 'full-width' || get_post_meta( get_the_ID(), 'pixelpop_featured_image_metabox', true ) === 'contained' ) {
			$post_featured_image_layout_class = get_post_meta( get_the_ID(), 'pixelpop_featured_image_metabox', true );
		} else {
			$post_featured_image_layout_class = get_theme_mod( 'pixelpop_single_blog_featured_image_layout', 'full-width' );
		}
		$featured_image_layout = 'blog-image-' . $post_featured_image_layout_class . ' ';

		if ( true === get_theme_mod( 'pixelpop_single_post_narrow_content', true ) ) {
			$conent_layout = 'ppop-layout-narrow-content ';
		}

		if ( get_post_meta( get_the_ID(), 'pixelpop_sidebar_layout_metabox', true ) === 'left' ) {
			$sidebar_layout = 'sidebar-layout-left ';
		} elseif ( get_post_meta( get_the_ID(), 'pixelpop_sidebar_layout_metabox', true ) === 'right' ) {
			$sidebar_layout = 'sidebar-layout-right ';
		} elseif ( get_post_meta( get_the_ID(), 'pixelpop_sidebar_layout_metabox', true ) === 'none' ) {
			$sidebar_layout = 'sidebar-layout-none ';
		} else {
			$sidebar_layout = 'sidebar-layout-none ';

			if ( 'left' === get_theme_mod( 'pixelpop_single_blog_sidebar_layout', 'none' ) ) {
				$sidebar_layout = 'sidebar-layout-left ';
			} elseif ( 'right' === get_theme_mod( 'pixelpop_single_blog_sidebar_layout', 'none' ) ) {
				$sidebar_layout = 'sidebar-layout-right ';
			} elseif ( 'none' === get_theme_mod( 'pixelpop_single_blog_sidebar_layout', 'none' ) ) {
				$sidebar_layout = 'sidebar-layout-none ';
			} else {
				$sidebar_layout = 'sidebar-layout-none ';
			}
		}
	}

	if ( is_singular( 'page' ) ) {

		if ( get_post_meta( get_the_ID(), 'pixelpop_featured_image_metabox', true ) === 'full-width' || get_post_meta( get_the_ID(), 'pixelpop_featured_image_metabox', true ) === 'contained' ) {
			$page_featured_image_layout_class = get_post_meta( get_the_ID(), 'pixelpop_featured_image_metabox', true );
		} else {
			$page_featured_image_layout_class = get_theme_mod( 'pixelpop_page_featured_image_layout', 'full-width' );
		}

		$featured_image_layout = 'page-image-' . $page_featured_image_layout_class . ' ';

		if ( true === get_theme_mod( 'pixelpop_page_narrow_content', false ) ) {
			$conent_layout = 'ppop-layout-narrow-content ';
		}

		if ( get_post_meta( get_the_ID(), 'pixelpop_sidebar_layout_metabox', true ) === 'left' ) {
			$sidebar_layout = 'sidebar-layout-left ';
		} elseif ( get_post_meta( get_the_ID(), 'pixelpop_sidebar_layout_metabox', true ) === 'left' ) {
			$sidebar_layout = 'sidebar-layout-right ';
		} elseif ( get_post_meta( get_the_ID(), 'pixelpop_sidebar_layout_metabox', true ) === 'none' ) {
			$sidebar_layout = 'sidebar-layout-none ';
		} else {
			$sidebar_layout = 'sidebar-layout-none ';
			if ( 'left' === get_theme_mod( 'pixelpop_page_sidebar_layout', 'none' ) ) {
				$sidebar_layout = 'sidebar-layout-left ';
			} elseif ( 'right' === get_theme_mod( 'pixelpop_page_sidebar_layout', 'none' ) ) {
				$sidebar_layout = 'sidebar-layout-right ';
			} elseif ( 'none' === get_theme_mod( 'pixelpop_page_sidebar_layout', 'none' ) ) {
				$sidebar_layout = 'sidebar-layout-none ';
			}
		}
	}

	$classes[] = $featured_image_layout;
	$classes[] = $conent_layout;
	$classes[] = $sidebar_layout;

	return $classes;
}
add_filter( 'body_class', 'PixelPop\pixelpop_single_layout_body_class' );

/**
 * Single Layout Body Classes
 *
 * @since 1.0.0
 */
function pixelpop_is_primary_sidebar_active() {

	$container_classes = 'sidebar-none';

	if ( is_home() || is_front_page() || ( is_archive() && 'post' === get_post_type() ) ) {
		if ( 'left' === get_theme_mod( 'pixelpop_blog_archive_sidebar_layout', 'none' ) ) {
			$container_classes = 'sidebar-left';
		} elseif ( 'right' === get_theme_mod( 'pixelpop_blog_archive_sidebar_layout', 'none' ) ) {
			$container_classes = 'sidebar-right';
		} elseif ( 'none' === get_theme_mod( 'pixelpop_blog_archive_sidebar_layout', 'none' ) ) {
			$container_classes = 'sidebar-none';
		}
	}

	if ( is_singular() ) {

		if ( get_post_meta( get_the_ID(), 'pixelpop_sidebar_layout_metabox', true ) === 'left' ) {
			$container_classes = 'sidebar-left';
		} elseif ( get_post_meta( get_the_ID(), 'pixelpop_sidebar_layout_metabox', true ) === 'right' ) {
			$container_classes = 'sidebar-right';
		} elseif ( get_post_meta( get_the_ID(), 'pixelpop_sidebar_layout_metabox', true ) === 'none' ) {
			$container_classes = 'sidebar-none';
		} else {
			$container_classes = 'sidebar-none';

			if ( is_singular( 'post' ) ) {
				if ( 'left' === get_theme_mod( 'pixelpop_single_blog_sidebar_layout', 'none' ) ) {
					$container_classes = 'sidebar-left';
				} elseif ( 'right' === get_theme_mod( 'pixelpop_single_blog_sidebar_layout', 'none' ) ) {
					$container_classes = 'sidebar-right';
				} elseif ( 'none' === get_theme_mod( 'pixelpop_single_blog_sidebar_layout', 'none' ) ) {
					$container_classes = 'sidebar-none';
				}
			}

			if ( is_singular( 'page' ) ) {
				if ( 'left' === get_theme_mod( 'pixelpop_page_sidebar_layout', 'none' ) ) {
					$container_classes = 'sidebar-left';
				} elseif ( 'right' === get_theme_mod( 'pixelpop_page_sidebar_layout', 'none' ) ) {
					$container_classes = 'sidebar-right';
				} elseif ( 'none' === get_theme_mod( 'pixelpop_page_sidebar_layout', 'none' ) ) {
					$container_classes = 'sidebar-none';
				}
			}
		}
	}

	$is_sidebar_active = false;

	if ( 'sidebar-none' !== $container_classes ) {
		$is_sidebar_active = true;
	}

	return (bool) $is_sidebar_active;
}

/**
 * Container Layout Body Classes.
 *
 * @param $classes body class
 * @since 1.0.0
 */
function pixelpop_layout_body_class( $classes ) {

	if ( get_post_meta( get_the_ID(), 'pixelpop_content_layout_metabox', true ) === 'full-width' ){
		$classes[] = 'ppop-layout-full-width';
	} elseif ( get_post_meta( get_the_ID(), 'pixelpop_content_layout_metabox', true ) === 'page-builder' ){
		$classes[] = 'ppop-layout-page-builder';
	} else {
		$classes[] = 'ppop-layout-default';
	}

	return $classes;
}

/**
 * Single Layout Body Classes.
 *
 * @since 1.0.0
 */
function pixelpop_post_container_layout() {

	if ( is_singular() ) {

		add_filter( 'body_class', 'PixelPop\pixelpop_layout_body_class' );

		if ( get_post_meta( get_the_ID(), 'pixelpop_content_layout_metabox', true ) === 'full-width' ){
			remove_action( 'pixelpop_before_main_content', 'PixelPop\pixelpop_content_width_wrapper_before', 10 );
			remove_action( 'pixelpop_after_main_content', 'PixelPop\pixelpop_content_width_wrapper_after', 10 );
			remove_action( 'pixelpop_layout_primary_after', 'PixelPop\pixelpop_get_sidebar', 10 );
		}

		if ( get_post_meta( get_the_ID(), 'pixelpop_content_layout_metabox', true ) === 'page-builder' ){
			remove_action( 'pixelpop_before_main_content', 'PixelPop\pixelpop_content_width_wrapper_before', 10 );
			remove_action( 'pixelpop_after_main_content', 'PixelPop\pixelpop_content_width_wrapper_after', 10 );
			remove_action( 'pixelpop_header_below_content', 'PixelPop\pixelpop_single_fullwidth_thumbnail', 20 );
			remove_action( 'pixelpop_layout_primary_after', 'PixelPop\pixelpop_get_sidebar', 10 );
			if ( is_page() ) {
				remove_action( 'pixelpop_page_content_before', 'PixelPop\pixelpop_post_header', 10 );
				remove_action( 'pixelpop_page_content_before', 'PixelPop\pixelpop_thumbnail', 10 );
				remove_action( 'pixelpop_page_custom_after', 'PixelPop\pixelpop_post_pagination', 10 );
				remove_action( 'pixelpop_page_content_after', 'PixelPop\pixelpop_post_comment', 10 );
				remove_action( 'pixelpop_header_below_content', 'PixelPop\pixelpop_single_fullwidth_thumbnail', 20 );
			} else {
				remove_action( 'pixelpop_single_post', 'PixelPop\pixelpop_post_header', 10 );
				remove_action( 'pixelpop_single_post', 'PixelPop\pixelpop_thumbnail', 10 );
				remove_action( 'pixelpop_single_post', 'PixelPop\pixelpop_post_meta', 20 );
				remove_action( 'pixelpop_single_post', 'PixelPop\pixelpop_entry_footer', 40 );
				remove_action( 'pixelpop_main_single_content_after', 'PixelPop\pixelpop_single_post_navigation', 10 );
				remove_action( 'pixelpop_main_single_content_after', 'PixelPop\pixelpop_related_posts', 10 );
				remove_action( 'pixelpop_main_single_content_after', 'PixelPop\pixelpop_post_author', 10 );
				remove_action( 'pixelpop_main_single_content_after', 'PixelPop\pixelpop_post_comment', 10 );
				remove_action( 'pixelpop_header_below_content', 'PixelPop\pixelpop_single_fullwidth_thumbnail', 20 );
			}
		}
	}
}
add_action( 'wp', 'PixelPop\pixelpop_post_container_layout' );
