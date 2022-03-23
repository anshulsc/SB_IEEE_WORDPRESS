<?php
/**
 * Template part for displaying the header navigation menu
 *
 * @package pixelpop
 */

namespace PixelPop;

if ( ! pixelpop()->is_primary_nav_menu_active() ) {
	return;
}

?>

<nav id="site-navigation" class="main-navigation nav--toggle-sub nav--toggle-small" aria-label="<?php esc_attr_e( 'Main menu', 'pixelpop' ); ?>"
	<?php
	if ( pixelpop()->is_amp() ) {
		?>
		[class]=" siteNavigationMenu.expanded ? 'main-navigation nav--toggle-sub nav--toggle-small nav--toggled-on' : 'main-navigation nav--toggle-sub nav--toggle-small' "
		<?php
	}
	?>
>
	<?php
	if ( pixelpop()->is_amp() ) {
		?>
		<amp-state id="siteNavigationMenu">
			<script type="application/json">
				{
					"expanded": false
				}
			</script>
		</amp-state>
		<?php
	}
	?>

	<button class="menu-toggle" aria-label="<?php esc_attr_e( 'Open menu', 'pixelpop' ); ?>" aria-controls="primary-menu" aria-expanded="false"
		<?php
		if ( pixelpop()->is_amp() ) {
			?>
			on="tap:AMP.setState( { siteNavigationMenu: { expanded: ! siteNavigationMenu.expanded } } )"
			[aria-expanded]="siteNavigationMenu.expanded ? 'true' : 'false'"
			<?php
		}
		?>
	>
		<?php esc_html_e( 'Menu', 'pixelpop' ); ?>
	</button>

	<div class="primary-menu-container">
		<?php pixelpop()->display_primary_nav_menu( array( 'menu_id' => 'primary-menu' ) ); ?>
	</div>
</nav><!-- #site-navigation -->
