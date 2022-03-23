<?php
/**
 * Calls in main content functions using theme hooks.
 *
 * @package pixelpop
 */

namespace PixelPop;

use function PixelPop\pixelpop;
use function add_action;

defined( 'ABSPATH' ) || exit;


/**
 * PixelPop Archive Content Loop
 *
 * @since 1.0.0
 */
function pixelpop_archive_content_loop( $archive_type ) {

	if ( 'search' == $archive_type ) {
		/**
		 * pixelpop_search_form hook.
		 *
		 * @ Hoocked pixelpop_search_page_form
		 *
		 * @since 1.0.0
		 */
		do_action( 'pixelpop_search_form' );
	}

	?>
	<div class="ppop-content-wrap <?php pixelpop_container_class(); ?>">

		<?php
		/**
		 * pixelpop_layout_primary_before hook.
		 *
		 * @since 1.0.0
		 */
		do_action( 'pixelpop_layout_primary_before' );
		?>

		<main id="primary" class="site-main">
			<div class="content-area">

				<div class="ppop-post-archive-wrap z-d-flex z-flex-wrap ppop-<?php echo esc_attr( $archive_type ); ?> <?php pixelpop_blog_archive_wrap_class() ?>">

					<?php
					/**
					 * pixelpop_archive_loop_before hook.
					 *
					 *
					 * @since 1.0.0
					 */
					do_action( 'pixelpop_archive_loop_before' ); ?>

					<?php if (have_posts()) : while (have_posts()) : the_post();

						/**
						 * Functions hooked into pixelpop_template_parts_archive add_action
						 *
						 * @hooked pixelpop_template_parts_archive  - 10
						 *
						 * @since 1.0.0
						 */
						do_action( 'pixelpop_template_parts_archive' );

					endwhile;

					/**
					 * pixelpop_archive_pagination hook.
					 *
					 *
					 * @since 1.0.0
					 */
					do_action( 'pixelpop_archive_pagination' );

					else :

						get_template_part( 'template-parts/content', 'none' );

					endif; ?>

					<?php
					/**
					 * pixelpop_home_loop_after hook.
					 *
					 *
					 * @since 1.0.0
					 */
					do_action( 'pixelpop_home_loop_after' ); ?>

				</div><!-- .ppop-post-archive-wrap -->

			</div><!-- .content-area -->
		</main><!-- #primary -->

		<?php
		/**
		 * pixelpop_layout_primary_after hook.
		 *
		 * @hooked pixelpop_get_sidebar  - 10
		 * @since 1.0.0
		 */
		do_action( 'pixelpop_layout_primary_after' );
		?>

	</div><!-- ppop-content-wrap -->
	<?php
}

/**
 * PixelPop get sidebar fuctions.
 *
 * @since 1.0.0
 */
function pixelpop_get_sidebar() {
	get_sidebar();
}

/**
 * PixelPop get sidebar fuctions.
 *
 * @since 1.0.0
 */
function pixelpop_primary_sidebar() {
	?>
	<aside id="secondary" class="primary-sidebar widget-area">
		<h2 class="screen-reader-text"><?php esc_html_e( 'Asides', 'pixelpop' ); ?></h2>
		<?php pixelpop()->display_primary_sidebar(); ?>
	</aside><!-- #secondary -->
	<?php
}

/**
 * PixelPop Archive Post Main
 *
 * @since 1.0.0
 */
function pixelpop_archive_main() {

	$archive_type = '';

	if ( is_home() ) {
		$archive_type = 'blog';
	}
	if ( is_archive() ) {
		$archive_type = 'archive';
	}
	if ( is_search() ) {
		$archive_type = 'search';
	}
	pixelpop_archive_content_loop( $archive_type );
}

/**
 * PixelPop Single Content Loop
 *
 * @since 1.0.0
 */
function pixelpop_single_content_loop( $post_type ) {
	?>
	<div class="ppop-content-wrap <?php pixelpop_container_class(); ?>">

		<?php
		/**
		 * pixelpop_layout_primary_before hook.
		 *
		 * @since 1.0.0
		 */
		do_action( 'pixelpop_layout_primary_before' );
		?>

		<main id="primary" class="site-main">
			<div class="content-area">

				<?php if (have_posts()) :

					do_action( 'pixelpop_single_content_top' );

					while (have_posts()) : the_post();

						if ( 'post' == $post_type ) {
							/**
							 * Functions hooked into pixelpop_template_parts_post add_action
							 *
							 * @hooked pixelpop_template_parts_post  - 10
							 *
							 * @since 1.0.0
							 */
							do_action( 'pixelpop_template_parts_post' );
						} else {
							/**
							 * Functions hooked into pixelpop_template_parts_page add_action
							 *
							 * @hooked pixelpop_template_parts_page  - 10
							 *
							 * @since 1.0.0
							 */
							do_action( 'pixelpop_template_parts_page' );
						}

					endwhile; // End of the loop.

					do_action( 'pixelpop_single_content_bottom' );

				else :

					get_template_part( 'template-parts/content', 'none' );

				endif;
				?>

			</div><!-- .content-area -->
		</main><!-- #primary -->

		<?php
		/**
		 * pixelpop_layout_primary_after hook.
		 *
		 * @hooked pixelpop_get_sidebar  - 10
		 * @since 1.0.0
		 */
		do_action( 'pixelpop_layout_primary_after' );
		?>

	</div><!-- ppop-content-wrap -->
	<?php
}

/**
 * PixelPop Single Post Main
 *
 * @since 1.0.0
 */
function pixelpop_single_main() {

	$post_type = '';

	if ( is_single() ) {
		$post_type = 'post';
	}
	if ( is_page() ) {
		$post_type = 'page';
	}
	pixelpop_single_content_loop( $post_type );
}

/**
 * PixelPop Template Part Post
 *
 * @since 1.0.0
 */
function pixelpop_template_parts_post() {
	get_template_part( 'template-parts/content/content', 'single', get_post_type() );
}

/**
 * PixelPop Template Part Page
 *
 * @since 1.0.0
 */
function pixelpop_template_parts_page() {
	get_template_part( 'template-parts/content/content', 'page', get_post_type() );
}

/**
 * PixelPop Template Part Archive
 *
 * @since 1.0.0
 */
function pixelpop_template_parts_archive() {

	/**
	 * pixelpop_main_blog_home_before hook.
	 *
	 *
	 * @since 1.0.0
	 */
	do_action( 'pixelpop_main_blog_home_before' ); ?>

	<div class = "ppop-single-post z-br-5 z-border z-bg-layout-primary z-width-100 z-mar-b-15 ppop-layout-box z-border <?php if( is_sticky() && ( is_front_page() || is_home() ) ) {?>is-sticky post-layout-inline<?php } ?> <?php if ( has_post_thumbnail() ) { ?>has-thumb<?php }else{?>no-thumb<?php } ?>">
		<article itemtype="https://schema.org/CreativeWork" itemscope="itemscope" id="post-<?php the_ID(); ?>" <?php post_class() ?>>

			<?php
			/**
			 * Functions hooked into pixelpop_blog_home_content_before add_action
			 *
			 * @hooked pixelpop_blog_list_thumbnail  - 10
			 *
			 * @since 1.0.0
			 */
			do_action( 'pixelpop_blog_home_content_before' ); ?>

			<div class="ppop-excerpt-container z-pad-30 z-pad-b-20 z-lm-pad-20 z-display z-d-flex z-flex-column z-flex-grow-1  <?php if ( ! has_post_thumbnail() ) { ?>full<?php } ?>">

				<?php
				/**
				 * Functions hooked into pixelpop_blog_home_content add_action
				 *
				 * @hooked pixelpop_blog_list_header  - 10
				 * @hooked pixelpop_blog_list_excerpt  - 20
				 * @hooked pixelpop_blog_list_footer  - 30
				 *
				 * @since 1.0.0
				 */
				do_action( 'pixelpop_blog_home_content' ); ?>

			</div>

			<?php
			/**
			 * pixelpop_blog_home_content_after hook
			 *
			 * @since 1.0.0
			 */
			do_action( 'pixelpop_blog_home_content_after' ); ?>

		</article>
	</div>

	<?php
	/**
	 * pixelpop_main_blog_home_after hook.
	 *
	 *
	 * @since 1.0.01.0.0
	 */
	do_action( 'pixelpop_main_blog_home_after' );
}


/**
 * PixelPop Main SideBar
 *
 * @since 1.0.0
 */
function pixelpop_main_sidebar(){

	if ( is_active_sidebar( 'sidebar-1' )  ) : ?>
		<div itemtype="http://schema.org/WPSideBar" itemscope id="secondary" class="secondary sticky-sidebar">
			<div class="ppop-sidebar">
				<div class="ppop-widget-area">
					<?php dynamic_sidebar( 'sidebar-1' ); ?>
				</div><!--.ppop-widget-area-->
			</div><!--.ppop-sidebar-->
		</div><!--.secondary-->
	<?php endif;

}

/**
 * PixelPop Post Thumbnail
 *
 * @since 1.0.0
 */
function pixelpop_thumbnail(){

	if ( has_post_thumbnail() ): ?>
			<div class='ppop-single-featured-img'>
				<?php pixelpop_post_thumbnail(); ?>
			</div><!--.ppop-single-featured-img-->
	<?php endif;

}

/**
 * Displays an optional post thumbnail.
 *
 * Wraps the post thumbnail in an anchor element on index views, or a div
 * element when on single views.
 */
function pixelpop_post_thumbnail() {
	if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
		return;
	}

	if ( is_singular() ) :
		?>

		<div class="post-thumbnail">
			<?php the_post_thumbnail(); ?>
		</div><!-- .post-thumbnail -->

	<?php else : ?>

		<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
			<?php
				the_post_thumbnail(
					'post-thumbnail',
					array(
						'alt' => the_title_attribute(
							array(
								'echo' => false,
							)
						),
					)
				);
			?>
		</a>

		<?php
	endif; // End is_singular().
}

if ( ! function_exists( 'pixelpop_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function pixelpop_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf(
			$time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			/* translators: %s: post date. */
			esc_html_x( '%1$s Posted on %2$s %3$s', 'post date', 'pixelpop' ),
			'<span class="screen-reader-text">',
			'</span>',
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		echo '<span class="posted-on">' . $posted_on . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}
endif;

if ( ! function_exists( 'pixelpop_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function pixelpop_posted_by() {
		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( '%1$s Posted by %2$s %3$s', 'post author', 'pixelpop' ),
			'<span class="screen-reader-text">',
			'</span>',
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		echo '<span class="byline"> ' . $byline . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}
endif;

if ( ! function_exists( 'pixelpop_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function pixelpop_entry_footer() {

			// Hide category and tag text for pages.
			if ( 'post' === get_post_type() ) {
				?> <div class="ppop-single-post-footer z-pad-t-20 z-pad-b-20 z-mar-t-10 z-border-t z-text-uppercase z-fw-700 z-d-flex z-flex-wrap z-justify-content-between"> <?php
					/* translators: used between list items, there is a space after the comma */
					$categories_list = get_the_category_list( esc_html__( ', ', 'pixelpop' ) );
					if ( $categories_list ) {
						/* translators: 1: list of categories. */
						printf( '<span class="cat-links z-mar-r-30 z-pad-t-5 z-pad-b-5 z-position-relative z-pad-l-20">' . esc_html__( 'Categories:  %1$s', 'pixelpop' ) . '</span>', $categories_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					}

					/* translators: used between list items, there is a space after the comma */
					$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'pixelpop' ) );
					if ( $tags_list ) {
						/* translators: 1: list of tags. */
						printf( '<span class="tags-links z-pad-t-5 z-pad-b-5 z-position-relative z-pad-l-20">' . esc_html__( 'Tagged:  %1$s', 'pixelpop' ) . '</span>', $tags_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					}
				?> </div> <?php
			}

	}
endif;

/**
 * PixelPop Single Post Article open
 *
 * @since 1.0.0
 */
function pixelpop_single_post_article_start(){

	if ( is_single() ): ?>
		<article itemtype="https://schema.org/CreativeWork" itemscope="itemscope" id="post-<?php the_ID(); ?>" <?php post_class() ?>>
	<?php endif;

}

/**
 * PixelPop Single Post Article close
 *
 * @since 1.0.0
 */
function pixelpop_single_post_article_end(){

	if ( is_single() ): ?>
		</article>
	<?php endif;

}


/**
 * PixelPop Single Post Full-width Thumbnail
 *
 * @since 1.0.0
 */
function pixelpop_single_fullwidth_thumbnail(){

	$pixelpop_comment_count = get_comments_number();

	if ( has_post_thumbnail() ): ?>
			<div class='ppop-single-fullwidth-thumbnail'>
				<div itemprop="image" class='ppop-single-featured-img' style='background-image: url(<?php if ( has_post_thumbnail() ) { the_post_thumbnail_url();} ?>)'>
				</div>
			</div><!--.ppop-single-featured-img-->
	<?php endif;

}


/**
 * PixelPop Post Header
 *
 * @since 1.0.0
 */
function pixelpop_post_header(){

	do_action( 'pixelpop_before_post_header' );

	the_title( '<h1 itemprop="headline" class="ppop-post-title ">', '</h1>' );

	do_action( 'pixelpop_after_post_header' );

}


/**
 * PixelPop Post Meta
 *
 * @since 1.0.0
 */
function pixelpop_post_meta(){
	?>
	<div class="single-excerpt-meta z-d-flex z-pad-t-20 z-pad-b-20 z-mar-b-20 z-border-b z-border-t z-lm-flex-column">
		<?php
		/**
		 * pixelpop_single_meta_content hook.
		 *
		 * @hooked pixelpop_blog_list_meta - 10
		 * @hooked pixelpop_blog_list_comment_count - 20
		 *
		 * @since 1.0.0
		 */
		do_action( 'pixelpop_single_meta_content' ); ?>
	</div>
	<?php
}

/**
 * PixelPop Post Content
 *
 * @since 1.0.0
 */
function pixelpop_post_content(){
	?>
	<div class="ppop-custom-content clear" itemprop="text">
		<?php
		/**
		 * pixelpop_single_post_content_before hook.
		 *
		 *
		 * @since 1.0.0
		 */
		do_action( 'pixelpop_single_post_content_before' ); ?>

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
				wp_kses_post( get_the_title() )
			)
		);

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'pixelpop' ),
				'after'  => '</div>',
			)
		);
		?>

		<?php
		/**
		* Functions hooked into pixelpop_single_post_content_after add_action
		*
		* @hooked pixelpop_single_post_pagination - 10
		*/
		do_action( 'pixelpop_single_post_content_after' ); ?>




	</div><!--.ppop-custom-content-->

	<?php
}

/**
 * PixelPop Post Pagination
 *
 * @since 1.0.0
 */
function pixelpop_post_pagination(){

	wp_link_pages( array(
				'before'      => '<div itemtype = "http://schema.org/SiteNavigationElement/Pagination" itemscope class="ppop-single-pagenation"><span class="page-links-title">' . __( 'Pages:', 'pixelpop' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span itemprop="url" class="page-num">',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'pixelpop' ) . ' </span>%',
				'separator'   => '<span class="screen-reader-text">, </span>',
			) );
}

/**
 * PixelPop Single Post Tags
 *
 * @since 1.0.0
 */
function pixelpop_single_post_tags(){
	?>
	<?php if (has_tag()) { ?>
	<span itemprop="keywords" class="ppop-post-tags"><?php the_tags('', '' ,''); ?></span>
	<?php } ?>
	<?php
}

/**
 * PixelPop Single Post Navigation
 *
 * @since 1.0.0
 */
function pixelpop_single_post_navigation(){
	?>
	<div class="pixelpop-single-post-navigation z-mar-t-30 z-pad-t-30 z-border-t">
		<?php

		$previous_post = get_previous_post();

		$prevThumbnail = '';
		$prevThumbnailClass = '';

		if ( !empty( $previous_post ) ) {

			$prevThumbnail = isset( $previous_post ) ? get_the_post_thumbnail( $previous_post->ID, 'medium' ) : '';

			$prevThumbnailClass = 'z-d-none';
			if ( isset( $previous_post ) && has_post_thumbnail( $previous_post->ID ) ){
				$prevThumbnailClass = 'has-thumb';
			} else {
				$prevThumbnailClass = 'no-thumb z-d-none';
			}
		}

		$next_post = get_next_post();

		$nextThumbnail = '';
		$nextThumbnailClass = '';

		if ( !empty( $next_post ) ) {

			$nextThumbnail = isset( $next_post ) ? get_the_post_thumbnail( $next_post->ID, 'medium' ) : '';

			$nextThumbnailClass = 'z-d-none';
			if ( isset( $next_post ) && has_post_thumbnail( $next_post->ID ) ){
				$nextThumbnailClass = 'has-thumb';
			} else {
				$nextThumbnailClass = 'no-thumb z-d-none';
			}
		}

		the_post_navigation( array(
			'next_text' => '<div class="nav-content nav-content z-hov-shadow-s z-pad-15 z-border z-bg-layout-primary z-br-5 z-position-relative z-height-100 z-text-right"><span class="meta-nav z-d-block" aria-hidden="true">' . __( 'Next', 'pixelpop' ) . '</span> ' .
				'<span class="screen-reader-text">' . __( 'Next post:', 'pixelpop' ) . '</span> ' .
				'<span class="post-title z-d-block z-text-def-2 z-fs-5">%title</span>' . '<div class="post-nav-img z-position-absolute z-bg-layout-primary z-border z-border-b-0 z-pad-b-5 ' . $nextThumbnailClass .  '"><span class="post-image z-image-crop-wrap">' . $nextThumbnail . '</span></div></div>',
			'prev_text' => '<div class="nav-content nav-content z-hov-shadow-s z-pad-15 z-border z-bg-layout-primary z-br-5 z-position-relative z-height-100"><span class="meta-nav z-d-block" aria-hidden="true">' . __( 'Previous', 'pixelpop' ) . '</span> ' .
				'<span class="screen-reader-text">' . __( 'Previous post:', 'pixelpop' ) . '</span> ' .
				'<span class="post-title z-d-block z-text-def-2 z-fs-5">%title</span>' . '<div class="post-nav-img z-position-absolute z-bg-layout-primary z-border z-border-b-0 z-pad-b-5 ' . $prevThumbnailClass .  '"><span class="post-image z-image-crop-wrap">' . $prevThumbnail . '</span></div></div>',
		) );

		?>
	</div>
	<?php
}

/**
 * PixelPop Related Posts
 *
 * @since 1.0.0
 */
function pixelpop_related_posts(){

	if ( 'post' === get_post_type() ) {

		global $post;

		$tags = wp_get_post_tags($post->ID);
		$categories = get_the_category($post->ID);
		$related_posts_by = 'category';

		if ( $tags || $categories) {

			if ( $related_posts_by == 'category' ) {

				$category_ids = array();

				foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;

				$args=array(
				'category__in' => $category_ids,
				'post__not_in' => array($post->ID),
				'posts_per_page'=> 6, // Number of related posts that will be shown.
				'ignore_sticky_posts'=>1,
				);

			}elseif ( $related_posts_by == 'tag' ) {

				$tag_ids = array();

				foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;

				$args=array(
				'tag__in' => $tag_ids,
				'post__not_in' => array($post->ID),
				'showposts'=>6,  // Number of related posts that will be shown.
				'ignore_sticky_posts'=>1,
				);
			}

			$my_query = new \wp_query($args);

			if( $my_query->have_posts() ) {
				?>
				<div class="related-posts-wrap z-border-t z-pad-t-30 z-mar-t-30">

					<h2 class="related-posts-title z-pad-0 z-pad-t-30 z-fw-600 z-mar-b-15 z-text-uppercase "><?php esc_html_e( 'Related Posts', 'pixelpop' ); ?></h2>

					<div class="ppop-slider-wrap ppop-related-posts-slider-wrap">
						<div class="pixelpop-related-posts ppop-slider splide dots-outside arrows-out-nav" data-splide='{ "type":"slide", "perPage":2, "gap":"15px", "breakpoints":{ "767":{ "perPage":1 } } }'>
							<div class="splide__track">
								<ul class="splide__list">

									<?php

									while ($my_query->have_posts()) {
										$my_query->the_post();

										pixelpop_related_posts_content();

									}

									?>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<?php
			}
		}

		wp_reset_query();
	}
}

/**
 * PixelPop Related Posts Content
 *
 * @since 1.0.0
 */
function pixelpop_related_posts_content(){

	/**
	 * The pixelpop_related_posts_before hook.
	 *
	 * @since 1.0.0
	 */
	do_action( 'pixelpop_related_posts_before' );
	?>
	<li class="splide__slide">
		<div class = "ppop-related-post-wrap splide__slide__container">
			<div class = "ppop-related-post z-position-relative z-pad-0 ppop-layout-box no-padding no-thumb <?php if ( has_post_thumbnail() ) { ?>has-thumb<?php }else{?>no-thumb<?php } ?>">
				<article itemtype="https://schema.org/CreativeWork" itemscope="itemscope" id="post-<?php the_ID(); ?>" <?php post_class() ?>>

					<?php
					/**
					 * Functions hooked into pixelpop_blog_home_content_before add_action
					 *
					 * @hooked pixelpop_blog_list_thumbnail  - 10
					 *
					 * @since 1.0.0
					 */
					do_action( 'pixelpop_related_posts_content_before' );
					?>

					<div class="ppop-excerpt-container z-pad-30 z-pad-b-20 z-lm-pad-20 z-display z-d-flex z-flex-column z-flex-grow-1 <?php if ( ! has_post_thumbnail() ) { ?>full<?php } ?>">

						<?php
						/**
						 * Functions hooked into pixelpop_blog_home_content add_action
						 *
						 * @hooked pixelpop_related_posts_header  - 10
						 * @hooked pixelpop_blog_list_excerpt  - 20
						 * @hooked pixelpop_blog_list_footer  - 30
						 *
						 * @since 1.0.0
						 */
						do_action( 'pixelpop_related_posts_content' ); ?>

					</div>

					<?php
					/**
					 * pixelpop_blog_home_content_after hook
					 *
					 * @since 1.0.0
					 */
					do_action( 'pixelpop_related_posts_content_after' ); ?>

				</article>
			</div>
		</div>
	</li>
	<?php

	/**
	 * The pixelpop_related_posts_after hook.
	 *
	 * @hooked pixelpop_related_posts_script  - 10
	 *
	 * @since 1.0.0
	 */
	do_action( 'pixelpop_related_posts_after' );
}


/**
 * PixelPop Post Author
 *
 * @since 1.0.0
 */
function pixelpop_post_author(){
	if (is_singular( 'post' )) {
		?>
		<div class="ppop-about-author-wrap z-border-t z-pad-t-30 z-mar-t-30">
			<div itemtype="http://schema.org/Person" itemscope class="ppop-about-author z-bg-layout-primary z-br-4 z-pad-30 z-lm-pad-20 z-sm-pad-10 z-d-flex z-position-relative z-mar-t-0 z-d-flex z-lm-flex-column">
				<div class="ppop-author-avatar z-lm-text-center" itemprop="image">
					<?php echo get_avatar( get_the_author_meta( 'ID' ), 200 ); ?>
				</div>
				<div class="ppop-author-info z-pad-l-30 z-lm-pad-0 z-lm-text-center">
					<div class="ppop-author-name">
						<span itemprop="name"><?php the_author_posts_link(); ?></span>
					</div>
					<div class="ppop-author-description" itemprop="description">
						<?php the_author_meta('user_description'); ?>
					</div>
				</div>
			</div>
		</div>
		<?php
	}
}

/**
 * PixelPop Comments
 *
 * @since 1.0.0
 */
function pixelpop_post_comment(){
	// If comments are open or we have at least one comment, load up the comment template.
	if ( comments_open() || get_comments_number() ) :
		comments_template();
	endif;
}

/**
 * PixelPop Blog List Thumbnail
 *
 * @since 1.0.0
 */
function pixelpop_blog_list_thumbnail(){

	if ( has_post_thumbnail() ): ?>
		<div class="ppop-blog-list-img-wrap">
			<a class="ppop-featured-img-link z-image-crop-wrap" href="<?php the_permalink(); ?>">
				<img src="<?php the_post_thumbnail_url( 'large' ); ?>" itemprop="image">
			</a>
		</div>
	<?php endif;

}

/**
 * PixelPop Blog List Footer
 *
 * @since 1.0.0
 */
function pixelpop_blog_list_footer(){

	?>
	<div class="ppop-archive-post-footer z-pad-t-20 z-d-flex z z-width-100 z-mar-t-auto z-position-relative">
		<?php
		/**
		* Functions hooked into pixelpop_archive_post_footer_content add_action
		*
		* @hooked pixelpop_blog_list_meta - 10
		* @hooked pixelpop_blog_list_comment_count - 20
		*/
		do_action( 'pixelpop_archive_post_footer_content' ); ?>
	</div>
	<?php

}

/**
 * PixelPop Blog List Meta
 *
 * @since 1.0.0
 */
function pixelpop_blog_list_meta(){

	?>
	<div class="excerpt-meta z-d-flex">
		<span class="avatar z-mar-r-10">
			<?php echo get_avatar( get_the_author_meta( 'ID' ), 50 ); ?>
		</span>
		<span class="meta-text meta-text z-d-flex z-flex-column z-justify-content-center z-lh-sm">
			<span class="author z-text-def-2 z-text-nowrap">
			<?php pixelpop_posted_by(); ?>
			</span>
			<span class="date z-text-nowrap">
				<time itemprop="datePublished"><?php pixelpop_posted_on(); ?></time>
			</span>
		</span>
	</div>
	<?php

}

/**
 * PixelPop Blog post meta wrap start
 *
 * @since 1.0.0
 */
function pixelpop_post_meta_icons_wrap_start(){

	?>
	<div class="ppop-post-meta-icons z-d-flex z-mar-l-auto z-lm-width-100 z-lm-flex-wrap z-lm-pad-t-20 z-lm-mar-t-20 z-lm-border-t ">
	<?php

}

/**
 * PixelPop Blog post meta wrap start
 *
 * @since 1.0.0
 */
function pixelpop_post_meta_icons_wrap_end(){

	?>
	</div>
	<?php

}

/**
 * PixelPop Blog Comment Count
 *
 * @since 1.0.0
 */
function pixelpop_blog_list_comment_count(){

	$pixelpop_comment_count = get_comments_number();
	if ( $pixelpop_comment_count > 1 ) {
		$pixelpop_comment_text = esc_html( __( 'Comments', 'pixelpop' ) );
	}else{
		$pixelpop_comment_text = esc_html( __( 'Comment', 'pixelpop' ) );
	}

	if ( comments_open() || get_comments_number() ) {
		?>
		<div class="excerpt-comment z-position-relative z-mar-l-15">
			<a href="<?php if (is_single()){ ?>#comments<?php }else{ echo esc_url( the_permalink() ); echo esc_attr( '#comments' ); } ?>" class="comment-number z-text-def-2 z-pad-l-25">
				<i class="ppop-icon ppop-icon-message-circle"></i>
				<?php echo esc_html( $pixelpop_comment_count ); ?>
			</a>

		</div>
		<?php
	}

}

/**
 * PixelPop Blog List Header
 *
 * @since 1.0.0
 */
function pixelpop_blog_list_header(){

	?>
	<div class='ppop-excerpt-header'>
		<h2 rel="bookmark" itemprop="headline" class='ppop-excerpt-title'>
			<a class="z-text-heading z-fs-regular z-fw-600 z-text-decoration-none z-text-uppercase" itemprop="url" href="<?php the_permalink(); ?>">
			<?php the_title(); ?>
			</a>
		</h2>
	</div>
	<?php

}

/**
 * PixelPop Blog List Header
 *
 * @since 1.0.0
 */
function pixelpop_related_posts_header(){

	?>
	<div class='ppop-excerpt-header'>
		<h3 rel="bookmark" itemprop="headline" class='ppop-excerpt-title'>
			<a class="z-fs-regular z-fw-600 z-text-decoration-none z-text-uppercase z-text-heading" itemprop="url" href="<?php the_permalink(); ?>">
			<?php the_title(); ?>
			</a>
		</h2>
	</div>
	<?php

}

/**
 * PixelPop Blog List Excerpt
 *
 * @since 1.0.0
 */
function pixelpop_blog_list_excerpt(){

	?>
	<div class='ppop-excerpt-content z-text-def-2' itemprop="text">

		<?php
		/**
		 * pixelpop_blog_excerpt_content hook.
		 *
		 * @hooked pixelpop_blog_excerpt_main  - 10
		 * @hooked pixelpop_blog_excerpt_readmore  - 20
		 *
		 * @since 1.0.0
		 */
		do_action( 'pixelpop_blog_excerpt_content' ); ?>
	</div>
	<?php

}

/**
 * PixelPop Blog Excerpt Main
 *
 * @since 1.0.0
 */
function pixelpop_blog_excerpt_main(){

	?>
	<p>
		<?php the_excerpt(); ?>
	</p>
	<?php

}

/**
 * Filter the excerpt "read more" string.
 *
 * @param string $more "Read more" excerpt string.
 * @return string (Maybe) modified "read more" excerpt string.
 */
function pixelpop_excerpt_more( $more ) {
    return '<i class="ppop-icon ppop-icon-more-horizontal"></i>';
}
add_filter( 'excerpt_more', 'PixelPop\pixelpop_excerpt_more' );

/**
 * PixelPop Blog Excerpt Main
 *
 * @since 1.0.0
 */
function pixelpop_blog_excerpt_readmore(){

	?>
	<div class="ppop-more-link-wrapper">
		<a itemprop="url" class="more-link" href="<?php the_permalink(); ?>">
			<?php echo esc_html( __( 'Read the Post', 'pixelpop' ) ); ?>
			<span class="screen-reader-text">
				<?php the_title(); ?>
			</span>
		</a>
	</div>
	<?php
}



/**
 * PixelPop Blog Home Pagination (With Page Number)
 *
 * @since 1.0.0
 */
function pixelpop_blog_home_number_pagination(){

	global $wp_query;

	if ( $wp_query->max_num_pages > 1 ) {

		?><div class="ppop-post-pagination"><?php
		the_posts_pagination( array(
				'prev_text'          => '<i class="ppop-icon ppop-icon-chevron-left"></i>',
				'next_text'          => '<i class="ppop-icon ppop-icon-chevron-right"></i>',
				'before_page_number' => '<span class="screen-reader-text">' . __( 'Page', 'pixelpop' ) . ' </span>',
			) );
		?></div><?php
	}else{
		?><div class="no-post-pagination"></div><?php
	}

}

/**
 * PixelPop Blog Home Pagination (Only Next-Previous Sign)
 *
 * @since 1.0.0
 */
function pixelpop_blog_home_icon_pagination(){

	?><div class="ppop-post-pagination">
		<ul role="navigation" itemscope itemtype="http://schema.org/SiteNavigationElement">
			<li class="ppop-prev" itemprop="url">
				<?php previous_posts_link('<i class="ppop-icon ppop-icon-chevron-left"></i>') ?>
			</li>
			<li class="ppop-next" itemprop="url">
				<?php next_posts_link('<i class="ppop-icon ppop-icon-chevron-right"></i>') ?>
			</li>
		</ul>
	</div><!--.ppop-post-pagination --><?php

}

/**
 * PixelPop Search Form
 *
 * @since 1.0.0
 */
function pixelpop_search_page_form(){

	?>
	<div class="pixelpop-search-heading">
		<h1 class="ppop-search-page-title">
			<i>
			<?php
			/* translators: %s: search query. */
			printf( esc_html__( 'Search Results for: %s', 'pixelpop' ), '</i> <span>' . get_search_query() . '</span>' );
			?>
		</h1>
		<div class="ppop-search-page-form">
			<?php get_search_form(); ?>
		</div>
	</div>
	<?php

}

/**
 * PixelPop Archive Title
 *
 * @since 1.0.0
 */
function pixelpop_archive_title(){

	if ( is_archive() && 'post' == get_post_type() ) {

		?>
		<header class="page-header archive-header z-text-center z-pad-t-30 z-pad-b-30 z-bg-layout-primary">
			<?php

			if (is_category()){
				?>
				<h1 class="page-title z-mar-b-0">
					<i class="z-fs-5 z-d-block z-fst-normal z-text-uppercase z-fw-700 z-opacity-75 z-text-def-2"><?php esc_html_e('Browsing Category', 'pixelpop'); ?></i>
					<span class="cat-title z-fs-2 z-fw-700 z-text-def"><?php echo single_cat_title(); ?></span>
				</h1>
				<?php
					the_archive_description( '<div class="archive-description z-mar-x-auto z-mar-t-10 z-mar-b-0">', '</div><!-- .archive-description -->' );
				?>
				<?php

			}elseif (is_tag()){
				?>
				<h1 class="page-title z-mar-b-0">
					<i class="z-fs-5 z-d-block z-fst-normal z-text-uppercase z-fw-700 z-opacity-75 z-text-def-2"><?php esc_html_e('Posts tagged', 'pixelpop'); ?></i>
					<span class="cat-title z-fs-2 z-fw-700 z-text-def"><?php echo single_tag_title(); ?></span>
				</h1>
				<?php
					the_archive_description( '<div class="archive-description z-mar-x-auto z-mar-t-10 z-mar-b-0">', '</div><!-- .archive-description -->' );
				?>
				<?php
			}elseif (is_author()){
				?>
				<?php echo get_avatar( get_the_author_meta( 'ID' ), 50 ); ?>
				<h1 class="page-title z-mar-b-0">
					<i class="z-fs-5 z-d-block z-fst-normal z-text-uppercase z-fw-700 z-opacity-75 z-text-def-2"><?php esc_html_e('Posts Published by', 'pixelpop'); ?></i>
					<span class="cat-title z-fs-2 z-fw-700 z-text-def"><?php the_author(); ?></span>
				</h1>
				<?php
					the_archive_description( '<div class="archive-description z-mar-x-auto z-mar-t-10 z-mar-b-0">', '</div><!-- .archive-description -->' );
				?>
				<?php
			}elseif (is_date()){
				?>
				<h1 class="page-title z-mar-b-0">
					<i class="z-fs-5 z-d-block z-fst-normal z-text-uppercase z-fw-700 z-opacity-75 z-text-def-2"><?php esc_html_e('Date Archives', 'pixelpop'); ?></i>
					<span class="cat-title z-fs-2 z-fw-700 z-text-def">
						<?php
							if (is_day())
							{
								printf(get_the_date());
							}
							elseif (is_month())
							{
								printf(get_the_date(_x('F Y', 'monthly archives date format', 'pixelpop')));
							}
							elseif (is_year())
							{
								printf(get_the_date(_x('Y', 'yearly archives date format', 'pixelpop')));
							}
							else
							{
								esc_html_e('Archives', 'pixelpop');
							}
						?>
					</span>
				</h1>
				<?php
					the_archive_description( '<div class="archive-description z-mar-x-auto z-mar-t-10 z-mar-b-0">', '</div><!-- .archive-description -->' );
				?>
				<?php
			}elseif (is_post_type_archive()){
				?>
				<h1 class="page-title z-mar-b-0">
					<i class="z-fs-5 z-d-block z-fst-normal z-text-uppercase z-fw-700 z-opacity-75 z-text-def-2"><?php esc_html_e('Archives', 'pixelpop'); ?></i>
					<span class="cat-title z-fs-2 z-fw-700 z-text-def"><?php echo post_type_archive_title(); ?></span>
				</h1>
				<?php
					the_archive_description( '<div class="archive-description z-mar-x-auto z-mar-t-10 z-mar-b-0">', '</div><!-- .archive-description -->' );
				?>
				<?php
			}else{
				the_archive_title( '<h1 class="page-title z-mar-b-0">', '</h1>' );
				the_archive_description( '<div class="archive-description z-mar-x-auto z-mar-t-10 z-mar-b-0">', '</div>' );
			}

			?>
		</header><!-- .page-header -->
		<?php
	}

}

/**
 * Single Post Full-Width Thumbnail
 */
function pixelpop_single_post_fullwidth_thumbnail() {

    if ( is_singular('post') ) {
		add_action('pixelpop_header_below_content','PixelPop\pixelpop_single_fullwidth_thumbnail', 20);
	}

	if ( is_page() ) {
		add_action('pixelpop_header_below_content','PixelPop\pixelpop_single_fullwidth_thumbnail', 20);
	}
}

/**
 * Search Result Page Search forum
 */
function pixelpop_search_result_form() {
	if ( is_search() ) {
		add_action('pixelpop_header_below_content','PixelPop\pixelpop_search_page_form', 10);
	}
}

/**
 * Search form
 */
function pixelpop_search_form( $form ) {
	$form = '<form role="search" method="get" class="search-form" action="' . home_url( '/' ) . '" >
				<div class="ppop-search-box">
					<label class="screen-reader-text" for="s">' . __( 'Search for:', 'pixelpop' ) . '</label>
					<input class="search-field" placeholder="Search" type="text" value="' . get_search_query() . '" name="s" />
					<button type="submit" class="search-submit ppop-search-btn">
						<i class="ppop-icon ppop-icon-search"></i>
					</button>
				</div>
			</form>';

	return $form;
}


/**
 * PixelPop Custom Comments Callback
 */
function pixelpop_comments( $comment, $args, $depth ) {

	// Get correct tag used for the comments
	if ( 'div' === $args['style'] ) {
		$tag       = 'div';
		$add_below = 'comment';
	} else {
		$tag       = 'li';
		$add_below = 'div-comment';
	} ?>

	<<?php echo esc_attr( $tag ); ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?> id="comment-<?php comment_ID() ?>">

	<?php
	// Switch between different comment types
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' : ?>
		<div class="pingback-entry"><span class="pingback-heading"><?php esc_html_e( 'Pingback:', 'pixelpop' ); ?></span> <?php comment_author_link(); ?></div>
	<?php
		break;
		default :

		if ( 'div' != $args['style'] ) { ?>
			<div id="div-comment-<?php comment_ID() ?>" class="comment-body">
		<?php } ?>
			<div class="comment-author vcard">
				<?php
				// Display avatar unless size is set to 0
				if ( $args['avatar_size'] != 0 ) {
					$avatar_size = ! empty( $args['avatar_size'] ) ? $args['avatar_size'] : 70; // set default avatar size
						echo get_avatar( $comment, $avatar_size );
				}
				?>
			</div><!-- .comment-author -->
			<div class="comment-details">
				<div class="comment-meta commentmetadata">
					<!-- Display author name -->
					<cite class="fn">
						<?php comment_author_link(); ?>
					</cite>
					<a class="comment-date" href="<?php comment_link( $comment->comment_ID ); ?>">
						<?php comment_date(); ?>
						<?php esc_html_e( 'at', 'pixelpop' ); ?>
						<?php comment_time(); ?>
					</a>
				</div><!-- .comment-meta -->
				<div class="comment-text"><?php comment_text(); ?></div><!-- .comment-text -->
				<?php
				// Display comment moderation text
				if ( $comment->comment_approved == '0' ) { ?>
					<em class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'pixelpop' ); ?></em><br/><?php
				} ?>
				<div class="comment-footer">

					<?php

					// Display comment reply link
					comment_reply_link( array_merge( $args, array(
						'add_below' => $add_below,
						'depth'     => $depth,
						'max_depth' => $args['max_depth']
					) ) );

					// Display comment edit link
					edit_comment_link( __( 'Edit', 'pixelpop' ), '  ', '' ); ?>
				</div>

			</div><!-- .comment-details -->
		<?php
		if ( 'div' != $args['style'] ) { ?>
			</div>
		<?php }
	// IMPORTANT: Note that we do NOT close the opening tag, WordPress does this for us
		break;
	endswitch; // End comment_type check.
}

/**
 * Social follow buttons
 */
function pixelpop_follow_share_buttons( $wrap_class='', $list_class='', $link_class='' ) {

	if ( '' == $wrap_class) {
		$wrap_class = 'ppop-social-follow-buttons-wrap';
	}

	if ( '' == $list_class) {
		$list_class = 'ppop-social-icons';
	}

	if ( '' == $link_class) {
		$link_class = 'ppop-social-icon';
	}

	$facebook_follow_enable = get_theme_mod( 'pixelpop_social_follow_facebook_enable', false );
	$facebook_follow_url = get_theme_mod( 'pixelpop_social_follow_facebook_link', '#' );

	$twitter_follow_enable = get_theme_mod( 'pixelpop_social_follow_twitter_enable', false );
	$twitter_follow_url = get_theme_mod( 'pixelpop_social_follow_twitter_link', '#' );

	$instagram_follow_enable = get_theme_mod( 'pixelpop_social_follow_instagram_enable', false );
	$instagram_follow_url = get_theme_mod( 'pixelpop_social_follow_instagram_link', '#' );

	$linkedin_follow_enable = get_theme_mod( 'pixelpop_social_follow_linkedin_enable', false );
	$linkedin_follow_url = get_theme_mod( 'pixelpop_social_follow_linkedin_link', '#' );

	$dribbble_follow_enable = get_theme_mod( 'pixelpop_social_follow_dribbble_enable', false );
	$dribbble_follow_url = get_theme_mod( 'pixelpop_social_follow_dribbble_link', '#' );

	$pinterest_follow_enable = get_theme_mod( 'pixelpop_social_follow_pinterest_enable', false );
	$pinterest_follow_url = get_theme_mod( 'pixelpop_social_follow_pinterest_link', '#' );

	$tumblr_follow_enable = get_theme_mod( 'pixelpop_social_follow_tumblr_enable', false );
	$tumblr_follow_url = get_theme_mod( 'pixelpop_social_follow_tumblr_link', '#' );

	$medium_follow_enable = get_theme_mod( 'pixelpop_social_follow_medium_enable', false );
	$medium_follow_url = get_theme_mod( 'pixelpop_social_follow_medium_link', '#' );

	$meetup_follow_enable = get_theme_mod( 'pixelpop_social_follow_meetup_enable', false );
	$meetup_follow_url = get_theme_mod( 'pixelpop_social_follow_meetup_link', '#' );

	$quora_follow_enable = get_theme_mod( 'pixelpop_social_follow_quora_enable', false );
	$quora_follow_url = get_theme_mod( 'pixelpop_social_follow_quora_link', '#' );

	$reddit_follow_enable = get_theme_mod( 'pixelpop_social_follow_reddit_enable', false );
	$reddit_follow_url = get_theme_mod( 'pixelpop_social_follow_reddit_link', '#' );

	$rss_follow_enable = get_theme_mod( 'pixelpop_social_follow_rss_enable', false );
	$rss_follow_url = get_theme_mod( 'pixelpop_social_follow_rss_link', '#' );

	$skype_follow_enable = get_theme_mod( 'pixelpop_social_follow_skype_enable', false );
	$skype_follow_url = get_theme_mod( 'pixelpop_social_follow_skype_link', '#' );

	$vimeo_follow_enable = get_theme_mod( 'pixelpop_social_follow_vimeo_enable', false );
	$vimeo_follow_url = get_theme_mod( 'pixelpop_social_follow_vimeo_link', '#' );

	$vk_follow_enable = get_theme_mod( 'pixelpop_social_follow_vk_enable', false );
	$vk_follow_url = get_theme_mod( 'pixelpop_social_follow_vk_link', '#' );

	$xing_follow_enable = get_theme_mod( 'pixelpop_social_follow_xing_enable', false );
	$xing_follow_url = get_theme_mod( 'pixelpop_social_follow_xing_link', '#' );

	$youtube_follow_enable = get_theme_mod( 'pixelpop_social_follow_youtube_enable', false );
	$youtube_follow_url = get_theme_mod( 'pixelpop_social_follow_youtube_link', '#' );

	$buffer_follow_enable = get_theme_mod( 'pixelpop_social_follow_buffer_enable', false );
	$buffer_follow_url = get_theme_mod( 'pixelpop_social_follow_buffer_link', '#' );

	$digg_follow_enable = get_theme_mod( 'pixelpop_social_follow_digg_enable', false );
	$digg_follow_url = get_theme_mod( 'pixelpop_social_follow_digg_link', '#' );

	$behance_follow_enable = get_theme_mod( 'pixelpop_social_follow_behance_enable', false );
	$behance_follow_url = get_theme_mod( 'pixelpop_social_follow_behance_link', '#' );

	$hackernews_follow_enable = get_theme_mod( 'pixelpop_social_follow_hackernews_enable', false );
	$hackernews_follow_url = get_theme_mod( 'pixelpop_social_follow_hackernews_link', '#' );

	$github_follow_enable = get_theme_mod( 'pixelpop_social_follow_github_enable', false );
	$github_follow_url = get_theme_mod( 'pixelpop_social_follow_github_link', '#' );

	$soundcloud_follow_enable = get_theme_mod( 'pixelpop_social_follow_soundcloud_enable', false );
	$soundcloud_follow_url = get_theme_mod( 'pixelpop_social_follow_soundcloud_link', '#' );

	$delicious_follow_enable = get_theme_mod( 'pixelpop_social_follow_delicious_enable', false );
	$delicious_follow_url = get_theme_mod( 'pixelpop_social_follow_delicious_link', '#' );

	$spotify_follow_enable = get_theme_mod( 'pixelpop_social_follow_spotify_enable', false );
	$spotify_follow_url = get_theme_mod( 'pixelpop_social_follow_spotify_link', '#' );

	$yahoo_follow_enable = get_theme_mod( 'pixelpop_social_follow_yahoo_enable', false );
	$yahoo_follow_url = get_theme_mod( 'pixelpop_social_follow_yahoo_link', '#' );

	$vk_follow_enable = get_theme_mod( 'pixelpop_social_follow_deviantart_enable', false );
	$vk_follow_url = get_theme_mod( 'pixelpop_social_follow_deviantart_link', '#' );

	$flickr_follow_enable = get_theme_mod( 'pixelpop_social_follow_flickr_enable', false );
	$flickr_follow_url = get_theme_mod( 'pixelpop_social_follow_flickr_link', '#' );

	$stumbleupon_follow_enable = get_theme_mod( 'pixelpop_social_follow_stumbleupon_enable', false );
	$stumbleupon_follow_url = get_theme_mod( 'pixelpop_social_follow_stumbleupon_link', '#' );

	?>
	<div class="<?php echo esc_attr( $wrap_class ); ?>">

		<ul class="<?php echo esc_attr( $list_class ); ?>">
			<?php if ( true == $facebook_follow_enable ) { ?>
				<li>
					<a class="<?php echo esc_attr( $link_class ); ?> follow-facebook" href="<?php echo esc_url( $facebook_follow_url ); ?>" target="_blank">
					<i class="fab fa-facebook-f"></i>
					</a>
				</li>
			<?php } ?>
			<?php if ( true == $twitter_follow_enable ) { ?>
				<li>
					<a class="<?php echo esc_attr( $link_class ); ?> follow-twitter" href="<?php echo esc_url( $twitter_follow_url ); ?>" target="_blank">
					<i class="fab fa-twitter"></i>
					</a>
				</li>
			<?php } ?>
			<?php if ( true == $instagram_follow_enable ) { ?>
				<li>
					<a class="<?php echo esc_attr( $link_class ); ?> follow-instagram" href="<?php echo esc_url( $instagram_follow_url ); ?>" target="_blank">
					<i class="fab fa-instagram"></i>
					</a>
				</li>
			<?php } ?>
			<?php if ( true == $linkedin_follow_enable ) { ?>
				<li>
					<a class="<?php echo esc_attr( $link_class ); ?> follow-linkedin" href="<?php echo esc_url( $linkedin_follow_url ); ?>" target="_blank">
					<i class="fab fa-linkedin-in"></i>
					</a>
				</li>
			<?php } ?>
			<?php if ( true == $dribbble_follow_enable ) { ?>
				<li>
					<a class="<?php echo esc_attr( $link_class ); ?> follow-dribbble" href="<?php echo esc_url( $dribbble_follow_url ); ?>" target="_blank">
					<i class="fab fa-dribbble"></i>
					</a>
				</li>
			<?php } ?>
			<?php if ( true == $pinterest_follow_enable ) { ?>
				<li>
					<a class="<?php echo esc_attr( $link_class ); ?> follow-pinterest" href="<?php echo esc_url( $pinterest_follow_url ); ?>" target="_blank">
					<i class="fab fa-pinterest-p"></i>
					</a>
				</li>
			<?php } ?>
			<?php if ( true == $tumblr_follow_enable ) { ?>
				<li>
					<a class="<?php echo esc_attr( $link_class ); ?> follow-tumblr" href="<?php echo esc_url( $tumblr_follow_url ); ?>" target="_blank">
					<i class="fab fa-tumblr"></i>
					</a>
				</li>
			<?php } ?>
			<?php if ( true == $medium_follow_enable ) { ?>
				<li>
					<a class="<?php echo esc_attr( $link_class ); ?> follow-medium" href="<?php echo esc_url( $medium_follow_url ); ?>" target="_blank">
					<i class="fab fa-medium-m"></i>
					</a>
				</li>
			<?php } ?>
			<?php if ( true == $meetup_follow_enable ) { ?>
				<li>
					<a class="<?php echo esc_attr( $link_class ); ?> follow-meetup" href="<?php echo esc_url( $meetup_follow_url ); ?>" target="_blank">
					<i class="fab fa-meetup"></i>
					</a>
				</li>
			<?php } ?>
			<?php if ( true == $quora_follow_enable ) { ?>
				<li>
					<a class="<?php echo esc_attr( $link_class ); ?> follow-quora" href="<?php echo esc_url( $quora_follow_url ); ?>" target="_blank">
					<i class="fab fa-quora"></i>
					</a>
				</li>
			<?php } ?>
			<?php if ( true == $reddit_follow_enable ) { ?>
				<li>
					<a class="<?php echo esc_attr( $link_class ); ?> follow-reddit" href="<?php echo esc_url( $reddit_follow_url ); ?>" target="_blank">
					<i class="fab fa-reddit-alien"></i>
					</a>
				</li>
			<?php } ?>
			<?php if ( true == $rss_follow_enable ) { ?>
				<li>
					<a class="<?php echo esc_attr( $link_class ); ?> follow-rss" href="<?php echo esc_url( $rss_follow_url ); ?>" target="_blank">
					<i class="fas fa-rss"></i>
					</a>
				</li>
			<?php } ?>
			<?php if ( true == $skype_follow_enable ) { ?>
				<li>
					<a class="<?php echo esc_attr( $link_class ); ?> follow-skype" href="<?php echo esc_url( $skype_follow_url ); ?>" target="_blank">
					<i class="fab fa-skype"></i>
					</a>
				</li>
			<?php } ?>
			<?php if ( true == $vimeo_follow_enable ) { ?>
				<li>
					<a class="<?php echo esc_attr( $link_class ); ?> follow-vimeo" href="<?php echo esc_url( $vimeo_follow_url ); ?>" target="_blank">
					<i class="fab fa-vimeo-v"></i>
					</a>
				</li>
			<?php } ?>
			<?php if ( true == $vk_follow_enable ) { ?>
				<li>
					<a class="<?php echo esc_attr( $link_class ); ?> follow-vk" href="<?php echo esc_url( $vk_follow_url ); ?>" target="_blank">
					<i class="fab fa-vk"></i>
					</a>
				</li>
			<?php } ?>
			<?php if ( true == $xing_follow_enable ) { ?>
				<li>
					<a class="<?php echo esc_attr( $link_class ); ?> follow-xing" href="<?php echo esc_url( $xing_follow_url ); ?>" target="_blank">
					<i class="fab fa-xing"></i>
					</a>
				</li>
			<?php } ?>
			<?php if ( true == $youtube_follow_enable ) { ?>
				<li>
					<a class="<?php echo esc_attr( $link_class ); ?> follow-youtube" href="<?php echo esc_url( $youtube_follow_url ); ?>" target="_blank">
					<i class="fab fa-youtube"></i>
					</a>
				</li>
			<?php } ?>
			<?php if ( true == $buffer_follow_enable ) { ?>
				<li>
					<a class="<?php echo esc_attr( $link_class ); ?> follow-buffer" href="<?php echo esc_url( $buffer_follow_url ); ?>" target="_blank">
					<i class="fab fa-buffer"></i>
					</a>
				</li>
			<?php } ?>
			<?php if ( true == $digg_follow_enable ) { ?>
				<li>
					<a class="<?php echo esc_attr( $link_class ); ?> follow-digg" href="<?php echo esc_url( $digg_follow_url ); ?>" target="_blank">
					<i class="fab fa-digg"></i>
					</a>
				</li>
			<?php } ?>
			<?php if ( true == $behance_follow_enable ) { ?>
				<li>
					<a class="<?php echo esc_attr( $link_class ); ?> follow-behance" href="<?php echo esc_url( $behance_follow_url ); ?>" target="_blank">
					<i class="fab fa-behance"></i>
					</a>
				</li>
			<?php } ?>
			<?php if ( true == $hackernews_follow_enable ) { ?>
				<li>
					<a class="<?php echo esc_attr( $link_class ); ?> follow-hackernews" href="<?php echo esc_url( $hackernews_follow_url ); ?>" target="_blank">
					<i class="fab fa-hacker-news"></i>
					</a>
				</li>
			<?php } ?>
			<?php if ( true == $github_follow_enable ) { ?>
				<li>
					<a class="<?php echo esc_attr( $link_class ); ?> follow-github" href="<?php echo esc_url( $github_follow_url ); ?>" target="_blank">
					<i class="fab fa-github"></i>
					</a>
				</li>
			<?php } ?>
			<?php if ( true == $soundcloud_follow_enable ) { ?>
				<li>
					<a class="<?php echo esc_attr( $link_class ); ?> follow-soundcloud" href="<?php echo esc_url( $soundcloud_follow_url ); ?>" target="_blank">
					<i class="fab fa-soundcloud"></i>
					</a>
				</li>
			<?php } ?>
			<?php if ( true == $delicious_follow_enable ) { ?>
				<li>
					<a class="<?php echo esc_attr( $link_class ); ?> follow-delicious" href="<?php echo esc_url( $delicious_follow_url ); ?>" target="_blank">
					<i class="fab fa-delicious"></i>
					</a>
				</li>
			<?php } ?>
			<?php if ( true == $spotify_follow_enable ) { ?>
				<li>
					<a class="<?php echo esc_attr( $link_class ); ?> follow-spotify" href="<?php echo esc_url( $spotify_follow_url ); ?>" target="_blank">
					<i class="fab fa-spotify"></i>
					</a>
				</li>
			<?php } ?>
			<?php if ( true == $yahoo_follow_enable ) { ?>
				<li>
					<a class="<?php echo esc_attr( $link_class ); ?> follow-yahoo" href="<?php echo esc_url( $yahoo_follow_url ); ?>" target="_blank">
					<i class="fab fab fa-yahoo"></i>
					</a>
				</li>
			<?php } ?>
			<?php if ( true == $vk_follow_enable ) { ?>
				<li>
					<a class="<?php echo esc_attr( $link_class ); ?> follow-deviantart" href="<?php echo esc_url( $vk_follow_url ); ?>" target="_blank">
					<i class="fab fa-deviantart"></i>
					</a>
				</li>
			<?php } ?>
			<?php if ( true == $flickr_follow_enable ) { ?>
				<li>
					<a class="<?php echo esc_attr( $link_class ); ?> follow-flickr" href="<?php echo esc_url( $flickr_follow_url ); ?>" target="_blank">
					<i class="fab fa-flickr"></i>
					</a>
				</li>
			<?php } ?>
			<?php if ( true == $stumbleupon_follow_enable ) { ?>
				<li>
					<a class="<?php echo esc_attr( $link_class ); ?> follow-stumbleupon" href="<?php echo esc_url( $stumbleupon_follow_url ); ?>" target="_blank">
					<i class="fab fa-stumbleupon"></i>
					</a>
				</li>
			<?php } ?>
		</ul>

	</div>
    <?php
}
