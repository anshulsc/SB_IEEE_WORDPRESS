<?php
/**
 * Template part for displaying a pagination
 *
 * @package pixelpop
 */

namespace PixelPop;

the_posts_pagination(
	array(
		'mid_size'           => 2,
		'prev_text'          => _x( 'Previous', 'previous set of search results', 'pixelpop' ),
		'next_text'          => _x( 'Next', 'next set of search results', 'pixelpop' ),
		'screen_reader_text' => __( 'Page navigation', 'pixelpop' ),
	)
);
