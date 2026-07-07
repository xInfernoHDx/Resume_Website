<?php
/**
 * Front page — Dolph Systems, AI solutions & engineering.
 * The full resume lives on the standalone Resume page (page-resume.php).
 */

$resume_pdf  = get_stylesheet_directory_uri() . '/assets/resume/Jacob-Dolph-Resume.pdf';
$resume_page = home_url( '/resume/' );
$linkedin    = 'https://www.linkedin.com/in/jacob-dolph-373658171';

get_header();
?>

<main id="main">

    <!-- ================= Hero ================= -->
    <section class="hero hero--home" id="top">
        <div class="hero-bg hero-bg--home" aria-hidden="true"></div>
        <div class="container hero-inner">
            <p class="eyebrow">Dolph Systems &middot; AI Solutions &amp; Engineering</p>
            <h1 class="hero-title hero-title--display">
                Enterprise engineering,<br>
                <span class="hero-title-accent">amplified by AI.</span>
            </h1>
            <p class="hero-sub hero-sub--home">
                Five-plus years of enterprise endpoint engineering, now paired with AI agents
                to build, launch, and troubleshoot production systems. This website is one of them.
            </p>
            <div class="hero-ctas">
                <a class="btn btn--primary" href="#work">See the work</a>
                <a class="btn btn--ghost" href="#contact">Get in touch</a>
            </div>
        </div>
    </section>

    <!-- ================= Proof strip ================= -->
    <section class="home-proof" aria-label="Highlights">
        <div class="container home-proof-inner">
            <p class="home-proof-item reveal">Two production websites launched</p>
            <p class="home-proof-item reveal">Workspace ONE UEM lab built end-to-end</p>
            <p class="home-proof-item reveal">AI-automated document pipeline</p>
        </div>
    </section>

    <!-- ================= Capabilities ================= -->
    <section class="section section--white" id="capabilities">
        <div class="container">
            <h2 class="section-title reveal">What I do</h2>
            <div class="capability-grid">

                <article class="capability-card reveal">
                    <h3 class="capability-card-title">AI-Directed Development</h3>
                    <p>Production websites built by directing Claude Code end-to-end: custom theme
                    development, Git push-to-deploy, DNS cutover, and cache troubleshooting on
                    managed hosting.</p>
                </article>

                <article class="capability-card reveal">
                    <h3 class="capability-card-title">AI-Assisted Operations</h3>
                    <p>Enterprise troubleshooting with AI in the loop: enrollment, profile, and
                    policy issues in a standalone Workspace ONE UEM lab, resolved end-to-end.</p>
                </article>

                <article class="capability-card reveal">
                    <h3 class="capability-card-title">Prompt-Driven Automation</h3>
                    <p>Repeatable pipelines from plain-language direction, like a document workflow
                    that regenerates a print-ready PDF from HTML with headless Edge.</p>
                </article>

                <article class="capability-card reveal">
                    <h3 class="capability-card-title">Enterprise Endpoint Foundation</h3>
                    <p>The domain expertise the AI work stands on: Windows 10/11 fleets, Ivanti
                    EPM/Neurons, Workspace ONE UEM, application packaging, imaging, and patching
                    at enterprise scale.</p>
                </article>

            </div>
        </div>
    </section>

    <!-- ================= Real work ================= -->
    <section class="section section--tint" id="work">
        <div class="container">
            <h2 class="section-title reveal">Real systems, shipped</h2>
            <div class="work-list">

                <article class="work-card reveal">
                    <div class="work-card-body">
                        <p class="work-card-meta">dolphsystems.com</p>
                        <h3 class="work-card-title">This website</h3>
                        <p>You&rsquo;re looking at it. A custom WordPress theme built by directing
                        Claude Code: Git-based deployment to managed hosting, DNS cutover,
                        LiteSpeed cache hardening, and this redesign.</p>
                        <ul class="project-tags" role="list">
                            <li>Claude Code</li><li>WordPress</li><li>Git</li><li>DNS</li>
                        </ul>
                    </div>
                </article>

                <article class="work-card reveal">
                    <div class="work-card-body">
                        <p class="work-card-meta">Production launch</p>
                        <h3 class="work-card-title">A second live website</h3>
                        <p>Another site taken from zero to production with the same AI-directed
                        workflow: theme build, managed-hosting deployment, and DNS cutover.</p>
                        <ul class="project-tags" role="list">
                            <li>Claude Code</li><li>Managed Hosting</li><li>DNS</li>
                        </ul>
                    </div>
                </article>

                <article class="work-card reveal">
                    <div class="work-card-body">
                        <p class="work-card-meta">Independent lab</p>
                        <h3 class="work-card-title">Workspace ONE UEM lab</h3>
                        <p>A standalone UEM instance for Windows 11 device management, stood up
                        independently. Enrollment, profile, and policy issues resolved end-to-end
                        with AI-assisted troubleshooting.</p>
                        <ul class="project-tags" role="list">
                            <li>Workspace ONE UEM</li><li>Windows 11</li>
                        </ul>
                    </div>
                </article>

            </div>
        </div>
    </section>

    <!-- ================= About ================= -->
    <section class="section section--white" id="about">
        <div class="container">
            <h2 class="section-title reveal">The person behind it</h2>
            <div class="about-grid">
                <p class="about-text reveal">
                    Dolph Systems is the independent practice of Jacob Dolph, an Endpoint Engineer
                    at Lawson Products in the Chicago suburbs. Five-plus years of enterprise IT,
                    from frontline support to endpoint engineering, taught him how production
                    systems actually fail and how to fix them. AI made the rest buildable:
                    websites, labs, and automation shipped solo by directing AI agents with the
                    same engineering discipline. Open to consulting engagements and full-time
                    opportunities alike.
                </p>
                <ul class="about-chips" role="list">
                    <li class="about-chip reveal">Endpoint Engineer, Lawson Products</li>
                    <li class="about-chip reveal">BS Information Systems &amp; Technology</li>
                    <li class="about-chip reveal">Chicago Suburbs, IL</li>
                </ul>
            </div>
        </div>
    </section>

    <!-- ================= Resume teaser ================= -->
    <section class="section section--tint section--compact">
        <div class="container">
            <div class="resume-teaser reveal">
                <div class="resume-teaser-copy">
                    <h2 class="resume-teaser-title">Want the full picture?</h2>
                    <p>The complete resume: experience, skills, tools, and education.</p>
                </div>
                <div class="resume-teaser-ctas">
                    <a class="btn btn--primary" href="<?php echo esc_url( $resume_page ); ?>">View Resume</a>
                    <a class="btn btn--ghost" href="<?php echo esc_url( $resume_pdf ); ?>" download>Download Resume</a>
                </div>
            </div>
        </div>
    </section>

    <!-- ================= Contact ================= -->
    <section class="contact" id="contact">
        <div class="container contact-inner">
            <h2 class="contact-title reveal">Let&rsquo;s build something.</h2>
            <p class="contact-sub reveal">
                A project, a problem, or a role. Reach out.
            </p>
            <div class="contact-ctas reveal">
                <a class="btn btn--primary" href="#" data-eu="jdolph2" data-ed="gmail.com">Email me</a>
                <a class="btn btn--ghost" href="<?php echo esc_url( $linkedin ); ?>" target="_blank" rel="noopener noreferrer">LinkedIn</a>
            </div>
            <noscript>
                <p class="contact-noscript">Email: jdolph2 [at] gmail [dot] com</p>
            </noscript>
        </div>
    </section>

</main>

<?php
get_footer();
