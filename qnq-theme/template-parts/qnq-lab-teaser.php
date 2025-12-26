<?php
/**
 * QNQ Lab Teaser Template Part
 *
 * @package QNQ
 * @since 1.0.0
 */

// Safe ACF retrieval - only render if ACF is active
$qnq_lab_enabled = function_exists('get_field') ? get_field('qnq_lab_enabled', 'option') : null;
$qnq_lab_text = function_exists('get_field') ? get_field('qnq_lab_text', 'option') : null;
$qnq_lab_link = function_exists('get_field') ? get_field('qnq_lab_link', 'option') : null;

$should_render = ($qnq_lab_enabled === null) ? true : (bool) $qnq_lab_enabled;

if ($should_render) :
    if (!$qnq_lab_text) {
        $qnq_lab_text = 'QNQ Lab: something special is in the works. Get early access ->';
    }

    if (!$qnq_lab_link) {
        $qnq_lab_link = home_url('/qnq-lab/');
    }
?>

<div class="qnq-lab-teaser">
    <?php if ($qnq_lab_link) : ?>
        <a href="<?php echo esc_url($qnq_lab_link); ?>" class="qnq-lab-teaser-link">
            <span class="qnq-lab-teaser-text"><?php echo esc_html($qnq_lab_text); ?></span>
        </a>
    <?php else : ?>
        <span class="qnq-lab-teaser-text"><?php echo esc_html($qnq_lab_text); ?></span>
    <?php endif; ?>
</div>

<?php endif; ?>
