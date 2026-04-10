<?php
/**
 * The template for displaying single posts
 *
 * @package cocico-homestay-si-gn
 */

get_header();
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php while ( have_posts() ) : the_post(); ?>
        <header class="entry-header">
            <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
            <div class="entry-meta">
                <?php
                printf(
                    esc_html__( 'Posted on %s by %s', 'cocico-homestay-si-gn' ),
                    get_the_date(),
                    get_the_author()
                );
                ?>
            </div>
        </header>

        <?php if ( has_post_thumbnail() ) : ?>
            <div class="post-thumbnail">
                <?php the_post_thumbnail( 'large' ); ?>
            </div>
        <?php endif; ?>

        <div class="entry-content">
            <?php
            the_content();

            wp_link_pages( array(
                'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'cocico-homestay-si-gn' ),
                'after'  => '</div>',
            ) );
            ?>
        </div>

        <footer class="entry-footer">
            <?php
            $categories = get_the_category_list( ', ' );
            if ( $categories ) {
                printf( '<span class="cat-links">' . esc_html__( 'Posted in %s', 'cocico-homestay-si-gn' ) . '</span>', $categories );
            }

            $tags = get_the_tag_list( '', ', ' );
            if ( $tags ) {
                printf( '<span class="tags-links">' . esc_html__( 'Tagged %s', 'cocico-homestay-si-gn' ) . '</span>', $tags );
            }
            ?>
        </footer>

        <?php
        the_post_navigation( array(
            'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'cocico-homestay-si-gn' ) . '</span> <span class="nav-title">%title</span>',
            'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'cocico-homestay-si-gn' ) . '</span> <span class="nav-title">%title</span>',
        ) );

        if ( comments_open() || get_comments_number() ) :
            comments_template();
        endif;
        ?>
    <?php endwhile; ?>
</article>

<?php
get_sidebar();
get_footer();
