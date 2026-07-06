# Rwanda Mining Week 2026 — Website Demo (Laravel)

A demo event website built for the RCB/004/6/2026 tender (*Hiring a PCO to Coordinate and
Manage Rwanda Mining Week event 2026*), inspired by the structure of
[DRC Mining Week](https://wearevuka.com/mining/drc-mining-week/) and built to satisfy the
tender's evaluation criteria for "a sample webpage that includes the event agenda, location,
and registration process" and "developing and managing comprehensive event websites with
online registration and payment functionalities."

**Event modeled:** Rwanda Mining Week 2026 · Theme *"Extractive Industry for Sustainable
Futures"* · December 9–11, 2026 · Kigali Convention Centre · 700–1000 delegates, 40+ exhibitors.

## What's included

**Public site**
- Home — hero, event stats, components, featured speakers, sponsors
- Theme & About — event overview, why-attend, snapshot card
- Program — full 3-day agenda grouped by day (plenary, breakout, exhibition, networking, gala, site visit)
- Venue — hall allocation table (Auditorium, MH1–4, Foyer 1A, AD4–12), embedded map
- Registration — delegate/exhibitor/speaker/media/VIP registration form
- **Payment** — a simulated payment step (Mobile Money / Card / Bank Transfer) that confirms
  registration instantly. This is clearly a **demo gateway** (see notice on the page) — it's built
  so the exact same routes/views can be pointed at a real provider (MTN MoMo Open API,
  Flutterwave, a card acquirer, etc.) without changing the rest of the app.

**Admin panel** (`/admin`, protected by login)
- Dashboard with registration/revenue/speaker/sponsor/exhibitor stats
- Registrations — search, filter by payment status, CSV export
- Speakers, Sponsors, Exhibitors — full CRUD, shown live on the public homepage
- Program — full CRUD for the agenda

Demo admin login: **admin@rmw2026.rw / password**

## Tech stack

- Laravel 11 (PHP 8.2+)
- SQLite (zero-config; swap to MySQL/Postgres in `.env` for production)
- Bootstrap 5 + Bootstrap Icons via CDN (no Node build step required)
- Plain Eloquent models/migrations/controllers — no extra Composer packages beyond the
  Laravel framework itself, so `composer install` only needs the internet once

## Running it locally

```bash
composer install
cp .env.example .env
php artisan key:generate
touch database/database.sqlite   # already included, but harmless if re-run
php artisan migrate
php artisan db:seed              # loads demo speakers, sponsors, exhibitors, program & admin user
php artisan serve
```

Visit `http://127.0.0.1:8000` for the public site and `http://127.0.0.1:8000/admin` for the
admin panel.

## Notes for the tender submission

- **Registration & payment**: `RegistrationController` + `PaymentController`
  (`app/Http/Controllers`) implement the online registration and payment flow described in the
  ToR's "Participants Management" line item. Ticket pricing (Standard / VIP / Exhibitor Package /
  Media) is defined in `App\Models\Registration::TICKET_PRICES` — update these to match the final
  approved rate card.
- **Website ownership handover**: as a standard Laravel app with no proprietary dependencies,
  the codebase, database, and admin panel can be handed over in full to Rwanda Mines, Petroleum
  and Gas Board (RMB) at the end of the engagement, per the ToR's deliverables.
- **Branding**: colors follow the Rwanda flag (blue / yellow / green) per your brief; swap
  `public/css/site.css` and the hero image URL in the same file to apply final approved branding,
  photography, and any additional design assets once available.
- **Content**: all speaker names, sponsors, exhibitors and session details in the seeder are
  **illustrative placeholders** for demo purposes — replace via the admin panel or the seeder
  before go-live.
