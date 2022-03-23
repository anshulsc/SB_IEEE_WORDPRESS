<?php
/**
 * Cart Page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.8.0
 */

defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_before_cart' ); ?>


<form class="woocommerce-cart-form" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">
	<?php do_action( 'woocommerce_before_cart_table' ); ?>

	<div class="cart ppop-cart-contents woocommerce-cart-form__contents" cellspacing="0">

		<div class="ppop-cart-contents-wrap">
			<?php do_action( 'woocommerce_before_cart_contents' ); ?>

			<?php
			foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
				$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
				$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

				if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
					$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
					?>
					<div class="woocommerce-cart-form__cart-item woocommerce-cart-form__cart-item cart_item z-layout-box z-pad-15 z-mar-b-15 z-d-flex z-align-items-center z-position-relative <?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">

						<div class="product-thumbnail z-mar-r-10">
						<?php
						$thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );

						if ( ! $product_permalink ) {
							echo $thumbnail; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
						} else {
							printf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $thumbnail ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
						}
						?>
						</div>

						<div class="product-desc z-d-flex z-flex-column z-mar-r-auto">

							<div class="product-name z-position-relative" data-title="<?php esc_attr_e( 'Product', 'pixelpop' ); ?>">
								<?php
								if ( ! $product_permalink ) {
									echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) . '&nbsp;' );
								} else {
									echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $_product->get_name() ), $cart_item, $cart_item_key ) );
								}

								do_action( 'woocommerce_after_cart_item_name', $cart_item, $cart_item_key );

								?>

								<div class="p-meta">
									<?php
									// Meta data.
									echo wc_get_formatted_cart_item_data( $cart_item ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
									?>
								</div>

								<div class="p-backdoor">
									<?php
									// Backorder notification.
									if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item['quantity'] ) ) {
										echo wp_kses_post( apply_filters( 'woocommerce_cart_item_backorder_notification', '<p class="backorder_notification">' . esc_html__( 'Available on backorder', 'pixelpop' ) . '</p>', $product_id ) );
									}
									?>
								</div>

								<div class="product-full-desc z-d-none z-pad-10 z-pad-l-15 z-pad-r-15 z-layout-box z-text-def z-border-secondary z-shadow-m z-position-absolute">
									<div class="p-name">
										<?php
										if ( ! $product_permalink ) {
											echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) . '&nbsp;' );
										} else {
											echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $_product->get_name() ), $cart_item, $cart_item_key ) );
										}
										?>
									</div>

									<div class="p-meta">
										<?php
										// Meta data.
										echo wc_get_formatted_cart_item_data( $cart_item ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
										?>
									</div>

									<div class="p-backdoor">
										<?php
										// Backorder notification.
										if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item['quantity'] ) ) {
											echo wp_kses_post( apply_filters( 'woocommerce_cart_item_backorder_notification', '<p class="backorder_notification">' . esc_html__( 'Available on backorder', 'pixelpop' ) . '</p>', $product_id ) );
										}
										?>
									</div>

								</div>

							</div>

							<div class="product-price z-lh-1 z-text-def-2 z-fs-5" data-title="<?php esc_attr_e( 'Price', 'pixelpop' ); ?>">
								<span class="price-label z-d-none z-lm-d-inline"><?php esc_html_e( 'Price: ', 'pixelpop' ); ?></span>
								<?php
									echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
								?>
							</div>

						</div>

						<div class="product-quantity z-mar-r-10" data-title="<?php esc_attr_e( 'Quantity', 'pixelpop' ); ?>">
						<?php
						if ( $_product->is_sold_individually() ) {
							$product_quantity = sprintf( '1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key );
						} else {
							$product_quantity = woocommerce_quantity_input(
								array(
									'input_name'   => "cart[{$cart_item_key}][qty]",
									'input_value'  => $cart_item['quantity'],
									'max_value'    => $_product->get_max_purchase_quantity(),
									'min_value'    => '0',
									'product_name' => $_product->get_name(),
								),
								$_product,
								false
							);
						}

						echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
						?>
						</div>

						<div class="product-subtotal z-mar-r-10 z-fw-700" data-title="<?php esc_attr_e( 'Subtotal', 'pixelpop' ); ?>">
							<span class="subtotal-label z-d-none z-lm-d-inline z-text-def-2 z-fw-400"><?php esc_html_e( 'Subtotal: ', 'pixelpop' ); ?></span>
							<?php
								echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
							?>
						</div>

						<div class="product-remove z-mar-l-10">
							<?php
								echo apply_filters( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
									'woocommerce_cart_item_remove_link',
									sprintf(
										'<a href="%s" class="remove z-text-def-2" aria-label="%s" data-product_id="%s" data-product_sku="%s"><i class="ppop-icon ppop-icon-trash-2 ppop-icon ppop-icon-trash-2 z-pad-10 z-bg-layout-secondary z-br-full"></i></a>',
										esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
										esc_html__( 'Remove this item', 'pixelpop' ),
										esc_attr( $product_id ),
										esc_attr( $_product->get_sku() )
									),
									$cart_item_key
								);
							?>
						</div>
					</div>
					<?php
				}
			}
			?>

			<?php do_action( 'woocommerce_cart_contents' ); ?>


			<div  class="actions z-d-flex  z-justify-content-end">

				<button type="submit" class="button" name="update_cart" value="<?php esc_attr_e( 'Update cart', 'pixelpop' ); ?>"><?php esc_html_e( 'Update cart', 'pixelpop' ); ?></button>

				<?php do_action( 'woocommerce_cart_actions' ); ?>

				<?php wp_nonce_field( 'woocommerce-cart', 'woocommerce-cart-nonce' ); ?>

			</div>

			<?php do_action( 'woocommerce_after_cart_contents' ); ?>
		</div>
	</div>
	<?php do_action( 'woocommerce_after_cart_table' ); ?>
</form>

<?php do_action( 'woocommerce_before_cart_collaterals' ); ?>

<div class="cart-collaterals">
	<?php
		/**
		 * Cart collaterals hook.
		 *
		 * @hooked woocommerce_cross_sell_display
		 * @hooked woocommerce_cart_totals - 10
		 */
		do_action( 'woocommerce_cart_collaterals' );
	?>
</div>

<?php do_action( 'woocommerce_after_cart' ); ?>
