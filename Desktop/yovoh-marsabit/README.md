# Young Voices of Hope — Marsabit (Laravel website)

A full Laravel 12 website for **YoVoH – Marsabit**, a community-based organisation running an
Integrated Education Support & Resilience Initiative across 50 schools and 15,000+ learners in
Marsabit County, Kenya.

Design concept: **"An oasis rising from arid ground."** Marsabit town sits on a forested volcanic
mountain surrounded by desert — the site's hero, colour system and motion all draw on that image
of resilience and growth, rather than a generic template.

## ✨ What's inside

- **6 public pages**: Home, About, Programs (six pillars), Impact & Plan (timeline + budget), Partners, Contact
- **A real admin panel** at `/admin`, protected by login, with two permission levels:
  - **Admin** — manage Pillars, Budget lines, Stakeholders, Implementation Phases, read the Contact inbox, edit site Settings
  - **Super Admin** — everything above, plus creating/editing/removing other admin accounts
- **Dark / Light / System theme switcher** — a three-way toggle in the nav (and admin topbar) that persists in `localStorage`, respects the OS setting on "System", and applies before first paint (no flash of the wrong theme)
- **Heavy, deliberate animation**: animated sunrise/mountain hero, scroll-reveals (AOS), animated number counters, animated budget bars, an SVG timeline that draws itself in, marquee SDG strip, hover micro-interactions on every card, a sticky nav that blurs in on scroll
- **Fully responsive** — mobile-first, tested down to small phones, with a slide-in mobile drawer menu
- **Accessible by default** — skip-to-content link, visible focus rings, `prefers-reduced-motion` support
- **Real content, database-backed** — Pillars, Budget, Stakeholders, Phases and site Settings all live in the database and are seeded from the organisation's own strategic plan documents, then editable through `/admin`
- **Zero frontend build step** — Tailwind CSS, Alpine.js and AOS are all loaded via CDN, so the site runs immediately after `composer install`, no `npm install` required

## 🧱 Tech stack

| Layer         | Choice                                             |
|---------------|-----------------------------------------------------|
| Framework     | Laravel 12 (PHP 8.2+)                               |
| Auth          | Laravel's built-in session auth + a custom `role` column (`admin` / `super_admin`) — no external package |
| Database      | SQLite (zero-config, single file)                   |
| Styling       | Tailwind CSS (Play CDN) + custom design-system CSS  |
| Animation     | AOS (scroll reveals), Alpine.js (menus/interactivity/theme toggle), hand-rolled JS (counters, budget bars, timeline) |
| Fonts         | Fraunces (display), Inter (body), Space Grotesk (labels/nav), JetBrains Mono (data) |

## 🚀 Getting started

```bash
# 1. Install PHP dependencies
composer install

# 2. Copy the environment file and generate an app key
cp .env.example .env
php artisan key:generate

# 3. Create the SQLite database file, then migrate + seed
touch database/database.sqlite
php artisan migrate --seed

# 4. Serve the app
php artisan serve
```

Visit **http://localhost:8000** for the public site, and **http://localhost:8000/admin** for the admin panel.

### Default super admin login

The seeder creates one super admin account so you can get in immediately:

```
Email:    admin@yovohmarsabit.org
Password: ChangeMe123!
```

**Change this password immediately** (Admin → Users → edit your account) or edit
`database/seeders/AdminUserSeeder.php` before seeding in a real deployment.

From there, the super admin can create additional **Admin** or **Super Admin** accounts under
**Admin → Users** (only visible to super admins).

## 🎨 Dark / Light / System theme

The three-way toggle lives in the nav (desktop + mobile) and the admin topbar. It:
- Applies instantly on page load via a small inline script in `<head>` (no flash of the wrong theme)
- Persists the choice in `localStorage` under the key `yovoh-theme`
- On **System**, follows the OS `prefers-color-scheme` setting live — if the user's OS switches
  themes while the tab is open, the site updates automatically
- Is implemented with Tailwind's `darkMode: 'class'` — new markup can just use `dark:` utility
  classes directly; the six original public pages (built before dark mode existed) are covered by
  a set of global overrides in `public/assets/css/app.css` under the "Dark mode overrides" section

## 🗂️ Project structure (site-specific files)

```
app/Models/                                → Pillar, BudgetItem, Stakeholder, ImplementationPhase, ContactMessage, Setting, User
app/Http/Controllers/PageController.php    → public pages, reads content from the database
app/Http/Controllers/AuthController.php    → staff login/logout
app/Http/Controllers/Admin/*Controller.php → one controller per admin-manageable resource
app/Http/Middleware/EnsureUserIsAdmin.php       → 'admin' route middleware alias
app/Http/Middleware/EnsureUserIsSuperAdmin.php  → 'super_admin' route middleware alias
database/migrations/                       → users(+role), pillars, budget_items, stakeholders, implementation_phases, contact_messages, settings
database/seeders/                          → seeds the real content + the default super admin
routes/web.php                             → public routes, auth routes, and the /admin route group
resources/views/layouts/app.blade.php      → public site layout (nav + footer)
resources/views/layouts/admin.blade.php    → admin layout (sidebar + topbar)
resources/views/layouts/minimal.blade.php  → bare layout used by the login page
resources/views/partials/head.blade.php    → shared <head> (fonts, Tailwind config, dark-mode script)
resources/views/partials/theme-toggle.blade.php → the light/system/dark segmented control
resources/views/partials/icon.blade.php    → single reusable inline-SVG icon set
resources/views/pages/*.blade.php          → public pages: Home, About, Programs, Impact, Partners, Contact
resources/views/admin/*                    → admin CRUD screens
public/assets/css/app.css                  → design tokens + all custom animation/utility/dark-mode CSS
public/assets/js/app.js                    → nav scroll state, counters, budget bars, timeline reveal, theme logic
```

## ✏️ Editing content

Almost everything on the public site now lives in the database and is editable at `/admin` —
no code changes required for day-to-day updates:

| What                              | Where to edit it            |
|------------------------------------|------------------------------|
| Six strategic pillars              | Admin → Pillars              |
| Three-year budget line items        | Admin → Budget               |
| Partner/stakeholder list           | Admin → Stakeholders          |
| Implementation phases/timeline      | Admin → Phases                |
| Contact form submissions           | Admin → Messages              |
| Org name, contact info, mission/vision text, homepage stat figures | Admin → Settings |
| Admin/Super Admin accounts         | Admin → Users (super admin only) |

Content that's more structural and less likely to change often (SDG list, county context stats,
governance role descriptions, core values) is still defined directly in
`app/Http/Controllers/PageController.php` — move it into the database the same way if you'd like
it editable too.

## 🎨 Customising the design

- **Colours & fonts**: edit the `tailwind.config` script block in `resources/views/partials/head.blade.php`.
- **Animations & one-off effects** (hero sun, mountain parallax, budget bars, marquee, etc.):
  `public/assets/css/app.css`.
- **Logo mark**: currently an inline SVG (sunrise + mountain) in the navbar/footer partials — swap
  for a real logo file by dropping it into `public/assets/img/` and replacing the `<svg>` block.

## 🧪 Tests

A small Feature test suite checks that every page returns `200` and that the contact form validates
and redirects correctly:

```bash
php artisan test
```

## 📦 Deploying

Standard Laravel deployment applies — point your web server's document root at `/public`, set a
real `APP_KEY`, `APP_ENV=production`, `APP_DEBUG=false`, and configure `MAIL_*` if you want the
contact form to send real email instead of just logging submissions (see
`PageController@submitContact`).

---

Built for **Young Voices of Hope — Marsabit**. *Empowering Youth. Transforming Communities. Building Futures.*
