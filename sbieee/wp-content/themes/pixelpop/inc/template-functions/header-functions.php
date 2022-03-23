<?php
/**
 * Calls in Templates using theme hooks.
 *
 * @package pixelpop
 */

namespace PixelPop;

use function PixelPop\pixelpop;
use function get_template_part;
use function add_action;

defined( 'ABSPATH' ) || exit;

/**
 * PixelPop Header
 */
function pixelpop_header() {
	get_template_part( 'template-parts/header/header' );
}

/**
 * PixelPop Header
 */
function pixelpop_primary_header() {
	get_template_part( 'template-parts/header/primary-header' );
}


/**
 * PixelPop Header
 */
function pixelpop_primary_header_content() {
	?>
	<div class="ppop-primary-header-columns z-d-flex z-flex-wrap z-align-items-center z-sd-justify-content-between">
		<div class="primary-header-column header-col-1 z-mar-r-auto z-tab-width-100 z-tab-d-flex z-tab-justify-content-center z-tab-border-b z-tab-mar-0">
			<?php pixelpop_header_site_branding(); ?>
		</div>
		<div class="primary-header-column header-col-2 z-pad-r-20 z-pad-l-20 z-lm-pad-0">
			<?php pixelpop_header_main_navigation( 'ppop-desktop-nav z-lm-d-none', 'desktop', false ); ?>
		</div>
		<div class="primary-header-column header-col-2">
			<?php pixelpop_header_icon_navigation(); ?>
		</div>
	</div>
	<?php
}

/**
 * PixelPop Hamburger Menu Toggle
 */
function pixelpop_hamburger() {
	?>
	<button class="ppop-hamburger-menu anm1">
		<span><?php esc_html_e( 'toggle menu', 'pixelpop' ); ?></span>
	</button>
	<?php
}

function pixelpop_header_mobile_hamburger() {
	?>
	<button class="ppop-hamburger-menu anm1">
		<span><?php esc_html_e( 'toggle menu', 'pixelpop' ); ?></span>
	</button>
	<?php
}

function pixelpop_header_mobile_menu() {
	pixelpop_header_mobile_hamburger();
	pixelpop_header_main_navigation( 'ppop-mobile-nav z-d-none z-lm-d-block', 'mobile', true );
}

function pixelpop_hamburger_css() {
	?>
	<style class="pixelpop-hamburger-style">
		.ppop-hamburger-menu.anm1 span::before,
		.ppop-hamburger-toggle.anm1 span::before {
			-webkit-transition-property: top, -webkit-transform;
			transition-property: top, -webkit-transform;
			transition-property: top, transform;
		}

		.ppop-hamburger-menu.anm1 span::after,
		.ppop-hamburger-toggle.anm1 span::after {
			-webkit-transition-property: bottom, -webkit-transform;
			transition-property: bottom, -webkit-transform;
			transition-property: bottom, transform;
		}
	</style>
	<?php
}

add_action( 'wp_head', 'PixelPop\pixelpop_hamburger_css' );


function pixelpop_header_site_branding() {
	get_template_part( 'template-parts/header/branding' );

}

function pixelpop_main_logo() {

	/**
	 * pixelpop_site_logo_before hook.
	 *
	 * @since 1.0.0
	 *
	 */
	do_action( 'pixelpop_site_logo_before' );?>

	<?php /**
	 * pixelpop_site_logo hook.
	 *
	 * @since 1.0.0
	 *
	 */
	do_action( 'pixelpop_site_logo' );?>

	<?php /**
	 * pixelpop_site_logo_after hook.
	 *
	 * @since 1.0.0
	 *
	 */
	do_action( 'pixelpop_site_logo_after' );

}

function pixelpop_site_logo_image() {

	if ( has_custom_logo() ) {
		$custom_logo_id = get_theme_mod( 'custom_logo' );
		$logo_url = wp_get_attachment_image_src( $custom_logo_id , 'full' );
		?>

		<div class="ppop-header-logo header-logo">
			<img itemprop="logo" class="ppop-header-logo-img" src="<?php echo esc_url( $logo_url[0] ); ?>">
		</div>
		<?php
	}
}

function pixelpop_site_logo_vector() {
	if ( true == get_theme_mod( 'svg_logo_toggle', false ) && '' != get_theme_mod( 'svg_logo_editor', '' ) ) {
		$svg_code = get_theme_mod( 'svg_logo_editor', '' );
		?>
		<div class="ppop-header-logo svg-logo header-logo">
			<?php
				// echo $svg_code;
			?>
		</div>
		<?php
	}
}

function pixelpop_main_site_logos() {

	// if ( true == get_theme_mod( 'svg_logo_toggle', false ) && '' != get_theme_mod( 'svg_logo_editor', '' ) ) {
	// 	add_action('pixelpop_site_logo','PixelPop\pixelpop_site_logo_vector', 10);
	// }else{
	// 	add_action('pixelpop_site_logo','PixelPop\pixelpop_site_logo_image', 10);
	// }

	add_action('pixelpop_site_logo','PixelPop\pixelpop_site_logo_image', 10);
}



function pixelpop_site_logo_mobile_img() {

	if ( '' != get_theme_mod( 'pixelpop_mobile_logo', '' ) ) {
		$image = get_theme_mod( 'pixelpop_mobile_logo', '' );
		?>
		<div class="ppop-mobile-header-logo header-logo">
			<img itemprop="logo" class="ppop-header-mobile-logo-img" src="<?php echo esc_url( $image ); ?>">
		</div>
	<?php }
}

function pixelpop_site_transparent_header_logo_img() {

	if ( '' != get_theme_mod( 'pixelpop_transparent_header_logo', '' ) ) {
		$image = get_theme_mod( 'pixelpop_transparent_header_logo', '' );
		?>
		<div class="ppop-transparent-header-logo header-logo">
			<img itemprop="logo" class="ppop-header-transparent-logo-img" src="<?php echo esc_url( $image ); ?>">
		</div>
	<?php }
}

function pixelpop_site_name_and_tag() {
	?>
	<div class="header-site-info <?php if ( has_custom_logo() ) { ?>logo-active<?php } ?>">
		<?php
		if ( is_front_page() && is_home() ) :
			?>
			<h1 class="site-title"><span itemprop="name"><?php bloginfo( 'name' ); ?></span></h1>
			<?php
		else :
			?>
			<p class="site-title"><span itemprop="name"><?php bloginfo( 'name' ); ?></span></p>
			<?php
		endif;

		$pixelpop_description = get_bloginfo( 'description', 'display' );
		if ( $pixelpop_description || is_customize_preview() ) :
			?>
			<p itemprop="alternateName" class="site-description"><?php echo $pixelpop_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
		<?php endif; ?>

	</div><!-- .site-branding -->
	<?php
}

function pixelpop_header_main_navigation( $class = '', $do_actions = 'none', $close_btn = false ) {
	?>
	<nav id="site-navigation" class="main-navigation <?php echo esc_attr( $class ); ?>">

		<div class="site-navigation-content">

			<?php if ( 'desktop' === $do_actions ) { ?>

				<?php
				/**
				 * pixelpop_primary_nav_before hook.
				 *
				 * @since 1.0.0
				 */
				do_action( 'pixelpop_primary_nav_before' );
				?>

			<?php } elseif ( 'mobile' === $do_actions ) { ?>
				<?php
				/**
				 * pixelpop_primary_mobile_nav_before hook.
				 *
				 * @since 1.0.0
				 */
				do_action( 'pixelpop_primary_mobile_nav_before' );
				?>

			<?php } ?>

			<?php pixelpop()->display_primary_nav_menu( array( 'menu_id' => 'primary-menu' ) ); ?>

			<?php if ( 'desktop' === $do_actions ) { ?>

				<?php
				/**
				 * pixelpop_primary_nav_after hook.
				 *
				 * @since 1.0.0
				 */
				do_action( 'pixelpop_primary_nav_after' );
				?>

			<?php } elseif ( 'mobile' === $do_actions ) { ?>
				<?php
				/**
				 * pixelpop_primary_mobile_nav_after hook.
				 *
				 * @since 1.0.0
				 */
				do_action( 'pixelpop_primary_mobile_nav_after' );
				?>

			<?php } ?>

			<?php
			/**
			 * pixelpop_site_main_nav_after hook.
			 *
			 * @since 1.0.0
			 */
			do_action( 'pixelpop_site_main_nav_after' );
			?>

			<?php if ( $close_btn ) { ?>
				<div class="ppop-nav-close-btn-wrap z-pad-20 z-vis-focus-within">
					<button class="ppop-nav-close-btn button z-width-100"><?php echo esc_html( __( 'Close', 'pixelpop' ) ); ?></button>
				</div>
			<?php } ?>

		</div>

	</nav><!-- #site-navigation -->
	<?php
}

function pixelpop_header_icon_navigation() {
	?>
	<nav id="site-icon-navigation" class="icon-navigation">
		<ul class="icon-menu z-mar-0 z-pad-0 z-d-flex z-nav-menu" style="--nav-menu-height : var(--header-height)">

			<?php
			/**
			 * pixelpop_header_icon_navigation_items hook.
			 *
			 * @since 1.0.0
			 *
			 */
			do_action( 'pixelpop_header_icon_navigation_items' );

			?>

		</ul>
	</nav><!-- #site-navigation -->
	<?php
}

function pixelpop_mobile_header_search() {
	if ( true == get_theme_mod( 'pixelpop_mobile_menu_search', true ) ) {
		?>
		<div class="ppop-mobile-menu-search">
			<?php get_search_form(); ?>
		</div>
		<?php
	}
}


function pixelpop_header_icon_menu_search() {
	?>
	<li class="icon-menu-item ppop-header-search" style="position: unset;">
		<a href="#ppop-search" class="ppop-header-search-icon icon-menu-icon z-icon" title="<?php esc_attr_e( 'Search', 'pixelpop' ); ?>">
			<i class="ppop-icon ppop-icon-search"></i>
		</a>
		<div class="ppop-header-search-form z-bg-layout-primary z-position-absolute z-border-t z-border-b z-align-items-center z-width-100 z-justify-content-center z-pad-15 z-pad-l-30 z-pad-r-30" id="ppop-header-search">
			<span class="ppop-header-search-close" >
				<button class="ppop-keyboard-toggle search-close-toggle">Search</button>
				<span>⤫</span>
			</span>
			<?php get_search_form(); ?>
		</div>
	</li>
	<?php
}

function pixelpop_header_icon_menu_notification() {
	?>
	<li class="icon-menu-item ppop-header-notification">
		<span class="ppop-header-notification-icon icon-menu-icon" title="<?php esc_attr_e( 'Notifications', 'pixelpop' ); ?>">
			<i class="ppop-icon ppop-icon-bell"></i>
		</span>
	</li>
	<?php
}

if ( ! function_exists( 'pixelpop_woocommerce_header_cart' ) ) {
	/**
	 * Display Header Cart.
	 *
	 * @return void
	 */
	function pixelpop_woocommerce_header_cart() {

		if ( class_exists( 'WooCommerce' ) ) {
			if ( is_cart() ) {
				$class = 'current-menu-item';
			} else {
				$class = '';
			}
			?>
			<li class="icon-menu-item ppop-header-cart current <?php if ( false == get_theme_mod( 'pixelpop_mobile_header_cart_icon', true ) ) { ?>hide-in-mobile<?php } ?>">

				<span class="ppop-header-cart-content">

					<?php pixelpop_header_icon_menu_cart_link(); ?>

					<div class="ppop-minicart">
						<div class="ppop-header-woocart-heading z-d-flex z-align-items-center z-pad-15 z-pad-r-20 z-pad-l-20 z-border-b">
							<h2 class="z-fs-regular z-mar-0"><?php echo esc_html__( 'Cart', 'pixelpop' ); ?></h2>
						</div>
						<?php
						$instance = array(
							'title' => '',
						);

						the_widget( 'WC_Widget_Cart', $instance );
						?>

					</div>
				</span>
			</li>

			<?php
		}
	}
}

function pixelpop_header_icon_menu_switch_theme() {
	?>
	<li class="icon-menu-item ppop-user-switch-theme <?php if ( false == get_theme_mod( 'pixelpop_mobile_menu_theme_icon', true ) ) { ?>hide-in-mobile<?php } ?>">
		<span class="ppop-switch-theme-icon icon-menu-icon z-icon">
			<label id="switch" class="switch">
	            <input type="checkbox" onchange="toggleTheme()" id="theme-switch-button" name="theme-switch" value="1">
	            <i class="ppop-icon ppop-icon-moon ppop-dark-theme-icon"></i>
	        </label>
		</span>
	</li>
	<?php
}

function pixelpop_header_icon_menu_settings() {
	?>
	<li class="icon-menu-item ppop-user-settings">
		<span class="ppop-user-settings-icon icon-menu-icon">
			<i class="ppop-icon ppop-icon-settings"></i>
		</span>
		<div class="ppop-user-settings-box">
			<div class="user-settings-header">
				<span class="user-settings-box-close">⤫</span>
			</div>
			<div class="user-settings-content">
				<ul>
					<li>
						<div class="user-settings-item ppop-theme-switch">
							<span class="settings-item-title">
								Switch to <span id="ppop-theme-text">Dark</span> Theme
							</span>
							<label id="switch" class="switch">
					            <input type="checkbox" onchange="toggleTheme()" id="theme-switch-button" name="theme-switch" value="1">
					            <i class="ppop-icon ppop-icon-moon ppop-dark-theme-icon"></i>
					        </label>

						</div>
					</li>
				</ul>
			</div>
		</div>
	</li>
	<?php
}

function pixelpop_below_header() {
	?>
	<div class="header-below-content <?php pixelpop_header_below_content_class(); ?>">
		<?php
		/**
		 * pixelpop_header_below_content hook.
		 *
		 * @since 1.0.0
		 *
		 */
		do_action( 'pixelpop_header_below_content' ); ?>
	</div>
	<?php
}

function pixelpop_content_start() {
	?>
	<div id="content" class="site-content">

		<?php
		/**
		 * pixelpop_before_main_content hook.
		 *
		 * @since 1.0.0
		 *
		 */
		do_action( 'pixelpop_before_main_content' );
}

/**
 * Template Contentent Width Wrapper Before
 */
function pixelpop_content_width_wrapper_before() {
	?>
	<div class="col-full">
	<?php
}
