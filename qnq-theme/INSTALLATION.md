# Quick Installation Guide

## Prerequisites

1. WordPress 6.0+
2. PHP 7.4+
3. WooCommerce plugin
4. Advanced Custom Fields PRO plugin
5. Contact Form 7 plugin

## 5-Minute Setup

### 1. Install Theme

Upload `qnq-theme` to `wp-content/themes/` and activate.

### 2. Install Required Plugins

```
WooCommerce
Advanced Custom Fields PRO
Contact Form 7
```

### 3. Create Pages

Create these pages:
- **Homepage** (set as front page)
- **Custom Print** (assign "Custom Print Request" template)

### 4. Configure WooCommerce

Run WooCommerce setup wizard:
- Currency: AUD
- Location: Brisbane, QLD, Australia
- Add payment gateway (Stripe/PayPal)

### 5. Create Product Categories

Add these categories in WooCommerce:
- Desk & Workplace
- Home & Hobby
- Gifts & Fun
- Prototypes & Parts

### 6. Set Up Menus

**Appearance → Menus**

Create Primary Menu:
```
Home
Shop
Custom Prints
Contact
```

### 7. Configure Homepage

Edit the front page and fill in ACF fields:
- Hero headline: `Precision <span class="text-amethyst">3D prints</span> for real life.`
- Hero subheadline
- Hero image (dark background, product photo)
- Value props (3 items)
- Category cards (4 items - link to your WooCommerce categories)
- Materials (PLA, PETG, ASA)

### 8. Set Up Contact Form

1. Create Contact Form 7 form with these fields:
   - Name, Email, Phone
   - Project description
   - File upload (.stl, .obj, .step)
   - Material preference dropdown
   - Quantity, Timeline

2. Copy shortcode to Custom Print page ACF field

### 9. Configure Global Settings

**QNQ Settings** in admin:
- Footer tagline: "Made in QLD, AU"
- Instagram URL (optional)
- QNQ Lab teaser (optional)

### 10. Add Products

Add products with:
- Title, description, price
- Dark product images
- Material type (ACF field)
- Tolerances
- Technical specs

## That's It!

Your QNQ 3D Printing site is ready!

For detailed documentation, see [README.md](README.md)
