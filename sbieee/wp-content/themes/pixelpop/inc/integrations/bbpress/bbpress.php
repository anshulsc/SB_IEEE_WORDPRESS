<?php
/**
 * BBpress Compatibility File for PixelPop
 *
 * @link https://bbpress.org/
 *
 * @package     pixelpop
 * @author      PixelPop
 * @copyright   Copyright (c)., PixelPop
 * @since       PixelPop 1.0.0
 */

namespace PixelPop;

use function PixelPop\pixelpop;
use function add_action;
use function add_filter;
use Pixelpop_Tool_Social_Share;

defined( 'ABSPATH' ) || exit;

/**
 * BBpress setup function.
 */
function pixelpop_bbpress_setup() {
	if ( is_bbpress() ) {

		remove_action( 'pixelpop_single_post', 'PixelPop\pixelpop_post_meta', 20 );
		remove_action( 'pixelpop_single_post', 'PixelPop\pixelpop_thumbnail', 10 );
		remove_action( 'pixelpop_page_content_before', 'PixelPop\pixelpop_thumbnail', 10 );
		remove_action( 'pixelpop_main_single_content_after', 'PixelPop\pixelpop_single_post_navigation', 5 );
	}
}
add_action( 'wp', 'PixelPop\pixelpop_bbpress_setup' );

/**
 * BBpress Support.
 */
function pixelpop_bbpress_support() {
	add_post_type_support( 'forum', array( 'thumbnail' ) );
	add_theme_support( 'post-thumbnails', array( 'forum' ) );
}
add_action( 'init', 'PixelPop\pixelpop_bbpress_support' );

/**
 * BBpress breadcrumbs.
 */
function pixelpop_bbpress_breadcrumb() {
	bbp_breadcrumb();
}

/**
 * BBpress search.
 */
function pixelpop_bbpress_search() {
	bbp_get_template_part( 'form', 'search' );
}

/**
 * BBpress show lead topic.
 */
function pixelpop_bbp_show_lead_topic( $show_lead ) {
	$show_lead[] = 'true';
	return $show_lead;
}
add_filter( 'bbp_show_lead_topic', 'PixelPop\pixelpop_bbp_show_lead_topic' );

/**
 * BBpress single topic buttons.
 */
function pixelpop_bbpress_single_topic_buttons() {
	if ( bbp_is_single_topic() ) {
	?>
		<div class="ppop-bbp-lead-topic-buttons">

			<span class="ppop-new-reply-toggle-button-wrap">
				<a href="#new-post" class="ppop-new-reply-toggle-button"><?php echo esc_html__('Reply', 'pixelpop'); ?></a>
			</span>

			<?php bbp_topic_subscription_link(); ?>

			<?php bbp_topic_favorite_link(); ?>

			<?php do_action( 'pixelpop_single_topic_buttons' ); ?>
		</div>
		<?php
	}
}
add_action( 'pixelpop_single_post', 'PixelPop\pixelpop_bbpress_single_topic_buttons', 15 );

/**
 * BBpress forum archive head.
 */
function pixelpop_bbpress_forum_archive_head() {
	if ( bbp_is_forum_archive() ) {
		add_action( 'pixelpop_single_post', 'PixelPop\pixelpop_bbpress_forum_archive_head_start', 5 );
		add_action( 'pixelpop_single_post', 'PixelPop\pixelpop_bbpress_breadcrumb', 11 );
		add_action( 'pixelpop_single_post', 'PixelPop\pixelpop_bbpress_forum_archive_search', 20 );
		add_action( 'pixelpop_single_post', 'PixelPop\pixelpop_bbpress_forum_archive_head_end', 20 );

		add_action( 'pixelpop_page_content_before', 'PixelPop\pixelpop_bbpress_forum_archive_head_start', 5 );
		add_action( 'pixelpop_page_content_before', 'PixelPop\pixelpop_bbpress_breadcrumb', 11 );
		add_action( 'pixelpop_page_content_before', 'PixelPop\pixelpop_bbpress_forum_archive_search', 20 );
		add_action( 'pixelpop_page_content_before', 'PixelPop\pixelpop_bbpress_forum_archive_head_end', 20 );
	}
}
add_action( 'wp', 'PixelPop\pixelpop_bbpress_forum_archive_head' );

/**
 * BBpress add breadcrumb below header.
 */
function pixelpop_bbpress_breadcrumb_below_header() {
	if ( is_bbpress() ) {
		add_action( 'pixelpop_single_post', 'PixelPop\pixelpop_bbpress_breadcrumb', 11 );
		add_action( 'pixelpop_page_content_before', 'PixelPop\pixelpop_bbpress_breadcrumb', 11 );
	}
}
add_action( 'wp', 'PixelPop\pixelpop_bbpress_breadcrumb_below_header' );

/**
 * BBpress forum archive search.
 */
function pixelpop_bbpress_forum_archive_search() {
	?>
	<div class="ppop-bbp-forum-archive-search">
		<?php pixelpop_bbpress_search(); ?>
	</div>
	<?php
}

/**
 * BBpress forum archive head div open.
 */
function pixelpop_bbpress_forum_archive_head_start() {
	?>
		<div class="ppop-bbp-forum-archive-head">
			<div class="col-full">
	<?php
}

/**
 * BBpress forum archive head div close.
 */
function pixelpop_bbpress_forum_archive_head_end() {
	?>
			</div>
		</div>
	<?php
}

/**
 * BBpress forum archive head div close.
 */
function pixelpop_bbpress_preload_styles() {
	if ( is_bbpress() ) {
		pixelpop()->print_styles( 'pixelpop-bbpress' );
	}
}
add_action( 'pixelpop_content_start', 'PixelPop\pixelpop_bbpress_preload_styles', 1 );




