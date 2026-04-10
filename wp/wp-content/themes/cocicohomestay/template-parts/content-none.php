<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @package cocico-homestay-si-gn
 */
?>

<section class="no-results not-found">
    <header class="page-header">
        <h1 class="page-title"><?php esc_html_e( 'Nothing Found', 'cocico-homestay-si-gn' ); ?></h1>
    </header>

    <div class="page-content">
        <?php if ( is_search() ) : ?>
            <p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'cocico-homestay-si-gn' ); ?></p>
            <?php get_search_form(); ?>
        <?php else : ?>
            <p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for.', 'cocico-homestay-si-gn' ); ?></p>
        <?php endif; ?>
    </div>
</section>
