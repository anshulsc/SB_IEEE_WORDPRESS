<?php
/**
 * Thankyou page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/thankyou.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.7.0
 */

defined( 'ABSPATH' ) || exit;
?>

<style>

.woocommerce-checkout.woocommerce-page.woocommerce-order-received h1.ppop-post-title,
.woocommerce-checkout.woocommerce.woocommerce-order-received h1.ppop-post-title {
	margin-top: 0;
	margin-bottom: 25px;
	line-height: 1;
}

.ppop-order-thankyou-hero{
	margin: 0 -25px;
	margin-bottom: 25px;
	background-color: var(--color-primary);
}

.ppop-order-thankyou-hero.order-success {
	background-color: #66d29b;
	background-image: linear-gradient( 45deg, #66d29b 0%, #f3ef73 100% );
}

.ppop-order-thankyou-hero.order-fail {
	background-color: #ff9153;
	background-image: radial-gradient( circle farthest-corner at 10% 20%, rgba(255,209,67,1) 0%, rgb(245 142 83) 90% );
}

.ppop-order-thankyou-hero .hero-icon {
	font-size: 50px;
}

.woocommerce .woocommerce-thankyou-order-failed-actions a {
	margin: 10px;
	min-width: 170px;
	text-transform: uppercase;
	font-weight: 700;
}

</style>

<div class="woocommerce-order">

	<?php
	if ( $order ) :

		do_action( 'woocommerce_before_thankyou', $order->get_id() );
		?>

		<?php if ( $order->has_status( 'failed' ) ) : ?>

			<div class="ppop-order-thankyou-hero order-fail z-pad-15 z-pad-t-50 z-pad-b-50 z-text-white z-mar-b-50">

				<div class="ppop-hero-content z-pad-t-20 z-pad-b-30 z-text-center">

					<div class="hero-icon">
						<i class="ppop-icon ppop-icon-alert-circle"></i>
					</div>

					<p class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed z-mar-0 z-fs-2 z-fw-600 z-lm-fs-3"><?php esc_html_e( 'Unfortunately your order cannot be processed as the originating bank/merchant has declined your transaction. Please attempt your purchase again.', 'pixelpop' ); ?></p>
				</div>

			</div>

			<p class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed-actions z-d-flex z-justify-content-center z-flex-wrap z-mar-t-30 z-mar-b-30">
				<a href="<?php echo esc_url( $order->get_checkout_payment_url() ); ?>" class="button pay"><?php esc_html_e( 'Pay', 'pixelpop' ); ?></a>
				<?php if ( is_user_logged_in() ) : ?>
					<a href="<?php echo esc_url( wc_get_page_permalink( 'myaccount' ) ); ?>" class="button pay"><?php esc_html_e( 'My account', 'pixelpop' ); ?></a>
				<?php endif; ?>
			</p>

		<?php else : ?>

			<div class="ppop-order-thankyou-hero order-success z-pad-15 z-pad-t-50 z-pad-b-50 z-text-white z-mar-b-50">

				<div class="ppop-hero-content z-pad-t-20 z-pad-b-30 z-text-center">

						<div class="hero-icon">
							<i class="ppop-icon ppop-icon-check-circle"></i>
						</div>

						<p class="woocommerce-notice woocommerce-notice--success woocommerce-thankyou-order-received z-mar-0 z-fs-2 z-fw-600 z-lm-fs-3"><?php echo apply_filters( 'woocommerce_thankyou_order_received_text', esc_html__( 'Thank you. Your order has been received.', 'pixelpop' ), $order ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>

					</div>

			</div>

			<ul class="woocommerce-order-overview woocommerce-thankyou-order-details order_details z-simple-list">

				<li class="woocommerce-order-overview__order order">
					<?php esc_html_e( 'Order number:', 'pixelpop' ); ?>
					<strong><?php echo $order->get_order_number(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></strong>
				</li>

				<li class="woocommerce-order-overview__date date">
					<?php esc_html_e( 'Date:', 'pixelpop' ); ?>
					<strong><?php echo wc_format_datetime( $order->get_date_created() ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></strong>
				</li>

				<?php if ( is_user_logged_in() && $order->get_user_id() === get_current_user_id() && $order->get_billing_email() ) : ?>
					<li class="woocommerce-order-overview__email email">
						<?php esc_html_e( 'Email:', 'pixelpop' ); ?>
						<strong><?php echo $order->get_billing_email(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></strong>
					</li>
				<?php endif; ?>

				<li class="woocommerce-order-overview__total total">
					<?php esc_html_e( 'Total:', 'pixelpop' ); ?>
					<strong><?php echo $order->get_formatted_order_total(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></strong>
				</li>

				<?php if ( $order->get_payment_method_title() ) : ?>
					<li class="woocommerce-order-overview__payment-method method">
						<?php esc_html_e( 'Payment method:', 'pixelpop' ); ?>
						<strong><?php echo wp_kses_post( $order->get_payment_method_title() ); ?></strong>
					</li>
				<?php endif; ?>

			</ul>

		<?php endif; ?>

		<?php do_action( 'woocommerce_thankyou_' . $order->get_payment_method(), $order->get_id() ); ?>
		<?php do_action( 'woocommerce_thankyou', $order->get_id() ); ?>

	<?php else : ?>

		<p class="woocommerce-notice woocommerce-notice--success woocommerce-thankyou-order-received"><?php echo apply_filters( 'woocommerce_thankyou_order_received_text', esc_html__( 'Thank you. Your order has been received.', 'pixelpop' ), null ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>

	<?php endif; ?>

</div>
