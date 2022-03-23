<?php
/**
 * Calls in content for footer using theme hooks.
 *
 * @package pixelpop
 */

namespace PixelPop;

use function PixelPop\pixelpop;
use function add_action;

defined( 'ABSPATH' ) || exit;

/**
 * PixelPop Footer
 */
function pixelpop_footer() {
	get_template_part( 'template-parts/footer/footer' );
}

/**
 * PixelPop Footer Branding
 *
 * @since 1.0.0
 */
function pixelpop_footer_branding(){

?>
	<div itemscope itemtype="http://schema.org/Organization" class="ppop-footer-branding z-bg-layout-primary z-text-center z-pad-t-30 z-pad-b-30">

		<?php
		/**
		 * pixelpop_single_post_content_after hook.
		 *
		 * @hooked pixelpop_footer_branding  		- 10
		 * @hooked pixelpop_footer_site_title  		- 20
		 * @hooked pixelpop_footer_site_description - 30
		 * @hooked pixelpop_footer_social_links - 40
		 *
		 * @since 1.0.0
		 */
		do_action( 'pixelpop_footer_branding_content' );?>

	</div><!--.ppop-footer-branding -->

<?php

}

/**
 * PixelPop Footer Logo
 *
 * @since 1.0.0
 */
function pixelpop_footer_logo(){

	if ( '' != get_theme_mod( 'pixelpop_footer_logo', '' ) ) {
		$image = get_theme_mod( 'pixelpop_footer_logo', '' );

		?>
		<div class="ppop-footer-logo">
			<a href="<?php echo esc_url( home_url() ); ?>">
				<img itemprop="logo" class="ppop-footer-logo-img" src="<?php echo esc_url( $image ); ?>">
			</a>
		</div>
		<?php
	}

}

/**
 * PixelPop Footer Site Title
 *
 * @since 1.0.0
 */
function pixelpop_footer_site_title(){

?>
	<a class="ppop-footer-title z-text-def z-fs-3 z-fw-600 z-text-uppercase z-mar-0" itemprop="url" href="<?php echo esc_url( home_url() ); ?>"><span itemprop="name"><?php bloginfo('name'); ?></span></a>
<?php

}

/**
 * PixelPop Footer Site Description
 *
 * @since 1.0.0
 */
function pixelpop_footer_site_description(){

?>
	<p itemprop="description" class="footer-site-description z-mar-0 z-fs-5 z-text-def-2"><?php bloginfo( 'description' ); ?></p>
<?php

}

function pixelpop_footer_social_links_below_branding() {
	pixelpop_follow_share_buttons( 'ppop-social-follow-buttons-wrap ppop-footer-branding-social-links', 'ppop-social-icons', 'ppop-social-icon' );
}

function pixelpop_footer_info_social_links() {
	pixelpop_follow_share_buttons( 'ppop-social-follow-buttons-wrap ppop-footer-info-social', 'ppop-social-icons', 'ppop-social-icon' );
}


/**
 * PixelPop Footer Site Widgets
 *
 * @since 1.0.0
 */
function pixelpop_footer_widgets(){

?>
	<div class="ppop-footer-widgets z-border-t">
		<div class="col-full">

			<?php if ( is_active_sidebar( 'ppop-footer-widget' )  ) : ?>
					<div class="ppop-footer-columns z-grid z-gap-6 z-pad-t-40 z-pad-b-40 <?php pixelpop_footer_widgit_column_class(); ?>">
						<?php dynamic_sidebar( 'ppop-footer-widget' ); ?>
					</div><!--.ppop-footer-columns -->
			<?php endif; ?>

		</div><!--.col-full-->
	</div><!--.ppop-footer-widgets-->
<?php

}

/**
 * PixelPop Footer Info
 *
 * @since 1.0.0
 */
function pixelpop_footer_info(){

?>

	<div class="ppop-footer-info <?php pixelpop_footer_info_class(); ?> z-bg-layout-primary z-text-def-2 z-fw-600 z-border-t">
		<div class="col-full">
			<div class="ppop-footer-info-content">

				<?php do_action( 'pixelpop_footer_info_content' ); ?>

			</div>

		</div>

	</div><!--.ppop-footer-info-->

<?php

}

/**
 * PixelPop Footer Credits
 *
 * @since 1.0.0
 */

add_action('pixelpop_footer_info_content','PixelPop\pixelpop_footer_credits', 10);

function pixelpop_footer_credits(){

	?>
	<span class="footer-credit z-pad-t-15 z-pad-b-15 z-d-block z-text-center"><?php

	printf( '%1$s &copy %2$s - ',
		esc_html_e( 'COPYRIGHT', 'pixelpop' ),
		esc_html( date( 'Y' ) )
	);

	bloginfo('name');

	?>  //  <?php

	printf( '%1$s -  <a href="%2$s" rel="nofollow" target="_blank">%3$s</a>',
		esc_html_e( 'Designed By', 'pixelpop' ),
		esc_url( 'https://zeetheme.com' ),
		esc_html( __( 'ZeeTheme', 'pixelpop' ) )
	);

	?>
	</span>
	<?php
}

function pixelpop_content_end() {

		/**
		 * The pixelpop_after_main_content hook.
		 *
		 * @since 1.0.0
		 *
		 */
		do_action( 'pixelpop_after_main_content' ); ?>

	</div><!-- .site-content -->

	<?php
}

/**
 * Template Contentent Width Wrapper After
 */
function pixelpop_content_width_wrapper_after() {
	?>
	</div><!-- .col-full -->
	<?php
}

/**
 * Register footer widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function pixelpop_footer_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widgets', 'pixelpop' ),
		'id'            => 'ppop-footer-widget',
		'description'   => esc_html__( 'Displays widgets in the footer.', 'pixelpop' ),
		'before_widget' => '<div div id="%1$s" class="ppop-footer-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="ppop-footer-widget-heading">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'PixelPop\pixelpop_footer_widgets_init' );
