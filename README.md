# jdolph-resume-theme

Custom WordPress theme for Jacob Dolph's resume website. The **repo root is the theme root** — Hostinger's Git deployment copies the repo root directly into the target directory.

## Deploy pipeline

1. Push to `main` → Hostinger auto-deploys to `public_html/wp-content/themes/jdolph-resume`.
2. **After every deploy, purge LiteSpeed Cache** (WP Admin top bar → LiteSpeed icon → Purge All). The Git deploy updates files on disk but never invalidates the rendered-HTML cache.

## Structure

| Path | Purpose |
|------|---------|
| `style.css` | Theme metadata header only |
| `functions.php` | Asset enqueues (filemtime cache-busting), SEO/OG/JSON-LD head output |
| `header.php` / `footer.php` | Document shell, sticky nav, footer bar |
| `front-page.php` | All resume sections (hero → contact) |
| `assets/css/custom.css` | Design tokens + all component styles |
| `assets/js/script.js` | Null-guarded: mobile nav, scroll reveal, email assembler, nav shadow |
| `assets/resume/Jacob-Dolph-Resume.pdf` | Downloadable resume |

## Content updates

Resume content lives in `front-page.php`. To refresh the downloadable PDF, export the source `.docx` (not committed) to `assets/resume/Jacob-Dolph-Resume.pdf` and push.

## Pre-push checklist

- No unguarded top-level `getElementById` in `script.js`
- No `opacity: 0` class without a guaranteed un-hide path
- Grep for encoding corruption signatures: `â€`, `Â`, `ï¿½`
