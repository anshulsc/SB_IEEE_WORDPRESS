<?php

/**
 * Single Topic Lead Content Part
 *
 * @package bbPress
 * @subpackage Theme
 */

// Exit if accessed directly
defined( 'ABSPATH' ) || exit;

do_action( 'bbp_template_before_lead_topic' ); ?>

<div id="bbp-topic-<?php bbp_topic_id(); ?>-lead" class="bbp-lead-topic ppop-lead-topic">

	<div class="bbp-single-topic-body">

		<div id="post-<?php bbp_topic_id(); ?>" <?php bbp_topic_class(); ?>>

			<div class="ppop-bbp-topic-author">

				<?php do_action( 'bbp_theme_before_topic_author_details' ); ?>

				<div class="ppop-bbp-single-topic-author-avatar">
					<?php echo bbp_get_topic_author_link( array( 'type' => 'avatar', 'size' => '50' ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
				</div>

				<span class="ppop-bbp-single-topic-author-name"><?php echo bbp_get_topic_author_link( array( 'type' => 'name' ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span>

				<span class="ppop-bbp-single-topic-post-date"><?php bbp_topic_post_date(); ?></span>

				<?php do_action( 'bbp_theme_after_topic_author_details' ); ?>

			</div><!-- .ppop-bbp-topic-author -->

			<div class="ppop-bbp-single-topic-content">

				<?php do_action( 'bbp_theme_before_topic_content' ); ?>

				<?php bbp_topic_content(); ?>

				<?php do_action( 'bbp_theme_after_topic_content' ); ?>

			</div><!-- .ppop-bbp-single-topic-content -->

		</div><!-- #post-<?php bbp_topic_id(); ?> -->

		<div class="ppop-bbp-meta">

			<a href="<?php bbp_topic_permalink(); ?>" class="bbp-topic-permalink">#<?php bbp_topic_id(); ?></a>

			<?php do_action( 'bbp_theme_before_topic_admin_links' ); ?>

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

			<span class="ppop-single-reply-more">
				<i class="ppop-icon ppop-icon-more-horizontal"></i>
				<div class="ppop-single-reply-more-links">
					<?php
					echo bbp_get_topic_edit_link( $r ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					echo bbp_get_topic_merge_link( $r ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					echo bbp_get_topic_close_link( $r ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					echo bbp_get_topic_stick_link( $r ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					echo bbp_get_topic_trash_link( $r ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					echo bbp_get_topic_spam_link( $r ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					echo bbp_get_topic_approve_link( $r ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					?>
				</div>
			</span>

			<?php do_action( 'bbp_theme_after_topic_admin_links' ); ?>

		</div><!-- .ppop-bbp-meta -->


	</div><!-- .bbp-single-topic-body -->

</div><!-- #bbp-topic-<?php bbp_topic_id(); ?>-lead -->

<?php do_action( 'bbp_template_after_lead_topic' );
