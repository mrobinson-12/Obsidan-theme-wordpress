<?php
/**
 * Homepage Template
 *
 * @package QNQ
 * @since 1.0.0
 */

get_header();
?>

<div id="main-content" class="homepage-content">
    <?php
    // Hero Section
    get_template_part('template-parts/hero');

    // Value Propositions
    get_template_part('template-parts/value-props');

    // Category Cards
    get_template_part('template-parts/category-cards');

    // QNQ Lab Teaser
    get_template_part('template-parts/qnq-lab-teaser');

    // Materials Section
    get_template_part('template-parts/materials-section');

    // Trust Signals
    get_template_part('template-parts/trust-signals');
    ?>
</div>

<?php
get_footer();
