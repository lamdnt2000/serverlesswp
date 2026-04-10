<?php
/**
 * The main template file
 *
 * @package cocico-homestay-si-gn
 */

get_header();
?>

<div class="content-area">
    <?php
    if ( have_posts() ) :
        while ( have_posts() ) :
            the_post();
            get_template_part( 'template-parts/content', get_post_type() );
        endwhile;

        the_posts_navigation();
    else :
        get_template_part( 'template-parts/content', 'none' );
    endif;
    ?>
</div>

<?php
get_sidebar();
get_footer();
