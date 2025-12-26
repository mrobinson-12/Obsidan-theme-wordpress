<?php
/**
 * Category Cards Template Part
 *
 * @package QNQ
 * @since 1.0.0
 */

// Safe ACF retrieval with fallback defaults
$category_cards = function_exists('get_field') ? get_field('category_cards') : null;

// Default categories if ACF not set
if (!$category_cards) {
    $category_cards = array(
        array(
            'title' => 'Desk & Workspace',
            'description' => 'Organize your setup',
            'materials' => 'PLA + PETG + ASA',
            'cta_label' => 'See examples ->',
            'link' => home_url('/shop/')
        ),
        array(
            'title' => 'Home & Handy',
            'description' => 'Tools that work',
            'materials' => 'PLA + PETG + ASA',
            'cta_label' => 'See examples ->',
            'link' => home_url('/shop/')
        ),
        array(
            'title' => 'Gifts & Fun',
            'description' => 'Clever creations',
            'materials' => 'PLA + PETG + ASA',
            'cta_label' => 'See examples ->',
            'link' => home_url('/shop/')
        ),
        array(
            'title' => 'Prototypes & Parts',
            'description' => 'Solutions in progress',
            'materials' => 'PLA + PETG + ASA',
            'cta_label' => 'See examples ->',
            'link' => home_url('/custom-print/')
        )
    );
}

if ($category_cards) :
?>

<section class="category-cards-section section">
    <div class="container">
        <div class="grid grid-4">
            <?php foreach ($category_cards as $category) : ?>
                <a href="<?php echo esc_url($category['link']); ?>" class="card-link">
                    <div class="card category-card">
                        <h3 class="card-title"><?php echo esc_html($category['title']); ?></h3>
                        <p class="card-description"><?php echo esc_html($category['description']); ?></p>
                        <?php if (!empty($category['materials'])) : ?>
                            <span class="category-materials"><?php echo esc_html($category['materials']); ?></span>
                        <?php endif; ?>
                        <?php if (!empty($category['cta_label'])) : ?>
                            <span class="category-cta"><?php echo esc_html($category['cta_label']); ?></span>
                        <?php endif; ?>
                        <div class="category-arrow">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                <polyline points="12 5 19 12 12 19"></polyline>
                            </svg>
                        </div>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php endif; ?>
