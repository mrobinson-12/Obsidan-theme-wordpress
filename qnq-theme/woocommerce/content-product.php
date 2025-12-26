<?php
/**
 * The template for displaying product content within loops
 *
 * @package QNQ
 * @since 1.0.0
 */

defined('ABSPATH') || exit;

global $product;

// Ensure visibility.
if (empty($product) || !$product->is_visible()) {
    return;
}
?>

<div <?php wc_product_class('product-card', $product); ?>>
    <a href="<?php the_permalink(); ?>" class="product-card-link">
        <div class="product-card-image-wrapper">
            <?php
            /**
             * Hook: woocommerce_before_shop_loop_item_title.
             */
            echo woocommerce_get_product_thumbnail('qnq-product-thumbnail');
            ?>
        </div>

        <div class="product-card-content">
            <h3 class="product-card-title">
                <?php the_title(); ?>
            </h3>

            <?php
            // Display material badge if ACF field exists
            $material_type = get_field('material_type', $product->get_id());
            if ($material_type) :
                $material_names = array(
                    'pla' => 'PLA',
                    'petg' => 'PETG',
                    'asa' => 'ASA',
                );
            ?>
                <span class="badge badge-material">
                    <?php echo esc_html($material_names[$material_type] ?? $material_type); ?>
                </span>
            <?php endif; ?>

            <div class="product-card-price">
                <?php echo $product->get_price_html(); ?>
            </div>
        </div>
    </a>

    <div class="product-card-actions">
        <?php
        /**
         * Hook: woocommerce_after_shop_loop_item.
         * Outputs the add to cart button
         */
        woocommerce_template_loop_add_to_cart();
        ?>
    </div>
</div>
