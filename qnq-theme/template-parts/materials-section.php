<?php
/**
 * Materials Section Template Part
 *
 * @package QNQ
 * @since 1.0.0
 */

// Safe ACF retrieval with fallback defaults
$show_materials = function_exists('get_field') ? get_field('show_materials') : true;
$materials = function_exists('get_field') ? get_field('materials') : null;

// Default materials if ACF not set
if (!$materials) {
    $materials = array(
        array(
            'name' => 'PLA',
            'properties' => 'Best for: clean detail',
            'use_cases' => 'Finish: smooth - matte',
            'temperature' => '190-220C'
        ),
        array(
            'name' => 'PETG',
            'properties' => 'Best for: tough and everyday',
            'use_cases' => 'Finish: durable - gloss',
            'temperature' => '220-250C'
        ),
        array(
            'name' => 'ASA',
            'properties' => 'Best for: outdoor ready',
            'use_cases' => 'Finish: UV resistant',
            'temperature' => '240-260C'
        )
    );
}

if ($show_materials && $materials) :
    $custom_print_page = get_page_by_path('custom-print');
    $default_cta_link = $custom_print_page ? get_permalink($custom_print_page) : home_url('/custom-print/');
?>

<section class="materials-section section" id="materials">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">Materials,</h2>
            <p class="section-subtitle">Material matched to purpose.</p>
        </div>

        <div class="grid grid-3">
            <?php foreach ($materials as $material) : ?>
                <div class="card material-card">
                    <div class="material-header">
                        <h3 class="card-title"><?php echo esc_html($material['name']); ?></h3>
                        <span class="badge badge-material">
                            <?php echo esc_html($material['properties']); ?>
                        </span>
                    </div>

                    <div class="material-details">
                        <?php if ($material['use_cases']) : ?>
                            <p class="material-use-cases">
                                <?php echo esc_html($material['use_cases']); ?>
                            </p>
                        <?php endif; ?>

                        <?php if ($material['temperature']) : ?>
                            <p class="material-temp">
                                <small>Temperature: <?php echo esc_html($material['temperature']); ?></small>
                            </p>
                        <?php endif; ?>
                    </div>

                    <?php
                    $material_cta_label = $material['cta_label'] ?? 'Ask what to use ->';
                    $material_cta_link = $material['cta_link'] ?? $default_cta_link;
                    ?>
                    <?php if ($material_cta_label && $material_cta_link) : ?>
                        <a class="material-cta" href="<?php echo esc_url($material_cta_link); ?>">
                            <?php echo esc_html($material_cta_label); ?>
                        </a>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php endif; ?>
