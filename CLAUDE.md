# CLAUDE.md — Dự án TitKul Website Rebuild

> **Repo:** `github.com/JosephNtd/sota_web` (branch `master`)
> **Nền tảng:** sota_web — CMS PHP MVC tự viết, WampServer + MariaDB, AltoRouter
> **Mục tiêu:** Dựng lại website titkul.vn — trang giới thiệu công ty + phần mềm SaaS giáo dục + tin tức. **Không có thương mại điện tử.**
> **Cập nhật lần cuối:** 22/06/2026

---

## 1. BỐI CẢNH DỰ ÁN

**Công ty:** Công ty Cổ phần TitKul — sản xuất phần mềm quản lý trường học (HDSchool, H2School, Zalo Mini App), phục vụ chuyển đổi số ngành giáo dục TP.HCM.

**Người thực hiện:** Thực tập sinh Web Developer.

**Nền tảng sota_web:**
- PHP thuần (không framework), MVC tự viết
- Router: AltoRouter (`libraries/router.php`) — `$requick` array + `switch($com)`
- Admin system: hoàn toàn config-driven qua `libraries/type/config-type-*.php`
- DB: MysqliDb wrapper, prefix `#_` cho tên bảng
- JS/CSS: tự build cache (debug mode bật để output từng file riêng lúc dev)
- `libraries/config.php` bị `.gitignore` — chỉ ở local, **không bao giờ commit hay lưu vào memory**

---

## 2. TỔNG QUAN KẾ HOẠCH

| Phase | Mô tả | Trạng thái |
|-------|--------|------------|
| 0 | Môi trường + config.php + WAMP chạy được | ✅ XONG |
| 1 | Phân tích / ánh xạ IA (Information Architecture) | ✅ XONG |
| 2 | Cấu hình content-type trong admin | ✅ XONG |
| 3 | Nhập liệu mẫu | ✅ XONG |
| 4 | Dựng template frontend | ✅ **XONG 100%** |
| 5 | Verify data dynamic + responsive test | ✅ XONG |
| 6 | Form AJAX (đăng ký tư vấn / liên hệ) | ✅ XONG |
| **7** | **Style audit + đồng bộ theme + optimization** | 🔧 **ĐANG LÀM** |
| 8 | SEO / sitemap / favicon / robots.txt | ⏳ |
| 9 | Minify CSS/JS + Lighthouse audit + deploy | ⏳ |

---

## 3. KIẾN TRÚC THÔNG TIN (IA)

### Ánh xạ content-type titkul → sota_web

| Loại | Type key | URL frontend | Template |
|------|----------|--------------|----------|
| Sản phẩm | `san-pham` | `/san-pham`, `/HDSchool`, `/H2School` | product_tpl / product_detail_tpl |
| Tính năng | `tinh-nang` | `/tinh-nang-noi-bat` | news_tpl (zigzag) / news_detail_tpl |
| HDSD | `huong-dan` | `/huong-dan-su-dung` | news_tpl (glass) / news_detail_tpl |
| Tin tức | `tin-tuc` | `/tin-tuc` | news_tpl (bento+grid) / news_detail_tpl |
| Case Study | `case-study` | `/case-study`, `/case-study/{slug}` | news_tpl / news_detail_tpl |
| Giới thiệu | `gioi-thieu` | `/gioi-thieu-titkul` | static_tpl |
| Văn bản PL | `van-ban-phap-ly` | `/van-ban-phap-ly` | static_tpl |
| Liên hệ | `lienhe` | `/lien-he` | contact_tpl |
| FAQ | `faq` | (dùng trong contact page) | — |
| Video | `video` | (homepage section) | — |
| Slider | `slider` | (photo module) | — |
| Đối tác | `doi-tac` | (photo module — nhãn "Trường tiêu biểu") | — |
| Newsletter | `dang-ky-tu-van` | (form partial) | — |

**Lưu ý sản phẩm:** slug `HDSchool` / `H2School` giữ đúng casing. `dropdown=false`, `list=false` (tắt giá). `masp` cần ALTER → `varchar(255)` để dùng làm subtitle.

---

## 4. CẤU TRÚC FILE CHÍNH

### Templates Frontend

| File | Dòng | Mô tả |
|------|------|-------|
| `templates/index.php` | 48 | Dispatcher: load đúng template theo `$source` |
| `templates/layout/slide.php` | 57 | Hero section (hexagon cluster + grid bg) |
| `templates/layout/menu.php` | 127 | Header + topbar + nav dropdown |
| `templates/layout/breadcrumb.php` | 27 | Page banner + H1 |
| `templates/layout/footer.php` | 86 | Footer 3 cột |
| `templates/layout/form_dangky.php` | 135 | Form đăng ký tư vấn (AJAX, reusable partial) |
| `templates/layout/hotro_lienhe.php` | 35 | Hotline + Zalo QR (reusable partial) |
| `templates/index/index_tpl.php` | 434 | Homepage 11 sections |
| `templates/news/news_tpl.php` | 289 | Listing: 3 nhánh (tinh-nang / huong-dan / tin-tuc+default) |
| `templates/news/news_detail_tpl.php` | 1075 | Detail: 4 nhánh (tinh-nang / huong-dan / case-study / tin-tuc) |
| `templates/product/product_tpl.php` | 45 | Product listing (sơ sài — xem TODO) |
| `templates/product/product_detail_tpl.php` | 325 | Product detail 14 sections |
| `templates/static/static_tpl.php` | 202 | Giới thiệu + Văn bản pháp lý |
| `templates/contact/contact_tpl.php` | 432 | Contact 3-section (hero / form / FAQ) |

### Sources (Backend Data Layer)

| File | Dòng | Ghi chú |
|------|------|---------|
| `sources/index.php` | 71 | 10 queries: slider, tinhnang, sanpham_nb, huongdan, doitac, video, tintuc, casestudy (+stats/quote) |
| `sources/news.php` | 362 | Detail query + gallery queries stats/quote cho case-study |
| `sources/product.php` | 478 | 8 query blocks cho product detail |
| `sources/allpage.php` | — | Menu data: splistmenu, tinhnang_menu, huongdan_menu |

### Config & Router

| File | Dòng | Ghi chú |
|------|------|---------|
| `libraries/type/config-type-news.php` | 418 | 6 types: tin-tuc, tinh-nang, huong-dan, case-study, faq, video |
| `libraries/type/config-type-photo.php` | — | slider, doi-tac |
| `libraries/router.php` | 297 | AltoRouter routes + switch($com) |

### CSS

| File | Dòng |
|------|------|
| `assets/css/titkul.css` | **5,719** |

### AJAX & Forms

| File | Trạng thái |
|------|------------|
| `ajax/ajax_newsletter.php` | ✅ Có sẵn |
| `ajax/ajax_contact.php` | ✅ Có sẵn |

### Admin (đã sửa)

| File | Ghi chú |
|------|---------|
| `sota/sources/news.php` | Fix `case "man_photo":` (gallery 404 bug) |
| `sota/templates/gallery/man/photo_add_tpl.php` | `video_label` custom label support |
| `sota/templates/gallery/man/photo_edit_tpl.php` | `video_label` custom label support |

---

## 5. HOMEPAGE — 11 SECTIONS

| # | Section | Data source | CSS prefix |
|---|---------|-------------|------------|
| 1 | Hero (hexagons + brand + CTA) | `$tinhnang` (ảnh hex), hero tĩnh | `tk-hero2`, `tk-hex` |
| 2 | Apps Showcase (HDSchool / H2School) | `$sanpham_nb` (`noibat > 0`) | `tk-apps`, `tk-app-card` |
| 3+4 | Benefits + Why TitKul | Hardcoded | `tk-benefit2`, `tk-stat2`, `tk-why2` |
| 5 | VMV Storytelling (Vision/Mission/CoreValues) | Hardcoded + ảnh `assets/images/titkul/` | `tk-vmv2` |
| 6 | For Who — 4 đối tượng | `$huongdan` (fallback hardcode) | `tk-forwho` |
| 7 | Đăng ký tư vấn (form partial) | Newsletter module | `tk-register` |
| 8 | Trường tiêu biểu (Owl Carousel) | `$doitac` | `tk-partners` |
| 9 | Video (max 4, YouTube) | `$video` | `tk-videos` |
| 10 | Tin tức bento (1 main + 2 side) | `$tintuc` | `tk-news-bento` |
| 11 | Case Study alternating | `$casestudy`, `$casestudy_stats`, `$casestudy_quote` | `tk-cs-*` |

**Quan trọng:**
- `$sanpham_nb`: query lọc `noibat > 0` — phải tick "Nổi bật" trong admin
- `$tinhnang` hex: lấy tối đa 6 items `noibat > 0`
- Section 1 Hero: không dùng owl-carousel — hero tĩnh, grid pattern CSS
- `.tk-sec { opacity: 0 }` + scroll reveal JS — **chỉ chạy trên homepage**; trang con phải force: `document.querySelectorAll('.tk-sec').forEach(el => el.classList.add('is-revealed'))`

---

## 6. CASE STUDY — DATA MODEL

### Bảng `#_news` (type = `case-study`)

| Trường admin | DB column | Dùng để hiển thị |
|---|---|---|
| Tiêu đề | `tenvi` | Tên trường / dự án |
| Mô tả | `motavi` | Tóm tắt (homepage + listing) |
| Nội dung (CKEditor) | `noidungvi` | Chi tiết trang riêng |
| Hình ảnh | `photo` | Ảnh chính |
| Địa chỉ | `diachi` | Địa điểm trường |
| Nghề nghiệp | `nghenghiep` | Năm triển khai |
| Link ngoài | `link` | Badge type ("Trường học" / "Dự án triển khai") |
| Nổi bật ✅ | `noibat` | Hiển thị trên homepage |

### Gallery `#_gallery` (com=`news`, type=`case-study`, kind=`man`)

| `val` | `tenvi` | `link_video` | Giới hạn |
|-------|---------|--------------|---------|
| `stats` | Nhãn (VD: "Giảm thời gian báo cáo") | Giá trị (VD: "75%") | max 4 |
| `quote` | Nội dung câu nói | Tên + chức vụ tác giả | max 1 |

### Detail page — 6 sections

1. **Hero**: Badge (link) + Năm (nghenghiep) + Tiêu đề + Ảnh logo + Location (diachi) + Mô tả
2. **Quote**: Gallery `val='quote'`
3. **Stats chips**: Gallery `val='stats'`
4. **Content**: CKEditor `noidungvi`
5. **Gallery**: `hinhanhtt` — lightbox carousel (auto-rotate 5s, keyboard nav)
6. **Related**: Case studies cùng `id_list`, max 4

---

## 7. CSS ARCHITECTURE

**File:** `assets/css/titkul.css` (5,719 dòng)

### Design System — "Premium Scholastic Modernism"

| Token | Giá trị | CSS var |
|-------|---------|---------|
| Deep Navy | `#001F3F` | `--tk-navy` |
| Professional Red | `#bb0021` | `--tk-red` |
| Background | `#f8f9ff` | `--tk-bg` |
| Surface Page | `#e8eff8` | *(dùng làm `--tk-surface-page` — xem TODO)* |
| Glass | `rgba(255,255,255,0.7)` + `blur(12px)` | — |
| Border Subtle | `#E2E8F0` | `--tk-border-subtle` |
| Shadow Card | `0 4px 20px rgba(0,0,0,.05)` | `--tk-shadow-card` |
| Card radius | `16px` | `--tk-radius-card` |
| Heading font | Montserrat 700 | — |
| Body font | Inter 400 | — |
| Base grid | 8px | — |
| Section padding | 80px vertical | — |
| Container max | 1280px | `.fixwidth` |

**Lưu ý:** `--tk-main` trỏ về `var(--color-main, #16b1a9)` — fallback màu teal nếu admin chưa set. **Phải vào admin Cài đặt → đặt "Màu chính" = `#001f3f`**, hoặc đổi fallback trong CSS.

### CSS Block Map

| Block | Class prefix | Vị trí (dòng ước lượng) |
|-------|-------------|----------------------|
| Root vars | `--tk-*` | 6–29 |
| Topbar + Menu | `.tk-topbar`, `.tk-nav`, `.tk-menu` | 30–100 |
| Page banner | `.tk-pagebanner` | 132–140 |
| Product listing | `.tk-product-row` | 142–160 |
| Footer | `.tk-footer`, `.tk-foot-*` | 660–680 |
| Float buttons | `.tk-floatbtn`, `.tk-float` | 682–695 |
| Global sections | `.tk-sec`, `.tk-sec-title`, `.tk-sec-desc`, `.tk-btn` | 712–726 |
| Hero (mới) | `.tk-hero2`, `.tk-hex` | 755–870 |
| Apps Showcase | `.tk-apps`, `.tk-app-card` | 871–960 |
| Benefits + Why | `.tk-benefit2`, `.tk-stat2`, `.tk-why2` | 961–1170 |
| VMV (homepage) | `.tk-vmv2` | 1170–1345 |
| Product detail | `.tk-prodetail-*`, `.tk-pd-*` | 160–640 |
| Form đăng ký | `.tk-register` | 1423–1510 |
| Hỗ trợ Zalo | `.tk-support` | 1407–1422 |
| Tính năng | `.tk-feat`, `.tk-nd-*` | 1947–2100 |
| HDSD | `.tk-hdsd-*` | 2100–2270 |
| Tin tức listing | `.tknews-*` | 2800–3500 |
| Tin tức detail | `.tknews-detail-*` | 3500–4000 |
| Contact | `.tkct-*` | 4096–4960 |
| Case Study detail | `.tk-csd-*` | 4969–5719 |
| Responsive | `@media` | (nhiều vị trí) |
| Scroll reveal | `section.tk-sec` animation | 1932–1945 |
| Giới thiệu | `.tk-about`, `.tk-about-vmv` | 1776–1920 |

---

## 8. KỸ THUẬT QUAN TRỌNG

### CKEditor
- Lưu dưới dạng HTML-encoded entities → **xuất cần `htmlspecialchars_decode()`**
- Plain text: `strip_tags(htmlspecialchars_decode())`
- Paste trong visual mode có thể strip custom div/class → **dùng "Mã HTML" (Source mode, nút đầu tiên top-left)**
- Empty `<i>` tags bị strip → thêm `&zwj;` bên trong để giữ Font Awesome icon

### jQuery / JavaScript
- jQuery load **cuối body** qua `js.php`
- Inline script trong template **KHÔNG được dùng** `$(document).ready()` → dùng `window.addEventListener('load', ...)` hoặc đặt script sau `js.php`
- HTML comment `<!-- -->` **KHÔNG chặn PHP execution** → dùng `<?php /* */ ?>` khi cần comment-out PHP code

### Upload Path Constants (đã verify)

| Constant | Path | Dùng cho |
|----------|------|---------|
| `UPLOAD_NEWS_L` | `upload/news/` | Ảnh news, HDSD, case study, gallery |
| `UPLOAD_PRODUCT_L` | `upload/product/` | Ảnh sản phẩm |
| `UPLOAD_PHOTO_L` | `upload/photo/` | Slider, đối tác, logo |
| `UPLOAD_SEOPAGE_L` | `upload/seopage/` | Banner trang (#_seopage) |
| `UPLOAD_FILE` | `../upload/file/` | File taptin (video .mp4 etc) — dùng `$config_base . 'upload/file/' . $taptin` |
| `THUMBS` | `thumbs/` | Thumbnail on-the-fly |

### Gallery System
- `kind='man'` cho tất cả manual gallery, phân biệt bằng `val`
- Query pattern: `WHERE com='news' AND type=? AND kind='man' AND val=? AND id_photo=?`
- `video_label` config: khi có, admin hiện label custom + ẩn YouTube preview

### Router
- `$requick` array → route mapping
- `switch($com)` → load template/source
- Static (`gioi-thieu`, `van-ban-phap-ly`) và photo (`slider`, `doi-tac`) được resolve bằng `$com` case, **loại khỏi requick**

### noibat flag
- `noibat > 0` — sản phẩm/bài viết phải tick "Nổi bật" trong admin mới hiện trên homepage/sections
- Slug uniqueness check trong admin JS là **cross-table** → dùng prefix `hdsd-` cho HDSD categories (tránh trùng với `#_product`)

### Product data patterns
- Section 6 mô tả = `motavi` item `chuc-nang` đầu tiên
- Section 11 mô tả = `motavi` item `loi-ich` đầu tiên
- Subtitle per-product = `masp` (cần ALTER varchar(255))
- `select_photo` dropdown lưu vào cột `link`, query filter `WHERE link=product_slug`

---

## 9. PHASE 7 — VIỆC CẦN LÀM (ĐANG LÀM)

### 🔴 Nhóm 1 — Lỗi thật (phải làm)

**1.1 — Trang Giới thiệu: VMV section mất style**
- `static_tpl.php` Khối 4 dùng `.tk-vmv-row`, `.tk-vmv-text`, `.tk-vmv-img`, `.tk-vmv-label`, `.tk-vmv-h3`
- Các class này **không có CSS** trong `titkul.css` (chỉ có `.tk-vmv2-*` cho homepage)
- → Thêm CSS cho các class đó, HOẶC refactor sang dùng `.tk-vmv2` layout

**1.2 — Xóa file rác**
- `templates/static/static_tpl copy.php` vẫn còn trong repo
- → Xóa đi

**1.3 — Menu thiếu link Case Study**
- `menu.php` không có item "Case Study"; footer cũng không
- → Thêm menu item + footer link

### 🟠 Nhóm 2 — Không đồng bộ style

**2.1 — Page banner title màu sai**
- `.tk-pagebanner-title` và `.tk-pagebanner-desc` dùng `color: var(--tk-main)` (teal)
- Tất cả heading mới dùng `#001f3f` (Navy)
- → Đổi sang `color: var(--tk-navy)`

**2.2 — `#e60000` không thuộc design system**
- `.tk-support-title`, `.tk-register-title`, `.tk-register-form .invalid-feedback` dùng `#e60000`
- Design system dùng `--tk-red: #bb0021`
- → Đổi `#e60000` → `var(--tk-red)`

**2.3 — `form_dangky.php` background không nhất quán**
- `.tk-register { background: #fde8e8 }` — màu ad-hoc không trong token
- → Đổi sang `var(--tk-secondary-fixed, #ffdad7)` hoặc token surface

**2.4 — Contact page có local vars riêng không cần thiết**
- `.tkct-page { --tkct-primary: #001f3f; --tkct-secondary: #bb0021; ... }` — duplicate với global `--tk-*`
- Giá trị giống nhau nhưng 2 hệ thống song song
- → *(Optional)* Thay `var(--tkct-*)` bằng `var(--tk-*)`, xóa local var block

**2.5 — `static_tpl.php` dùng `var(--color-main)` thay `var(--tk-main)`**
- Dòng 150: inline style `background: var(--color-main)` — raw admin var, không nhất quán
- → Đổi sang class CSS + `var(--tk-main)`

**2.6 — Duplicate CSS rules trong dropdown menu**
- `.tk-menu .menu_cap_con` block bị copy lặp 2 lần (dòng 74–94)
- → Xóa phần duplicate

**2.7 — Comment block "DESIGN SYSTEM VARS" lỗi thời (dòng ~727–756)**
- Block comment hướng dẫn "hãy thêm vào :root" nhưng đã được thêm rồi từ đầu file
- → Xóa block comment đó

**2.8 — `--tk-main` fallback màu teal**
- `:root { --tk-main: var(--color-main, #16b1a9) }` — nếu admin chưa set màu, toàn bộ `var(--tk-main)` hiển thị teal
- → Vào admin Cài đặt → đặt "Màu chính" = `#001f3f`, HOẶC đổi fallback trong CSS

### 🟡 Nhóm 3 — Improvement / Có thể thêm

**3.1 — Upgrade VMV block trang Giới thiệu**
- Khối 4 trong `static_tpl.php` layout rows cũ, trông kém hơn `.tk-vmv2` homepage
- → Refactor sang `.tk-vmv2` (glassmorphism, grid) để đồng bộ visual

**3.2 — Redesign `hotro_lienhe.php` cho premium hơn**
- Hiện là danh sách `<ul>` text thô "b1:", "b2:" — không khớp với premium design
- → 2 card (Hotline + Zalo) với icon FA, màu Navy/Red đúng design

**3.3 — Footer cột 1: dữ liệu hardcode**
- Đang dùng 5 dòng `<p>` hardcode thay vì `$footer`, `$optsetting`, `$social1`
- Nếu admin thay đổi thông tin công ty, footer không cập nhật
- → Bỏ comment đoạn dynamic, xóa hardcode, tích hợp social icons

**3.4 — Footer thiếu links**
- "Truy cập nhanh" chỉ có: Văn bản pháp lý, HDSchool, H2School, HDSD
- Thiếu: Tin tức, Tính năng nổi bật, Case Study, Giới thiệu
- → Thêm 3–4 links

**3.5 — Breadcrumb dùng `<h1>` sai cho description**
- `breadcrumb.php`: `$mota_page` render bằng `<h1 class="tk-pagebanner-desc">` — 2 H1 trên 1 trang, hại SEO
- → Đổi thành `<p class="tk-pagebanner-desc">`

**3.6 — `product_tpl.php` quá sơ sài (45 dòng)**
- Trang listing `/san-pham` không có header, không có intro text, không có page context
- → Thêm hero section với title + mô tả

**3.7 — Inline styles trong `static_tpl.php` (van-ban-phap-ly)**
- Sidebar "Liên hệ tư vấn" dùng ~8 inline styles
- → Tạo class CSS `.tk-static-sidebar-box`

### ⚪ Nhóm 4 — Cleanup

**4.1 — File phone templates cũ không dùng**
- `templates/layout/`: `phione_mk.php` (3,868 dòng), `phone3.php` (3,842 dòng), `phone-vr.php` (491 dòng), `phone_sato.php` (318 dòng)
- Đây là template điện thoại từ dự án cũ của sota_web, không được include ở đâu
- → Confirm không dùng, sau đó xóa hoặc archive

**4.2 — Thêm token `--tk-surface-page`**
- `#e8eff8` xuất hiện 5+ chỗ hardcode (page banner, product hero, product rows)
- → Thêm `--tk-surface-page: #e8eff8` vào `:root`, thay thế hardcode

---

## 10. PHASE 8 — TIẾP THEO SAU PHASE 7

- [ ] Meta tags per-page (`<title>`, `<meta description>`, og tags)
- [ ] `sitemap.xml` tự sinh
- [ ] Favicon + apple-touch-icon
- [ ] `robots.txt` cập nhật
- [ ] Responsive test breakpoints 1024/768/480 tất cả trang

## 11. PHASE 9 — DEPLOY

- [ ] Minify CSS/JS (tắt debug mode trong config)
- [ ] Lazy load images (`loading="lazy"` — đã có nhiều chỗ)
- [ ] Lighthouse audit (target: Performance ≥ 85, Accessibility ≥ 90)
- [ ] Deploy hosting + SSL + domain `titkul.vn`

---

## 12. HƯỚNG DẪN LÀM VIỆC

### Quy ước đầu session
1. Đọc lại memory cốt lõi trong Project
2. **Fetch bản mới nhất từ GitHub** trước khi làm việc: `/archive/refs/heads/master.zip`
3. Extract → dùng `grep`, `sed -n`, `find`, `wc -l` để navigate — tránh load toàn file lớn
4. Đọc file thật trước khi đưa code — **không bịa hàm/field không có**

### Cách đưa code
- Ưu tiên **targeted edits / surgical patches** hơn regenerate toàn bộ file
- Full file output chỉ khi tạo template/config mới hoàn toàn
- Làm **iteratively**: push → xem kết quả → duyệt → tiếp tục
- **Hỏi clarifying questions** trước khi code section mới

### Kết thúc session
- Cập nhật tiến độ vào memory (mục "Tiến độ" và "Việc còn treo")
- Cập nhật `CLAUDE.md` trong repo
