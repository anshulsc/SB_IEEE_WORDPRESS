<?php

/**
 * bbPress User Profile Edit Part
 *
 * @package bbPress
 * @subpackage Theme
 */

// Exit if accessed directly
defined( 'ABSPATH' ) || exit;

?>

<form class="ppop-layout-box" id="bbp-your-profile" method="post" enctype="multipart/form-data">

	<h2 class="entry-title"><?php esc_html_e( 'Name', 'pixelpop' ) ?></h2>

	<?php do_action( 'bbp_user_edit_before' ); ?>

	<fieldset class="bbp-form name">
		<legend><?php esc_html_e( 'Name', 'pixelpop' ) ?></legend>

		<?php do_action( 'bbp_user_edit_before_name' ); ?>

		<div>
			<label for="first_name"><?php esc_html_e( 'First Name', 'pixelpop' ) ?></label>
			<input type="text" name="first_name" id="first_name" value="<?php bbp_displayed_user_field( 'first_name', 'edit' ); ?>" class="regular-text" />
		</div>

		<div>
			<label for="last_name"><?php esc_html_e( 'Last Name', 'pixelpop' ) ?></label>
			<input type="text" name="last_name" id="last_name" value="<?php bbp_displayed_user_field( 'last_name', 'edit' ); ?>" class="regular-text" />
		</div>

		<div>
			<label for="nickname"><?php esc_html_e( 'Nickname', 'pixelpop' ); ?></label>
			<input type="text" name="nickname" id="nickname" value="<?php bbp_displayed_user_field( 'nickname', 'edit' ); ?>" class="regular-text" />
		</div>

		<div>
			<label for="display_name"><?php esc_html_e( 'Display Name', 'pixelpop' ) ?></label>

			<?php bbp_edit_user_display_name(); ?>

		</div>

		<?php do_action( 'bbp_user_edit_after_name' ); ?>

	</fieldset>

	<h2 class="entry-title"><?php esc_html_e( 'Contact Info', 'pixelpop' ) ?></h2>

	<fieldset class="bbp-form contact">
		<legend><?php esc_html_e( 'Contact Info', 'pixelpop' ) ?></legend>

		<?php do_action( 'bbp_user_edit_before_contact' ); ?>

		<div>
			<label for="url"><?php esc_html_e( 'Website', 'pixelpop' ) ?></label>
			<input type="text" name="url" id="url" value="<?php bbp_displayed_user_field( 'user_url', 'edit' ); ?>" maxlength="200" class="regular-text code" />
		</div>

		<?php foreach ( bbp_edit_user_contact_methods() as $name => $desc ) : ?>

			<div>
				<label for="<?php echo esc_attr( $name ); ?>"><?php echo apply_filters( 'user_' . $name . '_label', $desc ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></label>
				<input type="text" name="<?php echo esc_attr( $name ); ?>" id="<?php echo esc_attr( $name ); ?>" value="<?php bbp_displayed_user_field( $name, 'edit' ); ?>" class="regular-text" />
			</div>

		<?php endforeach; ?>

		<?php do_action( 'bbp_user_edit_after_contact' ); ?>

	</fieldset>

	<h2 class="entry-title"><?php bbp_is_user_home_edit()
		? esc_html_e( 'About Yourself', 'pixelpop' )
		: esc_html_e( 'About the user', 'pixelpop' );
	?></h2>

	<fieldset class="bbp-form about">
		<legend><?php bbp_is_user_home_edit()
			? esc_html_e( 'About Yourself', 'pixelpop' )
			: esc_html_e( 'About the user', 'pixelpop' );
		?></legend>

		<?php do_action( 'bbp_user_edit_before_about' ); ?>

		<div>
			<label for="description"><?php esc_html_e( 'Biographical Info', 'pixelpop' ); ?></label>
			<textarea name="description" id="description" rows="5" cols="30"><?php bbp_displayed_user_field( 'description', 'edit' ); ?></textarea>
		</div>

		<?php do_action( 'bbp_user_edit_after_about' ); ?>

	</fieldset>

	<h2 class="entry-title"><?php esc_html_e( 'Account', 'pixelpop' ) ?></h2>

	<fieldset class="bbp-form account">
		<legend><?php esc_html_e( 'Account', 'pixelpop' ) ?></legend>

		<?php do_action( 'bbp_user_edit_before_account' ); ?>

		<div>
			<label for="user_login"><?php esc_html_e( 'Username', 'pixelpop' ); ?></label>
			<input type="text" name="user_login" id="user_login" value="<?php bbp_displayed_user_field( 'user_login', 'edit' ); ?>" maxlength="100" disabled="disabled" class="regular-text" />
		</div>

		<div>
			<label for="email"><?php esc_html_e( 'Email', 'pixelpop' ); ?></label>
			<input type="text" name="email" id="email" value="<?php bbp_displayed_user_field( 'user_email', 'edit' ); ?>" maxlength="100" class="regular-text" autocomplete="off" />
		</div>

		<?php bbp_get_template_part( 'form', 'user-passwords' ); ?>

		<div>
			<label for="url"><?php esc_html_e( 'Language', 'pixelpop' ) ?></label>

			<?php bbp_edit_user_language(); ?>

		</div>

		<?php do_action( 'bbp_user_edit_after_account' ); ?>

	</fieldset>

	<?php if ( ! bbp_is_user_home_edit() && current_user_can( 'promote_user', bbp_get_displayed_user_id() ) ) : ?>

		<h2 class="entry-title"><?php esc_html_e( 'User Role', 'pixelpop' ) ?></h2>

		<fieldset class="bbp-form">
			<legend><?php esc_html_e( 'User Role', 'pixelpop' ); ?></legend>

			<?php do_action( 'bbp_user_edit_before_role' ); ?>

			<?php if ( is_multisite() && is_super_admin() && current_user_can( 'manage_network_options' ) ) : ?>

				<div>
					<label for="super_admin"><?php esc_html_e( 'Network Role', 'pixelpop' ); ?></label>
					<label>
						<input class="checkbox" type="checkbox" id="super_admin" name="super_admin"<?php checked( is_super_admin( bbp_get_displayed_user_id() ) ); ?> />
						<?php esc_html_e( 'Grant this user super admin privileges for the Network.', 'pixelpop' ); ?>
					</label>
				</div>

			<?php endif; ?>

			<?php bbp_get_template_part( 'form', 'user-roles' ); ?>

			<?php do_action( 'bbp_user_edit_after_role' ); ?>

		</fieldset>

	<?php endif; ?>

	<?php do_action( 'bbp_user_edit_after' ); ?>

	<fieldset class="submit">
		<legend><?php esc_html_e( 'Save Changes', 'pixelpop' ); ?></legend>
		<div>

			<?php bbp_edit_user_form_fields(); ?>

			<button type="submit" id="bbp_user_edit_submit" name="bbp_user_edit_submit" class="button submit user-submit"><?php bbp_is_user_home_edit()
				? esc_html_e( 'Update Profile', 'pixelpop' )
				: esc_html_e( 'Update User', 'pixelpop' );
			?></button>
		</div>
	</fieldset>
</form>
