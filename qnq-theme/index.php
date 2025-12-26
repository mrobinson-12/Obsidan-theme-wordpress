<?php
/**
 * Fallback template
 *
 * @package QNQ
 * @since 1.0.0
 */

get_header();
?>

<div id="main-content">
    <div class="container">
        <div class="page-content section">
            <?php
            if (have_posts()) :
                while (have_posts()) :
                    the_post();
                    ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <header class="entry-header mb-md">
                            <h1 class="entry-title"><?php the_title(); ?></h1>
                        </header>

                        <div class="entry-content">
                            <?php the_content(); ?>
                        </div>
                    </article>
                    <?php
                endwhile;
            else :
                ?>
                <p><?php esc_html_e('No content found.', 'qnq'); ?></p>
                <?php
            endif;
            ?>
        </div>
    </div>
</div>

<?php
get_footer();
