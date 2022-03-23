<?php

/**
 * User Profile
 *
 * @package bbPress
 * @subpackage Theme
 */

// Exit if accessed directly
defined( 'ABSPATH' ) || exit;

do_action( 'bbp_template_before_user_profile' ); ?>

<div id="bbp-user-profile" class="bbp-user-profile">
	<div class="bbp-user-section">
		<div class="bbp-user-section-profile ppop-layout-box">
			<h2><?php esc_html_e( 'Profile', 'pixelpop' ); ?></h2>
			<p class="bbp-user-forum-role"><?php /* translators: 1: Date */ printf( esc_html__( 'Registered: %s', 'pixelpop' ), bbp_get_time_since( bbp_get_displayed_user_field( 'user_registered' ) ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>

			<?php if ( bbp_get_displayed_user_field( 'description' ) ) : ?>

				<p class="bbp-user-description"><?php echo bbp_rel_nofollow( bbp_get_displayed_user_field( 'description' ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>

			<?php endif; ?>

			<?php if ( bbp_get_displayed_user_field( 'user_url' ) ) : ?>

				<p class="bbp-user-website"><?php /* translators: 1: Website */ printf( esc_html__( 'Website: %s', 'pixelpop' ), bbp_rel_nofollow( bbp_make_clickable( bbp_get_displayed_user_field( 'user_url' ) ) ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>

			<?php endif; ?>
		</div>

		<div class="bbp-user-section-forums ppop-layout-box">

			<h2><?php esc_html_e( 'Forums', 'pixelpop' ); ?></h2>

			<?php if ( bbp_get_user_last_posted() ) : ?>

				<p class="bbp-user-last-activity"><?php /* translators: 1: Date */ printf( esc_html__( 'Last Activity: %s', 'pixelpop' ), bbp_get_time_since( bbp_get_user_last_posted(), false, true ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>

			<?php endif; ?>

			<p class="bbp-user-topic-count"><?php /* translators: 1: Number Of Topics */ printf( esc_html__( 'Topics Started: %s', 'pixelpop' ), bbp_get_user_topic_count() ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
			<p class="bbp-user-reply-count"><?php /* translators: 1: Number Of Replies */ printf( esc_html__( 'Replies Created: %s', 'pixelpop' ), bbp_get_user_reply_count() ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
			<p class="bbp-user-forum-role"><?php /* translators: 1: Number Of Role */  printf( esc_html__( 'Forum Role: %s', 'pixelpop' ), bbp_get_user_display_role() ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
		</div>
	</div>
</div><!-- #bbp-author-topics-started -->

<?php do_action( 'bbp_template_after_user_profile' );
