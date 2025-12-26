<?php
/**
 * 404 Error Page Template
 *
 * @package QNQ
 * @since 1.0.0
 */

get_header();
?>

<div id="main-content">
    <div class="container">
        <div class="error-404-content">
            <h1>404</h1>
            <p>Page not found.</p>
            <div class="error-404-actions">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn-primary">
                    Back to Home
                </a>
                <?php if (class_exists('WooCommerce')) : ?>
                    <a href="<?php echo esc_url(get_permalink(wc_get_page_id('shop'))); ?>" class="btn btn-secondary">
                        Browse Prints
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?php
get_footer();
