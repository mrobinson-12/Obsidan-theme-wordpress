/**
 * QNQ Theme Main JavaScript
 * Interactions, mobile menu, cart updates
 *
 * @package QNQ
 * @since 1.0.0
 */

(function() {
  'use strict';

  /**
   * Mobile Menu Toggle
   */
  function initMobileMenu() {
    const menuToggle = document.getElementById('menu-toggle');
    const mainNav = document.getElementById('main-navigation');

    if (menuToggle && mainNav) {
      menuToggle.addEventListener('click', function() {
        mainNav.classList.toggle('active');
        menuToggle.classList.toggle('active');

        // Update aria-expanded
        const expanded = mainNav.classList.contains('active');
        menuToggle.setAttribute('aria-expanded', expanded);
      });

      // Close menu when clicking outside
      document.addEventListener('click', function(event) {
        if (!menuToggle.contains(event.target) && !mainNav.contains(event.target)) {
          mainNav.classList.remove('active');
          menuToggle.classList.remove('active');
          menuToggle.setAttribute('aria-expanded', 'false');
        }
      });

      // Close menu on escape key
      document.addEventListener('keydown', function(event) {
        if (event.key === 'Escape' && mainNav.classList.contains('active')) {
          mainNav.classList.remove('active');
          menuToggle.classList.remove('active');
          menuToggle.setAttribute('aria-expanded', 'false');
        }
      });
    }
  }

  /**
   * Update Cart Count via AJAX (WooCommerce)
   */
  function updateCartCount() {
    if (typeof qnqData === 'undefined') {
      return;
    }

    const cartCountElements = document.querySelectorAll('.cart-count');

    // Listen for WooCommerce events
    document.body.addEventListener('added_to_cart', function(event) {
      // WooCommerce already handles fragment refresh
      // This is just a fallback
      setTimeout(function() {
        fetch(qnqData.ajaxUrl + '?action=qnq_update_cart_count&nonce=' + qnqData.nonce)
          .then(response => response.json())
          .then(data => {
            if (data.success && data.data.count) {
              cartCountElements.forEach(function(element) {
                element.textContent = data.data.count;
                element.style.display = 'flex';
              });
            }
          })
          .catch(error => console.error('Error updating cart count:', error));
      }, 500);
    });
  }

  /**
   * Smooth Scroll for Anchor Links
   */
  function initSmoothScroll() {
    const anchorLinks = document.querySelectorAll('a[href^="#"]');

    anchorLinks.forEach(function(link) {
      link.addEventListener('click', function(e) {
        const href = this.getAttribute('href');

        // Skip if it's just "#"
        if (href === '#') {
          return;
        }

        const target = document.querySelector(href);

        if (target) {
          e.preventDefault();

          const headerHeight = document.querySelector('.site-header').offsetHeight;
          const targetPosition = target.getBoundingClientRect().top + window.pageYOffset - headerHeight - 20;

          window.scrollTo({
            top: targetPosition,
            behavior: 'smooth'
          });
        }
      });
    });
  }

  /**
   * Product Quantity Input Validation
   */
  function initQuantityValidation() {
    const quantityInputs = document.querySelectorAll('input[type="number"].qty');

    quantityInputs.forEach(function(input) {
      input.addEventListener('change', function() {
        const min = parseInt(this.getAttribute('min')) || 1;
        const max = parseInt(this.getAttribute('max')) || 999;
        let value = parseInt(this.value);

        if (isNaN(value) || value < min) {
          this.value = min;
        } else if (value > max) {
          this.value = max;
        }
      });
    });
  }

  /**
   * Lazy Load Images (simple implementation)
   */
  function initLazyLoad() {
    if ('IntersectionObserver' in window) {
      const imageObserver = new IntersectionObserver(function(entries, observer) {
        entries.forEach(function(entry) {
          if (entry.isIntersecting) {
            const img = entry.target;
            if (img.dataset.src) {
              img.src = img.dataset.src;
              img.removeAttribute('data-src');
              imageObserver.unobserve(img);
            }
          }
        });
      });

      const lazyImages = document.querySelectorAll('img[data-src]');
      lazyImages.forEach(function(img) {
        imageObserver.observe(img);
      });
    }
  }

  /**
   * Form Enhancements
   */
  function initFormEnhancements() {
    // Add focus class to form groups
    const formInputs = document.querySelectorAll('.form-input, .form-textarea, .form-select');

    formInputs.forEach(function(input) {
      input.addEventListener('focus', function() {
        this.parentElement.classList.add('focused');
      });

      input.addEventListener('blur', function() {
        this.parentElement.classList.remove('focused');
      });
    });

    // File input custom label
    const fileInputs = document.querySelectorAll('input[type="file"]');

    fileInputs.forEach(function(input) {
      input.addEventListener('change', function() {
        const fileName = this.files[0] ? this.files[0].name : 'No file chosen';
        const label = this.nextElementSibling;

        if (label && label.classList.contains('file-label')) {
          label.textContent = fileName;
        }
      });
    });
  }

  /**
   * Add to Cart Loading State
   */
  function initAddToCartLoading() {
    // Use jQuery for WooCommerce compatibility
    if (typeof jQuery !== 'undefined') {
      jQuery(document).ready(function($) {
        // Add loading state on click
        $(document).on('click', '.ajax_add_to_cart, .single_add_to_cart_button', function() {
          $(this).addClass('loading');
        });

        // Handle single product AJAX add to cart
        $(document).on('click', '.single_add_to_cart_button.ajax_add_to_cart', function(e) {
          e.preventDefault();

          var $button = $(this);
          var productId = $button.data('product_id');
          var quantity = $button.closest('form.cart').find('input.qty').val() || 1;

          if (!productId) {
            return true; // Let normal form submission happen
          }

          $button.removeClass('added').addClass('loading');

          // Trigger WooCommerce AJAX add to cart
          $.ajax({
            type: 'POST',
            url: wc_add_to_cart_params.wc_ajax_url.toString().replace('%%endpoint%%', 'add_to_cart'),
            data: {
              product_id: productId,
              quantity: quantity
            },
            success: function(response) {
              if (response.error && response.product_url) {
                window.location = response.product_url;
                return;
              }

              // Trigger WooCommerce event
              $(document.body).trigger('added_to_cart', [response.fragments, response.cart_hash, $button]);

              $button.removeClass('loading').addClass('added');
            },
            error: function() {
              $button.removeClass('loading');
            }
          });

          return false;
        });

        // Remove loading state and show success feedback
        $(document.body).on('added_to_cart', function(event, fragments, cart_hash, $button) {
          $('.ajax_add_to_cart, .single_add_to_cart_button').removeClass('loading');

          // Add success animation to product card
          if ($button) {
            var $productCard = $button.closest('.product-card');
            if ($productCard.length) {
              $productCard.addClass('added-to-cart');
              setTimeout(function() {
                $productCard.removeClass('added-to-cart');
              }, 2000);
            }
          }
        });
      });
    }
  }

  /**
   * Initialize All Functions
   */
  function init() {
    initMobileMenu();
    updateCartCount();
    initSmoothScroll();
    initQuantityValidation();
    initLazyLoad();
    initFormEnhancements();
    initAddToCartLoading();
  }

  // Run on DOM ready
  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', init);
  } else {
    init();
  }

})();
