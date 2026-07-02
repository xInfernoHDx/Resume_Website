<?php
/**
 * Jacob Dolph Resume — theme functions.
 */

/* -------------------------------------------------------------------------
 * Theme setup
 * ---------------------------------------------------------------------- */
function jdolph_resume_setup() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' ) );
}
add_action( 'after_setup_theme', 'jdolph_resume_setup' );

/* -------------------------------------------------------------------------
 * Assets
 * ---------------------------------------------------------------------- */
function jdolph_resume_enqueue_assets() {
    // Google Fonts — one combined request.
    wp_enqueue_style(
        'jdolph-fonts',
        'https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@500;600;700&family=Inter:wght@400;500;600&family=IBM+Plex+Mono:wght@400;500&display=swap',
        array(),
        null
    );

    // Theme styles — filemtime() for cache-busting (filesystem path for the
    // check, URI for the URL).
    $css_path = get_stylesheet_directory() . '/assets/css/custom.css';
    wp_enqueue_style(
        'jdolph-custom',
        get_stylesheet_directory_uri() . '/assets/css/custom.css',
        array( 'jdolph-fonts' ),
        file_exists( $css_path ) ? filemtime( $css_path ) : '1.0.0'
    );

    // Theme script — loaded in the footer.
    $js_path = get_stylesheet_directory() . '/assets/js/script.js';
    wp_enqueue_script(
        'jdolph-script',
        get_stylesheet_directory_uri() . '/assets/js/script.js',
        array(),
        file_exists( $js_path ) ? filemtime( $js_path ) : '1.0.0',
        true
    );
}
add_action( 'wp_enqueue_scripts', 'jdolph_resume_enqueue_assets' );

/* -------------------------------------------------------------------------
 * Document title
 * ---------------------------------------------------------------------- */
function jdolph_resume_document_title( $title ) {
    if ( is_front_page() ) {
        return 'Jacob Dolph — Endpoint Engineer | Windows Endpoint Management';
    }
    return $title;
}
add_filter( 'pre_get_document_title', 'jdolph_resume_document_title' );

/* -------------------------------------------------------------------------
 * Head output — favicon, SEO meta, Open Graph, JSON-LD Person schema.
 * Email and phone are deliberately excluded from all structured data.
 * ---------------------------------------------------------------------- */
function jdolph_resume_head_meta() {
    $favicon = get_stylesheet_directory_uri() . '/assets/images/favicon.svg';
    printf( '<link rel="icon" type="image/svg+xml" href="%s">' . "\n", esc_url( $favicon ) );

    if ( ! is_front_page() ) {
        return;
    }

    $description = 'Jacob Dolph — Endpoint Engineer in the Chicago suburbs specializing in Windows 10/11 endpoint management, Ivanti EPM/Neurons, Workspace ONE UEM, application packaging, imaging, and patching.';
    $og_image    = get_stylesheet_directory_uri() . '/assets/images/og-card.png';
    $home        = home_url( '/' );

    printf( '<meta name="description" content="%s">' . "\n", esc_attr( $description ) );

    // Open Graph / Twitter card.
    printf( '<meta property="og:type" content="profile">' . "\n" );
    printf( '<meta property="og:title" content="%s">' . "\n", esc_attr( 'Jacob Dolph — Endpoint Engineer' ) );
    printf( '<meta property="og:description" content="%s">' . "\n", esc_attr( $description ) );
    printf( '<meta property="og:url" content="%s">' . "\n", esc_url( $home ) );
    printf( '<meta property="og:image" content="%s">' . "\n", esc_url( $og_image ) );
    printf( '<meta name="twitter:card" content="summary_large_image">' . "\n" );

    // JSON-LD Person schema — no email, no telephone.
    $schema = array(
        '@context'   => 'https://schema.org',
        '@type'      => 'Person',
        'name'       => 'Jacob Dolph',
        'jobTitle'   => 'Endpoint Engineer',
        'url'        => $home,
        'sameAs'     => array( 'https://www.linkedin.com/in/jacob-dolph-373658171' ),
        'address'    => array(
            '@type'           => 'PostalAddress',
            'addressLocality' => 'Chicago Suburbs',
            'addressRegion'   => 'IL',
        ),
        'alumniOf'   => 'Southern Illinois University Carbondale',
        'knowsAbout' => array(
            'Windows 10/11 Endpoint Management',
            'Ivanti EPM',
            'Ivanti Neurons',
            'Workspace ONE UEM',
            'Application Packaging',
            'PowerShell',
            'PXE / WinPE Imaging',
            'Group Policy',
            'Active Directory',
            'Entra ID',
        ),
    );
    printf(
        '<script type="application/ld+json">%s</script>' . "\n",
        wp_json_encode( $schema, JSON_UNESCAPED_SLASHES )
    );
}
add_action( 'wp_head', 'jdolph_resume_head_meta', 5 );

/* -------------------------------------------------------------------------
 * Trim WP head cruft
 * ---------------------------------------------------------------------- */
remove_action( 'wp_head', 'wp_generator' );
remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
