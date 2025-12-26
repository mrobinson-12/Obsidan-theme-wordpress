    <footer class="site-footer">
        <div class="container">
            <?php
            // QNQ Lab Teaser (conditional)
            $qnq_lab_enabled = function_exists('get_field') ? get_field('qnq_lab_enabled', 'option') : null;
            if ($qnq_lab_enabled) {
                get_template_part('template-parts/qnq-lab-teaser');
            }
            ?>

            <div class="footer-container">
                <?php if (has_nav_menu('footer-1') || has_nav_menu('footer-2')) : ?>
                    <div class="footer-section">
                        <h4>Quick Links</h4>
                        <?php
                        wp_nav_menu(array(
                            'theme_location' => 'footer-1',
                            'menu_class' => '',
                            'container' => false,
                            'fallback_cb' => false,
                        ));
                        ?>
                    </div>

                    <div class="footer-section">
                        <h4>Support</h4>
                        <?php
                        wp_nav_menu(array(
                            'theme_location' => 'footer-2',
                            'menu_class' => '',
                            'container' => false,
                            'fallback_cb' => false,
                        ));
                        ?>
                    </div>
                <?php endif; ?>

                <div class="footer-section">
                    <h4>Connect</h4>
                    <ul>
                        <?php
                        $qnq_lab_page = get_page_by_path('qnq-lab');
                        $qnq_lab_url = $qnq_lab_page ? get_permalink($qnq_lab_page) : home_url('/qnq-lab/');
                        ?>
                        <li><a href="<?php echo esc_url($qnq_lab_url); ?>">QNQ Lab</a></li>
                        <li><a href="mailto:hello@qnq3d.com">hello@qnq3d.com</a></li>
                        <?php
                        $instagram_url = function_exists('get_field') ? get_field('instagram_url', 'option') : null;
                        if ($instagram_url) :
                        ?>
                            <li><a href="<?php echo esc_url($instagram_url); ?>" target="_blank" rel="noopener noreferrer">Instagram</a></li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>

            <div class="footer-bottom">
                <div class="footer-tagline">
                    <?php
                    $footer_tagline = function_exists('get_field') ? get_field('footer_tagline', 'option') : null;
                    if ($footer_tagline) {
                        echo '<strong>' . esc_html($footer_tagline) . '</strong>';
                    } else {
                        echo '<strong>Made in QLD, AU</strong>';
                    }
                    ?>
                    <span class="separator"> | </span>
                    <span>&copy; <?php echo date('Y'); ?> QNQ 3D Printing</span>
                </div>

                <?php
                $instagram_url = function_exists('get_field') ? get_field('instagram_url', 'option') : null;
                if ($instagram_url) :
                ?>
                    <div class="footer-social">
                        <a href="<?php echo esc_url($instagram_url); ?>" target="_blank" rel="noopener noreferrer" aria-label="Instagram">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                                <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                                <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                            </svg>
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </footer>

</div><!-- #site-wrapper -->

<?php wp_footer(); ?>
</body>
</html>
