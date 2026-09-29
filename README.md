Infokan Blog

Blog teknologi untuk pemula, dengan slogan "Belajar Tech dari Nol, Tanpa Ribet". Konsep tech dijelaskan dengan bahasa sederhana, contoh nyata, dan langkah demi langkah.

Dibangun dengan Laravel, Blade + Tailwind CSS, JavaScript biasa (tanpa framework JS), dan MySQL.

Status: tahap awal. Panel admin belum ada, data awal diisi lewat seeder.

Fitur
Beranda dengan hero, kolom pencarian, dan kategori populer
Daftar artikel dengan tab Terbaru / Popular dan tombol Muat Lebih Banyak (tanpa reload halaman)
Pencarian artikel di /blog?q= memakai FULLTEXT MySQL
Satu artikel bisa punya banyak kategori, lengkap dengan badge level (Beginner, Intermediate, Advanced) dan waktu baca
Halaman detail artikel dengan penghitung views dan artikel terkait
Halaman kategori dan artikel per kategori
Form newsletter dengan validasi
Dark mode (pilihan tersimpan di localStorage)
Tanggal berbahasa Indonesia lewat Carbon, misalnya 12 Agu 2026
Teknologi
Bagian	Teknologi
Backend	Laravel (PHP 8.2+)
Frontend	Blade, Tailwind CSS, JavaScript biasa, Vite
Database	MySQL (utf8mb4)
Testing	PHPUnit (Feature Test)
Instalasi
Prasyarat

PHP 8.2+, Composer, Node.js 18+, dan MySQL.

1. Siapkan database
sql
CREATE DATABASE IF NOT EXISTS infokan_blog
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;

CREATE USER IF NOT EXISTS 'infokan'@'localhost' IDENTIFIED BY 'ganti_dengan_password_kuat';
GRANT ALL PRIVILEGES ON infokan_blog.* TO 'infokan'@'localhost';
FLUSH PRIVILEGES;
2. Pasang proyek
bash
git clone https://github.com/<username>/infokan-blog.git
cd infokan-blog

composer install
npm install

cp .env.example .env
php artisan key:generate
3. Atur .env
env
APP_LOCALE=id

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=infokan_blog
DB_USERNAME=infokan
DB_PASSWORD=ganti_dengan_password_kuat
4. Migrasi dan data dummy
bash
php artisan migrate:fresh --seed

Seeder membuat satu user admin (admin@infokan.test), 5 kategori (Golang, Backend, System Design, DevOps, AI Tools), dan 2 artikel contoh.

5. Jalankan
bash
npm run dev          # terminal 1
php artisan serve    # terminal 2

Buka http://127.0.0.1:8000.

Jika repo ini hanya berisi file aplikasi (tanpa folder vendor, bootstrap, config, dan sebagainya), buat dulu proyek Laravel baru dengan composer create-project laravel/laravel infokan-blog, lalu salin isi repo ini ke dalamnya dan timpa file yang sama.

Struktur Folder
infokan-blog/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── HomeController.php        # Beranda
│   │   │   ├── PostController.php        # Daftar, pencarian, detail, feed
│   │   │   ├── CategoryController.php    # Semua kategori, artikel per kategori
│   │   │   ├── NewsletterController.php  # Subscribe
│   │   │   └── PageController.php        # Tentang, Kontak
│   │   └── Requests/SubscribeRequest.php
│   ├── Models/                           # User, Post, Category, Subscriber
│   └── Providers/AppServiceProvider.php  # Locale Carbon, data footer
├── database/
│   ├── migrations/                       # categories, posts, category_post, subscribers
│   └── seeders/                          # Database, User, Category, Post
├── resources/
│   ├── css/app.css
│   ├── js/                               # app.js, dark-mode.js, posts-feed.js
│   └── views/
│       ├── layouts/app.blade.php
│       ├── partials/                     # navbar, footer
│       ├── components/                   # post-card, category-card, badge,
│       │                                 # feature-item, search-form, newsletter-form
│       ├── home/                         # index + sections (hero, popular-categories, latest-posts)
│       ├── posts/                        # index, show
│       ├── categories/                   # index, show
│       └── pages/                        # about, contact
├── routes/web.php
└── tests/Feature/                        # HomeTest, PostTest, NewsletterTest
Rute
Method	URL	Fungsi
GET	/	Beranda
GET	/blog dan /blog?q=	Daftar artikel dan pencarian
GET	/blog/{slug}	Detail artikel
GET	/posts/feed?tab=terbaru|popular&page=	Tab dan Muat Lebih Banyak (JSON)
GET	/kategori	Semua kategori
GET	/kategori/{slug}	Artikel per kategori
POST	/newsletter	Subscribe newsletter
GET	/tentang, /kontak	Halaman statis
Database
users 1 ──── * posts
posts * ──── * categories   (lewat category_post)
Tabel	Keterangan
users	Bawaan Laravel, dipakai sebagai penulis artikel
categories	name, slug, icon, color, description
posts	Judul, slug, ringkasan, isi, thumbnail, level, read_time, views, is_published, published_at
category_post	Pivot artikel dan kategori (primary key gabungan)
subscribers	Email newsletter (unik)

Indeks pada posts: slug, published_at, views, dan FULLTEXT pada title + excerpt. Jumlah artikel per kategori dihitung dengan withCount('posts'), tanpa kolom tersendiri.

Testing
bash
php artisan test

Test yang tersedia: beranda tampil, detail artikel menambah views, pencarian, endpoint feed, dan subscribe newsletter (termasuk validasi email).
