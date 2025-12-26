<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="site-wrapper">
    <header class="site-header">
        <div class="container">
            <div class="header-container">
                <div class="site-branding">
                    <?php
                    $header_logo = function_exists('get_field') ? get_field('header_logo_image', 'option') : null;

                    if ($header_logo) :
                    ?>
                        <a href="<?php echo esc_url(home_url('/')); ?>" class="custom-logo-link header-logo-link">
                            <?php
                            echo wp_get_attachment_image(
                                $header_logo['ID'],
                                'full',
                                false,
                                array('class' => 'custom-logo')
                            );
                            ?>
                        </a>
                    <?php elseif (has_custom_logo()) : ?>
                        <?php the_custom_logo(); ?>
                    <?php else : ?>
                        <a href="<?php echo esc_url(home_url('/')); ?>" class="site-logo">
                            QNQ
                        </a>
                    <?php endif; ?>
                </div>

                <button class="menu-toggle" aria-label="Toggle menu" id="menu-toggle">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>

                <nav class="main-navigation" id="main-navigation" aria-label="Primary Navigation">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'menu_class' => 'nav',
                        'container' => false,
                        'fallback_cb' => 'qnq_fallback_menu',
                    ));
                    ?>

                    <?php if (class_exists('WooCommerce') && WC()->cart) : ?>
                        <a href="<?php echo esc_url(wc_get_cart_url()); ?>" class="header-cart">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="9" cy="21" r="1"></circle>
                                <circle cx="20" cy="21" r="1"></circle>
                                <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                            </svg>
                            <?php
                            $cart_count = WC()->cart->get_cart_contents_count();
                            if ($cart_count > 0) :
                            ?>
                                <span class="cart-count"><?php echo esc_html($cart_count); ?></span>
                            <?php endif; ?>
                        </a>
                    <?php endif; ?>
                </nav>
            </div>
        </div>
    </header>

<?php
/**
 * Fallback menu if no menu is assigned
 */
function qnq_fallback_menu() {
    echo '<ul class="nav">';
    echo '<li><a href="' . esc_url(home_url('/')) . '">Home</a></li>';

    if (class_exists('WooCommerce')) {
        echo '<li><a href="' . esc_url(get_permalink(wc_get_page_id('shop'))) . '">Products</a></li>';
    }

    // Check if custom print page exists
    $custom_print_page = get_page_by_path('custom-print');
    if ($custom_print_page) {
        echo '<li><a href="' . esc_url(get_permalink($custom_print_page)) . '">Custom Prints</a></li>';
    }

    echo '<li><a href="' . esc_url(home_url('/#materials')) . '">Materials</a></li>';

    $contact_page = get_page_by_path('contact');
    if ($contact_page) {
        echo '<li><a href="' . esc_url(get_permalink($contact_page)) . '">Contact</a></li>';
    }

    echo '</ul>';
}
?>
