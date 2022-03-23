<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package pixelpop
 */

namespace PixelPop;

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}

pixelpop()->print_styles( 'pixelpop-comments' );

?>
<div id="comments" class="comments-area">
	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) {
		?>
		<h2 class="comments-title">
			<?php
			$pixelpop_comment_count = get_comments_number();
			if ( 1 === $pixelpop_comment_count ) {
				printf(
					/* translators: 1: title. */
					esc_html__( 'One thought on &ldquo;%1$s&rdquo;', 'pixelpop' ),
					'<span>' . get_the_title() . '</span>' // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				);
			} else {
				printf(
					/* translators: 1: comment count number, 2: title. */
					esc_html( _nx( '%1$s Comment', '%1$s Comments', $pixelpop_comment_count, 'comments title', 'pixelpop' ) ),
					number_format_i18n( $pixelpop_comment_count ), // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					'<span>' . wp_kses_post( get_the_title() ) . '</span>'
				);
			}
			?>
		</h2><!-- .comments-title -->

		<?php the_comments_navigation(); ?>

		<ol class="comment-list">
			<?php
			wp_list_comments(
				array(
					'style'        => 'ol',
					'short_ping'   => true,
					'avatar_size'  => 80,
					'callback'     => 'PixelPop\pixelpop_comments',
				)
			);
			?>
		</ol><!-- .comment-list -->

		<?php
		if ( ! comments_open() ) {
			?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'pixelpop' ); ?></p>
			<?php
		}
	}

	comment_form();
	?>
</div><!-- #comments -->
