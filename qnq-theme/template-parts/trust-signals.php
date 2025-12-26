<?php
/**
 * Trust Signals Template Part
 *
 * @package QNQ
 * @since 1.0.0
 */

// Safe ACF retrieval with fallback defaults
$trust_signals = function_exists('get_field') ? get_field('trust_signals') : null;

// Default trust signals if ACF not set
if (!$trust_signals) {
    $trust_signals = array(
        array(
            'quote' => 'Brilliant quality. Fits perfectly.',
            'attribution' => 'Sophie, Brisbane'
        ),
        array(
            'quote' => 'Exactly what I needed.',
            'attribution' => 'Mark, QLD'
        )
    );
}

if ($trust_signals) :
?>

<section class="trust-signals-section section">
    <div class="container">
        <div class="trust-signals-header">
            <div class="trust-process">
                <span>Tell us what you need</span>
                <span class="trust-process-divider"></span>
                <span>We confirm material + fit</span>
                <span class="trust-process-divider"></span>
                <span>Printed, checked, shipped</span>
            </div>
            <p class="trust-tagline">No guesswork. No drama. Just good parts.</p>
        </div>

        <div class="grid grid-2">
            <?php foreach ($trust_signals as $signal) : ?>
                <div class="trust-signal">
                    <blockquote class="trust-signal-quote">
                        "<?php echo esc_html($signal['quote']); ?>"
                    </blockquote>
                    <?php if ($signal['attribution']) : ?>
                        <p class="trust-signal-attribution">
                            — <?php echo esc_html($signal['attribution']); ?>
                        </p>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php endif; ?>
