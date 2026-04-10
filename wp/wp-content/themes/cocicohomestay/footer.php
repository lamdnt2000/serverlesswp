<?php
/**
 * The footer template - Dynamic with Customizer support
 *
 * @package cocico-homestay-si-gn
 */

$footer_layout       = get_theme_mod( 'cocico_homestay_si_gn_footer_layout', 'centered' );
$footer_menu_pos     = get_theme_mod( 'cocico_homestay_si_gn_footer_menu_position', 'above' );
$show_footer_widgets = get_theme_mod( 'cocico_homestay_si_gn_show_footer_widgets', true );
?>
    </main>

    <footer id="colophon" class="site-footer footer-layout-<?php echo esc_attr( $footer_layout ); ?> footer-menu-<?php echo esc_attr( $footer_menu_pos ); ?>">
        <?php if ( $show_footer_widgets && ( is_active_sidebar( 'footer-1' ) || is_active_sidebar( 'footer-2' ) || is_active_sidebar( 'footer-3' ) ) ) : ?>
        <div class="footer-widgets">
            <?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
                <div class="footer-widget-area">
                    <?php dynamic_sidebar( 'footer-1' ); ?>
                </div>
            <?php endif; ?>
            
            <?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
                <div class="footer-widget-area">
                    <?php dynamic_sidebar( 'footer-2' ); ?>
                </div>
            <?php endif; ?>
            
            <?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
                <div class="footer-widget-area">
                    <?php dynamic_sidebar( 'footer-3' ); ?>
                </div>
            <?php endif; ?>
        </div>
        <?php endif; ?>

        <div class="footer-inner">
            <?php if ( $footer_menu_pos !== 'hidden' && has_nav_menu( 'footer' ) ) : ?>
            <nav class="footer-navigation" aria-label="<?php esc_attr_e( 'Footer Menu', 'cocico-homestay-si-gn' ); ?>">
                <?php
                wp_nav_menu( array(
                    'theme_location' => 'footer',
                    'menu_id'        => 'footer-menu',
                    'depth'          => 1,
                    'fallback_cb'    => false,
                ) );
                ?>
            </nav>
            <?php endif; ?>

            <div class="site-info">
                <p><?php echo wp_kses_post( cocico_homestay_si_gn_get_footer_text() ); ?></p>
            </div>
        </div>
    </footer>
</div>

<?php wp_footer(); ?>
</body>
</html>
