<?php
/**
 * The template for displaying the 404 template in the Avadanta theme.
 *
 */
 
get_header();

?>
	<div class="section section-x page-extra-pd tc-bunker align-middle-md error-44">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-12 col-md-8 text-center">
					<div class="error-content">
						<span class="error-text-avadanta"><?php esc_html_e( 'Error 404', 'avadanta-invest' ); ?></span>
						<h5><?php esc_html_e( 'Sorry! The Page You Entered Has Not Found', 'avadanta-invest' ); ?></h5>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="avadanta-btn"><?php esc_html_e( 'Go to Home', 'avadanta-invest' ); ?></a>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php
get_footer();
?>