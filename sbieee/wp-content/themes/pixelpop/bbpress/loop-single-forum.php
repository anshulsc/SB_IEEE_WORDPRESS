<?php

/**
 * Forums Loop - Single Forum
 *
 * @package bbPress
 * @subpackage Theme
 */

// Exit if accessed directly
defined( 'ABSPATH' ) || exit;

?>

<li id="bbp-forum-<?php bbp_forum_id(); ?>" <?php bbp_forum_class(); ?>>
	<?php
	if ( has_post_thumbnail() ): ?>
			<a class="ppop-forum-featured-img" href="<?php bbp_forum_permalink(); ?>">
				<img src="<?php the_post_thumbnail_url(); ?>" itemprop="image">
			</a>
	<?php endif;
	 ?>
	<div class="bbp-forum-info">

		<?php if ( bbp_is_user_home() && bbp_is_subscriptions() ) : ?>

			<span class="bbp-row-actions">

				<?php do_action( 'bbp_theme_before_forum_subscription_action' ); ?>

				<?php bbp_forum_subscription_link( array( 'before' => '', 'subscribe' => '+', 'unsubscribe' => '&times;' ) ); ?>

				<?php do_action( 'bbp_theme_after_forum_subscription_action' ); ?>

			</span>

		<?php endif; ?>

		<?php do_action( 'bbp_theme_before_forum_title' ); ?>

		<a class="bbp-forum-title" href="<?php bbp_forum_permalink(); ?>"><?php bbp_forum_title(); ?></a>

		<?php do_action( 'bbp_theme_after_forum_title' ); ?>

		<div class="ppop-forum-meta">
			<span class="ppop-bbp-forum-topic-count">
				<?php bbp_forum_topic_count(); ?> <?php esc_html_e( 'Topics', 'pixelpop' ); ?>

			</span>

			<span class="ppop-bbp-forum-reply-count">
				<?php bbp_show_lead_topic() ? bbp_forum_reply_count() : bbp_forum_post_count(); ?>
				<?php bbp_show_lead_topic()
				? esc_html_e( 'Replies', 'pixelpop' )
				: esc_html_e( 'Posts', 'pixelpop' );
				?>
			</span>
		</div>

		<?php do_action( 'bbp_theme_before_forum_description' ); ?>

		<div class="bbp-forum-content"><?php bbp_forum_content(); ?></div>

		<?php do_action( 'bbp_theme_after_forum_description' ); ?>

		<?php do_action( 'bbp_theme_before_forum_sub_forums' ); ?>

		<?php bbp_list_forums(); ?>

		<?php do_action( 'bbp_theme_after_forum_sub_forums' ); ?>

		<?php bbp_forum_row_actions(); ?>

		<div class="ppop-forum-activity">
			<?php esc_html_e( 'Last Activity :', 'pixelpop' ); ?> <?php bbp_forum_freshness_link(); ?>
		</div>

	</div>
</li><!-- #bbp-forum-<?php bbp_forum_id(); ?> -->
