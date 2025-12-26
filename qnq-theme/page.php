<?php
/**
 * Default Page Template
 *
 * @package QNQ
 * @since 1.0.0
 */

get_header();
?>

<div id="main-content">
    <div class="container-narrow">
        <?php
        while (have_posts()) :
            the_post();
            ?>

            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="page-header">
                    <h1 class="page-title"><?php the_title(); ?></h1>
                </header>

                <div class="page-content section">
                    <?php
                    the_content();

                    wp_link_pages(array(
                        'before' => '<div class="page-links">' . esc_html__('Pages:', 'qnq'),
                        'after' => '</div>',
                    ));
                    ?>
                </div>
            </article>

            <?php
        endwhile;
        ?>
    </div>
</div>

<?php
get_footer();
