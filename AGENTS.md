# Instructions for AI Agents

## GitHub Repository Management

This project is version controlled with Git and synced to a GitHub repository.

**IMPORTANT**: Any updates, changes, or fixes made to this codebase should be pushed to GitHub.

### When Making Changes

After making any modifications to the code:

1. **Stage your changes:**
   ```bash
   git add .
   ```

2. **Create a descriptive commit:**
   ```bash
   git commit -m "Brief description of changes

   - Detail 1
   - Detail 2
   - Detail 3

   🤖 Generated with [Claude Code](https://claude.com/claude-code)

   Co-Authored-By: Claude Sonnet 4.5 <noreply@anthropic.com>"
   ```

3. **Push to GitHub:**
   ```bash
   git push origin main
   ```

### Commit Message Guidelines

- Use clear, descriptive commit messages
- Start with a verb (Add, Fix, Update, Remove, etc.)
- List specific changes as bullet points
- Always include the Claude Code attribution footer
- Include co-authorship credit

### Example Commit Message

```
Fix add to cart button functionality on product archive pages

- Added ajax_add_to_cart class filter to enable AJAX functionality
- Fixed CSS z-index issue preventing button clicks
- Updated JavaScript to use jQuery for WooCommerce compatibility
- Added loading state animations

🤖 Generated with [Claude Code](https://claude.com/claude-code)

Co-Authored-By: Claude Sonnet 4.5 <noreply@anthropic.com>
```

## Project Information

**Project**: QNQ 3D Printing WordPress Theme
**Stack**: WordPress, WooCommerce, PHP, JavaScript, CSS
**Location**: `/home/michaelr/projects/qnq-3d-printing/qnq-theme/`

### Key Files to Know

- `qnq-theme/functions.php` - Theme setup and WooCommerce integration
- `qnq-theme/inc/woocommerce-hooks.php` - WooCommerce customizations
- `qnq-theme/assets/css/woocommerce-overrides.css` - WooCommerce styling
- `qnq-theme/assets/js/main.js` - Theme JavaScript
- `qnq-theme/woocommerce/` - WooCommerce template overrides

### Recent Fixes

1. **Add to Cart Button** - Fixed AJAX functionality on shop/archive pages
2. **Availability Text** - Fixed filter to only show "Currently Unavailable" for out-of-stock products
3. **CSS Layout** - Fixed z-index and layout issues preventing button clicks
4. **JavaScript** - Rewrote to use jQuery for WooCommerce compatibility

## Testing

After making changes:

1. Clear WordPress cache (if caching plugin is active)
2. Hard refresh browser (Ctrl+Shift+F5 or Cmd+Shift+R)
3. Test on shop page, product page, cart, and checkout
4. Check browser console for JavaScript errors
5. Verify WooCommerce AJAX functionality works

## Never Modify Without Committing

- Always commit changes before testing
- Never leave uncommitted code
- Push to GitHub regularly to maintain backup

---

**Last Updated**: 2025-12-26
**Maintained By**: AI Agents (Claude Code)
