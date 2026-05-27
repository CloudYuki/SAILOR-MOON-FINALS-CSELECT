# 🌙 Sailor Moon Fan Website — Reorganized Project

## Folder Structure

```
sailormoon/
├── admin/                  ← Admin panel pages (require login)
│   ├── index.php           — Dashboard + character list
│   ├── add.php             — Add new character
│   ├── edit.php            — Edit character
│   ├── delete.php          — Delete character
│   ├── highlights.php      — Manage highlights
│   ├── media.php           — Manage gallery media
│   ├── messages.php        — View contact messages & subscribers
│   ├── search.php          — Search characters
│   ├── admin_management.php— Manage admin accounts
│   └── logout.php          — Destroy session and redirect
│
├── public/                 ← Public-facing pages (no login needed)
│   ├── public_home.php     — Homepage
│   ├── public_overview.php — Character profiles
│   ├── public_highlights.php— Highlights gallery
│   ├── public_media.php    — Media gallery with lightbox
│   ├── public_contact.php  — Contact form + newsletter
│   ├── login.php           — Admin login page
│   └── register.php        — Access-denied redirect
│
├── includes/               ← Shared PHP files (included by other pages)
│   ├── conn.php            — Database connection + table name variables
│   ├── session.php         — Session guard (redirects to login if not authed)
│   └── header.php          — Admin HTML header, nav, and floating background
│
├── css/                    ← All stylesheets (separated from PHP)
│   ├── admin.css           — Admin panel styles (used by all admin pages)
│   ├── login.css           — Login page styles
│   ├── public-shared.css   — Shared public styles: reset, header, nav, footer, alerts
│   ├── public-home.css     — Home page: hero, intro, stats, quick links, footer
│   ├── public-overview.css — Character profiles: search, selector, profile card
│   ├── public-highlights.css— Highlights grid and cards
│   ├── public-media.css    — Gallery grid and lightbox
│   └── public-contact.css  — Contact form, info cards
│
└── assets/                 ← Put your images here
    ├── Header_pics/        — Hero background images
    ├── profiles/           — Character portrait images
    ├── highlights/         — Highlight images/GIFs
    └── media/              — Gallery images/GIFs
```

## How to Deploy

1. Upload the entire `sailormoon/` folder to your web server (e.g. inside `htdocs/` or `public_html/`).
2. Import your MySQL database and update **`includes/conn.php`** with your server credentials.
3. Entry points:
   - **Public site:** `public/public_home.php`
   - **Admin login:** `public/login.php`
   - **Admin dashboard:** `admin/index.php` (redirects to login if not authenticated)

## Image Path Notes

All image paths stored in the database should now use paths **relative to the page loading them**.
Since all public pages live in `public/` and assets live in `assets/`, use paths like:

- `../assets/profiles/moon.png`
- `../assets/highlights/image.gif`
- `../assets/media/photo.jpg`

Admin pages also live one level deep (`admin/`), so the same `../assets/...` prefix applies.

## CSS Link Pattern

Every page loads CSS using relative paths to `../css/`:

```html
<!-- Public pages load: -->
<link rel="stylesheet" href="../css/public-shared.css">
<link rel="stylesheet" href="../css/public-home.css">   <!-- page-specific -->

<!-- Admin pages load (via includes/header.php): -->
<link rel="stylesheet" href="../css/admin.css">

<!-- Login page loads: -->
<link rel="stylesheet" href="../css/login.css">
```
