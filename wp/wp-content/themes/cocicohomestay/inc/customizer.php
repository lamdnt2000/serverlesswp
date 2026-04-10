<?php
/**
 * Cocico Homestay Sài Gòn Theme Customizer
 *
 * @package cocico-homestay-si-gn
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function cocico_homestay_si_gn_customize_register( $wp_customize ) {
    
    /* ========================================
     * PRESSMEGPT AI EDITOR SECTION (at top)
     * ======================================== */
    $wp_customize->add_section( 'cocico_homestay_si_gn_ai_editor', array(
        'title'       => __( '🎨 Edit Homepage with AI', 'cocico-homestay-si-gn' ),
        'description' => sprintf(
            '<div style="text-align: center; padding: 15px 0;">
                <p style="font-size: 14px; color: #666; margin-bottom: 15px;">Your homepage design is managed by PressMeGPT AI.</p>
                <a href="%s" target="_blank" class="button button-primary" style="display: inline-block; font-size: 14px; padding: 8px 20px;">Open AI Editor →</a>
                <p style="font-size: 12px; color: #999; margin-top: 12px;">Use natural language to change colors, fonts, images, text, and layout.</p>
            </div>',
            esc_url( PRESSMEGPT_EDIT_URL )
        ),
        'priority'    => 1,
    ) );
    
    // Dummy setting so section appears
    $wp_customize->add_setting( 'cocico_homestay_si_gn_ai_placeholder', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    
    $wp_customize->add_control( 'cocico_homestay_si_gn_ai_placeholder', array(
        'section' => 'cocico_homestay_si_gn_ai_editor',
        'type'    => 'hidden',
    ) );
    
    // Enable selective refresh for built-in settings
    $wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
    $wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
    $wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

    // Add selective refresh for site title and description
    if ( isset( $wp_customize->selective_refresh ) ) {
        $wp_customize->selective_refresh->add_partial( 'blogname', array(
            'selector'        => '.site-title a',
            'render_callback' => function() {
                bloginfo( 'name' );
            },
        ) );
        $wp_customize->selective_refresh->add_partial( 'blogdescription', array(
            'selector'        => '.site-description',
            'render_callback' => function() {
                bloginfo( 'description' );
            },
        ) );
    }

    /* ========================================
     * GLOBAL COLORS SECTION
     * ======================================== */
    $wp_customize->add_section( 'cocico_homestay_si_gn_global_colors', array(
        'title'       => __( 'Global Colors', 'cocico-homestay-si-gn' ),
        'description' => __( 'Set the global color scheme for your theme.', 'cocico-homestay-si-gn' ),
        'priority'    => 25,
    ) );

    // Primary Color
    $wp_customize->add_setting( 'cocico_homestay_si_gn_primary_color', array(
        'default'           => '#8B1A1A',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
    ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cocico_homestay_si_gn_primary_color', array(
        'label'   => __( 'Primary Color', 'cocico-homestay-si-gn' ),
        'description' => __( 'Main brand color for buttons and accents.', 'cocico-homestay-si-gn' ),
        'section' => 'cocico_homestay_si_gn_global_colors',
    ) ) );

    // Secondary Color
    $wp_customize->add_setting( 'cocico_homestay_si_gn_secondary_color', array(
        'default'           => '#7A6A4F',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
    ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cocico_homestay_si_gn_secondary_color', array(
        'label'   => __( 'Secondary Color', 'cocico-homestay-si-gn' ),
        'description' => __( 'Complementary color for highlights.', 'cocico-homestay-si-gn' ),
        'section' => 'cocico_homestay_si_gn_global_colors',
    ) ) );

    // Background Color
    $wp_customize->add_setting( 'cocico_homestay_si_gn_background_color', array(
        'default'           => '#F5F0E8',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
    ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cocico_homestay_si_gn_background_color', array(
        'label'   => __( 'Background Color', 'cocico-homestay-si-gn' ),
        'section' => 'cocico_homestay_si_gn_global_colors',
    ) ) );

    // Text Color
    $wp_customize->add_setting( 'cocico_homestay_si_gn_text_color', array(
        'default'           => '#7A6A4F',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
    ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cocico_homestay_si_gn_text_color', array(
        'label'   => __( 'Text Color', 'cocico-homestay-si-gn' ),
        'section' => 'cocico_homestay_si_gn_global_colors',
    ) ) );

    // Heading Color
    $wp_customize->add_setting( 'cocico_homestay_si_gn_heading_color', array(
        'default'           => '#8B1A1A',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
    ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cocico_homestay_si_gn_heading_color', array(
        'label'   => __( 'Heading Color', 'cocico-homestay-si-gn' ),
        'section' => 'cocico_homestay_si_gn_global_colors',
    ) ) );

    // Link Color
    $wp_customize->add_setting( 'cocico_homestay_si_gn_link_color', array(
        'default'           => '#8B1A1A',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
    ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cocico_homestay_si_gn_link_color', array(
        'label'   => __( 'Link Color', 'cocico-homestay-si-gn' ),
        'section' => 'cocico_homestay_si_gn_global_colors',
    ) ) );

    /* ========================================
     * HEADER OPTIONS SECTION
     * ======================================== */
    $wp_customize->add_section( 'cocico_homestay_si_gn_header_options', array(
        'title'       => __( 'Header Options', 'cocico-homestay-si-gn' ),
        'description' => __( 'Customize your header layout, logo size, and colors.', 'cocico-homestay-si-gn' ),
        'priority'    => 30,
    ) );

    // Header Layout
    $wp_customize->add_setting( 'cocico_homestay_si_gn_header_layout', array(
        'default'           => 'logo-left-menu-right',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage',
    ) );

    $wp_customize->add_control( 'cocico_homestay_si_gn_header_layout', array(
        'label'    => __( 'Header Layout', 'cocico-homestay-si-gn' ),
        'section'  => 'cocico_homestay_si_gn_header_options',
        'type'     => 'select',
        'choices'  => array(
            'logo-left-menu-right'    => __( 'Logo Left, Menu Right', 'cocico-homestay-si-gn' ),
            'logo-right-menu-left'    => __( 'Logo Right, Menu Left', 'cocico-homestay-si-gn' ),
            'logo-center-menu-below'  => __( 'Logo Center, Menu Below', 'cocico-homestay-si-gn' ),
            'logo-center-menu-split'  => __( 'Logo Center, Menu Split', 'cocico-homestay-si-gn' ),
        ),
    ) );

    // Logo Max Width
    $wp_customize->add_setting( 'cocico_homestay_si_gn_logo_max_width', array(
        'default'           => 200,
        'sanitize_callback' => 'absint',
        'transport'         => 'postMessage',
    ) );

    $wp_customize->add_control( 'cocico_homestay_si_gn_logo_max_width', array(
        'label'       => __( 'Logo Max Width (px)', 'cocico-homestay-si-gn' ),
        'section'     => 'cocico_homestay_si_gn_header_options',
        'type'        => 'range',
        'input_attrs' => array(
            'min'  => 50,
            'max'  => 500,
            'step' => 10,
        ),
    ) );

    // Logo Max Height
    $wp_customize->add_setting( 'cocico_homestay_si_gn_logo_max_height', array(
        'default'           => 80,
        'sanitize_callback' => 'absint',
        'transport'         => 'postMessage',
    ) );

    $wp_customize->add_control( 'cocico_homestay_si_gn_logo_max_height', array(
        'label'       => __( 'Logo Max Height (px)', 'cocico-homestay-si-gn' ),
        'section'     => 'cocico_homestay_si_gn_header_options',
        'type'        => 'range',
        'input_attrs' => array(
            'min'  => 30,
            'max'  => 200,
            'step' => 5,
        ),
    ) );

    // Header Background Color
    $wp_customize->add_setting( 'cocico_homestay_si_gn_header_bg_color', array(
        'default'           => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cocico_homestay_si_gn_header_bg_color', array(
        'label'    => __( 'Header Background Color', 'cocico-homestay-si-gn' ),
        'section'  => 'cocico_homestay_si_gn_header_options',
    ) ) );

    // Header Text Color
    $wp_customize->add_setting( 'cocico_homestay_si_gn_header_text_color', array(
        'default'           => '#333333',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cocico_homestay_si_gn_header_text_color', array(
        'label'    => __( 'Header Text/Link Color', 'cocico-homestay-si-gn' ),
        'section'  => 'cocico_homestay_si_gn_header_options',
    ) ) );

    // Header Padding
    $wp_customize->add_setting( 'cocico_homestay_si_gn_header_padding', array(
        'default'           => 20,
        'sanitize_callback' => 'absint',
        'transport'         => 'postMessage',
    ) );

    $wp_customize->add_control( 'cocico_homestay_si_gn_header_padding', array(
        'label'       => __( 'Header Padding (px)', 'cocico-homestay-si-gn' ),
        'section'     => 'cocico_homestay_si_gn_header_options',
        'type'        => 'range',
        'input_attrs' => array(
            'min'  => 0,
            'max'  => 60,
            'step' => 5,
        ),
    ) );

    // Show/Hide Site Title
    $wp_customize->add_setting( 'cocico_homestay_si_gn_show_site_title', array(
        'default'           => true,
        'sanitize_callback' => 'wp_validate_boolean',
        'transport'         => 'postMessage',
    ) );

    $wp_customize->add_control( 'cocico_homestay_si_gn_show_site_title', array(
        'label'   => __( 'Show Site Title (when no logo)', 'cocico-homestay-si-gn' ),
        'section' => 'cocico_homestay_si_gn_header_options',
        'type'    => 'checkbox',
    ) );

    // Show/Hide Site Description
    $wp_customize->add_setting( 'cocico_homestay_si_gn_show_site_description', array(
        'default'           => true,
        'sanitize_callback' => 'wp_validate_boolean',
        'transport'         => 'postMessage',
    ) );

    $wp_customize->add_control( 'cocico_homestay_si_gn_show_site_description', array(
        'label'   => __( 'Show Site Tagline', 'cocico-homestay-si-gn' ),
        'section' => 'cocico_homestay_si_gn_header_options',
        'type'    => 'checkbox',
    ) );

    /* ========================================
     * FOOTER OPTIONS SECTION
     * ======================================== */
    $wp_customize->add_section( 'cocico_homestay_si_gn_footer_options', array(
        'title'       => __( 'Footer Options', 'cocico-homestay-si-gn' ),
        'description' => __( 'Customize your footer layout, text, and colors.', 'cocico-homestay-si-gn' ),
        'priority'    => 35,
    ) );

    // Footer Layout
    $wp_customize->add_setting( 'cocico_homestay_si_gn_footer_layout', array(
        'default'           => 'centered',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage',
    ) );

    $wp_customize->add_control( 'cocico_homestay_si_gn_footer_layout', array(
        'label'   => __( 'Footer Layout', 'cocico-homestay-si-gn' ),
        'section' => 'cocico_homestay_si_gn_footer_options',
        'type'    => 'select',
        'choices' => array(
            'centered'     => __( 'Centered', 'cocico-homestay-si-gn' ),
            'left-aligned' => __( 'Left Aligned', 'cocico-homestay-si-gn' ),
            'split'        => __( 'Split (Copyright Left, Menu Right)', 'cocico-homestay-si-gn' ),
        ),
    ) );

    // Footer Menu Position
    $wp_customize->add_setting( 'cocico_homestay_si_gn_footer_menu_position', array(
        'default'           => 'above',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage',
    ) );

    $wp_customize->add_control( 'cocico_homestay_si_gn_footer_menu_position', array(
        'label'   => __( 'Footer Menu Position', 'cocico-homestay-si-gn' ),
        'section' => 'cocico_homestay_si_gn_footer_options',
        'type'    => 'select',
        'choices' => array(
            'above'  => __( 'Above Copyright Text', 'cocico-homestay-si-gn' ),
            'below'  => __( 'Below Copyright Text', 'cocico-homestay-si-gn' ),
            'hidden' => __( 'Hidden', 'cocico-homestay-si-gn' ),
        ),
    ) );

    // Footer Copyright Text
    $wp_customize->add_setting( 'cocico_homestay_si_gn_footer_text', array(
        'default'           => '',
        'sanitize_callback' => 'wp_kses_post',
        'transport'         => 'postMessage',
    ) );

    $wp_customize->add_control( 'cocico_homestay_si_gn_footer_text', array(
        'label'       => __( 'Footer Copyright Text', 'cocico-homestay-si-gn' ),
        'description' => __( 'Leave empty for default: © [year] [site name]. All rights reserved.', 'cocico-homestay-si-gn' ),
        'section'     => 'cocico_homestay_si_gn_footer_options',
        'type'        => 'textarea',
    ) );

    // Footer Background Color
    $wp_customize->add_setting( 'cocico_homestay_si_gn_footer_bg_color', array(
        'default'           => '#1a1a1a',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cocico_homestay_si_gn_footer_bg_color', array(
        'label'   => __( 'Footer Background Color', 'cocico-homestay-si-gn' ),
        'section' => 'cocico_homestay_si_gn_footer_options',
    ) ) );

    // Footer Text Color
    $wp_customize->add_setting( 'cocico_homestay_si_gn_footer_text_color', array(
        'default'           => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cocico_homestay_si_gn_footer_text_color', array(
        'label'   => __( 'Footer Text Color', 'cocico-homestay-si-gn' ),
        'section' => 'cocico_homestay_si_gn_footer_options',
    ) ) );

    // Footer Link Color
    $wp_customize->add_setting( 'cocico_homestay_si_gn_footer_link_color', array(
        'default'           => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cocico_homestay_si_gn_footer_link_color', array(
        'label'   => __( 'Footer Link Color', 'cocico-homestay-si-gn' ),
        'section' => 'cocico_homestay_si_gn_footer_options',
    ) ) );

    // Footer Padding
    $wp_customize->add_setting( 'cocico_homestay_si_gn_footer_padding', array(
        'default'           => 40,
        'sanitize_callback' => 'absint',
        'transport'         => 'postMessage',
    ) );

    $wp_customize->add_control( 'cocico_homestay_si_gn_footer_padding', array(
        'label'       => __( 'Footer Padding (px)', 'cocico-homestay-si-gn' ),
        'section'     => 'cocico_homestay_si_gn_footer_options',
        'type'        => 'range',
        'input_attrs' => array(
            'min'  => 10,
            'max'  => 100,
            'step' => 5,
        ),
    ) );

    // Show Footer Widgets
    $wp_customize->add_setting( 'cocico_homestay_si_gn_show_footer_widgets', array(
        'default'           => true,
        'sanitize_callback' => 'wp_validate_boolean',
        'transport'         => 'refresh',
    ) );

    $wp_customize->add_control( 'cocico_homestay_si_gn_show_footer_widgets', array(
        'label'   => __( 'Show Footer Widget Areas', 'cocico-homestay-si-gn' ),
        'section' => 'cocico_homestay_si_gn_footer_options',
        'type'    => 'checkbox',
    ) );
}
add_action( 'customize_register', 'cocico_homestay_si_gn_customize_register' );

/**
 * Output customizer CSS
 */
function cocico_homestay_si_gn_customizer_css() {
    $header_layout      = get_theme_mod( 'cocico_homestay_si_gn_header_layout', 'logo-left-menu-right' );
    $logo_max_width     = get_theme_mod( 'cocico_homestay_si_gn_logo_max_width', 200 );
    $logo_max_height    = get_theme_mod( 'cocico_homestay_si_gn_logo_max_height', 80 );
    $header_bg          = get_theme_mod( 'cocico_homestay_si_gn_header_bg_color', '#ffffff' );
    $header_text        = get_theme_mod( 'cocico_homestay_si_gn_header_text_color', '#333333' );
    $header_padding     = get_theme_mod( 'cocico_homestay_si_gn_header_padding', 20 );
    
    $footer_bg          = get_theme_mod( 'cocico_homestay_si_gn_footer_bg_color', '#1a1a1a' );
    $footer_text        = get_theme_mod( 'cocico_homestay_si_gn_footer_text_color', '#ffffff' );
    $footer_link        = get_theme_mod( 'cocico_homestay_si_gn_footer_link_color', '#ffffff' );
    $footer_padding     = get_theme_mod( 'cocico_homestay_si_gn_footer_padding', 40 );
    ?>
    <style type="text/css" id="cocico-homestay-si-gn-customizer-css">
        /* Header Customizer Styles */
        .site-header {
            background-color: <?php echo esc_attr( $header_bg ); ?>;
            color: <?php echo esc_attr( $header_text ); ?>;
            padding: <?php echo esc_attr( $header_padding ); ?>px 2rem;
        }
        
        .site-header a,
        .site-title a,
        .main-navigation a {
            color: <?php echo esc_attr( $header_text ); ?>;
        }
        
        .custom-logo {
            max-width: <?php echo esc_attr( $logo_max_width ); ?>px;
            max-height: <?php echo esc_attr( $logo_max_height ); ?>px;
            width: auto;
            height: auto;
        }
        
        /* Footer Customizer Styles */
        .site-footer {
            background-color: <?php echo esc_attr( $footer_bg ); ?>;
            color: <?php echo esc_attr( $footer_text ); ?>;
            padding: <?php echo esc_attr( $footer_padding ); ?>px 2rem;
        }
        
        .site-footer a,
        .footer-navigation a {
            color: <?php echo esc_attr( $footer_link ); ?>;
        }
    </style>
    <?php
}
add_action( 'wp_head', 'cocico_homestay_si_gn_customizer_css' );

/**
 * Get footer copyright text
 */
function cocico_homestay_si_gn_get_footer_text() {
    $custom_text = get_theme_mod( 'cocico_homestay_si_gn_footer_text', '' );
    
    $pressmegpt_credit = ' | Powered by <a href="https://pressmegpt.com" target="_blank" rel="noopener">PressMeGPT.com</a>';
    
    if ( ! empty( $custom_text ) ) {
        return $custom_text . $pressmegpt_credit;
    }
    
    return sprintf(
        '&copy; %s %s. %s',
        date( 'Y' ),
        get_bloginfo( 'name' ),
        __( 'All rights reserved.', 'cocico-homestay-si-gn' )
    ) . $pressmegpt_credit;
}
