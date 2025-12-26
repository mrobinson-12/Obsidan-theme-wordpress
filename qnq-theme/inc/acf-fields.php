<?php
/**
 * ACF Field Groups Registration
 *
 * Programmatic registration of Advanced Custom Fields
 * for homepage, products, and global settings
 *
 * @package QNQ
 * @since 1.0.0
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Register Homepage ACF Fields
 */
function qnq_register_homepage_fields() {
    if (!function_exists('acf_add_local_field_group')) {
        return;
    }

    acf_add_local_field_group(array(
        'key' => 'group_homepage',
        'title' => 'Homepage Content',
        'fields' => array(
            // Hero Section
            array(
                'key' => 'field_hero_headline',
                'label' => 'Hero Headline',
                'name' => 'hero_headline',
                'type' => 'text',
                'default_value' => 'Precision <span class="text-gradient-purple">3D prints</span> for real life.',
                'instructions' => 'Main headline for homepage hero section'
            ),
            array(
                'key' => 'field_hero_subheadline',
                'label' => 'Hero Subheadline',
                'name' => 'hero_subheadline',
                'type' => 'textarea',
                'rows' => 2,
                'default_value' => 'Functional parts, desk gear, gifts, prototypes - printed in materials that match the job.',
            ),
            array(
                'key' => 'field_hero_image',
                'label' => 'Hero Image',
                'name' => 'hero_image',
                'type' => 'image',
                'return_format' => 'array',
                'preview_size' => 'large',
            ),
            array(
                'key' => 'field_shop_cta_text',
                'label' => 'Shop CTA Text',
                'name' => 'shop_cta_text',
                'type' => 'text',
                'default_value' => 'Shop prints',
            ),
            array(
                'key' => 'field_custom_print_cta_text',
                'label' => 'Custom Print CTA Text',
                'name' => 'custom_print_cta_text',
                'type' => 'text',
                'default_value' => 'Request a custom print',
            ),

            // Value Props
            array(
                'key' => 'field_value_props',
                'label' => 'Value Propositions',
                'name' => 'value_props',
                'type' => 'repeater',
                'min' => 3,
                'max' => 3,
                'layout' => 'block',
                'collapsed' => 'field_value_prop_title',
                'button_label' => 'Add Value Prop',
                'sub_fields' => array(
                    array(
                        'key' => 'field_value_prop_title',
                        'label' => 'Title',
                        'name' => 'title',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'field_value_prop_description',
                        'label' => 'Description',
                        'name' => 'description',
                        'type' => 'textarea',
                        'rows' => 3,
                    ),
                ),
                'default_value' => array(
                    array(
                        'title' => 'Dialed-in tolerances.',
                        'description' => 'Precision checked for fit and finish.',
                    ),
                    array(
                        'title' => 'Material matched to purpose.',
                        'description' => 'We pick the right filament for the job.',
                    ),
                    array(
                        'title' => 'Packed like it matters.',
                        'description' => 'Protected, checked, and shipped right.',
                    ),
                ),
            ),

            // Category Cards
            array(
                'key' => 'field_category_cards',
                'label' => 'Category Cards',
                'name' => 'category_cards',
                'type' => 'repeater',
                'min' => 4,
                'max' => 4,
                'layout' => 'block',
                'collapsed' => 'field_category_title',
                'button_label' => 'Add Category',
                'sub_fields' => array(
                    array(
                        'key' => 'field_category_title',
                        'label' => 'Title',
                        'name' => 'title',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'field_category_description',
                        'label' => 'Description',
                        'name' => 'description',
                        'type' => 'textarea',
                        'rows' => 2,
                    ),
                    array(
                        'key' => 'field_category_materials',
                        'label' => 'Materials Line',
                        'name' => 'materials',
                        'type' => 'text',
                        'default_value' => 'PLA + PETG + ASA',
                    ),
                    array(
                        'key' => 'field_category_cta_label',
                        'label' => 'CTA Label',
                        'name' => 'cta_label',
                        'type' => 'text',
                        'default_value' => 'See examples ->',
                    ),
                    array(
                        'key' => 'field_category_link',
                        'label' => 'Link',
                        'name' => 'link',
                        'type' => 'url',
                    ),
                ),
                'default_value' => array(
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
                    ),
                ),
            ),

            // Materials Section
            array(
                'key' => 'field_show_materials',
                'label' => 'Show Materials Section',
                'name' => 'show_materials',
                'type' => 'true_false',
                'default_value' => 1,
            ),
            array(
                'key' => 'field_materials',
                'label' => 'Materials',
                'name' => 'materials',
                'type' => 'repeater',
                'layout' => 'block',
                'collapsed' => 'field_material_name',
                'button_label' => 'Add Material',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_show_materials',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                ),
                'sub_fields' => array(
                    array(
                        'key' => 'field_material_name',
                        'label' => 'Material Name',
                        'name' => 'name',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'field_material_properties',
                        'label' => 'Key Properties',
                        'name' => 'properties',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'field_material_use_cases',
                        'label' => 'Use Cases',
                        'name' => 'use_cases',
                        'type' => 'textarea',
                        'rows' => 2,
                    ),
                    array(
                        'key' => 'field_material_temp',
                        'label' => 'Temperature Tolerance',
                        'name' => 'temperature',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'field_material_cta_label',
                        'label' => 'CTA Label',
                        'name' => 'cta_label',
                        'type' => 'text',
                        'default_value' => 'Ask what to use ->',
                    ),
                    array(
                        'key' => 'field_material_cta_link',
                        'label' => 'CTA Link',
                        'name' => 'cta_link',
                        'type' => 'url',
                        'default_value' => home_url('/custom-print/'),
                    ),
                ),
                'default_value' => array(
                    array(
                        'name' => 'PLA',
                        'properties' => 'Best for: clean detail',
                        'use_cases' => 'Finish: smooth - matte',
                        'temperature' => '190-220C',
                        'cta_label' => 'Ask what to use ->',
                        'cta_link' => home_url('/custom-print/')
                    ),
                    array(
                        'name' => 'PETG',
                        'properties' => 'Best for: tough and everyday',
                        'use_cases' => 'Finish: durable - gloss',
                        'temperature' => '220-250C',
                        'cta_label' => 'Ask what to use ->',
                        'cta_link' => home_url('/custom-print/')
                    ),
                    array(
                        'name' => 'ASA',
                        'properties' => 'Best for: outdoor ready',
                        'use_cases' => 'Finish: UV resistant',
                        'temperature' => '240-260C',
                        'cta_label' => 'Ask what to use ->',
                        'cta_link' => home_url('/custom-print/')
                    ),
                ),
            ),

            // Trust Signals
            array(
                'key' => 'field_trust_signals',
                'label' => 'Trust Signals / Testimonials',
                'name' => 'trust_signals',
                'type' => 'repeater',
                'layout' => 'block',
                'collapsed' => 'field_trust_quote',
                'button_label' => 'Add Trust Signal',
                'sub_fields' => array(
                    array(
                        'key' => 'field_trust_quote',
                        'label' => 'Quote',
                        'name' => 'quote',
                        'type' => 'textarea',
                        'rows' => 3,
                    ),
                    array(
                        'key' => 'field_trust_attribution',
                        'label' => 'Attribution',
                        'name' => 'attribution',
                        'type' => 'text',
                    ),
                ),
                'default_value' => array(
                    array(
                        'quote' => 'Brilliant quality. Fits perfectly.',
                        'attribution' => 'Sophie, Brisbane'
                    ),
                    array(
                        'quote' => 'Exactly what I needed.',
                        'attribution' => 'Mark, QLD'
                    ),
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_type',
                    'operator' => '==',
                    'value' => 'front_page',
                ),
            ),
        ),
    ));
}
add_action('acf/init', 'qnq_register_homepage_fields');

/**
 * Register Global Settings Fields
 */
function qnq_register_global_settings() {
    if (!function_exists('acf_add_local_field_group')) {
        return;
    }

    acf_add_local_field_group(array(
        'key' => 'group_global_settings',
        'title' => 'QNQ Global Settings',
        'fields' => array(
            // QNQ Lab Teaser
            array(
                'key' => 'field_qnq_lab_enabled',
                'label' => 'Enable QNQ Lab Teaser',
                'name' => 'qnq_lab_enabled',
                'type' => 'true_false',
                'default_value' => 1,
            ),
            array(
                'key' => 'field_qnq_lab_text',
                'label' => 'QNQ Lab Teaser Text',
                'name' => 'qnq_lab_text',
                'type' => 'textarea',
                'rows' => 2,
                'default_value' => 'QNQ Lab: something special is in the works. Get early access ->',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_qnq_lab_enabled',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_qnq_lab_link',
                'label' => 'QNQ Lab Link',
                'name' => 'qnq_lab_link',
                'type' => 'url',
                'default_value' => home_url('/qnq-lab/'),
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_qnq_lab_enabled',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_header_logo_image',
                'label' => 'Header Logo Image',
                'name' => 'header_logo_image',
                'type' => 'image',
                'return_format' => 'array',
                'preview_size' => 'medium',
                'instructions' => 'Optional. Overrides the theme custom logo.',
            ),

            // Footer Settings
            array(
                'key' => 'field_footer_tagline',
                'label' => 'Footer Tagline',
                'name' => 'footer_tagline',
                'type' => 'text',
                'default_value' => 'Made in QLD, AU',
            ),
            array(
                'key' => 'field_instagram_url',
                'label' => 'Instagram URL',
                'name' => 'instagram_url',
                'type' => 'url',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'qnq-settings',
                ),
            ),
        ),
    ));
}
add_action('acf/init', 'qnq_register_global_settings');

/**
 * Register Custom Print Page Fields
 */
function qnq_register_custom_print_fields() {
    if (!function_exists('acf_add_local_field_group')) {
        return;
    }

    acf_add_local_field_group(array(
        'key' => 'group_custom_print',
        'title' => 'Custom Print Page Content',
        'fields' => array(
            array(
                'key' => 'field_custom_print_intro',
                'label' => 'Intro Text',
                'name' => 'custom_print_intro',
                'type' => 'textarea',
                'rows' => 3,
                'default_value' => 'Tell us what you need. We\'ll match the material to your purpose and provide a quote within 24 hours.',
            ),
            array(
                'key' => 'field_cf7_shortcode',
                'label' => 'Contact Form 7 Shortcode',
                'name' => 'cf7_shortcode',
                'type' => 'text',
                'instructions' => 'Enter the Contact Form 7 shortcode (e.g., [contact-form-7 id="123"])',
                'default_value' => '[contact-form-7 id="a66da94" title="Quote"]',
            ),
            array(
                'key' => 'field_confidence_sections',
                'label' => 'Confidence Building Sections',
                'name' => 'confidence_sections',
                'type' => 'repeater',
                'layout' => 'block',
                'button_label' => 'Add Section',
                'sub_fields' => array(
                    array(
                        'key' => 'field_confidence_title',
                        'label' => 'Title',
                        'name' => 'title',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'field_confidence_content',
                        'label' => 'Content',
                        'name' => 'content',
                        'type' => 'wysiwyg',
                        'toolbar' => 'basic',
                        'media_upload' => 0,
                    ),
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'page-custom-print.php',
                ),
            ),
        ),
    ));
}
add_action('acf/init', 'qnq_register_custom_print_fields');

/**
 * Register Product Custom Fields
 */
function qnq_register_product_fields() {
    if (!function_exists('acf_add_local_field_group')) {
        return;
    }

    acf_add_local_field_group(array(
        'key' => 'group_product_details',
        'title' => 'Product Technical Details',
        'fields' => array(
            array(
                'key' => 'field_material_type',
                'label' => 'Material Type',
                'name' => 'material_type',
                'type' => 'select',
                'choices' => array(
                    'pla' => 'PLA',
                    'petg' => 'PETG',
                    'asa' => 'ASA',
                ),
                'required' => 1,
            ),
            array(
                'key' => 'field_tolerances',
                'label' => 'Tolerances',
                'name' => 'tolerances',
                'type' => 'text',
                'placeholder' => 'e.g., ±0.2mm',
            ),
            array(
                'key' => 'field_use_case',
                'label' => 'Use Case Recommendation',
                'name' => 'use_case',
                'type' => 'textarea',
                'rows' => 3,
            ),
            array(
                'key' => 'field_technical_specs',
                'label' => 'Technical Specifications',
                'name' => 'technical_specs',
                'type' => 'repeater',
                'layout' => 'table',
                'button_label' => 'Add Spec',
                'sub_fields' => array(
                    array(
                        'key' => 'field_spec_label',
                        'label' => 'Label',
                        'name' => 'label',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'field_spec_value',
                        'label' => 'Value',
                        'name' => 'value',
                        'type' => 'text',
                    ),
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'product',
                ),
            ),
        ),
    ));
}
add_action('acf/init', 'qnq_register_product_fields');
