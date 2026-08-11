# Plan 2 — Your Real Content Mapped to the Schema

This maps Piyush Gupta's resume onto the DB structure from `portfolio-laravel-plan.md`, so you can copy this straight into a seeder or type it into the admin panel once it's built. Nothing here needs code decisions — it's just your data, organized.

---

## 1. `site_settings` (key → value)

| key | value |
|---|---|
| name | Piyush Gupta |
| tagline | Full Stack Developer |
| bio | Full Stack Developer and IT undergraduate skilled in React.js, Next.js, Laravel, Node.js, and modern databases. Experienced in building AI-powered applications, RESTful APIs, admin dashboards, and scalable web systems. Interested in AI, Machine Learning, Cyber Security, and Cloud Technologies. |
| email | piyushgupta422003@gmail.com |
| phone | +91 9555620175 |
| city | Lucknow, India |
| degree | B.Tech, Information Technology (Honors in Cyber Security) |
| freelance | Available *(edit if not true)* |
| github | https://github.com/piyush-gupta2003 |
| linkedin | https://linkedin.com/in/piyushgupta2003 *(confirm your actual LinkedIn URL)* |
| profile_photo | *(upload your photo via admin)* |
| hero_bg | *(keep template default or upload your own)* |
| stat_happy_clients | *(optional — you may want to drop this stat block entirely, see note below)* |
| stat_projects | 3+ *(Walletry, AI Resume Analyzer, Attendance System — add more as you build)* |
| stat_hours_support | *(optional, drop if not relevant to a dev portfolio)* |
| stat_hard_workers | *(optional, drop — this stat is really meant for agencies/teams, not a solo dev)* |

> Note: the "Happy Clients / Hours of Support / Hard Workers" stat block in the original template is written for a freelance agency, not an individual developer's portfolio. Consider replacing that whole stat row with something more relevant to you, e.g.: **Projects Shipped**, **Internship Months**, **Certifications**, **Tech Stack Mastered**. This is a copy decision, not a schema one — the fields still just live in `site_settings`.

---

## 2. `skills` table (name, percent)

Derived from your Technical Skills section — percentages below are a reasonable starting estimate based on how prominently each appears across your experience/projects; adjust to your own honest self-rating.

| name | percent |
|---|---|
| React.js / Next.js | 90 |
| Laravel | 85 |
| JavaScript / TypeScript | 90 |
| Node.js | 75 |
| Python | 75 |
| PHP | 80 |
| MySQL / PostgreSQL | 80 |
| AI/ML (LangChain, Gemini AI, RAG) | 70 |

*(Original template's HTML/CSS/Photoshop skills don't reflect your stack — drop them.)*

---

## 3. `educations` table

| degree | institution | years | description |
|---|---|---|---|
| B.Tech, Information Technology (Honors in Cyber Security) | Shri Ramswaroop Memorial College of Engineering and Management | 2022 – 2026 | CGPA: 8.02/10 |

*(Only one entry — the template's two-entry Education layout can just show one; leave the second slot empty or hide it in the loop if `educations` count < 2.)*

---

## 4. `experiences` table

| title | company | years | description (bullets, store as newline-separated or JSON array) |
|---|---|---|---|
| Full Stack Developer Intern | Webly Technolab | Jan 2026 – June 2026 | • Built enterprise web apps using Laravel, React.js, PostgreSQL, and MySQL for prop trading and financial management platforms.<br>• Developed admin dashboards, REST APIs, authentication systems, and QR-based attendance management features.<br>• Implemented OCR pipelines to extract and structure data from scanned PDFs using Python automation.<br>• Integrated payment gateways, third-party APIs, and cloud databases (Neon DB) in production environments. |

---

## 5. `projects` table (this is your Portfolio section — the main admin feature)

| title | category | short_desc | long_desc | external_link |
|---|---|---|---|---|
| Walletry — AI Finance Management Platform | AI / Web App | AI-powered finance app with budget tracking, expense analytics, and Gemini AI insights. Best Project Award. | Implemented Clerk Authentication, Prisma ORM, and real-time financial dashboards. Stack: Next.js, TypeScript, Supabase, Gemini AI, Tailwind CSS, Shadcn UI. | *(paste your GitHub link — resume shows "GitHub" but not the URL text, grab it from your profile)* |
| AI Resume Analyzer | AI / Tool | AI resume parser using RAG, vector embeddings, and semantic search for candidate-job matching. | Stack: Python, LangChain, HuggingFace, Gemini AI, FAISS, Gradio. | *(paste project link)* |
| Attendance Management System | Web App | QR-based attendance system with real-time tracking, analytics, and reporting dashboards. | Academic project. Stack: React.js, Laravel, MySQL, Tailwind CSS, Chart.js. | *(add repo link if public)* |

**Category values to standardize on** (replacing the template's App/Product/Branding/Books filter tabs): `AI`, `Web App`, `Tool` — matches your actual project types. Update the filter buttons in the Portfolio partial to these three instead of the template defaults.

---

## 6. `services` table (optional section — decide if you want it)

The original template's Services section ("Lorem Ipsum", "Dolor Sitema"...) is generic filler for freelance offerings. As a developer portfolio, you have two honest choices:

- **Drop this section entirely** (common for dev portfolios — replace with nothing, or repurpose the space for "Certifications" instead, see below)
- **Repurpose it as "What I Do"**, e.g.:

| title | description | icon (bootstrap-icon) |
|---|---|---|
| Full Stack Web Development | End-to-end web apps with React/Next.js frontends and Laravel/Node.js backends. | `bi-code-slash` |
| AI-Powered Applications | Integrating LLMs, RAG pipelines, and semantic search into real products. | `bi-cpu` |
| REST API & Dashboard Development | Admin dashboards, authentication systems, and scalable APIs. | `bi-speedometer2` |

---

## 7. `testimonials` table

You don't have client testimonials (expected — you're an intern/student, not a freelance agency). **Recommendation: remove this section entirely** rather than fabricate quotes. If you later get feedback from your internship manager or a professor, add it then.

---

## 8. New section to add: **Certifications & Achievements**

Not in the original template — but you have real content for it, and it's more valuable to you right now than testimonials or a generic Services section. Add a `certifications` table:

| title | issuer | date (optional) |
|---|---|---|
| Cybersecurity Fundamentals | IBM SkillsBuild | |
| AI & Machine Learning Bootcamp | LearnTrail | |
| Best Project Award — Walletry | (internal/college) | |

Slot this in right after Skills or right before Contact — a simple badge/list layout, no need for the CRUD complexity of Projects.

---

## 9. Summary of Layout Changes vs. Original Template

| Original section | What to do |
|---|---|
| Hero | Keep — swap in your name/tagline |
| About | Keep — swap bio + info list, **replace the 4 agency stats** with dev-relevant ones |
| Skills | Keep — replace with your real stack list |
| Resume (Summary/Education/Experience) | Keep — you have exactly one education entry and one experience entry, template supports more if you add later |
| Portfolio | Keep — your 3 real projects, new category filters (AI / Web App / Tool) |
| **Services** | Optional — drop or repurpose as "What I Do" |
| **Testimonials** | **Drop** — no fabricated quotes |
| **Certifications** (new) | **Add** — you have real content that deserves a section |
| Contact | Keep — your real email/phone/city, drop the fake map address (A108 Adam Street) and either embed your real city's map or remove the map embed |

This is your actual seed data — once the Laravel app from Plan 1 is scaffolded, this doc is what goes into the database seeder (`database/seeders/PortfolioSeeder.php`) or gets typed into the admin panel by hand