<?php
/**
 * Template part for displaying single page.
 *
 * @package pixelpop
 */

namespace PixelPop;

/**
 * The pixelpop_page_main_content_before hook.
 *
 * @since 1.0.0
 */
do_action( 'pixelpop_page_main_content_before' );
?>

<article itemtype="https://schema.org/CreativeWork" itemscope="itemscope" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php
	/**
	 * The pixelpop_page_content_before hook.
	 *
	 * @hooked pixelpop_thumbnail  - 10
	 * @hooked pixelpop_post_header  - 10
	 *
	 * @since 1.0.0
	 */
	do_action( 'pixelpop_page_content_before' );
	?>

	<div class="ppop-custom-content" itemprop="text">

		<?php
		/**
		 * The pixelpop_page_custom_before hook.
		 *
		 * @since 1.0.0
		 */
		do_action( 'pixelpop_page_custom_before' );

		the_content();

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'pixelpop' ),
				'after'  => '</div>',
			)
		);


		/**
		 * The pixelpop_page_custom_after hook.
		 *
		 * @hooked pixelpop_post_pagation  - 10
		 *
		 * @since 1.0.0
		 */
		do_action( 'pixelpop_page_custom_after' );


		?>
	</div><!-- .ppop-custom-content -->

	<?php
	/**
	 * The pixelpop_page_content_after hook.
	 *
	 * @hooked pixelpop_post_comment  - 10
	 *
	 * @since 1.0.0
	 */
	do_action( 'pixelpop_page_content_after' );
	?>

</article><!-- #post-<?php the_ID(); ?> -->

<?php
/**
 * The pixelpop_page_main_content_after hook.
 *
 * @since 1.0.0
 */
do_action( 'pixelpop_page_main_content_after' );
?>
