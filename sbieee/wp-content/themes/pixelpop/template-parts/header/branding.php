<?php
/**
 * Template part for displaying the header branding
 *
 * @package pixelpop
 */

namespace PixelPop;

?>

<div itemtype="https://schema.org/Organization" itemscope="itemscope" class="site-branding <?php pixelpop_header_branding_class(); ?>">
	<?php
	/**
	 * The pixelpop_site_branding_before hook.
	 *
	 * @since 1.0.0
	 */
	do_action( 'pixelpop_site_branding_before' );
	?>

	<a class="ppop-site-branding-link" itemprop="url" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">

		<?php
		/**
		 * The pixelpop_site_branding_content hook.
		 *
		 * @since 1.0.0
		 *
		 * @hooked pixelpop_main_logo - 10
		 * @hooked pixelpop_site_name_and_tag - 20
		 */
		do_action( 'pixelpop_site_branding_content' );
		?>

	</a>

	<?php
	/**
	 * The pixelpop_site_branding_before hook.
	 *
	 * @since 1.0.0
	 */
	do_action( 'pixelpop_site_branding_before' );

	?>

</div><!-- .site-branding -->

