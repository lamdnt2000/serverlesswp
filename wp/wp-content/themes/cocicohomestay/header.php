<?php
/**
 * The header template - Dynamic with Customizer support
 *
 * @package cocico-homestay-si-gn
 */

$header_layout     = get_theme_mod( 'cocico_homestay_si_gn_header_layout', 'logo-left-menu-right' );
$show_title        = get_theme_mod( 'cocico_homestay_si_gn_show_site_title', true );
$show_description  = get_theme_mod( 'cocico_homestay_si_gn_show_site_description', true );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'cocico-homestay-si-gn' ); ?></a>

    <header id="masthead" class="site-header header-layout-<?php echo esc_attr( $header_layout ); ?>">
        <div class="header-inner">
            <?php if ( $header_layout === 'logo-center-menu-split' ) : ?>
                <!-- Split menu layout -->
                <nav class="main-navigation menu-left" aria-label="<?php esc_attr_e( 'Primary Menu Left', 'cocico-homestay-si-gn' ); ?>">
                    <?php
                    wp_nav_menu( array(
                        'theme_location' => 'primary',
                        'menu_id'        => 'primary-menu-left',
                        'depth'          => 2,
                        'fallback_cb'    => false,
                        'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                    ) );
                    ?>
                </nav>
                
                <div class="site-branding">
                    <?php cocico_homestay_si_gn_render_site_branding( $show_title, $show_description ); ?>
                </div>
                
                <nav class="main-navigation menu-right" aria-label="<?php esc_attr_e( 'Primary Menu Right', 'cocico-homestay-si-gn' ); ?>">
                    <?php
                    wp_nav_menu( array(
                        'theme_location' => 'primary',
                        'menu_id'        => 'primary-menu-right',
                        'depth'          => 2,
                        'fallback_cb'    => false,
                        'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                    ) );
                    ?>
                </nav>
            <?php else : ?>
                <!-- Standard layouts -->
                <div class="site-branding">
                    <?php cocico_homestay_si_gn_render_site_branding( $show_title, $show_description ); ?>
                </div>

                <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
                    <span class="screen-reader-text"><?php esc_html_e( 'Menu', 'cocico-homestay-si-gn' ); ?></span>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="3" y1="12" x2="21" y2="12"></line>
                        <line x1="3" y1="6" x2="21" y2="6"></line>
                        <line x1="3" y1="18" x2="21" y2="18"></line>
                    </svg>
                </button>

                <nav id="site-navigation" class="main-navigation" aria-label="<?php esc_attr_e( 'Primary Menu', 'cocico-homestay-si-gn' ); ?>">
                    <?php
                    wp_nav_menu( array(
                        'theme_location' => 'primary',
                        'menu_id'        => 'primary-menu',
                        'depth'          => 2,
                        'fallback_cb'    => 'cocico_homestay_si_gn_primary_menu_fallback',
                    ) );
                    ?>
                </nav>
            <?php endif; ?>
        </div>
    </header>

    <main id="primary" class="site-main">

<?php
/**
 * Render site branding (logo or title)
 */
function cocico_homestay_si_gn_render_site_branding( $show_title, $show_description ) {
    if ( has_custom_logo() ) :
        the_custom_logo();
    elseif ( $show_title ) :
        ?>
        <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
        <?php
        if ( $show_description ) :
            $description = get_bloginfo( 'description', 'display' );
            if ( $description || is_customize_preview() ) :
                ?>
                <p class="site-description"><?php echo $description; ?></p>
                <?php
            endif;
        endif;
    endif;
}

/**
 * Fallback for primary menu
 */
function cocico_homestay_si_gn_primary_menu_fallback() {
    ?>
    <ul id="primary-menu" class="menu">
        <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'cocico-homestay-si-gn' ); ?></a></li>
        <?php wp_list_pages( array( 'title_li' => '' ) ); ?>
    </ul>
    <?php
}
?>
