<?php

/**
 * Replies Loop - Single Reply
 *
 * @package bbPress
 * @subpackage Theme
 */

// Exit if accessed directly
defined( 'ABSPATH' ) || exit;

?>
<div class="bbp-single-topic-body">

	<div <?php bbp_reply_class(); ?>>
		<div class="ppop-bbp-topic-author">

			<?php do_action( 'bbp_theme_before_topic_author_details' ); ?>

			<div class="ppop-bbp-single-topic-author-avatar">
				<?php
				printf( bbp_get_topic_author_link( array( 'type' => 'avatar', 'size' => '50' ) ) );// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				?>
			</div>

			<span class="ppop-bbp-single-topic-author-name"><?php printf( bbp_get_topic_author_link( array( 'type' => 'name' ) ) );// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span>

			<span class="ppop-bbp-single-topic-post-date"><?php bbp_topic_post_date(); ?></span>

			<?php do_action( 'bbp_theme_after_topic_author_details' ); ?>

		</div><!-- .ppop-bbp-topic-author -->

		<div class="ppop-bbp-single-topic-content">

			<?php do_action( 'bbp_theme_before_reply_content' ); ?>

			<?php bbp_reply_content(); ?>

			<?php do_action( 'bbp_theme_after_reply_content' ); ?>

		</div><!-- .ppop-bbp-single-topic-content -->
	</div><!-- .reply -->

	<div class="ppop-bbp-meta">

		<?php if ( bbp_is_single_user_replies() ) : ?>

			<span class="bbp-header">
				<?php esc_html_e( 'in reply to: ', 'pixelpop' ); ?>
				<a class="bbp-topic-permalink" href="<?php bbp_topic_permalink( bbp_get_reply_topic_id() ); ?>"><?php bbp_topic_title( bbp_get_reply_topic_id() ); ?></a>
			</span>

		<?php endif; ?>

		<a href="<?php bbp_reply_url(); ?>" class="bbp-reply-permalink">#<?php bbp_reply_id(); ?></a>

		<?php do_action( 'bbp_theme_before_reply_admin_links' ); ?>

		<?php
			$r = bbp_parse_args( $args, array(
				'id'     => 0,
				'before' => '<span class="bbp-admin-links">',
				'after'  => '</span>',
				'sep'    => ' | ',
				'links'  => array()
			), 'get_reply_admin_links' );
		?>

		<span class="ppop-single-reply-reply-button"><?php echo bbp_get_reply_to_link( $r ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span>
		<span class="ppop-single-reply-more">
			<i class="ppop-icon ppop-icon-more-horizontal"></i>
			<div class="ppop-single-reply-more-links">
				<?php
				echo bbp_get_reply_edit_link( $r );// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				echo bbp_get_reply_move_link( $r );// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				echo bbp_get_topic_split_link( $r );// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				echo bbp_get_reply_trash_link( $r );// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				echo bbp_get_reply_spam_link( $r );// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				echo bbp_get_reply_approve_link( $r );// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				?>
			</div>
		</span>



		<?php do_action( 'bbp_theme_after_reply_admin_links' ); ?>

	</div><!-- .ppop-bbp-meta -->


</div><!-- .bbp-single-topic-body -->
