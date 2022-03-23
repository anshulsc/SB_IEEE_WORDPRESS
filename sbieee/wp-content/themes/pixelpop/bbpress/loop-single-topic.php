<?php

/**
 * Topics Loop - Single
 *
 * @package bbPress
 * @subpackage Theme
 */

// Exit if accessed directly
defined( 'ABSPATH' ) || exit;

?>

<li id="bbp-topic-<?php bbp_topic_id(); ?>" <?php bbp_topic_class(); ?>>

	<div class="ppop-bbp-topic-author-avatar">
		<?php printf( bbp_get_topic_author_link( array( 'type' => 'avatar', 'size' => '50' ) ) );// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
	</div>
	<div class="ppop-bbp-topic-content">
		<div class="bbp-topic-title">

			<?php if ( bbp_is_user_home() ) : ?>

				<?php if ( bbp_is_favorites() ) : ?>

					<span class="bbp-row-actions">

						<?php do_action( 'bbp_theme_before_topic_favorites_action' ); ?>

						<?php bbp_topic_favorite_link( array( 'before' => '', 'favorite' => '+', 'favorited' => '&times;' ) ); ?>

						<?php do_action( 'bbp_theme_after_topic_favorites_action' ); ?>

					</span>

				<?php elseif ( bbp_is_subscriptions() ) : ?>

					<span class="bbp-row-actions">

						<?php do_action( 'bbp_theme_before_topic_subscription_action' ); ?>

						<?php bbp_topic_subscription_link( array( 'before' => '', 'subscribe' => '+', 'unsubscribe' => '&times;' ) ); ?>

						<?php do_action( 'bbp_theme_after_topic_subscription_action' ); ?>

					</span>

				<?php endif; ?>

			<?php endif; ?>

			<?php do_action( 'bbp_theme_before_topic_title' ); ?>

			<a class="bbp-topic-permalink" href="<?php bbp_topic_permalink(); ?>"><?php bbp_topic_title(); ?></a>

			<?php do_action( 'bbp_theme_after_topic_title' ); ?>

			<?php bbp_topic_pagination(); ?>

		</div>

		<div class="ppop-bbp-topic-meta">
			<span class="bbp-topic-started-by">
				<?php
				/* translators: 1: Topic */
				printf( esc_html__( 'Started by: %1$s', 'pixelpop' ), bbp_get_topic_author_link( array( 'type' => 'name' ) ) );// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				?>
			</span>

			<span class="bbp-topic-activity"><?php bbp_topic_freshness_link(); ?></span>

			<span class="bbp-topic-voice-count">
				<i class="ppop-icon ppop-icon-users"></i>
				<?php bbp_topic_voice_count(); ?>
			</span>

			<span class="bbp-topic-reply-count">
				<i class="ppop-icon ppop-icon-message-circle"></i>
				<?php bbp_show_lead_topic() ? bbp_topic_reply_count() : bbp_topic_post_count(); ?>

			</span>

		</div>
	</div>
</li><!-- #bbp-topic-<?php bbp_topic_id(); ?> -->
