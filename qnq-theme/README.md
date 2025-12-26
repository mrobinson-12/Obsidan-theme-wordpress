# QNQ 3D Printing WordPress Theme

> Precision engineered. Material matched to purpose.

A custom WordPress theme for QNQ 3D Printing featuring a dark, minimal design with purple accents. Built for WooCommerce integration with Advanced Custom Fields for flexible content management.

## Design Philosophy

**Quiet precision. Engineered calm. Confidence without hype.**

This theme embodies a premium tool brand aesthetic with:
- **Obsidian surface** - Dark background (#0a0a0b) that absorbs visual noise
- **Purple as surgical accent** - Used sparingly for CTAs, hover states, and emphasis
- **Restrained typography** - Clear hierarchy with generous spacing
- **Material-first thinking** - Focus on technical expertise over marketing fluff

## Features

- ✓ Fully custom WooCommerce integration
- ✓ ACF-powered content fields for easy editing
- ✓ Mobile-first responsive design
- ✓ Dark theme optimized for readability
- ✓ Locked templates for design consistency
- ✓ Custom product fields for material specs
- ✓ Custom print request page
- ✓ Performance optimized
- ✓ Accessibility focused (WCAG AA compliant)

## Requirements

- **WordPress**: 6.0 or higher
- **PHP**: 7.4 or higher
- **Required Plugins**:
  - WooCommerce (latest version)
  - Advanced Custom Fields (ACF) PRO
  - Contact Form 7

## Installation

### 1. Install WordPress

Set up a fresh WordPress installation locally or on your server.

### 2. Install Required Plugins

Install and activate the following plugins:

```
1. WooCommerce
2. Advanced Custom Fields PRO
3. Contact Form 7
```

### 3. Install the Theme

#### Option A: Direct Upload
1. Download the theme folder
2. Compress it to a ZIP file
3. In WordPress admin, go to **Appearance → Themes → Add New → Upload Theme**
4. Upload the ZIP file and activate

#### Option B: Manual Installation
1. Copy the `qnq-theme` folder to `wp-content/themes/`
2. In WordPress admin, go to **Appearance → Themes**
3. Find "QNQ 3D Printing" and click **Activate**

### 4. Configure WooCommerce

1. Go to **WooCommerce → Settings**
2. Complete the setup wizard
3. Set currency to AUD (Australian Dollar)
4. Configure shipping (Brisbane, QLD based)
5. Set up payment gateways (Stripe/PayPal)

### 5. Create Required Pages

Create the following pages:

**Homepage**
- Set as static front page in **Settings → Reading**
- ACF fields will auto-populate on this page

**Custom Print Page**
- Create a new page titled "Custom Print"
- Assign template: **Custom Print Request**
- Fill in ACF fields

**Shop Page**
- Automatically created by WooCommerce
- No additional configuration needed

### 6. Configure Menus

1. Go to **Appearance → Menus**
2. Create menus for:
   - **Primary Menu** (header navigation)
   - **Footer Menu 1** (footer quick links)
   - **Footer Menu 2** (footer support links)

Suggested Primary Menu structure:
```
- Home
- Shop
- Custom Prints
- Materials (optional)
- Contact
```

### 7. Configure Global Settings

1. Go to **QNQ Settings** in the WordPress admin
2. Configure:
   - QNQ Lab Teaser (enable/disable)
   - Footer tagline (default: "Made in QLD, AU")
   - Instagram URL

### 8. Set Up Homepage Content

1. Edit the homepage (Front Page)
2. Fill in ACF fields:
   - Hero headline
   - Hero subheadline
   - Hero image (upload dark, studio-lit image)
   - Shop CTA text
   - Custom Print CTA text
   - Value propositions (3 items)
   - Category cards (4 items with links to product categories)
   - Materials section (enable and add PLA, PETG, ASA details)
   - Trust signals (customer quotes)

### 9. Create WooCommerce Product Categories

Create the following product categories:

1. **Desk & Workplace**
2. **Home & Hobby**
3. **Gifts & Fun**
4. **Prototypes & Parts**

### 10. Add Products

When adding products:

1. Add product title, description, price
2. Upload dark, studio-lit product images
3. Fill in **Product Technical Details** (ACF fields):
   - Material Type (PLA/PETG/ASA)
   - Tolerances (e.g., ±0.2mm)
   - Use Case Recommendation
   - Technical Specifications (dimensions, weight, etc.)

### 11. Set Up Contact Form 7

1. Create a new Contact Form 7 form for custom print requests
2. Include these fields:
   - Name (required)
   - Email (required)
   - Phone (optional)
   - Project description (textarea, required)
   - File upload (accept: .stl, .obj, .step)
   - Preferred material (dropdown: Not sure, PLA, PETG, ASA)
   - Quantity needed (number)
   - Timeline (dropdown: No rush, Within 2 weeks, Urgent)

3. Copy the shortcode (e.g., `[contact-form-7 id="123"]`)
4. Paste it in the Custom Print page ACF field: **Contact Form 7 Shortcode**

## Design System

### Color Palette

```css
/* Surfaces */
--obsidian: #0a0a0b;     /* Main background */
--basalt: #141414;       /* Card backgrounds */
--coal: #1f1f1f;         /* Elevated elements */
--border: #2a2a2a;       /* Subtle borders */

/* Typography */
--white: #ffffff;        /* Headings */
--ash: #a8a8a8;          /* Body text */
--fog: #6b6b6b;          /* Supporting text */

/* Accent */
--amethyst: #8b5cf6;     /* Primary purple */
--amethyst-dark: #7c3aed; /* Hover states */

/* Semantic */
--success: #10b981;      /* Confirmations */
--error: #ef4444;        /* Errors */
```

### Typography

**Font Family**: System sans-serif stack
```
-apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif
```

**Type Scale**:
- Hero (H1): 48px desktop, 32px mobile
- Section Header (H2): 36px desktop, 28px mobile
- Subsection (H3): 24px desktop, 20px mobile
- Body: 16px
- Small: 14px

### Spacing System

Based on 8px unit:
- XS: 8px
- SM: 16px
- MD: 24px
- LG: 48px
- XL: 72px
- 2XL: 96px

## Content Guidelines

### Copy Tone

- **Confident without hype** - No countdown timers, scarcity tactics, or urgency
- **Technical clarity** - Explain purpose and material choices factually
- **Direct and calm** - Trust built through competence, not persuasion

### Photography Guidelines

All product images should follow these guidelines:

1. **Dark backgrounds** - Use black or dark gray backgrounds
2. **Studio lighting** - Clean, focused lighting on the product
3. **Consistent style** - Maintain visual consistency across all images
4. **Purple accent glow** (optional) - Subtle purple glow on hero images only
5. **No lifestyle shots** - Avoid bright contexts or busy backgrounds

### Material Descriptions

When describing materials, focus on:
- **Purpose**: What is this material best for?
- **Properties**: Rigid, flexible, UV-resistant, etc.
- **Use cases**: Indoor/outdoor, mechanical stress, temperature
- **Tolerances**: Dimensional accuracy specifications

Example:
```
PETG
Properties: Impact resistant & flexible
Use Cases: Functional parts, mechanical components, outdoor use
Temperature Tolerance: -20°C to 70°C
```

## Customization

### Adding New Page Templates

1. Create a new template file in the theme root (e.g., `page-materials.php`)
2. Add template header:
```php
<?php
/**
 * Template Name: Materials Page
 */
```
3. Register ACF fields in `inc/acf-fields.php` if needed

### Modifying Colors

Edit `assets/css/design-system.css` and update CSS custom properties:

```css
:root {
  --amethyst: #YOUR_COLOR;
}
```

### Adding Custom Fonts

1. Enqueue fonts in `functions.php`:
```php
wp_enqueue_style('custom-font', 'FONT_URL');
```

2. Update font family in `assets/css/design-system.css`:
```css
--font-sans: 'Your Font', sans-serif;
```

## File Structure

```
qnq-theme/
├── style.css                    # Theme header
├── functions.php                # Theme setup
├── header.php                   # Site header
├── footer.php                   # Site footer
├── index.php                    # Fallback template
├── front-page.php               # Homepage
├── page.php                     # Default page
├── page-custom-print.php        # Custom print page
├── 404.php                      # Error page
│
├── woocommerce/                 # WooCommerce overrides
│   ├── archive-product.php      # Shop page
│   ├── single-product.php       # Product page
│   ├── content-product.php      # Product card
│   ├── content-single-product.php # Product layout
│   ├── cart/
│   │   └── cart.php             # Cart page
│   └── checkout/
│       └── form-checkout.php    # Checkout page
│
├── template-parts/              # Reusable components
│   ├── hero.php
│   ├── value-props.php
│   ├── category-cards.php
│   ├── materials-section.php
│   ├── qnq-lab-teaser.php
│   └── trust-signals.php
│
├── inc/                         # PHP includes
│   ├── acf-fields.php           # ACF field registration
│   └── woocommerce-hooks.php    # WooCommerce customizations
│
├── assets/
│   ├── css/
│   │   ├── design-system.css    # Variables, typography, spacing
│   │   ├── layout.css           # Site structure
│   │   ├── components.css       # Buttons, cards, forms
│   │   ├── woocommerce-overrides.css
│   │   └── pages/
│   │       ├── homepage.css
│   │       └── custom-print.css
│   │
│   ├── js/
│   │   └── main.js              # Theme JavaScript
│   │
│   └── images/
│       └── (logos, icons)
│
└── README.md                    # This file
```

## Browser Support

- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)
- Mobile Safari (iOS 12+)
- Chrome Mobile (latest)

## Performance

Optimizations included:
- Minimal plugin dependencies
- Dequeued unnecessary WooCommerce CSS
- Removed WordPress bloat (emojis, etc.)
- Lazy loading support
- Optimized asset loading
- No jQuery dependency

## Accessibility

- WCAG AA compliant contrast ratios
- Keyboard navigation support
- Screen reader friendly
- Focus states on interactive elements
- Semantic HTML structure
- ARIA labels where needed

## Security

- Escaped output (`esc_html`, `esc_url`, `wp_kses_post`)
- Nonce verification for AJAX requests
- No direct file access checks
- Sanitized user input
- WordPress version removed from header

## Support & Maintenance

### Common Issues

**Q: ACF fields not showing?**
A: Ensure ACF PRO is installed and activated. Fields are registered programmatically in `inc/acf-fields.php`.

**Q: WooCommerce pages look broken?**
A: Check that WooCommerce is activated and that default styles are properly dequeued in `functions.php`.

**Q: Mobile menu not working?**
A: Ensure JavaScript is loading properly. Check browser console for errors.

**Q: Images not displaying correctly?**
A: Regenerate thumbnails using a plugin like "Regenerate Thumbnails" after theme activation.

### Updating the Theme

1. Backup your site
2. Replace theme files (avoid overwriting customizations)
3. Clear cache
4. Test thoroughly on staging before production

## Credits

- **Design**: Inspired by the reference image provided
- **Development**: Built for QNQ 3D Printing
- **Icons**: Feather Icons (inline SVG)
- **Fonts**: System font stack for performance

## License

Proprietary - All rights reserved by QNQ 3D Printing

## Version History

### 1.0.0 (Initial Release)
- Homepage with ACF fields
- Full WooCommerce integration
- Custom print request page
- Dark theme with purple accents
- Mobile-responsive design
- Product custom fields
- Trust signals and material sections

---

**Built with precision. Engineered for calm.**

For questions or support, contact: hello@qnq3d.com
