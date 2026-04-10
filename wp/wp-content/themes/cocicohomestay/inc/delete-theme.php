<?php
/**
 * Delete Theme Helper
 *
 * Adds a "Delete This Theme" link in the WordPress admin bar so users can
 * safely remove this theme regardless of folder-name mismatches.
 *
 * @package cocico-homestay-si-gn
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Add "Delete Theme" link to the admin bar (only when a different theme is active)
 */
function cocico_homestay_si_gn_admin_bar_delete_link( $wp_admin_bar ) {
    // Only show to admins
    if ( ! current_user_can( 'delete_themes' ) ) {
        return;
    }

    // Only show when this theme is NOT the active theme (can't delete active theme)
    if ( get_stylesheet() === 'cocico-homestay-si-gn' ) {
        return;
    }

    $nonce = wp_create_nonce( 'pressmegpt_delete_theme_cocico-homestay-si-gn' );

    $wp_admin_bar->add_node( array(
        'id'     => 'pressmegpt-delete-theme',
        'title'  => '<span style="color:#dc3232;">🗑 Delete This Theme</span>',
        'href'   => admin_url( 'themes.php?action=delete&stylesheet=cocico-homestay-si-gn&_wpnonce=' . $nonce ),
        'meta'   => array(
            'title' => 'Delete the Cocico Homestay Sài Gòn theme',
        ),
    ) );
}
add_action( 'admin_bar_menu', 'cocico_homestay_si_gn_admin_bar_delete_link', 999 );

/**
 * Register a dedicated admin page for theme deletion
 * Appears under Appearance > Delete Cocico Homestay Sài Gòn
 */
function cocico_homestay_si_gn_register_delete_page() {
    add_theme_page(
        'Delete Cocico Homestay Sài Gòn',
        '🗑 Delete Theme',
        'delete_themes',
        'pressmegpt-delete-cocico-homestay-si-gn',
        'cocico_homestay_si_gn_render_delete_page'
    );
}
add_action( 'admin_menu', 'cocico_homestay_si_gn_register_delete_page' );

/**
 * Render the theme deletion page
 */
function cocico_homestay_si_gn_render_delete_page() {
    if ( ! current_user_can( 'delete_themes' ) ) {
        wp_die( esc_html__( 'You do not have permission to delete themes.', 'cocico-homestay-si-gn' ) );
    }

    // Handle confirmed deletion
    if ( isset( $_POST['confirm_delete'] ) && check_admin_referer( 'pressmegpt_delete_cocico-homestay-si-gn', '_pressmegpt_nonce' ) ) {
        // Switch to default theme first if needed
        if ( get_stylesheet() === 'cocico-homestay-si-gn' ) {
            switch_theme( WP_DEFAULT_THEME );
        }

        require_once ABSPATH . 'wp-admin/includes/theme.php';
        $result = delete_theme( 'cocico-homestay-si-gn' );

        if ( is_wp_error( $result ) ) {
            echo '<div class="notice notice-error"><p>' . esc_html( $result->get_error_message() ) . '</p></div>';
        } else {
            echo '<div class="notice notice-success"><p>Theme deleted successfully. <a href="' . esc_url( admin_url( 'themes.php' ) ) . '">Go to Themes</a></p></div>';
            return;
        }
    }

    $nonce = wp_create_nonce( 'pressmegpt_delete_cocico-homestay-si-gn' );
    ?>
    <div class="wrap" style="max-width: 600px;">
        <h1>🗑 Delete Cocico Homestay Sài Gòn</h1>
        <div style="background: #fff; border: 1px solid #ccd0d4; border-radius: 4px; padding: 30px; margin-top: 20px;">
            <p style="color: #dc3232; font-weight: 600;">Warning: This action cannot be undone.</p>
            <p>This will permanently delete the <strong>Cocico Homestay Sài Gòn</strong> theme and all its files from your server.</p>
            <?php if ( get_stylesheet() === 'cocico-homestay-si-gn' ) : ?>
                <p style="color: #dc3232;">⚠️ This theme is currently active. Deleting it will switch your site to the default WordPress theme first.</p>
            <?php endif; ?>
            <form method="post" onsubmit="return confirm('Are you sure you want to delete Cocico Homestay Sài Gòn? This cannot be undone.');">
                <?php wp_nonce_field( 'pressmegpt_delete_cocico-homestay-si-gn', '_pressmegpt_nonce' ); ?>
                <input type="hidden" name="confirm_delete" value="1">
                <button type="submit" class="button button-link-delete" style="height: 36px; padding: 0 16px; font-size: 14px;">
                    Delete Cocico Homestay Sài Gòn Permanently
                </button>
                &nbsp;
                <a href="<?php echo esc_url( admin_url( 'themes.php' ) ); ?>" class="button">Cancel</a>
            </form>
        </div>
    </div>
    <?php
}
