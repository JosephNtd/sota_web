# 🎓 TitKul Website — Nền tảng giới thiệu & SaaS giáo dục

> Website chính thức của **Công ty Cổ phần TitKul** — đơn vị sản xuất phần mềm quản lý trường học (HDSchool, H2School, Zalo Mini App), phục vụ chuyển đổi số ngành giáo dục TP.HCM.
>
> Dự án được dựng lại trên nền tảng **sota_web** — một CMS PHP MVC tự viết — với giao diện hiện đại theo phong cách *"Premium Scholastic Modernism"*, hệ thống animation Effect Map đầy đủ và phần quản trị config-driven.

<p align="center">
  <img alt="PHP" src="https://img.shields.io/badge/PHP-7.4%2B-777BB4?logo=php&logoColor=white">
  <img alt="MariaDB" src="https://img.shields.io/badge/MariaDB-10.3%2B-003545?logo=mariadb&logoColor=white">
  <img alt="WampServer" src="https://img.shields.io/badge/WampServer-Apache-orange">
  <img alt="No Framework" src="https://img.shields.io/badge/Framework-Custom%20MVC-blue">
  <img alt="Status" src="https://img.shields.io/badge/Status-Ho%C3%A0n%20thi%E1%BB%87n-success">
</p>

---

## 📑 Mục lục

1. [Giới thiệu](#-giới-thiệu)
2. [Tính năng nổi bật](#-tính-năng-nổi-bật)
3. [Công nghệ sử dụng](#-công-nghệ-sử-dụng)
4. [Kiến trúc & Luồng xử lý](#-kiến-trúc--luồng-xử-lý)
5. [Cấu trúc thư mục](#-cấu-trúc-thư-mục)
6. [Yêu cầu hệ thống](#-yêu-cầu-hệ-thống)
7. [Cài đặt](#-cài-đặt)
8. [Cấu hình `config.php`](#-cấu-hình-configphp)
9. [Kiến trúc thông tin (IA) & Content Types](#-kiến-trúc-thông-tin-ia--content-types)
10. [Bản đồ Route / URL](#-bản-đồ-route--url)
11. [Trang & Template Frontend](#-trang--template-frontend)
12. [Hệ thống quản trị (Admin `sota`)](#-hệ-thống-quản-trị-admin-sota)
13. [Design System & CSS](#-design-system--css)
14. [Quy ước & Lưu ý kỹ thuật](#-quy-ước--lưu-ý-kỹ-thuật)
15. [Triển khai (Deploy)](#-triển-khai-deploy)
16. [Xử lý sự cố thường gặp](#-xử-lý-sự-cố-thường-gặp)
17. [Lộ trình](#-lộ-trình)
18. [Bản quyền](#-bản-quyền)

---

## 🏫 Giới thiệu

**TitKul** cung cấp các phần mềm quản lý trường học giúp số hóa nghiệp vụ giáo dục:

- **HDSchool** — Phần mềm quản lý trường học toàn diện
- **H2School** — Giải pháp tương tác nhà trường ↔ phụ huynh
- **Zalo Mini App** — Cổng thông tin trên nền tảng Zalo

Website này là **trang giới thiệu công ty + sản phẩm SaaS + tin tức**. **Không có chức năng thương mại điện tử** (giỏ hàng / thanh toán bị tắt).

Nội dung chính của site:

- Trang chủ kể chuyện thương hiệu (11 sections)
- Giới thiệu sản phẩm HDSchool / H2School
- Tính năng nổi bật, Hướng dẫn sử dụng
- Tin tức & **Case Study** (câu chuyện triển khai thực tế tại các trường)
- Trang Giới thiệu công ty, Văn bản pháp lý, Liên hệ + FAQ
- Form đăng ký tư vấn / liên hệ qua AJAX

---

## ✨ Tính năng nổi bật

### Frontend
- 🎨 **Design System nhất quán** — "Premium Scholastic Modernism" (Navy `#001F3F` + Red `#bb0021`), glassmorphism, token hóa toàn bộ màu/shadow/radius.
- 🎬 **Effect Map animations** — hệ thống entrance `.tk-rv` + `IntersectionObserver`, stagger delays, counter-up khi scroll, hero 3D coverflow carousel, hexagon cluster tương tác.
- 📱 **Responsive** — breakpoints 1280 / 1024 / 768 / 480px, menu mobile riêng.
- ♿ **`prefers-reduced-motion`** — tôn trọng thiết lập giảm chuyển động của người dùng.
- 🖼️ **Gallery đa ảnh + Lightbox** — văn bản pháp lý nhiều trang gom nhóm theo tiêu đề, điều hướng bằng phím ‹ ›.
- 📨 **Form AJAX** — đăng ký tư vấn (newsletter) và liên hệ, không reload trang.

### Backend / Quản trị
- 🧩 **Admin config-driven** — toàn bộ content-type khai báo trong `libraries/type/config-type-*.php`, không cần code lại CRUD.
- 🗂️ **Hệ thống Gallery linh hoạt** — `kind='man'`, phân biệt bằng `val` (ví dụ `stats`, `quote`) cho Case Study.
- 🔍 **SEO module** — meta per-page, sitemap, slug tiếng Việt không dấu.
- ⚡ **Tự build cache CSS/JS** — gộp & minify khi tắt debug mode.
- 🖼️ **Thumbnail on-the-fly** — resize ảnh qua route `thumbs/{w}x{h}x{z}/...`.

---

## 🛠 Công nghệ sử dụng

| Lớp | Công nghệ |
|-----|-----------|
| **Ngôn ngữ** | PHP thuần (không framework) |
| **Kiến trúc** | MVC tự viết |
| **Router** | [AltoRouter](http://altorouter.com/) (`libraries/router.php`) |
| **CSDL** | MariaDB / MySQL — wrapper `PDODb` (MysqliDb-style), prefix bảng `#_` |
| **Server** | WampServer (Apache + `mod_rewrite`) |
| **Frontend** | HTML5, CSS3 (`assets/css/titkul.css` ~12.000 dòng), JavaScript, jQuery |
| **Thư viện JS** | Owl Carousel 2, Fancybox, LazyLoad, WOW.js, animateNumber |
| **Editor** | CKEditor (admin) |
| **Email** | PHPMailer |
| **Khác** | PHPExcel / PHPWord (import-export), phpqrcode (Zalo QR) |

---

## 🏗 Kiến trúc & Luồng xử lý

Đây là **MVC tự viết, không framework**. Một request đi qua các bước:

```
                ┌──────────────────────────────────────────────┐
  Browser ──▶  │  .htaccess  (mod_rewrite → index.php)         │
                └──────────────────────────────────────────────┘
                                   │
                                   ▼
        index.php  →  nạp config, autoload, khởi tạo services
        (PDODb, Seo, Router, Cache, Functions, CssMinify, JsMinify…)
                                   │
                                   ▼
        libraries/router.php
          ├─ AltoRouter->map()      (route đặc biệt: home, sitemap, thumbs…)
          ├─ $requick[]             (ánh xạ slug → bảng/source/com)
          └─ switch($com)           (chọn $source + $template + SEO)
                                   │
                                   ▼
        sources/{source}.php        ← MODEL: truy vấn DB, chuẩn bị biến
                                   │
                                   ▼
        templates/index.php         ← dispatcher layout (head/menu/slide/
                                       breadcrumb/footer/js…)
                                   │
                                   ▼
        templates/{template}_tpl.php ← VIEW: render HTML từ dữ liệu
```

**Các khái niệm cốt lõi:**

- **`$com`** — định danh "component" lấy từ URL (slug). Là khóa chính của `switch()` trong router.
- **`$requick`** — mảng ánh xạ: khớp slug động với bảng DB để tự resolve `id` (ví dụ slug bài viết → `news.id`).
- **`$source`** — tên file trong `sources/` cung cấp dữ liệu (Model).
- **`$template`** — đường dẫn file view trong `templates/` (không gồm hậu tố `_tpl.php`).
- **`$seo`** — service set meta tag theo từng trang.

---

## 📂 Cấu trúc thư mục

```
sourcedemo/
├── index.php                 # Entry point: nạp config + khởi tạo services + router
├── .htaccess                 # mod_rewrite → index.php (clean URL)
├── robots.txt
│
├── libraries/                # Core platform
│   ├── config.php            # ⚠️ Cấu hình DB/site — KHÔNG commit (.gitignore)
│   ├── config-type.php       # Group + include các config-type-*.php
│   ├── router.php            # AltoRouter routes + $requick + switch($com)
│   ├── autoload.php          # Tự nạp class
│   ├── constant.php          # Định nghĩa hằng UPLOAD_*, tự tạo folder upload
│   ├── sitemap.php           # Sinh sitemap.xml
│   ├── class/                # Functions, PDODb, Seo, Email, Cache, BreadCrumbs…
│   └── type/                 # Khai báo content-type (config-driven admin)
│       ├── config-type-product.php
│       ├── config-type-news.php       # tin-tuc, tinh-nang, huong-dan, case-study, faq, video
│       ├── config-type-static.php     # gioi-thieu, van-ban-phap-ly (+ gallery)
│       ├── config-type-photo.php      # slider, doi-tac
│       └── config-type-newsletter.php # dang-ky-tu-van
│
├── sources/                  # MODEL — truy vấn DB cho từng trang
│   ├── index.php             # Homepage: 10 query (slider, sản phẩm, tin tức, case study…)
│   ├── news.php              # Listing + detail (tin tức / tính năng / hdsd / case study)
│   ├── product.php           # Product detail (8 query blocks)
│   ├── static.php            # Trang tĩnh + gallery
│   ├── contact.php           # Liên hệ + FAQ
│   ├── allpage.php           # Dữ liệu menu (splistmenu, tinhnang_menu, huongdan_menu)
│   └── video.php, search.php, …
│
├── templates/                # VIEW
│   ├── index.php             # Dispatcher layout chính
│   ├── layout/               # Partials dùng chung
│   │   ├── head.php, css.php, js.php, seo.php
│   │   ├── menu.php          # Header + topbar + nav dropdown
│   │   ├── slide.php         # Hero (hexagon cluster + grid bg)
│   │   ├── breadcrumb.php    # Page banner + H1 (ẩn khi trang có hero riêng)
│   │   ├── footer.php        # Footer 3 cột
│   │   ├── form_dangky.php   # Form đăng ký tư vấn (AJAX, reusable)
│   │   └── hotro_lienhe.php  # Hotline + Zalo QR (reusable)
│   ├── index/index_tpl.php   # Homepage — 11 sections
│   ├── news/                 # news_tpl.php (listing) + news_detail_tpl.php (detail)
│   ├── product/              # product_tpl.php + product_detail_tpl.php
│   ├── static/static_tpl.php # Giới thiệu + Văn bản pháp lý
│   └── contact/contact_tpl.php
│
├── ajax/                     # Endpoint AJAX
│   ├── ajax_newsletter.php   # Đăng ký tư vấn
│   ├── ajax_contact.php      # Form liên hệ
│   └── …
│
├── assets/
│   ├── css/titkul.css        # ⭐ Toàn bộ style site (~12.000 dòng)
│   ├── js/                   # functions.js, apps.js, jQuery, lazyload, wow…
│   └── (owlcarousel2, fancybox3, fontawesome512, fonts, images…)
│
├── sota/                     # 🔐 Hệ thống quản trị (Admin CMS)
│   ├── index.php
│   ├── sources/  templates/  ajax/  elfinder/  …
│
├── upload/                   # Ảnh người dùng upload (news, product, photo, file…)
├── thumbs/                   # Thumbnail sinh tự động
├── caches/                   # File cache CSS/JS gộp (gitignore)
├── logs/                     # Log (gitignore)
└── sota_db_titkul.sql        # Dump CSDL mẫu (import khi cài đặt)
```

---

## 💻 Yêu cầu hệ thống

| Thành phần | Phiên bản tối thiểu |
|------------|---------------------|
| PHP | **7.4+** |
| MariaDB / MySQL | **10.3+ / 5.7+** |
| Apache | có bật **`mod_rewrite`** |
| Extension PHP | `pdo_mysql`, `mbstring`, `gd`, `fileinfo`, `openssl` |

Khuyến nghị môi trường dev: **WampServer** (Windows) hoặc XAMPP / LAMP.

---

## 🚀 Cài đặt

### 1. Clone mã nguồn vào thư mục web root

```bash
# Với WampServer, đặt trong www/
cd C:/wamp64/www
git clone https://github.com/JosephNtd/sota_web.git sourcedemo
cd sourcedemo
```

### 2. Tạo cơ sở dữ liệu & import dữ liệu mẫu

```sql
CREATE DATABASE titkul CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

Import file dump (qua phpMyAdmin hoặc dòng lệnh):

```bash
mysql -u root -p titkul < sota_db_titkul.sql
```

> 💡 File `sota_db_titkul.sql` đi kèm repo. Nếu không có, xin dump mới nhất từ người quản trị.

### 3. Tạo file cấu hình `libraries/config.php`

> ⚠️ **Quan trọng:** `libraries/config.php` nằm trong `.gitignore` — chứa thông tin nhạy cảm (mật khẩu DB) nên **không bao giờ được commit**. Bạn phải tự tạo file này ở local. Xem mẫu ở [mục cấu hình bên dưới](#-cấu-hình-configphp).

### 4. Cấu hình Apache / mod_rewrite

- Bật module `rewrite` trong Apache (WampServer: *Apache → Apache modules → rewrite_module*).
- File `.htaccess` ở thư mục gốc đã cấu hình sẵn redirect mọi request về `index.php`.

### 5. Đặt quyền ghi cho các thư mục

Đảm bảo các thư mục sau có quyền ghi (Linux: `chmod 755`/`775`):

```
upload/   thumbs/   caches/   logs/
```

### 6. Chạy thử

- Frontend: `http://localhost/sourcedemo/`
- Admin: `http://localhost/sourcedemo/sota/`

### 7. Thiết lập màu chính trong Admin

Vào **Admin → Cài đặt → "Màu chính"** đặt giá trị `#001f3f` (Deep Navy).
Nếu không, biến CSS `--tk-main` sẽ fallback về màu teal `#16b1a9` không đúng theme.

---

## ⚙️ Cấu hình `config.php`

File `libraries/config.php` khai báo mảng `$config`. Các nhóm quan trọng:

```php
'database' => array(
    'host'     => 'localhost',
    'username' => 'root',
    'password' => '',          // điền mật khẩu DB của bạn
    'db'       => 'titkul',
    'prefix'   => '...',       // prefix bảng (thay cho '#_')
    'url'      => '/sourcedemo/', // ⚠️ để '/' khi deploy lên host thật
),

'website' => array(
    // Khi BẬT (dev): account admin full quyền, cấu hình được email/ngôn ngữ
    'debug-developer' => true,
    // Khi BẬT (dev): xuất từng file CSS riêng. TẮT (prod) → gộp thành cached.css
    'debug-css'       => true,
    // Khi BẬT (dev): xuất từng file JS riêng. TẮT (prod) → gộp thành cached.js
    'debug-js'        => true,
    'upload' => array(
        'max-width'  => 1600,  // tự resize ảnh nếu vượt
        'max-height' => 1600,
    ),
),

// reCAPTCHA — để 'active' => FALSE khi dev (không cần đăng ký sitekey)
'googleAPI' => array(
    'recaptcha' => array(
        'active'    => FALSE,
        'sitekey'   => '...',
        'secretkey' => '...',
    ),
),
```

> 🔧 **Trước khi deploy production:** đặt cả ba `debug-developer`, `debug-css`, `debug-js` về **`false`** và `'url' => '/'`.

---

## 🗺 Kiến trúc thông tin (IA) & Content Types

Ánh xạ nội dung TitKul vào content-type của sota_web:

| Loại nội dung | Type key | URL frontend | Template |
|---------------|----------|--------------|----------|
| Sản phẩm | `san-pham` | `/san-pham`, `/HDSchool`, `/H2School` | `product` / `product_detail` |
| Tính năng nổi bật | `tinh-nang` | `/tinh-nang-noi-bat` | `news` (zigzag) / `news_detail` |
| Hướng dẫn sử dụng | `huong-dan` | `/huong-dan-su-dung` | `news` (glass) / `news_detail` |
| Tin tức | `tin-tuc` | `/tin-tuc` | `news` (bento+grid) / `news_detail` |
| Case Study | `case-study` | `/case-study`, `/case-study/{slug}` | `news` / `news_detail` |
| Giới thiệu | `gioi-thieu` | `/gioi-thieu-titkul` | `static` |
| Văn bản pháp lý | `van-ban-phap-ly` | `/van-ban-phap-ly` | `static` |
| Liên hệ | `lienhe` | `/lien-he` | `contact` |
| FAQ | `faq` | (nhúng trong trang Liên hệ) | — |
| Video | `video` | (section homepage) | — |
| Slider | `slider` | (module photo) | — |
| Đối tác | `doi-tac` | (module photo — "Trường tiêu biểu") | — |
| Newsletter | `dang-ky-tu-van` | (form partial) | — |

**Lưu ý sản phẩm:** slug `HDSchool` / `H2School` giữ đúng casing. Tắt giá (`dropdown=false`, `list=false`). Cột `masp` dùng làm subtitle (cần ALTER `varchar(255)`).

### Cờ `noibat` (Nổi bật)

Nhiều section homepage chỉ hiển thị bản ghi có `noibat > 0`. Phải tick **"Nổi bật"** trong admin:

- `$sanpham_nb` — sản phẩm hiện ở section *Apps Showcase*
- `$tinhnang` (hexagon hero) — tối đa 6 item nổi bật

### Case Study — Data Model

Bảng `#_news` (type `case-study`) tái sử dụng các cột: `tenvi` (tên trường), `motavi` (tóm tắt), `noidungvi` (nội dung CKEditor), `diachi` (địa điểm), `nghenghiep` (năm triển khai), `link` (badge type).

Gallery (`#_gallery`, `kind='man'`) phân biệt bằng `val`:

| `val` | `tenvi` | `link_video` | Giới hạn |
|-------|---------|--------------|----------|
| `stats` | Nhãn chỉ số ("Giảm thời gian báo cáo") | Giá trị ("75%") | tối đa 4 |
| `quote` | Nội dung câu nói | Tên + chức vụ tác giả | tối đa 1 |

---

## 🔗 Bản đồ Route / URL

Định nghĩa trong `libraries/router.php` (`$requick[]` + `switch($com)`):

| URL | `$com` | Source | Template |
|-----|--------|--------|----------|
| `/` | `home` | index | `index/index` |
| `/san-pham` | `san-pham` | product | `product/product` |
| `/HDSchool`, `/H2School` | `san-pham` (slug) | product | `product/product_detail` |
| `/tinh-nang-noi-bat` | `tinh-nang-noi-bat` | news | `news/news` |
| `/huong-dan-su-dung` | `huong-dan-su-dung` | news | `news/news` |
| `/tin-tuc` | `tin-tuc` | news | `news/news` |
| `/case-study`, `/case-study/{slug}` | `case-study` | news | `news/news[_detail]` |
| `/gioi-thieu-titkul` | `gioi-thieu` | static | `static/static` |
| `/van-ban-phap-ly` | `van-ban-phap-ly` | static | `static/static` |
| `/lien-he` | `lien-he` | contact | `contact/contact` |
| `/sitemap.xml` | `sitemap` | — | sinh động |
| `thumbs/{w}x{h}x{z}/{src}` | — | resize ảnh on-the-fly | — |

> Listing có `id` → tự chuyển sang template `_detail`.

---

## 📄 Trang & Template Frontend

### Homepage — 11 sections (`templates/index/index_tpl.php`)

| # | Section | Nguồn dữ liệu | CSS prefix |
|---|---------|---------------|------------|
| 1 | Hero (hexagon + brand + CTA) | `$tinhnang` | `tk-hero2`, `tk-hex` |
| 2 | Apps Showcase (HDSchool/H2School) | `$sanpham_nb` | `tk-apps` |
| 3+4 | Benefits + Why TitKul | hardcoded | `tk-benefit2`, `tk-stat2` |
| 5 | Tầm nhìn / Sứ mệnh / Giá trị | hardcoded | `tk-vmv2` |
| 6 | For Who — 4 đối tượng | `$huongdan` | `tk-forwho` |
| 7 | Đăng ký tư vấn (form) | newsletter | `tk-register` |
| 8 | Trường tiêu biểu (carousel) | `$doitac` | `tk-partners` |
| 9 | Video (YouTube) | `$video` | `tk-videos` |
| 10 | Tin tức bento | `$tintuc` | `tk-news-bento` |
| 11 | Case Study alternating | `$casestudy` | `tk-cs-*` |

### Breadcrumb ẩn theo trang

Các trang có hero riêng sẽ ẩn page banner mặc định (logic ở `templates/index.php`): Homepage, Giới thiệu, Pháp lý, Liên hệ, Product listing, các listing news, và **tất cả trang detail**.

### Case Study detail — 7 sections

Hero (badge + năm + ảnh + location) → Quote → Stats (counter-up) → Content (CKEditor) → Gallery layered → CTA gradient → Related.

---

## 🔐 Hệ thống quản trị (Admin `sota`)

Truy cập tại `/sota/`. Toàn bộ là **config-driven** — định nghĩa trong `libraries/type/config-type-*.php`:

- Thêm/sửa content-type bằng cách khai báo mảng config (không cần code CRUD).
- `config['group']` (trong `config-type.php`) gom các config cùng nội dung vào nhóm hiển thị. Hỗ trợ: `product`, `news`, `static`, `tags`, `newsletter`, `photo`, `photo_static`.
- Quản lý ảnh: jFiler / elFinder, gallery `kind='man'` phân biệt qua `val`.
- Phân quyền theo nhóm (`#_permission_group`, `#_permission`).

**Hằng đường dẫn upload** (`libraries/constant.php`):

| Hằng | Đường dẫn | Dùng cho |
|------|-----------|----------|
| `UPLOAD_NEWS_L` | `upload/news/` | Tin tức, HDSD, case study, gallery |
| `UPLOAD_PRODUCT_L` | `upload/product/` | Ảnh sản phẩm |
| `UPLOAD_PHOTO_L` | `upload/photo/` | Slider, đối tác, logo |
| `UPLOAD_SEOPAGE_L` | `upload/seopage/` | Banner trang |
| `UPLOAD_FILE` | `../upload/file/` | File (video .mp4…) |

---

## 🎨 Design System & CSS

**Triết lý:** *Premium Scholastic Modernism*. Toàn bộ style ở `assets/css/titkul.css` (~12.000 dòng), prefix class `tk-`.

| Token | Giá trị | CSS var |
|-------|---------|---------|
| Deep Navy | `#001F3F` | `--tk-navy` |
| Professional Red | `#bb0021` | `--tk-red` |
| Background | `#f8f9ff` | `--tk-bg` |
| Glass | `rgba(255,255,255,.7)` + `blur(12px)` | — |
| Border subtle | `#E2E8F0` | `--tk-border-subtle` |
| Shadow card | `0 4px 20px rgba(0,0,0,.05)` | `--tk-shadow-card` |
| Card radius | `16px` | `--tk-radius-card` |
| Font tiêu đề | Montserrat 700 | — |
| Font nội dung | Inter 400 | — |
| Container max | 1280px | `.fixwidth` |

**Hệ thống animation Effect Map:**
- `.tk-rv` — entrance per-element (`--up`, `--left`, `--right`, `--scale`, `--line`)
- `.tk-d1`…`.tk-d6` — stagger delays
- `IntersectionObserver.unobserve()` sau reveal → chạy 1 lần
- Counter-up cho `[data-count]` (easeOutCubic)
- `@media (prefers-reduced-motion)` bao phủ toàn bộ animation

---

## 📝 Quy ước & Lưu ý kỹ thuật

Các điểm dễ vấp khi phát triển trên nền sota_web:

- **CKEditor lưu HTML-encoded** → khi xuất ra view phải `htmlspecialchars_decode()`. Lấy plain text: `strip_tags(htmlspecialchars_decode($s))`. Paste nội dung có custom div/class nên dùng nút **"Mã HTML" (Source mode)**.
- **JS optimize cần dấu `;`** — khi tắt debug, JS được gộp thành `cached.js`. Thiếu `;` ở cuối đoạn script sẽ làm hỏng cả file. Luôn kết thúc statement bằng `;`.
- **jQuery nạp ở cuối `<body>`** (qua `js.php`). Inline script trong template **không dùng** `$(document).ready()` → dùng `window.addEventListener('load', …)` hoặc đặt script sau `js.php`.
- **Comment PHP:** HTML comment `<!-- -->` **không** chặn PHP thực thi → dùng `<?php /* */ ?>` để comment-out code PHP.
- **Slug tiếng Việt không dấu** — SEO/slug chỉ nên dùng tiếng Việt. Slug check trong admin là **cross-table** → dùng prefix (vd `hdsd-`) để tránh trùng.
- **Folder upload tự tạo** — khai báo tên folder mới trong `constant.php` (`$array_const`), hệ thống sẽ tự `define` + tạo.
- **`libraries/config.php` không bao giờ commit** — đã nằm trong `.gitignore`.

---

## 🌐 Triển khai (Deploy)

Checklist khi đưa lên hosting thật:

- [ ] Yêu cầu server: **PHP 7.4+, MariaDB 10.3+, `mod_rewrite`**.
- [ ] Sửa `config.php`: `'url' => '/'`, đặt `debug-developer / debug-css / debug-js` = **`false`**.
- [ ] Đặt `recaptcha.active` = **`TRUE`** + cấu hình sitekey/secretkey thật.
- [ ] Import CSDL production, cập nhật thông tin DB trong `config.php`.
- [ ] Cấp quyền ghi: `upload/`, `thumbs/`, `caches/`, `logs/`.
- [ ] Cài **SSL** (Let's Encrypt) + ép HTTPS trong `.htaccess` (đã có sẵn rule, bỏ comment).
- [ ] Trỏ domain **titkul.vn** (DNS A record).
- [ ] Smoke test toàn bộ routes + form AJAX + tải media.
- [ ] (Tùy chọn) Lighthouse audit — mục tiêu Performance ≥ 85, Accessibility ≥ 90, SEO ≥ 90.

---

## 🩺 Xử lý sự cố thường gặp

| Triệu chứng | Nguyên nhân & cách xử lý |
|-------------|--------------------------|
| Trang trắng / lỗi class | Chưa tạo `libraries/config.php` hoặc sai thông tin DB. |
| URL đẹp 404 | Apache chưa bật `mod_rewrite`, hoặc sai `'url'` trong config. |
| Theme bị màu teal lạ | Chưa đặt "Màu chính" `#001f3f` trong Admin (fallback `--tk-main`). |
| Đổi CSS không thấy cập nhật | Đang ở chế độ cache → bật `debug-css = true`, hoặc xóa `caches/`. |
| JS lỗi sau khi deploy | Thiếu dấu `;` ở cuối đoạn script khi gộp `cached.js`. |
| Section homepage trống | Bản ghi chưa tick **"Nổi bật"** (`noibat`). |
| Nội dung CKEditor hiện thẻ HTML thô | Quên `htmlspecialchars_decode()` khi xuất. |
| Upload gallery 404 | Kiểm tra `img_type` khai báo ở cấp type trong `config-type-*.php`. |

---

## 🛣 Lộ trình

| Phase | Mô tả | Trạng thái |
|-------|-------|------------|
| 0–6 | Môi trường, IA, content-type, nhập liệu, template, form AJAX | ✅ Xong |
| 7 | Style audit + đồng bộ theme + Effect Map animations | ✅ Xong |
| 7.5 | Static pages redesign + gallery đa ảnh + grouping | ✅ Xong |
| 8 | Cleanup menu/footer + CSS polish + SEO (meta/sitemap/favicon/robots) | 🔧 Đang làm |
| 9 | Performance: minify + Lighthouse ≥ 85 + responsive audit | ⏳ |
| 10 | Deploy hosting + SSL + titkul.vn | ⏳ |

---

## 📜 Bản quyền

Dự án nội bộ của **Công ty Cổ phần TitKul**. Nền tảng **sota_web** thuộc bản quyền tác giả gốc.
Mã nguồn dùng cho mục đích phát triển website titkul.vn — không phân phối lại nếu chưa có sự đồng ý.

---

<p align="center">
  <sub>Built with ❤️ on the <b>sota_web</b> platform · Repo: <code>github.com/JosephNtd/sota_web</code></sub>
</p>
