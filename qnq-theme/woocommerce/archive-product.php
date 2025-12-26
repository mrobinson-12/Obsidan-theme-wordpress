<?php
/**
 * The Template for displaying product archives, including the main shop page
 *
 * @package QNQ
 * @since 1.0.0
 */

defined('ABSPATH') || exit;

get_header('shop');
?>

<div id="main-content" class="woocommerce-shop-page">
    <div class="container">
        <header class="page-header">
            <h1 class="page-title">
                <?php woocommerce_page_title(); ?>
            </h1>
            <p class="page-subtitle">
                Precision 3D prints ready to ship. Material matched to purpose.
            </p>
        </header>

        <?php if (woocommerce_product_loop()) : ?>

            <?php
            /**
             * Hook: woocommerce_before_shop_loop.
             */
            do_action('woocommerce_before_shop_loop');
            ?>

            <div class="products-grid grid grid-3">
                <?php
                if (wc_get_loop_prop('total')) {
                    while (have_posts()) {
                        the_post();

                        /**
                         * Hook: woocommerce_shop_loop.
                         */
                        do_action('woocommerce_shop_loop');

                        wc_get_template_part('content', 'product');
                    }
                }
                ?>
            </div>

            <?php
            /**
             * Hook: woocommerce_after_shop_loop.
             */
            do_action('woocommerce_after_shop_loop');
            ?>

        <?php else : ?>

            <div class="no-products-found">
                <p>No products found. Check back soon.</p>
                <a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn-primary">
                    Back to Home
                </a>
            </div>

        <?php endif; ?>
    </div>
</div>

<?php
get_footer('shop');
