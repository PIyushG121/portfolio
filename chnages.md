# changes2.md — Deeper SEO, Performance & Trust Signals

Builds on `changes.md`. That doc covered the fundamentals (title/description, OG tags, robots.txt, sitemap, structured data). This one covers what actually determines *ranking* and *credibility* once the fundamentals are in place — performance, correctness, and off-page signals.

**Before anything else:** I can't verify from here whether `changes.md` actually shipped correctly (my fetch tool only sees extracted metadata, not raw HTML). Paste me `view-source:https://www.piyushguptaportfolio.online/` output, or run these two checks yourself right now and tell me what you get:
1. https://search.google.com/test/rich-results — paste your URL, confirms OG tags + JSON-LD are actually parsing
2. https://www.opengraph.xyz/ — paste your URL, shows exactly what a shared link preview will look like

---

## 1. www vs non-www — duplicate content risk (check this today)

Your `og:url` and canonical are set to `https://www.piyushguptaportfolio.online/`. Test **right now**: does `https://piyushguptaportfolio.online/` (no `www`) also load, or does it 301-redirect to the `www` version?

If both load as separate 200-status pages, Google sees two duplicate copies of your site and splits ranking signal between them. On Vercel: **Project → Settings → Domains** — set one as primary and confirm the other shows a redirect (Vercel usually does this automatically when you add both, but verify it isn't serving both as independent origins).

---

## 2. Fix redundant/bloated `<head>` (real performance cost)

From your `index.html`, you're loading:
- Google Fonts: `Roboto:wght@100;300;400;500;700;900` **and** `Poppins:wght@100;200;300;400;500;600;700;800;900` **and** `Raleway:wght@100;200;300;400;500;600;700;800;900` — that's 24 font weights across 3 families. You are not using all of these. Every unused weight is dead render-blocking weight on load.
- **Two icon libraries**: `bootstrap-icons` AND Font Awesome 4.5.0 from `maxcdn.bootstrapcdn.com` — Font Awesome 4.5.0 is a genuinely ancient version (2015-era). Pick one icon library, drop the other entirely.
- `ckeditor.js` (full CKEditor5 bundle, ~1MB+) loaded on **every page load**, including for anonymous visitors who will never see the admin panel. This should only load inside the admin bundle, not globally in `index.html`.

**Action:**
1. Open Chrome DevTools → Network tab on the live site, filter by font/JS, note actual transferred size before touching anything (baseline).
2. Check which font weights are actually used in `home-styles.css` (`font-weight:` values) — trim the Google Fonts URL to only those.
3. Pick bootstrap-icons OR Font Awesome, remove the other `<link>`/CDN script.
4. Move the CKEditor script import into the admin route's own code (dynamic `import()` inside `ProjectForm.jsx`, not a global `<script>` tag) — Vite will code-split it automatically so it only downloads when someone actually visits `/admin`.

This is the single biggest lever on your **Lighthouse Performance score**, which is itself a ranking factor (Core Web Vitals).

---

## 3. Core Web Vitals — concrete targets

Run https://pagespeed.web.dev/ against your live URL (mobile *and* desktop, they're scored separately). Target:

| Metric | Good | What affects it here |
|---|---|---|
| LCP (Largest Contentful Paint) | < 2.5s | Your hero image/text — is the hero background image optimized (WebP, correctly sized, not a huge PNG)? |
| CLS (Cumulative Layout Shift) | < 0.1 | Images without explicit width/height, web fonts swapping in and shifting layout |
| INP (Interaction to Next Paint) | < 200ms | JS bundle size — the CKEditor/duplicate-fonts issue in §2 directly hurts this |

Paste me the actual PageSpeed report numbers once you run it and I'll tell you exactly which fix in this doc addresses which metric.

---

## 4. Image optimization

- Convert hero/profile/project images to **WebP** (or AVIF if you want to go further) — 25-50% smaller than PNG/JPEG at equal visual quality.
- Add explicit `width` and `height` attributes (or CSS `aspect-ratio`) on every `<img>` — prevents CLS from images loading in and shifting text around.
- Add `loading="lazy"` to every image below the hero fold (About photo can stay eager since it's near the top; Portfolio project thumbnails should be lazy).
- Add real, descriptive `alt` text — not `alt="project"` but `alt="Walletry — AI finance dashboard showing expense analytics"`. This is both an accessibility requirement and a genuine image-search ranking signal.

---

## 5. Accessibility & semantic HTML (dual-purpose: a11y + SEO)

Search engines use HTML structure as a ranking signal, and screen readers use it for usability — same fixes serve both:

- **One `<h1>` per page** — should be your name/headline in Hero, not the site `<title>`. Check `Hero.jsx` uses an actual `<h1>`, not a styled `<div>` or `<span>`.
- Section headings should follow logical order: `h1` (hero) → `h2` per section (About, Skills, Resume, Portfolio, Services, Certifications, Contact) → `h3` for sub-items (individual project titles, individual skill names) — no skipping levels.
- Nav should be a real `<nav>` element with `aria-label="Main navigation"`, links should have visible focus states (test by tabbing through the site with keyboard only, no mouse).
- The mobile hamburger menu button needs `aria-expanded` and `aria-label="Toggle menu"` — check `Header.jsx`'s `mobileHeaderOpen` toggle button.
- Color contrast — run the site through https://webaim.org/resourceevaluate/ or Chrome DevTools' built-in contrast checker; text-on-background pairs need at least 4.5:1 ratio for body text.

---

## 6. The `/admin` and `/login` routes are client-side-only "protection" — real SEO/security concern

Looking at `App.jsx`: `/admin` is a React Router route, protected by a client-side `ProtectedRoute` check reading `AuthContext`. This means:
- The actual HTML/JS for the admin panel **still downloads to anyone who visits `/admin`**, auth or not — it's just hidden by a client-side redirect. This is a minor security concern (not SEO), but worth knowing: real protection needs to happen server-side (your backend API rejecting unauthenticated requests), not just client-side routing.
- For SEO specifically: `robots.txt` disallowing `/admin` and `/login` (from `changes.md`) stops *compliant* crawlers from indexing it, but doesn't stop it from being *fetched*. Add a `noindex` fallback too — since these are React Router client routes, the static `index.html` head can't conditionally change per-route without JS. A pragmatic fix: don't worry about this further for now, `robots.txt` + no external links pointing to `/admin` is sufficient for search visibility purposes; just don't treat `robots.txt` as an actual security boundary for the login page itself.

---

## 7. Off-page signals (nothing you fix in code — but matters as much as anything above)

Google's ranking of a personal portfolio for your name leans heavily on **entity consistency** across the web, not just on-page SEO:

- [ ] GitHub profile → bio/website field points to `piyushguptaportfolio.online`
- [ ] LinkedIn profile → "Featured" section or contact info links to the portfolio
- [ ] Resume PDF (the one you shared with me) → add the portfolio URL to the header, next to your email/phone
- [ ] Any dev-community profiles (LeetCode, Codeforces, Dev.to, etc. if you have them) → link back to the portfolio
- [ ] Once live and stable, submit to a couple of portfolio directories/showcases (e.g. relevant "developer portfolio" listing sites) — real backlinks, even a few, meaningfully help a brand-new domain

This is genuinely how "showing up" for your name starts happening — Search Console indexing gets you *found*, but consistent cross-linking is what tells Google this is a real, established identity worth ranking.

---

## 8. Search Console — go beyond just submitting the sitemap

Once verified in Google Search Console:
- Use **URL Inspection** on your homepage, click "Request Indexing" manually — don't just wait for the crawl.
- Check the **Core Web Vitals report** and **Mobile Usability report** weekly for the first month — these surface real issues Google sees that PageSpeed Insights alone might not catch across page loads.
- Set up **Bing Webmaster Tools** too (https://www.bing.com/webmasters) — it's a 5-minute add, and Bing/Copilot search increasingly matters, not just Google.

---

## Priority order for this pass

1. **§1 www/non-www redirect check** — 5 min, fixes a real duplicate-content risk
2. **§2 head bloat cleanup** (fonts, duplicate icon libs, CKEditor) — highest performance impact, moderate effort
3. **§4 image optimization** (WebP, dimensions, lazy load, real alt text) — direct Core Web Vitals + accessibility win
4. **§5 semantic HTML/heading hierarchy** — cheap, do while you're already touching components
5. **§3 run PageSpeed Insights, report back numbers** — tells us if 2-4 actually worked
6. **§7 off-page linking** — 20 min of profile edits, ongoing value
7. **§8 Search Console deeper usage** — ongoing habit, not a one-time task

Send me the PageSpeed numbers and the `view-source` output once you've done a pass, and I'll tell you exactly what's left.