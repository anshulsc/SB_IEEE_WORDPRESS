<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package pixelpop
 */

namespace PixelPop;

?>
<!doctype html>
<html <?php language_attributes(); ?> class="no-js ppop-light-theme">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<?php
/**
 * The pixelpop_before_site hook.
 *
 * @since 1.0.0
 */

do_action( 'pixelpop_before_site' );
?>

<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'pixelpop' ); ?></a>

	<?php

	/**
	 * The pixelpop_header hook.
	 *
	 * @since 1.0.0
	 *
	 * @hooked pixelpop_header - 10
	 */
	do_action( 'pixelpop_header' );

	/**
	 * The pixelpop_content_start hook.
	 *
	 * @since 1.0.0
	 *
	 * @hooked pixelpop_below_header - 10
	 * @hooked pixelpop_content_start - 20
	 */
	do_action( 'pixelpop_content_start' );
