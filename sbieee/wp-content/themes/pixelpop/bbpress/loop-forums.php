<?php

/**
 * Forums Loop
 *
 * @package bbPress
 * @subpackage Theme
 */

// Exit if accessed directly
defined( 'ABSPATH' ) || exit;

do_action( 'bbp_template_before_forums_loop' ); ?>

<ul class="ppop-bbp-forums">

	<?php while ( bbp_forums() ) : bbp_the_forum(); ?>

		<?php bbp_get_template_part( 'loop', 'single-forum' ); ?>

	<?php endwhile; ?>

</ul><!-- .forums-directory -->

<?php do_action( 'bbp_template_after_forums_loop' );
