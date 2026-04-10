<?php
/**
 * Cocico Homestay Sài Gòn functions and definitions
 *
 * @package cocico-homestay-si-gn
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Theme setup
 */
function cocico_homestay_si_gn_setup() {
    // Add default posts and comments RSS feed links
    add_theme_support( 'automatic-feed-links' );

    // Let WordPress manage the document title
    add_theme_support( 'title-tag' );

    // Enable support for Post Thumbnails
    add_theme_support( 'post-thumbnails' );

    // Register navigation menus
    register_nav_menus( array(
        'primary' => esc_html__( 'Primary Menu (Header)', 'cocico-homestay-si-gn' ),
        'footer'  => esc_html__( 'Footer Menu', 'cocico-homestay-si-gn' ),
    ) );

    // Switch default core markup to output valid HTML5
    add_theme_support( 'html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ) );

    // Add support for Block Styles
    add_theme_support( 'wp-block-styles' );

    // Add support for full and wide align images
    add_theme_support( 'align-wide' );

    // Add support for editor styles
    add_theme_support( 'editor-styles' );
    add_editor_style( 'style.css' );

    // Add support for responsive embedded content
    add_theme_support( 'responsive-embeds' );

    // Add support for custom logo with enhanced options
    add_theme_support( 'custom-logo', array(
        'height'               => 150,
        'width'                => 400,
        'flex-height'          => true,
        'flex-width'           => true,
        'header-text'          => array( 'site-title', 'site-description' ),
        'unlink-homepage-logo' => false,
    ) );

    // Add support for custom background
    add_theme_support( 'custom-background', array(
        'default-color'          => 'ffffff',
        'default-image'          => '',
        'wp-head-callback'       => '_custom_background_cb',
        'admin-head-callback'    => '',
        'admin-preview-callback' => '',
    ) );

    // Add support for selective refresh for widgets
    add_theme_support( 'customize-selective-refresh-widgets' );

    // Add support for custom header
    add_theme_support( 'custom-header', array(
        'default-image'          => '',
        'width'                  => 1920,
        'height'                 => 200,
        'flex-height'            => true,
        'flex-width'             => true,
        'uploads'                => true,
        'random-default'         => false,
        'header-text'            => true,
        'default-text-color'     => '000000',
        'wp-head-callback'       => '',
        'admin-head-callback'    => '',
        'admin-preview-callback' => '',
    ) );
}
add_action( 'after_setup_theme', 'cocico_homestay_si_gn_setup' );

/**
 * Enqueue Google Fonts
 */
function cocico_homestay_si_gn_fonts() {
    $body_font = 'Inter';
    $heading_font = 'Cormorant Garamond';
    
    // Build Google Fonts URL with both fonts
    $fonts = array();
    if ( ! empty( $body_font ) ) {
        $fonts[] = str_replace( ' ', '+', $body_font ) . ':wght@400;500;600;700';
    }
    if ( ! empty( $heading_font ) && $heading_font !== $body_font ) {
        $fonts[] = str_replace( ' ', '+', $heading_font ) . ':wght@400;500;600;700';
    }
    
    if ( ! empty( $fonts ) ) {
        $fonts_url = 'https://fonts.googleapis.com/css2?family=' . implode( '&family=', $fonts ) . '&display=swap';
        wp_enqueue_style( 'cocico-homestay-si-gn-fonts', esc_url( $fonts_url ), array(), null );
    }
}
add_action( 'wp_enqueue_scripts', 'cocico_homestay_si_gn_fonts', 5 );

/**
 * Enqueue scripts and styles
 */
function cocico_homestay_si_gn_scripts() {
    wp_enqueue_style( 'cocico-homestay-si-gn-style', get_stylesheet_uri(), array( 'cocico-homestay-si-gn-fonts' ), '1.0.0' );
    
    // Navigation script
    wp_enqueue_script( 'cocico-homestay-si-gn-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '1.0.0', true );
    
    // Scroll-reveal animations
    wp_enqueue_script( 'cocico-homestay-si-gn-animations', get_template_directory_uri() . '/js/animations.js', array(), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'cocico_homestay_si_gn_scripts' );

/**
 * Enqueue customizer preview script
 */
function cocico_homestay_si_gn_customize_preview_js() {
    wp_enqueue_script( 'cocico-homestay-si-gn-customizer-preview', get_template_directory_uri() . '/js/customizer-preview.js', array( 'customize-preview' ), '1.0.0', true );
}
add_action( 'customize_preview_init', 'cocico_homestay_si_gn_customize_preview_js' );

/**
 * Register widget areas
 */
function cocico_homestay_si_gn_widgets_init() {
    register_sidebar( array(
        'name'          => esc_html__( 'Sidebar', 'cocico-homestay-si-gn' ),
        'id'            => 'sidebar-1',
        'description'   => esc_html__( 'Add widgets here for the sidebar.', 'cocico-homestay-si-gn' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Footer Widget Area 1', 'cocico-homestay-si-gn' ),
        'id'            => 'footer-1',
        'description'   => esc_html__( 'Add footer widgets here.', 'cocico-homestay-si-gn' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Footer Widget Area 2', 'cocico-homestay-si-gn' ),
        'id'            => 'footer-2',
        'description'   => esc_html__( 'Add footer widgets here.', 'cocico-homestay-si-gn' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Footer Widget Area 3', 'cocico-homestay-si-gn' ),
        'id'            => 'footer-3',
        'description'   => esc_html__( 'Add footer widgets here.', 'cocico-homestay-si-gn' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
}
add_action( 'widgets_init', 'cocico_homestay_si_gn_widgets_init' );

/**
 * Include Customizer settings
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Register block pattern category
 */
function cocico_homestay_si_gn_register_block_pattern_category() {
    register_block_pattern_category(
        'cocico-homestay-si-gn',
        array( 'label' => __( 'Cocico Homestay Sài Gòn', 'cocico-homestay-si-gn' ) )
    );
}
add_action( 'init', 'cocico_homestay_si_gn_register_block_pattern_category' );

/**
 * Register block patterns
 */
function cocico_homestay_si_gn_register_block_patterns() {
    // Homepage pattern with Gutenberg blocks (editable)
    if ( file_exists( get_template_directory() . '/patterns/homepage-blocks.php' ) ) {
        register_block_pattern(
            'cocico-homestay-si-gn/homepage',
            array(
                'title'       => __( 'Homepage Layout', 'cocico-homestay-si-gn' ),
                'description' => __( 'The complete homepage design with editable blocks.', 'cocico-homestay-si-gn' ),
                'categories'  => array( 'cocico-homestay-si-gn' ),
                'content'     => file_get_contents( get_template_directory() . '/patterns/homepage-blocks.php' ),
            )
        );
    }
    
    // Original HTML pattern (for reference/backup)
    if ( file_exists( get_template_directory() . '/patterns/homepage-raw.php' ) ) {
        register_block_pattern(
            'cocico-homestay-si-gn/homepage-raw',
            array(
                'title'       => __( 'Homepage Layout (Original HTML)', 'cocico-homestay-si-gn' ),
                'description' => __( 'Original Theme Designer HTML. Use for pixel-perfect display but limited editing.', 'cocico-homestay-si-gn' ),
                'categories'  => array( 'cocico-homestay-si-gn' ),
                'content'     => file_get_contents( get_template_directory() . '/patterns/homepage-raw.php' ),
            )
        );
    }
}
add_action( 'init', 'cocico_homestay_si_gn_register_block_patterns' );

/**
 * Theme activation: Create or update homepage and additional pages with designed content
 * Uses Gutenberg block patterns for native editing experience
 */
function cocico_homestay_si_gn_activation() {
    // Load the Gutenberg-compatible block pattern content
    $homepage_content = '';
    $pattern_file = get_template_directory() . '/patterns/homepage-blocks.php';
    
    if ( file_exists( $pattern_file ) ) {
        $homepage_content = file_get_contents( $pattern_file );
    }
    
    // Fallback: If no block pattern, use raw HTML wrapped minimally
    if ( empty( $homepage_content ) ) {
        $raw_content_file = get_template_directory() . '/inc/default-content.php';
        if ( file_exists( $raw_content_file ) ) {
            ob_start();
            include $raw_content_file;
            $raw_content = ob_get_clean();
            $homepage_content = '<!-- wp:group {"layout":{"type":"default"},"className":"theme-designer-content"} -->
<div class="wp-block-group theme-designer-content">' . $raw_content . '</div>
<!-- /wp:group -->';
        }
    }
    
    // Check for existing homepage by path
    $homepage = get_page_by_path( 'home' );
    $front_page_id = get_option( 'page_on_front' );
    
    if ( $homepage ) {
        wp_update_post( array(
            'ID'           => $homepage->ID,
            'post_content' => $homepage_content,
        ) );
        $homepage_id = $homepage->ID;
    } elseif ( $front_page_id && $front_page_id > 0 ) {
        wp_update_post( array(
            'ID'           => $front_page_id,
            'post_content' => $homepage_content,
        ) );
        $homepage_id = $front_page_id;
    } else {
        $homepage_id = wp_insert_post( array(
            'post_title'   => 'Home',
            'post_name'    => 'home',
            'post_content' => $homepage_content,
            'post_status'  => 'publish',
            'post_type'    => 'page',
        ) );
    }
    
    if ( $homepage_id && ! is_wp_error( $homepage_id ) ) {
        update_option( 'page_on_front', $homepage_id );
        update_option( 'show_on_front', 'page' );
    }
    
    // Create blog page if needed
    $blog_page = get_page_by_path( 'blog' );
    if ( ! $blog_page ) {
        $blog_id = wp_insert_post( array(
            'post_title'   => 'Blog',
            'post_name'    => 'blog',
            'post_content' => '',
            'post_status'  => 'publish',
            'post_type'    => 'page',
        ) );
        
        if ( $blog_id && ! is_wp_error( $blog_id ) ) {
            update_option( 'page_for_posts', $blog_id );
        }
    }
    
    // Create additional pages from PressMeGPT
    cocico_homestay_si_gn_create_designed_pages();
    
    // Create menus with all pages
    cocico_homestay_si_gn_create_default_menus();
}
add_action( 'after_switch_theme', 'cocico_homestay_si_gn_activation' );

/**
 * Create additional designed pages on theme activation
 */
function cocico_homestay_si_gn_create_designed_pages() {
    $pages_data = cocico_homestay_si_gn_get_pages_data();
    
    foreach ( $pages_data as $slug => $page_info ) {
        if ( empty( $slug ) || $slug === 'home' ) {
            continue;
        }
        
        // Skip template entries
        if ( ! empty( $page_info['is_template'] ) ) {
            continue;
        }
        
        $existing = get_page_by_path( $slug );
        $post_type = isset( $page_info['type'] ) && $page_info['type'] === 'post' ? 'post' : 'page';
        
        if ( $existing ) {
            wp_update_post( array(
                'ID'           => $existing->ID,
                'post_content' => $page_info['content'],
            ) );
        } else {
            wp_insert_post( array(
                'post_title'   => $page_info['title'],
                'post_name'    => $slug,
                'post_content' => $page_info['content'],
                'post_status'  => 'publish',
                'post_type'    => $post_type,
            ) );
        }
    }
}

/**
 * Get designed pages data (embedded at build time)
 */
function cocico_homestay_si_gn_get_pages_data() {
    return array(
        // No additional pages
    );
}

/**
 * Create default menus on theme activation
 */
function cocico_homestay_si_gn_create_default_menus() {
    // Create Primary Menu if it doesn't exist
    $primary_menu_name = 'Primary Menu';
    $primary_menu_exists = wp_get_nav_menu_object( $primary_menu_name );
    
    if ( ! $primary_menu_exists ) {
        $primary_menu_id = wp_create_nav_menu( $primary_menu_name );
        
        // Add Home link
        wp_update_nav_menu_item( $primary_menu_id, 0, array(
            'menu-item-title'   => 'Home',
            'menu-item-url'     => home_url( '/' ),
            'menu-item-status'  => 'publish',
        ) );
        
        // No additional pages for menu
        
        // Assign to primary location
        $locations = get_theme_mod( 'nav_menu_locations' );
        $locations['primary'] = $primary_menu_id;
        set_theme_mod( 'nav_menu_locations', $locations );
    }
    
    // Create Footer Menu if it doesn't exist
    $footer_menu_name = 'Footer Menu';
    $footer_menu_exists = wp_get_nav_menu_object( $footer_menu_name );
    
    if ( ! $footer_menu_exists ) {
        $footer_menu_id = wp_create_nav_menu( $footer_menu_name );
        
        // Add some default links
        wp_update_nav_menu_item( $footer_menu_id, 0, array(
            'menu-item-title'   => 'Privacy Policy',
            'menu-item-url'     => home_url( '/privacy-policy/' ),
            'menu-item-status'  => 'publish',
        ) );
        
        // Assign to footer location
        $locations = get_theme_mod( 'nav_menu_locations' );
        $locations['footer'] = $footer_menu_id;
        set_theme_mod( 'nav_menu_locations', $locations );
    }
}

/**
 * PressMeGPT Configuration
 */
define( 'PRESSMEGPT_PROJECT_ID', 'c3b5582e-9b55-4076-a683-cd26f6eef032' );
define( 'PRESSMEGPT_EDIT_URL', 'https://pressmegpt.com/project/c3b5582e-9b55-4076-a683-cd26f6eef032' );

/**
 * Add "Edit Homepage with AI" link to admin bar
 */
function cocico_homestay_si_gn_admin_bar_edit_link( $wp_admin_bar ) {
    if ( ! current_user_can( 'edit_theme_options' ) ) {
        return;
    }
    
    $wp_admin_bar->add_node( array(
        'id'    => 'pressmegpt-edit',
        'title' => '<span class="ab-icon dashicons dashicons-admin-customizer" style="font-family: dashicons; font-size: 20px; padding-top: 4px;"></span> Edit Homepage with AI',
        'href'  => PRESSMEGPT_EDIT_URL,
        'meta'  => array( 
            'target' => '_blank',
            'title'  => 'Open PressMeGPT to edit your homepage with AI',
        ),
    ) );
}
add_action( 'admin_bar_menu', 'cocico_homestay_si_gn_admin_bar_edit_link', 100 );

/**
 * Add dashboard widget for PressMeGPT
 */
function cocico_homestay_si_gn_dashboard_widget() {
    echo '<div style="text-align: center; padding: 20px 10px;">';
    echo '<div style="font-size: 48px; margin-bottom: 10px;">🎨</div>';
    echo '<h3 style="margin: 0 0 10px 0;">Your Homepage is AI-Powered</h3>';
    echo '<p style="color: #666; margin-bottom: 20px;">This homepage was created with PressMeGPT. Use AI to change colors, text, images, and layout.</p>';
    echo '<a href="' . esc_url( PRESSMEGPT_EDIT_URL ) . '" target="_blank" class="button button-primary button-hero" style="font-size: 16px;">Edit Homepage with AI</a>';
    echo '<p style="color: #999; font-size: 12px; margin-top: 15px;">Opens in a new tab</p>';
    echo '</div>';
}

function cocico_homestay_si_gn_add_dashboard_widget() {
    wp_add_dashboard_widget(
        'pressmegpt_edit_widget',
        'Cocico Homestay Sài Gòn - AI Theme Editor',
        'cocico_homestay_si_gn_dashboard_widget'
    );
    
    // Move widget to top
    global $wp_meta_boxes;
    $dashboard = $wp_meta_boxes['dashboard']['normal']['core'];
    $widget = array( 'pressmegpt_edit_widget' => $dashboard['pressmegpt_edit_widget'] );
    unset( $dashboard['pressmegpt_edit_widget'] );
    $wp_meta_boxes['dashboard']['normal']['core'] = array_merge( $widget, $dashboard );
}
add_action( 'wp_dashboard_setup', 'cocico_homestay_si_gn_add_dashboard_widget' );

/**
 * Add "Edit Homepage" menu item under Appearance
 */
function cocico_homestay_si_gn_add_appearance_menu() {
    add_theme_page(
        'Cocico Homestay Sài Gòn - Edit Homepage with AI',
        '🎨 Edit Homepage',
        'edit_theme_options',
        'pressmegpt-edit-homepage',
        'cocico_homestay_si_gn_render_edit_page'
    );
}
add_action( 'admin_menu', 'cocico_homestay_si_gn_add_appearance_menu' );

function cocico_homestay_si_gn_render_edit_page() {
    ?>
    <div class="wrap" style="max-width: 700px;">
        <h1 style="display: flex; align-items: center; gap: 10px;">
            <span style="font-size: 32px;">🎨</span> 
            Edit Your Homepage with AI
        </h1>
        
        <div style="background: #fff; border: 1px solid #ccd0d4; border-radius: 4px; padding: 30px; margin-top: 20px; text-align: center;">
            <p style="font-size: 16px; color: #666; margin-bottom: 25px;">
                Your homepage was created with PressMeGPT. Click below to make changes using natural language AI prompts.
            </p>
            
            <a href="<?php echo esc_url( PRESSMEGPT_EDIT_URL ); ?>" target="_blank" class="button button-primary button-hero" style="font-size: 18px; padding: 12px 30px;">
                Open AI Editor →
            </a>
        </div>
        
        <div style="background: #f8f9fa; border: 1px solid #e2e4e7; border-radius: 4px; padding: 25px; margin-top: 25px;">
            <h2 style="margin-top: 0; font-size: 18px;">What you can change:</h2>
            <ul style="list-style: none; padding: 0; margin: 0; display: grid; grid-template-columns: repeat(2, 1fr); gap: 12px;">
                <li style="display: flex; align-items: center; gap: 8px;"><span style="color: #0073aa;">🎨</span> Colors and color schemes</li>
                <li style="display: flex; align-items: center; gap: 8px;"><span style="color: #0073aa;">✏️</span> Fonts and typography</li>
                <li style="display: flex; align-items: center; gap: 8px;"><span style="color: #0073aa;">🖼️</span> Images and logos</li>
                <li style="display: flex; align-items: center; gap: 8px;"><span style="color: #0073aa;">📝</span> Text content and copy</li>
                <li style="display: flex; align-items: center; gap: 8px;"><span style="color: #0073aa;">📐</span> Section layouts</li>
                <li style="display: flex; align-items: center; gap: 8px;"><span style="color: #0073aa;">✨</span> Overall design style</li>
            </ul>
        </div>
        
        <p style="color: #666; font-size: 13px; margin-top: 20px;">
            <strong>Tip:</strong> After making changes in PressMeGPT, export and re-upload your theme to see updates.
        </p>
    </div>
    <?php
}

/**
 * Theme activation notice
 */
function cocico_homestay_si_gn_activation_notice() {
    $transient_name = 'cocico_homestay_si_gn_activation_notice';
    
    if ( ! get_transient( $transient_name ) ) {
        return;
    }
    
    delete_transient( $transient_name );
    ?>
    <div class="notice notice-success is-dismissible" style="padding: 15px;">
        <p style="font-size: 16px; margin: 0 0 10px 0;">
            <strong>🎉 Cocico Homestay Sài Gòn is now active!</strong>
        </p>
        <p style="margin: 0;">
            Your AI-generated homepage is ready. Need to make changes? 
            <a href="<?php echo esc_url( PRESSMEGPT_EDIT_URL ); ?>" target="_blank" style="font-weight: bold;">Edit Homepage with AI →</a>
        </p>
    </div>
    <?php
}
add_action( 'admin_notices', 'cocico_homestay_si_gn_activation_notice' );

// Set transient on theme activation
add_action( 'after_switch_theme', function() {
    set_transient( 'cocico_homestay_si_gn_activation_notice', true, 60 );
} );

/**
 * Classic Theme Page Editor Notice
 * Shows a prominent banner in the block editor explaining that homepage edits 
 * should be made in PressMeGPT or by downloading the Gutenberg version
 */
function cocico_homestay_si_gn_page_editor_notice() {
    $screen = get_current_screen();
    
    // Only show on post/page edit screens using the block editor
    if ( ! $screen || $screen->base !== 'post' || ! $screen->is_block_editor ) {
        return;
    }
    
    // Get the download URL for this theme (Gutenberg version)
    $gutenberg_download_url = 'https://pressmegpt.com/project/' . PRESSMEGPT_PROJECT_ID . '?export=gutenberg';
    
    ?>
    <div id="pressmegpt-classic-notice" style="
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: #fff;
        padding: 16px 20px;
        margin: 0 0 20px 0;
        border-radius: 8px;
        display: flex;
        align-items: center;
        gap: 16px;
        flex-wrap: wrap;
        box-shadow: 0 4px 12px rgba(102, 126, 234, 0.3);
    ">
        <div style="font-size: 28px;">🎨</div>
        <div style="flex: 1; min-width: 280px;">
            <strong style="font-size: 15px; display: block; margin-bottom: 4px;">
                This is a WordPress Classic Theme
            </strong>
            <span style="opacity: 0.95; font-size: 13px;">
                Homepage changes won't appear on the frontend. Edit your homepage design with AI on PressMeGPT, or download the Gutenberg version to edit directly in WordPress.
            </span>
        </div>
        <div style="display: flex; gap: 10px; flex-wrap: wrap;">
            <a href="<?php echo esc_url( PRESSMEGPT_EDIT_URL ); ?>" target="_blank" style="
                background: #fff;
                color: #667eea;
                padding: 10px 18px;
                border-radius: 6px;
                text-decoration: none;
                font-weight: 600;
                font-size: 14px;
                display: inline-flex;
                align-items: center;
                gap: 6px;
                transition: transform 0.2s, box-shadow 0.2s;
            " onmouseover="this.style.transform='translateY(-1px)';this.style.boxShadow='0 4px 12px rgba(0,0,0,0.15)';" onmouseout="this.style.transform='none';this.style.boxShadow='none';">
                ✨ Edit with AI
            </a>
            <a href="<?php echo esc_url( $gutenberg_download_url ); ?>" target="_blank" style="
                background: rgba(255,255,255,0.2);
                color: #fff;
                padding: 10px 18px;
                border-radius: 6px;
                text-decoration: none;
                font-weight: 500;
                font-size: 14px;
                display: inline-flex;
                align-items: center;
                gap: 6px;
                border: 1px solid rgba(255,255,255,0.3);
                transition: background 0.2s;
            " onmouseover="this.style.background='rgba(255,255,255,0.3)';" onmouseout="this.style.background='rgba(255,255,255,0.2)';">
                ⬇️ Get Gutenberg Version
            </a>
        </div>
    </div>
    <script>
    // Move notice to top of editor after it loads
    (function() {
        function moveNotice() {
            var notice = document.getElementById('pressmegpt-classic-notice');
            var editorWrapper = document.querySelector('.interface-interface-skeleton__content, .edit-post-layout__content, .editor-styles-wrapper');
            var headerBar = document.querySelector('.edit-post-header, .editor-header');
            
            if (notice && headerBar && headerBar.parentNode) {
                // Insert after the header bar
                headerBar.parentNode.insertBefore(notice, headerBar.nextSibling);
            } else if (notice) {
                // Fallback: keep it visible at the top of the notices area
                var wpBody = document.querySelector('.block-editor-writing-flow, #wpbody-content');
                if (wpBody && wpBody.firstChild) {
                    wpBody.insertBefore(notice, wpBody.firstChild);
                }
            }
        }
        
        // Try immediately and after short delay for block editor loading
        moveNotice();
        setTimeout(moveNotice, 500);
        setTimeout(moveNotice, 1500);
    })();
    </script>
    <?php
}
add_action( 'admin_notices', 'cocico_homestay_si_gn_page_editor_notice' );

/**
 * Add row action "Edit on PressMeGPT" to Pages list
 */
function cocico_homestay_si_gn_page_row_actions( $actions, $post ) {
    if ( $post->post_type === 'page' && current_user_can( 'edit_theme_options' ) ) {
        $actions['pressmegpt_edit'] = sprintf(
            '<a href="%s" target="_blank" style="color: #667eea; font-weight: 500;">%s</a>',
            esc_url( PRESSMEGPT_EDIT_URL ),
            __( '🎨 Edit on PressMeGPT', 'cocico-homestay-si-gn' )
        );
    }
    return $actions;
}
add_filter( 'page_row_actions', 'cocico_homestay_si_gn_page_row_actions', 10, 2 );

/**
 * Load theme deletion helper
 */
require_once get_template_directory() . '/inc/delete-theme.php';
