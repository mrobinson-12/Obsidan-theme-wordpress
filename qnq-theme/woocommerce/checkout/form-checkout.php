<?php
/**
 * Checkout Form
 *
 * @package QNQ
 * @since 1.0.0
 */

defined('ABSPATH') || exit;

if (!function_exists('WC') || !class_exists('WooCommerce')) {
    echo '<p>' . esc_html__('WooCommerce is not active. Please enable it to checkout.', 'qnq') . '</p>';
    return;
}

$checkout = WC()->checkout();
if (!$checkout) {
    wc_print_notice(__('Checkout is currently unavailable. Please refresh and try again.', 'qnq'), 'error');
    return;
}

do_action('woocommerce_before_checkout_form', $checkout);

// If checkout registration is disabled and not logged in, the user cannot checkout.
if (!$checkout->is_registration_enabled() && $checkout->is_registration_required() && !is_user_logged_in()) {
    echo esc_html(apply_filters('woocommerce_checkout_must_be_logged_in_message', __('You must be logged in to checkout.', 'woocommerce')));
    return;
}

?>

<div class="container">
    <header class="page-header">
        <h1 class="page-title">Checkout</h1>
    </header>

    <form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url(wc_get_checkout_url()); ?>" enctype="multipart/form-data">

        <?php if ($checkout->get_checkout_fields()) : ?>

            <?php do_action('woocommerce_checkout_before_customer_details'); ?>

            <div class="checkout-layout">
                <div class="checkout-main">
                    <div id="customer_details">
                        <div class="billing-fields">
                            <h3>Billing Details</h3>
                            <?php do_action('woocommerce_checkout_billing'); ?>
                        </div>

                        <div class="shipping-fields">
                            <?php do_action('woocommerce_checkout_shipping'); ?>
                        </div>
                    </div>

                    <?php do_action('woocommerce_checkout_after_customer_details'); ?>
                </div>

                <div class="checkout-sidebar">
                    <div class="order-review-wrapper">
                        <h3 id="order_review_heading">Your Order</h3>

                        <?php do_action('woocommerce_checkout_before_order_review'); ?>

                        <div id="order_review" class="woocommerce-checkout-review-order">
                            <?php do_action('woocommerce_checkout_order_review'); ?>
                        </div>

                        <?php do_action('woocommerce_checkout_after_order_review'); ?>

                        <div class="checkout-trust-signals">
                            <ul>
                                <li>✓ Secure checkout</li>
                                <li>✓ Checked before packing</li>
                                <li>✓ Ships from Brisbane, QLD</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        <?php endif; ?>

    </form>
</div>

<?php do_action('woocommerce_after_checkout_form', $checkout); ?>
