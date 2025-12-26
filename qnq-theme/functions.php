<?php
/**
 * QNQ 3D Printing Theme Functions
 *
 * Precision engineered. Material matched to purpose.
 *
 * @package QNQ
 * @since 1.0.0
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Theme Setup
 */
function qnq_theme_setup() {
    // Add theme support
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));

    // WooCommerce support
    add_theme_support('woocommerce');
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');

    // Register navigation menus
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'qnq'),
        'footer-1' => __('Footer Menu 1', 'qnq'),
        'footer-2' => __('Footer Menu 2', 'qnq'),
    ));

    // Set content width
    if (!isset($content_width)) {
        $content_width = 1280;
    }
}
add_action('after_setup_theme', 'qnq_theme_setup');

/**
 * Enqueue Scripts and Styles
 */
function qnq_enqueue_assets() {
    $theme_version = wp_get_theme()->get('Version');

    // Stylesheets
    wp_enqueue_style('qnq-design-system', get_template_directory_uri() . '/assets/css/design-system.css', array(), $theme_version);
    wp_enqueue_style('qnq-layout', get_template_directory_uri() . '/assets/css/layout.css', array('qnq-design-system'), $theme_version);
    wp_enqueue_style('qnq-components', get_template_directory_uri() . '/assets/css/components.css', array('qnq-design-system'), $theme_version);
    wp_enqueue_style('qnq-homepage', get_template_directory_uri() . '/assets/css/pages/homepage.css', array('qnq-components'), $theme_version);
    wp_enqueue_style('qnq-custom-print', get_template_directory_uri() . '/assets/css/pages/custom-print.css', array('qnq-components'), $theme_version);
    wp_enqueue_style('qnq-lab', get_template_directory_uri() . '/assets/css/pages/qnq-lab.css', array('qnq-components'), $theme_version);
    wp_enqueue_style('qnq-woocommerce', get_template_directory_uri() . '/assets/css/woocommerce-overrides.css', array('qnq-components'), $theme_version);
    wp_enqueue_style('qnq-style', get_stylesheet_uri(), array('qnq-woocommerce'), $theme_version);

    // Scripts (jQuery is a dependency for WooCommerce)
    wp_enqueue_script('qnq-main', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), $theme_version, true);

    // Localize script for AJAX
    wp_localize_script('qnq-main', 'qnqData', array(
        'ajaxUrl' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('qnq_nonce')
    ));

    // Ensure WooCommerce add-to-cart script is loaded on shop pages
    if (class_exists('WooCommerce')) {
        wp_enqueue_script('wc-add-to-cart');
        wp_enqueue_script('wc-add-to-cart-variation');
    }
}
add_action('wp_enqueue_scripts', 'qnq_enqueue_assets');

/**
 * Remove WooCommerce Default Styles
 */
function qnq_dequeue_woocommerce_styles($enqueue_styles) {
    // Remove all default WooCommerce CSS
    unset($enqueue_styles['woocommerce-general']);
    unset($enqueue_styles['woocommerce-layout']);
    unset($enqueue_styles['woocommerce-smallscreen']);
    return $enqueue_styles;
}
add_filter('woocommerce_enqueue_styles', 'qnq_dequeue_woocommerce_styles');

/**
 * Include Additional Files
 */
require get_template_directory() . '/inc/acf-fields.php';
require get_template_directory() . '/inc/woocommerce-hooks.php';

/**
 * ACF Options Page for Global Settings
 */
if (function_exists('acf_add_options_page')) {
    acf_add_options_page(array(
        'page_title' => 'QNQ Global Settings',
        'menu_title' => 'QNQ Settings',
        'menu_slug' => 'qnq-settings',
        'capability' => 'edit_posts',
        'icon_url' => 'dashicons-admin-generic',
        'redirect' => false
    ));
}

/**
 * Custom Image Sizes
 */
function qnq_image_sizes() {
    add_image_size('qnq-product-thumbnail', 400, 400, true);
    add_image_size('qnq-product-large', 800, 800, true);
    add_image_size('qnq-hero', 1600, 900, true);
}
add_action('after_setup_theme', 'qnq_image_sizes');

/**
 * Disable Gutenberg on Specific Templates
 */
function qnq_disable_gutenberg($use_block_editor, $post) {
    $template = get_page_template_slug($post->ID);

    // Disable on homepage and custom print page
    $disabled_templates = array(
        'page-custom-print.php'
    );

    if (in_array($template, $disabled_templates) || is_front_page()) {
        return false;
    }

    return $use_block_editor;
}
add_filter('use_block_editor_for_post', 'qnq_disable_gutenberg', 10, 2);

/**
 * Custom Excerpt Length
 */
function qnq_excerpt_length($length) {
    return 20;
}
add_filter('excerpt_length', 'qnq_excerpt_length');

/**
 * Custom Excerpt More
 */
function qnq_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'qnq_excerpt_more');

/**
 * Add Body Classes
 */
function qnq_body_classes($classes) {
    // Add class if WooCommerce is active
    if (class_exists('WooCommerce')) {
        $classes[] = 'woocommerce-active';
    }

    // Add class for homepage
    if (is_front_page()) {
        $classes[] = 'qnq-homepage';
    }

    return $classes;
}
add_filter('body_class', 'qnq_body_classes');

/**
 * Customize WooCommerce Product Columns
 */
function qnq_loop_columns() {
    return 3; // 3 products per row
}
add_filter('loop_shop_columns', 'qnq_loop_columns');

/**
 * Customize WooCommerce Products Per Page
 */
function qnq_products_per_page() {
    return 12;
}
add_filter('loop_shop_per_page', 'qnq_products_per_page');

/**
 * Security: Remove WordPress Version
 */
remove_action('wp_head', 'wp_generator');

/**
 * Performance: Remove Emoji Scripts
 */
function qnq_disable_emojis() {
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action('admin_print_styles', 'print_emoji_styles');
    remove_filter('the_content_feed', 'wp_staticize_emoji');
    remove_filter('comment_text_rss', 'wp_staticize_emoji');
    remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
}
add_action('init', 'qnq_disable_emojis');

/**
 * Get Cart Count for Header
 */
function qnq_get_cart_count() {
    if (class_exists('WooCommerce') && WC()->cart) {
        return WC()->cart->get_cart_contents_count();
    }
    return 0;
}

/**
 * AJAX Update Cart Count
 */
function qnq_update_cart_count() {
    check_ajax_referer('qnq_nonce', 'nonce');
    wp_send_json_success(array('count' => qnq_get_cart_count()));
}
add_action('wp_ajax_qnq_update_cart_count', 'qnq_update_cart_count');
add_action('wp_ajax_nopriv_qnq_update_cart_count', 'qnq_update_cart_count');

/**
 * Custom Logo Support
 */
function qnq_custom_logo_setup() {
    add_theme_support('custom-logo', array(
        'height' => 50,
        'width' => 200,
        'flex-height' => true,
        'flex-width' => true,
    ));
}
add_action('after_setup_theme', 'qnq_custom_logo_setup');
