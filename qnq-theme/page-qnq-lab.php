<?php
/**
 * Template Name: QNQ Lab
 *
 * @package QNQ
 * @since 1.3.0
 */

get_header();
?>

<div id="main-content" class="lab-page">
    <section class="lab-hero">
        <div class="container">
            <div class="lab-hero-content">
                <p class="lab-eyebrow">QNQ Lab</p>
                <h1 class="lab-title">New product in development: the QNQ Modular Desk Dock.</h1>
                <p class="lab-subtitle">
                    QNQ Lab is where we test new ideas, materials, and workflows. Right now, we are building a compact
                    desk system that keeps cables, tools, and small parts in one clean footprint.
                </p>
                <div class="lab-cta">
                    <a class="btn btn-primary" href="mailto:hello@qnq3d.com?subject=QNQ%20Lab%20Access">Get early access</a>
                    <a class="btn btn-secondary" href="<?php echo esc_url(home_url('/custom-print/')); ?>">Request a custom item</a>
                </div>
            </div>
        </div>
    </section>

    <section class="lab-section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">What is being built.</h2>
                <p class="section-subtitle">A modular dock for desks and workspaces, tested for fit, finish, and durability.</p>
            </div>

            <div class="grid grid-3">
                <div class="card lab-card">
                    <h3 class="card-title">Modular layout</h3>
                    <p class="card-description">Stackable trays and clips that let you build the setup you need.</p>
                </div>
                <div class="card lab-card">
                    <h3 class="card-title">Material tuned</h3>
                    <p class="card-description">Optimized for strength, smooth finish, and daily handling.</p>
                </div>
                <div class="card lab-card">
                    <h3 class="card-title">Limited early run</h3>
                    <p class="card-description">Small batch release first to Lab insiders for feedback.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="lab-section lab-process">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">How it ships.</h2>
                <p class="section-subtitle">We prototype, test, and release when it meets the bar.</p>
            </div>

            <div class="lab-steps">
                <div class="lab-step">
                    <span class="lab-step-number">1</span>
                    <div>
                        <h3>Prototype</h3>
                        <p>We build a first run and test for fit, finish, and strength.</p>
                    </div>
                </div>
                <div class="lab-step">
                    <span class="lab-step-number">2</span>
                    <div>
                        <h3>Refine</h3>
                        <p>We adjust materials, tolerances, and geometry based on feedback.</p>
                    </div>
                </div>
                <div class="lab-step">
                    <span class="lab-step-number">3</span>
                    <div>
                        <h3>Release</h3>
                        <p>Limited drops go live first to Lab insiders, then wider availability.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="lab-cta-section" id="early-access">
        <div class="container-narrow">
            <div class="lab-cta-card">
                <h2>Want early access?</h2>
                <p>Tell us what you need, and we will loop you in when a Lab project fits.</p>
                <a class="btn btn-primary" href="mailto:hello@qnq3d.com?subject=QNQ%20Lab%20Early%20Access">Join the Lab list</a>
            </div>
        </div>
    </section>
</div>

<?php
get_footer();
