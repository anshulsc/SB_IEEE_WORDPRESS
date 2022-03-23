<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 */
if ( ! function_exists( 'avadanta_invest_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function avadanta_invest_posted_by() {
		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html( '%s', 'post author', 'avadanta-invest' ),
			'<a href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '"><p>' . esc_html( get_the_author() ) . '</p></a>'
		);

		echo  $byline ; // WPCS: XSS OK.

	}
endif;