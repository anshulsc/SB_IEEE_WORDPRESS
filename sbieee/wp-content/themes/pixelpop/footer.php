<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package pixelpop
 */

namespace PixelPop;

	/**
	 * The pixelpop_content_end hook.
	 *
	 * @since 1.0.0
	 *
	 * @hooked pixelpop_content_end - 10
	 */
	do_action( 'pixelpop_content_end' );

	/**
	 * The pixelpop_footer hook.
	 *
	 * @since 1.0.0
	 */
	do_action( 'pixelpop_footer' ); ?>

</div><!-- #page -->

<?php
/**
 * The pixelpop_after_site hook.
 *
 * @since 1.0.0
 */
do_action( 'pixelpop_after_site' );
?>

<?php wp_footer(); ?>

</body>
</html>
