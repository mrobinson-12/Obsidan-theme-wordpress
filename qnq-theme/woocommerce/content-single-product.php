<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * @package QNQ
 * @since 1.0.0
 */

defined('ABSPATH') || exit;

global $product;

?>

<div id="product-<?php the_ID(); ?>" <?php wc_product_class('', $product); ?>>
    <div class="container">
        <div class="product-layout">
            <div class="product-gallery">
                <?php
                /**
                 * Hook: woocommerce_before_single_product_summary.
                 */
                do_action('woocommerce_before_single_product_summary');
                ?>
            </div>

            <div class="product-summary">
                <?php
                /**
                 * Hook: woocommerce_single_product_summary.
                 */
                do_action('woocommerce_single_product_summary');
                ?>
            </div>
        </div>

        <div class="product-details-tabs">
            <?php
            /**
             * Hook: woocommerce_after_single_product_summary.
             */
            do_action('woocommerce_after_single_product_summary');
            ?>
        </div>
    </div>
</div>
