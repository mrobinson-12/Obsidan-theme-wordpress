<?php
/**
 * Value Propositions Template Part
 *
 * @package QNQ
 * @since 1.0.0
 */

// Safe ACF retrieval
$value_props = function_exists('get_field') ? get_field('value_props') : null;

// Default values if not set or ACF not available
if (!$value_props) {
    $value_props = array(
        array(
            'title' => 'Dialed-in tolerances.',
            'description' => 'Precision checked for fit and finish.'
        ),
        array(
            'title' => 'Material matched to purpose.',
            'description' => 'We pick the right filament for the job.'
        ),
        array(
            'title' => 'Packed like it matters.',
            'description' => 'Protected, checked, and shipped right.'
        ),
    );
}

if ($value_props) :
?>

<section class="value-props-section section">
    <div class="container">
        <div class="grid grid-3">
            <?php foreach ($value_props as $prop) : ?>
                <div class="card trust-signal">
                    <h3 class="card-title"><?php echo esc_html($prop['title']); ?></h3>
                    <p class="card-description"><?php echo esc_html($prop['description']); ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php endif; ?>
