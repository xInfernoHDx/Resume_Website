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

<header class="site-nav" id="siteNav">
    <div class="site-nav-inner">
        <a class="site-nav-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
            <span class="site-nav-brand-mark" aria-hidden="true">JD</span>
            <span class="site-nav-brand-name">Jacob Dolph</span>
        </a>

        <nav class="site-nav-links" aria-label="Primary">
            <a href="#about">About</a>
            <a href="#skills">Skills</a>
            <a href="#experience">Experience</a>
            <a href="#projects">Projects</a>
            <a href="#contact">Contact</a>
            <a class="btn btn--outline btn--sm" href="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/resume/Jacob-Dolph-Resume.pdf' ); ?>" download>Resume</a>
        </nav>

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
    <a href="#about">About</a>
    <a href="#skills">Skills</a>
    <a href="#experience">Experience</a>
    <a href="#projects">Projects</a>
    <a href="#contact">Contact</a>
    <a class="btn btn--outline" href="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/resume/Jacob-Dolph-Resume.pdf' ); ?>" download>Download Resume</a>
</nav>
