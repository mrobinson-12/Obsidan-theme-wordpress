<?php
/**
 * The Template for displaying all single products
 *
 * @package QNQ
 * @since 1.0.0
 */

defined('ABSPATH') || exit;

get_header('shop');

?>

<div id="main-content" class="woocommerce-single-product">
    <?php
    while (have_posts()) :
        the_post();
        wc_get_template_part('content', 'single-product');
    endwhile;
    ?>
</div>

<?php
get_footer('shop');
