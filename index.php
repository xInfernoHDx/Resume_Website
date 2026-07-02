<?php
/**
 * Fallback template. The site is a single front page (front-page.php);
 * any other request lands here and gets redirected home.
 */

get_header();
?>

<main id="main" class="fallback-main">
    <div class="container">
        <h1>Jacob Dolph, Endpoint Engineer</h1>
        <p><a class="btn btn--primary" href="<?php echo esc_url( home_url( '/' ) ); ?>">Back to the resume</a></p>
    </div>
</main>

<?php
get_footer();
