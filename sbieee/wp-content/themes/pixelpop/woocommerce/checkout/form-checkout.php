<?php
/**
 * Checkout Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

do_action( 'woocommerce_before_checkout_form', $checkout );

// If checkout registration is disabled and not logged in, the user cannot checkout.
if ( ! $checkout->is_registration_enabled() && $checkout->is_registration_required() && ! is_user_logged_in() ) {
	echo esc_html( apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'You must be logged in to checkout.', 'pixelpop' ) ) );
	return;
}
?>

<form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data">

	<div class="ppop-checkout-content z-grid z-lm-gap-5">

		<div class="ppop-checkout-primary z-g-col-7 z-lm-g-col-12">

			<?php if ( ! is_user_logged_in() ) { ?>
				<?php if ( 'yes' === get_option( 'woocommerce_enable_checkout_login_reminder' ) ) { ?>

					<div class="ppop-woo-form-login-toggle z-layout-box z-pad-15 z-mar-b-15">
						<?php esc_html_e( 'Returning customer?', 'pixelpop' ); ?>
						<a href="#" class="ppop-showlogin"> <?php esc_html_e( 'Click here to login', 'pixelpop' ); ?></a>
					</div>

				<?php } ?>

			<?php } ?>

			<div class="ppop-checkout-primary-content z-layout-box z-pad-25">

				<?php if ( $checkout->get_checkout_fields() ) : ?>

					<?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>

					<div class="col2-set" id="customer_details">
						<div class="col-1">
							<?php do_action( 'woocommerce_checkout_billing' ); ?>
						</div>

						<div class="col-2">
							<?php do_action( 'woocommerce_checkout_shipping' ); ?>
						</div>
					</div>

					<?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>

				<?php endif; ?>
			</div>

		</div>

		<div class="ppop-checkout-secondary z-g-col-5 z-lm-g-col-12">
			<div class="ppop-checkout-secondary-content z-layout-box">

				<div class="ppop-order-review-title z-pad-15 z-border-b">
					<h3 class="z-mar-0 z-lh-1" id="order_review_heading"><?php esc_html_e( 'Your order', 'pixelpop' ); ?></h3>
				</div>

				<div class="ppop-checkout-cart-item-toggle z-pad-10 z-pad-l-15 z-pad-r-15 z-border z-fw-600 z-d-flex z-justify-content-between z-align-items-center z-cursor-pointer z-mar-15 z-br-5 z-shadow-s">
					<span><?php esc_html_e( 'Cart Items', 'pixelpop' ); ?></span>
					<i class="ppop-icon ppop-icon-chevron-down"></i>
				</div>
				<?php PixelPop\pixelpop_checkout_cart_items(); ?>

				<?php do_action( 'woocommerce_checkout_before_order_review_heading' ); ?>

				<?php do_action( 'woocommerce_checkout_before_order_review' ); ?>

				<div id="order_review" class="woocommerce-checkout-review-order">
					<?php do_action( 'woocommerce_checkout_order_review' ); ?>
				</div>

				<?php do_action( 'woocommerce_checkout_after_order_review' ); ?>

			</div>
		<div>

	</div>

</form>

<?php do_action( 'woocommerce_after_checkout_form', $checkout );
?>
