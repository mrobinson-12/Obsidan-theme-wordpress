<?php
/**
 * WooCommerce Customizations and Hooks
 *
 * Modify WooCommerce behavior to match QNQ design philosophy
 *
 * @package QNQ
 * @since 1.0.0
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Remove WooCommerce Breadcrumbs
 */
remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);

/**
 * Remove WooCommerce Sidebar
 */
remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);

/**
 * Remove Related Products
 */
remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);

/**
 * Remove Product Upsells
 */
remove_action('woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15);

/**
 * Remove Cross-sells from Cart
 */
remove_action('woocommerce_cart_collaterals', 'woocommerce_cross_sell_display');

/**
 * Remove Product Result Count and Ordering on Shop Page
 */
remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);
remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);

/**
 * Customize Add to Cart Button Text
 */
function qnq_custom_add_to_cart_text($text, $product = null) {
    if (!$product) {
        global $product;
    }

    if (!$product || !is_a($product, 'WC_Product')) {
        return $text;
    }

    if ($product->is_type('simple')) {
        return 'Add to Cart';
    }

    if ($product->is_type('variable')) {
        return 'Select Options';
    }

    return $text;
}
add_filter('woocommerce_product_single_add_to_cart_text', 'qnq_custom_add_to_cart_text', 10, 2);
add_filter('woocommerce_product_add_to_cart_text', 'qnq_custom_add_to_cart_text', 10, 2);

/**
 * Change "Out of Stock" Text
 */
function qnq_custom_out_of_stock_text($text, $product) {
    // Only change text if product is actually out of stock
    if (!$product->is_in_stock()) {
        return 'Currently Unavailable';
    }
    // Return original text for in-stock products
    return $text;
}
add_filter('woocommerce_get_availability_text', 'qnq_custom_out_of_stock_text', 10, 2);

/**
 * Remove Product Meta (SKU, Categories, Tags)
 */
function qnq_remove_product_meta() {
    // Keep SKU but remove categories and tags
    remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);
}
add_action('wp', 'qnq_remove_product_meta');

/**
 * Custom Product Tabs
 */
function qnq_custom_product_tabs($tabs) {
    // Remove reviews tab
    unset($tabs['reviews']);

    // Rename description tab
    $tabs['description']['title'] = 'Details';
    $tabs['description']['priority'] = 10;

    // Add Material Info Tab
    $tabs['material_info'] = array(
        'title' => 'Material Info',
        'priority' => 20,
        'callback' => 'qnq_material_info_tab_content'
    );

    // Add Shipping & Returns Tab
    $tabs['shipping_returns'] = array(
        'title' => 'Shipping & Returns',
        'priority' => 30,
        'callback' => 'qnq_shipping_returns_tab_content'
    );

    return $tabs;
}
add_filter('woocommerce_product_tabs', 'qnq_custom_product_tabs');

/**
 * Material Info Tab Content
 */
function qnq_material_info_tab_content() {
    global $post;

    $material_type = get_field('material_type', $post->ID);
    $tolerances = get_field('tolerances', $post->ID);
    $use_case = get_field('use_case', $post->ID);
    $technical_specs = get_field('technical_specs', $post->ID);

    echo '<div class="material-info-content">';

    if ($material_type) {
        $material_names = array(
            'pla' => 'PLA (Polylactic Acid)',
            'petg' => 'PETG (Polyethylene Terephthalate Glycol)',
            'asa' => 'ASA (Acrylonitrile Styrene Acrylate)',
        );

        echo '<h3>Material: ' . esc_html($material_names[$material_type] ?? $material_type) . '</h3>';
    }

    if ($tolerances) {
        echo '<p><strong>Tolerances:</strong> ' . esc_html($tolerances) . '</p>';
    }

    if ($use_case) {
        echo '<div class="use-case-section">';
        echo '<h4>Why this material?</h4>';
        echo '<p>' . wp_kses_post($use_case) . '</p>';
        echo '</div>';
    }

    if ($technical_specs) {
        echo '<div class="technical-specs">';
        echo '<h4>Technical Specifications</h4>';
        echo '<table class="specs-table">';
        foreach ($technical_specs as $spec) {
            echo '<tr>';
            echo '<td><strong>' . esc_html($spec['label']) . '</strong></td>';
            echo '<td>' . esc_html($spec['value']) . '</td>';
            echo '</tr>';
        }
        echo '</table>';
        echo '</div>';
    }

    echo '</div>';
}

/**
 * Shipping & Returns Tab Content
 */
function qnq_shipping_returns_tab_content() {
    ?>
    <div class="shipping-returns-content">
        <h3>Shipping</h3>
        <p>All orders ship from Brisbane, QLD within 2-3 business days.</p>
        <p>We use Australia Post for all deliveries. Tracking information will be provided once your order ships.</p>

        <h3>Returns</h3>
        <p>We check every print before packing. If there's an issue with your order, contact us within 7 days of delivery.</p>
        <p>Email: <a href="mailto:support@qnq3d.com">support@qnq3d.com</a></p>
    </div>
    <?php
}

/**
 * Add Trust Signals Below Add to Cart Button
 */
function qnq_add_trust_signals() {
    ?>
    <div class="product-trust-signals">
        <ul>
            <li>✓ Tested for fit</li>
            <li>✓ Checked before packing</li>
            <li>✓ Ships from Brisbane, QLD</li>
        </ul>
    </div>
    <?php
}
add_action('woocommerce_after_add_to_cart_button', 'qnq_add_trust_signals');

/**
 * Customize WooCommerce Messages
 */
function qnq_custom_woocommerce_messages($messages) {
    // Customize various messages to match QNQ tone
    return $messages;
}
add_filter('woocommerce_add_to_cart_message_html', 'qnq_custom_woocommerce_messages');

/**
 * Update Cart Fragments for AJAX
 */
function qnq_cart_count_fragments($fragments) {
    if (class_exists('WooCommerce') && WC()->cart) {
        $fragments['.cart-count'] = '<span class="cart-count">' . WC()->cart->get_cart_contents_count() . '</span>';
    }
    return $fragments;
}
add_filter('woocommerce_add_to_cart_fragments', 'qnq_cart_count_fragments');

/**
 * Custom Shop Page Title
 */
function qnq_shop_page_title() {
    return 'Prints';
}
add_filter('woocommerce_page_title', 'qnq_shop_page_title');

/**
 * Remove Default WooCommerce Wrapper
 */
remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action('woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

/**
 * Add Custom WooCommerce Wrapper
 */
function qnq_woocommerce_wrapper_start() {
    echo '<div id="main-content" class="woocommerce-content"><div class="container">';
}
add_action('woocommerce_before_main_content', 'qnq_woocommerce_wrapper_start', 10);

function qnq_woocommerce_wrapper_end() {
    echo '</div></div>';
}
add_action('woocommerce_after_main_content', 'qnq_woocommerce_wrapper_end', 10);

/**
 * Customize Sale Badge
 */
function qnq_custom_sale_badge($html, $post, $product) {
    return '<span class="badge badge-sale">Sale</span>';
}
add_filter('woocommerce_sale_flash', 'qnq_custom_sale_badge', 10, 3);

/**
 * Customize Empty Cart Message
 */
function qnq_empty_cart_message() {
    return 'Your cart is empty. <a href="' . get_permalink(wc_get_page_id('shop')) . '">Browse prints</a>';
}
add_filter('wc_empty_cart_message', 'qnq_empty_cart_message');

/**
 * Customize Continue Shopping URL
 */
function qnq_continue_shopping_url() {
    return get_permalink(wc_get_page_id('shop'));
}
add_filter('woocommerce_continue_shopping_redirect', 'qnq_continue_shopping_url');

/**
 * Enable AJAX Add to Cart on Product Archives
 */
function qnq_loop_add_to_cart_args($args, $product) {
    // Ensure AJAX add to cart class is added for simple products
    if ($product && $product->is_type('simple') && $product->is_purchasable() && $product->is_in_stock()) {
        $args['class'] = isset($args['class']) ? $args['class'] . ' ajax_add_to_cart' : 'ajax_add_to_cart';
    }
    return $args;
}
add_filter('woocommerce_loop_add_to_cart_args', 'qnq_loop_add_to_cart_args', 10, 2);
