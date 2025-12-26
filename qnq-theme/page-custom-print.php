<?php
/**
 * Template Name: Custom Print Request
 *
 * @package QNQ
 * @since 1.0.0
 */

get_header();
?>

<div id="main-content" class="custom-print-page">
    <div class="container-narrow">
        <header class="page-header">
            <h1 class="page-title">Request a Custom Item</h1>
            <?php
            $intro_text = get_field('custom_print_intro');
            if ($intro_text) :
            ?>
                <p class="page-subtitle"><?php echo esc_html($intro_text); ?></p>
            <?php else : ?>
                <p class="page-subtitle">
                    Tell us what you need. We'll match the material to your purpose and provide a quote within 24 hours.
                </p>
            <?php endif; ?>
        </header>

        <div class="custom-print-content">
            <!-- Process Overview -->
            <section class="process-overview section">
                <h2 class="section-title">How It Works</h2>

                <div class="grid grid-4">
                    <div class="process-step">
                        <div class="step-number">1</div>
                        <h3>Submit Request</h3>
                        <p>Upload a file or describe what you need</p>
                    </div>

                    <div class="process-step">
                        <div class="step-number">2</div>
                        <h3>We Review</h3>
                        <p>We analyze your requirements and recommend the right material</p>
                    </div>

                    <div class="process-step">
                        <div class="step-number">3</div>
                        <h3>Get Quote</h3>
                        <p>Receive a transparent quote within 24 hours</p>
                    </div>

                    <div class="process-step">
                        <div class="step-number">4</div>
                        <h3>We Print & Ship</h3>
                        <p>Approve the quote and we'll print and ship from Brisbane</p>
                    </div>
                </div>
            </section>

            <!-- Material Guidance -->
            <section class="material-guidance section">
                <h2 class="section-title">Not sure which material?</h2>

                <div class="grid grid-3">
                    <div class="card">
                        <h3 class="card-title">PLA</h3>
                        <p class="card-description">Rigid & biodegradable. Best for prototypes, indoor parts, and general use. Good dimensional accuracy.</p>
                    </div>

                    <div class="card">
                        <h3 class="card-title">PETG</h3>
                        <p class="card-description">Impact resistant & flexible. Ideal for functional parts, mechanical components, and outdoor use.</p>
                    </div>

                    <div class="card">
                        <h3 class="card-title">ASA</h3>
                        <p class="card-description">UV resistant & durable. Perfect for outdoor applications and parts exposed to weather.</p>
                    </div>
                </div>

                <p class="material-note">
                    Don't worry if you're not sure — we'll recommend the right material based on your use case.
                </p>
            </section>

            <!-- Request Form -->
            <section class="request-form-section section">
                <div class="grid grid-2">
                    <div class="form-wrapper">
                        <?php
                        $cf7_shortcode = get_field('cf7_shortcode');
                        if ($cf7_shortcode) {
                            echo do_shortcode($cf7_shortcode);
                        } else {
                            echo do_shortcode('[contact-form-7 id="a66da94" title="Quote"]');
                        }
                        ?>
                    </div>

                    <aside class="form-aside">
                        <h3>What we need</h3>
                        <ul>
                            <li>File types: STL, OBJ, STEP</li>
                            <li>Dimensions or target size</li>
                            <li>Preferred material or use case</li>
                            <li>Quantity and deadline</li>
                        </ul>
                        <div class="form-aside-card">
                            <h4>Fast response</h4>
                            <p>Quotes are typically delivered within 24 hours.</p>
                        </div>
                    </aside>
                </div>
            </section>

            <!-- Confidence Sections -->
            <?php
            $confidence_sections = get_field('confidence_sections');
            if ($confidence_sections) :
            ?>
                <section class="confidence-sections section">
                    <?php foreach ($confidence_sections as $section) : ?>
                        <div class="confidence-block">
                            <h3><?php echo esc_html($section['title']); ?></h3>
                            <div class="confidence-content">
                                <?php echo wp_kses_post($section['content']); ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </section>
            <?php else : ?>
                <!-- Default confidence content -->
                <section class="confidence-sections section">
                    <div class="confidence-block">
                        <h3>What happens next?</h3>
                        <div class="confidence-content">
                            <ul>
                                <li>We review your file and requirements within 24 hours</li>
                                <li>Recommend material matched to your purpose</li>
                                <li>Provide transparent quote with timeline</li>
                                <li>Print and ship from Brisbane once approved</li>
                            </ul>
                        </div>
                    </div>

                    <div class="confidence-block">
                        <h3>Why QNQ for custom prints?</h3>
                        <div class="confidence-content">
                            <ul>
                                <li><strong>Material expertise:</strong> We match the right material to your use case</li>
                                <li><strong>Precision tolerances:</strong> Tested for dimensional accuracy</li>
                                <li><strong>Brisbane-based:</strong> Fast turnaround for Australian customers</li>
                                <li><strong>Quality assurance:</strong> Every print checked before packing</li>
                            </ul>
                        </div>
                    </div>
                </section>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php
get_footer();
