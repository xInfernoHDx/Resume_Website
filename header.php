<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<a class="skip-link" href="#main">Skip to content</a>

<?php
// One nav definition rendered in both the desktop pill and the mobile
// drawer so the two lists can never drift apart.
if ( is_page( 'resume' ) ) {
    $jdolph_nav_links = array(
        array( 'label' => 'Home', 'href' => home_url( '/' ) ),
        array( 'label' => 'About', 'href' => '#about' ),
        array( 'label' => 'Skills', 'href' => '#skills' ),
        array( 'label' => 'Experience', 'href' => '#experience' ),
        array( 'label' => 'Projects', 'href' => '#projects' ),
        array( 'label' => 'Contact', 'href' => '#contact' ),
    );
} else {
    $jdolph_nav_links = array(
        array( 'label' => 'Capabilities', 'href' => '#capabilities' ),
        array( 'label' => 'Work', 'href' => '#work' ),
        array( 'label' => 'About', 'href' => '#about' ),
        array( 'label' => 'Contact', 'href' => '#contact' ),
        array( 'label' => 'Resume', 'href' => home_url( '/resume/' ) ),
    );
}
$jdolph_resume_pdf = get_stylesheet_directory_uri() . '/assets/resume/Jacob-Dolph-Resume.pdf';
?>

<header class="site-nav" id="siteNav">
    <div class="site-nav-inner">
        <a class="site-nav-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
            <span class="site-nav-brand-mark" aria-hidden="true">DS</span>
            <span class="site-nav-brand-name">Dolph Systems</span>
        </a>

        <nav class="site-nav-links" id="siteNavLinks" aria-label="Primary">
            <?php foreach ( $jdolph_nav_links as $jdolph_nav_link ) : ?>
                <a href="<?php echo esc_url( $jdolph_nav_link['href'] ); ?>"><?php echo esc_html( $jdolph_nav_link['label'] ); ?></a>
            <?php endforeach; ?>
            <a class="btn btn--outline btn--sm" href="<?php echo esc_url( $jdolph_resume_pdf ); ?>" download>Download Resume</a>
        </nav>

        <button class="site-nav-dock-toggle" id="navDockToggle" aria-expanded="false" aria-controls="siteNavLinks" aria-label="Open navigation">DS</button>

        <button class="site-nav-toggle" id="navToggle" aria-expanded="false" aria-controls="mobileNav" aria-label="Open menu">
            <span class="site-nav-toggle-bar" aria-hidden="true"></span>
            <span class="site-nav-toggle-bar" aria-hidden="true"></span>
            <span class="site-nav-toggle-bar" aria-hidden="true"></span>
        </button>
    </div>
</header>

<div class="mobile-overlay" id="mobileOverlay" hidden></div>
<nav class="mobile-nav" id="mobileNav" aria-label="Mobile" hidden>
    <button class="mobile-nav-close" id="mobileNavClose" aria-label="Close menu">&times;</button>
    <?php foreach ( $jdolph_nav_links as $jdolph_nav_link ) : ?>
        <a href="<?php echo esc_url( $jdolph_nav_link['href'] ); ?>"><?php echo esc_html( $jdolph_nav_link['label'] ); ?></a>
    <?php endforeach; ?>
    <a class="btn btn--outline" href="<?php echo esc_url( $jdolph_resume_pdf ); ?>" download>Download Resume</a>
</nav>
