<?php
/**
 * Template part for displaying single post.
 *
 * @package pixelpop
 */

namespace PixelPop;

/**
 * The pixelpop_main_single_content_before hook.
 *
 * @since 1.0.0
 */
do_action( 'pixelpop_main_single_content_before' );
?>

<div class="ppop-single-wrap <?php pixelpop_single_blog_wrap_class(); ?>">

	<article itemtype="https://schema.org/CreativeWork" itemscope="itemscope" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<?php
		/**
		 * Functions hooked into pixelpop_single_post_before add_action
		 *
		 * @since 1.0.0
		 */
		do_action( 'pixelpop_single_post_before' );
		?>

		<div class="ppop-post-content">

			<?php
			/*
			* Functions hooked into pixelpop_single_post add_action
			*
			* @hooked pixelpop_thumbnail            - 10
			* @hooked pixelpop_post_header          - 10
			* @hooked pixelpop_post_meta            - 20
			* @hooked pixelpop_post_content         - 30
			*/
			do_action( 'pixelpop_single_post' );
			?>

		</div><!--.ppop-post-content-->

		<?php
		/**
		 * The pixelpop_single_post_after hook.
		 *
		 * @hooked pixelpop_single_post_tags - 10
		 *
		 * @since 1.0.0
		 */
		do_action( 'pixelpop_single_post_after' );
		?>

	</article>

</div><!--.ppop-single-wrap-->

<?php
/**
 * Functions hooked into pixelpop_main_single_content_after add_action
 *
 * @hooked pixelpop_single_post_navigation - 10
 * @hooked pixelpop_related_posts - 10
 * @hooked pixelpop_post_author - 10
 * @hooked pixelpop_post_comment - 10
 *
 * @since 1.0.0
 */
do_action( 'pixelpop_main_single_content_after' );
