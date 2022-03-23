<?php
/**
 * Template part for displaying a post's content
 *
 * @package pixelpop
 */

namespace PixelPop;

?>

<div class="entry-content">
	<?php
	the_content(
		sprintf(
			wp_kses(
				/* translators: %s: Name of current post. Only visible to screen readers */
				__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'pixelpop' ),
				array(
					'span' => array(
						'class' => array(),
					),
				)
			),
			get_the_title()
		)
	);

	wp_link_pages(
		array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'pixelpop' ),
			'after'  => '</div>',
		)
	);
	?>
</div><!-- .entry-content -->
