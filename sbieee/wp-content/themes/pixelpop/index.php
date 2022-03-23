<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package pixelpop
 */

namespace PixelPop;

get_header();

pixelpop()->print_styles( 'pixelpop-content' );

?>
	<div class="ppop-content-wrap <?php pixelpop_container_class(); ?>">
		<main id="primary" class="site-main">
			<div class="content-area">
				<?php
				if ( have_posts() ) {

					get_template_part( 'template-parts/content/page_header' );

					while ( have_posts() ) {
						the_post();

						get_template_part( 'template-parts/content/entry', get_post_type() );
					}

					if ( ! is_singular() ) {
						get_template_part( 'template-parts/content/pagination' );
					}
				} else {
					get_template_part( 'template-parts/content/error' );
				}
				?>
			</div><!-- .content-area -->
		</main><!-- #primary -->
	</div><!-- .ppop-content-wrap -->
<?php
get_sidebar();
get_footer();
