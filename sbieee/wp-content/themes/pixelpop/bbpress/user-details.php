<?php

/**
 * User Details
 *
 * @package bbPress
 * @subpackage Theme
 */

// Exit if accessed directly
defined( 'ABSPATH' ) || exit;

do_action( 'bbp_template_before_user_details' ); ?>

<div id="bbp-single-user-details">
	<div id="ppop-bbp-user-details">
		<div id="bbp-user-avatar">
			<span class='vcard'>
				<a class="url fn n" href="<?php bbp_user_profile_url(); ?>" title="<?php bbp_displayed_user_field( 'display_name' ); ?>" rel="me">
					<?php echo get_avatar( bbp_get_displayed_user_field( 'user_email', 'raw' ), apply_filters( 'bbp_single_user_details_avatar_size', 150 ) ); ?>
				</a>
			</span>
		</div>

		<span class="ppop-bbp-profile-display-name"><?php bbp_displayed_user_field( 'display_name' ); ?></span>
		<span class="ppop-bbp-profile-username">@<?php bbp_displayed_user_field( 'user_nicename' ); ?></span>
	</div>

	<?php do_action( 'bbp_template_before_user_details_menu_items' ); ?>

	<div id="bbp-user-navigation">
		<ul>
			<li class="<?php if ( bbp_is_single_user_profile() ) :?>current<?php endif; ?>">
				<span class="vcard bbp-user-profile-link">
					<a class="url fn n" href="<?php bbp_user_profile_url(); ?>" title="<?php /* translators: 1: User Name */ printf( esc_attr__( "%s's Profile", 'pixelpop' ), bbp_get_displayed_user_field( 'display_name' ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>" rel="me"><?php esc_html_e( 'Profile', 'pixelpop' ); ?></a>
				</span>
			</li>

			<li class="<?php if ( bbp_is_single_user_topics() ) :?>current<?php endif; ?>">
				<span class='bbp-user-topics-created-link'>
					<a href="<?php bbp_user_topics_created_url(); ?>" title="<?php /* translators: 1: User Name */ printf( esc_attr__( "%s's Topics Started", 'pixelpop' ), bbp_get_displayed_user_field( 'display_name' ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>"><?php esc_html_e( 'Topics Started', 'pixelpop' ); ?></a>
				</span>
			</li>

			<li class="<?php if ( bbp_is_single_user_replies() ) :?>current<?php endif; ?>">
				<span class='bbp-user-replies-created-link'>
					<a href="<?php bbp_user_replies_created_url(); ?>" title="<?php /* translators: 1: User Name */ printf( esc_attr__( "%s's Replies Created", 'pixelpop' ), bbp_get_displayed_user_field( 'display_name' ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>"><?php esc_html_e( 'Replies Created', 'pixelpop' ); ?></a>
				</span>
			</li>

			<?php if ( bbp_is_engagements_active() ) : ?>
				<li class="<?php if ( bbp_is_single_user_engagements() ) :?>current<?php endif; ?>">
					<span class='bbp-user-engagements-created-link'>
						<a href="<?php bbp_user_engagements_url(); ?>" title="<?php /* translators: 1: User Name */ printf( esc_attr__( "%s's Engagements", 'pixelpop' ), bbp_get_displayed_user_field( 'display_name' ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>"><?php esc_html_e( 'Engagements', 'pixelpop' ); ?></a>
					</span>
				</li>
			<?php endif; ?>

			<?php if ( bbp_is_favorites_active() ) : ?>
				<li class="<?php if ( bbp_is_favorites() ) :?>current<?php endif; ?>">
					<span class="bbp-user-favorites-link">
						<a href="<?php bbp_favorites_permalink(); ?>" title="<?php /* translators: 1: User Name */ printf( esc_attr__( "%s's Favorites", 'pixelpop' ), bbp_get_displayed_user_field( 'display_name' ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>"><?php esc_html_e( 'Favorites', 'pixelpop' ); ?></a>
					</span>
				</li>
			<?php endif; ?>

			<?php if ( bbp_is_user_home() || current_user_can( 'edit_user', bbp_get_displayed_user_id() ) ) : ?>

				<?php if ( bbp_is_subscriptions_active() ) : ?>
					<li class="<?php if ( bbp_is_subscriptions() ) :?>current<?php endif; ?>">
						<span class="bbp-user-subscriptions-link">
							<a href="<?php bbp_subscriptions_permalink(); ?>" title="<?php /* translators: 1: User Name */ printf( esc_attr__( "%s's Subscriptions", 'pixelpop' ), bbp_get_displayed_user_field( 'display_name' ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>"><?php esc_html_e( 'Subscriptions', 'pixelpop' ); ?></a>
						</span>
					</li>
				<?php endif; ?>

				<li class="<?php if ( bbp_is_single_user_edit() ) :?>current<?php endif; ?>">
					<span class="bbp-user-edit-link">
						<a href="<?php bbp_user_profile_edit_url(); ?>" title="<?php /* translators: 1: User Name */ printf( esc_attr__( "Edit %s's Profile", 'pixelpop' ), bbp_get_displayed_user_field( 'display_name' ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>"><?php esc_html_e( 'Edit', 'pixelpop' ); ?></a>
					</span>
				</li>

			<?php endif; ?>

		</ul>

		<?php do_action( 'bbp_template_after_user_details_menu_items' ); ?>

	</div>
</div>

<?php do_action( 'bbp_template_after_user_details' );
