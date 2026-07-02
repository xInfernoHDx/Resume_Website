<?php
/**
 * Front page — all resume sections.
 */

$resume_pdf = get_stylesheet_directory_uri() . '/assets/resume/Jacob-Dolph-Resume.pdf';
$linkedin   = 'https://www.linkedin.com/in/jacob-dolph-373658171';

get_header();
?>

<main id="main">

    <!-- ================= Hero ================= -->
    <section class="hero" id="top">
        <div class="hero-bg" aria-hidden="true"></div>
        <div class="container hero-inner">
            <p class="eyebrow">Endpoint Engineer &middot; Infrastructure Operations</p>
            <h1 class="hero-title">Jacob Dolph</h1>
            <p class="hero-sub">
                I keep enterprise Windows fleets healthy &mdash; engineering endpoint management,
                application packaging, imaging, and patching across Windows 10/11 with
                Ivanti EPM/Neurons and Workspace ONE UEM, backed by Tier-3 troubleshooting depth.
            </p>
            <p class="hero-location">
                <svg viewBox="0 0 24 24" width="16" height="16" fill="currentColor" aria-hidden="true"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5A2.5 2.5 0 1 1 12 6a2.5 2.5 0 0 1 0 5.5z"/></svg>
                Chicago Suburbs, IL
            </p>
            <div class="hero-ctas">
                <a class="btn btn--primary" href="<?php echo esc_url( $resume_pdf ); ?>" download>Download Resume</a>
                <a class="btn btn--ghost" href="<?php echo esc_url( $linkedin ); ?>" target="_blank" rel="noopener noreferrer">LinkedIn</a>
                <a class="hero-contact-link" href="#contact">Get in touch <span aria-hidden="true">&rarr;</span></a>
            </div>
        </div>
    </section>

    <!-- ================= About ================= -->
    <section class="section section--white" id="about">
        <div class="container">
            <p class="eyebrow eyebrow--dark reveal">About</p>
            <h2 class="section-title reveal">Practical, operations-focused engineering</h2>
            <div class="about-grid">
                <p class="about-text reveal">
                    Endpoint Engineer with progressive IT experience across enterprise support, senior
                    technical escalation, and endpoint engineering. Strong background supporting
                    Windows 10/11 environments, endpoint lifecycle management, Ivanti EPM/Neurons,
                    Workspace ONE UEM, application packaging, imaging, patching, driver/BIOS updates,
                    and Tier-3 troubleshooting. Known for root-cause analysis, clear documentation,
                    vendor coordination, and translating repeat support issues into scalable endpoint
                    standards and deployment processes.
                </p>
                <ul class="about-chips" role="list">
                    <li class="about-chip reveal">Tier-3 Windows Support</li>
                    <li class="about-chip reveal">App Packaging &amp; Imaging</li>
                    <li class="about-chip reveal">Patch &amp; Endpoint Compliance</li>
                </ul>
            </div>
        </div>
    </section>

    <!-- ================= Skills ================= -->
    <section class="section section--tint" id="skills">
        <div class="container">
            <p class="eyebrow eyebrow--dark reveal">Core Technical Skills</p>
            <h2 class="section-title reveal">What I work with</h2>
            <div class="skills-grid">

                <article class="skill-card reveal">
                    <h3 class="skill-card-title">Endpoint Management</h3>
                    <ul role="list">
                        <li>Ivanti EPM &amp; Ivanti Neurons</li>
                        <li>Workspace ONE UEM / Omnissa</li>
                        <li>MobileIron</li>
                        <li>Android Enterprise</li>
                        <li>Samsung Knox OEMConfig</li>
                    </ul>
                </article>

                <article class="skill-card reveal">
                    <h3 class="skill-card-title">Windows Engineering</h3>
                    <ul role="list">
                        <li>Windows 10/11 &amp; feature upgrades</li>
                        <li>Group Policy &amp; registry</li>
                        <li>OMA-URI configuration</li>
                        <li>Windows Update remediation</li>
                        <li>Event Viewer / log analysis</li>
                    </ul>
                </article>

                <article class="skill-card reveal">
                    <h3 class="skill-card-title">Deployment &amp; Imaging</h3>
                    <ul role="list">
                        <li>PXE, WinPE, WIM imaging</li>
                        <li>Driver injection &amp; HII</li>
                        <li>Surface / Lenovo / Dell hardware</li>
                        <li>BIOS &amp; firmware deployment</li>
                    </ul>
                </article>

                <article class="skill-card reveal">
                    <h3 class="skill-card-title">Automation &amp; Packaging</h3>
                    <ul role="list">
                        <li>PowerShell &amp; silent installs</li>
                        <li>MSI / EXE / MSIX deployment</li>
                        <li>Detection logic &amp; winget</li>
                        <li>Office Deployment Tool</li>
                        <li>Dell Command Update CLI</li>
                    </ul>
                </article>

                <article class="skill-card reveal">
                    <h3 class="skill-card-title">Identity, Network &amp; Security</h3>
                    <ul role="list">
                        <li>Active Directory &amp; Entra ID / Azure AD</li>
                        <li>Okta SSO</li>
                        <li>Certificates</li>
                        <li>Cisco AnyConnect</li>
                        <li>GlobalProtect migration support</li>
                    </ul>
                </article>

            </div>
        </div>
    </section>

    <!-- ================= Experience ================= -->
    <section class="section section--white" id="experience">
        <div class="container">
            <p class="eyebrow eyebrow--dark reveal">Professional Experience</p>
            <h2 class="section-title reveal">Where I&rsquo;ve been</h2>

            <div class="timeline">

                <!-- Lawson Products — grouped promotion trajectory -->
                <div class="timeline-company reveal">
                    <div class="timeline-company-head">
                        <h3 class="timeline-company-name">Lawson Products</h3>
                        <p class="timeline-company-meta">Chicago / O&rsquo;Hare Area &middot; 2022 &ndash; Present</p>
                    </div>

                    <div class="timeline-role">
                        <span class="timeline-dot" aria-hidden="true"></span>
                        <div class="timeline-role-body">
                            <h4 class="timeline-role-title">Endpoint Engineer</h4>
                            <p class="timeline-role-dates">April 2025 &ndash; Present</p>
                            <ul role="list">
                                <li>Engineer and support enterprise endpoint solutions for Windows 11 devices, Android tablets, Surface, Lenovo, and Dell hardware across production support and deployment workflows.</li>
                                <li>Administer Ivanti EPM, Ivanti Neurons, Workspace ONE UEM / Omnissa, and legacy MobileIron for device configuration, app deployment, compliance, and troubleshooting.</li>
                                <li>Build, test, and troubleshoot MSI, EXE, MSIX, PowerShell, winget, Office Deployment Tool, and Dell Command Update deployments with platform-specific detection and compliance logic.</li>
                                <li>Support Windows 11 readiness and feature upgrade initiatives, including driver compatibility, BIOS/firmware updates, device policy validation, user impact analysis, and remediation planning.</li>
                                <li>Resolve complex endpoint issues involving Windows Update failures, application install errors, certificates, VPN connectivity, Okta SSO behavior, cellular/WWAN issues, and driver conflicts.</li>
                                <li>Create deployment notes, support scripts, technical documentation, and operational procedures for help desk, service delivery, and engineering teams.</li>
                            </ul>
                        </div>
                    </div>

                    <div class="timeline-role">
                        <span class="timeline-dot" aria-hidden="true"></span>
                        <div class="timeline-role-body">
                            <h4 class="timeline-role-title">Senior Technical Support</h4>
                            <p class="timeline-role-dates">April 2024 &ndash; April 2025</p>
                            <ul role="list">
                                <li>Served as an advanced escalation point for endpoint, application, device, and user-impacting incidents in a business-critical support environment.</li>
                                <li>Supported Windows desktop troubleshooting, device setup, hardware replacement, application repair, VPN troubleshooting, Microsoft 365/Exchange issues, Active Directory tasks, and device lifecycle workflows.</li>
                                <li>Partnered with engineering resources to diagnose recurring issues and transition repeat fixes into standardized scripts, documentation, policy changes, or deployment improvements.</li>
                            </ul>
                        </div>
                    </div>

                    <div class="timeline-role">
                        <span class="timeline-dot" aria-hidden="true"></span>
                        <div class="timeline-role-body">
                            <h4 class="timeline-role-title">Technical Support</h4>
                            <p class="timeline-role-dates">April 2022 &ndash; April 2024</p>
                            <ul role="list">
                                <li>Provided frontline and escalated IT support for enterprise users, endpoints, applications, account access, hardware, printers, mobile devices, and remote connectivity.</li>
                                <li>Built strong operational knowledge across service desk workflows, ticket documentation, incident prioritization, end-user communication, and cross-team escalation, leading to promotion into Senior Technical Support.</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Heniff Transportation -->
                <div class="timeline-company reveal">
                    <div class="timeline-company-head">
                        <h3 class="timeline-company-name">Heniff Transportation Systems, LLC</h3>
                        <p class="timeline-company-meta">2020 &ndash; 2022</p>
                    </div>

                    <div class="timeline-role">
                        <span class="timeline-dot" aria-hidden="true"></span>
                        <div class="timeline-role-body">
                            <h4 class="timeline-role-title">IT Support Specialist</h4>
                            <p class="timeline-role-dates">July 2020 &ndash; April 2022</p>
                            <ul role="list">
                                <li>Supported end-user technology needs in a full-time IT support role, troubleshooting hardware, software, account access, connectivity, and endpoint issues.</li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- ================= Projects ================= -->
    <section class="section section--tint" id="projects">
        <div class="container">
            <p class="eyebrow eyebrow--dark reveal">Selected Engineering Projects</p>
            <h2 class="section-title reveal">Technical highlights</h2>
            <div class="projects-grid">

                <article class="project-card reveal">
                    <h3 class="project-card-title">Windows 11 Endpoint Enablement</h3>
                    <p>Supported transition and management planning for Windows 11 sales laptops while maintaining Android tablet management in Workspace ONE UEM.</p>
                    <ul class="project-tags" role="list">
                        <li>Windows 11</li><li>Workspace ONE UEM</li><li>Android</li>
                    </ul>
                </article>

                <article class="project-card reveal">
                    <h3 class="project-card-title">Ivanti Application Deployment</h3>
                    <p>Packaged and troubleshot enterprise applications, shortcuts, drivers, and runtime dependencies through Ivanti Neurons/EPM, including download/cache failures and compliance states.</p>
                    <ul class="project-tags" role="list">
                        <li>Ivanti EPM</li><li>Ivanti Neurons</li><li>Packaging</li>
                    </ul>
                </article>

                <article class="project-card reveal">
                    <h3 class="project-card-title">Imaging &amp; Driver Support</h3>
                    <p>Supported PXE/WinPE imaging, Surface/Lenovo/Dell driver injection, storage/NIC driver troubleshooting, HII failure analysis, and boot media workflows.</p>
                    <ul class="project-tags" role="list">
                        <li>PXE / WinPE</li><li>Driver Injection</li><li>HII</li>
                    </ul>
                </article>

                <article class="project-card reveal">
                    <h3 class="project-card-title">Connectivity &amp; Identity Troubleshooting</h3>
                    <p>Investigated Okta SSO, embedded browser behavior, Cisco AnyConnect certificate/routing failures, GlobalProtect migration scenarios, and cellular-only authentication issues.</p>
                    <ul class="project-tags" role="list">
                        <li>Okta SSO</li><li>AnyConnect</li><li>GlobalProtect</li>
                    </ul>
                </article>

            </div>
        </div>
    </section>

    <!-- ================= Tools ================= -->
    <section class="section section--white" id="tools">
        <div class="container">
            <p class="eyebrow eyebrow--dark reveal">Tools &amp; Platforms</p>
            <h2 class="section-title reveal">Daily drivers</h2>
            <ul class="tool-cloud reveal" role="list">
                <?php
                $jdolph_tools = array(
                    'Ivanti EPM', 'Ivanti Neurons', 'Workspace ONE UEM / Omnissa', 'MobileIron',
                    'Microsoft 365 Admin', 'Exchange', 'Active Directory', 'Entra ID / Azure AD',
                    'Group Policy', 'PowerShell', 'Windows Event Viewer', 'DISM', 'WinPE', 'PXE',
                    'WIM', 'Dell Command Update', 'Lenovo / Surface driver packs',
                    'Samsung Knox Service Plugin', 'Okta', 'Cisco AnyConnect', 'GlobalProtect',
                );
                foreach ( $jdolph_tools as $jdolph_tool ) {
                    printf( '<li class="tool-chip">%s</li>', esc_html( $jdolph_tool ) );
                }
                ?>
            </ul>
        </div>
    </section>

    <!-- ================= Education ================= -->
    <section class="section section--tint section--compact" id="education">
        <div class="container">
            <p class="eyebrow eyebrow--dark reveal">Education</p>
            <div class="edu-card reveal">
                <svg class="edu-icon" viewBox="0 0 24 24" width="28" height="28" fill="currentColor" aria-hidden="true"><path d="M12 3L1 9l11 6 9-4.91V17h2V9L12 3zM5 13.18v4L12 21l7-3.82v-4L12 17l-7-3.82z"/></svg>
                <div>
                    <h3 class="edu-degree">Bachelor&rsquo;s Degree in Information Systems &amp; Technology</h3>
                    <p class="edu-meta">Specialization in Security &middot; Southern Illinois University Carbondale</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ================= Contact ================= -->
    <section class="contact" id="contact">
        <div class="container contact-inner">
            <p class="eyebrow reveal">Contact</p>
            <h2 class="contact-title reveal">Let&rsquo;s talk endpoints.</h2>
            <p class="contact-sub reveal">
                Open to conversations about endpoint engineering, UEM/MDM, and Windows infrastructure roles.
            </p>
            <div class="contact-ctas reveal">
                <a class="btn btn--primary" href="#" data-eu="jdolph2" data-ed="gmail.com">Email me</a>
                <a class="btn btn--ghost" href="<?php echo esc_url( $linkedin ); ?>" target="_blank" rel="noopener noreferrer">LinkedIn</a>
                <a class="btn btn--ghost" href="<?php echo esc_url( $resume_pdf ); ?>" download>Download Resume</a>
            </div>
            <noscript>
                <p class="contact-noscript">Email: jdolph2 [at] gmail [dot] com</p>
            </noscript>
        </div>
    </section>

</main>

<?php
get_footer();
