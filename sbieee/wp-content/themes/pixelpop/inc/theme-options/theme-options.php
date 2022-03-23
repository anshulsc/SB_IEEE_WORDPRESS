<?php
/**
 * PixelPop options page.
 *
 * @package     pixelpop
 * @author      PixelPop
 * @copyright   Copyright (c)., PixelPop
 * @since       PixelPop 1.0.0
 */

/**
 * Class for theme options.
 */
class PixelPop_Theme_Options {

	/**
	 * Adds the action and filter hooks to integrate with WordPress.
	 */
	public function __construct() {
		add_action( 'admin_menu', array( $this, 'pixelpop_add_theme_page' ) );
	}

	/**
	 * Adds theme page in WordPress dashboard.
	 */
	public function pixelpop_add_theme_page() {
		add_theme_page(
			esc_html( __( 'PixelPop', 'pixelpop' ) ), // page_title.
			esc_html( __( 'PixelPop', 'pixelpop' ) ), // menu_title.
			apply_filters( 'pixelpop_admin_settings_capability', 'manage_options' ), // capability.
			'pixelpop', // menu_slug.
			array( $this, 'pixelpop_create_admin_page' ) // function.
		);
	}

	/**
	 * Creates admin page.
	 */
	public function pixelpop_create_admin_page() {
		?>

		<div class="wrap pixelpop-options-page" >

			<h2></h2>

			<div class="pixelpop-options-wrap">

				<div class="pixelpop-options-menu">

					<div class="pixelpop-options-header">

						<div class="pixelpop_icon">
							<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/pixelpop-logo.png' ); ?>">
						</div>
						<h1><?php echo esc_html( __( 'PixelPop', 'pixelpop' ) ); ?> </h1>
					</div>

					<?php
					if ( isset( $_GET['tab'] ) ) {
						$active_tab = sanitize_text_field( wp_unslash( $_GET['tab'] ) );
					}
					else {
						$active_tab = 'general';
					} // end if
					?>

					<div class="nav-tab-wrapper pixelpop-tab-wrapper">
						<a href="?page=pixelpop&tab=general" class="nav-tab pixelpop_setting_nav <?php if ($active_tab == 'general') echo 'nav-tab-active'; ?>"><i class="ppop-icon ppop-icon-settings"></i><?php echo esc_html( __( 'General', 'pixelpop' ) ); ?></a>
						<a href="?page=pixelpop&tab=addons" class="nav-tab pixelpop-setting-nav <?php if ($active_tab == 'addons') echo 'nav-tab-active'; ?>"><i class="ppop-icon ppop-icon-grid"></i><?php echo esc_html( __( 'Addons', 'pixelpop' ) ); ?></a>
					</div>

				</div>

				<div class="pixelpop-options-content">

					<?php settings_errors(); ?>

					<?php
					if ( $active_tab === 'general' ) {
						// require_once get_template_directory() . '/inc/theme-options/tabs/general.php';
						get_template_part( 'inc/theme-options/tabs/general' );
					}
					?>

					<?php
					if ( $active_tab === 'addons' ) {
						// require_once get_template_directory() . '/inc/theme-options/tabs/addons.php';
						get_template_part( 'inc/theme-options/tabs/addons' );
					}
					?>

				</div>

			</div>

		</div>
		<?php
	}
}
if ( is_admin() ) {
	$pixelpop_theme_options = new PixelPop_Theme_Options();
}


