<?php
/**
 * The template for displaying pages
 *
 * @package cocico-homestay-si-gn
 */

get_header();
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php while ( have_posts() ) : the_post(); ?>
        <header class="entry-header">
            <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
        </header>

        <div class="entry-content">
            <?php
            the_content();

            wp_link_pages( array(
                'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'cocico-homestay-si-gn' ),
                'after'  => '</div>',
            ) );
            ?>
        </div>

        <?php if ( get_edit_post_link() ) : ?>
            <footer class="entry-footer">
                <?php
                edit_post_link(
                    sprintf(
                        wp_kses(
                            __( 'Edit <span class="screen-reader-text">%s</span>', 'cocico-homestay-si-gn' ),
                            array( 'span' => array( 'class' => array() ) )
                        ),
                        wp_kses_post( get_the_title() )
                    ),
                    '<span class="edit-link">',
                    '</span>'
                );
                ?>
            </footer>
        <?php endif; ?>
    <?php endwhile; ?>
</article>

<?php
get_footer();
