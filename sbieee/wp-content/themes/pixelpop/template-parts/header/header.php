<?php
/**
 * Template part for displaying the header
 *
 * @package pixelpop
 */

namespace PixelPop;

/**
 * The pixelpop_before_header hook.
 *
 * @since 1.0.0
 */
do_action( 'pixelpop_before_header' );

?>
<header itemtype="http://schema.org/WPHeader" itemscope="itemscope" id="masthead" class="site-header <?php pixelpop_header_class(); ?>" <?php if ( get_header_image() ) { ?>style="background-image: url('<?php header_image(); ?>')"<?php } ?>>

	<?php
	/**
	 * The pixelpop_before_main_header hook.
	 *
	 * @since 1.0.0
	 */
	do_action( 'pixelpop_before_main_header' );

	/**
	 * The pixelpop_main_header hook.
	 *
	 * @since 1.0.0
	 */
	do_action( 'pixelpop_main_header' );

	/**
	 * The pixelpop_after_main_header hook.
	 *
	 * @since 1.0.0
	 */
	do_action( 'pixelpop_after_main_header' );
	?>

</header><!-- #masthead -->
<?php

	/**
	 * The pixelpop_after_header hook.
	 *
	 * @since 1.0.0
	 */
	do_action( 'pixelpop_after_header' );
