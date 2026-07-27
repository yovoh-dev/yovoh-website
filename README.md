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

## 📦 Deploying to Render (Docker)

Render doesn't have a native PHP runtime, so this repo ships with a `Dockerfile` — Render builds and
runs it automatically. You don't need Docker installed on your own machine for this; Render does the
building on their servers. (You *can* also run it locally with `docker build` / `docker run` if you
want to test the container first — see below.)

The site's database is **PostgreSQL** (via Render's managed Postgres), not the SQLite used for local
dev — Render's disks are ephemeral, so SQLite data would be wiped on every redeploy.

### Option A — One-click via Blueprint (recommended)

This repo includes `render.yaml`, which provisions the web service **and** the Postgres database
together:

1. Push this repo to GitHub (already done ✅).
2. In the Render dashboard: **New +** → **Blueprint** → select this repo.
3. Render reads `render.yaml` and shows you the two resources it will create (`yovoh-marsabit` web
   service + `yovoh-marsabit-db` database). Click **Apply**.
4. You'll be prompted to fill in two values it can't generate safely on its own:
   - **APP_KEY** — generate it locally first: `php artisan key:generate --show`, then paste the
     full `base64:...` output.
   - **APP_URL** — set to `https://yovoh-marsabit.onrender.com` (matches the service name in
     `render.yaml`). If that subdomain was already taken, Render will assign a different one —
     check the dashboard after the first deploy and update this env var + redeploy if needed.
5. Click **Create**. Render builds the Docker image, provisions Postgres, runs migrations
   (via the entrypoint script) and — on this first deploy only — seeds the database with the six
   pillars, budget lines, stakeholders, phases, settings, and the default super admin account
   (via `initialDeployHook`).
6. Visit your Render URL, then `/admin`, and log in with:
   ```
   Email:    admin@yovohmarsabit.org
   Password: ChangeMe123!
   ```
   **Change this password immediately** under Admin → Users.

### Option B — Manual dashboard setup

If you'd rather not use the Blueprint:

1. **New +** → **PostgreSQL** → name it, pick the free plan, create it. Copy its **Internal
   Database URL** once it's provisioned.
2. **New +** → **Web Service** → connect this repo → Render should auto-detect the `Dockerfile`
   (Runtime: Docker).
3. Under **Environment**, add these variables:

   | Key | Value |
   |---|---|
   | `APP_NAME` | `Young Voices of Hope - Marsabit` |
   | `APP_ENV` | `production` |
   | `APP_DEBUG` | `false` |
   | `APP_KEY` | output of `php artisan key:generate --show` (run locally) |
   | `APP_URL` | `https://<your-service-name>.onrender.com` |
   | `DB_CONNECTION` | `pgsql` |
   | `DATABASE_URL` | the Internal Database URL from step 1 |
   | `SESSION_DRIVER` | `file` |
   | `CACHE_DRIVER` | `file` |
   | `QUEUE_CONNECTION` | `sync` |

4. Under **Settings → Health Check Path**, set `/up` (Laravel 12's built-in health route).
5. Deploy. Once it's live, open the service's **Shell** tab and run once:
   ```bash
   php artisan db:seed --force
   ```
6. Log in at `/admin` with the default credentials above and change the password immediately.

### Testing the container locally (optional)

```bash
docker build -t yovoh-marsabit .
docker run -p 10000:10000 \
  -e APP_KEY="base64:...your key..." \
  -e APP_ENV=local \
  -e DB_CONNECTION=pgsql \
  -e DATABASE_URL="postgresql://user:pass@host:5432/dbname" \
  yovoh-marsabit
```
Visit `http://localhost:10000`.

### Notes

- `docker/entrypoint.sh` runs `php artisan migrate --force` on every boot (safe — schema-only,
  idempotent) but **never** runs seeders automatically after the first deploy, so nothing overwrites
  content you've edited through `/admin`.
- Want real outgoing email for the contact form instead of just log entries? Configure `MAIL_*` env
  vars (see `.env.example`) — currently it uses the `log` driver.
- Sessions/cache use the `file` driver, which resets on redeploy (you'll just get logged out of
  `/admin` — a minor inconvenience for a low-traffic admin panel). Switch both to `database` later
  if you want that to persist too.

---

Built for **Young Voices of Hope — Marsabit**. *Empowering Youth. Transforming Communities. Building Futures.*
