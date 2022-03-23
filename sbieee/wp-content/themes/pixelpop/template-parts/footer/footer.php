<?php
/**
 * Template part for displaying the footer
 *
 * @package pixelpop
 */

namespace PixelPop;

/**
 * The pixelpop_before_footer hook.
 *
 * @since 1.0.0
 */
do_action( 'pixelpop_before_footer' ); ?>

<footer itemtype="http://schema.org/WPFooter" itemscope class="site-footer z-bg-layout-primary z-border-t">

	<?php
	/**
	 * The pixelpop_before_footer_content hook.
	 *
	 * @since 1.0.0
	 */
	do_action( 'pixelpop_before_footer_content' );

	/**
	 * Functions hooked in to pixelpop_footer_content action
	 *
	 * @hooked pixelpop_footer_branding   - 10
	 * @hooked pixelpop_footer_widgets    - 20
	 * @hooked pixelpop_footer_info       - 30
	 */
	do_action( 'pixelpop_footer_content' );

	/**
	 * The pixelpop_after_footer_content hook.
	 *
	 * @since 1.0.0
	 */
	do_action( 'pixelpop_after_footer_content' );
	?>

</footer><!--.site-footer-->
<?php

/**
 * The pixelpop_after_footer hook.
 *
 * @since 1.0.0
 */
do_action( 'pixelpop_after_footer' );
