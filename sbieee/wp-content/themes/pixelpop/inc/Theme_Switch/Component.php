<?php
/**
 * PixelPop\Theme_Switch\Component class
 *
 * @package pixelpop
 */

namespace PixelPop\Theme_Switch;

use PixelPop\Component_Interface;
use function add_action;
use function add_theme_support;
use function add_image_size;

/**
 * Class for managing Dark/Light theme support.
 */
class Component implements Component_Interface {

	/**
	 * Gets the unique identifier for the theme component.
	 *
	 * @return string Component slug.
	 */
	public function get_slug() : string {
		return 'switch_theme';
	}

	/**
	 * Adds the action and filter hooks to integrate with WordPress.
	 */
	public function initialize() {
		add_action( 'wp_head', array( $this, 'pixelpop_switch_theme_style' ) );
		add_action( 'wp_head', array( $this, 'pixelpop_switch_theme_script' ) );
		add_filter( 'body_class', array( $this, 'pixelpop_theme_body_class' ) );
	}

	/**
	 * Adds Dark/Light Theme Styles.
	 */
	public function pixelpop_switch_theme_style() {

		$color_primary = get_theme_mod( 'pixelpop_primary_color', '#ff5a6e' );
		$color_secondary = get_theme_mod( 'pixelpop_secondary_color', '#ff8a6e' );

		$link_color = get_theme_mod( 'pixelpop_link_color', '#ff5a6e' );
		$link_hover_color = get_theme_mod( 'pixelpop_link_hover_color', '#ff8a6e' );

		?>

		<style type="text/css">
			.ppop-light-theme {
				--color-primary: <?php echo esc_attr( $color_primary ) ?>;
				--color-secondary: <?php echo esc_attr( $color_secondary ) ?>;
			}
			.ppop-dark-theme {
				--color-primary: <?php echo esc_attr( $color_primary ) ?>;
				--color-secondary: <?php echo esc_attr( $color_secondary ) ?>;
			}

			a{
				color: <?php echo esc_attr( $link_color ) ?>;
			}

			a:hover,
			a:focus{
				color: <?php echo esc_attr( $link_hover_color ) ?>;
			}

			select {
				-webkit-appearance: none;
				-moz-appearance: none;
				appearance: none;
				background-image: url(<?php echo esc_url( get_template_directory_uri() . '/assets/images/down-arrow.svg' ); ?>);
				background-repeat: no-repeat;
				background-position: right 1rem center;
				padding-right: 40px;
				background-size: 10px;
				cursor: pointer;
			}

		</style>

		<?php

	}

	/**
	 * Adds Dark/Light Theme Scripts.
	 */
	public function pixelpop_switch_theme_script() {
		?>
		<script type="text/javascript">

			jQuery( document ).ready( function( $ ) {
				$( '#theme-switch-button' ).keypress( function( e ) {
					if ( ( e.keyCode ? e.keyCode : e.which ) === 13 ) {
						$( this ).trigger( 'click' );
					}
				} );
			} );

			const toggleThemeButton = document.querySelector('button');
			// function to set a given theme/color-scheme
			function setTheme(themeName) {
				localStorage.setItem('theme', themeName);
				document.documentElement.className = themeName;
			}

			// function to toggle between light and dark theme
			function toggleTheme() {
				if (localStorage.getItem('theme') === 'ppop-light-theme') {
					setTheme('ppop-dark-theme');
				} else {
					setTheme('ppop-light-theme');
				}
			}

			// Immediately invoked function to set the theme on initial load
			(function () {
				if (localStorage.getItem('theme') === 'ppop-dark-theme') {
					setTheme('ppop-dark-theme');
				} else {
					setTheme('ppop-light-theme');

				}
			})();
		</script>
		<?php

	}

	/**
	 * Add 'woocommerce-active' class to the body tag.
	 *
	 * @param  array $classes CSS classes applied to the body tag.
	 * @return array $classes modified to include 'woocommerce-active' class.
	 */
	public function pixelpop_theme_body_class( $classes ) {
		$classes[] = 'pixelpop-theme';

		return $classes;
	}

	/**
	 * Adds custom image sizes.
	 */
	public function pixelpop_switch_theme_scripts() {

		$color_primary = get_theme_mod( 'pixelpop_primary_color', '#ff5a6e' );
		$color_secondary = get_theme_mod( 'pixelpop_secondary_color', '#ff8a6e' );
		$link_color = get_theme_mod( 'pixelpop_link_color', '#ff5a6e' );
		$link_hover_color = get_theme_mod( 'pixelpop_link_hover_color', '#ff8a6e' );

		$transparent_header_site_title_color = get_theme_mod( 'pixelpop_transparent_header_site_title_color', '#fff' );
		$transparent_header_site_tagline_color = get_theme_mod( 'pixelpop_transparent_header_site_tagline_color', '#eee' );
		$transparent_header_menu_color = get_theme_mod( 'pixelpop_transparent_header_menu_color', '#fff' );
		$transparent_header_menu_hover_color = get_theme_mod( 'pixelpop_transparent_header_menu_hover_color', '#ddd' );
		$transparent_header_border_color = get_theme_mod( 'pixelpop_transparent_header_bottom_border_color', 'rgba(255,255,255,0.1)' );

		$pixelpop_container_width = get_theme_mod( 'pixelpop_container_width', 1200 );
		$pixelpop_narrow_content_max_width = get_theme_mod( 'pixelpop_narrow_content_max_width', 750 );
		$pixelpop_container_content_difference = $pixelpop_container_width - $pixelpop_narrow_content_max_width;
		$pixelpop_align_wide_expand = $pixelpop_container_content_difference / 2;
		?>

		<style type="text/css">
			.ppop-light-theme {
				--color-primary: <?php echo esc_attr( $color_primary ) ?>;
				--color-secondary: <?php echo esc_attr( $color_secondary ) ?>;
				--color-layout-1: #fff;
				--color-layout-2: #f6f6f6;
				--color-layout-3: #f1f1f1;
				--font-color: #333;
				--font-color-2: #999;
				--heading-color: #000;
				--color-layout-border: #e6e6e6;
				--color-layout-border-2: #ccc;
				--color-layout-border-3: #bbb;
			}
			.ppop-dark-theme {
				--color-primary: <?php echo esc_attr( $color_primary ) ?>;
				--color-secondary: <?php echo esc_attr( $color_secondary ) ?>;
				--color-layout-1: #222222;
				--color-layout-2: #111111;
				--color-layout-3: #343434;
				--font-color: #eee;
				--font-color-2: #777;
				--heading-color: #fff;
				--color-layout-border: #2d2d2d;
				--color-layout-border-2: #444;
				--color-layout-border-3: #777;
			}

			a{
				color: <?php echo esc_attr( $link_color ) ?>;
			}

			a:hover,
			a:focus{
				color: <?php echo esc_attr( $link_hover_color ) ?>;
			}

			body {
				background: var(--color-layout-2);
				color: var(--font-color);
			}

			.site-header{
				background: var(--color-layout-1);
				border-bottom-color: var( --color-layout-border );
			}

			/*.main-navigation ul .sub-menu,
			.ppop-header-account-menu.logged-in .account-menu-box,
			.ppop-header-account-menu.logged-out .account-menu-box{
				background: var(--color-layout-3);
			}*/

			h1,
			h2,
			h3,
			h4,
			h5,
			h6,
			.site-branding .site-title a{
				color: var(--heading-color);
			}

			.main-navigation li a,
			.icon-navigation .icon-menu .icon-menu-item a,
			.icon-navigation .icon-menu .icon-menu-item i
			{
				color: var(--font-color);
			}

			.ppop-hamburger-menu span,
			.ppop-hamburger-menu span:after,
			.ppop-hamburger-menu span:before
			{
				background: var(--font-color);
			}

			.main-navigation li a:hover,
			.main-navigation li.current-menu-item a,
			.icon-navigation .icon-menu .icon-menu-item a:hover,
			.icon-navigation .icon-menu .icon-menu-item a:hover i,
			.icon-navigation .icon-menu .icon-menu-item > span:hover,
			.icon-navigation .icon-menu .icon-menu-item > span:hover i,
			.main-navigation .menu-item-has-children:hover:after,
			.main-navigation li a:focus,
			.icon-navigation .icon-menu .icon-menu-item a:focus,
			.icon-navigation .icon-menu .icon-menu-item a:focus i,
			.icon-navigation .icon-menu .icon-menu-item > span:focus,
			.icon-navigation .icon-menu .icon-menu-item > span:focus i,
			.main-navigation .menu-item-has-children:focus:after{
				color: var(--color-primary);
			}

			.comment-footer a:hover,
			.excerpt-meta .author a:hover,
			.posted-on .entry-date:hover {
				color: var(--color-primary);
			}

			.ppop-layout-box{
				background: var(--color-layout-1);
				border-radius: 5px;
				border: var(--layout-border);
				padding: 15px;
			}

			.ppop-layout-box.no-border{
				border: 0;
			}

			.ppop-layout-box.no-padding{
				padding: 0;
			}

			.ppop-layout-box.extra-padding{
				padding: 30px;
			}

			.ppop-widget ul li a:hover,
			.ppop-widget ol li a:hover,
			.ppop-widget a:hover{
				color: var(--color-primary);

			}

			@media (max-width: 767px){
				#site-navigation {
					background: var(--color-layout-1);
					border-top: var(--layout-border);
					border-right: var(--layout-border);
				}

				#site-navigation .ppop-header-profile.mobile .mobile-header-profile-link,
				#site-navigation .ppop-header-profile.mobile .mobile-header-profile-link i,
				#site-navigation ul li a,
				.mob-menu-toggle i{
					color: var(--font-color);
				}

				.main-navigation li a:hover,
				.icon-navigation .icon-menu .icon-menu-item a:hover,
				.icon-navigation .icon-menu .icon-menu-item a:hover i{
					color: var(--color-primary);
				}
			}

			select{
				background-image: url();
			}

			select {
				-webkit-appearance: none;
				background-image: url(<?php echo esc_url(get_template_directory_uri() . "/assets/images/down-arrow.svg"); ?>);
				background-repeat: no-repeat;
				background-position: right 1rem center;
				padding-right: 40px;
				background-size: 10px;
				cursor: pointer;
			}

			@media (min-width: 768px){

				.site-header.transparent-header .site-branding .site-title a{
					color: <?php echo esc_attr( $transparent_header_site_title_color ) ?>;
				}

				.site-header.transparent-header .site-branding .site-description{
					color: <?php echo esc_attr( $transparent_header_site_tagline_color ) ?>;
				}

				.site-header.transparent-header .main-navigation li a,
				.site-header.transparent-header .icon-navigation .icon-menu .icon-menu-item a,
				.site-header.transparent-header .icon-navigation .icon-menu .icon-menu-item i,
				.site-header.transparent-header .icon-navigation .icon-menu .icon-menu-item > span:hover .switch .ppop-dark-theme-icon{
					color: <?php echo esc_attr( $transparent_header_menu_color ) ?>;
				}

				.site-header.transparent-header .main-navigation li a:hover,
				.site-header.transparent-header .main-navigation li.current-menu-item a,
				.site-header.transparent-header .icon-navigation .icon-menu .icon-menu-item a:hover,
				.site-header.transparent-header .icon-navigation .icon-menu .icon-menu-item i:hover,
				.site-header.transparent-header .icon-navigation .icon-menu .icon-menu-item > span:hover {
					color: <?php echo esc_attr( $transparent_header_menu_hover_color ) ?>;
				}

				.site-header.transparent-header{
					border-bottom-color: <?php echo esc_attr( $transparent_header_border_color ) ?>;
				}

				.site-header.primary-layout-center.transparent-header .site-branding:before,
				.site-header.preview-primary-layout-center.transparent-header .site-branding:before{
					background: <?php echo esc_attr( $transparent_header_border_color ) ?>;
				}

				/*.ppop-layout-narrow-content #primary.full-width .alignwide {
					margin-left  : -<?php echo esc_attr( $pixelpop_align_wide_expand ) ?>px;
					margin-right : -<?php echo esc_attr( $pixelpop_align_wide_expand ) ?>px;
					max-width    : <?php echo esc_attr( $pixelpop_container_width ) ?>px;
				}*/
			}

			@media (max-width: 900px) and (min-width: 768px){
				.site-header.transparent-header .site-branding{
					border-bottom-color: <?php echo esc_attr( $transparent_header_border_color ) ?>;
				}
			}
		</style>

		<script type="text/javascript">
			// function to set a given theme/color-scheme
			function setTheme(themeName) {
				localStorage.setItem('theme', themeName);
				document.documentElement.className = themeName;
			}

			// function to toggle between light and dark theme
			function toggleTheme() {
				if (localStorage.getItem('theme') === 'ppop-light-theme') {
					setTheme('ppop-dark-theme');
				} else {
					setTheme('ppop-light-theme');
				}
			}

			// Immediately invoked function to set the theme on initial load
			(function () {
				if (localStorage.getItem('theme') === 'ppop-dark-theme') {
					setTheme('ppop-dark-theme');
				} else {
					setTheme('ppop-light-theme');

				}
			})();
		</script>

		<?php if ( class_exists( 'WooCommerce' ) && is_account_page() ) { ?>

			<script type="text/javascript">
				// function to set a given theme/color-scheme
				function setWooDash(WooDashStatus) {
					localStorage.setItem('WooDash', WooDashStatus);
					document.getElementById("ppop-myaccount-wrap").className = WooDashStatus;
				}

				// function to toggle between light and dark theme
				function toggleWooDash() {
					if (localStorage.getItem('WooDash') === 'ppop-woodash-off') {
						setWooDash('ppop-woodash-on');
					} else {
						setWooDash('ppop-woodash-off');
					}
				}

				// Immediately invoked function to set the theme on initial load
				(function () {
					if (localStorage.getItem('WooDash') === 'ppop-woodash-on') {
						setWooDash('ppop-woodash-on');
					} else {
						setWooDash('ppop-woodash-off');

					}
				})();
			</script>

		<?php } ?>

		<?php
	}
}
