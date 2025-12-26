<?php
/**
 * Cart Page
 *
 * @package QNQ
 * @since 1.0.0
 */

defined('ABSPATH') || exit;

if (!function_exists('WC') || !class_exists('WooCommerce')) {
    echo '<p>' . esc_html__('WooCommerce is not active. Please enable it to use the cart.', 'qnq') . '</p>';
    return;
}

$cart = WC()->cart;
if (!$cart) {
    wc_print_notice(__('Cart is currently unavailable. Please refresh and try again.', 'qnq'), 'error');
    return;
}

do_action('woocommerce_before_cart');
?>

<div class="container">
    <header class="page-header">
        <h1 class="page-title">Your Cart</h1>
    </header>

    <form class="woocommerce-cart-form" action="<?php echo esc_url(wc_get_cart_url()); ?>" method="post">
        <?php do_action('woocommerce_before_cart_table'); ?>

        <div class="cart-items-wrapper">
            <table class="shop_table shop_table_responsive cart woocommerce-cart-form__contents" cellspacing="0">
                <thead>
                    <tr>
                        <th class="product-thumbnail">&nbsp;</th>
                        <th class="product-name">Product</th>
                        <th class="product-price">Price</th>
                        <th class="product-quantity">Quantity</th>
                        <th class="product-subtotal">Subtotal</th>
                        <th class="product-remove">&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    <?php do_action('woocommerce_before_cart_contents'); ?>

                    <?php
                    foreach ($cart->get_cart() as $cart_item_key => $cart_item) {
                        $_product = apply_filters('woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key);
                        $product_id = apply_filters('woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key);

                        if ($_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters('woocommerce_cart_item_visible', true, $cart_item, $cart_item_key)) {
                            $product_permalink = apply_filters('woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink($cart_item) : '', $cart_item, $cart_item_key);
                            ?>
                            <tr class="woocommerce-cart-form__cart-item <?php echo esc_attr(apply_filters('woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key)); ?>">

                                <td class="product-thumbnail">
                                    <?php
                                    $thumbnail = apply_filters('woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key);
                                    if (!$product_permalink) {
                                        echo $thumbnail;
                                    } else {
                                        printf('<a href="%s">%s</a>', esc_url($product_permalink), $thumbnail);
                                    }
                                    ?>
                                </td>

                                <td class="product-name" data-title="Product">
                                    <?php
                                    if (!$product_permalink) {
                                        echo wp_kses_post(apply_filters('woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key) . '&nbsp;');
                                    } else {
                                        echo wp_kses_post(apply_filters('woocommerce_cart_item_name', sprintf('<a href="%s">%s</a>', esc_url($product_permalink), $_product->get_name()), $cart_item, $cart_item_key));
                                    }

                                    do_action('woocommerce_after_cart_item_name', $cart_item, $cart_item_key);

                                    // Meta data
                                    echo wc_get_formatted_cart_item_data($cart_item);
                                    ?>
                                </td>

                                <td class="product-price" data-title="Price">
                                    <?php echo apply_filters('woocommerce_cart_item_price', $cart->get_product_price($_product), $cart_item, $cart_item_key); ?>
                                </td>

                                <td class="product-quantity" data-title="Quantity">
                                    <?php
                                    if ($_product->is_sold_individually()) {
                                        $product_quantity = sprintf('1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key);
                                    } else {
                                        $product_quantity = woocommerce_quantity_input(
                                            array(
                                                'input_name' => "cart[{$cart_item_key}][qty]",
                                                'input_value' => $cart_item['quantity'],
                                                'max_value' => $_product->get_max_purchase_quantity(),
                                                'min_value' => '0',
                                                'product_name' => $_product->get_name(),
                                            ),
                                            $_product,
                                            false
                                        );
                                    }

                                    echo apply_filters('woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item);
                                    ?>
                                </td>

                                <td class="product-subtotal" data-title="Subtotal">
                                    <?php echo apply_filters('woocommerce_cart_item_subtotal', $cart->get_product_subtotal($_product, $cart_item['quantity']), $cart_item, $cart_item_key); ?>
                                </td>

                                <td class="product-remove">
                                    <?php
                                    echo apply_filters(
                                        'woocommerce_cart_item_remove_link',
                                        sprintf(
                                            '<a href="%s" class="remove" aria-label="%s" data-product_id="%s" data-product_sku="%s">&times;</a>',
                                            esc_url(wc_get_cart_remove_url($cart_item_key)),
                                            esc_html__('Remove this item', 'woocommerce'),
                                            esc_attr($product_id),
                                            esc_attr($_product->get_sku())
                                        ),
                                        $cart_item_key
                                    );
                                    ?>
                                </td>
                            </tr>
                            <?php
                        }
                    }
                    ?>

                    <?php do_action('woocommerce_cart_contents'); ?>

                    <tr>
                        <td colspan="6" class="actions">
                            <button type="submit" class="btn btn-secondary" name="update_cart" value="<?php esc_attr_e('Update cart', 'woocommerce'); ?>">
                                <?php esc_html_e('Update cart', 'woocommerce'); ?>
                            </button>

                            <?php do_action('woocommerce_cart_actions'); ?>
                            <?php wp_nonce_field('woocommerce-cart', 'woocommerce-cart-nonce'); ?>
                        </td>
                    </tr>

                    <?php do_action('woocommerce_after_cart_contents'); ?>
                </tbody>
            </table>
        </div>

        <?php do_action('woocommerce_after_cart_table'); ?>
    </form>

    <div class="cart-collaterals">
        <div class="cart-totals-wrapper">
            <?php do_action('woocommerce_before_cart_collaterals'); ?>

            <div class="cart-totals">
                <?php do_action('woocommerce_cart_collaterals'); ?>
            </div>

            <div class="cart-reassurance">
                <ul>
                    <li>✓ Every print is checked before packing</li>
                    <li>✓ Ships from Brisbane, QLD</li>
                    <li>✓ Questions? Contact us: <a href="mailto:support@qnq3d.com">support@qnq3d.com</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<?php do_action('woocommerce_after_cart'); ?>
