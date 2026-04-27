# 🚪 DARWAZA — Premium Restaurant Website
## Laravel 9 · Full Stack · 3D Design · Admin Panel

---

## 📁 Files Included
```
darwaza/
├── app/Http/Controllers/
│   ├── DarwazaController.php    ← Main website controller
│   └── AdminController.php      ← Admin panel controller
├── app/Models/
│   ├── Reservation.php
│   └── Contact.php
├── database/migrations/
│   ├── ...create_reservations_table.php
│   └── ...create_contacts_table.php
├── public/
│   ├── css/darwaza.css          ← All styles (3D, gold theme)
│   └── js/darwaza.js            ← Particles, cursor, animations
├── resources/views/
│   ├── layouts/app.blade.php   ← Main layout
│   ├── home.blade.php
│   ├── menu.blade.php
│   ├── gallery.blade.php
│   ├── reservation.blade.php   ← Form + Google Map
│   ├── contact.blade.php       ← Form + Map
│   └── admin/
│       ├── layout.blade.php
│       ├── dashboard.blade.php
│       ├── reservations.blade.php
│       └── messages.blade.php
└── routes/web.php
```

---

## ⚡ Setup Steps (5 minutes)

### Step 1 — Copy files to your Laravel 9 project
Copy each folder to its matching location in your project.

### Step 2 — Set up .env database
```env
DB_DATABASE=DBNAME
DB_USERNAME=root
DB_PASSWORD=password
```

### Step 3 — Run migrations
```bash
php artisan migrate
php artisan config:clear
php artisan view:clear
php artisan cache:clear
```

### Step 4 — Done! ✅

---

## 🌐 Pages
| URL | Page |
|-----|------|
| `/` | Home — Hero, 3D room cards, gallery preview, secret code |
| `/menu` | Menu — Tabbed by era (Mughal/Colonial/Azadi) |
| `/gallery` | Gallery — 12 photos with lightbox |
| `/reservation` | Reservation form + Google Map |
| `/contact` | Contact form + Google Map |
| `/admin` | Admin dashboard |
| `/admin/reservations` | All bookings table |
| `/admin/messages` | All contact messages |

---

## 🎨 Design Features
- **Gold + Black** premium theme
- **Custom cursor** with ring animation
- **Floating particles** in background
- **3D flip cards** for room selection (hover to flip)
- **Scroll reveal** animations on all sections
- **Counter animations** for stats
- **Lightbox** for gallery
- **Google Maps** embedded (dark-styled)
- **Secret code system** — DRZ-XXXX generated per reservation

---

## 📱 Fully Responsive
Works on mobile, tablet, and desktop.

---

## 🗺️ Google Map
Currently showing Liberty Market, Lahore.
To change location: edit the `src` in `reservation.blade.php` and `contact.blade.php`
Get embed URL from: https://maps.google.com → Share → Embed a map

---

Made with ❤️ for DARWAZA Restaurant, Lahore
