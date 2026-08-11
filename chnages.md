# changes.md — SEO Fixes for piyushguptaportfolio.online

Audited the live site + the repo (`index.html`, `public/robots.txt`, `src/App.jsx`, `src/components/Header.jsx`). Current stack: **React + Vite, client-rendered SPA**, single route `/` with in-page anchor sections (`#about`, `#skills`, `#resume`, `#portfolio`, `#services`, `#certifications`, `#contact`), plus client-only `/admin` routes.

Here's what's actually missing, in priority order, with exact fixes.

---

## 0. One honest caveat first (read before doing the rest)

Your site is **client-side rendered** — the initial HTML Google/social crawlers see is just `<div id="root"></div>`, and all your actual content (About text, skills, project names) only appears after React runs. Googlebot *does* execute JS and will index it, but on a delay (can be days), and other crawlers (Bing, some social scrapers) may not execute JS at all.

This doesn't block any of the fixes below — they all work fine on a CSR site — but it's the ceiling on how well you'll ever rank until you add prerendering. Flagging it now so it's not a mystery later; not fixing it in this pass since it's a bigger architectural change (see §7).

---

## 1. Proper `<title>` / meta description (currently generic)

**Current** (`index.html`):
```html
<title>Piyush Gupta Portfolio</title>
<meta content="Full Stack Developer portfolio for Piyush Gupta." name="description">
```

**Replace with** (keyword-relevant, under Google's ~60 char title / ~155 char description limits):
```html
<title>Piyush Gupta | Full Stack Developer — React, Next.js, Laravel</title>
<meta name="description" content="Piyush Gupta is a Full Stack Developer building AI-powered web apps with React, Next.js, Laravel & Node.js. View projects, skills, and resume.">
<link rel="canonical" href="https://www.piyushguptaportfolio.online/">
```

The canonical tag matters even for a single page — it tells crawlers which exact URL (`www` vs non-`www`, trailing slash or not) is the "real" one, preventing duplicate-content confusion if both `piyushguptaportfolio.online` and `www.piyushguptaportfolio.online` resolve.

---

## 2. Open Graph + Twitter Card tags (currently zero)

These control how your link looks when shared on LinkedIn, WhatsApp, X/Twitter, Discord, etc. — since these crawlers don't run JS, static tags in `index.html` work perfectly for a CSR site.

Add inside `<head>`:
```html
<!-- Open Graph -->
<meta property="og:type" content="website">
<meta property="og:url" content="https://www.piyushguptaportfolio.online/">
<meta property="og:title" content="Piyush Gupta | Full Stack Developer">
<meta property="og:description" content="Full Stack Developer building AI-powered web apps with React, Next.js, Laravel & Node.js.">
<meta property="og:image" content="https://www.piyushguptaportfolio.online/assets/img/og-image.png">
<meta property="og:image:width" content="1200">
<meta property="og:image:height" content="630">

<!-- Twitter -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="Piyush Gupta | Full Stack Developer">
<meta name="twitter:description" content="Full Stack Developer building AI-powered web apps with React, Next.js, Laravel & Node.js.">
<meta name="twitter:image" content="https://www.piyushguptaportfolio.online/assets/img/og-image.png">
```

**Action needed from you:** you don't have an `og-image.png` yet. Create one — 1200×630px, your name + title + maybe your photo, saved to `public/assets/img/og-image.png`. This is the single highest-leverage missing asset for "showing up well" when people share your link.

---

## 3. `robots.txt` (exists, but incomplete)

**Current** (`public/robots.txt`):
```
User-agent: *
Disallow:
```

**Replace with:**
```
User-agent: *
Disallow: /admin
Disallow: /login
Allow: /

Sitemap: https://www.piyushguptaportfolio.online/sitemap.xml
```

Two fixes here: (1) it now points crawlers to your sitemap, (2) it keeps your `/admin` and `/login` routes out of search results — right now Google could technically index your login page, which you don't want.

---

## 4. `sitemap.xml` (missing entirely)

Since this is genuinely a single-page site, the sitemap only needs one URL — but having it still matters, because it's what you submit to Google Search Console to trigger indexing, and it carries `lastmod` so Google knows to recrawl after you update projects.

Create `public/sitemap.xml`:
```xml
<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
  <url>
    <loc>https://www.piyushguptaportfolio.online/</loc>
    <lastmod>2026-08-12</lastmod>
    <changefreq>monthly</changefreq>
    <priority>1.0</priority>
  </url>
</urlset>
```
Update `<lastmod>` whenever you meaningfully update the site content.

**Then:** submit both the sitemap and the homepage URL in **Google Search Console** (add the domain property, verify via DNS TXT record since you own the domain, submit `sitemap.xml`). This is the actual mechanism that gets you indexed — none of the file changes above do anything until Google knows to look.

---

## 5. Structured data (JSON-LD) — does the job breadcrumbs would, for a single page

True breadcrumb navigation (`Home > Projects > X`) doesn't apply to a one-page site with anchor sections — there's nothing hierarchical to show. What actually helps a personal portfolio show up well in search is **`Person` schema**, which can make Google show a knowledge-panel-style rich result (name, job title, links to your GitHub/LinkedIn) instead of a plain blue link.

Add before `</head>` in `index.html`:
```html
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Person",
  "name": "Piyush Gupta",
  "jobTitle": "Full Stack Developer",
  "url": "https://www.piyushguptaportfolio.online/",
  "sameAs": [
    "https://github.com/piyush-gupta2003",
    "https://linkedin.com/in/piyushgupta2003"
  ],
  "knowsAbout": ["React.js", "Next.js", "Laravel", "Node.js", "AI/ML", "TypeScript"]
}
</script>
```
Fix the `sameAs` URLs to your actual profile links before adding. Test it afterward with Google's [Rich Results Test](https://search.google.com/test/rich-results) against your live URL.

---

## 6. Mobile optimization — checklist (can't fully verify without running Lighthouse against the live site)

Viewport meta tag is already correctly set. Beyond that, run **Chrome DevTools → Lighthouse → Mobile** on the live URL and check for:

- [ ] Tap targets (nav links, buttons) at least 48×48px apart — check `Header.jsx` mobile menu specifically
- [ ] Images have explicit `width`/`height` (or `aspect-ratio` in CSS) to prevent layout shift (CLS) — check `Portfolio.jsx`, `About.jsx` image tags
- [ ] Images are lazy-loaded below the fold: `loading="lazy"` on `<img>` tags outside the hero
- [ ] No horizontal scroll at 375px width (iPhone SE width — the strictest common test size)
- [ ] Font sizes readable without zoom (16px minimum body text)
- [ ] `theme-color` meta tag for mobile browser chrome color, add to `<head>`:
  ```html
  <meta name="theme-color" content="#111113">
  ```

Run Lighthouse first, then come back and I'll help fix whatever specific issues it flags.

---

## 7. Bigger fix, do later, not now: prerendering

To actually close the CSR gap in §0, the standard fix without rewriting your React app is **`vite-plugin-prerender`** or migrating the build to prerender the `/` route at build time — this bakes real HTML (not just `<div id="root">`) into the deployed `dist/index.html`, so every crawler (not just JS-capable ones) sees your actual content immediately. Worth doing once the site's content is stable; not urgent for a portfolio at this stage.

---

## Summary — do these in order

1. Fix title/description/canonical in `index.html` (5 min)
2. Add OG + Twitter tags to `index.html`, create `og-image.png` (15 min — image is the only real work)
3. Fix `robots.txt` (2 min)
4. Add `sitemap.xml` (2 min)
5. Add Person JSON-LD schema, fix your real profile URLs in it (5 min)
6. Submit site + sitemap to Google Search Console (10 min, but this is what actually triggers indexing)
7. Run Lighthouse mobile audit, report back specific issues
8. (Later) prerendering, once content is stable