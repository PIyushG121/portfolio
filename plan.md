# Laravel Portfolio + Admin Panel — Build Plan

Base design reference: iPortfolio template (https://themewagon.github.io/iPortfolio/)
Goal: same section structure & style, but data-driven from a database, editable through a simple admin panel, deployed for free.

---

## 1. Tech Stack

| Layer | Choice | Why |
|---|---|---|
| Framework | Laravel 11 | You already know it |
| Frontend | Blade + Vite + Bootstrap 5 (reuse iPortfolio's CSS/JS/AOS/Bootstrap-icons as-is) | Fastest path to matching the look exactly, no rebuild needed |
| DB (local) | SQLite | Zero setup, file-based |
| DB (prod) | MySQL or Postgres (whatever your host gives free) | Render/Railway give one free |
| Auth (admin only) | Laravel Breeze (Blade stack) | Gives you login/logout scaffolding in minutes, strip out the "register" route so only you can log in |
| Image uploads | Laravel's built-in `Storage` facade, `public` disk + `php artisan storage:link` | No extra package needed |
| Hosting | Render.com free tier (or Fly.io) | See §7 |

---

## 2. Section-by-Section Map (from the reference site → DB-driven)

The reference site has these sections, in this order. Each becomes either a **static Blade section fed by one `SiteSetting` record**, or a **dynamic section fed by a table**:

| Section | Static or Dynamic | Model needed |
|---|---|---|
| Header (name, tagline, social icon links) | Static | `SiteSetting` (key-value or single-row table) |
| Hero (name, subtitle "I'm ___", bg image) | Static | `SiteSetting` |
| About (bio text, profile photo, personal info list: birthday/website/phone/city/age/degree/email/freelance, stats: happy clients/projects/hours/hard workers) | Static, but stats could be dynamic | `SiteSetting` |
| Skills (skill name + percentage bar) | Dynamic | `Skill` (name, percent, order) |
| Resume → Summary | Static | `SiteSetting` |
| Resume → Education | Dynamic | `Education` (degree, institution, years, description, order) |
| Resume → Professional Experience | Dynamic | `Experience` (title, company, years, bullet points, order) |
| Portfolio (filterable grid: All/App/Product/Branding/Books, each item → image, title, short desc, detail page) | Dynamic — **this is your main admin feature** | `Project` (title, category, short_desc, long_desc, image, external_link, order, featured) |
| Services | Dynamic (optional, or static if you only offer a few fixed services) | `Service` (title, description, icon) |
| Testimonials (carousel: photo, name, role, quote) | Dynamic | `Testimonial` (name, role, photo, quote) |
| Contact (address, phone, email, map embed, contact form) | Static + form submission | `SiteSetting` + `ContactMessage` (stores submitted messages, viewable in admin — no need for email setup at first) |

This gives you exactly one admin feature that matters most: **Projects CRUD** — everything else (skills, education, experience, testimonials, services, site settings) is a smaller, simpler version of the same CRUD pattern.

---

## 3. Database Schema (migrations to create)

```
site_settings
  - id
  - key (string, unique)      e.g. "name", "tagline", "bio", "profile_photo", "hero_bg"
  - value (text, nullable)

skills
  - id, name, percent (int), sort_order

educations
  - id, degree, institution, years, description, sort_order

experiences
  - id, title, company, years, description (text — store bullet points as newline-separated or JSON), sort_order

projects
  - id, title, category (string: app/product/branding/books/…), short_desc, long_desc (text),
    image (string path), external_link (nullable), featured (bool), sort_order

services
  - id, title, description, icon (bootstrap-icon class name)

testimonials
  - id, name, role, photo, quote

contact_messages
  - id, name, email, subject, message, read (bool), created_at

users   (Breeze default — this is just YOU, the admin. Do not build a public register page.)
```

Keep `site_settings` as a flexible key-value table rather than one giant `settings` row — makes it trivial to add new fields later without a migration each time.

---

## 4. Laravel App Structure

```
app/
  Http/
    Controllers/
      Admin/
        DashboardController.php
        ProjectController.php      (resource controller: index/create/store/edit/update/destroy)
        SkillController.php
        EducationController.php
        ExperienceController.php
        ServiceController.php
        TestimonialController.php
        SettingController.php      (edit/update only — single form for all site_settings)
        MessageController.php      (index/show/destroy — read contact form submissions)
      PortfolioController.php      (public site: index, show for portfolio-details)
      ContactController.php        (public: store — handles the contact form POST)
  Models/
    Project.php, Skill.php, Education.php, Experience.php, Service.php,
    Testimonial.php, SiteSetting.php, ContactMessage.php

resources/
  views/
    layouts/app.blade.php          (public site layout — port header/footer from iPortfolio index.html)
    layouts/admin.blade.php        (simple admin shell — sidebar + content)
    partials/                      (one blade partial per section: hero, about, skills, resume, portfolio, services, testimonials, contact)
    home.blade.php                 (assembles all partials — this replaces index.html)
    portfolio-details.blade.php
    admin/
      dashboard.blade.php
      projects/index.blade.php, create.blade.php, edit.blade.php
      skills/..., educations/..., experiences/..., services/..., testimonials/...
      settings/edit.blade.php
      messages/index.blade.php, show.blade.php

routes/
  web.php   → public routes + contact form POST
  auth.php  → Breeze login/logout (keep, strip register/reset if you want single-admin-only)
  (new) admin.php → all admin.* routes, grouped behind `auth` middleware, prefix `/admin`

public/
  build/ (Vite output)
  storage → symlinked to storage/app/public (project images live here)
```

Copy the **entire `assets/` folder** from the iPortfolio zip you already have into `resources/`, then reference it via Vite (or simplest: drop `assets/css`, `assets/js`, `assets/vendor` straight into `public/assets` and `@vite` only your own small additions — this avoids fighting Vite's asset pipeline for a template that wasn't built for it). This is the fastest way to get pixel-identical styling immediately.

---

## 5. Admin Panel — Feature List (keep it deliberately simple)

1. **Login** — Breeze default `/login`, no self-registration route exposed publicly.
2. **Dashboard** — just shows counts: X projects, X unread messages. One page, no over-engineering.
3. **Projects** — full CRUD, with image upload (`Storage::disk('public')->put(...)`), category dropdown, drag-to-reorder is optional/nice-to-have (skip it initially, use a plain `sort_order` number field).
4. **Skills / Education / Experience / Services / Testimonials** — same CRUD pattern repeated, all trivial once Projects is done (copy-paste the controller pattern).
5. **Settings** — one form, loops over all `site_settings` keys, saves them back. This is how you edit your name, bio, contact info, social links without touching code.
6. **Messages** — read-only inbox of contact form submissions, mark as read, delete.

Build order matters — do them in this sequence so each step teaches you the pattern before repeating it:
`Auth (Breeze) → Settings → Projects → Skills → Education/Experience → Services/Testimonials → Messages`

---

## 6. Public Site Build Order

1. Port the static HTML (header, footer, hero, about) into Blade, pulling text from `site_settings`.
2. Skills section — loop over `Skill::orderBy('sort_order')->get()`, feed percent into the existing progress-bar CSS/JS from the template.
3. Resume section — loop over `Education` and `Experience`.
4. Portfolio section — loop over `Project`, keep the existing isotope/filter JS from the template working by outputting the same `data-category` attributes it expects.
5. `portfolio-details.blade.php` — single project view, route `/portfolio/{project}`.
6. Services, Testimonials — loop + reuse existing carousel JS.
7. Contact — form posts to `ContactController@store`, validates, saves to `contact_messages`, shows the existing "Your message has been sent" success state.

---

## 7. Free Hosting — Concrete Steps

**Render.com (recommended)**
1. Push your repo to GitHub.
2. On Render: New → Web Service → connect repo.
3. Environment: Docker (simplest — add a `Dockerfile` using `php:8.3-apache` or `richarvey/nginx-php-fpm` base image; plenty of Laravel Dockerfile examples exist to copy).
4. Add a free **Render Postgres** instance, copy its connection string into your Laravel `.env` (`DB_CONNECTION=pgsql`, etc.) via Render's environment variables panel.
5. Add a **Render Disk** (small free persistent disk) mounted at `storage/app/public` so uploaded project images survive redeploys — this is the one gotcha with Laravel on ephemeral hosts.
6. Set build command to run `composer install --no-dev`, `php artisan migrate --force`, `php artisan storage:link`.
7. Free tier sleeps after 15 min idle — first visit after sleep takes ~30s. Fine for a portfolio site.

**Fly.io (alternative)**
- Similar Docker-based flow, `fly launch` detects Laravel-ish PHP apps decently, free allowance covers a small always-on VM (no sleep), but setup is a bit more CLI-heavy.

Either way: **do not** try to deploy Laravel to Vercel, InfinityFree, or 000webhost — none of them give you the Composer/artisan/persistent-storage access Laravel needs.

---

## 8. Suggested Milestones (do these in order, test after each)

1. `composer create-project laravel/laravel portfolio` → confirm it runs locally.
2. Install Breeze, get `/login` working, create your one admin user via `php artisan tinker` or a seeder.
3. Copy iPortfolio's `assets/` into `public/`, get the static homepage rendering pixel-identical with hardcoded content first (no DB yet) — confirms the template port works before you add complexity.
4. Add migrations + models one at a time, starting with `site_settings` and `projects`.
5. Build Projects CRUD in admin, wire the public Portfolio section to read from DB.
6. Repeat CRUD pattern for the remaining tables.
7. Wire the Contact form.
8. Deploy to Render, test end-to-end on the live URL.
9. Swap in your real content, photo, and projects through the admin panel (no more hardcoding).

---

## 9. What I'd Skip For v1 (add later if you want)

- Drag-and-drop reordering (plain number field is fine)
- Rich text editor for descriptions (plain textarea is fine)
- Email notifications for contact form (just store in DB, check admin inbox)
- Multi-language support
- Automated image resizing/optimization (compress manually before upload for now)

This keeps the admin panel exactly what you asked for — simple.