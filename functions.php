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
 * Resume route — /resume/ is a code-registered rewrite, not a WP Page.
 * No admin setup or database row required.
 * ---------------------------------------------------------------------- */
function jdolph_resume_register_routes() {
    add_rewrite_rule( '^resume/?$', 'index.php?jdolph_view=resume', 'top' );
}
add_action( 'init', 'jdolph_resume_register_routes' );

function jdolph_resume_query_vars( $vars ) {
    $vars[] = 'jdolph_view';
    return $vars;
}
add_filter( 'query_vars', 'jdolph_resume_query_vars' );

// True on the /resume/ route (and on a real "resume" Page, if one ever exists).
function jdolph_is_resume_view() {
    return get_query_var( 'jdolph_view' ) === 'resume' || is_page( 'resume' );
}

function jdolph_resume_template_include( $template ) {
    if ( get_query_var( 'jdolph_view' ) === 'resume' ) {
        $custom = get_stylesheet_directory() . '/page-resume.php';
        if ( file_exists( $custom ) ) {
            status_header( 200 );
            return $custom;
        }
    }
    return $template;
}
add_filter( 'template_include', 'jdolph_resume_template_include' );

// Flush rewrite rules exactly once per route-version bump — never on every load.
function jdolph_resume_maybe_flush_rewrites() {
    $current = '2.0.1';
    if ( get_option( 'jdolph_route_version' ) !== $current ) {
        jdolph_resume_register_routes();
        flush_rewrite_rules( false );
        update_option( 'jdolph_route_version', $current );
    }
}
add_action( 'init', 'jdolph_resume_maybe_flush_rewrites', 20 );

/* -------------------------------------------------------------------------
 * Assets
 * ---------------------------------------------------------------------- */
function jdolph_resume_enqueue_assets() {
    // Google Fonts — one combined request.
    wp_enqueue_style(
        'jdolph-fonts',
        'https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@500;600;700&family=Geist:wght@400;500;600&family=IBM+Plex+Mono:wght@400;500&display=swap',
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
    // The /resume/ rewrite leaves the main query looking like the home
    // query, so is_front_page() is true there — check the route first.
    if ( jdolph_is_resume_view() ) {
        return 'Jacob Dolph - Endpoint Engineer Resume | Dolph Systems';
    }
    if ( is_front_page() ) {
        return 'Dolph Systems - AI Solutions & Engineering | Jacob Dolph';
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

    if ( ! is_front_page() && ! jdolph_is_resume_view() ) {
        return;
    }

    $og_image = get_stylesheet_directory_uri() . '/assets/images/og-card.png';
    $home     = home_url( '/' );

    // Shared Person schema — no email, no telephone.
    $person = array(
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
            'AI-Assisted Engineering (Claude Code)',
            'AI Agent Direction',
            'Prompt-Driven Automation',
        ),
    );

    // Route check first: is_front_page() is also true on the /resume/
    // rewrite (the main query resembles the home query there).
    if ( is_front_page() && ! jdolph_is_resume_view() ) {
        $description = 'Dolph Systems, the AI solutions practice of Jacob Dolph: AI-directed development, AI-assisted operations, and automation built on enterprise endpoint engineering experience.';

        printf( '<meta name="description" content="%s">' . "\n", esc_attr( $description ) );

        // Open Graph / Twitter card.
        printf( '<meta property="og:type" content="website">' . "\n" );
        printf( '<meta property="og:title" content="%s">' . "\n", esc_attr( 'Dolph Systems - AI Solutions & Engineering' ) );
        printf( '<meta property="og:description" content="%s">' . "\n", esc_attr( $description ) );
        printf( '<meta property="og:url" content="%s">' . "\n", esc_url( $home ) );
        printf( '<meta property="og:image" content="%s">' . "\n", esc_url( $og_image ) );
        printf( '<meta name="twitter:card" content="summary_large_image">' . "\n" );

        // JSON-LD: the practice plus the person behind it.
        $person['@id'] = $home . '#jacob-dolph';
        $schema        = array(
            '@context' => 'https://schema.org',
            '@graph'   => array(
                array(
                    '@type'       => 'ProfessionalService',
                    'name'        => 'Dolph Systems',
                    'url'         => $home,
                    'description' => $description,
                    'founder'     => array( '@id' => $home . '#jacob-dolph' ),
                    'areaServed'  => 'United States',
                ),
                $person,
            ),
        );
    } else {
        $description = 'Jacob Dolph, Endpoint Engineer in the Chicago suburbs specializing in Windows 10/11 endpoint management, Ivanti EPM/Neurons, Workspace ONE UEM, application packaging, imaging, and patching.';
        $page_url    = home_url( '/resume/' ); // The route is virtual — no permalink exists.

        printf( '<meta name="description" content="%s">' . "\n", esc_attr( $description ) );

        // Open Graph / Twitter card.
        printf( '<meta property="og:type" content="profile">' . "\n" );
        printf( '<meta property="og:title" content="%s">' . "\n", esc_attr( 'Jacob Dolph - Endpoint Engineer' ) );
        printf( '<meta property="og:description" content="%s">' . "\n", esc_attr( $description ) );
        printf( '<meta property="og:url" content="%s">' . "\n", esc_url( $page_url ) );
        printf( '<meta property="og:image" content="%s">' . "\n", esc_url( $og_image ) );
        printf( '<meta name="twitter:card" content="summary_large_image">' . "\n" );

        $schema = array_merge( array( '@context' => 'https://schema.org' ), $person );
    }

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
