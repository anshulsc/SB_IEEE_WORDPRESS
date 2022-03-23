<?php
/**
 * Template part for displaying Primary Header
 *
 * @package pixelpop
 */

namespace PixelPop;

?>
<div class="main-header">

	<?php
	/**
	 * The pixelpop_before_header_wrap hook.
	 *
	 * @since 1.0.0
	 */
	do_action( 'pixelpop_before_header_wrap' );
	?>

	<div class="col-full">

		<div class="site-header-container">

			<?php
			/**
			 * The pixelpop_header_content_before hook.
			 *
			 * @since 1.0.0
			 *
			 * @hooked pixelpop_header_mobile_hamburger - 10
			 */
			do_action( 'pixelpop_header_content_before' );
			?>

			<?php
			/**
			 * The pixelpop_header_content hook.
			 *
			 * @since 1.0.0
			 *
			 * @hooked pixelpop_header_site_branding - 10
			 */
			do_action( 'pixelpop_primary_header_content' );
			?>

			<?php
			/**
			 * The pixelpop_header_content_after hook.
			 *
			 * @since 1.0.0
			 */
			do_action( 'pixelpop_header_content_after' );
			?>

		</div><!-- .site-header-container -->

	</div><!-- .col-full -->

	<?php
	/**
	 * The pixelpop_after_header_wrap hook.
	 *
	 * @since 1.0.0
	 */
	do_action( 'pixelpop_after_header_wrap' );
	?>

</div><!-- .main-header -->

<?php
