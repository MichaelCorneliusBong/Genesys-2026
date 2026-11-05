<div align="center">

# 🐉 Genesys Meta

### The community hub for the **Yu-Gi-Oh! Genesys** format

Tournament decks · Card points · Guides · Tier lists · Points quiz

<br>

[Features](#-features) · [Tech Stack](#-tech-stack) · [Getting Started](#-getting-started) · [Commands](#-useful-commands)

</div>

---

## 📖 About

**Genesys Meta** is a web platform for players of the **Genesys** format of Yu-Gi-Oh!, where every card carries a point value and decks are built within a points budget. The site gathers everything a player needs in one place: top tournament decklists, a searchable card database with Genesys points, strategy guides, news, tier lists, and a quiz to train your point knowledge.

> 🎓 Built as a capstone project at **Universitas Esa Unggul** (Informatics Engineering).
> Planning documents (PRD, BRD, capstone report, in Indonesian) are in [`docs/`](docs/).

---

## ✨ Features

### 🌐 For everyone

| | Feature | Route |
|:-:|---|---|
| 🏠 | Home page | `/` |
| 🗂️ | Archetypes: Blue-Eyes, Radiant Typhoon, Voiceless Voice, Mimighoul | `/decks` |
| 🃏 | Tournament decks per archetype, with full card lists | `/decks/{archetype}` · `/deck/{slug}` |
| 📘 | Strategy guides | `/guides` · `/guides/{slug}` |
| 📰 | Articles and news | `/articles` · `/articles/{slug}` |
| 🏆 | Tier lists with archetypes and featured cards | `/tier-lists` · `/tier-lists/{id}` |
| 🔍 | Card database search with Genesys points | `/cards/search` · `/cards/{card}` |

### 👤 For members

| | Feature | Details |
|:-:|---|---|
| 🔐 | **Secure login** | Password check followed by a 6-digit **email OTP** (valid for 5 minutes) |
| 🔖 | **Bookmarks** | Save and remove favorite decks at `/bookmarks` |
| 🧠 | **Points quiz** | 10 random cards, guess each point value, score saved to your history |
| ⚙️ | **Profile** | Manage your account at `/profile` |

### 🛠️ For administrators

Available at `/admin`, built with **Filament**:

- Full CRUD for archetypes, decks (with card and guide relation managers), cards, guides, articles, tier lists, bookmarks, quiz history and users
- Role and permission management with **Filament Shield**
- Activity logging, themes, light/dark switch and profile editing

---

## 🧰 Tech Stack

| Layer | Technology |
|---|---|
| **Backend** | PHP 8.2+ (Docker uses 8.3), Laravel 12 |
| **Admin panel** | Filament 3.3, Shield, Logger, Themes, Edit Profile, Overlook |
| **Frontend** | Blade, Tailwind CSS 3, Alpine.js, Lucide icons, Vite 6 |
| **Database** | MariaDB (also used for sessions, cache and queue) |
| **Testing** | Pest 3 |
| **Infrastructure** | Docker: PHP-FPM + Nginx + MariaDB |
| **External API** | [YGOPRODeck v7](https://db.ygoprodeck.com/api-guide/) (`format=genesys`) |

---

## 🗺️ Project Structure

```text
Genesys-2026/
├── 🐘 php/                        PHP-FPM Dockerfile, php.ini, entrypoint
├── 🌐 nginx/                      Nginx Dockerfile + local SSL cert
├── 🗄️ db/conf.d/my.cnf            MariaDB config
├── 📄 docs/                       PRD, BRD, capstone report (PDF)
└── 📦 src/                        Laravel application
    ├── app/
    │   ├── Console/Commands/      project:init · project:cache · genesys:sync-card-pool
    │   ├── Filament/Admin/        Admin resources and widgets
    │   ├── Genesys/CardPool.php   Genesys card list
    │   ├── Http/Controllers/      Auth · Quiz · Profile · ...
    │   ├── Models/                Archetype · Deck · Card · Guide · Article · TierList ...
    │   └── Services/              YgoProDeckService
    ├── database/                  Migrations and seeders
    ├── resources/views/           Blade views
    └── routes/web.php
```

---

## 🚀 Getting Started

### 🐳 Option A: Docker

> [!NOTE]
> `docker-compose.yml` and `nginx/default.conf` are **gitignored**, so you must create them yourself.

You need three services:

| Service | Details |
|---|---|
| `php` | Build from `./php`, mount `./src` at `/var/www/html`, set `PROJECT_NAME` |
| `nginx` | Build from `./nginx`, serve `src/public`, pass PHP to `php:9000` |
| `db` | MariaDB with `./db/conf.d` mounted and `./db/data` as the data volume |

On start, the PHP entrypoint waits for the database, installs Composer dependencies, runs migrations, runs `project:init` and links storage.

Make sure `src/.env` matches your database (`DB_HOST=db`) and update the placeholder values (`APP_NAME`, `APP_URL`, `DB_DATABASE`) that came from the starter template.

### 💻 Option B: Local

**Requirements:** PHP 8.2+, Composer, Node.js (or Bun), MariaDB/MySQL

```bash
cd src
cp .env.example .env          # then edit DB_HOST, DB_DATABASE, DB_USERNAME, DB_PASSWORD, APP_URL

composer install
php artisan key:generate

npm install                   # or: bun install
npm run build                 # or: npm run dev while developing

php artisan project:init      # migrate:fresh + permissions + seed + card sync
php artisan storage:link
php artisan serve
```

Open **http://127.0.0.1:8000** · Admin panel at **/admin**

> [!TIP]
> `MAIL_MAILER=log` is the default, so login OTP codes are written to `storage/logs/laravel.log` instead of being emailed. Check the log to find your code.

---

## 🔑 Seeded Accounts

| Role | Email | Password |
|---|---|---|
| 👑 Super Admin | `Admin@Gmail.com` | `Admin001` |
| 🙂 User | `User@Gmail.com` | `User001` |

> [!WARNING]
> Change or remove these accounts before any public deployment.

---

## ⌨️ Useful Commands

| Command | What it does |
|---|---|
| `php artisan project:init` | Reset DB, regenerate permissions, reseed ⚠️ **destroys data** |
| `php artisan project:cache` | Clear and rebuild caches |
| `php artisan genesys:sync-card-pool` | Sync cards (add `--force` to re-download all) |
| `php artisan test` | Run Pest tests |
| `./vendor/bin/pint` | Fix code style |

---

## 🔒 Security Notes

- `project:init` runs `migrate:fresh` and **wipes the database**.
- `.env` is gitignored; never commit it. The entrypoint generates one with a hard-coded `APP_KEY` if none exists, so run `php artisan key:generate` and use your own key outside local development.
- `nginx/ssl/` holds a self-signed certificate for `genesys.test`, for **local development only**.

---

## 📜 Credits

Card data and images are provided by [YGOPRODeck](https://ygoprodeck.com). Yu-Gi-Oh! and its card artwork belong to Konami. This is a fan and educational project.

<div align="center">

**Made by Michael Cornelius Bong** · Informatics Engineering, Universitas Esa Unggul

</div>
