<?php
/**
 * PixelPop options page general tab content.
 *
 * @package     pixelpop
 * @author      PixelPop
 * @copyright   Copyright (c)., PixelPop
 * @since       PixelPop 1.0.0
 */

?>

<form method="post" action="options.php">

	<div class="pixelpop-getting-started-wrap">

		<h2 class="getting-started-head"><?php esc_html_e( 'Getting Started with PixelPop', 'pixelpop' ); ?></h2>
		<p><?php esc_html_e( 'PixelPop has a lot of customization options. Lets Customize your site.', 'pixelpop' ); ?></p>

		<div class="pixelpop-settings-group">
			<h3><?php esc_html_e( 'Branding', 'pixelpop' ); ?></h3>

			<div class="pixelpop-site-title-settings pixelpop-settings-group-option">
				<h4><?php esc_html_e( 'Site Title', 'pixelpop' ); ?></h4>
				<div class="pixelpop-settings-group-option-wrap">
					<span class="pixelpop-site-name"><?php bloginfo( 'name' ); ?></span>
				</div>
				<a class="pixelpop-site-name-edit pixelpop-option-edit" href="<?php echo esc_url( home_url() ); ?>/wp-admin/customize.php?autofocus[control]=blogname"><?php esc_html_e( 'Customize', 'pixelpop' ); ?></a>
			</div>

			<div class="pixelpop-site-tag-settings pixelpop-settings-group-option">
				<h4><?php esc_html_e( 'Site Tag', 'pixelpop' ); ?></h4>
				<div class="pixelpop-settings-group-option-wrap">
					<span class="pixelpop-site-tag"><?php echo esc_html( get_bloginfo( 'description', 'display' ) ); ?></span>
				</div>
				<a class="pixelpop-site-tag-edit pixelpop-option-edit" href="<?php echo esc_url( home_url() ); ?>/wp-admin/customize.php?autofocus[control]=blogdescription"><?php esc_html_e( 'Customize', 'pixelpop' ); ?></a>
			</div>

			<div class="pixelpop-logo-upload pixelpop-settings-group-option">
				<h4><?php esc_html_e( 'Logo', 'pixelpop' ); ?></h4>
				<?php if ( has_custom_logo() ) { ?>
					<div class="pixelpop-settings-group-option-wrap">
						<?php the_custom_logo(); ?>
					</div>
					<a class="pixelpop-logo-upload pixelpop-option-edit" href="<?php echo esc_url( home_url() ); ?>/wp-admin/customize.php?autofocus[control]=custom_logo"><?php esc_html_e( 'Customize', 'pixelpop' ); ?></a>
				<?php }else{ ?>
					<div class="pixelpop-settings-group-option-wrap">
						<span><?php esc_html_e( 'No Logo Uploaded', 'pixelpop' ); ?></span>
					</div>
					<a class="pixelpop-logo-upload pixelpop-option-edit" href="<?php echo esc_url( home_url() ); ?>/wp-admin/customize.php?autofocus[control]=custom_logo"><?php esc_html_e( 'Upload', 'pixelpop' ); ?></a>
				<?php } ?>
			</div>

		</div>

		<div class="pixelpop-settings-group">
			<h3><?php esc_html_e( 'More Customizer Settings', 'pixelpop' ); ?></h3>

			<div class="pixelpop-settings-group-option">
				<h4><?php esc_html_e( 'Header Setting', 'pixelpop' ); ?></h4>
				<a class="pixelpop-site-name-edit pixelpop-option-edit" href="<?php echo esc_url( home_url() ); ?>/wp-admin/customize.php?autofocus[panel]=pixelpop_header_settings_panel"><?php esc_html_e( 'Customize', 'pixelpop' ); ?></a>
			</div>

			<div class="pixelpop-settings-group-option">
				<h4><?php esc_html_e( 'Footer Setting', 'pixelpop' ); ?></h4>
				<a class="pixelpop-site-name-edit pixelpop-option-edit" href="<?php echo esc_url( home_url() ); ?>/wp-admin/customize.php?autofocus[section]=pixelpop_footer_section"><?php esc_html_e( 'Customize', 'pixelpop' ); ?></a>
			</div>

			<div class="pixelpop-settings-group-option">
				<h4><?php esc_html_e( 'Color Options', 'pixelpop' ); ?></h4>
				<a class="pixelpop-site-name-edit pixelpop-option-edit" href="<?php echo esc_url( home_url() ); ?>/wp-admin/customize.php?autofocus[section]=colors"><?php esc_html_e( 'Customize', 'pixelpop' ); ?></a>
			</div>

			<div class="pixelpop-settings-group-option">
				<h4><?php esc_html_e( 'Typography options', 'pixelpop' ); ?></h4>
				<a class="pixelpop-site-name-edit pixelpop-option-edit" href="<?php echo esc_url( home_url() ); ?>/wp-admin/customize.php?autofocus[section]=pixelpop_typography_section"><?php esc_html_e( 'Customize', 'pixelpop' ); ?></a>
			</div>

		</div>

		<div class="pixelpop-settings-group ppop-theme-rating">
			<div class="ppop-theme-rating-content">
				<h3><?php esc_html_e( 'Did you like the PixelPop Theme?', 'pixelpop' ); ?></h3>
				<p>
					<?php esc_html_e( 'Hey, I am Vishal Ranjan. I have been working really hard on this theme for the past 2 years and I am putting maximum effort to provide you the best functionalities. It would be highly appreciable if you could spend a couple of seconds to give a Nice Review to the theme to appreciate my efforts. Just to help me spread the word and boost my motivation. 🙂', 'pixelpop' ); ?>
				</p>
				<div><a class="whitedot-notice-btn button" target="_blank" href="https://wordpress.org/support/theme/pixelpop/reviews/#new-post"><?php esc_html_e( 'Give a 5 star Rating', 'pixelpop' ); ?></a></div>
			</div>
			<div class="ppop-theme-author">
			</div>
		</div>

	</div>

</form>
