<?php
/**
 * Hero Section Template Part
 *
 * @package QNQ
 * @since 1.0.0
 */

// Safe ACF field retrieval with fallbacks
if (function_exists('get_field')) {
    $hero_headline = get_field('hero_headline');
    $hero_subheadline = get_field('hero_subheadline');
    $hero_image = get_field('hero_image');
    $shop_cta_text = get_field('shop_cta_text');
    $custom_print_cta_text = get_field('custom_print_cta_text');
} else {
    // ACF not available - use defaults
    $hero_headline = null;
    $hero_subheadline = null;
    $hero_image = null;
    $shop_cta_text = null;
    $custom_print_cta_text = null;
}

// Apply defaults if fields are empty
if (!$hero_headline) {
    $hero_headline = 'Precision <span class="text-gradient-purple">3D prints</span> for real life.';
}
if (!$hero_subheadline) {
    $hero_subheadline = 'Functional parts, desk gear, gifts, prototypes - printed in materials that match the job.';
}
if (!$shop_cta_text) {
    $shop_cta_text = 'Shop prints';
}
if (!$custom_print_cta_text) {
    $custom_print_cta_text = 'Request a custom print';
}
?>

<section class="hero-section">
    <div class="hero-content container">
        <div class="hero-text">
            <h1 class="hero-headline">
                <?php echo wp_kses_post($hero_headline); ?>
            </h1>

            <p class="hero-subheadline">
                <?php echo esc_html($hero_subheadline); ?>
            </p>

            <div class="hero-cta btn-group">
                <?php if (class_exists('WooCommerce')) : ?>
                    <a href="<?php echo esc_url(get_permalink(wc_get_page_id('shop'))); ?>" class="btn btn-primary">
                        <?php echo esc_html($shop_cta_text); ?>
                    </a>
                <?php endif; ?>

                <?php
                $custom_print_page = get_page_by_path('custom-print');
                if ($custom_print_page) :
                ?>
                    <a href="<?php echo esc_url(get_permalink($custom_print_page)); ?>" class="btn btn-secondary">
                        <?php echo esc_html($custom_print_cta_text); ?>
                    </a>
                <?php endif; ?>
            </div>
        </div>

        <?php if ($hero_image) : ?>
            <div class="hero-image">
                <img src="<?php echo esc_url($hero_image['url']); ?>"
                     alt="<?php echo esc_attr($hero_image['alt']); ?>"
                     width="<?php echo esc_attr($hero_image['width']); ?>"
                     height="<?php echo esc_attr($hero_image['height']); ?>">
            </div>
        <?php endif; ?>
    </div>
</section>
