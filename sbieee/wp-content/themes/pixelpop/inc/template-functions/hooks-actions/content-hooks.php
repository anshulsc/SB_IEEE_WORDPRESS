<?php
/**
 * Calls in main content functions using theme hooks.
 *
 * @package pixelpop
 */

namespace PixelPop;

use function PixelPop\pixelpop;
use function add_action;

defined( 'ABSPATH' ) || exit;

// Template Parts.
add_action( 'pixelpop_single_main', 'PixelPop\pixelpop_single_main', 10 );
add_action( 'pixelpop_archive_main', 'PixelPop\pixelpop_archive_main', 10 );
add_action( 'pixelpop_template_parts_post', 'PixelPop\pixelpop_template_parts_post', 10 );
add_action( 'pixelpop_template_parts_page', 'PixelPop\pixelpop_template_parts_page', 10 );
add_action( 'pixelpop_template_parts_archive', 'PixelPop\pixelpop_template_parts_archive', 10 );

// Blog Home Actions.
add_action( 'pixelpop_blog_home_content_before', 'PixelPop\pixelpop_blog_list_thumbnail', 10 );
add_action( 'pixelpop_blog_home_content', 'PixelPop\pixelpop_blog_list_header', 10 );
add_action( 'pixelpop_blog_home_content', 'PixelPop\pixelpop_blog_list_excerpt', 20 );
add_action( 'pixelpop_blog_home_content', 'PixelPop\pixelpop_blog_list_footer', 30 );
add_action( 'pixelpop_archive_post_footer_content', 'PixelPop\pixelpop_blog_list_meta', 10 );
add_action( 'pixelpop_archive_post_footer_content', 'PixelPop\pixelpop_blog_list_comment_count', 20 );
add_action( 'pixelpop_blog_excerpt_content', 'PixelPop\pixelpop_blog_excerpt_main', 10 );
// add_action( 'pixelpop_blog_excerpt_content', 'PixelPop\pixelpop_blog_excerpt_readmore', 20 );
add_action( 'pixelpop_archive_pagination', 'PixelPop\pixelpop_blog_home_number_pagination', 10 );

// Archive Actions.
add_action( 'pixelpop_header_below_content', 'PixelPop\pixelpop_archive_title', 10 );

// PixelPop Single Posts actions.
add_action( 'wp', 'PixelPop\pixelpop_single_post_fullwidth_thumbnail' );

/**
 * PixelPop Blog Structure.
 *
 * @since 1.0.0
 */
function pixelpop_single_blog_structure() {

	$single_post_header_structure = get_theme_mod( 'pixelpop_single_post_header_structure', array( 'image', 'title' ) );

	$single_post_footer_structure = get_theme_mod( 'pixelpop_single_post_footer_structure', array( 'post-navigation', 'related-posts', 'author-box', 'comments' ) );

	if ( is_array( $single_post_header_structure ) ) {

		foreach ( $single_post_header_structure as $post_header_element ) {

			switch ( $post_header_element ) {

				// Blog Post Featured Image.
				case 'image':
					add_action( 'pixelpop_single_post', 'PixelPop\pixelpop_thumbnail', 10 );
					break;

				// Blog Post Title.
				case 'title':
					add_action( 'pixelpop_single_post', 'PixelPop\pixelpop_post_header', 10 );
					break;
			}
		}
	}

	if ( is_array( $single_post_footer_structure ) ) {

		foreach ( $single_post_footer_structure as $post_footer_element ) {

			switch ( $post_footer_element ) {

				// Blog Post Featured Image.
				case 'post-navigation':
					add_action( 'pixelpop_main_single_content_after', 'PixelPop\pixelpop_single_post_navigation', 10 );
					break;

				// Blog Post Featured Image.
				case 'related-posts':
					add_action( 'pixelpop_main_single_content_after', 'PixelPop\pixelpop_related_posts', 10 );
					break;

				// Blog Post Title.
				case 'author-box':
					add_action( 'pixelpop_main_single_content_after', 'PixelPop\pixelpop_post_author', 10 );
					break;

				// Blog Post Title.
				case 'comments':
					add_action( 'pixelpop_main_single_content_after', 'PixelPop\pixelpop_post_comment', 10 );
					break;
			}
		}
	}

}

add_action( 'wp', 'PixelPop\pixelpop_single_blog_structure' );

add_action( 'pixelpop_single_post', 'PixelPop\pixelpop_post_meta', 20 );
add_action( 'pixelpop_single_meta_content', 'PixelPop\pixelpop_blog_list_meta', 10 );
add_action( 'pixelpop_single_meta_content', 'PixelPop\pixelpop_post_meta_icons_wrap_start', 20 );
// add_action( 'pixelpop_single_meta_content', 'PixelPop\pixelpop_post_share_btn', 30 );
add_action( 'pixelpop_single_meta_content', 'PixelPop\pixelpop_blog_list_comment_count', 40 );
// add_action( 'pixelpop_single_meta_content', 'PixelPop\pixelpop_blog_post_like_btn', 50 );
add_action( 'pixelpop_single_meta_content', 'PixelPop\pixelpop_post_meta_icons_wrap_end', 60 );
add_action( 'pixelpop_single_post', 'PixelPop\pixelpop_post_content', 30 );
add_action( 'pixelpop_single_post', 'PixelPop\pixelpop_entry_footer', 40 );

// Related Posts Actions.
add_action( 'pixelpop_related_posts_content_before', 'PixelPop\pixelpop_blog_list_thumbnail', 10 );
add_action( 'pixelpop_related_posts_content', 'PixelPop\pixelpop_related_posts_header', 10 );
add_action( 'pixelpop_related_posts_content', 'PixelPop\pixelpop_blog_list_excerpt', 20 );
add_action( 'pixelpop_related_posts_content', 'PixelPop\pixelpop_blog_list_footer', 30 );

// PixelPop  Page actions.
add_action( 'wp', 'PixelPop\pixelpop_page_structure' );

/**
 * PixelPop Page Structure.
 *
 * @since 1.0.0
 */
function pixelpop_page_structure() {

	$page_header_structure = get_theme_mod( 'pixelpop_page_header_structure', array( 'image', 'title' ) );

	if ( is_array( $page_header_structure ) ) {

		foreach ( $page_header_structure as $page_header_element ) {

			switch ( $page_header_element ) {

				// Page Featured Image.
				case 'image':
					add_action( 'pixelpop_page_content_before', 'PixelPop\pixelpop_thumbnail', 10 );
					break;

				// Page Post Title.
				case 'title':
					add_action( 'pixelpop_page_content_before', 'PixelPop\pixelpop_post_header', 10 );
					break;
			}
		}
	}

}

add_action( 'pixelpop_page_custom_after', 'PixelPop\pixelpop_post_pagination', 10 );
add_action( 'pixelpop_page_content_after', 'PixelPop\pixelpop_post_comment', 10 );


// Search Page.
add_action( 'wp', 'PixelPop\pixelpop_search_result_form', 10 );
add_filter( 'get_search_form', 'PixelPop\pixelpop_search_form', 100 );
