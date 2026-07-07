# Resume_Website

Custom WordPress theme for **dolphsystems.com**: an AI solutions homepage for Dolph Systems plus a standalone resume page for Jacob Dolph. The **repo root is the theme root** — Hostinger's Git deployment copies the repo root directly into the target directory.

## Deploy pipeline

1. Push to `main` → Hostinger auto-deploys to `public_html/wp-content/themes/jdolph-resume`.
2. **After every deploy, purge LiteSpeed Cache** (WP Admin top bar → LiteSpeed icon → Purge All). The Git deploy updates files on disk but never invalidates the rendered-HTML cache.

## One-time WP Admin setup (required for /resume/)

The resume page template only renders once a matching WP Page exists:

1. WP Admin → Pages → Add New. Title: **Resume**, slug: **resume**. Publish.
2. Settings → Permalinks must be **Post name** (`/resume/` breaks under Plain permalinks).
3. The template (`page-resume.php`) auto-selects by slug and renders fixed markup — **content typed into the Page editor is ignored**. If the slug ever changes, assign the "Resume" template manually on the Page.

## Structure

| Path | Purpose |
|------|---------|
| `style.css` | Theme metadata header only |
| `functions.php` | Asset enqueues (filemtime cache-busting), per-page SEO/OG/JSON-LD head output |
| `header.php` / `footer.php` | Document shell, sticky nav (per-page link sets), footer bar |
| `front-page.php` | Dolph Systems homepage (hero → capabilities → work → about → contact) |
| `page-resume.php` | Standalone resume page (all former homepage resume sections) |
| `index.php` | Fallback for any other URL |
| `assets/css/custom.css` | Design tokens + all component styles (homepage section appended at the end) |
| `assets/js/script.js` | Null-guarded: mobile nav, scroll reveal, email assembler, nav dock |
| `assets/resume/Jacob-Dolph-Resume.pdf` | Downloadable resume |

## Content updates

Resume content lives in `page-resume.php`; homepage content in `front-page.php`. To refresh the downloadable PDF, export the source `.docx` (not committed) to `assets/resume/Jacob-Dolph-Resume.pdf` and push.

## Pre-push checklist

- No unguarded top-level `getElementById` in `script.js`
- No `opacity: 0` class without a guaranteed un-hide path
- Grep for encoding corruption signatures: `â€`, `Â`, `ï¿½`
- No phone number anywhere (markup, meta, JSON-LD) — grep `tel:` and digit patterns
- Test **both** templates: `/` (homepage) and `/resume/` (resume page), desktop and mobile nav
