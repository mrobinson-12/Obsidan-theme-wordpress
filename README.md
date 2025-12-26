# QNQ 3D Printing - WordPress Theme

A custom WordPress theme for QNQ 3D Printing, featuring full WooCommerce integration and a dark, modern design system.

## Description

This is a custom WordPress theme built for a 3D printing business. The theme features:

- **WooCommerce Integration** - Custom product templates, cart, and checkout pages
- **Dark Theme Design** - Modern, professional dark theme with custom color system
- **Material-Focused** - Display material types (PLA, PETG, ASA) with custom fields
- **AJAX Add to Cart** - Seamless shopping experience without page reloads
- **Responsive Design** - Mobile-first layouts for all devices
- **Custom Page Templates** - Homepage, Custom Print page, QNQ Lab page

## Installation

1. Clone this repository or download as ZIP
2. Copy the `qnq-theme` folder to your WordPress installation's `wp-content/themes/` directory
3. Activate the theme in WordPress admin (Appearance → Themes)
4. Install and activate required plugins:
   - WooCommerce
   - Advanced Custom Fields (ACF) Pro (recommended)
5. Import demo content or configure products manually

## Usage

### Setting Up Products

1. Create products in WooCommerce as usual
2. Use ACF fields to add material information:
   - Material Type (PLA, PETG, ASA)
   - Tolerances
   - Use Case
   - Technical Specifications

### Configuring Pages

- **Homepage**: Set a page to use the "Front Page" template
- **Custom Print**: Use the "Custom Print" page template
- **QNQ Lab**: Use the "QNQ Lab" page template
- **Shop**: WooCommerce automatically creates this page

## Recent Updates

### Add to Cart Fix (2025-12-26)
- Fixed AJAX add to cart functionality on product archive pages
- Resolved CSS z-index issue preventing button clicks
- Added loading state animations and success feedback
- Fixed availability text filter to correctly handle in-stock products

### Features
- Custom product cards with material badges
- Trust signals and value propositions
- Mobile-responsive navigation
- Cart count updates via AJAX
- Custom WooCommerce messaging

## Development

### File Structure

```
qnq-theme/
├── assets/
│   ├── css/           # Stylesheets
│   └── js/            # JavaScript files
├── inc/
│   ├── acf-fields.php         # ACF field definitions
│   └── woocommerce-hooks.php  # WooCommerce customizations
├── template-parts/    # Reusable template components
├── woocommerce/      # WooCommerce template overrides
├── functions.php     # Theme setup and functionality
└── style.css        # Theme metadata

```

### Key Files

- `functions.php` - Theme setup, script enqueuing, WooCommerce support
- `inc/woocommerce-hooks.php` - WooCommerce customizations and filters
- `assets/css/woocommerce-overrides.css` - WooCommerce-specific styling
- `assets/js/main.js` - Interactive features and AJAX handlers

### For AI Agents

See [AGENTS.md](AGENTS.md) for instructions on maintaining this codebase.

## Contributing

Contributions are welcome! Please feel free to submit a Pull Request.

All changes should be committed with descriptive messages and pushed to the GitHub repository.

## Author

Michael Robinson (mrobi343@eq.edu.au)

## License

MIT

## Created

2025-12-24
