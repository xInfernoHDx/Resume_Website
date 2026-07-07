<?php
/**
 * Fallback template. Content pages are front-page.php (Dolph Systems
 * homepage) and page-resume.php (resume); any other request lands here.
 */

get_header();
?>

<main id="main" class="fallback-main">
    <div class="container">
        <h1>Dolph Systems</h1>
        <p>That page doesn&rsquo;t exist.</p>
        <p class="fallback-ctas">
            <a class="btn btn--primary" href="<?php echo esc_url( home_url( '/' ) ); ?>">Back home</a>
            <a class="btn btn--outline-dark" href="<?php echo esc_url( home_url( '/resume/' ) ); ?>">View Resume</a>
        </p>
    </div>
</main>

<?php
get_footer();
